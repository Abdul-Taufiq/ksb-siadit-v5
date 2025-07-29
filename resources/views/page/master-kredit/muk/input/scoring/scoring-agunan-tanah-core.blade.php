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
            id="tgl_penilaian_{{ $loop->iteration }}" required value="{{ now()->format('Y-m-d') }}">
    </div>
</div>
<div class="col-md-8 mb-4">
    <div class="form-group">
        <label for="lokasi_{{ $loop->iteration }}">Lokasi Agunan</label>
        <textarea name="lokasi_{{ $loop->iteration }}" id="lokasi_{{ $loop->iteration }}" cols="25" rows="3"
            class="form-control" required>{{ $tanah->sc_tanah_agunan?->lokasi }}</textarea>
    </div>
</div>
<div class="col-md-4 mb-4">
    <div class="form-group">
        <label for="penilai_{{ $loop->iteration }}">Penilai</label>
        <input type="text" class="form-control form-control-sm" name="penilai_{{ $loop->iteration }}"
            id="penilai_{{ $loop->iteration }}" required value="{{ auth()->user()->nama }}">
    </div>
    <div class="form-group mt-2">
        <label for="luas_tanah_{{ $loop->iteration }}">Luas Tanah</label>
        <div class="input-group input-group-sm">
            <input type="number" class="form-control form-control-sm" name="luas_tanah_{{ $loop->iteration }}"
                id="luas_tanah_{{ $loop->iteration }}" required min="0"
                value="{{ $tanah->sc_tanah_agunan?->luas_tanah }}">
            <span class="input-group-text">M²</span>
        </div>
    </div>
</div>
<div class="col-md-3 mb-4">
    <div class="form-group">
        <label for="batas_utara_{{ $loop->iteration }}">Batas Utara</label>
        <input type="text" class="form-control form-control-sm" name="batas_utara_{{ $loop->iteration }}"
            id="batas_utara_{{ $loop->iteration }}" required value="{{ $tanah->sc_tanah_agunan?->batas_utara }}">
    </div>
</div>
<div class="col-md-3 mb-4">
    <div class="form-group">
        <label for="batas_selatan_{{ $loop->iteration }}">Selatan</label>
        <input type="text" class="form-control form-control-sm" name="batas_selatan_{{ $loop->iteration }}"
            id="batas_selatan_{{ $loop->iteration }}" required value="{{ $tanah->sc_tanah_agunan?->batas_selatan }}">
    </div>
</div>
<div class="col-md-3 mb-4">
    <div class="form-group">
        <label for="batas_timur_{{ $loop->iteration }}">Timur</label>
        <input type="text" class="form-control form-control-sm" name="batas_timur_{{ $loop->iteration }}"
            id="batas_timur_{{ $loop->iteration }}" required value="{{ $tanah->sc_tanah_agunan?->batas_timur }}">
    </div>
</div>
<div class="col-md-3 mb-4">
    <div class="form-group">
        <label for="batas_barat_{{ $loop->iteration }}">Barat</label>
        <input type="text" class="form-control form-control-sm" name="batas_barat_{{ $loop->iteration }}"
            id="batas_barat_{{ $loop->iteration }}" required value="{{ $tanah->sc_tanah_agunan?->batas_barat }}">
    </div>
</div>
<div class="col-md-4 mb-4">
    <div class="form-group">
        <label for="hak_kepemilikan_{{ $loop->iteration }}">Hak Kepemilikan</label>
        <input type="text" class="form-control form-control-sm" name="hak_kepemilikan_{{ $loop->iteration }}"
            id="hak_kepemilikan_{{ $loop->iteration }}" required value="{{ $tanah->jns_jaminan }}" maxlength="20"
            value="{{ $tanah->sc_tanah_agunan?->hak_kepemilikan }}">
    </div>
</div>
<div class="col-md-4 mb-4">
    <div class="form-group">
        <label for="nomor_{{ $loop->iteration }}">Nomor</label>
        <input type="text" class="form-control form-control-sm" name="nomor_{{ $loop->iteration }}"
            id="nomor_{{ $loop->iteration }}" required value="{{ $tanah->no_shm_shgb }}"
            value="{{ $tanah->sc_tanah_agunan?->nomor }}">
    </div>
</div>
<div class="col-md-4 mb-4">
    <div class="form-group">
        <label for="atas_nama_{{ $loop->iteration }}">Atas Nama</label>
        <input type="text" class="form-control form-control-sm" name="atas_nama_{{ $loop->iteration }}"
            id="atas_nama_{{ $loop->iteration }}" required value="{{ $tanah->atas_nama }}">
    </div>
</div>
<div class="col-md-6 mb-4">
    <div class="form-group">
        <div class="d-flex justify-content-between">
            <label for="tgl_berakhir_sertif_{{ $loop->iteration }}">Tgl Berakhir Sertifikat</label>
            <label for="tgl_berakhir_sertif_{{ $loop->iteration }}" data-bs-toggle="tooltip" data-bs-placement="top"
                data-bs-custom-class="custom-tooltip" data-bs-title="Untuk Selain SHM">
                <i class="fa-solid fa-circle-question"></i>
            </label>
        </div>
        <input type="date" name="tgl_berakhir_sertif_{{ $loop->iteration }}"
            id="tgl_berakhir_sertif_{{ $loop->iteration }}" class="form-control form-control-sm" required
            value="{{ $tanah->sc_tanah_agunan?->tgl_berakhir_sertif?->format('Y-m-d') }}">
    </div>
</div>
<div class="col-md-6 mb-4">
    <div class="form-group">
        <label for="no_gs_{{ $loop->iteration }}">No. GS</label>
        <input type="text" class="form-control form-control-sm" name="no_gs_{{ $loop->iteration }}"
            id="no_gs_{{ $loop->iteration }}" required value="{{ $tanah->sc_tanah_agunan?->no_gs }}">
    </div>
</div>

{{-- Khusus untuk Bangunan dan Rukan --}}
@if ($tanah->detail_kategori_jaminan != 'Tanah')
    <div class="col-md-4 mb-4">
        <div class="form-group">
            <label for="luas_bangunan_{{ $loop->iteration }}">Luas Bangunan (IMB/PBB)</label>
            <div class="input-group input-group-sm">
                <input type="number" class="form-control form-control-sm"
                    name="luas_bangunan_{{ $loop->iteration }}" id="luas_bangunan_{{ $loop->iteration }}" required
                    min="0" value="{{ $tanah->sc_tanah_agunan?->luas_bangunan }}">
                <span class="input-group-text">M²</span>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="form-group">
            <label for="luas_bangunan_fisik_{{ $loop->iteration }}">Luas Bangunan Fisik</label>
            <div class="input-group input-group-sm">
                <input type="number" class="form-control form-control-sm"
                    name="luas_bangunan_fisik_{{ $loop->iteration }}"
                    id="luas_bangunan_fisik_{{ $loop->iteration }}" required min="0"
                    value="{{ $tanah->sc_tanah_agunan?->luas_bangunan_fisik }}">
                <span class="input-group-text">M²</span>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="form-group">
            <label for="beda_luas_bangunan_{{ $loop->iteration }}">Beda Luas Bangunan</label>
            <div class="input-group input-group-sm">
                <input type="number" class="form-control form-control-sm"
                    name="beda_luas_bangunan_{{ $loop->iteration }}" id="beda_luas_bangunan_{{ $loop->iteration }}"
                    required min="0" value="{{ $tanah->sc_tanah_agunan?->beda_luas_bangunan }}">
                <span class="input-group-text">M²</span>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="form-group">
            <label for="thn_pembangunan_{{ $loop->iteration }}">Tahun Pembangunan</label>
            <input type="number" class="form-control form-control-sm" name="thn_pembangunan_{{ $loop->iteration }}"
                id="thn_pembangunan_{{ $loop->iteration }}" required min="0"
                value="{{ $tanah->sc_tanah_agunan?->thn_pembangunan }}">
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="form-group">
            <label for="thn_renov_akhir_{{ $loop->iteration }}">Tahun Renovasi Terakhir</label>
            <input type="number" class="form-control form-control-sm" name="thn_renov_akhir_{{ $loop->iteration }}"
                id="thn_renov_akhir_{{ $loop->iteration }}" required min="0"
                value="{{ $tanah->sc_tanah_agunan?->thn_renov_akhir }}">
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="form-group">
            <label for="umur_efektif_{{ $loop->iteration }}">Umur Efektif</label>
            <div class="input-group input-group-sm">
                <input type="number" class="form-control form-control-sm"
                    name="umur_efektif_{{ $loop->iteration }}" id="umur_efektif_{{ $loop->iteration }}" required
                    min="0" value="{{ $tanah->sc_tanah_agunan?->umur_efektif }}">
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
                    value="{{ $tanah->sc_tanah_agunan?->penggunaan_bangunan }}">
            </div>
        </div>
    @endif

    <div class="col-md-2 mb-4">
        <div class="form-group">
            <label for="kamar_tidur_{{ $loop->iteration }}">Kamar Tidur</label>
            <select name="kamar_tidur_{{ $loop->iteration }}" id="kamar_tidur_{{ $loop->iteration }}"
                class="form-select form-select-sm" required>
                <option disabled selected>-Pilih-</option>
                <option {{ $tanah->sc_tanah_agunan?->kamar_tidur == 'Ada' ? 'selected' : '' }} value="Ada">Ada
                </option>
                <option {{ $tanah->sc_tanah_agunan?->kamar_tidur == 'Tidak Ada' ? 'selected' : '' }}
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
                value="{{ $tanah->sc_tanah_agunan?->jumlah_kt }}">
        </div>
    </div>
    <div class="col-md-2 mb-4">
        <div class="form-group">
            <label for="kamar_mandi_{{ $loop->iteration }}">Kamar Mandi</label>
            <select name="kamar_mandi_{{ $loop->iteration }}" id="kamar_mandi_{{ $loop->iteration }}"
                class="form-select form-select-sm" required>
                <option disabled selected>-Pilih-</option>
                <option {{ $tanah->sc_tanah_agunan?->kamar_mandi == 'Ada' ? 'selected' : '' }} value="Ada">Ada
                </option>
                <option {{ $tanah->sc_tanah_agunan?->kamar_mandi == 'Tidak Ada' ? 'selected' : '' }}
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
                value="{{ $tanah->sc_tanah_agunan?->jumlah_km }}">
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="form-group">
            <label for="jumlah_lantai_{{ $loop->iteration }}">Jumlah Lantai</label>
            <input type="number" class="form-control form-control-sm" name="jumlah_lantai_{{ $loop->iteration }}"
                id="jumlah_lantai_{{ $loop->iteration }}" required min="0"
                value="{{ $tanah->sc_tanah_agunan?->jumlah_lantai }}">
        </div>
    </div>
    <div class="col-md-2 mb-4">
        <div class="form-group">
            <label for="jaringan_listrik_{{ $loop->iteration }}">Jaringan Listrik</label>
            <select name="jaringan_listrik_{{ $loop->iteration }}" id="jaringan_listrik_{{ $loop->iteration }}"
                class="form-select form-select-sm" required>
                <option disabled selected>-Pilih-</option>
                <option {{ $tanah->sc_tanah_agunan?->jaringan_listrik == '450VA' ? 'selected' : '' }} value="450VA">
                    450VA</option>
                <option {{ $tanah->sc_tanah_agunan?->jaringan_listrik == '900VA' ? 'selected' : '' }} value="900VA">
                    900VA</option>
                <option {{ $tanah->sc_tanah_agunan?->jaringan_listrik == '2200VA' ? 'selected' : '' }}
                    value="2200VA">2200VA</option>
                <option {{ $tanah->sc_tanah_agunan?->jaringan_listrik == 'Lainnya' ? 'selected' : '' }}
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
                id="jaringan_listrik_detail_{{ $loop->iteration }}" required>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="form-group">
            <label for="jaringan_air_bersih_{{ $loop->iteration }}">Jaringan Air Bersih</label>
            <select name="jaringan_air_bersih_{{ $loop->iteration }}"
                id="jaringan_air_bersih_{{ $loop->iteration }}" class="form-select form-select-sm" required>
                <option disabled selected>-Pilih-</option>
                <option {{ $tanah->sc_tanah_agunan?->jaringan_air_bersih == 'Sumur Biasa ' ? 'selected' : '' }}
                    value="Sumur Biasa">Sumur Biasa</option>
                <option {{ $tanah->sc_tanah_agunan?->jaringan_air_bersih == 'Sumur Bor' ? 'selected' : '' }}
                    value="Sumur Bor">Sumur Bor</option>
                <option {{ $tanah->sc_tanah_agunan?->jaringan_air_bersih == 'Sumur Pompa' ? 'selected' : '' }}
                    value="Sumur Pompa">Sumur Pompa</option>
                <option {{ $tanah->sc_tanah_agunan?->jaringan_air_bersih == 'PDAM' ? 'selected' : '' }}
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
                <option {{ $tanah->sc_tanah_agunan?->jaringan_telepon == 'Ada' ? 'selected' : '' }} value="Ada">
                    Ada</option>
                <option {{ $tanah->sc_tanah_agunan?->jaringan_telepon == 'Tidak Ada' ? 'selected' : '' }}
                    value="Tidak Ada">Tidak Ada</option>
            </select>
        </div>
    </div>
@endif
