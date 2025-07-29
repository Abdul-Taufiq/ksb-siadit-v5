<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }}</title>
    <link rel="shortcut icon" href="{{ public_path('images/logo-ksb.png') }}">
    <link rel="icon" href="{{ public_path('images/logo-ksb.png') }}">
    {{-- @include('page.master-kredit.muk.show-scoring.style') --}}
    <link rel="stylesheet" href="{{ public_path('template/css/style-for-print-dompdf.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('template/css/style-for-print-dompdf.css') }}"> --}}

    <style>
        @font-face {
            font-family: "Tahoma";
            font-style: normal;
            font-weight: normal;
            src: url("{{ public_path('fonts/tahoma.ttf') }}") format("truetype");
        }

        @font-face {
            font-family: "Tahoma";
            font-style: normal;
            font-weight: bold;
            src: url("{{ public_path('fonts/tahomabd.ttf') }}") format("truetype");
        }

        body {
            font-family: Tahoma, sans-serif;
            margin: 15mm 25mm 15mm 25mm;
            font-size: 11pt;
            text-align: justify !important;
        }

        table {
            font-size: 11pt !important;
            text-align: justify !important;
            color: black !important;
        }

        p {
            font-size: 11pt !important;
        }

        h3 {
            font-size: 12pt !important;
            /* line-height: 0px !important; */
            margin-bottom: -5px !important;
            font-weight: bold !important;
        }

        .header {
            text-align: center;
            margin-bottom: 10px;
            page-break-after: avoid;
        }

        .col-md-6 {
            width: 50% !important;
            padding-left: 0px !important;
            padding-right: 0px !important;
        }

        .col-md-4 {
            width: 30% !important;
        }

        .col-md-1 {
            width: 5% !important;
            padding-left: 0.1rem !important;
            padding-right: 0.4rem !important;
            padding-bottom: 0.10rem !important;
        }

        .col-md-11 {
            width: 93.8% !important;
            padding: 0rem 0rem 0.15rem 0rem !important;
        }

        .row {
            page-break-inside: avoid;
        }

        td ol {
            list-style-type: decimal !important;
            /* Pastikan angka tetap muncul */
            padding-left: 20px !important;
            /* Sesuaikan indentasi */
        }

        td ul {
            list-style-type: disc !important;
            /* Pastikan bullet tetap muncul */
            padding-left: 20px !important;
        }

        .table-borderless tbody+tbody,
        .table-borderless td,
        .table-borderless th {
            border: none !important;
            padding-right: 0px !important;
            padding-left: 0px !important;
            padding-bottom: 0.10rem !important;
            text-align: justify !important;
        }

        .list {
            margin-left: 5rem !important;
        }

        .premis-jaminan {
            margin-left: 2.1rem;
        }
    </style>
</head>

<body>

    <table class="table table-borderless w-100 mb-2">
        <tr>
            <td style="width: 25%; border: none;">
                <img style="width: 65px;"
                    src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/images/icon_logo.png'))) }}">
            </td>
            <td style="width: 50%; text-align: center !important; vertical-align: middle; border: none;">
                <h3>
                    <b>SURAT PERNYATAAN</b> <br>
                    <b>TIDAK MENGIKUTI ASURANSI</b>
                </h3>
            </td>
            <td style="width: 25%; border: none;">&nbsp;</td>
        </tr>
    </table>


    {{-- Pembukaan --}}
    <div class="">
        Yang bertanda tangan dibawah ini:
        <div class="headlist">
            <div class="desk">
                <table style="margin-left: 5mm;">
                    <tr>
                        <td style="width: 25%">Nama</td>
                        <td style="width: 1%">:</td>
                        <td>
                            {{ $kredit->debitur->nama_debitur }}
                        </td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td style="width: 1%">:</td>
                        <td>
                            {{ $kredit->debitur->alamat_ktp }}, RT/RW {{ $kredit->debitur->rt_rw_ktp }}, Kel.
                            {{ $kredit->debitur->kelurahan }}
                            Kec. {{ $kredit->debitur->kecamatan }}, Kab/Kota. {{ $kredit->debitur->kabupaten }}
                        </td>
                    </tr>
                    <tr>
                        <td>Pekerjaan</td>
                        <td>:</td>
                        <td>
                            {{ $kredit->debitur->pekerjaan }}
                        </td>
                    </tr>
                </table>

                @if ($kredit->debitur->status_pernikahan == 'Menikah')
                    <table>
                        <tr>
                            <td style="width: 40mm">Nama</td>
                            <td>:</td>
                            <td>
                                {{ $kredit->debitur->nama_pasangan }}
                            </td>
                        </tr>
                        <tr>
                            <td>Tempat, tgl lahir</td>
                            <td>:</td>
                            <td>
                                {{ $kredit->debitur->tempat_lahir_pasangan }},
                                {{ Carbon\Carbon::parse($kredit->debitur->tgl_lahir_pasangan)->translatedFormat('d F Y') }}
                            </td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td>
                                {{ $kredit->debitur->alamat_pasangan }}
                            </td>
                        </tr>
                        <tr>
                            <td>NIK</td>
                            <td>:</td>
                            <td>
                                {{ $kredit->debitur->nik_pasangan }}
                            </td>
                        </tr>
                        <tr>
                            <td>Pekerjaan</td>
                            <td>:</td>
                            <td>
                                {{ $kredit->debitur->pekerjaan_pasangan }}
                            </td>
                        </tr>
                    </table>
                @endif
            </div>
        </div>

        <br>
        Dengan ini menyatakan untuk tidak mengikuti asuransi jiwa maupun asuransi terhadap barang jaminan atas
        fasilitas pinjaman saya pada <b>PT BPR KUSUMA SUMBING</b> sebagaimana tercantum dalam
        Perjanjian Kredit Nomor
        {{ $kredit->kategori_spk == 'SPK' ? $pkpmk->no_pkpmk : $pkpmk->no_addendum }} tanggal
        {{ $kredit->kategori_spk == 'SPK' ? $pkpmk->tgl_pkpmk->translatedFormat('d F Y') : $pkpmk->tgl_addendum->translatedFormat('d F Y') }}
        dengan plafond sebesar {{ 'Rp' . number_format($kredit->jumlah_disetujui, 0, ',', '.') }}
        ({{ terbilang_id($kredit->jumlah_disetujui) }})
        .
    </div>

    {{-- TTD --}}
    <br>
    <div style="page-break-inside: avoid">
        <div style="text-align: left;">
            {{-- {{ ucfirst($alamat) }}, --}}
            {{ $kredit->cabang->alamat }},
            {{ $kredit->kategori_spk == 'SPK' ? $pkpmk->tgl_print_sp_agunan->translatedFormat('d F Y') : $pkpmk->tgl_print_sp_agunan->translatedFormat('d F Y') }}
        </div>
        <br>
        <br>
        <br>
        <br>
        <div style="text-align: left;">
            ({{ strtoupper($kredit->debitur->nama_debitur) }})
        </div>

    </div>


    {{-- <script type="text/php">
        if (isset($pdf)) {
                $x = 480;
                $y = 810;
                $text = "Halaman {PAGE_NUM} dari {PAGE_COUNT}";
                $font = $fontMetrics->get_font("tahoma", "bold");
                $size = 10;
                $color = array(0,0,0);
                $word_space = 0.0;  //  default
                $char_space = 0.0;  //  default
                $angle = 0.0;   //  default
                $pdf->page_text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);
            }
        </script> --}}

</body>

</html>
