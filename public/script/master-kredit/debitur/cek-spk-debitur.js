// Pencarian NIK
function cariFunction() {
    var key = document.getElementById("nik").value;
    var show = new XMLHttpRequest();
    show.open("GET", "/debitur/search?key=" + encodeURIComponent(key), true);
    show.onreadystatechange = function () {
        if (show.readyState === 4 && show.status === 200) {
            var data = JSON.parse(show.responseText);
            tampil(data);
            // alert("Hello! I am an alert box!!");
        }
    };
    show.send();
}

function tampil(data) {
    var modal = document.getElementById("search-modal");
    var modalContent = document.getElementById("search-modal-content");
    modalContent.innerHTML = "";
    if (data.length > 0) {
        for (var i = 0; i < data.length; i++) {
            var debitur = data[i];
            var debiturItem = document.createElement("tr");
            // Ubah format tanggal
            // var createdAtDate = new Date(debitur.kredit.tgl_pengajuan);
            var createdAtDate =
                debitur.kredit && debitur.kredit.tgl_pengajuan
                    ? new Date(debitur.kredit.tgl_pengajuan)
                    : new Date(debitur.created_at);
            var formatCreated = createdAtDate.toLocaleDateString("en-GB", {
                day: "numeric",
                month: "numeric",
                year: "numeric",
                // hour: "numeric",
                // minute: "numeric",
            });
            var no_spk =
                debitur.kredit && debitur.kredit.no_spk
                    ? debitur.kredit.no_spk
                    : "No Data";
            var status_akhir =
                debitur.kredit && debitur.kredit.status_akhir
                    ? debitur.kredit.status_akhir
                    : "No Data";
            var keterangan_status =
                debitur.kredit && debitur.kredit.keterangan_status
                    ? debitur.kredit.keterangan_status
                    : "No Data";
            // var UpdateAtDate = new Date(debitur.updated_at);
            // var formatUpdate = UpdateAtDate.toLocaleDateString("en-GB", {
            //     day: "numeric",
            //     month: "numeric",
            //     year: "numeric",
            //     hour: "numeric",
            //     minute: "numeric",
            // });
            debiturItem.innerHTML =
                "<td>" +
                (i + 1) +
                "</td>" +
                "<td>" +
                debitur.nik +
                "</td>" +
                "<td>" +
                debitur.nama_debitur +
                "</td>" +
                "<td>" +
                debitur.nik_pasangan +
                "</td>" +
                "<td>" +
                debitur.nama_pasangan +
                "</td>" +
                "<td>" +
                no_spk +
                "</td>" +
                "<td>" +
                status_akhir +
                "</td>" +
                "<td>" +
                formatCreated +
                "</td>" +
                // "<td>" +
                // formatUpdate +
                // "</td>" +
                "<td>" +
                "<a type='button' class='btn btn-sm btn-info btn-icon-split detail_data' " +
                "data-bs-toggle='modal' data-bs-target='#myModalDoc" +
                "'" +
                "id='" +
                debitur.encrypted_id +
                "'" +
                "data-nama_debitur='" +
                debitur.nama_debitur +
                "'" +
                ">" +
                "<span><i class='fa-solid fa-eye'></i></span>" +
                "</a>" +
                "&nbsp;" +
                // xxx
                "<a class='btn btn-sm btn-success btn-icon-split' " +
                "href='/debitur/create-exist/" +
                debitur.encrypted_id +
                "/create'>" +
                "<span><i class='fa-regular fa-circle-check'></i></span>" +
                "</a>" +
                "</td>";
            modalContent.appendChild(debiturItem);
        }
        modalContent.innerHTML += "</table>";
        modal.style.display = "block";
    } else {
        alert("Belom ada data dengan NIK ini, Siap ditambahkan!!!");
    }
}

function closeWin() {
    var modal = document.getElementById("search-modal");
    modal.style.display = "none";
}

// detail exist debitur if nik found
$(document).ready(function () {
    $("body").on("click", ".detail_data", function () {
        var Id = $(this).attr("id");
        var nama_debitur = $(this).data("nama_debitur");

        var modalId = "myModalDoc_" + Id;
        // $("#myModalDoc").attr("id", modalId); //merubah id dari modal
        $("#frameDetail").attr("src", "/debitur/debitur-show-data/" + Id); //merubah link frame
        $("#modalHeader").text("Detail Data A/n - " + nama_debitur);

        // Tambahkan event listener untuk menangkap penutupan modal
        $("#" + modalId).on("hidden.bs.modal", function () {
            // Kembalikan ID modal ke nilai default
            $(this).attr("id", "myModalDoc");
            $("#frameDetail").attr("src", "");
        });
    });
});
// end detail
