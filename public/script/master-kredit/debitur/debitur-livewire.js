document.addEventListener("DOMContentLoaded", function () {
    function bindActions() {
        // fungsi simpan data
        $("#simpanAdd").on("click", function (e) {
            var $form = $("#quickFormAdd");
            var inputRequired = $form.find("[required]");

            var inputKosong = inputRequired.filter(function () {
                var val = $(this).val();
                return val === null || val.trim() === "";
            });

            var terms = document.getElementById("termsAdd");
            if (terms && terms.checked === false) {
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

            Swal.fire({
                title: "Konfirmasi Simpan!",
                text: "Apakah Anda Ingin Menyimpan Data?",
                icon: "info",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, Simpan!",
                cancelButtonText: "Batal",
                theme: document.body.classList.contains("darkmode")
                    ? "dark"
                    : "light",
            }).then((result) => {
                if (result.isConfirmed) {
                    $("#loading-screen").fadeIn(); // 🔥 Tampilkan loading screen manual
                    Livewire.dispatch("UpdateStatus"); // 🔥 Emit langsung ke Livewire
                }
            });
        });
    }

    Livewire.on("RebindJS", () => {
        bindActions(); // panggil ulang fungsi JS kamu
    });
});

// 🔥 Ketika Livewire selesai menyimpan data, sembunyikan loading screen
// ✅ Tambahkan event listener di Livewire untuk menutup loading jika validasi gagal
Livewire.on("validationFailed", () => {
    console.log("Validasi gagal, menutup loading screen.");
    $("#loading-screen").fadeOut(); // ❌ Hilangkan loading jika validasi gagal
});

// ✅ Tambahkan event listener untuk menghilangkan loading jika berhasil
Livewire.on("AlertSuccess", (data) => {
    const { message, userId } = data[0]; // Access the first element of the array to get message and userId

    $("#loading-screen").fadeOut(); // ✅ Hilangkan loading jika sukses
    // tutup modal Add
    $("#modalSPK")
        .modal("hide")
        .on("hidden.bs.modal", function () {
            $(".modal-backdrop").remove();
        });

    Swal.fire({
        title: "Sukses!",
        text: message || "Data berhasil diperbarui.",
        icon: "success",
        theme: document.body.classList.contains("darkmode") ? "dark" : "light",
        confirmButtonText: "OK",
    }).then(() => {
        // Refresh the table
        Livewire.dispatch("refreshTable");
        // Scroll to the newly added data
        setTimeout(() => {
            const escapedKey = CSS.escape(userId);
            const newRow = document.querySelector(
                `[wire\\:key='${escapedKey}']`
            );
            if (newRow) {
                newRow.scrollIntoView({ behavior: "smooth", block: "center" });
                newRow.classList.add("table-info");
                // Pastikan body tidak terkunci scroll-nya
                document.body.style.overflow = "auto";
                setTimeout(() => newRow.classList.remove("table-info"), 2000);
            }
        }, 500); // Adjust the timeout as needed
    });
});
