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
                        <div class="col-md-6">
                            <div class="form-group mb-4">
                                <label for="kode_versi">Kode Versi :</label>
                                <input type="text" name="kode_versi" id="kode_versi" class="form-control" required
                                    wire:model.defer="kode_versi">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-4">
                                <label for="file">File :</label>
                                <input type="file" name="file" id="file" class="form-control"
                                    wire:model.defer="file" accept="application/pdf,application/vnd.ms-excel">
                                @if ($file)
                                    <a href="{{ Storage::url('file_upload/juknis/' . $file) }}" target="_blank">
                                        <i class="text-primary">Lihat: {{ $file }}</i>
                                    </a> <br>
                                    <i class="text-warning">Note: Jika tidak ingin mengganti file biarkan input diatas
                                        kosong, atau jika ingin menghapus klik dibawah ini!</i>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="true"
                                            id="flexCheckDefault" wire:model='config_hapus'>
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Hapus File
                                        </label>
                                    </div>
                                @endif

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-4">
                                <label for="tgl_rilis">Tanggal Rilis :</label>
                                <input type="date" name="tgl_rilis" id="tgl_rilis" class="form-control" required
                                    wire:model.defer="tgl_rilis">
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-4">
                        <label for="pembaruan">Pembaruan : </label>
                        <div wire:ignore>
                            <textarea class="" id="pembaruan" required wire:model='pembaruan'>{{ $pembaruan }}</textarea>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label for="pembaruan_detail">Pembaruan Detail : </label>
                        <div wire:ignore>
                            <textarea class="" id="pembaruan_detail" required wire:model='pembaruan_detail'>{{ $pembaruan_detail }}</textarea>
                        </div>
                    </div>
                    <br>

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


<div wire:ignore.self class="modal fade" id="modalShow" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true"
    data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 style="font-size: 15px;">{{ $modal_title }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click='HideModal'
                    aria-label="Close"></button>
            </div>
            <div class="card-body">
                <div class="container py-2">
                    <table class="table table-responsive table-striped table-sm w-100">
                        <tr>
                            <th style="width: 20%">Kode Versi</th>
                            <td style="width: 1%">:</td>
                            <td>{{ $kode_versi }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Rilis</th>
                            <td>:</td>
                            <td>{{ $tgl_rilis ? $tgl_rilis : '-' }}</td>
                        </tr>
                        <tr>
                            <th>File</th>
                            <td>:</td>
                            <td class="text-primary">
                                @if ($file == '-')
                                    {{ $file }}
                                @else
                                    <a href="{{ asset('file_upload/juknis/' . $file) }}" target="_blank">
                                        {{ $file ? $file : 'null' }}
                                    </a>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Pembaruan</th>
                            <td>:</td>
                            <td>{!! $pembaruan !!}</td>
                        </tr>
                        <tr>
                            <th>Detail Pembaruan</th>
                            <td>:</td>
                            <td>{!! $pembaruan_detail !!}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                    wire:click='HideModal'>Close</button>
            </div>
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
            initializeSummernote('pembaruan', 'Pembaruan...', 100, @json($pembaruan));
            initializeSummernote('pembaruan_detail', 'Pembaruan Detail...', 100, @json($pembaruan_detail));
        });

        summernotReset('#pembaruan');
        summernotReset('#pembaruan_detail');


        // untuk edit old value
        document.addEventListener("DOMContentLoaded", function() {
            Livewire.on("setSummernoteContent", (data) => {
                const {
                    pembaruan,
                    pembaruan_detail
                } = data[0];

                $('#pembaruan').summernote('code', pembaruan);
                $('#pembaruan_detail').summernote('code', pembaruan_detail);
            });
        });
    </script>

    <script src="{{ asset('script/js-for-livewire/confirm-action.js') }}"></script>
@endpush
