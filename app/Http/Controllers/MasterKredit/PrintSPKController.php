<?php

namespace App\Http\Controllers\MasterKredit;

use App\Http\Controllers\Controller;
use App\Models\MasterKredit\Kredit;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;
use Mpdf\Mpdf;

class PrintSPKController extends Controller
{
    public function printSPK($id)
    {
        $ids = Crypt::decrypt($id);
    }


    public function printIDI($id)
    {
        $ids = Crypt::decrypt($id);

        $kredit = Kredit::find($ids);
        $alamat = Str::lower($kredit->cabang->alamat);

        $pdf = Pdf::loadView(
            'page.master-kredit.print.print-idi',
            compact('kredit', 'alamat')
        );
        $pdf->setPaper('A4', 'potrait')
            ->setOptions(['isHtml5ParserEnabled' => true, 'isPhpEnabled' => true]);
        return $pdf->stream('Data IDI An.' . $kredit->debitur->nama_debitur . '.pdf');
    }
}
