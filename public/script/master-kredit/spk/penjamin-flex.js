// define maxcounter
let counter = 1;
let maxCounter = 100;

function tambahPenjamin() {
    // console.log("tambahPenjamin() called");
    let container = document.getElementById("tambahan_penjamin");
    let inputElements = document.querySelectorAll('div[id^="div_penjamin_"]');
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

    if (counter <= maxCounter) {
        let newDiv = document.createElement("div");
        newDiv.className = "row mb-3";
        newDiv.id = `div_penjamin_${counter}`; // Set ID for the new div
        newDiv.innerHTML = `
                <div class="row" >
                    <div class="col-md-12 mb-2">
                        <hr>
                        <h6 style="font-weight: bold; font-style: italic; letter-spacing: 2px; color: rgb(0, 162, 255);">
                            &rarr; Data Penjamin ${counter}
                        </h6>
                        <hr>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="form-group">
                            <label for="nik_${counter}">NIK:</label>
                            <input type="text" name="nik_${counter}" id="nik_${counter}" required class="form-control nik is-invalid"
                                placeholder="NIK" maxlength="16" minlength="16">
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="form-group">
                            <label for="nama_${counter}">Nama:</label>
                            <input type="text" name="nama_${counter}" id="nama_${counter}" required class="form-control is-invalid"
                                placeholder="Nama">
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="form-group">
                            <label for="tempat_lahir_${counter}">Tempat Lahir:</label>
                            <input type="text" name="tempat_lahir_${counter}" id="tempat_lahir_${counter}" required class="form-control is-invalid"
                                placeholder="Tempat Lahir">
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="form-group">
                            <label for="tgl_lahir_${counter}">Tanggal Lahir:</label>
                            <input type="date" name="tgl_lahir_${counter}" id="tgl_lahir_${counter}" required class="form-control is-invalid"
                                placeholder="Tempat Lahir">
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="form-group">
                            <label for="jenis_kelamin_${counter}">Jenis Kelamin:</label>
                            <select name="jenis_kelamin_${counter}" id="jenis_kelamin_${counter}" required class="form-select is-invalid">
                                <option selected disabled>Pilih Jenis Kelamin</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="form-group">
                            <label for="alamat_${counter}">Alamat:</label>
                            <textarea name="alamat_${counter}" id="alamat_${counter}" required class="form-control is-invalid" placeholder="Alamat"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="form-group">
                            <label for="status_pernikahan_${counter}">Status Pernikahan:</label>
                            <select name="status_pernikahan_${counter}" id="status_pernikahan_${counter}" required class="form-select is-invalid">
                                <option selected disabled>- Pilih Status Debitur -</option>
                                <option value="Menikah">Menikah</option>
                                <option value="Belum Menikah">Belum Menikah</option>
                                <option value="Duda/Janda">Duda/Janda</option>
                                <option value="Pernikahan Khusus">Pernikahan Khusus</option>
                            </select>
                        </div>
                    </div>
                </div>



                <div class="row" id="div_pasangan_${counter}">
                    <div class="col-md-12 mb-2">
                        <hr>
                        <h6 style="font-weight: bold; font-style: italic; letter-spacing: 2px; color: rgb(0, 162, 255)">
                            &rarr; Data Pasangan Penjamin ${counter}
                        </h6>
                        <hr>
                    </div>

                    <div class="col-md-6 mb-4">
                        <div class="form-group">
                            <label for="nik_pasangan_${counter}">NIK:</label>
                            <input type="text" name="nik_pasangan_${counter}" id="nik_pasangan_${counter}" required
                                class="form-control nik is-invalid" placeholder="NIK Pasangan" maxlength="16" minlength="16">
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="form-group">
                            <label for="nama_pasangan_${counter}">Nama:</label>
                            <input type="text" name="nama_pasangan_${counter}" id="nama_pasangan_${counter}" required
                                class="form-control is-invalid" placeholder="Nama">
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="form-group">
                            <label for="tempat_lahir_pasangan_${counter}">Tempat Lahir:</label>
                            <input type="text" name="tempat_lahir_pasangan_${counter}" id="tempat_lahir_pasangan_${counter}" required
                                class="form-control is-invalid" placeholder="Tempat Lahir">
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="form-group">
                            <label for="tgl_lahir_pasangan_${counter}">Tanggal Lahir:</label>
                            <input type="date" name="tgl_lahir_pasangan_${counter}" id="tgl_lahir_pasangan_${counter}" required
                                class="form-control is-invalid" placeholder="Tempat Lahir">
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="form-group">
                            <label for="alamat_pasangan_opsi_${counter}">Alamat Pasangan:</label>
                            <select name="alamat_pasangan_opsi_${counter}" id="alamat_pasangan_opsi_${counter}" class="form-select is-invalid"
                                required>
                                <option selected disabled>- Alamat -</option>
                                <option value="Tinggal Sendiri">Tinggal Sendiri</option>
                                <option value="sama dengan suaminya">Sama Dengan Suaminya</option>
                                <option value="sama dengan istrinya">Sama Dengan Istrinya</option>
                            </select>
                            <textarea class="form-control d-none is-invalid" name="alamat_pasangan_${counter}" id="alamat_pasangan_${counter}" rows="3"
                                placeholder="Alamat Rumah, contoh: Jl. Pangeran Diponegoro No.210, Jetis Selatan, Parakan Kauman, Kec. Parakan, Kabupaten Temanggung"></textarea>
                        </div>
                    </div>
                </div>



                <div class="row" id="div_akta_${counter}">
                    <div class="col-md-12 mb-2">
                        <hr>
                        <h6 style="font-weight: bold; font-style: italic; letter-spacing: 2px; color: rgb(0, 162, 255)">
                            &rarr; Data Akta Pernikahan Khusus ${counter}
                        </h6>
                        <hr>
                    </div>

                    <div class="col-md-6 mb-4">
                        <div class="form-group">
                            <label for="judul_akta_${counter}">Judul Akta:</label>
                            <input type="text" name="judul_akta_${counter}" id="judul_akta_${counter}" required class="form-control is-invalid"
                                placeholder="Judul Akta">
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="form-group">
                            <label for="no_akta_${counter}">Nomor Akta:</label>
                            <input type="text" name="no_akta_${counter}" id="no_akta_${counter}" required class="form-control is-invalid"
                                placeholder="Nomor Akta">
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="form-group">
                            <label for="tgl_akta_${counter}">Tanggal Akta:</label>
                            <input type="date" name="tgl_akta_${counter}" id="tgl_akta_${counter}" required class="form-control is-invalid"
                                placeholder="tgl">
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="form-group">
                            <label for="nama_notaris_${counter}">Nama Notaris:</label>
                            <input type="text" name="nama_notaris_${counter}" id="nama_notaris_${counter}" required
                                class="form-control is-invalid" placeholder="Nama Notaris">
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="form-group">
                            <label for="kedudukan_notaris_${counter}">Kedudukan Notaris:</label>
                            <input type="text" name="kedudukan_notaris_${counter}" id="kedudukan_notaris_${counter}" required
                                class="form-control is-invalid" placeholder="Kedudukan Akta">
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <button class="btn btn-outline-warning w-100" id="kurangi_jaminan_${counter}" data-id="div_penjamin_${counter}" type="button" onclick="kurangiPenjamin()">
                        <i class="fa-solid fa-circle-minus"></i> Kurangi Data Penjamin <i class="fa-solid fa-circle-minus"></i>
                    </button>
                </div>

        `;
        container.appendChild(newDiv);

        // status pernikahan
        status_pernikahan(counter);
        // alamat pasangan
        alamat_pasangan(counter);
    } else {
        console.error("Maximum number of Penjamin reached.");
        alert("Maksimal Penjamin yang dapat ditambahkan adalah 100.");
    }
}

function kurangiPenjamin() {
    // console.log("kurangiPenjamin() called");
    // Ambil elemen tombol yang diklik
    let button = event.target;
    let idDiv = button.getAttribute("data-id");

    // Log data-id untuk memastikan nilainya benar
    // console.log("ID Div yang akan dihapus:", idDiv);

    // Hapus elemen berdasarkan data-id
    let container = document.getElementById("tambahan_penjamin");
    let divToRemove = document.getElementById(idDiv);
    // Ambil angka dari idDiv menggunakan RegEx
    let AmbilId = parseInt(idDiv.match(/\d+$/)[0]); // Mengambil angka di akhir string
    let IdNextEl = AmbilId + 1; // Mengurangi 1 dari angka yang diambil
    // console.log(`ID untuk penjamin baru: ${AmbilId}`);

    if (divToRemove && container.contains(divToRemove)) {
        container.removeChild(divToRemove); // Hapus elemen dari container
        counter--; // Kurangi counter hanya jika elemen berhasil dihapus
        // console.log(`Penjamin dengan ID ${idDiv} berhasil dihapus.`);

        // Perbarui ID dan atribut elemen yang tersisa
        let NextElement = document.getElementById("div_penjamin_" + IdNextEl);
        // console.log(NextElement);

        // kondisi jika NextElement ada
        if (NextElement) {
            idForNew = `div_penjamin_${AmbilId}`; // Perbarui ID elemen
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
                    element.setAttribute("data-id", `div_penjamin_${AmbilId}`);
                }
            });

            // Perbarui teks judul
            let titles = NextElement.querySelectorAll("h6");
            if (titles) {
                titles[0].textContent = `→ Data Penjamin ${AmbilId}`;
                titles[1].textContent = `→ Data Pasangan Penjamin ${AmbilId}`;
                titles[2].textContent = `→ Data Akta Pernikahan Khusus ${AmbilId}`;
            }

            // fungsi llainnya
            if (document.getElementById(`status_pernikahan_${AmbilId}`)) {
                status_pernikahan(AmbilId);
                // console.log("status_pernikahan_" + AmbilId);
            }
            if (document.getElementById(`alamat_pasangan_${AmbilId}`)) {
                alamat_pasangan(AmbilId);
                // console.log("alamat_pasangan_" + AmbilId);
            }
        }
    } else {
        console.error("Elemen tidak ditemukan atau tidak dapat dihapus.");
    }
}
