<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link rel="shortcut icon" href="{{ asset('images/logo-ksb.png') }}">
    <link rel="icon" href="{{ asset('images/logo-ksb.png') }}">
    {{-- @include('page.master-kredit.muk.show-scoring.style') --}}
    <link rel="stylesheet" href="{{ public_path('template/css/style-for-print-dompdf.css') }}">

    <style>
        @font-face {
            font-family: "Tahoma";
            font-style: normal;
            font-weight: normal;
            src: url("{{ public_path('fonts/tahoma.ttf') }}") format("truetype");
        }

        body {
            font-family: Tahoma, sans-serif;
            margin: 5mm 2mm 4mm 10mm;
            font-size: 1rem;
            text-align: justify;
        }

        table {
            font-size: 8pt;
        }

        p {
            font-size: 8pt !important;
        }

        b,
        strong {
            font-weight: bolder;
            font-size: 9pt;
        }

        .table b,
        .table strong {
            font-weight: bolder;
            font-size: 8pt;
        }

        .col-md-6 {
            width: 47% !important;
        }

        .col-md-4 {
            width: 30% !important;
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
    </style>
</head>

<body>

    <table class="table table-borderless w-100">
        <td style="width: 70%">
            <div style="font-weight: bold;">
                Nomor MUK:
                {{ $muk->no_muk }}
            </div>
        </td>
        <td style="width: 30%">
            <div class="text-end" style="font-weight: bold">
                Tanggal MUK:
                {{ $muk->tgl_muk->translatedFormat('d F Y') }}
            </div>
        </td>
    </table>

    <div class="card mb-2">
        <div class="card-header bg-success text-white">
            <div class="d-flex justify-content-between">
                <div class="head-judul">I. PERMOHONAN NASABAH</div>
            </div>
        </div>
        <div class="card-body" id="konten1">
            @include('page.master-kredit.muk.show.muk-show-i')
        </div>
    </div>

    <div class="card mb-2">
        <div class="card-header bg-success text-white">
            <div class="d-flex justify-content-between">
                <div class="head-judul">II. DATA PEMOHON</div>
            </div>
        </div>
        <div class="card-body" id="konten2">
            @include('page.master-kredit.muk.show.muk-show-ii')
        </div>
    </div>

    <div class="card mb-2">
        <div class="card-header bg-success text-white">
            <div class="d-flex justify-content-between">
                <div class="head-judul">III. DATA HASIL SLIK</div>
            </div>
        </div>
        <div class="card-body" id="konten3">
            @include('page.master-kredit.muk.show.muk-show-iii')
        </div>
    </div>

    <div class="card mb-2">
        <div class="card-header bg-success text-white">
            <div class="d-flex justify-content-between">
                <div class="head-judul">IV. DATA KEUANGAN</div>
            </div>
        </div>
        <div class="card-body">
            @include('page.master-kredit.muk.show.muk-show-iv')
        </div>
    </div>

    <div class="card mb-2">
        <div class="card-header bg-success text-white">
            <div class="d-flex justify-content-between">
                <div class="head-judul">V. WORKING INVESTMENT/KECUKUPAN MODAL KERJA</div>
            </div>
        </div>
        <div class="card-body">
            @include('page.master-kredit.muk.show.muk-show-v')
        </div>
    </div>

    <div class="card mb-2">
        <div class="card-header bg-success text-white">
            <div class="d-flex justify-content-between">
                <div class="head-judul">VI. DATA MANAGEMENT</div>
            </div>
        </div>
        <div class="card-body">
            @include('page.master-kredit.muk.show.muk-show-vi')
        </div>
    </div>

    <div class="card mb-2">
        <div class="card-header bg-success text-white">
            <div class="d-flex justify-content-between">
                <div class="head-judul">VII. ANALISA INDUSTRI</div>
            </div>
        </div>
        <div class="card-body">
            @include('page.master-kredit.muk.show.muk-show-vii')
        </div>
    </div>

    <div class="card mb-2" style="page-break-inside: avoid;">
        <div class="card-header bg-success text-white">
            <div class="d-flex justify-content-between">
                <div class="head-judul">VIII. DATA AGUNAN</div>
            </div>
        </div>
        <div class="card-body">
            @include('page.master-kredit.muk.show.muk-show-viii')
        </div>
    </div>

    <div class="card mb-2" style="page-break-before: always; page-break-after: always;">
        <div class="card-header bg-success text-white">
            <div class="d-flex justify-content-between">
                <div class="head-judul">IX. PENYIMPANGAN/DEVIASI</div>
            </div>
        </div>
        <div class="card-body">
            @include('page.master-kredit.muk.show.muk-show-ix')
        </div>
    </div>

    <div class="card mb-2">
        <div class="card-header bg-success text-white">
            <div class="d-flex justify-content-between">
                <div class="head-judul">X. USULAN/REKOMENDASI</div>
            </div>
        </div>
        <div class="card-body">
            @include('page.master-kredit.muk.show.muk-show-x')
        </div>
    </div>

    <div class="card mb-2">
        <div class="card-header bg-success text-white">
            <div class="d-flex justify-content-between">
                <div class="head-judul">XI. PUTUSAN</div>
            </div>
        </div>
        <div class="card-body">
            @include('page.master-kredit.muk.show.muk-show-xi')
        </div>
    </div>

    {{-- footer --}}
    <script type="text/php">
        if (isset($pdf)) {
                $x = 480;
                $y = 810;
                $text = "Halaman {PAGE_NUM} dari {PAGE_COUNT}";
                $font = null;
                $size = 10;
                $color = array(0,0,0);
                $word_space = 0.0;  //  default
                $char_space = 0.0;  //  default
                $angle = 0.0;   //  default
                $pdf->page_text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);
            }
    </script>
    {{-- end footer --}}
</body>

</html>
