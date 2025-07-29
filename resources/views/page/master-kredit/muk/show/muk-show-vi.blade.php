<div class="row" style="font-size: {{ strpos(url()->current(), 'print') !== false ? '8pt' : '9pt' }}">
    <div class="col-md-12 mb-3">
        <strong>Tujuan Pinjaman :</strong>
        <div class="px-2">
            {!! $muk->data->tujuan_pinjaman !!}
        </div>
    </div>
</div>
<div class="row" style="font-size: {{ strpos(url()->current(), 'print') !== false ? '8pt' : '9pt' }}">
    <div class="col-md-12 mb-3">
        <strong>Pengalaman Usaha :</strong>
        <div class="px-2">
            {!! $muk->data->pengalaman_usaha !!}
        </div>
    </div>
</div>
<div class="row" style="font-size: {{ strpos(url()->current(), 'print') !== false ? '8pt' : '9pt' }}">
    <div class="col-md-12 mb-3">
        <strong>Reputasi Lokal :</strong>
        <div class="px-2">
            {!! $muk->data->reputasi_lokal !!}
        </div>
    </div>
</div>
<div class="row" style="font-size: {{ strpos(url()->current(), 'print') !== false ? '8pt' : '9pt' }}">
    <div class="col-md-12 mb-3">
        <strong>Hubungan Dengan Bank :</strong>
        <div class="px-2">
            {!! $muk->data->hubungan_bank !!}
        </div>
    </div>
</div>
