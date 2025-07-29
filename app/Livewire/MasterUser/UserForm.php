<?php

namespace App\Livewire\MasterUser;

use App\Models\Output\LogActivity;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use App\Livewire\MasterUser\UserValidation;
use Illuminate\Support\Facades\Crypt;

class UserForm extends Component
{
    use UserValidation; // Import validasi UserValidation

    public $nik, $nama, $place, $birth_date, $address, $phone_number, $username, $email, $password, $password_confirmation, $jabatan;
    public $role = 'NotSet';
    public $gender = 'NotSet';

    protected $listeners = ['StoreUser']; // Listener untuk submit setelah konfirmasi

    public function render()
    {
        return view('livewire.master-user.user-form', ['idField' => null]);
    }

    // 🔥 Live Validation
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function StoreUser()
    {
        try {
            $this->validate(); // 🔥 Jalankan validasi sebelum menyimpan data
        } catch (ValidationException $e) {
            $this->dispatch('validationFailed'); // 🚀 Emit event jika validasi gagal
            throw $e; // Pastikan error tetap muncul di UI Livewire
        }

        $user = User::create([
            'nama' => $this->nama,
            'username' => $this->username,
            'role' => $this->role,
            'jabatan' => $this->jabatan,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'password_ori' => $this->password,
        ]);

        // Simpan Detail User
        UserDetail::create([
            'user_id' => $user->id,
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
        $this->dispatch('AlertSuccess', ['message' => 'Data berhasil ditambahkan!', 'userId' => Crypt::encrypt($user->id)]);
        // refresh Table view


        // 🔄 Refresh halaman dengan redirect (gunakan `js redirect` agar Livewire tidak error)
        // return redirect()->route('master-user.index');
    }
}
