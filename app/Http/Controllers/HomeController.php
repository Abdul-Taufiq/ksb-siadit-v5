<?php

namespace App\Http\Controllers;

use App\Models\Cabang;
use App\Models\MasterKredit\Kredit;
use App\Models\MasterMUK\Muk;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index($min = null, $max = null)
    {
        $user = Auth::user();
        switch ($user->level) {
            case 'DIREKTUR':
            case 'SUPER USER':
                $id_cabang = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11];
                $area1 = [4, 5, 6, 7, 8, 9];
                $area2 = [1, 2, 3, 10, 11];
                $kode = 'PUSAT';
                break;

            case 'AREA 1':
                $id_cabang = [4, 5, 6, 7, 8, 9];
                $kode = 'AREA 1';
                break;

            case 'AREA 2':
                $id_cabang = [1, 2, 3, 10, 11];
                $kode = 'AREA 2';
                break;

            case 'AREA 3':
                $id_cabang = [4, 5, 6, 8, 9];
                $kode = 'AREA 3';
                break;

            default:
                $id_cabang = [$user->id_cabang];
                $kode = 'CABANG';
                break;
        }

        $cabangList = [
            1  => 'KPO',
            2  => 'KC TEMANGGUNG',
            3  => 'KC WONOSOBO',
            4  => 'KC AMBARAWA',
            5  => 'KC SEMARANG',
            6  => 'KC MRANGGEN',
            7  => 'KC SUKOREJO',
            8  => 'KC WELERI',
            9  => 'KC DELANGGU',
            10 => 'KC GOMBONG',
            11 => 'KC SOKARAJA',
        ];

        if ($min != null) {
            $awal = Carbon::parse($min)->startOfDay();
            $akhir = Carbon::parse($max)->endOfDay();

            $statistik = Kredit::selectRaw("
                            id_cabang,
                            COUNT(*) total,
                            SUM(status_akhir='DISETUJUI') disetujui,
                            SUM(status_akhir='DISETUJUI (TIDAK DIAMBIL)') tidak_diambil,
                            SUM(status_akhir='DEBITUR CANCEL') cancel,
                            SUM(status_kredit='SELESAI') selesai,
                            SUM(status_akhir='PROSES') proses,
                            SUM(status_akhir='DITOLAK') ditolak,
                            SUM(status_akhir='DITOLAK' AND catatan_ao LIKE '%slik jelek%') slik
                    ")
                ->whereIn('id_cabang', $id_cabang)
                ->whereBetween('created_at', [$awal, $akhir])
                ->groupBy('id_cabang')
                ->get()
                ->keyBy('id_cabang');
        } else {
            $statistik = Kredit::selectRaw("
                            id_cabang,
                            COUNT(*) total,
                            SUM(status_akhir='DISETUJUI') disetujui,
                            SUM(status_akhir='DISETUJUI (TIDAK DIAMBIL)') tidak_diambil,
                            SUM(status_akhir='DEBITUR CANCEL') cancel,
                            SUM(status_kredit='SELESAI') selesai,
                            SUM(status_akhir='PROSES') proses,
                            SUM(status_akhir='DITOLAK') ditolak,
                            SUM(status_akhir='DITOLAK' AND catatan_ao LIKE '%slik jelek%') slik
                    ")
                ->whereIn('id_cabang', $id_cabang)
                ->groupBy('id_cabang')
                ->get()
                ->keyBy('id_cabang');
        }

        $cards = [];
        switch ($kode) {
            case 'PUSAT':
                $cards[] = [
                    'nomor' => '#. INFO SPK ALL CABANG',
                    'ids' => $id_cabang,
                ];
                $cards[] = [
                    'nomor' => '#. INFO SPK ALL CABANG AREA 1',
                    'ids' => $area1,
                ];
                $cards[] = [
                    'nomor' => '#. INFO SPK ALL CABANG AREA 2',
                    'ids' => $area2,
                ];
                foreach ($cabangList as $id => $nama) {
                    $cards[] = [
                        'nomor' => "$id. INFO SPK $nama",
                        'ids' => [$id],
                    ];
                }
                break;

            case 'AREA 1':
            case 'AREA 2':
                $cards[] = [
                    'nomor' => "#. INFO SPK ALL CABANG {$kode}",
                    'ids' => $id_cabang,
                ];

                $no = 1;
                foreach ($id_cabang as $id) {
                    $cards[] = [
                        'nomor' => "$no. INFO SPK {$cabangList[$id]}",
                        'ids' => [$id],
                    ];
                    $no++;
                }
                break;
            default:
                $id = $id_cabang[0];
                $cards[] = [
                    'nomor' => 'INFO SPK ' . $cabangList[$id],
                    'ids' => [$id],
                ];
                break;
        }

        foreach ($cards as &$card) {
            $total = [
                'total' => 0,
                'disetujui' => 0,
                'tidak_diambil' => 0,
                'cancel' => 0,
                'selesai' => 0,
                'proses' => 0,
                'ditolak' => 0,
                'slik' => 0,
            ];
            foreach ($card['ids'] as $id) {
                if (!isset($statistik[$id]))
                    continue;
                $s = $statistik[$id];
                $total['total'] += $s->total;
                $total['disetujui'] += $s->disetujui;
                $total['tidak_diambil'] += $s->tidak_diambil;
                $total['cancel'] += $s->cancel;
                $total['selesai'] += $s->selesai;
                $total['proses'] += $s->proses;
                $total['ditolak'] += $s->ditolak;
                $total['slik'] += $s->slik;
            }
            $card['stat'] = $total;
        }

        return view('page.home.home', [
            'title' => 'Dashboard',
            'cards' => $cards,
            'kode' => $kode,
            'min' => $min ?? null,
            'max' => $max ?? null,
        ]);
    }


    public function tester()
    {
        $bulanRom = now()->format('m');
        $id_cabang = Auth::user()->id_cabang;
        $cabang_search = Cabang::where('id_cabang', $id_cabang)->first();
        $cabang = $cabang_search->kode_spk;
        $now = Carbon::now();
        $thn = $now->year;
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

        // dd($cabang);
        $ambil = Muk::where('no_muk', 'LIKE', "%/KSB.$cabang/MUK-KRD/%")
            ->where('no_muk', 'NOT LIKE', "%/KSB.$cabang/MUK-KRD/R/%")
            ->where('no_muk', 'NOT LIKE', "%/KSB.$cabang/MUK-KRD/NR/%")
            ->orderBy('created_at', 'desc')
            ->take(1)
            ->get();
        if ($ambil->isEmpty()) {
            $urut = "001";
            $nomer = $urut . '/KSB.' . $cabang . '/MUK-KRD/' . $bulanRom . '/' . $thn;
        } else {
            foreach ($ambil as $item) {
                $cekTahun = substr($item->no_muk, -4, 4);
                if ($cekTahun != $thn) {
                    $urut = "001";
                    $nomer = $urut . '/KSB.' . $cabang . '/MUK-KRD/' . $bulanRom . '/' . $thn;
                } else {
                    $urut = substr($item->no_muk, 0, 3);
                    $urut = (int)$urut + 1;
                    $urut = str_pad($urut, 3, '0', STR_PAD_LEFT); // Menggunakan str_pad untuk menambahkan nol di depan
                    $nomer = $urut . '/KSB.' . $cabang . '/MUK-KRD/' . $bulanRom . '/' . $thn;
                }
            }
        }
        dd($nomer);
    }
}
