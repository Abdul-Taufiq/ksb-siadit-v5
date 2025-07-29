{{-- take id debitur --}}
<input type="hidden" name="id_debitur" id="id_debitur" value="{{ $idDeb }}">
<input type="hidden" name="id_debitur_old" id="id_debitur_old" value="{{ $idDebOld }}">
<input type="hidden" id="metode" name="metode" value="{{ $metode }}" readonly>

<div class="col-md-6" style="margin-left: 5px;">
    <div class="form-group">
        <label for="pemilik_jaminan_opsi{{ $id_field }}">Pemilik Jaminan</label>
        <select name="pemilik_jaminan_opsi{{ $id_field }}" id="pemilik_jaminan_opsi{{ $id_field }}"
            class="form-select is-invalid">
            <option selected disabled>- Pilih Pemilik Jaminan -</option>
            <option {{ ($kredit == null ? null : isset($penjamin) && $penjamin->IsEmpty()) ? 'selected' : null }}
                value="Debitur">Debitur
            </option>
            <option {{ ($kredit == null ? null : isset($penjamin) && $penjamin->IsNotEmpty()) ? 'selected' : null }}
                value="Penjamin">Penjamin
            </option>
        </select>
    </div>
</div>


@foreach ($penjamin as $item)
    {{-- penjamin {{ $loop->iteration }} --}}
    <div class="row" style="margin-left: 5px;" id="head_penjamin_{{ $loop->iteration }}">

        {{-- penjamin --}}
        <div class="row" id="div_penjamin_{{ $loop->iteration }}">
            <div class="col-md-12 mb-2">
                <hr>
                <h6 style="font-weight: bold; font-style: italic; letter-spacing: 2px; color: rgb(0, 162, 255)">
                    &rarr; Data Penjamin {{ $loop->iteration }}
                </h6>
                <hr>
            </div>

            <input type="hidden" id="id_penjamin_{{ $loop->iteration }}" name="id_penjamin_{{ $loop->iteration }}"
                value="{{ base64_encode($item->id_kredit_penjamin) }}" readonly>

            {{-- aksi data ini --}}
            <div class="col-md-12 mb-4">
                <div class="form-group">
                    <label for="aksi_penjamin_{{ $loop->iteration }}">Aksi Data Ini!</label>
                    <select name="aksi_penjamin_{{ $loop->iteration }}" id="aksi_penjamin_{{ $loop->iteration }}"
                        class="form-select is-invalid" required>
                        <option selected disabled>- Pilih Aksi -</option>
                        <option style="color: green; font-weight: bold;" value="Edit">
                            Edit/Biarkan tetap disimpan</option>
                        <option style="color: red; font-weight: bold;" value="Hapus">
                            Hapus (Jika dipilih data ini tidak akan disimpan lagi!)
                        </option>
                    </select>
                </div>
            </div>


            <div class="col-md-6 mb-4">
                <div class="form-group">
                    <label for="nik_{{ $loop->iteration }}">NIK:</label>
                    <input type="text" name="nik_{{ $loop->iteration }}" id="nik_{{ $loop->iteration }}" required
                        class="form-control nik is-invalid" placeholder="NIK" maxlength="16" minlength="16"
                        value="{{ $item != null ? $item->nik : null }}">
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="form-group">
                    <label for="nama_{{ $loop->iteration }}">Nama:</label>
                    <input type="text" name="nama_{{ $loop->iteration }}" id="nama_{{ $loop->iteration }}" required
                        class="form-control is-invalid" placeholder="Nama"
                        value="{{ $item != null ? $item->nama_penjamin : null }}">
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="form-group">
                    <label for="tempat_lahir_{{ $loop->iteration }}">Tempat Lahir:</label>
                    <input type="text" name="tempat_lahir_{{ $loop->iteration }}"
                        id="tempat_lahir_{{ $loop->iteration }}" required class="form-control is-invalid"
                        placeholder="Tempat Lahir" value="{{ $item != null ? $item->tempat_lahir : null }}">
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="form-group">
                    <label for="tgl_lahir_{{ $loop->iteration }}">Tanggal Lahir:</label>
                    <input type="date" name="tgl_lahir_{{ $loop->iteration }}"
                        id="tgl_lahir_{{ $loop->iteration }}" required class="form-control is-invalid"
                        placeholder="Tempat Lahir"
                        value="{{ $item != null ? $item->tgl_lahir->format('Y-m-d') : null }}">
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="form-group">
                    <label for="jenis_kelamin_{{ $loop->iteration }}">Jenis Kelamin:</label>
                    <select name="jenis_kelamin_{{ $loop->iteration }}" id="jenis_kelamin_{{ $loop->iteration }}"
                        required class="form-select is-invalid">
                        <option selected disabled>Pilih Jenis Kelamin</option>
                        <option {{ $item->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }} value="Laki-laki">Laki-laki
                        </option>
                        <option {{ $item->jenis_kelamin == 'Perempuan' ? 'selected' : '' }} value="Perempuan">Perempuan
                        </option>
                    </select>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="form-group">
                    <label for="alamat_{{ $loop->iteration }}">Alamat:</label>
                    <textarea name="alamat_{{ $loop->iteration }}" id="alamat_{{ $loop->iteration }}" required
                        class="form-control is-invalid" placeholder="Alamat">{{ $item != null ? $item->alamat : null }}</textarea>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="form-group">
                    <label for="status_pernikahan_{{ $loop->iteration }}">Status Pernikahan:</label>
                    <select name="status_pernikahan_{{ $loop->iteration }}"
                        id="status_pernikahan_{{ $loop->iteration }}" required class="form-select is-invalid">
                        <option selected disabled>- Pilih Status Penjamin -</option>
                        <option {{ $item->status_pernikahan == 'Menikah' ? 'selected' : '' }} value="Menikah">Menikah
                        </option>
                        <option {{ $item->status_pernikahan == 'Belum Menikah' ? 'selected' : '' }}
                            value="Belum Menikah">Belum Menikah</option>
                        <option {{ $item->status_pernikahan == 'Duda/Janda' ? 'selected' : '' }} value="Duda/Janda">
                            Duda/Janda</option>
                        <option {{ $item->status_pernikahan == 'SHM Khusus Waris' ? 'selected' : '' }}
                            value="SHM Khusus Waris">SHM Khusus Waris</option>
                        <option {{ $item->status_pernikahan == 'Pernikahan Khusus' ? 'selected' : '' }}
                            value="Pernikahan Khusus">Pernikahan Khusus</option>
                    </select>
                </div>
            </div>
        </div>


        {{-- pasangan penjamin --}}
        <div class="row {{ $item->status_pernikahan == 'Menikah' || $item->status_pernikahan == 'Pernikahan Khusus' ? '' : 'd-none' }}"
            id="div_pasangan_{{ $loop->iteration }}">
            <div class="col-md-12 mb-2">
                <hr>
                <h6 style="font-weight: bold; font-style: italic; letter-spacing: 2px; color: rgb(0, 162, 255)">
                    &rarr; Data Pasangan Penjamin {{ $loop->iteration }}
                </h6>
                <hr>
            </div>

            <div class="col-md-6 mb-4">
                <div class="form-group">
                    <label for="nik_pasangan_{{ $loop->iteration }}">NIK:</label>
                    <input type="text" name="nik_pasangan_{{ $loop->iteration }}"
                        id="nik_pasangan_{{ $loop->iteration }}" class="form-control nik is-invalid"
                        placeholder="NIK Pasangan" maxlength="16" minlength="16"
                        value="{{ $item != null ? $item->nik_pasangan : null }}">
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="form-group">
                    <label for="nama_pasangan_{{ $loop->iteration }}">Nama:</label>
                    <input type="text" name="nama_pasangan_{{ $loop->iteration }}"
                        id="nama_pasangan_{{ $loop->iteration }}" class="form-control is-invalid" placeholder="Nama"
                        value="{{ $item != null ? $item->nama_pasangan : null }}">
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="form-group">
                    <label for="tempat_lahir_pasangan_{{ $loop->iteration }}">Tempat Lahir:</label>
                    <input type="text" name="tempat_lahir_pasangan_{{ $loop->iteration }}"
                        id="tempat_lahir_pasangan_{{ $loop->iteration }}" class="form-control is-invalid"
                        placeholder="Tempat Lahir" value="{{ $item != null ? $item->tempat_lahir_pasangan : null }}">
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="form-group">
                    <label for="tgl_lahir_pasangan_{{ $loop->iteration }}">Tanggal Lahir:</label>
                    <input type="date" name="tgl_lahir_pasangan_{{ $loop->iteration }}"
                        id="tgl_lahir_pasangan_{{ $loop->iteration }}" class="form-control is-invalid"
                        placeholder="Tempat Lahir"
                        value="{{ $item->tgl_lahir_pasangan ? $item->tgl_lahir_pasangan->format('Y-m-d') : null }}">
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="form-group">
                    <label for="alamat_pasangan_opsi_{{ $loop->iteration }}">Alamat Pasangan:</label>
                    <select name="alamat_pasangan_opsi_{{ $loop->iteration }}"
                        id="alamat_pasangan_opsi_{{ $loop->iteration }}" class="form-select is-invalid">
                        <option selected disabled>- Alamat -</option>
                        <option
                            {{ $item->alamat_pasangan && $item->alamat_pasangan != 'sama dengan suaminya' && $item->alamat_pasangan != 'sama dengan istrinya' ? 'selected' : '' }}
                            value="Tinggal Sendiri">Tinggal Sendiri</option>
                        <option {{ $item->alamat_pasangan == 'sama dengan suaminya' ? 'selected' : '' }}
                            value="sama dengan suaminya">Sama Dengan Suaminya</option>
                        <option {{ $item->alamat_pasangan == 'sama dengan istrinya' ? 'selected' : '' }}
                            value="sama dengan istrinya">Sama Dengan Istrinya</option>
                    </select>
                    <textarea
                        class="form-control is-invalid {{ $item->alamat_pasangan != 'sama dengan suaminya' && $item->alamat_pasangan != 'sama dengan istrinya' ? '' : 'd-none' }}"
                        name="alamat_pasangan_{{ $loop->iteration }}" id="alamat_pasangan_{{ $loop->iteration }}" rows="3"
                        placeholder="Alamat Rumah, contoh: Jl. Pangeran Diponegoro No.210, Jetis Selatan, Parakan Kauman, Kec. Parakan, Kabupaten Temanggung">{{ $item->alamat_pasangan }}</textarea>
                </div>
            </div>
        </div>


        {{-- Akta Pernikahan Khusus --}}
        <div class="row {{ $item->status_pernikahan == 'Pernikahan Khusus' ? '' : 'd-none' }}"
            id="div_akta_{{ $loop->iteration }}">
            <div class="col-md-12 mb-2">
                <hr>
                <h6 style="font-weight: bold; font-style: italic; letter-spacing: 2px; color: rgb(0, 162, 255)">
                    &rarr; Data Akta Pernikahan Khusus {{ $loop->iteration }}
                </h6>
                <hr>
            </div>

            <div class="col-md-6 mb-4">
                <div class="form-group">
                    <label for="judul_akta_{{ $loop->iteration }}">Judul Akta:</label>
                    <input type="text" name="judul_akta_{{ $loop->iteration }}"
                        id="judul_akta_{{ $loop->iteration }}" class="form-control is-invalid"
                        placeholder="Judul Akta" value="{{ $item != null ? $item->judul_akta : null }}">
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="form-group">
                    <label for="no_akta_{{ $loop->iteration }}">Nomor Akta:</label>
                    <input type="text" name="no_akta_{{ $loop->iteration }}" id="no_akta_{{ $loop->iteration }}"
                        class="form-control is-invalid" placeholder="Nomor Akta"
                        value="{{ $item != null ? $item->no_akta : null }}">
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="form-group">
                    <label for="tgl_akta_{{ $loop->iteration }}">Tanggal Akta:</label>
                    <input type="date" name="tgl_akta_{{ $loop->iteration }}"
                        id="tgl_akta_{{ $loop->iteration }}" class="form-control is-invalid" placeholder="tgl"
                        value="{{ $item->tgl_akta ? $item->tgl_akta->format('Y-m-d') : null }}">
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="form-group">
                    <label for="nama_notaris_{{ $loop->iteration }}">Nama Notaris:</label>
                    <input type="text" name="nama_notaris_{{ $loop->iteration }}"
                        id="nama_notaris_{{ $loop->iteration }}" class="form-control is-invalid"
                        placeholder="Nama Notaris" value="{{ $item != null ? $item->nama_notaris : null }}">
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="form-group">
                    <label for="kedudukan_notaris_{{ $loop->iteration }}">Kedudukan Notaris:</label>
                    <input type="text" name="kedudukan_notaris_{{ $loop->iteration }}"
                        id="kedudukan_notaris_{{ $loop->iteration }}" class="form-control is-invalid"
                        placeholder="Kedudukan Akta" value="{{ $item != null ? $item->kedudukan_notaris : null }}">
                </div>
            </div>
        </div>
    </div>
@endforeach


<br>
{{-- tambahan --}}
<div class="row" style="margin-left: 5px;">
    <div id="tambahan_penjamin"></div>
    <div class="text-center">
        <button class="btn btn-outline-primary w-100" id="tambah_penjamin" type="button"
            onclick="tambahPenjamin()">
            <i class="fa-solid fa-circle-plus"></i> Tambah Data Penjamin <i class="fa-solid fa-circle-plus"></i>
        </button>
    </div>
</div>
