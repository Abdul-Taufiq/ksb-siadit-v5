<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <div class="container py-2">
        <form id="quickFormUpdateAkun">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Change Data <i><b>{{ $nama_user }}</b></i></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" wire:model="nama"
                                required maxlength="16">
                            @error('nama')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" wire:model="email"
                                required>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="text" class="form-control" id="password" name="password"
                                wire:model="password" required>
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="password_confirmation">Password Confirm</label>
                            <input type="text" class="form-control" id="password_confirmation"
                                name="password_confirmation" wire:model="password_confirmation" required
                                placeholder="Masukkan ulang password">
                            @error('password_confirmation')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                </div>

                <div class="form-check mb-0 mt-2">
                    <div class="form-group">
                        <input class="form-check-input form-control" type="checkbox" id="termsakun" name="termsakun"
                            required>
                        <label class="form-check-label mt-1" for="termsakun">
                            Saya setuju dengan <a href="#"><strong>Syarat dan Ketentuan</strong></a> yang berlaku
                        </label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                {{-- <button type="button" id="simpanAkun" class="btn btn-primary"
                    wire:click="confirmUpdateAkun">Update</button> --}}
                <button type="button" id="simpanAkun" class="btn btn-primary"><i class="fa-regular fa-floppy-disk"></i>
                    Update</button>
            </div>
        </form>
    </div>
</div>
