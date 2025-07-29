@extends('layouts.main')
@section('konten')
    <style>
        td ol {
            list-style-type: decimal !important;
            /* Pastikan angka tetap muncul */
            padding-left: 20px !important;
            /* Sesuaikan indentasi */
        }

        td ul {
            list-style-type: disc !important;
            /* Pastikan bullet tetap muncul */
            padding-left: 20px !important;
        }
    </style>

    <main class="main users chart-page" id="skip-target" style="font-size: 12px;">

        <div class="container" style="margin-top: -10px">
            {{-- breadcrumb --}}
            @include('layouts.breadcrumb')

            <div class="stat-cards-item mb-2">
                <div class="card-body w-100">
                    <div class="row ">
                        <div class="col-12 col-md-3 mb-sm-1" style="opacity: 0.2">
                            {{-- <a href="#" class="btn btn-info text-white btn-sm w-100 w-md-auto" disabled>
                                <i class="fa-solid fa-download"></i> Print SPK
                            </a> --}}
                        </div>
                        <div class="col-12 col-md-3 mb-sm-1 d-flex justify-content-center">
                            <a data-id="{{ encrypt($muk->id_muk) }}"
                                class="btn btn-primary text-white btn-sm w-100 w-md-auto btnMUK">
                                <i class="fa-solid fa-download"></i> Print MUK
                            </a>
                        </div>
                        <div class="col-12 col-md-3 mb-sm-1 d-flex justify-content-center">
                            <a href="{{ route('show.scoring', encrypt($muk->id_muk)) }}"
                                class="btn btn-primary text-white btn-sm w-100 w-md-auto">
                                <i class="fa-solid fa-eye"></i> Show Scoring Agunan
                            </a>
                        </div>
                        <div class="col-12 col-md-3 text-end">
                            <a href="{{ url()->previous() }}" class="btn btn-secondary text-white btn-sm w-100 w-md-auto">
                                <i class="fa-solid fa-arrow-left"></i> Back to Previous
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="stat-cards-item mb-1" style="height: 60px; ">
                <div class="card-body w-100" style="margin-top: -10px;">
                    <div class="d-flex justify-content-between">
                        <div>
                            Nomor MUK:
                            <h6>{{ $muk->no_muk }}</h6>
                        </div>
                        <div>
                            Tanggal MUK:
                            <h6>
                                {{ $muk->tgl_muk->translatedFormat('d F Y') }}
                            </h6>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-2">
                <div class="card-header bg-success text-white">
                    <div class="d-flex justify-content-between">
                        <div class="head-judul">I. PERMOHONAN NASABAH</div>
                    </div>
                </div>
                <div class="card-body" id="konten1">
                    @include('page.master-kredit.muk.show.muk-show-i')
                </div>
            </div>

            <div class="card mb-2">
                <div class="card-header bg-success text-white">
                    <div class="d-flex justify-content-between">
                        <div class="head-judul">II. DATA PEMOHON</div>
                    </div>
                </div>
                <div class="card-body" id="konten2">
                    @include('page.master-kredit.muk.show.muk-show-ii')
                </div>
            </div>

            <div class="card mb-2">
                <div class="card-header bg-success text-white">
                    <div class="d-flex justify-content-between">
                        <div class="head-judul">III. DATA HASIL SLIK</div>
                    </div>
                </div>
                <div class="card-body" id="konten3">
                    @include('page.master-kredit.muk.show.muk-show-iii')
                </div>
            </div>

            <div class="card mb-2">
                <div class="card-header bg-success text-white">
                    <div class="d-flex justify-content-between">
                        <div class="head-judul">IV. DATA KEUANGAN</div>
                    </div>
                </div>
                <div class="card-body">
                    @include('page.master-kredit.muk.show.muk-show-iv')
                </div>
            </div>

            <div class="card mb-2">
                <div class="card-header bg-success text-white">
                    <div class="d-flex justify-content-between">
                        <div class="head-judul">V. WORKING INVESTMENT/KECUKUPAN MODAL KERJA</div>
                    </div>
                </div>
                <div class="card-body">
                    @include('page.master-kredit.muk.show.muk-show-v')
                </div>
            </div>

            <div class="card mb-2">
                <div class="card-header bg-success text-white">
                    <div class="d-flex justify-content-between">
                        <div class="head-judul">VI. DATA MANAGEMENT</div>
                    </div>
                </div>
                <div class="card-body">
                    @include('page.master-kredit.muk.show.muk-show-vi')
                </div>
            </div>

            <div class="card mb-2">
                <div class="card-header bg-success text-white">
                    <div class="d-flex justify-content-between">
                        <div class="head-judul">VII. ANALISA INDUSTRI</div>
                    </div>
                </div>
                <div class="card-body">
                    @include('page.master-kredit.muk.show.muk-show-vii')
                </div>
            </div>

            <div class="card mb-2">
                <div class="card-header bg-success text-white">
                    <div class="d-flex justify-content-between">
                        <div class="head-judul">VIII. DATA AGUNAN</div>
                    </div>
                </div>
                <div class="card-body">
                    @include('page.master-kredit.muk.show.muk-show-viii')
                </div>
            </div>

            <div class="card mb-2">
                <div class="card-header bg-success text-white">
                    <div class="d-flex justify-content-between">
                        <div class="head-judul">IX. PENYIMPANGAN/DEVIASI</div>
                    </div>
                </div>
                <div class="card-body">
                    @include('page.master-kredit.muk.show.muk-show-ix')
                </div>
            </div>

            <div class="card mb-2">
                <div class="card-header bg-success text-white">
                    <div class="d-flex justify-content-between">
                        <div class="head-judul">X. USULAN/REKOMENDASI</div>
                    </div>
                </div>
                <div class="card-body">
                    @include('page.master-kredit.muk.show.muk-show-x')
                </div>
            </div>

            <div class="card mb-2">
                <div class="card-header bg-success text-white">
                    <div class="d-flex justify-content-between">
                        <div class="head-judul">XI. PUTUSAN</div>
                    </div>
                </div>
                <div class="card-body">
                    @include('page.master-kredit.muk.show.muk-show-xi')
                </div>
            </div>

        </div>


    </main>
@endsection


@section('script')
    <script>
        $('.btnMUK').on('click', function() {
            var id = $(this).data('id');

            Swal.fire({
                title: 'Konfirmasi Cetak MUK?',
                text: 'Apakah Anda yakin ingin mencetak Master MUK?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Cetak!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // window.location.href = '/print-perjanjian-kredit-pk/' + id;
                    window.open('/muk/print-muk/' + id,
                        '_blank');
                }
            });
        });
    </script>
@endsection
