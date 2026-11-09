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
            margin: 1.5cm 1.2cm 2.4cm 2.5cm;
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
            /* line-height: 0px !important; */
            margin-bottom: -5px !important;
            /* font-weight: bold !important; */
        }

        .header {
            text-align: center;
            margin-bottom: 10px;
            page-break-after: avoid;
            page-break-inside: avoid;
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
            <td style="width: 20%; border: none;">
                <img style="width: 65px;"
                    src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/images/icon_logo.png'))) }}">
            </td>
            <td style="width: 60%; text-align: center !important; vertical-align: middle; border: none;">
                <h3>
                    PERJANJIAN GADAI
                </h3>
                <h3>
                    Nomor: {!! $pkpmk->no_gadai ?? '<i class="text-danger">Not Display in Here</i>' !!}
                </h3>
            </td>
            <td style="width: 20%; border: none;">&nbsp;</td>
        </tr>
    </table>


    {{-- premis --}}
    <div class="mb-4">
        Pada hari ini {!! $pkpmk->tgl_print_gadai?->translatedFormat('l') ?? '<i class="text-danger">Not Display in Here</i>' !!} tanggal
        {!! $pkpmk->tgl_print_gadai?->translatedFormat('d F Y') ??
            ($pkpmk->tgl_addendum?->translatedFormat('d F Y') ?? '<i class="text-danger">Not Display in Here</i>') !!}
        yang bertanda tangan dibawah ini:

        <table class="table table-sm table-borderless w-100 mb-1">
            <tr>
                <td style="width: 5%; padding-right: 0.4rem !important; padding-left: 0.4rem !important">I. </td>

                @if ($penjamin !== null)
                    <td>
                        @if ($penjamin->status_pernikahan == 'Menikah')
                            <b>{{ $penjamin->nama_penjamin }}</b>, lahir di {{ $penjamin->tempat_lahir }}, pada tanggal
                            {{ $penjamin->tgl_lahir->translatedFormat('d F Y') }}, bertempat tinggal di
                            {{ $penjamin->alamat }}
                            , NIK: {{ $penjamin->nik }}, yang dalam melakukan perbuatan hukum ini memerlukan
                            persetujuan dari
                            {{ $penjamin->jenis_kelamin == 'Laki-laki' ? 'Istrinya' : 'Suaminya' }}
                            yang sah pada tanggal {{ $penjamin->tgl_pernikahan->translatedFormat('d F Y') }}
                            dengan <b>{{ $penjamin->nama_pasangan }}</b> yang lahir di
                            {{ $penjamin->tempat_lahir_pasangan }} pada tanggal
                            {{ $penjamin->tgl_lahir_pasangan->translatedFormat('d F Y') }},
                            NIK: {{ $penjamin->nik_pasangan }}, bertempat tinggal
                            {{ $penjamin->alamat_pasangan == 'sama dengan suaminya' || $penjamin->alamat_pasangan == 'sama dengan istrinya'
                                ? $penjamin->alamat_pasangan
                                : 'di ' . $penjamin->alamat_pasangan }},
                            yang dalam melakukan perbuatan hukum ini bertindak secara bersama-sama, yang selanjutnya
                            disebut sebagai <b>PIHAK PERTAMA (I)</b> atau disebut juga Pemilik
                            <b>{{ strtoupper($depo->jns_jaminan) }}</b>.
                        @elseif ($penjamin->status_pernikahan == 'Pernikahan Khusus')
                            <b>{{ $penjamin->nama_penjamin }}</b>,
                            lahir di {{ $penjamin->tempat_lahir }}, pada tanggal
                            {{ $penjamin->tgl_lahir->translatedFormat('d F Y') }},
                            bertempat tinggal di {{ $penjamin->alamat }} , NIK: {{ $penjamin->nik }}, yang dalam
                            melakukan perbuatan hukum ini tidak memerlukan
                            persetujuan dari {{ $penjamin->jenis_kelamin == 'Laki-laki' ? 'Istrinya' : 'Suaminya' }}
                            yang sah pada tanggal {{ $penjamin->tgl_pernikahan->translatedFormat('d F Y') }}
                            dengan <b>{{ $penjamin->nama_pasangan }}</b> yang lahir di
                            {{ $penjamin->tempat_lahir_pasangan }} pada tanggal
                            {{ $penjamin->tgl_lahir_pasangan->translatedFormat('d F Y') }},
                            NIK: {{ $penjamin->nik_pasangan }},
                            bertempat tinggal
                            {{ $penjamin->alamat_pasangan == 'sama dengan suaminya' || $penjamin->alamat_pasangan == 'sama dengan istrinya'
                                ? $penjamin->alamat_pasangan
                                : 'di ' . $penjamin->alamat_pasangan }},
                            Berdasarkan Akta {{ $penjamin->judul_akta }}, Nomor
                            {{ $penjamin->no_akta }} yang dibuat pada tanggal
                            {{ $penjamin->tgl_akta->translatedFormat('d F Y') }},
                            dihadapan Notaris {{ $penjamin->nama_notaris }}. Notaris di
                            {{ $penjamin->kedudukan_notaris }};
                            yang dalam melakukan perbuatan hukum ini bertindak untuk dirinya sendiri, yang
                            selanjutnya disebut sebagai <b>PIHAK PERTAMA (I)</b> atau disebut juga Pemilik
                            <b>{{ strtoupper($depo->jns_jaminan) }}</b>.
                        @else
                            <b>{{ $penjamin->nama_penjamin }}</b>, lahir di {{ $penjamin->tempat_lahir }}, pada
                            tanggal
                            {{ $penjamin->tgl_lahir->translatedFormat('d F Y') }}, bertempat tinggal di
                            {{ $penjamin->alamat }}, NIK: {{ $penjamin->nik }}, yang dalam
                            melakukan perbuatan hukum ini tidak memerlukan
                            persetujuan dari siapapun karena tidak terikat dengan perkawinan yang sah, yang
                            dalam melakukan perbuatan hukum ini bertindak untuk diri-sendiri, yang selanjutnya
                            disebut sebagai <b>PIHAK PERTAMA (I)</b> atau disebut juga Pemilik
                            <b>{{ strtoupper($depo->jns_jaminan) }}</b>.
                        @endif
                    </td>
                @else
                    <td>
                        @if ($debitur->status_pernikahan == 'Menikah')
                            <b>{{ $debitur->nama_debitur }}</b>, lahir di {{ $debitur->tempat_lahir }}, pada tanggal
                            {{ $debitur->tgl_lahir->translatedFormat('d F Y') }}, bertempat tinggal di

                            @if ($debitur->alamat_ktp == $debitur->alamat_rumah)
                                {{ $debitur->alamat_ktp }} RT/RW {{ $debitur->rt_rw_ktp }}, Desa/Kelurahan
                                {{ $debitur->kelurahan }}, Kecamatan {{ $debitur->kecamatan }}, Kabupaten/Kota
                                {{ $debitur->kabupaten }},
                            @else
                                {{ $debitur->alamat_rumah }},
                            @endif

                            NIK: {{ $debitur->nik }},
                            yang dalam melakukan perbuatan hukum ini memerlukan persetujuan dari
                            {{ $debitur->jenis_kelamin == 'Laki-laki' ? 'Istrinya' : 'Suaminya' }}
                            yang sah pada tanggal
                            {{ $debitur->tgl_pernikahan->translatedFormat('d F Y') }}
                            dengan <b>{{ $debitur->nama_pasangan }}</b> yang lahir di
                            {{ $debitur->tempat_lahir_pasangan }} pada tanggal
                            {{ $debitur->tgl_lahir_pasangan->translatedFormat('d F Y') }},
                            NIK: {{ $debitur->nik_pasangan }},
                            bertempat tinggal
                            {{ $debitur->alamat_pasangan == 'sama dengan suaminya' || $debitur->alamat_pasangan == 'sama dengan istrinya'
                                ? $debitur->alamat_pasangan
                                : 'di ' . $debitur->alamat_pasangan }},
                            yang dalam melakukan perbuatan hukum ini bertindak secara bersama-sama, yang selanjutnya
                            disebut sebagai <b>PIHAK PERTAMA (I)</b> atau disebut juga Pemilik
                            <b>{{ strtoupper($depo->jns_jaminan) }}</b>.
                        @elseif ($debitur->status_pernikahan == 'Pernikahan Khusus')
                            <b>{{ $debitur->nama_debitur }}</b>,
                            lahir di {{ $debitur->tempat_lahir }}, pada tanggal
                            {{ $debitur->tgl_lahir->translatedFormat('d F Y') }},
                            bertempat tinggal di

                            @if ($debitur->alamat_ktp == $debitur->alamat_rumah)
                                {{ $debitur->alamat_ktp }} RT/RW
                                {{ $debitur->rt_rw_ktp }}, Desa/Kelurahan
                                {{ $debitur->kelurahan }}, Kecamatan {{ $debitur->kecamatan }},
                                Kabupaten/Kota
                                {{ $debitur->kabupaten }},
                            @else
                                {{ $debitur->alamat_rumah }},
                            @endif

                            NIK: {{ $debitur->nik }},
                            yang dalam melakukan perbuatan hukum ini tidak memerlukan persetujuan dari
                            {{ $debitur->jenis_kelamin == 'Laki-laki' ? 'Istrinya' : 'Suaminya' }}
                            yang sah pada tanggal
                            {{ $debitur->tgl_pernikahan->translatedFormat('d F Y') }}
                            dengan <b>{{ $debitur->nama_pasangan }}</b> yang lahir di
                            {{ $debitur->tempat_lahir_pasangan }} pada tanggal
                            {{ $debitur->tgl_lahir_pasangan->translatedFormat('d F Y') }},
                            NIK: {{ $debitur->nik_pasangan }},
                            bertempat tinggal
                            {{ $debitur->alamat_pasangan == 'sama dengan suaminya' || $debitur->alamat_pasangan == 'sama dengan istrinya'
                                ? $debitur->alamat_pasangan
                                : 'di ' . $debitur->alamat_pasangan }},
                            Berdasarkan Akta {{ $debitur->judul_akta }}, Nomor
                            {{ $debitur->no_akta }} yang dibuat pada tanggal
                            {{ $debitur->tgl_akta->translatedFormat('d F Y') }},
                            dihadapan Notaris {{ $debitur->nama_notaris }}. Notaris di
                            {{ $debitur->kedudukan_notaris }};
                            yang dalam melakukan perbuatan hukum ini bertindak untuk dirinya sendiri, yang
                            selanjutnya disebut sebagai <b>PIHAK PERTAMA (I)</b> atau disebut juga Pemilik
                            <b>{{ strtoupper($depo->jns_jaminan) }}</b>.
                        @else
                            <b>{{ $debitur->nama_debitur }}</b>,
                            lahir di {{ $debitur->tempat_lahir }}, pada tanggal
                            {{ $debitur->tgl_lahir->translatedFormat('d F Y') }},
                            bertempat tinggal di

                            @if ($debitur->alamat_ktp == $debitur->alamat_rumah)
                                {{ $debitur->alamat_ktp }} RT/RW
                                {{ $debitur->rt_rw_ktp }}, Desa/Kelurahan
                                {{ $debitur->kelurahan }}, Kecamatan {{ $debitur->kecamatan }},
                                Kabupaten/Kota
                                {{ $debitur->kabupaten }},
                            @else
                                {{ $debitur->alamat_rumah }},
                            @endif

                            NIK: {{ $debitur->nik }}, yang dalam
                            melakukan
                            perbuatan hukum ini tidak memerlukan
                            persetujuan dari siapapun karena tidak terikat dengan perkawinan yang sah, yang
                            dalam
                            melakukan perbuatan hukum ini bertindak untuk diri-sendiri, yang selanjutnya
                            disebut sebagai <b>PIHAK PERTAMA (I)</b> atau disebut juga Pemilik
                            <b>{{ strtoupper($depo->jns_jaminan) }}</b>.
                        @endif
                    </td>

                @endif
            </tr>
            <tr>
                <td style="width: 5%; padding-right: 0.4rem !important; padding-left: 0.4rem !important">II. </td>
                <td>
                    @if ($pkpmk->kredit->jns_pinjaman == 'Kredit Pihak Terkait (dirut)')
                        <b>BUDI DARMAWAN, S.E.</b>, lahir di Surakarta, pada tanggal 23 September 1974, warga
                        Negara Indonesia, bertempat tinggal di Griyan Baru G III Nomor 121 RT.002, RW.013, Kel/Desa
                        Baturan, Kecamatan Colomadu, Kabupaten Karanganyar, Provinsi Jawa Tengah, NIK:
                        3313122309740005, Dalam hal ini bertindak dalam kedudukannya selaku Direktur PT BANK
                        PEREKONOMIAN RAKYAT KUSUMA SUMBING, oleh karena itu sah bertindak untuk dan atas nama PT
                        BANK PEREKONOMIAN RAKYAT KUSUMA SUMBING berdasarkan Akta Nomor 1 Tanggal 04 Mei 2026
                        yang dibuat dihadapan Notaris Novita Alviani, S.H.,M.Kn., yang berkedudukan di Kecamatan
                        Parakan, Kabupaten Temanggung, Provinsi Jawa Tengah. Yang selanjutnya akan disebut sebagai
                        <b>“BANK”</b>.
                    @elseif ($pkpmk->kredit->jns_pinjaman == 'Kredit Pihak Terkait (dirkom)')
                        <b>DODY ARIF KISWADI</b>, lahir di Pati, pada tanggal 12 Mei 1977, warga
                        Negara Indonesia, bertempat tinggal di Kayen RT.006, RW.001, Kel/Desa
                        Kayen, Kecamatan Kayen, Kabupaten Pati, Provinsi Jawa Tengah, NIK:
                        3318021205770004, Dalam hal ini bertindak dalam kedudukannya selaku Direktur PT BANK
                        PEREKONOMIAN RAKYAT KUSUMA SUMBING, oleh karena itu sah bertindak untuk dan atas nama PT
                        BANK PEREKONOMIAN RAKYAT KUSUMA SUMBING berdasarkan Akta Nomor 20 Tanggal 27 Desember 2024
                        yang dibuat dihadapan Notaris Novita Alviani, S.H.,M.Kn., yang berkedudukan di Kecamatan
                        Parakan, Kabupaten Temanggung, Provinsi Jawa Tengah. Yang selanjutnya akan disebut sebagai
                        <b>“BANK”</b>.
                    @else
                        <b>{{ $pkpmk->nama_pincab }}</b>, lahir di
                        {{ $pkpmk->tempat_lahir }},
                        pada tanggal
                        {{ $pkpmk->tgl_lahir ? $pkpmk->tgl_lahir->translatedFormat('d F Y') : '' }},
                        warga Negara Indonesia, bertempat tinggal di {{ $pkpmk->tempat_tinggal }},
                        NIK:
                        {{ $pkpmk->nik }}, Dalam hal ini bertindak dalam kedudukannya selaku
                        @if ($pkpmk->id_cabang == '1')
                            @if ($pkpmk->jabatan == 'Pimpinan')
                                Kepala Kantor
                            @else
                                Pjs Kepala Kantor
                            @endif
                        @else
                            {{ $pkpmk->jabatan }}
                        @endif
                        PT BANK PEREKONOMIAN RAKYAT KUSUMA SUMBING
                        @if ($pkpmk->id_cabang != '1')
                            Cabang {{ $pkpmk->alamat }}
                        @endif
                        dalam
                        jabatannya
                        tersebut mewakili Direksi, berdasarkan Surat Kuasa Subtitusi di bawah tangan, Nomor
                        {{ $pkpmk->nomor_surat_kuasa }},
                        tanggal
                        {{ $pkpmk->tgl_surat_kuasa ? $pkpmk->tgl_surat_kuasa->translatedFormat('d F Y') : '' }},
                        oleh karena itu sah bertindak untuk dan atas nama
                        PT BANK PEREKONOMIAN RAKYAT KUSUMA SUMBING, yang berkedudukan di Kecamatan Parakan,
                        Kabupaten
                        Temanggung, Provinsi Jawa Tengah. Yang selanjutnya akan disebut sebagai <b>PIHAK KEDUA (II)</b>
                        atau disebut juga <b>BPR KUSUMA SUMBING</b>.
                    @endif
                </td>
            </tr>
        </table>
        <b>PIHAK PERTAMA (I)</b> dan <b>PIHAK KEDUA (II)</b> selanjutnya secara bersama-sama disebut sebagai
        <b>Para Pihak</b>. <br>

        <br>
        Para pihak bertindak dalam kedudukan masing-masing tersebut di atas terlebih dulu menyatakan bahwa: <br>

        <div class="row">
            <div class="col-md-1">•</div>
            <div class="col-md-11">
                @if ($debitur->status_pernikahan == 'Menikah')
                    <b>{{ $debitur->nama_debitur }}</b>, lahir di {{ $debitur->tempat_lahir }}, pada tanggal
                    {{ $debitur->tgl_lahir->translatedFormat('d F Y') }}, bertempat tinggal di

                    @if ($debitur->alamat_ktp == $debitur->alamat_rumah)
                        {{ $debitur->alamat_ktp }} RT/RW {{ $debitur->rt_rw_ktp }}, Desa/Kelurahan
                        {{ $debitur->kelurahan }}, Kecamatan {{ $debitur->kecamatan }}, Kabupaten/Kota
                        {{ $debitur->kabupaten }},
                    @else
                        {{ $debitur->alamat_rumah }},
                    @endif

                    NIK: {{ $debitur->nik }},
                    yang dalam melakukan perbuatan hukum ini memerlukan persetujuan dari
                    {{ $debitur->jenis_kelamin == 'Laki-laki' ? 'Istrinya' : 'Suaminya' }}
                    yang sah pada tanggal
                    {{ $debitur->tgl_pernikahan->translatedFormat('d F Y') }}
                    dengan <b>{{ $debitur->nama_pasangan }}</b> yang lahir di
                    {{ $debitur->tempat_lahir_pasangan }} pada tanggal
                    {{ $debitur->tgl_lahir_pasangan->translatedFormat('d F Y') }},
                    NIK: {{ $debitur->nik_pasangan }},
                    bertempat tinggal
                    {{ $debitur->alamat_pasangan == 'sama dengan suaminya' || $debitur->alamat_pasangan == 'sama dengan istrinya'
                        ? $debitur->alamat_pasangan
                        : 'di ' . $debitur->alamat_pasangan }},
                    yang dalam melakukan perbuatan hukum ini bertindak secara bersama-sama, selaku <b>"DEBITUR"</b>
                    telah dibuat dan ditandatangani Perjanjian Kredit Nomor
                    {{ $pkpmk->no_pkpmk ?? $pkpmk->no_addendum }} tertanggal
                    {{ $pkpmk->tgl_pkpmk?->translatedFormat('d F Y') ?? $pkpmk->tgl_addendum?->translatedFormat('d F Y') }},
                    yang dibuat di bawah tangan, dengan plafond kredit sebesar
                    {{ 'Rp' . number_format($pkpmk->kredit->jumlah_disetujui, 0, ',', '.') }}
                    ({{ terbilang_id($pkpmk->kredit->jumlah_disetujui) }}). Beserta dengan
                    perpanjangannya dan atau pembaharuannya, yang selanjutnya disebut <b>"Perjanjian Kredit"</b>
                @elseif ($debitur->status_pernikahan == 'Pernikahan Khusus')
                    <b>{{ $debitur->nama_debitur }}</b>,
                    lahir di {{ $debitur->tempat_lahir }}, pada tanggal
                    {{ $debitur->tgl_lahir->translatedFormat('d F Y') }},
                    bertempat tinggal di

                    @if ($debitur->alamat_ktp == $debitur->alamat_rumah)
                        {{ $debitur->alamat_ktp }} RT/RW
                        {{ $debitur->rt_rw_ktp }}, Desa/Kelurahan
                        {{ $debitur->kelurahan }}, Kecamatan {{ $debitur->kecamatan }},
                        Kabupaten/Kota
                        {{ $debitur->kabupaten }},
                    @else
                        {{ $debitur->alamat_rumah }},
                    @endif

                    NIK: {{ $debitur->nik }},
                    yang dalam melakukan perbuatan hukum ini tidak memerlukan persetujuan dari
                    {{ $debitur->jenis_kelamin == 'Laki-laki' ? 'Istrinya' : 'Suaminya' }}
                    yang sah pada tanggal
                    {{ $debitur->tgl_pernikahan->translatedFormat('d F Y') }}
                    dengan <b>{{ $debitur->nama_pasangan }}</b> yang lahir di
                    {{ $debitur->tempat_lahir_pasangan }} pada tanggal
                    {{ $debitur->tgl_lahir_pasangan->translatedFormat('d F Y') }},
                    NIK: {{ $debitur->nik_pasangan }},
                    bertempat tinggal
                    {{ $debitur->alamat_pasangan == 'sama dengan suaminya' || $debitur->alamat_pasangan == 'sama dengan istrinya'
                        ? $debitur->alamat_pasangan
                        : 'di ' . $debitur->alamat_pasangan }},
                    Berdasarkan Akta {{ $debitur->judul_akta }}, Nomor
                    {{ $debitur->no_akta }} yang dibuat pada tanggal
                    {{ $debitur->tgl_akta->translatedFormat('d F Y') }},
                    dihadapan Notaris {{ $debitur->nama_notaris }}. Notaris di
                    {{ $debitur->kedudukan_notaris }};
                    yang dalam melakukan perbuatan hukum ini bertindak untuk dirinya sendiri, selaku <b>"DEBITUR"</b>
                    telah dibuat dan ditandatangani Perjanjian Kredit Nomor
                    {{ $pkpmk->no_pkpmk ?? $pkpmk->no_addendum }} tertanggal
                    {{ $pkpmk->tgl_pkpmk?->translatedFormat('d F Y') ?? $pkpmk->tgl_addendum?->translatedFormat('d F Y') }},
                    yang dibuat di bawah tangan, dengan plafond kredit sebesar
                    {{ 'Rp' . number_format($pkpmk->kredit->jumlah_disetujui, 0, ',', '.') }}
                    ({{ terbilang_id($pkpmk->kredit->jumlah_disetujui) }}). Beserta dengan
                    perpanjangannya dan atau pembaharuannya, yang selanjutnya disebut <b>"Perjanjian Kredit"</b>
                @else
                    <b>{{ $debitur->nama_debitur }}</b>,
                    lahir di {{ $debitur->tempat_lahir }}, pada tanggal
                    {{ $debitur->tgl_lahir->translatedFormat('d F Y') }},
                    bertempat tinggal di

                    @if ($debitur->alamat_ktp == $debitur->alamat_rumah)
                        {{ $debitur->alamat_ktp }} RT/RW
                        {{ $debitur->rt_rw_ktp }}, Desa/Kelurahan
                        {{ $debitur->kelurahan }}, Kecamatan {{ $debitur->kecamatan }},
                        Kabupaten/Kota {{ $debitur->kabupaten }},
                    @else
                        {{ $debitur->alamat_rumah }},
                    @endif

                    NIK: {{ $debitur->nik }}, yang dalam
                    melakukan
                    perbuatan hukum ini tidak memerlukan
                    persetujuan dari siapapun karena tidak terikat dengan perkawinan yang sah, yang
                    dalam
                    melakukan perbuatan hukum ini bertindak untuk diri-sendiri, selaku <b>"DEBITUR"</b> telah dibuat dan
                    ditandatangani Perjanjian Kredit Nomor {{ $pkpmk->no_pkpmk ?? $pkpmk->no_addendum }} tertanggal
                    {{ $pkpmk->tgl_pkpmk?->translatedFormat('d F Y') ?? $pkpmk->tgl_addendum?->translatedFormat('d F Y') }},
                    yang dibuat di bawah tangan, dengan plafond kredit sebesar
                    {{ 'Rp' . number_format($pkpmk->kredit->jumlah_disetujui, 0, ',', '.') }}
                    ({{ terbilang_id($pkpmk->kredit->jumlah_disetujui) }}). Beserta dengan
                    perpanjangannya dan atau pembaharuannya, yang selanjutnya disebut <b>"Perjanjian Kredit"</b>
                @endif
            </div>
            <div class="clearfix"></div>
            <div class="col-md-1">•</div>
            <div class="col-md-11">
                Bahwa untuk menjamin fasilitas Kredit dimaksud, <b>Pemilik {{ strtoupper($depo->jns_jaminan) }}</b>
                menyerahkan Simpanan miliknya dan BPR KUSUMA SUMBING menerima penyerahan
                <b>{{ strtoupper($depo->jns_jaminan) }}</b> dimaksud sebagai
                agunan fasilitas Kredit berdasarkan Perjanjian Kredit.
            </div>
        </div>

        <br>
        Sehubungan dengan hal tersebut di atas para pihak sepakat dan saling setuju untuk membuat Perjanjian Gadai
        <b>{{ strtoupper($depo->jns_jaminan) }}</b> dengan syarat dan ketentuan sebagai berikut:
    </div>


    {{-- pasal 1 --}}
    <div class="mb-4">
        <div class="header">
            <h3>PASAL 1</h3>
            <h3>GADAI</h3>
        </div>
        <div class="isi">
            Untuk menjamin lebih lanjut pembayaran kembali dengan tertib dan dengan cara sebagaimana mestinya atas
            seluruh jumlah Kredit, jasa, biaya-biaya dan kewajiban-kewajiban pembayaran lainnya dari Debitur yang timbul
            berdasarkan perjanjian Kredit selanjutnya disebut <b>"Jumlah Terhutang"</b>. Dengan ini menggadaikan kepada
            <b>BPR KUSUMA SUMBING</b> dan <b>BPR KUSUMA SUMBING</b> dengan ini menerima penyerahan
            <b>{{ strtoupper($depo->jns_jaminan) }}</b> secara gadai dari Simpanan
            <b>{{ strtoupper($depo->jns_jaminan) }}</b> beserta segala hak wewenang dan tuntutan serta kepentingan
            apapun yang dimiliki oleh Pemilik <b>{{ strtoupper($depo->jns_jaminan) }}</b> Nomor Rekening 10.21.02440
            atas nama {{ strtoupper($depo->atas_nama) }}
            @if ($depo->jns_jaminan == 'Tabungan')
                dengan nilai nominal sebesar {{ 'Rp' . number_format($depo->nominal, 0, ',', '.') }}
                ({{ terbilang_id($depo->nominal) }}).
            @endif
            @if ($depo->jns_jaminan == 'Deposito')
                yang dikeluarkan oleh BPR KUSUMA SUMBING tanggal {{ $depo->tgl_deposito?->translatedFormat('d F Y') }}
                dengan nilai nominal
                sebesar {{ 'Rp' . number_format($depo->nominal, 0, ',', '.') }}
                ({{ terbilang_id($depo->nominal) }}). untuk jangka waktu yang disebutkan dalam bilyet Simpanan
                Berjangka tersebut.
            @endif
            Selanjutnya disebut <b>{{ strtoupper($depo->jns_jaminan) }}</b>.
        </div>
    </div>
    {{-- end pasal 1 --}}


    {{-- pasal 2 --}}
    <div class="mb-4">
        <div class="header">
            <h3>PASAL 2</h3>
            <h3>KETENTUAN GADAI</h3>
        </div>
        <div class="isi">
            Pemberian gadai <b>{{ strtoupper($depo->jns_jaminan) }}</b> berdasarkan perjanjian ini tidak dapat diubah
            dan atau dibatalkan dan tetap berlaku sampai dengan seluruh jumlah terhutang dibayar lunas.
        </div>

        <div class="row">
            <div class="col-md-1">(1)</div>
            <div class="col-md-11">
                Pemilik <b>{{ strtoupper($depo->jns_jaminan) }}</b> dengan ini menyatakan:
            </div>
        </div>
        {{-- isi  --}}
        <div class="row" style="margin-left: 2.5rem;">
            <div class="col-md-1">a.</div>
            <div class="col-md-11" style="width: 93% !important">
                Mengetahui dan memahami dengan baik seluruh syarat dan ketentuan yang ditetapkan oleh BPR KUSUMA
                SUMBING mengenai Gadai <b>{{ strtoupper($depo->jns_jaminan) }}</b> tersebut, melepaskan semua haknya
                untuk mengajukan tuntutan dan
                atau gugatan dengan alasan apapun terhadap BPR KUSUMA SUMBING apabila BPR KUSUMA SUMBING melaksanakan
                seluruh haknya yang timbul berdasarkan Perjanjian ini dan atau Perjanjian lain yang berhubungan.
            </div>
            <div class="clearfix"></div>
            <div class="col-md-1">b.</div>
            <div class="col-md-11" style="width: 93% !important">
                Tidak ada orang atau pihak lain yang ikut berhak atau ikut memiliki atau mempunyai suatu hak berupa
                apapun juga atas <b>{{ strtoupper($depo->jns_jaminan) }}</b> tersebut.
            </div>
            <div class="clearfix"></div>
            <div class="col-md-1">c.</div>
            <div class="col-md-11" style="width: 93% !important">
                <b>{{ strtoupper($depo->jns_jaminan) }}</b> tersebut tidak digadaikan / diagunkan dengan cara
                bagaimanapun juga kepada orang atau
                pihak lain.
            </div>
            <div class="clearfix"></div>
            <div class="col-md-1">d.</div>
            <div class="col-md-11" style="width: 93% !important">
                <b>{{ strtoupper($depo->jns_jaminan) }}</b> tersebut bebas dari sita dan tidak tersangkut dalam suatu
                perkara atau sengketa.
            </div>
        </div>
    </div>
    {{-- end pasal 2 --}}


    {{-- pasal 3 --}}
    <div class="mb-4">
        <div class="header">
            <h3>PASAL 3</h3>
            <h3>KUASA BANK</h3>
        </div>
        <div class="row">
            <div class="col-md-1">(1)</div>
            <div class="col-md-11">
                Jika Debitur lalai memenuhi kewajiban angsuran Kredit sesuai dengan <b>Perjanjian Kredit</b> tersebut
                diatas, dalam waktu tiga kali masa angsuran secara berturut-turut atau dalam waktu tiga bulan setelah
                Kredit jatuh tempo Debitur belum melunasi seluruh kewajibannya, maka Pemilik
                <b>{{ strtoupper($depo->jns_jaminan) }}</b> dengan
                ini memberikan kuasa kepada BPR KUSUMA SUMBING dengan hak substitusi untuk mewakili dan bertindak untuk
                dan atas nama Pemilik <b>{{ strtoupper($depo->jns_jaminan) }}</b> guna:
            </div>
        </div>
        <div class="row" style="margin-left: 2.5rem;">
            <div class="col-md-1">a.</div>
            <div class="col-md-11" style="width: 93% !important">
                Menerima jasa yang diperoleh dan dibayarkan sehubungan dengan
                <b>{{ strtoupper($depo->jns_jaminan) }}</b> tersebut.
            </div>
        </div>
        <div class="row" style="margin-left: 2.5rem;">
            <div class="col-md-1">b.</div>
            <div class="col-md-11" style="width: 93% !important">
                Mencairkan <b>{{ strtoupper($depo->jns_jaminan) }}</b> tersebut baik pada tanggal jatuh waktunya
                maupun sebelum tanggal jatuh
                waktunya dan sehubungan dengan hal tersebut menghentikan <b>{{ strtoupper($depo->jns_jaminan) }}</b>
                sebelum tanggal jatuh
                waktunya.
            </div>
        </div>
        <div class="row" style="margin-left: 2.5rem;">
            <div class="clearfix"></div>
            <div class="col-md-1">c.</div>
            <div class="col-md-11" style="width: 93% !important">
                Mempergunakan uang hasil <b>{{ strtoupper($depo->jns_jaminan) }}</b> berikut jasanya tersebut untuk
                memenuhi kewajiban Debitur
                sebagaimana diuraikan dalam Perjanjian Kredit dan atau perjanjian lain yang berhubungan.
            </div>
            <div class="clearfix"></div>
            <div class="col-md-1">d.</div>
            <div class="col-md-11" style="width: 93% !important">
                Melakukan segala tindakan yang berhubungan dengan <b>{{ strtoupper($depo->jns_jaminan) }}</b> tersebut
                tidak ada satupun
                tindakan yang dikecualikan.
            </div>
            @if ($depo->jns_jaminan == 'Deposito')
                <div class="clearfix"></div>
                <div class="col-md-1">e.</div>
                <div class="col-md-11" style="width: 93% !important">
                    Memberikan tanda-tanda penerimaan untuk segala penerimaan jumlah uang yang berhubungan dengan
                    Simpanan Berjangka tersebut.
                </div>
                <div class="clearfix"></div>
                <div class="col-md-1">f.</div>
                <div class="col-md-11" style="width: 93% !important">
                    Memperpanjang jangka waktu <b>DEPOSITO</b> apabila tanggal jatuh tempo Simpanan Berjangka tersebut
                    mendahului tanggal jatuh tempo Perjanjian Kredit.
                </div>
            @endif
        </div>
        <div class="row">
            <div class="col-md-1">(2)</div>
            <div class="col-md-11">
                Kuasa-kuasa yang termaktub dalam ayat (1) pasal ini merupakan bagian yang terpenting dari dan tidak
                dapat dipisahkan dari Perjanjian ini dan tidak dapat ditarik kembali serta tidak akan berakhir karena
                sebab-sebab sebagaimana termaktub dalam pasal-pasal 1811, 1814, 1816 Kitab Undang-Undang Hukum Perdata
                yang berlaku di Republik Indonesia atau karena alasan apapun juga.
            </div>
        </div>
    </div>
    {{-- end pasal 3 --}}


    {{-- pasal 4 --}}
    <div class="mb-4">
        <div class="header">
            <h3>PASAL 4</h3>
            <h3>JANJI PEMILIK</h3>
        </div>
        <div class="row">
            <div class="col-md-1">(1)</div>
            <div class="col-md-11">
                Pemilik <b>{{ strtoupper($depo->jns_jaminan) }}</b> dengan ini berjanji akan mengikat diri untuk tidak
                meminta dan atau
                menuntut pembayaran / pencairan <b>{{ strtoupper($depo->jns_jaminan) }}</b> yang digadaikan
                berdasarkan perjanjian ini dan Pemilik
                <b>{{ strtoupper($depo->jns_jaminan) }}</b> dengan ini berjanji akan mengikat diri kepada BPR KUSUMA
                SUMBING untuk tidak menarik
                kembali <b>{{ strtoupper($depo->jns_jaminan) }}</b> tersebut dengan alasan apapun.
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-1">(2)</div>
            <div class="col-md-11">
                Pemilik <b>{{ strtoupper($depo->jns_jaminan) }}</b> dengan ini berjanji dan mengikat diri pada BPR
                KUSUMA SUMBING untuk menandatangani dan menyerahkan setiap dan semua surat dokumen apapun yang
                diperlukan sehubungan dengan <b>{{ strtoupper($depo->jns_jaminan) }}</b> maupun perpanjangannya atau
                pembaharuannya dan sepanjang diperlukan <b>{{ strtoupper($depo->jns_jaminan) }}</b> dengan ini
                memberikan kuasa penuh sesuai ayat 2 pasal 3 kepada BPR KUSUMA SUMBING untuk dan atas nama Pemilik
                <b>{{ strtoupper($depo->jns_jaminan) }}</b> menandatangani semua akta, dokumen dan surat-surat lain
                yang diperlukan sehubungan dengan <b>{{ strtoupper($depo->jns_jaminan) }}</b> tersebut.
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-1">(3)</div>
            <div class="col-md-11">
                Pemilik <b>{{ strtoupper($depo->jns_jaminan) }}</b> dengan ini berjanji dan mengikat diri kepada BPR
                KUSUMA SUMBING untuk tidak memberikan kuasa kepada siapapun juga dan dengan cara apapun juga guna
                melakukan tindakan apapun baik secara langsung berhubungan dengan
                <b>{{ strtoupper($depo->jns_jaminan) }}</b>.
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-1">(4)</div>
            <div class="col-md-11">
                Pemilik <b>{{ strtoupper($depo->jns_jaminan) }}</b> dengan ini secara tegas menyatakan melepaskan
                semua tindakan langsung yang berhubungan dengan <b>{{ strtoupper($depo->jns_jaminan) }}</b>.
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-1">(5)</div>
            <div class="col-md-11">
                Gadai <b>{{ strtoupper($depo->jns_jaminan) }}</b> ini merupakan jaminan terus menerus dan sehubungan
                dengan itu gadai <b>{{ strtoupper($depo->jns_jaminan) }}</b> ini tidak akan berakhir sebelum seluruh
                jumlah Terhutang sesuai Perjanjian Kredit dibayar lunas.
            </div>
        </div>
    </div>
    {{-- end pasal 4 --}}


    <div class="clearfix"></div>
    {{-- pasal 5 --}}
    <div class="mb-4">
        <div class="header">
            <h3>PASAL 5</h3>
            <h3>KETENTUAN LAIN</h3>
        </div>
        <div class="row">
            <div class="col-md-1">(1)</div>
            <div class="col-md-11">
                Apabila uang hasil pencairan <b>{{ strtoupper($depo->jns_jaminan) }}</b> melebihi jumlah Terhutang,
                maka BPR KUSUMA SUMBING akan mengembalikan sisanya tersebut kepada Pemilik
                <b>{{ strtoupper($depo->jns_jaminan) }}</b>. Akan tetapi tanpa kewajiban bagi BPR KUSUMA SUMBING untuk
                membayar jasa atau ganti rugi berupa apapun juga atas kelebihan tersebut dan apabila jumlahnya tidak
                mencukupi untuk membayar seluruh jumlah Terhutang, kepada BPR KUSUMA SUMBING, maka Debitur bertanggung
                jawab penuh untuk atas permintaan BPR KUSUMA SUMBING membayar sisa jumlah Terhutang kepada BPR KUSUMA
                SUMBING.
            </div>
            <div class="clearfix"></div>
            <div class="col-md-1">(2)</div>
            <div class="col-md-11">
                Atas permintaan secara tertulis dari BPR KUSUMA SUMBING, Pemilik
                <b>{{ strtoupper($depo->jns_jaminan) }}</b> atas biayanya sendiri harus segera melakukan setiap
                tindakan dan menandatangani semua dokumen yang diperlukan dan disyaratkan oleh BPR KUSUMA SUMBING untuk
                menyempurnakan atau memperbaiki dokumen-dokumen yang dibuat Pemilik
                <b>{{ strtoupper($depo->jns_jaminan) }}</b> berdasarkan Perjanjian ini dan atau Perjanjian lain yang
                berhubungan.
            </div>
            <div class="clearfix"></div>
            <div class="col-md-1">(3)</div>
            <div class="col-md-11">
                Untuk pengakhiran Perjanjian ini, Pemilik <b>{{ strtoupper($depo->jns_jaminan) }}</b> dengan ini
                mengesampingkan pasal 1266 dan 1267 KUHP Perdata dan atau semua peraturan perundang-undangan yang
                mensyaratkan adanya suatu putusan pengadilan untuk pengakhiran Perjanjian ini oleh BPR KUSUMA SUMBING,
                BPR KUSUMA SUMBING tidak dapat diwajibkan atau dituntut untuk membayar ganti rugi dalam bentuk apapun
                juga kepada Pemilik <b>{{ strtoupper($depo->jns_jaminan) }}</b>.
            </div>
        </div>
    </div>
    {{-- end pasal 5 --}}


    <div class="clearfix"></div>
    {{-- pasal 6 --}}
    <div class="mb-4">
        <div class="header">
            <h3>PASAL 6</h3>
            <h3>DOMISILI</h3>
        </div>
        <div class="isi">
            Mengenai perjanjian ini dan segala akibat-akibat serta pelaksanaan Para Pihak memilih tempat kediaman hukum
            yang umum dikantor Panitera Pengadilan Negeri {{ ucfirst($pkpmk->cabang->pn) }} di
            {{ $pkpmk->cabang->alamat_pn }}
        </div>
    </div>
    {{-- end pasal 6 --}}

    <br>
    Demikian perjanjian ini ditandatangani di atas kertas bermeterai cukup dan ditandatangani oleh kedua belah pihak
    pada tempat dan tanggal sebagaimana disebutkan di awal Perjanjian dan masing-masing mempunyai kekuatan pembukuan
    yang sama.


    {{-- TTD --}}
    <br>
    <br>
    <div style="page-break-inside: avoid">
        <div style="text-align: center;">
            {{ ucfirst(strtolower($pkpmk->cabang->alamat)) }},
            {{ $pkpmk->tgl_print_gadai?->translatedFormat('d F Y') }}
        </div>
        <table style="width: 100%; text-align: center">
            <tr>
                <td style="width: 35%;   padding: 3px 0; text-align: center;">
                    <b style="font-size: 13px;">PT BPR KUSUMA SUMBING</b>
                </td>
                <td style="padding: 4px 0; width: 65%; text-align: center;">
                    <b style="font-size: 13px;">Pemilik <b>{{ strtoupper($depo->jns_jaminan) }}</b></b>
                </td>
            </tr>
            <tr style="text-align: center;">
                <td style="width: 35%;   padding: 3px 0; text-align: center;">
                    <br><br><br><br>
                    @if ($pkpmk->kredit->jns_pinjaman == 'Kredit Pihak Terkait (dirut)')
                        (<b>BUDI DARMAWAN, S.E.</b>)
                    @elseif ($pkpmk->kredit->jns_pinjaman == 'Kredit Pihak Terkait (dirkom)')
                        (<b>DODY ARIF KISWADI</b>)
                    @else
                        (<b style="font-size: 13px;">{{ $pkpmk->nama_pincab }}</b>)
                    @endif
                </td>
                <td style="padding: 4px 0; width: 65%; text-align: center;">
                    <br><br><br><br>
                    @if ($penjamin !== null)
                        @if ($penjamin->status_pernikahan == 'Menikah')
                            (<b style="font-size: 13px;">{{ $penjamin->nama_penjamin }}</b>)
                            (<b style="font-size: 13px;">{{ $penjamin->nama_pasangan }}</b>)
                        @else
                            (<b style="font-size: 13px;">{{ $penjamin->nama_penjamin }}</b>)
                        @endif
                    @else
                        @if ($pkpmk->debitur->status_pernikahan == 'Menikah')
                            (<b style="font-size: 13px;">{{ $pkpmk->debitur->nama_debitur }}</b>)
                            (<b style="font-size: 13px;">{{ $pkpmk->debitur->nama_pasangan }}</b>)
                        @else
                            (<b style="font-size: 13px;">{{ $pkpmk->debitur->nama_debitur }}</b>)
                        @endif
                    @endif
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
            $pdf->page_line(70, 780, 558, 780, $color, 0.2); 
            // angka terakhir (0.5) = ketebalan garis

            // nomor halaman
            $pdf->page_text(470, 780, "Halaman {PAGE_NUM} dari {PAGE_COUNT}", $fontMetrics->get_font("tahoma","bold"), 10, array(0,0,0));

        }
    </script>

</body>

</html>
