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
                    <th>NIK</th>
                    <th>Nama Debitur</th>
                    {{-- status --}}
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
                            <td>{{ $item->debitur->nik }}</td>
                            <td>{{ $item->debitur->nama_debitur }}</td>
                            <td>
                                <button type="button" class="btn btn-info btn-sm btn-aksi" data-bs-toggle="modal"
                                    data-bs-target="#modalShow"
                                    wire:click='ShowModal("{{ $item->no_spk }}", "{{ base64_encode($item->id_kredit) }}")'
                                    title="Show Detail">
                                    <i class="fa fa-eye"></i>
                                </button>
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


    {{-- modal --}}
    <div wire:ignore.self class="modal fade" id="modalShow" tabindex="-1" aria-labelledby="modalShowLabel"
        aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <form id="quickFormAdd" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h1 style="font-size: 15px;" class="text-secondary">{{ $modal_title }}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click='HideModal'
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <iframe src="{{ $srcIframe }}" frameborder="1" width="100%" height="350px"></iframe>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                            wire:click='HideModal'>Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
