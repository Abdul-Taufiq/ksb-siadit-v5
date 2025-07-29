let counter = 1;
let maxCounter = 100;

function tambahJaminan() {
    let container = document.getElementById("tambahan_jaminan");
    let inputElements = document.querySelectorAll('div[id^="head_jaminan_"]');
    let jabatan = document.getElementById("jabatan").value;
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
        newDiv.id = `head_div_jaminan_${counter}`;
        newDiv.innerHTML = `
            <div class="row" style="margin-left: 5px;" id="head_jaminan_${counter}">
                <div class="col-md-12 mb-2">
                    <hr>
                    <h6 style="font-weight: bold; font-style: italic; letter-spacing: 2px; color: rgb(0, 162, 255)">
                        &rarr; Data Jaminan ${counter}
                    </h6>
                    <hr>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="form-group">
                        <label for="kategori_jaminan_${counter}">Kategori Jaminan</label>
                        <select name="kategori_jaminan_${counter}" id="kategori_jaminan_${counter}" class="form-select is-invalid" required>
                            <option disabled selected>- Pilih Kategori Jaminan -</option>
                            <option value="Tanah/Bangunan">Tanah/Bangunan</option>
                            <option value="Kendaraan">Kendaraan</option>
                            <option value="Deposito">Tabungan/Deposito</option>
                        </select>
                    </div>
                </div>
            </div>
        `;

        // tanah
        newDiv.innerHTML += `
            <div class="row" style="margin-left: 5px;" id="head_tanah_${counter}">
                <div class="col-md-6 mb-4">
                    <div class="form-group">
                        <label for="type_sertifikat_${counter}">Type Sertifikat</label>
                        <select name="type_sertifikat_${counter}" id="type_sertifikat_${counter}" class="form-select is-invalid" required>
                            <option disabled selected>- Pilih Type Sertifikat -</option>
                            <option value="Sertifikat-Analog">Sertifikat-Analog</option>
                            <option value="Sertifikat-El">Sertifikat-El</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="form-group">
                        <label for="alih_media_${counter}">Alih Media</label>
                        <select name="alih_media_${counter}" id="alih_media_${counter}" class="form-select is-invalid" required>
                            <option disabled selected>- Pilih -</option>
                            <option value="Ya">Ya</option>
                            <option value="Tidak">Tidak</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="form-group">
                        <label for="jns_jaminan_opsi_${counter}">Jenis Jaminan</label>
                        <select name="jns_jaminan_opsi_${counter}" id="jns_jaminan_opsi_${counter}" class="form-select is-invalid" required>
                            <option disabled selected>- Pilih -</option>
                            <option value="SHM">SHM</option>
                            <option value="SHGB">SHGB</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                        <input type="text" name="jns_jaminan_${counter}" id="jns_jaminan_${counter}" class="form-control is-invalid" required
                            placeholder="Sebutkan Lengkap, cth: Sertifikat Hak Guna Usaha">
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="form-group">
                        <label for="no_shm_shgb_${counter}">No Sertifikat/No NIB</label>
                        <input type="text" name="no_shm_shgb_${counter}" id="no_shm_shgb_${counter}" class="form-control is-invalid" required
                            placeholder="Nomor Sertifikat" onfocusout="cariAgunan(${counter})">
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="form-group">
                        <label for="atas_nama_${counter}">Atas Nama</label>
                        <input type="text" name="atas_nama_${counter}" id="atas_nama_${counter}" class="form-control is-invalid" required
                            placeholder="Atas Nama">
                    </div>
                </div>

                ${jabatan == "Analis Cabang" ? addJaminanTanah(counter) : ""}

            </div>
        `;

        // kendaraan
        newDiv.innerHTML += `
            <div class="row" style="margin-left: 5px;" id="head_kendaraan_${counter}">
                <div class="col-md-6 mb-4">
                    <div class="form-group">
                        <label for="jns_kendaraan_${counter}">Jenis Kendaraan</label>
                        <select name="jns_kendaraan_${counter}" id="jns_kendaraan_${counter}" class="form-select is-invalid" required>
                            <option disabled selected>- Pilih -</option>
                            <option value="Sepeda Motor">Sepeda Motor</option>
                            <option value="Mobil">Mobil</option>
                            <option value="Bus">Bus</option>
                            <option value="Truck">Truck</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="form-group">
                        <label for="atas_nama_kendaraan_${counter}">Atas Nama</label>
                        <input type="text" name="atas_nama_kendaraan_${counter}" id="atas_nama_kendaraan_${counter}"
                            class="form-control is-invalid" required placeholder="Atas Nama">
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="form-group">
                        <label for="no_bpkb_${counter}">Nomor BPKB</label>
                        <input type="text" name="no_bpkb_${counter}" id="no_bpkb_${counter}" class="form-control is-invalid" required
                            placeholder="Nomor BPKB" onfocusout="cariAgunanKenda(${counter})">
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="form-group">
                        <label for="tgl_bpkb_${counter}">Tanggal BPKB</label>
                        <input type="date" name="tgl_bpkb_${counter}" id="tgl_bpkb_${counter}" class="form-control is-invalid" required
                            placeholder="Tanggal BPKB">
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="form-group">
                        <label for="merk_${counter}">Merk</label>
                        <input type="text" name="merk_${counter}" id="merk_${counter}" class="form-control is-invalid" required
                            placeholder="Merk">
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="form-group">
                        <label for="nopol_${counter}">Nomor Polisi</label>
                        <input type="text" name="nopol_${counter}" id="nopol_${counter}" class="form-control is-invalid" required
                            placeholder="Nopol">
                    </div>
                </div>

                ${jabatan == "Analis Cabang" ? addJaminanKenda(counter) : ""}

            </div>
        `;

        // deposito
        newDiv.innerHTML += `
            <div class="row" style="margin-left: 5px;" id="head_deposito_${counter}">
                <div class="col-md-6 mb-4">
                    <div class="form-group">
                        <label for="jns_jaminan_deposito_${counter}">Spesifik Tabungan/Deposito</label>
                        <select name="jns_jaminan_deposito_${counter}" id="jns_jaminan_deposito_${counter}" class="form-select is-invalid"
                            required>
                            <option disabled selected>- Pilih -</option>
                            <option value="Deposito">Deposito</option>
                            <option value="Tabungan">Tabungan</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="form-group">
                        <label for="no_rek_${counter}">Nomor Rekening</label>
                        <input type="text" name="no_rek_${counter}" id="no_rek_${counter}" class="form-control is-invalid" required
                            placeholder="Nomor Rekening">
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="form-group">
                        <label for="atas_nama_deposito_${counter}">Atas Nama</label>
                        <input type="text" name="atas_nama_deposito_${counter}" id="atas_nama_deposito_${counter}"
                            class="form-control is-invalid" required placeholder="Atas Nama">
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="form-group">
                        <label for="nominal_${counter}">Nominal</label>
                        <input type="text" name="nominal_${counter}" id="nominal_${counter}" class="form-control is-invalid" required placeholder="Nominal">
                    </div>
                </div>
            </div>
        `;

        // untuk tombol kurangi
        newDiv.innerHTML += `
            <div>
                <div class="text-center"">
                    <button class="btn btn-outline-warning w-100" id="kurangi_jaminan_${counter}" data-id="head_div_jaminan_${counter}" type="button" onclick="kurangiJaminan()">
                        <i class="fa-solid fa-circle-minus"></i> Kurangi Data Penjamin <i class="fa-solid fa-circle-minus"></i>
                    </button>
                </div>
            </div>
        `;

        container.appendChild(newDiv);

        kategoriJaminan(counter);
        jaminanOpsi(counter);
        setRupiahNominal(counter);
        setRupiahTaksasiPasar(counter);
        setSerfit(counter);
    } else {
        console.error("Maximum number of Jaminan reached.");
        alert("Maksimal Jaminan yang dapat ditambahkan adalah 100.");
    }
}

function kurangiJaminan() {
    // console.log("kurangiJaminan() called");
    // Ambil elemen tombol yang diklik
    let button = event.target;
    let idDiv = button.getAttribute("data-id");

    // Log data-id untuk memastikan nilainya benar
    // console.log("ID Div yang akan dihapus:", idDiv);

    // Hapus elemen berdasarkan data-id
    let container = document.getElementById("tambahan_jaminan");
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
            "head_div_jaminan_" + IdNextEl
        );
        // console.log(NextElement);

        // kondisi jika NextElement ada
        if (NextElement) {
            idForNew = `head_div_jaminan_${AmbilId}`; // Perbarui ID elemen
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
                        `head_div_jaminan_${AmbilId}`
                    );
                }
            });

            // Perbarui teks judul
            let titles = NextElement.querySelectorAll("h6");
            if (titles) {
                titles[0].textContent = `→ Data Jaminan ${AmbilId}`;
            }

            // fungsi llainnya
            if (document.getElementById(`kategori_jaminan_${AmbilId}`)) {
                kategoriJaminan(AmbilId);
                // console.log("kategori_jaminan_" + AmbilId);
            }
            if (document.getElementById(`jns_jaminan_opsi_${AmbilId}`)) {
                jaminanOpsi(AmbilId);
                // console.log("jns_jaminan_opsi_" + AmbilId);
            }
            if (document.getElementById(`nominal_${AmbilId}`)) {
                setRupiahNominal(AmbilId);
                // console.log("nominal_" + AmbilId);
            }
        }
    } else {
        console.error("Elemen tidak ditemukan atau tidak dapat dihapus.");
    }
}
