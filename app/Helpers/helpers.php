<?php

use Riskihajar\Terbilang\Facades\Terbilang;

if (!function_exists('terbilang_id')) {
    function terbilang_id($nilai, $prefix = '', $suffix = ' rupiah')
    {
        return ucwords($prefix . Terbilang::make($nilai, $suffix));
    }
}

// selain RP
if (!function_exists('terbilang_only')) {
    function terbilang_only($nilai, $prefix = '', $suffix = '')
    {
        return ucwords($prefix . Terbilang::make($nilai, $suffix));
    }
}

if (!function_exists('persen_id')) {
    function persen_id($nilai, $prefix = '', $suffix = ' persen')
    {
        // Ubah angka ke format string dua digit desimal, misal 12.5 → ['12', '50']
        $explode = explode('.', number_format($nilai, 2, '.', ''));
        $hasil = '';

        // Bilangan bulat
        if (isset($explode[0]) && (int)$explode[0] >= 0) {
            $hasil .= Terbilang::make($explode[0]);
        }

        // Bilangan desimal
        if (isset($explode[1]) && (int)$explode[1] > 0) {
            $hasil .= ' Koma ' . Terbilang::make($explode[1]); // gunakan full angka desimal
        }

        return ucwords(trim($prefix . $hasil . $suffix));
    }
}




//  Daftarkan Helper di composer.json
// Agar Laravel bisa mengenali file helper itu, buka composer.json dan tambahkan di autoload:
// "autoload": {
//     "files": [
//         "app/Helpers/helpers.php"
//     ]
// }


// 4. Jalankan Autoload Dump
// composer dump-autoload



// ✅ Cara Menggunakannya
// Di Controller:
// $hasil = terbilang_id(12500000);
// // Output: "Dua Belas Juta Lima Ratus Ribu Rupiah"
// {{ terbilang_id($muk->kredit->jumlah_pengajuan) }}
