<style>
    .req::after {
        content: " *";
        color: red;
    }
</style>

<div class="row" style="margin-left: 5px;">
    <div class="col-md-12 mb-2">
        <input type="hidden" id="id" value="{{ $monitoring != null ? encrypt($monitoring->id) : '' }}" readonly>
        <input type="hidden" id="metode" name="metode" value="{{ $metode }}" readonly>
        <strong>Data Plan AO</strong>
        <hr>
    </div>

    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="kategori_plan">Kategori Rencana :</label>
            <select name="kategori_plan" id="kategori_plan" class="form-select form-select-sm is-invalid" required
                onchange="toggleDiv()">
                <option value="" disabled selected>-- Pilih Kategori Rencana --</option>
                <option {{ $monitoring?->kategori_plan == 'Rencana Prospek' ? 'selected' : '' }}
                    value="Rencana Prospek">Rencana Prospek</option>
                <option {{ $monitoring?->kategori_plan == 'Rencana Penagihan' ? 'selected' : '' }}
                    value="Rencana Penagihan">Rencana Penagihan</option>
                <option {{ $monitoring?->kategori_plan == 'Rencana Lainnya' ? 'selected' : '' }}
                    value="Rencana Lainnya">Rencana Lainnya</option>
            </select>
        </div>
    </div>
</div>

{{-- Rencana Prospek --}}
<div class="row" id="div_rencana_prospek" style="margin-left: 5px;">
    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="nama">Nama :</label>
            <input type="text" name="nama" id="nama" required class="form-control form-control-sm is-invalid"
                placeholder="Nama" value="{{ $monitoring != null ? $monitoring->nama_deb : null }}">
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="alamat">Alamat/Kec/Desa</label>
            <input type="text" name="alamat" id="alamat" required class="form-control form-control-sm is-invalid"
                placeholder="Ketik ..." value="{{ $monitoring != null ? $monitoring->alamat_jns_kegiatan : null }}">
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="jns_usaha">Jenis Usaha :</label>
            <input type="text" name="jns_usaha" id="jns_usaha" required
                class="form-control form-control-sm is-invalid" placeholder="Jenis usaha"
                value="{{ $monitoring != null ? $monitoring->jns_usaha : null }}">
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="no_telp">No Telp/Hp :</label>
            <input type="text" name="no_telp" id="no_telp" required
                class="form-control form-control-sm is-invalid nomor" placeholder="No HP" maxlength="20" minlength="8"
                value="{{ $monitoring != null ? $monitoring->no_telp : null }}">
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="visit_ke">Visit ke :</label>
            <input type="number" name="visit_ke" id="visit_ke" required
                class="form-control form-control-sm is-invalid" placeholder="Hanya angka 1-9999"
                value="{{ $monitoring != null ? $monitoring->visit_asr_ke : null }}" min="1" max="9999">
        </div>
    </div>
</div>
{{-- end Rencana Prospek --}}


{{-- Rencana Penagihan --}}
<div class="row" id="div_rencana_penagihan" style="margin-left: 5px;">
    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="nama_deb">Nama Debitur :</label>
            <input type="text" name="nama_deb" id="nama_deb" required
                class="form-control form-control-sm is-invalid" placeholder="Nama"
                value="{{ $monitoring != null ? $monitoring->nama_deb : null }}">
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="jns_kegiatan_tagih">Jenis Kegiatan :</label>
            <input type="text" name="jns_kegiatan_tagih" id="jns_kegiatan_tagih" required
                class="form-control form-control-sm is-invalid" placeholder="Ketik ..."
                value="{{ $monitoring != null ? $monitoring->alamat_jns_kegiatan : null }}">
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="baki_debet" class="req">Baki Debet :</label>
            <div class="input-group input-group-sm">
                <span class="input-group-text">Rp.</span>
                <input type="text" class="form-control is-invalid setRp" id="baki_debet" name="baki_debet"
                    value="{{ number_format($monitoring?->baki_debet, 0, ',', '.') ?? null }}"
                    placeholder="jika kosong isi 0" required>
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="total_tagihan" class="req">Total Tagihan :</label>
            <div class="input-group input-group-sm">
                <span class="input-group-text">Rp.</span>
                <input type="text" class="form-control is-invalid setRp" id="total_tagihan" name="total_tagihan"
                    value="{{ number_format($monitoring?->total_tagihan, 0, ',', '.') ?? null }}"
                    placeholder="jika kosong isi 0" required>
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="asr_ke">Angsuran ke :</label>
            <input type="number" name="asr_ke" id="asr_ke" required
                class="form-control form-control-sm is-invalid" placeholder="Hanya angka 1-9999"
                value="{{ $monitoring != null ? $monitoring->visit_asr_ke : null }}" min="1" max="9999">
        </div>
    </div>
</div>
{{-- End Rencana Penagihan --}}


{{-- Rencana Lainnya --}}
<div class="row" id="div_rencana_lainnya" style="margin-left: 5px;">
    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="tujuan_kunjungan">Tujuan Kunjungan :</label>
            <input type="text" name="tujuan_kunjungan" id="tujuan_kunjungan" required
                class="form-control form-control-sm is-invalid" placeholder="Tujuan Kunjungan"
                value="{{ $monitoring != null ? $monitoring->tujuan_kunjungan : null }}">
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="jns_kegiatan_lainnya">Jenis Kegiatan :</label>
            <input type="text" name="jns_kegiatan_lainnya" id="jns_kegiatan_lainnya" required
                class="form-control form-control-sm is-invalid" placeholder="Ketik ..."
                value="{{ $monitoring != null ? $monitoring->alamat_jns_kegiatan : null }}">
        </div>
    </div>
</div>
{{-- End Rencana Lainnya --}}




<div class="col-md-12 mb-4" style="margin-left: 20px;">
    <div class="form-group">
        <label for="keterangan">Keterangan :</label>
        <textarea name="keterangan{{ $id_field }}" id="keterangan" required>{!! $monitoring?->keterangan ?? null !!}</textarea>
    </div>
</div>
