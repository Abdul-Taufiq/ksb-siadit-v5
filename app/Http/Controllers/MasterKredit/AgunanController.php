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
use App\Models\Output\LogActivity;
use App\Services\MasterKredit\Debitur\JaminanService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class AgunanController extends Controller
{
    // load services
    protected $AgunanService;
    public function __construct(JaminanService $AgunanService)
    {
        $this->AgunanService = $AgunanService;
    }


    public function create($idKredit, $idDeb)
    {
        // dd('kredit = ' . $KreditDecode . ' debitur = ' . $DebiturDecode);
        $id_debitur = base64_decode($idDeb);
        $id_kredit = base64_decode($idKredit);
        $debitur = Debitur::where('id_debitur', $id_debitur)->first();
        $kredit = Kredit::where('id_kredit', $id_kredit)->first();
        $penjamin = Penjamin::where('id_kredit', $id_kredit)->get();


        return view('page.master-kredit.spk.agunan-create', [
            'title' => 'Tambah Agunan',
            'idDeb' => $idDeb,
            'idKredit' => $idKredit,
            'debitur' => $debitur,
            'kredit' => $kredit,
            'penjamin' => $penjamin,
        ]);
    }


    public function store(Request $request)
    {
        // dd($request->all());
        $agunan = $this->AgunanService->createJaminan($request->all());
        $kredit = Kredit::find(base64_decode($request->id_kredit));

        // Log Aktivitas
        LogActivity::AddLog("(+) Data Agunan | No SPK: {$kredit->no_spk} | Nama Debitur: {$kredit->debitur->nama_debitur}");

        if ($agunan) {
            return redirect('debitur')->with('AlertSuccess', 'Data SPK dan Jaminan Berhasil Ditambahkan');
        } else {
            return redirect()->back()->with('error', 'Data SPK Gagal Ditambahkan');
        }
    }


    public function edit($idold, $idnew, $metode)
    {
        // untuk edit
        if ($idold == 'idold' || $idold == 'dataoldnull') {
            $kredit = Kredit::find(base64_decode($idnew));
        }
        // untuk create exist 
        else {
            $kredit = Kredit::find(base64_decode($idold));
        }

        $jam_tanah = JamTanah::where('id_kredit', $kredit->id_kredit)->get();
        $jam_kenda = JamKenda::where('id_kredit', $kredit->id_kredit)->get();
        $jam_depo = JamDeposito::where('id_kredit', $kredit->id_kredit)->get();
        $pikarEks = PikarEks::where('id_kredit', $kredit->id_kredit)->first();

        // ambil id untuk debitur dan penjamin yang baru
        $idfordebitur = Kredit::find(base64_decode($idnew))->id_debitur;
        $debitur = Debitur::find($idfordebitur);
        $penjamin = Penjamin::where('id_kredit', base64_decode($idnew))->get();

        return view('page.master-kredit.spk.agunan-edit', [
            'title' => $metode == 'edit' ? 'Edit Data Agunan' : 'Tambah Agunan Exist',
            'kredit' => $kredit,
            'id_kredit' => $idnew, // untuk simpan data
            'debitur' => $debitur,
            'penjamin' => $penjamin,
            'jam_tanah' => $jam_tanah,
            'jam_kenda' => $jam_kenda,
            'jam_depo' => $jam_depo,
            'pikar' => $pikarEks,
            'metode' => $metode,
            'id_field' => $metode == 'edit' ? '_edit' : null
        ]);
    }


    public function update(Request $request, $id)
    {
        $ids = Crypt::decrypt($id);
        $kredit = Kredit::find($ids);

        if ($request->metode == 'create') {
            // dd($request->all());
            $agunan = $this->AgunanService->createJaminan($request->all());

            // Log Aktivitas
            LogActivity::AddLog("(+) Data Agunan | No SPK: {$kredit->no_spk} | Nama Debitur: {$kredit->debitur->nama_debitur}");
            return redirect('debitur')->with('AlertSuccess', 'Data SPK dan Jaminan Berhasil Ditambahkan');
        } else {
            $agunan = $this->AgunanService->updateJaminan($request->all(), $kredit);

            // Log Aktivitas
            LogActivity::AddLog("(u) Data Agunan | No SPK: {$kredit->no_spk} | Nama Debitur: {$kredit->debitur->nama_debitur}");
            return redirect('debitur')->with('AlertSuccess', 'Data SPK dan Jaminan Berhasil Diubah');
        }
    }
}
