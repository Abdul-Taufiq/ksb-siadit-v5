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

    {{-- agunan tanah --}}
    @switch($tipe_agunan)
        @case('Tanah')
            @include('page.master-kredit.muk.show-scoring.tanah-scoring')
        @break

        @case('Kendaraan')
            @include('page.master-kredit.muk.show-scoring.kendaraan-scoring')
        @break

        @case('Deposito')
            @if ($depo->jns_jaminan == 'Deposito')
                @include('page.master-kredit.muk.show-scoring.depo-scoring')
            @else
                @include('page.master-kredit.muk.show-scoring.tabu-scoring')
            @endif
        @break

    @endswitch


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
