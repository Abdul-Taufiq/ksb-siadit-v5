<table class="table table-striped table-sm w-100 table-bordered">
    <thead>
        <tr>
            <th style="width: 10%">Jenis Agunan</th>
            <th style="width: 15%">Nomor Agunan</th>
            <th style="width: 20%">Nilai Pasar (Rp)</th>
            <th style="width: 20%">Nilai Taksasi (Rp)</th>
            <th style="width: 35%">Keterangan</th>
        </tr>
    </thead>
    <tbody>
        {{-- Jam Tanah --}}
        @foreach ($jamTanah as $tanah)
            <tr>
                <td>{{ $tanah->detail_kategori_jaminan }}</td>
                <td>{{ $tanah->no_shm_shgb }}</td>
                <td>
                    {{ 'Rp' . number_format($tanah->nilai_jaminan, 0, ',', '.') }}
                </td>
                <td>
                    {{ 'Rp' . number_format($tanah->nilai_taksasi, 0, ',', '.') }}
                </td>
                <td>
                    Ds. {{ $tanah->desa }}, Kec. {{ $tanah->kecamatan }}, Kab/Kota. {{ $tanah->kabupaten }}
                </td>
            </tr>
        @endforeach

        {{-- jam Kenda --}}
        @foreach ($jamKenda as $kenda)
            <tr>
                <td>Fidusia</td>
                <td>{{ $kenda->no_bpkb }}</td>
                <td>
                    {{ 'Rp' . number_format($kenda->nilai_jaminan, 0, ',', '.') }}
                </td>
                <td>
                    {{ 'Rp' . number_format($kenda->nilai_taksasi, 0, ',', '.') }}
                </td>
                <td>
                    Jns: {{ $kenda->jns_kendaraan }}, Merk: {{ $kenda->merk }}, Type: {{ $kenda->type }}, Warna:
                    {{ $kenda->warna }}
                </td>
            </tr>
        @endforeach

        {{-- jam Depo --}}
        @foreach ($jamDepo as $depo)
            <tr>
                <td>{{ $depo->jns_jaminan }}</td>
                <td>{{ $depo->no_rek }}</td>
                <td>
                    {{ 'Rp' . number_format($depo->nilai_jaminan, 0, ',', '.') }}
                </td>
                <td>
                    {{ 'Rp' . number_format($depo->nilai_taksasi, 0, ',', '.') }}
                </td>
                <td>
                    Nama Pemilik: {{ $depo->atas_nama }}, Nominal:
                    {{ 'Rp' . number_format($depo->nominal, 0, ',', '.') }}
                </td>
            </tr>
        @endforeach

        <tr>
            <td colspan="2">&nbsp;</td>
            <td>
                {{ 'Rp' .
                    number_format(
                        $jamTanah->sum('nilai_jaminan') + $jamKenda->sum('nilai_jaminan') + $jamDepo->sum('nilai_jaminan'),
                        0,
                        ',',
                        '.',
                    ) }}
            </td>
            <td>
                {{ 'Rp' .
                    number_format(
                        $jamTanah->sum('nilai_taksasi') + $jamKenda->sum('nilai_taksasi') + $jamDepo->sum('nilai_taksasi'),
                        0,
                        ',',
                        '.',
                    ) }}
            </td>
            <td>&nbsp;</td>
        </tr>
    </tbody>

</table>
