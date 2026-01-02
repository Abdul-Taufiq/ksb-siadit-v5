<?php

namespace App\Http\Controllers\Lainnya;

use App\Http\Controllers\Controller;
use App\Models\Cabang;
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
            'id_field' => '_edit',
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
        $monitor->potensi_plafond = $this->normalizeNumber($request->input('potensi_plafond'));
        $monitor->keterangan = $request->input('keterangan');
        $monitor->tgl_kunjungan = now();
        $monitor->save();

        return redirect(route('monitoring.ao.index'))->with('AlertSuccess', 'Data Monitoring AO berhasil disimpan.');
    }


    public function update(Request $request, $id)
    {
        $ids = Crypt::decrypt($id);
        $monitor = MonitoringAo::findOrFail($ids);
        $monitor->id_cabang = Auth::user()->id_cabang;
        $monitor->nama_ao = Auth::user()->nama;
        $monitor->no_hp_cadeb = $request->input('no_hp_cadeb_edit');
        $monitor->nama_cadeb = $request->input('nama_cadeb_edit');
        $monitor->usaha = $request->input('usaha_edit');
        $monitor->dusun = $request->input('dusun_edit');
        $monitor->desa = $request->input('desa_edit');
        $monitor->kecamatan = $request->input('kecamatan_edit');
        $monitor->kabupaten = $request->input('kabupaten_edit');
        $monitor->klasifikasi = $request->input('klasifikasi_edit');
        $monitor->kunjungan_ke = $request->input('kunjungan_ke_edit');
        $monitor->potensi_plafond = $this->normalizeNumber($request->input('potensi_plafond_edit'));
        $monitor->keterangan = $request->input('keterangan_edit');
        $monitor->tgl_kunjungan = now();
        $monitor->save();

        return redirect(route('monitoring.ao.index'))->with('AlertSuccess', 'Data Monitoring AO berhasil disimpan.');
    }



    // +++++++++++++++++++++++++++++++++
    // Rekap Monitoring AO Livewire
    // +++++++++++++++++++++++++++++++++
    public function showRekap($nama, $tgl_awal, $tgl_akhir)
    {
        $namas = Crypt::decrypt($nama);
        $user = User::where('nama', $namas)->first();
        $cabang = Cabang::where('id_cabang', $user->id_cabang)->first();

        $monitoring = MonitoringAo::where('nama_ao', $namas)
            ->whereBetween('tgl_kunjungan', [$tgl_awal, $tgl_akhir])
            ->get();

        return view('page.lainnya.rekap-monitoring-ao-show', [
            'title' => 'Detail Aktivitas Harian AO',
            'nama_ao' => $namas,
            'cabang' => $cabang->cabang,
            'monitoring' => $monitoring,
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
