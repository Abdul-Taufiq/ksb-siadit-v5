<?php

namespace App\Services\MasterKredit\Debitur;

use App\Models\MasterKredit\Debitur;
use App\Models\Output\LogActivity;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DebiturService
{
    public function createDebitur(array $data)
    {
        $usia = Carbon::createFromDate($data['tgl_lahir'])->diff(Carbon::now())->format('%y tahun %m bulan');
        $id_cabang = Auth::user()->id_cabang;

        return Debitur::create([
            'id_cabang' => $id_cabang,
            'nik' => $data['nik'],
            'nama_debitur' => $data['nama_debitur'],
            'tempat_lahir' => $data['tempat_lahir'],
            'tgl_lahir' => $data['tgl_lahir'],
            'usia' => $usia,
            'jenis_kelamin' => $data['jenis_kelamin'],
            'status_pernikahan' => $data['status_pernikahan'],
            'pendidikan_terakhir' => $data['pendidikan_terakhir'],
            'alamat_ktp' => $data['alamat_ktp'],
            'rt_rw_ktp' => $data['rt_rw_ktp'],
            'kelurahan' => $data['kelurahan'],
            'kecamatan' => $data['kecamatan'],
            'kabupaten' => $data['kabupaten'],
            'nama_ibu' => $data['nama_ibu'],
            'jumlah_tanggungan' => $data['jumlah_tanggungan'],
            'no_telp' => $data['no_telp'],
            'jumlah_anak' => $data['status_pernikahan'] == 'Duda/Janda' ? $data['jumlah_anak_single'] : $data['jumlah_anak'],
            'alamat_rumah' => $data['alamat_rumah_opsi'] == 'Tidak' ? $data['alamat_rumah'] : $data['alamat_ktp'],
            'rt_rw_rumah' => $data['rt_rw_rumah_opsi'] == 'Tidak' ? $data['rt_rw_rumah'] : $data['rt_rw_ktp'],
            'kode_pos' => $data['kode_pos'],
            'status_tempat_tinggal' => $data['status_tempat_tinggal'],
            'status_kepemilikan' => $data['status_kepemilikan'],
            'tahun_ditempati' => $data['tahun_ditempati'],
            'pekerjaan' => $data['pekerjaan'],

            'bentuk_usaha' => $data['bentuk_usaha'],
            'persen_kepemilikan' => $data['persen_kepemilikan'],
            'jumlah_karyawan' => $data['jumlah_karyawan'],
            'mulai_usaha' => $data['mulai_usaha'],

            'nama_perusahaan' => $data['nama_perusahaan_deb'],
            'grup_usaha' => $data['grup_usaha'],
            'bidang_usaha' => $data['bidang_usaha'],
            'jabatan' => $data['jabatan'],
            'alamat_usaha' => $data['alamat_usaha'],
            'status_tempat_usaha' => $data['status_tempat_usaha'],
            'periode' => $data['periode'],
            'penghasilan_bulanan' => str_replace(['Rp. ', '.'], '', $data['penghasilan_bulanan']),

            'tgl_pernikahan' => $data['tgl_pernikahan'],
            'nik_pasangan' => $data['nik_pasangan'],
            'nama_pasangan' => $data['nama_pasangan'],
            'tempat_lahir_pasangan' => $data['tempat_lahir_pasangan'],
            'tgl_lahir_pasangan' => $data['tgl_lahir_pasangan'],
            'pekerjaan_pasangan' => $data['pekerjaan_pasangan'],
            'penghasilan_bulanan_pasangan' => $data['penghasilan_pasangan'] != null ? str_replace(['Rp. ', '.'], '', $data['penghasilan_pasangan']) : null,
            'alamat_pasangan' =>
            $data['status_pernikahan'] === 'Menikah' || $data['status_pernikahan'] === 'Pernikahan Khusus'
                ? ($data['alamat_pasangan_opsi'] === 'Tinggal Sendiri'
                    ? $data['alamat_pasangan']
                    : $data['alamat_pasangan_opsi'])
                : null,
            'judul_akta' => $data['judul_akta'],
            'no_akta' => $data['no_akta'],
            'tgl_akta' => $data['tgl_akta'],
            'nama_notaris' => $data['nama_notaris'],
            'kedudukan_notaris' => $data['kedudukan_notaris'],

            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }


    public function updateDebitur(array $data, $debitur)
    {
        $usia = Carbon::createFromDate($data['tgl_lahir_edit'])->diff(Carbon::now())->format('%y tahun %m bulan');

        $debitur->update([
            'nik' => $data['nik_edit'],
            'nama_debitur' => $data['nama_debitur_edit'],
            'tempat_lahir' => $data['tempat_lahir_edit'],
            'tgl_lahir' => $data['tgl_lahir_edit'],
            'usia' => $usia,
            'jenis_kelamin' => $data['jenis_kelamin_edit'],
            'status_pernikahan' => $data['status_pernikahan_edit'],
            'pendidikan_terakhir' => $data['pendidikan_terakhir_edit'],
            'alamat_ktp' => $data['alamat_ktp_edit'],
            'rt_rw_ktp' => $data['rt_rw_ktp_edit'],
            'kelurahan' => $data['kelurahan_edit'],
            'kecamatan' => $data['kecamatan_edit'],
            'kabupaten' => $data['kabupaten_edit'],
            'nama_ibu' => $data['nama_ibu_edit'],
            'jumlah_tanggungan' => $data['jumlah_tanggungan_edit'],
            'no_telp' => $data['no_telp_edit'],

            'jumlah_anak' => ($data['status_pernikahan_edit'] == 'Belum Menikah')
                ? null : ($data['status_pernikahan_edit'] == 'Duda/Janda' ? $data['jumlah_anak_single_edit'] : $data['jumlah_anak_edit']),

            'alamat_rumah' => $data['alamat_rumah_opsi_edit'] == 'Tidak' ? $data['alamat_rumah_edit'] : $data['alamat_ktp_edit'],
            'rt_rw_rumah' => $data['rt_rw_rumah_opsi_edit'] == 'Tidak' ? $data['rt_rw_rumah_edit'] : $data['rt_rw_ktp_edit'],
            'kode_pos' => $data['kode_pos_edit'],
            'status_tempat_tinggal' => $data['status_tempat_tinggal_edit'],
            'status_kepemilikan' => $data['status_kepemilikan_edit'],
            'tahun_ditempati' => $data['tahun_ditempati_edit'],
            'pekerjaan' => $data['pekerjaan_edit'],

            'bentuk_usaha' => $data['bentuk_usaha_edit'],
            'persen_kepemilikan' => $data['persen_kepemilikan_edit'],
            'jumlah_karyawan' => $data['jumlah_karyawan_edit'],
            'mulai_usaha' => $data['mulai_usaha_edit'],

            'nama_perusahaan' => $data['nama_perusahaan_deb_edit'],
            'bidang_usaha' => $data['bidang_usaha_edit'],
            'grup_usaha' => $data['grup_usaha_edit'],
            'jabatan' => $data['jabatan_edit'],
            'alamat_usaha' => $data['alamat_usaha_edit'],
            'status_tempat_usaha' => $data['status_tempat_usaha_edit'],
            'periode' => $data['periode_edit'],
            'penghasilan_bulanan' => str_replace(['Rp. ', '.'], '', $data['penghasilan_bulanan_edit']),

            // pasangan
            'tgl_pernikahan' =>  $data['status_pernikahan_edit'] == 'Duda/Janda' ||  $data['status_pernikahan_edit'] == 'Belum Menikah' ? null :  $data['tgl_pernikahan_edit'],
            'nik_pasangan' =>  $data['status_pernikahan_edit'] == 'Duda/Janda' || $data['status_pernikahan_edit'] == 'Belum Menikah' ? null : $data['nik_pasangan_edit'],
            'nama_pasangan' =>  $data['status_pernikahan_edit'] == 'Duda/Janda' || $data['status_pernikahan_edit'] == 'Belum Menikah' ? null : $data['nama_pasangan_edit'],
            'tempat_lahir_pasangan' =>  $data['status_pernikahan_edit'] == 'Duda/Janda' || $data['status_pernikahan_edit'] == 'Belum Menikah' ? null : $data['tempat_lahir_pasangan_edit'],
            'tgl_lahir_pasangan' =>  $data['status_pernikahan_edit'] == 'Duda/Janda' || $data['status_pernikahan_edit'] == 'Belum Menikah' ? null : $data['tgl_lahir_pasangan_edit'],
            'pekerjaan_pasangan' =>  $data['status_pernikahan_edit'] == 'Duda/Janda' || $data['status_pernikahan_edit'] == 'Belum Menikah' ? null : $data['pekerjaan_pasangan_edit'],
            'penghasilan_bulanan_pasangan' => ($data['status_pernikahan_edit'] == 'Duda/Janda' || $data['status_pernikahan_edit'] == 'Belum Menikah') ? null
                : (($data['penghasilan_pasangan_edit'] !== null)
                    ? str_replace(['Rp. ', '.'], '', $data['penghasilan_pasangan_edit'])
                    : null),
            'alamat_pasangan' => ($data['status_pernikahan_edit'] == 'Duda/Janda' || $data['status_pernikahan_edit'] == 'Belum Menikah')
                ? null
                : (($data['alamat_pasangan_opsi_edit'] == 'Tinggal Sendiri')
                    ? $data['alamat_pasangan_edit']
                    : $data['alamat_pasangan_opsi_edit']),

            // pernikahan khusus
            'judul_akta' => $data['status_pernikahan_edit'] != 'Pernikahan Khusus' ? null : $data['judul_akta_edit'],
            'no_akta' => $data['status_pernikahan_edit'] != 'Pernikahan Khusus' ? null : $data['no_akta_edit'],
            'tgl_akta' => $data['status_pernikahan_edit'] != 'Pernikahan Khusus' ? null : $data['tgl_akta_edit'],
            'nama_notaris' => $data['status_pernikahan_edit'] != 'Pernikahan Khusus' ? null : $data['nama_notaris_edit'],
            'kedudukan_notaris' => $data['status_pernikahan_edit'] != 'Pernikahan Khusus' ? null : $data['kedudukan_notaris_edit'],

            'updated_at' => now(),
        ]);

        return $debitur;
    }


    public function SwitchDeb($id)
    {
        $debitur = Debitur::find($id);
        $debitur_pasangan = Debitur::find($id);
        $usia = Carbon::createFromDate($debitur->tgl_lahir_pasangan)->diff(Carbon::now())->format('%y tahun %m bulan'); //hitung usia

        // pasangan to debitur
        $debitur->nik = $debitur->nik_pasangan;
        $debitur->nama_debitur = $debitur->nama_pasangan;
        $debitur->tempat_lahir = $debitur->tempat_lahir_pasangan;
        $debitur->tgl_lahir = $debitur->tgl_lahir_pasangan;
        $debitur->usia = $usia;
        if ($debitur->jenis_kelamin == "Perempuan") {
            $debitur->jenis_kelamin = "Laki-Laki";
        } else {
            $debitur->jenis_kelamin = "Perempuan";
        }
        $debitur->pekerjaan = $debitur->pekerjaan_pasangan;
        $debitur->penghasilan_bulanan = $debitur->penghasilan_bulanan_pasangan;
        $debitur->pendidikan_terakhir = null;
        $debitur->nama_ibu = null;
        $debitur->nama_perusahaan = null;
        $debitur->bidang_usaha = null;
        $debitur->jabatan = null;
        $debitur->alamat_usaha = null;
        $debitur->status_tempat_usaha = null;
        $debitur->periode = null;
        // debitur to pasangan
        $debitur->nik_pasangan = $debitur_pasangan->nik;
        $debitur->nama_pasangan = $debitur_pasangan->nama_debitur;
        $debitur->tempat_lahir_pasangan = $debitur_pasangan->tempat_lahir;
        $debitur->tgl_lahir_pasangan = $debitur_pasangan->tgl_lahir;
        $debitur->pekerjaan_pasangan = $debitur_pasangan->pekerjaan;
        $debitur->penghasilan_bulanan_pasangan = $debitur_pasangan->penghasilan_bulanan;
        $debitur->alamat_pasangan = null;
        $debitur->updated_at = now();
        $debitur->save();


        // Log Aktivitas
        LogActivity::AddLog("(switch) Data Debitur | No SPK: {$debitur->kredit->no_spk} | Nama: {$debitur->nama_debitur}");

        return $debitur;
    }
}
