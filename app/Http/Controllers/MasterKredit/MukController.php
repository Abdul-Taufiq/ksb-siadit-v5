<?php

namespace App\Http\Controllers\MasterKredit;

use App\Http\Controllers\Controller;
use App\Models\MasterAgunan\JamDeposito;
use App\Models\MasterAgunan\JamKenda;
use App\Models\MasterAgunan\JamTanah;
use App\Models\MasterKredit\Debitur;
use App\Models\MasterKredit\Kredit;
use App\Models\MasterKredit\Penjamin;
use App\Models\MasterKredit\PikarEks;
use App\Models\MasterMUK\Muk;
use App\Models\MasterMUK\MukIndustri;
use App\Models\MasterMUK\MukPutusan;
use App\Models\MasterMUK\MukSlik;
use App\Models\Output\LogActivity;
use App\Services\MasterKredit\Debitur\JaminanService;
use App\Services\MasterKredit\Muk\{MukService, MukServiceEdit};
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Mpdf\Mpdf;
use Riskihajar\Terbilang\Facades\Terbilang;

class MukController extends Controller
{
    // load services
    protected $mukService;
    protected $mukServiceEdit;
    protected $AgunanService;
    public function __construct(MukService $MukService, MukServiceEdit $MukServiceEdit, JaminanService $AgunanService)
    {
        $this->mukService = $MukService;
        $this->mukServiceEdit = $MukServiceEdit;
        $this->AgunanService = $AgunanService;
    }

    // ke halaman add muk
    public function addMuk($id)
    {
        $ids = base64_decode($id);
        $kredit = Kredit::find($ids);
        $debitur = Debitur::find($kredit->id_debitur);
        $penjamin = Penjamin::where('id_kredit', $kredit->id_kredit)->get();

        return view('page.master-kredit.muk.muk-create', [
            'title' => 'Add Data MUK',
            'debitur' => $debitur,
            'kredit' => $kredit,
            'penjamin' => $penjamin,
            'metode' => null,
            'field' => null,
            'muk' => null,
        ]);
    }

    public function editMuk($id)
    {
        $ids = base64_decode($id);
        $muk = Muk::find($ids);
        $kredit = Kredit::find($muk->id_kredit);
        $debitur = Debitur::find($kredit->id_debitur);
        $penjamin = Penjamin::where('id_kredit', $kredit->id_kredit)->get();

        $mukID = base64_encode($muk->id_muk);

        return view('page.master-kredit.muk.muk-edit', [
            'title' => 'Edit Data MUK',
            'debitur' => $debitur,
            'kredit' => $kredit,
            'penjamin' => $penjamin,
            'muk' => $muk,
            'metode' => $mukID,
            'field' => null
        ]);
    }


    public function storeMuk(Request $request)
    {
        $muk = Muk::where('id_kredit', base64_decode($request->id_kredit))->first();
        if ($request->metode == null || $muk == null) {
            $muk = $this->mukService->storePartSatu($request->all());
        } else {
            $mukE = $this->mukServiceEdit->editPartSatu($request->all());
            $muk = Muk::find(base64_decode($request->id_muk));
        }

        return redirect()->route('muk.add.partdua', base64_encode($muk->id_muk))->with([
            'AlertSuccess' => 'Data MUK berhasil disimpan.'
        ]);
    }


    public function addMukPartDua($idMuk)
    {
        $ids = base64_decode($idMuk);
        $muk = Muk::where('id_muk', $ids)->first();
        $kredit = Kredit::find($muk->id_kredit);
        $debitur = Debitur::where('id_debitur', $kredit->id_debitur)->first();
        $penjamin = Penjamin::where('id_kredit', $kredit->id_kredit)->get();

        $mukID = null;
        if ($muk) {
            $mukID = base64_encode($muk->id_muk);
        }

        return view('page.master-kredit.muk.muk-create-part-dua', [
            'title' => empty($muk->data) ? 'Add Data MUK' : 'Edit Data MUK',
            'id_muk' => $idMuk,
            'muk' => $muk,
            'ids' => $ids,
            'debitur' => $debitur,
            'kredit' => $kredit,
            'penjamin' => $penjamin,
            'metode' => $mukID,
            'field' => null
        ]);
    }


    public function storeMukPartDua(Request $request)
    {
        if ($request->metode == null) {
            $this->mukService->storePartDua($request->all());
        } else {
            $this->mukServiceEdit->editPartDua($request->all());
        }

        return redirect()->route('muk.add.parttiga', $request->id_muk)->with([
            'AlertSuccess' => 'Data MUK Part Dua berhasil disimpan.'
        ]);
    }


    public function addMukPartTiga($idMuk)
    {
        $ids = base64_decode($idMuk);
        $muk = Muk::where('id_muk', $ids)->first();
        $kredit = Kredit::find($muk->id_kredit);
        $debitur = Debitur::where('id_debitur', $kredit->id_debitur)->first();
        $penjamin = Penjamin::where('id_kredit', $kredit->id_kredit)->get();

        $jam_tanah = JamTanah::where('id_kredit', $kredit->id_kredit)->get();
        $jam_kenda = JamKenda::where('id_kredit', $kredit->id_kredit)->get();
        $jam_depo = JamDeposito::where('id_kredit', $kredit->id_kredit)->get();
        $pikarEks = PikarEks::where('id_kredit', $kredit->id_kredit)->first();

        $mukID = null;
        if ($muk) {
            $mukID = base64_encode($muk->id_muk);
        }

        if ($muk->sc_depo->isEmpty() && $muk->sc_kenda->isEmpty() && $muk->sc_tabungan->isEmpty() && $muk->sc_tanah_agunan->isEmpty()) {
            $title = "Add Data MUK";
        } else {
            $title = "Edit Data MUK";
        }


        return view('page.master-kredit.muk.muk-create-part-tiga', [
            'title' => $title,
            'id_muk' => $idMuk,
            'debitur' => $debitur,
            'kredit' => $kredit,
            'penjamin' => $penjamin,
            'id_kredit' => $kredit->id_kredit,
            'jam_tanah' => $jam_tanah,
            'jam_kenda' => $jam_kenda,
            'jam_depo' => $jam_depo,
            'pikar' => $pikarEks,
            'metode' => $mukID,
            'muk' => $muk,
            'field' => null
        ]);
    }

    public function storeMukPartTiga(Request $request)
    {
        $kredit = Kredit::find($request->id_kredit);
        $agunan = $this->AgunanService->updateJaminan($request->all(), $kredit);

        return redirect()->route('muk.add.partempat', $request->id_muk)->with([
            'AlertSuccess' => 'Data MUK Part Tiga berhasil disimpan.'
        ]);
    }


    public function addMukPartEmpat($idMuk)
    {
        $ids = base64_decode($idMuk);
        $muk = Muk::where('id_muk', $ids)->first();
        $kredit = Kredit::find($muk->id_kredit);
        $debitur = Debitur::where('id_debitur', $kredit->id_debitur)->first();

        $jam_tanah = JamTanah::where('id_kredit', $kredit->id_kredit)->get();
        $jam_kenda = JamKenda::where('id_kredit', $kredit->id_kredit)->get();
        $jam_depo = JamDeposito::where('id_kredit', $kredit->id_kredit)->get();
        $pikarEks = PikarEks::where('id_kredit', $kredit->id_kredit)->first();
        $penjamin = Penjamin::where('id_kredit', $kredit->id_kredit)->get();

        if ($muk->sc_depo->isEmpty() && $muk->sc_kenda->isEmpty() && $muk->sc_tabungan->isEmpty() && $muk->sc_tanah_agunan->isEmpty()) {
            $title = "Add Data MUK";
            $metode = null;
        } else {
            $title = "Edit Data MUK";
            $metode = "Edit";
        }

        if (Auth::user()->sub_jabatan == 'Staf Analis Area') {
            $vcab = 'sc_tanah_agunan';
            $vanalis = 'sc_tanah_agunan_vanalis';
            $vcabScoring = 'sc_tanah_scoring';
            $vanalisScoring = 'sc_tanah_scoring_vanalis';
            $vcabPerhitungan = 'sc_tanah_perhitungan';
            $vanalisPerhitungan = 'sc_tanah_perhitungan_vanalis';
            $vanalisRekap1 = 'sc_tanah_rekap_1_vanalis';
            $vanalisRekap2 = 'sc_tanah_rekap_2_vanalis';
            $vcabRekap1 = 'sc_tanah_rekap_1';
            $vcabRekap2 = 'sc_tanah_rekap_2';
            // kenda
            $vanalisSCKenda = 'sc_kenda_agunan_vanalis';
            $vcabSCKenda = 'sc_kenda_agunan';
            // depo
            $vanalisDepo = 'sc_depo_vanalis';
            $vcabDepo = 'sc_depo';
            // tabungan
            $vanalisTab = 'sc_tabungan_vanalis';
            $vcabTab = 'sc_tabungan';
        } else {
            $vcab = 'sc_tanah_agunan';
            $vanalis = '';
            $vcabScoring = 'sc_tanah_scoring';
            $vanalisScoring = '';
            $vcabPerhitungan = 'sc_tanah_perhitungan';
            $vanalisPerhitungan = '';
            $vanalisRekap1 = '';
            $vanalisRekap2 = '';
            $vcabRekap1 = 'sc_tanah_rekap_1';
            $vcabRekap2 = 'sc_tanah_rekap_2';
            // kenda
            $vanalisSCKenda = '';
            $vcabSCKenda = 'sc_kenda_agunan';
            // depo
            $vanalisDepo = '';
            $vcabDepo = 'sc_depo';
            // tabungan
            $vanalisTab = '';
            $vcabTab = 'sc_tabungan';
        }


        return view('page.master-kredit.muk.muk-create-part-empat', [
            'title' => $title,
            'muk' => $muk,
            'id_muk' => $idMuk,
            'debitur' => $debitur,
            'kredit' => $kredit,
            'id_kredit' => $kredit->id_kredit,
            'jam_tanah' => $jam_tanah,
            'jam_kenda' => $jam_kenda,
            'jam_depo' => $jam_depo,
            'penjamin' => $penjamin,
            'vcab' => $vcab,
            'vanalis' => $vanalis,
            'vcabScoring' => $vcabScoring,
            'vanalisScoring' => $vanalisScoring,
            'vcabPerhitungan' => $vcabPerhitungan,
            'vanalisPerhitungan' => $vanalisPerhitungan,
            'vcabRekap1' => $vcabRekap1,
            'vanalisRekap1' => $vanalisRekap1,
            'vcabRekap2' => $vcabRekap2,
            'vanalisRekap2' => $vanalisRekap2,
            // kenda
            'vcabSCKenda' => $vcabSCKenda,
            'vanalisSCKenda' => $vanalisSCKenda,
            // depo
            'vcabDepo' => $vcabDepo,
            'vanalisDepo' => $vanalisDepo,
            // tabungan
            'vcabTab' => $vcabTab,
            'vanalisTab' => $vanalisTab,

            'pikar' => $pikarEks,
            'metode' => $metode,
            'field' => null
        ]);
    }


    public function storeMukPartEmpat(Request $request)
    {
        // dd($request->all());
        if ($request->metode == null) {
            $this->mukService->storeTanah($request->all());
            $this->mukService->storeKenda($request->all());
            $this->mukService->storeDepo($request->all());
            $log = "(+)";
        } else {
            $this->mukServiceEdit->editTanah($request->all());
            $this->mukServiceEdit->editKenda($request->all());
            $this->mukServiceEdit->editDepo($request->all());
            $log = "(u)";
        }

        // Log Aktivitas
        $muk = Muk::find(base64_decode($request->id_muk));

        LogActivity::AddLog("{$log} Data MUK | No MUK: {$muk->no_muk} | No SPK: {$muk->kredit->no_spk}");

        return redirect()->route('muk.index')->with([
            'AlertSuccess' => 'Data MUK Part Empat berhasil disimpan. MUK Selesai'
        ]);
    }


    public function show($id)
    {
        $ids = Crypt::decrypt($id);
        $muk = Muk::find($ids);
        $slik = MukSlik::where('id_muk', $ids)->get();
        $industri = MukIndustri::where('id_muk', $ids)->orderBy('type_data', 'ASC')->get();
        // jam
        $jamTanah = JamTanah::where('id_kredit', $muk->id_kredit)->get();
        $jamKenda = JamKenda::where('id_kredit', $muk->id_kredit)->get();
        $jamDepo = JamDeposito::where('id_kredit', $muk->id_kredit)->get();

        return view('page.master-kredit.muk.show.muk-show',  [
            'title' => 'Show MUK',
            'muk' => $muk,
            'slik' => $slik,
            'industri' => $industri,
            'jamTanah' => $jamTanah,
            'jamKenda' => $jamKenda,
            'jamDepo' => $jamDepo,
        ]);
    }


    public function showScoring(Request $request, $idMuk)
    {
        $fullUrl = $request->fullUrl(); // ambil full URL
        // atau $request->url(); untuk URL tanpa query string

        if (strpos($fullUrl, 'anar') !== false) {
            $SCAgunan = 'sc_tanah_agunan_vanalis';
            $SCScoring = 'sc_tanah_scoring_vanalis';
            $SCPerhitungan = 'sc_tanah_perhitungan_vanalis';
            $SCRekap1 = 'sc_tanah_rekap_1_vanalis';
            $SCRekap2 = 'sc_tanah_rekap_2_vanalis';
            // kenda
            $SCKenda = 'sc_kenda_agunan_vanalis';
            // depo
            $SCDepo = 'sc_depo_vanalis';
            // tabungan
            $SCTab = 'sc_tabungan_vanalis';
            $title = 'Versi Analis Area';
        } else {
            $SCAgunan = 'sc_tanah_agunan';
            $SCScoring = 'sc_tanah_scoring';
            $SCPerhitungan = 'sc_tanah_perhitungan';
            $SCRekap1 = 'sc_tanah_rekap_1';
            $SCRekap2 = 'sc_tanah_rekap_2';
            $SCKenda = 'sc_kenda_agunan';
            $SCDepo = 'sc_depo';
            $SCTab = 'sc_tabungan';
            $title = 'Versi Cabang';
            // dd("URL tidak mengandung 'anar'");
        }

        $ids = Crypt::decrypt($idMuk);
        $muk = Muk::find($ids);

        $jam_tanah = JamTanah::where('id_kredit', $muk->kredit->id_kredit)->get();
        $jam_kenda = JamKenda::where('id_kredit', $muk->kredit->id_kredit)->get();
        $jam_depo = JamDeposito::where('id_kredit', $muk->kredit->id_kredit)->get();

        return view('page.master-kredit.muk.show-scoring.sc-show',  [
            'title' => 'Scoring Agunan ' . $title,
            'muk' => $muk,
            'jam_tanah' => $jam_tanah,
            'jam_kenda' => $jam_kenda,
            'jam_depo' => $jam_depo,
            'SCAgunan' => $SCAgunan,
            'SCScoring' => $SCScoring,
            'SCPerhitungan' => $SCPerhitungan,
            'SCRekap1' => $SCRekap1,
            'SCRekap2' => $SCRekap2,
            'SCKenda' => $SCKenda,
            'SCDepo' => $SCDepo,
            'SCTab' => $SCTab,
        ]);
    }


    // UPDATE CATATAN Putusan
    public function updateCatatan(Request $request)
    {
        $putusan = MukPutusan::findorFail(base64_decode($request->id_putusan));
        // ambil nama field dari request
        $field = $request->field_ctt;

        // isi field tersebut dengan catatan
        $putusan->$field = $request->catatan;
        $putusan->save();

        return redirect()->back()->with('AlertSuccess', 'Berhasil Diupdate!');
    }


    // ==============================
    // print Muk
    public function printMuk($id)
    {
        $ids = Crypt::decrypt($id);
        $muk = Muk::find($ids);
        $slik = MukSlik::where('id_muk', $ids)->get();
        $industri = MukIndustri::where('id_muk', $ids)->orderBy('type_data', 'ASC')->get();
        // jam
        $jamTanah = JamTanah::where('id_kredit', $muk->id_kredit)->get();
        $jamKenda = JamKenda::where('id_kredit', $muk->id_kredit)->get();
        $jamDepo = JamDeposito::where('id_kredit', $muk->id_kredit)->get();

        $pdf = Pdf::loadView(
            'page.master-kredit.print.print-muk',
            [
                'title' => 'Print Master MUK '  . $muk->no_muk,
                'muk' => $muk,
                'slik' => $slik,
                'industri' => $industri,
                'jamTanah' => $jamTanah,
                'jamKenda' => $jamKenda,
                'jamDepo' => $jamDepo,
            ]
        );

        $pdf->setPaper('A4', 'potrait')
            ->setOption([
                'isHtml5ParserEnabled' => false,
                'isPhpEnabled' => true,
            ]);

        $no_muk = str_replace('/', '-', $muk->no_muk);
        return $pdf->stream('Master MUK No. ' . $no_muk .  '.pdf');
    }


    // print MUK Scoring
    public function printScoring(Request $request, $agunan, $idJaminan, $idMuk)
    {
        $id_muk = base64_decode($idMuk);
        $agunan = base64_decode($agunan);
        $idJaminan = base64_decode($idJaminan);
        $muk = Muk::find($id_muk);

        $fullUrl = $request->fullUrl(); // ambil full URL
        // atau $request->url(); untuk URL tanpa query string

        if (strpos($fullUrl, 'anar') !== false) {
            $SCAgunan = 'sc_tanah_agunan_vanalis';
            $SCScoring = 'sc_tanah_scoring_vanalis';
            $SCPerhitungan = 'sc_tanah_perhitungan_vanalis';
            $SCRekap1 = 'sc_tanah_rekap_1_vanalis';
            $SCRekap2 = 'sc_tanah_rekap_2_vanalis';
            // kenda
            $SCKenda = 'sc_kenda_agunan_vanalis';
            // depo
            $SCDepo = 'sc_depo_vanalis';
            // tabungan
            $SCTab = 'sc_tabungan_vanalis';
            $title = 'Versi Analis Area';
        } else {
            $SCAgunan = 'sc_tanah_agunan';
            $SCScoring = 'sc_tanah_scoring';
            $SCPerhitungan = 'sc_tanah_perhitungan';
            $SCRekap1 = 'sc_tanah_rekap_1';
            $SCRekap2 = 'sc_tanah_rekap_2';
            $SCKenda = 'sc_kenda_agunan';
            $SCDepo = 'sc_depo';
            $SCTab = 'sc_tabungan';
            $title = 'Versi Cabang';
            // dd("URL tidak mengandung 'anar'");
        }

        $jam_tanah = JamTanah::where('id_kredit', $muk->kredit->id_kredit)
            ->where('id_jaminan_pertanahan', $idJaminan)
            ->first();
        $jam_depo = JamDeposito::where('id_kredit', $muk->kredit->id_kredit)
            ->where('id_jaminan_deposito', $idJaminan)
            ->first();
        $jam_kenda = JamKenda::where('id_kredit', $muk->kredit->id_kredit)
            ->where('id_jaminan_kendaraan', $idJaminan)
            ->first();

        $pdf = Pdf::loadView(
            'page.master-kredit.muk.show-scoring.print-scoring.print-sc-tanah',
            [
                'title' => 'Print Scoring Agunan '  . $muk->no_muk . ' - ' . $title,
                'tanah' => $jam_tanah,
                'muk' => $muk,
                'depo' => $jam_depo,
                'kenda' => $jam_kenda,
                'tipe_agunan' => $agunan,
                'SCAgunan' => $SCAgunan,
                'SCScoring' => $SCScoring,
                'SCPerhitungan' => $SCPerhitungan,
                'SCRekap1' => $SCRekap1,
                'SCRekap2' => $SCRekap2,
                'SCKenda' => $SCKenda,
                'SCDepo' => $SCDepo,
                'SCTab' => $SCTab,
            ]
        );

        $pdf->setPaper('A4', 'potrait')
            ->setOption([
                'isHtml5ParserEnabled' => false,
                'isPhpEnabled' => true,
            ]);

        $no_muk = str_replace('/', '-', $muk->no_muk);
        return $pdf->stream('Scoring Jaminan No. ' . $no_muk .  '.pdf');
    }
}
