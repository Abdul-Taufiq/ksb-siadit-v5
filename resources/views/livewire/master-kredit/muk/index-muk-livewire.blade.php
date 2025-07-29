<div>

    <div class="stat-cards-item">
        <div class="card-body w-100">
            {{-- Button --}}
            @if (Auth::user()->jabatan == 'Analis Cabang')
                <div class="row mb-3">
                    <div class="col-12 col-md-3 mb-2 mb-md-0">
                        <button type="button" class="btn btn-primary btn-sm w-100" data-bs-toggle="modal"
                            data-bs-target="#modal" wire:click='showModal("Add", "null")'>
                            <i class="fa-solid fa-user-plus"></i> Add Data MUK
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
                                @include('livewire.komponen.sorting-table', [
                                    'nameSort' => 'id_cabang',
                                    'displayName' => 'Cabang',
                                ])
                                @include('livewire.komponen.sorting-table', [
                                    'nameSort' => 'no_spk',
                                    'displayName' => 'No SPK',
                                ])
                                @include('livewire.komponen.sorting-table', [
                                    'nameSort' => 'no_muk',
                                    'displayName' => 'No MUK',
                                ])
                                @include('livewire.komponen.sorting-table', [
                                    'nameSort' => 'tgl_muk',
                                    'displayName' => 'Tanggal MUK',
                                ])
                                {{-- Aksi --}}
                                <th style="width: 65px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody style="vertical-align: middle">
                            @if ($muk->isNotEmpty())
                                @foreach ($muk as $data => $item)
                                    <tr wire:key='{{ sha1($item->id) }}'>
                                        <td>{{ $loop->index + $muk->firstItem() }}</td>
                                        <td>{{ $item->kredit->cabang->cabang }}</td>
                                        <td>{{ $item->kredit->no_spk }}</td>
                                        <td>{{ $item->no_muk }}</td>
                                        <td>{{ $item->tgl_muk->translatedFormat('d F Y') }}</td>
                                        <td>
                                            <a href="{{ route('muk.show', encrypt($item->id_muk)) }}"
                                                class="btn btn-info btn-sm btn-aksi" title="Show Detail">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            {{-- aksi edit --}}
                                            @if (Auth::user()->jabatan == 'Analis Cabang' && $item->kredit->status_analis == null)
                                                <a href="{{ route('muk.edit', base64_encode($item->id_muk)) }}"
                                                    class="btn btn-warning btn-sm btn-aksi edit_data" title="Edit">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            @else
                                                <a href="#"
                                                    class="btn btn-outline-warning btn-sm btn-aksi edit_data disabled"
                                                    title="Edit">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            @endif
                                        </td>
                                        {{-- <td>
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
                                        </td> --}}
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

                {{ $muk->onEachSide(1)->links('vendor.livewire.bootstrap', data: ['scrollTo' => false]) }}
            </div>
        </div>
    </div>


    @include('livewire.master-kredit.muk.modal-muk')

</div>

@section('script')
    <script>
        Livewire.on("inisialSelect2", () => {
            $('#spk').select2({
                theme: "bootstrap-5",
                width: $('#spk').attr('data-width') ? $('#spk').attr('data-width') : $('#spk').hasClass(
                    'w-100') ? '100%' : 'style',
                placeholder: $('#spk').attr('data-placeholder'),
                dropdownParent: $('#modal')
            });
        });

        window.addEventListener('resetSelect2', function() {
            console.log('hiden');
        })


        // if click otw link
        $('#spk').on("change", function() {
            let id = $(this).val();
            window.location.href = '/muk/form-muk/add/' + id;
        })
    </script>
@endsection
