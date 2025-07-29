<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include('page.master-kredit.muk.show-scoring.style')

    <style>
        .col-md-6 {
            width: 47.000000% !important;
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


    <!-- ROW otomatis menutup float karena overflow:hidden -->
    {{-- <div class="row">
        <div class="col-md-6" style="background:#00cfff">A</div>
        <div class="col-md-6" style="background:#ffbf00">B</div>
        <div class="clearfix"></div> <!-- manual clearfix -->
        <div class="col-md-6" style="background:#ffbf00">C</div>
    </div> --}}

    {{-- agunan tanah --}}
    @foreach ($jam_tanah as $tanah)
        <div class="card mb-2">
            <div class="card-header bg-primary text-white">
                <div class="d-flex justify-content-between">
                    <div class="head-judul">SCORING AGUNAN {{ strtoupper($tanah->detail_kategori_jaminan) }}</div>
                </div>
            </div>
            <div class="card-body">
                @include('page.master-kredit.muk.show-scoring.tanah-scoring')
            </div>
        </div>
    @endforeach

    {{-- agunan Kendaraan --}}
    {{-- @foreach ($jam_kenda as $kenda)
        <div class="card mb-2">
            <div class="card-header bg-warning text-white">
                <div class="d-flex justify-content-between">
                    <div class="head-judul">SCORING AGUNAN KENDARAAN</div>
                </div>
            </div>
            <div class="card-body">
                @include('page.master-kredit.muk.show-scoring.kendaraan-scoring')
            </div>
        </div>
    @endforeach --}}

    {{-- agunan Kendaraan --}}
    {{-- @if (!empty($jam_depo))
        @foreach ($jam_depo as $depo)
            <div class="card mb-2">
                <div class="card-header bg-secondary text-white">
                    <div class="d-flex justify-content-between">
                        <div class="head-judul">SCORING AGUNAN {{ $depo->jns_jaminan }}</div>
                    </div>
                </div>
                <div class="card-body">
                    @if ($depo->jns_jaminan == 'Deposito')
                        @include('page.master-kredit.muk.show-scoring.depo-scoring')
                    @else
                        @include('page.master-kredit.muk.show-scoring.tabu-scoring')
                    @endif
                </div>
            </div>
        @endforeach
    @endif --}}



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
