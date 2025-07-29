<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>KSB | Rekap Data</title>

    <style>
        body {
            margin: 5mm 0mm 5mm 0mm;
            font-family: Tahoma, sans-serif;
            text-align: justify;
            font-size: 10pt;
        }

        #konten_tables {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #konten_tables td,
        #konten_tables th {
            border: 1px solid #ddd;
            padding: 8px;
            vertical-align: top;
            font-size: 9pt;
        }

        #konten_tables tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #konten_tables tr:hover {
            background-color: #ddd;
        }

        #konten_tables th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
            text-align: center;
        }
    </style>
</head>

<body>

    <div class="header">
        <table style="width: 100%;">
            <tr>
                <td style="width: 50%; vertical-align: bottom;">
                    <img style="width: 60%;"
                        src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/images/logo ksb.png'))) }}">
                </td>
                <td
                    style="width: 50%; vertical-align: bottom; text-align: right; font-size: 13pt; color: rgb(11, 97, 179)">
                    Rekap Data {{ $cabang }}
                </td>
            </tr>
        </table>
        <hr>
    </div>

    <div class="container">
        <p>Range rekap data: {{ $tgl_awal }} s/d {{ $tgl_akhir }}</p>

        <table id="konten_tables">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Account Officer</th>
                    <th>Detail Account</th>
                    <th>Detail Total Pengajuan (Rp)</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kredit as $kredits)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            {{ $kredits->petugas_penerima }} <br>
                            <b>KC: </b> {{ $kredits->cabang->cabang ?? 'Tidak Ditemukan' }}
                        </td>
                        <td>
                            <b>Jumlah: </b> {{ $kredits->total_data }} <br>
                            <b>Proses: </b> {{ $kredits->jumlah_diproses }}
                            ({{ number_format(($kredits->jumlah_diproses / $kredits->total_data) * 100, 2) }}%)
                            <br>
                            <b>Approved: </b> {{ $kredits->jumlah_disetujui }}
                            ({{ number_format(($kredits->jumlah_disetujui / $kredits->total_data) * 100, 2) }}%)
                            <br>
                            <b>Rejected: </b> {{ $kredits->jumlah_ditolak }}
                            ({{ number_format(($kredits->jumlah_ditolak / $kredits->total_data) * 100, 2) }}%)
                            <br>
                            <b>Approved (Tidak Diambil): </b> {{ $kredits->jumlah_tidak_diambil }}
                            ({{ number_format(($kredits->jumlah_tidak_diambil / $kredits->total_data) * 100, 2) }}%)
                        </td>
                        <td>
                            <b>Approved: </b> {{ number_format($kredits->total_disetujui, 0, ',', '.') }}
                            <br>
                            <b>Rejected: </b> {{ number_format($kredits->total_ditolak, 0, ',', '.') }}
                            <br>
                            <b>Approved (Tidak Diambil): </b>
                            {{ number_format($kredits->total_tidak_diambil, 0, ',', '.') }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
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
