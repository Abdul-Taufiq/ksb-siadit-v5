<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Maatwebsite\Excel\Facades\Excel;
use Mpdf\Mpdf;

class MasterUserController extends Controller
{
    public function index()
    {
        return view('page.master-user.index', [
            'title' => 'Master User',
            'code_page' => 'index'
        ]);
    }


    public function show($id)
    {
        $Ids = Crypt::decrypt($id);
        $user = User::find($Ids);
        return view('page.master-user.show', compact('user'), [
            'title' => 'Detail User',
        ]);
    }


    public function deleted()
    {
        return view('page.master-user.index', [
            'title' => 'User Terhapus',
            'code_page' => 'deleted'
        ]);
    }


    // export excel
    public function exportExcel()
    {
        return Excel::download(new UsersExport, 'data-user.xlsx');
    }
    // export pdf
    public function exportPdf()
    {
        $mpdf = new Mpdf([
            'mode' => 'utf-8',
            'orientation' => 'L', // Orientasi kertas: L (Landscape) atau P (Portrait)
            'format' => [210, 297], // ukuran kertas dalam mm (format Lebar x Tinggi)
            'margin_left' => 10,
            'margin_right' => 10,
            'margin_top' => 10,
            'margin_bottom' => 15,
            'margin_header' => 0,
            'margin_footer' => 10,
            'default_font_size' => 14,
            'default_font' => 'Arial',
            'defaultfooterline' => false, // Nonaktifkan garis pemisah footer
            // untuk import style font dan wajib import disini
            // vendor/mpdf/mpdf/ttfonts
            // - tahoma.ttf untuk font reguler.
            // - tahomabd.ttf untuk font bold.

            // 'fontdata'  => [
            //     'tahoma' => [
            //         'R' => 'tahoma.ttf',
            //         'B' => 'tahomabd.ttf'
            //     ]
            // ]
        ]);

        // Tambahkan footer dengan penomoran halaman
        $mpdf->SetFooter('<div style="font-weight: bold; font-style: none; font-size: 10pt;">Halaman {PAGENO} dari {nbpg}</div>');

        $users = User::with('UserDetails')
            ->where('users.is_deleted', 'false')
            ->get();

        $mpdf->WriteHTML(view('page.master-user.export', compact('users')));
        $mpdf->Output('data-user.pdf', 'I');

        // return view('page.master-user.export', [
        //     'users' => User::with('UserDetails')
        //         ->where('users.is_deleted', 'false')
        //         ->get()
        // ]);
    }
}
