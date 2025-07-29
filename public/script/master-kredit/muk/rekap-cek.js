// hitung Tanah
function bindHitungTotal(index, i) {
    const inpRp = document.getElementById(`data_${index}_${i}`);
    const inpLuas = document.getElementById(`data_luas_${index}_${i}`);
    const inpTotal = document.getElementById(`data_total_${index}_${i}`);

    if (inpRp && inpLuas && inpTotal) {
        inpRp.addEventListener("keyup", function () {
            const harga = toNumber(inpRp.dataset.rawValue || inpRp.value) || 0;
            const luas = parseFloat(inpLuas.value) || 0;
            const total = harga * luas;

            inpTotal.value = setFormatRupiah(total);
            inpTotal.classList.remove("is-invalid");
            inpTotal.classList.add("is-valid");
        });
    }
}

// hitung Bangunan
function bindHitungTotalBangunan(index, i) {
    const inpRp = document.getElementById(`bangunan_${index}_${i}`);
    const inpLuas = document.getElementById(`bangunan_luas_${index}_${i}`);
    const inpTotal = document.getElementById(`bangunan_total_${index}_${i}`);

    if (inpRp && inpLuas && inpTotal) {
        inpRp.addEventListener("keyup", function () {
            const harga = toNumber(inpRp.dataset.rawValue || inpRp.value) || 0;
            const luas = parseFloat(inpLuas.value) || 0;
            const total = harga * luas;

            inpTotal.value = setFormatRupiah(total);
            inpTotal.classList.remove("is-invalid");
            inpTotal.classList.add("is-valid");
        });
    }
}

for (let i = 1; i < 200; i++) {
    [1, 2, 3].forEach((index) => bindHitungTotal(index, i));
    [1, 2, 3].forEach((index) => bindHitungTotalBangunan(index, i));
    NilaiPasarAgunan(i);
    AutoLuas(i);
    setHargaDiterima(i);
    setNilaiSM(i);
}

// auto isi untuk luas tanah
function AutoLuas(i) {
    const luas_tanah = document.getElementById(`luas_tanah_${i}`);
    const dl_1 = document.getElementById(`data_luas_1_${i}`);
    const dl_2 = document.getElementById(`data_luas_2_${i}`);
    const dl_3 = document.getElementById(`data_luas_3_${i}`);

    const luas_bangunan = document.getElementById(`luas_bangunan_fisik_${i}`);
    const bg_1 = document.getElementById(`bangunan_luas_1_${i}`);
    const bg_2 = document.getElementById(`bangunan_luas_2_${i}`);
    const bg_3 = document.getElementById(`bangunan_luas_3_${i}`);

    if (luas_tanah) {
        luas_tanah.addEventListener("keyup", function () {
            [dl_1, dl_2, dl_3].forEach((el) => {
                if (el) {
                    el.value = luas_tanah.value;
                    el.classList.remove("is-invalid");
                    el.classList.add("is-valid");
                }
            });
        });
    }

    if (luas_bangunan) {
        luas_bangunan.addEventListener("keyup", function () {
            [bg_1, bg_2, bg_3].forEach((el) => {
                if (el) {
                    el.value = luas_bangunan.value;
                    el.classList.remove("is-invalid");
                    el.classList.add("is-valid");
                }
            });
        });
    }
}

// hitung nilai pasar agunan
function NilaiPasarAgunan(i) {
    const inpPasar = document.getElementById(`nilai_pasar_${i}`);
    const inpLuas = document.getElementById(`data_luas_1_${i}`);
    const inpAgunan = document.getElementById(`nilai_agunan_${i}`);
    const kategori_jaminan = document.getElementById(`kategori_jaminan_${i}`);
    // for bangunan
    const pasarBangunan = document.getElementById(`rekom_pasar_bangunan_${i}`);
    const luasBangunan = document.getElementById(`luas_bangunan_fisik_${i}`);
    const agunanBangunan = document.getElementById(
        `rekom_agunan_bangunan_${i}`
    );

    // tanah
    if (inpPasar && inpLuas) {
        inpPasar.addEventListener("keyup", function () {
            const harga =
                toNumber(inpPasar.dataset.rawValue || inpPasar.value) || 0;
            const luas = parseFloat(inpLuas.value) || 0;
            const total = harga * luas;

            inpAgunan.value = setFormatRupiah(total);
            inpAgunan.classList.remove("is-invalid");
            inpAgunan.classList.add("is-valid");

            const totalScore = document.getElementById(
                `total_score_tanah_${i}`
            );
            const SMargin = document.getElementById(`safety_margin_${i}`);
            if (totalScore) {
                const score = parseFloat(totalScore.value) || 0;

                if (kategori_jaminan.value == "Ruko & Rukan") {
                    // rukan
                    const totalScoreR = document.getElementById(
                        `total_score_${i}`
                    );
                    const scoreR = parseFloat(totalScoreR.value) || 0;

                    switch (true) {
                        case scoreR > 0 && scoreR <= 28:
                            SMargin.value = 5;
                            break;
                        case scoreR > 28 && scoreR <= 35:
                            SMargin.value = 10;
                            break;
                        case scoreR > 35 && scoreR <= 42:
                            SMargin.value = 15;
                            break;
                        case scoreR > 42 && scoreR <= 49:
                            SMargin.value = 20;
                            break;
                        case scoreR > 49 && scoreR <= 56:
                            SMargin.value = 25;
                            break;
                        case scoreR > 56 && scoreR <= 63:
                            SMargin.value = 30;
                            break;
                        case scoreR > 63 && scoreR <= 70:
                            SMargin.value = 35;
                            break;
                        case scoreR > 70 && scoreR <= 77:
                            SMargin.value = 40;
                            break;
                        case scoreR > 77 && scoreR <= 84:
                            SMargin.value = 45;
                            break;
                        case scoreR >= 85:
                            SMargin.value = 50;
                            break;
                        default:
                            SMargin.value = 0;
                            break;
                    }
                } else {
                    // tanah serta tanah untuk Bangunan
                    switch (true) {
                        case score > 0 && score <= 19:
                            SMargin.value = 5;
                            break;
                        case score > 19 && score <= 27:
                            SMargin.value = 10;
                            break;
                        case score > 27 && score <= 35:
                            SMargin.value = 20;
                            break;
                        case score > 35 && score <= 44:
                            SMargin.value = 30;
                            break;
                        case score > 44 && score <= 53:
                            SMargin.value = 40;
                            break;
                        case score >= 53:
                            SMargin.value = 50;
                            break;
                        default:
                            SMargin.value = 0;
                            break;
                    }
                }

                SMargin.classList.remove("is-invalid");
                SMargin.classList.add("is-valid");

                // for kesimpulan
                const kes_pasar = document.getElementById(
                    `kes_nilai_pasar_${i}`
                );
                const kes_taksasi_persen = document.getElementById(
                    `kes_nilai_taksasi_persen_${i}`
                );
                const kes_taksasi = document.getElementById(
                    `kes_nilai_taksasi_${i}`
                );

                // kesimpulan nilai pasar
                let total_kes_pasar =
                    (toNumber(inpAgunan.value) * parseFloat(SMargin.value)) /
                    100;
                kes_pasar.value = setFormatRupiah(total_kes_pasar);
                kes_pasar.classList.remove("is-invalid");
                kes_pasar.classList.add("is-valid");

                // kesimpulan taksasi
                let total_kes_taksasi =
                    (total_kes_pasar * parseFloat(kes_taksasi_persen.value)) /
                    100;

                kes_taksasi.value = setFormatRupiah(total_kes_taksasi);
                kes_taksasi.classList.remove("is-invalid");
                kes_taksasi.classList.add("is-valid");
            }
        });
    }

    // bangunan
    if (pasarBangunan) {
        pasarBangunan.addEventListener("keyup", function () {
            // set nilai pasar agunan bangunan
            const harga =
                toNumber(
                    pasarBangunan.dataset.rawValue || pasarBangunan.value
                ) || 0;
            const luasB = parseFloat(luasBangunan.value) || 0;
            const total = harga * luasB;

            agunanBangunan.value = setFormatRupiah(total);
            agunanBangunan.classList.remove("is-invalid");
            agunanBangunan.classList.add("is-valid");

            // sett nilai margin bangunan
            const MBangunan = document.getElementById(`margin_bangunan_${i}`);
            const scoreBangunan = document.getElementById(
                `total_score_bangunan_${i}`
            );

            if (scoreBangunan && kategori_jaminan.value == "Tanah & Bangunan") {
                const score = parseFloat(scoreBangunan.value || 0);

                // bangunan
                switch (true) {
                    case score > 0 && score <= 9:
                        MBangunan.value = 5;
                        break;
                    case score > 9 && score <= 14:
                        MBangunan.value = 10;
                        break;
                    case score > 14 && score <= 19:
                        MBangunan.value = 20;
                        break;
                    case score > 19 && score <= 25:
                        MBangunan.value = 30;
                        break;
                    case score > 25 && score <= 31:
                        MBangunan.value = 40;
                        break;
                    case score >= 31:
                        MBangunan.value = 50;
                        break;
                    default:
                        MBangunan.value = 0;
                        break;
                }

                MBangunan.classList.remove("is-invalid");
                MBangunan.classList.add("is-valid");

                // sett total untuk nilai rekomendasi
                const rekomTotal = document.getElementById(`rekom_total_${i}`);
                const TotalRekom =
                    toNumber(inpAgunan.value) + toNumber(agunanBangunan.value);

                rekomTotal.value = setFormatRupiah(TotalRekom);
                rekomTotal.classList.remove("is-invalid");
                rekomTotal.classList.add("is-valid");

                // =============
                // for kesimpulan
                const kes_pasar = document.getElementById(
                    `kes_bangunan_nilai_pasar_${i}`
                );
                const kes_taksasi_persen = document.getElementById(
                    `kes_taksasi_persen_2_${i}`
                );
                const kes_taksasi = document.getElementById(
                    `kes_bangunan_nilai_taksasi_${i}`
                );

                // kesimpulan nilai pasar
                let total_kes_pasar =
                    (toNumber(agunanBangunan.value) *
                        parseFloat(MBangunan.value)) /
                    100;
                kes_pasar.value = setFormatRupiah(total_kes_pasar);
                kes_pasar.classList.remove("is-invalid");
                kes_pasar.classList.add("is-valid");

                // kesimpulan taksasi
                let total_kes_taksasi =
                    (total_kes_pasar * parseFloat(kes_taksasi_persen.value)) /
                    100;

                kes_taksasi.value = setFormatRupiah(total_kes_taksasi);
                kes_taksasi.classList.remove("is-invalid");
                kes_taksasi.classList.add("is-valid");

                // total untuk kesimpulan
                const pasar_tanah = document.getElementById(
                    `kes_nilai_pasar_${i}`
                );
                const taksasi_tanah = document.getElementById(
                    `kes_nilai_taksasi_${i}`
                );
                const val_pasar = document.getElementById(
                    `kes_total_nilai_pasar_${i}`
                );
                const val_taksasi = document.getElementById(
                    `kes_total_nilai_taksasi_${i}`
                );
                // hitung pasar
                let total_pasar =
                    toNumber(pasar_tanah.value) + toNumber(kes_pasar.value);
                // hitung taksasi
                let total_taksasi =
                    toNumber(taksasi_tanah.value) + toNumber(kes_taksasi.value);

                val_pasar.value = setFormatRupiah(total_pasar);
                val_pasar.classList.remove("is-invalid");
                val_pasar.classList.add("is-valid");

                val_taksasi.value = setFormatRupiah(total_taksasi);
                val_taksasi.classList.remove("is-invalid");
                val_taksasi.classList.add("is-valid");
            }
        });
    }
}

// =========
// untuk hitung agunan kenda
function setHargaDiterima(i) {
    const hPasarKeseluruhan = document.getElementById(
        `harga_pasar_keseluruhan_${i}`
    );
    const kendaSF = document.getElementById(`safety_margin_kenda_${i}`);
    const hPasarDiterima = document.getElementById(`harga_pasar_diterima_${i}`);

    if (hPasarKeseluruhan) {
        hPasarKeseluruhan.addEventListener("keyup", function () {
            hPasarDiterima.value = setFormatRupiah(
                (toNumber(hPasarKeseluruhan.value) *
                    parseFloat(kendaSF.value)) /
                    100
            );

            hPasarDiterima.classList.remove("is-invalid");
            hPasarDiterima.classList.add("is-valid");
        });
    }
}

// =========
// untuk hitung agunan deposito
function setNilaiSM(i) {
    const setPasarSM = document.getElementById(
        `depo_nilai_pasar_setelah_sm_${i}`
    );
    const pasarSM = document.getElementById(`depo_nilai_pasar_agunan_${i}`);
    const pasarSF = document.getElementById(`depo_safety_margin_${i}`);

    if (pasarSM) {
        pasarSM.addEventListener("keyup", function () {
            setPasarSM.value = setFormatRupiah(
                toNumber(pasarSM.value) -
                    (toNumber(pasarSM.value) * parseFloat(pasarSF.value)) / 100
            );

            setPasarSM.classList.remove("is-invalid");
            setPasarSM.classList.add("is-valid");
        });
    }
}
