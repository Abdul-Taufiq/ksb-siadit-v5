<div>
    <div class="stat-cards-item">
        <div class="card-header mb-2">
            <strong><i>Progress 1/5</i></strong><br>
            <i>Note: Nomor MUK dan Tanggal MUK otomatis oleh sistem</i>
        </div>
        <div class="card-body w-100">
            {{-- data debitur --}}
            <form id="quickForm" action="{{ route('debitur.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- info data sebelumnya --}}
                <div class="card mb-2">
                    <div class="card-header bg-info text-white">
                        <div class="d-flex justify-content-between" onclick="hideForm1()">
                            <div class="head-judul"><i class="fa-solid fa-circle-info"></i> INFO DATA SPK</div>
                            <i class="fa fa-eye" aria-hidden="true" id="show1"></i>
                        </div>
                    </div>
                    <div class="card-body d-none" id="konten1">
                        @include('page.master-kredit.spk.spk-show')
                        {{-- {{ $debitur->nama_debitur }} --}}
                    </div>
                </div>

                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <div class="d-flex justify-content-between" onclick="hideForm2()">
                            <div class="head-judul">1. REKAP HASIL SLIK</div>
                            <i class="fa fa-eye" aria-hidden="true" id="show2"></i>
                        </div>
                    </div>
                    <div class="card-body">
                        {{-- debitur --}}
                        @include('livewire.master-kredit.muk.input.rekap-slik-input')
                    </div>
                </div>

                <br>

                {{-- tombol save --}}
                <div class="card">
                    <div class="card-body">
                        <div class="form-group mb-0">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="terms" class="custom-control-input" id="exampleCheck1"
                                    required>
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


@push('scripts')
    <script src="{{ asset('script/js-for-livewire/confirm-action.js') }}"></script>
    <script src="{{ asset('script/master-kredit/spk/hide-form.js') }}"></script>
@endpush
