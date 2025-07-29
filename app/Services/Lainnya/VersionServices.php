<?php

namespace App\Services\Lainnya;

use App\Models\Output\LogActivity;
use App\Models\Output\Version;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class VersionServices
{
    public function addData($data)
    {
        $versi =  new Version();
        $versi->kode_versi = $data['kode_versi'];
        $versi->pembaruan = $data['pembaruan'];
        $versi->pembaruan_detail = $data['pembaruan_detail'];
        $versi->tgl_rilis = $data['tgl_rilis'];

        if (!empty($data['file'])) {
            $gambar = $data['file'];

            // Ambil nama asli file & buat nama unik agar tidak ada konflik
            $fileName = now()->format('mY') . '-' . $gambar->getClientOriginalName();

            // Cek apakah file sudah ada
            if (!Storage::exists('file_upload/juknis/' . $fileName)) {
                // Simpan file jika belum ada
                $gambar->storeAs('file_upload/juknis', $fileName, 'public');
            } else {
                // Handle jika file sudah ada
                session()->flash('error', 'File dengan nama yang sama sudah ada.');
            }

            // Simpan nama file ke database
            $versi->file = $fileName;
        } else {
            $versi->file = "-";
        }

        $versi->save();

        // Log Aktivitas
        LogActivity::AddLog("(+) Data Version | Kode: {$versi->kode_versi} | Tgl Rilis: {$versi->tgl_rilis->format('d F Y')}");

        return $versi;
    }


    public function editData($data)
    {
        $versi = Version::find(base64_decode($data['id_table']));
        $versi->kode_versi = $data['kode_versi'];
        $versi->pembaruan = $data['pembaruan'];
        $versi->pembaruan_detail = $data['pembaruan_detail'];
        $versi->tgl_rilis = $data['tgl_rilis'];

        if ($data['file'] != $versi->file) {
            $gambar = $data['file'];

            // Ambil nama asli file & buat nama unik agar tidak ada konflik
            $fileName = now()->format('mY') . '-' . $gambar->getClientOriginalName();

            // Cek apakah file sudah ada
            if (!Storage::exists('file_upload/juknis/' . $fileName)) {
                // Simpan file jika belum ada
                $gambar->storeAs('file_upload/juknis', $fileName, 'public');
            } else {
                // Handle jika file sudah ada
                session()->flash('error', 'File dengan nama yang sama sudah ada.');
            }

            // Simpan nama file ke database
            $versi->file = $fileName;
        } else {
            if ($data['config_hapus'] == true) {
                $versi->file = "-";
            }
        }

        $versi->save();

        // Log Aktivitas
        LogActivity::AddLog("(u) Data Version | Kode: {$versi->kode_versi} | Tgl Rilis: {$versi->tgl_rilis->format('d F Y')}");

        return $versi;
    }


    public function showData($id)
    {
        $versi = Version::find(base64_decode($id));
        return [
            'modal_title' => 'Show Data ' . $versi->kode_versi,
            'kode_versi' => $versi->kode_versi,
            'pembaruan' => $versi->pembaruan,
            'pembaruan_detail' => $versi->pembaruan_detail,
            'file' => $versi->file,
            'tgl_rilis' => $versi->tgl_rilis,
        ];
    }
}
