<div class="row" style="margin-left: 5px;">
    <div class="col-md-12 mb-2 ">
        <p style="font-size: 14px; font-weight: bold; color: rgb(248, 36, 36);">Data Debitur</p>
    </div>
    <div class="col-md-6 mb-2">
        <table class="table table-striped table-sm w-100">
            <tr>
                <th style="width: 40%;">NIK</th>
                <td style="width: 1px;">:</td>
                <td>{{ $debitur->nik }}</td>
            </tr>
            <tr>
                <th>Nama</th>
                <td>:</td>
                <td>{{ $debitur->nama_debitur }}</td>
            </tr>
            <tr>
                <th>Tempat, Tanggal lahir</th>
                <td>:</td>
                <td>
                    {{ $debitur->tempat_lahir }},
                    {{ Carbon\Carbon::parse($debitur->tanggal_lahir)->translatedFormat('d F Y') }}
                </td>
            </tr>
            <tr>
                <th>Usia</th>
                <td>:</td>
                <td>{{ $debitur->usia }}</td>
            </tr>
            <tr>
                <th>Alamat KTP</th>
                <td>:</td>
                <td>
                    {{ $debitur->alamat_ktp }} <br>
                    <strong>RT/RW</strong> : {{ $debitur->rt_rw_ktp }} <br>
                    <strong>Desa/Kelurahan</strong> : {{ $debitur->kelurahan }} <br>
                    <strong>Kecamatan</strong> : {{ $debitur->kecamatan }} <br>
                    <strong>Kabupaten/Kota</strong> : {{ $debitur->kabupaten }} <br>
                </td>
            </tr>
            <tr>
                <th>Alamat Rumah</th>
                <td>:</td>
                <td>
                    {{ $debitur->alamat_rumah }} <br>
                    <strong>RT/RW</strong> : {{ $debitur->rt_rw_rumah }} <br>
                </td>
            </tr>
            <tr>
                <th>Kode Pos</th>
                <td>:</td>
                <td>
                    {{ $debitur->kode_pos }}
                </td>
            </tr>
            <tr>
                <th>Status Tempat Tinggal</th>
                <td>:</td>
                <td>
                    {{ $debitur->status_tempat_tinggal }}
                </td>
            </tr>
            <tr>
                <th>Status Kepemilikan</th>
                <td>:</td>
                <td>
                    {{ $debitur->status_kepemilikan }}
                </td>
            </tr>
            <tr>
                <th>Tahun Ditempati</th>
                <td>:</td>
                <td>
                    {{ $debitur->tahun_ditempati }}
                </td>
            </tr>
            <tr>
                <th>Nama Ibu</th>
                <td>:</td>
                <td>
                    {{ $debitur->nama_ibu }}
                </td>
            </tr>
            <tr>
                <th>Pendidikan Terakhir</th>
                <td>:</td>
                <td>
                    {{ $debitur->pendidikan_terakhir }}
                </td>
            </tr>
            <tr>
                <th>No Telp</th>
                <td>:</td>
                <td>
                    {{ $debitur->no_telp }}
                </td>
            </tr>
        </table>
    </div>

    <div class="col-md-6">
        <table class="table table-striped table-sm w-100">
            <tr>
                <th style="width: 40%;">Pekerjaan</th>
                <td style="width: 1px;">:</td>
                <td>
                    {{ $debitur->pekerjaan }}
                </td>
            </tr>
            <tr>
                <th>Bidang Usaha</th>
                <td>:</td>
                <td>
                    {{ $debitur->bidang_usaha }}
                </td>
            </tr>
            <tr>
                <th>Jabatan</th>
                <td>:</td>
                <td>
                    {{ $debitur->jabatan }}
                </td>
            </tr>
            <tr>
                <th>Alamat Usaha</th>
                <td>:</td>
                <td>
                    {{ $debitur->alamat_usaha }}
                </td>
            </tr>
            <tr>
                <th>Status Tempat Usaha</th>
                <td>:</td>
                <td>
                    {{ $debitur->status_tempat_usaha }}
                </td>
            </tr>
            <tr>
                <th>Periode Usaha</th>
                <td>:</td>
                <td>
                    {{ $debitur->periode }}
                </td>
            </tr>
            <tr>
                <th>Penghasilan PerBulan</th>
                <td>:</td>
                <td>
                    Rp{{ number_format($debitur->penghasilan_bulanan, 0, ',', '.') }}
                </td>
            </tr>
            <tr>
                <th>Status Pernikahan</th>
                <td>:</td>
                <td>
                    {{ $debitur->status_pernikahan }}
                </td>
            </tr>

            @if ($debitur->status_pernikahan == 'Menikah' || $debitur->status_pernikahan == 'Pernikahan Khusus')
                <tr>
                    <th>Tanggal Pernikahan</th>
                    <td>:</td>
                    <td>
                        {{ Carbon\Carbon::parse($debitur->tgl_pernikahan)->translatedFormat('d F Y') }}
                    </td>
                </tr>
                <tr>
                    <th>NIK Pasangan</th>
                    <td>:</td>
                    <td>
                        {{ $debitur->nik_pasangan }}
                    </td>
                </tr>
                <tr>
                    <th>Nama Pasangan</th>
                    <td>:</td>
                    <td>
                        {{ $debitur->nama_pasangan }}
                    </td>
                </tr>
                <tr>
                    <th>Tempat, Tgl Lahir Pasangan</th>
                    <td>:</td>
                    <td>
                        {{ $debitur->tempat_lahir_pasangan }},
                        {{ Carbon\Carbon::parse($debitur->tgl_lahir_pasangan)->translatedFormat('d F Y') }}
                    </td>
                </tr>
                <tr>
                    <th>Pekerjaan Pasangan</th>
                    <td>:</td>
                    <td>
                        {{ $debitur->pekerjaan_pasangan }}
                    </td>
                </tr>
                <tr>
                    <th>Penghasilan Pasangan</th>
                    <td>:</td>
                    <td>
                        Rp{{ number_format($debitur->penghasilan_bulanan_pasangan, 0, ',', '.') }}
                    </td>
                </tr>
                <tr>
                    <th>Alamat Pasangan</th>
                    <td>:</td>
                    <td>
                        {{ $debitur->alamat_pasangan }}
                    </td>
                </tr>
            @endif

            @if (
                $debitur->status_pernikahan == 'Duda/Janda' ||
                    $debitur->status_pernikahan == 'Menikah' ||
                    $debitur->status_pernikahan == 'Pernikahan Khusus')
                <tr>
                    <th>Jumlah Anak</th>
                    <td>:</td>
                    <td>
                        {{ $debitur->jumlah_anak }}
                    </td>
                </tr>
            @endif

            <tr>
                <th>Jumlah Tanggungan</th>
                <td>:</td>
                <td>
                    {{ $debitur->jumlah_tanggungan }}
                </td>
            </tr>

            @if ($debitur->status_pernikahan == 'Pernikahan Khusus')
                <tr>
                    <th>Judul Akta</th>
                    <td>:</td>
                    <td>
                        {{ $debitur->judul_akta }}
                    </td>
                </tr>
                <tr>
                    <th>Nomor Akta</th>
                    <td>:</td>
                    <td>
                        {{ $debitur->nomor_akta }}
                    </td>
                </tr>
                <tr>
                    <th>Tanggal Akta</th>
                    <td>:</td>
                    <td>
                        {{ $debitur->tgl_akta }}
                    </td>
                </tr>
                <tr>
                    <th>Nama Notaris</th>
                    <td>:</td>
                    <td>
                        {{ $debitur->nama_notaris }}
                    </td>
                </tr>
                <tr>
                    <th>Kedudukan Notaris</th>
                    <td>:</td>
                    <td>
                        {{ $debitur->kedudukan_notaris }}
                    </td>
                </tr>
            @endif
        </table>
    </div>
</div>

<hr>

@if (isset($kredit))
    <div class="row" style="margin-left: 5px;">
        <div class="col-md-12 mb-2">
            <p style="font-size: 14px; font-weight: bold; color: rgb(248, 36, 36);">Data SPK</p>
        </div>
        <div class="col-md-6">
            <table class="table table-striped table-sm w-100">
                <tr>
                    <th style="width: 40%;">No SPK</th>
                    <td style="width: 1px;">:</td>
                    <td>{{ $kredit->no_spk }}</td>
                </tr>
                <tr>
                    <th>Tgl Pengajuan SPK</th>
                    <td>:</td>
                    <td>{{ $kredit->tgl_pengajuan->format('d F Y') }}</td>
                </tr>
                <tr>
                    <th>Plafond Pengajuan</th>
                    <td>:</td>
                    <td>Rp{{ number_format($kredit->jumlah_pengajuan, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <th>Jkw Pengajuan</th>
                    <td>:</td>
                    <td>{{ $kredit->jkw_pengajuan }} Bulan</td>
                </tr>
            </table>
        </div>
        <div class="col-md-6">
            <table class="table table-striped table-sm w-100">
                <tr>
                    <th style="width: 40%;">Tujuan Pengajuan</th>
                    <td style="width: 1px;">:</td>
                    <td>{{ $kredit->tujuan_pengajuan }}</td>
                </tr>
                <tr>
                    <th>Alasan Pengajuan</th>
                    <td>:</td>
                    <td>{{ $kredit->alasan_tujuan }}</td>
                </tr>
                <tr>
                    <th>Sumber Pembayaran</th>
                    <td>:</td>
                    <td>{{ $kredit->sumber_pembayaran }}</td>
                </tr>
                <tr>
                    <th>Asal Kredit</th>
                    <td>:</td>
                    <td>
                        {{ $kredit->asal_kredit }}
                        {{ $kredit->asal_kredit == 'Referal' ? ' - ' . $kredit->petugas_referal : '' }}
                    </td>
                </tr>
                <tr>
                    <th>Petugas Penerima</th>
                    <td>:</td>
                    <td>{{ $kredit->petugas_penerima }}</td>
                </tr>


            </table>
        </div>
    </div>
@endif

<hr>

<div class="row" style="margin-left: 5px;">
    <div class="col-md-12 mb-2">
        <p style="font-size: 14px; font-weight: bold; color: rgb(248, 36, 36);">Data Penjamin</p>
    </div>

    @if (isset($penjamin) && count($penjamin))
        @foreach ($penjamin as $data)
            <div class="col-md-12 mb-2">
                <p style="font-size: 14px; font-weight: bold; color: rgb(248, 36, 36);">Penjamin
                    Ke-{{ $loop->iteration }}</p>
            </div>
            <div class="col-md-6">
                <table class="table table-striped table-sm w-100">
                    <tr>
                        <th style="width: 40%;">NIK</th>
                        <td style="width: 1px;">:</td>
                        <td>{{ $data->nik }}</td>
                    </tr>
                    <tr>
                        <th style="width: 40%;">Nama</th>
                        <td style="width: 1px;">:</td>
                        <td>{{ $data->nama_penjamin }}</td>
                    </tr>
                    <tr>
                        <th style="width: 40%;">Tempat, Tgl Lahir</th>
                        <td style="width: 1px;">:</td>
                        <td>
                            {{ $data->tempat_lahir }}, {{ $data->tgl_lahir->format('d F Y') }}
                        </td>
                    </tr>
                    <tr>
                        <th style="width: 40%;">Jenis Kelamin</th>
                        <td style="width: 1px;">:</td>
                        <td>{{ $data->jenis_kelamin }}</td>
                    </tr>
                    <tr>
                        <th style="width: 40%;">Alamat</th>
                        <td style="width: 1px;">:</td>
                        <td>{{ $data->alamat }}</td>
                    </tr>
                    <tr>
                        <th style="width: 40%;">Status Pernikahan</th>
                        <td style="width: 1px;">:</td>
                        <td>{{ $data->status_pernikahan }}</td>
                    </tr>
                </table>
            </div>

            @if ($data->status_pernikahan == 'Menikah' || $data->status_pernikahan == 'Pernikahan Khusus')
                <div class="col-md-6">
                    <p style="font-size: 14px; font-weight: bold; color: rgb(248, 36, 36);">Pasangan Penjamin
                        Ke-{{ $loop->iteration }}</p>
                    <table class="table table-striped table-sm w-100">
                        <tr>
                            <th style="width: 40%;">NIK</th>
                            <td style="width: 1px;">:</td>
                            <td>{{ $data->nik_pasangan }}</td>
                        </tr>
                        <tr>
                            <th>Nama</th>
                            <td>:</td>
                            <td>{{ $data->nama_pasangan }}</td>
                        </tr>
                        <tr>
                            <th>Tempat, Tgl Lahir</th>
                            <td>:</td>
                            <td>
                                {{ $data->tempat_lahir_pasangan }}, {{ $data->tgl_lahir_pasangan->format('d F Y') }}
                            </td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td style="width: 1px;">:</td>
                            <td>{{ $data->alamat_pasangan }}</td>
                        </tr>
                    </table>

                    @if ($data->status_pernikahan == 'Pernikahan Khusus')
                        <p style="font-size: 14px; font-weight: bold; color: rgb(248, 36, 36);">Pernikahan Khusus
                            Penjamin
                            Ke-{{ $loop->iteration }}</p>
                        <table class="table table-striped table-sm w-100">
                            <tr>
                                <th style="width: 40%;">Judul Akta</th>
                                <td style="width: 1px;">:</td>
                                <td>{{ $data->judul_akta }}</td>
                            </tr>
                            <tr>
                                <th>No Akta</th>
                                <td>:</td>
                                <td>{{ $data->no_akta }}</td>
                            </tr>
                            <tr>
                                <th>Tgl Akta</th>
                                <td>:</td>
                                <td>
                                    {{ $data->tgl_akta->format('d F Y') }}
                                </td>
                            </tr>
                            <tr>
                                <th>Nama Notaris</th>
                                <td>:</td>
                                <td>{{ $data->nama_notaris }}</td>
                            </tr>
                            <tr>
                                <th>Kedudukan Notaris</th>
                                <td>:</td>
                                <td>{{ $data->kedudukan_notaris }}</td>
                            </tr>
                        </table>
                    @endif
                </div>
            @endif
        @endforeach
    @else
        <div class="col-md-12">
            <p style="font-size: 14px; font-weight: bold; color: rgb(248, 36, 36); font-style: italic;">
                <i class="fa-solid fa-circle-exclamation"></i> Tidak Ada Data Penjamin (Jaminan Atas Nama Debitur)
            </p>
        </div>
    @endif

    @if (request()->is('muk/form-muk*'))
        <br><br>
        <hr>

        <a href="{{ route('debitur.edit', ['id' => encrypt($kredit->debitur->id_debitur), 'metode' => 'edit']) }}"
            class="btn btn-outline-warning btn-sm">
            <i class="fa-solid fa-pen-to-square"></i> Edit Data
        </a>
    @endif
</div>
