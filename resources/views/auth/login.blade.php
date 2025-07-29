@include('layouts.header')
@yield('header')

<main class="page-center" style="background-color: #d6d6d6bd;">
    {{-- loading screen --}}
    <div id="loading-screen"
        style="display: none; justify-content: center; align-items: center; position: fixed; width: 100%; height: 100%; background: #000000bd;z-index: 9999; top: 0; left: 0;">
        <div
            style="display: flex; margin: auto; width: 100%; height: 100%; justify-content: center; align-items: center;">
            <img style="width: 150px;" src="{{ asset('images/error_image/Loading Screen 2.gif') }}" alt="Loading...">
        </div>
    </div>
    <article class="sign-up" style="width: 380px;">

        <form class="sign-up-form form" method="POST" action="{{ route('login') }}" style="padding: 20px 25px;">
            @csrf
            <center>
                <img src="{{ asset('images/logo ksb.png') }}" alt="logo"
                    style="max-width: 75%; padding-bottom: 10px;">
                <p class="sign-up__subtitle mb-0" style="font-size: 15px;">Sign in to continue Open <b>Aplikasi
                        SIADIT</b></p>
            </center>
            <hr>

            <label class="form-label-wrapper">
                <p class="form-label">Email</p>
                <input class="form-input" type="text" placeholder="Enter your email" name="email"
                    value="{{ old('email') }}" required autocomplete="off" autofocus required>
            </label>

            <label class="form-label-wrapper">
                <p class="form-label">Password
                    <label id="showPW" class="ms-4" style="background-color:transparent" onclick="showPassword()">
                        <i class="fa-regular fa-eye-slash" id="icon_pw"></i>
                    </label>
                </p>
                <input class="form-input" type="password" placeholder="Enter your password" id="password"
                    name="password" required autocomplete="off">
            </label>

            <div class="form-group mb-2">
                <div class="hasil_refereshrecapcha d-inline">
                    {!! captcha_img('math') !!}
                </div>
                {{-- refresh captcha --}}
                <a class="btn btn-default btn-icon-split" style="padding: 10px;" href="javascript:void(0)"
                    onclick="refreshCaptcha()">
                    <span>
                        <i class="fas fa-sync"></i>
                    </span>
                </a>
            </div>
            <div class="form-group mb-2">
                <input type="text"
                    class="form-input form-control form-control-user @error('captcha') is-invalid @enderror"
                    name="captcha" required id="captcha" placeholder="Enter Captcha">
                @error('captcha')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            @if (Route::has('password.request'))
                <a class="link-info forget-link" href="{{ route('password.request') }}">Forgot your password?</a>
            @endif

            <label class="form-checkbox-wrapper">
                <input class="form-checkbox" type="checkbox" name="remember" id="remember"
                    {{ old('remember') ? 'checked' : '' }}>
                <span class="form-checkbox-label">Remember me next time</span>
            </label>

            <button class="form-btn btn btn-primary">Sign in</button>

        </form>
    </article>
</main>

@yield('footer')
@include('layouts.footer')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    function refreshCaptcha() {
        $.ajax({
            url: "/refereshcapcha",
            type: 'get',
            dataType: 'html',
            success: function(json) {
                $('.hasil_refereshrecapcha').html(json);
            },
            error: function(data) {
                alert('Try Again.');
            }
        });
    }

    function showPassword() {
        var x = document.getElementById("password");
        var icon = document.getElementById("icon_pw");
        if (x.type === "password") {
            x.type = "text";
            icon.className = "fa-regular fa-eye";
        } else {
            x.type = "password";
            icon.className = "fa-regular fa-eye-slash";
        }
    }
</script>

{{-- Sweet Alert Pesan Gagal --}}
@if (session('loginError'))
    <script>
        Swal.fire({
            title: 'Gagal Login!',
            html: 'User atau password yang Anda masukan salah!',
            icon: 'error',
            confirmButtonText: 'OK'
        });
    </script>
@endif

</body>

</html>
