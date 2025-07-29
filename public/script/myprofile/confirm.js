// Save update data My data
// 🔥 Tampilkan loading screen manual
$("#simpan").on("click", function (e) {
    var $form = $("#quickForm");
    var inputRequired = $form.find("[required]");
    var inputKosong = inputRequired.filter(function () {
        var val = $(this).val();
        return val === null || val.trim() === "";
    });

    var terms = document.getElementById("terms");
    if (terms.checked === false) {
        Swal.fire({
            title: "Gagal Simpan Data!",
            text: "PASTIKAN UNTUK MENYETUJUI TERMS APLIKASI!",
            icon: "error",
        });
        return;
    }

    if (inputKosong.length > 0) {
        Swal.fire({
            title: "Gagal Simpan Data!",
            text: "ADA DATA MANDATORI YANG BELUM DIISI, PASTIKAN UNTUK MENGISI SEMUA DATA MANDATORI!",
            icon: "error",
        });
        return;
    }

    // 🔥 Langsung jalankan SweetAlert di sini tanpa menunggu Livewire
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
            $("#loading-screen").fadeIn(); // 🔥 Tampilkan loading screen manual
            Livewire.dispatch("updateProfile"); // 🔥 Emit langsung ke Livewire
        }
    });
});

// Save update data My Account
// 🔥 Tampilkan loading screen dihandle yang global
$("#simpanAkun").on("click", function (e) {
    e.preventDefault(); // Tambahkan ini untuk mencegah submit default dari tombol

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
        }
    }
});

// 🔥 Ketika Livewire selesai menyimpan data, sembunyikan loading screen
// ✅ Tambahkan event listener di Livewire untuk menutup loading jika validasi gagal
Livewire.on("validationFailed", () => {
    console.log("Validasi gagal, menutup loading screen.");
    $("#loading-screen").fadeOut(); // ❌ Hilangkan loading jika validasi gagal
});

// ✅ Tambahkan event listener untuk menghilangkan loading jika berhasil
Livewire.on("updateSuccess", () => {
    console.log("Update sukses, menutup loading screen.");
    $("#loading-screen").fadeOut(); // ✅ Hilangkan loading jika sukses
});
