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

            {{-- PUSAT --}}
            @if ($kode == 'PUSAT')
                @include('page.home.template-card', ['nomor' => '1. INFO SPK KPO', 'id_cbg' => 1])
                @include('page.home.template-card', [
                    'nomor' => '2. INFO SPK KC TEMANGGUNG',
                    'id_cbg' => 2,
                ])
                @include('page.home.template-card', ['nomor' => '3. INFO SPK KC WONOSOBO', 'id_cbg' => 3])
                @include('page.home.template-card', ['nomor' => '4. INFO SPK KC AMBARAWA', 'id_cbg' => 4])
                @include('page.home.template-card', ['nomor' => '5. INFO SPK KC SEMARANG', 'id_cbg' => 5])
                @include('page.home.template-card', ['nomor' => '6. INFO SPK KC MRANGGEN', 'id_cbg' => 6])
                @include('page.home.template-card', ['nomor' => '7. INFO SPK KC SUKOREJO', 'id_cbg' => 7])
                @include('page.home.template-card', ['nomor' => '8. INFO SPK KC WELERI', 'id_cbg' => 8])
                @include('page.home.template-card', ['nomor' => '9. INFO SPK KC DELANGGU', 'id_cbg' => 9])
                @include('page.home.template-card', ['nomor' => '10. INFO SPK KC GOMBONG', 'id_cbg' => 10])
                @include('page.home.template-card', [
                    'nomor' => '11. INFO SPK KC SOKARAJA',
                    'id_cbg' => 11,
                ])

                {{-- AREA 1 --}}
            @elseif ($kode == 'AREA 1')
                @include('page.home.template-card', ['nomor' => '1. INFO SPK KPO', 'id_cbg' => 1])
                @include('page.home.template-card', [
                    'nomor' => '2. INFO SPK KC TEMANGGUNG',
                    'id_cbg' => 2,
                ])
                @include('page.home.template-card', ['nomor' => '3. INFO SPK KC WONOSOBO', 'id_cbg' => 3])
                @include('page.home.template-card', ['nomor' => '4. INFO SPK KC SUKOREJO', 'id_cbg' => 7])
                @include('page.home.template-card', [
                    'nomor' => '5. INFO SPK KC GOMBONG',
                    'id_cbg' => 10,
                ])
                @include('page.home.template-card', [
                    'nomor' => '6. INFO SPK KC SOKARAJA',
                    'id_cbg' => 11,
                ])

                {{-- AREA 2 --}}
            @elseif ($kode == 'AREA 2')
                @include('page.home.template-card', ['nomor' => '1. INFO SPK KC AMBARAWA', 'id_cbg' => 4])
                @include('page.home.template-card', ['nomor' => '2. INFO SPK KC SEMARANG', 'id_cbg' => 5])
                @include('page.home.template-card', ['nomor' => '3. INFO SPK KC MRANGGEN', 'id_cbg' => 6])
                @include('page.home.template-card', ['nomor' => '4. INFO SPK KC WELERI', 'id_cbg' => 8])
                @include('page.home.template-card', ['nomor' => '5. INFO SPK KC DELANGGU', 'id_cbg' => 9])

                {{-- CABANG --}}
            @else
                @include('page.home.template-card', [
                    'nomor' => 'INFO SPK ' . $spk->first()->cabang->cabang,
                    'id_cbg' => $spk->first()->id_cabang,
                ])
            @endif

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
@endsection
@endsection
