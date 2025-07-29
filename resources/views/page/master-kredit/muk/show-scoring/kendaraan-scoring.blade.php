<div class="container" style="border: 1px solid black">
    <p class="text-end m-2" style="font-style: italic; font-weight: bold; font-size: 10px">
        KREDIT/07/PAMKB/Vr.3.2025
    </p>
    <div class="card mb-2">
        <div class="card-header bg-success text-white head-judul" style="text-align: center">PENILAIAN AGUNAN MESIN /
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
                            <td>{{ $kenda->sc_kenda_agunan->tgl_pemeriksaan->translatedFormat('d F Y') }}</td>
                        </tr>
                        <tr>
                            <td>Penilai</td>
                            <td>:</td>
                            <td>{{ $kenda->sc_kenda_agunan->penilai }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- Scoring --}}
    <div class="card mb-2">
        <div class="card-header bg-success text-white head-judul" style="text-align: center">I. PENELITIAN FISIK</div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <table class="table table-sm w-100">
                        <tr>
                            <td style="width: 40%">Jenis Kendaraan</td>
                            <td style="width: 2%">:</td>
                            <td>{{ $kenda->sc_kenda_agunan->jns_kendaraan }}</td>
                        </tr>
                        <tr>
                            <td>Pembelian Baru/Bekas</td>
                            <td>:</td>
                            <td>{{ $kenda->sc_kenda_agunan->pembelian }}</td>
                        </tr>
                        <tr>
                            <td>Tahun Pembuatan</td>
                            <td>:</td>
                            <td>{{ $kenda->sc_kenda_agunan->thn_pembuatan }}</td>
                        </tr>
                        <tr>
                            <td>Kondisi</td>
                            <td>:</td>
                            <td>{{ $kenda->sc_kenda_agunan->kondisi }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-4">
                    <table class="table table-sm w-100">
                        <tr>
                            <td style="width: 40%">Umur</td>
                            <td style="width: 2%">:</td>
                            <td>{{ $kenda->sc_kenda_agunan->umur }} Tahun</td>
                        </tr>
                        <tr>
                            <td>Merk</td>
                            <td>:</td>
                            <td>{{ $kenda->sc_kenda_agunan->merk }}</td>
                        </tr>
                        <tr>
                            <td>Type</td>
                            <td>:</td>
                            <td>{{ $kenda->sc_kenda_agunan->type }}</td>
                        </tr>
                        <tr>
                            <td>Perawatan/Pemeliharaan</td>
                            <td>:</td>
                            <td>{{ $kenda->sc_kenda_agunan->perawatan }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-4">
                    <table class="table table-sm w-100">
                        <tr>
                            <td style="width: 40%;">Nomor Polisi</td>
                            <td style="width: 2%">:</td>
                            <td>{{ $kenda->sc_kenda_agunan->nopol }}</td>
                        </tr>
                        <tr>
                            <td>Nomor Mesin</td>
                            <td>:</td>
                            <td>{{ $kenda->sc_kenda_agunan->no_mesin }}</td>
                        </tr>
                        <tr>
                            <td>Nomor Rangka</td>
                            <td>:</td>
                            <td>{{ $kenda->sc_kenda_agunan->no_rangka }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- penelitian yuridis --}}
    <div class="card mb-2">
        <div class="card-header bg-success text-white head-judul" style="text-align: center">
            II. PENELITIAN YURIDIS
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-sm w-100">
                        <tr>
                            <td style="width: 30%">Dokumen Kepemilikan</td>
                            <td style="width: 2%">:</td>
                            <td>{{ $kenda->sc_kenda_agunan->dokumen_kepemilikan }}</td>
                        </tr>
                        <tr>
                            <td>Dokumen Pembelian</td>
                            <td>:</td>
                            <td>{{ $kenda->sc_kenda_agunan->dokumen_pembelian }}</td>
                        </tr>
                        <tr>
                            <td>Asuransi</td>
                            <td>:</td>
                            <td>{{ $kenda->sc_kenda_agunan->asuransi }}</td>
                        </tr>
                        <tr>
                            <td>Nilai Pertanggungan</td>
                            <td>:</td>
                            <td>{{ $kenda->sc_kenda_agunan->nilai_pertanggungan }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <table class="table table-sm w-100">
                        <tr>
                            <td style="width: 30%">Nomor</td>
                            <td style="width: 2%">:</td>
                            <td>{{ $kenda->sc_kenda_agunan->no_dokumen }}</td>
                            <td>Tgl: {{ $kenda->sc_kenda_agunan->tgl_dokumen->translatedFormat('d M Y') }}</td>
                        </tr>
                        <tr>
                            <td>Atas Nama</td>
                            <td>:</td>
                            <td colspan="2">{{ $kenda->sc_kenda_agunan->atas_nama }}</td>
                        </tr>
                        <tr>
                            <td>Jenis Penutupan</td>
                            <td>:</td>
                            <td colspan="2">{{ $kenda->sc_kenda_agunan->jns_penutupan }}</td>
                        </tr>
                        <tr>
                            <td>Perusahaan Asuransi</td>
                            <td>:</td>
                            <td colspan="2">{{ $kenda->sc_kenda_agunan->perusahaan_asuransi }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- Perhitungan --}}
    <div class="card mb-2">
        <div class="card-header bg-success text-white head-judul" style="text-align: center">
            III. PERHITUNGAN NILAI PASAR SETELAH SAFETY MARGIN
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-sm w-100">
                        <tr>
                            <td style="width: 20%">Tujuan Penilaian</td>
                            <td style="width: 2%">:</td>
                            <td colspan="4">{{ $kenda->sc_kenda_agunan->tujuan_penilaian }}</td>
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
                            <td>{{ 'Rp' . number_format($kenda->sc_kenda_agunan->d1_harga, 0, ',', '.') }}</td>
                            <td>{{ $kenda->sc_kenda_agunan->d1_instansi }}</td>
                            <td>{{ $kenda->sc_kenda_agunan->d1_alamat }}</td>
                            <td>{{ $kenda->sc_kenda_agunan->d1_tgl->translatedFormat('d M Y') }}</td>
                        </tr>
                        <tr>
                            <td colspan="2" style="padding-left: 15px;">Data II (Medium)</td>
                            <td>{{ 'Rp' . number_format($kenda->sc_kenda_agunan->d2_harga, 0, ',', '.') }}</td>
                            <td>{{ $kenda->sc_kenda_agunan->d2_instansi }}</td>
                            <td>{{ $kenda->sc_kenda_agunan->d2_alamat }}</td>
                            <td>{{ $kenda->sc_kenda_agunan->d2_tgl->translatedFormat('d M Y') }}</td>
                        </tr>
                        <tr>
                            <td colspan="2" style="padding-left: 15px;">Data III (Tertinggi)</td>
                            <td>{{ 'Rp' . number_format($kenda->sc_kenda_agunan->d3_harga, 0, ',', '.') }}</td>
                            <td>{{ $kenda->sc_kenda_agunan->d3_instansi }}</td>
                            <td>{{ $kenda->sc_kenda_agunan->d3_alamat }}</td>
                            <td>{{ $kenda->sc_kenda_agunan->d3_tgl->translatedFormat('d M Y') }}</td>
                        </tr>
                        <tr>
                            <td colspan="3" style="padding-left: 30px">Harga Pasar Keseluruhan</td>
                            <td colspan="3">
                                :
                                {{ 'Rp' . number_format($kenda->sc_kenda_agunan->harga_pasar_keseluruhan, 0, ',', '.') }}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" style="padding-left: 30px">Safety Margin</td>
                            <td colspan="3">
                                : {{ $kenda->sc_kenda_agunan->safety_margin }} %
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" style="padding-left: 30px">Harga Pasar yang Dapat Diterima</td>
                            <td colspan="3">
                                :
                                {{ 'Rp' . number_format($kenda->sc_kenda_agunan->harga_pasar_diterima, 0, ',', '.') }}
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- kesimpulan --}}
    <div class="card mb-2">
        <div class="card-header bg-success text-white head-judul" style="text-align: center">
            IV. KESIMPULAN
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-sm w-100">
                        <tr>
                            <td style="width: 30%">Marketability</td>
                            <td style="width: 2%">:</td>
                            <td>{{ $kenda->sc_kenda_agunan->market }}</td>
                        </tr>
                        <tr>
                            <td>Pengikatan Agunan</td>
                            <td>:</td>
                            <td>{{ $kenda->sc_kenda_agunan->pengikatan_sempurna }}</td>
                        </tr>
                        <tr>
                            <td>Lain-lain</td>
                            <td>:</td>
                            <td>{!! $kenda->sc_kenda_agunan->lainnya !!}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <table class="table table-sm w-100">
                        <tr>
                            <td style="width: 30%">Permasalahan</td>
                            <td style="width: 2%">:</td>
                            <td>{{ $kenda->sc_kenda_agunan->permasalahan }}</td>
                        </tr>
                        <tr>
                            <td>Penguasaan</td>
                            <td>:</td>
                            <td>{{ $kenda->sc_kenda_agunan->penguasaan }}</td>
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
