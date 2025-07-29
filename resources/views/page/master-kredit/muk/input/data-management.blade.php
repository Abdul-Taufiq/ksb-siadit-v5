<input type="hidden" name="id_data" id="id_data" value="{{ base64_encode($muk?->data?->id_data) }}">

<div class="row" style="margin-left: 5px;">
    <div class="col-md-12 mb-4">
        <div class="form-group">
            <div class="d-flex justify-content-between">
                <label for="tujuan_pinjaman">Tujuan Pinjaman</label>
                <label for="tujuan_pinjaman" data-bs-toggle="tooltip" data-bs-placement="top"
                    data-bs-custom-class="custom-tooltip"
                    data-bs-title=" Diisi dengan : <br>
                        - Keterangan dari sumber pengembalian pokok dan bunga di akhir periode pinjaman. <br>
                        - Jenis usaha, apabila diisi dengan usaha lainnya. <br>
                        - Diisi dengan penjelasan mengenai usaha lainnya. ">
                    <i class="fa-solid fa-circle-question"></i>
                </label>
            </div>
            <textarea name="tujuan_pinjaman" id="tujuan_pinjaman">{!! $muk?->data?->tujuan_pinjaman ?? null !!}</textarea>
        </div>
    </div>
    <div class="col-md-12 mb-4">
        <div class="form-group">
            <div class="d-flex justify-content-between">
                <label for="pengalaman_usaha">Pengalaman Usaha</label>
                <label for="pengalaman_usaha" data-bs-toggle="tooltip" data-bs-placement="top"
                    data-bs-custom-class="custom-tooltip"
                    data-bs-title=" Diisi dengan : <br>
                        1. Diisi dengan lengkap Tujuan Debitur <br>
                        2. di isi dengan bukti-bukti lampirannya">
                    <i class="fa-solid fa-circle-question"></i>
                </label>
            </div>
            <textarea name="pengalaman_usaha" id="pengalaman_usaha">{!! $muk?->data?->pengalaman_usaha ?? null !!}</textarea>
        </div>
    </div>
    <div class="col-md-12 mb-4">
        <div class="form-group">
            <div class="d-flex justify-content-between">
                <label for="reputasi_lokal">Reputasi Lokal</label>
                <label for="reputasi_lokal" data-bs-toggle="tooltip" data-bs-placement="top"
                    data-bs-custom-class="custom-tooltip"
                    data-bs-title=" Diisi dengan : <br>
                        1. Sejarah usaha debitur. <br>
                        2. Pengalaman usaha / pekerjaan debitur sebelum memulai usaha yang ditekuni sekarang. <br>
                        3. Jumlah karyawan yang dimiliki (kalau ada). <br>
                        4. Model Usaha yang dijalankan oleh debitur.
                        ">
                    <i class="fa-solid fa-circle-question"></i>
                </label>
            </div>
            <textarea name="reputasi_lokal" id="reputasi_lokal">{!! $muk?->data?->reputasi_lokal ?? null !!}</textarea>
        </div>
    </div>
    <div class="col-md-12 mb-4">
        <div class="form-group">
            <div class="d-flex justify-content-between">
                <label for="hubungan_bank">Hubungan Dengan Bank</label>
                <label for="hubungan_bank" data-bs-toggle="tooltip" data-bs-placement="top"
                    data-bs-custom-class="custom-tooltip"
                    data-bs-title=" Diisi dengan : <br>
                        1. Gambaran Hasil SLIK debitur. <br>
                        2. Hasil SLIK pasangan debitur. <br>
                        3. Penjelasan singkat penyebab Kol selain Kol 1.
                        ">
                    <i class="fa-solid fa-circle-question"></i>
                </label>
            </div>
            <textarea name="hubungan_bank" id="hubungan_bank">{!! $muk?->data?->hubungan_bank ?? null !!}</textarea>
        </div>
    </div>
</div>
