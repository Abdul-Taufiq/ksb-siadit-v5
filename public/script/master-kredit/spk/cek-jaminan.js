// =====================-
// Pencarian Nomor Agunan tanah
function cariAgunan(count) {
    var key = document.getElementById(`no_shm_shgb_${count}`).value;

    var show = new XMLHttpRequest();
    show.open(
        "GET",
        "/debitur/search/agunan?key=" + encodeURIComponent(key),
        true
    );
    show.onreadystatechange = function () {
        if (show.readyState === 4 && show.status === 200) {
            var data = JSON.parse(show.responseText);
            TampilAgunan(data);
            // alert("Hello! I am an alert box!!");
        }
    };
    show.send();
}

function TampilAgunan(data) {
    var modal = document.getElementById("search-agunan");
    var modalContent = document.getElementById("search-agunan-content");
    modalContent.innerHTML = "";
    // console.log("Tipe data data:", typeof data);
    // console.log("Panjang data:", data.length);
    // console.log(data);
    if (data.length > 0) {
        for (var i = 0; i < data.length; i++) {
            var dataItem = data[i];
            var debiturItem = document.createElement("tr");
            var agunanItem = document.createElement("tr");
            var createdAtDate =
                dataItem.kredit && dataItem.kredit.tgl_pengajuan
                    ? new Date(dataItem.kredit.tgl_pengajuan)
                    : new Date(dataItem.created_at);
            var formatCreated = createdAtDate.toLocaleDateString("en-GB", {
                day: "numeric",
                month: "numeric",
                year: "numeric",
            });
            var no_spk =
                dataItem.kredit && dataItem.kredit.no_spk
                    ? dataItem.kredit.no_spk
                    : "No Data";
            var status_akhir =
                dataItem.kredit && dataItem.kredit.status_akhir
                    ? dataItem.kredit.status_akhir
                    : "No Data";
            var nik =
                dataItem.kredit.debitur && dataItem.kredit.debitur.nik
                    ? dataItem.kredit.debitur.nik
                    : "No Data";
            var nama_debitur =
                dataItem.kredit.debitur && dataItem.kredit.debitur.nama_debitur
                    ? dataItem.kredit.debitur.nama_debitur
                    : "No Data";
            debiturItem.innerHTML =
                "<td>" +
                (i + 1) +
                "</td>" +
                // jaminan
                "<td>" +
                dataItem.atas_nama +
                "</td>" +
                "<td>" +
                dataItem.jns_jaminan +
                "</td>" +
                "<td>" +
                dataItem.no_shm_shgb +
                "</td>" +
                "<td>" +
                dataItem.keterangan +
                "</td>" +
                // debitur
                "<td>" +
                nik +
                "</td>" +
                "<td>" +
                nama_debitur +
                "</td>" +
                // kredit
                "<td>" +
                no_spk +
                "</td>" +
                "<td>" +
                status_akhir +
                "</td>" +
                "<td>" +
                formatCreated +
                "</td>" +
                "<td>" +
                "<a class='btn btn-sm btn-info btn-icon-split detail_data_agunan' " +
                "data-toggle='modal' data-target='#ShowAgunanDetail" +
                dataItem.encrypted_id +
                "'" +
                "id='" +
                dataItem.encrypted_id +
                "'" +
                "data-nama_debitur='" +
                nama_debitur +
                "'" +
                ">" +
                "<span><i class='fa-solid fa-eye'></i></span>" +
                "</a>";
            modalContent.appendChild(debiturItem);
        }
        modalContent.innerHTML += "</table>";
        modal.style.display = "block";
    } else {
        // alert("Belom ada data dengan NIK ini, Siap ditambahkan!!!");
        console.log("hallo Fiq");
    }
}

// pencarian agunan kenda
function cariAgunanKenda(count) {
    var element = document.getElementById(`no_bpkb_${count}`);
    if (element) {
        var key = element.value;
    }

    var show = new XMLHttpRequest();
    show.open(
        "GET",
        "/debitur/search/kendaraan?key=" + encodeURIComponent(key),
        true
    );
    show.onreadystatechange = function () {
        if (show.readyState === 4 && show.status === 200) {
            var data = JSON.parse(show.responseText);
            TampilAgunanKenda(data);
            // alert("Hello! I am an alert box!!");
        }
    };
    show.send();
}

function TampilAgunanKenda(data) {
    var modal = document.getElementById("search-agunan");
    var modalContent = document.getElementById("search-agunan-content");
    modalContent.innerHTML = "";
    // console.log("Tipe data data:", typeof data);
    // console.log("Panjang data:", data.length);
    // console.log(data);
    if (data.length > 0) {
        for (var i = 0; i < data.length; i++) {
            var dataItem = data[i];
            var debiturItem = document.createElement("tr");
            var agunanItem = document.createElement("tr");
            var createdAtDate =
                dataItem.kredit && dataItem.kredit.tgl_pengajuan
                    ? new Date(dataItem.kredit.tgl_pengajuan)
                    : new Date(dataItem.created_at);
            var formatCreated = createdAtDate.toLocaleDateString("en-GB", {
                day: "numeric",
                month: "numeric",
                year: "numeric",
            });
            var no_spk =
                dataItem.kredit && dataItem.kredit.no_spk
                    ? dataItem.kredit.no_spk
                    : "No Data";
            var status_akhir =
                dataItem.kredit && dataItem.kredit.status_akhir
                    ? dataItem.kredit.status_akhir
                    : "No Data";
            var keterangan_status =
                dataItem.kredit && dataItem.kredit.keterangan_status
                    ? dataItem.kredit.keterangan_status
                    : "No Data";
            var nik =
                dataItem.kredit.debitur && dataItem.kredit.debitur.nik
                    ? dataItem.kredit.debitur.nik
                    : "No Data";
            var nama_debitur =
                dataItem.kredit.debitur && dataItem.kredit.debitur.nama_debitur
                    ? dataItem.kredit.debitur.nama_debitur
                    : "No Data";
            debiturItem.innerHTML =
                "<td>" +
                (i + 1) +
                "</td>" +
                // jaminan
                "<td>" +
                dataItem.atas_nama +
                "</td>" +
                "<td>" +
                dataItem.jns_kendaraan +
                "</td>" +
                "<td>" +
                dataItem.no_bpkb +
                "</td>" +
                "<td>" +
                "Thn: " +
                dataItem.thn_pembuatan +
                "<br> Nopol: " +
                dataItem.nopol +
                "</td>" +
                // debitur
                "<td>" +
                nik +
                "</td>" +
                "<td>" +
                nama_debitur +
                "</td>" +
                // kredit
                "<td>" +
                no_spk +
                "</td>" +
                "<td>" +
                status_akhir +
                "</td>" +
                "<td>" +
                formatCreated +
                "</td>" +
                "<td>" +
                "<a class='btn btn-sm btn-info btn-icon-split detail_data_agunan' " +
                "data-toggle='modal' data-target='#ShowAgunanDetail" +
                dataItem.encrypted_id +
                "'" +
                "id='" +
                dataItem.encrypted_id +
                "'" +
                "data-nama_debitur='" +
                nama_debitur +
                "'" +
                ">" +
                "<span><i class='fa-solid fa-eye'></i></span>" +
                "</a>";

            modalContent.appendChild(debiturItem);
        }
        modalContent.innerHTML += "</table>";
        modal.style.display = "block";
    } else {
        // alert("Belom ada data dengan NIK ini, Siap ditambahkan!!!");
        console.log("hallo Fiq");
    }
}

function closeAgunan() {
    var modal = document.getElementById("search-agunan");
    modal.style.display = "none";
}
// {{ end pencarian nomor agunan }}

// detail exist if agunan found
$(document).ready(function () {
    $("body").on("click", ".detail_data_agunan", function () {
        var Id = $(this).attr("id");
        var nama_debitur = $(this).data("nama_debitur");

        // console.log(Id);
        $("#frameDetailAgunan").attr("src", "/debitur/agunan-show-data/" + Id); //merubah link frame
        $("#modalHeader").text("Detail Data A/n - " + nama_debitur);
        // Menampilkan modal
        $("#ShowAgunanDetail").modal("show");
    });
});

function closeDetail() {
    $("#ShowAgunanDetail").modal("hide");
    $("#frameDetailAgunan").attr("src", ""); //merubah link frame
}
// end detail
