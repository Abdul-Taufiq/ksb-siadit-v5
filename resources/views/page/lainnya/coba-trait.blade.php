@extends('layouts.main')
@section('konten')
    @push('styles')
        @livewireStyles
    @endpush

    @push('scripts')
        @livewireScripts
        {{-- disini dikasih Js juga bisa :) --}}
    @endpush

    <main class="main users chart-page" id="skip-target" style="font-size: 12px;">

        <div class="container" style="margin-top: -10px">
            <div class="stat-cards-item" style="height:  60px; margin-bottom: 10px;">
                <div class="card-body" style="margin-top: -27px;">
                    <div class="row mt-3">
                        <div class="col-sm-6">
                            <h2 class="main-title float-sm-start" style="letter-spacing: 2px;">
                                {{ $title }}
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

            <div class="stat-cards-item">
                <div class="card-body w-100">
                    {{-- Tables --}}
                    <div class="container">
                        @livewire('Lainnya.coba-trait-livewire')
                    </div>
                </div>
            </div>
        </div>

        {{-- Modal --}}
        {{-- @include('page.master-user.modal') --}}

    </main>

@section('script')
    {{-- <script src="{{ asset('script/master-user/confirm.js') }}"></script>
    <script src="{{ asset('script/master-user/confirm-edit.js') }}"></script>
    <script src="{{ asset('script/master-user/confirm-delete.js') }}"></script> --}}
@endsection
@endsection
