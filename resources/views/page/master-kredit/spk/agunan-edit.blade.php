@extends('layouts.main')
@section('konten')
    @push('styles')
        @livewireStyles
        <link rel="stylesheet" href="{{ asset('template/css/style-input.css') }}">
    @endpush

    @push('scripts')
        @livewireScripts
        {{-- disini dikasih Js juga bisa :) --}}
    @endpush

    <main class="main users chart-page" id="skip-target" style="font-size: 12px;">

        <div class="container" style="margin-top: -10px">
            {{-- breadcrumb --}}
            @include('layouts.breadcrumb')

            <div class="stat-cards-item">
                <div class="card-header mb-2">
                    <i style="letter-spacing: 2px;"><strong>Progress 3/3</strong> </i>
                </div>
                <div class="card-body w-100">
                    {{-- info data sebelumnya --}}
                    <div class="card">
                        <div class="card-header bg-info text-white">
                            <div class="d-flex justify-content-between" onclick="hideForm1()">
                                <div class="head-judul"><i class="fa-solid fa-circle-info"></i> INFO DATA SEBELUMNYA</div>
                                <i class="fa fa-eye" aria-hidden="true" id="show1"></i>
                            </div>
                        </div>
                        <div class="card-body d-none" id="konten1">
                            @include('page.master-kredit.spk.spk-show')
                            {{-- {{ $debitur->nama_debitur }} --}}
                        </div>
                    </div>
                    <br>

                    {{-- data Jaminan --}}
                    <form id="quickForm" action="{{ route('agunan.update', encrypt($kredit->id_kredit)) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('patch')

                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <div class="d-flex justify-content-between" onclick="hideForm1()">
                                    <div class="head-judul">1. DATA AGUNAN</div>
                                    <i class="fa fa-eye" aria-hidden="true" id="show1"></i>
                                </div>
                            </div>
                            <div class="card-body showing" id="konten1">
                                @include('page.master-kredit.inputan.jaminan-input-edit')
                            </div>
                        </div>

                        <br>

                        {{-- tombol save --}}
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group mb-0">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="terms" class="custom-control-input"
                                            id="exampleCheck1" required>
                                        <label class="custom-control-label" for="exampleCheck1">Saya setuju dengan
                                            <a href="#" style="color: #007bff; text-decoration: none;">
                                                ketentuan yang berlaku
                                            </a>.
                                        </label>
                                    </div>
                                </div>
                                <br>
                                <div class="d-flex justify-content-between">
                                    <button type="button" id="simpan" class="btn btn-primary"
                                        style="letter-spacing: 2px;">
                                        <i class="fa-regular fa-floppy-disk"></i> &nbsp; <b>SIMPAN</b> &
                                        Lanjutkan</button>

                                    @if ($metode != 'create')
                                        <a href="{{ url()->previous() }}" class="btn btn-secondary text-white">
                                            <i class="fa-solid fa-arrow-left-long"></i> Kembali
                                        </a>
                                    @endif
                                </div>
                            </div>
                            <div class="card card-outline card-danger mb-0"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- Modal --}}
        @include('page.master-kredit.debitur.modal')

    </main>

    <input type="hidden" id="jabatan" value="{{ Auth::user()->jabatan }}">
@section('script')
    <script src="{{ asset('script/master-kredit/debitur/confirm-submit.js') }}"></script>
    <script src="{{ asset('script/master-kredit/debitur/debitur-cek-input.js') }}"></script>
    <script src="{{ asset('script/master-kredit/spk/hide-form.js') }}"></script>
    <script src="{{ asset('script/master-kredit/spk/agunan-flex.js') }}"></script>
    <script src="{{ asset('script/master-kredit/spk/agunan-flex-analis.js') }}"></script>
    <script src="{{ asset('script/master-kredit/spk/agunan-config.js') }}"></script>
    <script src="{{ asset('script/master-kredit/spk/cek-jaminan.js') }}"></script>
@endsection
@endsection
