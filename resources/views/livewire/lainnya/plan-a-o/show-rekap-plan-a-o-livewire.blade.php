<div>

    <style>
        th {
            vertical-align: middle !important;
            text-align: center;
        }

        .text ol {
            list-style-type: decimal !important;
            /* Pastikan angka tetap muncul */
            padding-left: 20px !important;
            /* Sesuaikan indentasi */
        }

        .text ul {
            list-style-type: disc !important;
            /* Pastikan bullet tetap muncul */
            padding-left: 20px !important;
        }
    </style>

    {{-- Button --}}
    <div class="stat-cards-item mb-2">
        <div class="card-body w-100">
            <div class="">
                <div class="row">
                    <div class="col-md-6 text-md-start" style="font-size: 12px;">
                        <table class="table table-sm table-borderless w-100">
                            <tr>
                                <th style="text-align: left; width: 30%">Nama AO</th>
                                <td style="text-align: left; width: 1%">:</td>
                                <td>{{ $user->nama }}</td>
                            </tr>
                            <tr>
                                <th style="text-align: left; width: 30%">Tanggal Laporan</th>
                                <td style="text-align: left; width: 1%">:</td>
                                <td>{{ $tgl }}</td>
                            </tr>
                        </table>
                    </div>

                    <input type="hidden" name="nama_ao" id="nama_ao" value="{{ $user->nama }}">
                    <input type="hidden" name="cabang" id="cabang" value="{{ strtoupper($cabang->cabang) }}">
                    <input type="hidden" name="tgl" id="tgl" value="{{ $tgl }}">

                    <div class="col-md-6 text-md-end">
                        <div class="d-flex align-items-center">
                            <div class="btn-group btn-group-sm col-md-8 w-100">
                                <button id="btn-pdf" type="button" class="btn btn-outline-primary btn-md btn_pdf"
                                    data-id_cab="{{ base64_encode($user->id_cabang) }}"
                                    data-nama_ao="{{ base64_encode($user->nama) }}" data-tgl_awal="{{ $tgl_awal }}"
                                    data-tgl_akhir="{{ $tgl_akhir }}">
                                    <i class="fa-solid fa-download"></i> PDF
                                </button>
                                <button id="btn-excel" type="button" class="btn btn-outline-primary btn-md btn_excel">
                                    <i class="fa-solid fa-download"></i> Excel
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- Prospek --}}
    <div class="stat-cards-item mb-2">
        <div class="card-header">
            <h5>Tabel Data Rencana Prospek</h5> <br>
        </div>
        <div class="card-body w-100">
            <div class="">
                @include('livewire.lainnya.plan-a-o.inc-prospek-plan-ao')
            </div>
        </div>
    </div>


    {{-- Penagihan --}}
    <div class="stat-cards-item mb-2">
        <div class="card-header">
            <h5>Tabel Data Rencana Penagihan</h5> <br>
        </div>
        <div class="card-body w-100">
            <div class="">
                @include('livewire.lainnya.plan-a-o.inc-penagihan-plan-ao')
            </div>
        </div>
    </div>


    {{-- Lainnya --}}
    <div class="stat-cards-item mb-2">
        <div class="card-header">
            <h5>Tabel Data Rencana Lainnya</h5> <br>
        </div>
        <div class="card-body w-100">
            <div class="">
                @include('livewire.lainnya.plan-a-o.inc-lainnya-plan-ao')
            </div>
        </div>
    </div>


</div>

@section('script')
    <!-- Tambahkan library -->
    <script src="https://cdn.jsdelivr.net/npm/exceljs/dist/exceljs.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
    {{-- pdf --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

    {{-- excel --}}
    <script src="{{ asset('script/rekap-ao/rekap-plan-ao-prospek.js') }}"></script>
    <script src="{{ asset('script/rekap-ao/rekap-plan-ao-penagihan.js') }}"></script>
    <script src="{{ asset('script/rekap-ao/rekap-plan-ao-lainnya.js') }}"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll("td[id^='no_hp']").forEach(td => {
                td.addEventListener("mouseenter", function() {
                    this.textContent = this.dataset.full;
                });
                td.addEventListener("mouseleave", function() {
                    this.textContent = this.dataset.short;
                });
            });
        });

        $(document).ready(function() {
            // Excel
            $('.btn_excel').on('click', function() {
                Swal.fire({
                    title: 'Konfirmasi Cetak EXCEL',
                    html: 'Apakah Anda yakin ingin mencetak Rekap Plan AO?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Cetak!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        exportExcelJS()

                    }
                });
            });

            // PDF
            $('.btn_pdf').on('click', function() {
                var id_cab = $(this).data('id_cab');
                var nama_ao = $(this).data('nama_ao');
                var tgl_awal = $(this).data('tgl_awal');
                var tgl_akhir = $(this).data('tgl_akhir');

                Swal.fire({
                    title: 'Konfirmasi Cetak PDF',
                    html: 'Apakah Anda yakin ingin mencetak Rekap Plan AO?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Cetak!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // window.location.href = '/pkpmk/print-perjanjian-kredit-pk/' + id;
                        window.open('/monitoring/plan-ao-rekap/print/' + id_cab + '/' +
                            nama_ao + '/' + tgl_awal +
                            '/' + tgl_akhir, '_blank');
                    }
                });
            });
        });
    </script>
@endsection
