<div class="row">
    <div class="col-md-6">
        <table class="table table-sm w-100">
            <tr>
                <td style="width: 45%">Plafond kredit yang dimohon</td>
                <td style="width: 2%">:</td>
                <td>{{ 'Rp' . number_format($muk->kredit->jumlah_pengajuan, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td>Terbilang</td>
                <td>:</td>
                <td>
                    <i>({{ ucwords(terbilang_id($muk->kredit->jumlah_pengajuan)) }})</i>
                </td>
            </tr>
            <tr>
                <td>Jangka waktu</td>
                <td>:</td>
                <td>
                    {{ $muk->kredit->jkw_pengajuan }} Bulan
                </td>
            </tr>
        </table>
    </div>
    <div class="col-md-6">
        <table class="table table-sm w-100">
            <tr>
                <td style="width: 40%">Tujuan Permohonan</td>
                <td style="width: 2%">:</td>
                <td>{{ $muk->kredit->tujuan_pengajuan }}</td>
            </tr>
            <tr>
                <td>Jelaskan</td>
                <td>:</td>
                <td>{!! $muk->kredit->alasan_tujuan !!}</td>
            </tr>
            <tr>
                <td>Permohonan</td>
                <td>:</td>
                <td>
                    {{ $muk->kredit->kategori_spk }}
                    {{ $muk->kredit->jns_kategori_spk == '-' ? '' : $muk->kredit->jns_kategori_spk }}
                </td>
            </tr>
        </table>
    </div>
</div>
