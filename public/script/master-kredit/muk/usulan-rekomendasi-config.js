// JUMLAH ANGSURAN REKOMENDASI
const jumlah_angsuran = document.getElementById("jumlah_angsuran");
const denda_hari = document.getElementById("denda_hari");
const jumlah_disetujui = document.getElementById("jumlah_disetujui");
const jkw = document.getElementById("jkw");
const besar_bunga = document.getElementById("besar_bunga");
const jns_kredit = document.getElementById("jns_kredit"); // Tambahkan deklarasi ini
const forTrigerUsulan = document.querySelectorAll(
    "#jumlah_disetujui, #jkw",
    "#denda_hari",
);

const percentase = document.querySelectorAll("#besar_bunga");
const provisi = document.getElementById("provisi");
const jumlah_provisi = document.getElementById("jumlah_provisi");
const besar_adm = document.getElementById("besar_adm");
const biaya_adm = document.getElementById("biaya_adm");
const besar_survey = document.getElementById("besar_survey");
const biaya_survey = document.getElementById("biaya_survey");
const jns_bunga = document.getElementById("jns_bunga");

const inputProvisi = document.querySelectorAll("#provisi");
const inputbesar_adm = document.querySelectorAll("#besar_adm");
const inputbesar_survey = document.querySelectorAll("#besar_survey");

// Event listener untuk pemilihan jenis kredit dan jenis bunga
jns_kredit.addEventListener("change", updateUsulanAngsuran);
jns_bunga.addEventListener("change", updateUsulanAngsuran);
besar_bunga.addEventListener("keyup", updateUsulanAngsuran);

// new
jumlah_angsuran.addEventListener("keyup", function (event) {
    // untuk angsuran
    updateRekomendasiASR();
    updateDisIncome();
    updateIDIR();
    updateBiayaDenda();

    // untuk berjangka
    updateRekomendasiAsrBJK();
    updateKewajibanAkhirBjk();
    updateIDIRBjk();
    // trigger simpan data wi
    updateKmk();
});

function updateUsulanAngsuran() {
    let plafond = toNumber(
        jumlah_disetujui.dataset.rawValue || jumlah_disetujui.value,
    );
    let bunga = toNumber(besar_bunga.dataset.rawValue || besar_bunga.value);
    let jkwValue = toNumber(jkw.value);
    let bungaValue = bunga / 100;

    console.log(bungaValue);

    let total; // Deklarasi variabel di luar `if` untuk mencegah scoping issue

    let flat = document.getElementById("flat");
    let anuitas = document.getElementById("anuitas");
    let efektif = document.getElementById("efektif");

    if (jns_kredit.value === "Berjangka") {
        total = ((plafond * bungaValue) / 360) * 31;

        flat.disabled = true;
        anuitas.disabled = true;
        efektif.disabled = false;
    } else {
        flat.disabled = false;
        anuitas.disabled = false;
        efektif.disabled = true;

        if (jns_bunga.value === "ANUITAS") {
            total =
                (plafond *
                    ((bungaValue / 12) * (1 + bungaValue / 12) ** jkwValue)) /
                ((1 + bungaValue / 12) ** jkwValue - 1);
        } else if (jns_bunga.value === "FLAT") {
            total =
                ((plafond * jkwValue * bungaValue) / 12 + plafond) / jkwValue;
            // console.log("Angsuran: " + total);
        } else {
            total = 0;
            alert(
                "Jenis Kredit Angsuran Tidak boleh memilih Jenis Bunga EFEKTIF!",
            );
        }
    }

    // pembulatan
    total = Math.round(total);

    jumlah_angsuran.value = setFormatRupiah(total);
    jumlah_angsuran.classList.remove("is-invalid");
    jumlah_angsuran.classList.add("is-valid");

    // untuk angsuran
    updateRekomendasiASR();
    updateDisIncome();
    updateIDIR();
    updateBiayaDenda();

    // untuk berjangka
    updateRekomendasiAsrBJK();
    updateKewajibanAkhirBjk();
    updateIDIRBjk();

    // trigger simpan data wi
    updateKmk();
}

// Pasang event listener ke input yang memicu perubahan jumlah angsuran
setInputs(forTrigerUsulan, updateUsulanAngsuran);
setPercent(percentase, updateUsulanAngsuran);

// Biaya Provisi
function updateBiayaProvisi() {
    let plafond = toNumber(
        jumlah_disetujui.dataset.rawValue || jumlah_disetujui.value,
    );
    let provisiVal = toNumber(provisi.dataset.rawValue || provisi.value);
    let total = (plafond * provisiVal) / 100;

    // pembulatan
    total = Math.round(total);

    jumlah_provisi.value = setFormatRupiah(total);
    jumlah_provisi.classList.remove("is-invalid");
    jumlah_provisi.classList.add("is-valid");
}
setInputs(forTrigerUsulan, updateBiayaProvisi);
setPercent(inputProvisi, updateBiayaProvisi);

// biaya Adm
function updateBiayaAdm() {
    let plafond = toNumber(
        jumlah_disetujui.dataset.rawValue || jumlah_disetujui.value,
    );
    let admVal = toNumber(besar_adm.dataset.rawValue || besar_adm.value);
    let total = (plafond * admVal) / 100;

    // pembulatan
    total = Math.round(total);

    biaya_adm.value = setFormatRupiah(total);
    biaya_adm.classList.remove("is-invalid");
    biaya_adm.classList.add("is-valid");
}
setInputs(forTrigerUsulan, updateBiayaAdm);
setPercent(inputbesar_adm, updateBiayaAdm);

//  Survey
function updateBiayaSurvey() {
    let plafond = toNumber(
        jumlah_disetujui.dataset.rawValue || jumlah_disetujui.value,
    );
    let surveyVal = toNumber(
        besar_survey.dataset.rawValue || besar_survey.value,
    );
    let total = (plafond * surveyVal) / 100;

    // pembulatan
    total = Math.round(total);

    biaya_survey.value = setFormatRupiah(total);
    biaya_survey.classList.remove("is-invalid");
    biaya_survey.classList.add("is-valid");
}
setInputs(forTrigerUsulan, updateBiayaSurvey);
setPercent(inputbesar_survey, updateBiayaSurvey);

// biaya denda
function updateBiayaDenda() {
    let jumlah_angsurans = toNumber(
        jumlah_angsuran.dataset.rawValue || jumlah_angsuran.value,
    );
    let total = (2 / 1000) * jumlah_angsurans;

    // pembulatan
    total = Math.round(total);

    denda_hari.value = setFormatRupiah(total);
    denda_hari.classList.remove("is-invalid");
    denda_hari.classList.add("is-valid");
}
setInputs(forTrigerUsulan, updateBiayaDenda);
