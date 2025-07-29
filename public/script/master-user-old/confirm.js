$(document).ready(function () {
    // fungsi validasi berubah warna input
    function validateInput($form) {
        var inputRequired = $form.find("[required]").not("#termsAdd");
        inputRequired.each(function () {
            var $this = $(this);
            var val = $this.val();
            if (!val || val.trim() === "") {
                $this.removeClass("is-valid").addClass("is-invalid");
            } else {
                $this.removeClass("is-invalid").addClass("is-valid");
            }
        });

        // Validasi khusus untuk NIK
        var $nik = $form.find("#nik");
        if ($nik.length) {
            var nikVal = $nik.val();
            if (!/^\d{16}$/.test(nikVal)) {
                $nik.removeClass("is-valid").addClass("is-invalid");
            } else {
                $nik.removeClass("is-invalid").addClass("is-valid");
            }
        }

        // Validasi khusus untuk phone_number
        var $phoneNumber = $form.find("#phone_number");
        if ($phoneNumber.length) {
            var phoneNumberVal = $phoneNumber.val();
            if (!/^\d{8,15}$/.test(phoneNumberVal)) {
                $phoneNumber.removeClass("is-valid").addClass("is-invalid");
            } else {
                $phoneNumber.removeClass("is-invalid").addClass("is-valid");
            }
        }
    }

    // ubah warna input diawal click
    $("#tambahData").on("click", function () {
        var inputRequired = $("#quickFormAdd")
            .find("[required]")
            .not("#termsAdd");
        inputRequired.each(function () {
            var $this = $(this);
            $this.addClass("is-invalid");
        });

        $('input[inputmode="numeric"]').keyup(function (e) {
            if (/\D/g.test(this.value)) {
                // Filter non-digits from input value.
                this.value = this.value.replace(/\D/g, "");
            }
        });
    });

    // fungsi simpan data
    $("#simpanAdd").on("click", function (e) {
        var $form = $("#quickFormAdd");
        validateInput($form);
        var inputKosong = $form
            .find("[required]")
            .not("#termsAdd")
            .filter(function () {
                var val = $(this).val();
                return !val || val.trim() === "";
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
                $("#loading-screen").fadeIn();
                Livewire.dispatch("StoreUser"); // 🔥 Emit ke Livewire untuk menyimpan data
            }
        });
    });

    // inisialisasi validasi input
    $("#quickFormAdd")
        .find("[required]")
        .on("input", function () {
            validateInput($("#quickFormAdd"));
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
});
