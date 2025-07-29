// setRp by class setRp
// Tambahkan event listener ke semua elemen dengan class "setRp"
document.querySelectorAll(".setRp").forEach(function (input) {
    input.addEventListener("input", function () {
        this.value = formatRupiah(this.value);
    });
});

/* Fungsi formatRupiah */
function formatRupiah(angka) {
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

    return rupiah;
}

// Ambil elemen input
// var no_telp = document.getElementById(`no_telp${idfield}`);
// Terapkan fungsi untuk membatasi input hanya angka
// allowOnlyNumbers(no_telp);

// fungsi allow only number
function allowOnlyNumbers(input) {
    input.addEventListener("input", function () {
        // Hapus semua karakter yang bukan angka
        this.value = this.value.replace(/[^0-9]/g, "");
    });
}

// +++++++++++++++++++++++++++
// {{ CORE FUNGSI JUMLAH }}
// Fungsi untuk menghilangkan format Rupiah agar bisa dihitung
function toNumber(value) {
    return parseFloat(value.replace(/\./g, "").replace(",", ".")) || 0;
}

// Fungsi untuk mengubah angka ke format Rupiah
function setFormatRupiah(angka) {
    return angka.toLocaleString("id-ID");
}

// Fungsi untuk memastikan input selalu dalam format Rupiah saat diketik
function formatInput(event) {
    let rawValue = event.target.value.replace(/\./g, "").replace(",", ".");
    event.target.dataset.rawValue = rawValue; // Simpan nilai asli untuk perhitungan
    event.target.value = setFormatRupiah(parseFloat(rawValue) || 0); // Tampilkan dengan format Rupiah
}

function formatPercent(event) {
    let rawValue = event.target.value
        .replace(/[^0-9,]/g, "")
        .replace(/,/g, "."); // Izinkan angka dan koma

    event.target.dataset.rawValue = rawValue; // Simpan nilai asli untuk perhitungan
    event.target.value = rawValue.replace(/\./g, ","); // Tampilkan dengan format menggunakan koma
}

function setPercent(Inputannya, fungsinya) {
    Inputannya.forEach((input) => {
        input.addEventListener("input", formatPercent); // Memastikan input tetap berformat Rupiah
        input.addEventListener("keyup", fungsinya); // Memastikan perhitungan tetap berjalan
    });
}

// Tambahkan event listener ke semua input
function setInputs(Inputannya, fungsinya) {
    Inputannya.forEach((input) => {
        input.addEventListener("input", formatInput); // Memastikan input tetap berformat Rupiah
        input.addEventListener("keyup", fungsinya); // Memastikan perhitungan tetap berjalan
    });
}
// {{ END CORE FUNGSI JUMLAH }}
