<div class="row" style="font-size: {{ strpos(url()->current(), 'print') !== false ? '8pt' : '9pt' }}">
    <div class="col-md-12 mb-3">
        <strong>Prospek Usaha :</strong>
        <div class="px-2">
            {!! $muk->data->prospek_usaha !!}
        </div>
    </div>
</div>
<div class="row" style="font-size: {{ strpos(url()->current(), 'print') !== false ? '8pt' : '9pt' }}">
    <div class="col-md-12 mb-3">
        <strong>Konsentrasi Pemasok dan Pelanggan :</strong>
        <div class="px-2">
            {!! $muk->data->pemasok_dan_pelanggan !!}
        </div>
    </div>
</div>


@foreach ($industri as $index => $item)
    @if ($index % 2 == 0)
        <div class="row">
    @endif
    <div class="col-md-6 mb-3">
        <strong>{{ $item->type_data }}</strong>
        <table class="table table-striped table-sm w-100 mb-0">
            <tr>
                <td style="width: 30%">Nama</td>
                <td style="width: 1%">:</td>
                <td>
                    {{ $item->nama }}
                </td>
            </tr>
            <tr>
                <td>Hubungan</td>
                <td>:</td>
                <td>
                    {{ $item->hubungan }}
                </td>
            </tr>
            <tr>
                <td>Lama Hubungan</td>
                <td>:</td>
                <td>
                    {{ $item->lama_hubungan }}
                </td>
            </tr>
            <tr>
                <td>No. Hp/Telp</td>
                <td>:</td>
                <td>
                    {{ $item->no_hp }}
                </td>
            </tr>
            <tr>
                <td>Keterangan</td>
                <td>:</td>
                <td>
                    {!! $item->keterangan !!}
                </td>
            </tr>
        </table>
    </div>
    @if ($index % 2 == 1 || $loop->last)
        </div>
    @endif
@endforeach
