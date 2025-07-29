function addJaminanTanah(counter) {
    return `
            <div class="col-md-6 mb-4" id="tgl_serti_${counter}">
                <div class="form-group">
                    <label for="tgl_sertifikat_${counter}">Tanggal Sertifikat</label>
                    <input type="date" name="tgl_sertifikat_${counter}"
                        id="tgl_sertifikat_${counter}" class="form-control is-invalid" required
                        placeholder="Tanggal Sertifikat">
                </div>
            </div>
            <div class="col-md-6 mb-4" id="tgl_suruk_${counter}">
                <div class="form-group">
                    <label for="tgl_surat_ukur_${counter}">Tanggal Surat Ukur</label>
                    <input type="date" name="tgl_surat_ukur_${counter}"
                        id="tgl_surat_ukur_${counter}" class="form-control is-invalid" required
                        placeholder="Tanggal Surat Ukur">
                </div>
            </div>
            <div class="col-md-6 mb-4" id="no_suruk_${counter}">
                <div class="form-group">
                    <label for="no_surat_ukur_${counter}">Nomor Surat Ukur</label>
                    <input type="text" name="no_surat_ukur_${counter}"
                        id="no_surat_ukur_${counter}" class="form-control is-invalid" required
                        placeholder="Nomor Surat Ukur">
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="form-group">
                    <label for="luas_${counter}">Luas</label>
                    <input type="number" name="luas_${counter}" id="luas_${counter}"
                        class="form-control is-invalid" required placeholder="Luas" min="0">
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="form-group">
                    <label for="desa_${counter}">Desa/Kelurahan</label>
                    <input type="text" name="desa_${counter}" id="desa_${counter}"
                        class="form-control is-invalid" required placeholder="Desa/Kelurahan">
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="form-group">
                    <label for="kecamatan_${counter}">Kecamatan</label>
                    <input type="text" name="kecamatan_${counter}"
                        id="kecamatan_${counter}" class="form-control is-invalid" required
                        placeholder="Kecamatan">
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="form-group">
                    <label for="kabupatan_${counter}">Kabupaten/Kota</label>
                    <input type="text" name="kabupatan_${counter}"
                        id="kabupatan_${counter}" class="form-control is-invalid" required
                        placeholder="Kabupaten/Kota">
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="form-group">
                    <label for="provinsi_${counter}">Provinsi</label>
                    <input type="text" name="provinsi_${counter}"
                        id="provinsi_${counter}" class="form-control is-invalid" required
                        placeholder="Provinsi">
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="form-group">
                    <label for="keterangan_${counter}">Keterangan</label>
                    <select name="keterangan_${counter}" id="keterangan_${counter}"
                        class="form-select is-invalid" required>
                        <option disabled selected>- Pilih -</option>
                        <option value="Tanah Pekarangan">Tanah Pekarangan</option>
                        <option value="Tanah Sawah">Tanah
                            Sawah
                        </option>
                    </select>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="form-group">
                    <label for="detail_kategori_jaminan_${counter}">Detail Kategori Jaminan</label>
                    <select name="detail_kategori_jaminan_${counter}"
                        id="detail_kategori_jaminan_${counter}" class="form-select is-invalid" required>
                        <option disabled selected>- Pilih -</option>
                        <option value="Tanah">Tanah</option>
                        <option value="Tanah & Bangunan">Tanah & Bangunan</option>
                        <option value="Ruko & Rukan">Ruko & Rukan</option>
                    </select>
                </div>
            </div>
    `;
}

function addJaminanKenda(counter) {
    return `
            <div class="col-md-6 mb-4">
                <div class="form-group">
                    <label for="type_${counter}">Type</label>
                    <input type="text" name="type_${counter}" id="type_${counter}"
                        class="form-control is-invalid" required placeholder="Type" >
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="form-group">
                    <label for="warna_${counter}">Warna</label>
                    <input type="text" name="warna_${counter}" id="warna_${counter}"
                        class="form-control is-invalid" required placeholder="Warna">
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="form-group">
                    <label for="no_rangka_${counter}">Nomor Rangka</label>
                    <input type="text" name="no_rangka_${counter}"
                        id="no_rangka_${counter}" class="form-control is-invalid" required
                        placeholder="Nomor Rangka" >
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="form-group">
                    <label for="no_mesin_${counter}">Nomor Mesin</label>
                    <input type="text" name="no_mesin_${counter}"
                        id="no_mesin_${counter}" class="form-control is-invalid" required
                        placeholder="Nomor Mesin">
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="form-group">
                    <label for="thn_pembuatan_${counter}">Tahun Pembuatan</label>
                    <input type="text" name="thn_pembuatan_${counter}"
                        id="thn_pembuatan_${counter}" class="form-control is-invalid" required
                        placeholder="Tahun Pembuatan" >
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="form-group">
                    <label for="nama_pemilik_sebelumnya_${counter}">Nama Pemilik Sebelumnya</label>
                    <input type="text" name="nama_pemilik_sebelumnya_${counter}"
                        id="nama_pemilik_sebelumnya_${counter}" class="form-control is-invalid" required
                        placeholder="Nama Pemilik Sebelumnya">
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="form-group">
                    <label for="alamat_pemilik_sebelumnya_${counter}">Alamat Pemilik Sebelumnya</label>
                    <input type="text" name="alamat_pemilik_sebelumnya_${counter}"
                        id="alamat_pemilik_sebelumnya_${counter}" class="form-control is-invalid"
                        required placeholder="Alamat Pemilik Sebelumnya">
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="form-group">
                    <label for="thn_pembelian_${counter}">Tahun Pembelian</label>
                    <input type="text" name="thn_pembelian_${counter}"
                        id="thn_pembelian_${counter}" class="form-control is-invalid" required
                        placeholder="Tahun Pembelian" >
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="form-group">
                    <label for="harga_pembelian_${counter}">Harga Pembelian</label>
                    <input type="text" name="harga_pembelian_${counter}"
                        id="harga_pembelian_${counter}" class="form-control is-invalid" required
                        placeholder="Harga Pembelian" >
                </div>
            </div>
    `;
}
