<input type="hidden" name="type_sertifikat_{{ $loop->iteration }}" id="type_sertifikat_{{ $loop->iteration }}"
    value="{{ $tanah->type_sertifikat }}">

<div class="col-md-8 mb-4">
    <div class="form-group">
        <label for="nama_deb_{{ $loop->iteration }}">Nama Debitur</label>
        <input type="text" class="form-control form-control-sm" name="nama_deb_{{ $loop->iteration }}"
            id="nama_deb_{{ $loop->iteration }}" required value="{{ $debitur->nama_debitur }}">
    </div>
</div>
<div class="col-md-4 mb-4">
    <div class="form-group">
        <label for="tgl_penilaian_{{ $loop->iteration }}">Tgl Penilaian</label>
        <input type="date" class="form-control form-control-sm" name="tgl_penilaian_{{ $loop->iteration }}"
            id="tgl_penilaian_{{ $loop->iteration }}" required
            value="{{ optional(data_get($tanah, "$vanalis.tgl_penilaian"))->format('Y-m-d') ?? (optional(data_get($tanah, "$vcab.tgl_penilaian"))->format('Y-m-d') ?? now()->format('Y-m-d')) }}">
    </div>
</div>
<div class="col-md-8 mb-4">
    <div class="form-group">
        <label for="lokasi_{{ $loop->iteration }}">Lokasi Agunan</label>
        <textarea name="lokasi_{{ $loop->iteration }}" id="lokasi_{{ $loop->iteration }}" cols="25" rows="3"
            class="form-control" required>{{ data_get($tanah, "$vanalis.lokasi") ?? data_get($tanah, "$vcab.lokasi") }}</textarea>
    </div>
</div>
<div class="col-md-4 mb-4">
    <div class="form-group">
        <label for="penilai_{{ $loop->iteration }}">Penilai</label>
        <input type="text" class="form-control form-control-sm" name="penilai_{{ $loop->iteration }}"
            id="penilai_{{ $loop->iteration }}" required
            value="{{ data_get($tanah, "$vanalis.penilai") ?? (data_get($tanah, "$vcab.penilai") ?? auth()->user()->nama) }}">
    </div>
    <div class="form-group mt-2">
        <label for="luas_tanah_{{ $loop->iteration }}">Luas Tanah</label>
        <div class="input-group input-group-sm">
            <input type="number" class="form-control form-control-sm" name="luas_tanah_{{ $loop->iteration }}"
                id="luas_tanah_{{ $loop->iteration }}" required min="0"
                value="{{ data_get($tanah, "$vanalis.luas_tanah") ?? data_get($tanah, "$vcab.luas_tanah") }}">
            <span class="input-group-text">M²</span>
        </div>
    </div>
</div>
<div class="col-md-3 mb-4">
    <div class="form-group">
        <label for="batas_utara_{{ $loop->iteration }}">Batas Utara</label>
        <input type="text" class="form-control form-control-sm" name="batas_utara_{{ $loop->iteration }}"
            id="batas_utara_{{ $loop->iteration }}" required
            value="{{ data_get($tanah, "$vanalis.batas_utara") ?? data_get($tanah, "$vcab.batas_utara") }}">
    </div>
</div>
<div class="col-md-3 mb-4">
    <div class="form-group">
        <label for="batas_selatan_{{ $loop->iteration }}">Selatan</label>
        <input type="text" class="form-control form-control-sm" name="batas_selatan_{{ $loop->iteration }}"
            id="batas_selatan_{{ $loop->iteration }}" required
            value="{{ data_get($tanah, "$vanalis.batas_selatan") ?? data_get($tanah, "$vcab.batas_selatan") }}">
    </div>
</div>
<div class="col-md-3 mb-4">
    <div class="form-group">
        <label for="batas_timur_{{ $loop->iteration }}">Timur</label>
        <input type="text" class="form-control form-control-sm" name="batas_timur_{{ $loop->iteration }}"
            id="batas_timur_{{ $loop->iteration }}" required
            value="{{ data_get($tanah, "$vanalis.batas_timur") ?? data_get($tanah, "$vcab.batas_timur") }}">
    </div>
</div>
<div class="col-md-3 mb-4">
    <div class="form-group">
        <label for="batas_barat_{{ $loop->iteration }}">Barat</label>
        <input type="text" class="form-control form-control-sm" name="batas_barat_{{ $loop->iteration }}"
            id="batas_barat_{{ $loop->iteration }}" required
            value="{{ data_get($tanah, "$vanalis.batas_barat") ?? data_get($tanah, "$vcab.batas_barat") }}">
    </div>
</div>
<div class="col-md-4 mb-4">
    <div class="form-group">
        <label for="hak_kepemilikan_{{ $loop->iteration }}">Hak Kepemilikan</label>
        <input type="text" class="form-control form-control-sm" name="hak_kepemilikan_{{ $loop->iteration }}"
            id="hak_kepemilikan_{{ $loop->iteration }}" required maxlength="20"
            oninput="this.value = this.value.toUpperCase()"
            value="{{ data_get($tanah, "$vanalis.hak_kepemilikan") ?? (data_get($tanah, "$vcab.hak_kepemilikan") ?? $tanah->hak_kepemilikan) }}">
    </div>
</div>
<div class="col-md-4 mb-4">
    <div class="form-group">
        <label for="nomor_{{ $loop->iteration }}">Nomor</label>
        <input type="text" class="form-control form-control-sm" name="nomor_{{ $loop->iteration }}"
            id="nomor_{{ $loop->iteration }}" required
            value="{{ data_get($tanah, "$vanalis.nomor") ?? (data_get($tanah, "$vcab.nomor") ?? $tanah->no_shm_shgb) }}">
    </div>
</div>
<div class="col-md-4 mb-4">
    <div class="form-group">
        <label for="atas_nama_{{ $loop->iteration }}">Atas Nama</label>
        <input type="text" class="form-control form-control-sm" name="atas_nama_{{ $loop->iteration }}"
            id="atas_nama_{{ $loop->iteration }}" required
            value="{{ data_get($tanah, "$vanalis.atas_nama") ?? (data_get($tanah, "$vcab.atas_nama") ?? $tanah->atas_nama) }}">
    </div>
</div>
<div class="col-md-4 mb-4">
    <div class="form-group">
        <div class="d-flex justify-content-between">
            <label for="tgl_berakhir_sertif_{{ $loop->iteration }}">Tgl Berakhir Sertifikat</label>
            <label for="tgl_berakhir_sertif_{{ $loop->iteration }}" data-bs-toggle="tooltip" data-bs-placement="top"
                data-bs-custom-class="custom-tooltip" data-bs-title="Untuk Selain SHM">
                <i class="fa-solid fa-circle-question"></i>
            </label>
        </div>
        <input type="date" name="tgl_berakhir_sertif_{{ $loop->iteration }}"
            id="tgl_berakhir_sertif_{{ $loop->iteration }}" class="form-control form-control-sm"
            {{ data_get($tanah, "$vanalis.hak_kepemilikan") == 'SHM' || data_get($tanah, "$vcab.hak_kepemilikan") == 'SHM' ? null : 'required' }}
            value="{{ data_get($tanah, "$vanalis.tgl_berakhir_sertif") ?? data_get($tanah, "$vcab.tgl_berakhir_sertif")?->format('Y-m-d') }}">
        <i id="tgl_sertif_danger_{{ $loop->iteration }}" class="text-danger d-none" style="font-weight: bold">Tidak
            Perlu Jika Hak Kepemilikan SHM,
            silahkan ubah dulu!</i>
    </div>
</div>
<div class="col-md-4 mb-4">
    <div class="form-group">
        <div class="d-flex justify-content-between">
            <label class="req" for="edisi_{{ $loop->iteration }}">Edisi</label>
            <label for="edisi_{{ $loop->iteration }}" data-bs-toggle="tooltip" data-bs-placement="top"
                data-bs-custom-class="custom-tooltip"
                data-bs-title="Untuk Sertifikat Elektronik jika selain itu isi (-)">
                <i class="fa-solid fa-circle-question"></i>
            </label>
        </div>
        <input type="text" class="form-control form-control-sm" name="edisi_{{ $loop->iteration }}"
            id="edisi_{{ $loop->iteration }}" required
            value="{{ data_get($tanah, "$vanalis.edisi") ?? data_get($tanah, "$vcab.edisi") }}">
    </div>
</div>
<div class="col-md-4 mb-4">
    <div class="form-group">
        <label for="no_gs_{{ $loop->iteration }}">No. GS</label>
        <input type="text" class="form-control form-control-sm" name="no_gs_{{ $loop->iteration }}"
            id="no_gs_{{ $loop->iteration }}" required
            value="{{ data_get($tanah, "$vanalis.no_gs") ?? data_get($tanah, "$vcab.no_gs") }}">
    </div>
</div>

{{-- Khusus untuk Bangunan dan Rukan --}}
@if ($tanah->detail_kategori_jaminan != 'Tanah')
    <div class="col-md-4 mb-4">
        <div class="form-group">
            <label class="req" for="luas_bangunan_{{ $loop->iteration }}">Luas Bangunan (IMB/PBB)</label>
            <div class="input-group input-group-sm">
                <input type="number" class="form-control form-control-sm"
                    name="luas_bangunan_{{ $loop->iteration }}" id="luas_bangunan_{{ $loop->iteration }}" required
                    min="0"
                    value="{{ data_get($tanah, "$vanalis.luas_bangunan") ?? data_get($tanah, "$vcab.luas_bangunan") }}">
                <span class="input-group-text">M²</span>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="form-group">
            <label class="req" for="luas_bangunan_fisik_{{ $loop->iteration }}">Luas Bangunan Fisik</label>
            <div class="input-group input-group-sm">
                <input type="number" class="form-control form-control-sm"
                    name="luas_bangunan_fisik_{{ $loop->iteration }}"
                    id="luas_bangunan_fisik_{{ $loop->iteration }}" required min="0"
                    value="{{ data_get($tanah, "$vanalis.luas_bangunan_fisik") ?? data_get($tanah, "$vcab.luas_bangunan_fisik") }}">
                <span class="input-group-text">M²</span>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="form-group">
            <label class="req" for="beda_luas_bangunan_{{ $loop->iteration }}">Beda Luas Bangunan</label>
            <div class="input-group input-group-sm">
                <input type="number" class="form-control form-control-sm"
                    name="beda_luas_bangunan_{{ $loop->iteration }}" id="beda_luas_bangunan_{{ $loop->iteration }}"
                    required min="0"
                    value="{{ data_get($tanah, "$vanalis.beda_luas_bangunan") ?? data_get($tanah, "$vcab.beda_luas_bangunan") }}">
                <span class="input-group-text">M²</span>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="form-group">
            <label for="thn_pembangunan_{{ $loop->iteration }}">Tahun Pembangunan</label>
            <input type="number" class="form-control form-control-sm" name="thn_pembangunan_{{ $loop->iteration }}"
                id="thn_pembangunan_{{ $loop->iteration }}" required min="0"
                value="{{ data_get($tanah, "$vanalis.thn_pembangunan") ?? data_get($tanah, "$vcab.thn_pembangunan") }}">
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="form-group">
            <label for="thn_renov_akhir_{{ $loop->iteration }}">Tahun Renovasi Terakhir</label>
            <input type="number" class="form-control form-control-sm" name="thn_renov_akhir_{{ $loop->iteration }}"
                id="thn_renov_akhir_{{ $loop->iteration }}" required min="0"
                value="{{ data_get($tanah, "$vanalis.thn_renov_akhir") ?? data_get($tanah, "$vcab.thn_renov_akhir") }}">
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="form-group">
            <label class="req" for="umur_efektif_{{ $loop->iteration }}">Umur Efektif</label>
            <div class="input-group input-group-sm">
                <input type="number" class="form-control form-control-sm"
                    name="umur_efektif_{{ $loop->iteration }}" id="umur_efektif_{{ $loop->iteration }}" required
                    min="0"
                    value="{{ data_get($tanah, "$vanalis.umur_efektif") ?? data_get($tanah, "$vcab.umur_efektif") }}">
                <span class="input-group-text">Tahun</span>
            </div>
        </div>
    </div>

    {{-- khusus Bangunan --}}
    @if ($tanah->detail_kategori_jaminan == 'Tanah & Bangunan')
        <div class="col-md-12 mb-4">
            <div class="form-group">
                <label for="penggunaan_bangunan_{{ $loop->iteration }}">Penggunaan Bangunan</label>
                <input type="text" class="form-control form-control-sm"
                    name="penggunaan_bangunan_{{ $loop->iteration }}"
                    id="penggunaan_bangunan_{{ $loop->iteration }}" required min="0"
                    value="{{ data_get($tanah, "$vanalis.penggunaan_bangunan") ?? data_get($tanah, "$vcab.penggunaan_bangunan") }}">
            </div>
        </div>
    @endif

    <div class="col-md-2 mb-4">
        <div class="form-group">
            <label for="kamar_tidur_{{ $loop->iteration }}">Kamar Tidur</label>
            <select name="kamar_tidur_{{ $loop->iteration }}" id="kamar_tidur_{{ $loop->iteration }}"
                class="form-select form-select-sm" required>
                <option disabled selected>-Pilih-</option>
                <option
                    {{ (data_get($tanah, "$vanalis.kamar_tidur") ?? data_get($tanah, "$vcab.kamar_tidur")) == 'Ada' ? 'selected' : '' }}
                    value="Ada">Ada
                </option>
                <option
                    {{ (data_get($tanah, "$vanalis.kamar_tidur") ?? data_get($tanah, "$vcab.kamar_tidur")) == 'Tidak Ada' ? 'selected' : '' }}
                    value="Tidak Ada">Tidak Ada</option>
            </select>
        </div>
    </div>
    <div class="col-md-2 mb-4">
        <div class="form-group">
            <label for="jumlah_kt_{{ $loop->iteration }}" data-bs-toggle="tooltip" data-bs-placement="top"
                data-bs-custom-class="custom-tooltip" data-bs-title="Diisi dengan jumlah kamar tidur">
                <i class="fa-solid fa-circle-question"></i>
            </label>
            <input type="number" class="form-control form-control-sm" name="jumlah_kt_{{ $loop->iteration }}"
                id="jumlah_kt_{{ $loop->iteration }}" required min="0"
                value="{{ data_get($tanah, "$vanalis.jumlah_kt") ?? data_get($tanah, "$vcab.jumlah_kt") }}">
        </div>
    </div>
    <div class="col-md-2 mb-4">
        <div class="form-group">
            <label for="kamar_mandi_{{ $loop->iteration }}">Kamar Mandi</label>
            <select name="kamar_mandi_{{ $loop->iteration }}" id="kamar_mandi_{{ $loop->iteration }}"
                class="form-select form-select-sm" required>
                <option disabled selected>-Pilih-</option>
                <option
                    {{ (data_get($tanah, "$vanalis.kamar_mandi") ?? data_get($tanah, "$vcab.kamar_mandi")) == 'Ada' ? 'selected' : '' }}
                    value="Ada">Ada
                </option>
                <option
                    {{ (data_get($tanah, "$vanalis.kamar_mandi") ?? data_get($tanah, "$vcab.kamar_mandi")) == 'Tidak Ada' ? 'selected' : '' }}
                    value="Tidak Ada">Tidak Ada</option>
            </select>
        </div>
    </div>
    <div class="col-md-2 mb-4">
        <div class="form-group">
            <label for="jumlah_km_{{ $loop->iteration }}" data-bs-toggle="tooltip" data-bs-placement="top"
                data-bs-custom-class="custom-tooltip" data-bs-title="Diisi dengan jumlah kamar mandi">
                <i class="fa-solid fa-circle-question"></i>
            </label>
            <input type="number" class="form-control form-control-sm" name="jumlah_km_{{ $loop->iteration }}"
                id="jumlah_km_{{ $loop->iteration }}" required min="0"
                value="{{ data_get($tanah, "$vanalis.jumlah_km") ?? data_get($tanah, "$vcab.jumlah_km") }}">
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="form-group">
            <label for="jumlah_lantai_{{ $loop->iteration }}">Jumlah Lantai</label>
            <input type="number" class="form-control form-control-sm" name="jumlah_lantai_{{ $loop->iteration }}"
                id="jumlah_lantai_{{ $loop->iteration }}" required min="0"
                value="{{ data_get($tanah, "$vanalis.jumlah_lantai") ?? data_get($tanah, "$vcab.jumlah_lantai") }}">
        </div>
    </div>
    <div class="col-md-2 mb-4">
        <div class="form-group">
            <label for="jaringan_listrik_{{ $loop->iteration }}">Jaringan Listrik</label>
            <select name="jaringan_listrik_{{ $loop->iteration }}" id="jaringan_listrik_{{ $loop->iteration }}"
                class="form-select form-select-sm" required>
                <option disabled selected>-Pilih-</option>
                <option
                    {{ (data_get($tanah, "$vanalis.jaringan_listrik") ?? data_get($tanah, "$vcab.jaringan_listrik")) == '450VA' ? 'selected' : '' }}
                    value="450VA">
                    450VA</option>
                <option
                    {{ (data_get($tanah, "$vanalis.jaringan_listrik") ?? data_get($tanah, "$vcab.jaringan_listrik")) == '900VA' ? 'selected' : '' }}
                    value="900VA">
                    900VA</option>
                <option
                    {{ (data_get($tanah, "$vanalis.jaringan_listrik") ?? data_get($tanah, "$vcab.jaringan_listrik")) == '1300VA' ? 'selected' : '' }}
                    value="1300VA">
                    1300VA</option>
                <option
                    {{ (data_get($tanah, "$vanalis.jaringan_listrik") ?? data_get($tanah, "$vcab.jaringan_listrik")) == '2200VA' ? 'selected' : '' }}
                    value="2200VA">2200VA</option>
                <option
                    {{ (data_get($tanah, "$vanalis.jaringan_listrik") ?? data_get($tanah, "$vcab.jaringan_listrik")) == 'Lainnya' ? 'selected' : '' }}
                    value="Lainnya">Lainnya</option>
            </select>
        </div>
    </div>
    <div class="col-md-2 mb-4">
        <div class="form-group">
            <label for="jaringan_listrik_detail_{{ $loop->iteration }}" data-bs-toggle="tooltip"
                data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                data-bs-title="Diisi bila yang dipilih 'Lainnya', jika tidak isi 0VA| mohon isi dengan lengkap">
                <i class="fa-solid fa-circle-question"></i>
            </label>
            <input type="text" class="form-control form-control-sm"
                name="jaringan_listrik_detail_{{ $loop->iteration }}"
                id="jaringan_listrik_detail_{{ $loop->iteration }}" required
                value="{{ data_get($tanah, "$vanalis.jaringan_listrik") ?? data_get($tanah, "$vcab.jaringan_listrik") != null ? '0' : null }}">
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="form-group">
            <label for="jaringan_air_bersih_{{ $loop->iteration }}">Jaringan Air Bersih</label>
            <select name="jaringan_air_bersih_{{ $loop->iteration }}"
                id="jaringan_air_bersih_{{ $loop->iteration }}" class="form-select form-select-sm" required>
                <option disabled selected>-Pilih-</option>
                <option
                    {{ (data_get($tanah, "$vanalis.jaringan_air_bersih") ?? data_get($tanah, "$vcab.jaringan_air_bersih")) == 'Sumur Biasa ' ? 'selected' : '' }}
                    value="Sumur Biasa">Sumur Biasa</option>
                <option
                    {{ (data_get($tanah, "$vanalis.jaringan_air_bersih") ?? data_get($tanah, "$vcab.jaringan_air_bersih")) == 'Sumur Bor' ? 'selected' : '' }}
                    value="Sumur Bor">Sumur Bor</option>
                <option
                    {{ (data_get($tanah, "$vanalis.jaringan_air_bersih") ?? data_get($tanah, "$vcab.jaringan_air_bersih")) == 'Sumur Pompa' ? 'selected' : '' }}
                    value="Sumur Pompa">Sumur Pompa</option>
                <option
                    {{ (data_get($tanah, "$vanalis.jaringan_air_bersih") ?? data_get($tanah, "$vcab.jaringan_air_bersih")) == 'PDAM' ? 'selected' : '' }}
                    value="PDAM">PDAM</option>
            </select>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="form-group">
            <label for="jaringan_telepon_{{ $loop->iteration }}">Jaringan Telepon</label>
            <select name="jaringan_telepon_{{ $loop->iteration }}" id="jaringan_telepon_{{ $loop->iteration }}"
                class="form-select form-select-sm" required>
                <option disabled selected>-Pilih-</option>
                <option
                    {{ (data_get($tanah, "$vanalis.jaringan_telepon") ?? data_get($tanah, "$vcab.jaringan_telepon")) == 'Ada' ? 'selected' : '' }}
                    value="Ada">
                    Ada</option>
                <option
                    {{ (data_get($tanah, "$vanalis.jaringan_telepon") ?? data_get($tanah, "$vcab.jaringan_telepon")) == 'Tidak Ada' ? 'selected' : '' }}
                    value="Tidak Ada">Tidak Ada</option>
            </select>
        </div>
    </div>
@endif
