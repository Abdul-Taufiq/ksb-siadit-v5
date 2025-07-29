<div class="col-md-12">
    <table class="table table-striped table-sm w-100">
        <tr>
            <td>
                <label class="notbold" for="market_depo_{{ $loop->iteration }}">Marketability</label>
            </td>
            <td>
                <input type="text" name="market_depo_{{ $loop->iteration }}" id="market_depo_{{ $loop->iteration }}"
                    class="form-control form-control-sm" required
                    value="{{ $depo->sc_tabungan?->market ?? $depo->sc_depo?->market }}">
            <td>
                <label class="notbold" for="permasalahan_depo_{{ $loop->iteration }}">Permasalahan</label>
            </td>
            <td>
                <input type="text" name="permasalahan_depo_{{ $loop->iteration }}"
                    id="permasalahan_depo_{{ $loop->iteration }}" class="form-control form-control-sm" required
                    value="{{ $depo->sc_tabungan?->permasalahan ?? $depo->sc_depo?->permasalahan }}">
            </td>
        </tr>
        <tr>
            <td>
                <label class="notbold" for="jns_pengikatan_depo_{{ $loop->iteration }}">Jenis Pengikatan</label>
            </td>
            <td>
                <input type="text" name="jns_pengikatan_depo_{{ $loop->iteration }}"
                    id="jns_pengikatan_depo_{{ $loop->iteration }}" class="form-control form-control-sm" required
                    value="{{ $depo->sc_tabungan?->jns_pengikatan ?? $depo->sc_depo?->jns_pengikatan }}">
            </td>
            <td>
                <label class="notbold" for="penguasaan_depo_{{ $loop->iteration }}">Penguasaan</label>
            </td>
            <td>
                <input type="text" name="penguasaan_depo_{{ $loop->iteration }}"
                    id="penguasaan_depo_{{ $loop->iteration }}" class="form-control form-control-sm" required
                    value="{{ $depo->sc_tabungan?->penguasaan ?? $depo->sc_depo?->penguasaan }}">
            </td>
        </tr>
        <tr>
            <td>
                <label class="notbold" for="lainnya_depo_{{ $loop->iteration }}">Lain-Lain</label>
            </td>
            <td colspan="3">
                <textarea name="lainnya_depo_{{ $loop->iteration }}" id="lainnya_depo_{{ $loop->iteration }}" cols="30"
                    rows="2" class="form-control" required>{{ $depo->sc_tabungan?->lainnya ?? $depo->sc_depo?->lainnya }}</textarea>
            </td>
        </tr>

    </table>
</div>
