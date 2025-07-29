$(document).ready(function () {
    const myModal = document.getElementById("Tambah");
    const myInput = document.getElementById("nik");

    myModal.addEventListener("shown.bs.modal", () => {
        myInput.focus();
    });

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
        }).then((result) => {
            if (result.isConfirmed) {
                $("#loading-screen").fadeIn(); // 🔥 Tampilkan loading screen manual
                Livewire.dispatch("StoreUser"); // 🔥 Emit langsung ke Livewire
            }
        });
    });

    // var $form = $("#quickFormEdit");
    // var excludeIds = ["staticBackdropLabel", "termsEdit", "simpanEdit"]; // ID yang dikecualikan

    // $form.find("[id]").each(function () {
    //     var $this = $(this);
    //     var id = $this.attr("id");

    //     if (!excludeIds.includes(id)) {
    //         var newId = id + "_edit";
    //         $this.attr("id", newId);
    //         console.log("ID baru: " + newId);
    //     }
    // });
});
