@extends('layouts.main')
@section('konten')
    @push('styles')
        @livewireStyles
    @endpush

    @push('scripts')
        @livewireScripts
        <script src="{{ asset('script/myprofile/confirm.js') }}"></script>
    @endpush

    <main class="main users chart-page" id="skip-target" style="font-size: 12px;">

        <div class="container" style="margin-top: -10px">
            <div class="stat-cards-item" style="height:  60px; margin-bottom: 10px;">
                <div class="card-body" style="margin-top: -27px;">
                    <div class="row mt-3">
                        <div class="col-sm-6">
                            <h2 class="main-title float-sm-start" style="letter-spacing: 2px;">
                                My Profile
                            </h2>
                        </div>
                        <div class="col-sm-6 d-none d-sm-block">
                            <ol class="breadcrumb float-sm-end m-1">
                                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                                <li class="breadcrumb-item active">Halaman {{ $title }}</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="stat-cards-item mb-1">
                <div class="card-body">
                    <center>
                        <div class="rounded-circle"
                            style="background-color: rgb(240, 240, 240); max-width: 200px; width: 200px; display: flex;  border: 1px solid rgb(161, 161, 161);">
                            <img id="image"
                                src="{{ Auth::user()->gambar != null
                                    ? asset('images/profile_image/' . Auth::user()->gambar)
                                    : asset('template/img/avatar/avatar-illustrated-02.webp') }}"
                                alt="Image Profile" class="w-100"
                                style="border-radius: 50%; width: 200px; height: 200px; object-fit: cover;">
                        </div>
                    </center>

                    <center class="mt-2">
                        <label for="gambar">- Ganti Foto Profile -</label>
                    </center>

                    <form action="{{ url('profile/upload/' . $user->id) }} " method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="d-flex justify-content-center mt-2">
                            <div class="col-md-4">
                                <input type="file" name="gambar" id="gambar"
                                    class="form-control @error('gambar') is-invalid @enderror"
                                    accept="image/png, image, image/jpeg" onchange="upload(this);" required>

                                @error('gambar')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

            <div class="stat-cards-item">
                <div class="card-body">
                    <table class="table table-borderless table-striped w-100">
                        <tr>
                            <th class="table-primary">My Data </th>
                            <td class="table-primary" colspan="2">
                                <button data-bs-toggle="modal" data-bs-target="#staticBackdropAkun">
                                    <i class="text-primary">Change Data</i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <th>Nama</th>
                            <td>:</td>
                            <td>
                                {!! !empty($user->nama) ? $user->nama : '<i>Not Available</i>' !!}
                            </td>
                        </tr>
                        <tr>
                            <th>KC</th>
                            <td>:</td>
                            <td>
                                {{ $user->cabang->cabang }}
                            </td>
                        </tr>
                        <tr>
                            <th>Jabatan (Role)</th>
                            <td>:</td>
                            <td>
                                {!! !empty($user->level) ? $user->sub_jabatan . ' (' . $user->level . ')' : '<i>Not Available</i>' !!}
                            </td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>:</td>
                            <td>{{ $user->email }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <input type="hidden" id="true_passord" value="{{ $user->password_ori }}">


        <!-- Modal -->
        <div class="modal fade" id="staticBackdropAkun" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropAkunLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    @livewire('my-profil.profil-akun-livewire', ['user' => $user])
                </div>
            </div>
        </div>

    </main>
@endsection

@section('script')
    <script>
        // preview images
        function upload(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#image').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        // show password
        function showPassword() {
            var pw = document.getElementById("pw");
            var true_passord = document.getElementById("true_passord").value;
            if (pw.textContent === "**************") {
                // pw.type = "text";
                pw.textContent = true_passord;
            } else {
                // pw.type = "password";
                pw.textContent = "**************";
            }
        }
    </script>
@endsection
