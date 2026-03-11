// meghindari kolom trerakhir
async function exportExcelJS() {
    const workbook = new ExcelJS.Workbook();
    const worksheet = workbook.addWorksheet("(P) Prospek");
    const Penagihan = workbook.addWorksheet("(P) Penagihan");
    const Lainnya = workbook.addWorksheet("(P) Lainnya");

    let nama_ao = document.getElementById("nama_ao").value;
    let cabang = document.getElementById("cabang").value;
    let tgl = document.getElementById("tgl").value;

    // ===================================================================================
    // ===================================================================================
    // ===================================================================================
    // ===================================================================================
    // --- Judul utama ---
    worksheet.mergeCells("A1:J1");
    worksheet.getCell("A1").value =
        "REKAP RENCANA & LAPORAN KEGIATAN HARIAN AO LANDING" +
        "\nPT BPR KUSUMA SUMBING " +
        cabang;
    // tinggi baris
    worksheet.getRow(1).height = 50;
    // alignment
    worksheet.getCell("A1").alignment = {
        horizontal: "center",
        vertical: "middle",
        wrapText: true,
    };
    // font
    worksheet.getCell("A1").font = {
        bold: true,
        size: 12,
    };
    // background fill
    worksheet.getCell("A1").fill = {
        type: "pattern",
        pattern: "solid",
        fgColor: {
            argb: "CFE2FF",
        },
    };

    // --- Ringkasan baris 2 & 3 ---
    worksheet.mergeCells("A2:C2");
    worksheet.getCell("A2").value = "NAMA AO LANDING";
    worksheet.getCell("A2").alignment = {
        horizontal: "left",
        vertical: "middle",
    };
    worksheet.getCell("A2").font = {
        bold: true,
    };
    worksheet.getCell("A2").fill = {
        type: "pattern",
        pattern: "solid",
        fgColor: {
            argb: "CFE2FF",
        },
    };

    worksheet.mergeCells("D2:J2");
    worksheet.getCell("D2").value = nama_ao;
    worksheet.getCell("D2").alignment = {
        horizontal: "left",
        vertical: "middle",
    };
    worksheet.getCell("D2").font = {
        bold: true,
    };
    worksheet.getCell("D2").fill = {
        type: "pattern",
        pattern: "solid",
        fgColor: {
            argb: "CFE2FF",
        },
    };

    worksheet.mergeCells("A3:C3");
    worksheet.getCell("A3").value = "TANGGAL LAPORAN";
    worksheet.getCell("A3").alignment = {
        horizontal: "left",
        vertical: "middle",
    };
    worksheet.getCell("A3").font = {
        bold: true,
    };
    worksheet.getCell("A3").fill = {
        type: "pattern",
        pattern: "solid",
        fgColor: {
            argb: "CFE2FF",
        },
    };

    worksheet.mergeCells("D3:J3");
    worksheet.getCell("D3").value = tgl;
    worksheet.getCell("D3").alignment = {
        horizontal: "left",
        vertical: "middle",
    };
    worksheet.getCell("D3").font = {
        bold: true,
    };
    worksheet.getCell("D3").fill = {
        type: "pattern",
        pattern: "solid",
        fgColor: {
            argb: "CFE2FF",
        },
    };

    // tinggi baris
    worksheet.getRow(2).height = 20;
    worksheet.getRow(3).height = 20;
    worksheet.getRow(5).height = 25;

    // --- Header tabel PROSPEK ---
    worksheet.getCell("A5").value = "No";
    worksheet.getCell("B5").value = "Cabang";
    worksheet.getCell("C5").value = "Tanggal Rencana";
    worksheet.getCell("D5").value = "Kategori Rencana";
    worksheet.getCell("E5").value = "Nama";
    worksheet.getCell("F5").value = "Alamat";
    worksheet.getCell("G5").value = "Jenis Usaha";
    worksheet.getCell("H5").value = "No Telp/HP";
    worksheet.getCell("I5").value = "Visit Ke";
    worksheet.getCell("J5").value = "Keterangan";

    // Styling header baris 4
    [5].forEach((r) => {
        worksheet.getRow(r).eachCell((cell) => {
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
    worksheet.columns = [
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
            width: 40,
        },
        {
            width: 25,
        },
        {
            width: 25,
        },
        {
            width: 10,
        },
        {
            width: 50,
        },
    ];

    // --- Isi data dari tbody ---
    const table = document.getElementById("exportTableProspek");
    table.querySelectorAll("tbody tr").forEach((row) => {
        const rowData = [];
        row.querySelectorAll("td").forEach((td, colIndex) => {
            let value = td.innerText;
            rowData.push(value);
        });
        worksheet.addRow(rowData);
    });

    // --- Styling body ---
    worksheet.eachRow(
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

    // ===============================================================================
    // --- Judul utama ---
    penagiahanFunc(Penagihan, cabang, nama_ao, tgl);
    // ===============================================================================
    // --- Judul utama ---
    lainnyaFunc(Lainnya, cabang, nama_ao, tgl);

    // --- Simpan file ---
    const buffer = await workbook.xlsx.writeBuffer();
    const blob = new Blob([buffer], {
        type: "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet",
    });
    saveAs(blob, "Rekap-rencana-prospek-ao-" + nama_ao + ".xlsx");
}
