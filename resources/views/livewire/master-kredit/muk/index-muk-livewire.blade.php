<div>

    <div class="stat-cards-item">
        <div class="card-body w-100">
            {{-- Button --}}
            @if (Auth::user()->jabatan == 'Analis Cabang')
                <div class="row mb-3">
                    <div class="col-12 col-md-3 mb-2 mb-md-0">
                        <button type="button" class="btn btn-primary btn-sm w-100" data-bs-toggle="modal"
                            data-bs-target="#modal" wire:click='ShowModal("Add", "null", "null")'>
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
                                <th>Status</th>
                                {{-- Aksi --}}
                                <th style="width: 65px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody style="vertical-align: middle">
                            @if ($muk->isNotEmpty())
                                @foreach ($muk as $data => $item)
                                    <tr wire:key='{{ sha1($item->id_muk) }}'>
                                        <td>{{ $loop->index + $muk->firstItem() }}</td>
                                        <td>{{ $item->kredit->cabang->cabang }}</td>
                                        <td>
                                            {{ $item->kredit->no_spk }} <br>
                                            <b>AN: </b> {{ $item->kredit->debitur->nama_debitur }}

                                        </td>
                                        <td>{{ $item->no_muk }}</td>
                                        <td>{{ $item->tgl_muk->translatedFormat('d F Y') }}</td>
                                        <td>
                                            @if ($item->status_pincab == 'Approve' && $item->status_kakom == null)
                                                {{-- untuk analis cabang atau analis area --}}
                                                @if (Auth::user()->jabatan == 'Kasi Komersial' || Auth::user()->jabatan == 'Pimpinan Cabang')
                                                    <div class="btn-group dropend">
                                                        <button type="button" class="btn btn-secondary dropdown-toggle"
                                                            style="width: 60px; height: 20px; font-size: 12px; margin: 0px; padding: 0px;"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                            Status
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                            <li>
                                                                <button type="button" class="dropdown-item"
                                                                    data-bs-toggle="modal" data-bs-target="#modalID"
                                                                    wire:click='ShowModal("Approve", "{{ $item->no_muk }}", "{{ base64_encode($item->kredit->id_kredit) }}")'>Approve
                                                                </button>
                                                            </li>
                                                            <li>
                                                                <button type="button" class="dropdown-item"
                                                                    data-bs-toggle="modal" data-bs-target="#modalID"
                                                                    wire:click='ShowModal("Reject", "{{ $item->no_muk }}", "{{ base64_encode($item->kredit->id_kredit) }}")'>Reject</button>
                                                            </li>
                                                    </div>
                                                @else
                                                    <span class="badge text-bg-info" style="font-size: 11px;"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        data-bs-custom-class="custom-tooltip"
                                                        data-bs-title="Status ini hanya untuk follow up putusan selain cabang dan hanya KAKOM yang update statusnya. <br> Perubahan status dapat dilakukan di menu DATA DEBITUR">
                                                        <i class="fa-solid fa-circle-exclamation"></i> NotNeeded
                                                    </span>
                                                @endif
                                            @elseif ($item->status_kakom == 'Approve')
                                                <span class="badge text-bg-success" style="font-size: 11px;"
                                                    title="Approved">
                                                    <i class="fa-solid fa-check"></i> Approved
                                                </span>
                                            @elseif ($item->status_kakom == 'Reject')
                                                <span class="badge text-bg-danger" style="font-size: 11px;"
                                                    title="Rejected">
                                                    <i class="fa-solid fa-xmark"></i> Rejected
                                                </span>
                                            @else
                                                <span class="badge text-bg-info" style="font-size: 11px;"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    data-bs-custom-class="custom-tooltip"
                                                    data-bs-title="Status ini hanya untuk follow up putusan selain cabang dan hanya KAKOM yang update statusnya, <br> Perubahan status dapat dilakukan di menu DATA DEBITUR">
                                                    <i class="fa-solid fa-circle-exclamation"></i> NotNeeded
                                                </span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('muk.show', encrypt($item->id_muk)) }}"
                                                class="btn btn-info btn-sm btn-aksi" title="Show Detail">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            {{-- aksi edit --}}
                                            @php
                                                $pkpmkPrinted = $item->kredit->pkpmk->first()?->tgl_print_pkpmk;
                                                $addendumPrinted = $item->kredit->addendum?->tgl_print_addendum;
                                                if ($pkpmkPrinted != null) {
                                                    $pkPrint = $item->kredit->pkpmk->first()?->tgl_print_pkpmk;
                                                } else {
                                                    $pkPrint = null;
                                                }

                                                if ($addendumPrinted != null) {
                                                    $addPrint = $item->kredit->addendum?->tgl_print_addendum;
                                                } else {
                                                    $addPrint = null;
                                                }
                                            @endphp

                                            @if (Auth::user()->sub_jabatan == 'Staf Analis Area' || Auth::user()->jabatan == 'Analis Cabang')
                                                @if ($item->status_pincab != null && $item->status_kakom != null)
                                                    @if ($pkPrint != null || $addPrint != null)
                                                        <a href="#"
                                                            class="btn btn-outline-warning btn-sm btn-aksi edit_data disabled"
                                                            title="Edit">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                    @else
                                                        <a href="{{ route('muk.edit', base64_encode($item->id_muk)) }}"
                                                            class="btn btn-warning btn-sm btn-aksi edit_data"
                                                            title="Edit">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                    @endif
                                                @else
                                                    @if (Auth::user()->sub_jabatan == 'Staf Analis Area')
                                                        @if ($item->kredit->nama_analis == null || $item->kredit->nama_analis == Auth::user()->nama)
                                                            @if ($pkPrint != null || $addPrint != null)
                                                                <a href="#"
                                                                    class="btn btn-outline-warning btn-sm btn-aksi edit_data disabled"
                                                                    title="Edit">
                                                                    <i class="fa fa-edit"></i>
                                                                </a>
                                                            @else
                                                                <a href="{{ route('muk.edit', base64_encode($item->id_muk)) }}"
                                                                    class="btn btn-warning btn-sm btn-aksi edit_data"
                                                                    title="Edit">
                                                                    <i class="fa fa-edit"></i>
                                                                </a>
                                                            @endif
                                                        @else
                                                            <a href="#"
                                                                class="btn btn-outline-warning btn-sm btn-aksi edit_data disabled"
                                                                title="Edit">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                        @endif
                                                    @else
                                                        {{-- @if ($pkPrint != null || $addPrint != null)
                                                            <a href="#"
                                                                class="btn btn-outline-warning btn-sm btn-aksi edit_data disabled"
                                                                title="Edit">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                        @else --}}
                                                        <a href="{{ route('muk.edit', base64_encode($item->id_muk)) }}"
                                                            class="btn btn-warning btn-sm btn-aksi edit_data"
                                                            title="Edit">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        {{-- @endif --}}
                                                    @endif
                                                @endif
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

                {{ $muk->onEachSide(1)->links('vendor.livewire.bootstrap', data: ['scrollTo' => false]) }}
            </div>
        </div>
    </div>


    @include('livewire.master-kredit.muk.modal-muk')

    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="modalID" tabindex="-1" aria-labelledby="modalSPKLabel"
        aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <form id="quickForm" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h1 style="font-size: 15px;">{{ $modal_title }}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click='HideModal'
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
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

                        <div class="row mb-4">
                            <div class="col-md-12">
                                <label for="file_putusan">Upload File Putusan MUK</label>
                                <input type="file" name="file_putusan" id="file_putusan"
                                    class="form-control @error('file_putusan') is-invalid @enderror"
                                    accept="application/pdf" required wire:model='file_putusan'>
                                @error('file_putusan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <input type="hidden" name="encryptedId" id="encryptedId" value="">
                        <input type="hidden" name="metode" id="metode" value="{{ $metode }}">
                        <div class="form-group mb-0">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="terms" class="custom-control-input" id="terms"
                                    required>
                                <label class="custom-control-label" for="terms">Saya setuju dengan
                                    <a style="color: blue" href="#">ketentuan yang berlaku</a>.</label>
                                <label class="text-danger" for="terms"
                                    style="font-size: 0.85rem !important"><i>Coution:
                                    </i>Pastikan file PDF dengan ukuran tidak lebih dari 2MB</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                            wire:click='HideModal'>Close</button>
                        <button wire:loading.attr='disabled' wire:target='file_putusan' type="button"
                            class="btn btn-primary" id="simpan">

                            <span wire:loading.remove wire:target='file_putusan'>
                                <i class="fa-regular fa-floppy-disk"></i> Save
                            </span>

                            <span wire:loading wire:target='file_putusan'>
                                <i class="fa fa-spinner fa-spin"></i> Uploading...
                            </span>

                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

@push('scripts')
    <script src="{{ asset('script/js-for-livewire/confirm-action.js') }}"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const inputFile = document.getElementById("file_putusan");
            const simpanButton = document.getElementById("simpan");

            inputFile.addEventListener("change", function() {
                const file = this.files[0];

                if (file) {
                    const ukuranMaksimal = 2 * 1024 * 1024; // 2MB

                    if (file.size > ukuranMaksimal) {
                        alert("Ukuran file lebih dari 2MB. Silakan pilih file yang lebih kecil.");
                        simpanButton.disabled = true;
                        simpanButton.classList.add('d-none');
                    } else {
                        simpanButton.disabled = false;
                        simpanButton.classList.remove('d-none');
                    }
                } else {
                    simpanButton.disabled = true; // jika tidak ada file
                }
            });
        });
    </script>
@endpush

@section('script')
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
