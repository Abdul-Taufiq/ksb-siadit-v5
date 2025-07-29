<div class="row" style="margin-left: 5px;">
    <div class="col-md-12 mb-2">
        <h6 style="font-weight: bold; font-style: italic; letter-spacing: 2px; color: rgb(0, 162, 255)">
            &rarr; Data Identitas
        </h6>
        <hr>
        <input type="hidden" id="id_field" value="{{ $id_field }}" readonly>
        <input type="hidden" id="metode" name="metode" value="{{ $metode }}" readonly>
    </div>
    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="nik{{ $id_field }}">NIK :</label>
            <input type="text" name="nik{{ $id_field }}" id="nik{{ $id_field }}" required
                class="form-control nik is-invalid" placeholder="NIK" maxlength="16" minlength="16"
                onfocusout="{{ $debitur == null ? 'cariFunction()' : '' }}"
                value="{{ $debitur != null ? $debitur->nik : null }}">
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="nama_debitur{{ $id_field }}">Nama Debitur :</label>
            <input type="text" name="nama_debitur{{ $id_field }}" id="nama_debitur{{ $id_field }}" required
                class="form-control is-invalid" placeholder="Nama Debitur"
                value="{{ $debitur != null ? $debitur->nama_debitur : null }}">
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="tempat_lahir{{ $id_field }}">Tempat Lahir :</label>
            <input type="text" name="tempat_lahir{{ $id_field }}" id="tempat_lahir{{ $id_field }}" required
                class="form-control is-invalid" placeholder="Tempat Lahir"
                value="{{ $debitur != null ? $debitur->tempat_lahir : null }}">
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="tgl_lahir{{ $id_field }}">Tanggal Lahir :</label>
            <input type="date" name="tgl_lahir{{ $id_field }}" id="tgl_lahir{{ $id_field }}" required
                class="form-control is-invalid"
                value="{{ $debitur != null ? $debitur->tgl_lahir->format('Y-m-d') : null }}">
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="jenis_kelamin{{ $id_field }}">Jenis Kelamin :</label>
            <select name="jenis_kelamin{{ $id_field }}" id="jenis_kelamin{{ $id_field }}" required
                class="form-select is-invalid">
                <option {{ $debitur == null ? 'selected' : '' }} disabled>Pilih Jenis Kelamin</option>
                <option {{ ($debitur == null ? null : $debitur->jenis_kelamin == 'Laki-laki') ? 'selected' : null }}
                    value="Laki-laki">Laki-laki</option>
                <option {{ ($debitur == null ? null : $debitur->jenis_kelamin == 'Perempuan') ? 'selected' : null }}
                    value="Perempuan">Perempuan</option>
            </select>
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="status_pernikahan{{ $id_field }}">Status Pernikahan :</label>
            <select name="status_pernikahan{{ $id_field }}" id="status_pernikahan{{ $id_field }}" required
                class="form-select is-invalid">
                <option {{ $debitur == null ? 'selected' : '' }} disabled>- Pilih Status Debitur -</option>
                <option {{ ($debitur == null ? null : $debitur->status_pernikahan == 'Menikah') ? 'selected' : null }}
                    value="Menikah">Menikah</option>
                <option
                    {{ ($debitur == null ? null : $debitur->status_pernikahan == 'Belum Menikah') ? 'selected' : null }}
                    value="Belum Menikah">Belum Menikah</option>
                <option
                    {{ ($debitur == null ? null : $debitur->status_pernikahan == 'Duda/Janda') ? 'selected' : null }}
                    value="Duda/Janda">Duda/Janda</option>
                <option
                    {{ ($debitur == null ? null : $debitur->status_pernikahan == 'Pernikahan') ? 'selected' : null }}
                    value="Pernikahan Khusus">Pernikahan Khusus</option>
            </select>
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="pendidikan_terakhir{{ $id_field }}">Pendidikan Terakhir :</label>
            <select name="pendidikan_terakhir{{ $id_field }}" id="pendidikan_terakhir{{ $id_field }}" required
                class="form-select is-invalid">
                <option {{ $debitur == null ? 'selected' : '' }} disabled>- Pilih Pendidikan Terakhir Debitur -
                </option>
                <option
                    {{ ($debitur == null ? null : $debitur->pendidikan_terakhir == 'Tidak Sekolah') ? 'selected' : null }}
                    value="Tidak Sekolah">Tidak Sekolah</option>
                <option
                    {{ ($debitur == null ? null : $debitur->pendidikan_terakhir == 'SD sederajat') ? 'selected' : null }}
                    value="SD Sederajat">SD sederajat</option>
                <option
                    {{ ($debitur == null ? null : $debitur->pendidikan_terakhir == 'SMP sederajat') ? 'selected' : null }}
                    value="SMP Sederajat">SMP sederajat</option>
                <option
                    {{ ($debitur == null ? null : $debitur->pendidikan_terakhir == 'SMA sederajat') ? 'selected' : null }}
                    value="SMA Sederajat">SMA sederajat</option>
                <option {{ ($debitur == null ? null : $debitur->pendidikan_terakhir == 'D1') ? 'selected' : null }}
                    value="D1">D1</option>
                <option {{ ($debitur == null ? null : $debitur->pendidikan_terakhir == 'D2') ? 'selected' : null }}
                    value="D2">D2</option>
                <option {{ ($debitur == null ? null : $debitur->pendidikan_terakhir == 'D3') ? 'selected' : null }}
                    value="D3">D3</option>
                <option {{ ($debitur == null ? null : $debitur->pendidikan_terakhir == 'D4') ? 'selected' : null }}
                    value="D4">D4</option>
                <option {{ ($debitur == null ? null : $debitur->pendidikan_terakhir == 'S1') ? 'selected' : null }}
                    value="S1">S1</option>
                <option {{ ($debitur == null ? null : $debitur->pendidikan_terakhir == 'S2') ? 'selected' : null }}
                    value="S2">S2</option>
                <option {{ ($debitur == null ? null : $debitur->pendidikan_terakhir == 'S3') ? 'selected' : null }}
                    value="S3">S3</option>
            </select>
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="alamat_ktp{{ $id_field }}">Alamat <i>(Sesuai KTP)</i> :</label>
            <input type="text" name="alamat_ktp{{ $id_field }}" id="alamat_ktp{{ $id_field }}" required
                class="form-control is-invalid" placeholder="Alamat (Sesuai KTP)"
                value="{{ $debitur != null ? $debitur->alamat_ktp : null }}">
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="rt_rw_ktp{{ $id_field }}">RT/RW <i>(Sesuai KTP)</i> :</label>
            <input type="text" name="rt_rw_ktp{{ $id_field }}" id="rt_rw_ktp{{ $id_field }}" required
                class="form-control is-invalid" placeholder="format: RT/RW, contoh: 005/003"
                value="{{ $debitur != null ? $debitur->rt_rw_ktp : null }}">
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="kelurahan{{ $id_field }}">Desa/Kelurahan <i>(Sesuai KTP)</i> :</label>
            <input type="text" name="kelurahan{{ $id_field }}" id="kelurahan{{ $id_field }}" required
                class="form-control is-invalid" placeholder="Desa/Kelurahan (Sesuai KTP)"
                value="{{ $debitur != null ? $debitur->kelurahan : null }}">
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="kecamatan{{ $id_field }}">Kecamatan <i>(Sesuai KTP)</i> :</label>
            <input type="text" name="kecamatan{{ $id_field }}" id="kecamatan{{ $id_field }}" required
                class="form-control is-invalid" placeholder="kecamatan (Sesuai KTP)"
                value="{{ $debitur != null ? $debitur->kecamatan : null }}">
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="kabupaten{{ $id_field }}">Kabupaten/Kota <i>(Sesuai KTP)</i> :</label>
            <input type="text" name="kabupaten{{ $id_field }}" id="kabupaten{{ $id_field }}" required
                class="form-control is-invalid" placeholder="kabupaten/Kota (Sesuai KTP)"
                value="{{ $debitur != null ? $debitur->kabupaten : null }}">
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="nama_ibu{{ $id_field }}">Nama Gadis Ibu :</label>
            <input type="text" name="nama_ibu{{ $id_field }}" id="nama_ibu{{ $id_field }}" required
                class="form-control is-invalid" placeholder="Nama Gadis Ibu"
                value="{{ $debitur != null ? $debitur->nama_ibu : null }}">
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="jumlah_tanggungan{{ $id_field }}">Jumlah Tanggungan :</label>
            <input type="number" name="jumlah_tanggungan{{ $id_field }}"
                id="jumlah_tanggungan{{ $id_field }}" required class="form-control is-invalid"
                placeholder="Hanya Angka, contoh: 2. Jika tidak ada tanggungan isikan 0" min="0"
                value="{{ $debitur != null ? $debitur->jumlah_tanggungan : null }}">
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="no_telp{{ $id_field }}">Nomor Telp/Hp/WA :</label>
            <input type="text" name="no_telp{{ $id_field }}" id="no_telp{{ $id_field }}" required
                class="form-control is-invalid" placeholder="Hanya Angka, contoh: 082112345678"
                value="{{ $debitur != null ? $debitur->no_telp : null }}">
        </div>
    </div>
    <div class="col-md-6 mb-4 {{ ($debitur == null ? 'd-none' : $debitur->status_pernikahan == 'Duda/Janda') ? '' : 'd-none' }}"
        id="jumlah_anak_single_head{{ $id_field }}">
        <div class="form-group">
            <label for="jumlah_anak_single{{ $id_field }}">Jumlah Anak :</label>
            <input type="number" name="jumlah_anak_single{{ $id_field }}"
                id="jumlah_anak_single{{ $id_field }}" class="form-control is-invalid "
                placeholder="Hanya Angka, contoh: 2. Jika tidak ada isikan 0" min="0"
                value="{{ $debitur != null ? $debitur->jumlah_anak : null }}">
        </div>
    </div>

    {{-- domisili --}}
    <div class="col-md-12 mb-2">
        <hr>
        <h6 style="font-weight: bold; font-style: italic; letter-spacing: 2px; color: rgb(0, 162, 255)">
            &rarr; Tempat Tinggal/Domisili
        </h6>
        <hr>
    </div>
    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="alamat_rumah_opsi{{ $id_field }}">Alamat Rumah :</label>
            <select name="alamat_rumah_opsi{{ $id_field }}" id="alamat_rumah_opsi{{ $id_field }}" required
                class="form-select is-invalid">
                <option selected disabled>- Pilih Alamat Rumah -</option>
                <option
                    {{ ($debitur == null ? null : $debitur->alamat_rumah == $debitur->alamat_ktp) ? 'selected' : null }}
                    value="Sama">Sesuai KTP</option>
                <option
                    {{ ($debitur == null ? null : $debitur->alamat_rumah != $debitur->alamat_ktp) ? 'selected' : null }}
                    value="Tidak">Tidak Sesuai KTP</option>
            </select>
            <textarea
                class="form-control is-invalid {{ $debitur == null || $debitur->alamat_rumah == $debitur->alamat_ktp ? 'd-none' : '' }}"
                name="alamat_rumah{{ $id_field }}" id="alamat_rumah{{ $id_field }}" rows="3"
                placeholder="Alamat Rumah, contoh: Jl. Pangeran Diponegoro No.210, Jetis Selatan, Parakan Kauman, Kec. Parakan, Kabupaten Temanggung">{{ $debitur != null ? $debitur->alamat_rumah : null }}</textarea>
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="rt_rw_rumah_opsi{{ $id_field }}">RT/RW :</label>
            <select name="rt_rw_rumah_opsi{{ $id_field }}" id="rt_rw_rumah_opsi{{ $id_field }}"
                class="form-control is-invalid" required>
                <option disabled selected>- Pilih Status Alamat Domisili -</option>
                <option
                    {{ ($debitur == null ? null : $debitur->rt_rw_rumah == $debitur->rt_rw_ktp) ? 'selected' : null }}
                    value="Sama">Sama Dengan KTP</option>
                <option
                    {{ ($debitur == null ? null : $debitur->rt_rw_rumah != $debitur->rt_rw_ktp) ? 'selected' : null }}
                    value="Tidak">Tidak Sama Dengan KTP</option>
            </select>
            <input type="text" name="rt_rw_rumah{{ $id_field }}" id="rt_rw_rumah{{ $id_field }}"
                required
                class="form-control is-invalid {{ $debitur == null || $debitur->rt_rw_rumah == $debitur->rt_rw_ktp ? 'd-none' : '' }}"
                placeholder="format: RT/RW, contoh: 005/003"
                value="{{ $debitur != null ? $debitur->rt_rw_rumah : null }}">
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="kode_pos{{ $id_field }}">Kode Pos:</label>
            <input type="text" name="kode_pos{{ $id_field }}" id="kode_pos{{ $id_field }}" required
                class="form-control is-invalid" placeholder="Kode Pos, contoh: 12345" required
                value="{{ $debitur != null ? $debitur->kode_pos : null }}">
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="status_tempat_tinggal{{ $id_field }}">Status Tempat Tinggal:</label>
            <select name="status_tempat_tinggal{{ $id_field }}" id="status_tempat_tinggal{{ $id_field }}"
                class="form-control is-invalid" required>
                <option selected disabled>- Pilih Status Tempat Tinggal Rumah -</option>
                <option
                    {{ ($debitur == null ? null : $debitur->status_tempat_tinggal == 'Pribadi/Sendiri') ? 'selected' : null }}
                    value="Pribadi/Sendiri">Pribadi/Sendiri</option>
                <option
                    {{ ($debitur == null ? null : $debitur->status_tempat_tinggal == 'Orang tua/keluarga') ? 'selected' : null }}
                    value="Orang tua/keluarga"> Orang tua/keluarga</option>
            </select>
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="status_kepemilikan{{ $id_field }}">Status Kepemilikan: </label>
            <select name="status_kepemilikan{{ $id_field }}" id="status_kepemilikan{{ $id_field }}"
                class="form-control is-invalid" required>
                <option selected disabled>- Pilih Status kepemilikan Rumah -</option>
                <option
                    {{ ($debitur == null ? null : $debitur->status_kepemilikan == 'Milik Sendiri') ? 'selected' : null }}
                    value="Milik Sendiri">Milik Sendiri</option>
                <option
                    {{ ($debitur == null ? null : $debitur->status_kepemilikan == 'Sewa/Kontrak/Kost') ? 'selected' : null }}
                    value="Sewa/Kontrak/Kost">Sewa/Kontrak/Kost</option>
            </select>
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="tahun_ditempati{{ $id_field }}">Ditempati Sejak Tahun: </label>
            <input name="tahun_ditempati{{ $id_field }}" id="tahun_ditempati{{ $id_field }}"
                class="form-control is-invalid" placeholder="Tahun Ditempati, contoh: 2023" required
                value="{{ $debitur != null ? $debitur->tahun_ditempati : null }}">
        </div>
    </div>


    {{-- pekerjaan --}}
    <div class="col-md-12 mb-2">
        <hr>
        <h6 style="font-weight: bold; font-style: italic; letter-spacing: 2px; color: rgb(0, 162, 255)">
            &rarr; Data Pekerjaan/Usaha
        </h6>
        <hr>
    </div>
    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="pekerjaan{{ $id_field }}">Pekerjaan: </label>
            <input name="pekerjaan{{ $id_field }}" id="pekerjaan{{ $id_field }}"
                class="form-control is-invalid" placeholder="Pekerjaan" required
                value="{{ $debitur != null ? $debitur->pekerjaan : null }}">
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="bentuk_usaha{{ $id_field }}">Bentuk Usaha: </label>
            <select name="bentuk_usaha{{ $id_field }}" id="bentuk_usaha{{ $id_field }}"
                class="form-select is-invalid" required>
                <option disabled {{ $debitur->bentuk_usaha ?? 'selected' }}>
                    - Pilih -</option>
                <option value="Perorangan"
                    {{ $debitur != null && $debitur->bentuk_usaha === 'Perorangan' ? 'selected' : '' }}>
                    Perorangan
                </option>
                <option value="Badan Usaha"
                    {{ $debitur != null && $debitur->bentuk_usaha === 'Badan Usaha' ? 'selected' : '' }}>
                    Badan Usaha
                </option>
            </select>
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="grup_usaha{{ $id_field }}">Grup Usaha: </label>
            <input name="grup_usaha{{ $id_field }}" id="grup_usaha{{ $id_field }}"
                class="form-control is-invalid" placeholder="Jika tidak ada isi (-)" required
                value="{{ $debitur != null ? $debitur->nama_perusahaan : null }}" maxlength="50">
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="nama_perusahaan_deb{{ $id_field }}">Nama Perusahaan/Nama Badan Usaha: </label>
            <input name="nama_perusahaan_deb{{ $id_field }}" id="nama_perusahaan_deb{{ $id_field }}"
                class="form-control is-invalid" placeholder="Jika tidak ada isi (-)" required
                value="{{ $debitur != null ? $debitur->nama_perusahaan : null }}">
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="persen_kepemilikan{{ $id_field }}">% Kepemilikan Perusahaan: </label>
            <input name="persen_kepemilikan{{ $id_field }}" id="persen_kepemilikan{{ $id_field }}"
                class="form-control is-invalid" placeholder="Jika milik pribadi jadi 100%" required
                value="{{ $debitur != null ? $debitur->persen_kepemilikan : null }}">
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="mulai_usaha{{ $id_field }}">Mulai Usaha: </label>
            <input name="mulai_usaha{{ $id_field }}" id="mulai_usaha{{ $id_field }}"
                class="form-control is-invalid" placeholder="isikan Tanggal bulan tahun/ bulan dan tahun" required
                value="{{ $debitur != null ? $debitur->mulai_usaha : null }}">
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="jumlah_karyawan{{ $id_field }}">Jumlah Karyawan: </label>
            <input type="number" name="jumlah_karyawan{{ $id_field }}"
                id="jumlah_karyawan{{ $id_field }}" class="form-control is-invalid" placeholder="isikan angka"
                required value="{{ $debitur != null ? $debitur->jumlah_karyawan : null }}" min="0">
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="bidang_usaha{{ $id_field }}">Bidang Usaha: </label>
            <input name="bidang_usaha{{ $id_field }}" id="bidang_usaha{{ $id_field }}"
                class="form-control is-invalid" placeholder="Jika tidak ada isi (-)" required
                value="{{ $debitur != null ? $debitur->bidang_usaha : null }}">
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="alamat_usaha{{ $id_field }}">Alamat Usaha (Lengkap): </label>
            <input name="alamat_usaha{{ $id_field }}" id="alamat_usaha{{ $id_field }}"
                class="form-control is-invalid" placeholder="Isi dengan lengkap beserta no telp jika ada" required
                value="{{ $debitur != null ? $debitur->alamat_usaha : null }}">
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="jabatan{{ $id_field }}">Jabatan: </label>
            <input name="jabatan{{ $id_field }}" id="jabatan{{ $id_field }}"
                class="form-control is-invalid" placeholder="contoh: Pemilik Usaha" required
                value="{{ $debitur != null ? $debitur->jabatan : null }}">
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="status_tempat_usaha{{ $id_field }}">Status Tempat Usaha: </label>
            <select name="status_tempat_usaha{{ $id_field }}" id="status_tempat_usaha{{ $id_field }}"
                required class="form-select is-invalid">
                <option disabled selected>-PILIH STATUS-</option>
                <option
                    {{ ($debitur == null ? null : $debitur->status_tempat_usaha == 'Pribadi') ? 'selected' : null }}
                    value="Pribadi">Pribadi</option>
                <option {{ ($debitur == null ? null : $debitur->status_tempat_usaha == 'Sewa') ? 'selected' : null }}
                    value="Sewa">Sewa</option>
                <option
                    {{ ($debitur == null ? null : $debitur->status_tempat_usaha == 'Perusahaan') ? 'selected' : null }}
                    value="Perusahaan">Perusahaan</option>
            </select>
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="periode{{ $id_field }}">Ditempati sejak: </label>
            <input name="periode{{ $id_field }}" id="periode{{ $id_field }}"
                class="form-control is-invalid" placeholder="contoh: contoh: 10 Agustus 2022/ 2022 an" required
                value="{{ $debitur != null ? $debitur->periode : null }}">
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="penghasilan_bulanan{{ $id_field }}">Penghasilan Bulanan: </label>
            <input name="penghasilan_bulanan{{ $id_field }}" id="penghasilan_bulanan{{ $id_field }}"
                class="form-control is-invalid" placeholder="Penghasilan Bulanan" required
                value="{{ $debitur != null ? 'Rp. ' . number_format($debitur->penghasilan_bulanan, 0, ',', '.') : null }}">
        </div>
    </div>


    {{-- data pasangan --}}
    <div class="row {{ ($debitur == null ? 'd-none' : $debitur->status_pernikahan == 'Belum Menikah' || $debitur->status_pernikahan == 'Duda/Janda') ? 'd-none' : '' }}"
        id="data_pasangan{{ $id_field }}">
        <div class="col-md-12 mb-2">
            <hr>
            <h6 style="font-weight: bold; font-style: italic; letter-spacing: 2px; color: rgb(0, 162, 255)">
                &rarr; Data Pasangan
            </h6>
            <hr>
        </div>

        <div class="col-md-6 mb-4">
            <div class="form-group">
                <label for="tgl_pernikahan{{ $id_field }}">Tanggal Pernikahan:</label>
                <input type="date" name="tgl_pernikahan{{ $id_field }}"
                    id="tgl_pernikahan{{ $id_field }}" class="form-control is-invalid"
                    placeholder="Tanggal Pernikahan"
                    value="{{ $debitur != null ? $debitur->tgl_pernikahan->format('Y-m-d') : null }}">
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="form-group">
                <label for="nik_pasangan{{ $id_field }}">NIK Pasangan:</label>
                <input type="text" name="nik_pasangan{{ $id_field }}" id="nik_pasangan{{ $id_field }}"
                    class="form-control nik is-invalid" placeholder="NIK Pasangan" maxlength="16" minlength="16"
                    value="{{ $debitur != null ? $debitur->nik_pasangan : null }}">
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="form-group">
                <label for="nama_pasangan{{ $id_field }}">Nama Pasangan:</label>
                <input type="text" name="nama_pasangan{{ $id_field }}"
                    id="nama_pasangan{{ $id_field }}" class="form-control is-invalid"
                    placeholder="Nama Pasangan" value="{{ $debitur != null ? $debitur->nama_pasangan : null }}">
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="form-group">
                <label for="tempat_lahir_pasangan{{ $id_field }}">Tempat Lahir Pasangan:</label>
                <input type="text" name="tempat_lahir_pasangan{{ $id_field }}"
                    id="tempat_lahir_pasangan{{ $id_field }}" class="form-control is-invalid"
                    placeholder="Tempat Lahir Pasangan"
                    value="{{ $debitur != null ? $debitur->tempat_lahir_pasangan : null }}">
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="form-group">
                <label for="tgl_lahir_pasangan{{ $id_field }}">Tanggal Lahir Pasangan:</label>
                <input type="date" name="tgl_lahir_pasangan{{ $id_field }}"
                    id="tgl_lahir_pasangan{{ $id_field }}" class="form-control is-invalid"
                    placeholder="Tanggal Lahir Pasangan"
                    value="{{ $debitur != null ? $debitur->tgl_lahir_pasangan->format('Y-m-d') : null }}">
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="form-group">
                <label for="pekerjaan_pasangan{{ $id_field }}">Pekerjaan Pasangan:</label>
                <input type="text" name="pekerjaan_pasangan{{ $id_field }}"
                    id="pekerjaan_pasangan{{ $id_field }}" class="form-control is-invalid"
                    placeholder="Pekerjaan Pasangan"
                    value="{{ $debitur != null ? $debitur->pekerjaan_pasangan : null }}">
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="form-group">
                <label for="penghasilan_pasangan{{ $id_field }}">Penghasilan Pasangan:</label>
                <input type="text" name="penghasilan_pasangan{{ $id_field }}"
                    id="penghasilan_pasangan{{ $id_field }}" class="form-control is-invalid"
                    placeholder="Penghasilan Pasangan"
                    value="{{ $debitur != null ? 'Rp. ' . number_format($debitur->penghasilan_bulanan_pasangan, 0, ',', '.') : null }}">
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="form-group">
                <label for="alamat_pasangan_opsi{{ $id_field }}">Alamat Pasangan:</label>
                <select name="alamat_pasangan_opsi{{ $id_field }}"
                    id="alamat_pasangan_opsi{{ $id_field }}" class="form-select is-invalid">
                    <option {{ $debitur ? 'selected' : '' }} disabled>- Alamat -</option>
                    <option
                        {{ $debitur != null && $debitur->alamat_pasangan != 'sama dengan suaminya' && $debitur->alamat_pasangan != 'sama dengan istrinya' ? 'selected' : '' }}
                        value="Tinggal Sendiri">Tinggal Sendiri</option>
                    <option
                        {{ $debitur != null && $debitur->alamat_pasangan == 'sama dengan suaminya' ? 'selected' : '' }}
                        value="sama dengan suaminya">Sama Dengan Suaminya</option>
                    <option
                        {{ $debitur != null && $debitur->alamat_pasangan == 'sama dengan istrinya' ? 'selected' : '' }}
                        value="sama dengan istrinya">Sama Dengan Istrinya</option>
                </select>
                <textarea
                    class="form-control is-invalid {{ ($debitur == null ? 'd-none' : $debitur->alamat_pasangan != 'sama dengan suaminya' && $debitur->alamat_pasangan != 'sama dengan istrinya') ? '' : 'd-none' }}"
                    name="alamat_pasangan{{ $id_field }}" id="alamat_pasangan{{ $id_field }}" rows="3"
                    placeholder="Alamat Rumah, contoh: Jl. Pangeran Diponegoro No.210, Jetis Selatan, Parakan Kauman, Kec. Parakan, Kabupaten Temanggung">{{ $debitur != null ? $debitur->alamat_pasangan : null }}</textarea>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="form-group">
                <label for="jumlah_anak{{ $id_field }}">Jumlah Anak:</label>
                <input type="number" name="jumlah_anak{{ $id_field }}" id="jumlah_anak{{ $id_field }}"
                    class="form-control is-invalid"
                    placeholder="Hanya Angka, contoh: 2. Jika belum memiliki anak isikan (0)" min="0"
                    value="{{ $debitur != null ? $debitur->jumlah_anak : null }}">
            </div>
        </div>


    </div>


    {{-- data pernikahan khusus --}}
    <div class="row {{ ($debitur == null ? 'd-none' : $debitur->status_pernikahan == 'Pernikahan Khusus') ? '' : 'd-none' }}"
        id="data_pernikahan_khusus{{ $id_field }}">
        <div class="col-md-12 mb-2">
            <hr>
            <h6 style="font-weight: bold; font-style: italic; letter-spacing: 2px; color: rgb(0, 162, 255)">
                &rarr; Data Pernikahan Khusus
            </h6>
            <hr>
        </div>
        <div class="col-md-6 mb-4">
            <div class="form-group">
                <label for="judul_akta{{ $id_field }}">Judul Akta:</label>
                <input type="text" name="judul_akta{{ $id_field }}" id="judul_akta{{ $id_field }}"
                    class="form-control is-invalid" placeholder="Judul Akta"
                    value="{{ $debitur != null ? $debitur->judul_akta : null }}">
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="form-group">
                <label for="no_akta{{ $id_field }}">Nomor Akta:</label>
                <input type="text" name="no_akta{{ $id_field }}" id="no_akta{{ $id_field }}"
                    class="form-control is-invalid" placeholder="Nomor Akta"
                    value="{{ $debitur != null ? $debitur->no_akta : null }}">
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="form-group">
                <label for="tgl_akta{{ $id_field }}">Tanggal Akta:</label>
                <input type="date" name="tgl_akta{{ $id_field }}" id="tgl_akta{{ $id_field }}"
                    class="form-control is-invalid" placeholder="tgl"
                    value="{{ $debitur != null ? $debitur->tgl_akta : null }}">
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="form-group">
                <label for="nama_notaris{{ $id_field }}">Nama Notaris:</label>
                <input type="date" name="nama_notaris{{ $id_field }}" id="nama_notaris{{ $id_field }}"
                    class="form-control is-invalid" placeholder="Nama Notaris"
                    value="{{ $debitur != null ? $debitur->nama_notaris : null }}">
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="form-group">
                <label for="kedudukan_notaris{{ $id_field }}">Kedudukan Notaris:</label>
                <input type="date" name="kedudukan_notaris{{ $id_field }}"
                    id="kedudukan_notaris{{ $id_field }}" class="form-control is-invalid"
                    placeholder="Kedudukan Notaris"
                    value="{{ $debitur != null ? $debitur->kedudukan_notaris : null }}">
            </div>
        </div>
    </div>





</div>
