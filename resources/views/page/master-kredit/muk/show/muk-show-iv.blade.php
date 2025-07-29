<div class="row">
    <div class="col-md-6">
        <table class="table table-striped table-sm w-100">
            @if ($muk->jns_kredit_muk == 'Berjangka')
                <tr>
                    <td style="width: 45%">Periode Usaha</td>
                    <td style="width: 2%">:</td>
                    <td>{{ $muk->keuanganBjk->bjk_periode_usaha }} Bulan</td>
                </tr>
            @endif

            <tr>
                <td style="width: 45%">
                    {{ $muk->jns_kredit_muk == 'Berjangka' ? 'Omset 1 Periode Usaha' : 'Pendapatan Usaha/Omset' }}
                </td>
                <td style="width: 2%">:</td>
                <td>
                    @if ($muk->jns_kredit_muk == 'Berjangka')
                        {{ 'Rp' . number_format($muk->keuanganBjk->bjk_omset, 0, ',', '.') }}
                    @else
                        {{ 'Rp' . number_format($muk->keuangan->omset_usaha, 0, ',', '.') }}
                    @endif
                </td>
            </tr>
            <tr>
                <td style="padding-left: 20px;">
                    {{ $muk->jns_kredit_muk == 'Berjangka' ? 'Pupuk' : 'Harga Pokok Penjualan' }}
                </td>
                <td>:</td>
                <td>
                    @if ($muk->jns_kredit_muk == 'Berjangka')
                        {{ 'Rp' . number_format($muk->keuanganBjk->bjk_pupuk, 0, ',', '.') }}
                    @else
                        {{ 'Rp' . number_format($muk->keuangan->omset_harga_pokok, 0, ',', '.') }}
                    @endif
                </td>
            </tr>
            <tr>
                <td style="padding-left: 20px;">
                    {{ $muk->jns_kredit_muk == 'Berjangka' ? 'Biaya Tenaga Kerja' : 'Sewa/Kontrak' }}
                </td>
                <td>:</td>
                <td>
                    @if ($muk->jns_kredit_muk == 'Berjangka')
                        {{ 'Rp' . number_format($muk->keuanganBjk->bjk_biaya_tenaga_kerja, 0, ',', '.') }}
                    @else
                        {{ 'Rp' . number_format($muk->keuangan->omset_sewa, 0, ',', '.') }}
                    @endif
                </td>
            </tr>
            <tr>
                <td style="padding-left: 20px;">
                    {{ $muk->jns_kredit_muk == 'Berjangka' ? 'Biaya Operasional' : 'Gaji Pegawai' }}
                </td>
                <td>:</td>
                <td>
                    @if ($muk->jns_kredit_muk == 'Berjangka')
                        {{ 'Rp' . number_format($muk->keuanganBjk->bjk_biaya_operasional, 0, ',', '.') }}
                    @else
                        {{ 'Rp' . number_format($muk->keuangan->omset_gaji_pegawai, 0, ',', '.') }}
                    @endif
                </td>
            </tr>
            <tr>
                <td style="padding-left: 20px;">
                    {{ $muk->jns_kredit_muk == 'Berjangka' ? 'Biaya Bahan Baku' : 'Telpon, Listrik & Air' }}
                </td>
                <td>:</td>
                <td>
                    @if ($muk->jns_kredit_muk == 'Berjangka')
                        {{ 'Rp' . number_format($muk->keuanganBjk->bjk_biaya_bahan_baku, 0, ',', '.') }}
                    @else
                        {{ 'Rp' . number_format($muk->keuangan->omset_listrik, 0, ',', '.') }}
                    @endif
                </td>
            </tr>
            <tr>
                <td style="padding-left: 20px;">
                    {{ $muk->jns_kredit_muk == 'Berjangka' ? 'Biaya Lainnya' : 'Transportasi' }}
                </td>
                <td>:</td>
                <td>
                    @if ($muk->jns_kredit_muk == 'Berjangka')
                        {{ 'Rp' . number_format($muk->keuanganBjk->bjk_biaya_lainnya, 0, ',', '.') }}
                    @else
                        {{ 'Rp' . number_format($muk->keuangan->omset_transportasi, 0, ',', '.') }}
                    @endif
                </td>
            </tr>
            @if ($muk->jns_kredit_muk == 'Angsuran')
                <tr>
                    <td style="padding-left: 20px;">Pengeluaran Lainnya</td>
                    <td>:</td>
                    <td>
                        {{ 'Rp' . number_format($muk->keuangan->omset_pengeluaran_lainnya, 0, ',', '.') }}
                    </td>
                </tr>
            @endif
            <tr>
                <td>
                    {{ $muk->jns_kredit_muk == 'Berjangka' ? 'Pengeluaran 1 Periode Usaha' : 'Pengeluaran Usaha' }}
                </td>
                <td>:</td>
                <td>
                    @if ($muk->jns_kredit_muk == 'Berjangka')
                        {{ 'Rp' . number_format($muk->keuanganBjk->bjk_pengeluaran_usaha, 0, ',', '.') }}
                    @else
                        {{ 'Rp' . number_format($muk->keuangan->pengeluaran_usaha, 0, ',', '.') }}
                    @endif
                </td>
            </tr>
            <tr>
                <td>
                    {{ $muk->jns_kredit_muk == 'Berjangka' ? 'Keuntungan 1 Periode Usaha' : 'Keuntungan Usaha' }}
                </td>
                <td>:</td>
                <td>
                    @if ($muk->jns_kredit_muk == 'Berjangka')
                        {{ 'Rp' . number_format($muk->keuanganBjk->bjk_keuntungan_usaha, 0, ',', '.') }}
                    @else
                        {{ 'Rp' . number_format($muk->keuangan->keuntungan_usaha, 0, ',', '.') }}
                    @endif
                </td>
            </tr>
            <tr>
                <td>
                    {{ $muk->jns_kredit_muk == 'Berjangka' ? 'Keuntungan per bulan' : 'Penghasilan Istri/Suami' }}
                </td>
                <td>:</td>
                <td>
                    @if ($muk->jns_kredit_muk == 'Berjangka')
                        {{ 'Rp' . number_format($muk->keuanganBjk->bjk_keuntungan_bulan, 0, ',', '.') }}
                    @else
                        {{ 'Rp' . number_format($muk->keuangan->penghasilan_deb, 0, ',', '.') }}
                    @endif
                </td>
            </tr>
            <tr>
                <td>
                    {{ $muk->jns_kredit_muk == 'Berjangka' ? 'Penghasilan Lainnya/bulan' : 'Penghasilan Lainnya' }}
                </td>
                <td>:</td>
                <td>
                    @if ($muk->jns_kredit_muk == 'Berjangka')
                        {{ 'Rp' . number_format($muk->keuanganBjk->bjk_penghasilan_lainnya, 0, ',', '.') }}
                    @else
                        {{ 'Rp' . number_format($muk->keuangan->penghasilan_lainnya, 0, ',', '.') }}
                    @endif
                </td>
            </tr>
            <tr>
                <td>
                    {{ $muk->jns_kredit_muk == 'Berjangka' ? 'Total Penghasilan/Bulan' : 'Total Penghasilan' }}
                </td>
                <td>:</td>
                <td>
                    @if ($muk->jns_kredit_muk == 'Berjangka')
                        {{ 'Rp' . number_format($muk->keuanganBjk->bjk_total_penghasilan, 0, ',', '.') }}
                    @else
                        {{ 'Rp' . number_format($muk->keuangan->total_penghasilan, 0, ',', '.') }}
                    @endif
                </td>
            </tr>
        </table>
    </div>

    <div class="col-md-6">
        <table class="table table-striped table-sm w-100">
            <tr>
                <td style="width: 45%; padding-left: 20px;">
                    Belanja Rumah Tangga
                </td>
                <td style="width: 2%">:</td>
                <td>
                    @if ($muk->jns_kredit_muk == 'Berjangka')
                        {{ 'Rp' . number_format($muk->keuanganBjk->bjk_belanja_rumah, 0, ',', '.') }}
                    @else
                        {{ 'Rp' . number_format($muk->keuangan->belanja_rt, 0, ',', '.') }}
                    @endif
                </td>
            </tr>
            <tr>
                <td style="padding-left: 20px;">
                    Sewa/Kontrak Rumah
                </td>
                <td>:</td>
                <td>
                    @if ($muk->jns_kredit_muk == 'Berjangka')
                        {{ 'Rp' . number_format($muk->keuanganBjk->bjk_sewa_rumah, 0, ',', '.') }}
                    @else
                        {{ 'Rp' . number_format($muk->keuangan->sewa_rumah, 0, ',', '.') }}
                    @endif
                </td>
            </tr>
            <tr>
                <td style="padding-left: 20px;">
                    Pendidikan
                </td>
                <td>:</td>
                <td>
                    @if ($muk->jns_kredit_muk == 'Berjangka')
                        {{ 'Rp' . number_format($muk->keuanganBjk->bjk_pendidikan, 0, ',', '.') }}
                    @else
                        {{ 'Rp' . number_format($muk->keuangan->pendidikan, 0, ',', '.') }}
                    @endif
                </td>
            </tr>
            <tr>
                <td style="padding-left: 20px;">
                    Telpon, Listrik & Air
                </td>
                <td>:</td>
                <td>
                    @if ($muk->jns_kredit_muk == 'Berjangka')
                        {{ 'Rp' . number_format($muk->keuanganBjk->bjk_listrik, 0, ',', '.') }}
                    @else
                        {{ 'Rp' . number_format($muk->keuangan->listrik, 0, ',', '.') }}
                    @endif
                </td>
            </tr>
            <tr>
                <td style="padding-left: 20px;">
                    Transportasi
                </td>
                <td>:</td>
                <td>
                    @if ($muk->jns_kredit_muk == 'Berjangka')
                        {{ 'Rp' . number_format($muk->keuanganBjk->bjk_transportasi, 0, ',', '.') }}
                    @else
                        {{ 'Rp' . number_format($muk->keuangan->transportasi, 0, ',', '.') }}
                    @endif
                </td>
            </tr>
            <tr>
                <td style="padding-left: 20px;">
                    Pengeluaran Lainnya
                </td>
                <td>:</td>
                <td>
                    @if ($muk->jns_kredit_muk == 'Berjangka')
                        {{ 'Rp' . number_format($muk->keuanganBjk->bjk_pengeluaran_lainnya, 0, ',', '.') }}
                    @else
                        {{ 'Rp' . number_format($muk->keuangan->pengeluaran_lainnya, 0, ',', '.') }}
                    @endif
                </td>
            </tr>
            <tr>
                <td>Total Pengeluaran</td>
                <td>:</td>
                <td>
                    @if ($muk->jns_kredit_muk == 'Berjangka')
                        {{ 'Rp' . number_format($muk->keuanganBjk->bjk_total_pengeluaran, 0, ',', '.') }}
                    @else
                        {{ 'Rp' . number_format($muk->keuangan->total_pengeluaran, 0, ',', '.') }}
                    @endif
                </td>
            </tr>
            <tr>
                <td>Sisa Penghasilan</td>
                <td>:</td>
                <td>
                    @if ($muk->jns_kredit_muk == 'Berjangka')
                        {{ 'Rp' . number_format($muk->keuanganBjk->bjk_sisa_penghasilan, 0, ',', '.') }}
                    @else
                        {{ 'Rp' . number_format($muk->keuangan->sisa_penghasilan, 0, ',', '.') }}
                    @endif
                </td>
            </tr>
            <tr>
                <td>Angsuran Pinjaman Saat Ini</td>
                <td>:</td>
                <td>
                    @if ($muk->jns_kredit_muk == 'Berjangka')
                        {{ 'Rp' . number_format($muk->keuanganBjk->bjk_angsuran_pinjaman, 0, ',', '.') }}
                    @else
                        {{ 'Rp' . number_format($muk->keuangan->keu_angsuran_pinjaman, 0, ',', '.') }}
                    @endif
                </td>
            </tr>
            <tr>
                <td>
                    {{ $muk->jns_kredit_muk == 'Berjangka' ? 'Kewajiban Bunga Perbulan' : 'Rekomendasi ASR Pinjaman' }}
                </td>
                <td>:</td>
                <td>
                    @if ($muk->jns_kredit_muk == 'Berjangka')
                        {{ 'Rp' . number_format($muk->keuanganBjk->bjk_kewajiban_bunga, 0, ',', '.') }}
                    @else
                        {{ 'Rp' . number_format($muk->keuangan->rekomendasi_asr, 0, ',', '.') }}
                    @endif
                </td>
            </tr>
            <tr>
                <td>
                    {{ $muk->jns_kredit_muk == 'Berjangka' ? 'Kewajiban pada Akhir Periode' : 'Disposable Income' }}
                </td>
                <td>:</td>
                <td>
                    @if ($muk->jns_kredit_muk == 'Berjangka')
                        {{ 'Rp' . number_format($muk->keuanganBjk->bjk_kewajiban_akhir, 0, ',', '.') }}
                    @else
                        {{ 'Rp' . number_format($muk->keuangan->dis_income, 0, ',', '.') }}
                    @endif
                </td>
            </tr>
            <tr>
                <td>
                    <strong>IDIR</strong> <span style="font-size: 10px;">(kewajiban bunga)</span>
                </td>
                <td>:</td>
                <td>
                    @if ($muk->jns_kredit_muk == 'Berjangka')
                        {{ 'Rp' . number_format($muk->keuanganBjk->bjk_idir, 0, ',', '.') }}
                    @else
                        {{ 'Rp' . number_format($muk->keuangan->idir, 0, ',', '.') }}
                    @endif
                </td>
            </tr>
        </table>
    </div>


    @if ($muk->jns_kredit_muk == 'Berjangka')
        <div class="clearfix"></div>
        <div class="col-md-12">
            <strong>Sumber Pengembalian Pinjaman</strong>
            <table class="table table-striped table-sm w-100">
                <tr>
                    <td style="width: 30%">
                        {{ $muk->keuanganBjk->sumber_pengembalian }}
                    </td>
                    <td colspan="2">
                        {{ 'Rp' . number_format($muk->keuanganBjk->nominal, 0, ',', '.') }}
                    </td>
                </tr>
                <tr>
                    <td colspan="3" class="p-2">
                        {!! $muk->keuanganBjk->keterangan !!} <br>
                    </td>
                </tr>
                <tr>
                    <td>
                        Selisih Penghasilan dengan Total Angsuran :
                    </td>
                    <td style="width: 25%">
                        {{ 'Rp' . number_format($muk->keuanganBjk->selisih_penghasilan, 0, ',', '.') }}
                    </td>
                    <td>
                        {{ $muk->keuanganBjk->selisih_persen }}%
                    </td>
                </tr>
            </table>
        </div>
    @endif
</div>
