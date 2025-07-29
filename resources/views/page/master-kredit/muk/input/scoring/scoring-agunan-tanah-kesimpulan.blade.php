<div class="row">
    @if ($tanah->detail_kategori_jaminan == 'Tanah & Bangunan')
        <div class="col-md-12">
            <strong>Tanah</strong>
        </div>
    @endif
    <div class="col-md-6 mb-3">
        <div class="form-group">
            <label class="notbbold" for="kes_nilai_pasar_{{ $loop->iteration }}">Nilai Pasar
                {{ $tanah->detail_kategori_jaminan == 'Tanah & Bangunan' ? 'Tanah' : 'Agunan' }}</label>
            <div class="input-group input-group-sm">
                <span class="input-group-text">Rp</span>
                <input type="text" name="kes_nilai_pasar_{{ $loop->iteration }}"
                    id="kes_nilai_pasar_{{ $loop->iteration }}" class="form-control form-control-sm setRp" readonly
                    value="{{ number_format($tanah->sc_tanah_rekap_1?->kes_nilai_pasar ?? $tanah->sc_tanah_rekap_2?->kes_tanah_nilai_pasar, 0, ',', '.') }}">
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <div class="form-group">
            <label class="notbbold" for="kes_nilai_taksasi_persen_{{ $loop->iteration }}">Taksasi (%)</label>
            <div class="input-group input-group-sm">
                <input type="text" name="kes_nilai_taksasi_persen_{{ $loop->iteration }}"
                    id="kes_nilai_taksasi_persen_{{ $loop->iteration }}" class="form-control form-control-sm" readonly
                    value="{{ number_format($tanah->sc_tanah_rekap_1?->kes_nilai_taksasi_persen ?? $tanah->sc_tanah_rekap_2?->kes_taksasi_persen_1, 0, ',', '.') ?? $tanah->detail_kategori_jaminan == 'Tanah' ? '50' : ($tanah->detail_kategori_jaminan == 'Tanah & Bangunan' ? '70' : '60') }}">
                <span class="input-group-text">%</span>
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <div class="form-group">
            <label class="notbbold" for="kes_nilai_taksasi_{{ $loop->iteration }}">Nilai Taksasi
                {{ $tanah->detail_kategori_jaminan == 'Tanah & Bangunan' ? 'Tanah' : 'Agunan' }}</label>
            <div class="input-group input-group-sm">
                <span class="input-group-text">Rp</span>
                <input type="text" name="kes_nilai_taksasi_{{ $loop->iteration }}"
                    id="kes_nilai_taksasi_{{ $loop->iteration }}" class="form-control form-control-sm setRp" readonly
                    value="{{ number_format($tanah->sc_tanah_rekap_1?->kes_nilai_taksasi ?? $tanah->sc_tanah_rekap_2?->kes_tanah_nilai_taksasi, 0, ',', '.') }}">
            </div>
        </div>
    </div>

    {{-- khusus bangunan --}}
    @if ($tanah->detail_kategori_jaminan == 'Tanah & Bangunan')
        <div class="col-md-12">
            <strong>Bangunan</strong>
        </div>

        <div class="col-md-6 mb-3">
            <div class="form-group">
                <label class="notbbold" for="kes_bangunan_nilai_pasar_{{ $loop->iteration }}">Nilai Pasar
                    Bangunan</label>
                <div class="input-group input-group-sm">
                    <span class="input-group-text">Rp</span>
                    <input type="text" name="kes_bangunan_nilai_pasar_{{ $loop->iteration }}"
                        id="kes_bangunan_nilai_pasar_{{ $loop->iteration }}" class="form-control form-control-sm setRp"
                        readonly
                        value="{{ number_format($tanah->sc_tanah_rekap_2?->kes_bangunan_nilai_pasar, 0, ',', '.') }}">
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="form-group">
                <label class="notbbold" for="kes_taksasi_persen_2_{{ $loop->iteration }}">Taksasi (%)</label>
                <div class="input-group input-group-sm">
                    <input type="text" name="kes_taksasi_persen_2_{{ $loop->iteration }}"
                        id="kes_taksasi_persen_2_{{ $loop->iteration }}" class="form-control form-control-sm" readonly
                        value="{{ number_format($tanah->sc_tanah_rekap_2?->kes_taksasi_persen_2, 0, ',', '.') ?? '70' }}">
                    <span class="input-group-text">%</span>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="form-group">
                <label class="notbbold" for="kes_bangunan_nilai_taksasi_{{ $loop->iteration }}">Nilai Taksasi
                    Bangunan</label>
                <div class="input-group input-group-sm">
                    <span class="input-group-text">Rp</span>
                    <input type="text" name="kes_bangunan_nilai_taksasi_{{ $loop->iteration }}"
                        id="kes_bangunan_nilai_taksasi_{{ $loop->iteration }}"
                        class="form-control form-control-sm setRp" readonly
                        value="{{ number_format($tanah->sc_tanah_rekap_2?->kes_bangunan_nilai_taksasi, 0, ',', '.') }}">
                </div>
            </div>
        </div>

        {{-- total 1 --}}
        <div class="col-md-12">
            <strong>Total</strong>
        </div>
        <div class="col-md-6 mb-3">
            <div class="form-group">
                <label class="notbbold" for="kes_total_nilai_pasar_{{ $loop->iteration }}">Total Pasar Agunan</label>
                <div class="input-group input-group-sm">
                    <span class="input-group-text">Rp</span>
                    <input type="text" name="kes_total_nilai_pasar_{{ $loop->iteration }}"
                        id="kes_total_nilai_pasar_{{ $loop->iteration }}" class="form-control form-control-sm setRp"
                        readonly
                        value="{{ number_format($tanah->sc_tanah_rekap_2?->kes_total_nilai_pasar, 0, ',', '.') }}">
                </div>
            </div>
        </div>

        {{-- total 2 --}}
        <div class="col-md-6 mb-3">
            <div class="form-group">
                <label class="notbbold" for="kes_total_nilai_taksasi_{{ $loop->iteration }}">Total Taksasi
                    Agunan</label>
                <div class="input-group input-group-sm">
                    <span class="input-group-text">Rp</span>
                    <input type="text" name="kes_total_nilai_taksasi_{{ $loop->iteration }}"
                        id="kes_total_nilai_taksasi_{{ $loop->iteration }}" class="form-control form-control-sm setRp"
                        readonly
                        value="{{ number_format($tanah->sc_tanah_rekap_2?->kes_total_nilai_taksasi, 0, ',', '.') }}">
                </div>
            </div>
        </div>
    @endif

    <div class="col-md-12 mb-3">
        <label class="notbbold" for="kesimpulan_{{ $loop->iteration }}">Kesimpulan</label>
        <textarea name="kesimpulan_{{ $loop->iteration }}" id="kesimpulan_{{ $loop->iteration }}" cols="30"
            rows="3" class="form-control is-invalid">{!! $tanah->sc_tanah_rekap_1?->kesimpulan ?? $tanah->sc_tanah_rekap_2?->kesimpulan !!}</textarea>
    </div>
    <div class="col-md-12">
        <label class="notbbold" for="rekomendasi_penilai_{{ $loop->iteration }}">Rekomendasi Penilai</label>
        <textarea name="rekomendasi_penilai_{{ $loop->iteration }}" id="rekomendasi_penilai_{{ $loop->iteration }}"
            cols="30" rows="2" class="form-control is-invalid">{!! $tanah->sc_tanah_rekap_1?->kesimpulan ?? $tanah->sc_tanah_rekap_2?->kesimpulan !!}</textarea>
    </div>

</div>
