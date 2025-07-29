// menentukan halaman create atau edit
let idfield = $("#id_field").val();
// $(document).ready(function () {
//     alert(idfield);
//     console.log(idfield);
// });

// status debitur
$(`#status_pernikahan${idfield}`).on("change", function () {
    var selectopt = $(this).val();
    var pasangan = document.getElementById(`data_pasangan${idfield}`);
    var anak = document.getElementById(`jumlah_anak_single_head${idfield}`);
    var pasangan_alamat = document.getElementById(`alamat_pasangan${idfield}`);
    var pernikahan_khusus = document.getElementById(
        `data_pernikahan_khusus${idfield}`
    );

    if (selectopt == "Menikah") {
        pasangan.classList.remove("d-none");
        anak.classList.add("d-none");
        pernikahan_khusus.classList.add("d-none");
        $(pasangan).find(".form-control").prop("required", true);
        $(pasangan_alamat).find(".form-control").prop("required", false);
        $(pernikahan_khusus).find(".form-control").prop("required", false);
        $(`#jumlah_anak_single${idfield}`).attr("required", false);
    }
    // duda/janda
    else if (selectopt == "Duda/Janda") {
        anak.classList.remove("d-none");
        pasangan.classList.add("d-none");
        pernikahan_khusus.classList.add("d-none");
        $(pasangan).find(".form-control").prop("required", false);
        $(pasangan).find(".form-select").prop("required", false);
        $(pernikahan_khusus).find(".form-control").prop("required", false);
        $(`#jumlah_anak_single${idfield}`).attr("required", true);
    }
    // pernikahan khusus
    else if (selectopt == "Pernikahan Khusus") {
        pasangan.classList.remove("d-none");
        pernikahan_khusus.classList.remove("d-none");
        anak.classList.add("d-none");
        $(pasangan).find(".form-control").prop("required", true);
        $(pernikahan_khusus).find(".form-control").prop("required", true);
        $(pasangan_alamat).find(".form-control").prop("required", false);
    }
    // else
    else {
        pasangan.classList.add("d-none");
        pernikahan_khusus.classList.add("d-none");
        anak.classList.add("d-none");
        $(pasangan).find(".form-control").prop("required", false);
        $(pasangan).find(".form-select").prop("required", false);
        $(pasangan_alamat).find(".form-control").prop("required", false);
        $(pernikahan_khusus).find(".form-control").prop("required", false);
        $(`#jumlah_anak_single${idfield}`).attr("required", false);
    }
});

$(`#alamat_pasangan_opsi${idfield}`).on("change", function () {
    var select = $(this).val();
    var alamat = document.getElementById(`alamat_pasangan${idfield}`);
    if (select == "Tinggal Sendiri") {
        alamat.classList.add("show");
        alamat.classList.remove("d-none");
        $(alamat).prop("required", true);
    } else {
        alamat.classList.add("d-none");
        alamat.classList.remove("show");
        $(alamat).prop("required", false);
    }
});

$(`#alamat_rumah_opsi${idfield}`).on("change", function () {
    var select = $(this).val();
    var domisili = document.getElementById(`alamat_rumah${idfield}`);
    if (select == "Tidak") {
        domisili.classList.add("show");
        domisili.classList.remove("d-none");
        $(domisili).prop("required", true);
    } else {
        domisili.classList.add("d-none");
        domisili.classList.remove("show");
        $(domisili).prop("required", false);
    }
});

$(`#rt_rw_rumah_opsi${idfield}`).on("change", function () {
    var select = $(this).val();
    var domisili = document.getElementById(`rt_rw_rumah${idfield}`);
    if (select == "Tidak") {
        domisili.classList.add("show");
        domisili.classList.remove("d-none");
        $(domisili).prop("required", true);
    } else {
        domisili.classList.add("d-none");
        domisili.classList.remove("show");
        $(domisili).prop("required", false);
    }
});

// setting rupiah format
var penghasilanBulananInput = document.getElementById(
    `penghasilan_bulanan${idfield}`
);
penghasilanBulananInput.addEventListener("input", function (e) {
    this.value = formatRupiah(this.value, "Rp. ");
});

var penghasilanPasanganInput = document.getElementById(
    `penghasilan_pasangan${idfield}`
);
penghasilanPasanganInput.addEventListener("input", function (e) {
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

// Ambil elemen input
var no_telp = document.getElementById(`no_telp${idfield}`);
// Terapkan fungsi untuk membatasi input hanya angka
allowOnlyNumbers(no_telp);

// fungsi allow only number
function allowOnlyNumbers(input) {
    input.addEventListener("input", function () {
        // Hapus semua karakter yang bukan angka
        this.value = this.value.replace(/[^0-9]/g, "");
    });
}
