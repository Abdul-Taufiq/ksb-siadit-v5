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
            {{-- breadcrumb --}}
            @include('layouts.breadcrumb')
            <div class="stat-cards-item">
                <div class="card-body w-100">
                    {{-- Button --}}
                    <div class="row mb-3">
                        <div class="col-12 col-md-3 mb-2 mb-md-0">
                            @if (Auth::user()->jabatan == 'AO')
                                <a href="{{ route('debitur.create') }}" class="btn btn-primary btn-sm w-100">
                                    <i class="fa-solid fa-user-plus"></i> Add Debitur/SPK
                                </a>
                            @endif
                        </div>
                        {{-- <div class="col-12 col-md-6 mb-2 mb-md-0 d-flex justify-content-center">
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
                        </div> --}}
                        {{-- <div class="col-12 col-md-3 text-end">
                            <a href="{{ url('master-user-deleted') }}"
                                class="btn btn-success text-white btn-sm w-100 w-md-auto">
                                <i class="fa-solid fa-recycle"></i> Restore Data
                            </a>
                        </div> --}}
                    </div>

                    {{-- Tables --}}
                    <div class="container">
                        @livewire('master-kredit.debitur.debitur-table')
                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection

@push('scripts')
    <script src="{{ asset('script/master-kredit/debitur/debitur-livewire.js') }}"></script>
@endpush
