$(document).ready(function () {
    // fungsi simpan data
    $("#simpan").on("click", function (e) {
        var $form = $("#quickForm");
        var inputRequired = $form.find("[required]");

        var inputKosong = inputRequired.filter(function () {
            var val = $(this).val();
            return val === null || val.trim() === "";
        });

        var terms = document.getElementById("terms");
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
        }).then((result) => {
            if (result.isConfirmed) {
                $("#loading-screen").fadeIn(); // 🔥 Tampilkan loading screen manual
                const metode = document.getElementById("metode").value;

                if (metode == "Add") {
                    Livewire.dispatch("StoreData"); // 🔥 Emit langsung ke Livewire
                } else if (metode == "Edit") {
                    Livewire.dispatch("UpdateData"); // 🔥 Emit langsung ke Livewire
                }
            }
        });
    });
});

// 🔥 Ketika Livewire selesai menyimpan data, sembunyikan loading screen
// ✅ Tambahkan event listener di Livewire untuk menutup loading jika validasi gagal
document.addEventListener("DOMContentLoaded", function () {
    Livewire.on("validationFailed", () => {
        console.log("Validasi gagal, menutup loading screen.");
        $("#loading-screen").fadeOut(); // ❌ Hilangkan loading jika validasi gagal
    });

    // ✅ Tambahkan event listener untuk menghilangkan loading jika berhasil
    Livewire.on("AlertSuccess", (data) => {
        const { message, userId } = data[0]; // Access the first element of the array to get message and userId

        $("#loading-screen").fadeOut(); // ✅ Hilangkan loading jika sukses
        // tutup modal
        $("#modal")
            .modal("hide")
            .on("hidden.bs.modal", function () {
                $(".modal-backdrop").remove();
            });

        Swal.fire({
            title: "Sukses!",
            text: message || "Data berhasil diperbarui.",
            icon: "success",
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
                    newRow.scrollIntoView({
                        behavior: "smooth",
                        block: "center",
                    });
                    newRow.classList.add("table-info");
                    // Pastikan body tidak terkunci scroll-nya
                    document.body.style.overflow = "auto";
                    setTimeout(
                        () => newRow.classList.remove("table-info"),
                        2000
                    );
                }
            }, 500); // Adjust the timeout as needed
        });
    });
});
