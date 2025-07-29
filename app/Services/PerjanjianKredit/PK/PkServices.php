<?php

namespace App\Services\PerjanjianKredit\PK;

use App\Models\MasterAgunan\JamDeposito;
use App\Models\MasterAgunan\JamKenda;
use App\Models\MasterAgunan\JamTanah;
use App\Models\MasterKredit\Kredit;
use App\Models\MasterKredit\Penjamin;
use App\Models\MasterKredit\Persetujuan;
use App\Models\MasterPKPMK\PkPmk;
use App\Models\MasterPKPMK\PkPmkAddendum;
use App\Models\Output\LogActivity;
use App\Models\Output\TrackingSPK;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Barryvdh\DomPDF\Facade\Pdf;

class PkServices
{
    public function index($data)
    {
        $id_cabang = Auth::user()->id_cabang;
        $jabatan = Auth::user()->jabatan;
        $nama     = Auth::user()->nama;

        $query = PkPmk::with(['kredit', 'debitur'])
            // ->when($data['id_cabang'] != 99, function ($q) use ($data) {
            //     $q->where('tb_pkpmk.id_cabang', $data['id_cabang']);
            // })
            ->where(function ($q) use ($data) {
                $q->search($data['search'])
                    ->orWhereHas('kredit', function ($sub) use ($data) {
                        $sub->where('no_spk', 'like', "%{$data['search']}%");
                    })
                    ->orWhereHas('debitur', function ($sub) use ($data) {
                        $sub->where('nama_debitur', 'like', "%{$data['search']}%");
                    })
                    ->orWhereHas('cabang', function ($sub) use ($data) {
                        $sub->where('cabang', 'like', "%{$data['search']}%");
                    });
            })
            ->when($data['tgl_awal'] && $data['tgl_akhir'], function ($q) use ($data) {
                $awal = Carbon::parse($data['tgl_awal'])->startOfDay();
                $akhir = Carbon::parse($data['tgl_akhir'])->endOfDay();
                $q->whereBetween('tgl_pkpmk', [$awal, $akhir]);
            });

        // for area 
        if ($id_cabang == 20) {
            if (!empty($data['id_cabang'])) {
                if ($data['id_cabang'] == 'AREA 1' || $data['id_cabang'] == 'AREA 2' || $data['id_cabang'] == 'AREA 3') {
                    $query->whereIn('tb_pkpmk.id_cabang', $data['id_cab_area']);
                } else {
                    $query->where('tb_pkpmk.id_cabang', $data['id_cabang']);
                }
            } else {
                $query->whereIn('tb_pkpmk.id_cabang', $data['id_cab_area']);
            }
        } elseif ($data['id_cabang'] == 'AREA 1' || $data['id_cabang'] == 'AREA 2' || $data['id_cabang'] == 'AREA 3') {
            # code... for pusat
            switch ($data['id_cabang']) {
                case 'AREA 1':
                    # code...
                    $query->whereIn('tb_pkpmk.id_cabang', $data['id_area_1']);
                    break;
                case 'AREA 2':
                    # code...
                    $query->whereIn('tb_pkpmk.id_cabang', $data['id_area_2']);
                    break;
                case 'AREA 3':
                    # code...
                    $query->whereIn('tb_pkpmk.id_cabang', $data['id_area_3']);
                    break;
            }
        } else {
            $query->when($data['id_cabang'] != 99, function ($query) use ($data) {
                $query->where('tb_pkpmk.id_cabang', $data['id_cabang']);
            });
        }


        if ($jabatan === 'AO') {
            $query->whereHas('kredit', fn($q) => $q->where('petugas_penerima', $nama));
        }

        // Handle sort by no_spk via join (hati-hati: jika ada eager load 'kredit', ini bisa konflik)
        if ($data['sortBy'] === 'no_spk') {
            $query->join('tb_kredit', 'tb_pkpmk.id_kredit', '=', 'tb_kredit.id_kredit')
                ->orderBy('tb_kredit.no_spk', $data['sortDir']);
        } else {
            $query->orderBy($data['sortBy'], $data['sortDir']);
        }

        // paginate
        if ($data['perPage'] == 'All') {
            $total = $query->count();
            return $query->paginate($total > 0 ? $total : 1);
        } else {
            return $query->paginate($data['perPage']);
        }
    }


    public function pkStore($data)
    {
        $id_kredit = base64_decode($data['id_kredit']);
        $kredit = Kredit::where('id_kredit', $id_kredit)->first();
        // KREDIT
        $kredit->update([
            'status_legal' => 'Created',
            'status_kredit' => 'Legal Created'
        ]);
        $pkpmk = PKPmk::create([
            'id_cabang' => Auth::user()->id_cabang,
            'id_kredit' => $id_kredit,
            'id_debitur' => $kredit->id_debitur,
            'id_persetujuan' => $kredit->persetujuan->id_persetujuan,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // persetujuan SPK
        $persetujuan = Persetujuan::where('id_kredit', $id_kredit)->update([
            'asuransi' => $data['asuransi'],
            'biaya_asuransi' => $data['asuransi'] == 'Ya' ?  $this->normalizeNumber($data['biaya_asuransi']) : 0,
            'nama_perusahaan_asuransi' => ($data['asuransi'] == 'Ya') ? $data['nama_perusahaan_asuransi'] : '-',
            'norek_tabungan' => $data['norek_tabungan'],
            'nama_rekening' => $data['nama_rekening'],
            'penalty' => $data['penalty'],
            'biaya_materai' => $this->normalizeNumber($data['biaya_materai']),
            'biaya_notaris' => $this->normalizeNumber($data['biaya_notaris']),
            'biaya_saving_angsuran' => $this->normalizeNumber($data['biaya_saving_angsuran']),
            'biaya_lainnya' => $this->normalizeNumber($data['biaya_lainnya']),
            'biaya_asuransi_kebakaran' => $this->normalizeNumber($data['biaya_asuransi_kebakaran']),
            'biaya_asuransi_kendaraan' => $this->normalizeNumber($data['biaya_asuransi_kendaraan']),
            'jumlah_angsuran' => $kredit->persetujuan->jns_kredit == 'Berjangka' ? $this->normalizeNumber($data['jumlah_angsuran']) : $kredit->persetujuan->jumlah_angsuran,
        ]);

        for ($i = 1; $i <= 50; $i++) {
            // Membuat dan menyimpan objek Jaminan
            if (!empty($data['id_tanah_' . $i])) {
                $jaminan_tanah = JamTanah::find(base64_decode($data['id_tanah_' . $i]));
                $jaminan_tanah->jns_perikatan = $data['jns_perikatan_' . $i];
                // tambahan di legal
                // $jaminan_tanah->no_akta_perikatan = $data['no_akta_' . $i];
                // $jaminan_tanah->tgl_akta_perikatan = $data['tgl_akta_' . $i];
                if ($data['jns_perikatan_' . $i] == 'APHT') {
                    $jaminan_tanah->no_peringkat_perikatan = $data['no_peringkat_perikatan_' . $i];
                }
                $jaminan_tanah->save();
            }


            if (!empty($data['id_kenda_' . $i])) {
                $jaminan_kenda = JamKenda::find(base64_decode($data['id_kenda_' . $i]));
                $jaminan_kenda->jns_fidusia = $data['jns_fidusia_' . $i];
                $jaminan_kenda->tgl_akta_fidusia = $data['tgl_akta_fidusia_' . $i];
                $jaminan_kenda->save();
            }
        }

        return $pkpmk;
    }


    // generate no SPPK
    public function genetareSppk($id, $metode)
    {
        if ($metode == 'pkpmk') {
            $pkpmk = PkPmk::find($id);
        } else {
            $pkpmk = PkPmkAddendum::find($id);
        }

        $kredit = Kredit::find($pkpmk->id_kredit);
        $kredit->status_legal = "Print SPPK";
        $kredit->status_kredit = "Print SPPK";
        $kredit->save();

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


        // for PKPMK
        if ($metode == 'pkpmk') {
            if ($pkpmk->no_sppk === null) {
                $cabang = $pkpmk->cabang->kode_spk;
                $now = Carbon::now();
                $thn = $now->year;
                $cek = PKPmk::where('id_cabang', Auth::user()->id_cabang)->count();
                $ambil = PKPmk::where('no_sppk', 'LIKE', "%/KSB.$cabang/SPPK/%")
                    ->orderBy('updated_at', 'desc')
                    ->take(1)
                    ->get();
                if ($ambil->isEmpty()) {
                    $urut = "0001";
                    $nomer = $urut . '/KSB.' . $cabang . '/SPPK/' . $bulanRom . '/' . $thn;
                } else {
                    foreach ($ambil as $item) {
                        $cekTahun = substr($item->no_sppk, -4, 4);
                        if ($cekTahun != $thn) {
                            $urut = "0001";
                            $nomer = $urut . '/KSB.' . $cabang . '/SPPK/' . $bulanRom . '/' . $thn;
                        } else {
                            // Ambil 4 karakter pertama dari nomor SPPK
                            $urut = substr($item->no_sppk, 0, 4);
                            // Konversi ke integer dan tambahkan 1
                            $urut = (int)$urut + 1;
                            // Tambahkan nol di depan jika diperlukan, sehingga panjangnya tetap 4 karakter
                            $urut = str_pad($urut, 4, '0', STR_PAD_LEFT);
                            // Buat nomor SPPK baru dengan format yang diinginkan
                            $nomer = $urut . '/KSB.' . $cabang . '/SPPK/' . $bulanRom . '/' . $thn;
                        }
                    }
                }

                $pkpmk->no_sppk = $nomer;
                $pkpmk->tgl_print_sppk = now();
                $pkpmk->save();
            }
        }
        // for Addendum
        else {
            if ($pkpmk->no_sppk === null) {
                $cabang = $pkpmk->cabang->kode_spk;
                $now = Carbon::now();
                $thn = $now->year;
                $cek = PkPmkAddendum::where('id_cabang', Auth::user()->id_cabang)->count();
                $ambil = PkPmkAddendum::where('no_sppk', 'LIKE', "%/KSB.$cabang/SPPK/%")
                    ->orderBy('updated_at', 'desc')
                    ->take(1)
                    ->get();
                if ($ambil->isEmpty()) {
                    $urut = "0001";
                    $nomer = $urut . '/KSB.' . $cabang . '/SPPK/' . $bulanRom . '/' . $thn;
                } else {
                    foreach ($ambil as $item) {
                        $cekTahun = substr($item->no_sppk, -4, 4);
                        if ($cekTahun != $thn) {
                            $urut = "0001";
                            $nomer = $urut . '/KSB.' . $cabang . '/SPPK/' . $bulanRom . '/' . $thn;
                        } else {
                            // Ambil 4 karakter pertama dari nomor SPPK
                            $urut = substr($item->no_sppk, 0, 4);
                            // Konversi ke integer dan tambahkan 1
                            $urut = (int)$urut + 1;
                            // Tambahkan nol di depan jika diperlukan, sehingga panjangnya tetap 4 karakter
                            $urut = str_pad($urut, 4, '0', STR_PAD_LEFT);
                            // Buat nomor SPPK baru dengan format yang diinginkan
                            $nomer = $urut . '/KSB.' . $cabang . '/SPPK/' . $bulanRom . '/' . $thn;
                        }
                    }
                }

                $pkpmk->no_sppk = $nomer;
                $pkpmk->tgl_print_sppk = now();
                $pkpmk->save();
            }
        }

        // Log Activity $debitur, $kredit, $status_aksi
        LogActivity::AddLog("(p) Print SPPK | No SPK: {$kredit->no_spk} | Nama: {$kredit->debitur->nama_debitur} <br> Perubahan Status SPK: Printed SPPK");
    }


    // generate no PK/PMK
    public function genetarePk($id)
    {
        $pkpmk = PkPmk::find($id);
        $kredit = Kredit::find($pkpmk->id_kredit);

        $tracking = TrackingSPK::where('id_kredit', $kredit->id_kredit)
            ->where('jabatan', 'Legal')
            ->orderBy('id_tracking', 'desc')
            ->first();

        $tgl_awal = now();
        $jangka_waktu = $kredit->jkw; // Jangka waktu dalam bulan
        $parts = explode(' ', $jangka_waktu); // Memisahkan angka dari string menggunakan explode
        $jumlah_bulan = (int) $parts[0]; // Mendapatkan angka dari hasil explode
        $tanggal_awal = Carbon::parse($tgl_awal); // Konversi tanggal awal ke objek Carbon
        $tanggal_akhir = $tanggal_awal->addMonths($jumlah_bulan); // Tambahkan jangka waktu dalam bulan ke tanggal awal
        $tgl_akhir = $tanggal_akhir->format('Y-m-d'); // Format tanggal akhir sesuai kebutuhan

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
        if ($pkpmk->no_pkpmk == '') {
            $cabang = $pkpmk->cabang->kode_cabang;
            $now = Carbon::now();
            $thn = $now->year;
            $cek = PKPmk::where('id_cabang', Auth::user()->id_cabang)->count();
            $ambil = PKPmk::where('no_pkpmk', 'LIKE', "%/KSB.KRD-$cabang/%")
                ->orderBy('updated_at', 'desc')
                ->take(1)
                ->get();
            if ($ambil->isEmpty()) {
                $urut = "0001";
                $nomer = $urut . '/KSB.KRD-' . $cabang . '/' . $bulanRom . '/' . $thn;
            } else {
                foreach ($ambil as $item) {
                    $cekTahun = substr($item->no_pkpmk, -4, 4);
                    if ($cekTahun != $thn) {
                        $urut = "0001";
                        $nomer = $urut . '/KSB.KRD-' . $cabang . '/' . $bulanRom . '/' . $thn;
                    } else {
                        $urut = substr($item->no_pkpmk, 0, 4);
                        $urut = (int)$urut + 1;
                        $urut = str_pad($urut, 4, '0', STR_PAD_LEFT); // Menggunakan str_pad untuk menambahkan nol di depan
                        $nomer = $urut . '/KSB.KRD-' . $cabang . '/' . $bulanRom . '/' . $thn;
                    }
                }
            }

            $pkpmk->no_pkpmk = $nomer;
            $pkpmk->tgl_pkpmk = now();
            $pkpmk->tgl_awal = now();
            $pkpmk->tgl_print_pkpmk = now();
            $pkpmk->tgl_akhir = $tgl_akhir;
            $pkpmk->save();

            $kredit->status_legal = "Printed";
            $kredit->status_kredit = "SELESAI";
            $kredit->tgl_awal = now();
            $kredit->tgl_akhir = $tgl_akhir;
            $kredit->save();

            // kenda
            if (!empty($kredit->kjamkenda)) {
                JamKenda::where('id_kredit', $kredit->id_kredit)->update([
                    'tgl_akta_fidusia' => now()
                ]);
            }

            // Tracking
            $tracking->update([
                'nama' => Auth::user()->nama,
                'status' => 'Printed PK',
                'tgl_status' => now(),
                'status_spk' => 'Selesai',
            ]);
        }

        // Log Activity $debitur, $kredit, $status_aksi
        LogActivity::AddLog("(p) Print PK/PMK | No SPK: {$kredit->no_spk} | Nama: {$kredit->debitur->nama_debitur} <br> Perubahan Status SPK: Printed PK");
    }


    // generate SPA
    public function genetareSpa($id, $type)
    {
        $ids = Crypt::decrypt($id);

        // update tgl print & matikan tombol print
        if ($type == 'SPK') {
            $pkpmk = PkPmk::find($ids);
            $kredit = Kredit::find($pkpmk->id_kredit);
            $jam_kenda = JamKenda::where('id_kredit', $kredit->id_kredit)->get();

            $pkpmk->update([
                'tgl_print_sp_agunan' => now()
            ]);
            $no_pk = 'PK-PMK ' . $pkpmk->no_pkpmk;
        } else {
            $pkpmk = PkPmkAddendum::find($ids);
            $kredit = Kredit::find($pkpmk->id_kredit);
            $jam_kenda = JamKenda::where('id_kredit', $kredit->id_kredit)->get();

            $pkpmk->update([
                'tgl_print_sp_agunan' => now()
            ]);
            $no_pk = 'Addendum ' . $pkpmk->no_addendum;
        }

        // Log Activity $debitur, $kredit, $status_aksi
        LogActivity::AddLog("(p) Print SPA | No SPK: {$kredit->no_spk} | Nama: {$kredit->debitur->nama_debitur} | No PK/Addendum: {$no_pk}");

        $pdf = Pdf::loadView(
            'page.master-perjanjian-kredit.pk.print-spa',
            [
                'title' => 'Print Data',
                'kredit' => $kredit,
                'pkpmk' => $pkpmk,
                'kendaraan' => $jam_kenda,
            ]
        );
        $pdf->setPaper('A4', 'potrait')
            ->setOption([
                'isHtml5ParserEnabled' => true,
                'isPhpEnabled' => true,
            ]);

        $safeName = preg_replace('/[\/\\\\]/', '_', $no_pk);
        return $pdf->stream('SPA An.' . $pkpmk->debitur->nama_debitur . ' No. ' . $safeName . '.pdf');
    }


    // generate SPPJF
    public function genetareSppjf($id, $type)
    {
        $ids = Crypt::decrypt($id);

        // update tgl print & matikan tombol print
        if ($type == 'SPK') {
            $pkpmk = PkPmk::find($ids);
            $kredit = Kredit::find($pkpmk->id_kredit);

            $pkpmk->update([
                'tgl_print_sp_bawah_tangan' => now()
            ]);
            $no_pk = 'PK-PMK ' . $pkpmk->no_pkpmk;
        } else {
            $pkpmk = PkPmkAddendum::find($ids);
            $kredit = Kredit::find($pkpmk->id_kredit);

            $pkpmk->update([
                'tgl_print_sp_bawah_tangan' => now()
            ]);
            $no_pk = 'Addendum ' . $pkpmk->no_addendum;
        }

        $jam_kenda = JamKenda::where('id_kredit', $kredit->id_kredit)->where('jns_fidusia', 'Bawah Tangan')->get();
        $penjamin = Penjamin::where('id_kredit', $pkpmk->id_kredit)->get();

        // Log Activity $debitur, $kredit, $status_aksi
        LogActivity::AddLog("(p) Print SPPJF | No SPK: {$kredit->no_spk} | Nama: {$kredit->debitur->nama_debitur} | No PK/Addendum: {$no_pk}");

        $pdf = Pdf::loadView(
            'page.master-perjanjian-kredit.pk.print-sppjf',
            [
                'title' => 'Print Data',
                'kredit' => $kredit,
                'pkpmk' => $pkpmk,
                'kendaraan' => $jam_kenda,
                'penjamin' => $penjamin,
            ]
        );
        $pdf->setPaper('A4', 'potrait')
            ->setOption([
                'isHtml5ParserEnabled' => true,
                'isPhpEnabled' => true,
            ]);

        $safeName = preg_replace('/[\/\\\\]/', '_', $no_pk);
        return $pdf->stream('SPPJF An.' . $pkpmk->debitur->nama_debitur . ' No. ' . $safeName . '.pdf');
    }


    // generate Tpbj
    public function genetareTpbj($id, $type)
    {
        $ids = Crypt::decrypt($id);
        // update tgl print & matikan tombol print
        if ($type == 'SPK') {
            $pkpmk = PkPmk::find($ids);
            $kredit = Kredit::find($pkpmk->id_kredit);

            $pkpmk->update([
                'tgl_print_tpbj' => now()
            ]);
            $no_pk = 'PK-PMK ' . $pkpmk->no_pkpmk;
        } else {
            $pkpmk = PkPmkAddendum::find($ids);
            $kredit = Kredit::find($pkpmk->id_kredit);

            $pkpmk->update([
                'tgl_print_tpbj' => now()
            ]);
            $no_pk = 'Addendum ' . $pkpmk->no_addendum;
        }

        $jam_kenda = JamKenda::where('id_kredit', $kredit->id_kredit)->get();
        $jam_tanah = JamTanah::where('id_kredit', $kredit->id_kredit)->get();
        $jam_depo = JamDeposito::where('id_kredit', $kredit->id_kredit)->get();
        $penjamin = Penjamin::where('id_kredit', $kredit->id_kredit)->get();


        // Log Activity $debitur, $kredit, $status_aksi
        LogActivity::AddLog("(p) Print TPBJ | No SPK: {$kredit->no_spk} | Nama: {$kredit->debitur->nama_debitur} | No PK/Addendum: {$no_pk}");

        $pdf = Pdf::loadView(
            'page.master-perjanjian-kredit.pk.print-tpbj',
            [
                'title' => 'Print Data',
                'kredit' => $kredit,
                'pkpmk' => $pkpmk,
                'jam_kenda' => $jam_kenda,
                'jam_tanah' => $jam_tanah,
                'jam_depo' => $jam_depo,
                'penjamin' => $penjamin,
            ]
        );
        $pdf->setPaper('A4', 'potrait')
            ->setOption([
                'isHtml5ParserEnabled' => true,
                'isPhpEnabled' => true,
            ]);

        $safeName = preg_replace('/[\/\\\\]/', '_', $no_pk);
        return $pdf->stream('TPBJ An.' . $pkpmk->debitur->nama_debitur . ' No. ' . $safeName . '.pdf');
    }


    // print Sptma
    public function genetareSptma($id, $type)
    {
        $ids = Crypt::decrypt($id);

        // update tgl print & matikan tombol print
        if ($type == 'SPK') {
            $pkpmk = PkPmk::find($ids);
            $kredit = Kredit::find($pkpmk->id_kredit);

            $pkpmk->update([
                'tgl_print_tpbj' => now()
            ]);
            $no_pk = 'PK-PMK ' . $pkpmk->no_pkpmk;
        } else {
            $pkpmk = PkPmkAddendum::find($ids);
            $kredit = Kredit::find($pkpmk->id_kredit);

            $pkpmk->update([
                'tgl_print_tpbj' => now()
            ]);
            $no_pk = 'Addendum ' . $pkpmk->no_addendum;
        }

        // Log Activity $debitur, $kredit, $status_aksi
        LogActivity::AddLog("(p) Print SPTMA | No SPK: {$kredit->no_spk} | Nama: {$kredit->debitur->nama_debitur} | No PK/Addendum: {$no_pk}");

        $pdf = Pdf::loadView(
            'page.master-perjanjian-kredit.pk.print-sptma',
            [
                'title' => 'Print Data',
                'kredit' => $kredit,
                'pkpmk' => $pkpmk,
            ]
        );
        $pdf->setPaper('A4', 'potrait')
            ->setOption([
                'isHtml5ParserEnabled' => true,
                'isPhpEnabled' => true,
            ]);

        $safeName = preg_replace('/[\/\\\\]/', '_', $no_pk);
        return $pdf->stream('SPTMA An.' . $pkpmk->debitur->nama_debitur . ' No. ' . $safeName . '.pdf');
    }

    // fungsi normal untuk setting number
    function normalizeNumber($value)
    {
        if ($value === '∞') {
            return 0;
        }

        $value = str_replace('.', '', $value); // hapus ribuan
        $value = str_replace(',', '.', $value); // ubah desimal
        return floatval($value);

        // normalnya
        // $nilai = "49.000,89";
        // $jumlah_pengajuan = str_replace(',', '.', str_replace('.', '', $data['rate_1']));
    }
}
