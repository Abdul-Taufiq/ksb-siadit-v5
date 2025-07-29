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
    {{-- <link rel="stylesheet" href="{{ public_path('template/css/style-for-print-dompdf.css') }}"> --}}
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
            margin: 0.85cm 0.50cm 0.75cm 1.75cm;
            font-size: 11pt;
            text-align: justify !important;
        }


        .container {
            font-size: 11pt;
        }

        h3 {
            font-size: 12pt;
            line-height: 0px;
            margin-bottom: 0px;
        }

        table {
            padding: 0px !important;
        }

        table td {
            vertical-align: top;
            text-align: justify;
            page-break-before: auto;
            page-break-after: auto;
            page-break-inside: always;
            padding: 0px !important;
        }

        .header {
            text-align: center;
            margin-bottom: 10px;
        }

        .list {
            float: left;
            width: 50%;
            /* margin-left: 2px; */
        }

        .desk {
            margin-left: 48%;
            width: 50%;
        }

        .container {
            page-break-inside: avoid;
        }

        .konten {
            font-size: 10pt;
        }

        .column {
            float: left;
            width: 50%;
            padding-left: 10px;
            margin-top: 10px;
            height: 150px;
        }

        .column_kenda {
            float: left;
            width: 50%;
            padding-left: 10px;
            margin-top: 10px;
            height: 130px;
        }


        .row:after {
            content: "";
            display: table;
            clear: both;
        }
    </style>
</head>

<body>

    {{-- header --}}
    <table style="width: 100%; margin-top: -20px">
        <tr>
            <td style="width: 40%">
                <img style="width: 65px;"
                    src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/images/icon_logo.png'))) }}">
            </td>
            <td style="width: 60%; text-align: center; ">
                <h3 style="margin-top: 30px; text-decoration: underline;">
                    <b>TANDA PENERIMAAN BARANG JAMINAN</b>
                </h3>
                <p style="font-size: 10pt; margin-top: 5px;">yang diserahkan ke PT BPR Kusuma Sumbing</p>
            </td>
        </tr>
    </table>
    {{-- end header --}}

    <hr>
    {{-- konten --}}
    <div class="konten">
        Telah terima dari :
        <table style="width: 100%">
            <tr>
                <td style="width: 20%">Nama</td>
                <td style="text-align: left">: {{ $kredit->debitur->nama_debitur }}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>: {{ $kredit->debitur->alamat_rumah }}</td>
            </tr>
            <tr>
                <td>Nomor</td>
                <td>: </td>
            </tr>
        </table>

        <p style="border-bottom: 4px double; margin-bottom: 0px; margin-top: -0.15rem;">
            Barang-barang/surat-surat seperti tersebut dibawah ini :
        </p>

        {{-- membuat urutan --}}
        @php
            $counter = 1;
        @endphp

        @foreach ($jam_tanah as $tanah)
            <div class="row">
                <div class="column">
                    <table style="width: 100%">
                        <div style="margin-left: -13px;">
                            <b>
                                {{ $counter }}. Sertifikat
                                @php $counter++; @endphp
                            </b>
                        </div>
                        @if ($tanah->type_sertifikat == 'Sertifikat-El')
                            <tr>
                                <td>NIB</td>
                                <td>:</td>
                                <td>{{ $tanah->no_shm_shgb }}</td>
                            </tr>
                            <tr>
                                <td style="width: 45%">Atas Nama Sertifikat</td>
                                <td style="width: 1px">:</td>
                                <td>{{ strtoupper($tanah->atas_nama) }}</td>
                            </tr>
                            <tr>
                                <td>Luas Tanah</td>
                                <td>:</td>
                                <td>{{ $tanah->luas }} M²</td>
                            </tr>
                        @else
                            <tr>
                                <td>
                                    @if ($tanah->jns_jaminan == 'SHGB')
                                        SHGB Nomor
                                    @elseif ($tanah->jns_jaminan == 'SHM')
                                        SHM Nomor
                                    @elseif ($tanah->jns_jaminan == 'SHGU')
                                        SHGU Nomor
                                    @else
                                        {{ $tanah->jns_jaminan }}
                                    @endif
                                </td>
                                <td>:</td>
                                <td>
                                    {{ $tanah->no_shm_shgb }}
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 45%">Atas Nama Sertifikat</td>
                                <td style="width: 1px">:</td>
                                <td>{{ strtoupper($tanah->atas_nama) }}</td>
                            </tr>
                            <tr>
                                <td>Tanggal Sertifikat</td>
                                <td>:</td>
                                <td>
                                    {{ Carbon\Carbon::parse($tanah->tgl_sertifikat)->translatedFormat('d F Y') }}
                                </td>
                            </tr>
                            <tr>
                                <td>Luas Tanah</td>
                                <td>:</td>
                                <td>{{ $tanah->luas }} M²</td>
                            </tr>
                            <tr>
                                <td>No. Surat Ukur</td>
                                <td>:</td>
                                <td>
                                    {{ $tanah->no_surat_ukur }}
                                </td>
                            </tr>
                            <tr>
                                <td>Tanggal Surat Ukur</td>
                                <td>:</td>
                                <td>
                                    {{ Carbon\Carbon::parse($tanah->tgl_surat_ukur)->translatedFormat('d F Y') }}
                                </td>
                            </tr>
                        @endif
                    </table>
                </div>
                <div class="column">
                    <table style="width: 100%">
                        <tr>
                            <td colspan="2"><b>Letak</b></td>
                        </tr>
                        <tr>
                            <td style="width: 40%">Desa</td>
                            <td style="width: 1px">:</td>
                            <td>
                                {{ $tanah->desa }}
                            </td>
                        </tr>
                        <tr>
                            <td>Kecamatan</td>
                            <td>:</td>
                            <td>
                                {{ $tanah->kecamatan }}
                            </td>
                        </tr>
                        <tr>
                            <td>Kabupaten/Kota</td>
                            <td>:</td>
                            <td>
                                {{ $tanah->kabupaten }}
                            </td>
                        </tr>
                        <tr>
                            <td>Provinsi</td>
                            <td>:</td>
                            <td>
                                {{ $tanah->provinsi }}
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        @endforeach


        @foreach ($jam_kenda as $kenda)
            <div class="row">
                <div class="column_kenda">
                    <table style="width: 100%">
                        <div style="margin-left: -13px;">
                            <b>
                                {{ $counter }}. Kendaraan
                                @php $counter++; @endphp
                            </b>
                        </div>
                        <tr>
                            <td>Jenis</td>
                            <td>:</td>
                            <td>
                                {{ $kenda->jns_kendaraan }}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 45%">Atas Nama</td>
                            <td style="width: 1px">:</td>
                            <td>{{ strtoupper($kenda->atas_nama) }}</td>
                        </tr>
                        <tr>
                            <td>Merk</td>
                            <td>:</td>
                            <td>{{ $kenda->merk }}</td>
                        </tr>
                        <tr>
                            <td>Type</td>
                            <td>:</td>
                            <td>
                                {{ $kenda->type }}
                            </td>
                        </tr>
                        <tr>
                            <td>Warna</td>
                            <td>:</td>
                            <td>
                                {{ $kenda->warna }}
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="column_kenda">
                    <table style="width: 100%">
                        <tr>
                            <td colspan="2"><b>Lanjutan</b></td>
                        </tr>
                        <tr>
                            <td>No. BPKB</td>
                            <td>:</td>
                            <td>
                                {{ $kenda->no_bpkb }}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 40%">No. Rangka</td>
                            <td style="width: 1px">:</td>
                            <td>
                                {{ $kenda->no_rangka }}
                            </td>
                        </tr>
                        <tr>
                            <td>No. Mesin</td>
                            <td>:</td>
                            <td>
                                {{ $kenda->no_mesin }}
                            </td>
                        </tr>
                        <tr>
                            <td>Tahun Pembuatan</td>
                            <td>:</td>
                            <td>
                                {{ $kenda->thn_pembuatan }}
                            </td>
                        </tr>
                        <tr>
                            <td>Nopol</td>
                            <td>:</td>
                            <td>
                                {{ $kenda->nopol }}
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        @endforeach

        @foreach ($jam_depo as $depo)
            <div class="row">
                <div class="column_kenda">
                    <table style="width: 100%">
                        <div style="margin-left: -13px;">
                            <b>
                                {{ $counter }}. Tabungan Deposito
                                @php $counter++; @endphp
                            </b>
                        </div>
                        <tr>
                            <td>Atas Nama</td>
                            <td>:</td>
                            <td>
                                {{ strtoupper($depo->atas_nama) }}
                            </td>
                        </tr>
                        <tr>
                            <td>Nomor Rekening</td>
                            <td>:</td>
                            <td>{{ $depo->no_rek }}</td>
                        </tr>
                        <tr>
                            <td>Nominal Deposito</td>
                            <td>:</td>
                            <td>
                                {{ number_format($depo->nominal, 0, ',', '.') }}
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        @endforeach

        <p style="margin-top: 1.25rem;">
            Sebagai tanggungan pinjaman pada PT BPR KUSUMA SUMBING <br>
            Menurut Perjanjian Kredit/Persetujuan Membuka Kredit <br>
            Nomor : {{ $kredit->kategori_spk == 'SPK' ? $pkpmk->no_pkpmk : $pkpmk->no_addendum }}
            &nbsp; tanggal :
            {{ $kredit->kategori_spk == 'SPK' ? $pkpmk->tgl_pkpmk->translatedFormat('d F Y') : $pkpmk->tgl_addendum->translatedFormat('d F Y') }}
        </p>


        {{-- TTD --}}
        <div style="page-break-inside: avoid">
            <div style="text-align: right;">
                <table style="width: 100%">
                    <tr>
                        <td style="width: 50%">&nbsp;</td>
                        <td style="width: 50%; text-align: center">
                            {{ ucfirst(strtolower($kredit->cabang->alamat)) }},
                            {{ $kredit->kategori_spk == 'SPK' ? $pkpmk->tgl_print_tpbj->translatedFormat('d F Y') : $pkpmk->tgl_print_tpbj->translatedFormat('d F Y') }}
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </td>
                    </tr>
                </table>
            </div>

            <table style="width: 100%; text-align: center">
                <tr>
                    <td style="width: 45%;   padding: 3px 0; text-align: center;">
                        <b>Yang menyerahkan</b>
                    </td>
                    <td style="padding: 4px 0; width: 55%; text-align: center;">
                        <b>PT BPR KUSUMA SUMBING</b>
                    </td>
                </tr>
                <tr style="text-align: center;">
                    <td style="width: 45%;   padding: 3px 0; text-align: center;">
                        <br><br><br><br>
                        @if ($kredit->debitur->status_pernikahan == 'Menikah')
                            (<b>{{ strtoupper($kredit->debitur->nama_debitur) }}</b>)
                            (<b>{{ strtoupper($kredit->debitur->nama_pasangan) }}</b>)
                        @else
                            (<b>{{ strtoupper($kredit->debitur->nama_debitur) }}</b>)
                        @endif
                    </td>
                    <td style="padding: 4px 0; width: 55%; text-align: center;">
                        <br><br><br><br>
                        (<b>{{ strtoupper($kredit->cabang->nama_pincab) }}</b>)
                        @if ($kredit->id_cabang == 1)
                            <br><b>Kepala Kantor</b>
                        @else
                            <br><b>Pimpinan Cabang</b>
                        @endif
                    </td>
                </tr>
            </table>
        </div>

        <div style="page-break-inside: avoid">
            <table style="width: 100%; text-align: center;">
                @if ($penjamin != '')
                    @foreach ($penjamin as $item)
                        <tr style="text-align: center;">
                            <td style="width: 45%;   padding: 3px 0; text-align: center;">
                                <b>PENJAMIN {{ $loop->iteration }}</b>
                            </td>
                            <td style="padding: 4px 0; width: 55%; text-align: center;">
                                <b>&nbsp;</b>
                            </td>
                        </tr>
                        <tr style="text-align: center;">
                            <td style="width: 45%;   padding: 3px 0; text-align: center;">
                                <br><br><br><br>
                                @if ($item->nama_pasangan != '')
                                    (<b>{{ strtoupper($item->nama_penjamin) }}</b>)
                                    (<b>{{ strtoupper($item->nama_pasangan) }}</b>)
                                @else
                                    (<b>{{ strtoupper($item->nama_penjamin) }}</b>)
                                @endif
                            </td>
                            <td style="padding: 4px 0; width: 55%; text-align: center;">
                                <b>&nbsp;</b>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </table>
        </div>

        <hr>
        Telah terima kembali barang-barang/surat-surat tersebut di atas. <br>
        <br>
        <table style="width: 100%">
            <tr>
                <td style="width: 50%">&nbsp;</td>
                <td style="width: 50%">
                    {{ ucfirst(strtolower($kredit->cabang->alamat)) }},
                    ...................................................................
                </td>
            </tr>
        </table>


        <script type="text/php">
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
        </script>

</body>

</html>
