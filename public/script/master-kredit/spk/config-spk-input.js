$(document).ready(function () {
    // itung jumlah div yang ada
    let inputElements = document.querySelectorAll('div[id^="div_penjamin_"]');
    if (inputElements.length > 0) {
        inputElements.forEach(function (inputElement) {
            // Menggunakan ekspresi reguler untuk mencocokkan nomor pada nama input
            var match = inputElement.id.match(/\d+/);
            // Jika ada kecocokan dan nomornya lebih besar dari yang sudah ada
            if (match && parseInt(match[0]) > 0) {
                counter = parseInt(match[0]);
                // pernikahan
                status_pernikahan(counter);
                // alamat pasangan
                alamat_pasangan(counter);
            }
        });
    }

    let idfield = $("#id_field").val();

    // awalan
    $(`#pemilik_jaminan_opsi${idfield}`).on("change", function () {
        var selectopt = $(this).val();
        var headP = document.getElementById("head_penjamin_1");

        if (selectopt == "Penjamin") {
            $(headP).removeClass("d-none");
            $(headP).find(".form-control").prop("required", true);
            $(headP).find(".form-select").prop("required", true);
        } else {
            headP.classList.add("d-none");
            $(headP).find(".form-control").prop("required", false);
            $(headP).find(".form-select").prop("required", false);
        }
    });

    // Kategori SPK
    $(`#kategori_spk${idfield}`).on("change", function () {
        var select = $(this).val();
        var headR = document.getElementById(
            `head_detail_kategori_spk${idfield}`
        );
        var headNR = document.getElementById(
            `head_detail_kategori_spk_non${idfield}`
        );
        if (select == "SPK") {
            headR.classList.add("d-none");
            headNR.classList.add("d-none");
            $(headR).find(".form-select").prop("required", false);
            $(headNR).find(".form-select").prop("required", false);
        } else if (select == "Restruck") {
            headR.classList.remove("d-none");
            headNR.classList.add("d-none");
            $(headR).find(".form-select").prop("required", true);
            $(headNR).find(".form-select").prop("required", false);
        } else {
            headR.classList.add("d-none");
            headNR.classList.remove("d-none");
            $(headR).find(".form-select").prop("required", false);
            $(headNR).find(".form-select").prop("required", true);
        }
    });

    // asal kredit
    $(`#asal_kredit${idfield}`).on("change", function () {
        var selectopt = $(this).val();
        var asal = document.getElementById(`petugas_referal${idfield}`);

        if (selectopt == "Referal") {
            asal.classList.remove("d-none");
            asal.classList.add("show");
            asal.setAttribute("required", "true");
        } else {
            asal.classList.add("d-none");
            asal.classList.remove("show");
            asal.removeAttribute("required");
        }
    });

    // set rupiah

    var plafondPengajuan = document.getElementById(
        `jumlah_pengajuan${idfield}`
    );
    plafondPengajuan.addEventListener("input", function (e) {
        this.value = formatRupiah(this.value, "Rp. ");
    });

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
});
