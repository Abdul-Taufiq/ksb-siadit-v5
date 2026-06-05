<?php

namespace App\Http\Controllers\Lainnya;

use App\Http\Controllers\Controller;
use App\Models\Cabang;
use App\Models\Output\LogActivity;
use App\Models\Output\MonitoringPlanAO;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Barryvdh\DomPDF\Facade\Pdf;

class PlanningAOController extends Controller
{
    public function create()
    {
        $monitoring = null;
        return view('page.lainnya.planAo.plan-ao-create', [
            'title' => 'Create Plan AO',
            'monitoring' => $monitoring,
            'metode' => 'create',
            'id_field' => '',
        ]);
    }

    public function edit($id)
    {
        $ids = Crypt::decrypt($id);
        $monitoring = MonitoringPlanAO::findOrFail($ids);
        return view('page.lainnya.planAo.plan-ao-create', [
            'title' => 'Edit Plan AO',
            'monitoring' => $monitoring,
            'metode' => 'edit',
            'id_field' => '',
        ]);
    }


    public function store(Request $request)
    {
        if ($request->cek_tgl_ao == 'True') {
            $tgl_plan = now()->subDay()->format('Y-m-d');
        } else {
            $tgl_plan = now()->format('Y-m-d');
        }

        $plan = new MonitoringPlanAO();
        $plan->nama_ao = Auth::user()->nama;
        $plan->id_cabang = Auth::user()->id_cabang;
        $plan->tgl_plan = $tgl_plan;
        $plan->kategori_plan = $request->kategori_plan;
        $plan->no_telp = $request->no_telp;
        $plan->baki_debet = $request->input('baki_debet') != null ? $this->normalizeNumber($request->input('baki_debet')) : null;
        $plan->total_tagihan = $request->input('total_tagihan') != null ? $this->normalizeNumber($request->input('total_tagihan')) : null;
        $plan->tujuan_kunjungan = $request->tujuan_kunjungan;
        $plan->keterangan = $request->keterangan;

        if ($request->kategori_plan == 'Rencana Prospek') {
            $plan->nama_deb = $request->nama;
            $plan->alamat_jns_kegiatan = $request->alamat;
            $plan->jns_usaha = $request->jns_usaha;
            $plan->visit_asr_ke = $request->visit_ke;
        } else if ($request->kategori_plan == 'Rencana Penagihan') {
            $plan->nama_deb = $request->nama_deb;
            $plan->alamat_jns_kegiatan = $request->jns_kegiatan_tagih;
            $plan->visit_asr_ke = $request->asr_ke;
        } else {
            $plan->alamat_jns_kegiatan = $request->jns_kegiatan_lainnya;
        }
        $plan->save();

        // tracking & log
        LogActivity::AddLog("(+) Plan AO: {$plan->kategori_plan}");

        return redirect(route('plan-ao.index'))->with('AlertSuccess', 'Data Plan AO berhasil disimpan.');
    }


    public function update($id, Request $request)
    {
        $ids = Crypt::decrypt($id);
        $plan = MonitoringPlanAO::findOrFail($ids);
        $plan->kategori_plan = $request->kategori_plan;

        if (Auth::user()->jabatan != 'AO') {
            $plan->tgl_plan = $request->tgl_plan;
        }

        $plan->no_telp = $request->no_telp;
        $plan->baki_debet = $request->input('baki_debet') != null ? $this->normalizeNumber($request->input('baki_debet')) : null;
        $plan->total_tagihan = $request->input('total_tagihan') != null ? $this->normalizeNumber($request->input('total_tagihan')) : null;
        $plan->tujuan_kunjungan = $request->tujuan_kunjungan;
        $plan->keterangan = $request->keterangan;

        if ($request->kategori_plan == 'Rencana Prospek') {
            $plan->nama_deb = $request->nama;
            $plan->alamat_jns_kegiatan = $request->alamat;
            $plan->jns_usaha = $request->jns_usaha;
            $plan->visit_asr_ke = $request->visit_ke;
        } else if ($request->kategori_plan == 'Rencana Penagihan') {
            $plan->nama_deb = $request->nama_deb;
            $plan->alamat_jns_kegiatan = $request->jns_kegiatan_tagih;
            $plan->visit_asr_ke = $request->asr_ke;
        } else {
            $plan->alamat_jns_kegiatan = $request->jns_kegiatan_lainnya;
        }
        $plan->save();

        // tracking & log
        LogActivity::AddLog("(u) Plan AO: {$plan->kategori_plan}");

        return redirect(route('plan-ao.index'))->with('AlertSuccess', 'Data Plan AO berhasil diubah.');
    }



    // Print
    public function printRekap($idCab, $nama_ao, $tgl_awal, $tgl_akhir)
    {
        $nama = base64_decode($nama_ao);
        $id_cab = base64_decode($idCab);
        $cabang = Cabang::where('id_cabang', $id_cab)->first();
        $userModels = User::where('id_cabang', $id_cab)->where('jabatan', 'AO')->where('status', 'Aktif')->where('email', 'NOT LIKE', '%dummy%')->get();

        $baseQuery  = MonitoringPlanAO::where('nama_ao', $nama)
            ->where('id_cabang', $id_cab)
            ->whereBetween('tgl_plan', [$tgl_awal, $tgl_akhir])
            ->whereIn('nama_ao', $userModels->pluck('nama')->toArray());;

        // Prospek
        $monPro = (clone $baseQuery)->where('kategori_plan', 'Rencana Prospek')
            ->orderBy('tgl_plan', 'asc')->get();

        // Penagihan
        $monPen = (clone $baseQuery)->where('kategori_plan', 'Rencana Penagihan')
            ->orderBy('tgl_plan', 'asc')->get();

        // Lainnya
        $monLan = (clone $baseQuery)->where('kategori_plan', 'Rencana Lainnya')
            ->orderBy('tgl_plan', 'asc')->get();

        $tgl = Carbon::parse($tgl_awal)->Translatedformat('d F Y') . ' s/d ' . Carbon::parse($tgl_akhir)->Translatedformat('d F Y');

        // Log Activity $debitur, $kredit, $status_aksi
        LogActivity::AddLog("(p) Print Rekap Plan AO | Nama AO: {$nama} | Tgl: {$tgl}");

        $pdf = Pdf::loadView(
            'livewire.lainnya.plan-a-o.print-rekap-plan-ao',
            [
                'title' => 'Print Rekap Plan AO -' . $nama,
                'nama' => $nama,
                'tgl' => $tgl,
                'cabang' => $cabang,
                'monPro' => $monPro,
                'monPen' => $monPen,
                'monLan' => $monLan,
            ]
        );
        $pdf->setPaper('Legal', 'landscape')
            ->setOption([
                'isHtml5ParserEnabled' => true,
                'isPhpEnabled' => true,
            ]);

        return $pdf->stream('Rekap Plan AO - ' . $nama . '.pdf');
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
