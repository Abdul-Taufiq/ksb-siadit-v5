@extends('layouts.main')
@section('konten')
    <main class="main users chart-page" id="skip-target" style="font-size: 12px;">

        <div class="container" style="margin-top: -10px">
            {{-- breadcrumb --}}
            @include('layouts.breadcrumb')

            <div class="stat-cards-item">
                <div class="card-body w-100">

                    {{-- data debitur --}}
                    <form id="quickForm"
                        action="{{ $metode == 'create' ? route('plan-ao.store') : route('plan-ao.update', encrypt($monitoring->id)) }}"
                        method="POST" enctype="multipart/form-data">

                        @if ($metode == 'edit')
                            @method('PATCH')
                        @endif

                        @csrf
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <div class="d-flex justify-content-between">
                                    <div class="head-judul">DATA PLAN AO</div>
                                    <i class="fa fa-eye" aria-hidden="true" id="show1"></i>
                                </div>
                            </div>
                            <div class="card-body">
                                @include('page.lainnya.planAo.plan-ao-input')
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
                                <button type="button" id="simpan" class="btn btn-primary" style="letter-spacing: 2px;">
                                    <i class="fa-regular fa-floppy-disk"></i> &nbsp; <b>SIMPAN</b></button>
                            </div>
                            <div class="card card-outline card-danger mb-0"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- Modal --}}
        {{-- @include('page.master-kredit.debitur.modal') --}}

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

    </main>

@section('script')
    <script src="{{ asset('script/master-kredit/debitur/confirm-submit.js') }}"></script>
    <script src="{{ asset('script/master-kredit/muk/summernote-area.js') }}"></script>
    <script src="{{ asset('script/master-kredit/debitur/debitur-cek-input.js') }}"></script>

    <script>
        $(document).ready(function() {
            initializeSummernote("#keterangan", `Keterangan....`, 150);
        });

        // setRp
        document.querySelectorAll(".setRp").forEach((input) => {
            input.addEventListener("input", function() {
                this.value = formatRupiah(this.value);
            });
        });

        /* Fungsi formatRupiah */
        function formatRupiah(angka) {
            var numberString = angka.replace(/[^,\d]/g, "").toString(),
                split = numberString.split(","),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? "." : "";
                rupiah += separator + ribuan.join(".");
            }

            rupiah = split[1] !== undefined ? rupiah + "," + split[1] : rupiah;

            return rupiah;
        }

        // fungsi format angka
        document.querySelectorAll(".nomor").forEach((input) => {
            input.addEventListener("input", function() {
                // Ambil nilai input
                let val = this.value;

                // Hapus semua karakter selain angka 0-9
                // val = val.replace(/[^0-9]/g, "");

                // menerima angka 0-9 dan dash
                val = val.replace(/[^0-9-]/g, "");

                // Set kembali ke input
                this.value = val;
            });
        });
    </script>

    {{-- fungsi minimal input no HP --}}
    <script>
        let noHp = document.getElementById('no_telp');
        let buttonSave = document.getElementById('simpan');
        noHp.addEventListener('blur', function() {
            let valHp = noHp.value.trim();
            let valid = true;

            // cek prefix
            // if (!valHp.startsWith('08') && !valHp.startsWith('628')) {
            //     alert('Nomor HP harus diawali dengan 08 atau 628!');
            //     valid = false;
            // }

            // cek panjang minimal
            // if (valHp.length < 9) {
            //     alert('Nomor HP minimal 9 digit!');
            //     valid = false;
            // }

            // atur tombol sesuai hasil validasi
            if (!valid) {
                buttonSave.setAttribute('disabled', 'true');
            } else {
                buttonSave.removeAttribute('disabled');
            }

            // alternatif
            // ^08 = harus mulai dengan 08, \d{6,} = minimal 6 digit setelahnya
            // const regex = /^08\d{6,}$/;

            // if (!regex.test(valHp)) {
            //     alert('Nomor HP harus diawali 08 dan minimal 8 digit!');
            // }

        })
    </script>

    {{-- fungsi aktif nonaktif input --}}
    <script>
        // fungsi untuk menampilkan/menyembunyikan div berdasarkan pilihan
        function toggleDiv() {
            var select = document.getElementById("kategori_plan");
            var selectedValue = select.value;

            var divProspek = document.getElementById("div_rencana_prospek");
            var divPenagihan = document.getElementById("div_rencana_penagihan");
            var divLainnya = document.getElementById("div_rencana_lainnya");

            if (selectedValue === "Rencana Prospek") {
                divProspek.classList.remove("d-none");
                divPenagihan.classList.add("d-none");
                divLainnya.classList.add("d-none");

                divProspek.querySelectorAll("input, textarea").forEach(input => {
                    input.setAttribute("required", "true");
                });
                divPenagihan.querySelectorAll("input").forEach(input => {
                    input.removeAttribute("required");
                });
                divLainnya.querySelectorAll("input").forEach(input => {
                    input.removeAttribute("required");
                });
            } else if (selectedValue === "Rencana Penagihan") {
                divProspek.classList.add("d-none");
                divPenagihan.classList.remove("d-none");
                divLainnya.classList.add("d-none");

                divProspek.querySelectorAll("input, textarea").forEach(input => {
                    input.removeAttribute("required");
                });
                divPenagihan.querySelectorAll("input").forEach(input => {
                    input.setAttribute("required", 'true');
                });
                divLainnya.querySelectorAll("input").forEach(input => {
                    input.removeAttribute("required");
                });
            } else {
                divProspek.classList.add("d-none");
                divPenagihan.classList.add("d-none");
                divLainnya.classList.remove("d-none");

                divProspek.querySelectorAll("input, textarea").forEach(input => {
                    input.removeAttribute("required");
                });
                divPenagihan.querySelectorAll("input").forEach(input => {
                    input.removeAttribute("required");
                });
                divLainnya.querySelectorAll("input").forEach(input => {
                    input.setAttribute("required", 'true');
                });
            }
        }

        // panggil fungsi saat halaman dimuat untuk set tampilan awal
        $(document).ready(function() {
            toggleDiv();
        });
    </script>
@endsection
@endsection
