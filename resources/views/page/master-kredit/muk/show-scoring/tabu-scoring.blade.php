<div class="container" style="border: 1px solid black">
    <p class="text-end m-2" style="font-style: italic; font-weight: bold; font-size: 10px">
        KREDIT/06/PATab/Vr.3.2025
    </p>
    <div class="card mb-2">
        <div class="card-header bg-success text-white head-judul" style="text-align: center">PENILAIAN AGUNAN
            {{ strtoupper($depo->jns_jaminan) }}</div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-sm w-100">
                        <tr>
                            <td style="width: 30%">Nama Debitur</td>
                            <td style="width: 1%">:</td>
                            <td>{{ $depo->kredit->debitur->nama_debitur }}</td>
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
                            <td style="width: 1%">:</td>
                            <td>{{ $depo->sc_tabungan->tgl_pemeriksaan->translatedFormat('d F Y') }}</td>
                        </tr>
                        <tr>
                            <td>Penilai</td>
                            <td>:</td>
                            <td>{{ $depo->sc_tabungan->penilai }}</td>
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
                <div class="col-md-6">
                    <table class="table table-sm w-100">
                        <tr>
                            <td style="width: 40%">Nomor Rekening</td>
                            <td style="width: 1%">:</td>
                            <td>{{ $depo->sc_tabungan->norek }}</td>
                        </tr>
                        <tr>
                            <td>Nama Pemilik</td>
                            <td>:</td>
                            <td>{{ $depo->sc_tabungan->nama_pemilik }}</td>
                        </tr>
                        <tr>
                            <td>Alamat Pemilik</td>
                            <td>:</td>
                            <td>{{ $depo->sc_tabungan->alamat_pemilik }}</td>
                        </tr>
                        <tr>
                            <td>Bank Penerbit</td>
                            <td>:</td>
                            <td>{{ $depo->sc_tabungan->bank_penerbit }}</td>
                        </tr>
                        <tr>
                            <td>Jenis Rekening</td>
                            <td>:</td>
                            <td>{{ $depo->sc_tabungan->jns_rek }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <table class="table table-sm w-100">
                        <tr>
                            <td style="width: 40%">Saldo Tabungan</td>
                            <td style="width: 1%">:</td>
                            <td>{{ 'Rp' . number_format($depo->sc_tabungan->saldo_tabungan, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <td>Saldo Yang Dijaminkan</td>
                            <td>:</td>
                            <td>{{ 'Rp' . number_format($depo->sc_tabungan->saldo_dijaminkan, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <td>Suku Bunga Tabungan</td>
                            <td>:</td>
                            <td>{{ $depo->sc_tabungan->suku_bunga }}</td>
                        </tr>
                        <tr>
                            <td>Hubungan Dengan Debitur</td>
                            <td>:</td>
                            <td>{{ $depo->sc_tabungan->hubungan_dgn_debitur }}</td>
                        </tr>
                    </table>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-12">
                    <table class="table table-sm w-100">
                        <tr>
                            <td style="width: 20%">Keterangan Lainnya</td>
                            <td style="width: 1%">:</td>
                            <td>{{ $depo->sc_tabungan->keterangan_lainnya }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- II --}}
    <div class="card mb-2">
        <div class="card-header bg-success text-white head-judul" style="text-align: center">II. PERHITUNGAN NILAI PASAR
            SETELAH SAFETY MARGIN</div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-sm w-100">
                        <tr>
                            <td style="width: 20%">Tujuan Penilaian</td>
                            <td style="width: 1%">:</td>
                            <td>{{ $depo->sc_tabungan->tujuan_penilaian }}</td>
                        </tr>
                        <tr>
                            <td>Nilai Pasar Agunan</td>
                            <td>:</td>
                            <td>{{ 'Rp' . number_format($depo->sc_tabungan->nilai_pasar, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <td>Safety Margin</td>
                            <td>:</td>
                            <td>{{ $depo->sc_tabungan->safety_margin }} % <b>Score:</b>
                                {{ $depo->sc_tabungan->score }}</td>
                        </tr>
                        <tr>
                            <td>Nilai Pasar setelah SM</td>
                            <td>:</td>
                            <td>{{ 'Rp' . number_format($depo->sc_tabungan->nilai_pasar_setelah_sm, 0, ',', '.') }}
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- III --}}
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
                            <td style="width: 1%">:</td>
                            <td>{{ $depo->sc_tabungan->market }}</td>
                        </tr>
                        <tr>
                            <td>Pengikatan Agunan</td>
                            <td>:</td>
                            <td>{{ $depo->sc_tabungan->jns_pengikatan }}</td>
                        </tr>
                        <tr>
                            <td>Lain-lain</td>
                            <td>:</td>
                            <td>{!! $depo->sc_tabungan->lainnya !!}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <table class="table table-sm w-100">
                        <tr>
                            <td style="width: 30%">Permasalahan</td>
                            <td style="width: 1%">:</td>
                            <td>{{ $depo->sc_tabungan->permasalahan }}</td>
                        </tr>
                        <tr>
                            <td>Penguasaan</td>
                            <td>:</td>
                            <td>{{ $depo->sc_tabungan->penguasaan }}</td>
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
