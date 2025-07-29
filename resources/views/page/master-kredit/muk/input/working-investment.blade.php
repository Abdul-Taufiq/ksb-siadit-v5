<div class="row" style="margin-left: 5px;">
    <div class="col-md-6">
        <table class="table table-striped table-sm w-100">
            <tr>
                <td style="width: 50%">
                    <label for="inventory" class="notbold">Persediaan Barang/Inventory</label>
                </td>
                <td>
                    <div class="input-group input-group-sm">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" class="form-control is-invalid setRp" id="inventory" name="inventory"
                            data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                            data-bs-title="Mohon Update Nilai Ini Jika Anda mengubah Tujuan Kredit/Total BD diatas (REKAP SLIK) Agar nilai bisa SINKRON"
                            value="{{ number_format($muk?->working?->inventory, 0, ',', '.') ?? null }}">
                    </div>
                </td>
            </tr>
            <tr>
                <td style="width: 50%">
                    <label for="piutang_usaha" class="notbold">Piutang Usaha</label>
                </td>
                <td>
                    <div class="input-group input-group-sm">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" class="form-control is-invalid setRp" id="piutang_usaha"
                            name="piutang_usaha" data-bs-toggle="tooltip" data-bs-placement="top"
                            data-bs-custom-class="custom-tooltip"
                            data-bs-title="Mohon Update Nilai Ini Jika Anda mengubah Tujuan Kredit/Total BD diatas (REKAP SLIK) Agar nilai bisa SINKRON"
                            value="{{ number_format($muk?->working?->piutang_usaha, 0, ',', '.') ?? null }}">
                    </div>
                </td>
            </tr>
            <tr>
                <td style="width: 50%">
                    <label for="utang_usaha" class="notbold">Utang Usaha</label>
                </td>
                <td>
                    <div class="input-group input-group-sm">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" class="form-control is-invalid setRp" id="utang_usaha" name="utang_usaha"
                            data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                            data-bs-title="Mohon Update Nilai Ini Jika Anda mengubah Tujuan Kredit/Total BD diatas (REKAP SLIK) Agar nilai bisa SINKRON"
                            value="{{ number_format($muk?->working?->utang_usaha, 0, ',', '.') ?? null }}">
                    </div>
                </td>
            </tr>
            <tr>
                <td style="width: 50%">
                    <label for="kmk" class="notbold">Working Investment/KMK</label>
                </td>
                <td>
                    <div class="input-group input-group-sm">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" class="form-control is-invalid setRp" id="kmk" name="kmk"
                            readonly value="{{ number_format($muk?->working?->kmk, 0, ',', '.') ?? null }}">
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div class="col-md-6">
        <table class="table table-striped table-sm w-100">
            <tr>
                <td style="width: 20%">
                    <label for="doh_1" class="notbold">DOH</label>
                </td>
                <td>
                    <div class="form-group">
                        <input type="text" name="doh_1" id="doh_1"
                            class="form-control form-control-sm is-invalid" readonly
                            value="{{ number_format($muk?->working?->doh_1, 0, ',', '.') }}">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="doh_2" class="notbold">DOH</label>
                </td>
                <td>
                    <div class="form-group">
                        <input type="text" name="doh_2" id="doh_2"
                            class="form-control form-control-sm is-invalid" readonly
                            value="{{ number_format($muk?->working?->doh_2, 0, ',', '.') }}">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="doh_3" class="notbold">DOH</label>
                </td>
                <td>
                    <div class="form-group">
                        <input type="text" name="doh_3" id="doh_3"
                            class="form-control form-control-sm is-invalid" readonly
                            value="{{ number_format($muk?->working?->doh_3, 0, ',', '.') }}">
                    </div>
                </td>
            </tr>
        </table>
    </div>
</div>
