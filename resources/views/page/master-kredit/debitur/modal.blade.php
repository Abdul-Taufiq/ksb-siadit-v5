{{-- Modal Search NIK Debitur --}}
<div class="modal" id="search-modal">
    <div class="modal-content" style="overflow-y: auto; max-height: 700px;">
        <div class="modal-header" style="background-color: rgba(255, 0, 0, 0.842); color: white">
            <h5 class="modal-title" id="exampleModalLabel">Data dengan NIK tersebut telah tersedia!</h5>
        </div>
        <div class="modal-content" style="overflow-x:auto;">
            <table class="table" style="font-size: 10pt;">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>NIK Pasangan</th>
                        <th>Nama Pasangan</th>
                        <th>No SPK</th>
                        <th>Status Akhir</th>
                        <th>Tgl Pengajuan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="search-modal-content"></tbody>
            </table>
        </div>
        <div class="modal-footer" style="background-color: rgba(255, 0, 0, 0.842)">
            <button class="btn btn-secondary" onclick="closeWin()">Close</button>
        </div>
    </div>
</div>


{{-- modal detail --}}
<div class="modal fade" id="myModalDoc" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalHeader" style="letter-spacing: 2px; font-weight: bold;">
                    DETAIL DATA
                </h5>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <iframe id="frameDetail" type="" width="100%" height="400px"></iframe>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


{{-- Modal search Agunan --}}
<div class="modal" id="search-agunan">
    <div class="modal-content">
        <div class="modal-header" style="background-color: yellow; color: black;">
            <h5 class="modal-title" id="exampleModalLabel">Data Agunan Sudah Pernah terdaftar?</h5>
        </div>
        <div class="modal-content" style="overflow-x:auto;">
            <table class="table" style="font-size: 11pt;">
                <thead>
                    <th>#</th>
                    {{-- jaminan --}}
                    <th>Pemilik Agunan</th>
                    <th>Jenis Agunan</th>
                    <th>Nomor Agunan</th>
                    <th>Keterangan Agunan</th>
                    {{-- debitur --}}
                    <th>NIK</th>
                    <th>Nama Debitur</th>
                    {{-- kredit --}}
                    <th>No SPK</th>
                    <th>Status Akhir</th>
                    <th>Tgl Pengajuan</th>
                    <th>Aksi</th>
                </thead>
                <tbody id="search-agunan-content">
                </tbody>
            </table>
        </div>
        <div class="modal-footer" style="background-color: yellow;">
            <button class="btn btn-secondary" onclick="closeAgunan()">Cancel</button>
        </div>
    </div>
</div>


{{-- modal detail --}}
<div class="modal" id="ShowAgunanDetail" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalHeader" style="letter-spacing: 2px; font-weight: bold;">
                    DETAIL DATA
                </h5>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <iframe id="frameDetailAgunan" type="" width="100%" height="400px"></iframe>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal"
                    onclick="closeDetail()">Kembali</button>
            </div>
        </div>
    </div>
</div>
