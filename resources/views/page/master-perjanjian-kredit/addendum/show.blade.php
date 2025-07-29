@extends('layouts.main')
@section('konten')
    <main class="main users chart-page" id="skip-target" style="font-size: 12px;">

        <div class="container" style="margin-top: -10px">
            {{-- breadcrumb --}}
            @include('layouts.breadcrumb')

            <div class="stat-cards-item mb-2">
                <div class="card-body w-100">

                    @if ($pkpmk->kredit->status_kaops == 'Approve')
                        {{-- Print SPPK Dulu --}}
                        @if ($pkpmk->tgl_print_sppk === null)
                            <div class="row">
                                <div class="col-md-3 ">
                                    <button type="button" class="btn btn-primary btn-icon-text btn-rounded btnsppk w-100"
                                        data-id="{{ encrypt($pkpmk->id_addendum) }}">
                                        <i class="fa fa-print" aria-hidden="true"></i> &nbsp;
                                        <b>PRINT SPPK</b>
                                    </button>
                                    <p style="text-align: center; padding-top: 5px;"><i>(Surat Persetujuan Permohonan
                                            Kredit)</i>
                                    </p>
                                </div>
                                <div class="col-md-9">
                                    <h5 style="color: red; text-align: center;">
                                        <i>Print tidak dapat dilakukan karena waktu Print SPPK belum ada 1
                                            Hari!</i>
                                    </h5>
                                    <p style="text-align: center; font-style: italic">
                                        (Tombol <b>PRINT</b> akan muncul ketika Print SPPK dilakukan terhitung 1
                                        hari sebelumnya)
                                    </p>
                                </div>
                            </div>
                        @elseif($pkpmk->tgl_print_sppk->startOfDay()->diffInDays(now()) < 1)
                            <div class="row">
                                <div class="col-md-3 ">
                                    <button type="button" class="btn btn-danger btn-icon-text btn-rounded btnsppk w-100"
                                        disabled>
                                        <i class="fa fa-print" aria-hidden="true"></i> &nbsp;
                                        <b>PRINT SPPK</b>
                                    </button>
                                    <p style="text-align: center; padding-top: 5px;"><i>(Surat Persetujuan Permohonan
                                            Kredit)</i>
                                    </p>
                                </div>
                                <div class="col-md-9">
                                    <h4 style="color: red; text-align: center;">
                                        <i>Print tidak dapat dilakukan karena waktu Print SPPK belum ada 1
                                            Hari!</i>
                                    </h4>
                                    <p style="text-align: center; font-style: italic">
                                        (Tombol <b>PRINT</b> akan muncul ketika Print SPPK dilakukan terhitung 1
                                        hari sebelumnya)
                                    </p>
                                </div>
                            </div>
                        @else
                            {{-- Angsuran PK --}}
                            <div class="row">
                                <div class="col-md-3 ">
                                    <button type="button" class="btn btn-danger btn-icon-text btn-rounded btnsppk w-100"
                                        disabled>
                                        <i class="fa fa-print" aria-hidden="true"></i> &nbsp;
                                        <b>PRINT SPPK</b>
                                    </button>
                                    <p style="text-align: center; padding-top: 5px;"><i>(Surat Persetujuan Permohonan
                                            Kredit)</i>
                                    </p>
                                </div>

                                @if ($pkpmk->kredit->persetujuan->jns_kredit == 'Angsuran')
                                    @if ($pkpmk->tgl_print_addendum === null)
                                        <div class="col-md-3 ">
                                            <button type="button"
                                                class="btn btn-primary btn-icon-text btn-rounded btnview w-100"
                                                data-id="{{ encrypt($pkpmk->id_addendum) }}">
                                                <i class="fa fa-print" aria-hidden="true"></i> &nbsp;
                                                <b>PRINT PK</b>
                                            </button>
                                            <p style="text-align: center; padding-top: 5px;"><i>(Perjanjian Kredit)</i></p>
                                        </div>
                                    @else
                                        <div class="col-md-3 ">
                                            <button type="button"
                                                class="btn btn-danger btn-icon-text btn-rounded w-100 disabled">
                                                <i class="fa fa-print" aria-hidden="true"></i> &nbsp;
                                                <b>PRINT PK</b>
                                            </button>
                                            <p style="text-align: center; padding-top: 5px;"><i>(Perjanjian Kredit)</i></p>
                                        </div>
                                    @endif
                                @else
                                    {{-- button pkpmk --}}
                                    @if ($pkpmk->tgl_print_addendum === null)
                                        <div class="col-md-3 ">
                                            <button type="button"
                                                class="btn btn-primary btn-icon-text btn-rounded btnview w-100"
                                                data-id="{{ encrypt($pkpmk->id_addendum) }}">
                                                <i class="fa fa-print" aria-hidden="true"></i> &nbsp;
                                                <b>PRINT PMK</b>
                                            </button>
                                            <p style="text-align: center; padding-top: 5px;"><i>(Perjanjian Kredit)</i></p>
                                        </div>
                                    @else
                                        <div class="col-md-3 ">
                                            <button type="button"
                                                class="btn btn-danger btn-icon-text btn-rounded w-100 disabled">
                                                <i class="fa fa-print" aria-hidden="true"></i> &nbsp;
                                                <b>PRINT PMK</b>
                                            </button>
                                            <p style="text-align: center; padding-top: 5px;"><i>(Perjanjian Kredit)</i></p>
                                        </div>
                                    @endif
                                @endif


                                @if ($pkpmk->kredit->jamkenda->isNotEmpty())
                                    {{-- button SPA --}}
                                    @if ($pkpmk->tgl_print_sp_agunan === null)
                                        <div class="col-md-3 ">
                                            <button type="button"
                                                class="btn btn-primary btn-icon-text btn-rounded btnsp_agunan w-100"
                                                data-id="{{ encrypt($pkpmk->id_addendum) }}">
                                                <i class="fa fa-print" aria-hidden="true"></i> &nbsp;
                                                <b>PRINT SPA</b>
                                            </button>
                                            <p style="text-align: center; padding-top: 5px;"><i>(Surat Pernyataan
                                                    Agunan)</i></p>
                                        </div>
                                    @else
                                        <div class="col-md-3 ">
                                            <button type="button"
                                                class="btn btn-danger btn-icon-text btn-rounded w-100 disabled">
                                                <i class="fa fa-print" aria-hidden="true"></i> &nbsp;
                                                <b>PRINT SPA</b>
                                            </button>
                                            <p style="text-align: center; padding-top: 5px;"><i>(Surat Pernyataan
                                                    Agunan)</i></p>
                                        </div>
                                    @endif
                                    {{-- End button SPA --}}

                                    {{-- button SPPJF --}}
                                    @if ($pkpmk->tgl_print_sp_bawah_tangan === null)
                                        <div class="col-md-3 ">
                                            <button type="button"
                                                class="btn btn-primary btn-icon-text btn-rounded btnsp_bawah_tangan w-100"
                                                data-id="{{ encrypt($pkpmk->id_addendum) }}">
                                                <i class="fa fa-print" aria-hidden="true"></i> &nbsp;
                                                <b>PRINT SPPJF</b>
                                            </button>
                                            <p style="text-align: center; padding-top: 5px;"><i>(Surat Perjanjian Penyerahan
                                                    Jaminan
                                                    Fidusia)</i></p>
                                        </div>
                                    @else
                                        <div class="col-md-3 ">
                                            <button type="button"
                                                class="btn btn-danger btn-icon-text btn-rounded w-100 disabled">
                                                <i class="fa fa-print" aria-hidden="true"></i> &nbsp;
                                                <b>PRINT SPPJF</b>
                                            </button>
                                            <p style="text-align: center; padding-top: 5px;"><i>(Surat Perjanjian Penyerahan
                                                    Jaminan Fidusia)</i></p>
                                        </div>
                                    @endif
                                    {{-- end button SPPJF --}}
                                @else
                                    <div class="col-md-3 ">
                                        <button type="button"
                                            class="btn btn-danger btn-icon-text btn-rounded w-100 disabled">
                                            <i class="fa fa-print" aria-hidden="true"></i> &nbsp;
                                            <b>PRINT SPA</b>
                                        </button>
                                        <p style="text-align: center; padding-top: 5px;"><i>(Surat Pernyataan Agunan)</i>
                                        </p>
                                    </div>
                                    <div class="col-md-3 ">
                                        <button type="button"
                                            class="btn btn-danger btn-icon-text btn-rounded w-100 disabled">
                                            <i class="fa fa-print" aria-hidden="true"></i> &nbsp;
                                            <b>PRINT SPPJF</b>
                                        </button>
                                        <p style="text-align: center; padding-top: 5px;"><i>(Surat Perjanjian Penyerahan
                                                Jaminan Fidusia)</i></p>
                                    </div>
                                @endif


                                {{-- button Asuransi --}}
                                @if ($pkpmk->tgl_print_sp_asuransi === null && $pkpmk->kredit->persetujuan->asuransi != 'Ya')
                                    <div class="col-md-3 ">
                                        <button type="button"
                                            class="btn btn-primary btn-icon-text btn-rounded btnsp_asuransi w-100"
                                            data-id="{{ encrypt($pkpmk->id_addendum) }}">
                                            <i class="fa fa-print" aria-hidden="true"></i> &nbsp;
                                            <b>PRINT SPTMA</b>
                                        </button>
                                        <p style="text-align: center; padding-top: 5px;"><i>(Surat Pernyataan Tidak
                                                Mengikuti Asuransi)</i></p>
                                    </div>
                                @else
                                    <div class="col-md-3 ">
                                        <button type="button"
                                            class="btn btn-danger btn-icon-text btn-rounded w-100 disabled">
                                            <i class="fa fa-print" aria-hidden="true"></i> &nbsp;
                                            <b>PRINT SPTMA</b>
                                        </button>
                                        <p style="text-align: center; padding-top: 5px;"><i>(Surat Pernyataan Tidak
                                                Mengikuti
                                                Asuransi)</i></p>
                                    </div>
                                @endif


                                @if ($pkpmk->tgl_print_tpbj === null)
                                    <div class="col-md-3 ">
                                        <button type="button"
                                            class="btn btn-primary btn-icon-text btn-rounded btn_tpbj w-100"
                                            data-id="{{ encrypt($pkpmk->id_addendum) }}">
                                            <i class="fa fa-print" aria-hidden="true"></i> &nbsp;
                                            <b>PRINT TPBJ</b>
                                        </button>
                                        <p style="text-align: center; padding-top: 5px;"><i>(Tanda Penerimaan Barang
                                                Jaminan)</i>
                                        </p>
                                    </div>
                                @else
                                    <div class="col-md-3 ">
                                        <button type="button"
                                            class="btn btn-danger btn-icon-text btn-rounded w-100 disabled">
                                            <i class="fa fa-print" aria-hidden="true"></i> &nbsp;
                                            <b>PRINT TPBJ</b>
                                        </button>
                                        <p style="text-align: center; padding-top: 5px;"><i>(Tanda Penerimaan Barang
                                                Jaminan)</i>
                                        </p>
                                    </div>
                                @endif
                            </div>
                            {{-- End Angsuran PK --}}
                        @endif
                    @elseif ($pkpmk->kredit->status_pincab != 'Approve')
                        <h3 style="color: red; text-align: center;"><i>Data ini belum mendapat persetujuan dari
                                Pimpinan Cabang!</i></h3>
                        <p style="text-align: center; font-style: italic">
                            (Tombol <b>PRINT</b> akan muncul ketika sudah ada persetujuan dari Kasi Pimpinan
                            Cabang)
                        </p>
                    @else
                        <h3 style="color: red; text-align: center;"><i>Data ini belum mendapat persetujuan dari
                                Kasi Operasional!</i></h3>
                        <p style="text-align: center; font-style: italic">
                            (Tombol <b>PRINT</b> akan muncul ketika sudah ada persetujuan dari Kasi
                            Operasional)
                        </p>
                    @endif
                </div>
            </div>


            <div class="stat-cards-item">
                <div class="card-body w-100">
                    <div class="container">
                        <h5>SPK Nomor: {{ $pkpmk->kredit->no_spk }}</h5>
                        <br>
                        <iframe src="{{ url('/addendum/show/detail/' . encrypt($pkpmk->id_addendum)) }}#toolbar=1"
                            frameborder="1" width="100%" style="border: 2px solid black; height: 750px;">
                        </iframe>
                    </div>
                </div>
            </div>


        </div>

    </main>
@endsection

@section('script')
    {{-- SWA print SPPK --}}
    <script>
        $(document).ready(function() {
            $('.btnsppk').on('click', function() {
                var id = $(this).data('id');

                Swal.fire({
                    title: 'Konfirmasi Cetak SPPK',
                    html: 'Apakah Anda yakin ingin mencetak SPPK? <br> <b style="color: red;">Coution:</b> Mencetak SPPK maka data ini tidak dapat lagi diedit maupun dihapus!',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Cetak!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // window.location.href = '/print-perjanjian-kredit-sppk/' + id;
                        // window.open('/print-perjanjian-kredit-sppk/' + id, '_blank');
                        let printWindow = window.open('/addendum/print-perjanjian-kredit-sppk/' +
                            id,
                            '_blank');
                        printWindow.onload = function() {
                            printWindow.print();
                            printWindow.onafterprint = function() {
                                printWindow.close();
                            };
                        };
                    }
                });
            });
        });
    </script>

    {{-- SWA print PK --}}
    <script>
        $(document).ready(function() {
            $('.btnview').on('click', function() {
                var id = $(this).data('id');

                Swal.fire({
                    title: 'Konfirmasi Cetak PK/PMK',
                    html: 'Apakah Anda yakin ingin mencetak PK/PMK? <br> <b>Coution:</b> Mencetak PK/PMK maka data ini tidak dapat lagi diedit maupun dihapus!',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Cetak!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // window.location.href = '/pkpmk/print-perjanjian-kredit-pk/' + id;
                        window.open('/addendum/print-perjanjian-kredit-pk/' + id, '_blank');
                    }
                });
            });
        });
    </script>


    {{-- SWA print SPTMA Asuransi --}}
    <script>
        $(document).ready(function() {
            $('.btnsp_asuransi').on('click', function() {
                var id = $(this).data('id');

                Swal.fire({
                    title: 'Konfirmasi Cetak SPTMA',
                    html: 'Apakah Anda yakin ingin mencetak SPTMA? <br> <b>Coution:</b> Surat Pernyataan ini hanya bisa diprint sekali!',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Cetak!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // window.location.href = '/pkpmk/print-perjanjian-kredit-pk/' + id;
                        window.open('/addendum/print-sptma-kredit/' + id, '_blank');
                    }
                });
            });
        });
    </script>


    {{-- SWA print SPA --}}
    <script>
        $(document).ready(function() {
            $('.btnsp_agunan').on('click', function() {
                var id = $(this).data('id');

                Swal.fire({
                    title: 'Konfirmasi Cetak SPA',
                    html: 'Apakah Anda yakin ingin mencetak Surat Pernyataan Agunan? <br> <b>Coution:</b> Mencetak Surat Pernyataan Agunan hanya bisa sekali!',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Cetak!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // window.location.href = '/addendum/print-perjanjian-kredit-pk/' + id;
                        window.open('/addendum/print-spa-kredit/' + id, '_blank');
                    }
                });
            });
        });
    </script>

    {{-- SWA print SPPJF --}}
    <script>
        $(document).ready(function() {
            $('.btnsp_bawah_tangan').on('click', function() {
                var id = $(this).data('id');

                Swal.fire({
                    title: 'Konfirmasi Cetak SPPJF',
                    html: 'Apakah Anda yakin ingin mencetak SPPJF? <br> <b>Coution:</b> Surat Perjanjian Penyerahan Jaminan Fidusia ini hanya bisa diprint sekali!',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Cetak!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // window.location.href = '/addendum/print-perjanjian-kredit-pk/' + id;
                        window.open('/addendum/print-sppjf-kredit/' + id, '_blank');
                    }
                });
            });
        });
    </script>

    {{-- SWA print TPBJ --}}
    <script>
        $(document).ready(function() {
            $('.btn_tpbj').on('click', function() {
                var id = $(this).data('id');

                Swal.fire({
                    title: 'Konfirmasi Cetak TPBJ',
                    html: 'Apakah Anda yakin ingin mencetak TPBJ? <br> <b>Coution:</b> Tanda Penerimaan Barang Jaminan ini hanya bisa diprint sekali!',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Cetak!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // window.location.href = '/addendum/print-perjanjian-kredit-pk/' + id;
                        window.open('/addendum/print-tpbj-kredit/' + id, '_blank');
                    }
                });
            });
        });
    </script>

    {{-- SWA edit --}}
    <script>
        $(document).ready(function() {
            $('.btn_edit').on('click', function() {
                var id = $(this).data('id');

                Swal.fire({
                    title: 'Edit Data Persetujuan & PK/PMK',
                    html: 'Apakah Anda yakin ingin Merubah Data Persetujuan? <br> <b>Coution:</b> Pastikan bahwa Anda telah yakin ingin melakukan aksi ini!',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#d1db14',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Edit data ini!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '/kredit-addendum-edit/' + id;
                        // window.open('/pkpmk/print-sppjf-kredit/' + id, '_blank');
                    }
                });
            });
        });
    </script>
@endsection
