<?php

namespace App\Http\Controllers;

use App\Models\MasterKredit\Kredit;
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
}
