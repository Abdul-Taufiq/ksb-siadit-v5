<div>
    <div class="stat-cards-item">
        <div class="card-body w-100">
            {{-- Button --}}
            @if (Auth::user()->jabatan == 'Kasi Operasional')
                <div class="row mb-3">
                    <div class="col-12 col-md-3 mb-2 mb-md-0">
                        <button type="button" class="btn btn-primary btn-sm w-100" data-bs-toggle="modal"
                            data-bs-target="#modal" wire:click='ShowModal("Add", "null")'>
                            <i class="fa-solid fa-user-plus"></i> Add Data
                        </button>
                    </div>
                </div>
            @endif

            <div class="">
                {{-- Tables --}}
                @include('livewire.komponen.searching-table')

                <div class="table-responsive">
                    <table class="table table-striped table-hover table-sm w-100">
                        <thead class="table-primary">
                            <tr>
                                <th style="width: 5%; vertical-align: middle">No</th>
                                {{-- cabang --}}
                                @include('livewire.komponen.sorting-table', [
                                    'nameSort' => 'id_cabang',
                                    'displayName' => 'kantor Cabang',
                                ])
                                @include('livewire.komponen.sorting-table', [
                                    'nameSort' => 'kode',
                                    'displayName' => 'Kode',
                                ])
                                @include('livewire.komponen.sorting-table', [
                                    'nameSort' => 'sertifikat',
                                    'displayName' => 'Sertifikat/Nomor',
                                ])
                                @include('livewire.komponen.sorting-table', [
                                    'nameSort' => 'jns_perikatan',
                                    'displayName' => 'Jenis Perikatan',
                                ])
                                @include('livewire.komponen.sorting-table', [
                                    'nameSort' => 'progress',
                                    'displayName' => 'Progress',
                                ])
                                @include('livewire.komponen.sorting-table', [
                                    'nameSort' => 'status',
                                    'displayName' => 'Status',
                                ])
                                {{-- Aksi --}}
                                <th style="width: 65px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody style="vertical-align: middle">
                            @if ($tapht->isNotEmpty())
                                @foreach ($tapht as $data => $item)
                                    <tr wire:key='{{ sha1($item->id) }}'>
                                        <td>{{ $loop->index + $tapht->firstItem() }}</td>
                                        <td>{{ $item->cabang->cabang }}</td>
                                        <td>{{ $item->kode }}</td>
                                        <td>
                                            {{ $item->sertifikat }}
                                            No: {{ $item->nomor }}
                                        </td>
                                        <td>{{ $item->jns_perikatan }}</td>
                                        <td>{{ $item->progress }}</td>
                                        <td>
                                            @if ($item->status == 'Proses')
                                                <span class="badge text-bg-warning">Proses</span>
                                            @elseif ($item->status == 'Selesai')
                                                <span class="badge text-bg-success">Selesai</span>
                                            @else
                                                <span class="badge text-bg-danger">Ditolak</span>
                                            @endif

                                        </td>
                                        <td>
                                            <a type="button" class="btn btn-info btn-sm btn-aksi"
                                                href="{{ route('apht.show', base64_encode($item->id_tapht)) }}">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            @if ($item->created_at->startOfDay()->diffInDays(now()) < 2 && Auth::user()->jabatan == 'Kasi Operasional')
                                                <button type="button" class="btn btn-warning btn-sm btn-aksi"
                                                    data-bs-toggle="modal" data-bs-target="#modal"
                                                    wire:click='ShowModal("Edit", "{{ base64_encode($item->id_tapht) }}")'
                                                    title="Edit Data">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                            @else
                                                <button type="button" class="btn btn-warning btn-sm btn-aksi" disabled
                                                    title="Edit Data">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="8" class="text-center"><i>Tidak Ada Data</i></td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>

                {{ $tapht->onEachSide(1)->links('vendor.livewire.bootstrap', data: ['scrollTo' => false]) }}
            </div>
        </div>
    </div>



    {{-- agar tidak tabrakan dengan style di css global --}}
    <style>
        .note-editor .note-editable ol {
            list-style-type: decimal !important;
            /* Pastikan angka tetap muncul */
            padding-left: 20px !important;
            /* Sesuaikan indentasi */
        }

        .note-editor .note-editable ul {
            list-style-type: disc !important;
            /* Pastikan bullet tetap muncul */
            padding-left: 20px !important;
        }
    </style>

    @include('livewire.lainnya.tapht.t-apht-modal')

</div>
