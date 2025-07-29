let counter = 1;
let maxCounter = 200;

function tambahSlik() {
    let container = document.getElementById("tambahan_slik");
    let inputElements = document.querySelectorAll('div[id^="head_slik_"]');
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
        newDiv.id = `head_div_slik_${counter}`;
        newDiv.innerHTML = `
            <div class="row" style="margin-left: 5px;" id="head_slik_${counter}">
                <div class="col-md-12">
                    <hr>
                    <div class="head-judul"><h6>→ DATA ${counter}</h6></div>
                    <hr>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="nama_bank_${counter}">Nama Bank</label>
                        <input type="text" name="nama_bank_${counter}" id="nama_bank_${counter}"
                            class="form-control is-invalid" placeholder="Nama Bank" required>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="tujuan_kredit_${counter}">Tujuan Kredit</label>
                        <select name="tujuan_kredit_${counter}" id="tujuan_kredit_${counter}"
                            class="form-select is-invalid" required>
                            <option disabled selected>- Pilih Tujuan Kredit -</option>
                            <option value="Modal Kerja">Modal Kerja</option>
                            <option value="Investasi">Investasi</option>
                            <option value="Konsumsi">Konsumsi</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="plafond_${counter}" class="req">Plafond</label>
                        <div class="input-group">
                            <span class="input-group-text">Rp.</span>
                            <input type="text" class="form-control is-invalid" placeholder="Plafond" id="plafond_${counter}"
                                name="plafond_${counter}" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="baki_debet_${counter}" class="req">Baki Debet</label>
                        <div class="input-group">
                            <span class="input-group-text">Rp.</span>
                            <input type="text" class="form-control is-invalid" placeholder="Baki Debet" id="baki_debet_${counter}"
                                name="baki_debet_${counter}" required    data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-custom-class="custom-tooltip"
                                data-bs-title="Mohon Update Nilai Ini Jika Anda mengubah Tujuan Kredit diatas Agar nilai bisa SINKRON">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="rate_${counter}">Rate</label>
                        <input type="text" name="rate_${counter}" id="rate_${counter}"
                            class="form-control is-invalid" placeholder="Rate" required
                            min="0">
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="angsuran_${counter}" class="req">Angsuran</label>
                        <div class="input-group">
                            <span class="input-group-text">Rp.</span>
                            <input type="text" class="form-control is-invalid" placeholder="Angsuran" id="angsuran_${counter}"
                                name="angsuran_${counter}" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="kol_${counter}">Kol</label>
                        <select name="kol_${counter}" id="kol_${counter}" class="form-select is-invalid" required>
                            <option disabled selected>- Pilih Kol -</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="dpd_${counter}">DPD (Jumlah Hari Tunggakan)</label>
                        <input type="text" name="dpd_${counter}" id="dpd_${counter}"
                            class="form-control is-invalid" placeholder="DPD" required>
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="form-group">
                        <label for="tgl_awal_slik_${counter}">Tgl Awal</label>
                        <input type="date" name="tgl_awal_slik_${counter}" id="tgl_awal_slik_${counter}" class="form-control is-invalid" required>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="form-group">
                        <label for="tgl_akhir_slik_${counter}">Tgl Akhir</label>
                        <input type="date" name="tgl_akhir_slik_${counter}" id="tgl_akhir_slik_${counter}" class="form-control is-invalid"
                            required>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="form-group">
                        <label for="pernah_restruck_${counter}">Pernah di Restrcuk</label>
                        <select name="pernah_restruck_${counter}" id="pernah_restruck_${counter}" class="form-select is-invalid" required>
                            <option disabled selected>- Pilih Kol -</option>
                            <option value="YA">YA</option>
                            <option value="TIDAK">TIDAK</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="form-group">
                        <label for="alasan_restruck_${counter}">Alasan di Restrcuk</label>
                        <input type="text" name="alasan_restruck_${counter}" id="alasan_restruck_${counter}" class="form-control is-invalid"
                            placeholder="jika tidak ada isi (-)" required>
                    </div>
                </div>
            </div>
            
        `;

        // untuk tombol kurangi
        newDiv.innerHTML += `
            <div>
                <div class="text-center"">
                    <button class="btn btn-outline-warning w-100" id="kurangi_slik_${counter}" data-id="head_div_slik_${counter}" type="button" onclick="kurangiSlik()">
                        <i class="fa-solid fa-circle-minus"></i> Kurangi Data <i class="fa-solid fa-circle-minus"></i>
                    </button>
                </div>
            </div>
        `;

        container.appendChild(newDiv);

        // Inisialisasi tooltip untuk elemen baru
        const tooltipTrigger = newDiv.querySelector(
            '[data-bs-toggle="tooltip"]'
        );
        if (tooltipTrigger) {
            new bootstrap.Tooltip(tooltipTrigger);
        }

        setRupiah(counter);
        // kategoriJaminan(counter);
        // jaminanOpsi(counter);
        // setRupiahNominal(counter);
        // setRupiahTaksasiPasar(counter);
        // setSerfit(counter);
    } else {
        console.error("Maximum number of SLIK reached.");
        alert("Maksimal SLIK yang dapat ditambahkan adalah 100.");
    }
}

function kurangiSlik() {
    // console.log("kurangiJaminan() called");
    // Ambil elemen tombol yang diklik
    let button = event.target;
    let idDiv = button.getAttribute("data-id");

    // Log data-id untuk memastikan nilainya benar
    console.log("ID Div yang akan dihapus:", idDiv);

    // Hapus elemen berdasarkan data-id
    let container = document.getElementById("tambahan_slik");
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
        let NextElement = document.getElementById("head_div_slik_" + IdNextEl);
        // console.log(NextElement);

        // kondisi jika NextElement ada
        if (NextElement) {
            idForNew = `head_div_slik_${AmbilId}`; // Perbarui ID elemen
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
                    element.setAttribute("data-id", `head_div_slik_${AmbilId}`);
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
