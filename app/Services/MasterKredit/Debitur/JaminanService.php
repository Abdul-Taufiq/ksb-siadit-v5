<?php

namespace App\Services\MasterKredit\Debitur;

use App\Models\Cabang;
use App\Models\MasterAgunan\JamDeposito;
use App\Models\MasterAgunan\JamKenda;
use App\Models\MasterAgunan\JamTanah;
use App\Models\MasterKredit\Kredit;
use App\Models\MasterKredit\PikarEks;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class JaminanService
{
    public function createJaminan(array $data)
    {
        $id_cabang = Auth::user()->id_cabang;
        $nama_ao = Auth::user()->nama;
        $id_kredit = base64_decode($data['id_kredit']);

        $kredit = Kredit::where('id_kredit', $id_kredit)->update([
            'jns_pinjaman' => $data['jns_pinjaman']
        ]);

        // PIkar
        if ($data['jns_pinjaman'] == 'PIKAR (Eksternal)') {
            $pikar = new PikarEks();
            $pikar->id_kredit = $id_kredit;
            $pikar->nama_perusahaan = $data['nama_perusahaan'];
            $pikar->no_perjanjian = $data['no_perjanjian'];
            $pikar->tgl_perjanjian = $data['tgl_perjanjian'];
            $pikar->nama_bpjs = $data['nama_bpjs'];
            $pikar->no_bpjs = $data['no_bpjs'];
            $pikar->save();
        }


        // add jaminan
        if ($data['kategori_jaminan_opsi'] == 'Menggunakan Jaminan') {
            for ($i = 1; $i < 100; $i++) {
                // cek ada jaminan ga
                if (isset($data['kategori_jaminan_' . $i]) && $data['kategori_jaminan_' . $i] != null) {
                    // kondisi jaminan nya apa
                    switch ($data['kategori_jaminan_' . $i]) {
                        case 'Tanah/Bangunan':
                            // kondisi null atau ga
                            if (isset($data['type_sertifikat_' . $i]) && $data['type_sertifikat_' . $i] != null) {
                                $tanah = new JamTanah();
                                $tanah->id_kredit = $id_kredit;
                                $tanah->type_sertifikat = $data['type_sertifikat_' . $i];
                                $tanah->alih_media = $data['alih_media_' . $i];
                                $tanah->jns_jaminan = $data['jns_jaminan_opsi_' . $i] == 'Lainnya' ? $data['jns_jaminan_' . $i] : $data['jns_jaminan_opsi_' . $i];
                                $tanah->no_shm_shgb = $data['no_shm_shgb_' . $i];
                                $tanah->atas_nama = $data['atas_nama_' . $i];
                                $tanah->save();
                            }
                            break;

                        case 'Kendaraan':
                            // kondisi null atau ga
                            if (isset($data['jns_kendaraan_' . $i]) && $data['jns_kendaraan_' . $i] != null) {
                                $kenda = new JamKenda();
                                $kenda->id_kredit = $id_kredit;
                                $kenda->jns_jaminan = 'Fidusia';
                                $kenda->jns_kendaraan = $data['jns_kendaraan_' . $i];
                                $kenda->atas_nama = $data['atas_nama_kendaraan_' . $i];
                                $kenda->no_bpkb = $data['no_bpkb_' . $i];
                                $kenda->tgl_bpkb = $data['tgl_bpkb_' . $i];
                                $kenda->merk = $data['merk_' . $i];
                                $kenda->nopol = $data['nopol_' . $i];
                                $kenda->save();
                            }
                            break;

                        case 'Deposito':
                            // kondisi null atau ga
                            if (isset($data['jns_jaminan_deposito_' . $i]) && $data['jns_jaminan_deposito_' . $i] != null) {
                                $deposito = new JamDeposito();
                                $deposito->id_kredit = $id_kredit;
                                $deposito->jns_jaminan = $data['jns_jaminan_deposito_' . $i];
                                $deposito->no_rek = $data['no_rek_' . $i];
                                $deposito->atas_nama = $data['atas_nama_deposito_' . $i];
                                $deposito->nominal = $data['nominal_' . $i] != null ? str_replace(['Rp. ', '.'], '', $data['nominal_' . $i]) : null;
                                $deposito->save();
                            }
                            break;

                        default:
                            # code...
                            break;
                    }
                }
            }
        }

        return $kredit;
    }


    public function updateJaminan(array $data, $kredit)
    {
        $jabatan = Auth::user()->jabatan;
        // update Kredit
        if ($kredit->jns_pinjaman != $data['jns_pinjaman']) {
            $kredit->update([
                'jns_pinjaman' => $data['jns_pinjaman']
            ]);
        }


        // cek Pikar Eksternal atau bukan
        if ($data['jns_pinjaman'] == 'PIKAR (Eksternal)') {
            // cek ada data atau ga
            $pikareks = PikarEks::where('id_kredit', $kredit->id_kredit)->first();
            // jika ada update jika nggak tambahkan
            if ($pikareks != null) {
                $pikareks->nama_perusahaan = $data['nama_perusahaan'];
                $pikareks->no_perjanjian = $data['no_perjanjian'];
                $pikareks->tgl_perjanjian = $data['tgl_perjanjian'];
                $pikareks->nama_bpjs = $data['nama_bpjs'];
                $pikareks->no_bpjs = $data['no_bpjs'];
            } else {
                $pikar = new PikarEks();
                $pikar->id_kredit = $kredit->id_kredit;
                $pikar->nama_perusahaan = $data['nama_perusahaan'];
                $pikar->no_perjanjian = $data['no_perjanjian'];
                $pikar->tgl_perjanjian = $data['tgl_perjanjian'];
                $pikar->nama_bpjs = $data['nama_bpjs'];
                $pikar->no_bpjs = $data['no_bpjs'];
                $pikar->save();
            }
        } else {
            PikarEks::where('id_kredit', $kredit->id_kredit)->delete();
        }


        // cek kategori jaminan Menggunakan Jaminan Atau Tidak
        if ($data['kategori_jaminan_opsi'] == "Menggunakan Jaminan") {
            // cek jaminannya
            for ($i = 1; $i < 100; $i++) {
                if (isset($data['kategori_jaminan_' . $i]) && $data['kategori_jaminan_' . $i] != null) {
                    switch ($data['kategori_jaminan_' . $i]) {
                        case 'Tanah/Bangunan':
                            // kondisi null/id ada atau ga
                            if (isset($data['id_tanah_' . $i]) && $data['id_tanah_' . $i] != null) {
                                $tanah = JamTanah::find(base64_decode($data['id_tanah_' . $i]));
                                // kondisi hapus apa edit
                                if ($data['aksi_jaminan_tanah_' . $i] == 'Edit') {
                                    $tanah->id_kredit = $kredit->id_kredit;
                                    $tanah->type_sertifikat = $data['type_sertifikat_' . $i];
                                    $tanah->alih_media = $data['alih_media_' . $i];
                                    $tanah->jns_jaminan = $data['jns_jaminan_opsi_' . $i] == 'Lainnya' ? $data['jns_jaminan_' . $i] : $data['jns_jaminan_opsi_' . $i];
                                    $tanah->no_shm_shgb = $data['no_shm_shgb_' . $i];
                                    $tanah->atas_nama = $data['atas_nama_' . $i];

                                    if ($jabatan == 'Analis Cabang') {
                                        if ($data['type_sertifikat_' . $i] == 'Sertifikat-El') {
                                            $tanah->tgl_sertifikat = null;
                                            $tanah->tgl_surat_ukur = null;
                                            $tanah->no_surat_ukur = null;
                                        } else {
                                            $tanah->tgl_sertifikat = $data['tgl_sertifikat_' . $i];
                                            $tanah->tgl_surat_ukur = $data['tgl_surat_ukur_' . $i];
                                            $tanah->no_surat_ukur = $data['no_surat_ukur_' . $i];
                                        }

                                        $tanah->luas = $data['luas_' . $i];
                                        $tanah->desa = $data['desa_' . $i];
                                        $tanah->kecamatan = $data['kecamatan_' . $i];
                                        $tanah->kabupaten = $data['kabupaten_' . $i];
                                        $tanah->provinsi = $data['provinsi_' . $i];
                                        $tanah->keterangan = $data['keterangan_' . $i];
                                        $tanah->detail_kategori_jaminan = $data['detail_kategori_jaminan_' . $i];
                                    }

                                    $tanah->save();
                                }
                                // hapus
                                else {
                                    $tanah->delete();
                                }
                            }
                            // tambah baru
                            else {
                                // cek ada inputnya ga
                                if (isset($data['type_sertifikat_' . $i]) && $data['type_sertifikat_' . $i] != null) {
                                    $tanah = new JamTanah();
                                    $tanah->id_kredit = $kredit->id_kredit;
                                    $tanah->type_sertifikat = $data['type_sertifikat_' . $i];
                                    $tanah->alih_media = $data['alih_media_' . $i];
                                    $tanah->jns_jaminan = $data['jns_jaminan_opsi_' . $i] == 'Lainnya' ? $data['jns_jaminan_' . $i] : $data['jns_jaminan_opsi_' . $i];
                                    $tanah->no_shm_shgb = $data['no_shm_shgb_' . $i];
                                    $tanah->atas_nama = $data['atas_nama_' . $i];

                                    if ($jabatan == 'Analis Cabang') {
                                        if ($data['type_sertifikat_' . $i] == 'Sertifikat-El') {
                                            $tanah->tgl_sertifikat = null;
                                            $tanah->tgl_surat_ukur = null;
                                            $tanah->no_surat_ukur = null;
                                        } else {
                                            $tanah->tgl_sertifikat = $data['tgl_sertifikat_' . $i];
                                            $tanah->tgl_surat_ukur = $data['tgl_surat_ukur_' . $i];
                                            $tanah->no_surat_ukur = $data['no_surat_ukur_' . $i];
                                        }

                                        $tanah->luas = $data['luas_' . $i];
                                        $tanah->desa = $data['desa_' . $i];
                                        $tanah->kecamatan = $data['kecamatan_' . $i];
                                        $tanah->kabupaten = $data['kabupaten_' . $i];
                                        $tanah->provinsi = $data['provinsi_' . $i];
                                        $tanah->keterangan = $data['keterangan_' . $i];
                                        $tanah->detail_kategori_jaminan = $data['detail_kategori_jaminan_' . $i];
                                    }

                                    $tanah->save();
                                }
                            }
                            break;

                        case 'Kendaraan':
                            // kondisi null/id ada atau ga
                            if (isset($data['id_kenda_' . $i]) && $data['id_kenda_' . $i] != null) {
                                $kenda = JamKenda::find(base64_decode($data['id_kenda_' . $i]));
                                // kondisi edit/hapus
                                if ($data['aksi_jaminan_kenda_' . $i] == 'Edit') {
                                    $kenda->id_kredit = $kredit->id_kredit;
                                    $kenda->jns_jaminan = 'Fidusia';
                                    $kenda->jns_kendaraan = $data['jns_kendaraan_' . $i];
                                    $kenda->atas_nama = $data['atas_nama_kendaraan_' . $i];
                                    $kenda->no_bpkb = $data['no_bpkb_' . $i];
                                    $kenda->tgl_bpkb = $data['tgl_bpkb_' . $i];
                                    $kenda->merk = $data['merk_' . $i];
                                    $kenda->nopol = $data['nopol_' . $i];

                                    if ($jabatan == 'Analis Cabang') {
                                        $kenda->type = $data['type_' . $i];
                                        $kenda->warna = $data['warna_' . $i];
                                        $kenda->no_rangka = $data['no_rangka_' . $i];
                                        $kenda->no_mesin = $data['no_mesin_' . $i];
                                        $kenda->thn_pembuatan = $data['thn_pembuatan_' . $i];
                                        $kenda->nama_pemilik_sebelumnya = $data['nama_pemilik_sebelumnya_' . $i];
                                        $kenda->alamat_pemilik_sebelumnya = $data['alamat_pemilik_sebelumnya_' . $i];
                                        $kenda->thn_pembelian = $data['thn_pembelian_' . $i];
                                        $kenda->harga_pembelian =  str_replace(['Rp. ', '.'], '', $data['harga_pembelian_' . $i]);
                                    }

                                    $kenda->save();
                                } else {
                                    $kenda->delete();
                                }
                            }
                            // tambah
                            else {
                                // cek ada inputnya ga
                                if (isset($data['jns_kendaraan_' . $i]) && $data['jns_kendaraan_' . $i] != null) {
                                    $kenda = new JamKenda();
                                    $kenda->id_kredit = $kredit->id_kredit;
                                    $kenda->jns_jaminan = 'Fidusia';
                                    $kenda->jns_kendaraan = $data['jns_kendaraan_' . $i];
                                    $kenda->atas_nama = $data['atas_nama_kendaraan_' . $i];
                                    $kenda->no_bpkb = $data['no_bpkb_' . $i];
                                    $kenda->tgl_bpkb = $data['tgl_bpkb_' . $i];
                                    $kenda->merk = $data['merk_' . $i];
                                    $kenda->nopol = $data['nopol_' . $i];

                                    if ($jabatan == 'Analis Cabang') {
                                        $kenda->type = $data['type_' . $i];
                                        $kenda->warna = $data['warna_' . $i];
                                        $kenda->no_rangka = $data['no_rangka_' . $i];
                                        $kenda->no_mesin = $data['no_mesin_' . $i];
                                        $kenda->thn_pembuatan = $data['thn_pembuatan_' . $i];
                                        $kenda->nopol = $data['nopol_' . $i];
                                        $kenda->nama_pemilik_sebelumnya = $data['nama_pemilik_sebelumnya_' . $i];
                                        $kenda->alamat_pemilik_sebelumnya = $data['alamat_pemilik_sebelumnya_' . $i];
                                        $kenda->thn_pembelian = $data['thn_pembelian_' . $i];
                                        $kenda->harga_pembelian =  str_replace(['Rp. ', '.'], '', $data['harga_pembelian_' . $i]);
                                    }

                                    $kenda->save();
                                }
                            }
                            break;

                        case 'Deposito':
                            // kondisi null/id ada atau ga
                            if (isset($data['id_depo_' . $i]) && $data['id_depo_' . $i] != null) {
                                $deposito = JamDeposito::find(base64_decode($data['id_depo_' . $i]));
                                if ($data['aksi_jaminan_depo_' . $i] == 'Edit') {
                                    $deposito->id_kredit = $kredit->id_kredit;
                                    $deposito->jns_jaminan = $data['jns_jaminan_deposito_' . $i];
                                    $deposito->no_rek = $data['no_rek_' . $i];
                                    $deposito->atas_nama = $data['atas_nama_deposito_' . $i];
                                    $deposito->nominal = $data['nominal_' . $i] != null ? str_replace(['Rp. ', '.'], '', $data['nominal_' . $i]) : null;
                                    $deposito->save();
                                } else {
                                    $deposito->delete();
                                }
                            } else {
                                // cek ada inputnya ga
                                if (isset($data['jns_jaminan_deposito_' . $i]) && $data['jns_jaminan_deposito_' . $i] != null) {
                                    $deposito = new JamDeposito();
                                    $deposito->id_kredit = $kredit->id_kredit;
                                    $deposito->jns_jaminan = $data['jns_jaminan_deposito_' . $i];
                                    $deposito->no_rek = $data['no_rek_' . $i];
                                    $deposito->atas_nama = $data['atas_nama_deposito_' . $i];
                                    $deposito->nominal = $data['nominal_' . $i] != null ? str_replace(['Rp. ', '.'], '', $data['nominal_' . $i]) : null;
                                    $deposito->save();
                                }
                            }
                            break;

                        default:
                            # code...
                            break;
                    }
                }
            }
        }
        // jika kategori jaminan diubah jadi non jaminan
        else {
            JamTanah::where('id_kredit', $kredit->id_kredit)->delete();
            JamKenda::where('id_kredit', $kredit->id_kredit)->delete();
            JamDeposito::where('id_kredit', $kredit->id_kredit)->delete();
        }


        return $kredit;
    }
}
