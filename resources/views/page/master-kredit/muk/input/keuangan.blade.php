<div class="form-group mb-2">
    <label for="jns_kredit">Jenis Kredit</label>
    <select name="jns_kredit" id="jns_kredit" class="form-select is-invalid" required>
        <option selected disabled>-Pilih-</option>
        <option {{ $muk?->jns_kredit_muk == 'Angsuran' ? 'selected' : '' }} value="Angsuran">Angsuran</option>
        <option {{ $muk?->jns_kredit_muk == 'Berjangka' ? 'selected' : '' }} value="Berjangka">Berjangka</option>
    </select>
</div>
<hr>

{{-- angsuran --}}
<div class="row {{ $muk?->jns_kredit_muk == 'Angsuran' ? '' : 'd-none' }}" id="keuangan_angsuran"
    style="margin-left: 5px;">
    <div class="col-md-6">
        <table class="table table-striped table-sm w-100">
            <tr>
                <td style="width: 50%;">
                    <label for="omset_usaha" class="notbold">Pendapatan Usaha/Omset</label>
                </td>
                <td>
                    <div class="input-group input-group-sm">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" class="form-control is-invalid setRp" id="omset_usaha" name="omset_usaha"
                            value="{{ number_format($muk?->keuangan?->omset_usaha, 0, ',', '.') ?? '' }}">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="omset_harga_pokok" class="notbold">&nbsp; Harga Pokok Penjualan</label>
                </td>
                <td>
                    <div class="input-group input-group-sm">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" class="form-control is-invalid setRp" id="omset_harga_pokok"
                            name="omset_harga_pokok"
                            value="{{ number_format($muk?->keuangan?->omset_harga_pokok, 0, ',', '.') ?? '' }}">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="omset_sewa" class="notbold">&nbsp; Sewa/Kontrak</label>
                </td>
                <td>
                    <div class="input-group input-group-sm">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" class="form-control is-invalid setRp" id="omset_sewa" name="omset_sewa"
                            value="{{ number_format($muk?->keuangan?->omset_sewa, 0, ',', '.') ?? '' }}">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="omset_gaji_pegawai" class="notbold">&nbsp; Gaji Pegawai</label>
                </td>
                <td>
                    <div class="input-group input-group-sm">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" class="form-control is-invalid setRp" id="omset_gaji_pegawai"
                            name="omset_gaji_pegawai"
                            value="{{ number_format($muk?->keuangan?->omset_gaji_pegawai, 0, ',', '.') ?? '' }}">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="omset_listrik" class="notbold">&nbsp; Telpon, Listrik & Air</label>
                </td>
                <td>
                    <div class="input-group input-group-sm">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" class="form-control is-invalid setRp" id="omset_listrik"
                            name="omset_listrik"
                            value="{{ number_format($muk?->keuangan?->omset_listrik, 0, ',', '.') ?? '' }}">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="omset_transportasi" class="notbold">&nbsp; Transportasi</label>
                </td>
                <td>
                    <div class="input-group input-group-sm">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" class="form-control is-invalid setRp" id="omset_transportasi"
                            name="omset_transportasi"
                            value="{{ number_format($muk?->keuangan?->omset_transportasi, 0, ',', '.') ?? '' }}">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="omset_pengeluaran_lainnya" class="notbold">&nbsp; Pengeluaran Lainnya</label>
                </td>
                <td>
                    <div class="input-group input-group-sm">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" class="form-control is-invalid setRp" id="omset_pengeluaran_lainnya"
                            name="omset_pengeluaran_lainnya"
                            value="{{ number_format($muk?->keuangan?->omset_pengeluaran_lainnya, 0, ',', '.') ?? '' }}">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="pengeluaran_usaha" class="notbold">Pengeluaran Usaha</label>
                </td>
                <td>
                    <div class="input-group input-group-sm">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" class="form-control is-invalid setRp" id="pengeluaran_usaha"
                            name="pengeluaran_usaha" readonly
                            value="{{ number_format($muk?->keuangan?->pengeluaran_usaha, 0, ',', '.') ?? '' }}">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="keuntungan_usaha" class="notbold">Keuntungan Usaha</label>
                </td>
                <td>
                    <div class="input-group input-group-sm">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" class="form-control is-invalid setRp" id="keuntungan_usaha"
                            name="keuntungan_usaha" readonly
                            value="{{ number_format($muk?->keuangan?->keuntungan_usaha, 0, ',', '.') ?? '' }}">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="penghasilan_deb" class="notbold">Penghasilan Istri/Suami</label>
                </td>
                <td>
                    <div class="input-group input-group-sm">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" class="form-control is-invalid setRp" id="penghasilan_deb"
                            name="penghasilan_deb"
                            value="{{ number_format($muk?->keuangan?->penghasilan_deb, 0, ',', '.') ?? '' }}">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="penghasilan_lainnya" class="notbold">Penghasilan Lainnya</label>
                </td>
                <td>
                    <div class="input-group input-group-sm">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" class="form-control is-invalid setRp" id="penghasilan_lainnya"
                            name="penghasilan_lainnya"
                            value="{{ number_format($muk?->keuangan?->penghasilan_lainnya, 0, ',', '.') ?? '' }}">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="total_penghasilan" class="notbold">Total Penghasilan</label>
                </td>
                <td>
                    <div class="input-group input-group-sm">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" class="form-control is-invalid setRp" id="total_penghasilan"
                            name="total_penghasilan" readonly
                            value="{{ number_format($muk?->keuangan?->total_penghasilan, 0, ',', '.') ?? '' }}">
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div class="col-md-6">
        <table class="table table-striped table-sm w-100">
            <tr>
                <td style="width: 50%">
                    <label for="belanja_rt" class="notbold">&nbsp; Belanja Rumah Tangga</label>
                </td>
                <td>
                    <div class="input-group input-group-sm">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" class="form-control is-invalid setRp" id="belanja_rt"
                            name="belanja_rt"
                            value="{{ number_format($muk?->keuangan?->belanja_rt, 0, ',', '.') ?? '' }}">
                    </div>
                </td>
            </tr>
            <tr>
                <td style="width: 50%">
                    <label for="sewa_rumah" class="notbold">&nbsp; Sewa/Kontrak Rumah</label>
                </td>
                <td>
                    <div class="input-group input-group-sm">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" class="form-control is-invalid setRp" id="sewa_rumah"
                            name="sewa_rumah"
                            value="{{ number_format($muk?->keuangan?->sewa_rumah, 0, ',', '.') ?? '' }}">
                    </div>
                </td>
            </tr>
            <tr>
                <td style="width: 50%">
                    <label for="pendidikan" class="notbold">&nbsp; Pendidikan</label>
                </td>
                <td>
                    <div class="input-group input-group-sm">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" class="form-control is-invalid setRp" id="pendidikan"
                            name="pendidikan"
                            value="{{ number_format($muk?->keuangan?->pendidikan, 0, ',', '.') ?? '' }}">
                    </div>
                </td>
            </tr>
            <tr>
                <td style="width: 50%">
                    <label for="listrik" class="notbold">&nbsp; Telpon, Listrik & Air</label>
                </td>
                <td>
                    <div class="input-group input-group-sm">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" class="form-control is-invalid setRp" id="listrik" name="listrik"
                            value="{{ number_format($muk?->keuangan?->listrik, 0, ',', '.') ?? '' }}">
                    </div>
                </td>
            </tr>
            <tr>
                <td style="width: 50%">
                    <label for="transportasi" class="notbold">&nbsp; Transportasi</label>
                </td>
                <td>
                    <div class="input-group input-group-sm">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" class="form-control is-invalid setRp" id="transportasi"
                            name="transportasi"
                            value="{{ number_format($muk?->keuangan?->transportasi, 0, ',', '.') ?? '' }}">
                    </div>
                </td>
            </tr>
            <tr>
                <td style="width: 50%">
                    <label for="pengeluaran_lainnya" class="notbold">&nbsp; Pengeluaran Lainnya</label>
                </td>
                <td>
                    <div class="input-group input-group-sm">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" class="form-control is-invalid setRp" id="pengeluaran_lainnya"
                            name="pengeluaran_lainnya"
                            value="{{ number_format($muk?->keuangan?->pengeluaran_lainnya, 0, ',', '.') ?? '' }}">
                    </div>
                </td>
            </tr>
            <tr>
                <td style="width: 50%">
                    <label for="total_pengeluaran" class="notbold">Total Pengeluaran</label>
                </td>
                <td>
                    <div class="input-group input-group-sm">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" class="form-control is-invalid setRp" id="total_pengeluaran"
                            name="total_pengeluaran" readonly
                            value="{{ number_format($muk?->keuangan?->total_pengeluaran, 0, ',', '.') ?? '' }}">
                    </div>
                </td>
            </tr>
            <tr>
                <td style="width: 50%">
                    <label for="sisa_penghasilan" class="notbold">Sisa Penghasilan</label>
                </td>
                <td>
                    <div class="input-group input-group-sm">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" class="form-control is-invalid setRp" id="sisa_penghasilan"
                            name="sisa_penghasilan" readonly
                            value="{{ number_format($muk?->keuangan?->sisa_penghasilan, 0, ',', '.') ?? '' }}">
                    </div>
                </td>
            </tr>
            <tr>
                <td style="width: 50%">
                    <label for="keu_angsuran_pinjaman" class="notbold">Angsuran Pinjaman Saat Ini</label>
                </td>
                <td>
                    <div class="input-group input-group-sm">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" class="form-control is-invalid setRp" id="keu_angsuran_pinjaman"
                            name="keu_angsuran_pinjaman" readonly
                            value="{{ number_format($muk?->keuangan?->keu_angsuran_pinjaman, 0, ',', '.') ?? '' }}">
                    </div>
                </td>
            </tr>
            <tr>
                <td style="width: 50%">
                    <label for="rekomendasi_asr" class="notbold">Rekomendasi ASR Pinjaman</label>
                </td>
                <td>
                    <div class="input-group input-group-sm">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" class="form-control is-invalid setRp" id="rekomendasi_asr"
                            name="rekomendasi_asr" readonly
                            value="{{ number_format($muk?->keuangan?->rekomendasi_asr, 0, ',', '.') ?? '' }}">
                    </div>
                </td>
            </tr>
            <tr>
                <td style="width: 50%">
                    <label for="dis_income" class="notbold">Disposable Income</label>
                </td>
                <td>
                    <div class="input-group input-group-sm">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" class="form-control is-invalid setRp" id="dis_income"
                            name="dis_income" readonly
                            value="{{ number_format($muk?->keuangan?->dis_income, 0, ',', '.') ?? '' }}">
                    </div>
                </td>
            </tr>
            <tr>
                <td style="width: 50%">
                    <label for="idir">IDIR</label>
                </td>
                <td>
                    <div class="input-group input-group-sm">
                        <input type="text" class="form-control is-invalid" id="idir" name="idir" readonly
                            value="{{ number_format($muk?->keuangan?->idir ?? 0, 2, ',', '.') }}">
                        <span class="input-group-text">%</span>
                    </div>
                </td>
            </tr>
        </table>
    </div>
</div>

{{-- berjangka --}}
<div class="row {{ $muk?->jns_kredit_muk == 'Berjangka' ? '' : 'd-none' }}" id="keuangan_berjangka"
    style="margin-left: 5px;">
    <div class="col-md-6">
        <table class="table table-striped table-sm w-100">
            <tr>
                <td style="width: 50%">
                    <label for="bjk_periode_usaha" class="notbold">Periode Usaha</label>
                </td>
                <td>
                    <div class="input-group input-group-sm">
                        <input type="text" class="form-control is-invalid setRp" id="bjk_periode_usaha"
                            name="bjk_periode_usaha"
                            value="{{ number_format($muk?->keuanganBjk?->bjk_periode_usaha, 0, ',', '.') }}">
                        <span class="input-group-text">Bulan</span>
                    </div>
                </td>
            </tr>
            <tr>
                <td style="width: 50%">
                    <label for="bjk_omset" class="notbold">Omset 1 Periode Usaha</label>
                </td>
                <td>
                    <div class="input-group input-group-sm">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" class="form-control is-invalid setRp" id="bjk_omset" name="bjk_omset"
                            value="{{ number_format($muk?->keuanganBjk?->bjk_omset, 0, ',', '.') ?? null }}">
                    </div>
                </td>
            </tr>
            <tr>
                <td style="width: 50%">
                    <label for="bjk_pupuk" class="notbold">Pupuk</label>
                </td>
                <td>
                    <div class="input-group input-group-sm">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" class="form-control is-invalid setRp" id="bjk_pupuk" name="bjk_pupuk"
                            value="{{ number_format($muk?->keuanganBjk?->bjk_pupuk, 0, ',', '.') ?? null }}">
                    </div>
                </td>
            </tr>
            <tr>
                <td style="width: 50%">
                    <label for="bjk_biaya_tenaga_kerja" class="notbold">Biaya Tenaga Kerja</label>
                </td>
                <td>
                    <div class="input-group input-group-sm">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" class="form-control is-invalid setRp" id="bjk_biaya_tenaga_kerja"
                            name="bjk_biaya_tenaga_kerja"
                            value="{{ number_format($muk?->keuanganBjk?->bjk_biaya_tenaga_kerja, 0, ',', '.') ?? null }}">
                    </div>
                </td>
            </tr>
            <tr>
                <td style="width: 50%">
                    <label for="bjk_biaya_operasional" class="notbold">Biaya Operasional</label>
                </td>
                <td>
                    <div class="input-group input-group-sm">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" class="form-control is-invalid setRp" id="bjk_biaya_operasional"
                            name="bjk_biaya_operasional"
                            value="{{ number_format($muk?->keuanganBjk?->bjk_biaya_operasional, 0, ',', '.') ?? null }}">
                    </div>
                </td>
            </tr>
            <tr>
                <td style="width: 50%">
                    <label for="bjk_biaya_bahan_baku" class="notbold">Biaya Bahan Baku</label>
                </td>
                <td>
                    <div class="input-group input-group-sm">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" class="form-control is-invalid setRp" id="bjk_biaya_bahan_baku"
                            name="bjk_biaya_bahan_baku"
                            value="{{ number_format($muk?->keuanganBjk?->bjk_biaya_bahan_baku, 0, ',', '.') ?? null }}">
                    </div>
                </td>
            </tr>
            <tr>
                <td style="width: 50%">
                    <label for="bjk_biaya_lainnya" class="notbold">Biaya Lainnya</label>
                </td>
                <td>
                    <div class="input-group input-group-sm">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" class="form-control is-invalid setRp" id="bjk_biaya_lainnya"
                            name="bjk_biaya_lainnya"
                            value="{{ number_format($muk?->keuanganBjk?->bjk_biaya_lainnya, 0, ',', '.') ?? null }}">
                    </div>
                </td>
            </tr>
            <tr>
                <td style="width: 50%">
                    <label for="bjk_pengeluaran_usaha" class="notbold">Pengeluaran 1 Periode Usaha</label>
                </td>
                <td>
                    <div class="input-group input-group-sm">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" class="form-control is-invalid setRp" id="bjk_pengeluaran_usaha"
                            name="bjk_pengeluaran_usaha" readonly
                            value="{{ number_format($muk?->keuanganBjk?->bjk_pengeluaran_lainnya, 0, ',', '.') ?? null }}">
                    </div>
                </td>
            </tr>
            <tr>
                <td style="width: 50%">
                    <label for="bjk_keuntungan_usaha" class="notbold">Keuntungan 1 Periode Usaha</label>
                </td>
                <td>
                    <div class="input-group input-group-sm">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" class="form-control is-invalid setRp" id="bjk_keuntungan_usaha"
                            name="bjk_keuntungan_usaha" readonly
                            value="{{ number_format($muk?->keuanganBjk?->bjk_keuntungan_usaha, 0, ',', '.') ?? null }}">
                    </div>
                </td>
            </tr>
            <tr>
                <td style="width: 50%">
                    <label for="bjk_keuntungan_bulan" class="notbold">Keuntungan per bulan</label>
                </td>
                <td>
                    <div class="input-group input-group-sm">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" class="form-control is-invalid setRp" id="bjk_keuntungan_bulan"
                            name="bjk_keuntungan_bulan" readonly
                            value="{{ number_format($muk?->keuanganBjk?->bjk_keuntungan_bulan, 0, ',', '.') ?? null }}">
                    </div>
                </td>
            </tr>
            <tr>
                <td style="width: 50%">
                    <label for="bjk_penghasilan_lainnya" class="notbold">Penghasilan Lainnya/bulan</label>
                </td>
                <td>
                    <div class="input-group input-group-sm">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" class="form-control is-invalid setRp" id="bjk_penghasilan_lainnya"
                            name="bjk_penghasilan_lainnya"
                            value="{{ number_format($muk?->keuanganBjk?->bjk_penghasilan_lainnya, 0, ',', '.') ?? null }}">
                    </div>
                </td>
            </tr>
            <tr>
                <td style="width: 50%">
                    <label for="bjk_total_penghasilan" class="notbold">Total Penghasilan per bulan</label>
                </td>
                <td>
                    <div class="input-group input-group-sm">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" class="form-control is-invalid setRp" id="bjk_total_penghasilan"
                            name="bjk_total_penghasilan" readonly
                            value="{{ number_format($muk?->keuanganBjk?->bjk_total_penghasilan_lainnya, 0, ',', '.') ?? null }}">
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div class="col-md-6">
        <table class="table table-striped table-sm w-100">
            <tr>
                <td style="width: 50%">
                    <label for="bjk_belanja_rumah" class="notbold">Belanja Rumah Tangga</label>
                </td>
                <td>
                    <div class="input-group input-group-sm">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" class="form-control is-invalid setRp" id="bjk_belanja_rumah"
                            name="bjk_belanja_rumah"
                            value="{{ number_format($muk?->keuanganBjk?->bjk_belanja_rumah, 0, ',', '.') ?? null }}">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="bjk_sewa_rumah" class="notbold">Sewa/Kontrak Rumah</label>
                </td>
                <td>
                    <div class="input-group input-group-sm">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" class="form-control is-invalid setRp" id="bjk_sewa_rumah"
                            name="bjk_sewa_rumah"
                            value="{{ number_format($muk?->keuanganBjk?->bjk_sewa_rumah, 0, ',', '.') ?? null }}">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="bjk_pendidikan" class="notbold">Pendidikan</label>
                </td>
                <td>
                    <div class="input-group input-group-sm">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" class="form-control is-invalid setRp" id="bjk_pendidikan"
                            name="bjk_pendidikan"
                            value="{{ number_format($muk?->keuanganBjk?->bjk_pendidikan, 0, ',', '.') ?? null }}">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="bjk_listrik" class="notbold">Telpon, Listrik & Air</label>
                </td>
                <td>
                    <div class="input-group input-group-sm">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" class="form-control is-invalid setRp" id="bjk_listrik"
                            name="bjk_listrik"
                            value="{{ number_format($muk?->keuanganBjk?->bjk_listrik, 0, ',', '.') ?? null }}">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="bjk_transportasi" class="notbold">Transporatasi</label>
                </td>
                <td>
                    <div class="input-group input-group-sm">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" class="form-control is-invalid setRp" id="bjk_transportasi"
                            name="bjk_transportasi"
                            value="{{ number_format($muk?->keuanganBjk?->bjk_transportasi, 0, ',', '.') ?? null }}">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="bjk_pengeluaran_lainnya" class="notbold">Pengeluaran Lainnya</label>
                </td>
                <td>
                    <div class="input-group input-group-sm">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" class="form-control is-invalid setRp" id="bjk_pengeluaran_lainnya"
                            name="bjk_pengeluaran_lainnya"
                            value="{{ number_format($muk?->keuanganBjk?->bjk_pengeluaran_lainnya, 0, ',', '.') ?? null }}">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="bjk_total_pengeluaran" class="notbold">Total Pengeluaran</label>
                </td>
                <td>
                    <div class="input-group input-group-sm">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" class="form-control is-invalid setRp" id="bjk_total_pengeluaran"
                            name="bjk_total_pengeluaran" readonly
                            value="{{ number_format($muk?->keuanganBjk?->bjk_total_pengeluaran, 0, ',', '.') ?? null }}">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="bjk_sisa_penghasilan" class="notbold">Sisa Penghasilan</label>
                </td>
                <td>
                    <div class="input-group input-group-sm">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" class="form-control is-invalid setRp" id="bjk_sisa_penghasilan"
                            name="bjk_sisa_penghasilan" readonly
                            value="{{ number_format($muk?->keuanganBjk?->bjk_sisa_penghasilan, 0, ',', '.') ?? null }}">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="bjk_angsuran_pinjaman" class="notbold">Angsuran Pinjaman Saat Ini</label>
                </td>
                <td>
                    <div class="input-group input-group-sm">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" class="form-control is-invalid setRp" id="bjk_angsuran_pinjaman"
                            name="bjk_angsuran_pinjaman" readonly
                            value="{{ number_format($muk?->keuanganBjk?->bjk_angsuran_pinjaman, 0, ',', '.') ?? null }}">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="bjk_kewajiban_bunga" class="notbold">Kewajiban Bunga per bulan</label>
                </td>
                <td>
                    <div class="input-group input-group-sm">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" class="form-control is-invalid setRp" id="bjk_kewajiban_bunga"
                            name="bjk_kewajiban_bunga" readonly
                            value="{{ number_format($muk?->keuanganBjk?->bjk_kewajiban_bunga, 0, ',', '.') ?? null }}">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="bjk_kewajiban_akhir" class="notbold">Kewajiban pada akhir periode</label>
                </td>
                <td>
                    <div class="input-group input-group-sm">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" class="form-control is-invalid setRp" id="bjk_kewajiban_akhir"
                            name="bjk_kewajiban_akhir" readonly
                            value="{{ number_format($muk?->keuanganBjk?->bjk_kewajiban_akhir, 0, ',', '.') ?? null }}">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="bjk_idir">IDIR</label>
                </td>
                <td>
                    <div class="input-group input-group-sm">
                        <input type="text" class="form-control is-invalid" id="bjk_idir" name="bjk_idir"
                            readonly value="{{ number_format($muk?->keuanganBjk?->bjk_idir ?? 0, 2, ',', '.') }}">
                        <span class="input-group-text">%</span>
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="sumber_pengembalian">Sumber Pengembalian Pinjaman</label>
            <input type="text" name="sumber_pengembalian" id="sumber_pengembalian"
                class="form-control form-control-sm is-invalid"
                value="{{ $muk?->keuanganBjk?->sumber_pengembalian }}">
        </div>
    </div>
    <div class="col-md-4 mb-2">
        <label for="nominal">&nbsp;</label>
        <div class="input-group input-group-sm">
            <span class="input-group-text">Rp.</span>
            <input type="text" class="form-control is-invalid setRp" id="nominal" name="nominal"
                value="{{ number_format($muk?->keuanganBjk?->nominal, 0, ',', '.') ?? null }}">
        </div>
    </div>

    <div class="col-md-12 mb-4">
        <div class="form-group">
            <div class="d-flex justify-content-between">
                <label for="keterangan">Keterangan</label>
                <label for="keterangan" data-bs-toggle="tooltip" data-bs-placement="top"
                    data-bs-custom-class="custom-tooltip"
                    data-bs-title=" Diisi dengan : <br>
                        - Keterangan dari sumber pengembalian pokok dan bunga di akhir periode pinjaman. <br>
                        - Jenis usaha, apabila diisi dengan usaha lainnya. <br>
                        - Diisi dengan penjelasan mengenai usaha lainnya. ">
                    <i class="fa-solid fa-circle-question"></i>
                </label>
            </div>
            <textarea name="keterangan" id="keterangan">{{ $muk?->keuanganBjk?->keterangan ?? null }}</textarea>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="selisih_penghasilan">Selisih Penghasilan dengan Total Angsuran</label>
            <div class="input-group input-group-sm">
                <span class="input-group-text">Rp.</span>
                <input type="text" class="form-control is-invalid setRp" id="selisih_penghasilan"
                    name="selisih_penghasilan" readonly
                    value="{{ number_format($muk?->keuanganBjk?->selisih_penghasilan, 0, ',', '.') ?? null }}">
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <label for="selisih_persen">&nbsp;</label>
        <div class="input-group input-group-sm">
            <input type="text" class="form-control is-invalid" id="selisih_persen" name="selisih_persen"
                value="{{ number_format($muk?->keuangan?->selisih_persen ?? 0, 2, ',', '.') }}" readonly>
            <span class="input-group-text">%</span>
        </div>
    </div>
</div>


{{-- agar tidak tabrakan dengan style di css global --}}
<style>
    .note-editor .note-editable ol {
        list-style-type: decimal !important;
        /* Pastikan angka tetap muncul */
        padding-left: 20px !important;
        /* Sesuaikan indentasi */
    }

    .note-editor .note-editable ul {
        list-style-type: disc !important;
        /* Pastikan bullet tetap muncul */
        padding-left: 20px !important;
    }
</style>
