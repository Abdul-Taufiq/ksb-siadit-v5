let counterDev = 1;
let maxDevCounter = 50;

function tambahDeviasi() {
    let container = document.getElementById("tambahan_deviasi");
    let inputElements = document.querySelectorAll('div[id^="head_deviasi_"]');
    let angka_besar = 0;

    // cek element terakhir
    if (inputElements.length > 0) {
        inputElements.forEach(function (inputElement) {
            // Menggunakan ekspresi reguler untuk mencocokkan nomor pada nama input
            var match = inputElement.id.match(/\d+/);

            // Jika ada kecocokan dan nomornya lebih besar dari yang sudah ada
            if (match && parseInt(match[0]) > angka_besar) {
                counterDev = parseInt(match[0]);
            }
        });
    } else {
        counterDev = 0;
    }

    // tambah counterDev
    counterDev++;
    // console.log(counter);

    if (counterDev <= maxDevCounter) {
        let newDiv = document.createElement("div");
        newDiv.className = "row mb-3";
        newDiv.id = `head_div_deviasi_${counterDev}`;
        newDiv.innerHTML = `
            <div class="row" style="margin-left: 5px;" id="head_deviasi_${counterDev}">
                <div class="col-md-12">
                    <div class="head-judul">
                        <h6>→ DATA ${counterDev}</h6>
                    </div>
                    <hr>
                </div>
                <div class="col-md-12 mb-4">
                    <div class="form-group">
                        <label for="jns_penyimpangan_${counterDev}">Jenis Penyimpangan</label>
                        <input type="text" name="jns_penyimpangan_${counterDev}" id="jns_penyimpangan_${counterDev}" class="form-control is-invalid">
                    </div>
                </div>
                <div class="col-md-12 mb-4">
                    <div class="form-group">
                        <label for="ketentuan_berlaku_${counterDev}">Ketentuan Yang Berlaku</label>
                        <textarea name="ketentuan_berlaku_${counterDev}" id="ketentuan_berlaku_${counterDev}"></textarea>
                    </div>
                </div>
                <div class="col-md-12 mb-4">
                    <div class="form-group">
                        <label for="penyimpangan_diajukan_${counterDev}">Penyimpangan Yang Diajukan</label>
                        <textarea name="penyimpangan_diajukan_${counterDev}" id="penyimpangan_diajukan_${counterDev}"></textarea>
                    </div>
                </div>
                <div class="col-md-12 mb-4">
                    <div class="form-group">
                        <label for="pertimbangan_${counterDev}">Pertimbangan</label>
                        <textarea name="pertimbangan_${counterDev}" id="pertimbangan_${counterDev}"></textarea>
                    </div>
                </div>
            </div>
        `;

        // untuk tombol kurangi
        newDiv.innerHTML += `
            <div>
                <div class="text-center"">
                    <button class="btn btn-outline-warning w-100" id="kurangi_deviasi_${counterDev}" data-id="head_div_deviasi_${counterDev}" type="button" onclick="kurangiDeviasi()">
                        <i class="fa-solid fa-circle-minus"></i> Kurangi Data <i class="fa-solid fa-circle-minus"></i>
                    </button>
                </div>
            </div>
        `;

        container.appendChild(newDiv);

        initializeSummernote(
            `#ketentuan_berlaku_${counterDev}`,
            "Ketik...",
            150
        );
        initializeSummernote(
            `#penyimpangan_diajukan_${counterDev}`,
            "Ketik...",
            150
        );
        initializeSummernote(`#pertimbangan_${counterDev}`, "Ketik...", 150);
    } else {
        console.error("Maximum number of Row reached.");
        alert("Maksimal Row yang dapat ditambahkan adalah 50.");
    }
}

function kurangiDeviasi() {
    // console.log("kurangiJaminan() called");
    // Ambil elemen tombol yang diklik
    let button = event.target;
    let idDiv = button.getAttribute("data-id");

    // Log data-id untuk memastikan nilainya benar
    // console.log("ID Div yang akan dihapus:", idDiv);

    // Hapus elemen berdasarkan data-id
    let container = document.getElementById("tambahan_deviasi");
    let divToRemove = document.getElementById(idDiv);
    // Ambil angka dari idDiv menggunakan RegEx
    let AmbilId = parseInt(idDiv.match(/\d+$/)[0]); // Mengambil angka di akhir string
    let IdNextEl = AmbilId + 1; // Mengurangi 1 dari angka yang diambil
    // console.log(`ID untuk penjamin baru: ${IdNextEl}`);

    if (divToRemove && container.contains(divToRemove)) {
        container.removeChild(divToRemove); // Hapus elemen dari container
        counter--; // Kurangi counter hanya jika elemen berhasil dihapus
        // console.log(`Penjamin dengan ID ${idDiv} berhasil dihapus.`);

        // Perbarui ID dan atribut elemen yang tersisa
        let NextElement = document.getElementById(
            "head_div_deviasi_" + IdNextEl
        );
        // console.log(NextElement);

        // kondisi jika NextElement ada
        if (NextElement) {
            idForNew = `head_div_deviasi_${AmbilId}`; // Perbarui ID elemen
            // console.log(idForNew);
            NextElement.id = idForNew; // Perbarui ID elemen

            // Perbarui semua atribut dan elemen di dalamnya
            NextElement.querySelectorAll(
                "[id], [name], [data-id], [for]"
            ).forEach((element) => {
                if (element.for) {
                    element.for = element.for.replace(/\d+$/, AmbilId);
                }
                if (element.id) {
                    element.id = element.id.replace(/\d+$/, AmbilId);
                }
                if (element.name) {
                    element.name = element.name.replace(/\d+$/, AmbilId);
                }
                if (element.getAttribute("data-id")) {
                    element.setAttribute(
                        "data-id",
                        `head_div_deviasi_${AmbilId}`
                    );
                }
            });

            // Perbarui teks judul
            let titles = NextElement.querySelectorAll("h6");
            if (titles) {
                titles[0].textContent = `→ DATA ${AmbilId}`;
            }

            // fungsi llainnya
            // if (document.getElementById(`kategori_slik_${AmbilId}`)) {
            //     kategorislik(AmbilId);
            //     // console.log("kategori_slik_" + AmbilId);
            // }
            // if (document.getElementById(`jns_slik_opsi_${AmbilId}`)) {
            //     slikOpsi(AmbilId);
            //     // console.log("jns_slik_opsi_" + AmbilId);
            // }
            // if (document.getElementById(`nominal_${AmbilId}`)) {
            //     setRupiahNominal(AmbilId);
            //     // console.log("nominal_" + AmbilId);
            // }
        }
    } else {
        console.error("Elemen tidak ditemukan atau tidak dapat dihapus.");
    }
}
