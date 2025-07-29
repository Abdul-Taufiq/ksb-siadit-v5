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
            margin: 1.5cm 1.2cm 1.5cm 2.5cm;
            font-size: 11pt;
            text-align: justify !important;
            line-height: 12pt;
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
            margin-bottom: -4px !important;
        }

        .header {
            text-align: center;
            margin-bottom: 10px;
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

        .headlist {
            font-size: 11pt;
            font-family: Tahoma, sans-serif;
            text-align: justify;
        }

        .listArgumen {
            float: left;
            width: 5%;
            margin-left: 2px;
        }

        .desk {
            margin-left: 5%;
            width: 95%;
        }
    </style>
</head>

<body>

    @include('page.master-perjanjian-kredit.addendum.pasal.header-&-premis')

    {{-- OPSIONAL SESUAI KONDISI --}}
    @switch($pkpmk->kredit->jns_kategori_spk)
        @case('Reschedulling')
            <div class="headlist">
                <div class="listArgumen">1.</div>
                <div class="desk">
                    Pasal 2 diubah sehingga menjadi sebagai berikut : <br>
                    @include('page.master-perjanjian-kredit.addendum.pasal.pasal2')
                </div>
            </div>
            <div class="headlist">
                <div class="listArgumen">2.</div>
                <div class="desk">
                    Pasal 3 diubah sehingga menjadi sebagai berikut : <br>
                    @include('page.master-perjanjian-kredit.addendum.pasal.pasal3')
                </div>
            </div>
            <div class="headlist">
                <div class="listArgumen">3.</div>
                <div class="desk">
                    Pasal 4 diubah sehingga menjadi sebagai berikut :
                    @include('page.master-perjanjian-kredit.addendum.pasal.pasal4')
                </div>
            </div>
        @break

        @case('Recondition')
        @case('Menambah Plafond Kredit (Tanpa Menambah Jaminan)')

        @case('Mengurangi Plafond Kredit (Tanpa Mengurangi Jaminan)')
            <div class="headlist">
                <div class="listArgumen">1.</div>
                <div class="desk">
                    Pasal 1 diubah sehingga menjadi sebagai berikut :
                    @include('page.master-perjanjian-kredit.addendum.pasal.pasal1')
                </div>
            </div>
            <div class="headlist">
                <div class="listArgumen">2.</div>
                <div class="desk">
                    Pasal 2 diubah sehingga menjadi sebagai berikut :
                    @include('page.master-perjanjian-kredit.addendum.pasal.pasal2')
                </div>
            </div>
            <div class="headlist">
                <div class="listArgumen">3.</div>
                <div class="desk">
                    Pasal 3 diubah sehingga menjadi sebagai berikut :
                    @include('page.master-perjanjian-kredit.addendum.pasal.pasal3')
                </div>
            </div>
            <div class="headlist">
                <div class="listArgumen">4.</div>
                <div class="desk">
                    Pasal 4 diubah sehingga menjadi sebagai berikut :
                    @include('page.master-perjanjian-kredit.addendum.pasal.pasal4')
                </div>
            </div>
        @break

        @case('Restructuring')
        @case('Menambah Plafond Kredit (Dengan Menambah Jaminan)')

        @case('Mengurangi Plafond Kredit (Dengan Mengurangi Jaminan)')
            <div class="headlist">
                <div class="listArgumen">1.</div>
                <div class="desk">
                    Pasal 1 diubah sehingga menjadi sebagai berikut :
                    @include('page.master-perjanjian-kredit.addendum.pasal.pasal1')
                </div>
            </div>
            <div class="headlist">
                <div class="listArgumen">2.</div>
                <div class="desk">
                    Pasal 2 diubah sehingga menjadi sebagai berikut :
                    @include('page.master-perjanjian-kredit.addendum.pasal.pasal2')
                </div>
            </div>
            <div class="headlist">
                <div class="listArgumen">3.</div>
                <div class="desk">
                    Pasal 3 diubah sehingga menjadi sebagai berikut :
                    @include('page.master-perjanjian-kredit.addendum.pasal.pasal3')
                </div>
            </div>
            <div class="headlist">
                <div class="listArgumen">4.</div>
                <div class="desk">
                    Pasal 4 diubah sehingga menjadi sebagai berikut :
                    @include('page.master-perjanjian-kredit.addendum.pasal.pasal4')
                </div>
            </div>
            <div class="headlist">
                <div class="listArgumen">5.</div>
                <div class="desk">
                    Pasal 5 diubah sehingga menjadi sebagai berikut :
                    @include('page.master-perjanjian-kredit.addendum.pasal.pasal5')
                </div>
            </div>
        @break

        @case('Perubahan Fasilitas Kredit')
            @include('page.master-perjanjian-kredit.addendum.pasal.header-&-premis')
            <i class="text-danger">This Page Preview</i>
            @include('page.master-perjanjian-kredit.pk.pasal.pasal-I-sd-pasal-IV')
            <i class="text-danger">This Page Preview</i>
            @include('page.master-perjanjian-kredit.pk.pasal.pasal-V')
            <i class="text-danger">This Page Preview</i>
            @include('page.master-perjanjian-kredit.pk.pasal.pasal-VI-sd-pasal-X')
            <i class="text-danger">This Page Preview</i>
            {{-- pasal 11 --}}
            <div class="mb-4">
                <div class="header">
                    <h3>PASAL 11</h3>
                    <h3>KETENTUAN BANK</h3>
                </div>

                <b>DEBITUR</b> dengan ini berjanji, akan tunduk kepada segala ketentuan-ketentuan dan
                kebiasaan-kebiasaan yang berlaku pada <b>BANK</b>, baik yang berlaku sekarang maupun dikemudian hari.
            </div>
            {{-- end pasal 6 --}}


            {{-- pasal 12 --}}
            <div class="mb-4">
                <div class="header">
                    <h3>PASAL 12</h3>
                    <h3>AHLI WARIS/PENANGGUNG</h3>
                </div>

                Apabila <b>DEBITUR</b> meninggal dunia, maka semua hutang dan kewajiban <b>DEBITUR</b> kepada
                <b>BANK</b> yang timbul berdasarkan Perjanjian Kredit ini berikut semua perubahan/tambahan/perpanjangan
                kemudian dan atau berdasarkan apapun
                juga tetap merupakan satu kesatuan hutang dari para ahli waris <b>DEBITUR</b> atau PENANGGUNG (jika ada)
                yang tidak dibagi-bagi.
            </div>
            {{-- end pasal 12 --}}


            {{-- pasal 13 --}}
            <div class="mb-4">
                <div class="header">
                    <h3>PASAL 13</h3>
                    <h3>PENGALIHAN PIUTANG (CASSIE)</h3>
                </div>
                <b>BANK</b> dengan ini diberi hak dan dikuasakan oleh <b>DEBITUR</b> untuk menggadai ulangkan kredit ini
                kepada <b>BANK</b> lain atau pihak ketiga lainnya, semata–mata menurut pertimbangan yang dipandang baik
                oleh <b>BANK</b>.
            </div>
            {{-- end pasal 13 --}}


            {{-- pasal 14 --}}
            <div class="mb-4">
                <div class="header">
                    <h3>PASAL 14</h3>
                    <h3>PEMBERIAN MASA JEDA</h3>
                </div>

                <div class="row">
                    <div class="col-md-1">(1)</div>
                    <div class="col-md-11">
                        <b>BANK</b> memberikan waktu 2 (dua) hari kerja sejak ditandatanganinya Perjanjian Kredit ini
                        kepada <b>DEBITUR</b> untuk mempelajari kembali Perjanjian Kredit yang telah ditandatangani,
                        setelah lewatnya waktu 2 (dua) hari kerja <b>DEBITUR</b> menyetujui melanjutkan perjanjian kredit
                        ini.
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-1">(2)</div>
                    <div class="col-md-11">
                        Apabila dalam masa waktu 2 (dua) hari kerja <b>DEBITUR</b> memilih mengakhiri Perjanjian Kredit
                        ini, maka <b>DEBITUR</b> wajib mengembalikan seluruh saldo pinjaman yang telah diterima ditambah
                        sejumlah tertentu bunga pinjaman dihitung secara harian oleh <b>BANK</b>, Provisi dan administrasi
                        yang
                        telah di bayarkan <b>DEBITUR</b> menjadi hak <b>BANK</b>.
                    </div>
                </div>
            </div>
            {{-- end pasal 14 --}}


            {{-- pasal 15 --}}
            <div class="mb-4">
                <div class="header">
                    <h3>PASAL 15</h3>
                    <h3>DOMISILI</h3>
                </div>

                Mengenai perjanjian ini dan segala akibat-akibat serta pelaksanaan para pihak memilih tempat kediaman
                hukum yang umum dikantor Panitera Pengadilan Negeri {{ ucfirst($pkpmk->cabang->pn) }} di
                {{ $pkpmk->cabang->alamat_pn }}, demikian dengan tidak mengurangi hak <b>BANK</b> untuk memohon
                pelaksanaan/eksekusi dari perjanjian ini atau mengajukan
                tuntutan hukum terhadap <b>DEBITUR</b> melalui Pengadilan-Pengadilan dan/atau Instansi maupun Lembaga
                Pemerintah yang berada dalam wilayah Republik Indonesia.
            </div>
            {{-- end pasal 15 --}}
            <i class="text-danger">This Page Preview</i>
        @break

        {{-- nonrestruc --}}
        @case('Mengubah Jaminan (Mengubah)')
        @case('Mengubah Jaminan (Mengurangi)')

        @case('Mengubah Jaminan (Menambah)')
            <div class="headlist">
                <div class="listArgumen">1.</div>
                <div class="desk">
                    Pasal 5 diubah sehingga menjadi sebagai berikut :
                    @include('page.master-perjanjian-kredit.addendum.pasal.pasal5')
                </div>
            </div>
        @break
    @endswitch

    {{-- TTD --}}
    <br>
    <div style="page-break-inside: avoid">
        <div style="text-align: center;">
            {{ ucfirst(strtolower($pkpmk->cabang->alamat)) }},
            {{ $pkpmk->tgl_pkpmk?->translatedFormat('d F Y') ?? '-' }}
        </div>
        <table style="width: 100%; text-align: center">
            <tr>
                <td style="width: 45%;   padding: 3px 0; text-align: center;">
                    <b>PT BPR KUSUMA SUMBING</b>
                </td>
                <td style="padding: 4px 0; width: 55%; text-align: center;">
                    <b>DEBITUR</b>
                </td>
            </tr>
            <tr style="text-align: center;">
                <td style="width: 45%;   padding: 3px 0; text-align: center;">
                    <br><br><br><br>
                    @if ($pkpmk->kredit->jns_pinjaman == 'Kredit Pihak Terkait')
                        (<b>EKO BAMBANG SETIYOSO</b>)
                    @else
                        (<b>{{ $pkpmk->kredit->cabang->nama_pincab }}</b>)
                    @endif
                </td>
                <td style="padding: 4px 0; width: 55%; text-align: center;">
                    <br><br><br><br>
                    @if ($pkpmk->kredit->debitur->status_pernikahan == 'Menikah')
                        (<b>{{ $pkpmk->kredit->debitur->nama_debitur }}</b>)
                        (<b>{{ $pkpmk->kredit->debitur->nama_pasangan }}</b>)
                    @else
                        (<b>{{ $pkpmk->kredit->debitur->nama_debitur }}</b>)
                    @endif
                </td>
            </tr>
        </table>

        <table style="width: 100%;  text-align: center">
            @if ($penjamin != '')
                @foreach ($penjamin as $item)
                    <tr style="text-align: center;">
                        <td style="width: 45%;   padding: 3px 0; text-align: center">
                            <b>&nbsp;</b>
                        </td>
                        <td style="padding: 4px 0; width: 55%; text-align: center">
                            <b>PENJAMIN {{ $loop->iteration }}</b>
                        </td>
                    </tr>
                    <tr style="text-align: center;">
                        <td style="width: 45%;   padding: 3px 0; text-align: center">
                            <b>&nbsp;</b>
                        </td>
                        <td style="padding: 4px 0; width: 55%; text-align: center">
                            <br><br><br><br><br>
                            @if ($item->nama_pasangan != '')
                                (<b>{{ $item->nama_penjamin }}</b>)
                                (<b>{{ $item->nama_pasangan }}</b>)
                            @else
                                (<b>{{ $item->nama_penjamin }}</b>)
                            @endif
                        </td>
                    </tr>
                @endforeach
            @endif
        </table>
    </div>

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
