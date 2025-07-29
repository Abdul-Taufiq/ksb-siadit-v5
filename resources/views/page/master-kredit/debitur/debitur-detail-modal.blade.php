<!DOCTYPE html>
<html lang="id" class="switch_theme">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail data {{ $debitur->nama_debitur }}</title>
    {{-- bootsrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    {{-- font awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custom styles -->
    <link rel="stylesheet" href="{{ asset('template/css/style.min.css') }}">
    <link href="{{ asset('template/css/animate.css') }}" rel="stylesheet">
    {{-- logo --}}
    <link rel="shortcut icon" href="{{ asset('images/logo-ksb.png') }}">
    <link rel="icon" href="{{ asset('images/logo-ksb.png') }}">

</head>

<style>
    body {
        counter-reset: nomer;
        /* Set the counter to 0 */
        font-size: 13px;
    }

    .nomer:before {
        counter-increment: nomer penjamin;
        /* Increment the counter */
        content: counter(nomer) ". ";
        /* content: " • "; */
        word-spacing: 5px;
        /* Display the counter */
    }

    .penjamin:before {
        counter-increment: penjamin;
        /* Increment the counter */
        /* content: counter(penjamin) ". "; */
        content: " • ";
        word-spacing: 5px;
        /* Display the counter */
    }

    .head-judul {
        font-size: 18px;
        font-weight: bold;
        letter-spacing: 2px;
    }

    table {
        width: 98%;
        line-height: 29px;
    }

    table tr {
        border-bottom: 1px solid black;
    }

    table th {
        width: 40%;
    }

    /* .spk th {
        width: 20%;
    } */
</style>

<body>
    {{-- SPK --}}
    <div class="card card-outline card-warning">
        <div class="card-body">
            <div class="head-judul">A. DATA SPK/PERMOHONAN</div>
            <hr>
            <div class="row ml-2">
                @if (empty($debitur->kredit))
                    <table>
                        <tr style="color: green;">
                            <th>DATA SPK (Surat Permohonan Kredit)</th>
                            <td>&rarr;</td>
                        </tr>
                        <tr>
                            <th>Status Akhir</th>
                            <td>: {{ $debitur->status_kredit }}</td>
                        </tr>
                        @if ($debitur->status_kredit == 'Ditolak')
                            <tr>
                                <th>Status Akhir</th>
                                <td>: {{ $debitur->keterangan }}</td>
                            </tr>
                        @endif
                        <tr>
                            <th>Tanggal Diinputkan/Tanggal Permohonan</th>
                            <td>: {{ Carbon\Carbon::parse($debitur->created_at)->translatedFormat('d F Y') }}</td>
                        </tr>
                    </table>
                @elseif ($id_kredit != 0)
                    <div class="col-md-6">
                        <table class="spk" style="width: 98%;">
                            <tr>
                                <th>Nomor SPK</th>
                                <td>: {{ $debitur->kredit->no_spk }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Pengajuan</th>
                                <td>:
                                    {{ Carbon\Carbon::parse($debitur->kredit->tgl_pengajuan)->translatedFormat('d F Y') }}
                                </td>
                            </tr>
                            <tr>
                                <th>Jumlah Pengajuan</th>
                                <td>:
                                    Rp {{ number_format($debitur->kredit->jumlah_pengajuan, 0, ',', '.') }}
                                    {{-- {{ $debitur->kredit->jumlah_pengajuan }} --}}
                                </td>
                            </tr>
                            <tr>
                                <th>Jumlah Disetujui</th>
                                <td>:
                                    {{ $debitur->kredit->jumlah_disetujui ? 'Rp ' . number_format($debitur->kredit->jumlah_disetujui, 0, ',', '.') : 'belum ada data' }}
                                    {{-- {{ $kredit->jumlah_disetujui }} --}}
                                </td>
                            </tr>
                            <tr>
                                <th>Jangka Waktu</th>
                                <td>: {{ $debitur->kredit->jkw_pengajuan }} Bulan</td>
                            </tr>
                            <tr>
                                <th>Tujuan Pengajuan</th>
                                <td>: {{ $debitur->kredit->tujuan_pengajuan }}</td>
                            </tr>
                            <tr>
                                <th>Sumber Pembayaran</th>
                                <td>: {{ $debitur->kredit->sumber_pembayaran }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="spk">
                            <tr>
                                <th>Kantor Cabang</th>
                                <td>: {{ $debitur->cabang->cabang }}</td>
                            </tr>
                            <tr>
                                <th>Asal Kredit</th>
                                <td>: {{ $debitur->kredit->asal_kredit }}</td>
                            </tr>
                            <tr>
                                <th>Petugas Penerima</th>
                                <td>: {{ $debitur->kredit->petugas_penerima }}</td>
                            </tr>
                            <tr>
                                <th>Status Kredit</th>
                                <td>: {{ $debitur->kredit->status_kredit }}</td>
                            </tr>
                            <tr>
                                <th>Status Akhir</th>
                                <td>: {{ $debitur->kredit->status_akhir }}</td>
                            </tr>
                            @if ($debitur->kredit->status_akhir == 'DITOLAK')
                                <th>Catatan Status</th>
                                <td>: {!! $debitur->kredit->catatan_ao !!}
                                    {!! $debitur->kredit->catatan_pincab !!}
                                </td>
                            @endif
                            <tr>
                            </tr>
                        </table>
                    </div>
                @else
                    <table>
                        <tr style="color: green;">
                            <th>DATA SPK (Surat Permohonan Kredit)</th>
                            <td>&rarr;</td>
                        </tr>
                        <tr>
                            <th>Status Akhir</th>
                            <td>: {{ $debitur->status_kredit }}</td>
                        </tr>
                        @if ($debitur->status_kredit == 'Ditolak')
                            <tr>
                                <th>Status Akhir</th>
                                <td>: {{ $debitur->keterangan }}</td>
                            </tr>
                        @endif
                        <tr>
                            <th>Tanggal Diinputkan/Tanggal Permohonan</th>
                            <td>: {{ Carbon\Carbon::parse($debitur->created_at)->translatedFormat('d F Y') }}</td>
                        </tr>
                    </table>
                @endif

            </div>
        </div>
        <div class="card card-outline card-warning mb-0"></div>
    </div>

    {{-- Debitur --}}
    <div class="card card-outline card-primary">
        <div class="card-body">
            <div class="head-judul">B. Data Debitur</div>
            <hr>
            <div class="row ml-2">
                {{-- <debitur> --}}
                <div class="col-md-6">
                    <table>
                        <tr style="color: green;">
                            <th>DATA DEBITUR</th>
                            <td>&rarr;</td>
                        </tr>
                        <tr>
                            <th class="nomer">NIK</th>
                            <td>: {{ $debitur->nik }}</td>
                        </tr>
                        <tr>
                            <th class="nomer">Nama Debitur</th>
                            <td>: {{ $debitur->nama_debitur }}</td>
                        </tr>
                        <tr>
                            <th class="nomer">Tempat, Tanggal Lahir</th>
                            <td>: {{ $debitur->tempat_lahir }},
                                {{ Carbon\Carbon::parse($debitur->tgl_lahir)->translatedFormat('d F Y') }}
                            </td>
                        </tr>
                        <tr>
                            <th class="nomer">Usia (saat pengajuan)</th>
                            <td>: {{ $debitur->usia }} </td>
                        </tr>
                        <tr>
                            <th class="nomer">No Telp</th>
                            <td>: {{ $debitur->no_telp }} </td>
                        </tr>
                        <tr>
                            <th class="nomer">Jens Kelamin</th>
                            <td>: {{ $debitur->jenis_kelamin }} </td>
                        </tr>
                        <tr>
                            <th class="nomer">Pendidikan Terakhir</th>
                            <td>: {{ $debitur->pendidikan_terakhir }} </td>
                        </tr>
                        <tr>
                            <th class="nomer">Status Pernikahan</th>
                            <td>: {{ $debitur->status_pernikahan }} </td>
                        </tr>
                        <tr>
                            <th class="nomer">Alamat (KTP)</th>
                            <td>: {{ $debitur->alamat_ktp }} </td>
                        </tr>
                        <tr>
                            <th class="nomer">RT/TW (KTP)</th>
                            <td>: {{ $debitur->rt_rw_ktp }} </td>
                        </tr>
                        <tr>
                            <th class="nomer">Kelurahan (KTP)</th>
                            <td>: {{ $debitur->kelurahan }} </td>
                        </tr>
                        <tr>
                            <th class="nomer">Kecamatan (KTP)</th>
                            <td>: {{ $debitur->kecamatan }} </td>
                        </tr>
                        <tr>
                            <th class="nomer">Kebupaten (KTP)</th>
                            <td>: {{ $debitur->kabupaten }} </td>
                        </tr>
                        <tr>
                            <th class="nomer">Nama Ibu</th>
                            <td>: {{ $debitur->nama_ibu }} </td>
                        </tr>
                        <tr style="color: green;">
                            <th>PEKERJAAN</th>
                            <td>&rarr;</td>
                        </tr>
                        <tr>
                            <th class="nomer">Pekerjaan</th>
                            <td>: {{ $debitur->pekerjaan }}</td>
                        </tr>
                        <tr>
                            <th class="nomer">Nama Perusahaan</th>
                            <td>: {{ $debitur->nama_perusahaan }}</td>
                        </tr>
                        <tr>
                            <th class="nomer">Bidang Usaha</th>
                            <td>: {{ $debitur->bidang_usaha }}</td>
                        </tr>
                        <tr>
                            <th class="nomer">Jabatan</th>
                            <td>: {{ $debitur->jabatan }} </td>
                        </tr>
                        <tr>
                            <th class="nomer">Status Tempat Kerja</th>
                            <td>: {{ $debitur->status_tempat_usaha }} </td>
                        </tr>
                        <tr>
                            <th class="nomer">Periode</th>
                            <td>: {{ $debitur->periode }} </td>
                        </tr>
                        <tr>
                            <th class="nomer">Penghasilan Perbulan</th>
                            <td>: Rp {{ number_format($debitur->penghasilan_bulanan, 0, ',', '.') }}</td>
                            {{-- <td>: {{ $debitur->penghasilan_bulanan }}  </td> --}}
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <table>
                        <tr style="color: green;">
                            <th>ALAMAT DOMISILI</th>
                            <td>&rarr;</td>
                        </tr>
                        <tr>
                            <th class="nomer">Alamat (domisili)</th>
                            <td>: {{ $debitur->alamat_rumah }} </td>
                        </tr>
                        <tr>
                            <th class="nomer">RT/TW (domisili)</th>
                            <td>: {{ $debitur->rt_rw_rumah }} </td>
                        </tr>
                        <tr>
                            <th class="nomer">Kode Pos (domisili)</th>
                            <td>: {{ $debitur->kode_pos }} </td>
                        </tr>
                        <tr>
                            <th class="nomer">Status Tempat Tinggal</th>
                            <td>: {{ $debitur->status_tempat_tinggal }} </td>
                        </tr>
                        <tr>
                            <th class="nomer">Status Kepemilikan</th>
                            <td>: {{ $debitur->status_kepemilikan }} </td>
                        </tr>
                        <tr>
                            <th class="nomer">Ditempati Dari Tahun</th>
                            <td>: {{ $debitur->tahun_ditempati }} </td>
                        </tr>
                        @if ($debitur->status_pernikahan == 'Belum Menikah')
                            <tr style="color: green;">
                                <th>DATA LAINNYA</th>
                                <td>&rarr;</td>
                            </tr>
                            <tr>
                                <th class="nomer">Jumlah Tanggungan</th>
                                <td>: {{ $debitur->jumlah_tanggungan }} </td>
                            </tr>
                            <tr style="color: green;">
                                <th>DATA PASANGAN</th>
                                <td>&rarr;</td>
                            </tr>
                            <tr>
                                <th style="color: red">TIDAK ADA DATA</th>
                            </tr>
                        @elseif ($debitur->status_pernikahan == 'Duda/Janda')
                            <tr style="color: green;">
                                <th>DATA LAINNYA</th>
                                <td>&rarr;</td>
                            </tr>
                            <tr>
                                <th class="nomer">Jumlah Anak</th>
                                <td>: {{ $debitur->jumlah_anak }} </td>
                            </tr>
                            <tr>
                                <th class="nomer">Jumlah Tanggungan</th>
                                <td>: {{ $debitur->jumlah_tanggungan }} </td>
                            </tr>
                        @else
                            <tr style="color: green;">
                                <th>DATA PASANGAN</th>
                                <td>&rarr;</td>
                            </tr>
                            <tr>
                                <th class="nomer">Tanggal Pernikahan</th>
                                <td>:
                                    {{ Carbon\Carbon::parse($debitur->tgl_pernikahan)->translatedFormat('d F Y') }}
                                </td>
                            </tr>
                            <tr>
                                <th class="nomer">NIK</th>
                                <td>: {{ $debitur->nik_pasangan }} </td>
                            </tr>
                            <tr>
                                <th class="nomer">Nama</th>
                                <td>: {{ $debitur->nama_pasangan }} </td>
                            </tr>
                            <tr>
                                <th class="nomer">Tempat, Tgl Lahir</th>
                                <td>: {{ $debitur->tempat_lahir_pasangan }},
                                    {{ Carbon\Carbon::parse($debitur->tgl_lahir_pasangan)->translatedFormat('d F Y') }}
                                </td>
                            </tr>
                            <tr>
                                <th class="nomer">Pekerjaan</th>
                                <td>: {{ $debitur->pekerjaan_pasangan }} </td>
                            </tr>
                            <tr>
                                <th class="nomer">Penghasilan Perbulan</th>
                                <td>: Rp
                                    {{ number_format($debitur->penghasilan_bulanan_pasangan, 0, ',', '.') }}
                                </td>
                                {{-- <td>: {{ $debitur->penghasilan_bulanan_pasangan }} </td> --}}
                            </tr>
                            <tr>
                                <th class="nomer">Alamat</th>
                                <td>: {{ $debitur->alamat_pasangan }} </td>
                            </tr>
                            <tr>
                                <th class="nomer">Jumlah Anak</th>
                                <td>: {{ $debitur->jumlah_anak }} </td>
                            </tr>
                            <tr>
                                <th class="nomer">Jumlah Tanggungan</th>
                                <td>: {{ $debitur->jumlah_tanggungan }} </td>
                            </tr>
                        @endif
                    </table>


                    @if (!empty($debitur->kredit->pikareks))
                        <table>
                            <tr style="color: green;">
                                <th>DATA PERJANJIAN KERJA SAMA</th>
                                <td>&rarr;</td>
                            </tr>
                            <tr>
                                <th class="nomer">Nama Perusahaan</th>
                                <td>: {{ $debitur->kredit->pikareks->nama_perusahaan }}</td>
                            </tr>
                            <tr>
                                <th class="nomer">Nomor Perjanjian</th>
                                <td>: {{ $debitur->kredit->pikareks->no_perjanjian }}</td>
                            </tr>
                            <tr>
                                <th class="nomer">Tanggal Perjanjian</th>
                                <td>:
                                    {{ !empty($debitur->kredit->pikareks->tgl_perjanjian)
                                        ? Carbon\Carbon::parse($debitur->kredit->pikareks->tgl_perjanjian)->translatedFormat('d F Y')
                                        : 'Belum ada data' }}
                                </td>
                            </tr>
                            <tr>
                                <th class="nomer">Nama BPJS</th>
                                <td>: {{ $debitur->kredit->pikareks->nama_bpjs }}</td>
                            </tr>
                            <tr>
                                <th class="nomer">Nomor BPJS</th>
                                <td>: {{ $debitur->kredit->pikareks->no_bpjs }}</td>
                            </tr>
                        </table>
                    @endif
                </div>
                {{-- </debitur> --}}
            </div>
        </div>
        <div class="card card-outline card-primary mb-0"></div>
    </div>



    {{-- Penjamin --}}
    <div class="card card-outline card-success">
        <div class="card-body">
            <div class="head-judul">C. Data Penjamin</div>
            <hr>
            <div class="row ml-2">
                {{-- <penjamin> --}}
                @if (empty($debitur->kredit->penjamin))
                    <table>
                        <tr style="color: green;">
                            <th>DATA PENJAMIN</th>
                            <td>&rarr;</td>
                        </tr>
                        <tr>
                            <th style="color: red">TIDAK ADA DATA</th>
                        </tr>
                    </table>
                @elseif ($id_kredit != 0)
                    @foreach ($penjamins as $penjamin)
                        <div class="col-md-6">
                            <table>
                                <tr style="color: green;">
                                    <th class="penjamin">DATA PENJAMIN {{ $loop->iteration }}</th>
                                    <td>&rarr;</td>
                                </tr>
                                <tr>
                                    <th>NIK</th>
                                    <td>: {{ $penjamin->nik }}</td>
                                </tr>
                                <tr>
                                    <th>Nama</th>
                                    <td>: {{ $penjamin->nama_penjamin }}</td>
                                </tr>
                                <tr>
                                    <th>Tempat, Tanggal Lahir</th>
                                    <td>: {{ $penjamin->tempat_lahir }},
                                        {{ Carbon\Carbon::parse($penjamin->tgl_lahir)->translatedFormat('d F Y') }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Jens Kelamin</th>
                                    <td>: {{ $penjamin->jenis_kelamin }} </td>
                                </tr>
                                <tr>
                                    <th>Status Pernikahan</th>
                                    <td>: {{ $penjamin->status_pernikahan }} </td>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <td>: {{ $penjamin->alamat }} </td>
                                </tr>
                                @if ($penjamin->status_pernikahan != 'Menikah')
                                    <tr>
                                        <th style="color: green">DATA PASANGAN</th>
                                        <td>&rarr;</td>
                                    </tr>
                                    <tr>
                                        <th style="color: red">TIDAK ADA DATA PASANGAN</th>
                                    </tr>
                                @else
                                    <tr>
                                        <th style="color: green">DATA PASANGAN</th>
                                        <td>&rarr;</td>
                                    </tr>
                                    <tr>
                                        <th>NIK</th>
                                        <td>: {{ $penjamin->nik_pasangan }} </td>
                                    </tr>
                                    <tr>
                                        <th>Nama</th>
                                        <td>: {{ $penjamin->nama_pasangan }} </td>
                                    </tr>
                                    <tr>
                                        <th>Tempat, Tgl Lahir</th>
                                        <td>: {{ $penjamin->tempat_lahir_pasangan }},
                                            {{ Carbon\Carbon::parse($penjamin->tgl_lahir_pasangan)->translatedFormat('d F Y') }}
                                    </tr>
                                    <tr>
                                        <th>Alamat</th>
                                        <td>: {{ $penjamin->alamat_pasangan }} </td>
                                    </tr>
                                @endif
                                <br>
                            </table>
                        </div>
                    @endforeach
                @else
                    <table>
                        <tr style="color: green;">
                            <th>DATA PENJAMIN</th>
                            <td>&rarr;</td>
                        </tr>
                        <tr>
                            <th style="color: red">TIDAK ADA DATA</th>
                        </tr>
                    </table>
                @endif
                {{-- </penjamin> --}}
            </div>
        </div>
        <div class="card card-outline card-success mb-0"></div>
    </div>

    {{-- Jaminan/Agunan --}}
    <div class="card card-outline card-secondary">
        <div class="card-body">
            <div class="head-judul">E. Data Jaminan/Agunan</div>
            <hr>
            <div class="row ml-2">
                @if (empty($debitur->kredit))
                    <table>
                        <tr>
                            <th>Jenis Agunan </th>
                            <td>: {{ $debitur->jenis_agunan }}</td>
                        </tr>
                        <tr>
                            <th>Keterangan Agunan </th>
                            <td>: {{ $debitur->ket_agunan }}</td>
                        </tr>
                    </table>
                @else
                    {{-- <tanah> --}}
                    @if (empty($debitur->kredit->jamtanah))
                        <table>
                            <tr style="color: green;">
                                <th>DATA TANAH/BANGUNAN</th>
                                <td>&rarr;</td>
                            </tr>
                            <tr>
                                <th style="color: red">TIDAK ADA DATA</th>
                            </tr>
                        </table>
                    @elseif ($id_kredit != 0)
                        @foreach ($jam_tanah as $tanah)
                            <div class="col-md-6">
                                <table>
                                    <tr style="color: green;">
                                        <th class="penjamin">TANAH/BANGUNAN {{ $loop->iteration }}
                                        </th>
                                        <td>&rarr;</td>
                                    </tr>
                                    <tr>
                                        <th>Type Sertifikat</th>
                                        <td>: {{ $tanah->type_sertifikat }}</td>
                                    </tr>
                                    <tr>
                                        <th>Jenis Jaminan</th>
                                        <td>: {{ $tanah->jns_jaminan }}</td>
                                    </tr>
                                    <tr>
                                        <th>Atas Nama</th>
                                        <td>: {{ $tanah->atas_nama }}</td>
                                    </tr>
                                    @if ($tanah->type_sertifikat == 'Sertifikat-El')
                                        <tr>
                                            <th>NIB (Nomor Identifikasi Bidang Tanah)</th>
                                            <td>: {{ $tanah->no_shm_shgb }}</td>
                                        </tr>
                                    @else
                                        <tr>
                                            <th>No SHM/SHGB/Lainnya</th>
                                            <td>: {{ $tanah->no_shm_shgb }}</td>
                                        </tr>
                                        <tr>
                                            <th>Tanggal Sertifikat</th>
                                            <td>:
                                                {{ Carbon\Carbon::parse($tanah->tgl_sertifikat)->translatedFormat('d F Y') }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>No Surat Ukur</th>
                                            <td>: {{ $tanah->no_surat_ukur }}</td>
                                        </tr>
                                        <tr>
                                            <th>Tanggal Surat Ukur</th>
                                            <td>:
                                                {{ Carbon\Carbon::parse($tanah->tgl_surat_ukur)->translatedFormat('d F Y') }}
                                            </td>
                                        </tr>
                                    @endif
                                    <tr>
                                        <th>Desa</th>
                                        <td>: {{ $tanah->desa }}</td>
                                    </tr>
                                    <tr>
                                        <th>Kecamatan</th>
                                        <td>: {{ $tanah->kecamatan }}</td>
                                    </tr>
                                    <tr>
                                        <th>Kabupaten</th>
                                        <td>: {{ $tanah->kabupaten }}</td>
                                    </tr>
                                    <tr>
                                        <th>Provinsi</th>
                                        <td>: {{ $tanah->provinsi }}</td>
                                    </tr>
                                    <tr>
                                        <th>Luas</th>
                                        <td>: {{ $tanah->luas }} M<sup>2</sup></td>
                                    </tr>
                                    <tr>
                                        <th>Keterangan</th>
                                        <td>: {{ $tanah->keterangan }}</td>
                                    </tr>
                                    <tr>
                                        <th>Jenis Perikatan</th>
                                        <td>:
                                            {{ $tanah->jns_perikatan ? $tanah->jns_perikatan : 'belum ada data' }}
                                            {{-- {{ $tanah->jns_perikatan }} --}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>No Akta Perikatan</th>
                                        <td>:
                                            {{ $tanah->no_akta_perikatan ? $tanah->no_akta_perikatan : 'belum ada data' }}
                                            {{-- {{ $tanah->no_akta_perikatan }} --}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Tgl Akta Perikatan</th>
                                        <td>:
                                            {{ $tanah->tgl_akta_perikatan ? Carbon\Carbon::parse($tanah->tgl_akta_perikatan)->translatedFormat('d F Y') : 'belum ada data' }}
                                            {{-- {{ Carbon\Carbon::parse($tanah->tgl_akta_perikatan)->translatedFormat('d F Y') }} --}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>No Peringkat Perikatan</th>
                                        <td>:
                                            {{ $tanah->no_peringkat_perikatan ? $tanah->no_peringkat_perikatan : 'belum ada data' }}
                                            {{-- {{ $tanah->no_peringkat_perikatan }} --}}
                                        </td>
                                    </tr>
                                    <br>
                                </table>
                            </div>
                        @endforeach
                    @endif
                    {{-- </tanah> --}}
                    {{-- <kenda> --}}
                    @if (empty($debitur->kredit->jamkenda))
                        <table>
                            <tr style="color: green;">
                                <th>DATA KENDARAAN</th>
                                <td>&rarr;</td>
                            </tr>
                            <tr>
                                <th style="color: red">TIDAK ADA DATA</th>
                            </tr>
                        </table>
                    @elseif ($id_kredit != 0)
                        @foreach ($jam_kenda as $kenda)
                            <div class="col-md-6">
                                <table>
                                    <tr style="color: green;">
                                        <th class="penjamin">KENDARAAN {{ $loop->iteration }}
                                        </th>
                                        <td>&rarr;</td>
                                    </tr>
                                    <tr>
                                        <th>Atas Nama</th>
                                        <td>: {{ $kenda->atas_nama }}</td>
                                    </tr>
                                    <tr>
                                        <th>Jenis Kendaraan</th>
                                        <td>: {{ $kenda->jns_kendaraan }}</td>
                                    </tr>
                                    <tr>
                                        <th>Merk</th>
                                        <td>: {{ $kenda->merk }}</td>
                                    </tr>
                                    <tr>
                                        <th>Type</th>
                                        <td>: {{ $kenda->type }}</td>
                                    </tr>
                                    <tr>
                                        <th>Warna</th>
                                        <td>: {{ $kenda->warna }}</td>
                                    </tr>
                                    <tr>
                                        <th>No BPKB</th>
                                        <td>: {{ $kenda->no_bpkb }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal BPKB</th>
                                        <td>:
                                            {{ Carbon\Carbon::parse($kenda->tgl_bpkb)->translatedFormat('d F Y') }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>No Rangka</th>
                                        <td>: {{ $kenda->no_rangka }}</td>
                                    </tr>
                                    <tr>
                                        <th>No Mesin</th>
                                        <td>: {{ $kenda->no_mesin }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tahun Pembuatan</th>
                                        <td>: {{ $kenda->thn_pembuatan }}</td>
                                    </tr>
                                    <tr>
                                        <th>Nomor Polisi</th>
                                        <td>: {{ $kenda->nopol }}</td>
                                    </tr>
                                    <tr>
                                        <th>Nama Pemilik Sebelumnya</th>
                                        <td>:
                                            {{ $kenda->nama_pemilik_sebelumnya ? $kenda->nama_pemilik_sebelumnya : 'belum ada data' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Alamat Pemilik Sebelumnya</th>
                                        <td>:
                                            {{ $kenda->alamat_pemilik_sebelumnya ? $kenda->alamat_pemilik_sebelumnya : 'belum ada data' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Tahun Pembelian</th>
                                        <td>:
                                            {{ $kenda->thn_pembelian ? $kenda->thn_pembelian : 'belum ada data' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Harga Pembelian</th>
                                        <td>:
                                            {{ $kenda->harga_pembelian ? 'Rp ' . number_format($kenda->harga_pembelian, 0, ',', '.') : 'belum ada data' }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>Jenis Fidusia</th>
                                        <td>:
                                            {{ $kenda->jns_fidusia ? $kenda->jns_fidusia : 'belum ada data' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Nomor Akta Fidusia</th>
                                        <td>:
                                            {{ $kenda->no_akta_fidusia ? $kenda->no_akta_fidusia : 'belum ada data' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Akta Fidusia</th>
                                        <td>:
                                            {{-- {{ $kenda->tgl_akta_fidusia->isEmpty() ? 'belum ada data' : Carbon\Carbon::parse($kenda->tgl_akta_fidusia)->translatedFormat('d F Y') }} --}}
                                            {{ $kenda->tgl_akta_fidusia ? Carbon\Carbon::parse($kenda->tgl_akta_fidusia)->translatedFormat('d F Y') : 'belum ada data' }}
                                        </td>
                                    </tr>
                                    <br>
                                </table>
                            </div>
                        @endforeach
                    @endif
                    {{-- </kenda> --}}


                    {{-- <deposito> --}}
                    @if (empty($debitur->kredit->jamdeposito))
                        <table>
                            <tr style="color: green;">
                                <th>DATA DEPOSITO</th>
                                <td>&rarr;</td>
                            </tr>
                            <tr>
                                <th style="color: red">TIDAK ADA DATA</th>
                            </tr>
                        </table>
                    @elseif ($id_kredit != 0)
                        @foreach ($jam_depo as $depo)
                            <div class="col-md-6">
                                <table>
                                    <tr style="color: green;">
                                        <th class="penjamin">DATA JAMINAN DEPOSITO {{ $loop->iteration }}
                                        </th>
                                        <td>&rarr;</td>
                                    </tr>
                                    <tr>
                                        <th>Nomor Rekening</th>
                                        <td>: {{ $depo->no_rek }}</td>
                                    </tr>
                                    <tr>
                                        <th>Atas Nama</th>
                                        <td>: {{ $depo->atas_nama }}</td>
                                    </tr>
                                    <tr>
                                        <th>Nominal Deposito</th>
                                        <td>:
                                            {{ $depo->nominal ? 'Rp ' . number_format($depo->nominal, 0, ',', '.') : 'belum ada data' }}
                                        </td>
                                    </tr>
                                    <br>
                                </table>
                            </div>
                        @endforeach
                    @else
                        <table>
                            <tr style="color: green;">
                                <th>DATA JAMINAN DEPOSITO</th>
                                <td>&rarr;</td>
                            </tr>
                            <tr>
                                <th style="color: red">TIDAK ADA DATA</th>
                            </tr>
                        </table>
                    @endif
                    {{-- </deposito> --}}

                    {{-- Pikar non jaminan --}}
                    @if ($debitur->kredit->kategori_jaminan == 'PIKAR (Non-jaminan)')
                        <div class="row" id="head_jaminan_pikar">
                            <div class="col-md-12">
                                <h1 style="color: red; font-style: italic; text-align: center; font-weight: bold;">
                                    PIKAR
                                    (NON JAMINAN) TIDAK MEMERLUKAN JAMINAN</h1>
                            </div>
                        </div>
                    @endif
                @endif
            </div>
        </div>
        <div class="card card-outline card-secondary mb-0"></div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="{{ asset('template/js/darkmode-boostrap.js') }}"></script>
</body>

</html>
