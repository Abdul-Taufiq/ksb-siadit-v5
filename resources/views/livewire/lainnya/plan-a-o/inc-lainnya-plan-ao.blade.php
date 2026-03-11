<div class="table-responsive table-responsive-md" id="table-container">
    <table class="table table-striped table-hover table-sm" id="exportTableLainnya">
        <thead class="table-primary">
            <tr>
                <th style="vertical-align: middle; min-width: 50px;">No</th>
                <th style="text-align: left; min-width: 150px;">Cabang</th>
                <th style="text-align: left; min-width: 150px;">Tanggal Rencana</th>
                <th style="text-align: left; min-width: 150px;">Kategori Rencana</th>
                <th style="text-align: left; min-width: 150px;">Tujuan/Lokasi Kunjungan <br></th>
                <th style="text-align: left; min-width: 200px;">Jenis Kegiatan</th>
                <th style="text-align: left; min-width: 400px;">Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @if ($monLan->isNotEmpty())
                @foreach ($monLan as $data => $item)
                    <tr wire:key='{{ sha1($item->id) }}'>

                        <td style="text-align: center;">{{ $loop->index + $monLan->firstItem() }}
                        </td>
                        <td>{{ $item->cabang->cabang }}</td>
                        <td>
                            {{ $item->tgl_plan?->format('d-m-Y') ?? '-' }}
                        </td>
                        <td>{{ $item->kategori_plan }}</td>

                        @if ($item->kategori_plan == 'Rencana Lainnya')
                            <td>{{ $item->tujuan_kunjungan }}</td>
                        @endif
                        <td>{{ $item->alamat_jns_kegiatan }}</td>


                        <td class="text" style="min-width: 350px;">{!! $item->keterangan !!}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="15" class="text-center"><i>Tidak Ada Data</i></td>
                </tr>
            @endif
        </tbody>
    </table>
</div>

{{ $monLan->onEachSide(1)->links('vendor.livewire.bootstrap', data: ['scrollTo' => false]) }}
