@extends('layouts.main')
@section('konten')
    <main class="main users chart-page" id="skip-target" style="font-size: 12px;">
        <div class="container" style="margin-top: -10px">
            {{-- breadcrumb --}}
            @include('layouts.breadcrumb')

            <div class="stat-cards-item">
                <div class="card-header mb-2">
                    <strong class="text-danger"><i>Coution !</i></strong><br>
                    <i class="text-danger">Pastikan untuk melakukan pengecekan Data sebelum menginputkan Perjanjian Kredit,
                        bisa dilihat di
                        <b>INFO DATA SPK</b></i>
                </div>
                <div class="card-body w-100">

                    {{-- data debitur --}}
                    <form id="quickForm" action="{{ route('pkpmk.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" id="id_kredit" name="id_kredit"
                            value="{{ base64_encode($kredit->id_kredit) }}" readonly>
                        <input type="hidden" id="metode" name="metode" value="{{ $metode }}" readonly>

                        {{-- info data sebelumnya --}}
                        <div class="card mb-2">
                            <div class="card-header bg-warning text-white">
                                <div class="d-flex justify-content-between" onclick="hideForm1()">
                                    <div class="head-judul"><i class="fa-solid fa-circle-info"></i> INFO DATA SPK</div>
                                    <i class="fa fa-eye-slash" aria-hidden="true" id="show1"></i>
                                </div>
                            </div>
                            <div class="card-body d-none" id="konten1">
                                @include('page.master-kredit.debitur.debitur-show-detail')

                                <br>
                                <div class="text-center">
                                    <a href="{{ route('muk.show', encrypt($id_muk)) }}"
                                        class="btn btn-info w-75 text-white">
                                        <i class="fa-solid fa-eye"></i> Lihat Full Data MUK
                                    </a>
                                </div>
                            </div>
                        </div>


                        <div class="card mb-2">
                            <div class="card-header bg-primary text-white">
                                <div class="d-flex justify-content-between" onclick="hideForm2()">
                                    <div class="head-judul">1. MELENGKAPI DATA JAMINAN</div>
                                    <i class="fa fa-eye" aria-hidden="true" id="show2"></i>
                                </div>
                            </div>
                            <div class="card-body" id="konten2">
                                @include('page.master-perjanjian-kredit.pk.data-jaminan')
                            </div>
                        </div>

                        <div class="card mb-2">
                            <div class="card-header bg-primary text-white">
                                <div class="d-flex justify-content-between" onclick="hideForm2()">
                                    <div class="head-judul">2. DATA LAINNYA</div>
                                    <i class="fa fa-eye" aria-hidden="true" id="show2"></i>
                                </div>
                            </div>
                            <div class="card-body" id="konten2">
                                @include('page.master-perjanjian-kredit.pk.data-lainnya')
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
    <script src="{{ asset('script/master-kredit/muk/set-nominal-number.js') }}"></script>
    <script src="{{ asset('script/master-kredit/muk/summernote-area.js') }}"></script>

    <script>
        // $(document).ready(function() {

        // });


        for (let counter = 1; counter < 50; counter++) {
            $(`#jns_fidusia_${counter}`).on("change", function() {
                var selectopt = $(this).val();
                var head_fidusia = document.getElementById(`head_fidusia_${counter}`);
                var tgl_fidusia = document.getElementById(
                    `tgl_akta_fidusia_${counter}`
                );

                if (selectopt == "Bawah Tangan") {
                    head_fidusia.classList.remove("d-none");
                    tgl_fidusia.setAttribute("required", true);
                } else {
                    head_fidusia.classList.add("d-none");
                    tgl_fidusia.removeAttribute("required");
                }
            });

            $(`#jns_perikatan_${counter}`).on("change", function() {
                var selectopt = $(this).val();
                var no_peringkat = document.getElementById(
                    `head_no_peringkat_perikatan_${counter}`
                );
                var input = document.getElementById(
                    `no_peringkat_perikatan_${counter}`
                );
                if (selectopt == "APHT") {
                    no_peringkat.classList.remove("d-none");
                    input.setAttribute("required", true);
                } else {
                    no_peringkat.classList.add("d-none");
                    input.removeAttribute("required");
                }
            });
        }


        $("#asuransi").on("change", function() {
            var selectopt = $(this).val();
            var biaya = document.getElementById("biaya_asuransi_head");
            var perusahaan = document.getElementById("nama_perusahan_asuransi");

            if (selectopt == "Ya") {
                biaya.classList.remove("d-none");
                perusahaan.classList.remove("d-none");
            } else {
                biaya.classList.add("d-none");
                perusahaan.classList.add("d-none");
            }
        });
    </script>
@endsection
