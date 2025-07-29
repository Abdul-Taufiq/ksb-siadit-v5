// notif delete
$(function () {
    $(document).on("click", "#HapusData", function (e) {
        e.preventDefault();
        let ids = $(this).data("ids");
        console.log(ids);

        let icons =
            '<i class="fa-solid fa-trash-can shake-top" style="font-size: 40px;"></i>';

        Swal.fire({
            title: "Apa Anda Yakin?",
            text: "Apakah Anda Ingin Mengahapus Data?",
            icon: "error",
            iconHtml: icons,
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya!",
            cancelButtonText: "Tidak",
            customClass: {
                icon: "shake-top", //class css
            },
        }).then((result) => {
            if (result.isConfirmed) {
                console.log("is confirmed");

                Livewire.dispatch("HapusData", [ids]);
            }
        });
    });

    $(document).on("click", "#Restore", function (e) {
        e.preventDefault();
        let ids = $(this).data("ids");
        // console.log(ids);

        Swal.fire({
            title: "Apa Anda Yakin?",
            text: "Apakah Anda Ingin Mengembalikan Data?",
            icon: "success", // bisa untuk warna
            iconHtml: '<i class="fa-solid fa-recycle"></i>',
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya!",
            cancelButtonText: "Tidak",
            customClass: {
                icon: "rotate-in-center",
            },
        }).then((result) => {
            if (result.isConfirmed) {
                console.log("is confirmed");

                Livewire.dispatch("Restore", [ids]);
            }
        });
    });
});

// notif done delete
Livewire.on("SuccessDeleted", () => {
    $("#loading-screen").fadeOut(); // ❌ Hilangkan loading jika validasi gagal
    Swal.fire({
        title: "Data Berhasil Dihapus!",
        html: "<i style='font-size: 14px;'><b>Note :</b> Data akan terhapus secara <b>PERMANEN</b> setelah 30 Hari. Cek dan pulihkan data di menu <b>Restore Data</b></i>",
        icon: "success",
        confirmButtonText: "OK",
    }).then(() => {
        Livewire.dispatch("refreshTable");
    });
});

// notif done restore
Livewire.on("SuccessRestored", () => {
    $("#loading-screen").fadeOut(); // ❌ Hilangkan loading jika validasi gagal
    Swal.fire({
        title: "Data Berhasil Dipulihkan!",
        html: "<i style='font-size: 14px;'><b>Note :</b> cek data di menu utama!</i>",
        icon: "success",
        confirmButtonText: "OK",
    }).then(() => {
        Livewire.dispatch("refreshTable");
    });
});

// notif delete error
Livewire.on("ErrorDeleted", (message) => {
    Swal.fire({
        title: "Gagal!",
        text: message,
        icon: "error",
        confirmButtonText: "OK",
    });
});
