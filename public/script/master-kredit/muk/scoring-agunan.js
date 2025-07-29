$(document).ready(function () {
    const tanah = [
        "tempat_ibadah",
        "pasar",
        "sekolah",
        "perkantoran",
        "sutet",
        "lokalisasi",
        "tps",
        "pemakaman",
        "resiko_longsor",
        "resiko_banjir",
        "zonasi",
        "akses_jalan",
        "kondisi_jalan",
        "tusuk_sate",
        "bentuk_tanah",
        "lebar_muka",
        "kontur",
        "elevasi",
        "rel_kereta",
    ];

    const bangunan = [
        "pondasi",
        "rangka_atap",
        "plafon",
        "pintu",
        "imb",
        "struktur",
        "penutup_atap",
        "dinding",
        "lantai",
    ];

    // for kesimpulan
    const kesText = [
        "kesimpulan",
        "rekomendasi_penilai",
        "lainnya",
        "lainnya_depo",
        "keterangan_lainnya",
        "keterangan_lainnya_tab",
    ];

    tanah.forEach((prefix) => {
        processElementsScore(`${prefix}_`, (counter) =>
            setScoreTanah(prefix, counter)
        );
    });

    bangunan.forEach((prefix) => {
        processElementsScore(`${prefix}_`, (counter) =>
            setScoreBangunan(prefix, counter)
        );
    });

    // for kesimpulan
    kesText.forEach((prefix) => {
        processElementsScore(`${prefix}_`, (counter) =>
            setSummernote(prefix, counter)
        );
    });
});

function setScoreTanah(element, counter) {
    const inp = document.getElementById(`${element}_${counter}`);
    const setInp = document.getElementById(`${element}_nom_tanah_${counter}`);
    const totalScore = document.getElementById(`total_score_tanah_${counter}`);

    if (inp && setInp) {
        inp.addEventListener("change", function () {
            setInp.value = inp.value;
            setInp.classList.remove("is-invalid");
            setInp.classList.add("is-valid");

            calculateTotalScore("tanah", counter, totalScore);
        });
    }
}

function setScoreBangunan(element, counter) {
    const inp = document.getElementById(`${element}_${counter}`);
    const setInp = document.getElementById(
        `${element}_nom_bangunan_${counter}`
    );
    const totalScore = document.getElementById(
        `total_score_bangunan_${counter}`
    );

    if (inp && setInp) {
        inp.addEventListener("change", function () {
            setInp.value = inp.value;
            setInp.classList.remove("is-invalid");
            setInp.classList.add("is-valid");

            calculateTotalScore("bangunan", counter, totalScore);
        });
    }
}

function processElementsScore(prefix, callback) {
    document.querySelectorAll(`[id^="${prefix}"]`).forEach((element) => {
        const match = element.id.match(/\d+/);
        if (match && parseInt(match[0]) > 0) {
            callback(parseInt(match[0]));
        }
    });
}

// Fungsi untuk menjumlahkan semua nilai input
function calculateTotalScore(category, counter, InHasil) {
    let totalScore = 0;

    if (category == "tanah") {
        document
            .querySelectorAll(`[id$="_nom_tanah_${counter}"]`)
            .forEach((element) => {
                totalScore += parseFloat(element.value) || 0;
            });
    } else {
        document
            .querySelectorAll(`[id$="_nom_bangunan_${counter}"]`)
            .forEach((element) => {
                totalScore += parseFloat(element.value) || 0;
            });
    }

    if (InHasil) {
        const totalScoreAll = document.getElementById(`total_score_${counter}`);
        totalScoreAll.value = totalScore;

        InHasil.value = totalScore;
        InHasil.classList.remove("is-invalid");
        InHasil.classList.add("is-valid");
    }

    // Jika total_score_bangunan_{counter} tidak kosong, lakukan penjumlahan
    const totalScoreTanah = document.getElementById(
        `total_score_tanah_${counter}`
    );
    const totalScoreBangunan = document.getElementById(
        `total_score_bangunan_${counter}`
    );
    const totalSkorRukan = document.getElementById(
        `total_skor_rukan_${counter}`
    );

    if (totalScoreTanah && totalScoreBangunan && totalSkorRukan) {
        const tanahValue = parseFloat(totalScoreTanah.value) || 0;
        const bangunanValue = parseFloat(totalScoreBangunan.value) || 0;
        const totalScoreAll = document.getElementById(`total_score_${counter}`);

        totalSkorRukan.value = tanahValue + bangunanValue;
        totalScoreAll.value = tanahValue + bangunanValue;
        totalSkorRukan.classList.remove("is-invalid");
        totalSkorRukan.classList.add("is-valid");
    }
}

// fungsi untuk set text area untuk kesimpulan
function setSummernote(element, counter) {
    initializeSummernote(`#${element}_${counter}`, "Ketik Sesuatu...", 100);
}
