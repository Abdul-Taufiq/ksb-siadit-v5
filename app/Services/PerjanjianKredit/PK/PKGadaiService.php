<?php

namespace App\Services\PerjanjianKredit\PK;

use App\Models\MasterAgunan\JamDeposito;
use App\Models\MasterKredit\Kredit;
use App\Models\MasterKredit\Penjamin;
use App\Models\MasterPKPMK\PkPmk;
use App\Models\MasterPKPMK\PkPmkAddendum;
use App\Models\Output\LogActivity;
use Illuminate\Support\Facades\Crypt;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class PKGadaiService
{
    // generate pk gadai
    public function generatePkGadai($id, $type)
    {
        $ids = Crypt::decrypt($id);

        // SPK
        if ($type == 'SPK') {
            $pkpmk = PkPmk::find($ids);
            $kredit = Kredit::find($pkpmk->id_kredit);

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

            if ($pkpmk->no_gadai == '') {
                $cabang = $pkpmk->cabang->kode_cabang;
                $now = Carbon::now();
                $thn = $now->year;
                $ambil = PKPmk::where('no_gadai', 'LIKE', "%/KSB.KRD-" . $cabang . "/%")
                    ->orderBy('updated_at', 'desc')
                    ->take(1)
                    ->get();
                if ($ambil->isEmpty()) {
                    $urut = "0001";
                    $nomer = $urut . '/KSB.KRD-' . $cabang . '/Gadai/' . $bulanRom . '/' . $thn;
                } else {
                    foreach ($ambil as $item) {
                        $cekTahun = substr($item->no_gadai, -4, 4);
                        if ($cekTahun != $thn) {
                            $urut = "0001";
                            $nomer = $urut . '/KSB.KRD-' . $cabang . '/Gadai/' . $bulanRom . '/' . $thn;
                        } else {
                            $urut = substr($item->no_gadai, 0, 4);
                            $urut = (int)$urut + 1;
                            $urut = str_pad($urut, 4, '0', STR_PAD_LEFT); // Menggunakan str_pad untuk menambahkan nol di depan
                            $nomer = $urut . '/KSB.KRD-' . $cabang . '/Gadai/' . $bulanRom . '/' . $thn;
                        }
                    }
                }

                $pkpmk->no_gadai = $nomer;
                $pkpmk->tgl_print_gadai = now();
            }

            $pkpmk->save();
            $no_pk = 'PK-PMK ' . $pkpmk->no_gadai;
        }
        // ADDENDUM
        else {
            $pkpmk = PkPmkAddendum::find($ids);
            $kredit = Kredit::find($pkpmk->id_kredit);

            $pkpmk->update([
                'tgl_print_gadai' => now()
            ]);
            $no_pk = 'Addendum ' . $pkpmk->no_addendum;
        }

        $jam_depo = JamDeposito::where('id_kredit', $kredit->id_kredit)->first();
        $penjamin = Penjamin::where('id_kredit', $kredit->id_kredit)->where('nama_penjamin', $jam_depo->atas_nama)->first();

        $debitur = $kredit->debitur;

        // Log Activity $debitur, $kredit, $status_aksi
        LogActivity::AddLog("(p) Print PK Gadai | No SPK: {$kredit->no_spk} | Nama: {$kredit->debitur->nama_debitur} | No PK/Addendum: {$no_pk}");

        $pdf = Pdf::loadView(
            'page.master-perjanjian-kredit.pk.gadai.print-gadai',
            [
                'title' => 'Print Data PK Gadai An-' . $pkpmk->debitur->nama_debitur,
                'kredit' => $kredit,
                'pkpmk' => $pkpmk,
                'depo' => $jam_depo,
                'penjamin' => $penjamin,
                'debitur' => $debitur,
            ]
        );
        $pdf->setPaper('A4', 'potrait')
            ->setOption([
                'isHtml5ParserEnabled' => true,
                'isPhpEnabled' => true,
            ]);

        $safeName = preg_replace('/[\/\\\\]/', '_', $no_pk);
        return $pdf->stream('PK Gadai An.' . $pkpmk->debitur->nama_debitur . ' No. ' . $safeName . '.pdf');
    }


    //  generate permohonan blokir
    public function generateBlokir($id, $type)
    {
        $ids = Crypt::decrypt($id);

        // SPK
        if ($type == 'SPK') {
            $pkpmk = PkPmk::find($ids);
            $kredit = Kredit::find($pkpmk->id_kredit);

            $pkpmk->tgl_print_blokir = now();
            $pkpmk->save();
            $no_pk = 'PK-PMK ' . $pkpmk->no_gadai;
        }
        // ADDENDUM
        else {
            $pkpmk = PkPmkAddendum::find($ids);
            $kredit = Kredit::find($pkpmk->id_kredit);

            $pkpmk->update([
                'tgl_print_blokir' => now()
            ]);
            $no_pk = 'Addendum ' . $pkpmk->no_addendum;
        }

        $jam_depo = JamDeposito::where('id_kredit', $kredit->id_kredit)->first();
        $penjamin = Penjamin::where('id_kredit', $kredit->id_kredit)->where('nama_penjamin', $jam_depo->atas_nama)->first();

        $debitur = $kredit->debitur;

        // Log Activity $debitur, $kredit, $status_aksi
        LogActivity::AddLog("(p) Print PK Gadai Blokir | No SPK: {$kredit->no_spk} | Nama: {$kredit->debitur->nama_debitur} | No PK/Addendum: {$no_pk}");

        $pdf = Pdf::loadView(
            'page.master-perjanjian-kredit.pk.gadai.print-blokir',
            [
                'title' => 'Print Data PK Gadai Blokir An-' . $pkpmk->debitur->nama_debitur,
                'kredit' => $kredit,
                'pkpmk' => $pkpmk,
                'depo' => $jam_depo,
                'penjamin' => $penjamin,
                'debitur' => $debitur,
            ]
        );
        $pdf->setPaper('A4', 'potrait')
            ->setOption([
                'isHtml5ParserEnabled' => true,
                'isPhpEnabled' => true,
            ]);

        $safeName = preg_replace('/[\/\\\\]/', '_', $no_pk);
        return $pdf->stream('PK Gadai Blokir An.' . $pkpmk->debitur->nama_debitur . ' No. ' . $safeName . '.pdf');
    }


    //  generate permohonan buka blokir
    public function generateBukaBlokir($id, $type)
    {
        $ids = Crypt::decrypt($id);

        // SPK
        if ($type == 'SPK') {
            $pkpmk = PkPmk::find($ids);
            $kredit = Kredit::find($pkpmk->id_kredit);

            $pkpmk->tgl_print_buka_blokir = now();
            $pkpmk->save();
            $no_pk = 'PK-PMK ' . $pkpmk->no_gadai;
        }
        // ADDENDUM
        else {
            $pkpmk = PkPmkAddendum::find($ids);
            $kredit = Kredit::find($pkpmk->id_kredit);

            $pkpmk->update([
                'tgl_print_buka_blokir' => now()
            ]);
            $no_pk = 'Addendum ' . $pkpmk->no_addendum;
        }

        $jam_depo = JamDeposito::where('id_kredit', $kredit->id_kredit)->first();
        $penjamin = Penjamin::where('id_kredit', $kredit->id_kredit)->where('nama_penjamin', $jam_depo->atas_nama)->first();

        $debitur = $kredit->debitur;

        // Log Activity $debitur, $kredit, $status_aksi
        LogActivity::AddLog("(p) Print PK Gadai Buka Blokir | No SPK: {$kredit->no_spk} | Nama: {$kredit->debitur->nama_debitur} | No PK/Addendum: {$no_pk}");

        $pdf = Pdf::loadView(
            'page.master-perjanjian-kredit.pk.gadai.print-buka-blokir',
            [
                'title' => 'Print Data PK Gadai Buka Blokir An-' . $pkpmk->debitur->nama_debitur,
                'kredit' => $kredit,
                'pkpmk' => $pkpmk,
                'depo' => $jam_depo,
                'penjamin' => $penjamin,
                'debitur' => $debitur,
            ]
        );
        $pdf->setPaper('A4', 'potrait')
            ->setOption([
                'isHtml5ParserEnabled' => true,
                'isPhpEnabled' => true,
            ]);

        $safeName = preg_replace('/[\/\\\\]/', '_', $no_pk);
        return $pdf->stream('PK Gadai Buka Blokir An.' . $pkpmk->debitur->nama_debitur . ' No. ' . $safeName . '.pdf');
    }


    //  generate Kuasa
    public function generateKuasa($id, $type)
    {
        $ids = Crypt::decrypt($id);

        // SPK
        if ($type == 'SPK') {
            $pkpmk = PkPmk::find($ids);
            $kredit = Kredit::find($pkpmk->id_kredit);

            $pkpmk->tgl_print_kuasa_pencairan = now();
            $pkpmk->save();
            $no_pk = 'PK-PMK ' . $pkpmk->no_gadai;
        }
        // ADDENDUM
        else {
            $pkpmk = PkPmkAddendum::find($ids);
            $kredit = Kredit::find($pkpmk->id_kredit);

            $pkpmk->update([
                'tgl_print_kuasa_pencairan' => now()
            ]);
            $no_pk = 'Addendum ' . $pkpmk->no_addendum;
        }

        $jam_depo = JamDeposito::where('id_kredit', $kredit->id_kredit)->first();
        $penjamin = Penjamin::where('id_kredit', $kredit->id_kredit)->where('nama_penjamin', $jam_depo->atas_nama)->first();

        $debitur = $kredit->debitur;

        // Log Activity $debitur, $kredit, $status_aksi
        LogActivity::AddLog("(p) Print PK Gadai Kuasa Pencairan | No SPK: {$kredit->no_spk} | Nama: {$kredit->debitur->nama_debitur} | No PK/Addendum: {$no_pk}");

        $pdf = Pdf::loadView(
            'page.master-perjanjian-kredit.pk.gadai.print-kuasa',
            [
                'title' => 'Print Data PK Gadai Kuasa Pencairan An-' . $pkpmk->debitur->nama_debitur,
                'kredit' => $kredit,
                'pkpmk' => $pkpmk,
                'depo' => $jam_depo,
                'penjamin' => $penjamin,
                'debitur' => $debitur,
            ]
        );
        $pdf->setPaper('A4', 'potrait')
            ->setOption([
                'isHtml5ParserEnabled' => true,
                'isPhpEnabled' => true,
            ]);

        $safeName = preg_replace('/[\/\\\\]/', '_', $no_pk);
        return $pdf->stream('PK Gadai Kuasa Pencairan An.' . $pkpmk->debitur->nama_debitur . ' No. ' . $safeName . '.pdf');
    }
}
