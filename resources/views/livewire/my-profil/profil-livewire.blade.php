<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <div class="container py-2">
        <form id="quickForm">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Change Data <i><b>{{ $nama_user }}</b></i></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="nik">NIK</label>
                            <input type="text" class="form-control" id="nik" name="nik" wire:model="nik"
                                required maxlength="16">
                            @error('nik')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" wire:model="nama"
                                required>
                            @error('nama')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="place">Tempat Lahir</label>
                            <input type="text" class="form-control" id="place" name="place" wire:model="place"
                                required>
                            @error('place')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="birth_date">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="birth_date" name="birth_date"
                                wire:model="birth_date" required data-date-format="YYYY-MM-DD">
                            @error('birth_date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md 6">
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select class="form-control" name="gender" id="gender" wire:model='gender'>
                                <option value="NotSet" selected disabled>-Pilih Gender-</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                            @error('gender')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea type="text" class="form-control" id="address" name="address" wire:model="address" required></textarea>
                            @error('address')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="phone_number">No Telp</label>
                            <input type="text" class="form-control" id="phone_number" name="phone_number"
                                wire:model="phone_number" required>
                            @error('phone_number')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-check mb-0 mt-2">
                    <div class="form-group">
                        <input class="form-check-input form-control" type="checkbox" id="terms" name="terms"
                            required>
                        <label class="form-check-label mt-1" for="terms">
                            Saya setuju dengan <a href="#"><strong>Syarat dan Ketentuan</strong></a> yang berlaku
                        </label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                {{-- <button type="button" id="simpan" class="btn btn-primary" wire:click="confirmUpdate">Update</button> --}}
                <button type="button" id="simpan" class="btn btn-primary"><i class="fa-regular fa-floppy-disk"></i>
                    Update</button>
            </div>
        </form>
    </div>
</div>
