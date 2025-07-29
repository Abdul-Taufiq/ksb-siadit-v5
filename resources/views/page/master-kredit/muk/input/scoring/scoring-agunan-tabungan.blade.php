<div class="col-md-12">
    <table class="table table-striped table-sm w-100">
        <tr>
            <td>
                <label class="notbold" for="norek_tab_{{ $loop->iteration }}">Nomor Rekening</label>
            </td>
            <td>
                <input type="text" name="norek_tab_{{ $loop->iteration }}" id="norek_tab_{{ $loop->iteration }}"
                    class="form-control form-control-sm" required value="{{ $depo->sc_tabungan?->norek }}">
            </td>
            <td>
                <label class="notbold" for="saldo_tabungan_{{ $loop->iteration }}">Saldo Tabungan</label>
            </td>
            <td>
                <div class="input-group input-group-sm">
                    <span class="input-group-text">Rp</span>
                    <input type="text" name="saldo_tabungan_{{ $loop->iteration }}"
                        id="saldo_tabungan_{{ $loop->iteration }}" class="form-control form-control-sm setRp" required
                        value="{{ number_format($depo->sc_tabungan?->saldo_tabungan, 0, ',', '.') }}">
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <label class="notbold" for="nama_pemilik_tab_{{ $loop->iteration }}">Nama Pemilik</label>
            </td>
            <td>
                <input type="text" name="nama_pemilik_tab_{{ $loop->iteration }}"
                    id="nama_pemilik_tab_{{ $loop->iteration }}" class="form-control form-control-sm" required
                    value="{{ $depo->sc_tabungan?->nama_pemilik }}">
            </td>
            <td>
                <label class="notbold" for="saldo_dijaminkan_{{ $loop->iteration }}">Saldo Yang Dijaminkan</label>
            </td>
            <td>
                <div class="input-group input-group-sm">
                    <span class="input-group-text">Rp</span>
                    <input type="text" name="saldo_dijaminkan_{{ $loop->iteration }}"
                        id="saldo_dijaminkan_{{ $loop->iteration }}" class="form-control form-control-sm setRp"
                        required value="{{ number_format($depo->sc_tabungan?->saldo_dijaminkan, 0, ',', '.') }}">
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <label class="notbold" for="alamat_pemilik_tab_{{ $loop->iteration }}">Alamat Pemilik</label>
            </td>
            <td>
                <textarea name="alamat_pemilik_tab_{{ $loop->iteration }}" id="alamat_pemilik_tab_{{ $loop->iteration }}"
                    cols="30" rows="2" class="form-control" required>{{ $depo->sc_tabungan?->alamat_pemilik }}</textarea>
            </td>
            <td>
                <label class="notbold" for="suku_bunga_{{ $loop->iteration }}">Suku Bunga</label>
            </td>
            <td>
                <input type="number" name="suku_bunga_{{ $loop->iteration }}" id="suku_bunga_{{ $loop->iteration }}"
                    min="0" class="form-control form-control-sm" required
                    value="{{ number_format($depo->sc_tabungan?->suku_bunga, 0, ',', '.') }}">
            </td>
        </tr>
        <tr>
            <td>
                <label class="notbold" for="bank_penerbit_tab_{{ $loop->iteration }}">Bank Penerbit</label>
            </td>
            <td>
                <input type="text" name="bank_penerbit_tab_{{ $loop->iteration }}"
                    id="bank_penerbit_tab_{{ $loop->iteration }}" class="form-control form-control-sm" required
                    value="{{ $depo->sc_tabungan?->bank_penerbit }}">
            </td>
            <td>
                <label class="notbold" for="hubungan_dgn_debitur_tab_{{ $loop->iteration }}">Hubungan Dengan
                    Debitur</label>
            </td>
            <td>
                <select name="hubungan_dgn_debitur_tab_{{ $loop->iteration }}"
                    id="hubungan_dgn_debitur_tab_{{ $loop->iteration }}" class="form-select form-select-sm">
                    <option selected disabled>-Pilih-</option>
                    <option {{ $depo->sc_tabungan?->hubungan_dgn_debitur == 'Sendiri' ? 'selected' : '' }}
                        value="Sendiri">Sendiri</option>
                    <option {{ $depo->sc_tabungan?->hubungan_dgn_debitur == 'Suami/Istri' ? 'selected' : '' }}
                        value="Suami/Istri">Suami/Istri</option>
                    <option {{ $depo->sc_tabungan?->hubungan_dgn_debitur == 'Orang Tua' ? 'selected' : '' }}
                        value="Orang Tua">Orang Tua</option>
                    <option {{ $depo->sc_tabungan?->hubungan_dgn_debitur == 'Anak' ? 'selected' : '' }} value="Anak">
                        Anak</option>
                    <option {{ $depo->sc_tabungan?->hubungan_dgn_debitur == 'Lainnya' ? 'selected' : '' }}
                        value="Lainnya">Lainnya</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <label class="notbold" for="jns_rek_tab_{{ $loop->iteration }}">Jenis Rekening</label>
            </td>
            <td>
                <select name="jns_rek_tab_{{ $loop->iteration }}" id="jns_rek_tab_{{ $loop->iteration }}"
                    class="form-select form-select-sm">
                    <option selected disabled>-Pilih-</option>
                    <option {{ $depo->sc_tabungan?->jns_rek == 'Tabungan Kusuma' ? 'selected' : '' }}
                        value="Tabungan Kusuma">Tabungan Kusuma</option>
                    <option {{ $depo->sc_tabungan?->jns_rek == 'Tabungan Kusuka' ? 'selected' : '' }}
                        value="Tabungan Kusuka">Tabungan Kusuka</option>
                    <option {{ $depo->sc_tabungan?->jns_rek == 'Tabungan Umum' ? 'selected' : '' }}
                        value="Tabungan Umum">Tabungan Umum</option>
                    <option {{ $depo->sc_tabungan?->jns_rek == 'Lainnya' ? 'selected' : '' }} value="Lainnya">Lainnya
                    </option>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <label class="notbold" for="keterangan_lainnya_tab_{{ $loop->iteration }}">Keterangan Lainnya</label>
            </td>
            <td colspan="3">
                <textarea name="keterangan_lainnya_tab_{{ $loop->iteration }}" id="keterangan_lainnya_tab_{{ $loop->iteration }}"
                    cols="30" rows="2" class="form-control" required>{{ $depo->sc_tabungan?->keterangan_lainnya }}</textarea>
            </td>
        </tr>

    </table>
</div>
