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

                <div class="col-12 col-md-3 mb-2 mb-md-4">
                    @if (Auth::user()->jabatan == 'AO')
                        <a href="{{ route('monitoring.ao.create') }}" class="btn btn-primary btn-sm w-100">
                            <i class="fa-solid fa-tv"></i> &nbsp; Tambah Aktivitas Harian
                        </a>
                    @endif
                </div>

                {{-- Tables & button --}}
                @include('livewire.komponen.searching-table')

                {{-- button --}}
                <div class="row">
                    @if (Auth::user()->jabatan != 'AO')
                        <div class="col-md-6">
                            <i>
                                <b>NOTE : </b> Untuk export data, pastikan semua filter sudah diatur sesuai kebutuhan,
                                data
                                yang tampil didalam tabel akan diekspor.
                            </i>
                        </div>
                        <div class="col-md-6 text-end mb-3">
                            <div class="btn-group btn-group-sm col-md-8 w-100">
                                {{-- <button id="btn-pdf" type="button" class="btn btn-outline-primary btn-md"
                                onclick="exportToPDF()">
                                <i class="fa-solid fa-download"></i> PDF
                            </button> --}}
                                <button id="btn-excel" type="button" class="btn btn-outline-primary btn-md"
                                    onclick="exportExcelJS()">
                                    <i class="fa-solid fa-download"></i> Excel
                                </button>
                            </div>
                        </div>
                    @endif
                </div>

                <div class="table-responsive table-responsive-md" id="table-container">
                    <table class="table table-striped table-hover table-sm" id="exportTable">
                        <thead class="table-primary">
                            <tr>
                                <th rowspan="2" style="vertical-align: middle">No</th>
                                @include('livewire.komponen.sorting-table', [
                                    'nameSort' => 'id_cabang',
                                    'displayName' => 'Cabang',
                                    'class' => 'rowspan="2"',
                                ])
                                @include('livewire.komponen.sorting-table', [
                                    'nameSort' => 'tgl_kunjungan',
                                    'displayName' => 'Tanggal Kunjungan',
                                    'class' => 'rowspan="2"',
                                ])
                                @include('livewire.komponen.sorting-table', [
                                    'nameSort' => 'nama_ao',
                                    'displayName' => 'Nama AO',
                                    'class' => 'rowspan="2"',
                                ])
                                @include('livewire.komponen.sorting-table', [
                                    'nameSort' => 'nama_cadeb',
                                    'displayName' => 'Nama Cadeb',
                                    'class' => 'rowspan="2"',
                                ])
                                @include('livewire.komponen.sorting-table', [
                                    'nameSort' => 'no_hp_cadeb',
                                    'displayName' => 'No HP Cadeb',
                                    'class' => 'rowspan="2"',
                                ])
                                <th colspan="4">Alamat Domisili/Usaha</th>
                                @include('livewire.komponen.sorting-table', [
                                    'nameSort' => 'usaha',
                                    'displayName' => 'Usaha',
                                    'class' => 'rowspan="2"',
                                ])
                                @include('livewire.komponen.sorting-table', [
                                    'nameSort' => 'potensi_plafond',
                                    'displayName' => 'Potensi Plafond',
                                    'class' => 'rowspan="2"',
                                ])
                                @include('livewire.komponen.sorting-table', [
                                    'nameSort' => 'kunjungan_ke',
                                    'displayName' => 'Kunjungan Ke-',
                                    'class' => 'rowspan="2"',
                                ])
                                @include('livewire.komponen.sorting-table', [
                                    'nameSort' => 'keterangan',
                                    'displayName' => 'Keterangan',
                                    'class' => 'rowspan="2"',
                                ])
                                @include('livewire.komponen.sorting-table', [
                                    'nameSort' => 'klasifikasi',
                                    'displayName' => 'Klasifikasi',
                                    'class' => 'rowspan="2"',
                                ])
                                <th rowspan="2" style="vertical-align: middle">#</th>
                            </tr>
                            <tr>
                                @include('livewire.komponen.sorting-table', [
                                    'nameSort' => 'dusun',
                                    'displayName' => 'Dusun',
                                ])
                                @include('livewire.komponen.sorting-table', [
                                    'nameSort' => 'desa',
                                    'displayName' => 'Desa',
                                ])
                                @include('livewire.komponen.sorting-table', [
                                    'nameSort' => 'kecamatan',
                                    'displayName' => 'Kecamatan',
                                ])
                                @include('livewire.komponen.sorting-table', [
                                    'nameSort' => 'kabupaten',
                                    'displayName' => 'Kab/Kota',
                                ])
                            </tr>
                        </thead>
                        <tbody style="vertical-align: middle">
                            @if ($monitoring->isNotEmpty())
                                @foreach ($monitoring as $data => $item)
                                    <tr wire:key='{{ sha1($item->id) }}'>
                                        <td>{{ $loop->index + $monitoring->firstItem() }}</td>
                                        <td style="min-width: 100px;">{{ $item->cabang->cabang }}</td>
                                        <td style="min-width: 100px;">
                                            {{ $item->tgl_kunjungan?->format('d-m-Y') ?? '-' }}
                                        </td>
                                        <td style="min-width: 150px;">{{ $item->nama_ao }}</td>
                                        <td style="min-width: 150px;">{{ $item->nama_cadeb }}</td>

                                        @php
                                            $shortenHp = function ($name, $maxLength = 5) {
                                                return strlen($name) > $maxLength
                                                    ? substr($name, 0, $maxLength) . 'xxxxxxx'
                                                    : $name;
                                            };
                                        @endphp

                                        <td style="min-width: 150px;" id="no_hp{{ $item->id }}"
                                            data-full="{{ $item->no_hp_cadeb }}"
                                            data-short="{{ $shortenHp($item->no_hp_cadeb) }}">
                                            {{ $shortenHp($item->no_hp_cadeb) }}
                                        </td>
                                        <td style="min-width: 100px;">{{ $item->dusun }}</td>
                                        <td style="min-width: 100px;">{{ $item->desa }}</td>
                                        <td style="min-width: 100px;">{{ $item->kecamatan }}</td>
                                        <td style="min-width: 100px;">{{ $item->kabupaten }}</td>
                                        <td style="min-width: 150px;">{{ $item->usaha }}</td>
                                        <td style="min-width: 150px;">
                                            {{ $item->potensi_plafond == 0 || $item->potensi_plafond == null ? '-' : 'Rp' . number_format($item->potensi_plafond, 0, ',', '.') }}
                                        </td>
                                        <td style="min-width: 50px;">{{ $item->kunjungan_ke }}</td>
                                        <td class="text" style="min-width: 350px;">{!! $item->keterangan !!}</td>
                                        <td>{{ $item->klasifikasi }}</td>
                                        <td>
                                            @switch(Auth::user()->jabatan)
                                                @case('AO')
                                                @case('Kasi Komersial')

                                                @case('Pimpinan Cabang')
                                                    @if ($item->created_at->startOfDay()->diffInDays(now()) > 2 && Auth::user()->jabatan == 'AO')
                                                        <button class="btn btn-sm btn-secondary" title="Edit Disabled" disabled>
                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                        </button>
                                                    @else
                                                        <a href="{{ route('monitoring.ao.edit', encrypt($item->id)) }}"
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


    {{-- @include('livewire.master-kredit.muk.modal-muk') --}}

</div>

@section('script')
    <!-- Tambahkan library -->
    <script src="https://cdn.jsdelivr.net/npm/exceljs/dist/exceljs.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
    {{-- pdf --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

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
    </script>


    {{-- excel --}}
    <script>
        // function exportExcel() {
        //     const table = document.getElementById('exportTable');
        //     const workbook = XLSX.utils.table_to_book(table, {
        //         sheet: "Sheet 1"
        //     });
        //     XLSX.writeFile(workbook, "export.xlsx");
        // }

        // export all
        // async function exportExcelJS() {
        //     const workbook = new ExcelJS.Workbook();
        //     const worksheet = workbook.addWorksheet("Data");

        //     // Ambil tabel dari HTML
        //     const table = document.getElementById("exportTable");

        //     // Ambil header dan isi baris pertama
        //     const headers = [];
        //     table.querySelectorAll("thead th").forEach(th => {
        //         headers.push(th.innerText);
        //     });

        //     // Tambahkan header ke worksheet
        //     worksheet.addRow(headers);

        //     // Styling header: bold & background abu-abu
        //     const headerRow = worksheet.getRow(1);
        //     headerRow.eachCell(cell => {
        //         cell.font = {
        //             bold: true
        //         };
        //         cell.fill = {
        //             type: 'pattern',
        //             pattern: 'solid',
        //             fgColor: {
        //                 argb: 'CFE2FF'
        //             } // abu-abu muda
        //         };
        //         cell.alignment = {
        //             horizontal: 'center',
        //             vertical: 'middle'
        //         };
        //     });

        //     // atur width
        //     worksheet.getColumn(1).width = 7; // Kolom ke-1
        //     worksheet.getColumn(2).width = 20; // Kolom ke-2
        //     worksheet.getColumn(3).width = 35; // Kolom ke-3
        //     worksheet.getColumn(4).width = 35; // Kolom ke-4
        //     worksheet.getColumn(5).width = 35; // Kolom ke-5
        //     worksheet.getColumn(6).width = 25; // Kolom ke-6
        //     worksheet.getColumn(7).width = 20; // Kolom ke-7
        //     worksheet.getColumn(8).width = 25; // Kolom ke-8
        //     worksheet.getColumn(9).width = 25; // Kolom ke-9

        //     // atur height
        //     // let headerRow = worksheet.getRow(1); //jika ingin nambah spesifik tambahlkan ini dan bawah ini
        //     headerRow.height = 25;


        //     // Tambahkan isi data
        //     table.querySelectorAll("tbody tr").forEach(row => {
        //         const rowData = [];
        //         row.querySelectorAll("td").forEach(td => {
        //             rowData.push(td.innerText);
        //         });
        //         worksheet.addRow(rowData);
        //     });

        //     // Simpan file
        //     const buffer = await workbook.xlsx.writeBuffer();
        //     const blob = new Blob([buffer], {
        //         type: "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"
        //     });
        //     saveAs(blob, "data-rekap-spk.xlsx");
        // }

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
            saveAs(blob, "data-monitoring-ao.xlsx");
        }
    </script>


    {{-- pdf --}}
    {{-- <script>
        function exportToPDF() {
            const element = document.getElementById('table-container');

            // Sembunyikan kolom "Aksi"
            document.querySelectorAll('.hide-on-export').forEach(el => el.style.display = 'none');

            // Tambahkan style sementara untuk mengecilkan font
            const style = document.createElement('style');
            style.id = 'pdf-temp-style';
            style.innerHTML = `
            #table-container * {
                font-size: 9px !important;
            }
            #table-container th {
                font-weight: bold !important;
            }
        `;
            document.head.appendChild(style);

            const opt = {
                margin: 0.1,
                filename: 'data-monitoring-ao.pdf',
                image: {
                    type: 'jpeg',
                    quality: 0.98
                },
                html2canvas: {
                    scale: 2
                },
                jsPDF: {
                    unit: 'in',
                    format: 'legal',
                    orientation: 'landscape'
                }
            };

            html2pdf().set(opt).from(element).save().then(() => {
                // Kembalikan tampilan kolom "Aksi"
                document.querySelectorAll('.hide-on-export').forEach(el => el.style.display = '');

                // Hapus style font-size sementara
                const tempStyle = document.getElementById('pdf-temp-style');
                if (tempStyle) {
                    tempStyle.remove();
                }
            });
        }
    </script> --}}

    {{-- setTimeout(() => {
            document.querySelectorAll('.hide-on-export').forEach(el => el.style.display = '');
        }, 1000); --}}
@endsection
