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
                    <option
                        {{ (data_get($tanah, "$vanalisScoring.tempat_ibadah") ?? data_get($tanah, "$vcabScoring.tempat_ibadah")) == '1' ? 'selected' : '' }}
                        value="1">
                        &gt;1km</option>
                    <option
                        {{ (data_get($tanah, "$vanalisScoring.tempat_ibadah") ?? data_get($tanah, "$vcabScoring.tempat_ibadah")) == '2' ? 'selected' : '' }}
                        value="2">
                        500m-1km</option>
                    <option
                        {{ (data_get($tanah, "$vanalisScoring.tempat_ibadah") ?? data_get($tanah, "$vcabScoring.tempat_ibadah")) == '3' ? 'selected' : '' }}
                        value="3">
                        6m-500m</option>
                </select>
            </td>
            <td style="width: 15%">
                <input type="text" name="tempat_ibadah_nom_tanah_{{ $loop->iteration }}"
                    id="tempat_ibadah_nom_tanah_{{ $loop->iteration }}" class="form-control form-control-sm" readonly
                    value="{{ data_get($tanah, "$vanalisScoring.tempat_ibadah") ?? data_get($tanah, "$vcabScoring.tempat_ibadah") }}">
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
                    <option
                        {{ (data_get($tanah, "$vanalisScoring.pasar") ?? data_get($tanah, "$vcabScoring.pasar")) == '1' ? 'selected' : '' }}
                        value="1">&lt;500m
                    </option>
                    <option
                        {{ (data_get($tanah, "$vanalisScoring.pasar") ?? data_get($tanah, "$vcabScoring.pasar")) == '2' ? 'selected' : '' }}
                        value="2">500m-1km
                    </option>
                    <option
                        {{ (data_get($tanah, "$vanalisScoring.pasar") ?? data_get($tanah, "$vcabScoring.pasar")) == '3' ? 'selected' : '' }}
                        value="3">&gt;1Km
                    </option>
                </select>
            </td>
            <td style="width: 15%">
                <input type="text" name="pasar_nom_tanah_{{ $loop->iteration }}"
                    id="pasar_nom_tanah_{{ $loop->iteration }}" class="form-control form-control-sm" readonly
                    value="{{ data_get($tanah, "$vanalisScoring.pasar") ?? data_get($tanah, "$vcabScoring.pasar") }}">
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
                    <option
                        {{ (data_get($tanah, "$vanalisScoring.sekolah") ?? data_get($tanah, "$vcabScoring.sekolah")) == '1' ? 'selected' : '' }}
                        value="1">&lt;500m
                    </option>
                    <option
                        {{ (data_get($tanah, "$vanalisScoring.sekolah") ?? data_get($tanah, "$vcabScoring.sekolah")) == '2' ? 'selected' : '' }}
                        value="2">500m-1km
                    </option>
                    <option
                        {{ (data_get($tanah, "$vanalisScoring.sekolah") ?? data_get($tanah, "$vcabScoring.sekolah")) == '3' ? 'selected' : '' }}
                        value="3">&gt;1Km
                    </option>
                </select>
            </td>
            <td style="width: 15%">
                <input type="text" name="sekolah_nom_tanah_{{ $loop->iteration }}"
                    id="sekolah_nom_tanah_{{ $loop->iteration }}" class="form-control form-control-sm" readonly
                    value="{{ data_get($tanah, "$vanalisScoring.sekolah") ?? data_get($tanah, "$vcabScoring.sekolah") }}">
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
                    <option
                        {{ (data_get($tanah, "$vanalisScoring.perkantoran") ?? data_get($tanah, "$vcabScoring.perkantoran")) == '1' ? 'selected' : '' }}
                        value="1">
                        &lt;500m</option>
                    <option
                        {{ (data_get($tanah, "$vanalisScoring.perkantoran") ?? data_get($tanah, "$vcabScoring.perkantoran")) == '2' ? 'selected' : '' }}
                        value="2">
                        500m-1km</option>
                    <option
                        {{ (data_get($tanah, "$vanalisScoring.perkantoran") ?? data_get($tanah, "$vcabScoring.perkantoran")) == '3' ? 'selected' : '' }}
                        value="3">
                        &gt;1Km</option>
                </select>
            </td>
            <td style="width: 15%">
                <input type="text" name="perkantoran_nom_tanah_{{ $loop->iteration }}"
                    id="perkantoran_nom_tanah_{{ $loop->iteration }}" class="form-control form-control-sm" readonly
                    value="{{ data_get($tanah, "$vanalisScoring.perkantoran") ?? data_get($tanah, "$vcabScoring.perkantoran") }}">
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
                    <option
                        {{ (data_get($tanah, "$vanalisScoring.sutet") ?? data_get($tanah, "$vcabScoring.sutet")) == '1' ? 'selected' : '' }}
                        value="1">&gt;1Km
                    </option>
                    <option
                        {{ (data_get($tanah, "$vanalisScoring.sutet") ?? data_get($tanah, "$vcabScoring.sutet")) == '2' ? 'selected' : '' }}
                        value="2">&gt;500m-1km
                    </option>
                    <option
                        {{ (data_get($tanah, "$vanalisScoring.sutet") ?? data_get($tanah, "$vcabScoring.sutet")) == '3' ? 'selected' : '' }}
                        value="3">500m
                    </option>
                </select>
            </td>
            <td style="width: 15%">
                <input type="text" name="sutet_nom_tanah_{{ $loop->iteration }}"
                    id="sutet_nom_tanah_{{ $loop->iteration }}" class="form-control form-control-sm" readonly
                    value="{{ data_get($tanah, "$vanalisScoring.sutet") ?? data_get($tanah, "$vcabScoring.sutet") }}">
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
                    <option
                        {{ (data_get($tanah, "$vanalisScoring.lokalisasi") ?? data_get($tanah, "$vcabScoring.lokalisasi")) == '1' ? 'selected' : '' }}
                        value="1">&gt;2Km
                    </option>
                    <option
                        {{ (data_get($tanah, "$vanalisScoring.lokalisasi") ?? data_get($tanah, "$vcabScoring.lokalisasi")) == '2' ? 'selected' : '' }}
                        value="2">
                        &gt;1Km-2km</option>
                    <option
                        {{ (data_get($tanah, "$vanalisScoring.lokalisasi") ?? data_get($tanah, "$vcabScoring.lokalisasi")) == '3' ? 'selected' : '' }}
                        value="3">1Km
                    </option>
                </select>
            </td>
            <td style="width: 15%">
                <input type="text" name="lokalisasi_nom_tanah_{{ $loop->iteration }}"
                    id="lokalisasi_nom_tanah_{{ $loop->iteration }}" class="form-control form-control-sm" readonly
                    value="{{ data_get($tanah, "$vanalisScoring.lokalisasi") ?? data_get($tanah, "$vcabScoring.lokalisasi") }}">
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
                    <option
                        {{ (data_get($tanah, "$vanalisScoring.tps") ?? data_get($tanah, "$vcabScoring.tps")) == '1' ? 'selected' : '' }}
                        value="1">&gt;2Km
                    </option>
                    <option
                        {{ (data_get($tanah, "$vanalisScoring.tps") ?? data_get($tanah, "$vcabScoring.tps")) == '2' ? 'selected' : '' }}
                        value="2">&gt;1Km-2km
                    </option>
                    <option
                        {{ (data_get($tanah, "$vanalisScoring.tps") ?? data_get($tanah, "$vcabScoring.tps")) == '3' ? 'selected' : '' }}
                        value="3">1Km</option>
                </select>
            </td>
            <td style="width: 15%">
                <input type="text" name="tps_nom_tanah_{{ $loop->iteration }}"
                    id="tps_nom_tanah_{{ $loop->iteration }}" class="form-control form-control-sm" readonly
                    value="{{ data_get($tanah, "$vanalisScoring.tps") ?? data_get($tanah, "$vcabScoring.tps") }}">
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
                    <option
                        {{ (data_get($tanah, "$vanalisScoring.pemakaman") ?? data_get($tanah, "$vcabScoring.pemakaman")) == '1' ? 'selected' : '' }}
                        value="1">&gt;1Km
                    </option>
                    <option
                        {{ (data_get($tanah, "$vanalisScoring.pemakaman") ?? data_get($tanah, "$vcabScoring.pemakaman")) == '2' ? 'selected' : '' }}
                        value="2">
                        &gt;500m-1km</option>
                    <option
                        {{ (data_get($tanah, "$vanalisScoring.pemakaman") ?? data_get($tanah, "$vcabScoring.pemakaman")) == '3' ? 'selected' : '' }}
                        value="3">6m-500m
                    </option>
                </select>
            </td>
            <td style="width: 15%">
                <input type="text" name="pemakaman_nom_tanah_{{ $loop->iteration }}"
                    id="pemakaman_nom_tanah_{{ $loop->iteration }}" class="form-control form-control-sm" readonly
                    value="{{ data_get($tanah, "$vanalisScoring.pemakaman") ?? data_get($tanah, "$vcabScoring.pemakaman") }}">
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
                    <option
                        {{ (data_get($tanah, "$vanalisScoring.resiko_longsor") ?? data_get($tanah, "$vcabScoring.resiko_longsor")) == '1' ? 'selected' : '' }}
                        value="1">
                        RENDAH</option>
                    <option
                        {{ (data_get($tanah, "$vanalisScoring.resiko_longsor") ?? data_get($tanah, "$vcabScoring.resiko_longsor")) == '3' ? 'selected' : '' }}
                        value="3">
                        SEDANG</option>
                </select>
            </td>
            <td style="width: 15%">
                <input type="text" name="resiko_longsor_nom_tanah_{{ $loop->iteration }}"
                    id="resiko_longsor_nom_tanah_{{ $loop->iteration }}" class="form-control form-control-sm"
                    readonly
                    value="{{ data_get($tanah, "$vanalisScoring.resiko_longsor") ?? data_get($tanah, "$vcabScoring.resiko_longsor") }}">
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
                    <option
                        {{ (data_get($tanah, "$vanalisScoring.resiko_banjir") ?? data_get($tanah, "$vcabScoring.resiko_banjir")) == '1' ? 'selected' : '' }}
                        value="1">
                        RENDAH</option>
                    <option
                        {{ (data_get($tanah, "$vanalisScoring.resiko_banjir") ?? data_get($tanah, "$vcabScoring.resiko_banjir")) == '3' ? 'selected' : '' }}
                        value="3">
                        SEDANG</option>
                </select>
            </td>
            <td style="width: 15%">
                <input type="text" name="resiko_banjir_nom_tanah_{{ $loop->iteration }}"
                    id="resiko_banjir_nom_tanah_{{ $loop->iteration }}" class="form-control form-control-sm" readonly
                    value="{{ data_get($tanah, "$vanalisScoring.resiko_banjir") ?? data_get($tanah, "$vcabScoring.resiko_banjir") }}">
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
                    <option
                        {{ (data_get($tanah, "$vanalisScoring.zonasi") ?? data_get($tanah, "$vcabScoring.zonasi")) == '1' ? 'selected' : '' }}
                        value="1">Kota Besar
                    </option>
                    <option
                        {{ (data_get($tanah, "$vanalisScoring.zonasi") ?? data_get($tanah, "$vcabScoring.zonasi")) == '2' ? 'selected' : '' }}
                        value="2">
                        Kota/Kabupaten</option>
                    <option
                        {{ (data_get($tanah, "$vanalisScoring.zonasi") ?? data_get($tanah, "$vcabScoring.zonasi")) == '3' ? 'selected' : '' }}
                        value="3">Kecamatan
                    </option>
                </select>
            </td>
            <td style="width: 15%">
                <input type="text" name="zonasi_nom_tanah_{{ $loop->iteration }}"
                    id="zonasi_nom_tanah_{{ $loop->iteration }}" class="form-control form-control-sm" readonly
                    value="{{ data_get($tanah, "$vanalisScoring.zonasi") ?? data_get($tanah, "$vcabScoring.zonasi") }}">
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
                    <option
                        {{ (data_get($tanah, "$vanalisScoring.akses_jalan") ?? data_get($tanah, "$vcabScoring.akses_jalan")) == '1' ? 'selected' : '' }}
                        value="1">
                        &gt;3
                        meter</option>
                    <option
                        {{ (data_get($tanah, "$vanalisScoring.akses_jalan") ?? data_get($tanah, "$vcabScoring.akses_jalan")) == '2' ? 'selected' : '' }}
                        value="2">3
                        meter</option>
                </select>
            </td>
            <td style="width: 15%">
                <input type="text" name="akses_jalan_nom_tanah_{{ $loop->iteration }}"
                    id="akses_jalan_nom_tanah_{{ $loop->iteration }}" class="form-control form-control-sm" readonly
                    value="{{ data_get($tanah, "$vanalisScoring.akses_jalan") ?? data_get($tanah, "$vcabScoring.akses_jalan") }}">
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
                    <option
                        {{ (data_get($tanah, "$vanalisScoring.kondisi_jalan") ?? data_get($tanah, "$vcabScoring.kondisi_jalan")) == '1' ? 'selected' : '' }}
                        value="1">
                        BETON COR/ASPAL/PAVING</option>
                    <option
                        {{ (data_get($tanah, "$vanalisScoring.kondisi_jalan") ?? data_get($tanah, "$vcabScoring.kondisi_jalan")) == '3' ? 'selected' : '' }}
                        value="3">
                        TANAH</option>
                </select>
            </td>
            <td style="width: 15%">
                <input type="text" name="kondisi_jalan_nom_tanah_{{ $loop->iteration }}"
                    id="kondisi_jalan_nom_tanah_{{ $loop->iteration }}" class="form-control form-control-sm"
                    readonly
                    value="{{ data_get($tanah, "$vanalisScoring.kondisi_jalan") ?? data_get($tanah, "$vcabScoring.kondisi_jalan") }}">
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
                    <option
                        {{ (data_get($tanah, "$vanalisScoring.tusuk_sate") ?? data_get($tanah, "$vcabScoring.tusuk_sate")) == '1' ? 'selected' : '' }}
                        value="1">TIDAK
                    </option>
                    <option
                        {{ (data_get($tanah, "$vanalisScoring.tusuk_sate") ?? data_get($tanah, "$vcabScoring.tusuk_sate")) == '3' ? 'selected' : '' }}
                        value="3">YA
                        (BUKAN JALAN UTAMA)</option>
                </select>
            </td>
            <td style="width: 15%">
                <input type="text" name="tusuk_sate_nom_tanah_{{ $loop->iteration }}"
                    id="tusuk_sate_nom_tanah_{{ $loop->iteration }}" class="form-control form-control-sm" readonly
                    value="{{ data_get($tanah, "$vanalisScoring.tusuk_sate") ?? data_get($tanah, "$vcabScoring.tusuk_sate") }}">
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
                    <option
                        {{ (data_get($tanah, "$vanalisScoring.bentuk_tanah") ?? data_get($tanah, "$vcabScoring.bentuk_tanah")) == '1' ? 'selected' : '' }}
                        value="1">
                        PERSEGI PANJANG</option>
                    <option
                        {{ (data_get($tanah, "$vanalisScoring.bentuk_tanah") ?? data_get($tanah, "$vcabScoring.bentuk_tanah")) == '2' ? 'selected' : '' }}
                        value="2">
                        TRAPESIUM</option>
                    <option
                        {{ (data_get($tanah, "$vanalisScoring.bentuk_tanah") ?? data_get($tanah, "$vcabScoring.bentuk_tanah")) == '3' ? 'selected' : '' }}
                        value="3">
                        LAINNYA</option>
                </select>
            </td>
            <td style="width: 15%">
                <input type="text" name="bentuk_tanah_nom_tanah_{{ $loop->iteration }}"
                    id="bentuk_tanah_nom_tanah_{{ $loop->iteration }}" class="form-control form-control-sm" readonly
                    value="{{ data_get($tanah, "$vanalisScoring.bentuk_tanah") ?? data_get($tanah, "$vcabScoring.bentuk_tanah") }}">
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
                    <option
                        {{ (data_get($tanah, "$vanalisScoring.lebar_muka") ?? data_get($tanah, "$vcabScoring.lebar_muka")) == '1' ? 'selected' : '' }}
                        value="1">LEBAR
                        DIBELAKANG</option>
                    <option
                        {{ (data_get($tanah, "$vanalisScoring.lebar_muka") ?? data_get($tanah, "$vcabScoring.lebar_muka")) == '2' ? 'selected' : '' }}
                        value="2">SAMA
                        LEBAR</option>
                    <option
                        {{ (data_get($tanah, "$vanalisScoring.lebar_muka") ?? data_get($tanah, "$vcabScoring.lebar_muka")) == '3' ? 'selected' : '' }}
                        value="3">LEBAR
                        DIDEPAN</option>
                </select>
            </td>
            <td style="width: 15%">
                <input type="text" name="lebar_muka_nom_tanah_{{ $loop->iteration }}"
                    id="lebar_muka_nom_tanah_{{ $loop->iteration }}" class="form-control form-control-sm" readonly
                    value="{{ data_get($tanah, "$vanalisScoring.lebar_muka") ?? data_get($tanah, "$vcabScoring.lebar_muka") }}">
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
                    <option
                        {{ (data_get($tanah, "$vanalisScoring.kontur") ?? data_get($tanah, "$vcabScoring.kontur")) == '1' ? 'selected' : '' }}
                        value="1">DATAR
                    </option>
                    <option
                        {{ (data_get($tanah, "$vanalisScoring.kontur") ?? data_get($tanah, "$vcabScoring.kontur")) == '2' ? 'selected' : '' }}
                        value="2">LANDAI
                    </option>
                    <option
                        {{ (data_get($tanah, "$vanalisScoring.kontur") ?? data_get($tanah, "$vcabScoring.kontur")) == '3' ? 'selected' : '' }}
                        value="3">CURAM
                    </option>
                </select>
            </td>
            <td style="width: 15%">
                <input type="text" name="kontur_nom_tanah_{{ $loop->iteration }}"
                    id="kontur_nom_tanah_{{ $loop->iteration }}" class="form-control form-control-sm" readonly
                    value="{{ data_get($tanah, "$vanalisScoring.kontur") ?? data_get($tanah, "$vcabScoring.kontur") }}">
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
                    <option
                        {{ (data_get($tanah, "$vanalisScoring.elevasi") ?? data_get($tanah, "$vcabScoring.elevasi")) == '1' ? 'selected' : '' }}
                        value="1">LEBIH
                        TINGGI &gt;50m</option>
                    <option
                        {{ (data_get($tanah, "$vanalisScoring.elevasi") ?? data_get($tanah, "$vcabScoring.elevasi")) == '2' ? 'selected' : '' }}
                        value="2">SEJAJAR
                        JALAN</option>
                    <option
                        {{ (data_get($tanah, "$vanalisScoring.elevasi") ?? data_get($tanah, "$vcabScoring.elevasi")) == '3' ? 'selected' : '' }}
                        value="3">LEBIH
                        RENDAH &gt;50m</option>
                </select>
            </td>
            <td style="width: 15%">
                <input type="text" name="elevasi_nom_tanah_{{ $loop->iteration }}"
                    id="elevasi_nom_tanah_{{ $loop->iteration }}" class="form-control form-control-sm" readonly
                    value="{{ data_get($tanah, "$vanalisScoring.elevasi") ?? data_get($tanah, "$vcabScoring.elevasi") }}">
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
                    <option
                        {{ (data_get($tanah, "$vanalisScoring.rel_kereta") ?? data_get($tanah, "$vcabScoring.rel_kereta")) == '1' ? 'selected' : '' }}
                        value="1">TIDAK
                    </option>
                    <option
                        {{ (data_get($tanah, "$vanalisScoring.rel_kereta") ?? data_get($tanah, "$vcabScoring.rel_kereta")) == '3' ? 'selected' : '' }}
                        value="3">YA
                    </option>
                </select>
            </td>
            <td style="width: 15%">
                <input type="text" name="rel_kereta_nom_tanah_{{ $loop->iteration }}"
                    id="rel_kereta_nom_tanah_{{ $loop->iteration }}" class="form-control form-control-sm" readonly
                    value="{{ data_get($tanah, "$vanalisScoring.rel_kereta") ?? data_get($tanah, "$vcabScoring.rel_kereta") }}">
            </td>
        </tr>
        <tr>
            <td style="width: 35%">
                <label for="total_score_tanah_{{ $loop->iteration }}">TOTAL SCORE TANAH</label>
            </td>
            <td colspan="2">
                <input type="text" name="total_score_tanah_{{ $loop->iteration }}"
                    id="total_score_tanah_{{ $loop->iteration }}" class="form-control form-control-sm" readonly
                    value="{{ data_get($tanah, "$vanalisScoring.total_score_tanah") ?? data_get($tanah, "$vcabScoring.total_score_tanah") }}">
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
                        <option
                            {{ (data_get($tanah, "$vanalisScoring.pondasi") ?? data_get($tanah, "$vcabScoring.pondasi")) == '1' ? 'selected' : '' }}
                            value="1">
                            BERPONDASI</option>
                        <option
                            {{ (data_get($tanah, "$vanalisScoring.pondasi") ?? data_get($tanah, "$vcabScoring.pondasi")) == '4' ? 'selected' : '' }}
                            value="4">
                            TIDAK ADA</option>
                    </select>
                </td>
                <td style="width: 15%">
                    <input type="text" name="pondasi_nom_bangunan_{{ $loop->iteration }}"
                        id="pondasi_nom_bangunan_{{ $loop->iteration }}" class="form-control form-control-sm"
                        readonly
                        value="{{ data_get($tanah, "$vanalisScoring.pondasi") ?? data_get($tanah, "$vcabScoring.pondasi") }}">
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
                        <option
                            {{ (data_get($tanah, "$vanalisScoring.rangka_atap") ?? data_get($tanah, "$vcabScoring.rangka_atap")) == '1' ? 'selected' : '' }}
                            value="1">
                            BESI U/C</option>
                        <option
                            {{ (data_get($tanah, "$vanalisScoring.rangka_atap") ?? data_get($tanah, "$vcabScoring.rangka_atap")) == '2' ? 'selected' : '' }}
                            value="2">
                            BAJA RINGAN</option>
                        <option
                            {{ (data_get($tanah, "$vanalisScoring.rangka_atap") ?? data_get($tanah, "$vcabScoring.rangka_atap")) == '3' ? 'selected' : '' }}
                            value="3">
                            KAYU</option>
                    </select>
                </td>
                <td style="width: 15%">
                    <input type="text" name="rangka_atap_nom_bangunan_{{ $loop->iteration }}"
                        id="rangka_atap_nom_bangunan_{{ $loop->iteration }}" class="form-control form-control-sm"
                        readonly
                        value="{{ data_get($tanah, "$vanalisScoring.rangka_atap") ?? data_get($tanah, "$vcabScoring.rangka_atap") }}">
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
                        <option
                            {{ (data_get($tanah, "$vanalisScoring.plafon") ?? data_get($tanah, "$vcabScoring.plafon")) == '1' ? 'selected' : '' }}
                            value="1">PVC
                        </option>
                        <option
                            {{ (data_get($tanah, "$vanalisScoring.plafon") ?? data_get($tanah, "$vcabScoring.plafon")) == '2' ? 'selected' : '' }}
                            value="2">
                            GYPSUM</option>
                        <option
                            {{ (data_get($tanah, "$vanalisScoring.plafon") ?? data_get($tanah, "$vcabScoring.plafon")) == '3' ? 'selected' : '' }}
                            value="3">
                            TRIPLEK/ETERNIT/KALSIBOARD</option>
                        <option
                            {{ (data_get($tanah, "$vanalisScoring.plafon") ?? data_get($tanah, "$vcabScoring.plafon")) == '4' ? 'selected' : '' }}
                            value="4">TIDAK
                            ADA</option>
                    </select>
                </td>
                <td style="width: 15%">
                    <input type="text" name="plafon_nom_bangunan_{{ $loop->iteration }}"
                        id="plafon_nom_bangunan_{{ $loop->iteration }}" class="form-control form-control-sm"
                        readonly
                        value="{{ data_get($tanah, "$vanalisScoring.plafon") ?? data_get($tanah, "$vcabScoring.plafon") }}">
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
                        <option
                            {{ (data_get($tanah, "$vanalisScoring.pintu") ?? data_get($tanah, "$vcabScoring.pintu")) == '1' ? 'selected' : '' }}
                            value="1">BAJA
                        </option>
                        <option
                            {{ (data_get($tanah, "$vanalisScoring.pintu") ?? data_get($tanah, "$vcabScoring.pintu")) == '2' ? 'selected' : '' }}
                            value="2">KAYU
                            JATI</option>
                        <option
                            {{ (data_get($tanah, "$vanalisScoring.pintu") ?? data_get($tanah, "$vcabScoring.pintu")) == '3' ? 'selected' : '' }}
                            value="3">KAYU
                            NON JATI</option>
                        <option
                            {{ (data_get($tanah, "$vanalisScoring.pintu") ?? data_get($tanah, "$vcabScoring.pintu")) == '4' ? 'selected' : '' }}
                            value="4">PANEL
                        </option>
                    </select>
                </td>
                <td style="width: 15%">
                    <input type="text" name="pintu_nom_bangunan_{{ $loop->iteration }}"
                        id="pintu_nom_bangunan_{{ $loop->iteration }}" class="form-control form-control-sm" readonly
                        value="{{ data_get($tanah, "$vanalisScoring.pintu") ?? data_get($tanah, "$vcabScoring.pintu") }}">
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
                        <option
                            {{ (data_get($tanah, "$vanalisScoring.imb") ?? data_get($tanah, "$vcabScoring.imb")) == '1' ? 'selected' : '' }}
                            value="1">ADA
                        </option>
                        <option
                            {{ (data_get($tanah, "$vanalisScoring.imb") ?? data_get($tanah, "$vcabScoring.imb")) == '4' ? 'selected' : '' }}
                            value="4">TIDAK
                            ADA</option>
                    </select>
                </td>
                <td style="width: 15%">
                    <input type="text" name="imb_nom_bangunan_{{ $loop->iteration }}"
                        id="imb_nom_bangunan_{{ $loop->iteration }}" class="form-control form-control-sm" readonly
                        value="{{ data_get($tanah, "$vanalisScoring.imb") ?? data_get($tanah, "$vcabScoring.imb") }}">
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
                            <option
                                {{ (data_get($tanah, "$vanalisScoring.struktur") ?? data_get($tanah, "$vcabScoring.struktur")) == '1' ? 'selected' : '' }}
                                value="1">BETON BERTULANG</option>
                            <option
                                {{ (data_get($tanah, "$vanalisScoring.struktur") ?? data_get($tanah, "$vcabScoring.struktur")) == '3' ? 'selected' : '' }}
                                value="3">KAYU</option>
                        </select>
                    </td>
                    <td style="width: 15%">
                        <input type="text" name="struktur_nom_bangunan_{{ $loop->iteration }}"
                            id="struktur_nom_bangunan_{{ $loop->iteration }}" class="form-control form-control-sm"
                            readonly
                            value="{{ data_get($tanah, "$vanalisScoring.struktur") ?? data_get($tanah, "$vcabScoring.struktur") }}">
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
                        <option
                            {{ (data_get($tanah, "$vanalisScoring.penutup_atap") ?? data_get($tanah, "$vcabScoring.penutup_atap")) == '1' ? 'selected' : '' }}
                            value="1">GENTENG KERAMIK</option>
                        <option
                            {{ (data_get($tanah, "$vanalisScoring.penutup_atap") ?? data_get($tanah, "$vcabScoring.penutup_atap")) == '2' ? 'selected' : '' }}
                            value="2">GENTENG BETON/PVC</option>
                        <option
                            {{ (data_get($tanah, "$vanalisScoring.penutup_atap") ?? data_get($tanah, "$vcabScoring.penutup_atap")) == '3' ? 'selected' : '' }}
                            value="3">GENTENG TANAH LIAT/GALVALUM</option>
                        <option
                            {{ (data_get($tanah, "$vanalisScoring.penutup_atap") ?? data_get($tanah, "$vcabScoring.penutup_atap")) == '4' ? 'selected' : '' }}
                            value="4">ASBES</option>
                    </select>
                </td>
                <td style="width: 15%">
                    <input type="text" name="penutup_atap_nom_bangunan_{{ $loop->iteration }}"
                        id="penutup_atap_nom_bangunan_{{ $loop->iteration }}" class="form-control form-control-sm"
                        readonly
                        value="{{ data_get($tanah, "$vanalisScoring.penutup_atap") ?? data_get($tanah, "$vcabScoring.penutup_atap") }}">
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
                        <option
                            {{ (data_get($tanah, "$vanalisScoring.dinding") ?? data_get($tanah, "$vcabScoring.dinding")) == '1' ? 'selected' : '' }}
                            value="1">BATA
                            MERAH</option>
                        <option
                            {{ (data_get($tanah, "$vanalisScoring.dinding") ?? data_get($tanah, "$vcabScoring.dinding")) == '2' ? 'selected' : '' }}
                            value="2">
                            BATAKO</option>
                        <option
                            {{ (data_get($tanah, "$vanalisScoring.dinding") ?? data_get($tanah, "$vcabScoring.dinding")) == '3' ? 'selected' : '' }}
                            value="3">
                            GYPSUM/TRIPLEK</option>
                    </select>
                </td>
                <td style="width: 15%">
                    <input type="text" name="dinding_nom_bangunan_{{ $loop->iteration }}"
                        id="dinding_nom_bangunan_{{ $loop->iteration }}" class="form-control form-control-sm"
                        readonly
                        value="{{ data_get($tanah, "$vanalisScoring.dinding") ?? data_get($tanah, "$vcabScoring.dinding") }}">
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
                        <option
                            {{ (data_get($tanah, "$vanalisScoring.lantai") ?? data_get($tanah, "$vcabScoring.lantai")) == '1' ? 'selected' : '' }}
                            value="1">
                            GRANIT</option>
                        <option
                            {{ (data_get($tanah, "$vanalisScoring.lantai") ?? data_get($tanah, "$vcabScoring.lantai")) == '2' ? 'selected' : '' }}
                            value="2">VYNIL
                        </option>
                        <option
                            {{ (data_get($tanah, "$vanalisScoring.lantai") ?? data_get($tanah, "$vcabScoring.lantai")) == '3' ? 'selected' : '' }}
                            value="3">
                            KERAMIK/TRASO</option>
                        <option
                            {{ (data_get($tanah, "$vanalisScoring.lantai") ?? data_get($tanah, "$vcabScoring.lantai")) == '4' ? 'selected' : '' }}
                            value="4">
                            PLESTER</option>
                    </select>
                </td>
                <td style="width: 15%">
                    <input type="text" name="lantai_nom_bangunan_{{ $loop->iteration }}"
                        id="lantai_nom_bangunan_{{ $loop->iteration }}" class="form-control form-control-sm"
                        readonly
                        value="{{ data_get($tanah, "$vanalisScoring.lantai") ?? data_get($tanah, "$vcabScoring.lantai") }}">
                </td>
            </tr>
            <tr>
                <td style="width: 35%">
                    <label for="total_score_bangunan_{{ $loop->iteration }}">TOTAL SCORE BANGUNAN</label>
                </td>
                <td colspan="2">
                    <input type="text" name="total_score_bangunan_{{ $loop->iteration }}"
                        id="total_score_bangunan_{{ $loop->iteration }}" class="form-control form-control-sm"
                        readonly
                        value="{{ data_get($tanah, "$vanalisScoring.total_skor_bangunan") ?? data_get($tanah, "$vcabScoring.total_skor_bangunan") }}">
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
                            readonly
                            value="{{ data_get($tanah, "$vanalisScoring.total_skor_rukan") ?? data_get($tanah, "$vcabScoring.total_skor_rukan") }}">
                    </div>
                </div>
            </center>
        </div>
    @endif
@endif
