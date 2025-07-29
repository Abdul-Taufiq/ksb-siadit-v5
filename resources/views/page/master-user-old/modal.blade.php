<!-- Modal Add -->
<div class="modal fade" id="Tambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="TambahLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div>
                @livewire('master-user.user-add-livewire')
            </div>
        </div>
    </div>
</div>


<!-- Modal Show -->
<div class="modal fade" id="Detail" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="DetailLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="container py-2">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Show Detail Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <iframe id="frameDetail" type="" width="100%" height="400px"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    {{-- <button type="button" id="simpanAdd" class="btn btn-primary"><i
                                class="fa-regular fa-floppy-disk"></i> Save</button> --}}
                </div>
            </div>
        </div>
    </div>
</div>
