@if (!empty($muk) && $muk->slik->count())
    {{-- for edit --}}
    @foreach ($muk->slik as $slik)
        <input type="hidden" name="id_slik_{{ $loop->iteration }}" id="id_slik_{{ $loop->iteration }}"
            value="{{ base64_encode($slik->id_slik) }}">

        <div class="row" style="margin-left: 5px;" id="head_slik_{{ $loop->iteration }}">
            <div class="col-md-12">
                <div class="head-judul">
                    <h6>→ DATA {{ $loop->iteration }}</h6>
                </div>
                <hr>
            </div>
            <div class="col-md-12 text-center mb-3">
                <label for="aksi_data_slik_{{ $loop->iteration }}">Aksi Data ini!</label>
                <select name="aksi_data_slik_{{ $loop->iteration }}" class="form-select form-select-sm" required>
                    <option selected disabled>-Pilih-</option>
                    <option class="text-primary" value="Edit">Edit/Biarkan disimpan</option>
                    <option class="text-danger" value="Hapus">Hapus/Tidak akan disimpan</option>
                </select>
            </div>

            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="nama_bank_{{ $loop->iteration }}">Nama Bank</label>
                    <input type="text" name="nama_bank_{{ $loop->iteration }}" id="nama_bank_{{ $loop->iteration }}"
                        class="form-control is-invalid" placeholder="Nama Bank" required
                        value="{{ $slik->nama_bank }}">
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="tujuan_kredit_{{ $loop->iteration }}">Tujuan Kredit</label>
                    <select name="tujuan_kredit_{{ $loop->iteration }}" id="tujuan_kredit_{{ $loop->iteration }}"
                        class="form-select is-invalid" required>
                        <option disabled selected>- Pilih Tujuan Kredit -</option>
                        <option {{ $slik->tujuan_kredit == 'Modal Kerja' ? 'selected' : '' }} value="Modal Kerja">Modal
                            Kerja</option>
                        <option {{ $slik->tujuan_kredit == 'Investasi' ? 'selected' : '' }} value="Investasi">Investasi
                        </option>
                        <option {{ $slik->tujuan_kredit == 'Konsumsi' ? 'selected' : '' }} value="Konsumsi">Konsumsi
                        </option>
                    </select>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="plafond_{{ $loop->iteration }}" class="req">Plafond</label>
                    <div class="input-group">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" class="form-control is-invalid" placeholder="Plafond"
                            id="plafond_{{ $loop->iteration }}" name="plafond_{{ $loop->iteration }}" required
                            value="{{ number_format($slik->plafond, 0, ',', '.') }}">
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="baki_debet_{{ $loop->iteration }}" class="req">Baki Debet</label>
                    <div class="input-group">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" class="form-control is-invalid" placeholder="Baki Debet"
                            id="baki_debet_{{ $loop->iteration }}" name="baki_debet_{{ $loop->iteration }}" required
                            data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                            data-bs-title="Mohon Update Nilai Ini Jika Anda mengubah Tujuan Kredit diatas Agar nilai bisa SINKRON"
                            value="{{ number_format($slik->baki_debet, 0, ',', '.') }}">
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="rate_{{ $loop->iteration }}">Rate</label>
                    <input type="type" name="rate_{{ $loop->iteration }}" id="rate_{{ $loop->iteration }}"
                        class="form-control is-invalid" placeholder="Rate" required min="0"
                        value="{{ number_format($slik->rate, 0, ',', '.') }}">
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="angsuran_{{ $loop->iteration }}" class="req">Angsuran</label>
                    <div class="input-group">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" class="form-control is-invalid" placeholder="Angsuran"
                            id="angsuran_{{ $loop->iteration }}" name="angsuran_{{ $loop->iteration }}" required
                            value="{{ number_format($slik->angsuran, 0, ',', '.') }}">
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="kol_{{ $loop->iteration }}">Kol</label>
                    <select name="kol_{{ $loop->iteration }}" id="kol_{{ $loop->iteration }}"
                        class="form-select is-invalid" required>
                        <option disabled selected>- Pilih Kol -</option>
                        <option {{ $slik->kol == '1' ? 'selected' : '' }} value="1">1</option>
                        <option {{ $slik->kol == '2' ? 'selected' : '' }} value="2">2</option>
                        <option {{ $slik->kol == '3' ? 'selected' : '' }} value="3">3</option>
                        <option {{ $slik->kol == '4' ? 'selected' : '' }} value="4">4</option>
                        <option {{ $slik->kol == '5' ? 'selected' : '' }} value="5">5</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="dpd_{{ $loop->iteration }}">DPD (Jumlah Hari Tunggakan)</label>
                    <input type="text" name="dpd_{{ $loop->iteration }}" id="dpd_{{ $loop->iteration }}"
                        class="form-control is-invalid" placeholder="DPD" required
                        value="{{ number_format($slik->dpd, 0, ',', '.') }}">
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="tgl_awal_slik_{{ $loop->iteration }}">Tgl Awal</label>
                    <input type="date" name="tgl_awal_slik_{{ $loop->iteration }}"
                        id="tgl_awal_slik_{{ $loop->iteration }}" class="form-control is-invalid" required
                        value="{{ $slik->tgl_awal?->format('Y-m-d') ?? '' }}">
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="tgl_akhir_slik_{{ $loop->iteration }}">Tgl Akhir</label>
                    <input type="date" name="tgl_akhir_slik_{{ $loop->iteration }}"
                        id="tgl_akhir_slik_{{ $loop->iteration }}" class="form-control is-invalid" required
                        value="{{ $slik->tgl_akhir?->format('Y-m-d') ?? '' }}">
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="pernah_restruck_{{ $loop->iteration }}">Pernah di Restrcuk</label>
                    <select name="pernah_restruck_{{ $loop->iteration }}"
                        id="pernah_restruck_{{ $loop->iteration }}" class="form-select is-invalid" required>
                        <option disabled selected>- Pilih Kol -</option>
                        <option {{ $slik->pernah_restruck == 'YA' ? 'selected' : '' }} value="YA">YA</option>
                        <option {{ $slik->pernah_restruck == 'TIDAK' ? 'selected' : '' }} value="TIDAK">TIDAK
                        </option>
                    </select>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="alasan_restruck_{{ $loop->iteration }}">Alasan di Restrcuk</label>
                    <input type="text" name="alasan_restruck_{{ $loop->iteration }}"
                        id="alasan_restruck_{{ $loop->iteration }}" class="form-control is-invalid"
                        placeholder="jika tidak ada isi (-)" required value="{{ $slik->alasan_restruck ?? '-' }}">
                </div>
            </div>
        </div>
    @endforeach
@else
    {{-- for creatr --}}
    <div class="row" style="margin-left: 5px;" id="head_slik_1">
        <div class="col-md-12">
            <div class="head-judul">
                <h6>→ DATA 1</h6>
            </div>
            <hr>
        </div>
        <div class="col-md-6 mb-3">
            <div class="form-group">
                <label for="nama_bank_1">Nama Bank</label>
                <input type="text" name="nama_bank_1" id="nama_bank_1" class="form-control is-invalid"
                    placeholder="Nama Bank" required>
            </div>
        </div>

        <div class="col-md-6 mb-3">
            <div class="form-group">
                <label for="tujuan_kredit_1">Tujuan Kredit</label>
                <select name="tujuan_kredit_1" id="tujuan_kredit_1" class="form-select is-invalid" required>
                    <option disabled selected>- Pilih Tujuan Kredit -</option>
                    <option value="Modal Kerja">Modal Kerja</option>
                    <option value="Investasi">Investasi</option>
                    <option value="Konsumsi">Konsumsi</option>
                </select>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="form-group">
                <label for="plafond_1" class="req">Plafond</label>
                <div class="input-group">
                    <span class="input-group-text">Rp.</span>
                    <input type="text" class="form-control is-invalid" placeholder="Plafond" id="plafond_1"
                        name="plafond_1" required>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="form-group">
                <label for="baki_debet_1" class="req">Baki Debet</label>
                <div class="input-group">
                    <span class="input-group-text">Rp.</span>
                    <input type="text" class="form-control is-invalid" placeholder="Baki Debet" id="baki_debet_1"
                        name="baki_debet_1" required data-bs-toggle="tooltip" data-bs-placement="top"
                        data-bs-custom-class="custom-tooltip"
                        data-bs-title="Mohon Update Nilai Ini Jika Anda mengubah Tujuan Kredit diatas Agar nilai bisa SINKRON">
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="form-group">
                <label for="rate_1">Rate</label>
                <input type="type" name="rate_1" id="rate_1" class="form-control is-invalid"
                    placeholder="Rate" required min="0">
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="form-group">
                <label for="angsuran_1" class="req">Angsuran</label>
                <div class="input-group">
                    <span class="input-group-text">Rp.</span>
                    <input type="text" class="form-control is-invalid" placeholder="Angsuran" id="angsuran_1"
                        name="angsuran_1" required>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="form-group">
                <label for="kol_1">Kol</label>
                <select name="kol_1" id="kol_1" class="form-select is-invalid" required>
                    <option disabled selected>- Pilih Kol -</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="form-group">
                <label for="dpd_1">DPD (Jumlah Hari Tunggakan)</label>
                <input type="text" name="dpd_1" id="dpd_1" class="form-control is-invalid"
                    placeholder="DPD" required>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="form-group">
                <label for="tgl_awal_slik_1">Tgl Awal</label>
                <input type="date" name="tgl_awal_slik_1" id="tgl_awal_slik_1" class="form-control is-invalid"
                    required>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="form-group">
                <label for="tgl_akhir_slik_1">Tgl Akhir</label>
                <input type="date" name="tgl_akhir_slik_1" id="tgl_akhir_slik_1" class="form-control is-invalid"
                    required>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="form-group">
                <label for="pernah_restruck_1">Pernah di Restrcuk</label>
                <select name="pernah_restruck_1" id="pernah_restruck_1" class="form-select is-invalid" required>
                    <option disabled selected>- Pilih Kol -</option>
                    <option value="YA">YA</option>
                    <option value="TIDAK">TIDAK</option>
                </select>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="form-group">
                <label for="alasan_restruck_1">Alasan di Restrcuk</label>
                <input type="text" name="alasan_restruck_1" id="alasan_restruck_1"
                    class="form-control is-invalid" placeholder="jika tidak ada isi (-)" required>
            </div>
        </div>


    </div>
@endif



{{-- tambahan --}}
<div id="tambahan_slik"></div>
<div class="text-center">
    <button class="btn btn-outline-primary w-100" id="tambah_slik" type="button" onclick="tambahSlik()">
        <i class="fa-solid fa-circle-plus"></i> Tambah Data <i class="fa-solid fa-circle-plus"></i>
    </button>
</div>


<br><br>
<hr>
<div class="row">
    <div class="col-md-4">
        <label for="total_plafond">Total Plafond</label>
        <div class="input-group">
            <span class="input-group-text">Rp.</span>
            <input type="text" class="form-control is-invalid" id="total_plafond" name="total_plafond" readonly>
        </div>
    </div>
    <div class="col-md-4">
        <label for="total_bd">Total Baki Debet</label>
        <div class="input-group">
            <span class="input-group-text">Rp.</span>
            <input type="text" class="form-control is-invalid" id="total_bd" name="total_bd" readonly>
        </div>
    </div>
    <div class="col-md-4">
        <label for="total_angsuran">Total Angsuran</label>
        <div class="input-group">
            <span class="input-group-text">Rp.</span>
            <input type="text" class="form-control is-invalid" id="total_angsuran" name="total_angsuran"
                readonly>
        </div>
    </div>

    <input type="hidden" name="total_bd_modal_kerja" id="total_bd_modal_kerja">
    <input type="hidden" name="kredit_tujuan_pengajuan" id="kredit_tujuan_pengajuan"
        value="{{ $kredit->tujuan_pengajuan }}">
</div>
