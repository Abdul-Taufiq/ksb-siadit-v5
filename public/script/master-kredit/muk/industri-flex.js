let counter = 1;
let maxCounter = 50;

function tambahIndustri() {
    let container = document.getElementById("tambahan_industri");
    let inputElements = document.querySelectorAll('div[id^="head_industri_"]');
    let angka_besar = 0;

    // cek element terakhir
    if (inputElements.length > 0) {
        inputElements.forEach(function (inputElement) {
            // Menggunakan ekspresi reguler untuk mencocokkan nomor pada nama input
            var match = inputElement.id.match(/\d+/);

            // Jika ada kecocokan dan nomornya lebih besar dari yang sudah ada
            if (match && parseInt(match[0]) > angka_besar) {
                counter = parseInt(match[0]);
            }
        });
    } else {
        counter = 0;
    }

    // tambah counter
    counter++;
    // console.log(counter);

    if (counter <= maxCounter) {
        let newDiv = document.createElement("div");
        newDiv.className = "row mb-3";
        newDiv.id = `head_div_industri_${counter}`;
        newDiv.innerHTML = `
            <div class="row" style="margin-left: 5px;" id="head_industri_${counter}">
                <div class="col-md-12 mb-3">
                <hr>
                    <div class="form-group">
                        <label for="type_data_${counter}">Type</label>
                        <select name="type_data_${counter}" id="type_data_${counter}" class="form-select is-invalid">
                            <option selected disabled>-PILIH-</option>
                            <option value="Personal Checking">Personal Checking</option>
                            <option value="Trade Checking">Trade Checking</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <table class="table table-striped table-sm w-100">
                        <tr>
                            <td>
                                <label for="nama_1_${counter}">Nama</label>
                            </td>
                            <td>
                                <input type="text" name="nama_1_${counter}" id="nama_1_${counter}" class="form-control form-control-sm is-invalid"
                                    placeholder="Nama" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="hubungan_1_${counter}">Hubungan</label>
                            </td>
                            <td>
                                <input type="text" name="hubungan_1_${counter}" id="hubungan_1_${counter}"
                                    class="form-control form-control-sm is-invalid" placeholder="Hubungan" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="lama_hubungan_1_${counter}">Lama Hubungan</label>
                            </td>
                            <td>
                                <input type="text" name="lama_hubungan_1_${counter}" id="lama_hubungan_1_${counter}"
                                    class="form-control form-control-sm is-invalid" placeholder="Lama Hubungan" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="no_hp_1_${counter}">No.Hp/Telepon</label>
                            </td>
                            <td>
                                <input type="text" name="no_hp_1_${counter}" id="no_hp_1_${counter}" class="form-control form-control-sm is-invalid"
                                    placeholder="No.Hp/Telepon" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="keterangan_1_${counter}">Keterangan</label>
                            </td>
                            <td>
                                <textarea name="keterangan_1_${counter}" id="keterangan_1_${counter}"></textarea>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <table class="table table-striped table-sm w-100">
                        <tr>
                            <td>
                                <label for="nama_2_${counter}">Nama</label>
                            </td>
                            <td>
                                <input type="text" name="nama_2_${counter}" id="nama_2_${counter}" class="form-control form-control-sm is-invalid"
                                    placeholder="Nama" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="hubungan_2_${counter}">Hubungan</label>
                            </td>
                            <td>
                                <input type="text" name="hubungan_2_${counter}" id="hubungan_2_${counter}"
                                    class="form-control form-control-sm is-invalid" placeholder="Hubungan" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="lama_hubungan_2_${counter}">Lama Hubungan</label>
                            </td>
                            <td>
                                <input type="text" name="lama_hubungan_2_${counter}" id="lama_hubungan_2_${counter}"
                                    class="form-control form-control-sm is-invalid" placeholder="Lama Hubungan" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="no_hp_2_${counter}">No.Hp/Telepon</label>
                            </td>
                            <td>
                                <input type="text" name="no_hp_2_${counter}" id="no_hp_2_${counter}"
                                    class="form-control form-control-sm is-invalid" placeholder="No.Hp/Telepon" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="keterangan_2_${counter}">Keterangan</label>
                            </td>
                            <td>
                                <textarea name="keterangan_2_${counter}" id="keterangan_2_${counter}"></textarea>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        `;

        // untuk tombol kurangi
        newDiv.innerHTML += `
            <div>
                <div class="text-center"">
                    <button class="btn btn-outline-warning w-100" id="kurangi_industri_${counter}" data-id="head_div_industri_${counter}" type="button" onclick="kurangiIndustri()">
                        <i class="fa-solid fa-circle-minus"></i> Kurangi Data <i class="fa-solid fa-circle-minus"></i>
                    </button>
                </div>
            </div>
        `;

        container.appendChild(newDiv);

        initializeSummernote(`#keterangan_1_${counter}`, "Keterangan", 150);
        initializeSummernote(`#keterangan_2_${counter}`, "Keterangan", 150);
    } else {
        console.error("Maximum number of Row reached.");
        alert("Maksimal Row yang dapat ditambahkan adalah 50.");
    }
}

function kurangiIndustri() {
    // console.log("kurangiJaminan() called");
    // Ambil elemen tombol yang diklik
    let button = event.target;
    let idDiv = button.getAttribute("data-id");

    // Log data-id untuk memastikan nilainya benar
    console.log("ID Div yang akan dihapus:", idDiv);

    // Hapus elemen berdasarkan data-id
    let container = document.getElementById("tambahan_industri");
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
            "head_div_industri_" + IdNextEl
        );
        // console.log(NextElement);

        // kondisi jika NextElement ada
        if (NextElement) {
            idForNew = `head_div_industri_${AmbilId}`; // Perbarui ID elemen
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
                        `head_div_industri_${AmbilId}`
                    );
                }
            });

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
