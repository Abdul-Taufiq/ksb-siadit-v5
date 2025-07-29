{{-- membuat urutan --}}
@php
    $counter = 1;
@endphp

{{-- Tanah --}}
@foreach ($jam_tanah as $tanah)
    {{-- head jaminan 1 --}}
    <div class="row" style="margin-left: 5px;" id="head_jaminan_{{ $counter }}">
        <div class="col-md-12 mb-4">
            <hr>
            <h6 style="font-weight: bold; font-style: italic; letter-spacing: 2px; color: rgb(0, 162, 255)">
                &rarr; Data Jaminan {{ $counter }}

                <input type="hidden" id="id_tanah_{{ $counter }}" name="id_tanah_{{ $counter }}"
                    value="{{ base64_encode($tanah->id_jaminan_pertanahan) }}">
            </h6>
            <hr>
        </div>
        <div class="col-md-6">
            <table class="table table-sm table-striped w-100">
                <tr>
                    <th style="width: 35%">Type Sertifikat</th>
                    <td style="width: 1%;">:</td>
                    <td>{{ $tanah->type_sertifikat }}</td>
                </tr>
                <tr>
                    <th style="width: 35%">Alih Media</th>
                    <td style="width: 1%;">:</td>
                    <td>{{ $tanah->alih_media }}</td>
                </tr>
                <tr>
                    <th style="width: 35%">Nomor Sertifikat</th>
                    <td style="width: 1%;">:</td>
                    <td>{{ $tanah->no_shm_shgb }}</td>
                </tr>
            </table>
        </div>
        <div class="col-md-6">
            <table class="table table-sm table-striped w-100">
                <tr>
                    <th style="width: 35%">Jenis Jaminan</th>
                    <td style="width: 1%;">:</td>
                    <td>{{ $tanah->jns_jaminan }}</td>
                </tr>
                <tr>
                    <th style="width: 35%">Nomor Sertifikat</th>
                    <td style="width: 1%;">:</td>
                    <td>{{ $tanah->no_shm_shgb }}</td>
                </tr>
                <tr>
                    <th style="width: 35%">Atas Nama</th>
                    <td style="width: 1%;">:</td>
                    <td>{{ $tanah->atas_nama }}</td>
                </tr>
            </table>
        </div>
    </div>

    <div class="row" style="margin-left: 5px;" id="head_tanah_{{ $counter }}">
        @if ($kredit->kategori_spk != 'SPK')
            <div class="col-md-6 mb-4">
                <div class="form-group">
                    <label for="kategori_pengikatan_{{ $counter }}">Kategori
                        Pengikatan</label>
                    <select class="form-select" name="kategori_pengikatan_{{ $counter }}"
                        id="kategori_pengikatan_{{ $counter }}" required>
                        <option disabled selected>
                            - Pilih Kategori Perikatan -
                        </option>
                        <option {{ $tanah->kategori_pengikatan == 'Sudah dibebani HT' ? 'selected' : '' }}
                            value="Sudah dibebani HT">
                            Sudah dibebani HT
                        </option>
                        <option {{ $tanah->kategori_pengikatan == 'Belum' ? 'selected' : '' }} value="Belum">Belum
                        </option>
                    </select>
                </div>
            </div>

            <div class="col-md-6 mb-4" id="head_no_akta_perikatan_{{ $counter }}">
                <div class="form-group">
                    <label for="no_akta_perikatan_{{ $counter }}">Nomor
                        Akta Perikatan : </label>
                    <input class="form-control" name="no_akta_perikatan_{{ $counter }}"
                        id="no_akta_perikatan_{{ $counter }}" required placeholder="Nomor Akta"
                        value="{{ $tanah->no_akta_perikatan }}">
                </div>
            </div>
            <div class="col-md-6 mb-4" id="head_tgl_akta_perikatan_{{ $counter }}">
                <div class="form-group">
                    <label for="tgl_akta_perikatan_{{ $counter }}">Tanggal Akta Perikatan : </label>
                    <input type="date" class="form-control" name="tgl_akta_perikatan_{{ $counter }}"
                        id="tgl_akta_perikatan_{{ $counter }}" required placeholder="Nomor Akta"
                        value="{{ $tanah->tgl_akta_perikatan?->format('Y-m-d') }}">
                </div>
            </div>
        @endif


        <div class="col-md-6 mb-4">
            <div class="form-group">
                <label for="jns_perikatan_{{ $counter }}">Jenis Perikatan</label>
                <select name="jns_perikatan_{{ $counter }}" id="jns_perikatan_{{ $counter }}"
                    class="form-select is-invalid" required>
                    <option disabled selected>- Pilih Jenis Perikatan -</option>
                    <option {{ $tanah->jns_perikatan == 'APHT' ? 'selected' : '' }} value="APHT">APHT</option>
                    <option {{ $tanah->jns_perikatan == 'SKMHT' ? 'selected' : '' }} value="SKMHT">
                        SKMHT</option>
                </select>
            </div>
        </div>
        <div class="col-md-6 mb-4" id="head_no_peringkat_perikatan_{{ $counter }}">
            <div class="form-group">
                <label for="no_peringkat_perikatan_{{ $counter }}">Nomor Peringkat Perikatan</label>
                <input type="text" name="no_peringkat_perikatan_{{ $counter }}"
                    id="no_peringkat_perikatan_{{ $counter }}" class="form-control is-invalid" required
                    placeholder="Nomor Peringkat Perikatan" value="{{ $tanah->no_peringkat_perikatan }}">
            </div>
        </div>
    </div>
    @php $counter++; @endphp
@endforeach

{{-- Kendaraan --}}
@foreach ($jam_kenda as $kenda)
    {{-- head jaminan 1 --}}
    <div class="row" style="margin-left: 5px;" id="head_jaminan_{{ $counter }}">
        <div class="col-md-12 mb-4">
            <hr>
            <h6 style="font-weight: bold; font-style: italic; letter-spacing: 2px; color: rgb(0, 162, 255)">
                &rarr; Data Jaminan {{ $counter }}

                <input type="hidden" id="id_kenda_{{ $counter }}" name="id_kenda_{{ $counter }}"
                    value="{{ base64_encode($kenda->id_jaminan_kendaraan) }}">
            </h6>
            <hr>
        </div>
        <div class="col-md-6">
            <table class="table table-sm table-striped w-100">
                <tr>
                    <th style="width: 35%">Jenis Kendaraan</th>
                    <td style="width: 1%;">:</td>
                    <td>{{ $kenda->jns_kendaraan }}</td>
                </tr>
                <tr>
                    <th style="width: 35%">Merk/Type</th>
                    <td style="width: 1%;">:</td>
                    <td>{{ $kenda->merk }}/{{ $kenda->type }}</td>
                </tr>
                <tr>
                    <th style="width: 35%">Nomor Rangka</th>
                    <td style="width: 1%;">:</td>
                    <td>{{ $kenda->no_rangka }}</td>
                </tr>
            </table>
        </div>
        <div class="col-md-6">
            <table class="table table-sm table-striped w-100">
                <tr>
                    <th style="width: 35%">Nomor Mesin</th>
                    <td style="width: 1%;">:</td>
                    <td>{{ $kenda->no_mesin }}</td>
                </tr>
                <tr>
                    <th style="width: 35%">Nomor Polisi</th>
                    <td style="width: 1%;">:</td>
                    <td>{{ $kenda->nopol }}</td>
                </tr>
                <tr>
                    <th style="width: 35%">Atas Nama</th>
                    <td style="width: 1%;">:</td>
                    <td>{{ $kenda->atas_nama }}</td>
                </tr>
            </table>
        </div>
    </div>

    <div class="row" style="margin-left: 5px;" id="head_kendaraan_{{ $counter }}">
        <div class="col-md-6 mb-4">
            <div class="form-group">
                <label for="jns_fidusia_{{ $counter }}">Jenis Perikatan Fidusia</label>
                <select name="jns_fidusia_{{ $counter }}" id="jns_fidusia_{{ $counter }}"
                    class="form-select is-invalid" required>
                    <option disabled selected>- Pilih -</option>
                    <option {{ $kenda->jns_fidusia == 'APJF' ? 'selected' : '' }} value="APJF">
                        APJF (Akta Pemberian Jaminan Fidusia)
                    </option>
                    <option {{ $kenda->jns_fidusia == 'Bawah Tangan' ? 'selected' : '' }} value="Bawah Tangan">Bawah
                        Tangan</option>
                </select>
            </div>
        </div>
        <div class="col-md-6 mb-4" id="head_fidusia_{{ $counter }}">
            <div class="form-group">
                <label for="tgl_akta_fidusia_{{ $counter }}">Tanggal Akta Fidusia</label>
                <input type="date" name="tgl_akta_fidusia_{{ $counter }}"
                    id="tgl_akta_fidusia_{{ $counter }}" class="form-control is-invalid" required
                    placeholder="Tanggal BPKB" value="{{ $kenda->tgl_akta_fidusia?->format('Y-m-d') }}">
            </div>
        </div>
    </div>
    @php $counter++; @endphp
@endforeach

{{-- Deposito --}}
@foreach ($jam_depo as $depo)
    {{-- head jaminan 1 --}}
    <div class="row" style="margin-left: 5px;" id="head_jaminan_{{ $counter }}">
        <div class="col-md-12 mb-2">
            <hr>
            <h6 style="font-weight: bold; font-style: italic; letter-spacing: 2px; color: rgb(0, 162, 255)">
                &rarr; Data Jaminan {{ $counter }}

                <input type="hidden" id="id_depo_{{ $counter }}" name="id_depo_{{ $counter }}"
                    value="{{ base64_encode($depo->id_jaminan_deposito) }}">
            </h6>
            <hr>
        </div>
        <div class="col-md-6 ">
            <table class="table table-striped table-sm w-100">
                <tr>
                    <th>Atas Nama</th>
                    <td>: {{ $depo->atas_nama }}</td>
                </tr>
                <tr>
                    <th>Jenis Jaminan</th>
                    <td>: {{ $depo->jns_jaminan }}</td>
                </tr>
                <tr>
                    <th>Nomor {{ $depo->jns_jaminan == 'Deposito' ? 'Bilyet' : 'Rekening' }}</th>
                    <td>: {{ $depo->no_rek }}</td>
                </tr>
            </table>
        </div>
        <div class="col-md-6">
            <table class="table table-striped table-sm w-100">
                <tr>
                    <th> {{ $depo->jns_jaminan == 'Deposito' ? 'Nominal' : 'Saldo Tabungan' }}</th>
                    <td>:
                        {{ $depo->nominal ? 'Rp ' . number_format($depo->nominal, 0, ',', '.') : 'belum ada data' }}
                    </td>
                </tr>
                <tr>
                    <th>Nilai Jaminan</th>
                    <td>: {{ 'Rp' . number_format($depo?->nilai_jaminan, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <th>Nilai Taksasi</th>
                    <td>: {{ 'Rp' . number_format($depo?->nilai_taksasi, 0, ',', '.') }}</td>
                </tr>
            </table>
        </div>
    </div>
    @php $counter++; @endphp
@endforeach

{{-- Non Jaminan --}}
@if ($jam_tanah->IsNotEmpty() || $jam_kenda->IsNotEmpty() || $jam_depo->IsNotEmpty() || $pikar == null)
    <div class="row d-none" id="head_non_jaminan">
        <div class="col-md-12">
            <h1 style="color: red; font-style: italic; text-align: center; font-weight: bold;">
                PIKAR (NON JAMINAN) TIDAK MEMERLUKAN JAMINAN</h1>
        </div>
    </div>
@else
    <div class="row" id="head_non_jaminan">
        <div class="col-md-12">
            <h1 style="color: red; font-style: italic; text-align: center; font-weight: bold;">
                PIKAR (NON JAMINAN) TIDAK MEMERLUKAN JAMINAN</h1>
        </div>
    </div>
@endif
