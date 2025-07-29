{{-- CORE --}}
<div class="col-md-12 mb-3">
    <h6>TANAH</h6>
</div>

<div class="col-md-6">
    <table class="table table-striped table-sm w-100">
        <tr>
            <td style="width: 35%">
                <label class="notbold" for="tempat_ibadah_{{ $loop->iteration }}">Tempat Ibadah</label>
            </td>
            <td style="width: 50%">
                <select name="tempat_ibadah_{{ $loop->iteration }}" id="tempat_ibadah_{{ $loop->iteration }}"
                    class="form-select form-select-sm">
                    <option selected disabled value="0">-Pilih-</option>
                    <option {{ $tanah->sc_tanah_scoring?->tempat_ibadah == '1' ? 'selected' : '' }} value="1">
                        &gt;1km</option>
                    <option {{ $tanah->sc_tanah_scoring?->tempat_ibadah == '2' ? 'selected' : '' }} value="2">
                        500m-1km</option>
                    <option {{ $tanah->sc_tanah_scoring?->tempat_ibadah == '3' ? 'selected' : '' }} value="3">
                        6m-500m</option>
                </select>
            </td>
            <td style="width: 15%">
                <input type="text" name="tempat_ibadah_nom_tanah_{{ $loop->iteration }}"
                    id="tempat_ibadah_nom_tanah_{{ $loop->iteration }}" class="form-control form-control-sm" readonly
                    value="{{ $tanah->sc_tanah_scoring?->tempat_ibadah }}">
            </td>
        </tr>
        <tr>
            <td style="width: 35%">
                <label class="notbold" for="pasar_{{ $loop->iteration }}">Pasar</label>
            </td>
            <td style="width: 50%">
                <select name="pasar_{{ $loop->iteration }}" id="pasar_{{ $loop->iteration }}"
                    class="form-select form-select-sm">
                    <option selected disabled value="0">-Pilih-</option>
                    <option {{ $tanah->sc_tanah_scoring?->pasar == '1' ? 'selected' : '' }} value="1">&lt;500m
                    </option>
                    <option {{ $tanah->sc_tanah_scoring?->pasar == '2' ? 'selected' : '' }} value="2">500m-1km
                    </option>
                    <option {{ $tanah->sc_tanah_scoring?->pasar == '3' ? 'selected' : '' }} value="3">&gt;1Km
                    </option>
                </select>
            </td>
            <td style="width: 15%">
                <input type="text" name="pasar_nom_tanah_{{ $loop->iteration }}"
                    id="pasar_nom_tanah_{{ $loop->iteration }}" class="form-control form-control-sm" readonly
                    value="{{ $tanah->sc_tanah_scoring?->pasar }}">
            </td>
        </tr>
        <tr>
            <td style="width: 35%">
                <label class="notbold" for="sekolah_{{ $loop->iteration }}">Sekolah</label>
            </td>
            <td style="width: 50%">
                <select name="sekolah_{{ $loop->iteration }}" id="sekolah_{{ $loop->iteration }}"
                    class="form-select form-select-sm">
                    <option selected disabled value="0">-Pilih-</option>
                    <option {{ $tanah->sc_tanah_scoring?->sekolah == '1' ? 'selected' : '' }} value="1">&lt;500m
                    </option>
                    <option {{ $tanah->sc_tanah_scoring?->sekolah == '2' ? 'selected' : '' }} value="2">500m-1km
                    </option>
                    <option {{ $tanah->sc_tanah_scoring?->sekolah == '3' ? 'selected' : '' }} value="3">&gt;1Km
                    </option>
                </select>
            </td>
            <td style="width: 15%">
                <input type="text" name="sekolah_nom_tanah_{{ $loop->iteration }}"
                    id="sekolah_nom_tanah_{{ $loop->iteration }}" class="form-control form-control-sm" readonly
                    value="{{ $tanah->sc_tanah_scoring?->sekolah }}">
            </td>
        </tr>
        <tr>
            <td style="width: 35%">
                <label class="notbold" for="perkantoran_{{ $loop->iteration }}">Perkantoran</label>
            </td>
            <td style="width: 50%">
                <select name="perkantoran_{{ $loop->iteration }}" id="perkantoran_{{ $loop->iteration }}"
                    class="form-select form-select-sm">
                    <option selected disabled value="0">-Pilih-</option>
                    <option {{ $tanah->sc_tanah_scoring?->perkantoran == '1' ? 'selected' : '' }} value="1">
                        &lt;500m</option>
                    <option {{ $tanah->sc_tanah_scoring?->perkantoran == '2' ? 'selected' : '' }} value="2">
                        500m-1km</option>
                    <option {{ $tanah->sc_tanah_scoring?->perkantoran == '3' ? 'selected' : '' }} value="3">
                        &gt;1Km</option>
                </select>
            </td>
            <td style="width: 15%">
                <input type="text" name="perkantoran_nom_tanah_{{ $loop->iteration }}"
                    id="perkantoran_nom_tanah_{{ $loop->iteration }}" class="form-control form-control-sm" readonly
                    value="{{ $tanah->sc_tanah_scoring?->perkantoran }}">
            </td>
        </tr>
        <tr>
            <td style="width: 35%">
                <label class="notbold" for="sutet_{{ $loop->iteration }}">SUTET/SUTT/BTS</label>
            </td>
            <td style="width: 50%">
                <select name="sutet_{{ $loop->iteration }}" id="sutet_{{ $loop->iteration }}"
                    class="form-select form-select-sm">
                    <option selected disabled value="0">-Pilih-</option>
                    <option {{ $tanah->sc_tanah_scoring?->sutet == '1' ? 'selected' : '' }} value="1">&gt;1Km
                    </option>
                    <option {{ $tanah->sc_tanah_scoring?->sutet == '2' ? 'selected' : '' }} value="2">&gt;500m-1km
                    </option>
                    <option {{ $tanah->sc_tanah_scoring?->sutet == '3' ? 'selected' : '' }} value="3">500m
                    </option>
                </select>
            </td>
            <td style="width: 15%">
                <input type="text" name="sutet_nom_tanah_{{ $loop->iteration }}"
                    id="sutet_nom_tanah_{{ $loop->iteration }}" class="form-control form-control-sm" readonly
                    value="{{ $tanah->sc_tanah_scoring?->sutet }}">
            </td>
        </tr>
        <tr>
            <td style="width: 35%">
                <label class="notbold" for="lokalisasi_{{ $loop->iteration }}">Lokalisasi</label>
            </td>
            <td style="width: 50%">
                <select name="lokalisasi_{{ $loop->iteration }}" id="lokalisasi_{{ $loop->iteration }}"
                    class="form-select form-select-sm">
                    <option selected disabled value="0">-Pilih-</option>
                    <option {{ $tanah->sc_tanah_scoring?->lokalisasi == '1' ? 'selected' : '' }} value="1">&gt;2Km
                    </option>
                    <option {{ $tanah->sc_tanah_scoring?->lokalisasi == '2' ? 'selected' : '' }} value="2">
                        &gt;1Km-2km</option>
                    <option {{ $tanah->sc_tanah_scoring?->lokalisasi == '3' ? 'selected' : '' }} value="3">1Km
                    </option>
                </select>
            </td>
            <td style="width: 15%">
                <input type="text" name="lokalisasi_nom_tanah_{{ $loop->iteration }}"
                    id="lokalisasi_nom_tanah_{{ $loop->iteration }}" class="form-control form-control-sm" readonly
                    value="{{ $tanah->sc_tanah_scoring?->lokalisasi }}">
            </td>
        </tr>
        <tr>
            <td style="width: 35%">
                <label class="notbold" for="tps_{{ $loop->iteration }}">TPS</label>
            </td>
            <td style="width: 50%">
                <select name="tps_{{ $loop->iteration }}" id="tps_{{ $loop->iteration }}"
                    class="form-select form-select-sm">
                    <option selected disabled value="0">-Pilih-</option>
                    <option {{ $tanah->sc_tanah_scoring?->tps == '1' ? 'selected' : '' }} value="1">&gt;2Km
                    </option>
                    <option {{ $tanah->sc_tanah_scoring?->tps == '2' ? 'selected' : '' }} value="2">&gt;1Km-2km
                    </option>
                    <option {{ $tanah->sc_tanah_scoring?->tps == '3' ? 'selected' : '' }} value="3">1Km</option>
                </select>
            </td>
            <td style="width: 15%">
                <input type="text" name="tps_nom_tanah_{{ $loop->iteration }}"
                    id="tps_nom_tanah_{{ $loop->iteration }}" class="form-control form-control-sm" readonly
                    value="{{ $tanah->sc_tanah_scoring?->tps }}">
            </td>
        </tr>
        <tr>
            <td style="width: 35%">
                <label class="notbold" for="pemakaman_{{ $loop->iteration }}">Pemakaman</label>
            </td>
            <td style="width: 50%">
                <select name="pemakaman_{{ $loop->iteration }}" id="pemakaman_{{ $loop->iteration }}"
                    class="form-select form-select-sm">
                    <option selected disabled value="0">-Pilih-</option>
                    <option {{ $tanah->sc_tanah_scoring?->pemakaman == '1' ? 'selected' : '' }} value="1">&gt;1Km
                    </option>
                    <option {{ $tanah->sc_tanah_scoring?->pemakaman == '2' ? 'selected' : '' }} value="2">
                        &gt;500m-1km</option>
                    <option {{ $tanah->sc_tanah_scoring?->pemakaman == '3' ? 'selected' : '' }} value="3">6m-500m
                    </option>
                </select>
            </td>
            <td style="width: 15%">
                <input type="text" name="pemakaman_nom_tanah_{{ $loop->iteration }}"
                    id="pemakaman_nom_tanah_{{ $loop->iteration }}" class="form-control form-control-sm" readonly
                    value="{{ $tanah->sc_tanah_scoring?->pemakaman }}">
            </td>
        </tr>
        <tr>
            <td style="width: 35%">
                <label class="notbold" for="resiko_longsor_{{ $loop->iteration }}">Resiko Longsor</label>
            </td>
            <td style="width: 50%">
                <select name="resiko_longsor_{{ $loop->iteration }}" id="resiko_longsor_{{ $loop->iteration }}"
                    class="form-select form-select-sm">
                    <option selected disabled value="0">-Pilih-</option>
                    <option {{ $tanah->sc_tanah_scoring?->resiko_longsor == '1' ? 'selected' : '' }} value="1">
                        RENDAH</option>
                    <option {{ $tanah->sc_tanah_scoring?->resiko_longsor == '3' ? 'selected' : '' }} value="3">
                        SEDANG</option>
                </select>
            </td>
            <td style="width: 15%">
                <input type="text" name="resiko_longsor_nom_tanah_{{ $loop->iteration }}"
                    id="resiko_longsor_nom_tanah_{{ $loop->iteration }}" class="form-control form-control-sm"
                    readonly value="{{ $tanah->sc_tanah_scoring?->resiko_longsor }}">
            </td>
        </tr>
        <tr>
            <td style="width: 35%">
                <label class="notbold" for="resiko_banjir_{{ $loop->iteration }}">Resiko Banjir</label>
            </td>
            <td style="width: 50%">
                <select name="resiko_banjir_{{ $loop->iteration }}" id="resiko_banjir_{{ $loop->iteration }}"
                    class="form-select form-select-sm">
                    <option selected disabled value="0">-Pilih-</option>
                    <option {{ $tanah->sc_tanah_scoring?->resiko_banjir == '1' ? 'selected' : '' }} value="1">
                        RENDAH</option>
                    <option {{ $tanah->sc_tanah_scoring?->resiko_banjir == '3' ? 'selected' : '' }} value="3">
                        SEDANG</option>
                </select>
            </td>
            <td style="width: 15%">
                <input type="text" name="resiko_banjir_nom_tanah_{{ $loop->iteration }}"
                    id="resiko_banjir_nom_tanah_{{ $loop->iteration }}" class="form-control form-control-sm" readonly
                    value="{{ $tanah->sc_tanah_scoring?->resiko_banjir }}">
            </td>
        </tr>

    </table>
</div>

<div class="col-md-6">
    <table class="table table-striped table-sm w-100">
        <tr>
            <td style="width: 35%">
                <label class="notbold" for="zonasi_{{ $loop->iteration }}">Zonasi</label>
            </td>
            <td style="width: 50%">
                <select name="zonasi_{{ $loop->iteration }}" id="zonasi_{{ $loop->iteration }}"
                    class="form-select form-select-sm">
                    <option selected disabled value="0">-Pilih-</option>
                    <option {{ $tanah->sc_tanah_scoring?->zonasi == '1' ? 'selected' : '' }} value="1">Kota Besar
                    </option>
                    <option {{ $tanah->sc_tanah_scoring?->zonasi == '2' ? 'selected' : '' }} value="2">
                        Kota/Kabupaten</option>
                    <option {{ $tanah->sc_tanah_scoring?->zonasi == '3' ? 'selected' : '' }} value="3">Kecamatan
                    </option>
                </select>
            </td>
            <td style="width: 15%">
                <input type="text" name="zonasi_nom_tanah_{{ $loop->iteration }}"
                    id="zonasi_nom_tanah_{{ $loop->iteration }}" class="form-control form-control-sm" readonly
                    value="{{ $tanah->sc_tanah_scoring?->zonasi }}">
            </td>
        </tr>
        <tr>
            <td style="width: 35%">
                <label class="notbold" for="akses_jalan_{{ $loop->iteration }}">Akses Jalan</label>
            </td>
            <td style="width: 50%">
                <select name="akses_jalan_{{ $loop->iteration }}" id="akses_jalan_{{ $loop->iteration }}"
                    class="form-select form-select-sm">
                    <option selected disabled value="0">-Pilih-</option>
                    <option {{ $tanah->sc_tanah_scoring?->akses_jalan == '1' ? 'selected' : '' }} value="1">
                        &gt;3
                        meter</option>
                    <option {{ $tanah->sc_tanah_scoring?->akses_jalan == '2' ? 'selected' : '' }} value="2">3
                        meter</option>
                </select>
            </td>
            <td style="width: 15%">
                <input type="text" name="akses_jalan_nom_tanah_{{ $loop->iteration }}"
                    id="akses_jalan_nom_tanah_{{ $loop->iteration }}" class="form-control form-control-sm" readonly
                    value="{{ $tanah->sc_tanah_scoring?->akses_jalan }}">
            </td>
        </tr>
        <tr>
            <td style="width: 35%">
                <label class="notbold" for="kondisi_jalan_{{ $loop->iteration }}">Kondisi Jalan</label>
            </td>
            <td style="width: 50%">
                <select name="kondisi_jalan_{{ $loop->iteration }}" id="kondisi_jalan_{{ $loop->iteration }}"
                    class="form-select form-select-sm">
                    <option selected disabled value="0">-Pilih-</option>
                    <option {{ $tanah->sc_tanah_scoring?->kondisi_jalan == '1' ? 'selected' : '' }} value="1">
                        BETON COR/ASPAL/PAVING</option>
                    <option {{ $tanah->sc_tanah_scoring?->kondisi_jalan == '3' ? 'selected' : '' }} value="3">
                        TANAH</option>
                </select>
            </td>
            <td style="width: 15%">
                <input type="text" name="kondisi_jalan_nom_tanah_{{ $loop->iteration }}"
                    id="kondisi_jalan_nom_tanah_{{ $loop->iteration }}" class="form-control form-control-sm"
                    readonly value="{{ $tanah->sc_tanah_scoring?->kondisi_jalan }}">
            </td>
        </tr>
        <tr>
            <td style="width: 35%">
                <label class="notbold" for="tusuk_sate_{{ $loop->iteration }}">Tusuk Sate</label>
            </td>
            <td style="width: 50%">
                <select name="tusuk_sate_{{ $loop->iteration }}" id="tusuk_sate_{{ $loop->iteration }}"
                    class="form-select form-select-sm">
                    <option selected disabled value="0">-Pilih-</option>
                    <option {{ $tanah->sc_tanah_scoring?->tusuk_sate == '1' ? 'selected' : '' }} value="1">TIDAK
                    </option>
                    <option {{ $tanah->sc_tanah_scoring?->tusuk_sate == '3' ? 'selected' : '' }} value="3">YA
                        (BUKAN JALAN UTAMA)</option>
                </select>
            </td>
            <td style="width: 15%">
                <input type="text" name="tusuk_sate_nom_tanah_{{ $loop->iteration }}"
                    id="tusuk_sate_nom_tanah_{{ $loop->iteration }}" class="form-control form-control-sm" readonly
                    value="{{ $tanah->sc_tanah_scoring?->tusuk_sate }}">
            </td>
        </tr>
        <tr>
            <td style="width: 35%">
                <label class="notbold" for="bentuk_tanah_{{ $loop->iteration }}">Bentuk Tanah</label>
            </td>
            <td style="width: 50%">
                <select name="bentuk_tanah_{{ $loop->iteration }}" id="bentuk_tanah_{{ $loop->iteration }}"
                    class="form-select form-select-sm">
                    <option selected disabled value="0">-Pilih-</option>
                    <option {{ $tanah->sc_tanah_scoring?->bentuk_tanah == '1' ? 'selected' : '' }} value="1">
                        PERSEGI PANJANG</option>
                    <option {{ $tanah->sc_tanah_scoring?->bentuk_tanah == '2' ? 'selected' : '' }} value="2">
                        TRAPESIUM</option>
                    <option {{ $tanah->sc_tanah_scoring?->bentuk_tanah == '3' ? 'selected' : '' }} value="3">
                        LAINNYA</option>
                </select>
            </td>
            <td style="width: 15%">
                <input type="text" name="bentuk_tanah_nom_tanah_{{ $loop->iteration }}"
                    id="bentuk_tanah_nom_tanah_{{ $loop->iteration }}" class="form-control form-control-sm" readonly
                    value="{{ $tanah->sc_tanah_scoring?->bentuk_tanah }}">
            </td>
        </tr>
        <tr>
            <td style="width: 35%">
                <label class="notbold" for="lebar_muka_{{ $loop->iteration }}">Lebar Muka</label>
            </td>
            <td style="width: 50%">
                <select name="lebar_muka_{{ $loop->iteration }}" id="lebar_muka_{{ $loop->iteration }}"
                    class="form-select form-select-sm">
                    <option selected disabled value="0">-Pilih-</option>
                    <option {{ $tanah->sc_tanah_scoring?->lebar_muka == '1' ? 'selected' : '' }} value="1">LEBAR
                        DIBELAKANG</option>
                    <option {{ $tanah->sc_tanah_scoring?->lebar_muka == '2' ? 'selected' : '' }} value="2">SAMA
                        LEBAR</option>
                    <option {{ $tanah->sc_tanah_scoring?->lebar_muka == '3' ? 'selected' : '' }} value="3">LEBAR
                        DIDEPAN</option>
                </select>
            </td>
            <td style="width: 15%">
                <input type="text" name="lebar_muka_nom_tanah_{{ $loop->iteration }}"
                    id="lebar_muka_nom_tanah_{{ $loop->iteration }}" class="form-control form-control-sm" readonly
                    value="{{ $tanah->sc_tanah_scoring?->lebar_muka }}">
            </td>
        </tr>
        <tr>
            <td style="width: 35%">
                <label class="notbold" for="kontur_{{ $loop->iteration }}">Kontur</label>
            </td>
            <td style="width: 50%">
                <select name="kontur_{{ $loop->iteration }}" id="kontur_{{ $loop->iteration }}"
                    class="form-select form-select-sm">
                    <option selected disabled value="0">-Pilih-</option>
                    <option {{ $tanah->sc_tanah_scoring?->kontur == '1' ? 'selected' : '' }} value="1">DATAR
                    </option>
                    <option {{ $tanah->sc_tanah_scoring?->kontur == '2' ? 'selected' : '' }} value="2">LANDAI
                    </option>
                    <option {{ $tanah->sc_tanah_scoring?->kontur == '3' ? 'selected' : '' }} value="3">CURAM
                    </option>
                </select>
            </td>
            <td style="width: 15%">
                <input type="text" name="kontur_nom_tanah_{{ $loop->iteration }}"
                    id="kontur_nom_tanah_{{ $loop->iteration }}" class="form-control form-control-sm" readonly
                    value="{{ $tanah->sc_tanah_scoring?->kontur }}">
            </td>
        </tr>
        <tr>
            <td style="width: 35%">
                <label class="notbold" for="elevasi_{{ $loop->iteration }}">Elevasi</label>
            </td>
            <td style="width: 50%">
                <select name="elevasi_{{ $loop->iteration }}" id="elevasi_{{ $loop->iteration }}"
                    class="form-select form-select-sm">
                    <option selected disabled value="0">-Pilih-</option>
                    <option {{ $tanah->sc_tanah_scoring?->elevasi == '1' ? 'selected' : '' }} value="1">LEBIH
                        TINGGI &gt;50m</option>
                    <option {{ $tanah->sc_tanah_scoring?->elevasi == '2' ? 'selected' : '' }} value="2">SEJAJAR
                        JALAN</option>
                    <option {{ $tanah->sc_tanah_scoring?->elevasi == '3' ? 'selected' : '' }} value="3">LEBIH
                        RENDAH &gt;50m</option>
                </select>
            </td>
            <td style="width: 15%">
                <input type="text" name="elevasi_nom_tanah_{{ $loop->iteration }}"
                    id="elevasi_nom_tanah_{{ $loop->iteration }}" class="form-control form-control-sm" readonly
                    value="{{ $tanah->sc_tanah_scoring?->elevasi }}">
            </td>
        </tr>
        <tr>
            <td style="width: 35%">
                <label class="notbold" for="rel_kereta_{{ $loop->iteration }}">Rel Kereta Api</label>
            </td>
            <td style="width: 50%">
                <select name="rel_kereta_{{ $loop->iteration }}" id="rel_kereta_{{ $loop->iteration }}"
                    class="form-select form-select-sm">
                    <option selected disabled value="0">-Pilih-</option>
                    <option {{ $tanah->sc_tanah_scoring?->rel_kereta == '1' ? 'selected' : '' }} value="1">TIDAK
                    </option>
                    <option {{ $tanah->sc_tanah_scoring?->rel_kereta == '3' ? 'selected' : '' }} value="3">YA
                    </option>
                </select>
            </td>
            <td style="width: 15%">
                <input type="text" name="rel_kereta_nom_tanah_{{ $loop->iteration }}"
                    id="rel_kereta_nom_tanah_{{ $loop->iteration }}" class="form-control form-control-sm" readonly
                    value="{{ $tanah->sc_tanah_scoring?->rel_kereta }}">
            </td>
        </tr>
        <tr>
            <td style="width: 35%">
                <label for="total_score_tanah_{{ $loop->iteration }}">TOTAL SCORE TANAH</label>
            </td>
            <td colspan="2">
                <input type="text" name="total_score_tanah_{{ $loop->iteration }}"
                    id="total_score_tanah_{{ $loop->iteration }}" class="form-control form-control-sm" readonly
                    value="{{ $tanah->sc_tanah_scoring?->total_score_tanah }}">
            </td>
        </tr>
    </table>
</div>

{{-- BANGUNAN DAN RUKAN --}}
@if ($tanah->detail_kategori_jaminan != 'Tanah')
    <div class="col-md-12 mb-3">
        <h6>BANGUNAN</h6>
    </div>

    <div class="col-md-6">
        <table class="table table-striped table-sm w-100">
            <tr>
                <td style="width: 35%">
                    <label class="notbold" for="pondasi_{{ $loop->iteration }}">Pondasi</label>
                </td>
                <td style="width: 50%">
                    <select name="pondasi_{{ $loop->iteration }}" id="pondasi_{{ $loop->iteration }}"
                        class="form-select form-select-sm">
                        <option selected disabled value="0">-Pilih-</option>
                        <option {{ $tanah->sc_tanah_scoring?->pondasi == '1' ? 'selected' : '' }} value="1">
                            BERPONDASI</option>
                        <option {{ $tanah->sc_tanah_scoring?->pondasi == '4' ? 'selected' : '' }} value="4">
                            TIDAK ADA</option>
                    </select>
                </td>
                <td style="width: 15%">
                    <input type="text" name="pondasi_nom_bangunan_{{ $loop->iteration }}"
                        id="pondasi_nom_bangunan_{{ $loop->iteration }}" class="form-control form-control-sm"
                        readonly value="{{ $tanah->sc_tanah_scoring?->pondasi }}">
                </td>
            </tr>
            <tr>
                <td style="width: 35%">
                    <label class="notbold" for="rangka_atap_{{ $loop->iteration }}">Rangka Atap</label>
                </td>
                <td style="width: 50%">
                    <select name="rangka_atap_{{ $loop->iteration }}" id="rangka_atap_{{ $loop->iteration }}"
                        class="form-select form-select-sm">
                        <option selected disabled value="0">-Pilih-</option>
                        <option {{ $tanah->sc_tanah_scoring?->rangka_atap == '1' ? 'selected' : '' }} value="1">
                            BESI U/C</option>
                        <option {{ $tanah->sc_tanah_scoring?->rangka_atap == '2' ? 'selected' : '' }} value="2">
                            BAJA RINGAN</option>
                        <option {{ $tanah->sc_tanah_scoring?->rangka_atap == '3' ? 'selected' : '' }} value="3">
                            KAYU</option>
                    </select>
                </td>
                <td style="width: 15%">
                    <input type="text" name="rangka_atap_nom_bangunan_{{ $loop->iteration }}"
                        id="rangka_atap_nom_bangunan_{{ $loop->iteration }}" class="form-control form-control-sm"
                        readonly value="{{ $tanah->sc_tanah_scoring?->rangka_atap }}">
                </td>
            </tr>
            <tr>
                <td style="width: 35%">
                    <label class="notbold" for="plafon_{{ $loop->iteration }}">Plafon</label>
                </td>
                <td style="width: 50%">
                    <select name="plafon_{{ $loop->iteration }}" id="plafon_{{ $loop->iteration }}"
                        class="form-select form-select-sm">
                        <option selected disabled value="0">-Pilih-</option>
                        <option {{ $tanah->sc_tanah_scoring?->plafon == '1' ? 'selected' : '' }} value="1">PVC
                        </option>
                        <option {{ $tanah->sc_tanah_scoring?->plafon == '2' ? 'selected' : '' }} value="2">
                            GYPSUM</option>
                        <option {{ $tanah->sc_tanah_scoring?->plafon == '3' ? 'selected' : '' }} value="3">
                            TRIPLEK/ETERNIT/KALSIBOARD</option>
                        <option {{ $tanah->sc_tanah_scoring?->plafon == '4' ? 'selected' : '' }} value="4">TIDAK
                            ADA</option>
                    </select>
                </td>
                <td style="width: 15%">
                    <input type="text" name="plafon_nom_bangunan_{{ $loop->iteration }}"
                        id="plafon_nom_bangunan_{{ $loop->iteration }}" class="form-control form-control-sm"
                        readonly value="{{ $tanah->sc_tanah_scoring?->plafon }}">
                </td>
            </tr>
            <tr>
                <td style="width: 35%">
                    <label class="notbold" for="pintu_{{ $loop->iteration }}">Pintu</label>
                </td>
                <td style="width: 50%">
                    <select name="pintu_{{ $loop->iteration }}" id="pintu_{{ $loop->iteration }}"
                        class="form-select form-select-sm">
                        <option selected disabled value="0">-Pilih-</option>
                        <option {{ $tanah->sc_tanah_scoring?->pintu == '1' ? 'selected' : '' }} value="1">BAJA
                        </option>
                        <option {{ $tanah->sc_tanah_scoring?->pintu == '2' ? 'selected' : '' }} value="2">KAYU
                            JATI</option>
                        <option {{ $tanah->sc_tanah_scoring?->pintu == '3' ? 'selected' : '' }} value="3">KAYU
                            NON JATI</option>
                        <option {{ $tanah->sc_tanah_scoring?->pintu == '4' ? 'selected' : '' }} value="4">PANEL
                        </option>
                    </select>
                </td>
                <td style="width: 15%">
                    <input type="text" name="pintu_nom_bangunan_{{ $loop->iteration }}"
                        id="pintu_nom_bangunan_{{ $loop->iteration }}" class="form-control form-control-sm" readonly
                        value="{{ $tanah->sc_tanah_scoring?->pintu }}">
                </td>
            </tr>
            <tr>
                <td style="width: 35%">
                    <label class="notbold" for="imb_{{ $loop->iteration }}">IMB</label>
                </td>
                <td style="width: 50%">
                    <select name="imb_{{ $loop->iteration }}" id="imb_{{ $loop->iteration }}"
                        class="form-select form-select-sm">
                        <option selected disabled value="0">-Pilih-</option>
                        <option {{ $tanah->sc_tanah_scoring?->imb == '1' ? 'selected' : '' }} value="1">ADA
                        </option>
                        <option {{ $tanah->sc_tanah_scoring?->imb == '4' ? 'selected' : '' }} value="4">TIDAK
                            ADA</option>
                    </select>
                </td>
                <td style="width: 15%">
                    <input type="text" name="imb_nom_bangunan_{{ $loop->iteration }}"
                        id="imb_nom_bangunan_{{ $loop->iteration }}" class="form-control form-control-sm" readonly
                        value="{{ $tanah->sc_tanah_scoring?->imb }}">
                </td>
            </tr>
        </table>
    </div>

    <div class="col-md-6 mb-3">
        <table class="table table-striped table-sm w-100">
            {{-- Khusus Bangunan  --}}
            @if ($tanah->detail_kategori_jaminan == 'Tanah & Bangunan')
                <tr>
                    <td style="width: 35%">
                        <label class="notbold" for="struktur_{{ $loop->iteration }}">Struktur</label>
                    </td>
                    <td style="width: 50%">
                        <select name="struktur_{{ $loop->iteration }}" id="struktur_{{ $loop->iteration }}"
                            class="form-select form-select-sm">
                            <option selected disabled value="0">-Pilih-</option>
                            <option {{ $tanah->sc_tanah_scoring?->struktur == '1' ? 'selected' : '' }}
                                value="1">BETON BERTULANG</option>
                            <option {{ $tanah->sc_tanah_scoring?->struktur == '3' ? 'selected' : '' }}
                                value="3">KAYU</option>
                        </select>
                    </td>
                    <td style="width: 15%">
                        <input type="text" name="struktur_nom_bangunan_{{ $loop->iteration }}"
                            id="struktur_nom_bangunan_{{ $loop->iteration }}" class="form-control form-control-sm"
                            readonly value="{{ $tanah->sc_tanah_scoring?->struktur }}">
                    </td>
                </tr>
            @endif

            <tr>
                <td style="width: 35%">
                    <label class="notbold" for="penutup_atap_{{ $loop->iteration }}">Penutup Atap</label>
                </td>
                <td style="width: 50%">
                    <select name="penutup_atap_{{ $loop->iteration }}" id="penutup_atap_{{ $loop->iteration }}"
                        class="form-select form-select-sm">
                        <option selected disabled value="0">-Pilih-</option>
                        <option {{ $tanah->sc_tanah_scoring?->penutup_atap == '1' ? 'selected' : '' }}
                            value="1">GENTENG KERAMIK</option>
                        <option {{ $tanah->sc_tanah_scoring?->penutup_atap == '2' ? 'selected' : '' }}
                            value="2">GENTENG BETON/PVC</option>
                        <option {{ $tanah->sc_tanah_scoring?->penutup_atap == '3' ? 'selected' : '' }}
                            value="3">GENTENG TANAH LIAT/GALVALUM</option>
                        <option {{ $tanah->sc_tanah_scoring?->penutup_atap == '4' ? 'selected' : '' }}
                            value="4">ASBES</option>
                    </select>
                </td>
                <td style="width: 15%">
                    <input type="text" name="penutup_atap_nom_bangunan_{{ $loop->iteration }}"
                        id="penutup_atap_nom_bangunan_{{ $loop->iteration }}" class="form-control form-control-sm"
                        readonly value="{{ $tanah->sc_tanah_scoring?->penutup_atap }}">
                </td>
            </tr>
            <tr>
                <td style="width: 35%">
                    <label class="notbold" for="dinding_{{ $loop->iteration }}">Dinding</label>
                </td>
                <td style="width: 50%">
                    <select name="dinding_{{ $loop->iteration }}" id="dinding_{{ $loop->iteration }}"
                        class="form-select form-select-sm">
                        <option selected disabled value="0">-Pilih-</option>
                        <option {{ $tanah->sc_tanah_scoring?->dinding == '1' ? 'selected' : '' }} value="1">BATA
                            MERAH</option>
                        <option {{ $tanah->sc_tanah_scoring?->dinding == '2' ? 'selected' : '' }} value="2">
                            BATAKO</option>
                        <option {{ $tanah->sc_tanah_scoring?->dinding == '3' ? 'selected' : '' }} value="3">
                            GYPSUM/TRIPLEK</option>
                    </select>
                </td>
                <td style="width: 15%">
                    <input type="text" name="dinding_nom_bangunan_{{ $loop->iteration }}"
                        id="dinding_nom_bangunan_{{ $loop->iteration }}" class="form-control form-control-sm"
                        readonly value="{{ $tanah->sc_tanah_scoring?->dinding }}">
                </td>
            </tr>
            <tr>
                <td style="width: 35%">
                    <label class="notbold" for="lantai_{{ $loop->iteration }}">Lantai</label>
                </td>
                <td style="width: 50%">
                    <select name="lantai_{{ $loop->iteration }}" id="lantai_{{ $loop->iteration }}"
                        class="form-select form-select-sm">
                        <option selected disabled value="0">-Pilih-</option>
                        <option {{ $tanah->sc_tanah_scoring?->lantai == '1' ? 'selected' : '' }} value="1">
                            GRANIT</option>
                        <option {{ $tanah->sc_tanah_scoring?->lantai == '2' ? 'selected' : '' }} value="2">VYNIL
                        </option>
                        <option {{ $tanah->sc_tanah_scoring?->lantai == '3' ? 'selected' : '' }} value="3">
                            KERAMIK/TRASO</option>
                        <option {{ $tanah->sc_tanah_scoring?->lantai == '4' ? 'selected' : '' }} value="4">
                            PLESTER</option>
                    </select>
                </td>
                <td style="width: 15%">
                    <input type="text" name="lantai_nom_bangunan_{{ $loop->iteration }}"
                        id="lantai_nom_bangunan_{{ $loop->iteration }}" class="form-control form-control-sm"
                        readonly value="{{ $tanah->sc_tanah_scoring?->lantai }}">
                </td>
            </tr>
            <tr>
                <td style="width: 35%">
                    <label for="total_score_bangunan_{{ $loop->iteration }}">TOTAL SCORE BANGUNAN</label>
                </td>
                <td colspan="2">
                    <input type="text" name="total_score_bangunan_{{ $loop->iteration }}"
                        id="total_score_bangunan_{{ $loop->iteration }}" class="form-control form-control-sm"
                        readonly value="{{ $tanah->sc_tanah_scoring?->total_skor_bangunan }}">
                </td>
            </tr>
        </table>
    </div>

    @if ($tanah->detail_kategori_jaminan == 'Ruko & Rukan')
        <div class="col-md-12 mb-3">
            <center>
                <div style="width: 40%">
                    <div class="form-group">
                        <label for="total_skor_rukan_{{ $loop->iteration }}">TOTAL SKOR ALL</label>
                        <input type="text" name="total_skor_rukan_{{ $loop->iteration }}"
                            id="total_skor_rukan_{{ $loop->iteration }}" class="form-control form-control-sm"
                            readonly value="{{ $tanah->sc_tanah_scoring?->total_skor_rukan }}">
                    </div>
                </div>
            </center>
        </div>
    @endif
@endif
