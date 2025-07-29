<div>
    <div wire:ignore.self class="modal fade" id="Edit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="EditLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="container">
                    <form id="quickFormEdit" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Edit Data</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            {{-- field --}}
                            @include('livewire.master-user.user-field-modal')

                            <div class="form-check mb-0 mt-2">
                                <div class="form-group">
                                    <input class="form-check-input form-control form-control-sm" type="checkbox"
                                        id="termsEdit" name="termsEdit" required>
                                    <label class="form-check-label mt-1" for="termsEdit">
                                        Saya setuju dengan <a href="#"><strong>Syarat dan Ketentuan</strong></a>
                                        yang berlaku
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            {{-- <button type="button" id="simpanEdit" class="btn btn-primary"
                                wire:click.prevent='StoreUser'><i class="fa-regular fa-floppy-disk"></i> Save</button> --}} {{-- langsung ke livewire --}}
                            <button type="button" id="simpanEdit" class="btn btn-primary"><i
                                    class="fa-regular fa-floppy-disk"></i> Save</button> {{-- menggunakan JS --}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
