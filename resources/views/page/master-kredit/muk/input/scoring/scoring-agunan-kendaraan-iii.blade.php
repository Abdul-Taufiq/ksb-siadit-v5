<div class="col-md-6 mb-3">
    <div class="form-group">
        <label for="tujuan_penilaian_{{ $loop->iteration }}">Tujuan Penilaian</label>
        <input type="text" name="tujuan_penilaian_{{ $loop->iteration }}" id="tujuan_penilaian_{{ $loop->iteration }}"
            class="form-control form-control-sm"
            value="{{ $kenda->sc_kenda_agunan?->tujuan_penilaian ?? 'Permohonan Baru' }}">
    </div>
</div>

<div class="col-md-12" style="margin-left: 10px;">
    <table class="table table-striped table-sm w-100">
        <thead>
            <tr>
                <th>Informasi Harga Pasar</th>
                <th>Harga</th>
                <th>Nama/Instansi</th>
                <th>Alamat/Nomor Telepon</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Data I (Terendah)</td>
                <td>
                    <div class="input-group input-group-sm">
                        <span class="input-group-text">Rp</span>
                        <input type="text" name="d1_harga_{{ $loop->iteration }}"
                            id="d1_harga_{{ $loop->iteration }}" class="form-control form-control-sm setRp" required
                            value="{{ number_format($kenda->sc_kenda_agunan?->d1_harga, 0, ',', '.') }}">
                    </div>
                </td>
                <td>
                    <input type="text" name="d1_instansi_{{ $loop->iteration }}"
                        id="d1_instansi_{{ $loop->iteration }}" class="form-control form-control-sm" required
                        value="{{ $kenda->sc_kenda_agunan?->d1_instansi }}">
                </td>
                <td>
                    <input type="text" name="d1_alamat_{{ $loop->iteration }}"
                        id="d1_alamat_{{ $loop->iteration }}" class="form-control form-control-sm" required
                        value="{{ $kenda->sc_kenda_agunan?->d1_alamat }}">
                </td>
                <td>
                    <input type="date" name="d1_tgl_{{ $loop->iteration }}" id="d1_tgl_{{ $loop->iteration }}"
                        class="form-control form-control-sm" required
                        value="{{ $kenda->sc_kenda_agunan?->d1_tgl?->format('Y-m-d') }}">
                </td>
            </tr>
            <tr>
                <td>Data II (Medium)</td>
                <td>
                    <div class="input-group input-group-sm">
                        <span class="input-group-text">Rp</span>
                        <input type="text" name="d2_harga_{{ $loop->iteration }}"
                            id="d2_harga_{{ $loop->iteration }}" class="form-control form-control-sm setRp"
                            min="0"
                            value="{{ number_format($kenda->sc_kenda_agunan?->d2_harga, 0, ',', '.') }}">
                    </div>
                </td>
                <td>
                    <input type="text" name="d2_instansi_{{ $loop->iteration }}"
                        id="d2_instansi_{{ $loop->iteration }}" class="form-control form-control-sm" required
                        value="{{ $kenda->sc_kenda_agunan?->d2_instansi }}">
                </td>
                <td>
                    <input type="text" name="d2_alamat_{{ $loop->iteration }}"
                        id="d2_alamat_{{ $loop->iteration }}" class="form-control form-control-sm" required
                        value="{{ $kenda->sc_kenda_agunan?->d2_alamat }}">
                </td>
                <td>
                    <input type="date" name="d2_tgl_{{ $loop->iteration }}" id="d2_tgl_{{ $loop->iteration }}"
                        class="form-control form-control-sm" required
                        value="{{ $kenda->sc_kenda_agunan?->d2_tgl?->format('Y-m-d') }}">
                </td>
            </tr>
            <tr>
                <td>Data III (Tertinggi)</td>
                <td>
                    <div class="input-group input-group-sm">
                        <span class="input-group-text">Rp</span>
                        <input type="text" name="d3_harga_{{ $loop->iteration }}"
                            id="d3_harga_{{ $loop->iteration }}" class="form-control form-control-sm setRp"
                            value="{{ number_format($kenda->sc_kenda_agunan?->d3_harga, 0, ',', '.') }}">
                    </div>
                </td>
                <td>
                    <input type="text" name="d3_instansi_{{ $loop->iteration }}"
                        id="d3_instansi_{{ $loop->iteration }}" class="form-control form-control-sm" required
                        value="{{ $kenda->sc_kenda_agunan?->d3_instansi }}">
                </td>
                <td>
                    <input type="text" name="d3_alamat_{{ $loop->iteration }}"
                        id="d3_alamat_{{ $loop->iteration }}" class="form-control form-control-sm" required
                        value="{{ $kenda->sc_kenda_agunan?->d3_alamat }}">
                </td>
                <td>
                    <input type="date" name="d3_tgl_{{ $loop->iteration }}" id="d3_tgl_{{ $loop->iteration }}"
                        class="form-control form-control-sm" required
                        value="{{ $kenda->sc_kenda_agunan?->d3_tgl?->format('Y-m-d') }}">
                </td>
            </tr>
        </tbody>
    </table>
</div>

<div class="col-md-12" style="margin-left: 20px;">
    <table class="table table-striped table-sm w-100">
        <tr>
            <td>
                <label class="notbold" for="harga_pasar_keseluruhan_{{ $loop->iteration }}">Harga Pasar
                    Keseluruhan</label>
            </td>
            <td>
                <div class="input-group input-group-sm">
                    <span class="input-group-text">Rp</span>
                    <input type="text" name="harga_pasar_keseluruhan_{{ $loop->iteration }}"
                        id="harga_pasar_keseluruhan_{{ $loop->iteration }}" class="form-control form-control-sm setRp"
                        required data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                        data-bs-title="Jika ada perubahan pada SAFETY MARGIN Mohon untuk update nilai ini agar Sinkron"
                        value="{{ number_format($kenda->sc_kenda_agunan?->harga_pasar_keseluruhan, 0, ',', '.') }}">
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <label class="notbold" for="safety_margin_kenda_{{ $loop->iteration }}">Safety Margin</label>
            </td>
            <td>
                <div class="input-group input-group-sm">
                    <input type="number" name="safety_margin_kenda_{{ $loop->iteration }}"
                        id="safety_margin_kenda_{{ $loop->iteration }}" class="form-control form-control-sm"
                        min="0"
                        value="{{ number_format($kenda->sc_kenda_agunan?->safety_margin, 0, ',', '.') ?? '50' }}">
                    <span class="input-group-text">%</span>
                </div>
            </td>
            <td>
                <label for="score_kenda_{{ $loop->iteration }}">Score</label>
            </td>
            <td>
                <input type="number" name="score_kenda_{{ $loop->iteration }}"
                    id="score_kenda_{{ $loop->iteration }}" class="form-control form-control-sm" min="0"
                    value="{{ number_format($kenda->sc_kenda_agunan?->score, 0, ',', '.') }}">
            </td>
        </tr>
        <tr>
            <td>
                <label class="notbold" for="harga_pasar_diterima_{{ $loop->iteration }}">Harga Pasar Yang Dapat
                    Diterima</label>
            </td>
            <td>
                <div class="input-group input-group-sm">
                    <span class="input-group-text">Rp</span>
                    <input type="text" name="harga_pasar_diterima_{{ $loop->iteration }}"
                        id="harga_pasar_diterima_{{ $loop->iteration }}" class="form-control form-control-sm setRp"
                        readonly
                        value="{{ number_format($kenda->sc_kenda_agunan?->harga_pasar_diterima, 0, ',', '.') }}">
                </div>
            </td>
        </tr>
    </table>
</div>
