<input type="hidden" name="id_kredit" id="id_kredit" value="{{ $id_kredit }}">
<input type="hidden" name="id_kredit_old" id="id_kredit_old" value="{{ base64_encode($kredit->id_kredit) }}">
<input type="hidden" name="metode" id="metode" value="{{ $metode }}">

<div class="row" style="margin-left: 5px;">
    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="jns_pinjaman">Jenis Pinjaman</label>
            <select name="jns_pinjaman" id="jns_pinjaman" class="form-select is-invalid" required>
                <option disabled selected>- Pilih Jenis Pinjaman -</option>
                <option {{ $kredit->jns_pinjaman == 'PINAS (Pinjaman Nasabah)' ? 'selected' : '' }}
                    value="PINAS (Pinjaman Nasabah)">PINAS (Pinjaman Nasabah)</option>
                <option {{ $kredit->jns_pinjaman == 'PIKAR (Internal KSB)' ? 'selected' : '' }}
                    value="PIKAR (Internal KSB)">PIKAR (Internal KSB)</option>
                <option {{ $kredit->jns_pinjaman == 'Kredit Pihat Terkait' ? 'selected' : '' }}
                    value="Kredit Pihak Terkait">Kredit Pihak Terkait</option>
                <option {{ $kredit->jns_pinjaman == 'PIKAR (Eksternal)' ? 'selected' : '' }} value="PIKAR (Eksternal)">
                    PIKAR (Eksternal)</option>
            </select>
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="kategori_jaminan_opsi">Kategori Jaminan Opsi</label>
            <select name="kategori_jaminan_opsi" id="kategori_jaminan_opsi" class="form-select is-invalid" required>
                <option disabled selected>- Pilih Kategori Jaminan Opsi -</option>
                @if ($jam_tanah->isNotEmpty() || $jam_kenda->isNotEmpty() || $jam_depo->isNotEmpty() || $pikar == null)
                    <option selected value="Menggunakan Jaminan">Menggunakan Jaminan</option>
                    <option value="PIKAR (Non-jaminan)">PIKAR (Non-jaminan)</option>
                @else
                    <option value="Menggunakan Jaminan">Menggunakan Jaminan</option>
                    <option selected value="PIKAR (Non-jaminan)">PIKAR (Non-jaminan)</option>
                @endif
            </select>
        </div>
    </div>
</div>


{{-- head MOU (PIkar eksten) --}}
<div class="row {{ $pikar == null ? 'd-none' : '' }}" style="margin-left: 5px;" id="head_pikar_eks">
    <div class="col-md-12 mb-2">
        <hr>
        <h6 style="font-weight: bold; font-style: italic; letter-spacing: 2px; color: rgb(0, 162, 255)">
            &rarr; Data Perjanjian Kerja Sama
            <input type="hidden" name="id_pikar" id="id_pikar"
                value="{{ $pikar != null ? base64_encode($pikar->id_pikar_eks) : null }}">
        </h6>
        <hr>
    </div>
    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="nama_perusahaan">Nama Perusahaan PT/CV</label>
            <input type="text" name="nama_perusahaan" id="nama_perusahaan" class="form-control is-invalid"
                {{ $pikar ? 'required' : '' }} placeholder="Nama Perusahaan PT/CV"
                value="{{ $pikar ? $pikar->nama_perusahaan : null }}">
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="no_perjanjian">Nomor Perjanjian</label>
            <input type="text" name="no_perjanjian" id="no_perjanjian" class="form-control is-invalid"
                {{ $pikar ? 'required' : '' }} placeholder="Nomor Perjanjian"
                value="{{ $pikar ? $pikar->no_perjanjian : null }}">
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="tgl_perjanjian">Tanggal Perjanjian</label>
            <input type="date" name="tgl_perjanjian" id="tgl_perjanjian" class="form-control is-invalid"
                {{ $pikar ? 'required' : '' }} placeholder="Tanggal Perjanjian"
                value="{{ $pikar ? $pikar->tgl_perjanjian?->format('Y-m-d') : null }}">
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="nama_bpjs">Nama BPJS</label>
            <input type="text" name="nama_bpjs" id="nama_bpjs" class="form-control is-invalid"
                {{ $pikar ? 'required' : '' }} placeholder="Nama BPJS"
                value="{{ $pikar ? $pikar->nama_bpjs : null }}">
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="no_bpjs">Nomor BPJS</label>
            <input type="text" name="no_bpjs" id="no_bpjs" class="form-control is-invalid"
                {{ $pikar ? 'required' : '' }} placeholder="Nomor BPJS" value="{{ $pikar ? $pikar->no_bpjs : null }}">
        </div>
    </div>
</div>



{{-- membuat urutan --}}
@php
    $counter = 1;
@endphp

{{-- Tanah --}}
@foreach ($jam_tanah as $tanah)
    {{-- head jaminan 1 --}}
    <div class="row" style="margin-left: 5px;" id="head_jaminan_{{ $counter }}">
        <div class="col-md-12 mb-2">
            <hr>
            <h6 style="font-weight: bold; font-style: italic; letter-spacing: 2px; color: rgb(0, 162, 255)">
                &rarr; Data Jaminan {{ $counter }}

                <input type="hidden" id="id_tanah_{{ $counter }}" name="id_tanah_{{ $counter }}"
                    value="{{ base64_encode($tanah->id_jaminan_pertanahan) }}">
            </h6>
            <hr>
        </div>
        <div class="col-md-6 mb-4">
            <div class="form-group">
                <label for="kategori_jaminan_{{ $counter }}">Kategori Jaminan</label>
                <select name="kategori_jaminan_{{ $counter }}" id="kategori_jaminan_{{ $counter }}"
                    class="form-select is-invalid" required>
                    <option selected value="Tanah/Bangunan">Tanah/Bangunan</option>
                </select>
            </div>

        </div>
        {{-- aksi data ini --}}
        <div class="col-md-12 mb-4">
            <div class="form-group">
                <label for="aksi_jaminan_tanah_{{ $counter }}">Aksi Data Ini!</label>
                <select name="aksi_jaminan_tanah_{{ $counter }}" id="aksi_jaminan_tanah_{{ $counter }}"
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
    </div>

    <div class="row" style="margin-left: 5px;" id="head_tanah_{{ $counter }}">
        <div class="col-md-6 mb-4">
            <div class="form-group">
                <label for="type_sertifikat_{{ $counter }}">Type Sertifikat</label>
                <select name="type_sertifikat_{{ $counter }}" id="type_sertifikat_{{ $counter }}"
                    class="form-select is-invalid" required>
                    <option disabled selected>- Pilih Type Sertifikat -</option>
                    <option {{ $tanah->type_sertifikat == 'Sertifikat-Analog' ? 'selected' : '' }}
                        value="Sertifikat-Analog">Sertifikat-Analog</option>
                    <option {{ $tanah->type_sertifikat == 'Sertifikat-El' ? 'selected' : '' }} value="Sertifikat-El">
                        Sertifikat-El</option>
                </select>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="form-group">
                <label for="alih_media_{{ $counter }}">Alih Media</label>
                <select name="alih_media_{{ $counter }}" id="alih_media_{{ $counter }}"
                    class="form-select is-invalid" required>
                    <option disabled selected>- Pilih -</option>
                    <option {{ $tanah->alih_media == 'Ya' ? 'selected' : '' }} value="Ya">Ya</option>
                    <option {{ $tanah->alih_media == 'Tidak' ? 'selected' : '' }} value="Tidak">Tidak</option>
                </select>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="form-group">
                <label for="jns_jaminan_opsi_{{ $counter }}">Jenis Jaminan</label>
                <select name="jns_jaminan_opsi_{{ $counter }}" id="jns_jaminan_opsi_{{ $counter }}"
                    class="form-select is-invalid" required>
                    {{-- <option disabled selected>- Pilih -</option> --}}
                    <option {{ $tanah->jns_jaminan == 'SHM' ? 'seleted' : '' }} value="SHM">SHM</option>
                    <option {{ $tanah->jns_jaminan == 'SHGB' ? 'seleted' : '' }} value="SHGB">SHGB</option>
                    <option {{ $tanah->jns_jaminan != 'SHM' && $tanah->jns_jaminan != 'SHGB' ? 'selected' : '' }}
                        value="Lainnya">Lainnya</option>
                </select>
                <input type="text" name="jns_jaminan_{{ $counter }}" id="jns_jaminan_{{ $counter }}"
                    class="form-control is-invalid {{ $tanah->jns_jaminan != 'SHM' && $tanah->jns_jaminan != 'SHGB' ? '' : 'd-none' }}"
                    required placeholder="Sebutkan Lengkap, cth: Sertifikat Hak Guna Usaha"
                    value="{{ $tanah->jns_jaminan }}">
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="form-group">
                <label for="no_shm_shgb_{{ $counter }}">No Sertifikat/No NIB</label>
                <input type="text" name="no_shm_shgb_{{ $counter }}" id="no_shm_shgb_{{ $counter }}"
                    class="form-control is-invalid" required placeholder="Nomor Sertifikat"
                    value="{{ $tanah->no_shm_shgb }}">
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="form-group">
                <label for="atas_nama_{{ $counter }}">Atas Nama</label>
                <input type="text" name="atas_nama_{{ $counter }}" id="atas_nama_{{ $counter }}"
                    class="form-control is-invalid" required placeholder="Atas Nama"
                    value="{{ $tanah->atas_nama }}">
            </div>
        </div>

        {{-- for Analis --}}
        @if (Auth::user()->jabatan == 'Analis Cabang')
            <div class="col-md-6 mb-4  {{ $tanah->type_sertifikat == 'Sertifikat-El' ? 'd-none' : '' }}"
                id="tgl_serti_{{ $counter }}">
                <div class="form-group">
                    <label for="tgl_sertifikat_{{ $counter }}">Tanggal Sertifikat</label>
                    <input type="date" name="tgl_sertifikat_{{ $counter }}"
                        id="tgl_sertifikat_{{ $counter }}" class="form-control is-invalid"
                        placeholder="Tanggal Sertifikat"
                        value="{{ $tanah->tgl_sertifikat != null ? $tanah->tgl_sertifikat->format('Y-m-d') : '' }}">
                </div>
            </div>
            <div class="col-md-6 mb-4  {{ $tanah->type_sertifikat == 'Sertifikat-El' ? 'd-none' : '' }}"
                id="tgl_suruk_{{ $counter }}">
                <div class="form-group">
                    <label for="tgl_surat_ukur_{{ $counter }}">Tanggal Surat Ukur</label>
                    <input type="date" name="tgl_surat_ukur_{{ $counter }}"
                        id="tgl_surat_ukur_{{ $counter }}" class="form-control is-invalid"
                        placeholder="Tanggal Surat Ukur"
                        value="{{ $tanah->tgl_surat_ukur != null ? $tanah->tgl_surat_ukur->format('Y-m-d') : '' }}">
                </div>
            </div>
            <div class="col-md-6 mb-4  {{ $tanah->type_sertifikat == 'Sertifikat-El' ? 'd-none' : '' }}"
                id="no_suruk_{{ $counter }}">
                <div class="form-group">
                    <label for="no_surat_ukur_{{ $counter }}">Nomor Surat Ukur</label>
                    <input type="text" name="no_surat_ukur_{{ $counter }}"
                        id="no_surat_ukur_{{ $counter }}" class="form-control is-invalid"
                        placeholder="Nomor Surat Ukur" value="{{ $tanah->no_surat_ukur }}">
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="form-group">
                    <label for="luas_{{ $counter }}">Luas</label>
                    <input type="number" name="luas_{{ $counter }}" id="luas_{{ $counter }}"
                        class="form-control is-invalid" required placeholder="Luas" value="{{ $tanah->luas }}"
                        min="0">
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="form-group">
                    <label for="desa_{{ $counter }}">Desa/Kelurahan</label>
                    <input type="text" name="desa_{{ $counter }}" id="desa_{{ $counter }}"
                        class="form-control is-invalid" required placeholder="Desa/Kelurahan"
                        value="{{ $tanah->desa }}">
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="form-group">
                    <label for="kecamatan_{{ $counter }}">Kecamatan</label>
                    <input type="text" name="kecamatan_{{ $counter }}" id="kecamatan_{{ $counter }}"
                        class="form-control is-invalid" required placeholder="Kecamatan"
                        value="{{ $tanah->kecamatan }}">
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="form-group">
                    <label for="kabupaten_{{ $counter }}">Kabupaten/Kota</label>
                    <input type="text" name="kabupaten_{{ $counter }}" id="kabupaten_{{ $counter }}"
                        class="form-control is-invalid" required placeholder="Kabupaten/Kota"
                        value="{{ $tanah->kabupaten }}">
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="form-group">
                    <label for="provinsi_{{ $counter }}">Provinsi</label>
                    <input type="text" name="provinsi_{{ $counter }}" id="provinsi_{{ $counter }}"
                        class="form-control is-invalid" required placeholder="Provinsi"
                        value="{{ $tanah->provinsi }}">
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="form-group">
                    <label for="keterangan_{{ $counter }}">Keterangan</label>
                    <select name="keterangan_{{ $counter }}" id="keterangan_{{ $counter }}"
                        class="form-select is-invalid" required>
                        <option disabled selected>- Pilih -</option>
                        <option {{ $tanah->keterangan == 'Tanah Pekarangan' ? 'selected' : '' }}
                            value="Tanah Pekarangan">Tanah Pekarangan</option>
                        <option {{ $tanah->keterangan == 'Tanah Sawah' ? 'selected' : '' }} value="Tanah Sawah">Tanah
                            Sawah
                        </option>
                    </select>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="form-group">
                    <label for="detail_kategori_jaminan_{{ $counter }}">Detail Kategori Jaminan</label>
                    <select name="detail_kategori_jaminan_{{ $counter }}"
                        id="detail_kategori_jaminan_{{ $counter }}" class="form-select is-invalid" required>
                        <option disabled selected>- Pilih -</option>
                        <option {{ $tanah->detail_kategori_jaminan == 'Tanah' ? 'selected' : '' }} value="Tanah">
                            Tanah</option>
                        <option {{ $tanah->detail_kategori_jaminan == 'Tanah & Bangunan' ? 'selected' : '' }}
                            value="Tanah & Bangunan">Tanah & Bangunan</option>
                        <option {{ $tanah->detail_kategori_jaminan == 'Ruko & Rukan' ? 'selected' : '' }}
                            value="Ruko & Rukan">Ruko & Rukan
                        </option>
                    </select>
                </div>
            </div>
        @endif
    </div>
    @php $counter++; @endphp
@endforeach

{{-- Kendaraan --}}
@foreach ($jam_kenda as $kenda)
    {{-- head jaminan 1 --}}
    <div class="row" style="margin-left: 5px;" id="head_jaminan_{{ $counter }}">
        <div class="col-md-12 mb-2">
            <hr>
            <h6 style="font-weight: bold; font-style: italic; letter-spacing: 2px; color: rgb(0, 162, 255)">
                &rarr; Data Jaminan {{ $counter }}

                <input type="hidden" id="id_kenda_{{ $counter }}" name="id_kenda_{{ $counter }}"
                    value="{{ base64_encode($kenda->id_jaminan_kendaraan) }}">
            </h6>
            <hr>
        </div>
        <div class="col-md-6 mb-4">
            <div class="form-group">
                <label for="kategori_jaminan_{{ $counter }}">Kategori Jaminan</label>
                <select name="kategori_jaminan_{{ $counter }}" id="kategori_jaminan_{{ $counter }}"
                    class="form-select is-invalid" required>
                    <option selected value="Kendaraan">Kendaraan</option>
                </select>
            </div>

        </div>
        {{-- aksi data ini --}}
        <div class="col-md-12 mb-4">
            <div class="form-group">
                <label for="aksi_jaminan_kenda_{{ $counter }}">Aksi Data Ini!</label>
                <select name="aksi_jaminan_kenda_{{ $counter }}" id="aksi_jaminan_kenda_{{ $counter }}"
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
    </div>

    <div class="row" style="margin-left: 5px;" id="head_kendaraan_{{ $counter }}">
        <div class="col-md-6 mb-4">
            <div class="form-group">
                <label for="jns_kendaraan_{{ $counter }}">Jenis Kendaraan</label>
                <select name="jns_kendaraan_{{ $counter }}" id="jns_kendaraan_{{ $counter }}"
                    class="form-select is-invalid" required>
                    <option disabled selected>- Pilih -</option>
                    <option {{ $kenda->jns_kendaraan == 'Sepeda Motor' ? 'selected' : '' }} value="Sepeda Motor">
                        Sepeda Motor</option>
                    <option {{ $kenda->jns_kendaraan == 'Mobil' ? 'selected' : '' }} value="Mobil">Mobil</option>
                    <option {{ $kenda->jns_kendaraan == 'Bus' ? 'selected' : '' }} value="Bus">Bus</option>
                    <option {{ $kenda->jns_kendaraan == 'Truck' ? 'selected' : '' }} value="Truck">Truck</option>
                </select>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="form-group">
                <label for="atas_nama_kendaraan_{{ $counter }}">Atas Nama</label>
                <input type="text" name="atas_nama_kendaraan_{{ $counter }}"
                    id="atas_nama_kendaraan_{{ $counter }}" class="form-control is-invalid" required
                    placeholder="Atas Nama" value="{{ $kenda->atas_nama }}">
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="form-group">
                <label for="no_bpkb_{{ $counter }}">Nomor BPKB</label>
                <input type="text" name="no_bpkb_{{ $counter }}" id="no_bpkb_{{ $counter }}"
                    class="form-control is-invalid" required placeholder="Nomor BPKB"
                    value="{{ $kenda->no_bpkb }}">
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="form-group">
                <label for="tgl_bpkb_{{ $counter }}">Tanggal BPKB</label>
                <input type="date" name="tgl_bpkb_{{ $counter }}" id="tgl_bpkb_{{ $counter }}"
                    class="form-control is-invalid" required placeholder="Tanggal BPKB"
                    value="{{ $kenda->tgl_bpkb?->format('Y-m-d') }}">
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="form-group">
                <label for="merk_{{ $counter }}">Merk</label>
                <input type="text" name="merk_{{ $counter }}" id="merk_{{ $counter }}"
                    class="form-control is-invalid" required placeholder="Merk" value="{{ $kenda->merk }}">
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="form-group">
                <label for="nopol_{{ $counter }}">Nomor Polisi</label>
                <input type="text" name="nopol_{{ $counter }}" id="nopol_{{ $counter }}"
                    class="form-control is-invalid" required placeholder="Nopol" value="{{ $kenda->nopol }}">
            </div>
        </div>

        {{-- for Analis --}}
        @if (Auth::user()->jabatan == 'Analis Cabang')
            <div class="col-md-6 mb-4">
                <div class="form-group">
                    <label for="type_{{ $counter }}">Type</label>
                    <input type="text" name="type_{{ $counter }}" id="type_{{ $counter }}"
                        class="form-control is-invalid" required placeholder="Type" value="{{ $kenda->type }}">
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="form-group">
                    <label for="warna_{{ $counter }}">Warna</label>
                    <input type="text" name="warna_{{ $counter }}" id="warna_{{ $counter }}"
                        class="form-control is-invalid" required placeholder="Warna" value="{{ $kenda->warna }}">
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="form-group">
                    <label for="no_rangka_{{ $counter }}">Nomor Rangka</label>
                    <input type="text" name="no_rangka_{{ $counter }}" id="no_rangka_{{ $counter }}"
                        class="form-control is-invalid" required placeholder="Nomor Rangka"
                        value="{{ $kenda->no_rangka }}">
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="form-group">
                    <label for="no_mesin_{{ $counter }}">Nomor Mesin</label>
                    <input type="text" name="no_mesin_{{ $counter }}" id="no_mesin_{{ $counter }}"
                        class="form-control is-invalid" required placeholder="Nomor Mesin"
                        value="{{ $kenda->no_mesin }}">
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="form-group">
                    <label for="thn_pembuatan_{{ $counter }}">Tahun Pembuatan</label>
                    <input type="text" name="thn_pembuatan_{{ $counter }}"
                        id="thn_pembuatan_{{ $counter }}" class="form-control is-invalid" required
                        placeholder="Tahun Pembuatan" value="{{ $kenda->thn_pembuatan }}">
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="form-group">
                    <label for="nama_pemilik_sebelumnya_{{ $counter }}">Nama Pemilik Sebelumnya</label>
                    <input type="text" name="nama_pemilik_sebelumnya_{{ $counter }}"
                        id="nama_pemilik_sebelumnya_{{ $counter }}" class="form-control is-invalid" required
                        placeholder="Nama Pemilik Sebelumnya" value="{{ $kenda->nama_pemilik_sebelumnya }}">
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="form-group">
                    <label for="alamat_pemilik_sebelumnya_{{ $counter }}">Alamat Pemilik Sebelumnya</label>
                    <input type="text" name="alamat_pemilik_sebelumnya_{{ $counter }}"
                        id="alamat_pemilik_sebelumnya_{{ $counter }}" class="form-control is-invalid" required
                        placeholder="Alamat Pemilik Sebelumnya" value="{{ $kenda->alamat_pemilik_sebelumnya }}">
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="form-group">
                    <label for="thn_pembelian_{{ $counter }}">Tahun Pembelian</label>
                    <input type="text" name="thn_pembelian_{{ $counter }}"
                        id="thn_pembelian_{{ $counter }}" class="form-control is-invalid" required
                        placeholder="Tahun Pembelian" value="{{ $kenda->thn_pembelian }}">
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="form-group">
                    <label for="harga_pembelian_{{ $counter }}">Harga Pembelian</label>
                    <input type="text" name="harga_pembelian_{{ $counter }}"
                        id="harga_pembelian_{{ $counter }}" class="form-control is-invalid" required
                        placeholder="Harga Pembelian"
                        value="Rp. {{ number_format($kenda->harga_pembelian, 0, ',', '.') }}">
                </div>
            </div>
        @endif
    </div>
    @php $counter++; @endphp
@endforeach

{{-- Deposito --}}
@foreach ($jam_depo as $depo)
    {{-- head jaminan 1 --}}
    <div class="row" style="margin-left: 5px;" id="head_jaminan_{{ $counter }}">
        <div class="col-md-12 mb-2">
            <hr>
            <h6 style="font-weight: bold; font-style: italic; letter-spacing: 2px; color: rgb(0, 162, 255)">
                &rarr; Data Jaminan {{ $counter }}

                <input type="hidden" id="id_depo_{{ $counter }}" name="id_depo_{{ $counter }}"
                    value="{{ base64_encode($depo->id_jaminan_deposito) }}">
            </h6>
            <hr>
        </div>
        <div class="col-md-6 mb-4">
            <div class="form-group">
                <label for="kategori_jaminan_{{ $counter }}">Kategori Jaminan</label>
                <select name="kategori_jaminan_{{ $counter }}" id="kategori_jaminan_{{ $counter }}"
                    class="form-select is-invalid" required>
                    <option selected value="Deposito">Tabungan/Deposito</option>
                </select>
            </div>
        </div>
        {{-- aksi data ini --}}
        <div class="col-md-12 mb-4">
            <div class="form-group">
                <label for="aksi_jaminan_depo_{{ $counter }}">Aksi Data Ini!</label>
                <select name="aksi_jaminan_depo_{{ $counter }}" id="aksi_jaminan_depo_{{ $counter }}"
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
    </div>

    <div class="row" style="margin-left: 5px;" id="head_deposito_{{ $counter }}">
        <div class="col-md-6 mb-4">
            <div class="form-group">
                <label for="jns_jaminan_deposito_{{ $counter }}">Spesifik Tabungan/Deposito</label>
                <select name="jns_jaminan_deposito_{{ $counter }}"
                    id="jns_jaminan_deposito_{{ $counter }}" class="form-select is-invalid" required>
                    <option disabled selected>- Pilih -</option>
                    <option {{ $depo->jns_jaminan == 'Deposito' ? 'selected' : '' }} value="Deposito">
                        Deposito</option>
                    <option {{ $depo->jns_jaminan == 'Tabungan' ? 'selected' : '' }} value="Tabungan">
                        Tabungan</option>
                </select>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="form-group">
                <label for="no_rek_{{ $counter }}">Nomor Rekening</label>
                <input type="text" name="no_rek_{{ $counter }}" id="no_rek_{{ $counter }}"
                    class="form-control is-invalid" required placeholder="Nomor Rekening"
                    value="{{ $depo->no_rek }}">
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="form-group">
                <label for="atas_nama_deposito_{{ $counter }}">Atas Nama</label>
                <input type="text" name="atas_nama_deposito_{{ $counter }}"
                    id="atas_nama_deposito_{{ $counter }}" class="form-control is-invalid" required
                    placeholder="Atas Nama" value="{{ $depo->atas_nama }}">
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="form-group">
                <label for="nominal_{{ $counter }}">Nominal</label>
                <input type="text" name="nominal_{{ $counter }}" id="nominal_{{ $counter }}"
                    class="form-control is-invalid" required placeholder="Nominal"
                    value="Rp. {{ number_format($depo->nominal, 0, ',', '.') }}">
            </div>
        </div>
    </div>
    @php $counter++; @endphp
@endforeach

{{-- Non Jaminan --}}
@if ($jam_tanah->IsNotEmpty() || $jam_kenda->IsNotEmpty() || $jam_depo->IsNotEmpty() || $pikar == null)
    <div class="row d-none" id="head_non_jaminan">
        <div class="col-md-12">
            <h1 style="color: red; font-style: italic; text-align: center; font-weight: bold;">
                PIKAR (NON JAMINAN) TIDAK MEMERLUKAN JAMINAN</h1>
        </div>
    </div>
@else
    <div class="row" id="head_non_jaminan">
        <div class="col-md-12">
            <h1 style="color: red; font-style: italic; text-align: center; font-weight: bold;">
                PIKAR (NON JAMINAN) TIDAK MEMERLUKAN JAMINAN</h1>
        </div>
    </div>
@endif

<br>
{{-- tambahan --}}
<div id="tambahan_jaminan"></div>
<div class="text-center">
    <button class="btn btn-outline-primary w-100" id="tambah_penjamin" type="button" onclick="tambahJaminan()">
        <i class="fa-solid fa-circle-plus"></i> Tambah Data Jaminan <i class="fa-solid fa-circle-plus"></i>
    </button>
</div>
