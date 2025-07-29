<div>
    {{-- Success is as dangerous as failure. --}}
    {{-- Success is as dangerous as failure. --}}
    <div class="container py-2">
        <form id="quickFormEdit" enctype="multipart/form-data">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Add Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 mb-2">
                        <strong><i>Data :</i></strong>
                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="nik">NIK</label>
                            <input type="text" class="form-control form-control-sm" id="nik_edit" name="nik"
                                placeholder="NIK" required maxlength="16" inputmode="numeric" wire:model='nik'>
                            @error('nik')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control form-control-sm" id="nama_edit" name="nama"
                                placeholder="Nama" required wire:model='nama'>
                            @error('nama')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="place">Tempat Lahir</label>
                            <input type="text" class="form-control form-control-sm" id="place_edit" name="place"
                                placeholder="Tempat lahir" required wire:model='place'>
                            @error('place')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="birth_date">Tanggal Lahir</label>
                            <input type="date" class="form-control form-control-sm" id="birth_date_edit"
                                name="birth_date" required data-date-format="YYYY-MM-DD" wire:model='birth_date'>
                            @error('birth_date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md 6 mb-3">
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select class="form-control form-control-sm" name="gender" id="gender_edit" required
                                wire:model='gender'>
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
                            <label for="phone_number">No Telp</label>
                            <input type="text" class="form-control form-control-sm" id="phone_number_edit"
                                name="phone_number" placeholder="no telp" required wire:model='phone_number'
                                inputmode="numeric">
                            @error('phone_number')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea type="text" class="form-control form-control-sm" id="address_edit" name="address" wire:model="address"
                                required placeholder="Alamat" wire:model='address'></textarea>
                            @error('address')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 mb-2">
                        <strong><i>Akun :</i></strong>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control form-control-sm" id="username_edit"
                                name="username" placeholder="Username" required maxlength="20" wire:model='username'>
                            @error('username')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md 6 mb-3">
                        <div class="form-group">
                            <label for="role">Role/Hak akses</label>
                            <select class="form-control form-control-sm" name="role" id="role_edit" required
                                wire:model='role'>
                                <option value="NotSet" selected disabled>-Pilih role-</option>
                                <option value="admin">admin</option>
                                <option value="super admin">super admin</option>
                            </select>
                            @error('role')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="jabatan">Jabatan</label>
                            <input type="text" class="form-control form-control-sm" id="jabatan_edit"
                                name="jabatan" placeholder="jabatan" required wire:model='jabatan'>
                            @error('jabatan')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control form-control-sm" id="email_edit"
                                name="email" placeholder="Email" required wire:model='email'>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="text" class="form-control form-control-sm" id="password_edit"
                                name="password" placeholder="Password" required wire:model='password'>
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="password_confirmation">Password Confirm</label>
                            <input type="text" class="form-control form-control-sm"
                                id="password_confirmation_edit" name="password_confirmation"
                                wire:model="password_confirmation" required placeholder="Masukkan ulang password">
                            @error('password_confirmation')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                </div>

                <div class="form-check mb-0 mt-2">
                    <div class="form-group">
                        <input class="form-check-input form-control form-control-sm" type="checkbox" id="termsEdit"
                            name="termsEdit" required>
                        <label class="form-check-label mt-1" for="termsEdit">
                            Saya setuju dengan <a href="#"><strong>Syarat dan Ketentuan</strong></a>
                            yang berlaku
                        </label>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" id="simpanEdit" class="btn btn-primary"><i
                        class="fa-regular fa-floppy-disk"></i> Save</button>
            </div>
        </form>
    </div>
</div>
