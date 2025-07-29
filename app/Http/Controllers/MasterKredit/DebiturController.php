<?php

namespace App\Http\Controllers\MasterKredit;

use App\Http\Controllers\Controller;
use App\Models\MasterKredit\Debitur;
use App\Models\MasterKredit\Kredit;
use App\Models\Output\LogActivity;
use App\Services\MasterKredit\Debitur\DebiturService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Services\MasterKredit\Debitur\LiveSearchService;

class DebiturController extends Controller
{
    // load services
    protected $debiturService;
    protected $LiveSearchService;
    public function __construct(DebiturService $debiturService, LiveSearchService $LiveSearchService)
    {
        $this->debiturService = $debiturService;
        $this->LiveSearchService = $LiveSearchService;
    }

    function index()
    {
        return view('page.master-kredit.debitur.debitur', [
            'title' => 'Data SPK',

        ]);
    }


    public function create()
    {
        return view('page.master-kredit.debitur.debitur-create', [
            'title' => 'Tambah SPK',
            'id_field' => null,
            'debitur' => null,
            'metode' => null
        ]);
    }


    public function store(Request $request)
    {
        $debitur = $this->debiturService->createDebitur($request->all());

        // Log Aktivitas
        LogActivity::AddLog("(+) Data Debitur | NIK: {$debitur->nik} | Nama: {$debitur->nama_debitur}");

        if ($debitur) {
            return redirect('debitur/spk/create/' . base64_encode($debitur->id_debitur))->with('AlertSuccess', 'Data Debitur Berhasil Ditambahkan');
        } else {
            return redirect()->back()->with('error', 'Data SPK Gagal Ditambahkan');
        }
    }


    public function show($id)
    {
        $ids = Crypt::decrypt($id);
        $kredit = Kredit::with(['debitur', 'cabang', 'penjamin', 'jamtanah', 'jamkenda', 'jamdeposito', 'pikareks', 'persetujuan'])
            ->where('id_kredit', $ids)
            ->first();
        // $penjamins = Penjamin::where('id_kredit', $id_kredit)->get();
        // $jam_tanah = JamTanah::where('id_kredit', $id_kredit)->get();
        // $jam_kenda = JamKenda::where('id_kredit', $id_kredit)->get();
        // $jam_depo = JamDeposito::where('id_kredit', $id_kredit)->get();


        return view('page.master-kredit.debitur.debitur-show', [
            'title' => 'Detail SPK',
            'kredit' => $kredit,
        ]);
    }


    public function edit($id, $metode)
    {
        $ids = Crypt::decrypt($id);
        $debitur = Debitur::find($ids);

        return view('page.master-kredit.debitur.debitur-edit', [
            'title' => $metode == 'edit' ? 'Edit Data SPK' : 'Tambah SPK Exist',
            'debitur' => $debitur,
            'metode' => $metode,
            'id_field' => $metode == 'edit' ? '_edit' : null
        ]);
    }



    public function update(Request $request, $id)
    {
        $ids = Crypt::decrypt($id);
        $debiturEdit = Debitur::find($ids);


        // untuk create exist
        if ($request->metode == 'create') {
            $debitur = $this->debiturService->createDebitur($request->all());

            // Log Aktivitas
            LogActivity::AddLog("(+) Data Debitur | NIK: {$debitur->nik} | Nama: {$debitur->nama_debitur}");
            return redirect('/debitur/spk/edit/' . base64_encode($debiturEdit->id_debitur) . '/create')
                ->with('AlertSuccess', 'Data Debitur Berhasil Di tambahkan');
        }
        // untuk edit
        else {
            $debitur = $this->debiturService->updateDebitur($request->all(), $debiturEdit);

            // Log Aktivitas
            LogActivity::AddLog("(u) Data Debitur | NIK: {$debitur->nik} | Nama: {$debitur->nama_debitur}");
            return redirect('/debitur/spk/edit/' . base64_encode($debitur->id_debitur) . '/edit')
                ->with('AlertSuccess', 'Data Debitur Berhasil DiUbah');
        }
    }



    // +++++++++++++++++++++++
    // Live search
    public function search(Request $request)
    {
        return $this->LiveSearchService->search($request);
    }


    public function showModal($idEncrypt, LiveSearchService $live_search)
    {
        return $live_search->showModal($idEncrypt);
    }


    public function searchAgunan(Request $request, LiveSearchService $live_search)
    {
        return $live_search->searchAgunan($request);
    }


    public function searchAgunanKenda(Request $request, LiveSearchService $live_search)
    {
        return $live_search->searchAgunanKenda($request);
    }


    public function showModalAgunan(Request $request, LiveSearchService $live_search)
    {
        return $live_search->showModalAgunan($request);
    }



    // +++++++++++++++++
    // CREATE EXIST
    public function createExist($id)
    {
        $ids = Crypt::decrypt($id);
        $debitur = Debitur::find($ids);

        return view('page.master-kredit.debitur.debitur-create-exist', [
            'title' => 'Tambah SPK Exist',
            'debitur' => $debitur
        ]);
    }


    // ++++++++++++++++++
    // DEBITUR SWITCH
    public function switch($id)
    {
        $ids = Crypt::decrypt($id);
        $this->debiturService->SwitchDeb($ids);

        return redirect('debitur/edit/' . $id . '/edit')->with('AlertSuccess', 'Data Debitur Berhasil Di Switch!');
    }
}
