$(document).ready(function () {
    initializeSummernote(
        "#tujuan_pinjaman",
        `Diisi dengan : <br>
        - Keterangan dari sumber pengembalian pokok dan bunga di akhir periode pinjaman. <br>
        - Jenis usaha, apabila diisi dengan usaha lainnya. <br>
        - Diisi dengan penjelasan mengenai usaha lainnya.
        
        `,
        150
    );
    initializeSummernote(
        "#pengalaman_usaha",
        `Diisi dengan : <br>
        1. Diisi dengan lengkap Tujuan Debitur <br>
        2. di isi dengan bukti-bukti lampirannya
        `,
        150
    );
    initializeSummernote(
        "#reputasi_lokal",
        `Diisi dengan : <br>
        1. Sejarah usaha debitur. <br>
        2. Pengalaman usaha / pekerjaan debitur sebelum memulai usaha yang ditekuni sekarang. <br>
        3. Jumlah karyawan yang dimiliki (kalau ada). <br>
        4. Model Usaha yang dijalankan oleh debitur.
        `,
        150
    );
    initializeSummernote(
        "#hubungan_bank",
        `Diisi dengan : <br>
        1. Gambaran Hasil SLIK debitur. <br>
        2. Hasil SLIK pasangan debitur. <br>
        3. Penjelasan singkat penyebab Kol selain Kol 1.
        `,
        150
    );
    initializeSummernote(
        "#prospek_usaha",
        `Diisi dengan : <br>
        1. Prospek kedepan atas usaha yang dijalankan oleh debitur. <br>
        2. Tantangan yang akan dihadapai oleh usaha yang dijalankan oleh debitur. <br>
        3. Aspek Positif dari usaha debitur. <br>
        4. Aspek Negatif dari usaha debitur.
        `,
        150
    );
    initializeSummernote(
        "#pemasok_dan_pelanggan",
        `Diisi dengan : <br>
        1. Cara debitur dalam mendapatkan barang dagangan dari supplier. <br>
        2. Lokasi Supplier terbesar debitur, prosentase supplier terbesar debitur. <br>
        3. Cara debitur dalam menyebarkan barang dagangan ke buyer. <br>
        4. Prosentase buyer terbesar debitur.
        `,
        150
    );
    initializeSummernote("#keterangan_1_1", "Keterangan", 150);
    initializeSummernote("#keterangan_2_1", "Keterangan", 150);

    // Penyimpangan
    initializeSummernote("#perihal", "Ketik sesuatu...", 100);
    // initializeSummernote("#jns_penyimpangan", "Ketik sesuatu...", 150);
    initializeSummernote("#ketentuan_berlaku", "Ketik sesuatu...", 150);
    initializeSummernote("#penyimpangan_diajukan", "Ketik sesuatu...", 150);
    initializeSummernote("#pertimbangan", "Ketik sesuatu...", 150);

    // for edit di analisa industri
    const confirm = document.getElementById("confirm_edit");
    const total_textarea = document.getElementById("total_textarea");

    if (confirm.value == "Edit") {
        for (let i = 1; i <= total_textarea.value; i++) {
            initializeSummernote(`#keterangan_${i}`, "Keterangan", 150);
        }
    }
});
