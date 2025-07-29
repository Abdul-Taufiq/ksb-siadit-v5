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
                    @livewire('master-user.user-form')

                    <div class="row mb-3">
                        <div class="col-12 col-md-3 mb-2 mb-md-0">
                            <button class="btn btn-primary btn-sm w-100 {{ $code_page == 'deleted' ? 'd-none' : '' }}"
                                data-bs-toggle="modal" data-bs-target="#Tambah" id="tambahData">
                                <i class="fa-solid fa-user-plus"></i> Add User
                            </button>
                        </div>
                        <div class="col-12 col-md-6 mb-2 mb-md-0 d-flex justify-content-center">
                            <div class="btn-group">
                                <a href="{{ url('export-excel/master-user') }}" id="btn-excel"
                                    class="btn btn-sm btn-secondary" target="_blank">
                                    <i class="fa-solid fa-download"></i> Export to Excel
                                </a>
                                <a href="{{ url('export-pdf/master-user') }}" id="btn-pdf"
                                    class="btn btn-sm btn-secondary" target="_blank">
                                    <i class="fa-solid fa-download"></i> Export to PDF
                                </a>
                            </div>
                        </div>
                        <div class="col-12 col-md-3 text-end">
                            @if ($code_page == 'index')
                                <a href="{{ url('master-user-deleted') }}"
                                    class="btn btn-success text-white btn-sm w-100 w-md-auto">
                                    <i class="fa-solid fa-recycle"></i> Restore Data
                                </a>
                            @else
                                <a href="{{ url('master-user') }}"
                                    class="btn btn-secondary text-white btn-sm w-100 w-md-auto">
                                    <i class="fa-solid fa-arrow-left"></i> Back to menu
                                </a>
                            @endif
                        </div>
                    </div>

                    {{-- Tables --}}
                    <div class="container">
                        @livewire('master-user.user-table', ['code_page' => $code_page])
                    </div>
                </div>
            </div>
        </div>

        {{-- Modal --}}
        {{-- @include('page.master-user.modal') --}}

    </main>

@section('script')
    <script src="{{ asset('script/master-user/confirm.js') }}"></script>
    <script src="{{ asset('script/master-user/confirm-edit.js') }}"></script>
    <script src="{{ asset('script/master-user/confirm-delete.js') }}"></script>
@endsection
@endsection
