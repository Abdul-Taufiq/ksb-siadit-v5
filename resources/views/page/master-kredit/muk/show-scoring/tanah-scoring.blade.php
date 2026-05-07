<div class="container" style="border: 1px solid black">
    <p class="text-end m-2" style="font-style: italic; font-weight: bold; font-size: 10px">
        @if ($tanah->detail_kategori_jaminan == 'Tanah')
            KREDIT/02/PAT/Vr.3.2025
        @elseif ($tanah->detail_kategori_jaminan == 'Tanah & Bangunan')
            KREDIT/03/PATB/Vr.3.2025
        @else
            KREDIT/04/PARUKO/Vr.3.2025
        @endif
    </p>
    <div class="card mb-2">
        <div class="card-header bg-primary text-white head-judul" style="text-align: center">PENILAIAN AGUNAN</div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-7">
                    <table class="table table-sm w-100">
                        <tr>
                            <td style="width: 30%">Nama Debitur</td>
                            <td style="width: 2%">:</td>
                            <td>{{ data_get($tanah, "$SCAgunan.nama_deb") }}</td>
                        </tr>
                        <tr>
                            <td>Lokasi Agunan</td>
                            <td>:</td>
                            <td>{{ data_get($tanah, "$SCAgunan.lokasi") }}</td>
                        </tr>
                        <tr>
                            <td>Batas</td>
                            <td>:</td>
                            <td>
                                <strong>Utara:</strong> {{ data_get($tanah, "$SCAgunan.batas_utara") }} <br>
                                <strong>Selatan:</strong> {{ data_get($tanah, "$SCAgunan.batas_selatan") }} <br>
                                <strong>Timur:</strong> {{ data_get($tanah, "$SCAgunan.batas_timur") }} <br>
                                <strong>Barat:</strong> {{ data_get($tanah, "$SCAgunan.batas_barat") }}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 30%">Hak Kepemilikan/Nomor</td>
                            <td style="width: 2%">:</td>
                            <td>
                                {{ data_get($tanah, "$SCAgunan.hak_kepemilikan") }} /
                                {{ data_get($tanah, "$SCAgunan.nomor") }}
                            </td>
                        </tr>
                        <tr>
                            <td>Atas Nama</td>
                            <td>:</td>
                            <td>
                                {{ data_get($tanah, "$SCAgunan.atas_nama") }}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 30%">Tgl Berakhir Sertifikat</td>
                            <td style="width: 2%">:</td>
                            <td>
                                {{ optional(data_get($tanah, "$SCAgunan.tgl_berakhir_sertif"))->translatedFormat('d F Y') ?? '-' }}
                                <span style="font-size: 10px">(untuk selain SHM)</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Edisi</td>
                            <td>:</td>
                            <td>
                                {{ data_get($tanah, "$SCAgunan.edisi") }}
                            </td>
                        </tr>
                        <tr>
                            <td>No.GS</td>
                            <td>:</td>
                            <td>
                                {{ data_get($tanah, "$SCAgunan.no_gs") }}
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-5">
                    <table class="table table-sm w-100">
                        <tr>
                            <td style="width: 30%">Tgl Penilaian</td>
                            <td style="width: 2%">:</td>
                            <td>{{ optional(data_get($tanah, "$SCAgunan.tgl_penilaian"))->translatedFormat('d F Y') ?? '-' }}
                            </td>
                        </tr>
                        <tr>
                            <td>Penilai</td>
                            <td>:</td>
                            <td>{{ data_get($tanah, "$SCAgunan.penilai") }}</td>
                        </tr>
                        <tr>
                            <td>Luas Tanah</td>
                            <td>:</td>
                            <td>{{ data_get($tanah, "$SCAgunan.luas_tanah") }} M²</td>
                        </tr>
                    </table>
                </div>
                <div class="clearfix"></div> <!-- manual clearfix -->
                <div class="col-md-12">
                    @if ($tanah->detail_kategori_jaminan == 'Tanah & Bangunan' || $tanah->detail_kategori_jaminan == 'Ruko & Rukan')
                        {{-- <div class="col-md-12"> --}}
                        <table class="table table-sm w-100">
                            <tr>
                                <td style="width: 18%">Luas Bangunan (IMB/PBB)</td>
                                <td style="width: 2%">:</td>
                                <td>{{ data_get($tanah, "$SCAgunan.luas_bangunan") }} M²</td>
                                <td style="width: 18%">Luas Bangunan Fisik</td>
                                <td style="width: 2%">:</td>
                                <td>{{ data_get($tanah, "$SCAgunan.luas_bangunan_fisik") }} M²</td>
                                <td style="width: 18%">Beda Luas Bangunan</td>
                                <td style="width: 2%">:</td>
                                <td>{{ data_get($tanah, "$SCAgunan.beda_luas_bangunan") }} M²</td>
                            </tr>
                            <tr>
                                <td>Tahun Pembangunan</td>
                                <td style="width: 2%">:</td>
                                <td>{{ data_get($tanah, "$SCAgunan.thn_pembangunan") }}</td>
                                <td>Thn Renovasi Terakhir</td>
                                <td style="width: 2%">:</td>
                                <td>{{ data_get($tanah, "$SCAgunan.thn_renov_akhir") }}</td>
                                <td>Umur Efektif</td>
                                <td style="width: 2%">:</td>
                                <td>{{ data_get($tanah, "$SCAgunan.umur_efektif") }} Tahun</td>
                            </tr>
                            @if ($tanah->detail_kategori_jaminan == 'Tanah & Bangunan')
                                <tr>
                                    <td>Penggunaan Bangunan</td>
                                    <td>:</td>
                                    <td colspan="8">{{ data_get($tanah, "$SCAgunan.penggunaan_bangunan") }}</td>
                                </tr>
                            @endif
                            <tr>
                                <td>Kamar Tidur/Jumlahnya</td>
                                <td>:</td>
                                <td>
                                    {{ data_get($tanah, "$SCAgunan.kamar_tidur") }}/
                                    {{ data_get($tanah, "$SCAgunan.jumlah_kt") }}
                                </td>
                                <td>Kamar Mandi/Jumlahnya</td>
                                <td>:</td>
                                <td>
                                    {{ data_get($tanah, "$SCAgunan.kamar_mandi") }}/
                                    {{ data_get($tanah, "$SCAgunan.jumlah_km") }}
                                </td>
                                <td>Jumlah Lantai</td>
                                <td>:</td>
                                <td>
                                    {{ data_get($tanah, "$SCAgunan.jumlah_lantai") }}
                                </td>
                            </tr>
                            <tr>
                                <td>Jaringan Listrik</td>
                                <td>:</td>
                                <td>
                                    {{ data_get($tanah, "$SCAgunan.jaringan_listrik") }}
                                </td>
                                <td>Jaringan Air Bersih</td>
                                <td>:</td>
                                <td>
                                    {{ data_get($tanah, "$SCAgunan.jaringan_air_bersih") }}
                                </td>
                                <td>Jaringan Telepon</td>
                                <td>:</td>
                                <td>
                                    {{ data_get($tanah, "$SCAgunan.jaringan_telepon") }}
                                </td>
                            </tr>
                        </table>
                        {{-- </div> --}}
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- Scoring --}}
    <div class="card mb-2">
        <div class="card-header bg-primary text-white head-judul" style="text-align: center">I. SCORING</div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <strong class="mb-1">Tanah</strong>
                    <table class="table table-sm w-100">
                        <tr>
                            <td style="width: 30%">Tempat Ibadah</td>
                            <td style="width: 2%">:</td>
                            <td>
                                {{ data_get($tanah, "$SCScoring.tempat_ibadah") == '1' ? '> 1 Km' : (data_get($tanah, "$SCScoring.tempat_ibadah") == '2' ? '500 m - 1 Km' : '6 - 500 m') }}
                            </td>
                            <td style="width: 10%; background-color: rgb(214, 214, 214); text-align: center">
                                {{ data_get($tanah, "$SCScoring.tempat_ibadah") }}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 30%">Pasar</td>
                            <td style="width: 2%">:</td>
                            <td>
                                {{ data_get($tanah, "$SCScoring.pasar") == '1' ? '< 500 m' : (data_get($tanah, "$SCScoring.pasar") == '2' ? '500 m - 1 Km' : '> 1 Km') }}
                            </td>
                            <td style="width: 5%; background-color: rgb(214, 214, 214); text-align: center">
                                {{ data_get($tanah, "$SCScoring.pasar") }}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 30%">Sekolah</td>
                            <td style="width: 2%">:</td>
                            <td>
                                {{ data_get($tanah, "$SCScoring.sekolah") == '1' ? '< 500 m' : (data_get($tanah, "$SCScoring.sekolah") == '2' ? '500 m - 1 Km' : '> 1 Km') }}
                            </td>
                            <td style="width: 5%; background-color: rgb(214, 214, 214); text-align: center">
                                {{ data_get($tanah, "$SCScoring.sekolah") }}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 30%">Perkantoran</td>
                            <td style="width: 2%">:</td>
                            <td>
                                {{ data_get($tanah, "$SCScoring.perkantoran") == '1' ? '< 500 m' : (data_get($tanah, "$SCScoring.perkantoran") == '2' ? '500 m - 1 Km' : '> 1 Km') }}
                            </td>
                            <td style="background-color: rgb(214, 214, 214); text-align: center">
                                {{ data_get($tanah, "$SCScoring.perkantoran") }}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 30%">SUTET/SUTT/BTS</td>
                            <td style="width: 2%">:</td>
                            <td>
                                {{ data_get($tanah, "$SCScoring.sutet") == '1' ? '> 1 Km' : (data_get($tanah, "$SCScoring.sutet") == '2' ? '> 500 m - 1 Km' : '500 m') }}
                            </td>
                            <td style="background-color: rgb(214, 214, 214); text-align: center">
                                {{ data_get($tanah, "$SCScoring.sutet") }}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 30%">Lokalisasi</td>
                            <td style="width: 2%">:</td>
                            <td>
                                {{ data_get($tanah, "$SCScoring.lokalisasi") == '1' ? '> 2 Km' : (data_get($tanah, "$SCScoring.lokalisasi") == '2' ? '> 1 Km - 2 Km' : '1 Km') }}
                            </td>
                            <td style="background-color: rgb(214, 214, 214); text-align: center">
                                {{ data_get($tanah, "$SCScoring.lokalisasi") }}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 30%">TPS</td>
                            <td style="width: 2%">:</td>
                            <td>
                                {{ data_get($tanah, "$SCScoring.tps") == '1' ? '> 2 Km' : (data_get($tanah, "$SCScoring.tps") == '2' ? '> 1 Km - 2 Km' : '1 Km') }}
                            </td>
                            <td style="background-color: rgb(214, 214, 214); text-align: center">
                                {{ data_get($tanah, "$SCScoring.tps") }}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 30%">Pemakaman</td>
                            <td style="width: 2%">:</td>
                            <td>
                                {{ data_get($tanah, "$SCScoring.pemakaman") == '1' ? '> 1 Km' : (data_get($tanah, "$SCScoring.pemakaman") == '2' ? '> 500 m - 1 Km' : '6 m - 500 m') }}
                            </td>
                            <td style="background-color: rgb(214, 214, 214); text-align: center">
                                {{ data_get($tanah, "$SCScoring.pemakaman") }}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 30%">Resiko Longsor</td>
                            <td style="width: 2%">:</td>
                            <td>
                                {{ data_get($tanah, "$SCScoring.resiko_banjir") == '1' ? 'RENDAH' : 'TINGGI' }}
                            </td>
                            <td style="background-color: rgb(214, 214, 214); text-align: center">
                                {{ data_get($tanah, "$SCScoring.resiko_banjir") }}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 30%">Resiko Banjir</td>
                            <td style="width: 2%">:</td>
                            <td>
                                {{ data_get($tanah, "$SCScoring.resiko_banjir") == '1' ? 'RENDAH' : 'TINGGI' }}
                            </td>
                            <td style="background-color: rgb(214, 214, 214); text-align: center">
                                {{ data_get($tanah, "$SCScoring.resiko_banjir") }}
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <strong>&nbsp;</strong>
                    <table class="table table-sm w-100">
                        <tr>
                            <td style="width: 30%">Zonasi</td>
                            <td style="width: 2%">:</td>
                            <td>
                                {{ data_get($tanah, "$SCScoring.zonasi") == '1' ? '> Kota Besar' : (data_get($tanah, "$SCScoring.zonasi") == '2' ? 'Kota/Kabupaten' : 'Kecamatan') }}
                            </td>
                            <td style="width: 10%; background-color: rgb(214, 214, 214); text-align: center">
                                {{ data_get($tanah, "$SCScoring.zonasi") }}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 30%">Akses Jalan</td>
                            <td style="width: 2%">:</td>
                            <td>
                                {{ data_get($tanah, "$SCScoring.akses_jalan") == '1' ? '> 3 meter' : '3 meter' }}
                            </td>
                            <td style="background-color: rgb(214, 214, 214); text-align: center">
                                {{ data_get($tanah, "$SCScoring.akses_jalan") }}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 30%">Kondisi Jalan</td>
                            <td style="width: 2%">:</td>
                            <td>
                                {{ data_get($tanah, "$SCScoring.kondisi_jalan") == '1' ? 'BETON COR/ASPAL/PAVING' : 'TANAH' }}
                            </td>
                            <td style="background-color: rgb(214, 214, 214); text-align: center">
                                {{ data_get($tanah, "$SCScoring.kondisi_jalan") }}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 30%">Tusuk Sate</td>
                            <td style="width: 2%">:</td>
                            <td>
                                {{ data_get($tanah, "$SCScoring.tusuk_sate") == '1' ? 'TIDAK' : 'YA (BUKAN JALAN UTAMA)' }}
                            </td>
                            <td style="background-color: rgb(214, 214, 214); text-align: center">
                                {{ data_get($tanah, "$SCScoring.tusuk_sate") }}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 30%">Bentuk Tanah</td>
                            <td style="width: 2%">:</td>
                            <td>
                                {{ data_get($tanah, "$SCScoring.bentuk_tanah") == '1' ? 'PERSEGI PANJANG' : (data_get($tanah, "$SCScoring.bentuk_tanah") == '2' ? 'TRAPESIUM' : 'LAINNYA') }}
                            </td>
                            <td style="background-color: rgb(214, 214, 214); text-align: center">
                                {{ data_get($tanah, "$SCScoring.bentuk_tanah") }}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 30%">Lebar Muka</td>
                            <td style="width: 2%">:</td>
                            <td>
                                {{ data_get($tanah, "$SCScoring.lebar_muka") == '1' ? 'LEBAR DIBELAKANG' : (data_get($tanah, "$SCScoring.lebar_muka") == '2' ? 'SAMA LEBAR' : 'LEBAR DIDEPAN') }}
                            </td>
                            <td style="background-color: rgb(214, 214, 214); text-align: center">
                                {{ data_get($tanah, "$SCScoring.lebar_muka") }}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 30%">Kontur</td>
                            <td style="width: 2%">:</td>
                            <td>
                                {{ data_get($tanah, "$SCScoring.kontur") == '1' ? 'DATAR' : (data_get($tanah, "$SCScoring.kontur") == '2' ? 'LANDAI' : 'CURAM') }}
                            </td>
                            <td style="background-color: rgb(214, 214, 214); text-align: center">
                                {{ data_get($tanah, "$SCScoring.kontur") }}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 30%">Elevasi</td>
                            <td style="width: 2%">:</td>
                            <td>
                                {{ data_get($tanah, "$SCScoring.elevasi") == '1' ? 'LEBIH TINGGI' : (data_get($tanah, "$SCScoring.elevasi") == '2' ? 'SEJAJAR JALAN' : 'LEBIH RENDAH') }}
                            </td>
                            <td style="background-color: rgb(214, 214, 214); text-align: center">
                                {{ data_get($tanah, "$SCScoring.elevasi") }}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 30%">Rel Kereta Api</td>
                            <td style="width: 2%">:</td>
                            <td>
                                {{ data_get($tanah, "$SCScoring.rel_kereta") == '1' ? 'TIDAK' : 'YA' }}
                            </td>
                            <td style="background-color: rgb(214, 214, 214); text-align: center">
                                {{ data_get($tanah, "$SCScoring.rel_kereta") }}
                            </td>
                        </tr>
                        <tr>
                            <td><strong style="font-size: 8pt;">TOTAL SCORE</strong></td>
                            <td style="width: 2%">:</td>
                            <td></td>
                            <td style="background-color: rgb(214, 214, 214); text-align: center">
                                <strong style="font-size: 8pt">
                                    {{ data_get($tanah, "$SCScoring.total_score_tanah") }}
                                </strong>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            {{-- selain tanah --}}
            @if ($tanah->detail_kategori_jaminan == 'Tanah & Bangunan' || $tanah->detail_kategori_jaminan == 'Ruko & Rukan')
                <div class="row">
                    {{-- <div class="clearfix" style="page-break-inside: avoid"></div> <!-- manual clearfix --> --}}
                    <div class="col-md-6">
                        <strong class="mb-1">Bangunan</strong>
                        <table class="table table-sm w-100 m-0">
                            <tr>
                                <td style="width: 30%">Pondasi</td>
                                <td style="width: 2%">:</td>
                                <td>
                                    {{ data_get($tanah, "$SCScoring.pondasi") == '1' ? 'BERPONDASI' : 'TIDAK ADA' }}
                                </td>
                                <td style="width: 10%; background-color: rgb(214, 214, 214); text-align: center">
                                    {{ data_get($tanah, "$SCScoring.pondasi") }}
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 30%">Rangka Atap</td>
                                <td style="width: 2%">:</td>
                                <td>
                                    {{ data_get($tanah, "$SCScoring.rangka_atap") == '1' ? 'BESI U/C' : (data_get($tanah, "$SCScoring.rangka_atap") == '2' ? 'BAJA RINGAN' : 'KAYU') }}
                                </td>
                                <td style="background-color: rgb(214, 214, 214); text-align: center">
                                    {{ data_get($tanah, "$SCScoring.rangka_atap") }}
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 30%">Plafon</td>
                                <td style="width: 2%">:</td>
                                <td>
                                    {{ data_get($tanah, "$SCScoring.plafon") == '1'
                                        ? 'PVC'
                                        : (data_get($tanah, "$SCScoring.plafon") == '2'
                                            ? 'GYPSUM'
                                            : (data_get($tanah, "$SCScoring.plafon") == '3'
                                                ? 'TRIPLEK/ETERNIT/KALSIBOARD'
                                                : 'TIDAK ADA')) }}
                                </td>
                                <td style="background-color: rgb(214, 214, 214); text-align: center">
                                    {{ data_get($tanah, "$SCScoring.plafon") }}
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <strong class="mb-1">&nbsp;</strong>
                        <table class="table table-sm w-100 m-0">
                            <tr>
                                <td style="width: 30%">Struktur</td>
                                <td style="width: 2%">:</td>
                                <td>
                                    {{ data_get($tanah, "$SCScoring.struktur") == '1' ? 'BETON BERTULANG' : 'KAYU' }}
                                </td>
                                <td style="width: 10%; background-color: rgb(214, 214, 214); text-align: center">
                                    {{ data_get($tanah, "$SCScoring.struktur") }}
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 30%">Penutup Atap</td>
                                <td style="width: 2%">:</td>
                                <td>
                                    {{ data_get($tanah, "$SCScoring.penutup_atap") == '1' ? 'GENTENG' : (data_get($tanah, "$SCScoring.penutup_atap") == '2' ? 'GENTENG BETON/PVC' : (data_get($tanah, "$SCScoring.penutup_atap") == '3' ? 'GENTENG TANAH LIAT/GALVALUM' : 'ESBES')) }}
                                </td>
                                <td style="background-color: rgb(214, 214, 214); text-align: center">
                                    {{ data_get($tanah, "$SCScoring.penutup_atap") }}
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 30%">Dinding</td>
                                <td style="width: 2%">:</td>
                                <td>
                                    {{ data_get($tanah, "$SCScoring.dinding") == '1'
                                        ? 'BATA MERAH'
                                        : (data_get($tanah, "$SCScoring.dinding") == '2'
                                            ? 'BATAKO'
                                            : (data_get($tanah, "$SCScoring.dinding") == '3'
                                                ? 'GYPSUM/TRIPLEK'
                                                : 'TIDAK ADA')) }}
                                </td>
                                <td style="background-color: rgb(214, 214, 214); text-align: center">
                                    {{ data_get($tanah, "$SCScoring.dinding") }}
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-sm w-100 m-0">
                            <tr>
                                <td style="width: 30%">Pintu</td>
                                <td style="width: 2%">:</td>
                                <td>
                                    {{ data_get($tanah, "$SCScoring.pintu") == '1'
                                        ? 'BAJA'
                                        : (data_get($tanah, "$SCScoring.pintu") == '2'
                                            ? 'KAYU JATI'
                                            : (data_get($tanah, "$SCScoring.pintu") == '3'
                                                ? 'KAYU NON JATI'
                                                : 'PANEL')) }}
                                </td>
                                <td style="background-color: rgb(214, 214, 214); text-align: center">
                                    {{ data_get($tanah, "$SCScoring.pintu") }}
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 30%">IMB</td>
                                <td style="width: 2%">:</td>
                                <td>
                                    {{ data_get($tanah, "$SCScoring.pintu") == '1' ? 'ADA' : 'TIDAK ADA' }}
                                </td>
                                <td style="width: 10%; background-color: rgb(214, 214, 214); text-align: center">
                                    {{ data_get($tanah, "$SCScoring.pintu") }}
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="table table-sm w-100 m-0">
                            <tr>
                                <td style="width: 30%">Lantai</td>
                                <td style="width: 2%">:</td>
                                <td>
                                    {{ data_get($tanah, "$SCScoring.lantai") == '1'
                                        ? 'GRANIT'
                                        : (data_get($tanah, "$SCScoring.lantai") == '2'
                                            ? 'VYNIL'
                                            : (data_get($tanah, "$SCScoring.lantai") == '3'
                                                ? 'KERAMIK/TRASPO'
                                                : 'PLESTER')) }}
                                </td>
                                <td style="width: 10%; background-color: rgb(214, 214, 214); text-align: center">
                                    {{ data_get($tanah, "$SCScoring.lantai") }}
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 30%"><strong>TOTAL SCORE</strong></td>
                                <td style="width: 2%">:</td>
                                <td></td>
                                <td style="background-color: rgb(214, 214, 214); text-align: center">
                                    <strong>
                                        {{ data_get($tanah, "$SCScoring.total_skor_bangunan") }}
                                    </strong>
                                </td>
                            </tr>
                        </table>
                    </div>

                    @if ($tanah->detail_kategori_jaminan == 'Ruko & Rukan')
                        <div class="clearfix"></div> <!-- manual clearfix -->
                        <div class="col-md-12">
                            <center>
                                <strong>TOTAL SCORE: {{ data_get($tanah, "$SCScoring.total_skor_rukan") }}</strong>
                            </center>
                        </div>
                    @endif
                </div>
            @endif
        </div>

    </div>

    {{-- Perhitungan Nilai Agunan --}}
    <div class="card mb-2">
        <div class="card-header bg-primary text-white head-judul" style="text-align: center">
            II. PERHITUNGAN NILAI AGUNAN
        </div>
        <div class="card-body">
            <strong>Checking Agunan</strong>
            <br>

            @foreach (data_get($tanah, $SCPerhitungan) as $index => $tanahP)
                @if ($index % 2 == 0)
                    <div class="row">
                @endif
                <div class="col-md-6 mb-2">
                    <table class="table table-sm w-100">
                        <tr>
                            <td style="width: 30%">Nama</td>
                            <td style="width: 2%">:</td>
                            <td>{{ $tanahP->nama }}</td>
                        </tr>
                        <tr>
                            <td style="width: 30%">Hubungan</td>
                            <td style="width: 2%">:</td>
                            <td>{{ $tanahP->hubungan }}</td>
                        </tr>
                        <tr>
                            <td style="width: 30%">No. Telp</td>
                            <td style="width: 2%">:</td>
                            <td>{{ $tanahP->no_telp }}</td>
                        </tr>
                        <tr>
                            <td style="width: 30%">Alamat</td>
                            <td style="width: 2%">:</td>
                            <td>{!! $tanahP->alamat !!}</td>
                        </tr>
                        <tr>
                            <td style="width: 30%">Harga
                                {{ $tanah->detail_kategori_jaminan == 'Tanah & Bnagunan' ? 'Tanah' : '' }} per
                                Meter</td>
                            <td style="width: 2%">:</td>
                            <td>{{ 'Rp' . number_format($tanahP->harga_per_meter, 0, ',', '.') }}</td>
                        </tr>
                        @if ($tanah->detail_kategori_jaminan == 'Tanah & Bangunan')
                            <tr>
                                <td style="width: 30%">Harga Bangunan per Meter</td>
                                <td style="width: 2%">:</td>
                                <td>{{ 'Rp' . number_format($tanahP->harga_bangunan, 0, ',', '.') }}</td>
                            </tr>
                        @endif
                        <tr>
                            <td>Keterangan</td>
                            <td>:</td>
                            <td>{!! $tanahP->keterangan !!}</td>
                        </tr>
                    </table>
                </div>

                @if ($index % 2 == 1 || $loop->last)
        </div>
        @endif
        @endforeach

        <div class="row">
            <div class="col-md-12">
                <table class="table table-sm w-100">
                    <tr>
                        <td style="width: 20%">Nilai NJOP</td>
                        <td style="width: 2%">:</td>
                        <td style="width: 29%">
                            @if (!empty(data_get($tanah, $SCRekap1)))
                                {{ 'Rp' . number_format(data_get($tanah, "$SCRekap1.nilai_njop"), 0, ',', '.') }}
                            @else
                                {{ 'Rp' . number_format(data_get($tanah, "$SCRekap2.nilai_njop"), 0, ',', '.') }}
                            @endif
                        </td>
                        <td style="width: 20%">Berdasarkan PBB Tahun</td>
                        <td style="width: 2%">:</td>
                        <td style="width: 29%">
                            @if (!empty(data_get($tanah, $SCRekap1)))
                                {{ data_get($tanah, "$SCRekap1.pbb_tahun") }}
                            @else
                                {{ data_get($tanah, "$SCRekap2.pbb_tahun") }}
                            @endif
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        @if ($tanah->detail_kategori_jaminan == 'Tanah' || $tanah->detail_kategori_jaminan == 'Ruko & Rukan')
            <div class="row">
                <div class="col-md-12">
                    <strong>Rekapitulasi Hasil Checking Agunan</strong>
                    <table class="table table-sm w-100">
                        <tr>
                            <td style="width: 10%">Data I</td>
                            <td style="width: 2%">:</td>
                            <td style="width: 20%">
                                {{ 'Rp' . number_format(data_get($tanah, "$SCRekap1.data_1"), 0, ',', '.') }} / M²
                            </td>
                            <td style="width: 10%">Luas Tanah</td>
                            <td style="width: 2%">:</td>
                            <td style="width: 10%">
                                {{ data_get($tanah, "$SCRekap1.data_luas_1") }}
                            </td>
                            <td style="width: 1%">=</td>
                            <td style="width: 1%"></td>
                            <td>
                                {{ 'Rp' . number_format(data_get($tanah, "$SCRekap1.data_total_1"), 0, ',', '.') }}
                            </td>
                        </tr>
                        <tr>
                            <td>Data II</td>
                            <td>:</td>
                            <td>
                                {{ 'Rp' . number_format(data_get($tanah, "$SCRekap1.data_2"), 0, ',', '.') }} / M²
                            </td>
                            <td>Luas Tanah</td>
                            <td>:</td>
                            <td>
                                {{ data_get($tanah, "$SCRekap1.data_luas_2") }}
                            </td>
                            <td>=</td>
                            <td></td>
                            <td>
                                {{ 'Rp' . number_format(data_get($tanah, "$SCRekap1.data_total_2"), 0, ',', '.') }}
                            </td>
                        </tr>
                        <tr>
                            <td>Data III</td>
                            <td>:</td>
                            <td>
                                {{ 'Rp' . number_format(data_get($tanah, "$SCRekap1.data_3"), 0, ',', '.') }} / M²
                            </td>
                            <td>Luas Tanah</td>
                            <td>:</td>
                            <td>
                                {{ data_get($tanah, "$SCRekap1.data_luas_3") }}
                            </td>
                            <td>=</td>
                            <td></td>
                            <td>
                                {{ 'Rp' . number_format(data_get($tanah, "$SCRekap1.data_total_3"), 0, ',', '.') }}
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <strong>Nilai Yang Direkomendasikan</strong>
                    <table class="table table-sm w-100">
                        <tr>
                            <td style="width: 20%">Nilai Pasar/m²</td>
                            <td style="width: 2%">:</td>
                            <td>{{ 'Rp' . number_format(data_get($tanah, "$SCRekap1.nilai_pasar")) }}</td>
                            <td>
                                <strong>Safety Margin: </strong>
                                {{ data_get($tanah, "$SCRekap1.safety_margin") }} %
                            </td>
                        </tr>
                        <tr>
                            <td>Nilai Pasar Agunan</td>
                            <td>:</td>
                            <td colspan="2">
                                {{ 'Rp' . number_format(data_get($tanah, "$SCRekap1.nilai_agunan"), 0, ',', '.') }}
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        @else
            <div class="row">
                <div class="col-md-12">
                    <strong>Rekapitulasi Hasil Checking Agunan</strong>
                    <table class="table table-sm w-100">
                        <tr>
                            <td colspan="8">Data I</td>
                        </tr>
                        <tr>
                            <td style="padding-left: 15px; width: 10%">Tanah</td>
                            <td style="width: 2%">:</td>
                            <td style="width: 15%">
                                {{ 'Rp' . number_format(data_get($tanah, "$SCRekap2.tanah_1"), 0, ',', '.') }} / M²
                            </td>
                            <td style="width: 15%">Luas Tanah</td>
                            <td style="width: 2%">:</td>
                            <td style="width: 10%">{{ data_get($tanah, "$SCRekap2.tanah_luas_1") }}</td>
                            <td style="width: 1%">=</td>
                            <td>
                                {{ 'Rp' . number_format(data_get($tanah, "$SCRekap2.tanah_total_1"), 0, ',', '.') }}
                            </td>
                        </tr>
                        <tr>
                            <td style="padding-left: 15px">Bangunan</td>
                            <td>:</td>
                            <td>
                                {{ 'Rp' . number_format(data_get($tanah, "$SCRekap2.bangunan_1"), 0, ',', '.') }} / M²
                            </td>
                            <td>Luas Bangunan</td>
                            <td>:</td>
                            <td>{{ data_get($tanah, "$SCRekap2.bangunan_luas_1") }}</td>
                            <td>=</td>
                            <td>
                                {{ 'Rp' . number_format(data_get($tanah, "$SCRekap2.bangunan_total_1"), 0, ',', '.') }}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="8">Data II</td>
                        </tr>
                        <tr>
                            <td style="padding-left: 15px; width: 10%">Tanah</td>
                            <td style="width: 2%">:</td>
                            <td style="width: 15%">
                                {{ 'Rp' . number_format(data_get($tanah, "$SCRekap2.tanah_2"), 0, ',', '.') }} / M²
                            </td>
                            <td style="width: 10%">Luas Tanah</td>
                            <td style="width: 2%">:</td>
                            <td style="width: 10%">{{ data_get($tanah, "$SCRekap2.tanah_luas_2") }}</td>
                            <td style="width: 1%">=</td>
                            <td>
                                {{ 'Rp' . number_format(data_get($tanah, "$SCRekap2.tanah_total_2"), 0, ',', '.') }}
                            </td>
                        </tr>
                        <tr>
                            <td style="padding-left: 15px">Bangunan</td>
                            <td>:</td>
                            <td>
                                {{ 'Rp' . number_format(data_get($tanah, "$SCRekap2.bangunan_2"), 0, ',', '.') }} / M²
                            </td>
                            <td>Luas Bangunan</td>
                            <td>:</td>
                            <td>{{ data_get($tanah, "$SCRekap2.bangunan_luas_2") }}</td>
                            <td>=</td>
                            <td>
                                {{ 'Rp' . number_format(data_get($tanah, "$SCRekap2.bangunan_total_2"), 0, ',', '.') }}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="8">Data III</td>
                        </tr>
                        <tr>
                            <td style="padding-left: 15px; width: 10%">Tanah</td>
                            <td style="width: 2%">:</td>
                            <td style="width: 15%">
                                {{ 'Rp' . number_format(data_get($tanah, "$SCRekap2.tanah_3"), 0, ',', '.') }} / M²
                            </td>
                            <td style="width: 10%">Luas Tanah</td>
                            <td style="width: 2%">:</td>
                            <td style="width: 10%">{{ data_get($tanah, "$SCRekap2.tanah_luas_3") }}</td>
                            <td style="width: 1%">=</td>
                            <td>
                                {{ 'Rp' . number_format(data_get($tanah, "$SCRekap2.tanah_total_3"), 0, ',', '.') }}
                            </td>
                        </tr>
                        <tr>
                            <td style="padding-left: 15px">Bangunan</td>
                            <td>:</td>
                            <td>
                                {{ 'Rp' . number_format(data_get($tanah, "$SCRekap2.bangunan_3"), 0, ',', '.') }} / M²
                            </td>
                            <td>Luas Bangunan</td>
                            <td>:</td>
                            <td>{{ data_get($tanah, "$SCRekap2.bangunan_luas_3") }}</td>
                            <td>=</td>
                            <td>
                                {{ 'Rp' . number_format(data_get($tanah, "$SCRekap2.bangunan_total_3"), 0, ',', '.') }}
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <strong>Nilai Yang Direkomendasikan</strong>
                    <table class="table table-sm w-100">
                        <tr>
                            <td>Nilai Pasar/M²</td>
                            <td colspan="2">
                                <strong>Safety Margin Tanah : </strong>
                                {{ data_get($tanah, "$SCRekap2.margin_tanah") }} %
                            </td>
                        </tr>
                        <tr>
                            <td style="padding-left: 15px; width: 15%">Tanah</td>
                            <td style="width: 2%">:</td>
                            <td>
                                {{ 'Rp' . number_format(data_get($tanah, "$SCRekap2.rekom_pasar_tanah"), 0, ',', '.') }}
                            </td>
                        </tr>
                        <tr>
                            <td style="padding-left: 15px">Bangunan</td>
                            <td>:</td>
                            <td>
                                {{ 'Rp' . number_format(data_get($tanah, "$SCRekap2.rekom_pasar_bangunan"), 0, ',', '.') }}
                            </td>
                        </tr>
                        <tr>
                            <td>Nilai Pasar Agunan</td>
                            <td colspan="2">
                                <strong>Safety Margin Bangunan : </strong>
                                {{ data_get($tanah, "$SCRekap2.margin_bangunan") }} %
                            </td>
                        </tr>
                        <tr>
                            <td style="padding-left: 15px; width: 15%">Tanah</td>
                            <td style="width: 2%">:</td>
                            <td>
                                {{ 'Rp' . number_format(data_get($tanah, "$SCRekap2.rekom_agunan_tanah"), 0, ',', '.') }}
                            </td>
                        </tr>
                        <tr>
                            <td style="padding-left: 15px">Bangunan</td>
                            <td>:</td>
                            <td>
                                {{ 'Rp' . number_format(data_get($tanah, "$SCRekap2.rekom_agunan_bangunan"), 0, ',', '.') }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Total</strong>
                            </td>
                            <td>:</td>
                            <td>
                                {{ 'Rp' . number_format(data_get($tanah, "$SCRekap2.rekom_total"), 0, ',', '.') }}
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        @endif
    </div>
</div>


{{-- Kesimpulan --}}
<div class="card mb-2">
    <div class="card-header bg-primary text-white head-judul" style="text-align: center">
        III. KESIMPULAN
    </div>
    <div class="card-body">
        @if ($tanah->detail_kategori_jaminan == 'Tanah' || $tanah->detail_kategori_jaminan == 'Ruko & Rukan')
            <table class="table table-sm w-100">
                <tr>
                    <td style="width: 20%">
                        Nilai Pasar Agunan
                    </td>
                    <td style="width: 2%">:</td>
                    <td>
                        {{ 'Rp' . number_format(data_get($tanah, "$SCRekap1.kes_nilai_pasar"), 0, ',', '.') }}
                    </td>
                </tr>
                <tr>
                    <td>
                        Taksasi (%)
                    </td>
                    <td style="width: 2%">:</td>
                    <td>
                        {{ data_get($tanah, "$SCRekap1.kes_nilai_taksasi_persen") }} %
                    </td>
                </tr>
                <tr>
                    <td>
                        Nilai Taksasi Agunan
                    </td>
                    <td style="width: 2%">:</td>
                    <td>
                        {{ 'Rp' . number_format(data_get($tanah, "$SCRekap1.kes_nilai_taksasi"), 0, ',', '.') }}
                    </td>
                </tr>
            </table>

            <table class="table table-sm w-100">
                <tr>
                    <td style="width: 20%">Kesimpulan</td>
                    <td style="width: 2%">:</td>
                    <td>
                        {!! data_get($tanah, "$SCRekap1.kesimpulan") !!}
                    </td>
                </tr>
                <tr>
                    <td>Rekomendasi Penilai</td>
                    <td>:</td>
                    <td>
                        {!! data_get($tanah, "$SCRekap1.rekomendasi_penilai") !!}
                    </td>
                </tr>
            </table>
        @else
            <table class="table table-sm w-100">
                <tr>
                    <td style="width: 15%">
                        Nilai Pasar Agunan
                    </td>
                    <td style="width: 2%">:</td>
                    <td style="width: 15%">
                        {{ 'Rp' . number_format(data_get($tanah, "$SCRekap2.kes_tanah_nilai_pasar"), 0, ',', '.') }}
                    </td>
                    <td>+</td>
                    <td>
                        {{ 'Rp' . number_format(data_get($tanah, "$SCRekap2.kes_bangunan_nilai_pasar"), 0, ',', '.') }}
                    </td>
                    <td>=</td>
                    <td>
                        {{ 'Rp' . number_format(data_get($tanah, "$SCRekap2.kes_total_nilai_pasar"), 0, ',', '.') }}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td><strong>Nilai Pasar Tanah</strong></td>
                    <td></td>
                    <td><strong>Nilai Pasar Bangunan</strong></td>
                    <td></td>
                    <td><strong>Total</strong></td>
                </tr>
                <tr>
                    <td>Taksasi (%)</td>
                    <td>:</td>
                    <td>{{ data_get($tanah, "$SCRekap2.kes_taksasi_persen_1") }} %</td>
                    <td></td>
                    <td>{{ data_get($tanah, "$SCRekap2.kes_taksasi_persen_2") }} %</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Nilai Taksasi Agunan</td>
                    <td>:</td>
                    <td>
                        {{ 'Rp' . number_format(data_get($tanah, "$SCRekap2.kes_tanah_nilai_taksasi"), 0, ',', '.') }}
                    </td>
                    <td>+</td>
                    <td>
                        {{ 'Rp' . number_format(data_get($tanah, "$SCRekap2.kes_bangunan_nilai_taksasi"), 0, ',', '.') }}
                    </td>
                    <td>=</td>
                    <td>
                        {{ 'Rp' . number_format(data_get($tanah, "$SCRekap2.kes_total_nilai_taksasi"), 0, ',', '.') }}
                    </td>
                </tr>
            </table>

            <table class="table table-sm w-100">
                <tr>
                    <td style="width: 15%">Kesimpulan</td>
                    <td style="width: 2%">:</td>
                    <td>
                        {!! data_get($tanah, "$SCRekap2.kesimpulan") !!}
                    </td>
                </tr>
                <tr>
                    <td>Rekomendasi Penilai</td>
                    <td>:</td>
                    <td>
                        {!! data_get($tanah, "$SCRekap2.rekomendasi_penilai") !!}
                    </td>
                </tr>
            </table>
        @endif
    </div>
</div>

{{-- ttd --}}
<div class="card mb-2" id="ttd_putusan" style="page-break-inside: avoid">
    <div class="card-body">
        @include('page.master-kredit.muk.show-scoring.ttd-putusan')
    </div>
</div>
</div>
