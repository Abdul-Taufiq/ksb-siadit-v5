// fungsi pernikahan
function status_pernikahan(number) {
    let elemen = document.getElementById(`status_pernikahan_${number}`);
    if (elemen) {
        $(elemen).off("change"); // Hapus event listener sebelumnya untuk menghindari duplikasi
        $(elemen).on("change", function () {
            var selectopt = $(this).val();
            var pasangan = document.getElementById(`div_pasangan_${number}`);
            var pernikahan_khusus = document.getElementById(
                `div_akta_${number}`
            );

            if (selectopt == "Menikah") {
                pasangan.classList.remove("d-none");
                pernikahan_khusus.classList.add("d-none");
                $(pasangan).find(".form-control").prop("required", true);
                $(pasangan).find(".form-select").prop("required", true);
                $(pernikahan_khusus)
                    .find(".form-control")
                    .prop("required", false);
                $(pernikahan_khusus)
                    .find(".form-select")
                    .prop("required", false);
            }
            // duda/janda
            else if (selectopt == "Duda/Janda") {
                pasangan.classList.add("d-none");
                pernikahan_khusus.classList.add("d-none");
                $(pasangan).find(".form-control").prop("required", false);
                $(pasangan).find(".form-select").prop("required", false);
                $(pernikahan_khusus)
                    .find(".form-control")
                    .prop("required", false);
                $(pernikahan_khusus)
                    .find(".form-select")
                    .prop("required", false);
            }
            // pernikahan khusus
            else if (selectopt == "Pernikahan Khusus") {
                pasangan.classList.remove("d-none");
                pernikahan_khusus.classList.remove("d-none");
                $(pasangan).find(".form-control").prop("required", true);
                $(pasangan).find(".form-select").prop("required", true);
                $(pernikahan_khusus)
                    .find(".form-control")
                    .prop("required", true);
                $(pernikahan_khusus)
                    .find(".form-select")
                    .prop("required", true);
            }
            // else
            else {
                pasangan.classList.add("d-none");
                pernikahan_khusus.classList.add("d-none");
                $(pasangan).find(".form-control").prop("required", false);
                $(pasangan).find(".form-select").prop("required", false);
                $(pernikahan_khusus)
                    .find(".form-control")
                    .prop("required", false);
                $(pernikahan_khusus)
                    .find(".form-select")
                    .prop("required", false);
            }
        });
    }
}

// alamat pasangan
function alamat_pasangan(number) {
    let elemen = document.getElementById(`alamat_pasangan_opsi_${number}`);
    if (elemen) {
        $(elemen).off("change"); // Hapus event listener sebelumnya untuk menghindari duplikasi
        $(elemen).on("change", function () {
            var select = $(this).val();
            var alamat = document.getElementById(`alamat_pasangan_${number}`);
            if (select == "Tinggal Sendiri") {
                alamat.classList.remove("d-none");
                $(alamat).prop("required", true);
            } else {
                alamat.classList.add("d-none");
                $(alamat).prop("required", false);
            }
        });
    }
}
