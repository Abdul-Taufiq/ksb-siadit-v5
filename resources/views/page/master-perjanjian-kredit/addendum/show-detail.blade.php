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

        /* .list {
            margin-left: 6.2rem !important;
        } */

        .premis-jaminan {
            margin-left: 5.1rem;
        }

        .btn-print {
            position: fixed;
            width: 100%;
            background-color: rgb(53, 53, 53);
        }

        .headlist {
            font-size: 11pt;
            margin-left: 10px;
            margin-bottom: 2px;
            font-family: Tahoma, sans-serif;
            text-align: justify;
        }

        .list {
            float: left;
            width: 5%;
            margin-left: 2px;
        }

        .desk {
            margin-left: 5%;
            width: 95%;
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
                <b>Addendum</b>
                {{ $pkpmk->debitur->nama_debitur }}
            </p>
            <a type="button" class="btn btn-info btn-icon-text btn-rounded" onClick="window.print();return false">
                <i class="bi bi-file-earmark-arrow-down-fill"></i>
                <b>Preview Addendum</b>
            </a>
        </div>
    </div>
    <div class="zonk" style="height: 55px;">&nbsp;</div>

    <div style="margin: 10mm 5mm 10mm 15mm">
        @include('page.master-perjanjian-kredit.addendum.pasal.header-&-premis')
        <i class="text-danger">This Page Preview</i>

        {{-- OPSIONAL SESUAI KONDISI --}}
        @switch($pkpmk->kredit->jns_kategori_spk)
            @case('Reschedulling')
                <div class="headlist">
                    <div class="list">1.</div>
                    <div class="desk">
                        Pasal 2 diubah sehingga menjadi sebagai berikut : <br>
                        @include('page.master-perjanjian-kredit.addendum.pasal.pasal2')
                    </div>
                </div>
                <div class="headlist">
                    <div class="list">2.</div>
                    <div class="desk">
                        Pasal 3 diubah sehingga menjadi sebagai berikut : <br>
                        @include('page.master-perjanjian-kredit.addendum.pasal.pasal3')
                    </div>
                </div>
                <div class="headlist">
                    <div class="list">3.</div>
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
                    <div class="list">1.</div>
                    <div class="desk">
                        Pasal 1 diubah sehingga menjadi sebagai berikut :
                        @include('page.master-perjanjian-kredit.addendum.pasal.pasal1')
                    </div>
                </div>
                <div class="headlist">
                    <div class="list">2.</div>
                    <div class="desk">
                        Pasal 2 diubah sehingga menjadi sebagai berikut :
                        @include('page.master-perjanjian-kredit.addendum.pasal.pasal2')
                    </div>
                </div>
                <div class="headlist">
                    <div class="list">3.</div>
                    <div class="desk">
                        Pasal 3 diubah sehingga menjadi sebagai berikut :
                        @include('page.master-perjanjian-kredit.addendum.pasal.pasal3')
                    </div>
                </div>
                <div class="headlist">
                    <div class="list">4.</div>
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
                    <div class="list">1.</div>
                    <div class="desk">
                        Pasal 1 diubah sehingga menjadi sebagai berikut :
                        @include('page.master-perjanjian-kredit.addendum.pasal.pasal1')
                    </div>
                </div>
                <div class="headlist">
                    <div class="list">2.</div>
                    <div class="desk">
                        Pasal 2 diubah sehingga menjadi sebagai berikut :
                        @include('page.master-perjanjian-kredit.addendum.pasal.pasal2')
                    </div>
                </div>
                <div class="headlist">
                    <div class="list">3.</div>
                    <div class="desk">
                        Pasal 3 diubah sehingga menjadi sebagai berikut :
                        @include('page.master-perjanjian-kredit.addendum.pasal.pasal3')
                    </div>
                </div>
                <div class="headlist">
                    <div class="list">4.</div>
                    <div class="desk">
                        Pasal 4 diubah sehingga menjadi sebagai berikut :
                        @include('page.master-perjanjian-kredit.addendum.pasal.pasal4')
                    </div>
                </div>
                <div class="headlist">
                    <div class="list">5.</div>
                    <div class="desk">
                        Pasal 5 diubah sehingga menjadi sebagai berikut :
                        @include('page.master-perjanjian-kredit.addendum.pasal.pasal5')
                    </div>
                </div>
            @break

            @case('Perubahan Fasilitas Kredit')
                @include('page.master-perjanjian-kredit.pk.pasal.header-&-premis')
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
                    <div class="list">1.</div>
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
                {{ ucfirst($pkpmk->cabang->alamat) }},
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
                            (<b>{{ strtoupper($pkpmk->kredit->cabang->nama_pincab) }}</b>)
                        @endif
                    </td>
                    <td style="padding: 4px 0; width: 55%; text-align: center;">
                        <br><br><br><br>
                        @if ($pkpmk->kredit->debitur->status_pernikahan == 'Menikah')
                            (<b>{{ strtoupper($pkpmk->kredit->debitur->nama_debitur) }}</b>)
                            (<b>{{ strtoupper($pkpmk->kredit->debitur->nama_pasangan) }}</b>)
                        @else
                            (<b>{{ strtoupper($pkpmk->kredit->debitur->nama_debitur) }}</b>)
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
                                    (<b>{{ strtoupper($item->nama_penjamin) }}</b>)
                                    (<b>{{ strtoupper($item->nama_pasangan) }}</b>)
                                @else
                                    (<b>{{ strtoupper($item->nama_penjamin) }}</b>)
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @endif
            </table>
        </div>
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
