@extends('layouts.main')
@section('konten')
    <main class="main users chart-page" id="skip-target" style="font-size: 12px;">

        <div class="container" style="margin-top: -10px">
            {{-- breadcrumb --}}
            @include('layouts.breadcrumb')

            @if (Auth::user()->jabatan == 'Legal')
                <div class="stat-cards-item mb-2">
                    <div class="card-body w-100">
                        @if ($pkpmk->kredit->status_kaops == 'Approve' && $pkpmk->kredit->status_pincab == 'Approve')
                            {{-- Print SPPK Dulu --}}
                            @if ($pkpmk->tgl_print_sppk === null)
                                @if ($pkpmk->kredit->status_pincab != 'Approve')
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h5 style="color: red; text-align: center;">
                                                <i>Print tidak dapat dilakukan Saat Ini!</i>
                                            </h5>
                                            <p style="text-align: center; font-style: italic">
                                                (Mungkin anda telah menggunakan tombol <b>S.O.S</b> oleh sebab itu
                                                memerlukan
                                                persetujuan kembali dari <b>Pimpinan Cabang</b> yang bersangkutan)
                                            </p>
                                        </div>
                                    </div>
                                @else
                                    <div class="row">
                                        <div class="col-md-3 ">
                                            <button type="button"
                                                class="btn btn-sm btn-primary btn-icon-text btn-rounded btnsppk w-100"
                                                data-id="{{ encrypt($pkpmk->id_pkpmk) }}">
                                                <i class="fa fa-print" aria-hidden="true"></i> &nbsp;
                                                <b>PRINT SPPK</b>
                                            </button>
                                            <p style="text-align: center; padding-top: 5px;"><i>(Surat Persetujuan
                                                    Permohonan
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
                                @endif
                            @elseif($pkpmk->tgl_print_sppk->startOfDay()->diffInDays(now()) < 1)
                                <div class="row">
                                    <div class="col-md-3 ">
                                        <button type="button"
                                            class="btn btn-sm btn-danger btn-icon-text btn-rounded btnsppk w-100" disabled>
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
                                        <button type="button"
                                            class="btn btn-sm btn-danger btn-icon-text btn-rounded btnsppk w-100" disabled>
                                            <i class="fa fa-print" aria-hidden="true"></i> &nbsp;
                                            <b>PRINT SPPK</b>
                                        </button>
                                        <p style="text-align: center; padding-top: 5px;"><i>(Surat Persetujuan Permohonan
                                                Kredit)</i>
                                        </p>
                                    </div>

                                    @if ($pkpmk->kredit->persetujuan->jns_kredit == 'Angsuran')
                                        @if ($pkpmk->tgl_print_pkpmk === null)
                                            <div class="col-md-3 ">
                                                <button type="button"
                                                    class="btn btn-sm btn-primary btn-icon-text btn-rounded btnview w-100"
                                                    data-id="{{ encrypt($pkpmk->id_pkpmk) }}">
                                                    <i class="fa fa-print" aria-hidden="true"></i> &nbsp;
                                                    <b>PRINT PK</b>
                                                </button>
                                                <p style="text-align: center; padding-top: 5px;"><i>(Perjanjian Kredit)</i>
                                                </p>
                                            </div>
                                        @else
                                            <div class="col-md-3 ">
                                                <button type="button"
                                                    class="btn btn-sm btn-danger btn-icon-text btn-rounded w-100 disabled">
                                                    <i class="fa fa-print" aria-hidden="true"></i> &nbsp;
                                                    <b>PRINT PK</b>
                                                </button>
                                                <p style="text-align: center; padding-top: 5px;"><i>(Perjanjian Kredit)</i>
                                                </p>
                                            </div>
                                        @endif
                                    @else
                                        {{-- button pkpmk --}}
                                        @if ($pkpmk->tgl_print_pkpmk === null)
                                            <div class="col-md-3 ">
                                                <button type="button"
                                                    class="btn btn-sm btn-primary btn-icon-text btn-rounded btnview w-100"
                                                    data-id="{{ encrypt($pkpmk->id_pkpmk) }}">
                                                    <i class="fa fa-print" aria-hidden="true"></i> &nbsp;
                                                    <b>PRINT PMK</b>
                                                </button>
                                                <p style="text-align: center; padding-top: 5px;"><i>(Perjanjian Kredit)</i>
                                                </p>
                                            </div>
                                        @else
                                            <div class="col-md-3 ">
                                                <button type="button"
                                                    class="btn btn-sm btn-danger btn-icon-text btn-rounded w-100 disabled">
                                                    <i class="fa fa-print" aria-hidden="true"></i> &nbsp;
                                                    <b>PRINT PMK</b>
                                                </button>
                                                <p style="text-align: center; padding-top: 5px;"><i>(Perjanjian Kredit)</i>
                                                </p>
                                            </div>
                                        @endif
                                    @endif


                                    @if (!empty($pkpmk->kredit->jamkenda))
                                        {{-- button SPA --}}
                                        @if ($pkpmk->tgl_print_sp_agunan === null)
                                            <div class="col-md-3 ">
                                                <button type="button"
                                                    class="btn btn-sm btn-primary btn-icon-text btn-rounded btnsp_agunan w-100"
                                                    data-id="{{ encrypt($pkpmk->id_pkpmk) }}">
                                                    <i class="fa fa-print" aria-hidden="true"></i> &nbsp;
                                                    <b>PRINT SPA</b>
                                                </button>
                                                <p style="text-align: center; padding-top: 5px;"><i>(Surat Pernyataan
                                                        Agunan)</i></p>
                                            </div>
                                        @else
                                            <div class="col-md-3 ">
                                                <button type="button"
                                                    class="btn btn-sm btn-danger btn-icon-text btn-rounded w-100 disabled">
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
                                                    class="btn btn-sm btn-primary btn-icon-text btn-rounded btnsp_bawah_tangan w-100"
                                                    data-id="{{ encrypt($pkpmk->id_pkpmk) }}">
                                                    <i class="fa fa-print" aria-hidden="true"></i> &nbsp;
                                                    <b>PRINT SPPJF</b>
                                                </button>
                                                <p style="text-align: center; padding-top: 5px;"><i>(Surat Perjanjian
                                                        Penyerahan
                                                        Jaminan
                                                        Fidusia)</i></p>
                                            </div>
                                        @else
                                            <div class="col-md-3 ">
                                                <button type="button"
                                                    class="btn btn-sm btn-danger btn-icon-text btn-rounded w-100 disabled">
                                                    <i class="fa fa-print" aria-hidden="true"></i> &nbsp;
                                                    <b>PRINT SPPJF</b>
                                                </button>
                                                <p style="text-align: center; padding-top: 5px;"><i>(Surat Perjanjian
                                                        Penyerahan
                                                        Jaminan Fidusia)</i></p>
                                            </div>
                                        @endif
                                        {{-- end button SPPJF --}}
                                    @else
                                        <div class="col-md-3 ">
                                            <button type="button"
                                                class="btn btn-sm btn-danger btn-icon-text btn-rounded w-100 disabled">
                                                <i class="fa fa-print" aria-hidden="true"></i> &nbsp;
                                                <b>PRINT SPA</b>
                                            </button>
                                            <p style="text-align: center; padding-top: 5px;"><i>(Surat Pernyataan
                                                    Agunan)</i>
                                            </p>
                                        </div>
                                        <div class="col-md-3 ">
                                            <button type="button"
                                                class="btn btn-sm btn-danger btn-icon-text btn-rounded w-100 disabled">
                                                <i class="fa fa-print" aria-hidden="true"></i> &nbsp;
                                                <b>PRINT SPPJF</b>
                                            </button>
                                            <p style="text-align: center; padding-top: 5px;"><i>(Surat Perjanjian
                                                    Penyerahan
                                                    Jaminan Fidusia)</i></p>
                                        </div>
                                    @endif


                                    {{-- button Asuransi --}}
                                    @if ($pkpmk->tgl_print_sp_asuransi === null && $pkpmk->kredit->persetujuan->asuransi != 'Ya')
                                        <div class="col-md-3 ">
                                            <button type="button"
                                                class="btn btn-sm btn-primary btn-icon-text btn-rounded btnsp_asuransi w-100"
                                                data-id="{{ encrypt($pkpmk->id_pkpmk) }}">
                                                <i class="fa fa-print" aria-hidden="true"></i> &nbsp;
                                                <b>PRINT SPTMA</b>
                                            </button>
                                            <p style="text-align: center; padding-top: 5px;"><i>(Surat Pernyataan Tidak
                                                    Mengikuti Asuransi)</i></p>
                                        </div>
                                    @else
                                        <div class="col-md-3 ">
                                            <button type="button"
                                                class="btn btn-sm btn-danger btn-icon-text btn-rounded w-100 disabled">
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
                                                class="btn btn-sm btn-primary btn-icon-text btn-rounded btn_tpbj w-100"
                                                data-id="{{ encrypt($pkpmk->id_pkpmk) }}">
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
                                                class="btn btn-sm btn-danger btn-icon-text btn-rounded w-100 disabled">
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


                        {{-- Perjanjian Gadai dan temannya --}}
                        @if ($pkpmk->kredit->jamdeposito->count() !== 0)
                            @if ($pkpmk->tgl_print_pkpmk != null)
                                <div class="row mt-2">
                                    <div class="col-md-3 ">
                                        <button type="button"
                                            class="btn btn-sm {{ $pkpmk->tgl_print_gadai != null ? 'btn-danger' : 'btn-primary' }} btn-icon-text btn-rounded btn_gadai w-100"
                                            data-id="{{ encrypt($pkpmk->id_pkpmk) }}"
                                            {{ $pkpmk->tgl_print_gadai != null ? 'disabled' : '' }}>
                                            <i class="fa fa-print" aria-hidden="true"></i> &nbsp;
                                            <b>PRINT PK GADAI</b>
                                        </button>
                                        <p style="text-align: center; padding-top: 5px;"><i>(Khusus Jaminan
                                                Tabungan/Deposito)</i>
                                        </p>
                                    </div>
                                    <div class="col-md-3 ">
                                        <button type="button"
                                            class="btn btn-sm {{ $pkpmk->tgl_print_blokir != null ? 'btn-danger' : 'btn-primary' }} btn-icon-text btn-rounded btn_blokir w-100"
                                            data-id="{{ encrypt($pkpmk->id_pkpmk) }}"
                                            {{ $pkpmk->tgl_print_blokir != null ? 'disabled' : '' }}>
                                            <i class="fa fa-print" aria-hidden="true"></i> &nbsp;
                                            <b>PRINT BLOKIR</b>
                                        </button>
                                        <p style="text-align: center; padding-top: 5px;"><i>(Permohonan Blokir)</i>
                                        </p>
                                    </div>
                                    <div class="col-md-3 ">
                                        <button type="button"
                                            class="btn btn-sm {{ $pkpmk->tgl_print_buka_blokir != null ? 'btn-danger' : 'btn-primary' }} btn-icon-text btn-rounded btn_buka_blokir w-100"
                                            data-id="{{ encrypt($pkpmk->id_pkpmk) }}"
                                            {{ $pkpmk->tgl_print_buka_blokir != null ? 'disabled' : '' }}>
                                            <i class="fa fa-print" aria-hidden="true"></i> &nbsp;
                                            <b>PRINT BUKA BLOKIR</b>
                                        </button>
                                        <p style="text-align: center; padding-top: 5px;"><i>(Permohonan Buka Blokir)</i>
                                        </p>
                                    </div>
                                    <div class="col-md-3 ">
                                        <button type="button"
                                            class="btn btn-sm {{ $pkpmk->tgl_print_kuasa_pencairan != null ? 'btn-danger' : 'btn-primary' }} btn-icon-text btn-rounded btn_kuasa_pencairan w-100"
                                            data-id="{{ encrypt($pkpmk->id_pkpmk) }}"
                                            {{ $pkpmk->tgl_print_kuasa_pencairan != null ? 'disabled' : '' }}>
                                            <i class="fa fa-print" aria-hidden="true"></i> &nbsp;
                                            <b>PRINT KUASA PENCAIRAN</b>
                                        </button>
                                        <p style="text-align: center; padding-top: 5px;"><i>(Kuasa Pencairan)</i>
                                        </p>
                                    </div>
                                </div>
                            @endif
                        @endif

                    </div>
                </div>
            @endif

            <div class="stat-cards-item">
                <div class="card-body w-100">
                    <div class="container">
                        <h5>SPK Nomor: {{ $pkpmk->kredit->no_spk }}</h5>
                        <br>
                        <iframe src="{{ url('/pkpmk/show/detail/' . encrypt($pkpmk->id_pkpmk)) }}#toolbar=1"
                            frameborder="1" width="100%" style="border: 2px solid black; height: 750px;">
                        </iframe>

                        <br>
                        <br>
                        @if ($pkpmk->tgl_print_pkpmk === null && $pkpmk->kredit->status_kaops == 'Approve')
                            <a href="{{ route('debitur.sos.edit.pas', base64_encode($pkpmk->kredit->id_kredit)) }}"
                                class="btn btn-sm btn-outline-warning">S.O.S (for update PAS)</a>
                        @endif
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
                        let printWindow = window.open('/pkpmk/print-perjanjian-kredit-sppk/' + id,
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
                        window.open('/pkpmk/print-perjanjian-kredit-pk/' + id, '_blank');
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
                        window.open('/pkpmk/print-sptma-kredit/' + id, '_blank');
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
                        // window.location.href = '/pkpmk/print-perjanjian-kredit-pk/' + id;
                        window.open('/pkpmk/print-spa-kredit/' + id, '_blank');
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
                        // window.location.href = '/pkpmk/print-perjanjian-kredit-pk/' + id;
                        window.open('/pkpmk/print-sppjf-kredit/' + id, '_blank');
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
                        // window.location.href = '/pkpmk/print-perjanjian-kredit-pk/' + id;
                        window.open('/pkpmk/print-tpbj-kredit/' + id, '_blank');
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
                        window.location.href = '/kredit-pkpmk-edit/' + id;
                        // window.open('/pkpmk/print-sppjf-kredit/' + id, '_blank');
                    }
                });
            });
        });
    </script>



    {{-- SWA print GADAI dan Temannya --}}
    <script>
        $(document).ready(function() {
            // PK Gadai
            $('.btn_gadai').on('click', function() {
                var id = $(this).data('id');

                Swal.fire({
                    title: 'Konfirmasi Cetak PK Gadai',
                    html: 'Apakah Anda yakin ingin mencetak PK Gadai? <br> <b>Coution:</b> Aksi ini hanya bisa dilakukan sekali!',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Cetak!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // window.location.href = '/pkpmk/print-perjanjian-kredit-pk/' + id;
                        window.open('/pkpmk/print-gadai-pk/' + id, '_blank');
                    }
                });
            });

            // Blokir
            $('.btn_blokir').on('click', function() {
                var id = $(this).data('id');

                Swal.fire({
                    title: 'Konfirmasi Cetak Permohonan Blokir',
                    html: 'Apakah Anda yakin ingin mencetak Permohonan Blokir? <br> <b>Coution:</b> Aksi ini hanya bisa dilakukan sekali!',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Cetak!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // window.location.href = '/pkpmk/print-perjanjian-kredit-pk/' + id;
                        window.open('/pkpmk/print-gadai-blokir/' + id, '_blank');
                    }
                });
            });

            // Buka Blokir
            $('.btn_buka_blokir').on('click', function() {
                var id = $(this).data('id');

                Swal.fire({
                    title: 'Konfirmasi Cetak Permohonan Buka Blokir',
                    html: 'Apakah Anda yakin ingin mencetak Permohonan Buka Blokir? <br> <b>Coution:</b> Aksi ini hanya bisa dilakukan sekali!',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Cetak!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // window.location.href = '/pkpmk/print-perjanjian-kredit-pk/' + id;
                        window.open('/pkpmk/print-gadai-buka-blokir/' + id, '_blank');
                    }
                });
            });

            // Kuasa  Pencairan
            $('.btn_kuasa_pencairan').on('click', function() {
                var id = $(this).data('id');

                Swal.fire({
                    title: 'Konfirmasi Cetak Kuasa Pencairan',
                    html: 'Apakah Anda yakin ingin mencetak Kuasa Pencairan? <br> <b>Coution:</b> Aksi ini hanya bisa dilakukan sekali!',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Cetak!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // window.location.href = '/pkpmk/print-perjanjian-kredit-pk/' + id;
                        window.open('/pkpmk/print-gadai-kuasa/' + id, '_blank');
                    }
                });
            });
        });
    </script>
@endsection
