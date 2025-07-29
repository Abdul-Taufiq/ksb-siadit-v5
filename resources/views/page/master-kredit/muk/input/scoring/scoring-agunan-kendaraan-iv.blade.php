<div class="col-md-6 mb-3">
    <div class="form-group">
        <label class="notbold" for="market_kenda_{{ $loop->iteration }}">Marketability</label>
        <select name="market_kenda_{{ $loop->iteration }}" id="market_kenda_{{ $loop->iteration }}"
            class="form-select form-select-sm">
            <option selected disabled>-Pilih-</option>
            <option {{ $kenda->sc_kenda_agunan?->market == 'Marketable/Saleable' ? 'selected' : '' }}
                value="Marketable/Saleable">Marketable/Saleable</option>
            <option {{ $kenda->sc_kenda_agunan?->market == 'Marketable' ? 'selected' : '' }} value="Marketable">
                Marketable</option>
            <option {{ $kenda->sc_kenda_agunan?->market == 'Tidak Marketable' ? 'selected' : '' }}
                value="Tidak Marketable">Tidak Marketable</option>
        </select>
    </div>
</div>
<div class="col-md-6 mb-3">
    <div class="form-group">
        <label class="notbold" for="permasalahan_kenda_{{ $loop->iteration }}">Permasalahan</label>
        <input type="text" name="permasalahan_kenda_{{ $loop->iteration }}"
            id="permasalahan_kenda_{{ $loop->iteration }}" class="form-control form-control-sm"
            value="{{ $kenda->sc_kenda_agunan?->permasalahan }}">
    </div>
</div>
<div class="col-md-6 mb-3">
    <div class="form-group">
        <label class="notbold" for="pengikatan_sempurna_{{ $loop->iteration }}">Pengikatan Sempurna</label>
        <select name="pengikatan_sempurna_{{ $loop->iteration }}" id="pengikatan_sempurna_{{ $loop->iteration }}"
            class="form-select form-select-sm">
            <option selected disabled>-Pilih-</option>
            <option {{ $kenda->sc_kenda_agunan?->pengikatan_sempurna == 'Fiducia' ? 'selected' : '' }} value="Fiducia">
                Fiducia</option>
            <option {{ $kenda->sc_kenda_agunan?->pengikatan_sempurna == 'Fiducia Notaris' ? 'selected' : '' }}
                value="Fiducia Notaris">Fiducia Notaris</option>
            <option {{ $kenda->sc_kenda_agunan?->pengikatan_sempurna == 'Bawah Tangan' ? 'selected' : '' }}
                value="Bawah Tangan">Bawah Tangan</option>
        </select>
    </div>
</div>
<div class="col-md-6 mb-3">
    <div class="form-group">
        <label class="notbold" for="penguasaan_{{ $loop->iteration }}">Penguasaan</label>
        <input type="text" name="penguasaan_{{ $loop->iteration }}" id="penguasaan_{{ $loop->iteration }}"
            class="form-control form-control-sm" value="{{ $kenda->sc_kenda_agunan?->penguasaan }}">
    </div>
</div>
<div class="col-md-12 mb-3">
    <div class="form-group">
        <label class="notbold" for="lainnya_{{ $loop->iteration }}">Lain-lain</label>
        <textarea name="lainnya_{{ $loop->iteration }}" id="lainnya_{{ $loop->iteration }}" cols="30" rows="4"
            class="form-control form-control-sm">{{ $kenda->sc_kenda_agunan?->lainnya }}</textarea>
    </div>
</div>
