<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }}</title>
    <link rel="shortcut icon" href="{{ asset('images/logo-ksb.png') }}">
    <link rel="icon" href="{{ asset('images/logo-ksb.png') }}">
    {{-- @include('page.master-kredit.muk.show-scoring.style') --}}
    {{-- <link rel="stylesheet" href="{{ public_path('template/css/style-for-print-dompdf.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('template/css/style-for-print-dompdf.css') }}"> --}}
    {{-- bootsrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

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
            margin: 0cm 1.2cm 0cm 0cm;
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
            margin-bottom: 0px !important;
            font-weight: bold !important;
        }

        .header {
            text-align: center;
            margin-bottom: 5px;
        }

        .col-md-6 {
            width: 47% !important;
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
            margin-left: 6.2rem !important;
        }

        .premis-jaminan {
            margin-left: 5.1rem;
        }

        .btn-print {
            position: fixed;
            width: 100%;
            background-color: rgb(53, 53, 53);
        }

        /* css saat di cetak */
        @media print {
            body {
                font-family: Tahoma, sans-serif;
                font-size: 11pt;
                line-height: 2;
                text-align: justify;
                /* margin: 10mm 5mm 10mm 10mm; */
            }


            p {
                margin-bottom: 0px;
                /* Justify paragraph */
            }

            table td {
                vertical-align: top;
            }

            /* .col-md-6 {
                float: left;
                width: 50%;
            } */

            .btn-print {
                display: none !important;
            }

            .zonk {
                display: none !important;
            }
        }
    </style>
</head>

<body>

    <div class="btn-print">
        <div class="d-flex justify-content-between m-2">
            <p style="color: white; margin-top: 10px; margin-left: 10px; font-size:14px;">
                <b>PERJANJIAN KREDIT</b>
                {{ $pkpmk->debitur->nama_debitur }}
            </p>
            <a type="button" class="btn btn-info btn-icon-text btn-rounded" onClick="window.print();return false">
                <i class="bi bi-file-earmark-arrow-down-fill"></i>
                <b>Preview PERJANJIAN KREDIT</b>
            </a>
        </div>
    </div>
    <div class="zonk" style="height: 55px;">&nbsp;</div>

    <div style="margin: 10mm 5mm 10mm 15mm">
        @include('page.master-perjanjian-kredit.pk.pasal.header-&-premis')
        <i class="text-danger">This Page Preview</i>
        @include('page.master-perjanjian-kredit.pk.pasal.pasal-I-sd-pasal-IV')
        <i class="text-danger">This Page Preview</i>
        @include('page.master-perjanjian-kredit.pk.pasal.pasal-V')
        <i class="text-danger">This Page Preview</i>
        @include('page.master-perjanjian-kredit.pk.pasal.pasal-VI-sd-pasal-X')
        <i class="text-danger">This Page Preview</i>
        @include('page.master-perjanjian-kredit.pk.pasal.pasal-XI-sd-pasal-ends')
        <i class="text-danger">This Page Preview</i>
    </div>

    {{-- footer --}}
    {{-- <script type="text/php">
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
    </script> --}}
    {{-- end footer --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
