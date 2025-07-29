// protect form input
$(document).ready(function () {
    // Set default form dengan status invalid
    $(".form-control, .form-select")
        .addClass("is-invalid")
        .attr("autocomplete", "off");

    // Validasi saat halaman dimuat (edit mode)
    $(".form-control, .form-select")
        .not(".nik")
        .each(function () {
            let value = $(this).val();

            // Pastikan nilai tidak null sebelum menggunakan trim()
            if (value !== null) {
                value = value.trim();
            } else {
                value = ""; // Jika null, set sebagai string kosong
            }

            if (value !== "") {
                $(this).addClass("is-valid").removeClass("is-invalid");
            } else {
                $(this).addClass("is-invalid").removeClass("is-valid");
            }
        });

    // Event untuk validasi saat input berubah
    $(document).on(
        "input keyup change",
        ".form-control:not(.nik), .form-select",
        function () {
            let value = $(this).val();

            // Pastikan nilai tidak null sebelum menggunakan trim()
            if (value !== null) {
                value = value.trim();
            } else {
                value = ""; // Jika null, set sebagai string kosong
            }

            if (value.length === 0) {
                // Jika kosong, berikan border merah dan hapus hijau
                $(this).addClass("is-invalid").removeClass("is-valid");
            } else {
                // Jika ada isinya, berikan border hijau dan hapus merah
                $(this).addClass("is-valid").removeClass("is-invalid");
            }
        }
    );
});

$(document).ready(function () {
    // default form danger
    // $(".form-control").addClass("is-invalid");

    $(document).on("input", ".form-control.nik", function () {
        var nikInput = $(this);

        // Jika memiliki class "nik", lakukan validasi
        if (nikInput.hasClass("nik")) {
            validateNik(nikInput);
        } else {
            // Jika tidak, lakukan logika default
            if (nikInput.val().trim() === "") {
                nikInput.addClass("is-invalid").removeClass("is-valid");
            } else {
                nikInput.addClass("is-valid").removeClass("is-invalid");
            }
        }
    });

    function validateNik(nikInput) {
        var nikValue = nikInput.val().trim();

        // Menghapus karakter selain angka dari nilai input
        nikValue = nikValue.replace(/\D/g, "");

        var nikLength = nikValue.length;

        // Menentukan apakah input memenuhi persyaratan
        var isValidLength = nikLength === 16;

        // Menentukan warna border berdasarkan validitas input
        if (isValidLength) {
            nikInput.removeClass("is-invalid").addClass("is-valid");
        } else {
            nikInput.removeClass("is-valid").addClass("is-invalid");
        }
    }

    // Validasi awal saat dokumen dimuat untuk semua elemen dengan class "form-control" dan "nik"
    $(".form-control.nik").each(function () {
        validateNik($(this));
    });
});
// end protect form input
