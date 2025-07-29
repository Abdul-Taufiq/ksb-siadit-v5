<?php

namespace App\Livewire\MasterUser;

use App\Models\Output\LogActivity;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use Livewire\Features\SupportPagination\WithoutUrlPagination;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Url;

class UserTable extends Component
{
    use WithPagination, WithoutUrlPagination, UserValidation;

    public $id, $nik, $nama, $place, $birth_date, $birth_date_show, $address, $phone_number, $username, $email, $password, $password_confirmation, $profile_image, $is_active, $jabatan;
    public $role = 'NotSet';
    public $gender = 'NotSet';
    public $code_page;
    public $page = 1;
    public $perPage = 10;

    #[Url(history: true)] //jika ini aktif maka akan ada url tambahan dikomen/dihapus aja
    public $search = '';

    // #[Url(history: true)]
    public $sortBy = 'created_at';
    // #[Url(history: true)]
    public $sortDir = 'desc';

    protected $listeners = ['refreshTable' => '$refresh', 'UpdateUser', 'HapusData', 'Restore'];


    // sett sortir
    public function setSortBy($field)
    {
        if ($this->sortBy === $field) {
            $this->sortDir = $this->sortDir === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDir = 'asc';
        }
        $this->sortBy = $field;
    }

    public function render()
    {
        if ($this->code_page == 'index') {
            $users = User::search($this->search)
                ->where('is_deleted', 'false')
                ->orderBy($this->sortBy, $this->sortDir)
                ->paginate($this->perPage);
        } else {
            $users = User::search($this->search)
                ->where('is_deleted', 'true')
                ->orderBy($this->sortBy, $this->sortDir)
                ->paginate($this->perPage);
        }


        return view('livewire.master-user.user-table', compact('users'), [
            'idField' => '_edit'
        ]);
    }


    public function Show($item)
    {
        $user = User::with('UserDetails')->find($item['id']);
        $this->id = $user['id'];
        $this->nik = $user->UserDetails['nik'];
        $this->place = $user->UserDetails['place'];
        $this->birth_date_show = $user->UserDetails['birth_date'];
        $this->gender = $user->UserDetails['gender'];
        $this->address = $user->UserDetails['address'];
        $this->phone_number = $user->UserDetails['phone_number'];

        $this->nama = $user['nama'];
        $this->username = $user['username'];
        $this->email = $user['email'];
        $this->jabatan = $user['jabatan'];
        $this->role = $user['role'];
        $this->profile_image = $user['profile_image'];
        $this->is_active = $user['is_active'];
    }


    // fungsi switch status
    public function userStatus($kode)
    {
        $ids = Crypt::decrypt($kode);
        $user = User::find($ids);
        if ($user->is_active === 'active') {
            $user->is_active = 'not_active';
            $user->save();
        } else {
            $user->is_active = 'active';
            $user->save();
        }
    }


    // Edit
    public function EditUser($item)
    {
        $user = User::findOrFail($item['id']);
        // dd($user->UserDetails);
        $this->id = $user->id;
        $this->nik = $user->UserDetails->nik;
        $this->place = $user->UserDetails->place;
        $this->birth_date = $user->UserDetails->birth_date ? $user->UserDetails->birth_date->format('Y-m-d') : '';

        $this->gender = $user->UserDetails->gender;
        $this->address = $user->UserDetails->address;
        $this->phone_number = $user->UserDetails->phone_number;
        $this->nama = $user->nama;
        $this->username = $user->username;
        $this->email = $user->email;
        $this->jabatan = $user->jabatan;
        $this->role = $user->role;
        $this->password = $user->password_ori;
        $this->password_confirmation = $user->password_ori;
        $this->is_active = $user->is_active;
    }


    // 🔥 Live Validation
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function UpdateUser()
    {
        $userDetail = UserDetail::where('user_id', $this->id)->first();
        $user = User::where('id', $this->id)->first();
        try {
            $this->validate($this->rules($this->id, $userDetail->id)); // 🔥 Jalankan validasi sebelum menyimpan data
        } catch (ValidationException $e) {
            $this->dispatch('validationFailed'); // 🚀 Emit event jika validasi gagal
            throw $e; // Pastikan error tetap muncul di UI Livewire
        }

        $user->update([
            'nama' => $this->nama,
            'username' => $this->username,
            'role' => $this->role,
            'jabatan' => $this->jabatan,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'password_ori' => $this->password,
        ]);

        // Simpan Detail User
        $userDetail->update([
            'user_id' => $this->id,
            'nik' => $this->nik,
            'place' => $this->place,
            'birth_date' => $this->birth_date,
            'gender' => $this->gender,
            'address' => $this->address,
            'phone_number' => $this->phone_number,
        ]);

        // Log Aktivitas
        LogActivity::AddLog("(+) Data User | Nama: {$user->nama} | Role: {$user->role} | Jabatan: {$user->jabatan}");


        // 🔥 Reset form setelah berhasil menyimpan data
        $this->reset(['nik', 'nama', 'place', 'birth_date', 'address', 'phone_number', 'username', 'email', 'password', 'password_confirmation', 'jabatan']);
        $this->role = 'NotSet';
        $this->gender = 'NotSet';

        // 🔥 Kirim event ke Livewire atau JavaScript
        $this->dispatch('AlertSuccess', ['message' => 'Data berhasil ditambahkan!', 'userId' => sha1($user->id)]);

        // 🔄 Refresh halaman dengan redirect (gunakan `js redirect` agar Livewire tidak error)
        // return redirect()->route('master-user.index')->with('AlertSuccess', 'Data berhasil diupdate!');
    }


    public function HapusData($item)
    {
        $Ids = base64_decode($item);
        // Log::info("Event HapusData diterima dengan item: " . $item);
        // Log::info("ID setelah decode: " . $Ids);
        $user = User::find($Ids);

        if (!$user) {
            $this->dispatch('ErrorDeleted', 'User tidak ditemukan.');
            return;
        }

        $user->update([
            'is_deleted' => 'true',
            'is_active' => 'not_active'
        ]);

        // Log Aktivitas
        LogActivity::AddLog("(-) Data User | Nama: {$user->nama} | Role: {$user->role} | Jabatan: {$user->jabatan}");
        $this->dispatch('SuccessDeleted', 'Oke!');
    }


    public function Restore($item)
    {
        $Ids = base64_decode($item);
        $user = User::find($Ids);
        if (!$user) {
            $this->dispatch('ErrorDeleted', 'User tidak ditemukan.');
            return;
        }

        $user->update([
            'is_deleted' => 'false',
            'is_active' => 'active',
        ]);


        // Log Aktivitas
        LogActivity::AddLog("(-) Data User | Nama: {$user->nama} | Role: {$user->role} | Jabatan: {$user->jabatan}");
        $this->dispatch('SuccessRestored', 'Oke!');
    }
}
