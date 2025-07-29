<div class="row" style="margin-left: 5px;">
    <div class="col-md-12 mb-4">
        <div class="form-group">
            <label for="pertimbangan" class="notbold">Dari hasil analisa yang telah dilakukan, maka dapat diusulkan bahwa
                pengajuan kredit diatas dapat disetujui dengan pertimbangan sebagai berikut :</label>
            <textarea name="pertimbangan" id="pertimbangan">{{ $kredit?->persetujuan?->pertimbangan ?? null }}</textarea>
        </div>
    </div>
    <div class="col-md-6">
        <table class="table table-striped table-sm w-100">
            <tr>
                <td style="width: 35%">
                    <label class="notbold" for="jumlah_disetujui">Plafond</label>
                </td>
                <td>
                    <div class="input-group input-group-sm">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" class="form-control is-invalid setRp" id="jumlah_disetujui"
                            name="jumlah_disetujui" required
                            value="{{ number_format($kredit?->jumlah_disetujui, 0, ',', '.') ?? null }}">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <label class="notbold" for="putusan">Putusan</label>
                </td>
                <td>
                    <div class="form-group">
                        <select class="form-select form-select-sm is-invalid" name="putusan" id="putusan" required>
                            <option selected disabled>-Pilih-</option>
                            <option {{ $kredit?->persetujuan?->putusan == 'Cabang' ? 'selected' : '' }} value="Cabang">
                                Cabang</option>
                            <option {{ $kredit?->persetujuan?->putusan == 'Area' ? 'selected' : '' }} value="Area">
                                Area</option>
                            <option {{ $kredit?->persetujuan?->putusan == 'Pusat' ? 'selected' : '' }} value="Pusat">
                                Pusat</option>
                        </select>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <label class="notbold" for="jkw">Jangka Waktu</label>
                </td>
                <td>
                    <div class="form-group">
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control is-invalid setRp" id="jkw" name="jkw"
                                min="1" required value="{{ number_format($kredit?->jkw, 0, ',', '.') ?? null }}">
                            <span class="input-group-text">Bulan</span>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <label class="notbold" for="jns_bunga">Jenis Bunga</label>
                </td>
                <td>
                    <select class="form-select form-select-sm is-invalid" name="jns_bunga" id="jns_bunga" required>
                        <option selected disabled>-Pilih-</option>
                        <option {{ $kredit?->persetujuan?->jns_bunga == 'FLAT' ? 'selected' : '' }} value="FLAT">FLAT
                        </option>
                        <option {{ $kredit?->persetujuan?->jns_bunga == 'ANUITAS' ? 'selected' : '' }} value="ANUITAS">
                            ANUITAS</option>
                        <option {{ $kredit?->persetujuan?->jns_bunga == 'EFEKTIF' ? 'selected' : '' }} value="EFEKTIF">
                            EFEKTIF</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label class="notbold" for="besar_bunga">Suku Bunga</label>
                </td>
                <td>
                    <div class="input-group input-group-sm">
                        <input type="text" class="form-control is-invalid" id="besar_bunga" name="besar_bunga"
                            min="1" maxlength="5" required
                            value="{{ number_format($kredit?->persetujuan?->besar_bunga ?? 0, 2, ',', '.') }}">
                        <span class="input-group-text">% / Tahun</span>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <label class="notbold" for="provisi">Provisi</label>
                </td>
                <td>
                    <div class="form-group">
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control is-invalid" id="provisi" name="provisi"
                                min="1" maxlength="5" required
                                value="{{ number_format($kredit?->persetujuan?->provisi ?? 0, 2, ',', '.') }}">
                            <span class="input-group-text">%</span>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <label class="notbold" for="jumlah_provisi">Jumlah Provisi</label>
                </td>
                <td>
                    <div class="input-group input-group-sm">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" class="form-control is-invalid setRp" id="jumlah_provisi"
                            name="jumlah_provisi" required
                            value="{{ number_format($kredit?->persetujuan?->jumlah_provisi, 0, ',', '.') ?? null }}">
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <div class="col-md-6">
        <table class="table table-striped table-sm w-100">
            <tr>
                <td style="width: 35%">
                    <label class="notbold" for="besar_adm">Administrasi</label>
                </td>
                <td>
                    <div class="input-group input-group-sm">
                        <input type="text" class="form-control is-invalid" id="besar_adm" name="besar_adm"
                            min="1" maxlength="5" required
                            value="{{ number_format($kredit?->persetujuan?->besar_adm ?? 0, 2, ',', '.') }}">
                        <span class="input-group-text">%</span>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <label class="notbold" for="biaya_adm">Jumlah Administrasi</label>
                </td>
                <td>
                    <div class="input-group input-group-sm">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" class="form-control is-invalid setRp" id="biaya_adm" name="biaya_adm"
                            required
                            value="{{ number_format($kredit?->persetujuan?->biaya_adm, 0, ',', '.') ?? null }}">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <label class="notbold" for="besar_survey">Survey</label>
                </td>
                <td>
                    <div class="input-group input-group-sm">
                        <input type="text" class="form-control is-invalid" id="besar_survey" name="besar_survey"
                            min="1" maxlength="5" required
                            value="{{ number_format($kredit?->persetujuan?->besar_survey ?? 0, 2, ',', '.') }}">
                        <span class="input-group-text">%</span>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <label class="notbold" for="biaya_survey">Jumlah Survey</label>
                </td>
                <td>
                    <div class="input-group input-group-sm">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" class="form-control is-invalid setRp" id="biaya_survey"
                            name="biaya_survey" required
                            value="{{ number_format($kredit?->persetujuan?->biaya_survey, 0, ',', '.') ?? null }}">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <label class="notbold" for="jumlah_angsuran">Angsuran/Bulan</label>
                </td>
                <td>
                    <div class="input-group input-group-sm">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" class="form-control is-invalid setRp" id="jumlah_angsuran"
                            name="jumlah_angsuran" data-bs-toggle="tooltip" data-bs-placement="top"
                            data-bs-custom-class="custom-tooltip"
                            data-bs-title="Hanya berlaku untuk jenis bunga FLAT saja." required
                            value="{{ number_format($kredit?->persetujuan?->jumlah_angsuran, 0, ',', '.') ?? null }}">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <label class="notbold" for="denda_hari">Denda/Hari</label>
                </td>
                <td>
                    <div class="input-group input-group-sm">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" class="form-control is-invalid setRp" id="denda_hari"
                            name="denda_hari" required
                            value="{{ number_format($kredit?->persetujuan?->denda_hari, 0, ',', '.') ?? null }}">
                    </div>
                </td>
            </tr>
        </table>
    </div>
</div>
