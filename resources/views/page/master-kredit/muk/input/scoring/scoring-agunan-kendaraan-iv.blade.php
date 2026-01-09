<div class="col-md-6 mb-3">
    <div class="form-group">
        <label class="notbold" for="market_kenda_{{ $loop->iteration }}">Marketability</label>
        <select name="market_kenda_{{ $loop->iteration }}" id="market_kenda_{{ $loop->iteration }}"
            class="form-select form-select-sm">
            <option selected disabled>-Pilih-</option>
            <option
                {{ (data_get($kenda, "$vanalisSCKenda.market") ?? data_get($kenda, "$vcabSCKenda.market")) == 'Marketable/Saleable' ? 'selected' : '' }}
                value="Marketable/Saleable">Marketable/Saleable</option>
            <option
                {{ (data_get($kenda, "$vanalisSCKenda.market") ?? data_get($kenda, "$vcabSCKenda.market")) == 'Marketable' ? 'selected' : '' }}
                value="Marketable">
                Marketable</option>
            <option
                {{ (data_get($kenda, "$vanalisSCKenda.market") ?? data_get($kenda, "$vcabSCKenda.market")) == 'Tidak Marketable' ? 'selected' : '' }}
                value="Tidak Marketable">Tidak Marketable</option>
        </select>
    </div>
</div>
<div class="col-md-6 mb-3">
    <div class="form-group">
        <label class="notbold" for="permasalahan_kenda_{{ $loop->iteration }}">Permasalahan</label>
        <input type="text" name="permasalahan_kenda_{{ $loop->iteration }}"
            id="permasalahan_kenda_{{ $loop->iteration }}" class="form-control form-control-sm"
            value="{{ data_get($kenda, "$vanalisSCKenda.permasalahan") ?? data_get($kenda, "$vcabSCKenda.permasalahan") }}">
    </div>
</div>
<div class="col-md-6 mb-3">
    <div class="form-group">
        <label class="notbold" for="pengikatan_sempurna_{{ $loop->iteration }}">Pengikatan Sempurna</label>
        <select name="pengikatan_sempurna_{{ $loop->iteration }}" id="pengikatan_sempurna_{{ $loop->iteration }}"
            class="form-select form-select-sm">
            <option selected disabled>-Pilih-</option>
            <option
                {{ (data_get($kenda, "$vanalisSCKenda.pengikatan_sempurna") ?? data_get($kenda, "$vcabSCKenda.pengikatan_sempurna")) == 'Fiducia' ? 'selected' : '' }}
                value="Fiducia">
                Fiducia</option>
            <option
                {{ (data_get($kenda, "$vanalisSCKenda.pengikatan_sempurna") ?? data_get($kenda, "$vcabSCKenda.pengikatan_sempurna")) == 'Fiducia Notaris' ? 'selected' : '' }}
                value="Fiducia Notaris">Fiducia Notaris</option>
            <option
                {{ (data_get($kenda, "$vanalisSCKenda.pengikatan_sempurna") ?? data_get($kenda, "$vcabSCKenda.pengikatan_sempurna")) == 'Bawah Tangan' ? 'selected' : '' }}
                value="Bawah Tangan">Bawah Tangan</option>
        </select>
    </div>
</div>
<div class="col-md-6 mb-3">
    <div class="form-group">
        <label class="notbold" for="penguasaan_{{ $loop->iteration }}">Penguasaan</label>
        <input type="text" name="penguasaan_{{ $loop->iteration }}" id="penguasaan_{{ $loop->iteration }}"
            class="form-control form-control-sm"
            value="{{ data_get($kenda, "$vanalisSCKenda.penguasaan") ?? data_get($kenda, "$vcabSCKenda.penguasaan") }}">
    </div>
</div>
<div class="col-md-12 mb-3">
    <div class="form-group">
        <label class="notbold" for="lainnya_{{ $loop->iteration }}">Lain-lain</label>
        <textarea name="lainnya_{{ $loop->iteration }}" id="lainnya_{{ $loop->iteration }}" cols="30" rows="4"
            class="form-control form-control-sm">{!! data_get($kenda, "$vanalisSCKenda.lainnya") ?? data_get($kenda, "$vcabSCKenda.lainnya") !!}</textarea>
    </div>
</div>
