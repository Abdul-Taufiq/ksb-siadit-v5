{{-- take id debitur --}}
<input type="hidden" name="id_debitur" id="id_debitur" value="{{ $idDeb }}">

<div class="col-md-6">
    <div class="form-group">
        <label for="pemilik_jaminan_opsi">Pemilik Jaminan</label>
        <select name="pemilik_jaminan_opsi" id="pemilik_jaminan_opsi" class="form-select is-invalid">
            <option selected disabled>- Pilih Pemilik Jaminan -</option>
            <option value="Debitur">Debitur</option>
            <option value="Penjamin">Penjamin</option>
        </select>
    </div>
</div>


{{-- penjamin 1 --}}
<div class="row" style="margin-left: 5px;" id="head_penjamin_1">
    {{-- penjamin --}}
    <div class="row" id="div_penjamin_1">
        <div class="col-md-12 mb-2">
            <hr>
            <h6 style="font-weight: bold; font-style: italic; letter-spacing: 2px; color: rgb(0, 162, 255)">
                &rarr; Data Penjamin 1
            </h6>
            <hr>
        </div>

        <div class="col-md-6 mb-4">
            <div class="form-group">
                <label for="nik_1">NIK:</label>
                <input type="text" name="nik_1" id="nik_1" required class="form-control nik is-invalid"
                    placeholder="NIK" maxlength="16" minlength="16">
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="form-group">
                <label for="nama_1">Nama:</label>
                <input type="text" name="nama_1" id="nama_1" required class="form-control is-invalid"
                    placeholder="Nama">
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="form-group">
                <label for="tempat_lahir_1">Tempat Lahir:</label>
                <input type="text" name="tempat_lahir_1" id="tempat_lahir_1" required class="form-control is-invalid"
                    placeholder="Tempat Lahir">
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="form-group">
                <label for="tgl_lahir_1">Tanggal Lahir:</label>
                <input type="date" name="tgl_lahir_1" id="tgl_lahir_1" required class="form-control is-invalid"
                    placeholder="Tempat Lahir">
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="form-group">
                <label for="jenis_kelamin_1">Jenis Kelamin:</label>
                <select name="jenis_kelamin_1" id="jenis_kelamin_1" required class="form-select is-invalid">
                    <option selected disabled>Pilih Jenis Kelamin</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="form-group">
                <label for="alamat_1">Alamat:</label>
                <textarea name="alamat_1" id="alamat_1" required class="form-control is-invalid" placeholder="Alamat"></textarea>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="form-group">
                <label for="status_pernikahan_1">Status Pernikahan:</label>
                <select name="status_pernikahan_1" id="status_pernikahan_1" required class="form-select is-invalid">
                    <option selected disabled>- Pilih Status Penjamin -</option>
                    <option value="Menikah">Menikah</option>
                    <option value="Belum Menikah">Belum Menikah</option>
                    <option value="Duda/Janda">Duda/Janda</option>
                    <option value="SHM Khusus Waris">SHM Khusus Waris</option>
                    <option value="Pernikahan Khusus">Pernikahan Khusus</option>
                </select>
            </div>
        </div>
    </div>


    {{-- pasangan penjamin --}}
    <div class="row" id="div_pasangan_1">
        <div class="col-md-12 mb-2">
            <hr>
            <h6 style="font-weight: bold; font-style: italic; letter-spacing: 2px; color: rgb(0, 162, 255)">
                &rarr; Data Pasangan Penjamin 1
            </h6>
            <hr>
        </div>

        <div class="col-md-6 mb-4">
            <div class="form-group">
                <label for="nik_pasangan_1">NIK:</label>
                <input type="text" name="nik_pasangan_1" id="nik_pasangan_1" required
                    class="form-control nik is-invalid" placeholder="NIK Pasangan" maxlength="16" minlength="16">
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="form-group">
                <label for="nama_pasangan_1">Nama:</label>
                <input type="text" name="nama_pasangan_1" id="nama_pasangan_1" required
                    class="form-control is-invalid" placeholder="Nama">
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="form-group">
                <label for="tempat_lahir_pasangan_1">Tempat Lahir:</label>
                <input type="text" name="tempat_lahir_pasangan_1" id="tempat_lahir_pasangan_1" required
                    class="form-control is-invalid" placeholder="Tempat Lahir">
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="form-group">
                <label for="tgl_lahir_pasangan_1">Tanggal Lahir:</label>
                <input type="date" name="tgl_lahir_pasangan_1" id="tgl_lahir_pasangan_1" required
                    class="form-control is-invalid" placeholder="Tempat Lahir">
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="form-group">
                <label for="alamat_pasangan_opsi_1">Alamat Pasangan:</label>
                <select name="alamat_pasangan_opsi_1" id="alamat_pasangan_opsi_1" class="form-select is-invalid"
                    required>
                    <option selected disabled>- Alamat -</option>
                    <option value="Tinggal Sendiri">Tinggal Sendiri</option>
                    <option value="sama dengan suaminya">Sama Dengan Suaminya</option>
                    <option value="sama dengan istrinya">Sama Dengan Istrinya</option>
                </select>
                <textarea class="form-control d-none is-invalid" name="alamat_pasangan_1" id="alamat_pasangan_1" rows="3"
                    placeholder="Alamat Rumah, contoh: Jl. Pangeran Diponegoro No.210, Jetis Selatan, Parakan Kauman, Kec. Parakan, Kabupaten Temanggung"></textarea>
            </div>
        </div>
    </div>


    {{-- Akta Pernikahan Khusus --}}
    <div class="row" id="div_akta_1">
        <div class="col-md-12 mb-2">
            <hr>
            <h6 style="font-weight: bold; font-style: italic; letter-spacing: 2px; color: rgb(0, 162, 255)">
                &rarr; Data Akta Pernikahan Khusus 1
            </h6>
            <hr>
        </div>

        <div class="col-md-6 mb-4">
            <div class="form-group">
                <label for="judul_akta_1">Judul Akta:</label>
                <input type="text" name="judul_akta_1" id="judul_akta_1" required class="form-control is-invalid"
                    placeholder="Judul Akta">
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="form-group">
                <label for="no_akta_1">Nomor Akta:</label>
                <input type="text" name="no_akta_1" id="no_akta_1" required class="form-control is-invalid"
                    placeholder="Nomor Akta">
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="form-group">
                <label for="tgl_akta_1">Tanggal Akta:</label>
                <input type="date" name="tgl_akta_1" id="tgl_akta_1" required class="form-control is-invalid"
                    placeholder="tgl">
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="form-group">
                <label for="nama_notaris_1">Nama Notaris:</label>
                <input type="text" name="nama_notaris_1" id="nama_notaris_1" required
                    class="form-control is-invalid" placeholder="Nama Notaris">
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="form-group">
                <label for="kedudukan_notaris_1">Kedudukan Notaris:</label>
                <input type="text" name="kedudukan_notaris_1" id="kedudukan_notaris_1" required
                    class="form-control is-invalid" placeholder="Kedudukan Akta">
            </div>
        </div>
    </div>


    {{-- tambahan --}}
    <div id="tambahan_penjamin"></div>
    <div class="text-center">
        <button class="btn btn-outline-primary w-100" id="tambah_penjamin" type="button"
            onclick="tambahPenjamin()">
            <i class="fa-solid fa-circle-plus"></i> Tambah Data Penjamin <i class="fa-solid fa-circle-plus"></i>
        </button>
    </div>
</div>
