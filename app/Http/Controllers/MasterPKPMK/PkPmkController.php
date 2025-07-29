<?php

namespace App\Http\Controllers\MasterPKPMK;

use App\Http\Controllers\Controller;
use App\Models\MasterAgunan\JamDeposito;
use App\Models\MasterAgunan\JamKenda;
use App\Models\MasterAgunan\JamTanah;
use App\Models\MasterKredit\Debitur;
use App\Models\MasterKredit\Kredit;
use App\Models\MasterKredit\Penjamin;
use App\Models\MasterKredit\PikarEks;
use App\Models\MasterMUK\Muk;
use App\Models\MasterPKPMK\PkPmk;
use App\Models\MasterPKPMK\PkPmkAddendum;
use App\Models\Output\LogActivity;
use App\Services\PerjanjianKredit\PK\PkServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Barryvdh\DomPDF\Facade\Pdf;

class PkPmkController extends Controller
{
    protected $PkServices;
    public function __construct(PkServices $pkServices)
    {
        $this->PkServices = $pkServices;
    }

    public function create($idKredit)
    {
        $ids = base64_decode($idKredit);
        $kredit = Kredit::find($ids);
        $debitur = Debitur::find($kredit->id_debitur);
        $muk = Muk::where('id_kredit', $ids)->first();

        $jam_tanah = JamTanah::where('id_kredit', $kredit->id_kredit)->get();
        $jam_kenda = JamKenda::where('id_kredit', $kredit->id_kredit)->get();
        $jam_depo = JamDeposito::where('id_kredit', $kredit->id_kredit)->get();
        $pikarEks = PikarEks::where('id_kredit', $kredit->id_kredit)->first();

        return view('page.master-perjanjian-kredit.pk.create', [
            'title' => 'Create Perjanjian Kredit',
            'kredit' => $kredit,
            'debitur' => $debitur,
            'id_muk' => $muk->id_muk,
            'jam_tanah' => $jam_tanah,
            'jam_kenda' => $jam_kenda,
            'jam_depo' => $jam_depo,
            'pikar' => $pikarEks,
            'metode' => null
        ]);
    }

    public function edit($idKredit)
    {
        $ids = base64_decode($idKredit);
        $kredit = Kredit::find($ids);
        $debitur = Debitur::find($kredit->id_debitur);
        $muk = Muk::where('id_kredit', $ids)->first();

        $jam_tanah = JamTanah::where('id_kredit', $kredit->id_kredit)->get();
        $jam_kenda = JamKenda::where('id_kredit', $kredit->id_kredit)->get();
        $jam_depo = JamDeposito::where('id_kredit', $kredit->id_kredit)->get();
        $pikarEks = PikarEks::where('id_kredit', $kredit->id_kredit)->first();

        return view('page.master-perjanjian-kredit.pk.create', [
            'title' => 'Edit Perjanjian Kredit',
            'kredit' => $kredit,
            'debitur' => $debitur,
            'id_muk' => $muk->id_muk,
            'jam_tanah' => $jam_tanah,
            'jam_kenda' => $jam_kenda,
            'jam_depo' => $jam_depo,
            'pikar' => $pikarEks,
            'metode' => 'Edit'
        ]);
    }


    public function store(Request $request)
    {
        // dd($request->all());
        $pkpmk = $this->PkServices->PkStore($request->all());

        if (!empty($request->id_addendum)) {
            $tanda = '(u)';
            $notif = 'DiUpdate';
        } else {
            $tanda = '(+)';
            $notif = 'Ditambahkan';
        }

        // Log Aktivitas
        LogActivity::AddLog("{$tanda} Data Addendum | SPK: {$pkpmk->kredit->no_spk} | NIK: {$pkpmk->debitur->nik} | Nama: {$pkpmk->debitur->nama_debitur}");

        return redirect('pkpmk')->with('AlertSuccess', 'Data Perjanjian Kredit Berhasil ' . $notif);
    }


    public function show($idPkpmk)
    {
        $ids = Crypt::decrypt($idPkpmk);

        $pkpmk = PkPmk::find($ids);

        return view('page.master-perjanjian-kredit.pk.show', [
            'title' => 'Show Data',
            'pkpmk' => $pkpmk
        ]);
    }


    public function showDetail($idPkpmk)
    {
        $ids = Crypt::decrypt($idPkpmk);
        $pkpmk = PkPmk::find($ids);
        $jam_tanah = JamTanah::where('id_kredit', $pkpmk->id_kredit)->get();
        $jam_kenda = JamKenda::where('id_kredit', $pkpmk->id_kredit)->get();
        $jam_depo = JamDeposito::where('id_kredit', $pkpmk->id_kredit)->get();
        $pikarEks = PikarEks::where('id_kredit', $pkpmk->id_kredit)->first();
        $penjamin = Penjamin::where('id_kredit', $pkpmk->id_kredit)->get();

        $dcx = persen_id($pkpmk->persetujuan->besar_bunga);
        // dd($dcx);


        return view('page.master-perjanjian-kredit.pk.show-detail', [
            'title' => 'Show Data',
            'pkpmk' => $pkpmk,
            'jam_tanah' => $jam_tanah,
            'jam_kenda' => $jam_kenda,
            'jam_depo' => $jam_depo,
            'pikar' => $pikarEks,
            'penjamin' => $penjamin,
        ]);
    }


    // print SPPK
    public function printSppk($idPkpmk)
    {
        $this->authorize('createLegal', PKPmk::class);
        $ids = Crypt::decrypt($idPkpmk);
        $pkpmk = PkPmk::find($ids);
        $jam_tanah = JamTanah::where('id_kredit', $pkpmk->id_kredit)->get();
        $jam_kenda = JamKenda::where('id_kredit', $pkpmk->id_kredit)->get();
        $jam_depo = JamDeposito::where('id_kredit', $pkpmk->id_kredit)->get();
        $penjamin = Penjamin::where('id_kredit', $pkpmk->id_kredit)->get();

        // create no sppk dan logika lainnya
        $this->PkServices->genetareSppk($ids, 'pkpmk');

        $pdf = Pdf::loadView(
            'page.master-perjanjian-kredit.pk.print-sppk',
            [
                'title' => 'Print Data SPPK',
                'pkpmk' => $pkpmk,
                'jam_tanah' => $jam_tanah,
                'jam_kenda' => $jam_kenda,
                'jam_depo' => $jam_depo,
                'penjamin' => $penjamin,
            ]
        );
        $pdf->setPaper('A4', 'potrait')
            ->setOption([
                'isHtml5ParserEnabled' => true,
                'isPhpEnabled' => true,
            ]);

        return $pdf->stream('Print SPPK An.' . $pkpmk->debitur->nama_debitur . '.pdf');
    }


    // print PK
    public function printPk($idPkpmk)
    {
        $this->authorize('createLegal', PKPmk::class);
        $ids = Crypt::decrypt($idPkpmk);
        $pkpmk = PkPmk::find($ids);
        $jam_tanah = JamTanah::where('id_kredit', $pkpmk->id_kredit)->get();
        $jam_kenda = JamKenda::where('id_kredit', $pkpmk->id_kredit)->get();
        $jam_depo = JamDeposito::where('id_kredit', $pkpmk->id_kredit)->get();
        // $pikarEks = PikarEks::where('id_kredit', $pkpmk->id_kredit)->first();
        $penjamin = Penjamin::where('id_kredit', $pkpmk->id_kredit)->get();

        $judul =  $pkpmk->persetujuan->jns_kredit == 'Angsuran' ? 'PK' : 'PMK';

        // create no sppk dan logika lainnya
        $this->PkServices->genetarePk($ids);

        $pdf = Pdf::loadView(
            'page.master-perjanjian-kredit.pk.print-pkpmk',
            [
                'title' => 'Print Data',
                'pkpmk' => $pkpmk,
                'jam_tanah' => $jam_tanah,
                'jam_kenda' => $jam_kenda,
                'jam_depo' => $jam_depo,
                // 'pikar' => $pikarEks,
                'penjamin' => $penjamin,
            ]
        );
        $pdf->setPaper('A4', 'potrait')
            ->setOption([
                'isHtml5ParserEnabled' => true,
                'isPhpEnabled' => true,
            ]);

        $safeName = preg_replace('/[\/\\\\]/', '_', $pkpmk->no_pkpmk);

        return $pdf->stream($judul . ' An.' . $pkpmk->debitur->nama_debitur . ' No. ' . $safeName . '.pdf');
    }


    // print SPA
    public function printSpa($idPkpmk)
    {
        $this->authorize('createLegal', PKPmk::class);

        $print = $this->PkServices->genetareSpa($idPkpmk, 'SPK');

        return $print;
    }


    // print SPPJF
    public function printSppjf($idPkpmk)
    {
        $this->authorize('createLegal', PkPmk::class);

        $print = $this->PkServices->genetareSppjf($idPkpmk, 'SPK');

        return $print;
    }

    // print Tpbj
    public function printTpbj($idPkpmk)
    {
        $this->authorize('createLegal', PkPmk::class);

        $print = $this->PkServices->genetareTpbj($idPkpmk, 'SPK');

        return $print;
    }

    // print Sptma
    public function printSptma($idPkpmk)
    {
        $this->authorize('createLegal', PkPmk::class);

        $print = $this->PkServices->genetareSptma($idPkpmk, 'SPK');

        return $print;
    }
}
