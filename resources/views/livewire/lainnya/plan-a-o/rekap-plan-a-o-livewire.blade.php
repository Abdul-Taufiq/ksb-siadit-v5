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

    <div class="stat-cards-item">
        <div class="card-body w-100">
            <div class="">

                {{-- Tables & button --}}
                @include('livewire.komponen.searching-table')

                {{-- button --}}
                <div class="row">
                    <div class="col-md-6">
                        <i>
                            <b>NOTE : </b> Untuk export data, pastikan semua filter sudah diatur sesuai kebutuhan,
                            data
                            yang tampil didalam tabel akan diekspor.
                        </i>
                    </div>
                </div>


                <div class="table-responsive table-responsive-md" id="table-container">
                    <table class="table table-striped table-hover table-sm" id="exportTable">
                        <thead class="table-primary">
                            <tr>
                                <th style="vertical-align: middle">No</th>
                                @include('livewire.komponen.sorting-table', [
                                    'nameSort' => 'id_cabang',
                                    'displayName' => 'Cabang',
                                ])
                                @include('livewire.komponen.sorting-table', [
                                    'nameSort' => 'nama_ao',
                                    'displayName' => 'Nama AO',
                                ])
                                <th style="vertical-align: middle">Total Rencana Prospek</th>
                                <th style="vertical-align: middle">Total Rencana Penagihan</th>
                                <th style="vertical-align: middle">Total Rencana Lainnya</th>
                            </tr>
                        </thead>
                        <tbody style="vertical-align: middle">
                            @if ($monitoring->isNotEmpty())
                                @foreach ($monitoring as $data => $item)
                                    <tr wire:key='{{ sha1($item->id) }}'>
                                        <td style="text-align: center; width: 3%">
                                            {{ $loop->index + $monitoring->firstItem() }}
                                        </td>
                                        <td>
                                            {{ $item->cabang->cabang }}
                                        </td>
                                        <td>{{ $item->nama_ao }}</td>
                                        {{-- Prospek --}}
                                        <td style="text-align: center">
                                            @if ($tgl_awal != null && $tgl_akhir != null && $tgl_awal < $tgl_akhir)
                                                @php
                                                    $queryParams = http_build_query([
                                                        'tgl_awal' => $tgl_awal,
                                                        'tgl_akhir' => $tgl_akhir,
                                                    ]);
                                                @endphp
                                                <a
                                                    href="{{ route('plan-ao.rekap.show', ['kategori_plan' => 'Rencana Prospek', 'nama' => base64_encode($item->nama_ao), 'tgl_awal' => $tgl_awal, 'tgl_akhir' => $tgl_akhir]) }}">
                                                    <strong>{{ $item->count_prospek }}
                                                        Data</strong> &nbsp; | &nbsp;
                                                </a>
                                                <a href="{{ route('plan-ao.rekap.show', ['kategori_plan' => 'Rencana Prospek', 'nama' => base64_encode($item->nama_ao), 'tgl_awal' => $tgl_awal, 'tgl_akhir' => $tgl_akhir]) }}"
                                                    class="btn btn-info btn-sm btn-aksi" title="Show Detail">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            @else
                                                <i style="color: red">Mohon Isi Filter Tanggal Dulu!</i>
                                            @endif
                                        </td>

                                        {{-- Penagihan --}}
                                        <td style="text-align: center">
                                            @if ($tgl_awal != null && $tgl_akhir != null && $tgl_awal < $tgl_akhir)
                                                @php
                                                    $queryParams = http_build_query([
                                                        'tgl_awal' => $tgl_awal,
                                                        'tgl_akhir' => $tgl_akhir,
                                                    ]);
                                                @endphp
                                                <a
                                                    href="{{ route('plan-ao.rekap.show', ['kategori_plan' => 'Rencana Penagihan', 'nama' => base64_encode($item->nama_ao), 'tgl_awal' => $tgl_awal, 'tgl_akhir' => $tgl_akhir]) }}">
                                                    <strong>{{ $item->count_penagihan }}
                                                        Data</strong> &nbsp; | &nbsp;
                                                </a>
                                                <a href="{{ route('plan-ao.rekap.show', ['kategori_plan' => 'Rencana Penagihan', 'nama' => base64_encode($item->nama_ao), 'tgl_awal' => $tgl_awal, 'tgl_akhir' => $tgl_akhir]) }}"
                                                    class="btn btn-info btn-sm btn-aksi" title="Show Detail">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            @else
                                                <i style="color: red">Mohon Isi Filter Tanggal Dulu!</i>
                                            @endif
                                        </td>

                                        {{-- Lainnya --}}
                                        <td style="text-align: center">
                                            @if ($tgl_awal != null && $tgl_akhir != null && $tgl_awal < $tgl_akhir)
                                                @php
                                                    $queryParams = http_build_query([
                                                        'tgl_awal' => $tgl_awal,
                                                        'tgl_akhir' => $tgl_akhir,
                                                    ]);
                                                @endphp
                                                <a
                                                    href="{{ route('plan-ao.rekap.show', ['kategori_plan' => 'Rencana Lainnya', 'nama' => base64_encode($item->nama_ao), 'tgl_awal' => $tgl_awal, 'tgl_akhir' => $tgl_akhir]) }}">
                                                    <strong>{{ $item->count_lainnya }}
                                                        Data</strong> &nbsp; | &nbsp;
                                                </a>
                                                <a href="{{ route('plan-ao.rekap.show', ['kategori_plan' => 'Rencana Lainnya', 'nama' => base64_encode($item->nama_ao), 'tgl_awal' => $tgl_awal, 'tgl_akhir' => $tgl_akhir]) }}"
                                                    class="btn btn-info btn-sm btn-aksi" title="Show Detail">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            @else
                                                <i style="color: red">Mohon Isi Filter Tanggal Dulu!</i>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="15" class="text-center"><i>Tidak Ada Data</i></td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>

                {{ $monitoring->onEachSide(1)->links('vendor.livewire.bootstrap', data: ['scrollTo' => false]) }}
            </div>
        </div>
    </div>


    {{-- @include('livewire.master-kredit.muk.modal-muk') --}}

</div>

@section('script')
    <!-- Tambahkan library -->
    <script src="https://cdn.jsdelivr.net/npm/exceljs/dist/exceljs.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
    {{-- pdf --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
@endsection
