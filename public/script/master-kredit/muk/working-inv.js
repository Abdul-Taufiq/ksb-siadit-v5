// Working investment
const kmk = document.getElementById("kmk");
const inventory = document.getElementById("inventory");
const piutang_usaha = document.getElementById("piutang_usaha");
const utang_usaha = document.getElementById("utang_usaha");
const kmk_inputs = document.querySelectorAll(
    "#inventory, #piutang_usaha, #utang_usaha"
);
const totalBDKMK = document.getElementById("total_bd_modal_kerja");
function updateKmk() {
    let inv = toNumber(inventory.dataset.rawValue || inventory.value);
    let piutang = toNumber(
        piutang_usaha.dataset.rawValue || piutang_usaha.value
    );
    let utang = toNumber(utang_usaha.dataset.rawValue || utang_usaha.value);

    let total = inv + piutang - utang;

    let BDKMK = toNumber(totalBDKMK.value);
    let totalWI = 0;

    if (total > BDKMK) {
        totalWI = total - BDKMK;
    } else {
        totalWI = 0;
    }

    total = Math.round(totalWI);
    kmk.value = setFormatRupiah(total);
    kmk.classList.remove("is-invalid");
    kmk.classList.add("is-valid");

    // matikan button save jika total WI 0 dan tujuannya modal kerja
    const kreditTujuan = document.getElementById("kredit_tujuan_pengajuan");
    const buttonSave = document.getElementById("simpan");
    const peringatan = document.getElementById("peringatan");
    if (kreditTujuan.value == "Modal Kerja" && totalWI == 0) {
        buttonSave.setAttribute("disabled", "true");
        peringatan.classList.remove("d-none");
    } else {
        buttonSave.removeAttribute("disabled");
        peringatan.classList.add("d-none");
    }
}
setInputs(kmk_inputs, updateKmk);

const doh_1 = document.getElementById("doh_1");
function updateDoh1() {
    let inv = toNumber(inventory.dataset.rawValue || inventory.value);
    let omset = toNumber(bjk_omset.dataset.rawValue || bjk_omset.value);
    let total = inv / omset - 30;
    total = Math.round(total);

    doh_1.value = setFormatRupiah(total);
    doh_1.classList.remove("is-invalid");
    doh_1.classList.add("is-valid");
}
[bjk_omset, inventory].forEach((input) => {
    input.addEventListener("input", updateDoh1);
});

const doh_2 = document.getElementById("doh_2");
function updateDoh2() {
    let piutang = toNumber(
        piutang_usaha.dataset.rawValue || piutang_usaha.value
    );
    let periode = bjk_periode_usaha.dataset.rawValue || bjk_periode_usaha.value;
    let total = piutang / periode - 30;
    total = Math.round(total);

    doh_2.value = setFormatRupiah(total);
    doh_2.classList.remove("is-invalid");
    doh_2.classList.add("is-valid");
}
[bjk_periode_usaha, piutang_usaha].forEach((input) => {
    input.addEventListener("input", updateDoh2);
});

const doh_3 = document.getElementById("doh_3");
function updateDoh3() {
    let utang = toNumber(utang_usaha.dataset.rawValue || utang_usaha.value);
    let omset = toNumber(bjk_omset.dataset.rawValue || bjk_omset.value);
    let total = utang / omset - 30;
    total = Math.round(total);

    doh_3.value = setFormatRupiah(total);
    doh_3.classList.remove("is-invalid");
    doh_3.classList.add("is-valid");
}
[bjk_omset, utang_usaha].forEach((input) => {
    input.addEventListener("input", updateDoh3);
});
