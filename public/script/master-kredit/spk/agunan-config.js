$(document).ready(function () {
    // itung jumlah div yang ada
    // Proses elemen dengan prefix 'head_jaminan_'
    processElements("head_jaminan_", function (counter) {
        kategoriJaminan(counter);
        jaminanOpsi(counter);
        OpsiKategori(counter);
    });

    // Proses elemen dengan prefix 'nominal_'
    processElements("nominal_", function (counter) {
        setRupiahNominal(counter);
    });

    // Proses elemen dengan prefix 'harga_pembelian_'
    processElements("harga_pembelian_", function (counter) {
        setRupiahTaksasiPasar(counter);
    });

    // Proses elemen dengan prefix 'o'
    processElements("type_sertifikat_", function (counter) {
        setSerfit(counter);
    });
});

$("#jns_pinjaman").on("change", function () {
    var selectopt = $(this).val();
    var head_pikar = document.getElementById("head_pikar_eks");

    if (selectopt == "PIKAR (Eksternal)") {
        head_pikar.classList.remove("d-none");
        $(head_pikar).find(".form-control").prop("required", true);
        $(head_pikar).find(".form-select").prop("required", true);
    } else {
        head_pikar.classList.add("d-none");
        $(head_pikar).find(".form-control").prop("required", false);
        $(head_pikar).find(".form-select").prop("required", false);
    }
});

function OpsiKategori(count) {
    $("#kategori_jaminan_opsi").on("change", function () {
        const selectopt = $(this).val();
        const head_non_jaminan = document.getElementById("head_non_jaminan");

        for (let i = 1; i <= count; i++) {
            const head_jaminan = document.getElementById(`head_jaminan_${i}`);
            const head_tanah = document.getElementById(`head_tanah_${i}`);
            const head_kendaraan = document.getElementById(
                `head_kendaraan_${i}`
            );
            const head_deposito = document.getElementById(`head_deposito_${i}`);

            if (selectopt === "Menggunakan Jaminan") {
                toggleElement(head_jaminan, true);
                toggleElement(head_tanah, true);
                toggleElement(head_kendaraan, true);
                toggleElement(head_deposito, true);
                toggleElement(tambah_jaminan, true);
                toggleElement(head_non_jaminan, false);
            } else {
                toggleElement(head_jaminan, false);
                toggleElement(head_tanah, false);
                toggleElement(head_kendaraan, false);
                toggleElement(head_deposito, false);
                toggleElement(tambah_jaminan, false);
                toggleElement(head_non_jaminan, true);
            }
        }
    });
}

// Fungsi untuk mengelola visibilitas dan atribut "required"
function toggleElement(element, show) {
    if (element) {
        if (show) {
            element.classList.remove("d-none");
            $(element).find(".form-control").prop("required", true);
            $(element).find(".form-select").prop("required", true);
        } else {
            element.classList.add("d-none");
            $(element).find(".form-control").prop("required", false);
            $(element).find(".form-select").prop("required", false);
        }
    }
}

// Kategori Jaminan
function kategoriJaminan(counter) {
    $(`#kategori_jaminan_${counter}`).on("change", function () {
        var selectopt = $(this).val();
        var head_tanah = document.getElementById(`head_tanah_${counter}`);
        var head_kendaraan = document.getElementById(
            `head_kendaraan_${counter}`
        );
        var head_deposito = document.getElementById(`head_deposito_${counter}`);

        if (!selectopt) {
            console.warn(
                `kategori_jaminan_${counter} tidak ditemukan, fungsi kategoriJaminan(${counter}) dibatalkan.`
            );
            return; // Stop execution early
        }

        if (!head_tanah || !head_kendaraan || !head_deposito) {
            console.warn(
                `Elemen dengan ID head_tanah_${counter}, head_kendaraan_${counter}, atau head_deposito_${counter} tidak ditemukan. Gpp Lanjut aja, aman kok :D`
            );
            return; // Stop execution early
        }

        // tanah
        if (selectopt == "Tanah/Bangunan") {
            head_tanah.classList.remove("d-none");
            head_kendaraan.classList.add("d-none");
            head_deposito.classList.add("d-none");
            $(head_tanah).find(".form-control").prop("required", true);
            $(head_tanah).find(".form-select").prop("required", true);
            $(head_kendaraan).find(".form-control").prop("required", false);
            $(head_kendaraan).find(".form-select").prop("required", false);
            $(head_deposito).find(".form-control").prop("required", false);
            $(head_deposito).find(".form-select").prop("required", false);
        }
        // kendaraan
        else if (selectopt == "Kendaraan") {
            head_tanah.classList.add("d-none");
            head_kendaraan.classList.remove("d-none");
            head_deposito.classList.add("d-none");
            $(head_tanah).find(".form-control").prop("required", false);
            $(head_tanah).find(".form-select").prop("required", false);
            $(head_kendaraan).find(".form-control").prop("required", true);
            $(head_kendaraan).find(".form-select").prop("required", true);
            $(head_deposito).find(".form-control").prop("required", false);
            $(head_deposito).find(".form-select").prop("required", false);
        }
        // deposito
        else {
            head_tanah.classList.add("d-none");
            head_kendaraan.classList.add("d-none");
            head_deposito.classList.remove("d-none");
            $(head_tanah).find(".form-control").prop("required", false);
            $(head_tanah).find(".form-select").prop("required", false);
            $(head_kendaraan).find(".form-control").prop("required", false);
            $(head_kendaraan).find(".form-select").prop("required", false);
            $(head_deposito).find(".form-control").prop("required", true);
            $(head_deposito).find(".form-select").prop("required", true);
        }
    });
}

// jaminan opsi
function jaminanOpsi(counter) {
    $(`#jns_jaminan_opsi_${counter}`).on("change", function () {
        let selectopt = $(this).val();

        if (selectopt === "Lainnya") {
            $(`#jns_jaminan_${counter}`)
                .attr("required", true)
                .removeClass("d-none");
        } else {
            $(`#jns_jaminan_${counter}`)
                .attr("required", false)
                .addClass("d-none");
        }
    });
}

// Sertif El or analog
function setSerfit(counter) {
    $(`#type_sertifikat_${counter}`).on("change", function () {
        let select = $(this).val();
        const tglser = document.getElementById(`tgl_serti_${counter}`);
        const tglsur = document.getElementById(`tgl_suruk_${counter}`);
        const nosur = document.getElementById(`no_suruk_${counter}`);

        if (!select) {
            console.warn(
                `Type sertif ${counter} tidak ditemukan, fungsi setSertif(${counter}) dibatalkan.`
            );
            return; // Stop execution early
        }

        if (!tglser || !tglsur || !nosur) {
            console.warn(
                `Elemen dengan ID tgl_sertifikat_${counter}, tgl_surat_ukur_${counter}, atau no_surat_ukur_${counter} tidak ditemukan. Gpp Lanjut aja, aman kok :D`
            );
            return; // Stop execution early
        }

        if (select == "Sertifikat-Analog") {
            tglser.classList.remove("d-none");
            $(tglser).find(".form-control").prop("required", true);
            tglsur.classList.remove("d-none");
            $(tglsur).find(".form-control").prop("required", true);
            nosur.classList.remove("d-none");
            $(nosur).find(".form-control").prop("required", true);
        } else {
            tglser.classList.add("d-none");
            $(tglser).find(".form-control").prop("required", false);
            tglsur.classList.add("d-none");
            $(tglsur).find(".form-control").prop("required", false);
            nosur.classList.add("d-none");
            $(nosur).find(".form-control").prop("required", false);
        }
    });
}

// set rupiah
function setRupiahNominal(counter) {
    var nominal = document.getElementById(`nominal_${counter}`);
    nominal.addEventListener("input", function (e) {
        this.value = formatRupiah(this.value, "Rp. ");
    });
}

// set nilai taksasi dan pasar
function setRupiahTaksasiPasar(counter) {
    var harga_pembelian = document.getElementById(`harga_pembelian_${counter}`);
    harga_pembelian.addEventListener("input", function (e) {
        this.value = formatRupiah(this.value, "Rp. ");
    });
}

/* Fungsi formatRupiah */
function formatRupiah(angka, prefix) {
    var numberString = angka.replace(/[^,\d]/g, "").toString(),
        split = numberString.split(","),
        sisa = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    if (ribuan) {
        separator = sisa ? "." : "";
        rupiah += separator + ribuan.join(".");
    }

    rupiah = split[1] !== undefined ? rupiah + "," + split[1] : rupiah;

    return prefix && rupiah ? prefix + rupiah : rupiah;
}

// Fungsi umum untuk memproses elemen berdasarkan id prefix dan callback
function processElements(prefix, callback) {
    document.querySelectorAll(`[id^="${prefix}"]`).forEach(function (element) {
        let match = element.id.match(/\d+/);
        if (match && parseInt(match[0]) > 0) {
            callback(parseInt(match[0]));
        }
    });
}
