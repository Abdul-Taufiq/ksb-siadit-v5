<?php

namespace App\Http\Controllers\MasterKredit;

use App\Http\Controllers\Controller;
use App\Models\MasterKredit\Debitur;
use App\Models\MasterKredit\Kredit;
use App\Models\MasterKredit\Penjamin;
use App\Models\Output\LogActivity;
use App\Models\Output\TrackingSPK;
use App\Services\MasterKredit\Debitur\SPKService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class SpkController extends Controller
{
    // load services
    protected $SpkService;
    public function __construct(SPKService $SpkService)
    {
        $this->SpkService = $SpkService;
    }

    public function create($idDeb)
    {
        // dd($idDeb);
        $id_debitur = base64_decode($idDeb);
        $debitur = Debitur::where('id_debitur', $id_debitur)->first();
        return view('page.master-kredit.spk.spk-create', [
            'title' => 'Tambah SPK',
            'idDeb' => $idDeb,
            'debitur' => $debitur,
            'id_field' => null,
            'kredit' => null
        ]);
    }


    public function store(Request $request)
    {
        // dd($request->all());
        $spk = $this->SpkService->createSPK($request->all());

        // Log Aktivitas
        LogActivity::AddLog("(+) Data SPK | No SPK: {$spk->no_spk} | Nama: {$spk->debitur->nama_debitur}");

        // tracking SPK
        TrackingSPK::AddTrackingSPK($spk, [
            'id_kredit' => $spk->id_kredit,
            'id_cabang' => $spk->id_cabang,
            'petugas_penerima' => $spk->petugas_penerima,
            'nama' => Auth::user()->nama,
            'jabatan' => Auth::user()->jabatan,
            'status' => 'SPK CREATED',
            'tgl_masuk' => now(),
            'status_spk' => 'Created'
        ]);


        if ($spk) {
            return redirect('debitur/agunan/create/' . base64_encode($spk->id_kredit) . '/' . base64_encode($spk->id_debitur))
                ->with('AlertSuccess', 'Data SPK Berhasil Ditambahkan');
        } else {
            return redirect()->back()->with('error', 'Data SPK Gagal Ditambahkan');
        }
    }


    public function edit($idDeb, $metode)
    {
        $ids = base64_decode($idDeb);
        $debiturOld = Debitur::find($ids);
        $debiturNew = Debitur::where('nik', $debiturOld->nik)
            ->orderBy('id_debitur', 'desc')->first();

        $kredit = Kredit::where('id_debitur', $ids)->first();
        if ($kredit != null) {
            $penjamin = Penjamin::where('id_kredit', $kredit->id_kredit)->get();
        } else {
            $penjamin = [];
        }

        // dd('OLD = ' . $debiturOld->id_debitur . ' | NEW = ' . $debiturNew->id_debitur);

        return view('page.master-kredit.spk.spk-edit', [
            'title' => $metode == 'edit' ? 'Edit Data SPK' : 'Tambah SPK Exist',
            'kredit' => $kredit,
            'debitur' => $debiturNew,
            'penjamin' => $penjamin,
            'idDeb' => base64_encode($debiturNew->id_debitur),
            'idDebOld' => base64_encode($debiturOld->id_debitur),
            'metode' => $metode,
            'id_field' => $metode == 'edit' ? '_edit' : null
        ]);
    }


    public function update(Request $request, $id)
    {
        $ids = Crypt::decrypt($id);
        $debitur = Debitur::find($ids);

        // for create exist
        if ($request->metode == 'create') {
            $debiturOld = Debitur::find(base64_decode($request->id_debitur_old));
            $spk = $this->SpkService->createSPK($request->all());

            // Log Aktivitas
            LogActivity::AddLog("(+) Data SPK | No SPK: {$spk->no_spk} | Nama: {$spk->debitur->nama_debitur}");

            // tracking SPK
            TrackingSPK::AddTrackingSPK($spk, [
                'id_cabang' => $spk->id_cabang,
                'id_kredit' => $spk->id_kredit,
                'petugas_penerima' => $spk->petugas_penerima, //creator
                'nama' => Auth::user()->nama, //nama user up
                'jabatan' => Auth::user()->jabatan,
                'status' => 'SPK CREATED',
                'tgl_masuk' => now(),
                'status_spk' => 'Created'
            ]);

            $idkreditold = $debiturOld->kredit != null ? base64_encode($debiturOld->kredit->id_kredit) : 'dataoldnull';

            return redirect('debitur/spk/jaminan/edit/' . $idkreditold . '/' . base64_encode($spk->id_kredit) . '/create')
                ->with('AlertSuccess', 'Data SPK Berhasil Ditambahkan');
        }
        // for edit
        else {
            $kredit = Kredit::where('id_debitur', $debitur->id_debitur)
                ->orderBy('id_kredit', 'desc')->first();
            $spk = $this->SpkService->updateSPK($request->all(), $kredit);

            // Log Aktivitas
            LogActivity::AddLog("(u) Data SPK | No SPK: {$spk->nik} | Nama: {$spk->debitur->nama_debitur}");

            return redirect('debitur/spk/jaminan/edit/idold/' . base64_encode($spk->id_kredit) . '/edit')
                ->with('AlertSuccess', 'Data SPK Berhasil Diupdate');
        }
    }
}
