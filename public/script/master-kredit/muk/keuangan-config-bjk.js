// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// -KEUANGAN BERJANGKA-
const bjk_pengeluaran_usaha = document.getElementById("bjk_pengeluaran_usaha");
const bjk_pengeluaran_usaha_inputs = document.querySelectorAll(
    "#bjk_pupuk, #bjk_biaya_tenaga_kerja, #bjk_biaya_operasional, #bjk_biaya_bahan_baku, #bjk_biaya_lainnya"
);
// pengeluaran usaha bjk
function updatePengeluaranUsahaBjk() {
    let total = 0;
    bjk_pengeluaran_usaha_inputs.forEach((input) => {
        total += toNumber(input.dataset.rawValue || input.value);
    });
    bjk_pengeluaran_usaha.value = setFormatRupiah(total);
    bjk_pengeluaran_usaha.classList.remove("is-invalid");
    bjk_pengeluaran_usaha.classList.add("is-valid");

    // call fungsi keuntungan usaha
    updateKeuntunganBjk();
    updateSisaPenghasilanBjk();
}
setInputs(bjk_pengeluaran_usaha_inputs, updatePengeluaranUsahaBjk);
// -END PENGELUARAN USAHA-

// Fungsi untuk menghitung keuntungan usaha
const bjk_omset = document.getElementById("bjk_omset");
const bjk_keuntungan_periode = document.getElementById("bjk_keuntungan_usaha");
function updateKeuntunganBjk() {
    let total =
        toNumber(bjk_omset.dataset.rawValue || bjk_omset.value) -
        toNumber(
            bjk_pengeluaran_usaha.dataset.rawValue ||
                bjk_pengeluaran_usaha.value
        );

    bjk_keuntungan_periode.value = setFormatRupiah(total);
    bjk_keuntungan_periode.classList.remove("is-invalid");
    bjk_keuntungan_periode.classList.add("is-valid");

    // call penghasilan total
    updateTotalPenghasilan();
    updateKeuntunganBulanBjk();
    updateSisaPenghasilanBjk();
}

// Tambahkan event listener agar perhitungan berjalan saat input berubah
[bjk_omset, bjk_pengeluaran_usaha].forEach((input) => {
    input.addEventListener("input", updateKeuntunganBjk);
});
// -END KEUNTUNGAN USAHA-

// keuntungan perbulan
const bjk_keuntungan_bulan = document.getElementById("bjk_keuntungan_bulan");
const bjk_periode_usaha = document.getElementById("bjk_periode_usaha");
const BjkKeuntunganPeriodeInputs = document.querySelectorAll(
    "#bjk_keuntungan_usaha, #bjk_periode_usaha"
);
function updateKeuntunganBulanBjk() {
    let total =
        toNumber(
            bjk_keuntungan_periode.dataset.rawValue ||
                bjk_keuntungan_periode.value
        ) / bjk_periode_usaha.value;

    total = Math.round(total);

    bjk_keuntungan_bulan.value = setFormatRupiah(total);
    bjk_keuntungan_bulan.classList.remove("is-invalid");
    bjk_keuntungan_bulan.classList.add("is-valid");

    updateTotalPenghasilabBjk();
    updateSisaPenghasilanBjk();
}
setInputs(BjkKeuntunganPeriodeInputs, updateKeuntunganBulanBjk);
// end keuntungan perbulan

// penghasilan perbulan
const bjk_total_penghasilan = document.getElementById("bjk_total_penghasilan");
const bjk_penghasilan_lainnya = document.getElementById(
    "bjk_penghasilan_lainnya"
);
function updateTotalPenghasilabBjk() {
    let total =
        toNumber(
            bjk_keuntungan_bulan.dataset.rawValue || bjk_keuntungan_bulan.value
        ) +
        toNumber(
            bjk_penghasilan_lainnya.dataset.rawValue ||
                bjk_penghasilan_lainnya.value
        );

    bjk_total_penghasilan.value = setFormatRupiah(total);
    bjk_total_penghasilan.classList.remove("is-invalid");
    bjk_total_penghasilan.classList.add("is-valid");

    updateSisaPenghasilanBjk();
}
[bjk_keuntungan_bulan, bjk_penghasilan_lainnya].forEach((input) => {
    input.addEventListener("input", updateKeuntunganBjk);
});
// end penghasilan perbulan

// total pengeluaran
const bjk_total_pengeluaran = document.getElementById("bjk_total_pengeluaran");
const bjk_belanja_rumah = document.getElementById("bjk_belanja_rumah");
const bjk_sewa_rumah = document.getElementById("bjk_sewa_rumah");
const bjk_pendidikan = document.getElementById("bjk_pendidikan");
const bjk_listrik = document.getElementById("bjk_listrik");
const bjk_transportasi = document.getElementById("bjk_transportasi");
const bjk_pengeluaran_lainnya = document.getElementById(
    "bjk_pengeluaran_lainnya"
);
const bjk_total_pengeluaran_inputs = document.querySelectorAll(
    "#bjk_belanja_rumah, #bjk_sewa_rumah, #bjk_pendidikan, #bjk_listrik, #bjk_transportasi, #bjk_pengeluaran_lainnya"
);

function updateTotalPengeluaranBjk() {
    let total =
        toNumber(
            bjk_belanja_rumah.dataset.rawValue || bjk_belanja_rumah.value
        ) +
        toNumber(bjk_sewa_rumah.dataset.rawValue || bjk_sewa_rumah.value) +
        toNumber(bjk_pendidikan.dataset.rawValue || bjk_pendidikan.value) +
        toNumber(bjk_listrik.dataset.rawValue || bjk_listrik.value) +
        toNumber(bjk_transportasi.dataset.rawValue || bjk_transportasi.value) +
        toNumber(
            bjk_pengeluaran_lainnya.dataset.rawValue ||
                bjk_pengeluaran_lainnya.value
        );

    bjk_total_pengeluaran.value = setFormatRupiah(total);
    bjk_total_pengeluaran.classList.remove("is-invalid");
    bjk_total_pengeluaran.classList.add("is-valid");

    updateSisaPenghasilanBjk();
}
setInputs(bjk_total_pengeluaran_inputs, updateTotalPengeluaranBjk);
// end total pengeluaran

// sisa penghasilan
const bjk_sisa_penghasilan = document.getElementById("bjk_sisa_penghasilan");
function updateSisaPenghasilanBjk() {
    let total =
        toNumber(
            bjk_total_penghasilan.dataset.rawValue ||
                bjk_total_penghasilan.value
        ) -
        toNumber(
            bjk_total_pengeluaran.dataset.rawValue ||
                bjk_total_pengeluaran.value
        );

    bjk_sisa_penghasilan.value = setFormatRupiah(total);
    bjk_sisa_penghasilan.classList.remove("is-invalid");
    bjk_sisa_penghasilan.classList.add("is-valid");

    updateSelisihPenghasilanBjk();
    updateSelisihPersenBjk();
    updateIDIRBjk();
}
// end sisa penghasilan

// kewajiban angsuran perbulan
const bjk_kewajiban_bunga = document.getElementById("bjk_kewajiban_bunga");
function updateRekomendasiAsrBJK() {
    bjk_kewajiban_bunga.value = jumlah_angsuran.value;
    bjk_kewajiban_bunga.classList.remove("is-invalid");
    bjk_kewajiban_bunga.classList.add("is-valid");
    updateIDIRBjk();
}
// ends kewajiban angsuran perbulan

// kewajiban pada akhir periode
const bjk_kewajiban_akhir = document.getElementById("bjk_kewajiban_akhir");
function updateKewajibanAkhirBjk() {
    let total =
        toNumber(
            bjk_kewajiban_bunga.dataset.rawValue || bjk_kewajiban_bunga.value
        ) +
        toNumber(jumlah_disetujui.dataset.rawValue || jumlah_disetujui.value);

    bjk_kewajiban_akhir.value = setFormatRupiah(total);
    bjk_kewajiban_akhir.classList.remove("is-invalid");
    bjk_kewajiban_akhir.classList.add("is-valid");

    updateSelisihPenghasilanBjk();
}
// ends kewajiban pada akhir periode

// idir
const bjk_idir = document.getElementById("bjk_idir");
function updateIDIRBjk() {
    let sisa = toNumber(
        bjk_sisa_penghasilan.dataset.rawValue || bjk_sisa_penghasilan.value
    );
    let angsuran = toNumber(
        bjk_angsuran_pinjaman.dataset.rawValue || bjk_angsuran_pinjaman.value
    );
    let bunga = toNumber(
        bjk_kewajiban_bunga.dataset.rawValue || bjk_kewajiban_bunga.value
    );

    let total = (angsuran + bunga) / (sisa - angsuran - bunga);
    total = (total * 100).toFixed(2);

    bjk_idir.dataset.rawValue = total;
    bjk_idir.value = total.replace(".", ",");
    bjk_idir.classList.remove("is-invalid");
    bjk_idir.classList.add("is-valid");
}
// end idir

// -ENDS KEUANGAN BERJANGKA-
