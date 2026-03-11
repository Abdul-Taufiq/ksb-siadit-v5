function lainnyaFunc(getSheet, cabang, nama_ao, tgl) {
    // --- Judul utama ---
    getSheet.mergeCells("A1:G1");
    getSheet.getCell("A1").value =
        "REKAP RENCANA & LAPORAN KEGIATAN HARIAN AO LANDING" +
        "\nPT BPR KUSUMA SUMBING " +
        cabang;
    // tinggi baris
    getSheet.getRow(1).height = 50;
    // alignment
    getSheet.getCell("A1").alignment = {
        horizontal: "center",
        vertical: "middle",
        wrapText: true,
    };
    // font
    getSheet.getCell("A1").font = {
        bold: true,
        size: 12,
    };
    // background fill
    getSheet.getCell("A1").fill = {
        type: "pattern",
        pattern: "solid",
        fgColor: {
            argb: "CFE2FF",
        },
    };

    // --- Ringkasan baris 2 & 3 ---
    getSheet.mergeCells("A2:C2");
    getSheet.getCell("A2").value = "NAMA AO LANDING";
    getSheet.getCell("A2").alignment = {
        horizontal: "left",
        vertical: "middle",
    };
    getSheet.getCell("A2").font = {
        bold: true,
    };
    getSheet.getCell("A2").fill = {
        type: "pattern",
        pattern: "solid",
        fgColor: {
            argb: "CFE2FF",
        },
    };

    getSheet.mergeCells("D2:G2");
    getSheet.getCell("D2").value = nama_ao;
    getSheet.getCell("D2").alignment = {
        horizontal: "left",
        vertical: "middle",
    };
    getSheet.getCell("D2").font = {
        bold: true,
    };
    getSheet.getCell("D2").fill = {
        type: "pattern",
        pattern: "solid",
        fgColor: {
            argb: "CFE2FF",
        },
    };

    getSheet.mergeCells("A3:C3");
    getSheet.getCell("A3").value = "TANGGAL LAPORAN";
    getSheet.getCell("A3").alignment = {
        horizontal: "left",
        vertical: "middle",
    };
    getSheet.getCell("A3").font = {
        bold: true,
    };
    getSheet.getCell("A3").fill = {
        type: "pattern",
        pattern: "solid",
        fgColor: {
            argb: "CFE2FF",
        },
    };

    getSheet.mergeCells("D3:G3");
    getSheet.getCell("D3").value = tgl;
    getSheet.getCell("D3").alignment = {
        horizontal: "left",
        vertical: "middle",
    };
    getSheet.getCell("D3").font = {
        bold: true,
    };
    getSheet.getCell("D3").fill = {
        type: "pattern",
        pattern: "solid",
        fgColor: {
            argb: "CFE2FF",
        },
    };

    // tinggi baris
    getSheet.getRow(2).height = 20;
    getSheet.getRow(3).height = 20;
    getSheet.getRow(5).height = 25;

    // --- Header tabel PROSPEK ---
    getSheet.getCell("A5").value = "No";
    getSheet.getCell("B5").value = "Cabang";
    getSheet.getCell("C5").value = "Tanggal Rencana";
    getSheet.getCell("D5").value = "Kategori Rencana";
    getSheet.getCell("E5").value = "Tujuan/Lokasi Kunjungan";
    getSheet.getCell("F5").value = "Jenis Kegiatan";
    getSheet.getCell("G5").value = "Keterangan";

    // Styling header baris 4
    [5].forEach((r) => {
        getSheet.getRow(r).eachCell((cell) => {
            cell.font = {
                bold: true,
            };
            cell.fill = {
                type: "pattern",
                pattern: "solid",
                fgColor: {
                    argb: "CFE2FF",
                },
            };
            cell.alignment = {
                horizontal: "center",
                vertical: "middle",
                wrapText: true,
            };
        });
    });

    // --- Lebar kolom ---
    getSheet.columns = [
        {
            width: 5,
        },
        {
            width: 20,
        },
        {
            width: 20,
        },
        {
            width: 30,
        },
        {
            width: 35,
        },
        {
            width: 35,
        },
        {
            width: 50,
        },
    ];

    // --- Isi data dari tbody ---
    const tablegetSheet = document.getElementById("exportTableLainnya");
    tablegetSheet.querySelectorAll("tbody tr").forEach((row) => {
        const rowData = [];
        row.querySelectorAll("td").forEach((td, colIndex) => {
            let value = td.innerText;
            rowData.push(value);
        });
        getSheet.addRow(rowData);
    });

    // --- Styling body ---
    getSheet.eachRow(
        {
            includeEmpty: false,
        },
        function (row, rowNumber) {
            if (rowNumber >= 6) {
                row.height = 20;
            }
            row.eachCell(
                {
                    includeEmpty: false,
                },
                function (cell, colNumber) {
                    // border
                    cell.border = {
                        top: {
                            style: "thin",
                            color: {
                                argb: "000000",
                            },
                        },
                        left: {
                            style: "thin",
                            color: {
                                argb: "000000",
                            },
                        },
                        bottom: {
                            style: "thin",
                            color: {
                                argb: "000000",
                            },
                        },
                        right: {
                            style: "thin",
                            color: {
                                argb: "000000",
                            },
                        },
                    };

                    // alignment
                    if (rowNumber >= 6) {
                        cell.alignment = {
                            vertical: "top",
                            horizontal: "left",
                            wrapText: true,
                        };
                    }
                }
            );
        }
    );
}
