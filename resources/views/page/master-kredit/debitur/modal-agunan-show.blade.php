<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail data </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<style>
    body {
        counter-reset: nomer;
        /* Set the counter to 0 */
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

    @if ($jam_tanah)
        {{-- SPK --}}
        <div class="card card-outline card-warning">
            <div class="card-body">
                <div class="head-judul">A. DATA SPK/PERMOHONAN</div>
                <hr>
                <div class="row ml-2">

                    <div class="col-md-6">
                        <table class="spk" style="width: 98%;">
                            <tr>
                                <th>Nomor SPK</th>
                                <td>: {{ $jam_tanah->kredit->no_spk }}</td>
                            </tr>
                            <tr>
                                <th>NIK</th>
                                <td>: {{ $jam_tanah->kredit->debitur->nik }}</td>
                            </tr>
                            <tr>
                                <th>Nama Debitur</th>
                                <td>: {{ $jam_tanah->kredit->debitur->nama_debitur }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Pengajuan</th>
                                <td>:
                                    {{ Carbon\Carbon::parse($jam_tanah->kredit->tgl_pengajuan)->translatedFormat('d F Y') }}
                                </td>
                            </tr>
                            <tr>
                                <th>Jumlah Pengajuan</th>
                                <td>:
                                    Rp {{ number_format($jam_tanah->kredit->jumlah_pengajuan, 0, ',', '.') }}
                                    {{-- {{ $jam_tanah->kredit->jumlah_pengajuan }} --}}
                                </td>
                            </tr>
                            <tr>
                                <th>Jumlah Disetujui</th>
                                <td>:
                                    {{ $jam_tanah->kredit->jumlah_disetujui ? 'Rp ' . number_format($jam_tanah->kredit->jumlah_disetujui, 0, ',', '.') : 'belum ada data' }}
                                    {{-- {{ $kredit->jumlah_disetujui }} --}}
                                </td>
                            </tr>
                            <tr>
                                <th>Jangka Waktu</th>
                                <td>: {{ $jam_tanah->kredit->jkw_pengajuan }} Bulan</td>
                            </tr>
                            <tr>
                                <th>Tujuan Pengajuan</th>
                                <td>: {{ $jam_tanah->kredit->tujuan_pengajuan }}</td>
                            </tr>
                            <tr>
                                <th>Sumber Pembayaran</th>
                                <td>: {{ $jam_tanah->kredit->sumber_pembayaran }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="spk">
                            <tr>
                                <th>Kantor Cabang</th>
                                <td>: {{ $jam_tanah->kredit->debitur->cabang->cabang }}</td>
                            </tr>
                            <tr>
                                <th>Asal Kredit</th>
                                <td>: {{ $jam_tanah->kredit->asal_kredit }}</td>
                            </tr>
                            <tr>
                                <th>Petugas Penerima</th>
                                <td>: {{ $jam_tanah->kredit->petugas_penerima }}</td>
                            </tr>
                            <tr>
                                <th>Status Kredit</th>
                                <td>: {{ $jam_tanah->kredit->status_kredit }}</td>
                            </tr>
                            <tr>
                                <th>Status Akhir</th>
                                <td>: {{ $jam_tanah->kredit->status_akhir }}</td>
                            </tr>
                            <tr>
                                <th>Catatan Status</th>
                                <td><b><i>AO: </i></b> {!! $jam_tanah->kredit->catatan_ao !!} <br>
                                    <b><i>Pincab:</i></b> {!! $jam_tanah->kredit->catatan_pincab !!}
                                </td>
                            </tr>
                        </table>
                    </div>

                </div>
            </div>
            <div class="card card-outline card-warning mb-0"></div>
        </div>


        {{-- Jaminan/Agunan --}}
        <div class="card card-outline card-secondary">
            <div class="card-body">
                <div class="head-judul">B. Data Jaminan/Agunan</div>
                <hr>
                <div class="row ml-2">
                    <div class="col-md-6">
                        <table>
                            <tr style="color: green;">
                                <th class="penjamin">TANAH/BANGUNAN
                                </th>
                                <td>&rarr;</td>
                            </tr>
                            <tr>
                                <th>Type Sertifikat</th>
                                <td>: {{ $jam_tanah->type_sertifikat }}</td>
                            </tr>
                            <tr>
                                <th>Jenis Jaminan</th>
                                <td>: {{ $jam_tanah->jns_jaminan }}</td>
                            </tr>
                            <tr>
                                <th>Atas Nama</th>
                                <td>: {{ $jam_tanah->atas_nama }}</td>
                            </tr>
                            @if ($jam_tanah->type_sertifikat == 'Sertifikat-El')
                                <tr>
                                    <th>NIB (Nomor Identifikasi Bidang Tanah)</th>
                                    <td>: {{ $jam_tanah->no_shm_shgb }}</td>
                                </tr>
                            @else
                                <tr>
                                    <th>No SHM/SHGB/Lainnya</th>
                                    <td>: {{ $jam_tanah->no_shm_shgb }}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal Sertifikat</th>
                                    <td>:
                                        {{ Carbon\Carbon::parse($jam_tanah->tgl_sertifikat)->translatedFormat('d F Y') }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>No Surat Ukur</th>
                                    <td>: {{ $jam_tanah->no_surat_ukur }}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal Surat Ukur</th>
                                    <td>:
                                        {{ Carbon\Carbon::parse($jam_tanah->tgl_surat_ukur)->translatedFormat('d F Y') }}
                                    </td>
                                </tr>
                            @endif
                            <tr>
                                <th>Desa</th>
                                <td>: {{ $jam_tanah->desa }}</td>
                            </tr>
                            <tr>
                                <th>Kecamatan</th>
                                <td>: {{ $jam_tanah->kecamatan }}</td>
                            </tr>
                            <tr>
                                <th>Kabupaten</th>
                                <td>: {{ $jam_tanah->kabupaten }}</td>
                            </tr>
                        </table>
                    </div>

                    <div class="col-md-6">
                        <table>
                            <tr>
                                <th>Provinsi</th>
                                <td>: {{ $jam_tanah->provinsi }}</td>
                            </tr>
                            <tr>
                                <th>Luas</th>
                                <td>: {{ $jam_tanah->luas }} M<sup>2</sup></td>
                            </tr>
                            <tr>
                                <th>Keterangan</th>
                                <td>: {{ $jam_tanah->keterangan }}</td>
                            </tr>
                            <tr>
                                <th>Jenis Perikatan</th>
                                <td>:
                                    {{ $jam_tanah->jns_perikatan ? $jam_tanah->jns_perikatan : 'belum ada data' }}
                                    {{-- {{ $jam_tanah->jns_perikatan }} --}}
                                </td>
                            </tr>
                            <tr>
                                <th>No Akta Perikatan</th>
                                <td>:
                                    {{ $jam_tanah->no_akta_perikatan ? $jam_tanah->no_akta_perikatan : 'belum ada data' }}
                                    {{-- {{ $jam_tanah->no_akta_perikatan }} --}}
                                </td>
                            </tr>
                            <tr>
                                <th>Tgl Akta Perikatan</th>
                                <td>:
                                    {{ $jam_tanah->tgl_akta_perikatan ? Carbon\Carbon::parse($jam_tanah->tgl_akta_perikatan)->translatedFormat('d F Y') : 'belum ada data' }}
                                    {{-- {{ Carbon\Carbon::parse($jam_tanah->tgl_akta_perikatan)->translatedFormat('d F Y') }} --}}
                                </td>
                            </tr>
                            <tr>
                                <th>No Peringkat Perikatan</th>
                                <td>:
                                    {{ $jam_tanah->no_peringkat_perikatan ? $jam_tanah->no_peringkat_perikatan : 'belum ada data' }}
                                    {{-- {{ $jam_tanah->no_peringkat_perikatan }} --}}
                                </td>
                            </tr>
                            <br>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card card-outline card-secondary mb-0"></div>
        </div>
    @endif


    @if ($jam_kenda)
        {{-- SPK --}}
        <div class="card card-outline card-warning">
            <div class="card-body">
                <div class="head-judul">A. DATA SPK/PERMOHONAN</div>
                <hr>
                <div class="row ml-2">

                    <div class="col-md-6">
                        <table class="spk" style="width: 98%;">
                            <tr>
                                <th>Nomor SPK</th>
                                <td>: {{ $jam_kenda->kredit->no_spk }}</td>
                            </tr>
                            <tr>
                                <th>NIK</th>
                                <td>: {{ $jam_kenda->kredit->debitur->nik }}</td>
                            </tr>
                            <tr>
                                <th>Nama Debitur</th>
                                <td>: {{ $jam_kenda->kredit->debitur->nama_debitur }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Pengajuan</th>
                                <td>:
                                    {{ Carbon\Carbon::parse($jam_kenda->kredit->tgl_pengajuan)->translatedFormat('d F Y') }}
                                </td>
                            </tr>
                            <tr>
                                <th>Jumlah Pengajuan</th>
                                <td>:
                                    Rp {{ number_format($jam_kenda->kredit->jumlah_pengajuan, 0, ',', '.') }}
                                    {{-- {{ $jam_kenda->kredit->jumlah_pengajuan }} --}}
                                </td>
                            </tr>
                            <tr>
                                <th>Jumlah Disetujui</th>
                                <td>:
                                    {{ $jam_kenda->kredit->jumlah_disetujui ? 'Rp ' . number_format($jam_kenda->kredit->jumlah_disetujui, 0, ',', '.') : 'belum ada data' }}
                                    {{-- {{ $kredit->jumlah_disetujui }} --}}
                                </td>
                            </tr>
                            <tr>
                                <th>Jangka Waktu</th>
                                <td>: {{ $jam_kenda->kredit->jkw_pengajuan }} Bulan</td>
                            </tr>
                            <tr>
                                <th>Tujuan Pengajuan</th>
                                <td>: {{ $jam_kenda->kredit->tujuan_pengajuan }}</td>
                            </tr>
                            <tr>
                                <th>Sumber Pembayaran</th>
                                <td>: {{ $jam_kenda->kredit->sumber_pembayaran }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="spk">
                            <tr>
                                <th>Kantor Cabang</th>
                                <td>: {{ $jam_kenda->kredit->debitur->cabang->cabang }}</td>
                            </tr>
                            <tr>
                                <th>Asal Kredit</th>
                                <td>: {{ $jam_kenda->kredit->asal_kredit }}</td>
                            </tr>
                            <tr>
                                <th>Petugas Penerima</th>
                                <td>: {{ $jam_kenda->kredit->petugas_penerima }}</td>
                            </tr>
                            <tr>
                                <th>Status Kredit</th>
                                <td>: {{ $jam_kenda->kredit->status_kredit }}</td>
                            </tr>
                            <tr>
                                <th>Status Akhir</th>
                                <td>: {{ $jam_kenda->kredit->status_akhir }}</td>
                            </tr>
                            <tr>
                                <th>Catatan Status</th>
                                <td>: {!! $jam_kenda->kredit->catatan_ao !!}
                                    {!! $jam_kenda->kredit->catatan_pincab !!}
                                </td>
                            </tr>
                        </table>
                    </div>

                </div>
            </div>
            <div class="card card-outline card-warning mb-0"></div>
        </div>

        {{-- Jaminan/Agunan --}}
        <div class="card card-outline card-secondary">
            <div class="card-body">
                <div class="head-judul">B. Data Jaminan/Agunan</div>
                <hr>
                <div class="row ml-2">
                    <div class="col-md-6">
                        <table>
                            <tr style="color: green;">
                                <th class="penjamin">KENDARAAN
                                </th>
                                <td>&rarr;</td>
                            </tr>
                            <tr>
                                <th>Atas Nama</th>
                                <td>: {{ $jam_kenda->atas_nama }}</td>
                            </tr>
                            <tr>
                                <th>Jenis Kendaraan</th>
                                <td>: {{ $jam_kenda->jns_kendaraan }}</td>
                            </tr>
                            <tr>
                                <th>Merk</th>
                                <td>: {{ $jam_kenda->merk }}</td>
                            </tr>
                            <tr>
                                <th>Type</th>
                                <td>: {{ $jam_kenda->type }}</td>
                            </tr>
                            <tr>
                                <th>Warna</th>
                                <td>: {{ $jam_kenda->warna }}</td>
                            </tr>
                            <tr>
                                <th>No BPKB</th>
                                <td>: {{ $jam_kenda->no_bpkb }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal BPKB</th>
                                <td>:
                                    {{ Carbon\Carbon::parse($jam_kenda->tgl_bpkb)->translatedFormat('d F Y') }}
                                </td>
                            </tr>
                            <tr>
                                <th>No Rangka</th>
                                <td>: {{ $jam_kenda->no_rangka }}</td>
                            </tr>
                            <tr>
                                <th>No Mesin</th>
                                <td>: {{ $jam_kenda->no_mesin }}</td>
                            </tr>
                            <tr>
                                <th>Tahun Pembuatan</th>
                                <td>: {{ $jam_kenda->thn_pembuatan }}</td>
                            </tr>
                            <tr>
                                <th>Nomor Polisi</th>
                                <td>: {{ $jam_kenda->nopol }}</td>
                            </tr>
                        </table>
                    </div>

                    <div class="col-md-6">
                        <table>
                            <tr>
                                <th>Nama Pemilik Sebelumnya</th>
                                <td>:
                                    {{ $jam_kenda->nama_pemilik_sebelumnya ? $jam_kenda->nama_pemilik_sebelumnya : 'belum ada data' }}
                                </td>
                            </tr>
                            <tr>
                                <th>Alamat Pemilik Sebelumnya</th>
                                <td>:
                                    {{ $jam_kenda->alamat_pemilik_sebelumnya ? $jam_kenda->alamat_pemilik_sebelumnya : 'belum ada data' }}
                                </td>
                            </tr>
                            <tr>
                                <th>Tahun Pembelian</th>
                                <td>:
                                    {{ $jam_kenda->thn_pembelian ? $jam_kenda->thn_pembelian : 'belum ada data' }}
                                </td>
                            </tr>
                            <tr>
                                <th>Harga Pembelian</th>
                                <td>:
                                    {{ $jam_kenda->harga_pembelian ? 'Rp ' . number_format($jam_kenda->harga_pembelian, 0, ',', '.') : 'belum ada data' }}
                                </td>
                            </tr>

                            <tr>
                                <th>Jenis Fidusia</th>
                                <td>:
                                    {{ $jam_kenda->jns_fidusia ? $jam_kenda->jns_fidusia : 'belum ada data' }}
                                </td>
                            </tr>
                            <tr>
                                <th>Nomor Akta Fidusia</th>
                                <td>:
                                    {{ $jam_kenda->no_akta_fidusia ? $jam_kenda->no_akta_fidusia : 'belum ada data' }}
                                </td>
                            </tr>
                            <tr>
                                <th>Tanggal Akta Fidusia</th>
                                <td>:
                                    {{-- {{ $jam_kenda->tgl_akta_fidusia->isEmpty() ? 'belum ada data' : Carbon\Carbon::parse($jam_kenda->tgl_akta_fidusia)->translatedFormat('d F Y') }} --}}
                                    {{ $jam_kenda->tgl_akta_fidusia ? Carbon\Carbon::parse($jam_kenda->tgl_akta_fidusia)->translatedFormat('d F Y') : 'belum ada data' }}
                                </td>
                            </tr>
                            <br>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card card-outline card-secondary mb-0"></div>
        </div>
    @endif


    @if ($jam_depo)
        {{-- SPK --}}
        <div class="card card-outline card-warning">
            <div class="card-body">
                <div class="head-judul">A. DATA SPK/PERMOHONAN</div>
                <hr>
                <div class="row ml-2">

                    <div class="col-md-6">
                        <table class="spk" style="width: 98%;">
                            <tr>
                                <th>Nomor SPK</th>
                                <td>: {{ $jam_depo->kredit->no_spk }}</td>
                            </tr>
                            <tr>
                                <th>NIK</th>
                                <td>: {{ $jam_depo->kredit->debitur->nik }}</td>
                            </tr>
                            <tr>
                                <th>Nama Debitur</th>
                                <td>: {{ $jam_depo->kredit->debitur->nama_debitur }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Pengajuan</th>
                                <td>:
                                    {{ Carbon\Carbon::parse($jam_depo->kredit->tgl_pengajuan)->translatedFormat('d F Y') }}
                                </td>
                            </tr>
                            <tr>
                                <th>Jumlah Pengajuan</th>
                                <td>:
                                    Rp {{ number_format($jam_depo->kredit->jumlah_pengajuan, 0, ',', '.') }}
                                    {{-- {{ $jam_depo->kredit->jumlah_pengajuan }} --}}
                                </td>
                            </tr>
                            <tr>
                                <th>Jumlah Disetujui</th>
                                <td>:
                                    {{ $jam_depo->kredit->jumlah_disetujui ? 'Rp ' . number_format($jam_depo->kredit->jumlah_disetujui, 0, ',', '.') : 'belum ada data' }}
                                    {{-- {{ $kredit->jumlah_disetujui }} --}}
                                </td>
                            </tr>
                            <tr>
                                <th>Jangka Waktu</th>
                                <td>: {{ $jam_depo->kredit->jkw_pengajuan }} Bulan</td>
                            </tr>
                            <tr>
                                <th>Tujuan Pengajuan</th>
                                <td>: {{ $jam_depo->kredit->tujuan_pengajuan }}</td>
                            </tr>
                            <tr>
                                <th>Sumber Pembayaran</th>
                                <td>: {{ $jam_depo->kredit->sumber_pembayaran }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="spk">
                            <tr>
                                <th>Kantor Cabang</th>
                                <td>: {{ $jam_depo->kredit->debitur->cabang->cabang }}</td>
                            </tr>
                            <tr>
                                <th>Asal Kredit</th>
                                <td>: {{ $jam_depo->kredit->asal_kredit }}</td>
                            </tr>
                            <tr>
                                <th>Petugas Penerima</th>
                                <td>: {{ $jam_depo->kredit->petugas_penerima }}</td>
                            </tr>
                            <tr>
                                <th>Status Kredit</th>
                                <td>: {{ $jam_depo->kredit->status_kredit }}</td>
                            </tr>
                            <tr>
                                <th>Status Akhir</th>
                                <td>: {{ $jam_depo->kredit->status_akhir }}</td>
                            </tr>
                            <tr>
                                <th>Catatan Status</th>
                                <td>: {!! $jam_depo->kredit->catatan_ao !!}
                                    {!! $jam_depo->kredit->catatan_pincab !!}
                                </td>
                            </tr>
                        </table>
                    </div>

                </div>
            </div>
            <div class="card card-outline card-warning mb-0"></div>
        </div>

        {{-- Jaminan/Agunan --}}
        <div class="card card-outline card-secondary">
            <div class="card-body">
                <div class="head-judul">B. Data Jaminan/Agunan</div>
                <hr>
                <div class="row ml-2">
                    <div class="col-md-6">
                        <table>
                            <tr style="color: green;">
                                <th class="penjamin">DATA JAMINAN DEPOSITO
                                </th>
                                <td>&rarr;</td>
                            </tr>
                            <tr>
                                <th>Nomor Rekening</th>
                                <td>: {{ $jam_depo->no_rek }}</td>
                            </tr>
                            <tr>
                                <th>Atas Nama</th>
                                <td>: {{ $jam_depo->atas_nama }}</td>
                            </tr>
                            <tr>
                                <th>Nominal Deposito</th>
                                <td>:
                                    {{ $jam_depo->nominal ? 'Rp ' . number_format($jam_depo->nominal, 0, ',', '.') : 'belum ada data' }}
                                </td>
                            </tr>
                            <br>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card card-outline card-secondary mb-0"></div>
        </div>
    @endif

</body>

</html>
