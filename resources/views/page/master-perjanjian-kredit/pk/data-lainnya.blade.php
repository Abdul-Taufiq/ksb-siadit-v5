<div style="margin-left: 5px;" class="row">
    <input type="hidden" name="id_pkpmk" id="id_pkpmk"
        value="{{ $kredit->pkpmk->isNotEmpty() ? base64_encode($kredit->pkpmk?->id_pkpmk) : '' }}" readonly>

    @if ($kredit->kategori_spk != 'SPK')
        <input type="hidden" name="id_addendum" id="id_addendum"
            value="{{ base64_encode($kredit->addendum?->id_addendum) }}" readonly>

        <div class="col-md-12 mb-3">
            <div class="form-group">
                <label for="id_pkpmk">Penalti pelunasan :</label>
                <select name="id_pkpmk" id="id_pkpmk" class="form-control select2" required>
                    <option disabled selected>- Pilih PK -</option>
                    @foreach ($pkpmk as $item)
                        <option {{ $kredit->addendum?->id_pkpmk == $item->id_pkpmk ? 'selected' : '' }}
                            value="{{ $item->id_pkpmk }}">
                            ({{ $item->no_pkpmk }})
                            &rarr;
                            ({{ $item->debitur->nik }})
                            &rarr;
                            ({{ $item->debitur->nama_debitur }})
                            &rarr;
                            (Tgl Print PK:
                            {{ $item->tgl_pkpmk?->translatedFormat('d F Y, H:i') . ' WIB' }})
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="form-group">
                <label for="jns_pengikatan">Jenis Pengikatan :</label>
                <select class="form-select" name="jns_pengikatan" id="jns_pengikatan" required>
                    <option disabled selected>- Pilih Jenis Pengikatan -</option>
                    <option {{ $kredit->addendum?->jns_pengikatan == 'Bawah Tangan/Legalisasi' ? 'selected' : '' }}
                        value="Bawah Tangan/Legalisasi">Bawah Tangan/Legalisasi
                    </option>
                    <option {{ $kredit->addendum?->jns_pengikatan == 'Notarill' ? 'selected' : '' }} value="Notarill">
                        Notarill</option>
                </select>
            </div>
        </div>
        <div class="col-md-12 mb-3" id="head_notariil">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nomor_akta_notaris">Nomor Akta Notaris :</label>
                        <input type="text" name="nomor_akta_notaris" class="form-control" id="nomor_akta_notaris"
                            autocomplete="off" required placeholder="Nomor Akta Notaris"
                            value="{{ $kredit->addendum?->no_akta_notaris }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="tanggal_div" for="tgl_akta_notaris">Tanggal
                            Akta Notaris : </label>
                        <input type="date" name="tgl_akta_notaris" id="tgl_akta_notaris" class="form-control"
                            placeholder="format : Tanggal-Bulan-Tahun, contoh: 31-12-1995"
                            value="{{ $kredit->addendum?->tgl_akta_notaris?->format('Y-m-d') }}">
                    </div>
                </div>
            </div>
        </div>
    @endif




    <div class="col-md-6 mb-3">
        <div class="form-group">
            <label for="penalty">Penalti pelunasan :</label>
            <input type="number" name="penalty" class="form-control" id="penalty" autocomplete="off" required
                placeholder="Hanya Angka, cth: 2" value="{{ $kredit->persetujuan->penalty }}">
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <label for="asuransi">Apakah Debitur Ikut Asuransi? :</label>
        <select name="asuransi" id="asuransi" class="form-control" required>
            <option disabled selected>- Apakah Debitur Ikut Asuransi? -</option>
            <option {{ $kredit->persetujuan->asuransi == 'Ya' ? 'selected' : '' }} value="Ya">Ya</option>
            <option {{ $kredit->persetujuan->asuransi == 'Tidak' ? 'selected' : '' }} value="Tidak">Tidak</option>
        </select>
    </div>
    <div class="col-md-6 mb-3 d-none" id="biaya_asuransi_head">
        <label class="c_taksasi" for="biaya_asuransi">Biaya Asuransi :</label>
        <div class="input-group">
            <span class="input-group-text">Rp.</span>
            <input type="text" name="biaya_asuransi" id="biaya_asuransi" class="form-control c_taksasi setRp"
                placeholder="Biaya Asuransi"
                value="{{ number_format($kredit->persetujuan->biaya_asuransi, 0, ',', '.') }}">
        </div>
    </div>
    <div class="col-md-6 mb-3 d-none" id="nama_perusahan_asuransi">
        <label class="c_taksasi" for="nama_perusahaan_asuransi">Nama Perusahaan
            Asuransi
            :</label>
        <input type="text" name="nama_perusahaan_asuransi" id="nama_perusahaan_asuransi"
            class="form-control c_taksasi" placeholder="Nama Perusahaan Asuransi">
    </div>
    <div class="col-md-6 mb-3">
        <label for="norek_tabungan">Nomor Rekening Tabungan :</label>
        <input type="text" name="norek_tabungan" id="norek_tabungan" class="form-control" required
            placeholder="Nomor Rekening" value="{{ $kredit->persetujuan->norek_tabungan }}">
    </div>
    <div class="col-md-6 mb-3">
        <label for="nama_rekening">Nama Rekening Tabungan :</label>
        <input type="text" name="nama_rekening" id="nama_rekening" class="form-control" required
            placeholder="Nama Rekening" value="{{ $kredit->persetujuan->nama_rekening }}">
    </div>

    {{-- tambahan new 17/03/2025 : SPPK --}}
    @if ($kredit->persetujuan->jns_kredit == 'Berjangka')
        <div class="col-md-6 mb-3">
            <label for="jumlah_angsuran">Biaya Angsuran : (Berjangka: ambil nilai
                terbesar)</label>
            <div class="input-group">
                <span class="input-group-text">Rp.</span>
                <input type="text" name="jumlah_angsuran" id="jumlah_angsuran" class="form-control setRp"
                    required placeholder="Biaya Angsuran"
                    value="{{ number_format($kredit->persetujuan->jumblah_angsuran, 0, ',', '.') }}">
            </div>
        </div>
    @endif
    <div class="col-md-6 mb-3">
        <label for="biaya_asuransi_kebakaran">Biaya Asuransi Kebakaran :</label>
        <div class="input-group">
            <span class="input-group-text">Rp.</span>
            <input type="text" name="biaya_asuransi_kebakaran" id="biaya_asuransi_kebakaran"
                class="form-control setRp" required placeholder="Biaya Asuransi Kebakaran"
                value="{{ number_format($kredit->persetujuan->biaya_asuransi_kebakaran, 0, ',', '.') }}">
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <label for="biaya_asuransi_kendaraan">Biaya Asuransi Kendaraan :</label>
        <div class="input-group">
            <span class="input-group-text">Rp.</span>
            <input type="text" name="biaya_asuransi_kendaraan" id="biaya_asuransi_kendaraan"
                class="form-control setRp" required placeholder="Biaya Asuransi Kendaraan"
                value="{{ number_format($kredit->persetujuan->biaya_asuransi_kendaraan, 0, ',', '.') }}">
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <label for="biaya_materai">Biaya Materai :</label>
        <div class="input-group">
            <span class="input-group-text">Rp.</span>
            <input type="text" name="biaya_materai" id="biaya_materai" class="form-control setRp" required
                placeholder="Biaya Materai"
                value="{{ number_format($kredit->persetujuan->biaya_materai, 0, ',', '.') }}">
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <label for="biaya_notaris">Biaya Notaris :</label>
        <div class="input-group">
            <span class="input-group-text">Rp.</span>
            <input type="text" name="biaya_notaris" id="biaya_notaris" class="form-control setRp" required
                placeholder="Biaya Notaris"
                value="{{ number_format($kredit->persetujuan->biaya_notaris, 0, ',', '.') }}">
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <label for="biaya_saving_angsuran">Biaya Saving Angsuran :</label>
        <div class="input-group">
            <span class="input-group-text">Rp.</span>
            <input type="text" name="biaya_saving_angsuran" id="biaya_saving_angsuran" class="form-control setRp"
                required placeholder="Biaya Saving Angsuran"
                value="{{ number_format($kredit->persetujuan->biaya_saving_angsuran, 0, ',', '.') }}">
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <label for="biaya_lainnya">Biaya Lainnya :</label>
        <div class="input-group">
            <span class="input-group-text">Rp.</span>
            <input type="text" name="biaya_lainnya" id="biaya_lainnya" class="form-control setRp" required
                placeholder="Biaya Lainnya"
                value="{{ number_format($kredit->persetujuan->biaya_lainnya, 0, ',', '.') }}">
        </div>
    </div>
</div>
