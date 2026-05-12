<?php

namespace App\Http\Controllers\Lainnya;

use App\Http\Controllers\Controller;
use App\Models\Cabang;
use App\Models\Output\LogActivity;
use App\Models\Output\MonitoringAo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class MonitoringAOController extends Controller
{
    public function create()
    {
        $monitoring = null;
        return view('page.lainnya.monitoring-ao-create', [
            'title' => 'Create Prospek AO',
            'monitoring' => $monitoring,
            'metode' => 'create',
            'id_field' => '',
        ]);
    }


    public function edit($id)
    {
        $ids = Crypt::decrypt($id);
        $monitoring = MonitoringAo::findOrFail($ids);
        return view('page.lainnya.monitoring-ao-create', [
            'title' => 'Create Prospek AO',
            'monitoring' => $monitoring,
            'metode' => 'edit',
            'id_field' => '',
        ]);
    }


    public function lookupCadeb(Request $request)
    {
        $noHp = $request->query('no_hp');
        $data = MonitoringAo::where('nama_ao', Auth::user()->nama)
            ->where('no_hp_cadeb', 'LIKE', "%$noHp%")
            ->limit(5)->get();

        return response()->json($data);
    }


    public function store(Request $request)
    {
        if ($request->cek_tgl_ao == 'True') {
            $tgl_kunjungan = now()->subDay()->format('Y-m-d');
        } else {
            $tgl_kunjungan = now()->format('Y-m-d');
        }

        $tigaBulan = now()->subMonths(3)->startOfMonth()->format('Y-m-d');
        $prospekAO = MonitoringAo::where('no_hp_cadeb', $request->no_hp_cadeb)
            ->where('id_cabang', Auth::user()->id_cabang)
            ->where('nama_ao', Auth::user()->nama)
            ->whereBetween('tgl_kunjungan', [$tigaBulan, now()])
            ->orderByDesc('tgl_kunjungan')
            ->first();

        $monitor = new MonitoringAo();
        $monitor->id_cabang = Auth::user()->id_cabang;
        $monitor->nama_ao = Auth::user()->nama;
        $monitor->no_hp_cadeb = $request->input('no_hp_cadeb');
        $monitor->nama_cadeb = $request->input('nama_cadeb');
        $monitor->usaha = $request->input('usaha');
        $monitor->dusun = $request->input('dusun');
        $monitor->desa = $request->input('desa');
        $monitor->kecamatan = $request->input('kecamatan');
        $monitor->kabupaten = $request->input('kabupaten');
        $monitor->klasifikasi = $request->input('klasifikasi');
        $monitor->kunjungan_ke = $request->input('kunjungan_ke');
        // $monitor->kunjungan_ke = $prospekAO != null ? $prospekAO->kunjungan_ke + 1 : 1;
        $monitor->potensi_plafond = $this->normalizeNumber($request->input('potensi_plafond'));
        $monitor->keterangan = $request->input('keterangan');

        $monitor->tgl_kunjungan = $tgl_kunjungan;

        $monitor->save();

        // tracking & log
        LogActivity::AddLog("(+) Prospek AO: {$monitor->nama_cadeb} - ({$monitor->no_hp_cadeb})");

        return redirect(route('monitoring.ao.index'))->with('AlertSuccess', 'Data Monitoring AO berhasil disimpan.');
    }


    public function update(Request $request, $id)
    {
        $ids = Crypt::decrypt($id);
        $monitor = MonitoringAo::findOrFail($ids);
        $monitor->no_hp_cadeb = $request->input('no_hp_cadeb');
        $monitor->nama_cadeb = $request->input('nama_cadeb');
        $monitor->usaha = $request->input('usaha');
        $monitor->dusun = $request->input('dusun');
        $monitor->desa = $request->input('desa');
        $monitor->kecamatan = $request->input('kecamatan');
        $monitor->kabupaten = $request->input('kabupaten');
        $monitor->klasifikasi = $request->input('klasifikasi');
        $monitor->kunjungan_ke = $request->input('kunjungan_ke');
        $monitor->potensi_plafond = $this->normalizeNumber($request->input('potensi_plafond'));
        $monitor->keterangan = $request->input('keterangan');

        if (Auth::user()->jabatan != 'AO') {
            $monitor->tgl_kunjungan = $request->input('tgl_kunjungan');
        }

        $monitor->save();

        // tracking & log
        LogActivity::AddLog("(u) Prospek AO: {$monitor->nama_cadeb} - ({$monitor->no_hp_cadeb})");

        return redirect(route('monitoring.ao.index'))->with('AlertSuccess', 'Data Monitoring AO berhasil disimpan.');
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
