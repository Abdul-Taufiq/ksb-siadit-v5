<input type="hidden" name="id_kredit" id="id_kredit" value="{{ $idKredit }}">
<input type="hidden" name="id_debitur" id="id_debitur" value="{{ $idDeb }}">
<input type="hidden" name="jabatan" id="jabatan" value="{{ Auth::user()->jabatan }}">

<div class="row" style="margin-left: 5px;">
    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="jns_pinjaman">Jenis Pinjaman</label>
            <select name="jns_pinjaman" id="jns_pinjaman" class="form-select is-invalid" required>
                <option disabled selected>- Pilih Jenis Pinjaman -</option>
                <option value="PINAS (Pinjaman Nasabah)">PINAS (Pinjaman Nasabah)</option>
                <option value="PIKAR (Internal KSB)">PIKAR (Internal KSB)</option>
                <option value="Kredit Pihak Terkait">Kredit Pihak Terkait</option>
                <option value="PIKAR (Eksternal)">PIKAR (Eksternal)</option>
            </select>
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="kategori_jaminan_opsi">Kategori Jaminan Opsi</label>
            <select name="kategori_jaminan_opsi" id="kategori_jaminan_opsi" class="form-select is-invalid" required>
                <option disabled selected>- Pilih Kategori Jaminan Opsi -</option>
                <option value="Menggunakan Jaminan">Menggunakan Jaminan</option>
                <option value="PIKAR (Non-jaminan)">PIKAR (Non-jaminan)</option>
            </select>
        </div>
    </div>
</div>


{{-- head MOU (PIkar eksten) --}}
<div class="row" style="margin-left: 5px;" id="head_pikar_eks">
    <div class="col-md-12 mb-2">
        <hr>
        <h6 style="font-weight: bold; font-style: italic; letter-spacing: 2px; color: rgb(0, 162, 255)">
            &rarr; Data Perjanjian Kerja Sama
        </h6>
        <hr>
    </div>
    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="nama_perusahaan">Nama Perusahaan PT/CV</label>
            <input type="text" name="nama_perusahaan" id="nama_perusahaan" class="form-control is-invalid" required
                placeholder="Nama Perusahaan PT/CV">
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="no_perjanjian">Nomor Perjanjian</label>
            <input type="text" name="no_perjanjian" id="no_perjanjian" class="form-control is-invalid" required
                placeholder="Nomor Perjanjian">
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="tgl_perjanjian">Tanggal Perjanjian</label>
            <input type="date" name="tgl_perjanjian" id="tgl_perjanjian" class="form-control is-invalid" required
                placeholder="Tanggal Perjanjian">
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="nama_bpjs">Nama BPJS</label>
            <input type="text" name="nama_bpjs" id="nama_bpjs" class="form-control is-invalid" required
                placeholder="Nama BPJS">
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="no_bpjs">Nomor BPJS</label>
            <input type="text" name="no_bpjs" id="no_bpjs" class="form-control is-invalid" required
                placeholder="Nomor BPJS">
        </div>
    </div>
</div>




{{-- head jaminan 1 --}}
<div class="row" style="margin-left: 5px;" id="head_jaminan_1">
    <div class="col-md-12 mb-2">
        <hr>
        <h6 style="font-weight: bold; font-style: italic; letter-spacing: 2px; color: rgb(0, 162, 255)">
            &rarr; Data Jaminan 1
        </h6>
        <hr>
    </div>
    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="kategori_jaminan_1">Kategori Jaminan</label>
            <select name="kategori_jaminan_1" id="kategori_jaminan_1" class="form-select is-invalid" required>
                <option disabled selected>- Pilih Kategori Jaminan -</option>
                <option value="Tanah/Bangunan">Tanah/Bangunan</option>
                <option value="Kendaraan">Kendaraan</option>
                <option value="Deposito">Tabungan/Deposito</option>
            </select>
        </div>
    </div>
</div>

{{-- Tanah --}}
<div class="row" style="margin-left: 5px;" id="head_tanah_1">
    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="type_sertifikat_1">Type Sertifikat</label>
            <select name="type_sertifikat_1" id="type_sertifikat_1" class="form-select is-invalid" required>
                <option disabled selected>- Pilih Type Sertifikat -</option>
                <option value="Sertifikat-Analog">Sertifikat-Analog</option>
                <option value="Sertifikat-El">Sertifikat-El</option>
            </select>
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="alih_media_1">Alih Media</label>
            <select name="alih_media_1" id="alih_media_1" class="form-select is-invalid" required>
                <option disabled selected>- Pilih -</option>
                <option value="Ya">Ya</option>
                <option value="Tidak">Tidak</option>
            </select>
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="jns_jaminan_opsi_1">Jenis Jaminan</label>
            <select name="jns_jaminan_opsi_1" id="jns_jaminan_opsi_1" class="form-select is-invalid" required>
                <option disabled selected>- Pilih -</option>
                <option value="SHM">SHM</option>
                <option value="SHGB">SHGB</option>
                <option value="Lainnya">Lainnya</option>
            </select>
            <input type="text" name="jns_jaminan_1" id="jns_jaminan_1" class="form-control is-invalid" required
                placeholder="Sebutkan Lengkap, cth: Sertifikat Hak Guna Usaha">
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="no_shm_shgb_1">No Sertifikat/No NIB</label>
            <input type="text" name="no_shm_shgb_1" id="no_shm_shgb_1" class="form-control is-invalid" required
                placeholder="Nomor Sertifikat" onfocusout="cariAgunan(1)">
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="atas_nama_1">Atas Nama</label>
            <input type="text" name="atas_nama_1" id="atas_nama_1" class="form-control is-invalid" required
                placeholder="Atas Nama">
        </div>
    </div>
</div>

{{-- Kendaraan --}}
<div class="row" style="margin-left: 5px;" id="head_kendaraan_1">
    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="jns_kendaraan_1">Jenis Kendaraan</label>
            <select name="jns_kendaraan_1" id="jns_kendaraan_1" class="form-select is-invalid" required>
                <option disabled selected>- Pilih -</option>
                <option value="Sepeda Motor">Sepeda Motor</option>
                <option value="Mobil">Mobil</option>
                <option value="Bus">Bus</option>
                <option value="Truck">Truck</option>
            </select>
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="atas_nama_kendaraan_1">Atas Nama</label>
            <input type="text" name="atas_nama_kendaraan_1" id="atas_nama_kendaraan_1"
                class="form-control is-invalid" required placeholder="Atas Nama">
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="no_bpkb_1">Nomor BPKB</label>
            <input type="text" name="no_bpkb_1" id="no_bpkb_1" class="form-control is-invalid" required
                placeholder="Nomor BPKB" onfocusout="cariAgunanKenda(1)">
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="tgl_bpkb_1">Tanggal BPKB</label>
            <input type="date" name="tgl_bpkb_1" id="tgl_bpkb_1" class="form-control is-invalid" required
                placeholder="Tanggal BPKB">
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="merk_1">Merk</label>
            <input type="text" name="merk_1" id="merk_1" class="form-control is-invalid" required
                placeholder="Merk">
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="nopol_1">Nomor Polisi</label>
            <input type="text" name="nopol_1" id="nopol_1" class="form-control is-invalid" required
                placeholder="Nopol">
        </div>
    </div>
</div>

{{-- Deposito --}}
<div class="row" style="margin-left: 5px;" id="head_deposito_1">
    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="jns_jaminan_deposito_1">Spesifik Tabungan/Deposito</label>
            <select name="jns_jaminan_deposito_1" id="jns_jaminan_deposito_1" class="form-select is-invalid"
                required>
                <option disabled selected>- Pilih -</option>
                <option value="Deposito">Deposito</option>
                <option value="Tabungan">Tabungan</option>
            </select>
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="no_rek_1">Nomor Rekening</label>
            <input type="text" name="no_rek_1" id="no_rek_1" class="form-control is-invalid" required
                placeholder="Nomor Rekening">
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="atas_nama_deposito_1">Atas Nama</label>
            <input type="text" name="atas_nama_deposito_1" id="atas_nama_deposito_1"
                class="form-control is-invalid" required placeholder="Atas Nama">
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="nominal_1">Nominal</label>
            <input type="text" name="nominal_1" id="nominal_1" class="form-control is-invalid" required
                placeholder="Nominal">
        </div>
    </div>
</div>

{{-- Non Jaminan --}}
<div class="row d-none" id="head_non_jaminan">
    <div class="col-md-12">
        <h1 style="color: red; font-style: italic; text-align: center; font-weight: bold;">
            PIKAR (NON JAMINAN) TIDAK MEMERLUKAN JAMINAN</h1>
    </div>
</div>

{{-- tambahan --}}
<div id="tambahan_jaminan"></div>
<div class="text-center">
    <button class="btn btn-outline-primary w-100" id="tambah_penjamin" type="button" onclick="tambahJaminan()">
        <i class="fa-solid fa-circle-plus"></i> Tambah Data Jaminan <i class="fa-solid fa-circle-plus"></i>
    </button>
</div>
