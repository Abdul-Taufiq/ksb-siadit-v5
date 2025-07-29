@extends('layouts.main')
@section('konten')
    <main class="main users chart-page" id="skip-target" style="font-size: 12px;">
        <div class="container" style="margin-top: -10px">
            {{-- breadcrumb --}}
            @include('layouts.breadcrumb')

            <div class="stat-cards-item">
                <div class="card-header mb-2">
                    <h6 class="mb-2">Nomor MUK: {{ $muk->no_muk }}</h6>
                    <strong><i>Progress 1/4</i></strong><br>
                    <i>Note: Nomor MUK dan Tanggal MUK otomatis oleh sistem</i>
                </div>
                <div class="card-body w-100">

                    {{-- data debitur --}}
                    <form id="quickForm" action="{{ route('muk.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" id="id_kredit" name="id_kredit"
                            value="{{ base64_encode($kredit->id_kredit) }}" readonly>
                        <input type="hidden" id="id_muk" name="id_muk" value="{{ base64_encode($muk->id_muk) }}"
                            readonly>
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

                        {{-- SLIK --}}
                        <div class="card mb-2">
                            <div class="card-header bg-primary text-white">
                                <div class="d-flex justify-content-between" onclick="hideForm2()">
                                    <div class="head-judul">1. REKAP HASIL SLIK</div>
                                    <i class="fa fa-eye" aria-hidden="true" id="show2"></i>
                                </div>
                            </div>
                            <div class="card-body" id="konten2">
                                @include('page.master-kredit.muk.input.rekap-slik-input')
                            </div>
                        </div>

                        {{-- Keuangan --}}
                        <div class="card mb-2">
                            <div class="card-header bg-primary text-white">
                                <div class="d-flex justify-content-between" onclick="hideForm3()">
                                    <div class="head-judul">2. DATA KEUANGAN</div>
                                    <i class="fa fa-eye" aria-hidden="true" id="show3"></i>
                                </div>
                            </div>
                            <div class="card-body" id="konten3">
                                @include('page.master-kredit.muk.input.keuangan')
                            </div>
                        </div>

                        {{-- Working Investmen --}}
                        <div class="card mb-2">
                            <div class="card-header bg-primary text-white">
                                <div class="d-flex justify-content-between" onclick="hideForm4()">
                                    <div class="head-judul">3. WORKING INVESTMENT/KECUKUPAN MODAL KERJA</div>
                                    <i class="fa fa-eye" aria-hidden="true" id="show4"></i>
                                </div>
                            </div>
                            <div class="card-body" id="konten4">
                                @include('page.master-kredit.muk.input.working-investment')
                            </div>
                        </div>

                        {{-- Usulan/Rekomendasi --}}
                        <div class="card mb-2">
                            <div class="card-header bg-primary text-white">
                                <div class="d-flex justify-content-between" onclick="hideForm5()">
                                    <div class="head-judul">4. USULAN/REKOMENDASI</div>
                                    <i class="fa fa-eye" aria-hidden="true" id="show5"></i>
                                </div>
                            </div>
                            <div class="card-body" id="konten5">
                                @include('page.master-kredit.muk.input.usulan-rekomendasi')
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
                                <div class="d-flex">
                                    <button type="button" id="simpan" class="btn btn-primary"
                                        style="letter-spacing: 2px;">
                                        <i class="fa-regular fa-floppy-disk"></i> &nbsp; <b>SIMPAN</b> & Lanjutkan</button>

                                    <div class="bg-danger text-warning m-2 p-2 rounded d-none" id="peringatan">
                                        <i class="fa-solid fa-triangle-exclamation"></i>
                                        <strong> Tidak Dapat Menyimpan karena WI tidak sesuai dengan Ketentuan!
                                        </strong>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-outline card-danger mb-0"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </main>
@endsection

@section('script')
    <script src="{{ asset('script/master-kredit/debitur/confirm-submit.js') }}"></script>
    <script src="{{ asset('script/master-kredit/debitur/debitur-cek-input.js') }}"></script>
    <script src="{{ asset('script/master-kredit/spk/hide-form.js') }}"></script>

    <script src="{{ asset('script/master-kredit/muk/slik-flex.js') }}"></script>
    <script src="{{ asset('script/master-kredit/muk/set-nominal-number.js') }}"></script>
    <script src="{{ asset('script/master-kredit/muk/slik-config.js') }}"></script>
    <script src="{{ asset('script/master-kredit/muk/keuangan-config.js') }}"></script>
    <script src="{{ asset('script/master-kredit/muk/keuangan-config-bjk.js') }}"></script>
    <script src="{{ asset('script/master-kredit/muk/usulan-rekomendasi-config.js') }}"></script>

    <script src="{{ asset('script/master-kredit/muk/working-inv.js') }}"></script>
    <script src="{{ asset('script/master-kredit/muk/summernote-area.js') }}"></script>

    <script>
        $(document).ready(function() {
            initializeSummernote("#keterangan", `Diisi dengan : <br> 
                        - Keterangan dari sumber pengembalian pokok dan bunga di akhir periode pinjaman. <br>
                        - Jenis usaha, apabila diisi dengan usaha lainnya. <br>
                        - Diisi dengan penjelasan mengenai usaha lainnya.
                        `, 150);
            initializeSummernote("#pertimbangan", "Ketik Sesuatu...", 100);
        });
    </script>
@endsection
