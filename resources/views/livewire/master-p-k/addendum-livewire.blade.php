<div>

    <div class="stat-cards-item">
        <div class="card-body w-100">
            {{-- Button --}}
            @if (Auth::user()->jabatan == 'Legal')
                <div class="row mb-3">
                    <div class="col-12 col-md-3 mb-2 mb-md-0">
                        <button type="button" class="btn btn-primary btn-sm w-100" data-bs-toggle="modal"
                            data-bs-target="#modal" wire:click='ShowModal("Add", "null")'>
                            <i class="fa-solid fa-user-plus"></i> Add Data Perjanjian Kredit
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
                                    'displayName' => 'Data SPK',
                                ])
                                @include('livewire.komponen.sorting-table', [
                                    'nameSort' => 'no_addendum',
                                    'displayName' => 'No PK',
                                ])
                                @include('livewire.komponen.sorting-table', [
                                    'nameSort' => 'tgl_addendum',
                                    'displayName' => 'Tanggal PK',
                                ])
                                {{-- Aksi --}}
                                <th>Status</th>
                                <th style="width: 65px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody style="vertical-align: middle">
                            @if ($pkpmk->isNotEmpty())
                                @foreach ($pkpmk as $data => $item)
                                    <tr wire:key='{{ sha1($item->id) }}'>
                                        <td>{{ $loop->index + $pkpmk->firstItem() }}</td>
                                        <td>{{ $item->kredit->cabang->cabang }}</td>
                                        <td>
                                            <b>No SPK: </b> {{ $item->kredit->no_spk }}<br>
                                            <b>No SPPK: </b> {{ $item->no_sppk ?? '-' }} <br>
                                            <b>Nama: </b> {{ $item->debitur->nama_debitur }}
                                        </td>
                                        <td>{{ $item->no_addendum ?? '-' }}</td>
                                        <td>{{ $item->tgl_addendum?->translatedFormat('d M Y, H:i') ?? '-' }}</td>
                                        <td>
                                            {{-- Status --}}
                                            @include('livewire.komponen.change-status-pkpmk', [
                                                'pkpmk' => $item,
                                                'type' => 'Addendum',
                                            ])
                                            {{-- End Status --}}
                                        </td>
                                        <td>
                                            <a href="{{ route('addendum.show', encrypt($item->id_addendum)) }}"
                                                class="btn btn-info btn-sm btn-aksi" title="Show Detail">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            {{-- aksi edit --}}
                                            @if (Auth::user()->jabatan == 'Legal' && $item->kredit->status_legal == 'Created')
                                                <a href="{{ route('addendum.edit', base64_encode($item->id_kredit)) }}"
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

                {{ $pkpmk->onEachSide(1)->links('vendor.livewire.bootstrap', data: ['scrollTo' => false]) }}
            </div>
        </div>
    </div>


    @include('livewire.master-kredit.muk.modal-muk')

</div>

@section('script')
    <script src="{{ asset('script/master-kredit/debitur/debitur-livewire.js') }}"></script>
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
            window.location.href = '/addendum/add/' + id;
        })
    </script>


    <script>
        Livewire.on("initializeSummernote", () => {
            $('#catatan').summernote({
                placeholder: 'Isikan Catatan ....',
                tabsize: 2,
                height: 150,
                toolbar: [
                    // [groupName, [list of button]]
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']]
                ],
                callbacks: {
                    onImageUpload: function(files) {
                        alert("Penyisipan gambar dan vidio dinonaktifkan!");
                    },
                    onMediaDelete: function(files) {
                        alert("Penyisipan gambar dan vidio dinonaktifkan!");
                    },
                    onChange: function(contents, $editable) {
                        // Mengupdate nilai catatan di Livewire saat konten editor berubah
                        @this.set('catatan', contents);
                    }
                },
                styleTags: ['p', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6'], // Pastikan format tetap ada
                followingToolbar: false,
                iframe: true // Aktifkan mode iframe untuk mengisolasi styling!


            });
        });

        window.addEventListener('resetSummernote', function() {
            $('#catatan').summernote('code', ''); // Kosongkan teks editor di frontend
        });
    </script>
@endsection
