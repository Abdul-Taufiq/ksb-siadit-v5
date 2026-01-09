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
                <div class="row mb-3 mt-1">
                    <div class="col-md-6 text-md-start">
                        <label for="search"><strong>Search:</strong></label>
                        <div class="d-flex align-items-center">
                            <input type="search" id="search" wire:model.live.debounce.300ms="search"
                                class="form-control form-control-sm" placeholder="Cari data..."
                                style="max-width: 400px;">

                            <button class="btn btn-primary btn-sm ms-2" title="Refresh" wire:click="resetFilter"
                                wire:key="refresh-btn">
                                <i class="fa-solid fa-arrows-rotate"></i>
                            </button>
                        </div>
                    </div>

                    @if (Auth::user()->jabatan != 'AO')
                        <div class="col-md-4 text-md-end">
                            <label for="search"><strong>&nbsp;</strong></label>
                            <div class="d-flex align-items-center">
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
                        </div>
                    @endif
                </div>


                {{-- button --}}
                <div class="row">
                    <div class="col-md-6">
                        <i>
                            <b>NOTE : </b> Untuk export data, pastikan semua filter sudah diatur sesuai kebutuhan,
                            data
                            yang tampil didalam tabel akan diekspor.
                        </i>
                        <input type="hidden" name="nama_ao" id="nama_ao" value="{{ $user->nama }}">
                        <input type="hidden" name="cabang" id="cabang" value="{{ strtoupper($cabang->cabang) }}">
                        <input type="hidden" name="tgl" id="tgl" value="{{ $tgl }}">
                        <input type="hidden" name="persen_kunjungan" id="persen_kunjungan"
                            value="{{ $persen_kunjungan }}">
                        <input type="hidden" name="sukses_rate" id="sukses_rate" value="{{ $sukses_rate }}">
                        <input type="hidden" name="sukses_noa" id="sukses_noa" value="{{ $sukses_noa }}">
                        <input type="hidden" name="sukses_prospek" id="sukses_prospek" value="{{ $sukses_prospek }}">
                        <input type="hidden" name="total_kunjungan" id="total_kunjungan"
                            value="{{ $monitoring->count() }}">
                    </div>
                </div>

                <div class="table-responsive table-responsive-md" id="table-container">
                    <table class="table table-striped table-hover table-sm" id="exportTable">
                        <thead class="table-primary">
                            <tr>
                                <th colspan="15">
                                    <center>
                                        REKAP PROSPEK AO LANDING <span
                                            style="text-transform: uppercase">{{ $cabang->cabang }}</span> &nbsp; ||
                                        &nbsp;
                                        <i style="text-transform: uppercase">{{ $user->nama }}</i> <br>
                                        TANGGAL {{ $tgl }}
                                    </center>
                                </th>
                            </tr>
                            <tr>
                                <th colspan="5" style="text-align: left;"
                                    class="{{ $persen_kunjungan < 80 ? 'text-danger' : 'text-success' }}">
                                    Total Kunjungan: &nbsp; {{ $monitoring->count() }} &nbsp; &nbsp; | &nbsp; &nbsp;
                                    {{ $persen_kunjungan }}% dari 160 Kunjungan
                                </th>
                                <th colspan="10" style="text-align: left">
                                    Sukses <i>rate</i> Aplikasi Masuk terhadap jumlah Prospek: &nbsp;
                                    {{ $sukses_rate }}%
                                </th>
                            </tr>
                            <tr>
                                <th colspan="5" style="text-align: left;">
                                    Sukses <i>rate</i> NOA terhadap Aplikasi Masuk: &nbsp;
                                    {{ $sukses_noa }}%
                                </th>
                                <th colspan="10" style="text-align: left">
                                    Sukses <i>rate</i> NOA terhadap Prospek AO: &nbsp;
                                    {{ $sukses_prospek }}%
                                </th>
                            </tr>
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
                                {{-- @include('livewire.komponen.sorting-table', [
                                    'nameSort' => 'nama_ao',
                                    'displayName' => 'Nama AO',
                                    'class' => 'rowspan="2"',
                                ]) --}}
                                <th rowspan="2">Status</th>
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
                                        <td style="min-width: 100px;" data-status-pk="{{ $item->status_pk }}"
                                            data-status="{{ $item->status }}"
                                            class="{{ $item->status_pk != null ? 'text-success' : ($item->status != null ? 'text-info' : '-') }}">
                                            {{ $item->status_pk != null ? $item->status_pk : ($item->status != null ? $item->status : '-') }}
                                        </td>
                                        <td style="min-width: 150px;">{{ $item->nama_cadeb }}</td>

                                        @php
                                            $shortenHp = function ($name, $maxLength = 5) {
                                                return strlen($name) > $maxLength
                                                    ? substr($name, 0, $maxLength) . 'xxxxxxx'
                                                    : $name;
                                            };
                                        @endphp

                                        {{-- <td style="min-width: 150px;" id="no_hp{{ $item->id }}"
                                            data-full="{{ $item->no_hp_cadeb }}"
                                            data-short="{{ $shortenHp($item->no_hp_cadeb) }}">
                                            {{ $shortenHp($item->no_hp_cadeb) }}
                                        </td> --}}
                                        <td style="min-width: 150px;" data-full="{{ $item->no_hp_cadeb }}"
                                            data-short="{{ $shortenHp($item->no_hp_cadeb) }}"
                                            onmouseover="this.textContent=this.dataset.full"
                                            onmouseout="this.textContent=this.dataset.short">
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

            let nama_ao = document.getElementById('nama_ao').value;
            let cabang = document.getElementById('cabang').value;
            let tgl = document.getElementById('tgl').value;
            let persen_kunjungan = document.getElementById('persen_kunjungan').value;
            let sukses_rate = document.getElementById('sukses_rate').value;
            let sukses_noa = document.getElementById('sukses_noa').value;
            let sukses_prospek = document.getElementById('sukses_prospek').value;
            let total_kunjungan = document.getElementById('total_kunjungan').value;

            // --- Judul utama ---
            worksheet.mergeCells('A1:O1');
            worksheet.getCell('A1').value =
                'REKAP PROSPEK AO LANDING KPO Parakan ' + cabang + ' || ' + nama_ao +
                '\nTANGGAL ' + tgl;
            // tinggi baris
            worksheet.getRow(1).height = 50;
            // alignment
            worksheet.getCell('A1').alignment = {
                horizontal: 'center',
                vertical: 'middle',
                wrapText: true
            };
            // font
            worksheet.getCell('A1').font = {
                bold: true,
                size: 12
            };
            // background fill
            worksheet.getCell('A1').fill = {
                type: 'pattern',
                pattern: 'solid',
                fgColor: {
                    argb: 'CFE2FF'
                }
            };


            // --- Ringkasan baris 2 & 3 ---
            worksheet.mergeCells('A2:D2');
            worksheet.getCell('A2').value = 'Total Kunjungan: ' + total_kunjungan + '  |  ' + persen_kunjungan +
                '% dari 160 Kunjungan';
            worksheet.getCell('A2').alignment = {
                horizontal: 'left',
                vertical: 'middle'
            };
            worksheet.getCell('A2').font = {
                bold: true,
            };
            worksheet.getCell('A2').fill = {
                type: 'pattern',
                pattern: 'solid',
                fgColor: {
                    argb: 'CFE2FF'
                }
            };

            // warna font total kunjungan: merah default, hijau jika kondisi terpenuhi
            worksheet.getCell('A2').font = {
                bold: true,
                color: {
                    argb: (parseInt(total_kunjungan) >= 160 ? 'FF008000' : 'FFFF0000')
                } // hijau jika >=160, merah jika kurang
            };

            worksheet.mergeCells('E2:O2');
            worksheet.getCell('E2').value = 'Sukses rate Aplikasi Masuk terhadap jumlah Prospek: ' + sukses_rate + '%';
            worksheet.getCell('E2').alignment = {
                horizontal: 'left',
                vertical: 'middle'
            };
            worksheet.getCell('E2').font = {
                bold: true,
            };
            worksheet.getCell('E2').fill = {
                type: 'pattern',
                pattern: 'solid',
                fgColor: {
                    argb: 'CFE2FF'
                }
            };

            worksheet.mergeCells('A3:D3');
            worksheet.getCell('A3').value = 'Sukses rate NOA terhadap Aplikasi Masuk: ' + sukses_noa + '%';
            worksheet.getCell('A3').alignment = {
                horizontal: 'left',
                vertical: 'middle'
            };
            worksheet.getCell('A3').font = {
                bold: true,
            };
            worksheet.getCell('A3').fill = {
                type: 'pattern',
                pattern: 'solid',
                fgColor: {
                    argb: 'CFE2FF'
                }
            };

            worksheet.mergeCells('E3:O3');
            worksheet.getCell('E3').value = 'Sukses rate NOA terhadap Prospek AO: ' + sukses_prospek + '%';
            worksheet.getCell('E3').alignment = {
                horizontal: 'left',
                vertical: 'middle'
            };
            worksheet.getCell('E3').font = {
                bold: true,
            };
            worksheet.getCell('E3').fill = {
                type: 'pattern',
                pattern: 'solid',
                fgColor: {
                    argb: 'CFE2FF'
                }
            };

            // tinggi baris
            worksheet.getRow(2).height = 30;
            worksheet.getRow(3).height = 30;

            // --- Header tabel ---
            worksheet.mergeCells('A4:A5');
            worksheet.getCell('A4').value = 'No';
            worksheet.mergeCells('B4:B5');
            worksheet.getCell('B4').value = 'Cabang';
            worksheet.mergeCells('C4:C5');
            worksheet.getCell('C4').value = 'Tanggal Kunjungan';
            worksheet.mergeCells('D4:D5');
            worksheet.getCell('D4').value = 'Status';
            worksheet.mergeCells('E4:E5');
            worksheet.getCell('E4').value = 'Nama Cadeb';
            worksheet.mergeCells('F4:F5');
            worksheet.getCell('F4').value = 'No HP Cadeb';
            worksheet.mergeCells('G4:J4');
            worksheet.getCell('G4').value = 'Alamat Domisili/Usaha';
            worksheet.getCell('G5').value = 'Dusun';
            worksheet.getCell('H5').value = 'Desa';
            worksheet.getCell('I5').value = 'Kecamatan';
            worksheet.getCell('J5').value = 'Kab/Kota';
            worksheet.mergeCells('K4:K5');
            worksheet.getCell('K4').value = 'Usaha';
            worksheet.mergeCells('L4:L5');
            worksheet.getCell('L4').value = 'Potensi Plafond';
            worksheet.mergeCells('M4:M5');
            worksheet.getCell('M4').value = 'Kunjungan Ke-';
            worksheet.mergeCells('N4:N5');
            worksheet.getCell('N4').value = 'Keterangan';
            worksheet.mergeCells('O4:O5');
            worksheet.getCell('O4').value = 'Klasifikasi';

            // Styling header baris 4–5
            [4, 5].forEach(r => {
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
                        vertical: 'middle',
                        wrapText: true
                    };
                });
            });

            // --- Lebar kolom ---
            worksheet.columns = [{
                    width: 5
                }, {
                    width: 20
                }, {
                    width: 20
                }, {
                    width: 30
                },
                {
                    width: 30
                }, {
                    width: 20
                }, {
                    width: 25
                }, {
                    width: 25
                },
                {
                    width: 25
                }, {
                    width: 25
                }, {
                    width: 30
                }, {
                    width: 25
                },
                {
                    width: 15
                }, {
                    width: 50
                }, {
                    width: 20
                }
            ];

            // --- Isi data dari tbody ---
            const table = document.getElementById("exportTable");
            table.querySelectorAll("tbody tr").forEach(row => {
                const rowData = [];
                row.querySelectorAll("td").forEach((td, colIndex) => {
                    let value = td.innerText;

                    // khusus kolom status (index 3)
                    if (colIndex === 3) {
                        const statusPk = td.getAttribute("data-status-pk");
                        const status = td.getAttribute("data-status");

                        if (statusPk) {
                            value = statusPk;
                        } else if (status) {
                            value = status;
                        } else {
                            value = "-";
                        }
                    }

                    rowData.push(value);
                });
                worksheet.addRow(rowData);
            });

            // --- Styling body ---
            worksheet.eachRow({
                includeEmpty: false
            }, function(row, rowNumber) {
                if (rowNumber >= 6) {
                    row.height = 25;
                }
                row.eachCell({
                    includeEmpty: false
                }, function(cell, colNumber) {
                    // border
                    cell.border = {
                        top: {
                            style: 'thin',
                            color: {
                                argb: '000000'
                            }
                        },
                        left: {
                            style: 'thin',
                            color: {
                                argb: '000000'
                            }
                        },
                        bottom: {
                            style: 'thin',
                            color: {
                                argb: '000000'
                            }
                        },
                        right: {
                            style: 'thin',
                            color: {
                                argb: '000000'
                            }
                        }
                    };

                    // alignment
                    if (rowNumber >= 6) {
                        cell.alignment = {
                            vertical: 'top',
                            horizontal: 'left',
                            wrapText: true
                        };
                    }

                    // warna font khusus kolom status (colNumber 4 karena index 3)
                    if (colNumber === 4 && rowNumber >= 6) {
                        if (cell.value && cell.value !== "-") {
                            // cek apakah berasal dari status_pk atau status
                            const statusPk = row.getCell(4).value; // ambil isi cell status
                            if (statusPk === "Cetak PK") {
                                cell.font = {
                                    color: {
                                        argb: 'FF008000'
                                    },
                                    bold: true
                                }; // hijau
                            } else {
                                cell.font = {
                                    color: {
                                        argb: 'FF0000FF'
                                    },
                                    bold: true
                                }; // biru
                            }
                        } else {
                            cell.font = {
                                color: {
                                    argb: 'FF000000'
                                }
                            };
                        }
                    }
                });
            });



            // --- Simpan file ---
            const buffer = await workbook.xlsx.writeBuffer();
            const blob = new Blob([buffer], {
                type: "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"
            });
            saveAs(blob, "Rekap-data-prospek-ao-" + nama_ao + ".xlsx");
        }
    </script>
@endsection
