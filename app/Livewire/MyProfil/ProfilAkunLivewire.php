<?php

namespace App\Livewire\MyProfil;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class ProfilAkunLivewire extends Component
{
    public $nama;
    public $nama_user;
    public $email;
    public $password;
    public $password_confirmation;
    public $id;


    public function mount($user)
    {
        $this->id = $user->id;
        $this->nama = $user->nama;
        $this->nama_user = $user->nama;
        $this->email = $user->email;
    }


    public function render()
    {
        return view('livewire.my-profil.profil-akun-livewire');
    }

    protected $listeners = ['updateProfileAkun']; // 🔥 Listener untuk submit setelah konfirmasi

    // untuk aksi confirmation update
    // public function confirmUpdateAkun()
    // {
    //     $this->dispatch('triggerUpdateAkun'); // 🚀 Memicu JavaScript konfirmasi
    // }

    protected function rules()
    {
        return [
            'nama' => 'required|max:100',
            'email' => 'required|email|unique:users,email,' . $this->id . '|max:100',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required|same:password', // konfirmasi password sama seperti password yang diinputkan user. 'confirmed' adalah rule Laravel.  // �� Rule ini dipakai untuk validasi password baru (jika ada)
        ];
    }

    public function messages()
    {
        return [
            'nama.required' => 'nama harus diisi',
            'nama.max' => 'nama maksimal 100 karakter',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format email salah',
            'email.unique' => 'Email sudah terdaftar',
            'email.max' => 'Email maksimal 100 karakter',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 8 karakter',
            'password.confirmed' => 'Password baru harus sama',
            'password_confirmation.required' => 'Konfirmasi password harus diisi',
            'password_confirmation.same' => 'Password baru harus sama',
        ];
    }

    public function updateProfileAkun()
    {
        $this->validate();

        $user = User::find($this->id);
        $user->nama = $this->nama;
        $user->email = $this->email;
        $user->password = Hash::make($this->password);
        $user->save();

        session()->flash('AlertSuccess', 'Data berhasil diupdate!');
        redirect()->route('profile.index');
    }
}
