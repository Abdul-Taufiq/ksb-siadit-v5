<div class="col-md-4 mb-3">
    <div class="form-group">
        <label for="jns_kendaraan_{{ $loop->iteration }}">Jenis Kendaraan</label>
        <select name="jns_kendaraan_{{ $loop->iteration }}" id="jns_kendaraan_{{ $loop->iteration }}"
            class="form-select form-select-sm">
            <option selected disabled>-Pilih-</option>
            <option {{ $kenda->sc_kenda_agunan?->jns_kendaraan == 'Sepeda Motor' ? 'selected' : '' }}
                value="Sepeda Motor">
                Sepeda Motor</option>
            <option {{ $kenda->sc_kenda_agunan?->jns_kendaraan == 'Mobil Penumpang' ? 'selected' : '' }}
                value="Mobil Penumpang">Mobil Penumpang</option>
            <option {{ $kenda->sc_kenda_agunan?->jns_kendaraan == 'Dump Truck' ? 'selected' : '' }} value="Dump Truck">
                Dump
                Truck</option>
            <option {{ $kenda->sc_kenda_agunan?->jns_kendaraan == 'Bus' ? 'selected' : '' }} value="Bus">Bus</option>
            <option {{ $kenda->sc_kenda_agunan?->jns_kendaraan == 'Mikrobus' ? 'selected' : '' }} value="Mikrobus">
                Mikrobus
            </option>
            <option {{ $kenda->sc_kenda_agunan?->jns_kendaraan == 'Lainnya' ? 'selected' : '' }} value="Lainnya">Lainnya
            </option>
        </select>
    </div>
</div>
<div class="col-md-4 mb-3">
    <div class="form-group">
        <label for="umur_{{ $loop->iteration }}">Umur</label>
        <div class="input-group input-group-sm">
            <input type="number" name="umur_{{ $loop->iteration }}" id="umur_{{ $loop->iteration }}"
                class="form-control form-control-sm" min="0" value="{{ $kenda->sc_kenda_agunan?->umur }}">
            <span class="input-group-text">Tahun</span>
        </div>
    </div>
</div>
<div class="col-md-4 mb-3">
    <div class="form-group">
        <label for="nopol_{{ $loop->iteration }}">Nomor Polisi</label>
        <input type="text" name="nopol_{{ $loop->iteration }}" id="nopol_{{ $loop->iteration }}"
            class="form-control form-control-sm" value="{{ $kenda->sc_kenda_agunan?->nopol ?? $kenda->nopol }}">
    </div>
</div>
<div class="col-md-4 mb-3">
    <div class="form-group">
        <label for="pembelian_{{ $loop->iteration }}">Pembelian Baru/Bekas</label>
        <select name="pembelian_{{ $loop->iteration }}" id="pembelian_{{ $loop->iteration }}"
            class="form-select form-select-sm">
            <option selected disabled>-Pilih-</option>
            <option {{ $kenda->sc_kenda_agunan?->pembelian == 'Baru' ? 'selected' : '' }} value="Baru">Baru</option>
            <option {{ $kenda->sc_kenda_agunan?->pembelian == 'Bekas' ? 'selected' : '' }} value="Bekas">Bekas
            </option>
        </select>
    </div>
</div>
<div class="col-md-4 mb-3">
    <div class="form-group">
        <label for="merk_{{ $loop->iteration }}">Merk</label>
        <input type="text" name="merk_{{ $loop->iteration }}" id="merk_{{ $loop->iteration }}"
            class="form-control form-control-sm" value="{{ $kenda->sc_kenda_agunan?->merk ?? $kenda->merk }}">
    </div>
</div>
<div class="col-md-4 mb-3">
    <div class="form-group">
        <label for="no_mesin_{{ $loop->iteration }}">Nomor Mesin</label>
        <input type="text" name="no_mesin_{{ $loop->iteration }}" id="no_mesin_{{ $loop->iteration }}"
            class="form-control form-control-sm" value="{{ $kenda->sc_kenda_agunan?->no_mesin ?? $kenda->no_mesin }}">
    </div>
</div>
<div class="col-md-4 mb-3">
    <div class="form-group">
        <label for="thn_pembuatan_{{ $loop->iteration }}">Tahun Pembuatan</label>
        <input type="number" name="thn_pembuatan_{{ $loop->iteration }}" id="thn_pembuatan_{{ $loop->iteration }}"
            class="form-control form-control-sm" min="0"
            value="{{ $kenda->sc_kenda_agunan?->thn_pembuatan ?? $kenda->thn_pembuatan }}">
    </div>
</div>
<div class="col-md-4 mb-3">
    <div class="form-group">
        <label for="type_{{ $loop->iteration }}">Type</label>
        <input type="text" name="type_{{ $loop->iteration }}" id="type_{{ $loop->iteration }}"
            class="form-control form-control-sm" value="{{ $kenda->sc_kenda_agunan?->type ?? $kenda->type }}">
    </div>
</div>
<div class="col-md-4 mb-3">
    <div class="form-group">
        <label for="no_rangka_{{ $loop->iteration }}">Nomor Rangka</label>
        <input type="text" name="no_rangka_{{ $loop->iteration }}" id="no_rangka_{{ $loop->iteration }}"
            class="form-control form-control-sm"
            value="{{ $kenda->sc_kenda_agunan?->no_rangka ?? $kenda->no_rangka }}">
    </div>
</div>
<div class="col-md-4 mb-3">
    <div class="form-group">
        <label for="kondisi_{{ $loop->iteration }}">Kondisi</label>
        <select name="kondisi_{{ $loop->iteration }}" id="kondisi_{{ $loop->iteration }}"
            class="form-select form-select-sm">
            <option selected disabled>-Pilih-</option>
            <option {{ $kenda->sc_kenda_agunan?->kondisi == 'Sangat Baik' ? 'selected' : '' }} value="Sangat Baik">
                Sangat
                Baik</option>
            <option {{ $kenda->sc_kenda_agunan?->kondisi == 'Baik' ? 'selected' : '' }} value="Baik">Baik</option>
            <option {{ $kenda->sc_kenda_agunan?->kondisi == 'Cukup' ? 'selected' : '' }} value="Cukup">Cukup</option>
            <option {{ $kenda->sc_kenda_agunan?->kondisi == 'Jelek' ? 'selected' : '' }} value="Jelek">Jelek</option>
        </select>
    </div>
</div>
<div class="col-md-4 mb-3">
    <div class="form-group">
        <label for="perawatan_{{ $loop->iteration }}">Perawatan/Pemeliharaan</label>
        <select name="perawatan_{{ $loop->iteration }}" id="perawatan_{{ $loop->iteration }}"
            class="form-select form-select-sm">
            <option selected disabled>-Pilih-</option>
            <option {{ $kenda->sc_kenda_agunan?->perawatan == 'Sangat Baik' ? 'selected' : '' }} value="Sangat Baik">
                Sangat Baik</option>
            <option {{ $kenda->sc_kenda_agunan?->perawatan == 'Baik' ? 'selected' : '' }} value="Baik">Baik</option>
            <option {{ $kenda->sc_kenda_agunan?->perawatan == 'Cukup' ? 'selected' : '' }} value="Cukup">Cukup
            </option>
            <option {{ $kenda->sc_kenda_agunan?->perawatan == 'Jelek' ? 'selected' : '' }} value="Jelek">Jelek
            </option>
            <option {{ $kenda->sc_kenda_agunan?->perawatan == 'Sangat Jelek' ? 'selected' : '' }}
                value="Sangat Jelek">
                Sangat Jelek</option>
        </select>
    </div>
</div>
