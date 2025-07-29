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
            margin: 26mm 25mm 20mm 25mm;
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
    <div class="row">
        <div class="col-md-6 text-start">
            {{ $pkpmk->no_sppk ?? 'Belum ada Nomor' }}
        </div>
        <div class="col-md-6 text-end">
            {{ ucfirst(strtolower($pkpmk->cabang->alamat)) }},
            {{ $pkpmk->tgl_print_sppk?->translatedFormat('d F Y') ?? now()->translatedFormat('d F Y') }}
        </div>
    </div>

    <p class="mt-3">
        Kepada Yth. <br>
        Bapak/Ibu {{ $pkpmk->debitur->nama_debitur }}
    </p>

    <p class="mt-3">
        Perihal : Surat Persetujuan Permohonan Kredit
    </p>

    <p class="mt-3">Dengan Hormat,</p>

    <p class="mt-3">
        Menunjuk Surat Permohonan Kredit yang telah Saudara tandatangani pada tanggal
        {{ $pkpmk->kredit->created_at->translatedFormat('d F Y') }},
        Perihal : Surat Permohonan Kredit untuk {{ $pkpmk->kredit->tujuan_pengajuan }},
        kami sampaikan bahwa
        {{ $pkpmk->id_cabang == 1 ? 'Kantor Pusat Operasional' : 'Kantor Cabang ' . ucfirst(strtolower($pkpmk->cabang->alamat)) }}
        PT BPR Kusuma Sumbing dapat menyetujui permohonan Saudara dengan syarat
        dan ketentuan sebagai berikut : <br>
    </p>

    <table style="width: 100%; margin-left: 10px;">
        <tr>
            <td style="width: 4%">1.</td>
            <td style="width: 25%">Jenis Pinjaman</td>
            <td style="width: 1%">:</td>
            <td>
                {{ strtoupper($pkpmk->persetujuan->jns_kredit) }}
                {{ $pkpmk->persetujuan->jns_kredit == 'Angsuran' ? '(Pokok dan Bunga)' : '(Angsuran Bunga Pokok Akhir)' }}
            </td>
        </tr>
        <tr>
            <td style="width: 4%">2.</td>
            <td style="width: 25%">Tujuan Pinjaman</td>
            <td style="width: 1%">:</td>
            <td>
                {{ ucwords(strtolower($pkpmk->kredit->tujuan_pengajuan)) }}
            </td>
        </tr>
        <tr>
            <td style="width: 4%">3.</td>
            <td style="width: 25%">Plafond Kredit</td>
            <td style="width: 1%">:</td>
            <td>
                {{ 'Rp' . number_format($pkpmk->kredit->jumlah_disetujui, 0, ',', '.') }},-
                ({{ terbilang_id($pkpmk->kredit->jumlah_disetujui) }})
            </td>
        </tr>
        <tr>
            <td style="width: 4%">4.</td>
            <td style="width: 25%">Jangka Waktu</td>
            <td style="width: 1%">:</td>
            <td>
                {{ $pkpmk->kredit->jkw }} Bulan
            </td>
        </tr>
        <tr>
            <td style="width: 4%">5.</td>
            <td style="width: 25%">Bunga</td>
            <td style="width: 1%">:</td>
            <td>
                {{ number_format($pkpmk->persetujuan->besar_bunga, 2, ',', '.') }}%
                ({{ persen_id($pkpmk->persetujuan->besar_bunga) }})
                {{ ucwords(strtolower($pkpmk->persetujuan->jns_bunga)) }} per tahun
            </td>
        </tr>
        <tr>
            <td style="width: 4%">6.</td>
            <td style="width: 25%">Angsuran per bulan</td>
            <td style="width: 1%">:</td>
            <td>
                {{ 'Rp' . number_format($pkpmk->persetujuan->jumlah_angsuran, 0, ',', '.') }},-
                ({{ terbilang_id($pkpmk->persetujuan->jumlah_angsuran) }})
                @if ($pkpmk->persetujuan->jns_kredit != 'Angsuran')
                    <br>
                    <span style="font-size: 10px;">(nominal angsuran menyesuaikan jumlah hari dalam bulan
                        berjalan)</span>
                @endif
            </td>
        </tr>
        <tr>
            <td rowspan="11" style="width: 4%">7.</td>
            <td style="width: 25%">Biaya-biaya</td>
            <td style="width: 1%"></td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td style="width: 25%">- &nbsp; Provisi</td>
            <td style="width: 1%">:</td>
            <td>
                {{ number_format($pkpmk->persetujuan->provisi, 2, ',', '.') }}%
                ({{ persen_id($pkpmk->persetujuan->provisi) }}) X
                {{ 'Rp' . number_format($pkpmk->kredit->jumlah_disetujui, 0, ',', '.') }},- =
                {{ 'Rp' . number_format($pkpmk->persetujuan->jumlah_provisi, 0, ',', '.') }},-
            </td>
        </tr>
        <tr>
            <td style="width: 25%">- &nbsp; Administrasi</td>
            <td style="width: 1%">:</td>
            <td>
                {{ number_format($pkpmk->persetujuan->besar_adm, 2, ',', '.') }}%
                ({{ persen_id($pkpmk->persetujuan->besar_adm) }}) X
                {{ 'Rp' . number_format($pkpmk->kredit->jumlah_disetujui, 0, ',', '.') }},- =
                {{ 'Rp' . number_format($pkpmk->persetujuan->biaya_adm, 0, ',', '.') }},-
            </td>
        </tr>
        <tr>
            <td style="width: 25%">- &nbsp; Survey</td>
            <td style="width: 1%">:</td>
            <td>
                {{ number_format($pkpmk->persetujuan->besar_survey, 2, ',', '.') }}%
                ({{ persen_id($pkpmk->persetujuan->besar_survey) }}) X
                {{ 'Rp' . number_format($pkpmk->kredit->jumlah_disetujui, 0, ',', '.') }},- =
                {{ 'Rp' . number_format($pkpmk->persetujuan->biaya_survey, 0, ',', '.') }},-
            </td>
        </tr>
        <tr>
            <td style="width: 25%">- &nbsp; Materai</td>
            <td style="width: 1%">:</td>
            <td>
                {{ 'Rp' . number_format($pkpmk->persetujuan->biaya_materai, 0, ',', '.') }},-
            </td>
        </tr>
        <tr>
            <td style="width: 25%">- &nbsp; Biaya Notaris</td>
            <td style="width: 1%">:</td>
            <td>
                {{ 'Rp' . number_format($pkpmk->persetujuan->biaya_notaris, 0, ',', '.') }},-
            </td>
        </tr>

        <tr>
            <td>- &nbsp; Asuransi Jiwa</td>
            <td>:</td>
            <td>
                {{ 'Rp' . number_format($pkpmk->persetujuan->biaya_asuransi, 0, ',', '.') }},-
            </td>
        </tr>
        <tr>
            <td>- &nbsp; Asuransi Kebakaran</td>
            <td>:</td>
            <td>
                {{ 'Rp' . number_format($pkpmk->persetujuan->biaya_asuransi_kebakaran, 0, ',', '.') }},-
            </td>
        </tr>
        <tr>
            <td>- &nbsp; Asuransi Kendaraan</td>
            <td>:</td>
            <td>
                {{ 'Rp' . number_format($pkpmk->persetujuan->biaya_asuransi_kendaraan, 0, ',', '.') }},-
            </td>
        </tr>

        <tr>
            <td style="width: 25%">- &nbsp; Saving Angsuran</td>
            <td style="width: 1%">:</td>
            <td>
                {{ 'Rp' . number_format($pkpmk->persetujuan->biaya_saving_angsuran, 0, ',', '.') }},-
            </td>
        </tr>
        <tr>
            <td style="width: 25%">- &nbsp; Lainnya</td>
            <td style="width: 1%">:</td>
            <td>
                {{ 'Rp' . number_format($pkpmk->persetujuan->biaya_lainnya, 0, ',', '.') }},-
            </td>
        </tr>
        {{-- <tr>
                    <td style="width: 4%">8.</td>
                    <td style="width: 25%">Pengikatan</td>
                    <td style="width: 1%">:</td>
                    <td>
                        @if ($pkpmk->kredit->kategori_jaminan == 'PIKAR (Non-jaminan)' || $pkpmk->kredit->kategori_jaminan == 'Deposito')
                            -
                        @else
                            @php
                                $counter = 1;
                            @endphp

                            @if ($jam_tanah->count() > 0)
                                @foreach ($jam_tanah as $tanah)
                                    {{ $counter }}.
                                    @php $counter++; @endphp
                                    {{ $tanah->jns_perikatan }}
                                    <br>
                                @endforeach
                            @endif

                            @if ($jam_kenda->count() > 0)
                                @foreach ($jam_kenda as $kenda)
                                    {{ $counter }}.
                                    @php $counter++; @endphp
                                    @if ($kenda->jns_fidusia == 'Bawah Tangan')
                                        Perjanjian Bawah Tangan <br>
                                    @else
                                        Akta Jaminan Fidusia <br>
                                    @endif
                                @endforeach
                            @endif
                        @endif
                    </td>
                </tr> --}}
        <tr>
            <td style="width: 4%">8.</td>
            <td style="width: 25%">Agunan</td>
            <td style="width: 1%"></td>
            <td style="width: 70%"></td>
        </tr>
    </table>


    @php
        $counter = 1;
    @endphp

    @if ($jam_tanah->isEmpty() && $jam_kenda->isEmpty() && $jam_depo->isEmpty())
        <i>Tidak Ada Agunan</i>
    @else
        @if ($jam_depo->isNotEmpty())
            @foreach ($jam_depo as $depo)
                <div class="premis-jaminan">
                    {{ $counter }}. Tabungan Deposito
                    @php $counter++; @endphp
                </div>
                <ul class="list">
                    <li>
                        <table style="width: 100%;">
                            <tr>
                                <td style="width: 30%">Atas Nama</td>
                                <td style="width: 1px;">:</td>
                                <td>{{ strtoupper($depo->atas_nama) }}</td>
                            </tr>
                        </table>
                    </li>
                    <li>
                        <table style="width: 100%;">
                            <tr>
                                <td style="width: 30%">Nomor Rekening</td>
                                <td style="width: 1px;">:</td>
                                <td>{{ $depo->no_rek }}</td>
                            </tr>
                        </table>
                    </li>
                    <li>
                        <table style="width: 100%;">
                            <tr>
                                <td style="width: 30%">Nominal Deposito</td>
                                <td style="width: 1px;">:</td>
                                <td>{{ number_format($depo->nominal, 0, ',', '.') }}</td>
                            </tr>
                        </table>
                    </li>
                </ul>
            @endforeach
        @endif

        @if ($jam_tanah->isNotEmpty())
            @foreach ($jam_tanah as $tanah)
                <div class="premis-jaminan">
                    {{ $counter }}.
                    @php $counter++; @endphp

                    @if ($tanah->jns_jaminan == 'SHGB')
                        Sertifikat Hak Guna Bangunan
                    @elseif ($tanah->jns_jaminan == 'SHM')
                        Sertifikat Hak Milik
                    @elseif ($tanah->jns_jaminan == 'SHGU')
                        Sertifikat Hak Guna Usaha
                    @else
                        {{ $tanah->jns_jaminan }}
                    @endif
                </div>
                <ul class="list">
                    @if ($tanah->type_sertifikat == 'Sertifikat-El')
                        <li>
                            <table style="width: 100%;">
                                <tr>
                                    <td style="width: 30%">NIB</td>
                                    <td style="width: 1px;">:</td>
                                    <td>{{ $tanah->no_shm_shgb }}</td>
                                </tr>
                            </table>
                        </li>
                    @else
                        <li>
                            <table style="width: 100%;">
                                <tr>
                                    <td style="width: 30%">Nomor</td>
                                    <td style="width: 1px;">:</td>
                                    <td>{{ $tanah->no_shm_shgb }}</td>
                                </tr>
                            </table>
                        </li>
                        <li>
                            <table style="width: 100%;">
                                <tr>
                                    <td style="width: 30%">Tanggal Sertifikat</td>
                                    <td style="width: 1px;">:</td>
                                    <td>
                                        {{ Carbon\Carbon::parse($tanah->tgl_sertifikat)->translatedFormat('d F Y') }}
                                    </td>
                                </tr>
                            </table>
                        </li>
                    @endif
                    <li>
                        <table style="width: 100%;">
                            <tr>
                                <td style="width: 30%">Desa/Kelurahan</td>
                                <td style="width: 1px;">:</td>
                                <td>{{ $tanah->desa }}</td>
                            </tr>
                        </table>
                    </li>
                    <li>
                        <table style="width: 100%;">
                            <tr>
                                <td style="width: 30%">Kecamatan</td>
                                <td style="width: 1px;">:</td>
                                <td>{{ $tanah->kecamatan }}</td>
                            </tr>
                        </table>
                    </li>
                    <li>
                        <table style="width: 100%;">
                            <tr>
                                <td style="width: 30%">Kabupaten/Kota</td>
                                <td style="width: 1px;">:</td>
                                <td>{{ $tanah->kabupaten }}</td>
                            </tr>
                        </table>
                    </li>
                    <li>
                        <table style="width: 100%;">
                            <tr>
                                <td style="width: 30%">Provinsi</td>
                                <td style="width: 1px;">:</td>
                                <td>{{ $tanah->provinsi }}</td>
                            </tr>
                        </table>
                    </li>
                    <li>
                        <table style="width: 100%;">
                            <tr>
                                <td style="width: 30%">Atas Nama</td>
                                <td style="width: 1px;">:</td>
                                <td>{{ strtoupper($tanah->atas_nama) }}</td>
                            </tr>
                        </table>
                    </li>

                    @if ($tanah->type_sertifikat == 'Sertifikat-Analog')
                        <li>
                            <table style="width: 100%;">
                                <tr>
                                    <td style="width: 30%">No. Surat Ukur</td>
                                    <td style="width: 1px;">:</td>
                                    <td>{{ $tanah->no_surat_ukur }}</td>
                                </tr>
                            </table>
                        </li>
                        <li>
                            <table style="width: 100%;">
                                <tr>
                                    <td style="width: 30%">Tanggal Surat Ukur</td>
                                    <td style="width: 1px;">:</td>
                                    <td>
                                        {{ Carbon\Carbon::parse($tanah->tgl_surat_ukur)->translatedFormat('d F Y') }}
                                    </td>
                                </tr>
                            </table>
                        </li>
                    @endif

                    <li>
                        <table style="width: 100%;">
                            <tr>
                                <td style="width: 30%">Luas</td>
                                <td style="width: 1px;">:</td>
                                <td>{{ $tanah->luas }} M²</td>
                            </tr>
                        </table>
                    </li>
                    <li>
                        <table style="width: 100%;">
                            <tr>
                                <td style="width: 30%">Pengikatan</td>
                                <td style="width: 1px;">:</td>
                                <td>
                                    {{ $tanah->jns_perikatan }}
                                </td>
                            </tr>
                        </table>
                    </li>
                </ul>
            @endforeach
        @endif

        @if ($jam_kenda->isNotEmpty())
            @foreach ($jam_kenda as $kenda)
                <div class="premis-jaminan">
                    {{ $counter }}. Kendaraan
                    @php $counter++; @endphp
                </div>

                <ul class="list">
                    <li>
                        <table style="width: 100%;">
                            <tr>
                                <td style="width: 30%">Jenis</td>
                                <td style="width: 1px;">:</td>
                                <td>
                                    {{ $kenda->jns_kendaraan }}
                                </td>
                            </tr>
                        </table>
                    </li>
                    <li>
                        <table style="width: 100%;">
                            <tr>
                                <td style="width: 30%">Merk</td>
                                <td style="width: 1px;">:</td>
                                <td>
                                    {{ $kenda->merk }}
                                </td>
                            </tr>
                        </table>
                    </li>
                    <li>
                        <table style="width: 100%;">
                            <tr>
                                <td style="width: 30%">Type</td>
                                <td style="width: 1px;">:</td>
                                <td>
                                    {{ $kenda->type }}
                                </td>
                            </tr>
                        </table>
                    </li>
                    <li>
                        <table style="width: 100%;">
                            <tr>
                                <td style="width: 30%">Warna</td>
                                <td style="width: 1px;">:</td>
                                <td>
                                    {{ $kenda->warna }}
                                </td>
                            </tr>
                        </table>
                    </li>
                    <li>
                        <table style="width: 100%;">
                            <tr>
                                <td style="width: 30%">No. BPKB</td>
                                <td style="width: 1px;">:</td>
                                <td>
                                    {{ $kenda->no_bpkb }}
                                </td>
                            </tr>
                        </table>
                    </li>
                    <li>
                        <table style="width: 100%;">
                            <tr>
                                <td style="width: 30%">No. Rangka</td>
                                <td style="width: 1px;">:</td>
                                <td>
                                    {{ $kenda->no_rangka }}
                                </td>
                            </tr>
                        </table>
                    </li>
                    <li>
                        <table style="width: 100%;">
                            <tr>
                                <td style="width: 30%">No. Mesin</td>
                                <td style="width: 1px;">:</td>
                                <td>
                                    {{ $kenda->no_mesin }}
                                </td>
                            </tr>
                        </table>
                    </li>
                    <li>
                        <table style="width: 100%;">
                            <tr>
                                <td style="width: 30%">Tahun Pembuatan</td>
                                <td style="width: 1px;">:</td>
                                <td>
                                    {{ $kenda->thn_pembuatan }}
                                </td>
                            </tr>
                        </table>
                    </li>
                    <li>
                        <table style="width: 100%;">
                            <tr>
                                <td style="width: 30%">Nopol</td>
                                <td style="width: 1px;">:</td>
                                <td>
                                    {{ $kenda->nopol }}
                                </td>
                            </tr>
                        </table>
                    </li>
                    <li>
                        <table style="width: 100%;">
                            <tr>
                                <td style="width: 30%">Atas Nama</td>
                                <td style="width: 1px;">:</td>
                                <td>
                                    {{ strtoupper($kenda->atas_nama) }}
                                </td>
                            </tr>
                        </table>
                    </li>
                    <li>
                        <table style="width: 100%;">
                            <tr>
                                <td style="width: 30%">Pengikatan</td>
                                <td style="width: 1px;">:</td>
                                <td>
                                    Fidusia
                                    {{-- @if ($kenda->jns_fidusia == 'Bawah Tangan')
                                                    Perjanjian Bawah Tangan <br>
                                                @else
                                                    Akta Jaminan Fidusia <br>
                                                @endif --}}
                                </td>
                            </tr>
                        </table>
                    </li>
                </ul>
            @endforeach
        @endif
    @endif


    <table style="width: 100%; margin-left: 10px;">
        <tr>
            <td style="width: 4%">9.</td>
            <td style="width: 32%">Denda</td>
            <td style="width: 1%">:</td>
            <td>2 per mil (2/1000) per hari dari angsuran tertunggak</td>
        </tr>
        <tr>
            <td style="width: 4%">10.</td>
            <td style="width: 32%">Penalti pelunasan dipercepat</td>
            <td style="width: 1%">:</td>
            <td>
                {{ $pkpmk->persetujuan->penalty }}
                ({{ terbilang_only($pkpmk->persetujuan->penalty) }})
                kali bunga
            </td>
        </tr>
    </table>

    <table style="width: 100%; margin-left: 10px;">
        <tr>
            <td style="width: 4%">11.</td>
            <td style="width: 32%">Cara Pembayaran</td>
            <td style="width: 1%">:</td>
            <td>Pembayaran angsuran dibayarkan di Kantor PT BPR Kusuma
                Sumbing setiap bulan secara tunai ke Kasir PT BPR Kusuma Sumbing dan/atau melalui
                transfer ke rekening <i>Virtual Account (VA)</i> yang diberikan
            </td>
        </tr>
    </table>

    <table style="width: 100%; margin-left: 10px;">
        <tr>
            <td rowspan="2" style="width: 4%">12.</td>
            <td>
                Syarat – syarat Penandatangan dan Pencairan Kredit
            </td>
        </tr>
        <tr>
            <td>
                <table style="width: 100%">
                    <tr>
                        <td style="width: 4%">-</td>
                        <td>
                            Membawa asli E-KTP Calon Debitur dan pasangan (untuk yang berstatus kawin), Asli KK,
                            Asli Akta Nikah/Buku Nikah/Akta Cerai
                        </td>
                    </tr>
                    @if ($pkpmk->kredit->penjamin->count() > 0)
                        <tr>
                            <td style="width: 4%">-</td>
                            <td>
                                Membawa asli E-KTP Calon Penjamin dan pasangan (untuk yang berstatus kawin),
                                Asli
                                KK, Asli Akta Nikah/Buku Nikah/Akta Cerai
                            </td>
                        </tr>
                    @endif
                    <tr>
                        <td style="width: 4%"></td>
                        <td>
                            (Apabila jaminan bukan atas nama Debitur)
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 4%">-</td>
                        <td>
                            Asli NPWP untuk pinjaman di atas Rp50.000.000,-
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 4%">-</td>
                        <td>
                            Membawa Asli Sertifikat/Asli BPKB, Asli STNK yang aktif masa berlakunya/pajaknya
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 4%">-</td>
                        <td>
                            Telah memenuhi seluruh persyaratan pada syarat Perjanjian Kredit
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>


    {{-- TTD --}}
    <br>
    <div style="page-break-inside: avoid">
        {{-- <div style="text-align: center;">
                {{ ucfirst($alamat) }},
                {{ Carbon\Carbon::parse($pkpmk->pkpmk->tgl_pkpmk)->translatedFormat('d F Y') }}
            </div> --}}
        <table style="width: 100%; text-align: center">
            <tr>
                <td colspan="2">
                    PT BPR KUSUMA SUMBING
                </td>
            </tr>
            <tr>
                <td style="width: 45%;   padding: 3px 0; text-align: left;">
                    {{ $pkpmk->id_cabang == 1 ? 'Kantor Pusat Operasional' : 'Kantor Cabang ' . ucfirst(strtolower($pkpmk->cabang->alamat)) }}
                </td>
                <td style="padding: 4px 0; width: 55%; text-align: center;">
                    Menyetujui,
                </td>
            </tr>
            <tr style="text-align: center;">
                <td style="width: 45%; padding: 3px; text-align: center;">
                    <br><br><br>
                    {{-- <div style="margin-left: 20px;"> --}}
                    @if ($pkpmk->kredit->jns_pinjaman == 'Kredit Pihak Terkait')
                        Eko Bambang Setiyoso
                    @else
                        {{ $pkpmk->cabang->nama_pincab }}
                    @endif
                    <br>
                    {{-- </div> --}}
                    <span
                        style="display: block; border-top: 1px solid #000; width: 90%; margin-bottom: 0px; margin-left: 10px"></span>
                    <span>
                        {{ $pkpmk->id_cabang == 1 ? 'Kepala Kantor' : $pkpmk->cabang->jabatan . ' Cabang' }}
                    </span>
                </td>
                <td style="padding: 4px 0; width: 55%; text-align: center;">
                    <br><br><br>
                    @if ($pkpmk->debitur->status_pernikahan == 'Menikah')
                        ({{ $pkpmk->debitur->nama_debitur }})
                        <br><br><br>
                        ({{ $pkpmk->debitur->nama_pasangan }})
                    @else
                        ({{ $pkpmk->debitur->nama_debitur }})
                    @endif
                </td>
            </tr>
        </table>
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
