<div class="col-md-12">
    <table class="table table-striped table-sm w-100">
        <tr>
            <td>
                <label class="notbold" for="no_bilyet_{{ $loop->iteration }}">Nomor Bilyet</label>
            </td>
            <td>
                <input type="text" name="no_bilyet_{{ $loop->iteration }}" id="no_bilyet_{{ $loop->iteration }}"
                    class="form-control form-control-sm" required value="{{ $depo->sc_depo?->no_bilyet }}">
            </td>
            <td>
                <label class="notbold" for="tgl_jatuh_tempo_{{ $loop->iteration }}">Tanggal Jatuh Tempo</label>
            </td>
            <td>
                <input type="date" name="tgl_jatuh_tempo_{{ $loop->iteration }}"
                    id="tgl_jatuh_tempo_{{ $loop->iteration }}" class="form-control form-control-sm" required
                    value="{{ $depo->sc_depo?->tgl_jatuh_tempo?->format('Y-m-d') }}">
            </td>
        </tr>
        <tr>
            <td>
                <label class="notbold" for="nama_pemilik_{{ $loop->iteration }}">Nama Pemilik</label>
            </td>
            <td>
                <input type="text" name="nama_pemilik_{{ $loop->iteration }}"
                    id="nama_pemilik_{{ $loop->iteration }}" class="form-control form-control-sm" required
                    value="{{ $depo->sc_depo?->nama_pemilik }}">
            </td>
            <td>
                <label class="notbold" for="nominal_{{ $loop->iteration }}">Nominal</label>
            </td>
            <td>
                <div class="input-group input-group-sm">
                    <span class="input-group-text">Rp</span>
                    <input type="text" name="nominal_{{ $loop->iteration }}" id="nominal_{{ $loop->iteration }}"
                        class="form-control form-control-sm setRp" required
                        value="{{ number_format($depo->sc_depo?->nominal, 0, ',', '.') }}">
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <label class="notbold" for="alamat_pemilik_{{ $loop->iteration }}">Alamat Pemilik</label>
            </td>
            <td>
                <textarea name="alamat_pemilik_{{ $loop->iteration }}" id="alamat_pemilik_{{ $loop->iteration }}" cols="30"
                    rows="2" class="form-control" required>{{ $depo->sc_depo?->keterangan_lainnya }}</textarea>
            </td>
            <td>
                <label class="notbold" for="aro_{{ $loop->iteration }}">Automatic Roll Over (ARO)</label>
            </td>
            <td>
                <select name="aro_{{ $loop->iteration }}" id="aro_{{ $loop->iteration }}"
                    class="form-select form-select-sm">
                    <option selected disabled>-Pilih-</option>
                    <option {{ $depo->sc_depo?->aro == 'Ya' ? 'selected' : '' }} value="Ya">Ya</option>
                    <option {{ $depo->sc_depo?->aro == 'Tidak' ? 'selected' : '' }} value="Tidak">Tidak</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <label class="notbold" for="bank_penerbit_{{ $loop->iteration }}">Bank Penerbit</label>
            </td>
            <td>
                <input type="text" name="bank_penerbit_{{ $loop->iteration }}"
                    id="bank_penerbit_{{ $loop->iteration }}" class="form-control form-control-sm" required
                    value="{{ $depo->sc_depo?->bank_penerbit }}">
            </td>
            <td>
                <label class="notbold" for="jns_aro_{{ $loop->iteration }}">Jenis ARO</label>
            </td>
            <td>
                <select name="jns_aro_{{ $loop->iteration }}" id="jns_aro_{{ $loop->iteration }}"
                    class="form-select form-select-sm">
                    <option selected disabled>-Pilih-</option>
                    <option {{ $depo->sc_depo?->jns_aro == 'Non ARO' ? 'selected' : '' }} value="Non ARO">Non ARO
                    </option>
                    <option {{ $depo->sc_depo?->jns_aro == 'ARO 1 Bulan' ? 'selected' : '' }} value="ARO 1 Bulan">ARO 1
                        Bulan</option>
                    <option {{ $depo->sc_depo?->jns_aro == 'ARO 3 Bulan' ? 'selected' : '' }} value="ARO 3 Bulan">ARO 3
                        Bulan</option>
                    <option {{ $depo->sc_depo?->jns_aro == 'ARO 6 Bulan' ? 'selected' : '' }} value="ARO 6 Bulan">ARO 6
                        Bulan</option>
                    <option {{ $depo->sc_depo?->jns_aro == 'ARO 12 Bulan' ? 'selected' : '' }} value="ARO 12 Bulan">ARO
                        12 Bulan</option>
                    <option {{ $depo->sc_depo?->jns_aro == 'ARO Pokok 1 Bulan' ? 'selected' : '' }}
                        value="ARO Pokok 1 Bulan">ARO Pokok 1 Bulan</option>
                    <option {{ $depo->sc_depo?->jns_aro == 'ARO Pokok 3 Bulan' ? 'selected' : '' }}
                        value="ARO Pokok 3 Bulan">ARO Pokok 3 Bulan</option>
                    <option {{ $depo->sc_depo?->jns_aro == 'ARO Pokok 6 Bulan' ? 'selected' : '' }}
                        value="ARO Pokok 6 Bulan">ARO Pokok 6 Bulan</option>
                    <option {{ $depo->sc_depo?->jns_aro == 'ARO Pokok 12 Bulan' ? 'selected' : '' }}
                        value="ARO Pokok 12 Bulan">ARO Pokok 12 Bulan</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <label class="notbold" for="tgl_bilyet_{{ $loop->iteration }}">Tanggal Bilyet</label>
            </td>
            <td>
                <input type="date" name="tgl_bilyet_{{ $loop->iteration }}" id="tgl_bilyet_{{ $loop->iteration }}"
                    class="form-control form-control-sm" required
                    value="{{ $depo->sc_depo?->tgl_bilyet?->format('Y-m-d') }}">
            </td>
            <td>
                <label class="notbold" for="hubungan_dgn_debitur_{{ $loop->iteration }}">Hubungan Dengan
                    Debitur</label>
            </td>
            <td>
                <select name="hubungan_dgn_debitur_{{ $loop->iteration }}"
                    id="hubungan_dgn_debitur_{{ $loop->iteration }}" class="form-select form-select-sm">
                    <option selected disabled>-Pilih-</option>
                    <option {{ $depo->sc_depo?->hubungan_dgn_debitur == 'Sendiri' ? 'selected' : '' }} value="Sendiri">
                        Sendiri</option>
                    <option {{ $depo->sc_depo?->hubungan_dgn_debitur == 'Suami/Istri' ? 'selected' : '' }}
                        value="Suami/Istri">Suami/Istri</option>
                    <option {{ $depo->sc_depo?->hubungan_dgn_debitur == 'Orang Tua' ? 'selected' : '' }}
                        value="Orang Tua">Orang Tua</option>
                    <option {{ $depo->sc_depo?->hubungan_dgn_debitur == 'Anak' ? 'selected' : '' }} value="Anak">Anak
                    </option>
                    <option {{ $depo->sc_depo?->hubungan_dgn_debitur == 'Lainnya' ? 'selected' : '' }} value="Lainnya">
                        Lainnya</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <label class="notbold" for="keterangan_lainnya_{{ $loop->iteration }}">Keterangan Lainnya</label>
            </td>
            <td colspan="3">
                <textarea name="keterangan_lainnya_{{ $loop->iteration }}" id="keterangan_lainnya_{{ $loop->iteration }}"
                    cols="30" rows="2" class="form-control" required>{{ $depo->sc_depo?->keterangan_lainnya }}</textarea>
            </td>
        </tr>

    </table>
</div>
