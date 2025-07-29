@switch(Auth::user()->jabatan)
    @case('Legal')
        @if ($pkpmk->kredit->status_kaops == 'Approve' && $pkpmk->kredit->status_legal != 'Printed')
            <span class="badge text-bg-info" style="font-size: 11px;" title="Kaops Approve">
                <i class="fa-solid fa-check"></i> Oke!
            </span>
        @elseif ($pkpmk->kredit->status_legal == 'Terkirim')
            <span class="badge text-bg-success" style="font-size: 11px;" title="Approved">
                <i class="fa-solid fa-check"></i> Sended
            </span>
        @elseif ($pkpmk->kredit->status_legal == 'Dikembalikan')
            <div class="btn-group dropend">
                <button type="button" class="btn btn-secondary dropdown-toggle"
                    style="width: 60px; height: 20px; font-size: 12px; margin: 0px; padding: 0px;" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Status
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <button type="button" class="dropdown-item"
                            onclick="if(confirm('Yakin Kirim Data Ke Kasi Operasional?')) { @this.call('SendKaops', 'Send', '{{ $type == 'pkpmk' ? base64_encode($pkpmk->id_pkpmk) : base64_encode($pkpmk->id_addendum) }}') }">
                            Kirim Ke Kaops
                        </button>
                    </li>
                </ul>
            </div>
        @elseif ($pkpmk->kredit->status_legal == 'Printed')
            <span class="badge text-bg-success" style="font-size: 11px;" title="Approved">
                <i class="fa-solid fa-check"></i> Printed
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
                        <button type="button" class="dropdown-item"
                            onclick="if(confirm('Yakin Kirim Data Ke Kasi Operasional?')) { @this.call('SendKaops', 'Send', '{{ $type == 'pkpmk' ? base64_encode($pkpmk->id_pkpmk) : base64_encode($pkpmk->id_addendum) }}') }">
                            Kirim Ke Kaops
                        </button>
                    </li>
                </ul>
            </div>
        @endif
    @break

    {{-- kaops --}}
    @case('Kasi Operasional')
        @if ($pkpmk->kredit->status_kaops != null)
            <span class="badge text-bg-success" style="font-size: 11px;" title="Not Needed">
                <i class="fa-solid fa-circle-exclamation"></i> Approved
            </span>
        @elseif ($pkpmk->kredit->status_legal == 'Terkirim')
            <div class="btn-group dropend">
                <button type="button" class="btn btn-secondary dropdown-toggle"
                    style="width: 60px; height: 20px; font-size: 12px; margin: 0px; padding: 0px;" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Status
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalSPK"
                            wire:click='ShowModal("Approve", "{{ $type == 'pkpmk' ? base64_encode($pkpmk->id_pkpmk) : base64_encode($pkpmk->id_addendum) }}")'>Approve
                        </button>
                    </li>
                </ul>
            </div>
        @else
            <span class="badge text-bg-secondary" style="font-size: 11px;" title="Not Needed">
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
                    <div class="form-group mb-2">
                        <label for="keterangan_kaops">Kelengkapan?</label>
                        <select id="keterangan_kaops" class="form-select form-select-sm"
                            wire:model.live='keterangan_kaops'>
                            <option value="0" selected disabled>-Pilih-</option>
                            <option value="Lengkap">Lengkap</option>
                            <option value="Tidak Lengkap">Tidak Lengkap</option>
                        </select>
                    </div>
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
