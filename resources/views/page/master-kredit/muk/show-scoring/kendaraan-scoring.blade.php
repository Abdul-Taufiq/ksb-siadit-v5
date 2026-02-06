<div class="container" style="border: 1px solid black">
    <p class="text-end m-2" style="font-style: italic; font-weight: bold; font-size: 10px">
        KREDIT/07/PAMKB/Vr.3.2025
    </p>
    <div class="card mb-2">
        <div class="card-header bg-primary text-white head-judul" style="text-align: center">PENILAIAN AGUNAN MESIN /
            KENDARAAN BERMOTOR</div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-sm w-100">
                        <tr>
                            <td style="width: 30%">Nama Debitur</td>
                            <td style="width: 2%">:</td>
                            <td>{{ $kenda->kredit->debitur->nama_debitur }}</td>
                        </tr>
                        <tr>
                            <td>Lokasi Agunan</td>
                            <td>:</td>
                            <td></td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <table class="table table-sm w-100">
                        <tr>
                            <td style="width: 30%">Tgl Pemeriksaan</td>
                            <td style="width: 2%">:</td>
                            <td>{{ optional(data_get($kenda, "$SCKenda.tgl_pemeriksaan"))->translatedFormat('d F Y') }}
                            </td>
                        </tr>
                        <tr>
                            <td>Penilai</td>
                            <td>:</td>
                            <td>{{ data_get($kenda, "$SCKenda.penilai") }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- Scoring --}}
    <div class="card mb-2">
        <div class="card-header bg-primary text-white head-judul" style="text-align: center">I. PENELITIAN FISIK</div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <table class="table table-sm w-100">
                        <tr>
                            <td style="width: 40%">Jenis Kendaraan</td>
                            <td style="width: 2%">:</td>
                            <td>{{ data_get($kenda, "$SCKenda.jns_kendaraan") }}</td>
                        </tr>
                        <tr>
                            <td>Pembelian Baru/Bekas</td>
                            <td>:</td>
                            <td>{{ data_get($kenda, "$SCKenda.pembelian") }}</td>
                        </tr>
                        <tr>
                            <td>Tahun Pembuatan</td>
                            <td>:</td>
                            <td>{{ data_get($kenda, "$SCKenda.thn_pembuatan") }}</td>
                        </tr>
                        <tr>
                            <td>Kondisi</td>
                            <td>:</td>
                            <td>{{ data_get($kenda, "$SCKenda.kondisi") }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-4">
                    <table class="table table-sm w-100">
                        <tr>
                            <td style="width: 40%">Umur</td>
                            <td style="width: 2%">:</td>
                            <td>{{ data_get($kenda, "$SCKenda.umur") }} Tahun</td>
                        </tr>
                        <tr>
                            <td>Merk</td>
                            <td>:</td>
                            <td>{{ data_get($kenda, "$SCKenda.merk") }}</td>
                        </tr>
                        <tr>
                            <td>Type</td>
                            <td>:</td>
                            <td>{{ data_get($kenda, "$SCKenda.type") }}</td>
                        </tr>
                        <tr>
                            <td>Perawatan/Pemeliharaan</td>
                            <td>:</td>
                            <td>{{ data_get($kenda, "$SCKenda.perawatan") }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-4">
                    <table class="table table-sm w-100">
                        <tr>
                            <td style="width: 40%;">Nomor Polisi</td>
                            <td style="width: 2%">:</td>
                            <td>{{ data_get($kenda, "$SCKenda.nopol") }}</td>
                        </tr>
                        <tr>
                            <td>Nomor Mesin</td>
                            <td>:</td>
                            <td>{{ data_get($kenda, "$SCKenda.no_mesin") }}</td>
                        </tr>
                        <tr>
                            <td>Nomor Rangka</td>
                            <td>:</td>
                            <td>{{ data_get($kenda, "$SCKenda.no_rangka") }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- penelitian yuridis --}}
    <div class="card mb-2">
        <div class="card-header bg-primary text-white head-judul" style="text-align: center">
            II. PENELITIAN YURIDIS
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-sm w-100">
                        <tr>
                            <td style="width: 30%">Dokumen Kepemilikan</td>
                            <td style="width: 2%">:</td>
                            <td>{{ data_get($kenda, "$SCKenda.dokumen_kepemilikan") }}</td>
                        </tr>
                        <tr>
                            <td>Dokumen Pembelian</td>
                            <td>:</td>
                            <td>{{ data_get($kenda, "$SCKenda.dokumen_pembelian") }}</td>
                        </tr>
                        <tr>
                            <td>Asuransi</td>
                            <td>:</td>
                            <td>{{ data_get($kenda, "$SCKenda.asuransi") }}</td>
                        </tr>
                        <tr>
                            <td>Nilai Pertanggungan</td>
                            <td>:</td>
                            <td>{{ data_get($kenda, "$SCKenda.nilai_pertanggungan") }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <table class="table table-sm w-100">
                        <tr>
                            <td style="width: 30%">Nomor</td>
                            <td style="width: 2%">:</td>
                            <td>{{ data_get($kenda, "$SCKenda.no_dokumen") }}</td>
                            <td>Tgl :
                                {{ optional(data_get($kenda, "$SCKenda.tgl_dokumen"))->translatedFormat('d M Y') }}
                            </td>
                        </tr>
                        <tr>
                            <td>Atas Nama</td>
                            <td>:</td>
                            <td colspan="2">{{ data_get($kenda, "$SCKenda.atas_nama") }}</td>
                        </tr>
                        <tr>
                            <td>Jenis Penutupan</td>
                            <td>:</td>
                            <td colspan="2">{{ data_get($kenda, "$SCKenda.jns_penutupan") }}</td>
                        </tr>
                        <tr>
                            <td>Perusahaan Asuransi</td>
                            <td>:</td>
                            <td colspan="2">{{ data_get($kenda, "$SCKenda.perusahaan_asuransi") }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- Perhitungan --}}
    <div class="card mb-2">
        <div class="card-header bg-primary text-white head-judul" style="text-align: center">
            III. PERHITUNGAN NILAI PASAR SETELAH SAFETY MARGIN
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-sm w-100">
                        <tr>
                            <td style="width: 20%">Tujuan Penilaian</td>
                            <td style="width: 2%">:</td>
                            <td colspan="4">{{ data_get($kenda, "$SCKenda.tujuan_penilaian") }}</td>
                        </tr>
                        <tr>
                            <td colspan="2" style="padding-left: 15px;">Informasi Harga Pasar</td>
                            <td>Harga</td>
                            <td>Nama/Instansi</td>
                            <td>Alamat/Nomor Telepon</td>
                            <td>Tanggal</td>
                        </tr>
                        <tr>
                            <td colspan="2" style="padding-left: 15px;">Data I (Terendah)</td>
                            <td>{{ 'Rp' . number_format(data_get($kenda, "$SCKenda.d1_harga"), 0, ',', '.') }}</td>
                            <td>{{ data_get($kenda, "$SCKenda.d1_instansi") }}</td>
                            <td>{{ data_get($kenda, "$SCKenda.d1_alamat") }}</td>
                            <td>{{ optional(data_get($kenda, "$SCKenda.d1_tgl"))->translatedFormat('d M Y') }}</td>
                        </tr>
                        <tr>
                            <td colspan="2" style="padding-left: 15px;">Data II (Medium)</td>
                            <td>{{ 'Rp' . number_format(data_get($kenda, "$SCKenda.d2_harga"), 0, ',', '.') }}</td>
                            <td>{{ data_get($kenda, "$SCKenda.d2_instansi") }}</td>
                            <td>{{ data_get($kenda, "$SCKenda.d2_alamat") }}</td>
                            <td>{{ optional(data_get($kenda, "$SCKenda.d2_tgl"))->translatedFormat('d M Y') }}</td>
                        </tr>
                        <tr>
                            <td colspan="2" style="padding-left: 15px;">Data III (Tertinggi)</td>
                            <td>{{ 'Rp' . number_format(data_get($kenda, "$SCKenda.d3_harga"), 0, ',', '.') }}</td>
                            <td>{{ data_get($kenda, "$SCKenda.d3_instansi") }}</td>
                            <td>{{ data_get($kenda, "$SCKenda.d3_alamat") }}</td>
                            <td>{{ optional(data_get($kenda, "$SCKenda.d3_tgl"))->translatedFormat('d M Y') }}</td>
                        </tr>
                        <tr>
                            <td colspan="3" style="padding-left: 30px">Harga Pasar Keseluruhan</td>
                            <td colspan="3">
                                :
                                {{ 'Rp' . number_format(data_get($kenda, "$SCKenda.harga_pasar_keseluruhan"), 0, ',', '.') }}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" style="padding-left: 30px">Safety Margin</td>
                            <td colspan="3">
                                : {{ data_get($kenda, "$SCKenda.safety_margin") }} %
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" style="padding-left: 30px">Harga Taksasi yang Dapat Diterima</td>
                            <td colspan="3">
                                :
                                {{ 'Rp' . number_format(data_get($kenda, "$SCKenda.harga_pasar_diterima"), 0, ',', '.') }}
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- kesimpulan --}}
    <div class="card mb-2">
        <div class="card-header bg-primary text-white head-judul" style="text-align: center">
            IV. KESIMPULAN
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-sm w-100">
                        <tr>
                            <td style="width: 30%">Marketability</td>
                            <td style="width: 2%">:</td>
                            <td>{{ data_get($kenda, "$SCKenda.market") }}</td>
                        </tr>
                        <tr>
                            <td>Pengikatan Agunan</td>
                            <td>:</td>
                            <td>{{ data_get($kenda, "$SCKenda.pengikatan_sempurna") }}</td>
                        </tr>
                        <tr>
                            <td>Lain-lain</td>
                            <td>:</td>
                            <td>{!! data_get($kenda, "$SCKenda.lainnya") !!}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <table class="table table-sm w-100">
                        <tr>
                            <td style="width: 30%">Permasalahan</td>
                            <td style="width: 2%">:</td>
                            <td>{{ data_get($kenda, "$SCKenda.permasalahan") }}</td>
                        </tr>
                        <tr>
                            <td>Penguasaan</td>
                            <td>:</td>
                            <td>{{ data_get($kenda, "$SCKenda.penguasaan") }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- ttd --}}
    <div class="card mb-2">
        <div class="card-body">
            @include('page.master-kredit.muk.show-scoring.ttd-putusan')
        </div>
    </div>
</div>
