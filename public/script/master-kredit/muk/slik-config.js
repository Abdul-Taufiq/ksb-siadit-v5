$(document).ready(function () {
    // Proses elemen de
    processElements("plafond_", function (counter) {
        setRupiah(counter);
    });
});

// fungsi set rupiah
function setRupiah(counter) {
    var plafond = document.getElementById(`plafond_${counter}`);
    plafond.addEventListener("input", function (e) {
        this.value = formatRupiah(this.value);
    });

    var rate = document.getElementById(`rate_${counter}`);
    rate.addEventListener("input", function (e) {
        this.value = formatRupiah(this.value);
    });

    var baki_debet = document.getElementById(`baki_debet_${counter}`);
    baki_debet.addEventListener("input", function (e) {
        this.value = formatRupiah(this.value);
    });

    var angsuran = document.getElementById(`angsuran_${counter}`);
    angsuran.addEventListener("input", function (e) {
        this.value = formatRupiah(this.value);
    });

    var dpd = document.getElementById(`dpd_${counter}`);
    dpd.addEventListener("input", function (e) {
        this.value = formatRupiah(this.value);
    });
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

// total plafond
const totalPlafond = document.getElementById("total_plafond");

// Fungsi untuk mengambil semua input dinamis dan menghitung total
function updateTotalPlafond() {
    let total = 0;
    document.querySelectorAll("[id^='plafond_']").forEach((input) => {
        total += toAngka(input.dataset.rawValue || input.value);
    });
    totalPlafond.value = setRpId(total);
    totalPlafond.classList.remove("is-invalid");
    totalPlafond.classList.add("is-valid");
}

// Pastikan setiap input yang ada dan yang baru dibuat tetap menghitung total
document.addEventListener("input", function (event) {
    if (event.target.id.startsWith("plafond_")) {
        updateTotalPlafond();
    }
});

// total BD
const totalBD = document.getElementById("total_bd");

// Fungsi untuk mengambil semua input dinamis dan menghitung total
function updateTotalBD() {
    let total = 0;
    document.querySelectorAll("[id^='baki_debet_']").forEach((input) => {
        total += toAngka(input.dataset.rawValue || input.value);
    });
    totalBD.value = setRpId(total);
    totalBD.classList.remove("is-invalid");
    totalBD.classList.add("is-valid");
}

// Pastikan setiap input yang ada dan yang baru dibuat tetap menghitung total
document.addEventListener("input", function (event) {
    if (event.target.id.startsWith("baki_debet_")) {
        updateTotalBD();
        updateTotalBDModalKerja();
    }
});

// total Angsuran
const totalAngsuran = document.getElementById("total_angsuran");
const angsuran_pinjaman = document.getElementById("keu_angsuran_pinjaman");
const bjk_angsuran_pinjaman = document.getElementById("bjk_angsuran_pinjaman");
// Fungsi untuk mengambil semua input dinamis dan menghitung total
function updateTotalAngsuran() {
    let total = 0;
    document.querySelectorAll("[id^='angsuran_']").forEach((input) => {
        total += toAngka(input.dataset.rawValue || input.value);
    });

    // Format hasil ke Rupiah setelah perhitungan
    const formattedTotal = setRpId(total);

    totalAngsuran.value = formattedTotal;
    totalAngsuran.classList.remove("is-invalid");
    totalAngsuran.classList.add("is-valid");

    // Pastikan angsuran_pinjaman menggunakan nilai asli sebelum diformat
    angsuran_pinjaman.value = formattedTotal;
    angsuran_pinjaman.classList.remove("is-invalid");
    angsuran_pinjaman.classList.add("is-valid");

    updateDisIncome();

    // untuk berjangka
    bjk_angsuran_pinjaman.value = formattedTotal;
    bjk_angsuran_pinjaman.classList.remove("is-invalid");
    bjk_angsuran_pinjaman.classList.add("is-valid");
    updateSelisihPenghasilanBjk();
}

// Pastikan setiap input yang ada dan yang baru dibuat tetap menghitung total
document.addEventListener("input", function (event) {
    if (event.target.id.startsWith("angsuran_")) {
        updateTotalAngsuran();
    }
});

function toAngka(value) {
    return parseFloat(value.replace(/\./g, "").replace(",", ".")) || 0;
}
// Fungsi untuk mengubah angka ke format Rupiah
function setRpId(angka) {
    return angka.toLocaleString("id-ID");
}

// Pantau perubahan jumlah elemen menggunakan MutationObserver
const observer = new MutationObserver(() => {
    updateTotalPlafond();
    updateTotalBD();
    updateTotalAngsuran();
});

observer.observe(document.body, { childList: true, subtree: true });

// -DISPOSABLE INCOME
const dis_income = document.getElementById("dis_income");
const rekomendasi_asr = document.getElementById("rekomendasi_asr");
function updateDisIncome() {
    let total =
        toAngka(sisa_penghasilan.dataset.rawValue || sisa_penghasilan.value) -
        toAngka(angsuran_pinjaman.dataset.rawValue || angsuran_pinjaman.value) -
        toAngka(rekomendasi_asr.dataset.rawValue || rekomendasi_asr.value);

    // pembulatan angka
    total = Math.round(total);

    dis_income.value = setRpId(total);
    dis_income.classList.remove("is-invalid");
    dis_income.classList.add("is-valid");
}
// -END DISPOSABLE INCOME-

// selisih penghasilan
const selisih_penghasilan = document.getElementById("selisih_penghasilan");
function updateSelisihPenghasilanBjk() {
    let sisa = toNumber(
        bjk_sisa_penghasilan.dataset.rawValue || bjk_sisa_penghasilan.value
    );
    let angsuran = toNumber(
        bjk_angsuran_pinjaman.dataset.rawValue || bjk_angsuran_pinjaman.value
    );
    let akhir = toNumber(
        bjk_kewajiban_akhir.dataset.rawValue || bjk_kewajiban_akhir.value
    );

    let total = 0;
    if (sisa > angsuran + akhir) {
        total = sisa - (angsuran + akhir);
    } else {
        total = angsuran + akhir - sisa;
    }
    total = Math.round(total);

    selisih_penghasilan.value = setFormatRupiah(total);
    selisih_penghasilan.classList.remove("is-invalid");
    selisih_penghasilan.classList.add("is-valid");

    updateSelisihPersenBjk();
}
// end selisih penghasilan

// selisih persen
const selisih_persen = document.getElementById("selisih_persen");
function updateSelisihPersenBjk() {
    let sisa = toNumber(
        bjk_sisa_penghasilan.dataset.rawValue || bjk_sisa_penghasilan.value
    );
    let selisih = toNumber(
        selisih_penghasilan.dataset.rawValue || selisih_penghasilan.value
    );

    let total = selisih / sisa;
    total = (total * 100).toFixed(2);

    selisih_persen.dataset.rawValue = total;
    selisih_persen.value = total.replace(".", ",");
    selisih_persen.classList.remove("is-invalid");
    selisih_persen.classList.add("is-valid");
}
// end selisih persen

// Hitung TOTAL BD/OS di SLIK yang memiliki tujuan MODAL KERJA
// total BD
const totalBDMK = document.getElementById("total_bd_modal_kerja");

function updateTotalBDModalKerja() {
    let total = 0;

    for (let i = 1; i < 200; i++) {
        const tujuan = document.getElementById(`tujuan_kredit_${i}`);
        const bakiDebet = document.getElementById(`baki_debet_${i}`);

        if (tujuan && bakiDebet && tujuan.value === "Modal Kerja") {
            const raw = bakiDebet.dataset.rawValue || bakiDebet.value;
            total += toAngka(raw);
        }
    }

    if (totalBDMK) {
        totalBDMK.value = setRpId(total);
        totalBDMK.classList.remove("is-invalid");
        totalBDMK.classList.add("is-valid");
    }
}
