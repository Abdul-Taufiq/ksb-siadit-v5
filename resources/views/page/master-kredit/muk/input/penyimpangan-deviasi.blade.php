<div class="row" style="margin-left: 5px;" id="head_deviasi_1">
    {{-- <div class="col-md-12">
        <div class="head-judul">
            <h6>→ DATA 1</h6>
        </div>
        <hr>
    </div> --}}

    <input type="hidden" id="id_deviasi" name="id_deviasi" value="{{ base64_encode($muk?->deviasi?->id_deviasi) }}">

    <div class="col-md-12 mb-4">
        <table class="table table-bordered w-100">
            <tr class="table-active">
                <th colspan="2" style="text-align: center">FORM PERSETUJUAN PENYIMPANGAN</th>
            </tr>
            <tr>
                <td>No</td>
                <td>
                    <i>{{ $muk->no_muk }}</i>
                </td>
            </tr>
            <tr>
                <td>Tanggal</td>
                <td>
                    <i>{{ $muk->tgl_muk->translatedFormat('d F Y') }}</i>
                </td>
            </tr>
            <tr>
                <td>Cabang</td>
                <td>
                    <i>{{ $muk->cabang->cabang }}</i>
                </td>
            </tr>
            <tr>
                <td class="table-active">Perihal</td>
                <td>
                    <textarea name="perihal" id="perihal" cols="30" rows="10">{!! $muk->deviasi?->perihal ?? null !!}</textarea>
                </td>
            </tr>
        </table>
    </div>

    <div class="col-md-12">
        Kami mengajukan penyimpangan atas Debitur sebagai berikut

        <table class="table table-bordered w-100">
            <tr class="table-active">
                <th>No</th>
                <th>Nama</th>
                <th>Plafond</th>
                <th>Jangka Waktu</th>
                <th>Jenis Pinjaman</th>
                <th>Agunan</th>
            </tr>
            <tr>
                <td colspan="6" style="text-align: center">
                    <i>Data Ini Otomatis Diisi Oleh Sistem</i>
                </td>
            </tr>
        </table>
    </div>

    {{-- <div class="col-md-12 mb-4">
        <div class="form-group">
            <label for="jns_penyimpangan">Jenis Penyimpangan</label>
            <textarea name="jns_penyimpangan" id="jns_penyimpangan" cols="30" rows="10"></textarea>
        </div>
    </div> --}}
    <div class="col-md-12 mb-4">
        <div class="form-group">
            <label for="ketentuan_berlaku">Ketentuan Yang Berlaku</label>
            <textarea name="ketentuan_berlaku" id="ketentuan_berlaku">{!! $muk->deviasi?->ketentuan_berlaku ?? null !!}</textarea>
        </div>
    </div>
    <div class="col-md-12 mb-4">
        <div class="form-group">
            <label for="penyimpangan_diajukan">Penyimpangan Yang Diajukan</label>
            <textarea name="penyimpangan_diajukan" id="penyimpangan_diajukan">{!! $muk->deviasi?->penyimpangan_diajukan ?? null !!}</textarea>
        </div>
    </div>
    <div class="col-md-12 mb-4">
        <div class="form-group">
            <label for="pertimbangan">Pertimbangan</label>
            <textarea name="pertimbangan" id="pertimbangan">{!! $muk->deviasi?->pertimbangan ?? null !!}</textarea>
        </div>
    </div>
</div>

{{-- tambahan --}}
{{-- <div id="tambahan_deviasi"></div>
<div class="text-center">
    <button class="btn btn-outline-primary w-100" id="tambah_deviasi" type="button" onclick="tambahDeviasi()">
        <i class="fa-solid fa-circle-plus"></i> Tambah Data <i class="fa-solid fa-circle-plus"></i>
    </button>
</div> --}}
