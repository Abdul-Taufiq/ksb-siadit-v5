<div>
    <div class="row">
        <div class="col-md-12 mb-2">
            <strong><i>Data :</i></strong>
        </div>
        <div class="col-md-6 mb-3">
            <div class="form-group">
                <label for="nik{{ $idField }}">NIK</label>
                <input type="text"
                    class="form-control form-control-sm {{ $errors->has('nik') ? 'is-invalid' : ($nik ? 'is-valid' : 'is-invalid') }}"
                    id="nik{{ $idField }}" name="nik" placeholder="NIK" required maxlength="16"
                    inputmode="numeric" wire:model.live='nik'>
                @error('nik')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="form-group">
                <label for="nama{{ $idField }}">Nama</label>
                <input type="text"
                    class="form-control form-control-sm {{ $errors->has('nama') ? 'is-invalid' : ($nama ? 'is-valid' : 'is-invalid') }}"
                    id="nama{{ $idField }}" name="nama" placeholder="Nama" required wire:model.live='nama'>
                @error('nama')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="form-group">
                <label for="place{{ $idField }}">Tempat Lahir</label>
                <input type="text"
                    class="form-control form-control-sm {{ $errors->has('place') ? 'is-invalid' : ($place ? 'is-valid' : 'is-invalid') }}"
                    id="place{{ $idField }}" name="place" placeholder="Tempat lahir" required
                    wire:model.live='place'>
                @error('place')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="form-group">
                <label for="birth_date{{ $idField }}">Tanggal Lahir</label>
                <input type="date"
                    class="form-control form-control-sm {{ $errors->has('birth_date') ? 'is-invalid' : ($birth_date ? 'is-valid' : 'is-invalid') }}"
                    id="birth_date{{ $idField }}" name="birth_date" required data-date-format="YYYY-MM-DD"
                    wire:model.live='birth_date'>
                @error('birth_date')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md 6 mb-3">
            <div class="form-group">
                <label for="gender{{ $idField }}">Gender</label>
                <select
                    class="form-control form-control-sm {{ $errors->has('gender') ? 'is-invalid' : ($gender != 'NotSet' ? 'is-valid' : 'is-invalid') }}"
                    name="gender" id="gender{{ $idField }}" required wire:model.live='gender'>
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
                <label for="phone_number{{ $idField }}">No Telp</label>
                <input type="text"
                    class="form-control form-control-sm {{ $errors->has('phone_number') ? 'is-invalid' : ($phone_number ? 'is-valid' : 'is-invalid') }}"
                    id="phone_number{{ $idField }}" name="phone_number" placeholder="No Telp" required
                    wire:model.live='phone_number' inputmode="numeric" maxlength="16">
                @error('phone_number')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="form-group">
                <label for="address{{ $idField }}">Address</label>
                <textarea type="text"
                    class="form-control form-control-sm {{ $errors->has('address') ? 'is-invalid' : ($address ? 'is-valid' : 'is-invalid') }}"
                    id="address{{ $idField }}" name="address" wire:model.live="address" required placeholder="Alamat"></textarea>
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
                <label for="username{{ $idField }}">Username</label>
                <input type="text"
                    class="form-control form-control-sm {{ $errors->has('username') ? 'is-invalid' : ($username ? 'is-valid' : 'is-invalid') }}"
                    id="username{{ $idField }}" name="username" placeholder="Username" required maxlength="20"
                    wire:model.live='username'>
                @error('username')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md 6 mb-3">
            <div class="form-group">
                <label for="role{{ $idField }}">Role/Hak akses</label>
                <select
                    class="form-control form-control-sm {{ $errors->has('role') ? 'is-invalid' : ($role != 'NotSet' ? 'is-valid' : 'is-invalid') }}"
                    name="role" id="role{{ $idField }}" required wire:model.live='role'>
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
                <label for="jabatan{{ $idField }}">Jabatan</label>
                <input type="text"
                    class="form-control form-control-sm {{ $errors->has('jabatan') ? 'is-invalid' : ($jabatan ? 'is-valid' : 'is-invalid') }}"
                    id="jabatan{{ $idField }}" name="jabatan" placeholder="jabatan" required
                    wire:model.live='jabatan'>
                @error('jabatan')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="form-group">
                <label for="email{{ $idField }}">Email</label>
                <input type="email"
                    class="form-control form-control-sm {{ $errors->has('email') ? 'is-invalid' : ($email ? 'is-valid' : 'is-invalid') }}"
                    id="email{{ $idField }}" name="email" placeholder="Email" required
                    wire:model.live='email'>
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="form-group">
                <label for="password{{ $idField }}">Password</label>
                <input type="text"
                    class="form-control form-control-sm {{ $errors->has('password') ? 'is-invalid' : ($password ? 'is-valid' : 'is-invalid') }}"
                    id="password{{ $idField }}" name="password" placeholder="Password" required
                    wire:model.live='password'>
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="form-group">
                <label for="password_confirmation{{ $idField }}">Password Confirm</label>
                <input type="text"
                    class="form-control form-control-sm {{ $errors->has('password_confirmation') ? 'is-invalid' : ($password_confirmation ? 'is-valid' : 'is-invalid') }}"
                    id="password_confirmation{{ $idField }}" name="password_confirmation"
                    wire:model.live="password_confirmation" required placeholder="Masukkan ulang password">
                @error('password_confirmation')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

    </div>
</div>
