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
    @foreach ($kendaraan as $kenda)
        <table class="table table-borderless w-100 mb-2">
            <tr>
                <td style="width: 25%; border: none;">
                    <img style="width: 65px;"
                        src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/images/icon_logo.png'))) }}">
                </td>
                <td style="width: 50%; text-align: center !important; vertical-align: middle; border: none;">
                    <h3>
                        <u>SURAT PERNYATAAN AGUNAN</u>
                    </h3>
                    <h3>
                        {{-- Nomor: {!! $pkpmk->no_pkpmk ?? '<i class="text-danger">Not Display in Here</i>' !!} --}}
                        {{ $pkpmk->no_pkpmk }}
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
                            <td>NIK</td>
                            <td style="width: 1%">:</td>
                            <td>
                                {{ $kredit->debitur->nik }}
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <br>
            Dengan ini menerangkan bahwa kendaraan bermotor dengan identifikasi di bawah ini:
            <div class="headlist">
                <div class="desk">
                    <table style="margin-left: 5mm;">
                        <tr>
                            <td style="width: 25%">Jenis/Model</td>
                            <td style="width: 1%">:</td>
                            <td>
                                {{ $kenda->jns_kendaraan }}
                            </td>
                        </tr>
                        <tr>
                            <td>Merk/Type</td>
                            <td style="width: 1%">:</td>
                            <td>
                                {{ $kenda->merk }}/{{ $kenda->type }}
                            </td>
                        </tr>
                        <tr>
                            <td>No. Polisi</td>
                            <td style="width: 1%">:</td>
                            <td>
                                {{ $kenda->nopol }}
                            </td>
                        </tr>
                        <tr>
                            <td>BPKB Atas Nama</td>
                            <td style="width: 1%">:</td>
                            <td>
                                {{ strtoupper($kenda->atas_nama) }}
                            </td>
                        </tr>
                        <tr>
                            <td>No. BPKB</td>
                            <td style="width: 1%">:</td>
                            <td>
                                {{ $kenda->no_bpkb }}
                            </td>
                        </tr>
                        <tr>
                            <td>No. Rangka</td>
                            <td style="width: 1%">:</td>
                            <td>
                                {{ $kenda->no_rangka }}
                            </td>
                        </tr>
                        <tr>
                            <td>No. Mesin</td>
                            <td style="width: 1%">:</td>
                            <td>
                                {{ $kenda->no_mesin }}
                            </td>
                        </tr>
                        <tr>
                            <td>Warna</td>
                            <td style="width: 1%">:</td>
                            <td>
                                {{ $kenda->warna }}
                            </td>
                        </tr>
                        <tr>
                            <td>Pembuatan</td>
                            <td style="width: 1%">:</td>
                            <td>
                                {{ $kenda->thn_pembuatan }}
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <br>
            Saya menjamin bahwa jaminan tersebut benar-benar milik saya pribadi sejak tahun
            <b>{{ $kenda->thn_pembelian }}</b> dan saya benar-benar menggunakan kendaraan tersebut untuk
            keperluan pribadi, yang saya beli dari:
            <div class="headlist">
                <div class="desk">
                    <table style="margin-left: 5mm;">
                        <tr>
                            <td style="width: 25%">Nama</td>
                            <td style="width: 1%">:</td>
                            <td>
                                {{ $kenda->nama_pemilik_sebelumnya }}
                            </td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td style="width: 1%">:</td>
                            <td>
                                {{ $kenda->alamat_pemilik_sebelumnya }}
                            </td>
                        </tr>
                        <tr>
                            <td>Harga</td>
                            <td style="width: 1%">:</td>
                            <td>
                                {{ 'Rp' . number_format($kenda->harga_pembelian, 0, ',', '.') }}
                                ({{ Riskihajar\Terbilang\Facades\Terbilang::make($kenda->harga_pembelian, ' rupiah') }})
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <br>
            Apabila dalam pemberian keterangan tersebut tidak benar adanya atau tidak sesuai dengan fakta yang ada,
            maka SAYA siap untuk dituntut dengan ancaman Pidana sesuai Pasal 372 KUHP jo 378 KUHP tentang Pengelapan
            dan Penipuan. <br>
            Demikian surat pernyataan ini saya buat dengan sebenar-benarnya tanpa paksaan.
        </div>

        {{-- TTD --}}
        <br>
        <div style="page-break-inside: avoid">
            <div style="text-align: left;">
                {{-- {{ ucfirst($alamat) }}, --}}
                {{ $kredit->cabang->alamat }},
                {{ $kredit->kategori_spk == 'SPK' ? $pkpmk->tgl_print_sp_agunan->translatedFormat('d F Y') : $kredit->addendum->tgl_print_sp_agunan->translatedFormat('d F Y') }}
            </div>
            <br>
            <br>
            <br>
            <br>
            <div style="text-align: left;">
                ({{ strtoupper($kredit->debitur->nama_debitur) }})
            </div>

        </div>
        </div>
    @endforeach


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
