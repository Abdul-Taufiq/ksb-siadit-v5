@extends('layouts.main')
@section('konten')
    <main class="main users chart-page" id="skip-target" style="font-size: 12px;">
        <div class="container" style="margin-top: -10px">
            {{-- breadcrumb --}}
            @include('layouts.breadcrumb')

            <div class="stat-cards-item">
                <div class="card-header mb-2">
                    <h6 class="mb-2">Nomor SPK: {{ $kredit->no_spk }}</h6>
                </div>
                <div class="card-body w-100">

                    {{-- data debitur --}}
                    <form id="quickForm" action="{{ route('debitur.sos.update.pas') }}" method="POST"
                        enctype="multipart/form-data">
                        @method('post')
                        @csrf

                        <input type="hidden" id="id_kredit" name="id_kredit"
                            value="{{ base64_encode($kredit->id_kredit) }}" readonly>
                        <input type="hidden" id="jns_kredit" name="jns_kredit"
                            value="{{ $kredit->persetujuan->jns_kredit }}" readonly>

                        {{-- Usulan/Rekomendasi --}}
                        <div class="card mb-2">
                            <div class="card-header bg-primary text-white">
                                <div class="d-flex justify-content-between" onclick="hideForm5()">
                                    <div class="head-judul">USULAN/REKOMENDASI</div>
                                    <i class="fa fa-eye" aria-hidden="true" id="show5"></i>
                                </div>
                            </div>
                            <div class="card-body" id="konten5">
                                @include('page.master-kredit.muk.input.usulan-rekomendasi')

                                <br>
                                <div class="form-group" style="margin-left: 15px">
                                    <label for="catatan_sos" class="req">Catatan Penggunaan SOS (wajib diisi!)</label>
                                    <br>
                                    <textarea name="catatan_sos" id="catatan_sos" cols="100" rows="5" required class="form-control"></textarea>
                                </div>

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
                                        <i class="fa-regular fa-floppy-disk"></i> &nbsp; <b>SIMPAN</b></button>
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
    <script>
        // JUMLAH ANGSURAN REKOMENDASI
        const jumlah_angsuran = document.getElementById("jumlah_angsuran");
        const denda_hari = document.getElementById("denda_hari");
        const jumlah_disetujui = document.getElementById("jumlah_disetujui");
        const jkw = document.getElementById("jkw");
        const besar_bunga = document.getElementById("besar_bunga");
        const jns_kredit = document.getElementById("jns_kredit"); // Tambahkan deklarasi ini
        const forTrigerUsulan = document.querySelectorAll(
            "#jumlah_disetujui, #jkw",
            "#denda_hari"
        );
        const percentase = document.querySelectorAll("#besar_bunga");
        const provisi = document.getElementById("provisi");
        const jumlah_provisi = document.getElementById("jumlah_provisi");
        const besar_adm = document.getElementById("besar_adm");
        const biaya_adm = document.getElementById("biaya_adm");
        const besar_survey = document.getElementById("besar_survey");
        const biaya_survey = document.getElementById("biaya_survey");

        const inputProvisi = document.querySelectorAll("#provisi");
        const inputbesar_adm = document.querySelectorAll("#besar_adm");
        const inputbesar_survey = document.querySelectorAll("#besar_survey");

        // Event listener untuk pemilihan jenis kredit
        // jns_kredit.addEventListener("change", updateUsulanAngsuran);
        jumlah_disetujui.addEventListener("keyup", function() {
            updateUsulanAngsuran();
            updateBiayaAdm();
            updateBiayaDenda();
            updateBiayaSurvey();
            updateBiayaProvisi();

            console.log('hay');

        });

        function updateUsulanAngsuran() {
            let plafond = toNumber(
                jumlah_disetujui.dataset.rawValue || jumlah_disetujui.value
            );
            let bunga = besar_bunga.dataset.rawValue || besar_bunga.value;
            let jkwValue = toNumber(jkw.value);
            let bungaValue = bunga / 100;

            let total; // Deklarasi variabel di luar `if` untuk mencegah scoping issue

            if (jns_kredit.value === "Berjangka") {
                total = ((plafond * bungaValue) / 360) * 31;
                // console.log("Berjangka: " + total);
            } else {
                total = ((plafond * jkwValue * bungaValue) / 12 + plafond) / jkwValue;
                // console.log("Angsuran: " + total);
            }

            // pembulatan
            total = Math.round(total);

            jumlah_angsuran.value = setFormatRupiah(total);
            jumlah_angsuran.classList.remove("is-invalid");
            jumlah_angsuran.classList.add("is-valid");
        }

        // Pasang event listener ke input yang memicu perubahan jumlah angsuran
        setInputs(forTrigerUsulan, updateUsulanAngsuran);
        setPercent(percentase, updateUsulanAngsuran);

        // Biaya Provisi
        function updateBiayaProvisi() {
            let plafond = toNumber(
                jumlah_disetujui.dataset.rawValue || jumlah_disetujui.value
            );
            let provisiVal = provisi.dataset.rawValue || provisi.value;
            let total = (plafond * provisiVal) / 100;

            // pembulatan
            total = Math.round(total);

            jumlah_provisi.value = setFormatRupiah(total);
            jumlah_provisi.classList.remove("is-invalid");
            jumlah_provisi.classList.add("is-valid");
        }
        setInputs(forTrigerUsulan, updateBiayaProvisi);
        setPercent(inputProvisi, updateBiayaProvisi);

        // biaya Adm
        function updateBiayaAdm() {
            let plafond = toNumber(
                jumlah_disetujui.dataset.rawValue || jumlah_disetujui.value
            );
            let admVal = besar_adm.dataset.rawValue || besar_adm.value;
            let total = (plafond * admVal) / 100;

            // pembulatan
            total = Math.round(total);

            biaya_adm.value = setFormatRupiah(total);
            biaya_adm.classList.remove("is-invalid");
            biaya_adm.classList.add("is-valid");
        }
        setInputs(forTrigerUsulan, updateBiayaAdm);
        setPercent(inputbesar_adm, updateBiayaAdm);

        //  Survey
        function updateBiayaSurvey() {
            let plafond = toNumber(
                jumlah_disetujui.dataset.rawValue || jumlah_disetujui.value
            );
            let surveyVal = besar_survey.dataset.rawValue || besar_survey.value;
            let total = (plafond * surveyVal) / 100;

            // pembulatan
            total = Math.round(total);

            biaya_survey.value = setFormatRupiah(total);
            biaya_survey.classList.remove("is-invalid");
            biaya_survey.classList.add("is-valid");
        }
        setInputs(forTrigerUsulan, updateBiayaSurvey);
        setPercent(inputbesar_survey, updateBiayaSurvey);

        // biaya denda
        function updateBiayaDenda() {
            let jumlah_angsurans = toNumber(
                jumlah_angsuran.dataset.rawValue || jumlah_angsuran.value
            );
            let total = (2 / 1000) * jumlah_angsurans;

            // pembulatan
            total = Math.round(total);

            denda_hari.value = setFormatRupiah(total);
            denda_hari.classList.remove("is-invalid");
            denda_hari.classList.add("is-valid");
        }
        setInputs(forTrigerUsulan, updateBiayaDenda);
    </script>
@endsection
