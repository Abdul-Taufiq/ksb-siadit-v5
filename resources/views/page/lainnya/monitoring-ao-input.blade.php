{{-- monitoring --}}

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
        <strong>Data Calon Debitur</strong>
        <hr>
    </div>

    @if (Auth::user()->jabatan != 'AO')
        <div class="col-md-12 mb-4">
            <div class="form-group">
                <label for="tgl_kunjungan">Tanggal Kunjungan AO :</label>
                <input type="date" name="tgl_kunjungan" id="tgl_kunjungan" required
                    class="form-control form-control-sm is-invalid"
                    value="{{ $monitoring != null ? $monitoring->tgl_kunjungan->format('Y-m-d') : null }}">
            </div>
        </div>
    @endif


    @if (Auth::user()->jabatan == 'AO' && now()->hour <= 12 && $metode == 'create')
        <div class="col-md-12 mb-4">
            <div class="form-group">
                <div class="form-check form-check-inline">
                    <input type="hidden" name="cek_tgl_ao" value="False">
                    <input class="form-check-input" type="checkbox" id="cek_tgl_ao" name="cek_tgl_ao" value="True"
                        style="size: 10px" onchange="confirmCheckbox()">
                    <label class="form-check-label" for="cek_tgl_ao"
                        style="font-style: italic; color: rgb(158, 158, 0);">
                        Centang kotak ini maka tanggal akan disimpan ke hari kemarin!
                    </label>
                </div>
            </div>
        </div>
    @endif

    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="no_hp_cadeb{{ $id_field }}">No HP Calon Debitur :</label>
            <input type="text" name="no_hp_cadeb{{ $id_field }}" id="no_hp_cadeb{{ $id_field }}" required
                class="form-control form-control-sm is-invalid nomor" placeholder="No HP" maxlength="20" minlength="8"
                value="{{ $monitoring != null ? $monitoring->no_hp_cadeb : null }}">
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="nama_cadeb{{ $id_field }}">Nama Calon Debitur :</label>
            <input type="text" name="nama_cadeb{{ $id_field }}" id="nama_cadeb{{ $id_field }}" required
                class="form-control form-control-sm is-invalid" placeholder="Nama Calon Debitur"
                value="{{ $monitoring != null ? $monitoring->nama_cadeb : null }}">
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="potensi_plafond{{ $id_field }}" class="req">Potensi Plafond :</label>
            <div class="input-group input-group-sm">
                <span class="input-group-text">Rp.</span>
                <input type="text" class="form-control is-invalid setRp" id="potensi_plafond{{ $id_field }}"
                    name="potensi_plafond{{ $id_field }}"
                    value="{{ number_format($monitoring?->potensi_plafond, 0, ',', '.') ?? '0' }}"
                    placeholder="jika kosong isi 0" required>
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="usaha{{ $id_field }}">Usaha :</label>
            <input type="text" name="usaha{{ $id_field }}" id="usaha{{ $id_field }}" required
                class="form-control form-control-sm is-invalid" placeholder="Usaha"
                value="{{ $monitoring != null ? $monitoring->usaha : null }}">
        </div>
    </div>

    <div class="col-md-12">
        <hr>
        <strong>
            Alamat Domisili/Usaha
        </strong>
        <hr>
    </div>
    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="dusun{{ $id_field }}">Dusun RT/RW :</label>
            <input type="text" name="dusun{{ $id_field }}" id="dusun{{ $id_field }}" required
                class="form-control form-control-sm is-invalid" placeholder="Dusun RT/RW"
                value="{{ $monitoring != null ? $monitoring->dusun : null }}">
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="desa{{ $id_field }}">Desa :</label>
            <input type="text" name="desa{{ $id_field }}" id="desa{{ $id_field }}" required
                class="form-control form-control-sm is-invalid" placeholder="Desa"
                value="{{ $monitoring != null ? $monitoring->desa : null }}">
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="kecamatan{{ $id_field }}">Kecamatan :</label>
            <input type="text" name="kecamatan{{ $id_field }}" id="kecamatan{{ $id_field }}" required
                class="form-control form-control-sm is-invalid" placeholder="Kecamatan"
                value="{{ $monitoring != null ? $monitoring->kecamatan : null }}">
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="kabupaten{{ $id_field }}">Kabupaten/Kota :</label>
            <input type="text" name="kabupaten{{ $id_field }}" id="kabupaten{{ $id_field }}" required
                class="form-control form-control-sm is-invalid" placeholder="Kabupaten/Kota"
                value="{{ $monitoring != null ? $monitoring->kabupaten : null }}">
        </div>
    </div>


    <div class="col-md-12">
        <hr>
        <strong>
            Data Lainnya
        </strong>
        <hr>
    </div>

    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="kunjungan_ke{{ $id_field }}">Follow Up/Kunjungan Ke :</label>
            <input type="number" name="kunjungan_ke{{ $id_field }}" id="kunjungan_ke{{ $id_field }}"
                required class="form-control form-control-sm is-invalid" placeholder="Hanya angka 1-9999"
                value="{{ $monitoring != null ? $monitoring->kunjungan_ke : null }}" min="1" max="9999">
        </div>
    </div>
    {{-- <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="kunjungan_ke{{ $id_field }}">Follow Up/Kunjungan Ke :</label>
            <input type="number" name="kunjungan_ke{{ $id_field }}" id="kunjungan_ke{{ $id_field }}" required
                class="form-control form-control-sm is-invalid" placeholder="Hanya angka 1-9999"
                value="{{ $monitoring != null ? $monitoring->kunjungan_ke : null }}" min="1" max="9999">
        </div>
    </div> --}}
    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="klasifikasi{{ $id_field }}">Klasifikasi :</label>
            <select name="klasifikasi{{ $id_field }}" id="klasifikasi{{ $id_field }}"
                class="form-select form-select-sm is-invalid" required>
                <option value="" disabled selected>-- Pilih Klasifikasi --</option>
                <option value="HOT" {{ $monitoring?->klasifikasi == 'HOT' ? 'selected' : null }}>HOT</option>
                <option value="WARM" {{ $monitoring?->klasifikasi == 'WARM' ? 'selected' : null }}>WARM</option>
                <option value="COLD" {{ $monitoring?->klasifikasi == 'COLD' ? 'selected' : null }}>COLD</option>
            </select>
        </div>
    </div>
    <div class="col-md-12 mb-4">
        <div class="form-group">
            <label for="keterangan">Keterangan :</label>
            <textarea name="keterangan{{ $id_field }}" id="keterangan" required>{!! $monitoring?->keterangan ?? null !!}</textarea>
        </div>
    </div>


</div>
