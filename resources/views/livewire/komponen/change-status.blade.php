@php
    $jabatan = Auth::user()->jabatan;
@endphp

@switch($jabatan)
    {{-- AO --}}
    @case('AO')
        @if ($kredit->status_ao == null && $kredit->tgl_print_idi != null)
            @include('livewire.komponen.button-modal')
        @else
            @if ($kredit->status_ao == 'Terkirim' || $kredit->status_ao == 'Approve')
                <span class="badge text-bg-success" style="font-size: 11px;" title="Approved">
                    <i class="fa-solid fa-check"></i> Approved
                </span>
            @elseif ($kredit->status_ao == 'Reject')
                <span class="badge text-bg-danger" style="font-size: 11px;" title="Rejected">
                    <i class="fa-solid fa-xmark"></i> Rejected
                </span>
            @elseif ($kredit->status_ao == 'Cancel')
                <span class="badge text-bg-info" style="font-size: 11px;" title="Nasabah Cancel">
                    <i class="fa-solid fa-xmark"></i> Cancel
                </span>
            @else
                <span class="badge text-bg-warning" style="font-size: 11px;" title="Harus Lakukan Print IDI terlebih dahulu!">
                    <i class="fa-solid fa-circle-exclamation"></i> NotYet
                </span>
            @endif
        @endif
    @break

    {{-- Analis --}}
    @case('Analis Cabang')
        @if (Auth::user()->sub_jabatan == 'Analis Cabang (ALT)')
            <span class="badge text-bg-secondary" style="font-size: 11px;" title="Tidak Diperlukan">
                <i class="fa-solid fa-circle-exclamation"></i> NotNeeded
            </span>
        @elseif (Auth::user()->sub_jabatan == 'Staf Analis Area')
            @if (
                $kredit->status_ao != null &&
                    $kredit->status_ao == 'Approve' &&
                    $kredit->status_analis == null &&
                    $kredit->nama_analis == Auth::user()->nama)
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
                @elseif ($kredit->status_analis == 'Cancel')
                    <span class="badge text-bg-info" style="font-size: 11px;" title="Nasabah Cancel">
                        <i class="fa-solid fa-xmark"></i> Cancel
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
        @else
            @if (
                $kredit->status_ao != null &&
                    $kredit->status_ao != 'Cancel' &&
                    $kredit->status_ao != 'Reject' &&
                    $kredit->status_analis == null)
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
                @elseif ($kredit->status_analis == 'Cancel')
                    <span class="badge text-bg-info" style="font-size: 11px;" title="Nasabah Cancel">
                        <i class="fa-solid fa-xmark"></i> Cancel
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
        @endif
    @break

    {{-- Kasi Komersial --}}
    @case('Kasi Komersial')
        @if ($kredit->status_analis != null && $kredit->status_analis != 'Cancel' && $kredit->status_kakom == null)
            @if ($kredit->status_pincab == null)
                @include('livewire.komponen.button-modal')
            @else
                <span class="badge text-bg-info" style="font-size: 11px;" title="Ditarik Langsung Oleh Pincab">
                    <i class="fa-solid fa-circle-exclamation"></i> Handled
                </span>
            @endif
        @else
            @if ($kredit->status_kakom == 'Approve')
                <span class="badge text-bg-success" style="font-size: 11px;" title="Approved">
                    <i class="fa-solid fa-check"></i> Approved
                </span>
            @elseif ($kredit->status_kakom == 'Reject')
                <span class="badge text-bg-danger" style="font-size: 11px;" title="Rejected">
                    <i class="fa-solid fa-xmark"></i> Rejected
                </span>
            @else
                @if ($kredit->status_akhir == 'DEBITUR Cancel')
                    <span class="badge text-bg-info" style="font-size: 11px;" title="Nasabah Cancel">
                        <i class="fa-solid fa-xmark"></i> DEBITUR Cancel
                    </span>
                @else
                    <span class="badge text-bg-warning" style="font-size: 11px;" title="Belum Diperlukan">
                        <i class="fa-solid fa-circle-exclamation"></i> NotYet
                    </span>
                @endif
            @endif
        @endif
    @break

    {{-- Pimpinan Cabang --}}
    @case('Pimpinan Cabang')
        @if (
            $kredit->status_analis != null &&
                $kredit->status_analis != 'Cancel' &&
                $kredit->status_kakom != 'Cancel' &&
                $kredit->status_pincab == null)
            @include('livewire.komponen.button-modal')
        @else
            @if ($kredit->status_pincab == 'Approve')
                <span class="badge text-bg-success" style="font-size: 11px;" title="Approved">
                    <i class="fa-solid fa-check"></i> Approved
                </span>
            @elseif ($kredit->status_pincab == 'Reject')
                <span class="badge text-bg-danger" style="font-size: 11px;" title="Rejected">
                    <i class="fa-solid fa-xmark"></i> Rejected
                </span>
            @elseif ($kredit->status_pincab == 'SOS')
                <span class="badge text-bg-warning" style="font-size: 11px;" title="Rejected">
                    <i class="fa-solid fa-circle-exclamation"></i> SOSfromLegal
                </span>
            @else
                @if ($kredit->status_akhir == 'DEBITUR Cancel')
                    <span class="badge text-bg-info" style="font-size: 11px;" title="Nasabah Cancel">
                        <i class="fa-solid fa-xmark"></i> DEBITUR Cancel
                    </span>
                @else
                    <span class="badge text-bg-warning" style="font-size: 11px;" title="Belum Diperlukan">
                        <i class="fa-solid fa-circle-exclamation"></i> NotYet
                    </span>
                @endif
            @endif
        @endif
    @break

    {{-- Legal --}}
    @case('Legal')
        @if ($kredit->status_akhir == 'DISETUJUI')
            @if (
                $kredit->status_legal == 'Created' ||
                    ($kredit->status_legal == 'Terkirim') | ($kredit->status_legal == 'Print SPPK'))
                <div class="btn-group dropend">
                    <button type="button" class="btn btn-info dropdown-toggle"
                        style="width: 100px; height: 20px; font-size: 12px; margin: 0px; padding: 0px;"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-circle-exclamation"></i> onProccess
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
            @elseif ($kredit->status_legal == 'Printed')
                <span class="badge text-bg-success" style="font-size: 11px;" title="Legal Printed">
                    <i class="fa-solid fa-check"></i> Printed
                </span>
            @else
                <div class="btn-group dropend">
                    <button type="button" class="btn btn-secondary dropdown-toggle"
                        style="width: 60px; height: 20px; font-size: 12px; margin: 0px; padding: 0px;"
                        data-bs-toggle="dropdown" aria-expanded="false">
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
            @if ($kredit->status_legal == 'Tidak Diambil')
                <span class="badge text-bg-danger" style="font-size: 11px;" title="DISETUJUI (TIDAK DIAMBIL)">
                    <i class="fa-solid fa-xmark"></i> notTaken
                </span>
            @else
                <span class="badge text-bg-secondary" style="font-size: 11px;" title="Belum Diperlukan">
                    <i class="fa-solid fa-circle-exclamation"></i> NotYet
                </span>
            @endif
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
                    {{-- @if ($putusan != 'Cabang' && Auth::user()->jabatan == 'Pimpinan Cabang')
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
                    @endif --}}
                    @if ($putusan == 'Cabang' && Auth::user()->jabatan == 'Pimpinan Cabang')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="plafond" class="wajib">Plafond Yang Disetujui</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="plafond_sama_muk"
                                            wire:model.live='plafond_cek'>
                                        <label class="form-check-label notbold" for="plafond_sama_muk">
                                            Plafond Sama dengan MUK
                                        </label>
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-text">Rp.</span>
                                        <input type="text" class="form-control form-control-sm" id="plafond"
                                            name="plafond" wire:model.live='plafond'
                                            onkeyup="this.value = formatAngka(this.value)"
                                            {{ $plafond_cek == true ? 'disabled' : 'required' }}>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="jkw" class="wajib">Jangka Waktu Yang Disetujui</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="jkw_sama_muk"
                                            wire:model.live='jkw_cek'>
                                        <label class="form-check-label notbold" for="jkw_sama_muk">
                                            JKW Sama dengan MUK
                                        </label>
                                    </div>
                                    <input type="text" class="form-control form-control-sm" id="jkw"
                                        name="jkw" wire:model.live='jkw'
                                        onkeyup="this.value = formatAngka(this.value)"
                                        {{ $jkw_cek == true ? 'disabled' : 'required' }}>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="bunga" class="wajib">Bunga Yang Disetujui</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="bunga_sama_muk"
                                            wire:model.live='bunga_cek'>
                                        <label class="form-check-label notbold" for="bunga_sama_muk">
                                            Bunga Sama dengan MUK
                                        </label>
                                    </div>
                                    <input type="text" class="form-control form-control-sm" id="bunga"
                                        name="bunga" wire:model.live='bunga'
                                        onkeyup="this.value = formatAngka(this.value)"
                                        {{ $bunga_cek == true ? 'disabled' : 'required' }}>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if (!in_array($status, ['Tidak Diambil', 'Cancel']))
                        <div class="form-group mb-2">
                            <label for="rekomendasi">Rekomendasi?</label>
                            <select id="rekomendasi" class="form-select form-select-sm" wire:model.live='rekomendasi'
                                required>
                                <option value="0" selected disabled>-Pilih-</option>
                                @if (Auth::user()->jabatan == 'Pimpinan Cabang')
                                    @if ($putusan == 'Cabang')
                                        <option {{ $status == 'Reject' ? 'disabled' : '' }} value="ACC">
                                            ACC
                                        </option>
                                        <option {{ $status == 'Approve' ? 'disabled' : '' }} value="Tidak ACC">
                                            Tidak ACC
                                        </option>
                                    @else
                                        <option {{ $status == 'Reject' ? 'disabled' : '' }} value="Rekomendasi">
                                            Rekomendasi
                                        </option>
                                        <option {{ $status == 'Approve' ? 'disabled' : '' }}
                                            value="Tidak Rekomendasi">
                                            Tidak Rekomendasi
                                        </option>
                                    @endif
                                @else
                                    <option {{ $status == 'Reject' ? 'disabled' : '' }} value="Rekomendasi">
                                        Rekomendasi</option>
                                    <option {{ $status == 'Approve' ? 'disabled' : '' }} value="Tidak Rekomendasi">
                                        Tidak Rekomendasi
                                    </option>
                                @endif
                            </select>
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="catatan" class="wajib">Catatan : </label>
                        <div wire:ignore>
                            <textarea class="form-control" id="catatan" required wire:model='catatan' required></textarea>
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
                            <label class="text-danger" for="exampleCheck2"
                                style="font-size: 0.85rem !important"><i>Coution:
                                </i> Pastikan bahwa Anda telah
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
        // fungsi RP
        function formatAngka(angka) {
            var numberString = angka.replace(/[^,\d]/g, "").toString(),
                split = numberString.split(","),
                sisa = split[0].length % 3,
                hasil = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                var separator = sisa ? "." : "";
                hasil += separator + ribuan.join(".");
            }

            hasil = split[1] !== undefined ? hasil + "," + split[1] : hasil;

            return hasil;
        }


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
