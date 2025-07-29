@extends('layouts.main')
@section('konten')
    @push('styles')
        @livewireStyles
    @endpush

    @push('scripts')
        @livewireScripts
        <script src="{{ asset('script/master-user/confirm.js') }}"></script>
        <script src="{{ asset('script/master-user/show.js') }}"></script>
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
                <div class="card-body">
                    <div class="mb-2">
                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#Tambah"
                            id="tambahData">
                            <i class="fa-solid fa-user-plus"></i> Tambah User
                        </button>
                    </div>

                    {{-- Tables --}}
                    @livewire('master-user.user-livewire')
                </div>
            </div>
        </div>

        {{-- Modal --}}
        @include('page.master-user.modal')

    </main>
@endsection
