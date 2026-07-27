@extends('layouts.main')
@section('konten')

    <style>
        article {
            padding: 0.85rem 0.85rem 0.85rem 1.50rem !important;
        }

        html[data-bs-theme="dark"] .stat-cards-info__num {
            color: #dee2e6 !important;
        }
    </style>

    <main class="main users chart-page" id="skip-target">

        <div class="container" style="margin-top: -10px">

            <div class="stat-cards-item" style="height:  60px; margin-bottom: 10px;">
                <div class="card-body" style="margin-top: -25px;">
                    <div class="row mt-3">
                        <div class="col-sm-6">
                            <h2 class="main-title float-sm-start" style="letter-spacing: 2px;">
                                {{ $title }}
                            </h2>
                        </div>
                        <div class="col-sm-6 col-sm-6 d-none d-sm-block">
                            <ol class="breadcrumb float-sm-end m-1">
                                <li class="breadcrumb-item active" style="font-size: 12px">Home</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="stat-cards-item" style="height:  60px; margin-bottom: 10px;">
                <div class="card-body" style="margin-top: -25px;">
                    <div class="row mt-3">
                        <div class="col-sm-6 text-start" style="font-size: 14px; margin-top: 5px;">
                            <i class="fa fa-clock" aria-hidden="true"></i>
                            <b id="dateTime"></b> <span id="greeting"></span><br>
                        </div>
                        <div class="col-sm-6 col-sm-6 d-none d-sm-block">
                            <p style="text-align: right; font-size: 14px; margin-top: 10px;">
                                Selamat datang kembali <b> {{ auth()->user()->nama }}</b>
                                😊
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="stat-cards-item" style="height:  60px; margin-bottom: 10px;">
                <div class="card-body" style="margin-top: -25px;">
                    <div class="d-flex align-items-center justify-content-center flex-wrap">
                        <span class="d-flex d-none d-sm-flex">Filter SPK Per Tanggal</span>
                        <div class="d-flex align-items-end m-3">
                            <div class="form-group">
                                <label for="min" class="sr-only">From:</label>
                                <input type="date" name="min" id="min" class="form-control form-control-sm"
                                    value="{{ $min ?? null }}">
                            </div>
                            <div class="form-group">
                                <label for="max" class="sr-only">To:</label>
                                <input type="date" name="max" id="max" class="form-control form-control-sm"
                                    value="{{ $max ?? null }}">
                            </div>
                            <div class="btn-group" style="margin-left: 5px;">
                                <button id="btn-filter" class="btn btn-success btn-sm">Filter</button>
                                <button id="btn-refresh" class="btn btn-info btn-sm">Refresh</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @foreach ($cards as $card)
                @include('page.home.template-card', [
                    'nomor' => $card['nomor'],
                    'stat' => $card['stat'],
                ])
            @endforeach

        </div>
    </main>


@section('script')
    <script>
        function updateDateTime() {
            var dateTimeContainer = document.getElementById('dateTime');
            var greetingContainer = document.getElementById('greeting');

            var currentDate = new Date();
            var currentHour = currentDate.getHours();
            var currentMinute = currentDate.getMinutes();
            var currentSecond = currentDate.getSeconds();

            var formattedTime = padZero(currentHour) + ':' + padZero(currentMinute) + ':' + padZero(currentSecond);
            var formattedDate = currentDate.toLocaleDateString('id-ID', {
                day: 'numeric',
                month: 'long',
                year: 'numeric'
            });

            dateTimeContainer.textContent = formattedDate + ', ' + formattedTime;
            greetingContainer.textContent = getGreeting(currentHour);
        }

        function getGreeting(hour) {
            if (hour >= 0 && hour < 10) {
                return ' Selamat Pagi';
            } else if (hour >= 10 && hour < 14) {
                return ' Selamat Siang';
            } else if (hour >= 14 && hour < 18) {
                return ' Selamat Sore';
            } else {
                return ' Selamat Malam';
            }
        }

        function padZero(number) {
            return (number < 10 ? '0' : '') + number;
        }

        setInterval(updateDateTime, 1000);
        updateDateTime();
    </script>

    <script>
        $(document).on("click", "#btn-filter", function() {
            let min = $("#min").val();
            let max = $("#max").val();

            if (min == '' || max < min || max == '') {
                Swal.fire({
                    title: 'Tanggal Tidak Valid!',
                    html: 'Pastikan Tanggal Min dan Tanggal Max tidak kosong serta tanggal Max tidak boleh lebih kecil dari tanggal Min!',
                    theme: document.body.classList.contains('darkmode') ? "dark" : "light",
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            } else {
                window.location.replace(`/home/${encodeURIComponent(min)}/${encodeURIComponent(max)}`);
            }
        });

        $(document).on("click", "#btn-refresh", function() {
            // kosongkan filter
            $("#min").val('');
            $("#max").val('');

            // reload data awal
            window.location.replace(`/home`);
        });
    </script>
@endsection
@endsection
