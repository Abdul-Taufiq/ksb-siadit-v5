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
            margin: 1cm 0.5cm 1cm 1cm;
            font-size: 11pt;
            text-align: justify !important;
            line-height: 12pt;
        }

        table {
            font-size: 8pt !important;
            text-align: justify !important;
            color: black !important;
        }

        p {
            font-size: 8pt !important;
        }

        h3 {
            font-size: 12pt !important;
            /* line-height: 0px !important; */
            margin-bottom: -5px !important;
            /* font-weight: bold !important; */
        }

        .header {
            text-align: center;
            margin-bottom: 10px;
            page-break-after: avoid;
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
            margin-left: 5.3rem !important;
        }

        .premis-jaminan {
            margin-left: 4.5rem;
        }
    </style>
</head>

<body>

    <table class="table table-borderless w-100 mb-4">
        <tr>
            <td style="width: 25%; border: none;">
                <img style="width: 65px;"
                    src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/images/icon_logo.png'))) }}">
            </td>
            <td style="width: 50%; text-align: center !important; vertical-align: middle; border: none;">
                <h3>
                    RENCANA & LAPORAN KEGIATAN HARIAN AO LENDING
                </h3>
                <strong style="font-size: 13px">
                    PT BPR KUSUMA SUMBING {{ strtoupper($cabang->cabang) }}
                </strong>
            </td>
            <td style="width: 25%; border: none;">&nbsp;</td>
        </tr>
    </table>

    <table class="table table-sm table-borderless w-100">
        <tr>
            <th style="text-align: left; width: 10%">Nama AO</th>
            <td style="text-align: left; width: 1%">:</td>
            <td>{{ $nama }}</td>
        </tr>
        <tr>
            <th style="text-align: left; width: 10%">Tanggal Laporan</th>
            <td style="text-align: left; width: 1%">:</td>
            <td>{{ $tgl }}</td>
        </tr>
    </table>

    {{-- Prospek --}}
    <div class="stat-cards-item mb-3">
        <div class="card-body w-100">
            <div class="">
                <table class="table table-striped table-sm w-100 table-bordered">
                    <thead>
                        <tr>
                            <th class="bg-info" style="text-align: center" colspan="10">
                                URAIAN HASIL KEGIATAN KUNJUNGAN PROSPEK CALON DEBITUR
                            </th>
                        </tr>
                        <tr>
                            <th class="bg-secondary" style="text-align: center; width: 3%;">No</th>
                            <th class="bg-secondary" style="text-align: left;  width: 8%;">Cabang</th>
                            <th class="bg-secondary" style="text-align: left;  width: 10%;">Tanggal Rencana</th>
                            <th class="bg-secondary" style="text-align: left;  width: 10%;">Kategori Rencana</th>
                            <th class="bg-secondary" style="text-align: left;  width: 10%; ">Nama</th>
                            <th class="bg-secondary" style="text-align: left;  width: 15%; ">Alamat/Kec/Desa</th>
                            <th class="bg-secondary" style="text-align: left;  width: 10%; ">Jenis Usaha</th>
                            <th class="bg-secondary" style="text-align: left;  width: 10%; ">No Telp</th>
                            <th class="bg-secondary" style="text-align: center; width: 5%;">Visit Ke</th>
                            <th class="bg-secondary" style="text-align: left;  width: 25%; ">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($monPro->isNotEmpty())
                            @foreach ($monPro as $data => $item)
                                <tr wire:key='{{ sha1($item->id) }}'>
                                    <td style="text-align: center;">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>{{ $item->cabang->cabang }}</td>
                                    <td>
                                        {{ $item->tgl_plan?->format('d-m-Y') ?? '-' }}
                                    </td>
                                    <td>{{ $item->kategori_plan }}</td>

                                    @if ($item->kategori_plan != 'Rencana Lainnya')
                                        <td>{{ $item->nama_deb }}</td>
                                    @endif
                                    <td>{{ $item->alamat_jns_kegiatan }}</td>


                                    @if ($item->kategori_plan == 'Rencana Prospek')
                                        @php
                                            $shortenHp = function ($name, $maxLength = 5) {
                                                return strlen($name) > $maxLength
                                                    ? substr($name, 0, $maxLength) . 'xxxxxxx'
                                                    : $name;
                                            };
                                        @endphp

                                        <td>{{ $item->jns_usaha }}</td>
                                        <td data-full="{{ $item->no_telp }}"
                                            data-short="{{ $shortenHp($item->no_telp) }}"
                                            onmouseover="this.textContent=this.dataset.full"
                                            onmouseout="this.textContent=this.dataset.short">
                                            {{ $shortenHp($item->no_telp) }}
                                        </td>
                                    @endif

                                    @if ($item->kategori_plan == 'Rencana Lainnya')
                                        <td>{{ $item->tujuan_kunjungan }}</td>
                                    @endif

                                    @if ($item->kategori_plan != 'Rencana Lainnya')
                                        <td style="text-align: center;">{{ $item->visit_asr_ke }}</td>
                                    @endif

                                    @if ($item->kategori_plan == 'Rencana Penagihan')
                                        <td>
                                            {{ $item->baki_debet == 0 || $item->baki_debet == null ? '-' : 'Rp' . number_format($item->baki_debet, 0, ',', '.') }}
                                        </td>
                                        <td>
                                            {{ $item->total_tagihan == 0 || $item->total_tagihan == null ? '-' : 'Rp' . number_format($item->total_tagihan, 0, ',', '.') }}
                                        </td>
                                    @endif


                                    <td class="text" style="min-width: 350px;">{!! $item->keterangan !!}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="15" class="text-center"><i>Tidak Ada Data</i></td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    {{-- Penagihan --}}
    <div class="stat-cards-item mb-3">
        <div class="card-body w-100">
            <div class="">
                <table class="table table-striped table-sm w-100 table-bordered">
                    <thead>
                        <tr>
                            <th class="bg-info" style="text-align: center" colspan="10">
                                URAIAN HASIL KEGIATAN PENAGIHAN
                            </th>
                        </tr>
                        <tr>
                            <th class="bg-secondary" style="text-align: center; width: 3%;">No</th>
                            <th class="bg-secondary" style="text-align: left;  width: 8%;">Cabang</th>
                            <th class="bg-secondary" style="text-align: left;  width: 10%;">Tanggal Rencana</th>
                            <th class="bg-secondary" style="text-align: left;  width: 10%;">Kategori Rencana</th>
                            <th class="bg-secondary" style="text-align: left;  width: 10%; ">Nama Debitur</th>
                            <th class="bg-secondary" style="text-align: left;  width: 15%; ">Jenis Kegiatan</th>
                            <th class="bg-secondary" style="text-align: left;  width: 10%; ">Baki Debet</th>
                            <th class="bg-secondary" style="text-align: left;  width: 10%; ">Total Tagihan</th>
                            <th class="bg-secondary" style="text-align: center; width: 5%;">ASR Ke</th>
                            <th class="bg-secondary" style="text-align: left;  width: 25%; ">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($monPen->isNotEmpty())
                            @foreach ($monPen as $data => $item)
                                <tr wire:key='{{ sha1($item->id) }}'>
                                    <td style="text-align: center;">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>{{ $item->cabang->cabang }}</td>
                                    <td>
                                        {{ $item->tgl_plan?->format('d-m-Y') ?? '-' }}
                                    </td>
                                    <td>{{ $item->kategori_plan }}</td>

                                    @if ($item->kategori_plan != 'Rencana Lainnya')
                                        <td>{{ $item->nama_deb }}</td>
                                    @endif
                                    <td>{{ $item->alamat_jns_kegiatan }}</td>


                                    @if ($item->kategori_plan == 'Rencana Prospek')
                                        @php
                                            $shortenHp = function ($name, $maxLength = 5) {
                                                return strlen($name) > $maxLength
                                                    ? substr($name, 0, $maxLength) . 'xxxxxxx'
                                                    : $name;
                                            };
                                        @endphp

                                        <td>{{ $item->jns_usaha }}</td>
                                        <td data-full="{{ $item->no_telp }}"
                                            data-short="{{ $shortenHp($item->no_telp) }}"
                                            onmouseover="this.textContent=this.dataset.full"
                                            onmouseout="this.textContent=this.dataset.short">
                                            {{ $shortenHp($item->no_telp) }}
                                        </td>
                                    @endif

                                    @if ($item->kategori_plan == 'Rencana Lainnya')
                                        <td>{{ $item->tujuan_kunjungan }}</td>
                                    @endif


                                    @if ($item->kategori_plan == 'Rencana Penagihan')
                                        <td>
                                            {{ $item->baki_debet == 0 || $item->baki_debet == null ? '-' : 'Rp' . number_format($item->baki_debet, 0, ',', '.') }}
                                        </td>
                                        <td>
                                            {{ $item->total_tagihan == 0 || $item->total_tagihan == null ? '-' : 'Rp' . number_format($item->total_tagihan, 0, ',', '.') }}
                                        </td>
                                    @endif
                                    @if ($item->kategori_plan != 'Rencana Lainnya')
                                        <td style="text-align: center;">{{ $item->visit_asr_ke }}</td>
                                    @endif


                                    <td class="text" style="min-width: 350px;">{!! $item->keterangan !!}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="15" class="text-center"><i>Tidak Ada Data</i></td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    {{-- Lainnya --}}
    <div class="stat-cards-item mb-3">
        <div class="card-header">
            <h5>Tabel Data Rencana Lainnya</h5> <br>
        </div>
        <div class="card-body w-100">
            <div class="">
                <table class="table table-striped table-sm w-100 table-bordered">
                    <thead>
                        <tr>
                            <th class="bg-info" style="text-align: center" colspan="7">
                                URAIAN HASIL KEGIATAN KEGIATAN/AKTIVITAS LAINNYA
                            </th>
                        </tr>
                        <tr>
                            <th class="bg-secondary" style="text-align: center; width: 3%;">No</th>
                            <th class="bg-secondary" style="text-align: left;  width: 7%;">Cabang</th>
                            <th class="bg-secondary" style="text-align: left;  width: 7%;">Tanggal Rencana</th>
                            <th class="bg-secondary" style="text-align: left;  width: 7%;">Kategori Rencana</th>
                            <th class="bg-secondary" style="text-align: left;  width: 15%; ">Tujuan/Lokasi Kunjungan
                            </th>
                            <th class="bg-secondary" style="text-align: left;  width: 15%; ">Jenis Kegiatan</th>
                            <th class="bg-secondary" style="text-align: left;">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($monLan->isNotEmpty())
                            @foreach ($monLan as $data => $item)
                                <tr wire:key='{{ sha1($item->id) }}'>
                                    <td style="text-align: center;">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>{{ $item->cabang->cabang }}</td>
                                    <td>
                                        {{ $item->tgl_plan?->format('d-m-Y') ?? '-' }}
                                    </td>
                                    <td>{{ $item->kategori_plan }}</td>

                                    @if ($item->kategori_plan == 'Rencana Lainnya')
                                        <td>{{ $item->tujuan_kunjungan }}</td>
                                    @endif
                                    <td>{{ $item->alamat_jns_kegiatan }}</td>


                                    <td class="text" style="min-width: 350px;">{!! $item->keterangan !!}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="15" class="text-center"><i>Tidak Ada Data</i></td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    {{-- TTD --}}
    <br>
    <br>
    <div style="page-break-inside: avoid">
        <div class="row">
            <div class="col-md-6">
                <table style="width: 100%;">
                    <tr>
                        <td>Dibuat</td>
                        <td>Diperiksa</td>
                    </tr>
                    <tr>
                        <td style="text-align: center">
                            <br><br><br><br>
                            (_____________________________________) <br>
                            (<b>AO Lending</b>)
                        </td>
                        <td style="text-align: center">
                            <br><br><br><br>
                            (_____________________________________) <br>
                            (<b>Kasi Komersial</b>)
                        </td>
                    </tr>
                </table>
            </div>
            <div class="col-md-6">
                <table style="width: 100%;" class="table table-bordered">
                    <tr>
                        <td style="text-align: center" class="bg-info">
                            <i><b>Catatan Kasi Komersial</b></i>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <br>
                            <br>
                            <br>
                            <br>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>


    <script type="text/php">
        if (isset($pdf)) {
            $font = $fontMetrics->get_font("tahoma", "normal");
            $size = 9;
            $color = array(0,0,0);

            // buat garis horizontal (x1, y1, x2, y2)
            $pdf->page_line(40, 580, 1000, 580, $color, 0.2); 
            // angka terakhir (0.5) = ketebalan garis

            // nomor halaman
            $pdf->page_text(900, 580, "Halaman {PAGE_NUM} dari {PAGE_COUNT}", $fontMetrics->get_font("tahoma","bold"), 10, array(0,0,0));

        }
    </script>

</body>

</html>
