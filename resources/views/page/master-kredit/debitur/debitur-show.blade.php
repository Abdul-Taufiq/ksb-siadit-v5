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
                    <div class="row mb-3">
                        <div class="col-12 col-md-3 mb-2 mb-md-0" style="opacity: 0.2">
                            <a href="#" class="btn btn-info text-white btn-sm w-100 w-md-auto" disabled>
                                <i class="fa-solid fa-download"></i> Print SPK
                            </a>
                        </div>
                        <div class="col-12 col-md-6 mb-2 mb-md-0 d-flex justify-content-center">
                            <a data-id="{{ encrypt($kredit->id_kredit) }}"
                                class="btn btn-primary text-white btn-sm w-100 w-md-auto btnIDI">
                                <i class="fa-solid fa-download"></i> Print IDI
                            </a>
                        </div>
                        <div class="col-12 col-md-3 text-end">
                            <a href="{{ url()->previous() }}" class="btn btn-secondary text-white btn-sm w-100 w-md-auto">
                                <i class="fa-solid fa-arrow-left"></i> Back to menu
                            </a>
                        </div>
                    </div>

                    {{-- Tables --}}
                    <div class="container">
                        @include('page.master-kredit.debitur.debitur-show-detail')
                    </div>
                </div>
            </div>
        </div>


    </main>

@section('script')
    {{-- SWA print IDI --}}
    <script>
        $(document).ready(function() {
            $('.btnREKAP').on('click', function() {
                let min = $("#min").val();
                let max = $("#max").val();
                let id_cabang = $("#id_cabang").val();

                // Validasi jika tanggal awal kosong
                if (!min) {
                    Swal.fire({
                        title: 'Peringatan!',
                        text: 'Filter Tanggal Awal Tidak Boleh Kosong!',
                        icon: 'warning',
                        confirmButtonText: 'OK'
                    });
                    return;
                }

                // Validasi jika tanggal akhir kosong
                if (!max) {
                    Swal.fire({
                        title: 'Peringatan!',
                        text: 'Filter Tanggal Akhir Tidak Boleh Kosong!',
                        icon: 'warning',
                        confirmButtonText: 'OK'
                    });
                    return;
                }

                // Validasi jika tanggal awal lebih besar dari tanggal akhir
                if (new Date(min) > new Date(max)) {
                    Swal.fire({
                        title: 'Peringatan!',
                        text: 'Filter Tanggal Tidak Valid! Tanggal Awal harus lebih kecil atau sama dengan Tanggal Akhir.',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                    return;
                }

                // Validasi jika kantor cabang kosong
                if (!id_cabang) {
                    Swal.fire({
                        title: 'Peringatan!',
                        text: 'Filter Kantor Cabang Tidak Boleh Kosong!',
                        icon: 'warning',
                        confirmButtonText: 'OK'
                    });
                    return;
                }

                // Konfirmasi cetak rekap
                Swal.fire({
                    title: 'Konfirmasi Cetak Rekap?',
                    text: 'Apakah Anda yakin ingin mencetak Data Rekap?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Cetak!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Buka URL dalam tab baru
                        window.open('/print-rekap-kredit/' + encodeURIComponent(id_cabang) + '/' +
                            encodeURIComponent(min) + '/' + encodeURIComponent(max), '_blank');
                    }
                });
            });



            $('.btnIDI').on('click', function() {
                var id = $(this).data('id');

                console.log(id);

                Swal.fire({
                    title: 'Konfirmasi Cetak IDI?',
                    text: 'Apakah Anda yakin ingin mencetak INFORMASI DEBITUR INDIVIDUAL (IDI)?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Cetak!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // window.location.href = '/print-perjanjian-kredit-pk/' + id;
                        window.open('/debitur/print-idi/' + id, '_blank');
                    }
                });
            });



            $('.btnSPK').on('click', function() {
                var id = $(this).data('id');

                console.log(id);

                Swal.fire({
                    title: 'Konfirmasi Cetak IDI?',
                    text: 'Apakah Anda yakin ingin mencetak SURAT PERMOHONAN KREDIT (SPK)?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Cetak!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // window.location.href = '/debitur-print-spk/' + id;
                        window.open('/debitur-print-spk/' + id, '_blank');
                    }
                });
            });
        });
    </script>
@endsection
@endsection
