// keuangan
$("#jns_kredit").on("change", function () {
    let selectopt = $(this).val();
    const angsuran = document.getElementById("keuangan_angsuran");
    const berjangka = document.getElementById("keuangan_berjangka");

    if (selectopt === "Angsuran") {
        angsuran.classList.remove("d-none");
        berjangka.classList.add("d-none");
    } else {
        angsuran.classList.add("d-none");
        berjangka.classList.remove("d-none");
    }
});

// setRp
document.querySelectorAll(".setRp").forEach((input) => {
    input.addEventListener("input", function () {
        this.value = formatRupiah(this.value);
    });
});

// +++++++++++++++++++
// MATEMATIKA KEUANGAN ANGSURAN

// -PENGELUARAN USAHA-
const pengeluaran_usaha = document.getElementById("pengeluaran_usaha");
const PengeluaranUsahaInputs = document.querySelectorAll(
    "#omset_harga_pokok, #omset_sewa, #omset_gaji_pegawai, #omset_listrik, #omset_transportasi, #omset_pengeluaran_lainnya"
);

function updatePengeluaranUsaha() {
    let total = 0;
    PengeluaranUsahaInputs.forEach((input) => {
        total += toNumber(input.dataset.rawValue || input.value);
    });
    pengeluaran_usaha.value = setFormatRupiah(total);
    pengeluaran_usaha.classList.remove("is-invalid");
    pengeluaran_usaha.classList.add("is-valid");

    // call fungsi keuntungan usaha
    updateKeuntunganUsaha();
}
setInputs(PengeluaranUsahaInputs, updatePengeluaranUsaha);
// -END PENGELUARAN USAHA-

// -KEUNTUNGAN USAHA-
const keuangan_usaha = document.getElementById("keuntungan_usaha");
const omset_usaha = document.getElementById("omset_usaha");

// Fungsi untuk menghitung keuntungan usaha
function updateKeuntunganUsaha() {
    let total =
        toNumber(omset_usaha.dataset.rawValue || omset_usaha.value) -
        toNumber(pengeluaran_usaha.dataset.rawValue || pengeluaran_usaha.value);

    keuangan_usaha.value = setFormatRupiah(total);
    keuangan_usaha.classList.remove("is-invalid");
    keuangan_usaha.classList.add("is-valid");

    // call penghasilan total
    updateTotalPenghasilan();
}

// Tambahkan event listener agar perhitungan berjalan saat input berubah
[omset_usaha, pengeluaran_usaha].forEach((input) => {
    input.addEventListener("input", updateKeuntunganUsaha);
});
// -END KEUNTUNGAN USAHA-

// -TOTAL PENGHASILAN-
const total_penghasilan = document.getElementById("total_penghasilan");
const penghasilan_deb_inputs = document.querySelectorAll(
    "#penghasilan_deb, #penghasilan_lainnya, #keuntungan_usaha"
);

function updateTotalPenghasilan() {
    let total = 0;
    penghasilan_deb_inputs.forEach((input) => {
        total += toNumber(input.dataset.rawValue || input.value);
    });
    total_penghasilan.value = setFormatRupiah(total);
    total_penghasilan.classList.remove("is-invalid");
    total_penghasilan.classList.add("is-valid");

    updateSisaPenghasilan();
}

setInputs(penghasilan_deb_inputs, updateTotalPenghasilan);
// -END TOTAL PENGHASILAN-

// -TOTAL PENGELUARAN-
const total_pengeluaran = document.getElementById("total_pengeluaran");
const total_pengeluaran_inputs = document.querySelectorAll(
    "#belanja_rt, #sewa_rumah, #pendidikan, #listrik, #transportasi, #pengeluaran_lainnya"
);

function updateTotalPengeluaran() {
    let total = 0;
    total_pengeluaran_inputs.forEach((input) => {
        total += toNumber(input.dataset.rawValue || input.value);
    });
    total_pengeluaran.value = setFormatRupiah(total);
    total_pengeluaran.classList.remove("is-invalid");
    total_pengeluaran.classList.add("is-valid");

    // call fungsi keuntungan usaha
    updateKeuntunganUsaha();
    updateSisaPenghasilan();
}
setInputs(total_pengeluaran_inputs, updateTotalPengeluaran);
// -END TOTAL PENGELUARAN-

// -SISA PENGHASILAN-
const sisa_penghasilan = document.getElementById("sisa_penghasilan");

function updateSisaPenghasilan() {
    let total =
        toNumber(
            total_penghasilan.dataset.rawValue || total_penghasilan.value
        ) -
        toNumber(total_pengeluaran.dataset.rawValue || total_pengeluaran.value);

    sisa_penghasilan.value = setFormatRupiah(total);
    sisa_penghasilan.classList.remove("is-invalid");
    sisa_penghasilan.classList.add("is-valid");

    updateDisIncome();
}
// -END SISA PENGHASILAN-

// -DISPOSABLE INCOME
updateDisIncome(); // dari file slik-config.js
// -END DISPOSABLE INCOME-

// - REKOMENDASI ASR -
// const rekomendasi_asr_inputs = document.querySelectorAll(
//     "#jumlah_disetujui, #jumlah_angsuran, #besar_bunga, #jkw"
// );
function updateRekomendasiASR() {
    rekomendasi_asr.value = jumlah_angsuran.value;
    rekomendasi_asr.classList.remove("is-invalid");
    rekomendasi_asr.classList.add("is-valid");
    updateDisIncome();
}
// - END REKOMENDASI ASR -

// - IDIR -
const idir = document.getElementById("idir");
function updateIDIR() {
    let total =
        (toNumber(
            angsuran_pinjaman.dataset.rawValue || angsuran_pinjaman.value
        ) +
            toNumber(
                rekomendasi_asr.dataset.rawValue || rekomendasi_asr.value
            )) /
        toNumber(dis_income.dataset.rawValue || dis_income.value);

    total = (total * 100).toFixed(2); // Konversi ke persen dengan 2 angka dibelakang koma
    // console.log(total);

    idir.dataset.rawValue = total;
    idir.value = total.replace(".", ",");
    idir.classList.remove("is-invalid");
    idir.classList.add("is-valid");
}
// setInputs(rekomendasi_asr_inputs, updateIDIR);
// - END IDIR -

// END Matemetika angsuran
