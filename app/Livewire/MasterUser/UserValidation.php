<?php

namespace App\Livewire\MasterUser;

use Illuminate\Validation\Rule;

trait UserValidation
{
    public function rules($id = null, $id_detail = null): array
    {
        return [
            'nik' => [
                'required',
                'numeric',
                'digits:16',
                'unique:user_detail,nik,' . $id_detail,
            ],
            'nama' => 'required|max:100',
            'place' => 'required',
            'birth_date' => 'required|date',
            'gender' => 'required',
            'role' => 'required',
            'jabatan' => 'required',
            'address' => 'required|max:255',
            'phone_number' => 'required|numeric|digits_between:8,15',
            'username' =>  'required|unique:users,username,' . $id . '|max:100',
            'email' => 'required|email|unique:users,email,' . $id . '|max:100',
            'password' => 'nullable|min:8', // 🛠 Tidak wajib jika update
            'password_confirmation' => 'nullable|same:password',
        ];
    }

    public function messages(): array
    {
        return [
            'nik.required' => 'NIK tidak boleh kosong',
            'nik.numeric' => 'NIK harus berupa angka',
            'nik.digits' => 'NIK minimal 16 digit',
            'nik.unique' => 'NIK Sudah Terdaftar',
            'nama.required' => 'Nama tidak boleh kosong',
            'nama.max' => 'Nama maksimal 100 karakter',
            'place.required' => 'Tempat lahir tidak boleh kosong',
            'birth_date.required' => 'Tanggal lahir tidak boleh kosong',
            'gender.required' => 'Jenis kelamin tidak boleh kosong',
            'role.required' => 'Role tidak boleh kosong',
            'jabatan.required' => 'Jabatan tidak boleh kosong',
            'address.required' => 'Alamat tidak boleh kosong',
            'address.max' => 'Alamat maksimal 255 karakter',
            'phone_number.required' => 'Nomor telepon tidak boleh kosong',
            'phone_number.numeric' => 'Nomor telepon harus berupa angka',
            'phone_number.digits_between' => 'Nomor telepon minimal 8 digit maksimal 15 digit',
            'username.required' => 'Username harus diisi',
            'username.max' => 'Username maksimal 100 karakter',
            'username.unique' => 'Username Sudah Terdaftar',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format email salah',
            'email.unique' => 'Email sudah terdaftar',
            'email.max' => 'Email maksimal 100 karakter',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 8 karakter',
            // 'password.confirmed' => 'Password baru harus sama',
            'password_confirmation.required' => 'Konfirmasi password harus diisi',
            'password_confirmation.same' => 'Konfirmasi password harus sama',
        ];
    }
}
