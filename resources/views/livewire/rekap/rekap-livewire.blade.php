<div>

    <div class="stat-cards-item">
        <div class="card-body w-100">
            <div class="">
                {{-- Tables & button --}}
                @include('livewire.komponen.searching-table')

                {{-- button --}}
                <div class="d-flex flex-row-reverse bd-highlight mb-3">
                    <div class="btn-group btn-group-sm col-md-4 w-100">
                        <button id="btn-pdf-ao" type="button" class="btn btn-outline-primary btn-md">
                            <i class="fa-solid fa-download"></i> PDF (Skor AO)
                        </button>
                        <button id="btn-pdf" type="button" class="btn btn-outline-primary btn-md"
                            onclick="exportToPDF()">
                            <i class="fa-solid fa-download"></i> PDF
                        </button>
                        <button id="btn-excel" type="button" class="btn btn-outline-primary btn-md"
                            onclick="exportExcelJS()">
                            <i class="fa-solid fa-download"></i> Excel
                        </button>
                    </div>
                </div>

                <div class="table-responsive" id="table-container">
                    <table class="table table-striped table-hover table-sm w-100" id="exportTable">
                        <thead class="table-primary">
                            <tr>
                                <th style="width: 5%; vertical-align: middle">No</th>
                                @include('livewire.komponen.sorting-table', [
                                    'nameSort' => 'id_cabang',
                                    'displayName' => 'Cabang',
                                ])
                                @include('livewire.komponen.sorting-table', [
                                    'nameSort' => 'petugas_penerima',
                                    'displayName' => 'Petugas Penerima',
                                ])
                                @include('livewire.komponen.sorting-table', [
                                    'nameSort' => 'no_spk',
                                    'displayName' => 'No SPK',
                                ])
                                @include('livewire.komponen.sorting-table', [
                                    'nameSort' => 'nama_debitur',
                                    'displayName' => 'Nama Debitur',
                                ])
                                @include('livewire.komponen.sorting-table', [
                                    'nameSort' => 'tgl_pengajuan',
                                    'displayName' => 'Tgl Pengajuan',
                                ])
                                @include('livewire.komponen.sorting-table', [
                                    'nameSort' => 'status_akhir',
                                    'displayName' => 'Status',
                                ])
                                @include('livewire.komponen.sorting-table', [
                                    'nameSort' => 'jumlah_pengajuan',
                                    'displayName' => 'Jumlah Pengajuan',
                                ])
                                @include('livewire.komponen.sorting-table', [
                                    'nameSort' => 'jumlah_disetujui',
                                    'displayName' => 'Jumlah Disetujui',
                                ])
                                <th style="width: 0.15rem;" class="hide-on-export">Aksi</th>
                            </tr>
                        </thead>
                        <tbody style="vertical-align: middle">
                            @if ($kredit->isNotEmpty())
                                @foreach ($kredit as $data => $item)
                                    <tr wire:key='{{ sha1($item->id_kredit) }}'>
                                        <td>{{ $loop->index + $kredit->firstItem() }}</td>
                                        <td>{{ $item->cabang->cabang }}</td>
                                        <td>{{ $item->petugas_penerima }}</td>
                                        <td>{{ $item->no_spk }}</td>
                                        <td>{{ $item->debitur->nama_debitur }}</td>
                                        <td>{{ $item->tgl_pengajuan?->translatedFormat('d F Y') }}</td>
                                        <td>{{ $item->status_akhir }}</td>
                                        <td>{{ 'Rp' . number_format($item->jumlah_pengajuan, 0, ',', '.') }}</td>
                                        <td>
                                            {{ $item->jumlah_disetujui ? 'Rp' . number_format($item->jumlah_disetujui, 0, ',', '.') : '-' }}
                                        </td>
                                        <td class="hide-on-export">
                                            <a href="{{ route('debitur.show', encrypt($item->id_kredit)) }}"
                                                class="btn btn-info btn-sm btn-aksi" title="Show Detail">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="10" class="text-center"><i>Tidak Ada Data</i></td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>

                {{ $kredit->onEachSide(1)->links('vendor.livewire.bootstrap', data: ['scrollTo' => false]) }}
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

            // Ambil tabel dari HTML
            const table = document.getElementById("exportTable");

            // Ambil header, tanpa kolom terakhir ("Aksi")
            const headers = [];
            table.querySelectorAll("thead th").forEach((th, index, arr) => {
                if (index < arr.length - 1) {
                    headers.push(th.innerText);
                }
            });

            // Tambahkan header ke worksheet
            worksheet.addRow(headers);

            // Styling header: bold & background abu-abu
            const headerRow = worksheet.getRow(1);
            headerRow.eachCell(cell => {
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

            // Atur lebar kolom (kurangi karena kolom "Aksi" dihapus)
            worksheet.getColumn(1).width = 7; // No
            worksheet.getColumn(2).width = 20; // Cabang
            worksheet.getColumn(3).width = 35; // Petugas
            worksheet.getColumn(4).width = 35; // No SPK
            worksheet.getColumn(5).width = 35; // Nama Debitur
            worksheet.getColumn(6).width = 25; // Tgl Pengajuan
            worksheet.getColumn(7).width = 20; // Status
            worksheet.getColumn(8).width = 25; // Jumlah Pengajuan
            worksheet.getColumn(9).width = 25; // Jumlah Disetujui

            // Atur tinggi header
            headerRow.height = 25;

            // Tambahkan isi data tanpa kolom terakhir ("Aksi")
            table.querySelectorAll("tbody tr").forEach(row => {
                const rowData = [];
                const cells = row.querySelectorAll("td");
                for (let i = 0; i < cells.length - 1; i++) {
                    rowData.push(cells[i].innerText);
                }
                worksheet.addRow(rowData);
            });

            // Simpan file
            const buffer = await workbook.xlsx.writeBuffer();
            const blob = new Blob([buffer], {
                type: "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"
            });
            saveAs(blob, "data-rekap-spk.xlsx");
        }
    </script>


    {{-- pdf --}}
    <script>
        function exportToPDF() {
            const element = document.getElementById('table-container');

            // Sembunyikan kolom "Aksi"
            document.querySelectorAll('.hide-on-export').forEach(el => el.style.display = 'none');

            // Tambahkan style sementara untuk mengecilkan font
            const style = document.createElement('style');
            style.id = 'pdf-temp-style';
            style.innerHTML = `
            #table-container * {
                font-size: 10px !important;
            }
            #table-container th {
                font-weight: bold !important;
            }
        `;
            document.head.appendChild(style);

            const opt = {
                margin: 0.2,
                filename: 'data-rekap-spk.pdf',
                image: {
                    type: 'jpeg',
                    quality: 0.98
                },
                html2canvas: {
                    scale: 2
                },
                jsPDF: {
                    unit: 'in',
                    format: 'a4',
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
    </script>

    {{-- setTimeout(() => {
            document.querySelectorAll('.hide-on-export').forEach(el => el.style.display = '');
        }, 1000); --}}


    {{-- pdf ao --}}
    <script>
        $("#btn-pdf-ao").on("click", function(e) {
            tgl_awal = document.getElementById('tgl_awal').value;
            tgl_akhir = document.getElementById('tgl_akhir').value;
            id_cabang = document.getElementById('id_cabang').value;

            // encryp like base64_enncode
            id = btoa(id_cabang);

            if (tgl_awal == '' || tgl_akhir == '' || tgl_akhir < tgl_awal) {
                alert("Format Tanggal Tidak Valid atau Tanggal akhir tidak boleh lebih kecil dari tanggal awal.");
                return; // Stop eksekusi jika tanggal tidak valid
            } else {
                window.open('/rekap/spk/print-penilaian-ao/' + id + '/' + tgl_awal + '/' + tgl_akhir, '_blank');
            }

        });
    </script>
@endsection
