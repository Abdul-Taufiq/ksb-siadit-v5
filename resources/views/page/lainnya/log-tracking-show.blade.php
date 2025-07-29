@include('layouts.header')

<style>
    table {
        font-size: 12px;
    }
</style>

<body>
    {{-- SPK --}}
    <div class="card card-outline card-warning">
        <div class="card-header">
            <div class="head-judul">A. DATA SPK/PERMOHONAN</div>
        </div>
        <div class="card-body">
            <div class="row ml-2">

                <div class="col-md-6">
                    <table class="spk" style="width: 98%;">
                        <tr>
                            <th>Nomor SPK</th>
                            <td>: {{ $kredit->no_spk }}</td>
                        </tr>
                        <tr>
                            <th>NIK</th>
                            <td>: {{ $kredit->debitur->nik }}</td>
                        </tr>
                        <tr>
                            <th>Nama Debitur</th>
                            <td>: {{ $kredit->debitur->nama_debitur }}</td>
                        </tr>
                        <tr>
                            <th>Kantor Cabang</th>
                            <td>: {{ $kredit->debitur->cabang->cabang }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <table class="spk">
                        <tr>
                            <th>Asal Kredit</th>
                            <td>: {{ $kredit->asal_kredit }}</td>
                        </tr>
                        <tr>
                            <th>Petugas Penerima</th>
                            <td>: {{ $kredit->petugas_penerima }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Pengajuan</th>
                            <td>:
                                {{ Carbon\Carbon::parse($kredit->tgl_pengajuan)->translatedFormat('d F Y') }}
                            </td>
                        </tr>
                        <tr>
                            <th>Jumlah Pengajuan</th>
                            <td>:
                                Rp {{ number_format($kredit->jumlah_pengajuan, 0, ',', '.') }}
                                {{-- {{ $kredit->jumlah_pengajuan }} --}}
                            </td>
                        </tr>
                    </table>
                </div>

            </div>
        </div>
        <div class="card card-outline card-warning mb-0"></div>
    </div>


    {{-- tracking --}}
    <div class="card">
        <div class="card-header">
            <div class="head-judul">B. Tracking SPK</div>
        </div>
        <div class="card-body">
            <table class="table table-responsive table-striped table-sm">
                <thead>
                    <th>#</th>
                    <th>Creator/Nama AO</th>
                    <th>Nama Pemberi Aksi</th>
                    <th>Jabatan Pemberi Aksi</th>
                    <th>Status</th>
                    <th>Tanggal Masuk</th>
                    <th>Tanggal Keluar/Aksi</th>
                    <th>Status Akhir</th>
                </thead>
                <tbody>
                    {{-- <h4>{{ $kredit->ktracking }}</h4> --}}
                    @foreach ($kredit->ktracking as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->creator }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->jabatan }}</td>
                            <td>{{ $item->status }}</td>
                            <td>{{ $item->tgl_masuk ? $item->tgl_masuk->translatedformat('d F Y, H:i') : '' }}</td>
                            <td>
                                {{ $item->tgl_status ? $item->tgl_status->translatedformat('d F Y, H:i') : 'Belum Ada Aksi' }}
                            </td>
                            <td>{{ $item->status_spk }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <!-- Icons library -->
    <script src="{{ asset('template/plugins/feather.min.js') }}"></script>
    <!-- Custom scripts -->
    <script src="{{ asset('template/js/script.js') }}"></script>
    <script src="{{ asset('template/js/darkmode-boostrap.js') }}"></script>

</body>

</html>
