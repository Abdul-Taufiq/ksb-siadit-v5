<div class="row" style="margin-left: 5px;">
    <div class="col-md-12 mb-4">
        <div class="form-group">
            <div class="d-flex justify-content-between">
                <label for="prospek_usaha">Prospek Usaha</label>
                <label for="prospek_usaha" data-bs-toggle="tooltip" data-bs-placement="top"
                    data-bs-custom-class="custom-tooltip"
                    data-bs-title=" Diisi dengan : <br>
                        1. Prospek kedepan atas usaha yang dijalankan oleh debitur. <br>
                        2. Tantangan yang akan dihadapai oleh usaha yang dijalankan oleh debitur. <br>
                        3. Aspek Positif dari usaha debitur. <br>
                        4. Aspek Negatif dari usaha debitur. ">
                    <i class="fa-solid fa-circle-question"></i>
                </label>
            </div>
            <textarea name="prospek_usaha" id="prospek_usaha">{!! $muk?->data?->prospek_usaha ?? null !!}</textarea>
        </div>
    </div>
    <div class="col-md-12 mb-4">
        <div class="form-group">
            <div class="d-flex justify-content-between">
                <label for="pemasok_dan_pelanggan">Konsentrasi Pemasok dan Pelanggan</label>
                <label for="pemasok_dan_pelanggan" data-bs-toggle="tooltip" data-bs-placement="top"
                    data-bs-custom-class="custom-tooltip"
                    data-bs-title=" Diisi dengan : <br>
                        1. Cara debitur dalam mendapatkan barang dagangan dari supplier. <br>
                        2. Lokasi Supplier terbesar debitur, prosentase supplier terbesar debitur. <br>
                        3. Cara debitur dalam menyebarkan barang dagangan ke buyer. <br>
                        4. Prosentase buyer terbesar debitur.
                        ">
                    <i class="fa-solid fa-circle-question"></i>
                </label>
            </div>
            <textarea name="pemasok_dan_pelanggan" id="pemasok_dan_pelanggan">{!! $muk?->data?->pemasok_dan_pelanggan !!}</textarea>
        </div>
    </div>
</div>

{{-- confirm if edit --}}
<input type="hidden" id="confirm_edit" value="{{ $muk->industri->count() > 0 ? 'Edit' : 'Create' }}">
<input type="hidden" id="total_textarea" value="{{ $muk->industri->count() > 0 ? $muk->industri->count() : null }}">

{{-- Personal --}}
@if ($muk->industri->count() > 0)
    <div class="row" style="margin-left: 5px;">
        @foreach ($muk->industri as $industri)
            <input type="hidden" name="id_industri_{{ $loop->iteration }}" id="id_industri_{{ $loop->iteration }}"
                value="{{ base64_encode($industri->id_industri) }}">

            <div class="col-md-6 mb-2" id="head_industri_{{ $loop->iteration }}">
                <div class="form-group mb-2">
                    <label for="aksi_data_industri_{{ $loop->iteration }}">Aksi Data ini!</label>
                    <select name="aksi_data_industri_{{ $loop->iteration }}" class="form-select form-select-sm"
                        required>
                        <option selected disabled>-Pilih-</option>
                        <option class="text-primary" value="Edit">Edit/Biarkan disimpan</option>
                        <option class="text-danger" value="Hapus">Hapus/Tidak akan disimpan</option>
                    </select>
                </div>
                <table class="table table-striped table-sm w-100">
                    <tr>
                        <td>
                            <label for="type_data_{{ $loop->iteration }}">Type</label>
                        </td>
                        <td>
                            <select name="type_data_{{ $loop->iteration }}" id="type_data_{{ $loop->iteration }}"
                                class="form-select is-invalid">
                                <option selected disabled>-PILIH-</option>
                                <option {{ $industri->type_data == 'Personal Checking' ? 'selected' : '' }}
                                    value="Personal Checking">Personal Checking</option>
                                <option {{ $industri->type_data == 'Trade Checking' ? 'selected' : '' }}
                                    value="Trade Checking">
                                    Trade Checking</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="nama_{{ $loop->iteration }}">Nama</label>
                        </td>
                        <td>
                            <input type="text" name="nama_{{ $loop->iteration }}" id="nama_{{ $loop->iteration }}"
                                class="form-control form-control-sm is-invalid" placeholder="Nama" required
                                value="{{ $industri->nama }}">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="hubungan_{{ $loop->iteration }}">Hubungan</label>
                        </td>
                        <td>
                            <input type="text" name="hubungan_{{ $loop->iteration }}"
                                id="hubungan_{{ $loop->iteration }}" class="form-control form-control-sm is-invalid"
                                placeholder="Hubungan" required value="{{ $industri->hubungan }}">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="lama_hubungan_{{ $loop->iteration }}">Lama Hubungan</label>
                        </td>
                        <td>
                            <input type="text" name="lama_hubungan_{{ $loop->iteration }}"
                                id="lama_hubungan_{{ $loop->iteration }}"
                                class="form-control form-control-sm is-invalid" placeholder="Lama Hubungan" required
                                value="{{ $industri->lama_hubungan }}">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="no_hp_{{ $loop->iteration }}">No.Hp/Telepon</label>
                        </td>
                        <td>
                            <input type="text" name="no_hp_{{ $loop->iteration }}"
                                id="no_hp_{{ $loop->iteration }}" class="form-control form-control-sm is-invalid"
                                placeholder="No.Hp/Telepon" required value="{{ $industri->no_hp }}">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="keterangan_{{ $loop->iteration }}">Keterangan</label>
                        </td>
                        <td>
                            <textarea name="keterangan_{{ $loop->iteration }}" id="keterangan_{{ $loop->iteration }}">{!! $industri->keterangan !!}</textarea>
                        </td>
                    </tr>
                </table>
            </div>
        @endforeach
    </div>
@else
    <div class="row" style="margin-left: 5px;" id="head_industri_1">
        <div class="col-md-12 mb-3">
            <div class="form-group">
                <label for="type_data_1">Type</label>
                <select name="type_data_1" id="type_data_1" class="form-select is-invalid">
                    <option selected disabled>-PILIH-</option>
                    <option value="Personal Checking">Personal Checking</option>
                    <option value="Trade Checking">Trade Checking</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <table class="table table-striped table-sm w-100">
                <tr>
                    <td>
                        <label for="nama_1_1">Nama</label>
                    </td>
                    <td>
                        <input type="text" name="nama_1_1" id="nama_1_1"
                            class="form-control form-control-sm is-invalid" placeholder="Nama" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="hubungan_1_1">Hubungan</label>
                    </td>
                    <td>
                        <input type="text" name="hubungan_1_1" id="hubungan_1_1"
                            class="form-control form-control-sm is-invalid" placeholder="Hubungan" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="lama_hubungan_1_1">Lama Hubungan</label>
                    </td>
                    <td>
                        <input type="text" name="lama_hubungan_1_1" id="lama_hubungan_1_1"
                            class="form-control form-control-sm is-invalid" placeholder="Lama Hubungan" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="no_hp_1_1">No.Hp/Telepon</label>
                    </td>
                    <td>
                        <input type="text" name="no_hp_1_1" id="no_hp_1_1"
                            class="form-control form-control-sm is-invalid" placeholder="No.Hp/Telepon" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="keterangan_1_1">Keterangan</label>
                    </td>
                    <td>
                        <textarea name="keterangan_1_1" id="keterangan_1_1"></textarea>
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-md-6">
            <table class="table table-striped table-sm w-100">
                <tr>
                    <td>
                        <label for="nama_2_1">Nama</label>
                    </td>
                    <td>
                        <input type="text" name="nama_2_1" id="nama_2_1"
                            class="form-control form-control-sm is-invalid" placeholder="Nama" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="hubungan_2_1">Hubungan</label>
                    </td>
                    <td>
                        <input type="text" name="hubungan_2_1" id="hubungan_2_1"
                            class="form-control form-control-sm is-invalid" placeholder="Hubungan" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="lama_hubungan_2_1">Lama Hubungan</label>
                    </td>
                    <td>
                        <input type="text" name="lama_hubungan_2_1" id="lama_hubungan_2_1"
                            class="form-control form-control-sm is-invalid" placeholder="Lama Hubungan" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="no_hp_2_1">No.Hp/Telepon</label>
                    </td>
                    <td>
                        <input type="text" name="no_hp_2_1" id="no_hp_2_1"
                            class="form-control form-control-sm is-invalid" placeholder="No.Hp/Telepon" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="keterangan_2_1">Keterangan</label>
                    </td>
                    <td>
                        <textarea name="keterangan_2_1" id="keterangan_2_1"></textarea>
                    </td>
                </tr>
            </table>
        </div>
    </div>
@endif


{{-- tambahan --}}
<div id="tambahan_industri"></div>
<div class="text-center">
    <button class="btn btn-outline-primary w-100" id="tambah_industri" type="button" onclick="tambahIndustri()">
        <i class="fa-solid fa-circle-plus"></i> Tambah Data <i class="fa-solid fa-circle-plus"></i>
    </button>
</div>
