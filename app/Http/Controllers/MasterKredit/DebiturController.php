<?php

namespace App\Http\Controllers\MasterKredit;

use App\Http\Controllers\Controller;
use App\Models\MasterKredit\Debitur;
use App\Models\MasterKredit\Kredit;
use App\Models\MasterKredit\Persetujuan;
use App\Models\Output\LogActivity;
use App\Models\Output\MonitoringAo;
use App\Models\Output\TrackingSPK;
use App\Services\MasterKredit\Debitur\DebiturService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Services\MasterKredit\Debitur\LiveSearchService;
use Illuminate\Support\Facades\Auth;

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

        // monitoring AO 
        $monitoring = MonitoringAo::where('no_hp_cadeb', $request->no_telp)->orderByDesc('id')->first();
        if ($monitoring) {
            $monitoring->update([
                'status' => 'Create SPK',
            ]);
        }

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

        $tigaBulan = now()->subMonths(3)->startOfMonth()->format('Y-m-d');
        $prospekAO = MonitoringAo::where('no_hp_cadeb', $kredit->debitur->no_telp)
            ->where('id_cabang', $kredit->id_cabang)
            ->where('nama_ao', $kredit->petugas_penerima)
            // ->where('status', 'Create SPK')
            ->whereBetween('tgl_kunjungan', [$tigaBulan, now()])
            ->orderByDesc('kunjungan_ke')
            ->get();
        // $penjamins = Penjamin::where('id_kredit', $id_kredit)->get();
        // $jam_tanah = JamTanah::where('id_kredit', $id_kredit)->get();
        // $jam_kenda = JamKenda::where('id_kredit', $id_kredit)->get();
        // $jam_depo = JamDeposito::where('id_kredit', $id_kredit)->get();

        // dd($prospekAO->first()->kunjungan_ke);
        // dd($prospekAO);

        return view('page.master-kredit.debitur.debitur-show', [
            'title' => 'Detail SPK',
            'kredit' => $kredit,
            'prospekAO' => $prospekAO,
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

            // monitoring AO 
            $monitoring = MonitoringAo::where('no_hp_cadeb', $request->no_telp)->orderByDesc('id')->first();
            if ($monitoring) {
                $monitoring->update([
                    'status' => 'Create SPK',
                ]);
            }

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


    public function showModalAgunan($idEncrypt, LiveSearchService $live_search)
    {
        return $live_search->showModalAgunan($idEncrypt);
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



    // sos
    public function sosEditPas($id)
    {
        $ids = base64_decode($id);
        $kredit = Kredit::find($ids);
        $debitur = Debitur::find($kredit->id_debitur);

        if (!$kredit || !$debitur) {
            return redirect()->back()->with('error', 'Data SPK atau Debitur tidak ditemukan.');
        }

        return view('page.master-kredit.debitur.sos-update-pas', [
            'title' => 'S.O.S Update PAS',
            'kredit' => $kredit,
            'debitur' => $debitur,
        ]);
    }


    public function sosUpdatePas(Request $request)
    {
        $ids = base64_decode($request->id_kredit);
        $kredit = Kredit::find($ids);
        $kredit->update([
            'jumlah_disetujui' => $this->normalizeNumber($request->jumlah_disetujui),
            'jkw' => $request->jkw,
            'status_pincab' => 'SOS',
            'status_kredit' => '(*) S.O.S Update PAS perlu persetujuan Pincab',
            'catatan_tambahan' => $request->catatan_sos . '<br><b> » Edited by ' . Auth::user()->nama . ' Jabatan: ' . Auth::user()->jabatan . ' at ' . now()->format('d-m-Y, H:i') . '</b>',
        ]);

        // update Persetujuan
        $persetujuan = Persetujuan::where('id_kredit', $kredit->id_kredit)->first()->update([
            'putusan' => $request->putusan,
            'jns_bunga' => $request->jns_bunga,
            'besar_bunga' =>  $this->normalizeNumber($request->besar_bunga),
            'jumlah_angsuran' => $this->normalizeNumber($request->jumlah_angsuran),
            'provisi' =>  $this->normalizeNumber($request->provisi),
            'jumlah_provisi' => $this->normalizeNumber($request->jumlah_provisi),
            'besar_adm' =>  $this->normalizeNumber($request->besar_adm),
            'biaya_adm' => $this->normalizeNumber($request->biaya_adm),
            'besar_survey' =>  $this->normalizeNumber($request->besar_survey),
            'biaya_survey' =>  $this->normalizeNumber($request->biaya_survey),
            'denda_hari' => $this->normalizeNumber($request->denda_hari),
        ]);

        // tracking & log
        LogActivity::AddLog("(*) S.O.S Update PAS | SPK : {$kredit->no_spk} | Debitur: {$kredit->debitur->nama_debitur}");

        // update tracking legal
        $tracking = TrackingSPK::where('id_kredit', $kredit->id_kredit)
            ->where('jabatan', 'Legal')
            ->orderByDesc('id_tracking')
            ->first();
        $tracking->update([
            'nama' => Auth::user()->nama,
            'status' => '(*) S.O.S Update PAS',
            'tgl_status' => now(),
            'status_spk' => 'Disetujui',
        ]);

        // tracking SPK
        TrackingSPK::AddTrackingSPK($kredit, [
            'id_kredit' => $kredit->id_kredit,
            'id_cabang' => $kredit->id_cabang,
            'petugas_penerima' => $kredit->petugas_penerima,
            'nama' => null,
            'jabatan' => 'Pimpinan Cabang',
            'status' => null,
            'tgl_masuk' => now(),
            'status_spk' => 'Disetujui'
        ]);


        return redirect()->route('debitur.index')->with([
            'AlertSuccess' => 'Data SOS berhasil disimpan!'
        ]);
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
