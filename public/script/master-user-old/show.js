// {{ detail data modal }}
$(document).ready(function () {
    $("body").on("click", ".detail_data", function () {
        var Id = $(this).attr("id");
        var kode_form = $(this).data("kode_form");

        var modalId = "Detail" + Id;
        // console.log("ID: " + Id);
        // console.log("Kode: " + kode_form);
        // console.log(modalId);

        $("#Detail").attr("id", modalId); //merubah id dari modal
        // $("#staticBackdropLabel").text("DETAIL DATA - " + kode_form);
        $("#frameDetail").attr("src", "/master-user/" + Id); //merubah link frame

        // Tambahkan event listener untuk menangkap penutupan modal
        $("#" + modalId).on("hidden.bs.modal", function () {
            // Kembalikan ID modal ke nilai default
            $(this).attr("id", "Detail");
        });
    });
});
// end detail

// edit
$(document).ready(function () {
    $("body").on("click", ".edit_data", function () {
        var Id = $(this).attr("id");
        var kode_form = $(this).data("kode_form");

        var modalId = "Edit" + Id;
        console.log("ID: " + Id);
        console.log("Kode: " + kode_form);
        console.log(modalId);

        $("#Edit").attr("id", modalId); //merubah id dari modal
        // $("#staticBackdropLabel").text("DETAIL DATA - " + kode_form);

        // Tambahkan event listener untuk menangkap penutupan modal
        $("#" + modalId).on("hidden.bs.modal", function () {
            // Kembalikan ID modal ke nilai default
            $(this).attr("id", "Edit");
        });
    });
});
