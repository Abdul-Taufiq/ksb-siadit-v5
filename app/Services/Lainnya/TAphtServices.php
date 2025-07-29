<?php

namespace App\Services\Lainnya;

use App\Models\Output\LogActivity;
use App\Models\Output\TApht;
use App\Models\Output\Version;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class TAphtServices
{
    public function index($data)
    {
        $id_cabang = Auth::user()->id_cabang;

        $tapht = TApht::select('tb_tapht.*')
            ->join(DB::raw('(SELECT MAX(id_tapht) as id FROM tb_tapht GROUP BY kode) as latest'), 'tb_tapht.id_tapht', '=', 'latest.id')
            ->where(function ($q) use ($data) {
                $q->search($data['search']);
            })
            ->when($data['tgl_awal'] && $data['tgl_akhir'], function ($q) use ($data) {
                $awal = Carbon::parse($data['tgl_awal'])->startOfDay();
                $akhir = Carbon::parse($data['tgl_akhir'])->endOfDay();
                $q->whereBetween('tb_tapht.created_at', [$awal, $akhir]);
            })
            ->orderBy('tb_tapht.' . $data['sortBy'], $data['sortDir']);

        // for area 
        if ($id_cabang == 20) {
            if (!empty($data['id_cabang'])) {
                if ($data['id_cabang'] == 'AREA 1' || $data['id_cabang'] == 'AREA 2' || $data['id_cabang'] == 'AREA 3') {
                    $tapht->whereIn('tb_tapht.id_cabang', $data['id_cab_area']);
                } else {
                    $tapht->where('tb_tapht.id_cabang', $data['id_cabang']);
                }
            } else {
                $tapht->whereIn('tb_tapht.id_cabang', $data['id_cab_area']);
            }
        } elseif ($data['id_cabang'] == 'AREA 1' || $data['id_cabang'] == 'AREA 2' || $data['id_cabang'] == 'AREA 3') {
            # code... for pusat
            switch ($data['id_cabang']) {
                case 'AREA 1':
                    # code...
                    $tapht->whereIn('tb_tapht.id_cabang', $data['id_area_1']);
                    break;
                case 'AREA 2':
                    # code...
                    $tapht->whereIn('tb_tapht.id_cabang', $data['id_area_2']);
                    break;
                case 'AREA 3':
                    # code...
                    $tapht->whereIn('tb_tapht.id_cabang', $data['id_area_3']);
                    break;
            }
        } else {
            $tapht->when($data['id_cabang'] != 99, function ($query) use ($data) {
                $query->where('tb_tapht.id_cabang', $data['id_cabang']);
            });
        }


        // paginate
        if ($data['perPage'] == 'All') {
            $total = $tapht->count();
            return $tapht = $tapht->paginate($total > 0 ? $total : 1);
        } else {
            return $tapht = $tapht->paginate($data['perPage']);
        }
    }


    public function addData($data)
    {
        $bulanRom = \Carbon\Carbon::now()->format('m');
        switch ($bulanRom) {
            case 1:
                $bulanRom = "I";
                break;
            case 2:
                $bulanRom = "II";
                break;
            case 3:
                $bulanRom = "III";
                break;
            case 4:
                $bulanRom = "IV";
                break;
            case 5:
                $bulanRom = "V";
                break;
            case 6:
                $bulanRom = "VI";
                break;
            case 7:
                $bulanRom = "VII";
                break;
            case 8:
                $bulanRom = "VIII";
                break;
            case 9:
                $bulanRom = "IX";
                break;
            case 10:
                $bulanRom = "X";
                break;
            case 11:
                $bulanRom = "XI";
                break;
            case 12:
                $bulanRom = "XII";
        }

        $cabang = Auth::user()->cabang->kode_cabang;
        $now = now();
        $thn = $now->year;
        $ambil = TApht::where('kode', 'LIKE', "%/$cabang/REGAPHT/%")
            ->orderBy('created_at', 'desc')
            ->take(1)
            ->get();


        if ($ambil->isEmpty()) {
            $urut = "0001";
            $nomer = $urut . '/' . $cabang . '/REGAPHT/' . $thn;
        } else {
            foreach ($ambil as $item) {
                $cekTahun = substr($item->kode, -4, 4);
                if ($cekTahun != $thn) {
                    $urut = "0001";
                    $nomer = $urut . '/' . $cabang . '/REGAPHT/' . $thn;
                } else {
                    // Ambil 4 karakter pertama dari nomor SPPK
                    $urut = substr($item->kode, 0, 4);
                    // Konversi ke integer dan tambahkan 1
                    $urut = (int)$urut + 1;
                    // Tambahkan nol di depan jika diperlukan, sehingga panjangnya tetap 4 karakter
                    $urut = str_pad($urut, 4, '0', STR_PAD_LEFT);
                    // Buat nomor SPPK baru dengan format yang diinginkan
                    $nomer = $urut . '/' . $cabang . '/REGAPHT/' . $thn;
                }
            }
        }

        // cek data ada atau tidak
        $cekData = TApht::where('sertifikat', $data['sertifikat'])
            ->where('nomor', $data['nomor'])
            ->orderBy('created_at', 'desc')
            ->take(1)
            ->first();

        $tapht = new TApht();
        $tapht->id_cabang = Auth::user()->id_cabang;
        if ($cekData == null || $cekData->status == 'Selesai') {
            $tapht->kode = $nomer;
        } else {
            $tapht->kode = $cekData->kode;
        }
        // $tapht->kode = $cekData == null || $cekData->status == 'Selesai' ? $nomer : $cekData->kode;

        $tapht->sertifikat = $data['sertifikat'];
        $tapht->nomor = $data['nomor'];
        $tapht->jns_perikatan = $data['jns_perikatan'];
        $tapht->progress = $data['progress'];
        $tapht->tgl_awal = $data['inp_tgl_awal'];
        $tapht->tgl_akhir = $data['inp_tgl_akhir'];
        $tapht->keterangan = $data['keterangan'];
        $tapht->status = $data['status_akhir'];
        $tapht->save();

        // Log Aktivitas
        LogActivity::AddLog("(+) Data Tracking APHT | Kode: {$tapht->kode} | Progress: {$tapht->progress}");

        return $tapht;
    }


    public function showEdit($id)
    {
        $tapht = TApht::find(base64_decode($id));
        return [
            'modal_title' => 'Show Data ' . $tapht->kode,
            'nomor' =>  $tapht->nomor,
            'sertifikat' =>  $tapht->sertifikat,
            'jns_perikatan' =>  $tapht->jns_perikatan,
            'progress' =>  $tapht->progress,
            'inp_tgl_awal' =>  $tapht->tgl_awal,
            'inp_tgl_akhir' =>  $tapht->tgl_akhir,
            'keterangan' =>  $tapht->keterangan,
            'status_akhir' =>  $tapht->status_akhir,
        ];
    }



    public function editData($data)
    {
        $tapht = TApht::find(base64_decode($data['id_table']));
        $tapht->sertifikat = $data['sertifikat'];
        $tapht->nomor = $data['nomor'];
        $tapht->jns_perikatan = $data['jns_perikatan'];
        $tapht->progress = $data['progress'];
        $tapht->tgl_awal = $data['inp_tgl_awal'];
        $tapht->tgl_akhir = $data['inp_tgl_akhir'];
        $tapht->keterangan = $data['keterangan'];
        $tapht->status = $data['status_akhir'];
        $tapht->save();

        // Log Aktivitas
        LogActivity::AddLog("(u) Data Tracking APHT | Kode: {$tapht->kode} | Progress: {$tapht->progress}");

        return $tapht;
    }


    public function showData($id)
    {
        $kode = TApht::find(base64_decode($id));
        $data = TApht::where('kode', $kode->kode)->get();

        $nomor = $kode->nomor;
        $cabang = $kode->cabang->cabang;
        $sertifikat = $kode->sertifikat;
        $jabatan = Auth::user()->jabatan;

        // Hitung tanggal 10 hari dari sekarang
        $dateExp = Carbon::now()->addDays(360)->toDateString();

        // Ambil data yang tanggal akhirnya 10 hari atau kurang dari sekarang
        $data = TApht::where('sertifikat', $sertifikat)
            ->where('id_cabang', $kode->id_cabang)
            ->where('nomor', $nomor)
            ->whereDate('tgl_akhir', '<=', $dateExp)
            ->orderByDESC('created_at')
            ->get();

        return view('livewire.lainnya.tapht.show', [
            'title' => 'Show Data ' . $kode->nomor,
            'kode' => $kode->nomor,
            'sertifikat' => $sertifikat,
            'nomor' => $nomor,
            'cabang' => $cabang,
            'jabatan' => $jabatan,
            'data' => $data
        ]);
    }
}
