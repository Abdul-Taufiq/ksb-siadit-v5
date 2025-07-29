<?php

namespace App\Services\MasterKredit\Debitur;

use App\Models\Cabang;
use App\Models\MasterKredit\Kredit;
use App\Models\MasterKredit\Penjamin;
use App\Models\Output\TrackingSPK;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class SPKService
{
    public function createSPK(array $data)
    {
        $id_cabang = Auth::user()->id_cabang;
        $nama_ao = Auth::user()->nama;
        $id_debitur = base64_decode($data['id_debitur']);

        // add kredit (spk)
        if ($data['tujuan_pengajuan'] != "") {
            // Ambil nama bulan dalam bentuk romawi
            $bulanRom = now()->format('m');
            switch ($bulanRom) {
                case 1:
                    $bulanRom = "I";
                    break;
                case 2:
                    $bulanRom = "II";
                    break;
                case 3:
                    $bulanRom = "III";
                    break;
                case 4:
                    $bulanRom = "IV";
                    break;
                case 5:
                    $bulanRom = "V";
                    break;
                case 6:
                    $bulanRom = "VI";
                    break;
                case 7:
                    $bulanRom = "VII";
                    break;
                case 8:
                    $bulanRom = "VIII";
                    break;
                case 9:
                    $bulanRom = "IX";
                    break;
                case 10:
                    $bulanRom = "X";
                    break;
                case 11:
                    $bulanRom = "XI";
                    break;
                case 12:
                    $bulanRom = "XII";
            }

            $cabang_search = Cabang::where('id_cabang', $id_cabang)->first();
            $cabang = $cabang_search->kode_spk;
            $now = Carbon::now();
            $thn = $now->year;

            // cek addendum atau spk biasa 
            // No SPK
            if ($data['kategori_spk'] == 'Restruck') {
                # code...
                $ambil = Kredit::where('no_spk', 'LIKE', "%/KSB.$cabang/SPK-KRD/R/%")
                    ->orderBy('created_at', 'desc')
                    ->take(1)
                    ->get();
                if ($ambil->isEmpty()) {
                    $urut = "001";
                    $nomer = $urut . '/KSB.' . $cabang . '/SPK-KRD/R/' . $bulanRom . '/' . $thn;
                } else {
                    foreach ($ambil as $item) {
                        $cekTahun = substr($item->no_spk, -4, 4);
                        if ($cekTahun != $thn) {
                            $urut = "001";
                            $nomer = $urut . '/KSB.' . $cabang . '/SPK-KRD/R/' . $bulanRom . '/' . $thn;
                        } else {
                            $urut = substr($item->no_spk, 0, 3);
                            $urut = (int)$urut + 1;
                            $urut = str_pad($urut, 3, '0', STR_PAD_LEFT); // Menggunakan str_pad untuk menambahkan nol di depan
                            $nomer = $urut . '/KSB.' . $cabang . '/SPK-KRD/R/' . $bulanRom . '/' . $thn;
                        }
                    }
                }
            } elseif ($data['kategori_spk'] == 'NonRestruck') {
                # code...
                $ambil = Kredit::where('no_spk', 'LIKE', "%/KSB.$cabang/SPK-KRD/NR/%")
                    ->orderBy('created_at', 'desc')
                    ->take(1)
                    ->get();
                if ($ambil->isEmpty()) {
                    $urut = "001";
                    $nomer = $urut . '/KSB.' . $cabang . '/SPK-KRD/NR/' . $bulanRom . '/' . $thn;
                } else {
                    foreach ($ambil as $item) {
                        $cekTahun = substr($item->no_spk, -4, 4);
                        if ($cekTahun != $thn) {
                            $urut = "001";
                            $nomer = $urut . '/KSB.' . $cabang . '/SPK-KRD/NR/' . $bulanRom . '/' . $thn;
                        } else {
                            $urut = substr($item->no_spk, 0, 3);
                            $urut = (int)$urut + 1;
                            $urut = str_pad($urut, 3, '0', STR_PAD_LEFT); // Menggunakan str_pad untuk menambahkan nol di depan
                            $nomer = $urut . '/KSB.' . $cabang . '/SPK-KRD/NR/' . $bulanRom . '/' . $thn;
                        }
                    }
                }
            } else {
                $ambil = Kredit::where('kategori_spk', 'SPK')
                    ->where('no_spk', 'LIKE', "%/KSB.$cabang/SPK-KRD/%")
                    ->orderBy('created_at', 'desc')
                    ->take(1)
                    ->get();
                if ($ambil->isEmpty()) {
                    $urut = "001";
                    $nomer = $urut . '/KSB.' . $cabang . '/SPK-KRD/' . $bulanRom . '/' . $thn;
                } else {
                    foreach ($ambil as $item) {
                        $cekTahun = substr($item->no_spk, -4, 4);
                        if ($cekTahun != $thn) {
                            $urut = "001";
                            $nomer = $urut . '/KSB.' . $cabang . '/SPK-KRD/' . $bulanRom . '/' . $thn;
                        } else {
                            $urut = substr($item->no_spk, 0, 3);
                            $urut = (int)$urut + 1;
                            $urut = str_pad($urut, 3, '0', STR_PAD_LEFT); // Menggunakan str_pad untuk menambahkan nol di depan
                            $nomer = $urut . '/KSB.' . $cabang . '/SPK-KRD/' . $bulanRom . '/' . $thn;
                        }
                    }
                }
            }

            // addendum lainya
            if ($data['kategori_spk'] == 'SPK') {
                $jenisnya = '-';
                $detailnya = '-';
            } elseif ($data['kategori_spk'] == 'Restruck') {
                if ($data['detail_kategori_spk'] == 'Reschedulling') {
                    $jenisnya = 'Reschedulling';
                    $detailnya = 'perubahan jangka waktu dan perubahan suku bunga';
                } elseif ($data['detail_kategori_spk'] == 'Recondition') {
                    $jenisnya = 'Recondition';
                    $detailnya = 'perubahan plafond pinjaman, perubahan jangka waktu, perubahan suku bunga dan perubahan angsuran';
                } elseif ($data['detail_kategori_spk'] == 'Restructuring') {
                    $jenisnya = 'Restructuring';
                    $detailnya = 'perubahan plafond pinjaman, perubahan jangka waktu, perubahan suku bunga, perubahan angsuran dan perubahan jenis kredit';
                } else {
                    $jenisnya = 'Perubahan Jenis Kredit';
                    $detailnya = 'Perubahan Jenis Kredit';
                }
            } else {
                $jenisnya = $data['detail_kategori_spk_non'];
                $detailnya = $data['detail_kategori_spk_non'];
            }


            $kredit = new Kredit();
            $kredit->id_debitur = $id_debitur;
            $kredit->id_cabang = $id_cabang;
            $kredit->no_spk = $nomer;
            $kredit->kategori_spk = $data['kategori_spk'];
            $kredit->jns_kategori_spk = $jenisnya;
            $kredit->detail_kategori_spk = $detailnya;
            $kredit->tgl_pengajuan = now();
            $kredit->tujuan_pengajuan = $data['tujuan_pengajuan'];
            $kredit->alasan_tujuan = $data['alasan_tujuan'];
            $kredit->jumlah_pengajuan = str_replace(['Rp. ', '.'], '', $data['jumlah_pengajuan']);
            $kredit->jkw_pengajuan = $data['jkw_pengajuan'];
            $kredit->sumber_pembayaran = $data['sumber_pembayaran'];
            if ($data['asal_kredit'] == "Referal") {
                $kredit->petugas_referal = $data['petugas_referal'];
                $kredit->asal_kredit = $data['asal_kredit'];
            } else {
                $kredit->asal_kredit = $data['asal_kredit'];
                $kredit->petugas_referal = "-";
            }
            $kredit->status_kredit = "Baru Ditambahkan";
            $kredit->status_akhir = "PROSES";
            $kredit->petugas_penerima = $nama_ao;
            $kredit->kategori_spk = $data['kategori_spk'];
            $kredit->save();
        }


        // add penjamin
        if ($data['pemilik_jaminan_opsi'] == "Penjamin") {
            for ($i = 1; $i < 100; $i++) {
                if (isset($data['nik_' . $i]) && $data['nik_' . $i] != null) {
                    $penjamin = new Penjamin();
                    $penjamin->id_kredit = $kredit->id_kredit;
                    $penjamin->id_debitur = $id_debitur;
                    $penjamin->nik = $data['nik_' . $i];
                    $penjamin->nama_penjamin = $data['nama_' . $i];
                    $penjamin->tempat_lahir = $data['tempat_lahir_' . $i];
                    $penjamin->tgl_lahir = $data['tgl_lahir_' . $i];
                    $penjamin->jenis_kelamin = $data['jenis_kelamin_' . $i];
                    $penjamin->alamat = $data['alamat_' . $i];
                    $penjamin->status_pernikahan = $data['status_pernikahan_' . $i];

                    if ($data['status_pernikahan_' . $i] == "Menikah" || $data['status_pernikahan_' . $i] == "Pernikahan Khusus") {
                        $penjamin->nik_pasangan = $data['nik_pasangan_' . $i];
                        $penjamin->nama_pasangan = $data['nama_pasangan_' . $i];
                        $penjamin->tempat_lahir_pasangan = $data['tempat_lahir_pasangan_' . $i];
                        $penjamin->tgl_lahir_pasangan = $data['tgl_lahir_pasangan_' . $i];

                        if (isset($data['alamat_pasangan_opsi' . $i]) && $data['alamat_pasangan_opsi' . $i] == 'Tinggal Sendiri') {
                            $penjamin->alamat_pasangan = $data['alamat_pasangan_' . $i];
                        } else {
                            $penjamin->alamat_pasangan = $data['alamat_pasangan_opsi_' . $i];
                        }
                    }

                    if ($data['status_pernikahan_' . $i] == "Pernikahan Khusus") {
                        $penjamin->judul_akta = $data['judul_akta_' . $i];
                        $penjamin->no_akta = $data['no_akta_' . $i];
                        $penjamin->tgl_akta = $data['tgl_akta_' . $i];
                        $penjamin->nama_notaris = $data['nama_notaris_' . $i];
                        $penjamin->kedudukan_notaris = $data['kedudukan_notaris_' . $i];
                    }

                    $penjamin->save();
                }
            }
        }

        return $kredit;
    }


    public function updateSPK(array $data, $spk)
    {
        // addendum lainya
        if ($data['kategori_spk_edit'] == 'SPK') {
            $jenisnya = '-';
            $detailnya = '-';
        } elseif ($data['kategori_spk_edit'] == 'Restruck') {
            if ($data['detail_kategori_spk_edit'] == 'Reschedulling') {
                $jenisnya = 'Reschedulling';
                $detailnya = 'perubahan jangka waktu dan perubahan suku bunga';
            } elseif ($data['detail_kategori_spk_edit'] == 'Recondition') {
                $jenisnya = 'Recondition';
                $detailnya = 'perubahan plafond pinjaman, perubahan jangka waktu, perubahan suku bunga dan perubahan angsuran';
            } elseif ($data['detail_kategori_spk_edit'] == 'Restructuring') {
                $jenisnya = 'Restructuring';
                $detailnya = 'perubahan plafond pinjaman, perubahan jangka waktu, perubahan suku bunga, perubahan angsuran dan perubahan jenis kredit';
            } else {
                $jenisnya = 'Perubahan Jenis Kredit';
                $detailnya = 'Perubahan Jenis Kredit';
            }
        } else {
            $jenisnya = $data['detail_kategori_spk_non_edit'];
            $detailnya = $data['detail_kategori_spk_non_edit'];
        }

        if ($data['tujuan_pengajuan_edit'] != "") {
            $spk->kategori_spk = $data['kategori_spk_edit'];
            $spk->jns_kategori_spk = $jenisnya;
            $spk->detail_kategori_spk = $detailnya;
            $spk->tgl_pengajuan = now();
            $spk->tujuan_pengajuan = $data['tujuan_pengajuan_edit'];
            $spk->alasan_tujuan = $data['alasan_tujuan_edit'];
            $spk->jumlah_pengajuan = str_replace(['Rp. ', '.'], '', $data['jumlah_pengajuan_edit']);
            $spk->jkw_pengajuan = $data['jkw_pengajuan_edit'];
            $spk->sumber_pembayaran = $data['sumber_pembayaran_edit'];
            if ($data['asal_kredit_edit'] == "Referal") {
                $spk->petugas_referal = $data['petugas_referal_edit'];
                $spk->asal_kredit = $data['asal_kredit_edit'];
            } else {
                $spk->asal_kredit = $data['asal_kredit_edit'];
                $spk->petugas_referal = "-";
            }
            $spk->status_kredit = "Baru Ditambahkan";
            $spk->status_akhir = "PROSES";
            $spk->kategori_spk = $data['kategori_spk_edit'];
            $spk->save();
        }


        // edit penjamin
        if ($data['pemilik_jaminan_opsi_edit'] == "Penjamin") {
            for ($i = 1; $i < 100; $i++) {
                if (isset($data['id_penjamin_' . $i]) && $data['id_penjamin_' . $i] != null) {
                    // decrypt id
                    $penjamin_id = base64_decode($data['id_penjamin_' . $i]);
                    // cek ada penjamin kaga
                    $penjamin = Penjamin::find($penjamin_id);

                    // cek Edit/Hapus
                    if (isset($data['aksi_penjamin_' . $i]) && $data['aksi_penjamin_' . $i] == 'Edit') {
                        if (isset($data['nik_' . $i]) && $data['nik_' . $i] != null) {
                            $penjamin->nik = $data['nik_' . $i];
                            $penjamin->nama_penjamin = $data['nama_' . $i];
                            $penjamin->tempat_lahir = $data['tempat_lahir_' . $i];
                            $penjamin->tgl_lahir = $data['tgl_lahir_' . $i];
                            $penjamin->jenis_kelamin = $data['jenis_kelamin_' . $i];
                            $penjamin->alamat = $data['alamat_' . $i];
                            $penjamin->status_pernikahan = $data['status_pernikahan_' . $i];

                            if ($data['status_pernikahan_' . $i] == "Menikah" || $data['status_pernikahan_' . $i] == "Pernikahan Khusus") {
                                $penjamin->nik_pasangan = $data['nik_pasangan_' . $i];
                                $penjamin->nama_pasangan = $data['nama_pasangan_' . $i];
                                $penjamin->tempat_lahir_pasangan = $data['tempat_lahir_pasangan_' . $i];
                                $penjamin->tgl_lahir_pasangan = $data['tgl_lahir_pasangan_' . $i];

                                if (isset($data['alamat_pasangan_opsi' . $i]) && $data['alamat_pasangan_opsi' . $i] == 'Tinggal Sendiri') {
                                    $penjamin->alamat_pasangan = $data['alamat_pasangan_' . $i];
                                } else {
                                    $penjamin->alamat_pasangan = $data['alamat_pasangan_opsi_' . $i];
                                }
                            } else {
                                $penjamin->nik_pasangan = null;
                                $penjamin->nama_pasangan = null;
                                $penjamin->tempat_lahir_pasangan = null;
                                $penjamin->tgl_lahir_pasangan = null;
                                $penjamin->alamat_pasangan = null;
                            }

                            if ($data['status_pernikahan_' . $i] == "Pernikahan Khusus") {
                                $penjamin->judul_akta = $data['judul_akta_' . $i];
                                $penjamin->no_akta = $data['no_akta_' . $i];
                                $penjamin->tgl_akta = $data['tgl_akta_' . $i];
                                $penjamin->nama_notaris = $data['nama_notaris_' . $i];
                                $penjamin->kedudukan_notaris = $data['kedudukan_notaris_' . $i];
                            } else {
                                $penjamin->judul_akta = null;
                                $penjamin->no_akta = null;
                                $penjamin->tgl_akta = null;
                                $penjamin->nama_notaris = null;
                                $penjamin->kedudukan_notaris = null;
                            }

                            $penjamin->save();
                        }
                    }
                    // hapus 
                    elseif (isset($data['aksi_penjamin_' . $i]) && $data['aksi_penjamin_' . $i] == 'Hapus') {
                        $penjamin->delete();
                    }
                }
                // jika tidak ada data penjamin 
                else {
                    if (isset($data['nik_' . $i]) && $data['nik_' . $i] != null) {
                        $penjamin = new Penjamin();
                        $penjamin->id_kredit = $spk->id_kredit;
                        $penjamin->id_debitur = $spk->debitur->id_debitur;
                        $penjamin->nik = $data['nik_' . $i];
                        $penjamin->nama_penjamin = $data['nama_' . $i];
                        $penjamin->tempat_lahir = $data['tempat_lahir_' . $i];
                        $penjamin->tgl_lahir = $data['tgl_lahir_' . $i];
                        $penjamin->jenis_kelamin = $data['jenis_kelamin_' . $i];
                        $penjamin->alamat = $data['alamat_' . $i];
                        $penjamin->status_pernikahan = $data['status_pernikahan_' . $i];

                        if ($data['status_pernikahan_' . $i] == "Menikah" || $data['status_pernikahan_' . $i] == "Pernikahan Khusus") {
                            $penjamin->nik_pasangan = $data['nik_pasangan_' . $i];
                            $penjamin->nama_pasangan = $data['nama_pasangan_' . $i];
                            $penjamin->tempat_lahir_pasangan = $data['tempat_lahir_pasangan_' . $i];
                            $penjamin->tgl_lahir_pasangan = $data['tgl_lahir_pasangan_' . $i];

                            if (isset($data['alamat_pasangan_opsi' . $i]) && $data['alamat_pasangan_opsi' . $i] == 'Tinggal Sendiri') {
                                $penjamin->alamat_pasangan = $data['alamat_pasangan_' . $i];
                            } else {
                                $penjamin->alamat_pasangan = $data['alamat_pasangan_opsi_' . $i];
                            }
                        }

                        if ($data['status_pernikahan_' . $i] == "Pernikahan Khusus") {
                            $penjamin->judul_akta = $data['judul_akta_' . $i];
                            $penjamin->no_akta = $data['no_akta_' . $i];
                            $penjamin->tgl_akta = $data['tgl_akta_' . $i];
                            $penjamin->nama_notaris = $data['nama_notaris_' . $i];
                            $penjamin->kedudukan_notaris = $data['kedudukan_notaris_' . $i];
                        }

                        $penjamin->save();
                    }
                }
            }
        } else {
            $penjamin = Penjamin::where('id_kredit', $spk->id_kredit)->get();
            if ($penjamin->IsNotEmpty()) {
                $penjamin->each(function ($item) {
                    $item->delete();
                });
            }
        }

        return $spk;
    }
}
