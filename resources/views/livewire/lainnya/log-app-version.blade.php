<div>
    <div class="stat-cards-item">
        <div class="card-body w-100">
            {{-- Button --}}
            @if (Auth::user()->jabatan == 'TSI')
                <div class="row mb-3">
                    <div class="col-12 col-md-3 mb-2 mb-md-0">
                        <button type="button" class="btn btn-primary btn-sm w-100" data-bs-toggle="modal"
                            data-bs-target="#modal" wire:click='ShowModal("Add", "null")'>
                            <i class="fa-solid fa-user-plus"></i> Add Version
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
                                    'nameSort' => 'kode_versi',
                                    'displayName' => 'Kode Versi',
                                ])
                                {{-- no spk --}}
                                @include('livewire.komponen.sorting-table', [
                                    'nameSort' => 'pembaruan',
                                    'displayName' => 'Pembaruan',
                                ])
                                {{-- Email --}}
                                @include('livewire.komponen.sorting-table', [
                                    'nameSort' => 'file',
                                    'displayName' => 'File',
                                ])
                                {{-- Email --}}
                                @include('livewire.komponen.sorting-table', [
                                    'nameSort' => 'tgl_rilis',
                                    'displayName' => 'Tanggal Rilis',
                                ])
                                {{-- Aksi --}}
                                <th style="width: 65px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody style="vertical-align: middle">
                            @if ($version->isNotEmpty())
                                @foreach ($version as $data => $item)
                                    <tr wire:key='{{ sha1($item->id) }}'>
                                        <td>{{ $loop->index + $version->firstItem() }}</td>
                                        <td>{{ $item->kode_versi }}</td>
                                        <td>{!! $item->pembaruan !!}</td>
                                        <td class="text-primary">
                                            @if ($item->file == '-')
                                                {{ $item->file }}
                                            @else
                                                <a href="{{ asset('file_upload/juknis/' . $item->file) }}"
                                                    target="_blank">
                                                    {{ $item->file ? $item->file : 'null' }}
                                                </a>
                                            @endif
                                        </td>
                                        <td>{{ $item->tgl_rilis ? $item->tgl_rilis->translatedFormat('d F Y') : '-' }}
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-info btn-sm btn-aksi"
                                                data-bs-toggle="modal" data-bs-target="#modalShow"
                                                wire:click='ShowModal("Show", "{{ base64_encode($item->id) }}")'
                                                title="Show Detail">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                            @if (Auth::user()->jabatan == 'TSI')
                                                <button type="button" class="btn btn-warning btn-sm btn-aksi"
                                                    data-bs-toggle="modal" data-bs-target="#modal"
                                                    wire:click='ShowModal("Edit", "{{ base64_encode($item->id) }}")'
                                                    title="Edit Data">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                            @endif
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

                {{ $version->onEachSide(1)->links('vendor.livewire.bootstrap', data: ['scrollTo' => false]) }}
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

    @include('livewire.lainnya.log-app-version-modal')

</div>
