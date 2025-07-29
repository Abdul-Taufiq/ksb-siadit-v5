@switch(Auth::user()->jabatan)
    {{-- AO --}}
    @case('AO')
        @if ($kredit->status_ao == null)
            @include('livewire.komponen.button-modal')
        @else
            @if ($kredit->status_ao == 'Terkirim' || $kredit->status_ao == 'Approve')
                <span class="badge text-bg-success" style="font-size: 11px;" title="Approved">
                    <i class="fa-solid fa-check"></i> Approved
                </span>
            @else
                <span class="badge text-bg-danger" style="font-size: 11px;" title="Rejected">
                    <i class="fa-solid fa-xmark"></i> Rejected
                </span>
            @endif
        @endif
    @break

    {{-- Analis --}}
    @case('Analis Cabang')
        @if ($kredit->status_ao != null && $kredit->status_ao != 'Reject' && $kredit->status_analis == null)
            @include('livewire.komponen.button-modal')
        @else
            @if ($kredit->status_analis == 'Approve')
                <span class="badge text-bg-success" style="font-size: 11px;" title="Approved">
                    <i class="fa-solid fa-check"></i> Approved
                </span>
            @elseif ($kredit->status_analis == 'Reject')
                <span class="badge text-bg-danger" style="font-size: 11px;" title="Rejected">
                    <i class="fa-solid fa-xmark"></i> Rejected
                </span>
            @else
                @if ($kredit->status_ao == 'Reject')
                    <span class="badge text-bg-danger" style="font-size: 11px;" title="Rejected">
                        <i class="fa-solid fa-xmark"></i> RejectedAO
                    </span>
                @else
                    <span class="badge text-bg-warning" style="font-size: 11px;" title="Belum Diperlukan">
                        <i class="fa-solid fa-circle-exclamation"></i> NotYet
                    </span>
                @endif
            @endif
        @endif
    @break

    {{-- Kasi Komersial --}}
    @case('Kasi Komersial')
        @if ($kredit->status_analis != null && $kredit->status_kakom == null)
            @include('livewire.komponen.button-modal')
        @else
            @if ($kredit->status_analis == 'Approve')
                <span class="badge text-bg-success" style="font-size: 11px;" title="Approved">
                    <i class="fa-solid fa-check"></i> Approved
                </span>
            @elseif ($kredit->status_analis == 'Reject')
                <span class="badge text-bg-danger" style="font-size: 11px;" title="Rejected">
                    <i class="fa-solid fa-xmark"></i> Rejected
                </span>
            @else
                <span class="badge text-bg-warning" style="font-size: 11px;" title="Belum Diperlukan">
                    <i class="fa-solid fa-circle-exclamation"></i> NotYet
                </span>
            @endif
        @endif
    @break

    {{-- Pimpinan Cabang --}}
    @case('Pimpinan Cabang')
        @if ($kredit->status_analis != null && $kredit->status_pincab == null)
            @include('livewire.komponen.button-modal')
        @else
            @if ($kredit->status_analis == 'Approve')
                <span class="badge text-bg-success" style="font-size: 11px;" title="Approved">
                    <i class="fa-solid fa-check"></i> Approved
                </span>
            @elseif ($kredit->status_analis == 'Reject')
                <span class="badge text-bg-danger" style="font-size: 11px;" title="Rejected">
                    <i class="fa-solid fa-xmark"></i> Rejected
                </span>
            @else
                <span class="badge text-bg-warning" style="font-size: 11px;" title="Belum Diperlukan">
                    <i class="fa-solid fa-circle-exclamation"></i> NotYet
                </span>
            @endif
        @endif
    @break

    {{-- Legal --}}
    @case('Legal')
        @if ($kredit->status_akhir == 'DISETUJUI')
            @if ($kredit->status_legal == 'Created' || $kredit->status_legal == 'Terkirim')
                <span class="badge text-bg-info" style="font-size: 11px;" title="Created PK/Sended To Kaops">
                    <i class="fa-solid fa-circle-exclamation"></i> onProccess
                </span>
            @elseif ($kredit->status_legal == 'Printed')
                <span class="badge text-bg-success" style="font-size: 11px;" title="Legal Printed">
                    <i class="fa-solid fa-check"></i> Printed
                </span>
            @elseif ($kredit->status_legal == 'Tidak Diambil')
                <span class="badge text-bg-warning" style="font-size: 11px;" title="DISETUJUI (TIDAK DIAMBIL)">
                    <i class="fa-solid fa-xmark"></i> notTaken
                </span>
            @else
                <div class="btn-group dropend">
                    <button type="button" class="btn btn-secondary dropdown-toggle"
                        style="width: 60px; height: 20px; font-size: 12px; margin: 0px; padding: 0px;" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Status
                    </button>
                    <ul class="dropdown-menu">
                        <li>
                            <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalSPK"
                                wire:click='ShowModal("Tidak Diambil", "{{ $kredit->no_spk }}", "{{ base64_encode($kredit->id_kredit) }}")'>
                                Tidak Diambil
                            </button>
                        </li>
                    </ul>
                </div>
            @endif
        @else
            <span class="badge text-bg-secondary" style="font-size: 11px;" title="Belum Diperlukan">
                <i class="fa-solid fa-circle-exclamation"></i> NotYet
            </span>
        @endif
    @break

    @default
        <span class="badge text-bg-secondary" style="font-size: 11px;" title="Not Needed">
            <i class="fa-solid fa-circle-exclamation"></i> NotNeeded
        </span>
    @break

@endswitch

<!-- Modal -->
<div wire:ignore.self class="modal fade" id="modalSPK" tabindex="-1" aria-labelledby="modalSPKLabel"
    aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <form id="quickFormAdd" enctype="multipart/form-data">
                <div class="modal-header">
                    <h1 style="font-size: 15px;">{{ $modal_title }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click='HideModal'
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if ($putusan != 'Cabang' && Auth::user()->jabatan == 'Pimpinan Cabang')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="analis_area">Analis Area</label>
                                    <select class="form-select" id="analis_area" data-placeholder="Choose one thing">
                                        <option value=""></option>
                                        @foreach ($analis_area as $xdata => $item)
                                            <option value="{{ $item->nama }}">
                                                {{ $item->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="analis_komite">Analis Komite</label>
                                    <select class="form-select" id="analis_komite"
                                        data-placeholder="Choose one thing">
                                        <option value=""></option>
                                        @foreach ($analis_komite as $xdata => $item)
                                            <option value="{{ $item->nama }}">
                                                {{ $item->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if ($status != 'Tidak Diambil')
                        <div class="form-group mb-2">
                            <label for="rekomendasi">Rekomendasi?</label>
                            <select id="rekomendasi" class="form-select form-select-sm"
                                wire:model.live='rekomendasi'>
                                <option value="0" selected disabled>-Pilih-</option>
                                <option value="Rekomendasi">Rekomendasi</option>
                                <option value="Tidak Rekomendasi">Tidak Rekomendasi</option>
                            </select>
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="catatan">Catatan : </label>
                        <div wire:ignore>
                            <textarea class="form-control" id="catatan" required wire:model='catatan'></textarea>
                        </div>
                    </div>
                    <br>
                    <input type="hidden" name="encryptedId" id="encryptedId" value="">
                    <div class="form-group mb-0">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="terms" class="custom-control-input" id="exampleCheck2"
                                required>
                            <label class="custom-control-label" for="exampleCheck2">Saya setuju dengan
                                <a style="color: blue" href="#">ketentuan yang berlaku</a>.</label>
                            <label class="text-danger" for="exampleCheck2"><i>Coution: </i> Pastikan bahwa Anda telah
                                yakin untuk melakukan aksi ini! & Pastikan mengisinya dengan seksama karena akan
                                ditampilkan kedalam MUK -> PUTUSAN</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                        wire:click='HideModal'>Close</button>
                    <button type="button" class="btn btn-primary" id="simpanAdd"> <i
                            class="fa-regular fa-floppy-disk"></i>
                        Save</button>
                </div>
            </form>
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


@push('scripts')
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

    <script>
        Livewire.on("inisialSelect2", () => {
            setTimeout(() => {
                $('#analis_area')
                    .select2({
                        theme: 'bootstrap-5',
                        placeholder: $('#analis_area').attr('data-placeholder'),
                        dropdownParent: $('#modalSPK')
                    })
                    .off('change') // hilangkan event lama
                    .on('change', function(e) {
                        let val = $(this).val();
                        @this.set('analis_area_selected', val);
                        Livewire.dispatch("reCallSelect");
                    });

                $('#analis_komite')
                    .select2({
                        theme: 'bootstrap-5',
                        placeholder: $('#analis_komite').attr('data-placeholder'),
                        dropdownParent: $('#modalSPK')
                    })
                    .off('change') // hilangkan event lama
                    .on('change', function(e) {
                        let val = $(this).val();
                        @this.set('analis_komite_selected', val);
                        Livewire.dispatch("reCallSelect");
                    });
            }, 250);
        });
    </script>
@endpush
