<div class="col-md-12 mb-3">
    <h6>Checking Agunan</h6>
</div>

<div class="row" id="head_perhitungan_1">
    @if (!empty($tanah->sc_tanah_perhitungan))
        @foreach ($tanah->sc_tanah_perhitungan as $item)
            <input type="hidden" name="id_sc_perhitungan_{{ $loop->iteration }}"
                value="{{ base64_encode($item->id_sc_perhitungan) }}">

            <div class="col-md-6">
                <strong>» {{ $loop->iteration }}.</strong>
                <table class="table table-striped table-sm w-100">
                    <tr>
                        <td>
                            <label class="notbold"
                                for="nama_{{ $loop->parent->iteration }}_{{ $loop->iteration }}">Nama</label>
                        </td>
                        <td>
                            <input type="text" name="nama_{{ $loop->parent->iteration }}_{{ $loop->iteration }}"
                                id="nama_{{ $loop->parent->iteration }}_{{ $loop->iteration }}"
                                class="form-control form-control-sm" value="{{ $item->nama }}">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="notbold"
                                for="hubungan_{{ $loop->parent->iteration }}_{{ $loop->iteration }}">Hubungan</label>
                        </td>
                        <td>
                            <input type="text"
                                name="hubungan_{{ $loop->parent->iteration }}_{{ $loop->iteration }}"
                                id="hubungan_{{ $loop->parent->iteration }}_{{ $loop->iteration }}"
                                class="form-control form-control-sm" required value="{{ $item->hubungan }}">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="notbold"
                                for="no_telp_{{ $loop->parent->iteration }}_{{ $loop->iteration }}">No Telp</label>
                        </td>
                        <td>
                            <input type="text" name="no_telp_{{ $loop->parent->iteration }}_{{ $loop->iteration }}"
                                id="no_telp_{{ $loop->parent->iteration }}_{{ $loop->iteration }}"
                                class="form-control form-control-sm" required maxlength="15"
                                value="{{ $item->no_telp }}">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="notbold"
                                for="alamat_{{ $loop->parent->iteration }}_{{ $loop->iteration }}">Alamat</label>
                        </td>
                        <td>
                            <input type="text" name="alamat_{{ $loop->parent->iteration }}_{{ $loop->iteration }}"
                                id="alamat_{{ $loop->parent->iteration }}_{{ $loop->iteration }}"
                                class="form-control form-control-sm" required value="{{ $item->alamat }}">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="notbold"
                                for="harga_tanah_{{ $loop->parent->iteration }}_{{ $loop->iteration }}">Harga
                                Tanah</label>
                        </td>
                        <td>
                            <div class="input-group input-group-sm">
                                <span class="input-group-text">Rp</span>
                                <input type="text"
                                    name="harga_tanah_{{ $loop->parent->iteration }}_{{ $loop->iteration }}"
                                    id="harga_tanah_{{ $loop->parent->iteration }}_{{ $loop->iteration }}"
                                    class="form-control form-control-sm setRp" required
                                    value="{{ number_format($item->harga_per_meter, 0, ',', '.') }}">
                                <span class="input-group-text">/M²</span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="notbold"
                                for="harga_bangunan_{{ $loop->parent->iteration }}_{{ $loop->iteration }}">Harga
                                Bangunan</label>
                        </td>
                        <td>
                            <div class="input-group input-group-sm">
                                <span class="input-group-text">Rp</span>
                                <input type="text"
                                    name="harga_bangunan_{{ $loop->parent->iteration }}_{{ $loop->iteration }}"
                                    id="harga_bangunan_{{ $loop->parent->iteration }}_{{ $loop->iteration }}"
                                    class="form-control form-control-sm setRp" required
                                    value="{{ number_format($item->harga_bangunan, 0, ',', '.') }}">
                                <span class="input-group-text">/M²</span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="notbold"
                                for="keterangan_{{ $loop->parent->iteration }}_{{ $loop->iteration }}">Keterangan</label>
                        </td>
                        <td>
                            <textarea name="keterangan_{{ $loop->parent->iteration }}_{{ $loop->iteration }}"
                                id="keterangan_{{ $loop->parent->iteration }}_{{ $loop->iteration }}" cols="20" rows="3"
                                class="form-control" required>{{ $item->keterangan }}</textarea>
                        </td>
                    </tr>
                </table>
            </div>
        @endforeach
    @else
        <div class="col-md-6">
            <strong>» I.</strong>
            <table class="table table-striped table-sm w-100">
                <tr>
                    <td>
                        <label class="notbold" for="nama_{{ $loop->iteration }}_1">Nama</label>
                    </td>
                    <td>
                        <input type="text" name="nama_{{ $loop->iteration }}_1" id="nama_{{ $loop->iteration }}_1"
                            class="form-control form-control-sm" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="notbold" for="hubungan_{{ $loop->iteration }}_1">Hubungan</label>
                    </td>
                    <td>
                        <input type="text" name="hubungan_{{ $loop->iteration }}_1"
                            id="hubungan_{{ $loop->iteration }}_1" class="form-control form-control-sm" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="notbold" for="no_telp_{{ $loop->iteration }}_1">No Telp</label>
                    </td>
                    <td>
                        <input type="text" name="no_telp_{{ $loop->iteration }}_1"
                            id="no_telp_{{ $loop->iteration }}_1" class="form-control form-control-sm" required
                            maxlength="15">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="notbold" for="alamat_{{ $loop->iteration }}_1">Alamat</label>
                    </td>
                    <td>
                        <input type="text" name="alamat_{{ $loop->iteration }}_1"
                            id="alamat_{{ $loop->iteration }}_1" class="form-control form-control-sm" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="notbold" for="harga_tanah_{{ $loop->iteration }}_1">Harga Tanah</label>
                    </td>
                    <td>
                        <div class="input-group input-group-sm">
                            <span class="input-group-text">Rp</span>
                            <input type="text" name="harga_tanah_{{ $loop->iteration }}_1"
                                id="harga_tanah_{{ $loop->iteration }}_1" class="form-control form-control-sm setRp"
                                required>
                            <span class="input-group-text">/M²</span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="notbold" for="harga_bangunan_{{ $loop->iteration }}_1">Harga Bangunan</label>
                    </td>
                    <td>
                        <div class="input-group input-group-sm">
                            <span class="input-group-text">Rp</span>
                            <input type="text" name="harga_bangunan_{{ $loop->iteration }}_1"
                                id="harga_bangunan_{{ $loop->iteration }}_1"
                                class="form-control form-control-sm setRp" required>
                            <span class="input-group-text">/M²</span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="notbold" for="keterangan_{{ $loop->iteration }}_1">Keterangan</label>
                    </td>
                    <td>
                        <textarea name="keterangan_{{ $loop->iteration }}_1" id="keterangan_{{ $loop->iteration }}_1" cols="20"
                            rows="3" class="form-control" required></textarea>
                    </td>
                </tr>
            </table>
        </div>

        <div class="col-md-6">
            <strong>» II.</strong>
            <table class="table table-striped table-sm w-100">
                <tr>
                    <td>
                        <label class="notbold" for="nama_{{ $loop->iteration }}_2">Nama</label>
                    </td>
                    <td>
                        <input type="text" name="nama_{{ $loop->iteration }}_2"
                            id="nama_{{ $loop->iteration }}_2" class="form-control form-control-sm" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="notbold" for="hubungan_{{ $loop->iteration }}_2">Hubungan</label>
                    </td>
                    <td>
                        <input type="text" name="hubungan_{{ $loop->iteration }}_2"
                            id="hubungan_{{ $loop->iteration }}_2" class="form-control form-control-sm" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="notbold" for="no_telp_{{ $loop->iteration }}_2">No Telp</label>
                    </td>
                    <td>
                        <input type="text" name="no_telp_{{ $loop->iteration }}_2"
                            id="no_telp_{{ $loop->iteration }}_2" class="form-control form-control-sm" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="notbold" for="alamat_{{ $loop->iteration }}_2">Alamat</label>
                    </td>
                    <td>
                        <input type="text" name="alamat_{{ $loop->iteration }}_2"
                            id="alamat_{{ $loop->iteration }}_2" class="form-control form-control-sm" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="notbold" for="harga_tanah_{{ $loop->iteration }}_2">Harga Tanah</label>
                    </td>
                    <td>
                        <div class="input-group input-group-sm">
                            <span class="input-group-text">Rp</span>
                            <input type="text" name="harga_tanah_{{ $loop->iteration }}_2"
                                id="harga_tanah_{{ $loop->iteration }}_2" class="form-control form-control-sm setRp"
                                required>
                            <span class="input-group-text">/M²</span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="notbold" for="harga_bangunan_{{ $loop->iteration }}_2">Harga Bangunan</label>
                    </td>
                    <td>
                        <div class="input-group input-group-sm">
                            <span class="input-group-text">Rp</span>
                            <input type="text" name="harga_bangunan_{{ $loop->iteration }}_2"
                                id="harga_bangunan_{{ $loop->iteration }}_2"
                                class="form-control form-control-sm setRp" required>
                            <span class="input-group-text">/M²</span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="notbold" for="keterangan_{{ $loop->iteration }}_2">Keterangan</label>
                    </td>
                    <td>
                        <textarea name="keterangan_{{ $loop->iteration }}_2" id="keterangan_{{ $loop->iteration }}_2" cols="20"
                            rows="3" class="form-control" required></textarea>
                    </td>
                </tr>
            </table>
        </div>

        <div class="col-md-6">
            <strong>» III.</strong>
            <table class="table table-striped table-sm w-100">
                <tr>
                    <td>
                        <label class="notbold" for="nama_{{ $loop->iteration }}_3">Nama</label>
                    </td>
                    <td>
                        <input type="text" name="nama_{{ $loop->iteration }}_3"
                            id="nama_{{ $loop->iteration }}_3" class="form-control form-control-sm" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="notbold" for="hubungan_{{ $loop->iteration }}_3">Hubungan</label>
                    </td>
                    <td>
                        <input type="text" name="hubungan_{{ $loop->iteration }}_3"
                            id="hubungan_{{ $loop->iteration }}_3" class="form-control form-control-sm" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="notbold" for="no_telp_{{ $loop->iteration }}_3">No Telp</label>
                    </td>
                    <td>
                        <input type="text" name="no_telp_{{ $loop->iteration }}_3"
                            id="no_telp_{{ $loop->iteration }}_3" class="form-control form-control-sm" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="notbold" for="alamat_{{ $loop->iteration }}_3">Alamat</label>
                    </td>
                    <td>
                        <input type="text" name="alamat_{{ $loop->iteration }}_3"
                            id="alamat_{{ $loop->iteration }}_3" class="form-control form-control-sm" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="notbold" for="harga_tanah_{{ $loop->iteration }}_3">Harga Tanah</label>
                    </td>
                    <td>
                        <div class="input-group input-group-sm">
                            <span class="input-group-text">Rp</span>
                            <input type="text" name="harga_tanah_{{ $loop->iteration }}_3"
                                id="harga_tanah_{{ $loop->iteration }}_3" class="form-control form-control-sm setRp"
                                required>
                            <span class="input-group-text">/M²</span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="notbold" for="harga_bangunan_{{ $loop->iteration }}_3">Harga Bangunan</label>
                    </td>
                    <td>
                        <div class="input-group input-group-sm">
                            <span class="input-group-text">Rp</span>
                            <input type="text" name="harga_bangunan_{{ $loop->iteration }}_3"
                                id="harga_bangunan_{{ $loop->iteration }}_3"
                                class="form-control form-control-sm setRp" required>
                            <span class="input-group-text">/M²</span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="notbold" for="keterangan_{{ $loop->iteration }}_3">Keterangan</label>
                    </td>
                    <td>
                        <textarea name="keterangan_{{ $loop->iteration }}_3" id="keterangan_{{ $loop->iteration }}_3" cols="20"
                            rows="3" class="form-control" required></textarea>
                    </td>
                </tr>
            </table>
        </div>

        <div class="col-md-6">
            <strong>» IV.</strong> <i>(opsional)</i>
            <table class="table table-striped table-sm w-100">
                <tr>
                    <td>
                        <label class="notbold" for="nama_{{ $loop->iteration }}_4">Nama</label>
                    </td>
                    <td>
                        <input type="text" name="nama_{{ $loop->iteration }}_4"
                            id="nama_{{ $loop->iteration }}_4" class="form-control form-control-sm">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="notbold" for="hubungan_{{ $loop->iteration }}_4">Hubungan</label>
                    </td>
                    <td>
                        <input type="text" name="hubungan_{{ $loop->iteration }}_4"
                            id="hubungan_{{ $loop->iteration }}_4" class="form-control form-control-sm">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="notbold" for="no_telp_{{ $loop->iteration }}_4">No Telp</label>
                    </td>
                    <td>
                        <input type="text" name="no_telp_{{ $loop->iteration }}_4"
                            id="no_telp_{{ $loop->iteration }}_4" class="form-control form-control-sm">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="notbold" for="alamat_{{ $loop->iteration }}_4">Alamat</label>
                    </td>
                    <td>
                        <input type="text" name="alamat_{{ $loop->iteration }}_4"
                            id="alamat_{{ $loop->iteration }}_4" class="form-control form-control-sm">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="notbold" for="harga_tanah_{{ $loop->iteration }}_4">Harga Tanah</label>
                    </td>
                    <td>
                        <div class="input-group input-group-sm">
                            <span class="input-group-text">Rp</span>
                            <input type="text" name="harga_tanah_{{ $loop->iteration }}_4"
                                id="harga_tanah_{{ $loop->iteration }}_4"
                                class="form-control form-control-sm setRp">
                            <span class="input-group-text">/M²</span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="notbold" for="harga_bangunan_{{ $loop->iteration }}_4">Harga Bangunan</label>
                    </td>
                    <td>
                        <div class="input-group input-group-sm">
                            <span class="input-group-text">Rp</span>
                            <input type="text" name="harga_bangunan_{{ $loop->iteration }}_4"
                                id="harga_bangunan_{{ $loop->iteration }}_4"
                                class="form-control form-control-sm setRp">
                            <span class="input-group-text">/M²</span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="notbold" for="keterangan_{{ $loop->iteration }}_4">Keterangan</label>
                    </td>
                    <td>
                        <textarea name="keterangan_{{ $loop->iteration }}_4" id="keterangan_{{ $loop->iteration }}_4" cols="20"
                            rows="3" class="form-control"></textarea>
                    </td>
                </tr>
            </table>
        </div>
    @endif
</div>

{{-- Rekap Checking agunan --}}
<input type="hidden" name="id_sc_rekap" id="id_sc_rekap"
    value="{{ base64_encode($tanah->sc_tanah_rekap_1?->id_sc_rekap_1 ?? $tanah->sc_tanah_rekap_2?->id_sc_rekap_2) }}">
<div class="row mt-4">
    <div class="col-md-6">
        <div class="form-group">
            <label class="notbold" for="nilai_njop_{{ $loop->iteration }}">Nilai NJOP</label>
            <div class="input-group input-group-sm">
                <span class="input-group-text">Rp</span>
                <input type="text" name="nilai_njop_{{ $loop->iteration }}"
                    id="nilai_njop_{{ $loop->iteration }}" class="form-control form-control-sm setRp" required
                    value="{{ number_format($tanah->sc_tanah_rekap_1?->nilai_njop ?? $tanah->sc_tanah_rekap_2?->nilai_njop, 0, ',', '.') }}">
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="notbold" for="pbb_tahun_{{ $loop->iteration }}">Berdasarkan PBB Tahun</label>
            <input type="number" name="pbb_tahun_{{ $loop->iteration }}" id="pbb_tahun_{{ $loop->iteration }}"
                class="form-control form-control-sm" required min="0"
                value="{{ $tanah->sc_tanah_rekap_1?->pbb_tahun ?? $tanah->sc_tanah_rekap_2?->pbb_tahun }}">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 mb-3 mt-4">
        <h6>Rekapitulasi Hasil Checking Agunan</h6>
    </div>

    <div class="col-md-12">
        @if ($tanah->detail_kategori_jaminan == 'Tanah & Bangunan')
            <strong>Tanah</strong>
        @endif
        <table class="table table-striped table-sm w-100">
            <tr>
                <td style="width: 10%">
                    <label class="notbold" for="data_1_{{ $loop->iteration }}">Data I</label>
                </td>
                <td>
                    <div class="input-group input-group-sm">
                        <span class="input-group-text">Rp</span>
                        <input type="text" name="data_1_{{ $loop->iteration }}" data-bs-toggle="tooltip"
                            data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                            data-bs-title="Jika ada Perubahan LUAS TANAH/LUAS BANGUNAN FISIK Mohon untuk update nilai ini agar Sinkron"
                            id="data_1_{{ $loop->iteration }}" class="form-control form-control-sm setRp" required
                            value="{{ number_format($tanah->sc_tanah_rekap_1?->data_1 ?? $tanah->sc_tanah_rekap_2?->tanah_1, 0, ',', '.') }}">
                        <span class="input-group-text">/M²</span>
                    </div>
                </td>
                <td style="width: 10%">
                    <label class="notbold" for="data_luas_1_{{ $loop->iteration }}">Luas
                        {{ $tanah->detail_kategori_jaminan == 'Ruko & Rukan' ? 'Bangunan' : 'Tanah' }}</label>
                </td>
                <td>
                    <input type="text" class="form-control form-control-sm"
                        id="data_luas_1_{{ $loop->iteration }}" name="data_luas_1_{{ $loop->iteration }}" readonly
                        value="{{ $tanah->sc_tanah_rekap_1?->data_luas_1 ?? $tanah->sc_tanah_rekap_2?->tanah_luas_1 }}">
                </td>
                <td>
                    <label class="notbold" for="data_total_1_{{ $loop->iteration }}">=</label>
                </td>
                <td>
                    <div class="input-group input-group-sm">
                        <span class="input-group-text">Rp</span>
                        <input type="text" name="data_total_1_{{ $loop->iteration }}" data-bs-toggle="tooltip"
                            data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                            data-bs-title="Jika ada Perubahan LUAS TANAH/LUAS BANGUNAN FISIK Mohon untuk update nilai ini agar Sinkron"
                            id="data_total_1_{{ $loop->iteration }}" class="form-control form-control-sm setRp"
                            required
                            value="{{ number_format($tanah->sc_tanah_rekap_1?->data_total_1 ?? $tanah->sc_tanah_rekap_2?->tanah_total_1, 0, ',', '.') }}">
                    </div>
                </td>
            </tr>
            <tr>
                <td style="width: 10%">
                    <label class="notbold" for="data_2_{{ $loop->iteration }}">Data II</label>
                </td>
                <td>
                    <div class="input-group input-group-sm">
                        <span class="input-group-text">Rp</span>
                        <input type="text" name="data_2_{{ $loop->iteration }}" data-bs-toggle="tooltip"
                            data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                            data-bs-title="Jika ada Perubahan LUAS TANAH/LUAS BANGUNAN FISIK Mohon untuk update nilai ini agar Sinkron"
                            id="data_2_{{ $loop->iteration }}" class="form-control form-control-sm setRp" required
                            value="{{ number_format($tanah->sc_tanah_rekap_1?->data_2 ?? $tanah->sc_tanah_rekap_2?->tanah_2, 0, ',', '.') }}">
                        <span class="input-group-text">/M²</span>
                    </div>
                </td>
                <td style="width: 10%">
                    <label class="notbold" for="data_total_2_{{ $loop->iteration }}">Luas
                        {{ $tanah->detail_kategori_jaminan == 'Ruko & Rukan' ? 'Bangunan' : 'Tanah' }}</label>
                </td>
                <td>
                    <input type="text" class="form-control form-control-sm"
                        id="data_luas_2_{{ $loop->iteration }}" name="data_luas_2_{{ $loop->iteration }}" readonly
                        value="{{ $tanah->sc_tanah_rekap_1?->data_luas_2 ?? $tanah->sc_tanah_rekap_2?->tanah_luas_2 }}">
                </td>
                <td>
                    <label class="notbold" for="data_total_2_{{ $loop->iteration }}">=</label>
                </td>
                <td>
                    <div class="input-group input-group-sm">
                        <span class="input-group-text">Rp</span>
                        <input type="text" name="data_total_2_{{ $loop->iteration }}" data-bs-toggle="tooltip"
                            data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                            data-bs-title="Jika ada Perubahan LUAS TANAH/LUAS BANGUNAN FISIK Mohon untuk update nilai ini agar Sinkron"
                            id="data_total_2_{{ $loop->iteration }}" class="form-control form-control-sm setRp"
                            required
                            value="{{ number_format($tanah->sc_tanah_rekap_1?->data_total_2 ?? $tanah->sc_tanah_rekap_2?->tanah_total_2, 0, ',', '.') }}">
                    </div>
                </td>
            </tr>
            <tr>
                <td style="width: 10%">
                    <label class="notbold" for="data_3_{{ $loop->iteration }}">Data III</label>
                </td>
                <td>
                    <div class="input-group input-group-sm">
                        <span class="input-group-text">Rp</span>
                        <input type="text" name="data_3_{{ $loop->iteration }}" data-bs-toggle="tooltip"
                            data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                            data-bs-title="Jika ada Perubahan LUAS TANAH/LUAS BANGUNAN FISIK Mohon untuk update nilai ini agar Sinkron"
                            id="data_3_{{ $loop->iteration }}" class="form-control form-control-sm setRp" required
                            value="{{ number_format($tanah->sc_tanah_rekap_1?->data_3 ?? $tanah->sc_tanah_rekap_2?->tanah_3, 0, ',', '.') }}">
                        <span class="input-group-text">/M²</span>
                    </div>
                </td>
                <td style="width: 10%">
                    <label class="notbold" for="data_total_3_{{ $loop->iteration }}">Luas
                        {{ $tanah->detail_kategori_jaminan == 'Ruko & Rukan' ? 'Bangunan' : 'Tanah' }}</label>
                </td>
                <td>
                    <input type="text" class="form-control form-control-sm"
                        id="data_luas_3_{{ $loop->iteration }}" name="data_luas_3_{{ $loop->iteration }}" readonly
                        value="{{ $tanah->sc_tanah_rekap_1?->data_luas_3 ?? $tanah->sc_tanah_rekap_2?->tanah_luas_3 }}">
                </td>
                <td>
                    <label class="notbold" for="data_total_3_{{ $loop->iteration }}">=</label>
                </td>
                <td>
                    <div class="input-group input-group-sm">
                        <span class="input-group-text">Rp</span>
                        <input type="text" name="data_total_3_{{ $loop->iteration }}" data-bs-toggle="tooltip"
                            data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                            data-bs-title="Jika ada Perubahan LUAS TANAH/LUAS BANGUNAN FISIK Mohon untuk update nilai ini agar Sinkron"
                            id="data_total_3_{{ $loop->iteration }}" class="form-control form-control-sm setRp"
                            required
                            value="{{ number_format($tanah->sc_tanah_rekap_1?->data_total_3 ?? $tanah->sc_tanah_rekap_2?->tanah_total_3, 0, ',', '.') }}">
                    </div>
                </td>
            </tr>
        </table>
    </div>

    {{-- khusus bangunan dan rukan --}}
    @if ($tanah->detail_kategori_jaminan == 'Tanah & Bangunan')
        <div class="col-md-12">
            <strong>Bangunan</strong>
            <table class="table table-striped table-sm w-100">
                <tr>
                    <td style="width: 10%">
                        <label class="notbold" for="bangunan_1_{{ $loop->iteration }}">Data I</label>
                    </td>
                    <td>
                        <div class="input-group input-group-sm">
                            <span class="input-group-text">Rp</span>
                            <input type="text" name="bangunan_1_{{ $loop->iteration }}" data-bs-toggle="tooltip"
                                data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                                data-bs-title="Jika ada Perubahan LUAS BANGUNAN FISIK Mohon untuk update nilai ini agar Sinkron"
                                id="bangunan_1_{{ $loop->iteration }}" class="form-control form-control-sm setRp"
                                required
                                value="{{ number_format($tanah->sc_tanah_rekap_2?->bangunan_1, 0, ',', '.') }}">
                            <span class="input-group-text">/M²</span>
                        </div>
                    </td>
                    <td style="width: 10%">
                        <label class="notbold" for="bangunan_luas_1_{{ $loop->iteration }}">Luas Bangunan</label>
                    </td>
                    <td>
                        <input type="text" class="form-control form-control-sm"
                            id="bangunan_luas_1_{{ $loop->iteration }}"
                            name="bangunan_luas_1_{{ $loop->iteration }}" readonly
                            value="{{ $tanah->sc_tanah_rekap_2?->bangunan_luas_1 }}">
                    </td>
                    <td>
                        <label class="notbold" for="bangunan_total_1_{{ $loop->iteration }}">=</label>
                    </td>
                    <td>
                        <div class="input-group input-group-sm">
                            <span class="input-group-text">Rp</span>
                            <input type="text" name="bangunan_total_1_{{ $loop->iteration }}"
                                data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-custom-class="custom-tooltip"
                                data-bs-title="Jika ada Perubahan LUAS BANGUNAN FISIK Mohon untuk update nilai ini agar Sinkron"
                                id="bangunan_total_1_{{ $loop->iteration }}"
                                class="form-control form-control-sm setRp" required
                                value="{{ number_format($tanah->sc_tanah_rekap_2?->bangunan_total_1, 0, ',', '.') }}">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="width: 10%">
                        <label class="notbold" for="bangunan_2_{{ $loop->iteration }}">Data II</label>
                    </td>
                    <td>
                        <div class="input-group input-group-sm">
                            <span class="input-group-text">Rp</span>
                            <input type="text" name="bangunan_2_{{ $loop->iteration }}" data-bs-toggle="tooltip"
                                data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                                data-bs-title="Jika ada Perubahan LUAS BANGUNAN FISIK Mohon untuk update nilai ini agar Sinkron"
                                id="bangunan_2_{{ $loop->iteration }}" class="form-control form-control-sm setRp"
                                required
                                value="{{ number_format($tanah->sc_tanah_rekap_2?->bangunan_2, 0, ',', '.') }}">
                            <span class="input-group-text">/M²</span>
                        </div>
                    </td>
                    <td style="width: 10%">
                        <label class="notbold" for="bangunan_total_2_{{ $loop->iteration }}">Luas Bangunan</label>
                    </td>
                    <td>
                        <input type="text" class="form-control form-control-sm"
                            id="bangunan_luas_2_{{ $loop->iteration }}"
                            name="bangunan_luas_2_{{ $loop->iteration }}" readonly
                            value="{{ $tanah->sc_tanah_rekap_2?->bangunan_luas_2 }}">
                    </td>
                    <td>
                        <label class="notbold" for="bangunan_total_2_{{ $loop->iteration }}">=</label>
                    </td>
                    <td>
                        <div class="input-group input-group-sm">
                            <span class="input-group-text">Rp</span>
                            <input type="text" name="bangunan_total_2_{{ $loop->iteration }}"
                                data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-custom-class="custom-tooltip"
                                data-bs-title="Jika ada Perubahan LUAS BANGUNAN FISIK Mohon untuk update nilai ini agar Sinkron"
                                id="bangunan_total_2_{{ $loop->iteration }}"
                                class="form-control form-control-sm setRp" required
                                value="{{ number_format($tanah->sc_tanah_rekap_2?->bangunan_total_2, 0, ',', '.') }}">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="width: 10%">
                        <label class="notbold" for="bangunan_3_{{ $loop->iteration }}">Data III</label>
                    </td>
                    <td>
                        <div class="input-group input-group-sm">
                            <span class="input-group-text">Rp</span>
                            <input type="text" name="bangunan_3_{{ $loop->iteration }}" data-bs-toggle="tooltip"
                                data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                                data-bs-title="Jika ada Perubahan LUAS BANGUNAN FISIK Mohon untuk update nilai ini agar Sinkron"
                                id="bangunan_3_{{ $loop->iteration }}" class="form-control form-control-sm setRp"
                                required
                                value="{{ number_format($tanah->sc_tanah_rekap_2?->bangunan_3, 0, ',', '.') }}">
                            <span class="input-group-text">/M²</span>
                        </div>
                    </td>
                    <td style="width: 10%">
                        <label class="notbold" for="bangunan_total_3_{{ $loop->iteration }}">Luas Bangunan</label>
                    </td>
                    <td>
                        <input type="text" class="form-control form-control-sm"
                            id="bangunan_luas_3_{{ $loop->iteration }}"
                            name="bangunan_luas_3_{{ $loop->iteration }}" readonly
                            value="{{ $tanah->sc_tanah_rekap_2?->bangunan_luas_3 }}">
                    </td>
                    <td>
                        <label class="notbold" for="bangunan_total_3_{{ $loop->iteration }}">=</label>
                    </td>
                    <td>
                        <div class="input-group input-group-sm">
                            <span class="input-group-text">Rp</span>
                            <input type="text" name="bangunan_total_3_{{ $loop->iteration }}"
                                data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-custom-class="custom-tooltip"
                                data-bs-title="Jika ada Perubahan LUAS BANGUNAN FISIK Mohon untuk update nilai ini agar Sinkron"
                                id="bangunan_total_3_{{ $loop->iteration }}"
                                class="form-control form-control-sm setRp" required
                                value="{{ number_format($tanah->sc_tanah_rekap_2?->bangunan_total_3, 0, ',', '.') }}">
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    @endif
</div>

<div class="row">
    <div class="col-md-12 mb-3 mt-4">
        <h6>Nilai Yang Direkomendasikan</h6>
    </div>

    <input type="hidden" id="kategori_jaminan_{{ $loop->iteration }}"
        value="{{ $tanah->detail_kategori_jaminan }}">
    <input type="hidden" id="total_score_{{ $loop->iteration }}">

    @if ($tanah->detail_kategori_jaminan == 'Tanah & Bangunan')
        <div class="col-md-12">
            <strong>Tanah</strong>
        </div>
    @endif
    <div class="col-md-6 mb-3">
        <div class="form-group">
            <label class="notbold" for="nilai_pasar_{{ $loop->iteration }}">Nilai Pasar/m²</label>
            <div class="input-group input-group-sm">
                <span class="input-group-text">Rp</span>
                <input type="text" name="nilai_pasar_{{ $loop->iteration }}"
                    id="nilai_pasar_{{ $loop->iteration }}" class="form-control form-control-sm setRp" required
                    data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                    data-bs-title="Jika ada Perubahan SCORING mohon untuk update input ini agar Sinkron"
                    value="{{ number_format($tanah->sc_tanah_rekap_1?->nilai_pasar ?? $tanah->sc_tanah_rekap_2?->rekom_pasar_tanah, 0, ',', '.') }}">
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <div class="form-group">
            <label class="notbold" for="safety_margin_{{ $loop->iteration }}">Safety Margin</label>
            <div class="input-group input-group-sm">
                <input type="text" name="safety_margin_{{ $loop->iteration }}"
                    id="safety_margin_{{ $loop->iteration }}" class="form-control form-control-sm" readonly
                    value="{{ number_format($tanah->sc_tanah_rekap_1?->safety_margin ?? $tanah->sc_tanah_rekap_2?->margin_tanah, 0, ',', '.') }}">
                <span class="input-group-text">%</span>
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <div class="form-group">
            <label class="notbold" for="nilai_agunan_{{ $loop->iteration }}">Nilai Pasar Agunan</label>
            <div class="input-group input-group-sm">
                <span class="input-group-text">Rp</span>
                <input type="text" name="nilai_agunan_{{ $loop->iteration }}"
                    id="nilai_agunan_{{ $loop->iteration }}" class="form-control form-control-sm setRp" readonly
                    value="{{ number_format($tanah->sc_tanah_rekap_1?->nilai_agunan ?? $tanah->sc_tanah_rekap_2?->rekom_agunan_tanah, 0, ',', '.') }}">
            </div>
        </div>
    </div>

    {{-- bangunan --}}
    @if ($tanah->detail_kategori_jaminan == 'Tanah & Bangunan')
        <div class="col-md-12">
            <strong>Bangunan</strong>
        </div>
        <div class="col-md-6 mb-3">
            <div class="form-group">
                <label class="notbold" for="rekom_pasar_bangunan_{{ $loop->iteration }}">Nilai Pasar/m²
                    Bangunan</label>
                <div class="input-group input-group-sm">
                    <span class="input-group-text">Rp</span>
                    <input type="text" name="rekom_pasar_bangunan_{{ $loop->iteration }}"
                        id="rekom_pasar_bangunan_{{ $loop->iteration }}" class="form-control form-control-sm setRp"
                        required data-bs-toggle="tooltip" data-bs-placement="top"
                        data-bs-custom-class="custom-tooltip"
                        data-bs-title="Jika ada Perubahan SCORING mohon untuk update input ini agar Sinkron"
                        value="{{ number_format($tanah->sc_tanah_rekap_2?->rekom_pasar_bangunan, 0, ',', '.') }}">
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="form-group">
                <label class="notbold" for="margin_bangunan_{{ $loop->iteration }}">Safety Margin Bangunan</label>
                <div class="input-group input-group-sm">
                    <input type="text" name="margin_bangunan_{{ $loop->iteration }}"
                        id="margin_bangunan_{{ $loop->iteration }}" class="form-control form-control-sm" readonly
                        value="{{ number_format($tanah->sc_tanah_rekap_2?->margin_bangunan, 0, ',', '.') }}">
                    <span class="input-group-text">%</span>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="form-group">
                <label class="notbold" for="rekom_agunan_bangunan_{{ $loop->iteration }}">Nilai Pasar
                    Bangunan</label>
                <div class="input-group input-group-sm">
                    <span class="input-group-text">Rp</span>
                    <input type="text" name="rekom_agunan_bangunan_{{ $loop->iteration }}"
                        id="rekom_agunan_bangunan_{{ $loop->iteration }}" class="form-control form-control-sm setRp"
                        readonly value="{{ number_format($tanah->sc_tanah_rekap_2?->rekom_agunan_bangunan) }}">
                </div>
            </div>
        </div>
        <div class="col-md-12 mb-3">
            <div class="form-group">
                <label for="rekom_total_{{ $loop->iteration }}">Total</label>
                <div class="input-group input-group-sm">
                    <span class="input-group-text">Rp</span>
                    <input type="text" name="rekom_total_{{ $loop->iteration }}"
                        id="rekom_total_{{ $loop->iteration }}" class="form-control form-control-sm setRp" readonly
                        value="{{ number_format($tanah->sc_tanah_rekap_2?->rekom_total) }}">
                </div>
            </div>
        </div>
    @endif
</div>
