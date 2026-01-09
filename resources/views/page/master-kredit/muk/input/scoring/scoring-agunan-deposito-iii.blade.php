<div class="col-md-12">
    <table class="table table-striped table-sm w-100">
        <tr>
            <td>
                <label class="notbold" for="market_depo_{{ $loop->iteration }}">Marketability</label>
            </td>
            <td>
                <input type="text" name="market_depo_{{ $loop->iteration }}" id="market_depo_{{ $loop->iteration }}"
                    class="form-control form-control-sm" required
                    value="{{ data_get($depo, "$vanalisTab.market") ?? (data_get($depo, "$vanalisDepo.market") ?? (data_get($depo, "$vcabTab.market") ?? data_get($depo, "$vcabDepo.market"))) }}">
            <td>
                <label class="notbold" for="permasalahan_depo_{{ $loop->iteration }}">Permasalahan</label>
            </td>
            <td>
                <input type="text" name="permasalahan_depo_{{ $loop->iteration }}"
                    id="permasalahan_depo_{{ $loop->iteration }}" class="form-control form-control-sm" required
                    value="{{ data_get($depo, "$vanalisTab.permasalahan") ?? (data_get($depo, "$vanalisDepo.permasalahan") ?? (data_get($depo, "$vcabTab.permasalahan") ?? data_get($depo, "$vcabDepo.permasalahan"))) }}">
            </td>
        </tr>
        <tr>
            <td>
                <label class="notbold" for="jns_pengikatan_depo_{{ $loop->iteration }}">Jenis Pengikatan</label>
            </td>
            <td>
                <input type="text" name="jns_pengikatan_depo_{{ $loop->iteration }}"
                    id="jns_pengikatan_depo_{{ $loop->iteration }}" class="form-control form-control-sm" required
                    value="{{ data_get($depo, "$vanalisTab.jns_pengikatan") ?? (data_get($depo, "$vanalisDepo.jns_pengikatan") ?? (data_get($depo, "$vcabTab.jns_pengikatan") ?? data_get($depo, "$vcabDepo.jns_pengikatan"))) }}">
            </td>
            <td>
                <label class="notbold" for="penguasaan_depo_{{ $loop->iteration }}">Penguasaan</label>
            </td>
            <td>
                <input type="text" name="penguasaan_depo_{{ $loop->iteration }}"
                    id="penguasaan_depo_{{ $loop->iteration }}" class="form-control form-control-sm" required
                    value="{{ data_get($depo, "$vanalisTab.penguasaan") ?? (data_get($depo, "$vanalisDepo.penguasaan") ?? (data_get($depo, "$vcabTab.penguasaan") ?? data_get($depo, "$vcabDepo.penguasaan"))) }}">
            </td>
        </tr>
        <tr>
            <td>
                <label class="notbold" for="lainnya_depo_{{ $loop->iteration }}">Lain-Lain</label>
            </td>
            <td colspan="3">
                <textarea name="lainnya_depo_{{ $loop->iteration }}" id="lainnya_depo_{{ $loop->iteration }}" cols="30"
                    rows="2" class="form-control" required>{{ data_get($depo, "$vanalisTab.lainnya") ?? (data_get($depo, "$vanalisDepo.lainnya") ?? (data_get($depo, "$vcabTab.lainnya") ?? data_get($depo, "$vcabDepo.lainnya"))) }}</textarea>
            </td>
        </tr>

    </table>
</div>
