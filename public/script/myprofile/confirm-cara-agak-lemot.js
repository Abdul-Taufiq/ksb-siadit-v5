// Save update data My data
$("#simpan").on("click", function (e) {
    // e.preventDefault(); // Tambahkan ini untuk mencegah submit default dari tombol

    var $form = $("#quickForm");
    var inputRequired = $form.find("[required]");

    var inputKosong = inputRequired.filter(function () {
        var val = $(this).val();
        return val === null || val.trim() === "";
    });

    // console.log(inputKosong);

    // term aplikasi
    var terms = document.getElementById("terms");
    if (terms.checked === false) {
        // Jika ada input yang kosong, tampilkan alert gagal simpan
        Swal.fire({
            title: "Gagal Simpan Data!",
            text: "PASTIKAN UNTUK MENYETUJUI TERMS APLIKASI!",
            icon: "error",
        });
        return;
    } else {
        if (inputKosong.length > 0) {
            Swal.fire({
                title: "Gagal Simpan Data!",
                text: "ADA DATA MANDATORI YANG BELUM DIISI, PASTIKAN UNTUK MENGISI SEMUA DATA MANDATORI!",
                icon: "error",
            });
        } else {
            Livewire.on("triggerUpdate", () => {
                Swal.fire({
                    title: "Konfirmasi Simpan Data!",
                    text: "SEBELUM MENYIMPAN DATA HARAP PERHATIKAN BAHWA DATA SUDAH BENAR! DAN JANGAN LEWATKAN PERINGATAN SEKECIL APAPUN!",
                    icon: "info",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya, Simpan!",
                    cancelButtonText: "Batal",
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.dispatch("updateProfile"); // 🔥 Emit ke Livewire untuk menyimpan data
                    }
                });
            });
        }
    }
});

// Save update data My Account
$("#simpanAkun").on("click", function (e) {
    // e.preventDefault(); // Tambahkan ini untuk mencegah submit default dari tombol

    var $form = $("#quickFormUpdateAkun");
    var inputRequired = $form.find("[required]");

    var inputKosong = inputRequired.filter(function () {
        var val = $(this).val();
        return val === null || val.trim() === "";
    });

    // console.log(inputKosong);

    // term aplikasi
    var terms = document.getElementById("termsakun");
    if (terms.checked === false) {
        // Jika ada input yang kosong, tampilkan alert gagal simpan
        Swal.fire({
            title: "Gagal Simpan Data!",
            text: "PASTIKAN UNTUK MENYETUJUI TERMS APLIKASI!",
            icon: "error",
        });
        return;
    } else {
        if (inputKosong.length > 0) {
            Swal.fire({
                title: "Gagal Simpan Data!",
                text: "ADA DATA MANDATORI YANG BELUM DIISI, PASTIKAN UNTUK MENGISI SEMUA DATA MANDATORI!",
                icon: "error",
            });
        } else {
            Livewire.on("triggerUpdateAkun", () => {
                Swal.fire({
                    title: "Konfirmasi Simpan Data!",
                    text: "MENGGANTI DATA MAKA AKAN MERUBAH AKUN UNTUK LOGIN KE APLIKASI!",
                    icon: "info",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya, Simpan!",
                    cancelButtonText: "Batal",
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.dispatch("updateProfileAkun"); // 🔥 Emit ke Livewire untuk menyimpan data
                    }
                });
            });
        }
    }
});
