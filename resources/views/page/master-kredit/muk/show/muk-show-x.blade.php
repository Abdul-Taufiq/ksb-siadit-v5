<p class="mb-1">
    Dari hasil analisa yang telah dilakukan, maka dapat diusulkan bahwa pengajuan kredit diatas dapat disetujui dengan
    pertimbanagan sebagai berikut:
</p>
<div class="mx-2 mb-2" style="font-weight: bold; font-size: 9pt;">
    {!! $muk->kredit->persetujuan->pertimbangan !!}
</div>

<p>
    Kondisi dan persyaratan yang diajukan:
</p>

<table class="table table-striped table-sm w-100">
    <tr>
        <td style="width: 20%">Jenis Kredit</td>
        <td style="width: 1%">:</td>
        <td>
            {{ $muk->kredit->persetujuan->jns_kredit }}
        </td>
    </tr>
    <tr>
        <td>Plafond</td>
        <td>:</td>
        <td>
            {{ 'Rp' . number_format($muk->kredit->jumlah_disetujui, 0, ',', '.') }}
            <i>( {{ terbilang_id($muk->kredit->jumlah_disetujui) }} )</i>
        </td>
    </tr>
    <tr>
        <td>Putusan</td>
        <td>:</td>
        <td>
            {{ $muk->kredit->persetujuan->putusan }}
        </td>
    </tr>
    <tr>
        <td>Jangka Waktu</td>
        <td>:</td>
        <td>
            {{ $muk->kredit->jkw }} Bulan
        </td>
    </tr>
    <tr>
        <td>Suku Bunga</td>
        <td>:</td>
        <td>
            {{ $muk->kredit->persetujuan->besar_bunga }}% / Tahun
        </td>
    </tr>
    <tr>
        <td>Provisi</td>
        <td>:</td>
        <td>
            {{ $muk->kredit->persetujuan->provisi }}%
            {{ 'Rp' . number_format($muk->kredit->persetujuan->jumlah_provisi, 0, ',', '.') }}
        </td>
    </tr>
    <tr>
        <td>Administrasi</td>
        <td>:</td>
        <td>
            {{ $muk->kredit->persetujuan->besar_adm }}%
            {{ 'Rp' . number_format($muk->kredit->persetujuan->biaya_adm, 0, ',', '.') }}
        </td>
    </tr>
    <tr>
        <td>Survey</td>
        <td>:</td>
        <td>
            {{ $muk->kredit->persetujuan->besar_survey }}%
            {{ 'Rp' . number_format($muk->kredit->persetujuan->biaya_survey, 0, ',', '.') }}
        </td>
    </tr>
    <tr>
        <td>Angsuran/bul</td>
        <td>:</td>
        <td>
            {{ 'Rp' . number_format($muk->kredit->persetujuan->jumlah_angsuran, 0, ',', '.') }}
        </td>
    </tr>
    <tr>
        <td>Denda/hari</td>
        <td>:</td>
        <td>
            {{ 'Rp' . number_format($muk->kredit->persetujuan->denda_hari, 0, ',', '.') }}
        </td>
    </tr>
    <tr>
        <td>Agunan</td>
        <td>:</td>
        <td>
            {{-- Jam Tanah --}}
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th style="width: 5%">#</th>
                        <th style="width: 50%">Jenis Agunan</th>
                        <th style="width: 45%;">Nomor Agunan</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($jamTanah as $tanah)
                        <tr>
                            <td>
                                {{ $i }}
                                @php $i++; @endphp
                            </td>
                            <td>{{ $tanah->detail_kategori_jaminan }} - {{ $tanah->keterangan }}</td>
                            <td>{{ $tanah->no_shm_shgb }}</td>
                        </tr>
                    @endforeach

                    {{-- jam Kenda --}}
                    @foreach ($jamKenda as $kenda)
                        <tr>
                            <td>
                                {{ $i }}
                                @php $i++; @endphp
                            </td>
                            <td>Fidusia</td>
                            <td>{{ $kenda->no_bpkb }}</td>
                        </tr>
                    @endforeach

                    {{-- jam Depo --}}
                    @foreach ($jamDepo as $depo)
                        <tr>
                            <td>
                                {{ $i }}
                                @php $i++; @endphp
                            </td>
                            <td>{{ $depo->jns_jaminan }}</td>
                            <td>{{ $depo->no_rek }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </td>
    </tr>
    <tr>
        <td>Nilai Pasar</td>
        <td>:</td>
        <td>
            {{ 'Rp' .
                number_format(
                    $jamTanah->sum('nilai_jaminan') + $jamKenda->sum('nilai_jaminan') + $jamDepo->sum('nilai_jaminan'),
                    0,
                    ',',
                    '.',
                ) }}
        </td>
    </tr>
    <tr>
        <td>Nilai Taksasi</td>
        <td>:</td>
        <td>
            {{ 'Rp' .
                number_format(
                    $jamTanah->sum('nilai_taksasi') + $jamKenda->sum('nilai_taksasi') + $jamDepo->sum('nilai_taksasi'),
                    0,
                    ',',
                    '.',
                ) }}
        </td>
    </tr>

</table>
