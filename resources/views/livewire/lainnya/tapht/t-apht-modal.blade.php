<!-- Modal -->
<div wire:ignore.self class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true"
    data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <form id="quickForm" enctype="multipart/form-data">
                <input type="hidden" name="id_table" wire:model.defer='id_table'>
                <input type="hidden" id="metode" value="{{ $metode }}">
                <div class="modal-header">
                    <h1 style="font-size: 15px;">{{ $modal_title }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click='HideModal'
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group mb-4">
                                <label for="sertifikat">Sertifikat :</label>
                                <select name="sertifikat" id="sertifikat" class="form-select"
                                    wire:model.defer='sertifikat'>
                                    <option value="SHM">SHM</option>
                                    <option value="SHGB">SHGB</option>
                                    <option value="SHGU">SHGU</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-4">
                                <label for="nomor">Nomor :</label>
                                <input type="text" name="nomor" id="nomor" class="form-control" required
                                    wire:model.defer="nomor">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-4">
                                <label for="jns_perikatan">Jenis Perikatan :</label>
                                <select name="jns_perikatan" id="jns_perikatan" class="form-select"
                                    wire:model.defer='jns_perikatan'>
                                    <option value="APHT">APHT</option>
                                    <option value="SKMHT">SKMHT</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group mb-4">
                                <label for="progress">Progress :</label>
                                <input type="text" name="progress" id="progress" class="form-control" required
                                    wire:model.defer="progress">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-4">
                                <label for="inp_tgl_awal">Tgl Awal : <i>Opsional</i></label>
                                <input type="date" name="inp_tgl_awal" id="inp_tgl_awal" class="form-control"
                                    required wire:model.defer="inp_tgl_awal">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-4">
                                <label for="inp_tgl_akhir">Tgl Akhir <i>Opsional</i> :</label>
                                <input type="date" name="inp_tgl_akhir" id="inp_tgl_akhir" class="form-control"
                                    required wire:model.defer="inp_tgl_akhir">
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="form-group mb-4">
                                <label for="keterangan">Keterangan : </label>
                                <div wire:ignore>
                                    <textarea class="" id="keterangan" required wire:model='keterangan'>{{ $keterangan }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-4">
                                <label for="status_akhir">Status Akhir</label>
                                <select class="form-control" name="status_akhir" id="status_akhir" required
                                    wire:model.defer="status_akhir">
                                    <option disabled selected>- Pilih Status Akhir -</option>
                                    <option value="Proses" class="text-warning">Proses</option>
                                    <option value="Selesai" class="text-success">Selesai</option>
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="form-group mb-0">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="terms" class="custom-control-input" id="terms" required>
                            <label class="custom-control-label" for="terms">Saya setuju dengan
                                <a href="#" style="color: #007bff; text-decoration: none;">
                                    ketentuan yang berlaku
                                </a>.
                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                        wire:click='HideModal'>Close</button>
                    {{-- <button type="button" id="simpan" class="btn btn-primary" wire:click.prevent='UpdateData'><i
                            class="fa-regular fa-floppy-disk"></i> Save</button> --}}
                    <button type="button" id="simpan" class="btn btn-primary" style="letter-spacing: 2px;">
                        <i class="fa-regular fa-floppy-disk"></i> &nbsp; SIMPAN</button>
                </div>
            </form>
        </div>
    </div>
</div>





@push('scripts')
    <script>
        function initializeSummernote(selector, placeholder, height, oldValue) {
            $(`#${selector}`).summernote({
                placeholder: placeholder,
                tabsize: 2,
                height: height,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']]
                ],
                callbacks: {
                    onChange: function(contents) {
                        Livewire.dispatch('updateSummernote', {
                            field: selector,
                            value: contents
                        });
                    }
                }
            });

            // console.log(oldValue);

            // Set old value
            $(`#${selector}`).summernote('code', oldValue);
        }

        function summernotReset(selector) {
            window.addEventListener('resetSummernote', function() {
                $(selector).summernote('code', ''); // Kosongkan teks editor di frontend
            });
        }

        // Ambil nilai dari Livewire saat inisialisasi
        document.addEventListener("DOMContentLoaded", function() {
            initializeSummernote('keterangan', 'Keterangan...', 100, @json($keterangan));
        });

        summernotReset('#keterangan');


        // untuk edit old value
        document.addEventListener("DOMContentLoaded", function() {
            Livewire.on("setSummernoteContent", (data) => {
                const {
                    keterangan
                } = data[0];

                $('#keterangan').summernote('code', keterangan);
            });
        });
    </script>

    <script src="{{ asset('script/js-for-livewire/confirm-action.js') }}"></script>
@endpush
