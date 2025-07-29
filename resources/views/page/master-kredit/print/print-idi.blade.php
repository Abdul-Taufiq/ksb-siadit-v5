<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        Print IDI An.{{ $kredit->debitur->nama_debitur }}
    </title>
    <style>
        body {
            margin: 5mm 0mm 10mm 5mm;
            font-family: Tahoma, sans-serif;
            text-align: justify;
        }

        .container {
            font-size: 10pt;
            line-height: 1.2;
            letter-spacing: 0.6px;
            word-spacing: 1px;
            page-break-inside: avoid;
        }

        h3 {
            font-size: 12pt;
            line-height: 0px;
            margin-bottom: 0px;
        }

        .headlist {
            font-size: 11pt;
            line-height: 1.2;
            letter-spacing: 0.6px;
            word-spacing: 1px;
            margin-left: -1px;
            margin-bottom: 2px;
            font-family: Tahoma, sans-serif;
            text-align: justify;
        }

        .list {
            float: left;
            width: 20%;
        }

        .desk {
            margin-left: 21%;
            width: 78%;
        }

        .list_2 {
            float: left;
            width: 5%;
            margin-left: 2px;
        }

        .desk_2 {
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
            padding: 0px;
            margin-left: 20px;
            margin-top: 1px;
            margin-bottom: 0px;
        }

        .isi_data {
            margin-left: 10px;
        }

        .lingkaran1 {
            width: 15px;
            height: 15px;
            background: #dfded8;
            border-radius: 50%;
            /* Ubah nilai radius ke 50% agar benar-benar bulat */
            display: inline-block;
            /* Agar div bersifat inline */
            margin-right: 5px;
            /* Atur jarak kanan antara lingkaran dan teks */
        }

        /* Tambahkan gaya untuk teks di sebelah div */
        .lingkaran1 {
            vertical-align: top;
        }

        table {
            line-height: 14px;
        }

        .auto {
            margin-top: 4px;
            height: 50px;
            width: 100%;
            outline-style: auto;
            /* same result as "outline: auto" */
        }

        .outline {
            outline-style: auto;
        }
    </style>
</head>

<body>

    {{-- data debitur utama --}}
    <div class="outline">
        <div class="container">
            <h3 style="margin-left: 10px"> Lampiran SE No. 004/SE-DIR/OPS/IX/2015 </h3>
            <br>

            <table style="width: 100%;">
                <tr>
                    <td style="text-align: center; background-color: #9b9ea3; height: 20px; vertical-align: center">
                        <h3>
                            FORMULIR PERMOHONAN INFORMASI DEBITUR INDIVIDUAL (IDI)
                        </h3>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center">(Permohonan dari Intern PT BPR Kusuma Sumbing)</td>
                </tr>
            </table>

            {{-- awal --}}
            <div class="isi_data">
                <table style="width: 100%;  vertical-align: top; text-align: justify;">
                    <tr>
                        <td style="width: 25%; text-align: left">Tanggal Formulir</td>
                        <td style="width: 2px">:</td>
                        <td>
                            {{ Carbon\Carbon::parse($kredit->tgl_pengajuan)->translatedFormat('d F Y') }}
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 25%; text-align: left">Kantor Pencetak IDI</td>
                        <td style="width: 2px">:</td>
                        <td>
                            {{ $kredit->debitur->Cabang->cabang }}
                        </td>
                    </tr>
                    <tr>
                        <td rowspan="2" style="width: 25%; vertical-align: top; text-align: left">No. Referensi Surat
                        </td>
                        <td rowspan="2" style="width: 2px; vertical-align: top;">:</td>
                        <td>&nbsp;</td>
                        <td style="vertical-align: bottom; text-align: right">
                            <p style="font-size: 6pt; margin-bottom: 0px">(diisi oleh petugas peminta IDI)</p>
                        </td>
                    </tr>
                </table>
            </div>

            {{-- data pemohon --}}
            <table style="width: 100%;">
                <tr>
                    <td
                        style="text-align: left; background-color: #9b9ea3; height: 15px; vertical-align: center; font-weight: bold; font-size: 10pt">
                        &nbsp;DATA PEMOHON
                    </td>
                </tr>
            </table>
            <div class="isi_data">
                <table style="width: 100%; vertical-align: top">
                    <tr>
                        <td style="width: 25%; text-align: left">Nama Lengkap</td>
                        <td style="width: 2px">:</td>
                        <td colspan="2">
                            {{ $kredit->petugas_penerima }}
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 25%; text-align: left">Kantor</td>
                        <td style="width: 2px">:</td>
                        <td colspan="2">
                            {{ $kredit->debitur->Cabang->cabang }}
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 25%; text-align: left">Bidang / Bagian</td>
                        <td style="width: 2px">:</td>
                        <td colspan="2">
                            Komersial
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 25%; text-align: left">Jabatan</td>
                        <td style="width: 2px">:</td>
                        <td colspan="2">
                            Account Officer
                        </td>
                    </tr>
                    <tr>
                        <td rowspan="3" style="width: 25%; text-align: left; vertical-align: top">Alasan Permintaan
                            IDI</td>
                        <td rowspan="3" style="width: 2px; vertical-align: top">:</td>
                        <td style="vertical-align: top">
                            <div class="lingkaran1"></div> Pengecekan Calon Debitur
                        </td>
                        <td style="vertical-align: top">
                            <div class="lingkaran1"></div> Penanganan Pengaduan Debitur
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top">
                            <div class="lingkaran1"></div> Pengecekan Karyawan
                        </td>
                        <td style="vertical-align: top">
                            <div class="lingkaran1"></div> Management Resiko
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="vertical-align: top">
                            <div class="headlist">
                                <div class="list">
                                    <div class="lingkaran1"></div> Lainnya :
                                </div>
                                <div class="desk">
                                    <p class="auto"> &nbsp; </p> {{-- outline --}}
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>

            {{-- data debitur --}}
            <table style="width: 100%">
                <tr
                    style="text-align: left; background-color: #9b9ea3; height: 15px; vertical-align: center; font-weight: bold; font-size: 10pt">
                    <td>&nbsp;DATA DEBITUR YANG DIMINTA</td>
                </tr>
            </table>
            <div class="isi_data">
                <table style="width: 100%">
                    <tr>
                        <td style="width: 25%; text-align: left">Nama Lengkap</td>
                        <td style="width: 2px">:</td>
                        <td colspan="2">
                            {{ $kredit->debitur->nama_debitur }}
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 25%; text-align: left">No. KTP/KITAS/KIMS</td>
                        <td style="width: 2px">:</td>
                        <td colspan="2">
                            {{ $kredit->debitur->nik }}
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 25%; text-align: left">Jenis Kelamin</td>
                        <td style="width: 2px">:</td>
                        <td colspan="2">
                            {{ $kredit->debitur->jenis_kelamin }}
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 25%; text-align: left">Tempat & Tgl Lahir</td>
                        <td style="width: 2px">:</td>
                        <td colspan="2">
                            {{ $kredit->debitur->tempat_lahir }},
                            {{ Carbon\Carbon::parse($kredit->debitur->tgl_lahir)->translatedFormat('d F Y') }}
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 25%; text-align: left;vertical-align: top;">Alamat Lengkap</td>
                        <td style="width: 2px;vertical-align: top;">:</td>
                        <td colspan="2">
                            {{ $kredit->debitur->alamat_ktp }} RT/RW
                            {{ $kredit->debitur->rt_rw_ktp }}, Desa/Kelurahan
                            {{ $kredit->debitur->kelurahan }}, Kecamatan {{ $kredit->debitur->kecamatan }}, Kabupaten
                            {{ $kredit->debitur->kabupaten }}
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 25%; text-align: left; vertical-align: top">Alamat Lain yang Pernah Ditempati
                        </td>
                        <td style="width: 2px; vertical-align: top">:</td>
                        <td colspan="2">
                            <div class="headlist">
                                <div class="list_2">
                                    1.
                                </div>
                                <div class="desk_2">
                                    <p class="auto"> &nbsp; </p> {{-- outline --}}
                                </div>
                            </div>
                            <div class="headlist_2">
                                <div class="list_2">
                                    2.
                                </div>
                                <div class="desk_2">
                                    <p class="auto"> &nbsp; </p> {{-- outline --}}
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 25%; text-align: left">Nama Ibu Kandung</td>
                        <td style="width: 2px">:</td>
                        <td colspan="2">
                            {{ $kredit->debitur->nama_ibu }}
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 25%; text-align: left">NPWP</td>
                        <td style="width: 2px">:</td>
                        <td colspan="2"> </td>
                    </tr>
                    <tr>
                        <td style="width: 25%; text-align: left">DIN</td>
                        <td style="width: 2px">:</td>
                        <td colspan="2"> </td>
                    </tr>
                </table>
            </div>

            <p style="margin-left: 10px; margin-right: 5px">
                Saya menyatakan bahwa akan mempergunakan Informasi Debitur Individual
                hanya untuk kepentingan sebagaimana yang dijelaskan pada formulir ini
                saja dan segala akibat yang timbul berkaitan dengan penggunaan Informasi
                Debitur Individual sepenuhnya menjadi tanggung jawab saya.
            </p>

            {{-- TTD --}}
            <br>
            <div style="page-break-inside: avoid; width: 40%">
                <div style="text-align: center;">
                    {{ ucfirst($alamat) }},
                    {{ Carbon\Carbon::parse($kredit->tgl_pengajuan)->translatedFormat('d F Y') }}
                </div>
                <br><br><br><br><br><br><br>
                <div style="text-align: center;">
                    <b>( {{ $kredit->petugas_penerima }} )</b>
                </div>
            </div>
            <br>
            <br>
        </div>
        {{-- end data debitur --}}


        {{-- Data pasangan Debitur --}}
        @if ($kredit->debitur->status_pernikahan == 'Menikah')
            <div class="container">
                <h3 style="margin-left: 10px"> Lampiran SE No. 004/SE-DIR/OPS/IX/2015 </h3>
                <br>

                <table style="width: 100%;">
                    <tr>
                        <td
                            style="text-align: center; background-color: #9b9ea3; height: 20px; vertical-align: center">
                            <h3>
                                FORMULIR PERMOHONAN INFORMASI DEBITUR INDIVIDUAL (IDI)
                            </h3>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: center">(Permohonan dari Intern PT. BPR Kusuma Sumbing)</td>
                    </tr>
                </table>

                {{-- awal --}}
                <div class="isi_data">
                    <table style="width: 100%;  vertical-align: top; text-align: justify;">
                        <tr>
                            <td style="width: 25%; text-align: left">Tanggal Formulir</td>
                            <td style="width: 2px">:</td>
                            <td>
                                {{ Carbon\Carbon::parse($kredit->tgl_pengajuan)->translatedFormat('d F Y') }}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 25%; text-align: left">Kantor Pencetak IDI</td>
                            <td style="width: 2px">:</td>
                            <td>
                                {{ $kredit->debitur->Cabang->cabang }}
                            </td>
                        </tr>
                        <tr>
                            <td rowspan="2" style="width: 25%; vertical-align: top; text-align: left">No. Referensi
                                Surat</td>
                            <td rowspan="2" style="width: 2px; vertical-align: top;">:</td>
                            <td>&nbsp;</td>
                            <td style="vertical-align: bottom; text-align: right">
                                <p style="font-size: 6pt; margin-bottom: 0px">(diisi oleh petugas peminta IDI)</p>
                            </td>
                        </tr>
                    </table>
                </div>

                {{-- data pemohon --}}
                <table style="width: 100%;">
                    <tr>
                        <td
                            style="text-align: left; background-color: #9b9ea3; height: 15px; vertical-align: center; font-weight: bold; font-size: 10pt">
                            &nbsp;DATA PEMOHON
                        </td>
                    </tr>
                </table>
                <div class="isi_data">
                    <table style="width: 100%; vertical-align: top">
                        <tr>
                            <td style="width: 25%; text-align: left">Nama Lengkap</td>
                            <td style="width: 2px">:</td>
                            <td colspan="2">
                                {{ $kredit->petugas_penerima }}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 25%; text-align: left">Kantor</td>
                            <td style="width: 2px">:</td>
                            <td colspan="2">
                                {{ $kredit->debitur->Cabang->cabang }}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 25%; text-align: left">Bidang / Bagian</td>
                            <td style="width: 2px">:</td>
                            <td colspan="2">
                                Komersial
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 25%; text-align: left">Jabatan</td>
                            <td style="width: 2px">:</td>
                            <td colspan="2">
                                Account Officer
                            </td>
                        </tr>
                        <tr>
                            <td rowspan="3" style="width: 25%; text-align: left; vertical-align: top">Alasan
                                Permintaan IDI</td>
                            <td rowspan="3" style="width: 2px; vertical-align: top">:</td>
                            <td style="vertical-align: top">
                                <div class="lingkaran1"></div> Pengecekan Calon Debitur
                            </td>
                            <td style="vertical-align: top">
                                <div class="lingkaran1"></div> Penanganan Pengaduan Debitur
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top">
                                <div class="lingkaran1"></div> Pengecekan Karyawan
                            </td>
                            <td style="vertical-align: top">
                                <div class="lingkaran1"></div> Management Resiko
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="vertical-align: top">
                                <div class="headlist">
                                    <div class="list">
                                        <div class="lingkaran1"></div> Lainnya :
                                    </div>
                                    <div class="desk">
                                        <p class="auto"> &nbsp; </p> {{-- outline --}}
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>

                {{-- data debitur --}}
                <table style="width: 100%">
                    <tr
                        style="text-align: left; background-color: #9b9ea3; height: 15px; vertical-align: center; font-weight: bold; font-size: 10pt">
                        <td>&nbsp;DATA DEBITUR YANG DIMINTA</td>
                    </tr>
                </table>
                <div class="isi_data">
                    <table style="width: 100%">
                        <tr>
                            <td style="width: 25%; text-align: left">Nama Lengkap</td>
                            <td style="width: 2px">:</td>
                            <td colspan="2">
                                {{ $kredit->debitur->nama_pasangan }}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 25%; text-align: left">No. KTP/KITAS/KIMS</td>
                            <td style="width: 2px">:</td>
                            <td colspan="2">
                                {{ $kredit->debitur->nik_pasangan }}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 25%; text-align: left">Jenis Kelamin</td>
                            <td style="width: 2px">:</td>
                            <td colspan="2">
                                @if ($kredit->debitur->jenis_kelamin = 'Laki-laki')
                                    Perempuan
                                @elseif ($kredit->debitur->jenis_kelamin = 'Perempuan')
                                    Laki-laki
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 25%; text-align: left">Tempat & Tgl Lahir</td>
                            <td style="width: 2px">:</td>
                            <td colspan="2">
                                {{ $kredit->debitur->tempat_lahir_pasangan }},
                                {{ Carbon\Carbon::parse($kredit->debitur->tgl_lahir_pasangan)->translatedFormat('d F Y') }}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 25%; text-align: left; vertical-align: top;">Alamat Lengkap</td>
                            <td style="width: 2px;vertical-align: top;">:</td>
                            <td colspan="2">
                                {{ $kredit->debitur->alamat_ktp }} RT/RW
                                {{ $kredit->debitur->rt_rw_ktp }}, Desa/Kelurahan
                                {{ $kredit->debitur->kelurahan }}, Kecamatan {{ $kredit->debitur->kecamatan }},
                                Kabupaten
                                {{ $kredit->debitur->kabupaten }}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 25%; text-align: left; vertical-align: top">Alamat Lain yang Pernah
                                Ditempati</td>
                            <td style="width: 2px; vertical-align: top">:</td>
                            <td colspan="2">
                                <div class="headlist">
                                    <div class="list_2">
                                        1.
                                    </div>
                                    <div class="desk_2">
                                        <p class="auto"> &nbsp; </p> {{-- outline --}}
                                    </div>
                                </div>
                                <div class="headlist_2">
                                    <div class="list_2">
                                        2.
                                    </div>
                                    <div class="desk_2">
                                        <p class="auto"> &nbsp; </p> {{-- outline --}}
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 25%; text-align: left">Nama Ibu Kandung</td>
                            <td style="width: 2px">:</td>
                            <td colspan="2">&nbsp;</td>
                        </tr>
                        <tr>
                            <td style="width: 25%; text-align: left">NPWP</td>
                            <td style="width: 2px">:</td>
                            <td colspan="2"> </td>
                        </tr>
                        <tr>
                            <td style="width: 25%; text-align: left">DIN</td>
                            <td style="width: 2px">:</td>
                            <td colspan="2"> </td>
                        </tr>
                    </table>
                </div>

                <p style="margin-left: 10px; margin-right: 5px">
                    Saya menyatakan bahwa akan mempergunakan Informasi Debitur Individual
                    hanya untuk kepentingan sebagaimana yang dijelaskan pada formulir ini
                    saja dan segala akibat yang timbul berkaitan dengan penggunaan Informasi
                    Debitur Individual sepenuhnya menjadi tanggung jawab saya.
                </p>

                {{-- TTD --}}
                <br>
                <div style="page-break-inside: avoid; width: 40%">
                    <div style="text-align: center;">
                        {{ ucfirst($alamat) }},
                        {{ Carbon\Carbon::parse($kredit->tgl_pengajuan)->translatedFormat('d F Y') }}
                    </div>
                    <br><br><br><br><br><br><br>
                    <div style="text-align: center;">
                        <b>( {{ $kredit->petugas_penerima }} )</b>
                    </div>
                </div>
                <br>
                <br>
            </div>
        @endif
        {{-- End data Debitur --}}



        {{-- Data Penjamin --}}
        @if (!empty($kredit->debitur->kpenjamin))
            @foreach ($penjamin as $penjamins)
                <div class="container">
                    <h3 style="margin-left: 10px"> Lampiran SE No. 004/SE-DIR/OPS/IX/2015 </h3>
                    <br>

                    <table style="width: 100%;">
                        <tr>
                            <td
                                style="text-align: center; background-color: #9b9ea3; height: 20px; vertical-align: center">
                                <h3>
                                    FORMULIR PERMOHONAN INFORMASI DEBITUR INDIVIDUAL (IDI)
                                </h3>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center">(Permohonan dari Intern PT. BPR Kusuma Sumbing)</td>
                        </tr>
                    </table>

                    {{-- awal --}}
                    <div class="isi_data">
                        <table style="width: 100%;  vertical-align: top; text-align: justify;">
                            <tr>
                                <td style="width: 25%; text-align: left">Tanggal Formulir</td>
                                <td style="width: 2px">:</td>
                                <td>
                                    {{ Carbon\Carbon::parse($kredit->tgl_pengajuan)->translatedFormat('d F Y') }}
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 25%; text-align: left">Kantor Pencetak IDI</td>
                                <td style="width: 2px">:</td>
                                <td>
                                    {{ $kredit->debitur->Cabang->cabang }}
                                </td>
                            </tr>
                            <tr>
                                <td rowspan="2" style="width: 25%; vertical-align: top; text-align: left">No.
                                    Referensi Surat</td>
                                <td rowspan="2" style="width: 2px; vertical-align: top;">:</td>
                                <td>&nbsp;</td>
                                <td style="vertical-align: bottom; text-align: right">
                                    <p style="font-size: 6pt; margin-bottom: 0px">(diisi oleh petugas peminta IDI)</p>
                                </td>
                            </tr>
                        </table>
                    </div>

                    {{-- data pemohon --}}
                    <table style="width: 100%;">
                        <tr>
                            <td
                                style="text-align: left; background-color: #9b9ea3; height: 15px; vertical-align: center; font-weight: bold; font-size: 10pt">
                                &nbsp;DATA PEMOHON
                            </td>
                        </tr>
                    </table>
                    <div class="isi_data">
                        <table style="width: 100%; vertical-align: top">
                            <tr>
                                <td style="width: 25%; text-align: left">Nama Lengkap</td>
                                <td style="width: 2px">:</td>
                                <td colspan="2">
                                    {{ $kredit->petugas_penerima }}
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 25%; text-align: left">Kantor</td>
                                <td style="width: 2px">:</td>
                                <td colspan="2">
                                    {{ $kredit->debitur->Cabang->cabang }}
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 25%; text-align: left">Bidang / Bagian</td>
                                <td style="width: 2px">:</td>
                                <td colspan="2">
                                    Komersial
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 25%; text-align: left">Jabatan</td>
                                <td style="width: 2px">:</td>
                                <td colspan="2">
                                    Account Officer
                                </td>
                            </tr>
                            <tr>
                                <td rowspan="3" style="width: 25%; text-align: left; vertical-align: top">Alasan
                                    Permintaan IDI</td>
                                <td rowspan="3" style="width: 2px; vertical-align: top">:</td>
                                <td style="vertical-align: top">
                                    <div class="lingkaran1"></div> Pengecekan Calon Debitur
                                </td>
                                <td style="vertical-align: top">
                                    <div class="lingkaran1"></div> Penanganan Pengaduan Debitur
                                </td>
                            </tr>
                            <tr>
                                <td style="vertical-align: top">
                                    <div class="lingkaran1"></div> Pengecekan Karyawan
                                </td>
                                <td style="vertical-align: top">
                                    <div class="lingkaran1"></div> Management Resiko
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" style="vertical-align: top">
                                    <div class="headlist">
                                        <div class="list">
                                            <div class="lingkaran1"></div> Lainnya :
                                        </div>
                                        <div class="desk">
                                            <p class="auto"> &nbsp; </p> {{-- outline --}}
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>

                    {{-- data debitur --}}
                    <table style="width: 100%">
                        <tr
                            style="text-align: left; background-color: #9b9ea3; height: 15px; vertical-align: center; font-weight: bold; font-size: 10pt">
                            <td>&nbsp;DATA DEBITUR YANG DIMINTA</td>
                        </tr>
                    </table>
                    <div class="isi_data">
                        <table style="width: 100%">
                            <tr>
                                <td style="width: 25%; text-align: left">Nama Lengkap</td>
                                <td style="width: 2px">:</td>
                                <td colspan="2">
                                    {{ $penjamins->nama_penjamin }}
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 25%; text-align: left">No. KTP/KITAS/KIMS</td>
                                <td style="width: 2px">:</td>
                                <td colspan="2">
                                    {{ $penjamins->nik }}
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 25%; text-align: left">Jenis Kelamin</td>
                                <td style="width: 2px">:</td>
                                <td colspan="2">
                                    {{ $penjamins->jenis_kelamin }}
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 25%; text-align: left">Tempat & Tgl Lahir</td>
                                <td style="width: 2px">:</td>
                                <td colspan="2">
                                    {{ $penjamins->tempat_lahir }},
                                    {{ Carbon\Carbon::parse($penjamins->tgl_lahir)->translatedFormat('d F Y') }}
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 25%; text-align: left;vertical-align: top;">Alamat Lengkap</td>
                                <td style="width: 2px;vertical-align: top;">:</td>
                                <td colspan="2">
                                    {{ $kredit->debitur->alamat_ktp }} RT/RW
                                    {{ $kredit->debitur->rt_rw_ktp }}, Desa/Kelurahan
                                    {{ $kredit->debitur->kelurahan }}, Kecamatan {{ $kredit->debitur->kecamatan }},
                                    Kabupaten
                                    {{ $kredit->debitur->kabupaten }}
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 25%; text-align: left; vertical-align: top">Alamat Lain yang Pernah
                                    Ditempati</td>
                                <td style="width: 2px; vertical-align: top">:</td>
                                <td colspan="2">
                                    <div class="headlist">
                                        <div class="list_2">
                                            1.
                                        </div>
                                        <div class="desk_2">
                                            <p class="auto"> &nbsp; </p> {{-- outline --}}
                                        </div>
                                    </div>
                                    <div class="headlist_2">
                                        <div class="list_2">
                                            2.
                                        </div>
                                        <div class="desk_2">
                                            <p class="auto"> &nbsp; </p> {{-- outline --}}
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 25%; text-align: left">Nama Ibu Kandung</td>
                                <td style="width: 2px">:</td>
                                <td colspan="2">&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="width: 25%; text-align: left">NPWP</td>
                                <td style="width: 2px">:</td>
                                <td colspan="2"> </td>
                            </tr>
                            <tr>
                                <td style="width: 25%; text-align: left">DIN</td>
                                <td style="width: 2px">:</td>
                                <td colspan="2"> </td>
                            </tr>
                        </table>
                    </div>

                    <p style="margin-left: 10px; margin-right: 5px">
                        Saya menyatakan bahwa akan mempergunakan Informasi Debitur Individual
                        hanya untuk kepentingan sebagaimana yang dijelaskan pada formulir ini
                        saja dan segala akibat yang timbul berkaitan dengan penggunaan Informasi
                        Debitur Individual sepenuhnya menjadi tanggung jawab saya.
                    </p>

                    {{-- TTD --}}
                    <br>
                    <div style="page-break-inside: avoid; width: 40%">
                        <div style="text-align: center;">
                            {{ ucfirst($alamat) }},
                            {{ Carbon\Carbon::parse($kredit->tgl_pengajuan)->translatedFormat('d F Y') }}
                        </div>
                        <br><br><br><br><br><br><br>
                        <div style="text-align: center;">
                            <b>( {{ $kredit->petugas_penerima }} )</b>
                        </div>
                    </div>
                    <br>
                    <br>
                </div>

                {{-- pasangan --}}
                @if ($penjamins->status_pernikahan == 'Menikah')
                    <div class="container">
                        <h3 style="margin-left: 10px"> Lampiran SE No. 004/SE-DIR/OPS/IX/2015 </h3>
                        <br>

                        <table style="width: 100%;">
                            <tr>
                                <td
                                    style="text-align: center; background-color: #9b9ea3; height: 20px; vertical-align: center">
                                    <h3>
                                        FORMULIR PERMOHONAN INFORMASI DEBITUR INDIVIDUAL (IDI)
                                    </h3>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: center">(Permohonan dari Intern PT. BPR Kusuma Sumbing)</td>
                            </tr>
                        </table>

                        {{-- awal --}}
                        <div class="isi_data">
                            <table style="width: 100%;  vertical-align: top; text-align: justify;">
                                <tr>
                                    <td style="width: 25%; text-align: left">Tanggal Formulir</td>
                                    <td style="width: 2px">:</td>
                                    <td>
                                        {{ Carbon\Carbon::parse($kredit->tgl_pengajuan)->translatedFormat('d F Y') }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 25%; text-align: left">Kantor Pencetak IDI</td>
                                    <td style="width: 2px">:</td>
                                    <td>
                                        {{ $kredit->debitur->Cabang->cabang }}
                                    </td>
                                </tr>
                                <tr>
                                    <td rowspan="2" style="width: 25%; vertical-align: top; text-align: left">No.
                                        Referensi Surat</td>
                                    <td rowspan="2" style="width: 2px; vertical-align: top;">:</td>
                                    <td>&nbsp;</td>
                                    <td style="vertical-align: bottom; text-align: right">
                                        <p style="font-size: 6pt; margin-bottom: 0px">(diisi oleh petugas peminta IDI)
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </div>

                        {{-- data pemohon --}}
                        <table style="width: 100%;">
                            <tr>
                                <td
                                    style="text-align: left; background-color: #9b9ea3; height: 15px; vertical-align: center; font-weight: bold; font-size: 10pt">
                                    &nbsp;DATA PEMOHON
                                </td>
                            </tr>
                        </table>
                        <div class="isi_data">
                            <table style="width: 100%; vertical-align: top">
                                <tr>
                                    <td style="width: 25%; text-align: left">Nama Lengkap</td>
                                    <td style="width: 2px">:</td>
                                    <td colspan="2">
                                        {{ $kredit->petugas_penerima }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 25%; text-align: left">Kantor</td>
                                    <td style="width: 2px">:</td>
                                    <td colspan="2">
                                        {{ $kredit->debitur->Cabang->cabang }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 25%; text-align: left">Bidang / Bagian</td>
                                    <td style="width: 2px">:</td>
                                    <td colspan="2">
                                        Komersial
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 25%; text-align: left">Jabatan</td>
                                    <td style="width: 2px">:</td>
                                    <td colspan="2">
                                        Account Officer
                                    </td>
                                </tr>
                                <tr>
                                    <td rowspan="3" style="width: 25%; text-align: left; vertical-align: top">
                                        Alasan Permintaan IDI</td>
                                    <td rowspan="3" style="width: 2px; vertical-align: top">:</td>
                                    <td style="vertical-align: top">
                                        <div class="lingkaran1"></div> Pengecekan Calon Debitur
                                    </td>
                                    <td style="vertical-align: top">
                                        <div class="lingkaran1"></div> Penanganan Pengaduan Debitur
                                    </td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: top">
                                        <div class="lingkaran1"></div> Pengecekan Karyawan
                                    </td>
                                    <td style="vertical-align: top">
                                        <div class="lingkaran1"></div> Management Resiko
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="vertical-align: top">
                                        <div class="headlist">
                                            <div class="list">
                                                <div class="lingkaran1"></div> Lainnya :
                                            </div>
                                            <div class="desk">
                                                <p class="auto"> &nbsp; </p> {{-- outline --}}
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>

                        {{-- data debitur --}}
                        <table style="width: 100%">
                            <tr
                                style="text-align: left; background-color: #9b9ea3; height: 15px; vertical-align: center; font-weight: bold; font-size: 10pt">
                                <td>&nbsp;DATA DEBITUR YANG DIMINTA</td>
                            </tr>
                        </table>
                        <div class="isi_data">
                            <table style="width: 100%">
                                <tr>
                                    <td style="width: 25%; text-align: left">Nama Lengkap</td>
                                    <td style="width: 2px">:</td>
                                    <td colspan="2">
                                        {{ $penjamins->nama_pasangan }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 25%; text-align: left">No. KTP/KITAS/KIMS</td>
                                    <td style="width: 2px">:</td>
                                    <td colspan="2">
                                        {{ $penjamins->nik_pasangan }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 25%; text-align: left">Jenis Kelamin</td>
                                    <td style="width: 2px">:</td>
                                    <td colspan="2">
                                        @if ($penjamins->jenis_kelamin = 'Laki-laki')
                                            Perempuan
                                        @elseif ($penjamins->jenis_kelamin = 'Perempuan')
                                            Laki-laki
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 25%; text-align: left">Tempat & Tgl Lahir</td>
                                    <td style="width: 2px">:</td>
                                    <td colspan="2">
                                        {{ $penjamins->tempat_lahir_pasangan }},
                                        {{ Carbon\Carbon::parse($penjamins->tgl_lahir_pasangan)->translatedFormat('d F Y') }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 25%; text-align: left;vertical-align: top;">Alamat Lengkap</td>
                                    <td style="width: 2px;vertical-align: top;">:</td>
                                    <td colspan="2">
                                        {{ $kredit->debitur->alamat_ktp }} RT/RW
                                        {{ $kredit->debitur->rt_rw_ktp }}, Desa/Kelurahan
                                        {{ $kredit->debitur->kelurahan }}, Kecamatan
                                        {{ $kredit->debitur->kecamatan }}, Kabupaten
                                        {{ $kredit->debitur->kabupaten }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 25%; text-align: left; vertical-align: top">Alamat Lain yang
                                        Pernah Ditempati</td>
                                    <td style="width: 2px; vertical-align: top">:</td>
                                    <td colspan="2">
                                        <div class="headlist">
                                            <div class="list_2">
                                                1.
                                            </div>
                                            <div class="desk_2">
                                                <p class="auto"> &nbsp; </p> {{-- outline --}}
                                            </div>
                                        </div>
                                        <div class="headlist_2">
                                            <div class="list_2">
                                                2.
                                            </div>
                                            <div class="desk_2">
                                                <p class="auto"> &nbsp; </p> {{-- outline --}}
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 25%; text-align: left">Nama Ibu Kandung</td>
                                    <td style="width: 2px">:</td>
                                    <td colspan="2">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td style="width: 25%; text-align: left">NPWP</td>
                                    <td style="width: 2px">:</td>
                                    <td colspan="2"> </td>
                                </tr>
                                <tr>
                                    <td style="width: 25%; text-align: left">DIN</td>
                                    <td style="width: 2px">:</td>
                                    <td colspan="2"> </td>
                                </tr>
                            </table>
                        </div>

                        <p style="margin-left: 10px; margin-right: 5px">
                            Saya menyatakan bahwa akan mempergunakan Informasi Debitur Individual
                            hanya untuk kepentingan sebagaimana yang dijelaskan pada formulir ini
                            saja dan segala akibat yang timbul berkaitan dengan penggunaan Informasi
                            Debitur Individual sepenuhnya menjadi tanggung jawab saya.
                        </p>

                        {{-- TTD --}}
                        <br>
                        <div style="page-break-inside: avoid; width: 40%">
                            <div style="text-align: center;">
                                {{ ucfirst($alamat) }},
                                {{ Carbon\Carbon::parse($kredit->tgl_pengajuan)->translatedFormat('d F Y') }}
                            </div>
                            <br><br><br><br><br><br><br>
                            <div style="text-align: center;">
                                <b>( {{ $kredit->petugas_penerima }} )</b>
                            </div>
                        </div>
                        <br>
                        <br>
                    </div>
                @endif
            @endforeach
        @endif
        {{-- End Penjamin --}}

    </div>




</body>

</html>
