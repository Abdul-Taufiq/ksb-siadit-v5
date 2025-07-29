<div>
    {{-- Success is as dangerous as failure. --}}
    <div class="container py-2">
        <form id="quickFormAdd" enctype="multipart/form-data">
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
                            <input type="text" class="form-control form-control-sm" id="nik" name="nik"
                                placeholder="NIK" required maxlength="16" inputmode="numeric" wire:model='nik'>
                            @error('nik')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control form-control-sm" id="nama" name="nama"
                                placeholder="Nama" required wire:model='nama'>
                            @error('nama')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="place">Tempat Lahir</label>
                            <input type="text" class="form-control form-control-sm" id="place" name="place"
                                placeholder="Tempat lahir" required wire:model='place'>
                            @error('place')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="birth_date">Tanggal Lahir</label>
                            <input type="date" class="form-control form-control-sm" id="birth_date" name="birth_date"
                                required data-date-format="YYYY-MM-DD" wire:model='birth_date'>
                            @error('birth_date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md 6 mb-3">
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select class="form-control form-control-sm" name="gender" id="gender" required
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
                            <input type="text" class="form-control form-control-sm" id="phone_number"
                                name="phone_number" placeholder="no telp" required wire:model='phone_number'
                                inputmode="numeric" maxlength="16">
                            @error('phone_number')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea type="text" class="form-control form-control-sm" id="address" name="address" wire:model="address"
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
                            <input type="text" class="form-control form-control-sm" id="username" name="username"
                                placeholder="Username" required maxlength="20" wire:model='username'>
                            @error('username')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md 6 mb-3">
                        <div class="form-group">
                            <label for="role">Role/Hak akses</label>
                            <select class="form-control form-control-sm" name="role" id="role" required
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
                            <input type="text" class="form-control form-control-sm" id="jabatan" name="jabatan"
                                placeholder="jabatan" required wire:model='jabatan'>
                            @error('jabatan')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control form-control-sm" id="email" name="email"
                                placeholder="Email" required wire:model='email'>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="text" class="form-control form-control-sm" id="password"
                                name="password" placeholder="Password" required wire:model='password'>
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="password_confirmation">Password Confirm</label>
                            <input type="text" class="form-control form-control-sm" id="password_confirmation"
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
                        <input class="form-check-input form-control form-control-sm" type="checkbox" id="termsAdd"
                            name="termsAdd" required>
                        <label class="form-check-label mt-1" for="termsAdd">
                            Saya setuju dengan <a href="#"><strong>Syarat dan Ketentuan</strong></a>
                            yang berlaku
                        </label>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" id="simpanAdd" class="btn btn-primary"><i
                        class="fa-regular fa-floppy-disk"></i> Save</button>
            </div>
        </form>
    </div>
</div>
