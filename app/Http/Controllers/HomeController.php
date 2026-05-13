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


    public function index()
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

        $spk = Kredit::whereIn('id_cabang', $id_cabang)->get();
        $spkSlik = Kredit::whereIn('id_cabang', $id_cabang)
            ->where('status_akhir', 'DITOLAK')
            ->where('catatan_ao', 'like', '%slik jelek%')
            ->get();

        return view('page.home.home', [
            'title' => 'Dashboard',
            'spk' => $spk,
            'spkSlik' => $spkSlik,
            'kode' => $kode,
            'id_cabang' => $id_cabang,
            'area1' => $area1 ?? null,
            'area2' => $area2 ?? null,
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
