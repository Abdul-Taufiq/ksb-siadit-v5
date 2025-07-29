<div>
    {{-- The best athlete wants his opponent at his best. --}}
    {{-- fitur searching --}}
    @include('livewire.komponen.searching-table')

    <div class="table-responsive">
        <table class="table table-striped table-hover table-sm w-100">
            <thead class="table-primary">
                <tr>
                    <th style="width: 5%; vertical-align: middle">No</th>
                    {{-- cabang --}}
                    @include('livewire.komponen.sorting-table', [
                        'nameSort' => 'id_cabang',
                        'displayName' => 'Cabang',
                    ])
                    {{-- no spk --}}
                    @include('livewire.komponen.sorting-table', [
                        'nameSort' => 'no_spk',
                        'displayName' => 'No SPK',
                    ])
                    {{-- nama debitur --}}
                    @include('livewire.komponen.sorting-table', [
                        'nameSort' => 'nama_debitur',
                        'displayName' => 'Nama Debitur',
                    ])
                    {{-- status --}}
                    <th style="vertical-align: middle;">Status</th>
                    <th style="width: 6%; vertical-align: middle;">Aksi</th>
                </tr>
            </thead>
            <tbody style="vertical-align: middle">
                @if ($kredit->isNotEmpty())
                    @foreach ($kredit as $data => $item)
                        <tr wire:key='{{ sha1($item->id_kredit) }}'>
                            <td>{{ $loop->index + $kredit->firstItem() }}</td>
                            <td>{{ $item->cabang->cabang }}</td>
                            <td>{{ $item->no_spk }}</td>
                            <td>{{ $item->debitur->nama_debitur }}</td>
                            <td>
                                {{-- Status --}}
                                @include('livewire.komponen.change-status', [
                                    'kredit' => $item,
                                ])
                                {{-- End Status --}}
                            </td>
                            <td>
                                <a href="{{ route('debitur.show', encrypt($item->id_kredit)) }}"
                                    class="btn btn-info btn-sm btn-aksi" title="Show Detail">
                                    <i class="fa fa-eye"></i>
                                </a>
                                {{-- aksi edit --}}
                                @include('livewire.komponen.aksi-edit', [
                                    'kredit' => $item,
                                ])
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6" class="text-center"><i>Tidak Ada Data</i></td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>


    {{ $kredit->onEachSide(1)->links('vendor.livewire.bootstrap', data: ['scrollTo' => false]) }}

</div>
