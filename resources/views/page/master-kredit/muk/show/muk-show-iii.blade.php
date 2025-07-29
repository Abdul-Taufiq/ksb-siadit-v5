<table class="table table-sm table-striped w-100"
    style="font-size: {{ strpos(url()->current(), 'print') !== false ? '7pt' : '9pt' }}">
    <thead>
        <tr>
            <th style="width: 2%">#</th>
            <th style="width: 6%">Bank</th>
            <th>Plafond</th>
            <th>Baki Debet</th>
            <th style="width: 6%">Rate</th>
            <th>Angsuran</th>
            <th style="width: 4%">Kol</th>
            <th style="width: 5%">DPD</th>
            <th style="width: 7%">Tujuan</th>
            <th style="width: 9%">Tgl Awal</th>
            <th style="width: 9%">Tgl Akhir</th>
            <th style="width: 7%">Restruck</th>
            <th style="width: 10%">Alasan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($slik as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama_bank }}</td>
                <td>{{ $item->plafond == null ? 'Rp0' : 'Rp' . number_format($item->plafond, 0, ',', '.') }}</td>
                <td>{{ $item->baki_debet == null ? 'Rp0' : 'Rp' . number_format($item->baki_debet, 0, ',', '.') }}</td>
                <td>{{ $item->rate }}%</td>
                <td>{{ $item->angsuran == null ? 'Rp0' : 'Rp' . number_format($item->angsuran, 0, ',', '.') }}</td>
                <td>{{ $item->kol }}</td>
                <td>{{ $item->dpd }}</td>
                <td>{{ $item->tujuan_kredit }}</td>
                <td>{{ $item->tgl_awal ? $item->tgl_awal->translatedFormat('d M Y') : '' }}</td>
                <td>{{ $item->tgl_akhir ? $item->tgl_akhir->translatedFormat('d M Y') : '' }}</td>
                <td>{{ $item->pernah_restruck }}</td>
                <td>{{ $item->alasan_restruck }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<table class="table table-sm w-100">
    <tr>
        <th style="width: 20%">TOTAL PLAFOND</th>
        <td style="width: 1%;">:</td>
        <td>
            {{ 'Rp' . number_format($slik->sum('plafond'), 0, ',', '.') }}
        </td>
    </tr>
    <tr>
        <th style="width: 20%">TOTAL BAKI DEBET</th>
        <td style="width: 1%;">:</td>
        <td>
            {{ 'Rp' . number_format($slik->sum('baki_debet'), 0, ',', '.') }}
        </td>
    </tr>
    <tr>
        <th style="width: 20%">TOTAL ANGSURAN</th>
        <td style="width: 1%;">:</td>
        <td>
            {{ 'Rp' . number_format($slik->sum('angsuran'), 0, ',', '.') }}
        </td>
    </tr>
</table>
