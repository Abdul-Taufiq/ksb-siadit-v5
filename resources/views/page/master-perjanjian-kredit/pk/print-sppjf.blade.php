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


        h3 {
            font-size: 12pt;
            line-height: 0px;
            margin-bottom: 0px;
        }

        table td {
            vertical-align: top;
            text-align: justify;
            page-break-before: auto;
            page-break-after: auto;
            page-break-inside: always;
        }

        .header {
            text-align: center;
            margin-bottom: 10px;
        }

        .headlist {
            margin-left: -1px;
            margin-bottom: 2px;
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

        .listhurufkecil {
            list-style-type: lower-alpha;
            padding: 0px;
            margin-left: 20px;
            margin-top: 1px;
            margin-bottom: 0px;
        }

        .listO {
            list-style-type: ;
            padding: 0px;
            margin-left: 40px;
            margin-top: 1px;
            margin-bottom: 0px;
        }

        ul.listDashed {
            list-style-type: none;
        }

        ul.listDashed>li {
            text-indent: -5px;
        }

        ul.listDashed>li:before {
            content: "-";
            text-indent: 5px;
        }

        .pembungkus {
            page-break-inside: avoid;
        }

        ul li {
            page-break-inside: avoid;
            margin: -2px;
        }
    </style>
</head>

<body>

    <div class="pembungkus">
        {{-- header --}}
        <table style="width: 100%; margin-top: -20px">
            <tr>
                <td style="width: 15%">
                    <img style="width: 65px;"
                        src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/images/icon_logo.png'))) }}">
                </td>
                <td style="width: 70%; text-align: center; ">
                    <h3 style="margin-top: 30px;">
                        <b>PERJANJIAN PENYERAHAN</b> <br>
                    </h3>
                    <h3>

                        <b>JAMINAN FIDUSIA</b>
                    </h3>
                </td>
                <td style="width: 15%">&nbsp;</td>
            </tr>
        </table>
        {{-- end header --}}
        <br>
        {{-- Pembukaan --}}
        <div>
            Pada hari ini
            {{ $kredit->kategori_spk == 'SPK' ? $pkpmk->tgl_print_sp_bawah_tangan->translatedFormat('l') : $kredit->addendum->tgl_print_sp_bawah_tangan->translatedFormat('l') }}
            tanggal
            {{ $kredit->kategori_spk == 'SPK' ? $pkpmk->tgl_print_sp_bawah_tangan->translatedFormat('d F Y') : $kredit->addendum->tgl_print_sp_bawah_tangan->translatedFormat('d F Y') }}
            Yang bertanda tangan dibawah ini:
            <table class="paragraph">
                <tr>
                    <td style="width: 25px;">I. </td>
                    <td>
                        @if ($kredit->debitur->status_pernikahan == 'Menikah')
                            <b>{{ strtoupper($kredit->debitur->nama_debitur) }}</b>,
                            lahir di {{ $kredit->debitur->tempat_lahir }}, pada tanggal
                            {{ Carbon\Carbon::parse($kredit->debitur->tgl_lahir)->translatedFormat('d F Y') }},
                            bertempat tinggal di {{ $kredit->debitur->alamat_ktp }} RT/RW
                            {{ $kredit->debitur->rt_rw_ktp }}, Desa/Kelurahan
                            {{ $kredit->debitur->kelurahan }}, Kecamatan {{ $kredit->debitur->kecamatan }},
                            Kabupaten
                            {{ $kredit->debitur->kabupaten }}, NIK: {{ $kredit->debitur->nik }}, Pekerjaan
                            {{ $kredit->debitur->pekerjaan }},
                            yang dalam melakukan perbuatan hukum ini memerlukan persetujuan dari
                            {{ $kredit->debitur->jenis_kelamin == 'Laki-laki' ? 'Istrinya' : 'Suaminya' }}
                            yang sah pada tanggal
                            {{ Carbon\Carbon::parse($kredit->debitur->tgl_pernikahan)->translatedFormat('d F Y') }}
                            dengan <b>{{ strtoupper($kredit->debitur->nama_pasangan) }}</b> yang lahir di
                            {{ $kredit->debitur->tempat_lahir_pasangan }} pada tanggal
                            {{ Carbon\Carbon::parse($kredit->debitur->tgl_lahir_pasangan)->translatedFormat('d F Y') }},
                            NIK: {{ $kredit->debitur->nik_pasangan }}, Pekerjaan
                            {{ $kredit->debitur->pekerjaan_pasangan }},
                            bertempat tinggal
                            {{ $kredit->debitur->alamat_pasangan == 'sama dengan suaminya' ||
                            $kredit->debitur->alamat_pasangan == 'sama dengan istrinya'
                                ? $kredit->debitur->alamat_pasangan
                                : 'di ' . $kredit->debitur->alamat_pasangan }},
                            yang dalam melakukan perbuatan hukum ini bertindak secara bersama-sama, yang selanjutnya
                            disebut sebagai <b>“DEBITUR”</b>.
                        @elseif ($kredit->debitur->status_pernikahan == 'Pernikahan Khusus')
                            <b>{{ strtoupper($kredit->debitur->nama_debitur) }}</b>,
                            lahir di {{ $kredit->debitur->tempat_lahir }}, pada tanggal
                            {{ Carbon\Carbon::parse($kredit->debitur->tgl_lahir)->translatedFormat('d F Y') }},
                            bertempat tinggal di {{ $kredit->debitur->alamat_ktp }} RT/RW
                            {{ $kredit->debitur->rt_rw_ktp }}, Desa/Kelurahan
                            {{ $kredit->debitur->kelurahan }}, Kecamatan {{ $kredit->debitur->kecamatan }},
                            Kabupaten
                            {{ $kredit->debitur->kabupaten }}, NIK: {{ $kredit->debitur->nik }}, Pekerjaan
                            {{ $kredit->debitur->pekerjaan }},
                            yang dalam melakukan perbuatan hukum ini tidak memerlukan persetujuan dari
                            {{ $kredit->debitur->jenis_kelamin == 'Laki-laki' ? 'Istrinya' : 'Suaminya' }}
                            yang sah pada tanggal
                            {{ Carbon\Carbon::parse($kredit->debitur->tgl_pernikahan)->translatedFormat('d F Y') }}
                            dengan <b>{{ strtoupper($kredit->debitur->nama_pasangan) }}</b> yang lahir di
                            {{ $kredit->debitur->tempat_lahir_pasangan }} pada tanggal
                            {{ Carbon\Carbon::parse($kredit->debitur->tgl_lahir_pasangan)->translatedFormat('d F Y') }},
                            NIK: {{ $kredit->debitur->nik_pasangan }}, Pekerjaan
                            {{ $kredit->debitur->pekerjaan_pasangan }},
                            bertempat tinggal
                            {{ $kredit->debitur->alamat_pasangan == 'sama dengan suaminya' ||
                            $kredit->debitur->alamat_pasangan == 'sama dengan istrinya'
                                ? $kredit->debitur->alamat_pasangan
                                : 'di ' . $kredit->debitur->alamat_pasangan }},
                            Berdasarkan Akta {{ $kredit->debitur->judul_akta }}, Nomor
                            {{ $kredit->debitur->no_akta }} yang dibuat pada tanggal
                            {{ Carbon\Carbon::parse($kredit->debitur->tgl_akta)->translatedFormat('d F Y') }},
                            dihadapan Notaris {{ $kredit->debitur->nama_notaris }}. Notaris di
                            {{ $kredit->debitur->kedudukan_notaris }};
                            yang dalam melakukan perbuatan hukum ini bertindak untuk dirinya sendiri, yang
                            selanjutnya disebut sebagai <b>“DEBITUR”</b>.
                        @elseif ($kredit->debitur->status_pernikahan == 'Belum Menikah' || $kredit->debitur->status_pernikahan == 'Duda/Janda')
                            <b>{{ strtoupper($kredit->debitur->nama_debitur) }}</b>,
                            lahir di {{ $kredit->debitur->tempat_lahir }}, pada tanggal
                            {{ Carbon\Carbon::parse($kredit->debitur->tgl_lahir)->translatedFormat('d F Y') }},
                            bertempat tinggal di {{ $kredit->debitur->alamat_ktp }} RT/RW
                            {{ $kredit->debitur->rt_rw_ktp }}, Desa/Kelurahan
                            {{ $kredit->debitur->kelurahan }}, Kecamatan {{ $kredit->debitur->kecamatan }},
                            Kabupaten
                            {{ $kredit->debitur->kabupaten }}, NIK: {{ $kredit->debitur->nik }}, yang dalam
                            melakukan
                            perbuatan hukum ini tidak memerlukan
                            persetujuan dari siapapun karena tidak terikat dengan perkawinan yang sah, yang
                            dalam
                            melakukan perbuatan hukum ini bertindak untuk diri-sendiri, yang selanjutnya
                            disebut sebagai <b>“DEBITUR”</b>.
                        @endif

                        @if ($penjamin != '')
                            @foreach ($penjamin as $penjaminItem)
                                <br>
                                -Yang turut hadir dan menanda-tangani perjanjian ini yaitu,
                                <b>{{ strtoupper($penjaminItem->nama_penjamin) }}</b>, lahir di
                                {{ $penjaminItem->tempat_lahir }},
                                {{ Carbon\Carbon::parse($penjaminItem->tgl_lahir)->translatedFormat('d F Y') }},
                                bertempat tinggal di {{ $penjaminItem->alamat }}, NIK:
                                {{ $penjaminItem->nik }}
                                @if ($penjaminItem->status_pernikahan == 'Menikah')
                                    yang dalam melakukan perbuatan hukum ini memerlukan persetujuan dari
                                    @if ($penjaminItem->jenis_kelamin == 'Laki-laki')
                                        Istrinya
                                    @else
                                        Suaminya
                                    @endif
                                    yang sah. <b>{{ strtoupper($penjaminItem->nama_pasangan) }}</b>, lahir
                                    di
                                    {{ $penjaminItem->tempat_lahir_pasangan }},
                                    {{ Carbon\Carbon::parse($penjaminItem->tgl_lahir_pasangan)->translatedFormat('d F Y') }},
                                    bertempat tinggal {{ $penjaminItem->alamat_pasangan }}, NIK:
                                    {{ $penjaminItem->nik_pasangan }},
                                    yang dalam melakukan hal ini menerangkan bahwa telah setuju memberikan
                                    jaminan
                                    untuk menjamin hutang <b>DEBITUR</b>, yang selanjutnya disebut sebagai
                                    <b>“PENJAMIN”</b>.
                                @elseif ($penjaminItem->status_pernikahan == 'SHM Khusus Waris')
                                    yang dalam melakukan perbuatan hukum ini tidak memerlukan persetujuan
                                    dari
                                    @if ($penjaminItem->jenis_kelamin == 'Laki-laki')
                                        Istrinya
                                    @else
                                        Suaminya
                                    @endif
                                    yang sah,
                                    telah setuju memberikan jaminan
                                    untuk menjamin hutang <b>DEBITUR</b>, selanjutnya disebut sebagai
                                    <b>“PENJAMIN”</b>.
                                @elseif ($penjaminItem->status_pernikahan == 'Pernikahan Khusus')
                                    yang dalam melakukan perbuatan hukum ini tidak memerlukan persetujuan dari
                                    @if ($penjaminItem->jenis_kelamin == 'Laki-laki')
                                        Istrinya
                                    @else
                                        Suaminya
                                    @endif
                                    yang sah. <b>{{ strtoupper($penjaminItem->nama_pasangan) }}</b>, lahir
                                    di
                                    {{ $penjaminItem->tempat_lahir_pasangan }},
                                    {{ Carbon\Carbon::parse($penjaminItem->tgl_lahir_pasangan)->translatedFormat('d F Y') }},
                                    bertempat tinggal {{ $penjaminItem->alamat_pasangan }}, NIK:
                                    {{ $penjaminItem->nik_pasangan }}.
                                    Berdasarkan Akta {{ $penjaminItem->judul_akta }}, Nomor
                                    {{ $penjaminItem->no_akta }} yang dibuat pada tanggal
                                    {{ Carbon\Carbon::parse($penjaminItem->tgl_akta)->translatedFormat('d F Y') }},
                                    dihadapan Notaris {{ $penjaminItem->nama_notaris }}. Notaris di
                                    {{ $penjaminItem->kedudukan_notaris }};
                                    yang dalam melakukan hal ini menerangkan bahwa telah setuju memberikan
                                    jaminan
                                    untuk menjamin hutang <b>DEBITUR</b>, yang selanjutnya disebut sebagai
                                    <b>“PENJAMIN”</b>.
                                @else
                                    yang dalam melakukan perbuatan hukum ini tidak memerlukan
                                    persetujuan dari siapapun karena tidak terikat dengan perkawinan yang
                                    sah,
                                    yang
                                    dalam melakukan hal ini menerangkan bahwa telah setuju memberikan
                                    jaminan
                                    untuk menjamin hutang <b>DEBITUR</b>, yang selanjutnya disebut sebagai
                                    <b>“PENJAMIN”</b>.
                                @endif
                            @endforeach
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>II. </td>
                    <td>
                        @if ($kredit->jns_pinjaman == 'Kredit Pihak Terkait')
                            <b>EKO BAMBANG SETIYOSO</b>, lahir di Kalabahi, pada tanggal 23 Oktober 1962, warga
                            Negara Indonesia, bertempat tinggal di Puri Kencana Blok D No. 21 RT.001, RW.005,
                            Kel/Desa
                            Manding, Kecamatan Temanggung, Kabupaten Temanggung, Provinsi Jawa Tengah, NIK:
                            3323032310620001, Dalam hal ini bertindak dalam kedudukannya selaku Direktur Utama PT
                            BANK
                            PEREKONOMIAN RAKYAT KUSUMA SUMBING, oleh karena itu sah bertindak untuk dan atas nama PT
                            BANK PEREKONOMIAN RAKYAT KUSUMA SUMBING berdasarkan Akta Nomor 8 Tanggal 10 Oktober 2024
                            yang dibuat dihadapan Notaris Novita Alviani, S.H.,M.Kn., yang berkedudukan di Kecamatan
                            Parakan, Kabupaten Temanggung, Provinsi Jawa Tengah. Yang selanjutnya akan disebut
                            sebagai
                            <b>“BANK”</b>.
                        @else
                            <b>{{ strtoupper($kredit->cabang->nama_pincab) }}</b>, lahir di
                            {{ $kredit->cabang->tempat_lahir }},
                            pada tanggal
                            {{ Carbon\Carbon::parse($kredit->cabang->tgl_lahir)->translatedFormat('d F Y') }},
                            warga Negara Indonesia, bertempat tinggal di {{ $kredit->cabang->tempat_tinggal }},
                            NIK:
                            {{ $kredit->cabang->nik }}, Dalam hal ini bertindak dalam kedudukannya selaku
                            {{ $kredit->cabang->jabatan }}
                            PT BANK PEREKONOMIAN RAKYAT KUSUMA SUMBING Cabang {{ $kredit->cabang->alamat }} dalam
                            jabatannya
                            tersebut mewakili Direksi, berdasarkan Surat Kuasa Subtitusi di bawah tangan, Nomor
                            {{ $kredit->cabang->nomor_surat_kuasa }},
                            tanggal
                            {{ Carbon\Carbon::parse($kredit->cabang->tgl_surat_kuasa)->translatedFormat('d F Y') }},
                            oleh karena itu sah bertindak untuk dan atas nama
                            PT BANK PEREKONOMIAN RAKYAT KUSUMA SUMBING, yang berkedudukan di Kecamatan Parakan,
                            Kabupaten
                            Temanggung, Provinsi Jawa Tengah. Yang selanjutnya akan disebut sebagai <b>“BANK”</b>.
                        @endif
                    </td>
                </tr>
            </table>
            Para penghadap tetap bertindak dalam kedudukannya seperti tersebut di atas menerangkan terlebih dahulu:
            {{-- keterangan --}}
            <div class="headlist">
                <div class="list">A.</div>
                <div class="desk">
                    Bahwa, antara Pihak Pertama selaku pihak yang menerima fasilitas pinjaman (untuk selanjutnya
                    cukup disebut <b>"DEBITUR"</b>) dan Penerima Fidusia selaku pihak yang memberi fasilitas
                    pinjaman
                    (untuk selanjutnya disebut <b>"BANK"</b>) telah dibuat dan ditandatangani : Perjanjian Kredit
                    Nomor:
                    {{ $kredit->kategori_spk == 'SPK' ? $pkpmk->no_pkpmk : $kredit->addendum->no_addendum }}
                    tanggal
                    {{ $kredit->kategori_spk == 'SPK' ? $pkpmk->tgl_pkpmk->translatedFormat('d F Y') : $kredit->addendum->tgl_addendum->translatedFormat('d F Y') }}
                    yang dibuat bawah
                    tangan yang bermeterai cukup dan menjadi satu kesatuan bagian yang tidak terpisahkan dari
                    Perjanjian
                    Kredit tersebut, berikut dengan segenap perubahan dan penambahannya disebut "Perjanjian Kredit"
                </div>
            </div>
            <div class="headlist">
                <div class="list">B.</div>
                <div class="desk">
                    Bahwa, untuk lebih menjamin dan menanggung terbayarnya dengan baik segala sesuatu yang terutang
                    dan
                    harus dibayar oleh <b>DEBITUR</b> sebagaimana diatur dalam Perjanjian Kredit tersebut, Pemberi
                    Fidusia diwajibkan untuk memberikan jaminan fidusia berupa kendaraan milik Debitor atau Pemberi
                    Fidusia untuk kepentingan Penerima Fidusia, sebagaimana yang akan diuraikan di bawah ini.
                </div>
            </div>
            <div class="headlist">
                <div class="list">C.</div>
                <div class="desk">
                    Bahwa untuk memenuhi ketentuan tentang pemberian jaminan yang ditentukan dalam Perjanjian Kredit
                    tersebut, maka Pemberi Fidusia dan Penerima Fidusia telah sepakat dan setuju, dengan ini
                    mengadakan
                    perjanjian sebagaimana yang dimaksud dalam Undang-Undang Nomor 42 Tahun 1999 (seribu sembilan
                    ratus
                    sembilan puluh sembilan), yaitu perjanjian tentang Jaminan Fidusia sebagaimana yang hendak
                    dinyatakan.
                </div>
            </div>

            {{-- klausul --}}
            - Selanjutnya para penghadap tetap bertindak dalam kedudukannya seperti tersebut diatas menerangkan
            untuk
            menjamin terbayarnya dengan baik segala sesuatu yang terutang dan harus dibayarkan oleh <b>DEBITUR</b>
            kepada <b>BANK</b>, baik karena hutang pokok, bunga dan biaya-biaya lainnya yang timbul berdasarkan
            Perjanjian Kredit tersebut,
            dengan jumlah hutang pokok sebesar {{ 'Rp' . number_format($kredit->jumlah_disetujui, 0, ',', '.') }}
            ({{ terbilang_id($kredit->jumlah_disetujui) }}) dan/atau sejumlah
            uang
            yang ditentukan dikemudian hari berdasarkan Perjanjian Kredit tersebut, maka para penghadap
            <b>DEBITUR</b>
            bertindakan dalam kedudukan tersebut, dengan bertindak selaku Pemberi Fidusia, menerangkan dengan ini
            memberikan jaminan
            fidusia dengan mengalihkan hak kepemilikan secara kepercayaan kepada Penerima Fidusia dan <b>BANK</b>
            dalam
            kedudukan tersebut dengan bertindak selaku Penerima Fidusia menerangkan dengan ini menerima pengalihan
            hak
            kepemilikan secara kepercayaan dari Pemberi Fidusia, agar Penerima Fidusia memperoleh Jaminan Fidusia,
            atas
            objek jaminan fidusia atas obyek jaminan fidusia berupa Kendaraan sebagai berikut :


            {{-- membuat urutan --}}
            @php
                $counter = 1;
            @endphp
            {{-- jaminan --}}
            @foreach ($kendaraan as $kenda)
                <div style="margin-left: 25px;">
                    <b>
                        {{ $counter }}. Kendaraan
                        @php $counter++; @endphp
                    </b>
                </div>
                <ul class="listO" style="margin-left: 60px">
                    <li>
                        <span style="word-spacing: 115px">Jenis :</span>
                        {{ $kenda->jns_kendaraan }}
                    </li>
                    <li>
                        <span style="word-spacing: 31mm">Merk :</span>
                        {{ $kenda->merk }}
                    </li>
                    <li>
                        <span style="word-spacing: 31mm">Type :</span>
                        {{ $kenda->type }}
                    </li>
                    <li>
                        <span style="word-spacing: 28mm">Warna :</span>
                        {{ $kenda->warna }}
                    </li>
                    <li>
                        No. <span style="word-spacing: 80px">BPKB :</span>
                        {{ $kenda->no_bpkb }}
                    </li>
                    <li>
                        No. <span style="word-spacing: 18mm">Rangka :</span>
                        {{ $kenda->no_rangka }}
                    </li>
                    <li>
                        No. <span style="word-spacing: 80px">Mesin :</span>
                        {{ $kenda->no_mesin }}
                    </li>
                    <li>
                        Tahun <span style="word-spacing: 22px">Pembuatan :</span>
                        {{ $kenda->thn_pembuatan }}
                    </li>
                    <li>
                        <span style="word-spacing: 111px">Nopol :</span>
                        {{ $kenda->nopol }}
                    </li>
                    <li>
                        Atas <span style="word-spacing: 73px">Nama :</span>
                        {{ strtoupper($kenda->atas_nama) }}
                    </li>
                </ul>
                - menurut keterangan Pemberi Fidusia {{ $kenda->jns_kendaraan }} tersebut adalah milik Pemberi
                Fidusia
                berdasarkan BPKB dan bukti-bukti lain yang telah ditunjukan dan diperlihatkan kepada <b>BANK</b>;
                <br>
                - keadaan kendaraan tersebut telah diketahui oleh Pemberi Fidusia dan Penerima Fidusia sehingga
                Pemberi
                Fidusia dan Penerima Fidusia menganggap tidak perlu lagi menguraikan lebih lanjut; <br>
                Untuk selanjutnya dalam ini cukup disebut dengan "Obyek Jaminan Fidusia”. Yang bernilai
                {{ 'Rp' . number_format($kenda->nilai_jaminan, 0, ',', '.') }}
                ({{ Riskihajar\Terbilang\Facades\Terbilang::make($kenda->nilai_jaminan, ' rupiah') }})
                Nilai Penjaminan berdasarkan Perjanjian ini adalah
                {{ 'Rp' . number_format($kenda->nilai_taksasi, 0, ',', '.') }}
                ({{ Riskihajar\Terbilang\Facades\Terbilang::make($kenda->nilai_taksasi, ' rupiah') }}); <br>
                - Selanjutnya para penghadap senantiasa tetap bertindak dalam kedudukannya tersebut menerangkan
                pembebanan jaminan fidusia ini diterima dan dilangsungkan dengan persyaratan persyaratan dan
                ketentuan-ketentuan sebagai berikut:
            @endforeach

        </div>
        {{-- End Pembukaan --}}


        {{-- pasal 1 --}}
        <br>
        <div>
            <div class="header">
                <h3>PASAL 1</h3>
            </div>
            <div class="isi">
                <div class="headlist">
                    <div class="list">(1)</div>
                    <div class="desk">
                        Pengalihan hak kepemilikan atas Obyek Jaminan Fidusia terjadi ditempat dimana Obyek Jaminan
                        Fidusia tersebut berada sejak tanggal penandatanganan Akta ini, sehingga dengan demikian
                        Penerima Fidusia memperoleh hak kepemilikan atas Obyek Jaminan Fidusia, dengantidak
                        mengurangi
                        ketentuan dalam Undang-undang tentang Jaminan Fidusia dan ketentuan yang tercantum dalam
                        Akta
                        ini.
                    </div>
                </div>
                <div class="headlist">
                    <div class="list">(2)</div>
                    <div class="desk">
                        Terhitung sejak beralihnya hak kepemilikan atas Obyek Jaminan Fidusia dan selama berlakunya
                        perjanjian ini Obyek Jaminan Fidusia tersebut dikuasai oleh Pemberi Fidusia dalamhubungan
                        pinjam
                        pakai, dengan syarat sesuai peraturan perundangan-undangan yang berlaku dan ketentuan yang
                        tercantum dalam Akta ini.
                    </div>
                </div>
            </div>
        </div>
        {{-- end pasal 1 --}}


        {{-- pasal 2 --}}
        <br>
        <div>
            <div class="header">
                <h3>PASAL 2</h3>
            </div>
            <div class="isi">
                <div class="headlist">
                    <div class="list">(1)</div>
                    <div class="desk">
                        Obyek Jaminan Fidusia hanya dapat dipergunakan oleh Pemberi Fidusia menurut sifat dan
                        peruntukannya, dengan tidak ada kewajiban bagi Pemberi Fidusia untuk membayar biaya/ganti
                        rugi
                        berupa apapun untuk pinjam pakai tersebut kepada Penerima Fidusia.
                    </div>
                </div>
                <div class="headlist">
                    <div class="list">(2)</div>
                    <div class="desk">
                        Pemberi Fidusia berkewajiban untuk memelihara Obyek Jaminan Fidusia dengan sebaik-baiknya
                        dan melakukan semua tindakan yang diperlukan untuk pemeliharaan dan perbaikan atas Obyek
                        Jaminan
                        Fidusia atas biaya dan tanggungan Pemberi Fidusia sendiri, serta membayar pajak dan beban
                        lainnya yang bersangkutan dengan itu.
                    </div>
                </div>
                <div class="headlist">
                    <div class="list">(3)</div>
                    <div class="desk">
                        Apabila untuk penggunaan atas Obyek Jaminan Fidusia tersebut diperlukan suatu kuasa khusus,
                        maka Penerima Fidusia dengan ini memberi kuasa kepada Pemberi Fidusia untuk melakukan
                        tindakan
                        yang diperlukan dalam rangka pinjam pakai Obyek Jaminan Fidusia tersebut.
                    </div>
                </div>
                <div class="headlist">
                    <div class="list">(4)</div>
                    <div class="desk">
                        Penerima Fidusia tidak bertanggung jawab kepada Pemberi Fidusia atau pihak lain berkenaan
                        dengan kerugian dan kerusakan Obyek Jaminan Fidusia atau bagian dari padanya maupun
                        atas-kerugian atau kecelakaan yang menimpa karyawan atau pihak ketiga yang disebabkan oleh
                        penggunaan atau pengoperasian Obyek Jaminan Fidusia atau bagian dari padanya.
                    </div>
                </div>
                <div class="headlist">
                    <div class="list">(5)</div>
                    <div class="desk">
                        Pemberi Fidusia wajib menjamin sepenuhnya dan melindungi Penerima Fidusia terhadap setiap
                        tuntutan, gugatan, atau biaya yang timbul dari atau sehubungan dengan pemeliharaan,
                        penggunaan,
                        pengoperasian, kepemilikan atau keadaan Obyek Jaminan Fidusia maupun keberadaan Akta ini.
                    </div>
                </div>
            </div>
        </div>
        {{-- end pasal 2 --}}


        {{-- pasal 3 --}}
        <br>
        <div>
            <div class="header">
                <h3>PASAL 3</h3>
            </div>
            <div class="isi">
                <div class="headlist">
                    <div class="list">(1)</div>
                    <div class="desk">
                        Pemberi Fidusia menjamin Penerima Fidusia bahwa:
                        <ol class="listhurufkecil">
                            <li>
                                Obyek Jaminan Fidusia adalah benar ada dan hanya Pemberi Fidusia yang berhak
                                atasnya;
                            </li>
                            <li>
                                Obyek Jaminan Fidusia belum pernah dijual/dialihkan haknya dengan cara apapun kepada
                                siapapun kecuali kepada Penerima Fidusia, sehingga Pemberi Fidusia berhak dan
                                mempunyai
                                kewenangan untuk mengalihkan hak kepemilikkannya;
                            </li>
                            <li>
                                Obyek Jaminan Fidusia tidak berada dalam keadaan sedang dijaminkan baik sekarang
                                maupun dikemudian hari kepada siapapun dan dengan cara apapun kecuali kepada
                                Penerima
                                Fidusia, serta tidak tersangkut dalam suatu perkara atau dalam sitaan;
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="headlist">
                    <div class="list">(2)</div>
                    <div class="desk">
                        Pemberi Fidusia baik sekarang maupun dikemudian hari membebaskan dan/atau -melepaskan
                        Penerima
                        Fidusia dari segenap tuntutan, gugatan atau tagihan yang mungkin diajukan oleh orang/pihak
                        siapapun yang menyatakan mempunyai hak terlebih dahulu atau turut mempunyai hak atas Obyek
                        Jaminan Fidusia dan yang mengenai atau yang berhubungandengan hal yang dijamin oleh Pemberi
                        Fidusia tersebut diatas.
                    </div>
                </div>
            </div>
        </div>
        {{-- end pasal 3 --}}


        {{-- pasal 4 --}}
        <br>
        <div>
            <div class="header">
                <h3>PASAL 4</h3>
            </div>
            <div class="isi">
                <div class="headlist">
                    <div class="list">(1)</div>
                    <div class="desk">
                        Penerima Fidusia atau wakilnya yang sah setiap waktu berhak dan dengan ini telah diberi
                        kuasa dengan hak substitusi oleh Pemberi Fidusia untuk memeriksa tentang adanya dan tentang
                        keadaan Obyek Jaminan Fidusia.
                    </div>
                </div>
                <div class="headlist">
                    <div class="list">(2)</div>
                    <div class="desk">
                        Penerima Fidusia atas biaya Pemberi Fidusia berhak namun tidak diwajibkan untuk melakukan
                        atau suruh melakukan segala sesuatu yang seharusnya dilakukan oleh Pemberi Fidusia atas
                        Obyek
                        Jaminan Fidusia dalam hal Pemberi Fidusia melalaikan kewajibannya untuk melaksanakan
                        perbaikan
                        dan/atau perawatan atas Obyek Jaminan Fidusia termasuk tetapi tidak - terbatas untuk
                        memasuki,
                        gudang, bangunan, ruang atau tempat dimana Obyek Jaminan Fidusia disimpan atau berada.
                    </div>
                </div>
                Pemberi Fidusia dan Penerima Fidusia menyatakan bahwa tindakan tersebut tidak merupakan tindakan
                memasuki tempat dan/atau bangunan tanpa izin (trespass).
            </div>
        </div>
        {{-- end pasal 4 --}}


        {{-- pasal 5 --}}
        <br>
        <div>
            <div class="header">
                <h3>PASAL 5</h3>
            </div>
            <div class="isi">
                Apabila bagian dari Obyek Jaminan Fidusia atau diantara Obyek Jaminan Fidusia tersebut ada yang
                hilang
                atau tidak dapat dipergunakan lagi, maka Pemberi Fidusia dengan ini berjanji dan karenanya
                mengikatkan
                diri untuk mengganti bagian dari Obyek Jaminan Fidusia yang hilang atau tidak dapat dipergunakan itu
                dengan Obyek Jaminan Fidusia lainnya yang sejenis yang nilainya setara dengan - yang digantikan
                serta
                yang dapat disetujui Penerima Fidusia, sedang pengganti Obyek Jaminan Fidusia tersebut termasuk
                dalam
                jaminan fidusia yang dinyatakan dalam Perjanjian ini.
            </div>
        </div>
        {{-- end pasal 5 --}}



        {{-- pasal 6 --}}
        <br>
        <div>
            <div class="header">
                <h3>PASAL 6</h3>
            </div>
            <div class="isi">
                <div class="headlist">
                    <div class="list">(1)</div>
                    <div class="desk">
                        Bilamana Pemberi Fidusia tidak memenuhi dengan seksama kewajibannya sesuai dengan ketentuan
                        dalam Perjanjian ini atau DEBITUR tidak memenuhi kewajiban berdasarkan Perjanjian, maka
                        lewatnya
                        waktu yang ditentukan untuk memenuhi kewajiban tersebut saja sudah cukup membuktikan tentang
                        adanya pelanggaran atau kelalaian Pemberi Fidusia atau DEBITUR dalam memenuhi kewajiban
                        tersebut, tanpa untuk itu diperlukan lagi sesuatu surat teguran juru sita atau surat lain
                        yang
                        serupa dengan itu, maka dalam hal terjadi demikian hak Pemberi Fidusia untuk meminjam pakai
                        Obyek Jaminan Fidusia menjadi berakhir dan Obyek Jaminan Fidusia harus diserahkan kembali
                        oleh
                        Pemberi Fidusia kepada Penerima Fidusia dengan segera, setelah diberitahukan secara tertulis
                        oleh Penerima Fidusia.
                    </div>
                </div>
                <div class="headlist">
                    <div class="list">(2)</div>
                    <div class="desk">
                        Dalam hal Penerima Fidusia mempergunakan hak-hak yang diberikan kepadanya seperti yang
                        diuraikan dalam ayat 1 pasal ini, Pemberi Fidusia wajib dan mengikat diri sekarang ini untuk
                        dipergunakan dikemudian hari pada waktunya, menyerahkan Obyek Jaminan Fidusia dalam keadaan
                        terpelihara baik kepada dan ditempat yang ditentukan Penerima Fidusia atas pemberitahuan
                        atau
                        teguran pertama dari Penerima Fidusia.
                    </div>
                </div>
                <div class="headlist">
                    <div class="list">(3)</div>
                    <div class="desk">
                        Dalam hal Pemberi Fidusia tidak memenuhi ketentuan seperti tersebut pada ayat 2 Pasal ini,
                        atau kuasanya yang sah, dengan memperhatikan peraturan perundang-undangan yang berlaku,
                        berhak
                        untuk mengambil atau suruh mengambil Obyek Jaminan Fidusia dari tempat dimanapun Obyek
                        Jaminan
                        Fidusia berada, baik dari tangan Pemberi Fidusia maupun dari tangan pihak ketiga yang
                        menguasainya, dengan ketentuan, bahwa semua biaya yang bertalian dengan itu menjadi
                        tanggungan
                        dan harus dibayar oleh Pemberi Fidusia atau Debitor.
                    </div>
                </div>
            </div>
        </div>
        {{-- end pasal 6 --}}



        {{-- pasal 7 --}}
        <br>
        <div>
            <div class="header">
                <h3>PASAL 7</h3>
            </div>
            <div class="isi">
                <div class="headlist">
                    <div class="list">(1)</div>
                    <div class="desk">
                        Penerima Fidusia atau kuasanya berhak untuk melaksanakan Pendaftaran Jaminan Fidusia yang
                        dimaksudkan dalam Perjanjian ini dan untuk keperluan tersebut menghadap dihadapan pejabat
                        atau
                        instansi yang berwenang (termasuk Kantor Pendaftaran Fidusia), memberikan keterangan dan
                        laporan, menandatangani surat/formulir, mendaftarkan Jaminan Fidusia atas Obyek Jaminan
                        Fidusia
                        tersebut dengan melampirkan Pernyataan Pendaftaran Jaminan Fidusia, serta BANK diberikan hak
                        untuk mengajukan permohonan pendaftaran pengikatan Jaminan Fidusia melalui Notaris melalui
                        Perjanjian ini dan segala tindakan yang perlu dan berguna untuk melaksanakan pendaftaran
                        Jaminan
                        Fidusia tersebut.
                    </div>
                </div>
                <div class="headlist">
                    <div class="list">(2)</div>
                    <div class="desk">
                        Penerima Fidusia diberi kuasa dengan hak substitusi oleh Pemberi Fidusia untuk menjalankan
                        dan/atau mempertahankan hak-hak Penerima Fidusia berdasarkan Perjanjian ini, termasuk tetapi
                        tidak terbatas untuk melakukan perubahan atau penyesuaian atas ketentuan dalam Perjanjian
                        ini.
                        Pemberi Fidusia dengan ini menyanggupi pula, segera setelah menerima permintaan dari
                        Penerima
                        Fidusia, untuk melakukan tindakan apapun yang diperlukan guna melakukan pendaftaran, serta
                        untuk
                        menanda-tangani dan memberikan kepada Penerima Fidusia tambahan wewenang atau kuasa yang
                        dianggap perlu atau baik oleh Penerima Fidusia untuk mempertahankan dan melaksanakan haknya
                        berdasarkan Perjanjian ini.
                    </div>
                </div>
            </div>
        </div>
        {{-- end pasal 7 --}}


        {{-- pasal 8 --}}
        <br>
        <div>
            <div class="header">
                <h3>PASAL 8</h3>
            </div>
            <div class="isi">
                Perjanjian ini merupakan bagian yang terpenting dan tidak dapat dipisahkan dari Perjanjian Kredit
                tersebut, demikian pula kuasa yang diberikan dalam Perjanjian ini merupakan bagian yang terpenting
                serta
                tidak-terpisahkan dari Perjanjian ini tanpa adanya Perjanjian ini dan kuasa tersebut, Maka
                Perjanjian
                Kredit tersebut demikian pula Perjanjian ini tidak akan diterima dan dilangsungkan diantara para
                pihak
                yang bersangkutan, oleh karenanya kuasa ini tidak akan batal atau berakhir karena sebab yang dapat
                mengakhiri pemberian sesuatu kuasa, termasuk sebab yang disebutkan dalam Pasal 1813, 1814 dan 1816
                Kitab
                Undang-Undang Hukum Perdata Indonesia.
            </div>
        </div>
        {{-- end pasal 8 --}}


        {{-- pasal 9 --}}
        <br>
        <div>
            <div class="header">
                <h3>PASAL 9</h3>
            </div>
            <div class="isi">
                Apabila dalam pemberian keterangan tersebut tidak benar adanya atau tidak sesuai dengan fakta yang
                ada,
                maka SAYA siap untuk dituntut dengan ancaman Pidana sesuai Pasal 372 KUHP jo 378 KUHP tentang
                Pengelapan
                dan Penipuan.
            </div>
        </div>
        {{-- end pasal 9 --}}


        {{-- pasal 10 --}}
        <br>
        <div>
            <div class="header">
                <h3>PASAL 10</h3>
            </div>
            <div class="isi">
                Mengenai perjanjian ini dan segala akibat-akibat serta pelaksanaan para pihak memilih tempat
                kediaman
                hukum yang umum dikantor Panitera Pengadilan Negeri {{ ucfirst(strtolower($kredit->cabang->pn)) }} di
                {{ ucfirst(strtolower($kredit->cabang->alamat_pn)) }} demikian dengan tidak mengurangi hak <b>BANK</b>
                untuk
                memohon
                pelaksanaan/eksekusi
                dari perjanjian ini, serta mengajukan tuntutan hukum terhadap <b>DEBITUR</b> melalui
                Pengadilan-Pengadilan dan/atau Instansi atau Lembaga Pemerintah yang berada dalam wilayah Republik
                Indonesia.
            </div>
        </div>
        {{-- end pasal 10 --}}

        Demikian Perjanjian ini dibuat untuk digunakan sesuai dengan fungsinya.
    </div>



    {{-- TTD --}}
    <br>
    <br>
    <div style="page-break-inside: avoid">
        <div style="text-align: center;">
            {{ ucfirst(strtolower($kredit->cabang->alamat)) }},
            {{ $kredit->kategori_spk == 'SPK' ? $pkpmk->tgl_pkpmk->translatedFormat('d F Y') : $kredit->addendum->tgl_addendum->translatedFormat('d F Y') }}
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
                    @if ($kredit->jns_pinjaman == 'Kredit Pihak Terkait')
                        (<b>EKO BAMBANG SETIYOSO</b>)
                    @else
                        (<b>{{ strtoupper($kredit->cabang->nama_pincab) }}</b>)
                    @endif
                </td>
                <td style="padding: 4px 0; width: 55%; text-align: center;">
                    <br><br><br><br>
                    @if ($kredit->debitur->status_pernikahan == 'Menikah')
                        (<b>{{ strtoupper($kredit->debitur->nama_debitur) }}</b>)
                        (<b>{{ strtoupper($kredit->debitur->nama_pasangan) }}</b>)
                    @else
                        (<b>{{ strtoupper($kredit->debitur->nama_debitur) }}</b>)
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
                            <br><br><br><br>
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
