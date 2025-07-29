@extends('layouts.main')
@section('konten')
    <main class="main users chart-page" id="skip-target" style="font-size: 12px;">
        <div class="container" style="margin-top: -10px">
            {{-- breadcrumb --}}
            @include('layouts.breadcrumb')

            <div class="stat-cards-item">
                <div class="card-header mb-2">
                    <h6 class="mb-2">Nomor MUK: {{ $muk->no_muk }}</h6>
                    <strong><i>Progress 4/4</i></strong><br>
                    <i>Note: Nomor MUK dan Tanggal MUK otomatis oleh sistem</i>
                </div>
                <div class="card-body w-100">

                    {{-- data debitur --}}
                    <form id="quickForm" action="{{ route('muk.store.partempat') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" id="id_muk" name="id_muk" value="{{ $id_muk }}" readonly>
                        <input type="hidden" id="id_kredit" name="id_kredit"
                            value="{{ base64_encode($kredit->id_kredit) }}" readonly>
                        <input type="hidden" id="metode" name="metode" value="{{ $metode }}" readonly>

                        {{-- info data sebelumnya --}}
                        <div class="card mb-2">
                            <div class="card-header bg-info text-white">
                                <div class="d-flex justify-content-between" onclick="hideForm1()">
                                    <div class="head-judul"><i class="fa-solid fa-circle-info"></i> INFO DATA SPK</div>
                                    <i class="fa fa-eye-slash" aria-hidden="true" id="show1"></i>
                                </div>
                            </div>
                            <div class="card-body d-none" id="konten1">
                                @include('page.master-kredit.spk.spk-show')
                            </div>
                        </div>

                        {{-- Keterangan Scoring --}}
                        <div class="card mb-2">
                            <div class="card-header bg-info text-white">
                                <div class="d-flex justify-content-between" onclick="hideForm2()">
                                    <div class="head-judul"><i class="fa-solid fa-circle-info"></i> Keterangan Scoring</div>
                                    <i class="fa fa-eye-slash" aria-hidden="true" id="show2"></i>
                                </div>
                            </div>
                            <div class="card-body d-none" id="konten2">
                                <div style="height: 500px;">
                                    <iframe src="{{ asset('file_upload/pdf/keterangan-scoring.pdf') }}" frameborder="1"
                                        width="100%" height="100%"></iframe>
                                </div>
                            </div>
                        </div>

                        {{-- SCORING AGUNAN --}}
                        <div class="card mb-2">
                            <div class="card-header bg-primary text-white">
                                <div class="d-flex justify-content-between" onclick="hideForm3()">
                                    <div class="head-judul">A. SCORING AGUNAN</div>
                                    <i class="fa fa-eye" aria-hidden="true" id="show3"></i>
                                </div>
                            </div>
                            <div class="card-body" id="konten3">
                                @include('page.master-kredit.muk.input.scoring.scoring-agunan-index')
                            </div>
                        </div>
                        <br><br>

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
                                <button type="button" id="simpan" class="btn btn-primary" style="letter-spacing: 2px;">
                                    <i class="fa-regular fa-floppy-disk"></i> &nbsp; <b>SIMPAN</b> & Lanjutkan</button>
                            </div>
                            <div class="card card-outline card-danger mb-0"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- Modal --}}
        @include('page.master-kredit.debitur.modal')
        <input type="hidden" id="jabatan" value="{{ Auth::user()->jabatan }}">
    </main>


    {{-- agar tidak tabrakan dengan style di css global --}}
    <style>
        .note-editor .note-editable ol {
            list-style-type: decimal !important;
            /* Pastikan angka tetap muncul */
            padding-left: 20px !important;
            /* Sesuaikan indentasi */
        }

        .note-editor .note-editable ul {
            list-style-type: disc !important;
            /* Pastikan bullet tetap muncul */
            padding-left: 20px !important;
        }
    </style>
@endsection


@section('script')
    <script src="{{ asset('script/master-kredit/debitur/confirm-submit.js') }}"></script>
    <script src="{{ asset('script/master-kredit/debitur/debitur-cek-input.js') }}"></script>
    <script src="{{ asset('script/master-kredit/spk/hide-form.js') }}"></script>
    <script src="{{ asset('script/master-kredit/muk/summernote-area.js') }}"></script>
    <script src="{{ asset('script/master-kredit/muk/scoring-agunan.js') }}"></script>
    <script src="{{ asset('script/master-kredit/muk/set-nominal-number.js') }}"></script>
    <script src="{{ asset('script/master-kredit/muk/rekap-cek.js') }}"></script>
@endsection
