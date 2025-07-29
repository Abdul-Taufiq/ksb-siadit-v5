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
        <div class="card-header bg-success text-white head-judul" style="text-align: center">PENILAIAN AGUNAN</div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-7">
                    <table class="table table-sm w-100">
                        <tr>
                            <td style="width: 30%">Nama Debitur</td>
                            <td style="width: 2%">:</td>
                            <td>{{ $tanah->sc_tanah_agunan->nama_deb }}</td>
                        </tr>
                        <tr>
                            <td>Lokasi Agunan</td>
                            <td>:</td>
                            <td>{{ $tanah->sc_tanah_agunan->lokasi }}</td>
                        </tr>
                        <tr>
                            <td>Batas</td>
                            <td>:</td>
                            <td>
                                <strong>Utara:</strong> {{ $tanah->sc_tanah_agunan->batas_utara }} <br>
                                <strong>Selatan:</strong> {{ $tanah->sc_tanah_agunan->batas_selatan }} <br>
                                <strong>Timur:</strong> {{ $tanah->sc_tanah_agunan->batas_timur }} <br>
                                <strong>Barat:</strong> {{ $tanah->sc_tanah_agunan->batas_barat }}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 30%">Hak Kepemilikan/Nomor</td>
                            <td style="width: 2%">:</td>
                            <td>
                                {{ $tanah->sc_tanah_agunan->hak_kepemilikan }} /
                                {{ $tanah->sc_tanah_agunan->nomor }}
                            </td>
                        </tr>
                        <tr>
                            <td>Atas Nama</td>
                            <td>:</td>
                            <td>
                                {{ $tanah->sc_tanah_agunan->atas_nama }}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 30%">Tgl Berakhir Sertifikat</td>
                            <td style="width: 2%">:</td>
                            <td>
                                {{ $tanah->sc_tanah_agunan->tgl_berakhir_sertif ? $tanah->sc_tanah_agunan->tgl_berakhir_sertif->translatedFormat('d F Y') : '-' }}
                                <span style="font-size: 10px">(untuk selain SHM)</span>
                            </td>
                        </tr>
                        <tr>
                            <td>No.GS</td>
                            <td>:</td>
                            <td>
                                {{ $tanah->sc_tanah_agunan->no_gs }}
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-5">
                    <table class="table table-sm w-100">
                        <tr>
                            <td style="width: 30%">Tgl Penilaian</td>
                            <td style="width: 2%">:</td>
                            <td>{{ $tanah->sc_tanah_agunan->tgl_penilaian->translatedFormat('d F Y') }}</td>
                        </tr>
                        <tr>
                            <td>Penilai</td>
                            <td>:</td>
                            <td>{{ $tanah->sc_tanah_agunan->penilai }}</td>
                        </tr>
                        <tr>
                            <td>Luas Tanah</td>
                            <td>:</td>
                            <td>{{ $tanah->sc_tanah_agunan->luas_tanah }} M²</td>
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
                                <td>{{ $tanah->sc_tanah_agunan->luas_bangunan }} M²</td>
                                <td style="width: 18%">Luas Bangunan Fisik</td>
                                <td style="width: 2%">:</td>
                                <td>{{ $tanah->sc_tanah_agunan->luas_bangunan_fisik }} M²</td>
                                <td style="width: 18%">Beda Luas Bangunan</td>
                                <td style="width: 2%">:</td>
                                <td>{{ $tanah->sc_tanah_agunan->beda_luas_bangunan }} M²</td>
                            </tr>
                            <tr>
                                <td>Tahun Pembangunan</td>
                                <td style="width: 2%">:</td>
                                <td>{{ $tanah->sc_tanah_agunan->thn_pembangunan }}</td>
                                <td>Thn Renovasi Terakhir</td>
                                <td style="width: 2%">:</td>
                                <td>{{ $tanah->sc_tanah_agunan->thn_renov_akhir }}</td>
                                <td>Umur Efektif</td>
                                <td style="width: 2%">:</td>
                                <td>{{ $tanah->sc_tanah_agunan->umur_efektif }} Tahun</td>
                            </tr>
                            @if ($tanah->detail_kategori_jaminan == 'Tanah & Bangunan')
                                <tr>
                                    <td>Penggunaan Bangunan</td>
                                    <td>:</td>
                                    <td colspan="8">{{ $tanah->sc_tanah_agunan->penggunaan_bangunan }}</td>
                                </tr>
                            @endif
                            <tr>
                                <td>Kamar Tidur/Jumlahnya</td>
                                <td>:</td>
                                <td>
                                    {{ $tanah->sc_tanah_agunan->kamar_tidur }}/
                                    {{ $tanah->sc_tanah_agunan->jumlah_kt }}
                                </td>
                                <td>Kamar Mandi/Jumlahnya</td>
                                <td>:</td>
                                <td>
                                    {{ $tanah->sc_tanah_agunan->kamar_mandi }}/
                                    {{ $tanah->sc_tanah_agunan->jumlah_km }}
                                </td>
                                <td>Jumlah Lantai</td>
                                <td>:</td>
                                <td>
                                    {{ $tanah->sc_tanah_agunan->jumlah_lantai }}
                                </td>
                            </tr>
                            <tr>
                                <td>Jaringan Listrik</td>
                                <td>:</td>
                                <td>
                                    {{ $tanah->sc_tanah_agunan->jaringan_listrik }}
                                </td>
                                <td>Jaringan Air Bersih</td>
                                <td>:</td>
                                <td>
                                    {{ $tanah->sc_tanah_agunan->jaringan_air_bersih }}
                                </td>
                                <td>Jaringan Telepon</td>
                                <td>:</td>
                                <td>
                                    {{ $tanah->sc_tanah_agunan->jaringan_telepon }}
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
        <div class="card-header bg-success text-white head-judul" style="text-align: center">I. SCORING</div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <strong class="mb-1">Tanah</strong>
                    <table class="table table-sm w-100">
                        <tr>
                            <td style="width: 30%">Tempat Ibadah</td>
                            <td style="width: 2%">:</td>
                            <td>
                                {{ $tanah->sc_tanah_scoring->tempat_ibadah == '1' ? '> 1 Km' : ($tanah->sc_tanah_scoring->tempat_ibadah == '2' ? '500 m - 1 Km' : '6 - 500 m') }}
                            </td>
                            <td style="width: 10%; background-color: rgb(214, 214, 214); text-align: center">
                                {{ $tanah->sc_tanah_scoring->tempat_ibadah }}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 30%">Pasar</td>
                            <td style="width: 2%">:</td>
                            <td>
                                {{ $tanah->sc_tanah_scoring->pasar == '1' ? '< 500 m' : ($tanah->sc_tanah_scoring->pasar == '2' ? '500 m - 1 Km' : '> 1 Km') }}
                            </td>
                            <td style="width: 5%; background-color: rgb(214, 214, 214); text-align: center">
                                {{ $tanah->sc_tanah_scoring->pasar }}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 30%">Sekolah</td>
                            <td style="width: 2%">:</td>
                            <td>
                                {{ $tanah->sc_tanah_scoring->sekolah == '1' ? '< 500 m' : ($tanah->sc_tanah_scoring->sekolah == '2' ? '500 m - 1 Km' : '> 1 Km') }}
                            </td>
                            <td style="width: 5%; background-color: rgb(214, 214, 214); text-align: center">
                                {{ $tanah->sc_tanah_scoring->sekolah }}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 30%">Perkantoran</td>
                            <td style="width: 2%">:</td>
                            <td>
                                {{ $tanah->sc_tanah_scoring->perkantoran == '1' ? '< 500 m' : ($tanah->sc_tanah_scoring->perkantoran == '2' ? '500 m - 1 Km' : '> 1 Km') }}
                            </td>
                            <td style="background-color: rgb(214, 214, 214); text-align: center">
                                {{ $tanah->sc_tanah_scoring->perkantoran }}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 30%">SUTET/SUTT/BTS</td>
                            <td style="width: 2%">:</td>
                            <td>
                                {{ $tanah->sc_tanah_scoring->sutet == '1' ? '> 1 Km' : ($tanah->sc_tanah_scoring->sutet == '2' ? '> 500 m - 1 Km' : '500 m') }}
                            </td>
                            <td style="background-color: rgb(214, 214, 214); text-align: center">
                                {{ $tanah->sc_tanah_scoring->sutet }}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 30%">Lokalisasi</td>
                            <td style="width: 2%">:</td>
                            <td>
                                {{ $tanah->sc_tanah_scoring->lokalisasi == '1' ? '> 2 Km' : ($tanah->sc_tanah_scoring->lokalisasi == '2' ? '> 1 Km - 2 Km' : '1 Km') }}
                            </td>
                            <td style="background-color: rgb(214, 214, 214); text-align: center">
                                {{ $tanah->sc_tanah_scoring->lokalisasi }}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 30%">TPS</td>
                            <td style="width: 2%">:</td>
                            <td>
                                {{ $tanah->sc_tanah_scoring->tps == '1' ? '> 2 Km' : ($tanah->sc_tanah_scoring->tps == '2' ? '> 1 Km - 2 Km' : '1 Km') }}
                            </td>
                            <td style="background-color: rgb(214, 214, 214); text-align: center">
                                {{ $tanah->sc_tanah_scoring->tps }}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 30%">Pemakaman</td>
                            <td style="width: 2%">:</td>
                            <td>
                                {{ $tanah->sc_tanah_scoring->pemakaman == '1' ? '> 1 Km' : ($tanah->sc_tanah_scoring->pemakaman == '2' ? '> 500 m - 1 Km' : '6 m - 500 m') }}
                            </td>
                            <td style="background-color: rgb(214, 214, 214); text-align: center">
                                {{ $tanah->sc_tanah_scoring->pemakaman }}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 30%">Resiko Longsor</td>
                            <td style="width: 2%">:</td>
                            <td>
                                {{ $tanah->sc_tanah_scoring->resiko_banjir == '1' ? 'RENDAH' : 'TINGGI' }}
                            </td>
                            <td style="background-color: rgb(214, 214, 214); text-align: center">
                                {{ $tanah->sc_tanah_scoring->resiko_banjir }}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 30%">Resiko Banjir</td>
                            <td style="width: 2%">:</td>
                            <td>
                                {{ $tanah->sc_tanah_scoring->resiko_banjir == '1' ? 'RENDAH' : 'TINGGI' }}
                            </td>
                            <td style="background-color: rgb(214, 214, 214); text-align: center">
                                {{ $tanah->sc_tanah_scoring->resiko_banjir }}
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
                                {{ $tanah->sc_tanah_scoring->zonasi == '1' ? '> Kota Besar' : ($tanah->sc_tanah_scoring->zonasi == '2' ? 'Kota/Kabupaten' : 'Kecamatan') }}
                            </td>
                            <td style="width: 10%; background-color: rgb(214, 214, 214); text-align: center">
                                {{ $tanah->sc_tanah_scoring->zonasi }}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 30%">Akses Jalan</td>
                            <td style="width: 2%">:</td>
                            <td>
                                {{ $tanah->sc_tanah_scoring->akses_jalan == '1' ? '> 3 meter' : '3 meter' }}
                            </td>
                            <td style="background-color: rgb(214, 214, 214); text-align: center">
                                {{ $tanah->sc_tanah_scoring->akses_jalan }}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 30%">Kondisi Jalan</td>
                            <td style="width: 2%">:</td>
                            <td>
                                {{ $tanah->sc_tanah_scoring->kondisi_jalan == '1' ? 'BETON COR/ASPAL/PAVING' : 'TANAH' }}
                            </td>
                            <td style="background-color: rgb(214, 214, 214); text-align: center">
                                {{ $tanah->sc_tanah_scoring->kondisi_jalan }}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 30%">Tusuk Sate</td>
                            <td style="width: 2%">:</td>
                            <td>
                                {{ $tanah->sc_tanah_scoring->tusuk_sate == '1' ? 'TIDAK' : 'YA (BUKAN JALAN UTAMA)' }}
                            </td>
                            <td style="background-color: rgb(214, 214, 214); text-align: center">
                                {{ $tanah->sc_tanah_scoring->tusuk_sate }}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 30%">Bentuk Tanah</td>
                            <td style="width: 2%">:</td>
                            <td>
                                {{ ($tanah->sc_tanah_scoring->bentuk_tanah == '1' ? 'PERSEGI PANJANG' : $tanah->sc_tanah_scoring->bentuk_tanah == '2') ? 'TRAPESIUM' : 'LAINNYA' }}
                            </td>
                            <td style="background-color: rgb(214, 214, 214); text-align: center">
                                {{ $tanah->sc_tanah_scoring->bentuk_tanah }}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 30%">Lebar Muka</td>
                            <td style="width: 2%">:</td>
                            <td>
                                {{ ($tanah->sc_tanah_scoring->lebar_muka == '1' ? 'LEBAR DIBELAKANG' : $tanah->sc_tanah_scoring->lebar_muka == '2') ? 'SAMA LEBAR' : 'LEBAR DIDEPAN' }}
                            </td>
                            <td style="background-color: rgb(214, 214, 214); text-align: center">
                                {{ $tanah->sc_tanah_scoring->lebar_muka }}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 30%">Kontur</td>
                            <td style="width: 2%">:</td>
                            <td>
                                {{ ($tanah->sc_tanah_scoring->kontur == '1' ? 'DATAR' : $tanah->sc_tanah_scoring->kontur == '2') ? 'LANDAI' : 'CURAM' }}
                            </td>
                            <td style="background-color: rgb(214, 214, 214); text-align: center">
                                {{ $tanah->sc_tanah_scoring->kontur }}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 30%">Elevasi</td>
                            <td style="width: 2%">:</td>
                            <td>
                                {{ ($tanah->sc_tanah_scoring->elevasi == '1' ? 'LEBIH TINGGI' : $tanah->sc_tanah_scoring->elevasi == '2') ? 'SEJAJAR JALAN' : 'LEBIH RENDAH' }}
                            </td>
                            <td style="background-color: rgb(214, 214, 214); text-align: center">
                                {{ $tanah->sc_tanah_scoring->elevasi }}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 30%">Rel Kereta Api</td>
                            <td style="width: 2%">:</td>
                            <td>
                                {{ $tanah->sc_tanah_scoring->rel_kereta == '1' ? 'TIDAK' : 'YA' }}
                            </td>
                            <td style="background-color: rgb(214, 214, 214); text-align: center">
                                {{ $tanah->sc_tanah_scoring->rel_kereta }}
                            </td>
                        </tr>
                        <tr>
                            <td><strong style="font-size: 8pt;">TOTAL SCORE</strong></td>
                            <td style="width: 2%">:</td>
                            <td></td>
                            <td style="background-color: rgb(214, 214, 214); text-align: center">
                                <strong style="font-size: 8pt">
                                    {{ $tanah->sc_tanah_scoring->total_score_tanah }}
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
                                    {{ $tanah->sc_tanah_scoring->pondasi == '1' ? 'BERPONDASI' : 'TIDAK ADA' }}
                                </td>
                                <td style="width: 10%; background-color: rgb(214, 214, 214); text-align: center">
                                    {{ $tanah->sc_tanah_scoring->pondasi }}
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 30%">Rangka Atap</td>
                                <td style="width: 2%">:</td>
                                <td>
                                    {{ $tanah->sc_tanah_scoring->rangka_atap == '1' ? 'BESI U/C' : ($tanah->sc_tanah_scoring->rangka_atap == '2' ? 'BAJA RINGAN' : 'KAYU') }}
                                </td>
                                <td style="background-color: rgb(214, 214, 214); text-align: center">
                                    {{ $tanah->sc_tanah_scoring->rangka_atap }}
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 30%">Plafon</td>
                                <td style="width: 2%">:</td>
                                <td>
                                    {{ $tanah->sc_tanah_scoring->plafon == '1'
                                        ? 'PVC'
                                        : ($tanah->sc_tanah_scoring->plafon == '2'
                                            ? 'GYPSUM'
                                            : ($tanah->sc_tanah_scoring->plafon == '3'
                                                ? 'TRIPLEK/ETERNIT/KALSIBOARD'
                                                : 'TIDAK ADA')) }}
                                </td>
                                <td style="background-color: rgb(214, 214, 214); text-align: center">
                                    {{ $tanah->sc_tanah_scoring->plafon }}
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
                                    {{ $tanah->sc_tanah_scoring->struktur == '1' ? 'BETON BERTULANG' : 'KAYU' }}
                                </td>
                                <td style="width: 10%; background-color: rgb(214, 214, 214); text-align: center">
                                    {{ $tanah->sc_tanah_scoring->struktur }}
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 30%">Penutup Atap</td>
                                <td style="width: 2%">:</td>
                                <td>
                                    {{ $tanah->sc_tanah_scoring->penutup_atap == '1' ? 'GENTENG' : ($tanah->sc_tanah_scoring->penutup_atap == '2' ? 'GENTENG BETON/PVC' : ($tanah->sc_tanah_scoring->penutup_atap == '3' ? 'GENTENG TANAH LIAT/GALVALUM' : 'ESBES')) }}
                                </td>
                                <td style="background-color: rgb(214, 214, 214); text-align: center">
                                    {{ $tanah->sc_tanah_scoring->penutup_atap }}
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 30%">Dinding</td>
                                <td style="width: 2%">:</td>
                                <td>
                                    {{ $tanah->sc_tanah_scoring->dinding == '1'
                                        ? 'BATA MERAH'
                                        : ($tanah->sc_tanah_scoring->dinding == '2'
                                            ? 'BATAKO'
                                            : ($tanah->sc_tanah_scoring->dinding == '3'
                                                ? 'GYPSUM/TRIPLEK'
                                                : 'TIDAK ADA')) }}
                                </td>
                                <td style="background-color: rgb(214, 214, 214); text-align: center">
                                    {{ $tanah->sc_tanah_scoring->dinding }}
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
                                    {{ $tanah->sc_tanah_scoring->pintu == '1'
                                        ? 'BAJA'
                                        : ($tanah->sc_tanah_scoring->pintu == '2'
                                            ? 'KAYU JATI'
                                            : ($tanah->sc_tanah_scoring->pintu == '3'
                                                ? 'KAYU NON JATI'
                                                : 'PANEL')) }}
                                </td>
                                <td style="background-color: rgb(214, 214, 214); text-align: center">
                                    {{ $tanah->sc_tanah_scoring->pintu }}
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 30%">IMB</td>
                                <td style="width: 2%">:</td>
                                <td>
                                    {{ $tanah->sc_tanah_scoring->pintu == '1' ? 'ADA' : 'TIDAK ADA' }}
                                </td>
                                <td style="width: 10%; background-color: rgb(214, 214, 214); text-align: center">
                                    {{ $tanah->sc_tanah_scoring->pintu }}
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
                                    {{ $tanah->sc_tanah_scoring->lantai == '1'
                                        ? 'GRANIT'
                                        : ($tanah->sc_tanah_scoring->lantai == '2'
                                            ? 'VYNIL'
                                            : ($tanah->sc_tanah_scoring->lantai == '3'
                                                ? 'KERAMIK/TRASPO'
                                                : 'PLESTER')) }}
                                </td>
                                <td style="width: 10%; background-color: rgb(214, 214, 214); text-align: center">
                                    {{ $tanah->sc_tanah_scoring->lantai }}
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 30%"><strong>TOTAL SCORE</strong></td>
                                <td style="width: 2%">:</td>
                                <td></td>
                                <td style="background-color: rgb(214, 214, 214); text-align: center">
                                    <strong>
                                        {{ $tanah->sc_tanah_scoring->total_skor_bangunan }}
                                    </strong>
                                </td>
                            </tr>
                        </table>
                    </div>

                    @if ($tanah->detail_kategori_jaminan == 'Ruko & Rukan')
                        <div class="clearfix"></div> <!-- manual clearfix -->
                        <div class="col-md-12">
                            <center>
                                <strong>TOTAL SCORE: {{ $tanah->sc_tanah_scoring->total_skor_rukan }}</strong>
                            </center>
                        </div>
                    @endif
                </div>
            @endif
        </div>

    </div>

    {{-- Perhitungan Nilai Agunan --}}
    <div class="card mb-2">
        <div class="card-header bg-success text-white head-judul" style="text-align: center">
            II. PERHITUNGAN NILAI AGUNAN
        </div>
        <div class="card-body">
            @foreach ($tanah->sc_tanah_perhitungan as $index => $tanahP)
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
                            @if (!empty($tanah->sc_tanah_rekap_1))
                                {{ 'Rp' . number_format($tanah->sc_tanah_rekap_1->nilai_njop, 0, ',', '.') }}
                            @else
                                {{ 'Rp' . number_format($tanah->sc_tanah_rekap_2->nilai_njop, 0, ',', '.') }}
                            @endif
                        </td>
                        <td style="width: 20%">Berdasarkan PBB Tahun</td>
                        <td style="width: 2%">:</td>
                        <td style="width: 29%">
                            @if (!empty($tanah->sc_tanah_rekap_1))
                                {{ $tanah->sc_tanah_rekap_1->pbb_tahun }}
                            @else
                                {{ $tanah->sc_tanah_rekap_2->pbb_tahun }}
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
                                {{ 'Rp' . number_format($tanah->sc_tanah_rekap_1->data_1, 0, ',', '.') }} / M²
                            </td>
                            <td style="width: 10%">Luas Tanah</td>
                            <td style="width: 2%">:</td>
                            <td style="width: 10%">
                                {{ $tanah->sc_tanah_rekap_1->data_luas_1 }}
                            </td>
                            <td style="width: 1%">=</td>
                            <td style="width: 1%"></td>
                            <td>
                                {{ 'Rp' . number_format($tanah->sc_tanah_rekap_1->data_total_1, 0, ',', '.') }}
                            </td>
                        </tr>
                        <tr>
                            <td>Data II</td>
                            <td>:</td>
                            <td>
                                {{ 'Rp' . number_format($tanah->sc_tanah_rekap_1->data_2, 0, ',', '.') }} / M²
                            </td>
                            <td>Luas Tanah</td>
                            <td>:</td>
                            <td>
                                {{ $tanah->sc_tanah_rekap_1->data_luas_2 }}
                            </td>
                            <td>=</td>
                            <td></td>
                            <td>
                                {{ 'Rp' . number_format($tanah->sc_tanah_rekap_1->data_total_2, 0, ',', '.') }}
                            </td>
                        </tr>
                        <tr>
                            <td>Data III</td>
                            <td>:</td>
                            <td>
                                {{ 'Rp' . number_format($tanah->sc_tanah_rekap_1->data_3, 0, ',', '.') }} / M²
                            </td>
                            <td>Luas Tanah</td>
                            <td>:</td>
                            <td>
                                {{ $tanah->sc_tanah_rekap_1->data_luas_3 }}
                            </td>
                            <td>=</td>
                            <td></td>
                            <td>
                                {{ 'Rp' . number_format($tanah->sc_tanah_rekap_1->data_total_3, 0, ',', '.') }}
                            </td>
                        </tr>
                    </table>

                    <strong>Nilai Yang Direkomendasikan</strong>
                    <table class="table table-sm w-100">
                        <tr>
                            <td style="width: 20%">Nilai Pasar/m²</td>
                            <td style="width: 2%">:</td>
                            <td>{{ 'Rp' . number_format($tanah->sc_tanah_rekap_1->nilai_pasar) }}</td>
                            <td>
                                <strong>Safety Margin: </strong>
                                {{ $tanah->sc_tanah_rekap_1->safety_margin }} %
                            </td>
                        </tr>
                        <tr>
                            <td>Nilai Pasar Agunan</td>
                            <td>:</td>
                            <td colspan="2">
                                {{ 'Rp' . number_format($tanah->sc_tanah_rekap_1->nilai_agunan, 0, ',', '.') }}
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
                                {{ 'Rp' . number_format($tanah->sc_tanah_rekap_2->tanah_1, 0, ',', '.') }} / M²
                            </td>
                            <td style="width: 15%">Luas Tanah</td>
                            <td style="width: 2%">:</td>
                            <td style="width: 10%">{{ $tanah->sc_tanah_rekap_2->tanah_luas_1 }}</td>
                            <td style="width: 1%">=</td>
                            <td>
                                {{ 'Rp' . number_format($tanah->sc_tanah_rekap_2->tanah_total_1, 0, ',', '.') }}
                            </td>
                        </tr>
                        <tr>
                            <td style="padding-left: 15px">Bangunan</td>
                            <td>:</td>
                            <td>
                                {{ 'Rp' . number_format($tanah->sc_tanah_rekap_2->bangunan_1, 0, ',', '.') }} / M²
                            </td>
                            <td>Luas Bangunan</td>
                            <td>:</td>
                            <td>{{ $tanah->sc_tanah_rekap_2->bangunan_luas_1 }}</td>
                            <td>=</td>
                            <td>
                                {{ 'Rp' . number_format($tanah->sc_tanah_rekap_2->bangunan_total_1, 0, ',', '.') }}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="8">Data II</td>
                        </tr>
                        <tr>
                            <td style="padding-left: 15px; width: 10%">Tanah</td>
                            <td style="width: 2%">:</td>
                            <td style="width: 15%">
                                {{ 'Rp' . number_format($tanah->sc_tanah_rekap_2->tanah_2, 0, ',', '.') }} / M²
                            </td>
                            <td style="width: 10%">Luas Tanah</td>
                            <td style="width: 2%">:</td>
                            <td style="width: 10%">{{ $tanah->sc_tanah_rekap_2->tanah_luas_2 }}</td>
                            <td style="width: 1%">=</td>
                            <td>
                                {{ 'Rp' . number_format($tanah->sc_tanah_rekap_2->tanah_total_2, 0, ',', '.') }}
                            </td>
                        </tr>
                        <tr>
                            <td style="padding-left: 15px">Bangunan</td>
                            <td>:</td>
                            <td>
                                {{ 'Rp' . number_format($tanah->sc_tanah_rekap_2->bangunan_2, 0, ',', '.') }} / M²
                            </td>
                            <td>Luas Bangunan</td>
                            <td>:</td>
                            <td>{{ $tanah->sc_tanah_rekap_2->bangunan_luas_2 }}</td>
                            <td>=</td>
                            <td>
                                {{ 'Rp' . number_format($tanah->sc_tanah_rekap_2->bangunan_total_2, 0, ',', '.') }}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="8">Data III</td>
                        </tr>
                        <tr>
                            <td style="padding-left: 15px; width: 10%">Tanah</td>
                            <td style="width: 2%">:</td>
                            <td style="width: 15%">
                                {{ 'Rp' . number_format($tanah->sc_tanah_rekap_2->tanah_3, 0, ',', '.') }} / M²
                            </td>
                            <td style="width: 10%">Luas Tanah</td>
                            <td style="width: 2%">:</td>
                            <td style="width: 10%">{{ $tanah->sc_tanah_rekap_2->tanah_luas_3 }}</td>
                            <td style="width: 1%">=</td>
                            <td>
                                {{ 'Rp' . number_format($tanah->sc_tanah_rekap_2->tanah_total_3, 0, ',', '.') }}
                            </td>
                        </tr>
                        <tr>
                            <td style="padding-left: 15px">Bangunan</td>
                            <td>:</td>
                            <td>
                                {{ 'Rp' . number_format($tanah->sc_tanah_rekap_2->bangunan_3, 0, ',', '.') }} / M²
                            </td>
                            <td>Luas Bangunan</td>
                            <td>:</td>
                            <td>{{ $tanah->sc_tanah_rekap_2->bangunan_luas_3 }}</td>
                            <td>=</td>
                            <td>
                                {{ 'Rp' . number_format($tanah->sc_tanah_rekap_2->bangunan_total_3, 0, ',', '.') }}
                            </td>
                        </tr>
                    </table>

                    <strong>Nilai Yang Direkomendasikan</strong>
                    <table class="table table-sm w-100">
                        <tr>
                            <td>Nilai Pasar/M²</td>
                            <td colspan="2">
                                <strong>Safety Margin Tanah : </strong>
                                {{ $tanah->sc_tanah_rekap_2->margin_tanah }} %
                            </td>
                        </tr>
                        <tr>
                            <td style="padding-left: 15px; width: 15%">Tanah</td>
                            <td style="width: 2%">:</td>
                            <td>
                                {{ 'Rp' . number_format($tanah->sc_tanah_rekap_2->rekom_pasar_tanah, 0, ',', '.') }}
                            </td>
                        </tr>
                        <tr>
                            <td style="padding-left: 15px">Bangunan</td>
                            <td>:</td>
                            <td>
                                {{ 'Rp' . number_format($tanah->sc_tanah_rekap_2->rekom_pasar_bangunan, 0, ',', '.') }}
                            </td>
                        </tr>
                        <tr>
                            <td>Nilai Pasar Agunan</td>
                            <td colspan="2">
                                <strong>Safety Margin Bangunan : </strong>
                                {{ $tanah->sc_tanah_rekap_2->margin_bangunan }} %
                            </td>
                        </tr>
                        <tr>
                            <td style="padding-left: 15px; width: 15%">Tanah</td>
                            <td style="width: 2%">:</td>
                            <td>
                                {{ 'Rp' . number_format($tanah->sc_tanah_rekap_2->rekom_agunan_tanah, 0, ',', '.') }}
                            </td>
                        </tr>
                        <tr>
                            <td style="padding-left: 15px">Bangunan</td>
                            <td>:</td>
                            <td>
                                {{ 'Rp' . number_format($tanah->sc_tanah_rekap_2->rekom_agunan_bangunan, 0, ',', '.') }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Total</strong>
                            </td>
                            <td>:</td>
                            <td>
                                {{ 'Rp' . number_format($tanah->sc_tanah_rekap_2->rekom_total, 0, ',', '.') }}
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
    <div class="card-header bg-success text-white head-judul" style="text-align: center">
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
                        {{ 'Rp' . number_format($tanah->sc_tanah_rekap_1->kes_nilai_pasar, 0, ',', '.') }}
                    </td>
                </tr>
                <tr>
                    <td>
                        Taksasi (%)
                    </td>
                    <td style="width: 2%">:</td>
                    <td>
                        {{ $tanah->sc_tanah_rekap_1->kes_nilai_taksasi_persen }} %
                    </td>
                </tr>
                <tr>
                    <td>
                        Nilai Taksasi Agunan
                    </td>
                    <td style="width: 2%">:</td>
                    <td>
                        {{ 'Rp' . number_format($tanah->sc_tanah_rekap_1->kes_nilai_taksasi, 0, ',', '.') }}
                    </td>
                </tr>
            </table>

            <table class="table table-sm w-100">
                <tr>
                    <td style="width: 20%">Kesimpulan</td>
                    <td style="width: 2%">:</td>
                    <td>
                        {!! $tanah->sc_tanah_rekap_1->kesimpulan !!}
                    </td>
                </tr>
                <tr>
                    <td>Rekomendasi Penilai</td>
                    <td>:</td>
                    <td>
                        {!! $tanah->sc_tanah_rekap_1->rekomendasi_penilai !!}
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
                        {{ 'Rp' . number_format($tanah->sc_tanah_rekap_2->kes_tanah_nilai_pasar, 0, ',', '.') }}
                    </td>
                    <td>+</td>
                    <td>
                        {{ 'Rp' . number_format($tanah->sc_tanah_rekap_2->kes_bangunan_nilai_pasar, 0, ',', '.') }}
                    </td>
                    <td>=</td>
                    <td>
                        {{ 'Rp' . number_format($tanah->sc_tanah_rekap_2->kes_total_nilai_pasar, 0, ',', '.') }}
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
                    <td>{{ $tanah->sc_tanah_rekap_2->kes_taksasi_persen_1 }} %</td>
                    <td></td>
                    <td>{{ $tanah->sc_tanah_rekap_2->kes_taksasi_persen_2 }} %</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Nilai Taksasi Agunan</td>
                    <td>:</td>
                    <td>
                        {{ 'Rp' . number_format($tanah->sc_tanah_rekap_2->kes_tanah_nilai_taksasi, 0, ',', '.') }}
                    </td>
                    <td>+</td>
                    <td>
                        {{ 'Rp' . number_format($tanah->sc_tanah_rekap_2->kes_bangunan_nilai_taksasi, 0, ',', '.') }}
                    </td>
                    <td>=</td>
                    <td>
                        {{ 'Rp' . number_format($tanah->sc_tanah_rekap_2->kes_total_nilai_taksasi, 0, ',', '.') }}
                    </td>
                </tr>
            </table>

            <table class="table table-sm w-100">
                <tr>
                    <td style="width: 15%">Kesimpulan</td>
                    <td style="width: 2%">:</td>
                    <td>
                        {!! $tanah->sc_tanah_rekap_2->kesimpulan !!}
                    </td>
                </tr>
                <tr>
                    <td>Rekomendasi Penilai</td>
                    <td>:</td>
                    <td>
                        {!! $tanah->sc_tanah_rekap_2->rekomendasi_penilai !!}
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
