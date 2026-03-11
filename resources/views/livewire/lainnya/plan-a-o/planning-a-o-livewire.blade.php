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
            <div class="row mb-4">
                <div class="col-6 col-sm-6">
                    @if (Auth::user()->jabatan == 'AO')
                        <a href="{{ route('plan-ao.create') }}" class="btn btn-primary btn-sm">
                            <i class="fa-solid fa-tv"></i> &nbsp; Tambah Plan Harian
                        </a>
                    @endif
                </div>

                <div class="col-6 col-sm-6">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="page_view" class="col-form-label">Select Data View</label>
                        </div>
                        <div class="col-sm-8">
                            <select class="form-select form-select-sm" name="page_view" id="page_view"
                                wire:model.live.debounce.300ms="page_view">
                                <option value="Rencana Prospek">Rencana Prospek</option>
                                <option value="Rencana Penagihan">Rencana Penagihan</option>
                                <option value="Rencana Lainnya">Rencana Lainnya</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Tables & button --}}
            @include('livewire.komponen.searching-table')

            {{-- button --}}
            <div class="row mb-2">
                <div class="col-md-6">
                    <i>
                        <b>NOTE : </b> Data yang ditampilkan adalah <strong
                            style="font-size: 15px">{{ $page_view }}</strong>
                    </i>
                </div>
            </div>

            <div class="table-responsive table-responsive-md" id="table-container">
                <table class="table table-striped table-hover table-sm" id="exportTable">
                    <thead class="table-primary">
                        <tr>
                            <th style="vertical-align: middle; min-width: 50px;">No</th>
                            @include('livewire.komponen.sorting-table', [
                                'nameSort' => 'id_cabang',
                                'displayName' => 'Cabang',
                                'style' => 'min-width: 150px;',
                            ])
                            @include('livewire.komponen.sorting-table', [
                                'nameSort' => 'tgl_plan',
                                'displayName' => 'Tanggal Rencana',
                                'style' => 'min-width: 150px;',
                            ])
                            @include('livewire.komponen.sorting-table', [
                                'nameSort' => 'nama_ao',
                                'displayName' => 'Nama AO',
                                'style' => 'min-width: 170px;',
                            ])
                            <th style="min-width: 150px;">Kategori Rencana</th>

                            @switch($page_view)
                                @case('Rencana Prospek')
                                    @include('livewire.komponen.sorting-table', [
                                        'nameSort' => 'nama_deb',
                                        'displayName' => 'Nama',
                                        'style' => 'min-width: 170px;',
                                    ])
                                    @include('livewire.komponen.sorting-table', [
                                        'nameSort' => 'alamat_jns_kegiatan',
                                        'displayName' => 'Alamat',
                                        'style' => 'min-width: 200px;',
                                    ])
                                    @include('livewire.komponen.sorting-table', [
                                        'nameSort' => 'jns_usaha',
                                        'displayName' => 'Jenis Usaha',
                                        'style' => 'min-width: 170px;',
                                    ])
                                    @include('livewire.komponen.sorting-table', [
                                        'nameSort' => 'no_telp',
                                        'displayName' => 'No Telp',
                                        'style' => 'min-width: 170px;',
                                    ])
                                    @include('livewire.komponen.sorting-table', [
                                        'nameSort' => 'visit_asr_ke',
                                        'displayName' => 'Visit Ke',
                                    ])
                                @break

                                @case('Rencana Penagihan')
                                    @include('livewire.komponen.sorting-table', [
                                        'nameSort' => 'nama_deb',
                                        'displayName' => 'Nama Debitur',
                                        'style' => 'min-width: 170px;',
                                    ])
                                    @include('livewire.komponen.sorting-table', [
                                        'nameSort' => 'alamat_jns_kegiatan',
                                        'displayName' => 'Jenis Kegiatan',
                                        'style' => 'min-width: 200px;',
                                    ])
                                    @include('livewire.komponen.sorting-table', [
                                        'nameSort' => 'baki_debet',
                                        'displayName' => 'Baki Debet',
                                        'style' => 'min-width: 170px;',
                                    ])
                                    @include('livewire.komponen.sorting-table', [
                                        'nameSort' => 'total_tagihan',
                                        'displayName' => 'Total Tagihan',
                                        'style' => 'min-width: 170px;',
                                    ])
                                    @include('livewire.komponen.sorting-table', [
                                        'nameSort' => 'visit_asr_ke',
                                        'displayName' => 'Asr Ke',
                                    ])
                                @break

                                @case('Rencana Lainnya')
                                    @include('livewire.komponen.sorting-table', [
                                        'nameSort' => 'tujuan_kunjungan',
                                        'displayName' => 'Tujuan/Lokasi Kunjungan',
                                        'style' => 'min-width: 170px;',
                                    ])
                                    @include('livewire.komponen.sorting-table', [
                                        'nameSort' => 'jns_kegiatan',
                                        'displayName' => 'Jenis Kegiatan',
                                        'style' => 'min-width: 200px;',
                                    ])
                                @break
                            @endswitch
                            <th style="min-width: 350px;">Keterangan</th>
                            <th style="vertical-align: middle; min-width: 50px;">#</th>
                        </tr>
                    </thead>
                    <tbody style="vertical-align: top" wire:loading.class="opacity-50" wire:target="page_view">
                        <tr wire:loading wire:target='page_view'>
                            <td colspan="8" rowspan="5" class="text-center text-info">
                                <i class="fa fa-spinner fa-spin"></i> Loading...
                            </td>
                        </tr>
                        @if ($monitoring->isNotEmpty())
                            @foreach ($monitoring as $data => $item)
                                <tr wire:key='{{ sha1($item->id) }}' wire:loading.remove wire:target='page_view'>

                                    <td style="text-align: center;">{{ $loop->index + $monitoring->firstItem() }}</td>
                                    <td>{{ $item->cabang->cabang }}</td>
                                    <td>
                                        {{ $item->tgl_plan?->format('d-m-Y') ?? '-' }}
                                    </td>
                                    <td>{{ $item->nama_ao }}</td>
                                    <td>{{ $item->kategori_plan }}</td>

                                    @if ($item->kategori_plan != 'Rencana Lainnya')
                                        <td>{{ $item->nama_deb }}</td>
                                    @endif

                                    @if ($item->kategori_plan == 'Rencana Lainnya')
                                        <td>{{ $item->tujuan_kunjungan }}</td>
                                    @endif

                                    <td>{{ $item->alamat_jns_kegiatan }}</td>


                                    @if ($item->kategori_plan == 'Rencana Prospek')
                                        @php
                                            $shortenHp = function ($name, $maxLength = 5) {
                                                return strlen($name) > $maxLength
                                                    ? substr($name, 0, $maxLength) . 'xxxxxxx'
                                                    : $name;
                                            };
                                        @endphp

                                        <td>{{ $item->jns_usaha }}</td>
                                        <td data-full="{{ $item->no_telp }}"
                                            data-short="{{ $shortenHp($item->no_telp) }}"
                                            onmouseover="this.textContent=this.dataset.full"
                                            onmouseout="this.textContent=this.dataset.short">
                                            {{ $shortenHp($item->no_telp) }}
                                        </td>
                                    @endif

                                    @if ($item->kategori_plan != 'Rencana Lainnya')
                                        <td style="text-align: center;">{{ $item->visit_asr_ke }}</td>
                                    @endif

                                    @if ($item->kategori_plan == 'Rencana Penagihan')
                                        <td>
                                            {{ $item->baki_debet == 0 || $item->baki_debet == null ? '-' : 'Rp' . number_format($item->baki_debet, 0, ',', '.') }}
                                        </td>
                                        <td>
                                            {{ $item->total_tagihan == 0 || $item->total_tagihan == null ? '-' : 'Rp' . number_format($item->total_tagihan, 0, ',', '.') }}
                                        </td>
                                    @endif


                                    <td class="text" style="min-width: 350px;">{!! $item->keterangan !!}</td>
                                    <td>
                                        @switch(Auth::user()->jabatan)
                                            @case('AO')
                                            @case('Kasi Komersial')

                                            @case('Pimpinan Cabang')
                                                @if (now()->greaterThan($item->created_at->copy()->addDay()->setHour(12)->setMinute(0)) && Auth::user()->jabatan == 'AO')
                                                    <button class="btn btn-sm btn-secondary" title="Edit Disabled" disabled>
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                    </button>
                                                @else
                                                    <a href="{{ route('plan-ao.edit', encrypt($item->id)) }}"
                                                        class="btn btn-sm btn-warning" title="Edit Data">
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                    </a>
                                                @endif
                                            @break

                                            @default
                                                <button class="btn btn-sm btn-secondary" title="Edit Disabled" disabled>
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </button>
                                            @break
                                        @endswitch
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

@section('script')
    <!-- Tambahkan library -->
    <script src="https://cdn.jsdelivr.net/npm/exceljs/dist/exceljs.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
    {{-- pdf --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

    {{-- excel --}}
    <script>
        // meghindari kolom trerakhir
        async function exportExcelJS() {
            const workbook = new ExcelJS.Workbook();
            const worksheet = workbook.addWorksheet("Data");

            // --- Header manual agar rowspan/colspan aktif ---
            worksheet.mergeCells('A1:A2'); // No
            worksheet.getCell('A1').value = 'No';

            worksheet.mergeCells('B1:B2'); // Cabang
            worksheet.getCell('B1').value = 'Cabang';

            worksheet.mergeCells('C1:C2'); // Tanggal Kunjungan
            worksheet.getCell('C1').value = 'Tanggal Kunjungan';

            worksheet.mergeCells('D1:D2'); // Nama AO
            worksheet.getCell('D1').value = 'Nama AO';

            worksheet.mergeCells('E1:E2'); // Nama Cadeb
            worksheet.getCell('E1').value = 'Nama Cadeb';

            worksheet.mergeCells('F1:F2'); // No HP Cadeb
            worksheet.getCell('F1').value = 'No HP Cadeb';

            // Alamat Domisili/Usaha (colspan 4)
            worksheet.mergeCells('G1:J1');
            worksheet.getCell('G1').value = 'Alamat Domisili/Usaha';
            worksheet.getCell('G2').value = 'Dusun';
            worksheet.getCell('H2').value = 'Desa';
            worksheet.getCell('I2').value = 'Kecamatan';
            worksheet.getCell('J2').value = 'Kab/Kota';

            worksheet.mergeCells('K1:K2'); // Usaha
            worksheet.getCell('K1').value = 'Usaha';

            worksheet.mergeCells('L1:L2'); // Potensi Plafond
            worksheet.getCell('L1').value = 'Potensi Plafond';

            worksheet.mergeCells('M1:M2'); // Kunjungan Ke-
            worksheet.getCell('M1').value = 'Kunjungan Ke-';

            worksheet.mergeCells('N1:N2'); // Keterangan
            worksheet.getCell('N1').value = 'Keterangan';

            worksheet.mergeCells('O1:O2'); // Klasifikasi
            worksheet.getCell('O1').value = 'Klasifikasi';

            // --- Styling header ---
            worksheet.getRow(1).height = 25;
            worksheet.getRow(2).height = 20;
            [1, 2].forEach(r => {
                worksheet.getRow(r).eachCell(cell => {
                    cell.font = {
                        bold: true
                    };
                    cell.fill = {
                        type: 'pattern',
                        pattern: 'solid',
                        fgColor: {
                            argb: 'CFE2FF'
                        }
                    };
                    cell.alignment = {
                        horizontal: 'center',
                        vertical: 'middle'
                    };
                });
            });

            // --- Lebar kolom ---
            worksheet.columns = [{
                    width: 5
                }, // No
                {
                    width: 20
                }, // Cabang
                {
                    width: 20
                }, // Tgl Kunjungan
                {
                    width: 25
                }, // Nama AO
                {
                    width: 25
                }, // Nama Cadeb
                {
                    width: 20
                }, // No HP
                {
                    width: 20
                }, // Dusun
                {
                    width: 20
                }, // Desa
                {
                    width: 20
                }, // Kecamatan
                {
                    width: 20
                }, // Kab/Kota
                {
                    width: 25
                }, // Usaha
                {
                    width: 15
                }, // Kunjungan Ke-
                {
                    width: 30
                }, // Keterangan
                {
                    width: 20
                }, // Klasifikasi
            ];

            // --- Isi data dari tbody ---
            const table = document.getElementById("exportTable");
            table.querySelectorAll("tbody tr").forEach(row => {
                const rowData = [];
                row.querySelectorAll("td").forEach(td => {
                    rowData.push(td.innerText);
                });
                worksheet.addRow(rowData);
            });

            // --- Simpan file ---
            const buffer = await workbook.xlsx.writeBuffer();
            const blob = new Blob([buffer], {
                type: "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"
            });
            saveAs(blob, "Data-prospek-ao.xlsx");
        }
    </script>
@endsection
