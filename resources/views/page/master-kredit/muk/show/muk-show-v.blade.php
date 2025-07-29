<div class="row">
    <div class="col-md-6">
        <table class="table table-striped table-sm w-100">
            <tr>
                <td style="width: 45%">Persediaan Barang/Inventory</td>
                <td style="width: 1%">:</td>
                <td>
                    {{ 'Rp' . number_format($muk->working->inventory, 0, ',', '.') }}
                </td>
            </tr>
            <tr>
                <td>Piutang Usaha</td>
                <td>:</td>
                <td>
                    {{ 'Rp' . number_format($muk->working->piutang_usaha, 0, ',', '.') }}
                </td>
            </tr>
            <tr>
                <td>Utang Usaha</td>
                <td>:</td>
                <td>
                    {{ 'Rp' . number_format($muk->working->utang_usaha, 0, ',', '.') }}
                </td>
            </tr>
            <tr>
                <td>Working Investment/KMK</td>
                <td>:</td>
                <td>
                    {{ 'Rp' . number_format($muk->working->kmk, 0, ',', '.') }}
                </td>
            </tr>
        </table>
    </div>

    <div class="col-md-6">
        <table class="table table-striped table-sm w-100">
            <tr>
                <td style="width: 10%">DOH</td>
                <td style="width: 1%">:</td>
                <td>
                    {{ $muk->working->doh_1 }}
                </td>
            </tr>
            <tr>
                <td>DOH</td>
                <td>:</td>
                <td>
                    {{ $muk->working->doh_2 }}
                </td>
            </tr>
            <tr>
                <td>DOH</td>
                <td>:</td>
                <td>
                    {{ $muk->working->doh_3 }}
                </td>
            </tr>
        </table>
    </div>
</div>
