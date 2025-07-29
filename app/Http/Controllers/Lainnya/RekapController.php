<?php

namespace App\Http\Controllers\Lainnya;

use App\Http\Controllers\Controller;
use App\Models\Cabang;
use App\Models\MasterKredit\Kredit;
use App\Models\Output\LogActivity;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RekapController extends Controller
{
    public function printPenilaianAO($id, $min, $max)
    {
        $awal = Carbon::parse($min)->startOfDay();
        $akhir = Carbon::parse($max)->endOfDay();
        $id_cabang = base64_decode($id);

        // Area 1
        if ($id_cabang == 21) {
            $kredit = Kredit::with('cabang')->select(
                'petugas_penerima',
                'id_cabang',
                DB::raw('COUNT(*) as total_data'),
                DB::raw('SUM(CASE WHEN status_akhir = "DISETUJUI" THEN jumlah_disetujui ELSE 0 END) as total_disetujui'),
                DB::raw('SUM(CASE WHEN status_akhir = "DITOLAK" THEN jumlah_disetujui ELSE 0 END) as total_ditolak'),
                DB::raw('SUM(CASE WHEN status_akhir = "DISETUJUI (TIDAK DIAMBIL)" THEN jumlah_disetujui ELSE 0 END) as total_tidak_diambil'),
                DB::raw('SUM(CASE WHEN status_akhir = "PROSES" THEN 1 ELSE 0 END) as jumlah_diproses'),
                DB::raw('SUM(CASE WHEN status_akhir = "DITOLAK" THEN 1 ELSE 0 END) as jumlah_ditolak'),
                DB::raw('SUM(CASE WHEN status_akhir = "DISETUJUI" THEN 1 ELSE 0 END) as jumlah_disetujui'),
                DB::raw('SUM(CASE WHEN status_akhir = "DISETUJUI (TIDAK DIAMBIL)" THEN 1 ELSE 0 END) as jumlah_tidak_diambil')
            )
                ->whereBetween('created_at', [$awal, $akhir])
                ->whereIn('id_cabang', [4, 5, 6, 8, 11])
                ->orderBy('id_cabang', 'ASC')
                ->orderBy('petugas_penerima', 'ASC')

                ->groupBy('petugas_penerima', 'id_cabang')
                ->get();

            $cabang = 'AREA 1';
        }
        // area 2
        elseif ($id_cabang == 22) {
            $kredit = Kredit::with('cabang')->select(
                'petugas_penerima',
                'id_cabang',
                DB::raw('COUNT(*) as total_data'),
                DB::raw('SUM(CASE WHEN status_akhir = "DISETUJUI" THEN jumlah_disetujui ELSE 0 END) as total_disetujui'),
                DB::raw('SUM(CASE WHEN status_akhir = "DITOLAK" THEN jumlah_disetujui ELSE 0 END) as total_ditolak'),
                DB::raw('SUM(CASE WHEN status_akhir = "DISETUJUI (TIDAK DIAMBIL)" THEN jumlah_disetujui ELSE 0 END) as total_tidak_diambil'),
                DB::raw('SUM(CASE WHEN status_akhir = "PROSES" THEN 1 ELSE 0 END) as jumlah_diproses'),
                DB::raw('SUM(CASE WHEN status_akhir = "DITOLAK" THEN 1 ELSE 0 END) as jumlah_ditolak'),
                DB::raw('SUM(CASE WHEN status_akhir = "DISETUJUI" THEN 1 ELSE 0 END) as jumlah_disetujui'),
                DB::raw('SUM(CASE WHEN status_akhir = "DISETUJUI (TIDAK DIAMBIL)" THEN 1 ELSE 0 END) as jumlah_tidak_diambil')
            )
                ->whereBetween('created_at', [$awal, $akhir])
                ->whereIn('id_cabang', [1, 2, 7, 9])
                ->orderBy('id_cabang', 'ASC')
                ->orderBy('petugas_penerima', 'ASC')

                ->groupBy('petugas_penerima', 'id_cabang')
                ->get();

            $cabang = 'AREA 2';
        }
        // area 3
        elseif ($id_cabang == '23') {
            $kredit = Kredit::with('cabang')->select(
                'petugas_penerima',
                'id_cabang',
                DB::raw('COUNT(*) as total_data'),
                DB::raw('SUM(CASE WHEN status_akhir = "DISETUJUI" THEN jumlah_disetujui ELSE 0 END) as total_disetujui'),
                DB::raw('SUM(CASE WHEN status_akhir = "DITOLAK" THEN jumlah_disetujui ELSE 0 END) as total_ditolak'),
                DB::raw('SUM(CASE WHEN status_akhir = "DISETUJUI (TIDAK DIAMBIL)" THEN jumlah_disetujui ELSE 0 END) as total_tidak_diambil'),
                DB::raw('SUM(CASE WHEN status_akhir = "PROSES" THEN 1 ELSE 0 END) as jumlah_diproses'),
                DB::raw('SUM(CASE WHEN status_akhir = "DITOLAK" THEN 1 ELSE 0 END) as jumlah_ditolak'),
                DB::raw('SUM(CASE WHEN status_akhir = "DISETUJUI" THEN 1 ELSE 0 END) as jumlah_disetujui'),
                DB::raw('SUM(CASE WHEN status_akhir = "DISETUJUI (TIDAK DIAMBIL)" THEN 1 ELSE 0 END) as jumlah_tidak_diambil')
            )
                ->whereBetween('created_at', [$awal, $akhir])
                ->whereIn('id_cabang', [3, 10])
                ->orderBy('id_cabang', 'ASC')
                ->orderBy('petugas_penerima', 'ASC')

                ->groupBy('petugas_penerima', 'id_cabang')
                ->get();

            $cabang = 'AREA 3';
        }
        // Pusat
        elseif ($id_cabang == '99') {
            $kredit = Kredit::with('cabang')->select(
                'petugas_penerima',
                'id_cabang',
                DB::raw('COUNT(*) as total_data'),
                DB::raw('SUM(CASE WHEN status_akhir = "DISETUJUI" THEN jumlah_disetujui ELSE 0 END) as total_disetujui'),
                DB::raw('SUM(CASE WHEN status_akhir = "DITOLAK" THEN jumlah_disetujui ELSE 0 END) as total_ditolak'),
                DB::raw('SUM(CASE WHEN status_akhir = "DISETUJUI (TIDAK DIAMBIL)" THEN jumlah_disetujui ELSE 0 END) as total_tidak_diambil'),
                DB::raw('SUM(CASE WHEN status_akhir = "PROSES" THEN 1 ELSE 0 END) as jumlah_diproses'),
                DB::raw('SUM(CASE WHEN status_akhir = "DITOLAK" THEN 1 ELSE 0 END) as jumlah_ditolak'),
                DB::raw('SUM(CASE WHEN status_akhir = "DISETUJUI" THEN 1 ELSE 0 END) as jumlah_disetujui'),
                DB::raw('SUM(CASE WHEN status_akhir = "DISETUJUI (TIDAK DIAMBIL)" THEN 1 ELSE 0 END) as jumlah_tidak_diambil')
            )
                ->whereBetween('created_at', [$awal, $akhir])
                ->orderBy('id_cabang', 'ASC')
                ->orderBy('petugas_penerima', 'ASC')

                ->groupBy('petugas_penerima', 'id_cabang')
                ->get();

            $cabang = 'AREA 3';
        }
        // cabang
        else {
            $kredit = Kredit::with('cabang')->select(
                'petugas_penerima',
                'id_cabang',
                DB::raw('COUNT(*) as total_data'),
                DB::raw('SUM(CASE WHEN status_akhir = "DISETUJUI" THEN jumlah_disetujui ELSE 0 END) as total_disetujui'),
                DB::raw('SUM(CASE WHEN status_akhir = "DITOLAK" THEN jumlah_disetujui ELSE 0 END) as total_ditolak'),
                DB::raw('SUM(CASE WHEN status_akhir = "DISETUJUI (TIDAK DIAMBIL)" THEN jumlah_disetujui ELSE 0 END) as total_tidak_diambil'),
                DB::raw('SUM(CASE WHEN status_akhir = "PROSES" THEN 1 ELSE 0 END) as jumlah_diproses'),
                DB::raw('SUM(CASE WHEN status_akhir = "DITOLAK" THEN 1 ELSE 0 END) as jumlah_ditolak'),
                DB::raw('SUM(CASE WHEN status_akhir = "DISETUJUI" THEN 1 ELSE 0 END) as jumlah_disetujui'),
                DB::raw('SUM(CASE WHEN status_akhir = "DISETUJUI (TIDAK DIAMBIL)" THEN 1 ELSE 0 END) as jumlah_tidak_diambil')
            )

                ->whereBetween('created_at', [$awal, $akhir])
                ->where('id_cabang', $id_cabang)
                ->orderBy('id_cabang', 'ASC')
                ->orderBy('petugas_penerima', 'ASC')

                ->groupBy('petugas_penerima', 'id_cabang')
                ->get();

            $cabang = Cabang::find($id_cabang)->cabang;
        }

        $number_file = Str::random(5);
        $tgl_awal = Carbon::parse($min)->translatedFormat('d M Y');
        $tgl_akhir = Carbon::parse($max)->translatedFormat('d M Y');

        // log activity
        $log = new LogActivity();
        $log->id_cabang = Auth::user()->id_cabang;
        $log->username = Auth::user()->nama;
        $log->email = Auth::user()->email;
        $log->jabatan = Auth::user()->jabatan;
        $log->aksi = "Printed Rekap Data";
        $log->save();

        $pdf = Pdf::loadView(
            'livewire.rekap.print-skor-ao',
            [
                'title' => 'Print Data SPPK',
                'kredit' => $kredit,
                'cabang' => $cabang,
                'tgl_awal' => $tgl_awal,
                'tgl_akhir' => $tgl_akhir,
            ]
        );
        $pdf->setPaper('Legal', 'landscape')
            ->setOption([
                'isHtml5ParserEnabled' => true,
                'isPhpEnabled' => true,
            ]);

        return $pdf->stream('Data Rekap ' . $number_file . '.pdf');
    }
}
