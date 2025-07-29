<?php

namespace App\Livewire\MyProfil;

use App\Models\User;
use App\Models\UserDetail;
use Livewire\Component;

class ProfilLivewire extends Component
{
    public $id_user;
    public $nama;

    public function mount($user)
    {
        $this->id_user = $user->id;
        $this->nama = $user->nama;

        // dd($this->birth_date);
    }

    public function render()
    {
        return view('livewire.my-profil.profil-livewire');
    }




    protected $listeners = ['updateProfile']; // 🔥 Listener untuk submit setelah konfirmasi
    // public function confirmUpdate()
    // {
    //     $this->dispatch('triggerUpdate'); // 🚀 Memicu JavaScript konfirmasi
    // }


    // rules
    protected $rules = [
        'nik' => 'required|numeric|digits:16', //harus 16 digits
        'nama' => 'required|max:100',
        'place' => 'required',
        'birth_date' => 'required',
        'gender' => 'required',
        'address' => 'required|max:200',
        'phone_number' => 'required|numeric|digits_between:8,15',
    ];
    // messages rules
    public function messages()
    {
        return [
            'nik.required' => 'NIK tidak boleh kosong',
            'nik.numeric' => 'NIK harus berupa angka',
            'nik.digits' => 'NIK minimal 16 digit',
            'nama.required' => 'Nama tidak boleh kosong',
            'nama.max' => 'Nama maksimal 100 karakter',
            'place.required' => 'Tempat lahir tidak boleh kosong',
            'birth_date.required' => 'Tanggal lahir tidak boleh kosong',
            'gender.required' => 'Jenis kelamin tidak boleh kosong',
            'address.required' => 'Alamat tidak boleh kosong',
            'address.max' => 'Alamat maksimal 200 karakter',
            'phone_number.required' => 'Nomor telepon tidak boleh kosong',
            'phone_number.numeric' => 'Nomor telepon harus berupa angka',
            'phone_number.digits_between' => 'Nomor telepon minimal 8 digit maksimal 15 digit',
        ];
    }

    // fungsi Update
    public function updateProfile()
    {
        try {
            $this->validate(); // 🔥 Jalankan validasi sebelum menyimpan data
        } catch (\Illuminate\Validation\ValidationException $e) {
            $this->dispatch('validationFailed'); // 🚀 Emit event jika validasi gagal
            throw $e; // Pastikan error tetap muncul di UI Livewire
        }

        $userDetail = UserDetail::where('user_id', $this->id_user)->first();
        $user = User::find($this->id_user);
        if (empty($userDetail)) {
            # code...
            $addDetail = new UserDetail();
            $addDetail->user_id = $this->id_user;
            $addDetail->nik = $this->nik;
            $addDetail->place = $this->place;
            $addDetail->birth_date = $this->birth_date;
            $addDetail->gender = $this->gender;
            $addDetail->address = $this->address;
            $addDetail->phone_number = $this->phone_number;
            $addDetail->save();

            $user->update([
                'nama' => $this->nama,
            ]);
        } else {
            $userDetail->update([
                'nik' => $this->nik,
                'place' => $this->place,
                'birth_date' => $this->birth_date,
                'gender' => $this->gender,
                'address' => $this->address,
                'phone_number' => $this->phone_number,
            ]);

            $user->update([
                'nama' => $this->nama,
            ]);
        }

        session()->flash('AlertSuccess', 'Data berhasil diupdate!');
        redirect()->route('profile.index');
    }
}
