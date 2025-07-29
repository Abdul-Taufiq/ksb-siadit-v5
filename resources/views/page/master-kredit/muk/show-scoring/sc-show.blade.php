@extends('layouts.main')
@section('konten')
    <main class="main users chart-page" id="skip-target" style="font-size: 12px;">

        <div class="container" style="margin-top: -10px">
            {{-- breadcrumb --}}
            @include('layouts.breadcrumb')

            <div class="stat-cards-item mb-2">
                <div class="card-body w-100">
                    <div class="row ">
                        <div class="d-flex justify-content-between">
                            <div class="col-12 col-md-3 mb-sm-1" style="opacity: 0.2">
                                {{-- <a href="#" class="btn btn-info text-white btn-sm w-100 w-md-auto" disabled>
                                    <i class="fa-solid fa-download"></i> Print SPK
                                </a> --}}
                            </div>
                            <div class="col-12 col-md-3 text-end">
                                <a href="{{ url()->previous() }}"
                                    class="btn btn-secondary text-white btn-sm w-100 w-md-auto">
                                    <i class="fa-solid fa-arrow-left"></i> Back to Previous
                                </a>
                            </div>
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

            {{-- agunan tanah --}}
            @foreach ($jam_tanah as $tanah)
                <div class="card mb-2">
                    <div class="card-header bg-primary text-white">
                        <div class="d-flex justify-content-between">
                            <div class="head-judul">SCORING AGUNAN {{ strtoupper($tanah->detail_kategori_jaminan) }}</div>

                            <div class="col-4 col-md-2  d-flex justify-content-center">
                                <a data-id_muk="{{ base64_encode($muk->id_muk) }}"
                                    data-agunan="{{ base64_encode('Tanah') }}"
                                    data-id_jaminan="{{ base64_encode($tanah->id_jaminan_pertanahan) }}"
                                    class="btn btn-info text-white btn-sm w-100 w-md-auto btnSCR">
                                    <i class="fa-solid fa-download"></i> Print Scoring Agunan
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @include('page.master-kredit.muk.show-scoring.tanah-scoring')
                    </div>
                </div>
            @endforeach

            {{-- agunan Kendaraan --}}
            @foreach ($jam_kenda as $kenda)
                <div class="card mb-2">
                    <div class="card-header bg-warning text-white">
                        <div class="d-flex justify-content-between">
                            <div class="head-judul">SCORING AGUNAN KENDARAAN</div>
                            <div class="col-4 col-md-2  d-flex justify-content-center">
                                <a data-id_muk="{{ base64_encode($muk->id_muk) }}"
                                    data-agunan="{{ base64_encode('Kendaraan') }}"
                                    data-id_jaminan="{{ base64_encode($kenda->id_jaminan_kendaraan) }}"
                                    class="btn btn-info text-white btn-sm w-100 w-md-auto btnSCR">
                                    <i class="fa-solid fa-download"></i> Print Scoring Agunan
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @include('page.master-kredit.muk.show-scoring.kendaraan-scoring')
                    </div>
                </div>
            @endforeach

            {{-- agunan Kendaraan --}}
            @if (!empty($jam_depo))
                @foreach ($jam_depo as $depo)
                    <div class="card mb-2">
                        <div class="card-header bg-secondary text-white">
                            <div class="d-flex justify-content-between">
                                <div class="head-judul">SCORING AGUNAN {{ $depo->jns_jaminan }}</div>
                                <div class="col-4 col-md-2  d-flex justify-content-center">
                                    <a data-id_muk="{{ base64_encode($muk->id_muk) }}"
                                        data-agunan="{{ base64_encode('Deposito') }}"
                                        data-id_jaminan="{{ base64_encode($depo->id_jaminan_deposito) }}"
                                        class="btn btn-info text-white btn-sm w-100 w-md-auto btnSCR">
                                        <i class="fa-solid fa-download"></i> Print Scoring Agunan
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            @if ($depo->jns_jaminan == 'Deposito')
                                @include('page.master-kredit.muk.show-scoring.depo-scoring')
                            @else
                                @include('page.master-kredit.muk.show-scoring.tabu-scoring')
                            @endif
                        </div>
                    </div>
                @endforeach
            @endif

        </div>


    </main>
@endsection

@section('script')
    <script>
        $('.btnSCR').on('click', function() {
            var id_muk = $(this).data('id_muk');
            var id_jaminan = $(this).data('id_jaminan');
            var agunan = $(this).data('agunan');

            Swal.fire({
                title: 'Konfirmasi Cetak Scoring?',
                text: 'Apakah Anda yakin ingin mencetak Scoring Agunan?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Cetak!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // window.location.href = '/print-perjanjian-kredit-pk/' + id;
                    window.open('/muk/print-muk-scoring/' + agunan + '/' + id_jaminan + '/' + id_muk,
                        '_blank');
                }
            });
        });
    </script>
@endsection
