<div class="col-md-4 mb-3">
    <div class="form-group">
        <label for="dokumen_kepemilikan_{{ $loop->iteration }}">Dokumen Kepemilikan</label>
        <input type="text" name="dokumen_kepemilikan_{{ $loop->iteration }}"
            id="dokumen_kepemilikan_{{ $loop->iteration }}" class="form-control form-control-sm"
            value="{{ $kenda->sc_kenda_agunan?->dokumen_kepemilikan ?? 'BPKB' }}">
    </div>
</div>
<div class="col-md-4 mb-3">
    <div class="form-group">
        <label for="no_dokumen_{{ $loop->iteration }}">Nomor</label>
        <input type="text" name="no_dokumen_{{ $loop->iteration }}" id="no_dokumen_{{ $loop->iteration }}"
            class="form-control form-control-sm" value="{{ $kenda->sc_kenda_agunan?->no_dokumen ?? $kenda->no_bpkb }}">
    </div>
</div>
<div class="col-md-4 mb-3">
    <div class="form-group">
        <label for="tgl_dokumen_{{ $loop->iteration }}">Tanggal</label>
        <input type="date" name="tgl_dokumen_{{ $loop->iteration }}" id="tgl_dokumen_{{ $loop->iteration }}"
            class="form-control form-control-sm"
            value="{{ $kenda->sc_kenda_agunan?->tgl_dokumen?->format('Y-m-d') ?? $kenda->tgl_bpkb }}">
    </div>
</div>
<div class="col-md-6 mb-3">
    <div class="form-group">
        <label for="dokumen_pembelian_{{ $loop->iteration }}">Dokumen Pembelian</label>
        <input type="text" name="dokumen_pembelian_{{ $loop->iteration }}"
            id="dokumen_pembelian_{{ $loop->iteration }}" class="form-control form-control-sm"
            value="{{ $kenda->sc_kenda_agunan?->dokumen_pembelian }}">
    </div>
</div>
<div class="col-md-6 mb-3">
    <div class="form-group">
        <label for="atas_nama_kenda_{{ $loop->iteration }}">Atas Nama</label>
        <input type="text" name="atas_nama_kenda_{{ $loop->iteration }}"
            id="atas_nama_kenda_{{ $loop->iteration }}" class="form-control form-control-sm"
            value="{{ $kenda->sc_kenda_agunan?->atas_nama ?? $kenda->atas_nama }}">
    </div>
</div>
<div class="col-md-6 mb-3">
    <div class="form-group">
        <label for="asuransi_{{ $loop->iteration }}">Asuransi</label>
        <input type="text" name="asuransi_{{ $loop->iteration }}" id="asuransi_{{ $loop->iteration }}"
            class="form-control form-control-sm" value="{{ $kenda->sc_kenda_agunan?->asuransi }}">
    </div>
</div>
<div class="col-md-6 mb-3">
    <div class="form-group">
        <label for="jns_penutupan_{{ $loop->iteration }}">Jenis Penutupan</label>
        <input type="text" name="jns_penutupan_{{ $loop->iteration }}" id="jns_penutupan_{{ $loop->iteration }}"
            class="form-control form-control-sm" value="{{ $kenda->sc_kenda_agunan?->jns_penutupan }}">
    </div>
</div>
<div class="col-md-6 mb-3">
    <div class="form-group">
        <label for="nilai_pertanggungan_{{ $loop->iteration }}">Nilai Pertanggungan</label>
        <input type="text" name="nilai_pertanggungan_{{ $loop->iteration }}"
            id="nilai_pertanggungan_{{ $loop->iteration }}" class="form-control form-control-sm"
            value="{{ $kenda->sc_kenda_agunan?->nilai_pertanggungan }}">
    </div>
</div>
<div class="col-md-6 mb-3">
    <div class="form-group">
        <label for="perusahaan_asuransi_{{ $loop->iteration }}">Perusahaan Asuransi</label>
        <input type="text" name="perusahaan_asuransi_{{ $loop->iteration }}"
            id="perusahaan_asuransi_{{ $loop->iteration }}" class="form-control form-control-sm"
            value="{{ $kenda->sc_kenda_agunan?->perusahaan_asuransi }}">
    </div>
</div>
