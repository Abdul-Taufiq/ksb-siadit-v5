$(document).ready(function () {
    // Proses elemen de
    processElements("harga_tanah_1_", function (counter) {
        setRpPer(counter);
    });
});

let counter = 1;
let maxCounter = 50;

function tambahPerhitungan() {
    let container = document.getElementById("tambahan_perhitungan");
    let inputElements = document.querySelectorAll(
        'div[id^="head_perhitungan_"]'
    );
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
        newDiv.id = `head_div_perhitungan_${counter}`;
        newDiv.innerHTML = `
            <div class="row" id="head_perhitungan_${counter}">
            <hr>
                <div class="col-md-6">
                    <table class="table table-striped table-sm w-100">
                        <tr>
                            <td>
                                <label class="notbold" for="nama_1_${counter}">Nama</label>
                            </td>
                            <td>
                                <input type="text" name="nama_1_${counter}" id="nama_1_${counter}" class="form-control form-control-sm is-invalid" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="notbold" for="hubungan_1_${counter}">Hubungan</label>
                            </td>
                            <td>
                                <input type="text" name="hubungan_1_${counter}" id="hubungan_1_${counter}" class="form-control form-control-sm is-invalid"
                                    required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="notbold" for="no_telp_1_${counter}">No Telp</label>
                            </td>
                            <td>
                                <input type="text" name="no_telp_1_${counter}" id="no_telp_1_${counter}" class="form-control form-control-sm is-invalid"
                                    required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="notbold" for="alamat_1_${counter}">Alamat</label>
                            </td>
                            <td>
                                <input type="text" name="alamat_1_${counter}" id="alamat_1_${counter}" class="form-control form-control-sm is-invalid"
                                    required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="notbold" for="harga_tanah_1_${counter}">Harga Tanah</label>
                            </td>
                            <td>
                                <div class="input-group input-group-sm">
                                    <span class="input-group-text">Rp</span>
                                    <input type="text" name="harga_tanah_1_${counter}" id="harga_tanah_1_${counter}"
                                        class="form-control form-control-sm is-invalid" required>
                                    <span class="input-group-text">/M²</span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="notbold" for="harga_bangunan_1_${counter}">Harga Bangunan</label>
                            </td>
                            <td>
                                <div class="input-group input-group-sm">
                                    <span class="input-group-text">Rp</span>
                                    <input type="text" name="harga_bangunan_1_${counter}" id="harga_bangunan_1_${counter}"
                                        class="form-control form-control-sm is-invalid" required>
                                    <span class="input-group-text">/M²</span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="notbold" for="keterangan_1_${counter}">Keterangan</label>
                            </td>
                            <td>
                                <textarea name="keterangan_1_${counter}" id="keterangan_1_${counter}" cols="20" rows="3" class="form-control is-invalid" required></textarea>
                            </td>
                        </tr>
                    </table>
                </div>

                <div class="col-md-6">
                    <table class="table table-striped table-sm w-100">
                        <tr>
                            <td>
                                <label class="notbold" for="nama_2_${counter}">Nama</label>
                            </td>
                            <td>
                                <input type="text" name="nama_2_${counter}" id="nama_2_${counter}" class="form-control form-control-sm is-invalid" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="notbold" for="hubungan_2_${counter}">Hubungan</label>
                            </td>
                            <td>
                                <input type="text" name="hubungan_2_${counter}" id="hubungan_2_${counter}" class="form-control form-control-sm is-invalid"
                                    required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="notbold" for="no_telp_2_${counter}">No Telp</label>
                            </td>
                            <td>
                                <input type="text" name="no_telp_2_${counter}" id="no_telp_2_${counter}" class="form-control form-control-sm is-invalid"
                                    required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="notbold" for="alamat_2_${counter}">Alamat</label>
                            </td>
                            <td>
                                <input type="text" name="alamat_2_${counter}" id="alamat_2_${counter}" class="form-control form-control-sm is-invalid"
                                    required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="notbold" for="harga_tanah_2_${counter}">Harga Tanah</label>
                            </td>
                            <td>
                                <div class="input-group input-group-sm">
                                    <span class="input-group-text">Rp</span>
                                    <input type="text" name="harga_tanah_2_${counter}" id="harga_tanah_2_${counter}"
                                        class="form-control form-control-sm is-invalid" required>
                                    <span class="input-group-text">/M²</span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="notbold" for="harga_bangunan_2_${counter}">Harga Bangunan</label>
                            </td>
                            <td>
                                <div class="input-group input-group-sm">
                                    <span class="input-group-text">Rp</span>
                                    <input type="text" name="harga_bangunan_2_${counter}" id="harga_bangunan_2_${counter}"
                                        class="form-control form-control-sm is-invalid" required>
                                    <span class="input-group-text">/M²</span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="notbold" for="keterangan_2_${counter}">Keterangan</label>
                            </td>
                            <td>
                                <textarea name="keterangan_2_${counter}" id="keterangan_2_${counter}" cols="20" rows="3" class="form-control is-invalid" required></textarea>
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
                    <button class="btn btn-outline-warning w-100" id="kurangi_perhitungan_${counter}" data-id="head_div_perhitungan_${counter}" type="button" onclick="kurangiPerhitungan()">
                        <i class="fa-solid fa-circle-minus"></i> Kurangi Data <i class="fa-solid fa-circle-minus"></i>
                    </button>
                </div>
            </div>
        `;

        container.appendChild(newDiv);

        setRpPer(counter);
    } else {
        console.error("Maximum number of Row reached.");
        alert("Maksimal Row yang dapat ditambahkan adalah 50.");
    }
}

function kurangiPerhitungan() {
    // console.log("kurangiJaminan() called");
    // Ambil elemen tombol yang diklik
    let button = event.target;
    let idDiv = button.getAttribute("data-id");

    // Log data-id untuk memastikan nilainya benar
    console.log("ID Div yang akan dihapus:", idDiv);

    // Hapus elemen berdasarkan data-id
    let container = document.getElementById("tambahan_perhitungan");
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
            "head_div_perhitungan_" + IdNextEl
        );
        // console.log(NextElement);

        // kondisi jika NextElement ada
        if (NextElement) {
            idForNew = `head_div_perhitungan_${AmbilId}`; // Perbarui ID elemen
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
                        `head_div_perhitungan_${AmbilId}`
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

// set rp
function setRpPer(counter) {
    const harga_tanah_1 = document.getElementById(`harga_tanah_1_${counter}`);
    harga_tanah_1.addEventListener("input", function (e) {
        this.value = formatRupiah(this.value);
    });
    const harga_tanah_2 = document.getElementById(`harga_tanah_2_${counter}`);
    harga_tanah_2.addEventListener("input", function (e) {
        this.value = formatRupiah(this.value);
    });

    const harga_bangunan_1 = document.getElementById(
        `harga_bangunan_1_${counter}`
    );
    harga_bangunan_1.addEventListener("input", function (e) {
        this.value = formatRupiah(this.value);
    });
    const harga_bangunan_2 = document.getElementById(
        `harga_bangunan_2_${counter}`
    );
    harga_bangunan_2.addEventListener("input", function (e) {
        this.value = formatRupiah(this.value);
    });
}

function processElements(prefix, callback) {
    document.querySelectorAll(`[id^="${prefix}"]`).forEach(function (element) {
        let match = element.id.match(/\d+/);
        if (match && parseInt(match[0]) > 0) {
            callback(parseInt(match[0]));
        }
    });
}
