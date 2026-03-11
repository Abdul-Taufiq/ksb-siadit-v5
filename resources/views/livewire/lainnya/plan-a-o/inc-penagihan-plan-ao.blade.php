<div class="table-responsive table-responsive-md" id="table-container">
    <table class="table table-striped table-hover table-sm" id="exportTablePenagihan">
        <thead class="table-primary">
            <tr>
                <th style="vertical-align: middle; min-width: 50px;">No</th>
                <th style="text-align: left; min-width: 150px;">Cabang</th>
                <th style="text-align: left; min-width: 150px;">Tanggal Rencana</th>
                <th style="text-align: left; min-width: 150px;">Kategori Rencana</th>
                <th style="text-align: left; min-width: 170px;">Nama Debitur</th>
                <th style="text-align: left; min-width: 170px;">Jenis Kegiatan</th>
                <th style="text-align: left; min-width: 200px;">Baki Debet</th>
                <th style="text-align: left; min-width: 200px;">Total Tagihan</th>
                <th style=" min-width: 50px;">Angsuran Ke</th>
                <th style="text-align: left; min-width: 400px;">Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @if ($monPen->isNotEmpty())
                @foreach ($monPen as $data => $item)
                    <tr wire:key='{{ sha1($item->id) }}'>

                        <td style="text-align: center;">{{ $loop->index + $monPen->firstItem() }}
                        </td>
                        <td>{{ $item->cabang->cabang }}</td>
                        <td>
                            {{ $item->tgl_plan?->format('d-m-Y') ?? '-' }}
                        </td>
                        <td>{{ $item->kategori_plan }}</td>

                        @if ($item->kategori_plan != 'Rencana Lainnya')
                            <td>{{ $item->nama_deb }}</td>
                        @endif
                        <td>{{ $item->alamat_jns_kegiatan }}</td>


                        @if ($item->kategori_plan == 'Rencana Prospek')
                            @php
                                $shortenHp = function ($name, $maxLength = 5) {
                                    return strlen($name) > $maxLength
                                        ? substr($name, 0, $maxLength) . 'xxxxxxx'
                                        : $name;
                                };
                            @endphp

                            <td>{{ $item->jns_usaha }}</td>
                            <td data-full="{{ $item->no_telp }}" data-short="{{ $shortenHp($item->no_telp) }}"
                                onmouseover="this.textContent=this.dataset.full"
                                onmouseout="this.textContent=this.dataset.short">
                                {{ $shortenHp($item->no_telp) }}
                            </td>
                        @endif

                        @if ($item->kategori_plan == 'Rencana Lainnya')
                            <td>{{ $item->tujuan_kunjungan }}</td>
                        @endif


                        @if ($item->kategori_plan == 'Rencana Penagihan')
                            <td>
                                {{ $item->baki_debet == 0 || $item->baki_debet == null ? '-' : 'Rp' . number_format($item->baki_debet, 0, ',', '.') }}
                            </td>
                            <td>
                                {{ $item->total_tagihan == 0 || $item->total_tagihan == null ? '-' : 'Rp' . number_format($item->total_tagihan, 0, ',', '.') }}
                            </td>
                        @endif
                        @if ($item->kategori_plan != 'Rencana Lainnya')
                            <td style="text-align: center;">{{ $item->visit_asr_ke }}</td>
                        @endif


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

{{ $monPen->onEachSide(1)->links('vendor.livewire.bootstrap', data: ['scrollTo' => false]) }}
