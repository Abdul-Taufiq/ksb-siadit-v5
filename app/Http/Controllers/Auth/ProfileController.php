<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user(); // Sama dengan auth()->user()

        return view('auth.myProfile.index-myprofile', compact('user'), [
            'title' => 'Profile',
        ]);
    }


    public function upload(User $user, Request $request)
    {
        $request->validate([
            'gambar' => 'required|image|max:2024',
        ], [
            // PESAN ERROR
            'gambar.image' => 'File Harus Berformat Gambar!',
            'gambar.max' => 'File Terlalu Besar! Maximal 2 MB',
        ]);


        //mengambil data file yang diupload
        $gambar = $request->file('gambar');
        //mengambil nama file
        $fileName = now()->format('Ymd') . '_' . $gambar->getClientOriginalName();
        //memindahkan file ke folder tujuan

        if ($fileName != $user->gambar) {
            $gambar->move('images/profile_image', $fileName);
        }
        // $gambar->storeAs('file_upload',$gambar->getClientOriginalName());

        $user->update([
            'gambar' => $fileName,
            'updated_at' => now(),
        ]);
        return redirect()->back()->with('AlertSuccess', 'Foto Profil Berhasil Diubah!');
    }
}
