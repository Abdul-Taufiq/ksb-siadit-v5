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
        font-size: 14px;
        font-weight: bold;
        letter-spacing: 2px;
    }

    table {
        width: 100%;
        line-height: 25px;
    }

    table tr {
        border-bottom: 1px solid black;
    }

    table th {
        width: 37%;
    }

    table ol {
        list-style-type: decimal !important;
        /* Pastikan angka tetap muncul */
        padding-left: 20px !important;
        /* Sesuaikan indentasi */
    }

    table ul {
        list-style-type: disc !important;
        /* Pastikan bullet tetap muncul */
        padding-left: 20px !important;
    }

    /* .spk th {
        width: 20%;
    } */
</style>


{{-- SPK --}}
<div class="card">
    <div class="card-header">
        <div class="head-judul">A. DATA SPK/PERMOHONAN</div>
    </div>
    <div class="card-body">
        <div class="row m-2">
            @if (!empty($kredit))
                <div class="col-md-6">
                    <table class="spk table table-sm table-striped w-100" style="width: 100%;">
                        <tr>
                            <th>Nomor SPK</th>
                            <td>: {{ $kredit->no_spk }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Pengajuan</th>
                            <td>:
                                {{ Carbon\Carbon::parse($kredit->tgl_pengajuan)->translatedFormat('d F Y') }}
                            </td>
                        </tr>
                        <tr>
                            <th>Jenis SPK</th>
                            <td>: {{ $kredit->kategori_spk }} -
                                {{ $kredit->jns_kategori_spk }}</td>
                        </tr>
                        <tr>
                            <th>Jumlah Pengajuan</th>
                            <td>:
                                Rp {{ number_format($kredit->jumlah_pengajuan, 0, ',', '.') }}
                                {{-- {{ $kredit->jumlah_pengajuan }} --}}
                            </td>
                        </tr>
                        <tr>
                            <th>Jumlah Disetujui</th>
                            <td>:
                                {{ $kredit->jumlah_disetujui ? 'Rp ' . number_format($kredit->jumlah_disetujui, 0, ',', '.') : 'belum ada data' }}
                                {{-- {{ $kredit->jumlah_disetujui }} --}}
                            </td>
                        </tr>
                        <tr>
                            <th>Jangka Waktu</th>
                            <td>: {{ $kredit->jkw_pengajuan }} Bulan</td>
                        </tr>
                        <tr>
                            <th>Tujuan Pengajuan</th>
                            <td>: {{ $kredit->tujuan_pengajuan }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <table class="spk table table-sm table-striped w-100">
                        <tr>
                            <th>Sumber Pembayaran</th>
                            <td>: {{ $kredit->sumber_pembayaran }}</td>
                        </tr>
                        <tr>
                            <th>Asal Kredit</th>
                            <td>: {{ $kredit->asal_kredit }}</td>
                        </tr>
                        <tr>
                            <th>Petugas Referal</th>
                            <td>: {{ $kredit->petugas_referal }}</td>
                        </tr>
                        <tr>
                            <th>Petugas Penerima</th>
                            <td>: {{ $kredit->petugas_penerima }}</td>
                        </tr>
                        <tr>
                            <th>Status Kredit</th>
                            <td>: {{ $kredit->status_kredit }}</td>
                        </tr>
                        <tr>
                            <th>Status Akhir</th>
                            <td>: {{ $kredit->status_akhir }}</td>
                        </tr>
                    </table>
                </div>

                <div class="col-md-6">
                    <br>
                    <div class="head-judul">#. Catatan-Catatan Pemutus Kredit</div>
                    <br>
                    <table class="catatan">
                        <tr>
                            <th style="vertical-align: top">Catatan Account Officer</th>
                            <td style="width: 20px; vertical-align: top">: </td>
                            <td>{!! $kredit->catatan_ao !!}</td>
                        </tr>
                        <tr>
                            <th style="vertical-align: top">Catatan Analis Cabang</th>
                            <td style="width: 20px; vertical-align: top">: </td>
                            <td>{!! $kredit->catatan_analis !!}</td>
                        </tr>
                        <tr>
                            <th style="vertical-align: top">Catatan Kasi Komersial</th>
                            <td style="width: 20px; vertical-align: top">: </td>
                            <td>{!! $kredit->catatan_kakom !!}</td>
                        </tr>
                        <tr>
                            <th style="vertical-align: top">Catatan Pimpinan Cabang</th>
                            <td style="width: 20px; vertical-align: top">: </td>
                            <td>{!! $kredit->catatan_pincab !!}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <br>
                    <div class="head-judul">#. Catatan-Catatan</div>
                    <br>
                    <table class="catatan">
                        <tr>
                            <th style="vertical-align: top">Catatan Kasi Operasional</th>
                            <td style="width: 20px; vertical-align: top">: </td>
                            <td>{!! $kredit->catatan_kaops !!}</td>
                        </tr>
                        <tr>
                            <th style="vertical-align: top">Catatan Tambahan/Legal</th>
                            <td style="width: 20px; vertical-align: top">: </td>
                            <td>{!! $kredit->catatan_tambahan !!}</td>
                        </tr>
                    </table>
                </div>
            @else
                <table class="table table-sm table-striped w-100">
                    <tr style="color: green;">
                        <th>DATA SPK (Surat Permohonan Kredit)</th>
                        <td>&rarr;</td>
                    </tr>
                    <tr>
                        <th style="color: red">TIDAK ADA DATA</th>
                    </tr>
                </table>
            @endif
        </div>
    </div>
</div>

<br>

{{-- Persetujuan Kredit --}}
<div class="card">
    <div class="card-header">
        <div class="head-judul">B. DATA PERSETUJUAN KREDIT</div>
    </div>
    <div class="card-body">
        <div class="row m-2">
            @if (empty($kredit->persetujuan))
                <table class="spk table table-sm table-striped w-100">
                    <tr style="color: green;">
                        <th>DATA PERSETUJUAN KREDIT</th>
                        <td>&rarr;</td>
                    </tr>
                    <tr>
                        <th style="color: red">TIDAK ADA DATA</th>
                    </tr>
                </table>
            @else
                <div class="col-md-6">
                    <table class="spk table table-sm table-striped w-100">
                        <tr>
                            <th>Jenis Kredit</th>
                            <td>: {{ $kredit->persetujuan->jns_kredit }}</td>
                        </tr>
                        <tr>
                            <th>Jenis Bunga</th>
                            <td>: {{ $kredit->persetujuan->jns_bunga }}</td>
                        </tr>
                        <tr>
                            <th>Jangka Waktu Disetujui</th>
                            <td>: {{ $kredit->jkw . ' Bulan' }}</td>
                        </tr>
                        <tr>
                            <th>Besar Bunga</th>
                            <td>: {{ $kredit->persetujuan->besar_bunga . '%' }}</td>
                        </tr>
                        <tr>
                            <th>Jumlah Angsuran</th>
                            <td>: Rp
                                {{ number_format($kredit->persetujuan->jumlah_angsuran, 0, ',', '.') }}
                                <span style="font-size: 12px;">
                                    {{ $kredit->persetujuan->jns_kredit == 'Berjangka' ? '(nominal angsuran menyesuaikan jumlah hari dalam bulan berjalan)' : '' }}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th>Besar Provisi</th>
                            <td>: {{ $kredit->persetujuan->provisi . '%' }}</td>
                        </tr>
                        <tr>
                            <th>Jumlah Provisi</th>
                            <td>: Rp
                                {{ number_format($kredit->persetujuan->jumlah_provisi, 0, ',', '.') }}
                                {{-- {{ number_format($kredit->persetujuan->provisi, 0, ',', '.') }} --}}
                            </td>
                        </tr>
                        <tr>
                            <th>Besar Administrasi</th>
                            <td>: {{ $kredit->persetujuan->besar_adm . '%' }}</td>
                        </tr>
                        <tr>
                            <th>Jumlah Administrasi</th>
                            <td>: Rp
                                {{ number_format($kredit->persetujuan->biaya_adm, 0, ',', '.') }}
                                {{-- {{ number_format($kredit->persetujuan->jumlah_adm, 0, ',', '.') }} --}}
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <table class="spk table table-sm table-striped w-100">
                        <tr>
                            <th>Besar Survey</th>
                            <td>: {{ $kredit->persetujuan->besar_survey . '%' }}</td>
                        </tr>
                        <tr>
                            <th>Jumlah Survey</th>
                            <td>: Rp
                                {{ number_format($kredit->persetujuan->biaya_survey, 0, ',', '.') }}
                                {{-- {{ number_format($kredit->persetujuan->biaya_survey, 0, ',', '.') }} --}}
                            </td>
                        </tr>
                        <tr>
                            <th>Biaya Asuransi Jiwa</th>
                            <td>: Rp
                                {{ number_format($kredit->persetujuan->biaya_asuransi, 0, ',', '.') }}
                                {{-- {{ number_format($kredit->persetujuan->biaya_survey, 0, ',', '.') }} --}}
                            </td>
                        </tr>
                        <tr>
                            <th>Biaya Asuransi Kabakaran</th>
                            <td>: Rp
                                {{ number_format($kredit->persetujuan->biaya_asuransi_kebakaran, 0, ',', '.') }}
                            </td>
                        </tr>
                        <tr>
                            <th>Biaya Asuransi Kendaraan</th>
                            <td>: Rp
                                {{ number_format($kredit->persetujuan->biaya_asuransi_kendaraan, 0, ',', '.') }}
                            </td>
                        </tr>
                        <tr>
                            <th>Biaya Materai</th>
                            <td>: Rp
                                {{ number_format($kredit->persetujuan->biaya_materai, 0, ',', '.') }}
                                {{-- {{ number_format($kredit->persetujuan->biaya_survey, 0, ',', '.') }} --}}
                            </td>
                        </tr>
                        <tr>
                            <th>Biaya Notaris</th>
                            <td>: Rp
                                {{ number_format($kredit->persetujuan->biaya_notaris, 0, ',', '.') }}
                                {{-- {{ number_format($kredit->persetujuan->biaya_survey, 0, ',', '.') }} --}}
                            </td>
                        </tr>
                        <tr>
                            <th>Biaya Saving Angsuran</th>
                            <td>: Rp
                                {{ number_format($kredit->persetujuan->biaya_saving_angsuran, 0, ',', '.') }}
                                {{-- {{ number_format($kredit->persetujuan->biaya_survey, 0, ',', '.') }} --}}
                            </td>
                        </tr>
                        <tr>
                            <th>Biaya Lainnya</th>
                            <td>: Rp
                                {{ number_format($kredit->persetujuan->biaya_lainnya, 0, ',', '.') }}
                                {{-- {{ number_format($kredit->persetujuan->biaya_survey, 0, ',', '.') }} --}}
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <br>
                    <div class="head-judul">#. Data PK/PMK</div>
                    <table class="catatan">
                        <tr>
                            <th>Nomor PK/PMK</th>
                            <td style="width: 20px;">: </td>
                            <td>
                                {{ !empty($kredit->pkpmk->no_pkpmk) ? $kredit->pkpmk->no_pkpmk : 'Belum ada data' }}
                            </td>
                        </tr>
                        <tr>
                            <th>Tanggal Mulai</th>
                            <td style="width: 20px;">: </td>
                            <td>
                                {{ !empty($kredit->pkpmk->tgl_awal)
                                    ? Carbon\Carbon::parse($kredit->pkpmk->tgl_awal)->translatedFormat('d F Y')
                                    : 'Belum ada data' }}
                            </td>
                        </tr>
                        <tr>
                            <th>Tanggal Akhir</th>
                            <td style="width: 20px;">: </td>
                            <td>
                                {{ !empty($kredit->pkpmk->tgl_akhir)
                                    ? Carbon\Carbon::parse($kredit->pkpmk->tgl_akhir)->translatedFormat('d F Y')
                                    : 'Belum ada data' }}
                            </td>
                        </tr>
                        <tr>
                            <th>Penalty Pelunasan</th>
                            <td style="width: 20px;">: </td>
                            <td>
                                {{ !empty($kredit->persetujuan->penalty) ? $kredit->persetujuan->penalty . ' X' : 'Belum ada data' }}
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <br>
                    <div class="head-judul">#. Data Lainnya</div>
                    <table class="catatan">
                        <tr>
                            <th>Asuransi</th>
                            <td style="width: 20px;">: </td>
                            <td>
                                {{ !empty($kredit->persetujuan->asuransi) ? $kredit->persetujuan->asuransi : 'Belum ada data' }}
                            </td>
                        </tr>
                        <tr>
                            <th>Biaya Asuransi</th>
                            <td style="width: 20px;">: </td>
                            <td>
                                @if ($kredit->persetujuan->asuransi == 'Tidak')
                                    Debitur Tidak Mengikuti Asuransi
                                @elseif ($kredit->persetujuan->asuransi == 'Ya')
                                    Rp
                                    {{ number_format($kredit->persetujuan->biaya_asuransi, 0, ',', '.') }}
                                @else
                                    Belum ada data
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Nomor Rekening Tabungan</th>
                            <td style="width: 20px;">: </td>
                            <td>
                                {{ !empty($kredit->persetujuan->norek_tabungan) ? $kredit->persetujuan->norek_tabungan : 'Belum ada data' }}
                            </td>
                        </tr>
                        <tr>
                            <th>Nama Rekening Tabungan</th>
                            <td style="width: 20px;">: </td>
                            <td>
                                {{ !empty($kredit->persetujuan->nama_rekening) ? $kredit->persetujuan->nama_rekening : 'Belum ada data' }}
                            </td>
                        </tr>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>

<br>

{{-- Debitur --}}
<div class="card">
    <div class="card-header">
        <div class="head-judul">C. Data Debitur</div>
    </div>
    <div class="card-body">
        <div class="row m-2">
            {{-- <debitur> --}}
            <div class="col-md-6">
                <table class="table table-sm table-striped w-100">
                    <tr style="color: green;">
                        <th>DATA DEBITUR</th>
                        <td>&rarr;</td>
                    </tr>
                    <tr>
                        <th class="nomer">NIK</th>
                        <td>: {{ $kredit->debitur->nik }}</td>
                    </tr>
                    <tr>
                        <th class="nomer">Nama Debitur</th>
                        <td>: {{ $kredit->debitur->nama_debitur }}</td>
                    </tr>
                    <tr>
                        <th class="nomer">Tempat, Tanggal Lahir</th>
                        <td>: {{ $kredit->debitur->tempat_lahir }},
                            {{ Carbon\Carbon::parse($kredit->debitur->tgl_lahir)->translatedFormat('d F Y') }}
                        </td>
                    </tr>
                    <tr>
                        <th class="nomer">Usia (saat pengajuan)</th>
                        <td>: {{ $kredit->debitur->usia }} </td>
                    </tr>
                    <tr>
                        <th class="nomer">No Telp</th>
                        <td>: {{ $kredit->debitur->no_telp }} </td>
                    </tr>
                    <tr>
                        <th class="nomer">Jens Kelamin</th>
                        <td>: {{ $kredit->debitur->jenis_kelamin }} </td>
                    </tr>
                    <tr>
                        <th class="nomer">Pendidikan Terakhir</th>
                        <td>: {{ $kredit->debitur->pendidikan_terakhir }} </td>
                    </tr>
                    <tr>
                        <th class="nomer">Status Pernikahan</th>
                        <td>: {{ $kredit->debitur->status_pernikahan }} </td>
                    </tr>
                    <tr>
                        <th class="nomer">Alamat (KTP)</th>
                        <td>: {{ $kredit->debitur->alamat_ktp }} </td>
                    </tr>
                    <tr>
                        <th class="nomer">RT/TW (KTP)</th>
                        <td>: {{ $kredit->debitur->rt_rw_ktp }} </td>
                    </tr>
                    <tr>
                        <th class="nomer">Kelurahan (KTP)</th>
                        <td>: {{ $kredit->debitur->kelurahan }} </td>
                    </tr>
                    <tr>
                        <th class="nomer">Kecamatan (KTP)</th>
                        <td>: {{ $kredit->debitur->kecamatan }} </td>
                    </tr>
                    <tr>
                        <th class="nomer">Kebupaten (KTP)</th>
                        <td>: {{ $kredit->debitur->kabupaten }} </td>
                    </tr>
                    <tr>
                        <th class="nomer">Nama Ibu</th>
                        <td>: {{ $kredit->debitur->nama_ibu }} </td>
                    </tr>
                    <tr style="color: green;">
                        <th>PEKERJAAN</th>
                        <td>&rarr;</td>
                    </tr>
                    <tr>
                        <th class="nomer">Pekerjaan</th>
                        <td>: {{ $kredit->debitur->pekerjaan }}</td>
                    </tr>
                    <tr>
                        <th class="nomer">Nama Perusahaan/Badan Usaha</th>
                        <td>: {{ $kredit->debitur->nama_perusahaan }}</td>
                    </tr>
                    <tr>
                        <th class="nomer">Bidang Usaha</th>
                        <td>: {{ $kredit->debitur->bidang_usaha }}</td>
                    </tr>
                    <tr>
                        <th class="nomer">Jabatan</th>
                        <td>: {{ $kredit->debitur->jabatan }} </td>
                    </tr>
                    <tr>
                        <th class="nomer">Status Tempat Kerja</th>
                        <td>: {{ $kredit->debitur->status_tempat_usaha }} </td>
                    </tr>
                    <tr>
                        <th class="nomer">Periode</th>
                        <td>: {{ $kredit->debitur->periode }} </td>
                    </tr>
                    <tr>
                        <th class="nomer">Penghasilan Perbulan</th>
                        <td>: Rp {{ number_format($kredit->debitur->penghasilan_bulanan, 0, ',', '.') }}</td>
                        {{-- <td>: {{ $kredit->debitur->penghasilan_bulanan }}  </td> --}}
                    </tr>
                </table>
            </div>
            <div class="col-md-6">
                <table class="table table-sm table-striped w-100">
                    <tr style="color: green;">
                        <th>ALAMAT DOMISILI</th>
                        <td>&rarr;</td>
                    </tr>
                    <tr>
                        <th class="nomer">Alamat (domisili)</th>
                        <td>: {{ $kredit->debitur->alamat_rumah }} </td>
                    </tr>
                    <tr>
                        <th class="nomer">RT/TW (domisili)</th>
                        <td>: {{ $kredit->debitur->rt_rw_rumah }} </td>
                    </tr>
                    <tr>
                        <th class="nomer">Kode Pos (domisili)</th>
                        <td>: {{ $kredit->debitur->kode_pos }} </td>
                    </tr>
                    <tr>
                        <th class="nomer">Status Tempat Tinggal</th>
                        <td>: {{ $kredit->debitur->status_tempat_tinggal }} </td>
                    </tr>
                    <tr>
                        <th class="nomer">Status Kepemilikan</th>
                        <td>: {{ $kredit->debitur->status_kepemilikan }} </td>
                    </tr>
                    <tr>
                        <th class="nomer">Ditempati Dari Tahun</th>
                        <td>: {{ $kredit->debitur->tahun_ditempati }} </td>
                    </tr>
                    @if ($kredit->debitur->status_pernikahan == 'Belum Menikah')
                        <tr style="color: green;">
                            <th>DATA LAINNYA</th>
                            <td>&rarr;</td>
                        </tr>
                        <tr>
                            <th class="nomer">Jumlah Tanggungan</th>
                            <td>: {{ $kredit->debitur->jumlah_tanggungan }} </td>
                        </tr>
                        <tr style="color: green;">
                            <th>DATA PASANGAN</th>
                            <td>&rarr;</td>
                        </tr>
                        <tr>
                            <th style="color: red">TIDAK ADA DATA</th>
                        </tr>
                    @elseif ($kredit->debitur->status_pernikahan == 'Duda/Janda')
                        <tr style="color: green;">
                            <th>DATA LAINNYA</th>
                            <td>&rarr;</td>
                        </tr>
                        <tr>
                            <th class="nomer">Jumlah Anak</th>
                            <td>: {{ $kredit->debitur->jumlah_anak }} </td>
                        </tr>
                        <tr>
                            <th class="nomer">Jumlah Tanggungan</th>
                            <td>: {{ $kredit->debitur->jumlah_tanggungan }} </td>
                        </tr>
                    @else
                        <tr style="color: green;">
                            <th>DATA PASANGAN</th>
                            <td>&rarr;</td>
                        </tr>
                        <tr>
                            <th class="nomer">Tanggal Pernikahan</th>
                            <td>:
                                {{ $kredit->debitur->tgl_pernikahan ? Carbon\Carbon::parse($kredit->debitur->tgl_pernikahan)->translatedFormat('d F Y') : 'belum ada data' }}
                            </td>
                        </tr>
                        <tr>
                            <th class="nomer">NIK</th>
                            <td>: {{ $kredit->debitur->nik_pasangan }} </td>
                        </tr>
                        <tr>
                            <th class="nomer">Nama</th>
                            <td>: {{ $kredit->debitur->nama_pasangan }} </td>
                        </tr>
                        <tr>
                            <th class="nomer">Tempat, Tgl Lahir</th>
                            <td>: {{ $kredit->debitur->tempat_lahir_pasangan }},
                                {{ $kredit->debitur->tgl_lahir_pasangan ? Carbon\Carbon::parse($kredit->debitur->tgl_lahir_pasangan)->translatedFormat('d F Y') : 'belum ada data' }}
                            </td>
                        </tr>
                        <tr>
                            <th class="nomer">Pekerjaan</th>
                            <td>: {{ $kredit->debitur->pekerjaan_pasangan }} </td>
                        </tr>
                        <tr>
                            <th class="nomer">Penghasilan Perbulan</th>
                            <td>: Rp
                                {{ number_format($kredit->debitur->penghasilan_bulanan_pasangan, 0, ',', '.') }}
                            </td>
                            {{-- <td>: {{ $kredit->debitur->penghasilan_bulanan_pasangan }} </td> --}}
                        </tr>
                        <tr>
                            <th class="nomer">Alamat</th>
                            <td>: {{ $kredit->debitur->alamat_pasangan }} </td>
                        </tr>
                        <tr>
                            <th class="nomer">Jumlah Anak</th>
                            <td>: {{ $kredit->debitur->jumlah_anak }} </td>
                        </tr>
                        <tr>
                            <th class="nomer">Jumlah Tanggungan</th>
                            <td>: {{ $kredit->debitur->jumlah_tanggungan }} </td>
                        </tr>
                        @if ($kredit->debitur->status_pernikahan == 'Pernikahan Khusus')
                            <tr style="color: green;">
                                <th>DATA PERNIKAHAN KHUSUS</th>
                                <td>&rarr;</td>
                            </tr>
                            <tr>
                                <th class="nomer">Judul Akta</th>
                                <td>: {{ $kredit->debitur->judul_akta }} </td>
                            </tr>
                            <tr>
                                <th class="nomer">Nomor Akta</th>
                                <td>: {{ $kredit->debitur->no_akta }} </td>
                            </tr>
                            <tr>
                                <th class="nomer">Tanggal Akta</th>
                                <td>:
                                    {{ $kredit->debitur->tgl_akta ? Carbon\Carbon::parse($kredit->debitur->tgl_akta)->translatedFormat('d F Y') : 'belum ada data' }}
                                </td>
                            </tr>
                            <tr>
                                <th class="nomer">Nama Notaris</th>
                                <td>: {{ $kredit->debitur->nama_notaris }} </td>
                            </tr>
                            <tr>
                                <th class="nomer">Kedudukan Notaris</th>
                                <td>: {{ $kredit->debitur->kedudukan_notaris }} </td>
                            </tr>
                        @endif
                    @endif
                </table>


                @if (!empty($kredit->pikareks))
                    <table class="table table-sm table-striped w-100">
                        <tr style="color: green;">
                            <th>DATA PERJANJIAN KERJA SAMA</th>
                            <td>&rarr;</td>
                        </tr>
                        <tr>
                            <th class="nomer">Nama Perusahaan</th>
                            <td>: {{ $kredit->pikareks->nama_perusahaan }}</td>
                        </tr>
                        <tr>
                            <th class="nomer">Nomor Perjanjian</th>
                            <td>: {{ $kredit->pikareks->no_perjanjian }}</td>
                        </tr>
                        <tr>
                            <th class="nomer">Tanggal Perjanjian</th>
                            <td>:
                                {{ !empty($kredit->pikareks->tgl_perjanjian)
                                    ? Carbon\Carbon::parse($kredit->pikareks->tgl_perjanjian)->translatedFormat('d F Y')
                                    : 'Belum ada data' }}
                            </td>
                        </tr>
                        <tr>
                            <th class="nomer">Nama BPJS</th>
                            <td>: {{ $kredit->pikareks->nama_bpjs }}</td>
                        </tr>
                        <tr>
                            <th class="nomer">Nomor BPJS</th>
                            <td>: {{ $kredit->pikareks->no_bpjs }}</td>
                        </tr>
                    </table>
                @endif
            </div>
            {{-- </debitur> --}}
        </div>
    </div>
</div>


<br>

{{-- Penjamin --}}
<div class="card">
    <div class="card-header">
        <div class="head-judul">D. Data Penjamin</div>
    </div>
    <div class="card-body" style="margin-top: -20px;">
        <div class="row m-2">
            {{-- <penjamin> --}}
            @if ($kredit->penjamin->isEmpty())
                <table class="table table-sm table-striped w-100">
                    <tr style="color: green;">
                        <th>DATA PENJAMIN</th>
                        <td>&rarr;</td>
                    </tr>
                    <tr>
                        <th style="color: red">TIDAK ADA DATA</th>
                    </tr>
                </table>
            @else
                @foreach ($kredit->penjamin as $penjaminItem)
                    <div class="col-md-6">
                        <table class="table table-sm table-striped w-100">
                            <tr style="color: green;">
                                <th class="penjamin">DATA PENJAMIN {{ $loop->iteration }}</th>
                                <td>&rarr;</td>
                            </tr>
                            <tr>
                                <th>NIK</th>
                                <td>: {{ $penjaminItem->nik }}</td>
                            </tr>
                            <tr>
                                <th>Nama</th>
                                <td>: {{ $penjaminItem->nama_penjamin }}</td>
                            </tr>
                            <tr>
                                <th>Tempat, Tanggal Lahir</th>
                                <td>: {{ $penjaminItem->tempat_lahir }},
                                    {{ $penjaminItem->tgl_lahir ? Carbon\Carbon::parse($penjaminItem->tgl_lahir)->translatedFormat('d F Y') : 'belum ada data' }}
                                </td>
                            </tr>
                            <tr>
                                <th>Jens Kelamin</th>
                                <td>: {{ $penjaminItem->jenis_kelamin }} </td>
                            </tr>
                            <tr>
                                <th>Status Pernikahan</th>
                                <td>: {{ $penjaminItem->status_pernikahan }} </td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>: {{ $penjaminItem->alamat }} </td>
                            </tr>
                            @if ($penjaminItem->status_pernikahan == 'Menikah' || $penjaminItem->status_pernikahan == 'Pernikahan Khusus')
                                <tr>
                                    <th style="color: green">DATA PASANGAN</th>
                                    <td>&rarr;</td>
                                </tr>
                                <tr>
                                    <th>NIK</th>
                                    <td>: {{ $penjaminItem->nik_pasangan }} </td>
                                </tr>
                                <tr>
                                    <th>Nama</th>
                                    <td>: {{ $penjaminItem->nama_pasangan }} </td>
                                </tr>
                                <tr>
                                    <th>Tempat, Tgl Lahir</th>
                                    <td>: {{ $penjaminItem->tempat_lahir_pasangan }},
                                        {{ $penjaminItem->tgl_lahir_pasangan ? Carbon\Carbon::parse($penjaminItem->tgl_lahir_pasangan)->translatedFormat('d F Y') : 'belum ada data' }}
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <td>: {{ $penjaminItem->alamat_pasangan }} </td>
                                </tr>
                                @if ($penjaminItem->status_pernikahan == 'Pernikahan Khusus')
                                    <tr style="color: green;">
                                        <th>DATA PERNIKAHAN KHUSUS</th>
                                        <td>&rarr;</td>
                                    </tr>
                                    <tr>
                                        <th>Judul Akta</th>
                                        <td>: {{ $penjaminItem->judul_akta }} </td>
                                    </tr>
                                    <tr>
                                        <th>Nomor Akta</th>
                                        <td>: {{ $penjaminItem->no_akta }} </td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Akta</th>
                                        <td>:
                                            {{ $penjaminItem->tgl_akta ? Carbon\Carbon::parse($penjaminItem->tgl_akta)->translatedFormat('d F Y') : 'belum ada data' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Nama Notaris</th>
                                        <td>: {{ $penjaminItem->nama_notaris }} </td>
                                    </tr>
                                    <tr>
                                        <th>Kedudukan Notaris</th>
                                        <td>: {{ $penjaminItem->kedudukan_notaris }} </td>
                                    </tr>
                                @endif
                            @else
                                <tr>
                                    <th style="color: green">DATA PASANGAN</th>
                                    <td>&rarr;</td>
                                </tr>
                                <tr>
                                    <th style="color: red">TIDAK ADA DATA PASANGAN</th>
                                </tr>
                            @endif
                            <br>
                        </table>
                    </div>
                @endforeach
            @endif
            {{-- </penjamin> --}}
        </div>
    </div>
</div>

<br>

{{-- Jaminan/Agunan --}}
<div class="card">
    <div class="card-header">
        <div class="head-judul">E. Data Jaminan/Agunan</div>
    </div>
    <div class="card-body" style="margin-top: -20px;">
        <div class="row m-2">
            {{-- <tanah> --}}
            @if ($kredit->jamtanah->isEmpty())
                <div class="col-md-12">
                    <br>
                    <table class="table table-sm table-striped w-100">
                        <tr style="color: green;">
                            <th>DATA TANAH/BANGUNAN</th>
                            <td>&rarr;</td>
                        </tr>
                        <tr>
                            <th style="color: red">TIDAK ADA DATA</th>
                        </tr>
                    </table>
                </div>
            @else
                @foreach ($kredit->jamtanah as $tanah)
                    <div class="col-md-6">
                        <table class="table table-sm table-striped w-100">
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
                                        {{ $tanah->tgl_sertifikat ? Carbon\Carbon::parse($tanah->tgl_sertifikat)->translatedFormat('d F Y') : 'belum ada data' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>No Surat Ukur</th>
                                    <td>: {{ $tanah->no_surat_ukur }}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal Surat Ukur</th>
                                    <td>:
                                        {{ $tanah->tgl_surat_ukur ? Carbon\Carbon::parse($tanah->tgl_surat_ukur)->translatedFormat('d F Y') : 'belum ada data' }}
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
                                <th>Nilai Jaminan</th>
                                <td>: {{ 'Rp' . number_format($tanah?->nilai_jaminan, 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <th>Nilai Taksasi</th>
                                <td>: {{ 'Rp' . number_format($tanah?->nilai_taksasi, 0, ',', '.') }}</td>
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
            @if ($kredit->jamkenda->isEmpty())
                <div class="col-md-12">
                    <br>
                    <table class="table table-sm table-striped w-100">
                        <tr style="color: green;">
                            <th>DATA KENDARAAN</th>
                            <td>&rarr;</td>
                        </tr>
                        <tr>
                            <th style="color: red">TIDAK ADA DATA</th>
                        </tr>
                    </table>
                </div>
            @else
                @foreach ($kredit->jamkenda as $kenda)
                    <div class="col-md-6">
                        <table class="table table-sm table-striped w-100">
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
                                    {{ $kenda->tgl_bpkb ? Carbon\Carbon::parse($kenda->tgl_bpkb)->translatedFormat('d F Y') : 'belum ada data' }}
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
                                <th>Nilai Jaminan</th>
                                <td>: {{ 'Rp' . number_format($kenda?->nilai_jaminan, 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <th>Nilai Taksasi</th>
                                <td>: {{ 'Rp' . number_format($kenda?->nilai_taksasi, 0, ',', '.') }}</td>
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
            @if ($kredit->jamdeposito->isEmpty())
                <div class="col-md-12">
                    <br>
                    <table class="table table-sm table-striped w-100">
                        <tr style="color: green;">
                            <th>DATA DEPOSITO</th>
                            <td>&rarr;</td>
                        </tr>
                        <tr>
                            <th style="color: red">TIDAK ADA DATA</th>
                        </tr>
                    </table>
                </div>
            @else
                @foreach ($kredit->jamdeposito as $depo)
                    <div class="col-md-6">
                        <table class="table table-sm table-striped w-100">
                            <tr style="color: green;">
                                <th class="penjamin" colspan="2">
                                    DATA JAMINAN {{ $depo->jns_jaminan == 'Deposito' ? 'DEPOSITO' : 'TABUNGAN' }}
                                    {{ $loop->iteration }} &rarr;
                                </th>
                            </tr>
                            <tr>
                                <th>Jenis Jaminan</th>
                                <td>: {{ $depo->jns_jaminan }}</td>
                            </tr>
                            <tr>
                                <th>Nomor {{ $depo->jns_jaminan == 'Deposito' ? 'Bilyet' : 'Rekening' }}</th>
                                <td>: {{ $depo->no_rek }}</td>
                            </tr>
                            <tr>
                                <th>Atas Nama</th>
                                <td>: {{ $depo->atas_nama }}</td>
                            </tr>
                            <tr>
                                <th> {{ $depo->jns_jaminan == 'Deposito' ? 'Nominal' : 'Saldo Tabungan' }}</th>
                                <td>:
                                    {{ $depo->nominal ? 'Rp ' . number_format($depo->nominal, 0, ',', '.') : 'belum ada data' }}
                                </td>
                            </tr>
                            <tr>
                                <th>Nilai Jaminan</th>
                                <td>: {{ 'Rp' . number_format($depo?->nilai_jaminan, 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <th>Nilai Taksasi</th>
                                <td>: {{ 'Rp' . number_format($depo?->nilai_taksasi, 0, ',', '.') }}</td>
                            </tr>
                            <br>
                        </table>
                    </div>
                @endforeach
            @endif
            {{-- </deposito> --}}

            {{-- Pikar non jaminan --}}
            @if (isset($debitur->kredit))
                @if ($kredit->kategori_jaminan == 'PIKAR (Non-jaminan)')
                    <div class="row" id="head_jaminan_pikar">
                        <div class="col-md-12">
                            <h1 style="color: red; font-style: italic; text-align: center; font-weight: bold;">
                                PIKAR (NON JAMINAN) TIDAK MEMERLUKAN JAMINAN</h1>
                        </div>
                    </div>
                @endif
            @endif
        </div>
    </div>
</div>
