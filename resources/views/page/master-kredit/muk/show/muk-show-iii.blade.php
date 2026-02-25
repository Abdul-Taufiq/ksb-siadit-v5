<table class="table table-sm table-striped w-100"
    style="font-size: {{ strpos(url()->current(), 'print') !== false ? '7pt' : '9pt' }}">
    <thead>
        <tr>
            <th style="width: 5%">#</th>
            <th style="width: 20%">Bank</th>
            <th style="width: 20%">Data Kredit</th>
            <th style="width: 20%">Detail Kredit</th>
            <th style="width: 15%">Periode</th>
            <th style="width: 20%">Restruck|Alasan</th>
        </tr>
    </thead>
    <tbody>
        @if ($slik->isNotEmpty())
            @foreach ($slik as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_bank }}</td>
                    <td>
                        <span style="font-weight: bold">Plafond: </span>
                        {{ $item->plafond == null ? 'Rp0' : 'Rp' . number_format($item->plafond, 0, ',', '.') }}
                        <br>
                        <span style="font-weight: bold">BD: </span>
                        {{ $item->baki_debet == null ? 'Rp0' : 'Rp' . number_format($item->baki_debet, 0, ',', '.') }}
                        <br>
                        <span style="font-weight: bold">Rate: </span> {{ $item->rate }}% <br>
                    </td>

                    <td>
                        <span style="font-weight: bold">Angsuran: </span>
                        {{ $item->angsuran == null ? 'Rp0' : 'Rp' . number_format($item->angsuran, 0, ',', '.') }} <br>
                        <span style="font-weight: bold">Kol | DPD: </span> {{ $item->kol }} | {{ $item->dpd }}
                        <br>
                        <span style="font-weight: bold">Tujuan: </span> {{ $item->tujuan_kredit }}
                    </td>
                    <td>
                        <span style="font-weight: bold">Awal:
                        </span>{{ $item->tgl_awal ? $item->tgl_awal->translatedFormat('d M Y') : '' }}
                        <br>
                        <span style="font-weight: bold">Akhir: </span>
                        {{ $item->tgl_akhir ? $item->tgl_akhir->translatedFormat('d M Y') : '' }}
                    </td>
                    <td>
                        {{ $item->pernah_restruck }} <br>
                        <span style="font-weight: bold">Alasan: </span> {{ $item->alasan_restruck }}
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="13" style="text-align: center"><i>Tidak Ada Data</i></td>
            </tr>
        @endif
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
