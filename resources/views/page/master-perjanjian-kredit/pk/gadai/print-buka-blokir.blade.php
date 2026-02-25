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
            font-family: Tahoma;
            /* margin: 26mm 25mm 40mm 25mm; */
            margin: 1.5cm 1.2cm 2.4cm 2.5cm;
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
    <table class="table table-borderless w-100 mb-4">
        <tr>
            <td style="width: 20%; border: none;">
                &nbsp;
            </td>
            <td style="width: 60%; text-align: center !important; vertical-align: middle; border: none;">
                <h3 style="text-decoration: underline">
                    BUKA BLOKIR
                </h3>
                <h3>
                    <b>{{ strtoupper($depo->jns_jaminan) }}</b>
                </h3>
            </td>
            <td style="width: 20%; border: none;">&nbsp;</td>
        </tr>
    </table>

    <p class="mt-3">
        Kepada Yth. <br>
        Pimpinan PT BPR Kusuma Sumbing <br>
        {{ $pkpmk->id_cabang == 1 ? 'Kantor Pusat Operasional' : 'Kantor Cabang ' . ucfirst(strtolower($pkpmk->cabang->alamat)) }}
    </p>

    <p class="mt-3">Dengan Hormat,</p>
    <p class="mt-3">Yang bertanda tangan dibawah ini :</p>
    <table class="table table-sm table-borderless w-100 mb-4" style="margin-left: 15px;">
        <tr>
            <td style="width: 25%;">Nama</td>
            <td style="width: 2%;">:</td>
            <td>{{ $penjamin != null ? $penjamin->nama_penjamin : $debitur->nama_debitur }}</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td>
                @if ($penjamin != null)
                    {{ $penjamin->alamat }}
                @else
                    @if ($debitur->alamat_ktp == $debitur->alamat_rumah)
                        {{ $debitur->alamat_ktp }} RT/RW {{ $debitur->rt_rw_ktp }}, Desa/Kelurahan
                        {{ $debitur->kelurahan }}, Kecamatan {{ $debitur->kecamatan }}, Kabupaten/Kota
                        {{ $debitur->kabupaten }}
                    @else
                        {{ $debitur->alamat_rumah }}
                    @endif
                @endif
            </td>
        </tr>
        <tr>
            <td>No. KTP</td>
            <td>:</td>
            <td>{{ $penjamin != null ? $penjamin->nik : $pkpmk->debitur->nik }}</td>
        </tr>
    </table>

    <p class="mt-3">Selaku pemegang Rekening <b>{{ strtoupper($depo->jns_jaminan) }}</b> :</p>
    <table class="table table-sm table-borderless w-100 mb-4" style="margin-left: 15px;">
        <tr>
            <td style="width: 25%;">Nomor Rekening</td>
            <td style="width: 2%;">:</td>
            <td>{{ $depo->no_rek }}</td>
        </tr>
        <tr>
            <td>Nominal</td>
            <td>:</td>
            <td>{{ 'Rp' . number_format($depo->nominal, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td>Atas Nama</td>
            <td>:</td>
            <td>{{ $depo->atas_nama }}</td>
        </tr>
    </table>

    <p class="mt-3">
        Selanjutnya saya minta kepada PT BPR Kusuma Sumbing
        {{ $pkpmk->id_cabang == 1 ? 'Kantor Pusat Operasional' : 'Kantor Cabang ' . ucfirst(strtolower($pkpmk->cabang->alamat)) }}
        untuk melakukan <b>pembukaan blokir</b> atas
        <b>{{ strtoupper($depo->jns_jaminan) }}</b> tersebut untuk keperluan pelunasan atau/ telah penyelesaian
        Fasilitas Kredit sesuai dengan Perjanjian Kredit
        Nomor {{ $pkpmk->no_pkpmk ?? $pkpmk->no_addendum }}, Tanggal
        {{ $pkpmk->tgl_print_pkpmk?->translatedFormat('d F Y') ?? $pkpmk->tgl_print_addendum?->translatedFormat('d F Y') }}.
    </p>

    <p class="mt-3">
        Demikian permohonan ini kami sampaikan, selanjutnya atas pembukaan blokir rekening tersebut saya bersedia
        menerima dan taat pada ketentuan yang berlaku di PT BPR Kusuma Sumbing serta peraturan perundang-undangan yang
        berlaku.
    </p>

    {{-- TTD --}}
    <br>
    <div style="page-break-inside: avoid">
        <div style="text-align: left;">
            {{ ucfirst(strtolower($pkpmk->cabang->alamat)) }},
            {{ $pkpmk->tgl_print_buka_blokir?->translatedFormat('d F Y') }}
        </div>
        <table style="width: 100%; text-align: center">
            <tr>
                <td>
                    Pemohon,
                </td>
            </tr>
            <tr>
                <td style="width: 45%;   padding: 3px 0; text-align: left;">
                    <br><br><br><br>
                    ( {{ $penjamin != null ? $penjamin->nama_penjamin : $debitur->nama_debitur }} )
                </td>
            </tr>
        </table>
    </div>



    <script type="text/php">
        if (isset($pdf)) {
            $font = $fontMetrics->get_font("tahoma", "normal");
            $size = 9;
            $color = array(0,0,0);

            // buat garis horizontal (x1, y1, x2, y2)
            $pdf->page_line(70, 770, 558, 770, $color, 0.2); 
            // angka terakhir (0.5) = ketebalan garis

            // nomor halaman
            $pdf->page_text(470, 770, "Halaman {PAGE_NUM} dari {PAGE_COUNT}", $fontMetrics->get_font("tahoma","bold"), 10, array(0,0,0));
        }
    </script>

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
