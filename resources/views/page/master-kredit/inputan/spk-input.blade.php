<div class="row" style="margin-left: 5px;">
    <input type="hidden" id="id_field" value="{{ $id_field }}" readonly>
    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="kategori_spk{{ $id_field }}">Kategori SPK:</label>
            <select name="kategori_spk{{ $id_field }}" id="kategori_spk{{ $id_field }}" class="form-select"
                required>
                <option disabled selected>- Pilih Kategori SPK -</option>
                <option {{ ($kredit == null ? null : $kredit->kategori_spk == 'SPK') ? 'selected' : null }}
                    value="SPK">SPK Kredit (Baru)</option>
                <option {{ ($kredit == null ? null : $kredit->kategori_spk == 'Restruck') ? 'selected' : null }}
                    value="Restruck">Addendum (Restruck)</option>
                <option {{ ($kredit == null ? null : $kredit->kategori_spk == 'NonRestruck') ? 'selected' : null }}
                    value="NonRestruck">Addendum (Non-Restruck)</option>
            </select>
        </div>
    </div>

    {{-- Restruck --}}
    <div class="col-md-6 mb-4 {{ $kredit != null && $kredit->kategori_spk == 'Restruck' ? '' : 'd-none' }}"
        id="head_detail_kategori_spk{{ $id_field }}">
        <div class="form-group">
            <label for="detail_kategori_spk{{ $id_field }}">Detail Kategori SPK Restruck</label>
            <select name="detail_kategori_spk{{ $id_field }}" id="detail_kategori_spk{{ $id_field }}"
                class="form-select">
                <option disabled selected>- Pilih Detail Kategori SPK -</option>
                <option
                    {{ ($kredit == null ? null : $kredit->jns_kategori_spk == 'Reschedulling') ? 'selected' : null }}
                    value="Reschedulling">
                    Reschedulling (Perubahan jangka waktu dan perubahan suku bunga)
                </option>
                <option {{ ($kredit == null ? null : $kredit->jns_kategori_spk == 'Recondition') ? 'selected' : null }}
                    value="Recondition">
                    Recondition (Perubahan plafond pinjaman, perubahan jangka
                    waktu dan perubahan suku bunga)
                </option>
                <option
                    {{ ($kredit == null ? null : $kredit->jns_kategori_spk == 'Restructuring') ? 'selected' : null }}
                    value="Restructuring">
                    Restructuring (Perubahan plafond pinjaman, perubahan jangka
                    waktu, perubahan suku bunga dan perubahan angsuran)
                </option>
                <option
                    {{ ($kredit == null ? null : $kredit->jns_kategori_spk == 'Perubahan Fasilitas Kredit') ? 'selected' : null }}
                    value="Perubahan Fasilitas Kredit">
                    Perubahan Fasilitas Kredit (Berjangka/Angsuran)
                </option>
            </select>
        </div>
    </div>

    {{-- Non Restruck --}}
    <div class="col-md-6 mb-4 {{ $kredit != null && $kredit->kategori_spk == 'NonRestruck' ? '' : 'd-none' }}"
        id="head_detail_kategori_spk_non{{ $id_field }}">
        <div class="form-group">
            <label for="detail_kategori_spk_non{{ $id_field }}">Detail Kategori SPK Non-Restruck</label>
            <select name="detail_kategori_spk_non{{ $id_field }}" id="detail_kategori_spk_non{{ $id_field }}"
                class="form-select">
                <option disabled selected>- Pilih Detail Kategori SPK -</option>
                <option
                    {{ ($kredit == null ? null : $kredit->jns_kategori_spk == 'Menambah Plafond Kredit (Tanpa Menambah Jaminan)') ? 'selected' : null }}
                    value="Menambah Plafond Kredit (Tanpa Menambah Jaminan)">
                    Menambah Plafond Kredit (Tanpa Menambah Jaminan)
                </option>
                <option
                    {{ ($kredit == null ? null : $kredit->jns_kategori_spk == 'Menambah Plafond Kredit (Dengan Menambah Jaminan)') ? 'selected' : null }}
                    value="Menambah Plafond Kredit (Dengan Menambah Jaminan)">
                    Menambah Plafond Kredit (Dengan Menambah Jaminan)
                </option>
                <option
                    {{ ($kredit == null ? null : $kredit->jns_kategori_spk == 'Mengurangi Plafond Kredit (Tanpa Mengurangi Jaminan)') ? 'selected' : null }}
                    value="Mengurangi Plafond Kredit (Tanpa Mengurangi Jaminan)">
                    Mengurangi Plafond Kredit (Tanpa Mengurangi Jaminan)
                </option>
                <option
                    {{ ($kredit == null ? null : $kredit->jns_kategori_spk == 'Mengurangi Plafond Kredit (Dengan Mengurangi Jaminan)') ? 'selected' : null }}
                    value="Mengurangi Plafond Kredit (Dengan Mengurangi Jaminan)">
                    Mengurangi Plafond Kredit (Dengan Mengurangi Jaminan)
                </option>
                <option
                    {{ ($kredit == null ? null : $kredit->jns_kategori_spk == 'Mengubah Jaminan (Menambah)') ? 'selected' : null }}
                    value="Mengubah Jaminan (Menambah)">
                    Mengubah Jaminan (Menambah)
                </option>
                <option
                    {{ ($kredit == null ? null : $kredit->jns_kategori_spk == 'Mengubah Jaminan (Mengurangi)') ? 'selected' : null }}
                    value="Mengubah Jaminan (Mengurangi)">
                    Mengubah Jaminan (Mengurangi)
                </option>
                <option
                    {{ ($kredit == null ? null : $kredit->jns_kategori_spk == 'Mengubah Jaminan (Mengubah)') ? 'selected' : null }}
                    value="Mengubah Jaminan (Mengubah)">
                    Mengubah Jaminan (Mengubah)
                </option>
            </select>
        </div>
    </div>


    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="tujuan_pengajuan{{ $id_field }}">Tujuan Pengajuan:</label>
            <select name="tujuan_pengajuan{{ $id_field }}" id="tujuan_pengajuan{{ $id_field }}"
                class="form-select" required>
                <option disabled selected>- Pilih Tujuan Pengajuan -</option>
                <option {{ ($kredit == null ? null : $kredit->tujuan_pengajuan == 'Modal Kerja') ? 'selected' : null }}
                    value="Modal Kerja">Modal Kerja</option>
                <option {{ ($kredit == null ? null : $kredit->tujuan_pengajuan == 'Investasi') ? 'selected' : null }}
                    value="Investasi">Investasi</option>
                <option {{ ($kredit == null ? null : $kredit->tujuan_pengajuan == 'Konsumsi') ? 'selected' : null }}
                    value="Konsumsi">Konsumsi</option>
            </select>
            <input type="text" name="alasan_tujuan{{ $id_field }}" id="alasan_tujuan{{ $id_field }}"
                class="form-control" placeholder="Jelaskan Alasan Tujuan Pengajuan" required
                value="{{ $kredit != null ? $kredit->alasan_tujuan : null }}">
        </div>
    </div>

    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="sumber_pembayaran{{ $id_field }}">Sumber Pembayaran Kembali:</label>
            <input type="text" name="sumber_pembayaran{{ $id_field }}"
                id="sumber_pembayaran{{ $id_field }}" class="form-control" required
                placeholder="Sumber Pembayaran Kembali"
                value="{{ $kredit != null ? $kredit->sumber_pembayaran : null }}">
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="jkw_pengajuan{{ $id_field }}">Jangka Waktu Pengajuan:</label>
            <input type="number" name="jkw_pengajuan{{ $id_field }}" id="jkw_pengajuan{{ $id_field }}"
                class="form-control" required placeholder="Hanya Angka, contoh: 12" min="0"
                value="{{ $kredit != null ? $kredit->jkw_pengajuan : null }}">
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="jumlah_pengajuan{{ $id_field }}">Plafond Pengajuan:</label>
            <input type="text" name="jumlah_pengajuan{{ $id_field }}" id="jumlah_pengajuan{{ $id_field }}"
                class="form-control" required placeholder="Hanya Angka"
                value="{{ $kredit != null ? 'Rp. ' . number_format($kredit->jumlah_pengajuan, 0, ',', '.') : null }}">
        </div>
    </div>

    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="asal_kredit{{ $id_field }}">Asal Pengajuan Kredit</label>
            <select name="asal_kredit{{ $id_field }}" id="asal_kredit{{ $id_field }}" class="form-select"
                required>
                <option disabled selected>- Pilih Asal Pengajuan Kredit -</option>
                <option {{ ($kredit == null ? null : $kredit->asal_kredit == 'Prospek AO') ? 'selected' : null }}
                    value="Prospek AO">Prospek AO</option>
                <option {{ ($kredit == null ? null : $kredit->asal_kredit == 'Referal') ? 'selected' : null }}
                    value="Referal">Referal</option>
                <option {{ ($kredit == null ? null : $kredit->asal_kredit == 'Walk in') ? 'selected' : null }}
                    value="Walk in">Walk in</option>
            </select>
            <input type="text" name="petugas_referal{{ $id_field }}" id="petugas_referal{{ $id_field }}"
                class="form-control {{ $kredit == null || $kredit->asal_kredit == 'Referal' ? '' : 'd-none' }}"
                placeholder="Nama Petugas Referal" value="{{ $kredit != null ? $kredit->petugas_referal : null }}">
        </div>
    </div>


</div>
