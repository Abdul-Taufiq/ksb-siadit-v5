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
                        <div class="col-12 col-md-3 mb-sm-1" style="font-size: 14px">
                            <i class="fa-solid fa-circle-exclamation"></i> Data Ini Merupakan Putusan dari
                            <b>{{ $muk->kredit->persetujuan->putusan }}</b> <br>
                            @if (
                                ($muk->deviasi?->perihal != null && $muk->deviasi?->perihal != '<p>-</p>') ||
                                    $muk->kredit->persetujuan->putusan != 'Cabang')
                                Silahkan lihat file putusan di bawah ini <br>
                                @if ($muk->file_putusan)
                                    <a href="{{ asset('storage/file_upload/putusan/' . $muk->file_putusan) }}"
                                        target="_blank" style="font-weight: bold; color: darkcyan">
                                        <i>{{ $muk->file_putusan }}</i>
                                    </a>
                                @else
                                    <i>Belum Ada File</i>
                                @endif
                            @endif
                        </div>
                        <div class="col-12 col-md-3">
                            <a data-id="{{ encrypt($muk->id_muk) }}"
                                class="btn btn-primary text-white btn-sm w-100 w-md-auto btnMUK">
                                <i class="fa-solid fa-download"></i> Print MUK
                            </a>
                        </div>
                        <div class="col-12 col-md-3">
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
                <div class="card-header bg-primary text-white">
                    <div class="d-flex justify-content-between">
                        <div class="head-judul">I. PERMOHONAN NASABAH</div>
                    </div>
                </div>
                <div class="card-body" id="konten1">
                    @include('page.master-kredit.muk.show.muk-show-i')
                </div>
            </div>

            <div class="card mb-2">
                <div class="card-header bg-primary text-white">
                    <div class="d-flex justify-content-between">
                        <div class="head-judul">II. DATA PEMOHON</div>
                    </div>
                </div>
                <div class="card-body" id="konten2">
                    @include('page.master-kredit.muk.show.muk-show-ii')
                </div>
            </div>

            <div class="card mb-2">
                <div class="card-header bg-primary text-white">
                    <div class="d-flex justify-content-between">
                        <div class="head-judul">III. DATA HASIL SLIK</div>
                    </div>
                </div>
                <div class="card-body" id="konten3">
                    @include('page.master-kredit.muk.show.muk-show-iii')
                </div>
            </div>

            <div class="card mb-2">
                <div class="card-header bg-primary text-white">
                    <div class="d-flex justify-content-between">
                        <div class="head-judul">IV. DATA KEUANGAN</div>
                    </div>
                </div>
                <div class="card-body">
                    @include('page.master-kredit.muk.show.muk-show-iv')
                </div>
            </div>

            <div class="card mb-2">
                <div class="card-header bg-primary text-white">
                    <div class="d-flex justify-content-between">
                        <div class="head-judul">V. WORKING INVESTMENT/KECUKUPAN MODAL KERJA</div>
                    </div>
                </div>
                <div class="card-body">
                    @include('page.master-kredit.muk.show.muk-show-v')
                </div>
            </div>

            <div class="card mb-2">
                <div class="card-header bg-primary text-white">
                    <div class="d-flex justify-content-between">
                        <div class="head-judul">VI. DATA MANAGEMENT</div>
                    </div>
                </div>
                <div class="card-body">
                    @include('page.master-kredit.muk.show.muk-show-vi')
                </div>
            </div>

            <div class="card mb-2">
                <div class="card-header bg-primary text-white">
                    <div class="d-flex justify-content-between">
                        <div class="head-judul">VII. ANALISA INDUSTRI</div>
                    </div>
                </div>
                <div class="card-body">
                    @include('page.master-kredit.muk.show.muk-show-vii')
                </div>
            </div>

            <div class="card mb-2">
                <div class="card-header bg-primary text-white">
                    <div class="d-flex justify-content-between">
                        <div class="head-judul">VIII. DATA AGUNAN</div>
                    </div>
                </div>
                <div class="card-body">
                    @include('page.master-kredit.muk.show.muk-show-viii')
                </div>
            </div>

            <div class="card mb-2">
                <div class="card-header bg-primary text-white">
                    <div class="d-flex justify-content-between">
                        <div class="head-judul">IX. PENYIMPANGAN/DEVIASI</div>
                    </div>
                </div>
                <div class="card-body">
                    @include('page.master-kredit.muk.show.muk-show-ix')
                </div>
            </div>

            <div class="card mb-2">
                <div class="card-header bg-primary text-white">
                    <div class="d-flex justify-content-between">
                        <div class="head-judul">X. USULAN/REKOMENDASI</div>
                    </div>
                </div>
                <div class="card-body">
                    @include('page.master-kredit.muk.show.muk-show-x')
                </div>
            </div>

            <div class="card mb-2">
                <div class="card-header bg-primary text-white">
                    <div class="d-flex justify-content-between">
                        <div class="head-judul">XI. PUTUSAN</div>
                    </div>
                </div>
                <div class="card-body">
                    @include('page.master-kredit.muk.show.muk-show-xi')
                </div>
            </div>

            {{-- edit catatan putusan --}}

            @php
                $user = Auth::user()->jabatan;
                $akses = '';
                switch ($user) {
                    case 'AO':
                        $akses = 'Ya';
                        break;
                    case 'Analis Cabang':
                        $akses = 'Ya';
                        break;
                    case 'Kasi Komersial':
                        $akses = 'Ya';
                        break;

                    default:
                        $akses = 'Tidak';
                        break;
                }
            @endphp

            @if ($akses == 'Ya' && $muk->putusan?->nama_pincab == null)
                <div class="card mb-2">
                    <div class="card-header bg-warning ">
                        <div class="d-flex justify-content-between">
                            <div class="head-judul">EDIT CATATAN PUTUSAN</div>
                        </div>
                    </div>
                    <div class="card-body">
                        <p style="font-size: 14px">
                            <b>Coution:</b> Edit ini dapat dilakukan sesuai user yang login (kecuali Pimpinan Cabang) dan
                            akan
                            menghilang jika Pimpinan Cabang sudah melakukan perubahan Status!
                        </p>

                        <br>
                        <form id="quickForm" action="{{ route('muk.update.catatan') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" id="id_putusan" name="id_putusan"
                                value="{{ base64_encode($muk->putusan?->id_putusan) }}" readonly>

                            <div class="row">
                                <div class="col-md-12 mb-4">
                                    @php
                                        $user = Auth::user()->jabatan;
                                        $jabatan = '';
                                        switch ($user) {
                                            case 'AO':
                                                $jabatan = 'catatan_ao';
                                                break;
                                            case 'Analis Cabang':
                                                $jabatan = 'catatan_analis_cabang';
                                                break;
                                            case 'Kasi Komersial':
                                                $jabatan = 'catatan_kakom';
                                                break;

                                            default:
                                                # code...
                                                break;
                                        }
                                    @endphp
                                    <input type="hidden" name="field_ctt" id="field_ctt" value="{{ $jabatan }}">

                                    <div class="form-group">
                                        <div class="d-flex justify-content-between">
                                            <label for="catatan">Catatan Putusan</label>
                                            <label for="catatan" data-bs-toggle="tooltip" data-bs-placement="top"
                                                data-bs-custom-class="custom-tooltip" data-bs-title="ISI DENGAN SEKSAMA!">
                                                <i class="fa-solid fa-circle-question"></i>
                                            </label>
                                        </div>
                                        <textarea name="catatan" id="catatan">{!! $muk?->putusan?->$jabatan !!}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="text-start">
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
                            </div>

                            <div class="text-end">
                                <button type="button" id="simpan" class="btn btn-primary"
                                    style="letter-spacing: 2px;">
                                    <i class="fa-regular fa-floppy-disk"></i> &nbsp; <b>SIMPAN</b> </button>
                            </div>

                        </form>
                    </div>
                </div>
            @endif
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

    <script src="{{ asset('script/master-kredit/debitur/confirm-submit.js') }}"></script>
    <script src="{{ asset('script/master-kredit/debitur/debitur-cek-input.js') }}"></script>
    <script src="{{ asset('script/master-kredit/muk/summernote-area.js') }}"></script>
    <script>
        $(document).ready(function() {
            initializeSummernote("#catatan", "Ketik sesuatu...", 100);
        });
    </script>
@endsection
