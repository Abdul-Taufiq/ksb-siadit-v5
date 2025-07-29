@extends('layouts.main')
@section('konten')
    @push('styles')
        @livewireStyles
        <link rel="stylesheet" href="{{ asset('template/css/style-input.css') }}">
    @endpush

    @push('scripts')
        @livewireScripts
        {{-- disini dikasih Js juga bisa :) --}}
    @endpush

    <main class="main users chart-page" id="skip-target" style="font-size: 12px;">

        <div class="container" style="margin-top: -10px">
            {{-- breadcrumb --}}
            @include('layouts.breadcrumb')

            <div class="stat-cards-item">
                <div class="card-header mb-2">
                    <i style="letter-spacing: 2px;"><strong>Progress 1/3</strong> </i>
                </div>
                <div class="card-body w-100">

                    {{-- data debitur --}}
                    <form id="quickForm" action="{{ route('debitur.update', encrypt($debitur->id_debitur)) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <div class="d-flex justify-content-between">
                                    <div class="head-judul">1. DATA DEBITUR</div>
                                    <i class="fa fa-eye" aria-hidden="true" id="show1"></i>
                                </div>
                            </div>
                            <div class="card-body">
                                {{-- debitur --}}
                                @include('page.master-kredit.inputan.debitur-input')
                            </div>
                            <div class="card-footer">
                                @if (auth()->user()->jabatan == 'Analis Cabang')
                                    @if ($debitur->status_pernikahan == 'Menikah')
                                        <div class="d-grid gap-2">
                                            <button type="button" class="btn btn-outline-warning" id="switch_debitur"
                                                style="letter-spacing: 2px; font-weight: bold;"
                                                value="{{ encrypt($debitur->id_debitur) }}">
                                                <i class="fas fa-random"></i> &nbsp; Switch Data Debitur Dengan Pasangan
                                            </button>
                                        </div>
                                    @endif
                                @endif
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

                                <div class="d-flex justify-content-between">
                                    <button type="button" id="simpan" class="btn btn-primary"
                                        style="letter-spacing: 2px;">
                                        <i class="fa-regular fa-floppy-disk"></i> &nbsp; <b>SIMPAN</b> & Lanjutkan</button>

                                    @if ($metode != 'create')
                                        <a href="{{ url('/debitur/spk/edit/' . base64_encode($debitur->id_debitur) . '/edit') }}"
                                            class="btn btn-warning text-white">
                                            <i class="fa-solid fa-arrow-right-long"></i> Lanjutkan Tanpa Simpan
                                        </a>
                                        <a href="{{ url()->previous() }}" class="btn btn-secondary text-white">
                                            <i class="fa-solid fa-arrow-left-long"></i> Kembali
                                        </a>
                                    @endif

                                </div>
                            </div>
                            <div class="card card-outline card-danger mb-0"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- Modal --}}
        @include('page.master-kredit.debitur.modal')

    </main>

@section('script')
    <script src="{{ asset('script/master-kredit/debitur/confirm-submit.js') }}"></script>
    <script src="{{ asset('script/master-kredit/debitur/debitur-cek-input.js') }}"></script>
    <script src="{{ asset('script/master-kredit/debitur/config-debitur-input.js') }}"></script>

    {{-- confirm switch --}}
    <script type="text/javascript">
        $(function() {
            $(document).on('click', '#switch_debitur', function(e) {
                e.preventDefault();
                var link = $(this).attr("href");
                let id = $(this).val();
                // alert(id);

                Swal.fire({
                    title: 'Apakah Anda Yakin?',
                    text: "Anda Ingin Melakukan Switch Data Debitur dengan Data Pasangan? melakukan ini dapat membuat beberapa data kosong!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Switch it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '/debitur/debitur-switch/' + id;
                        // window.open('/debitur-print-spk/' + id, '_blank');
                    }
                });
            });
        });
    </script>
@endsection
@endsection
