@foreach ($jam_tanah as $tanah)
    <div style="border: 1px solid black; padding: 20px;" class="mb-3">
        <h6>{{ $loop->iteration }}. &nbsp;&nbsp; <i class="fa-solid fa-circle-right"></i> &nbsp;&nbsp;
            <span data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip"
                data-bs-title="Jenis Jaminan">{{ $tanah->jns_jaminan }}</span> |
            <span data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip"
                data-bs-title="Nomor">{{ $tanah->no_shm_shgb }}</span> |
            <span data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip"
                data-bs-title="Kategori Jaminan">{{ $tanah->detail_kategori_jaminan }}</span>
        </h6>
        <br>

        {{-- Penilain --}}
        <div class="row" style="margin-left: 5px;">
            <div class="col-md-12 bg-success text-white p-2 mb-4">
                <h6 style="text-align: center; letter-spacing: 2px;">PENILAIAN AGUNAN</h6>
            </div>

            {{-- id --}}
            <input type="hidden" name="id_jaminan_pertanahan_{{ $loop->iteration }}"
                value="{{ base64_encode($tanah->id_jaminan_pertanahan) }}">
            {{-- id --}}
            <input type="hidden" name="id_sc_agunan_{{ $loop->iteration }}"
                value="{{ base64_encode($tanah->sc_tanah_agunan?->id_sc_agunan) }}">

            @include('page.master-kredit.muk.input.scoring.scoring-agunan-tanah-core')
        </div>

        {{-- Scoring --}}
        <div class="row" style="margin-left: 5px;">
            <div class="col-md-12 bg-success text-white p-2 mb-4">
                <h6 style="text-align: center; letter-spacing: 2px;">I. SCORING</h6>
            </div>

            {{-- id --}}
            <input type="hidden" name="id_sc_scoring_{{ $loop->iteration }}"
                value="{{ base64_encode($tanah->sc_tanah_scoring?->id_sc_scoring) }}">

            @include('page.master-kredit.muk.input.scoring.scoring-agunan-tanah-skor')
        </div>


        {{-- Perhitungan --}}
        <div class="row" style="margin-left: 5px;">
            <div class="col-md-12 bg-success text-white p-2 mb-4">
                <h6 style="text-align: center; letter-spacing: 2px;">II. PERHITUNGAN NILAI AGUNAN</h6>
            </div>

            @include('page.master-kredit.muk.input.scoring.scoring-agunan-tanah-perhitungan')
        </div>

        {{-- Kesimpulan --}}
        <div class="row" style="margin-left: 5px;">
            <div class="col-md-12 bg-success text-white p-2 mb-4">
                <h6 style="text-align: center; letter-spacing: 2px;">III. KESIMPULAN</h6>
            </div>

            @include('page.master-kredit.muk.input.scoring.scoring-agunan-tanah-kesimpulan')
        </div>


    </div>
@endforeach


@foreach ($jam_kenda as $kenda)
    <div style="border: 1px solid rgb(0, 30, 255); padding: 20px;" class="mb-3">
        <h6>{{ $loop->iteration }}. &nbsp;&nbsp; <i class="fa-solid fa-circle-right"></i> &nbsp;&nbsp;
            <span data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip"
                data-bs-title="Jenis Jaminan">{{ $kenda->jns_kendaraan }}</span> |
            <span data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip"
                data-bs-title="Merk">{{ $kenda->merk }}</span> |
            <span data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip"
                data-bs-title="Nomor">{{ $kenda->no_bpkb }}</span>
        </h6>
        <br>

        {{-- Penilain --}}
        <div class="row" style="margin-left: 5px;">
            <div class="col-md-12 bg-success text-white p-2 mb-4">
                <h6 style="text-align: center; letter-spacing: 2px;">I. PENELITIAN FISIK</h6>
            </div>

            {{-- id --}}
            <input type="hidden" name="id_jaminan_kendaraan_{{ $loop->iteration }}"
                value="{{ base64_encode($kenda->id_jaminan_kendaraan) }}">
            {{-- id --}}
            <input type="hidden" name="id_sc_kendaraan_{{ $loop->iteration }}"
                value="{{ base64_encode($kenda->sc_kenda_agunan?->id_sc_kendaraan) }}">

            @include('page.master-kredit.muk.input.scoring.scoring-agunan-kendaraan')
        </div>

        {{-- Penelitian Yuridis --}}
        <div class="row" style="margin-left: 5px;">
            <div class="col-md-12 bg-success text-white p-2 mb-4">
                <h6 style="text-align: center; letter-spacing: 2px;">II. PENELITIAN YURIDIS</h6>
            </div>

            @include('page.master-kredit.muk.input.scoring.scoring-agunan-kendaraan-ii')
        </div>

        {{-- Perhitungan Nilai pasar --}}
        <div class="row" style="margin-left: 5px;">
            <div class="col-md-12 bg-success text-white p-2 mb-4">
                <h6 style="text-align: center; letter-spacing: 2px;">III. PERHITUNGAN NILAI PASAR SETELAH SAFETY MARGIN
                </h6>
            </div>

            @include('page.master-kredit.muk.input.scoring.scoring-agunan-kendaraan-iii')
        </div>

        {{-- Kesimpulan --}}
        <div class="row" style="margin-left: 5px;">
            <div class="col-md-12 bg-success text-white p-2 mb-4">
                <h6 style="text-align: center; letter-spacing: 2px;">IV. KESIMPULAN
                </h6>
            </div>

            @include('page.master-kredit.muk.input.scoring.scoring-agunan-kendaraan-iv')
        </div>
    </div>
@endforeach


{{-- Deposito dan Tabungan --}}
@foreach ($jam_depo as $depo)
    <div style="border: 1px solid rgb(238, 0, 255); padding: 20px;" class="mb-3">
        <h6>{{ $loop->iteration }}. &nbsp;&nbsp; <i class="fa-solid fa-circle-right"></i> &nbsp;&nbsp;
            <span data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip"
                data-bs-title="Jenis Jaminan">{{ $depo->jns_jaminan }}</span> |
            <span data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip"
                data-bs-title="Nomor">{{ $depo->no_rek }}</span> |
            <span data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip"
                data-bs-title="Atas Nama">{{ $depo->atas_nama }}</span>
        </h6>
        <br>

        {{-- Penilain --}}
        <div class="row" style="margin-left: 5px;">
            <div class="col-md-12 bg-success text-white p-2 mb-4">
                <h6 style="text-align: center; letter-spacing: 2px;">I. PENELITIAN FISIK</h6>
            </div>

            {{-- id --}}
            <input type="hidden" name="id_jaminan_deposito_{{ $loop->iteration }}"
                value="{{ base64_encode($depo->id_jaminan_deposito) }}">
            {{-- id --}}
            <input type="hidden" name="id_sc_depo_tab_{{ $loop->iteration }}"
                value="{{ base64_encode($depo->sc_depo?->id_sc_deposito ?? $depo->sc_tabungan?->id_sc_tabungan) }}">

            @if ($depo->jns_jaminan == 'Tabungan')
                @include('page.master-kredit.muk.input.scoring.scoring-agunan-tabungan')
            @else
                @include('page.master-kredit.muk.input.scoring.scoring-agunan-deposito')
            @endif
        </div>

        {{-- PERHITUNGAN NILAI PASAR SETELAH SAFETY MARGIN --}}
        <div class="row" style="margin-left: 5px;">
            <div class="col-md-12 bg-success text-white p-2 mb-4">
                <h6 style="text-align: center; letter-spacing: 2px;">II. PERHITUNGAN NILAI PASAR SETELAH SAFETY MARGIN
                </h6>
            </div>

            @include('page.master-kredit.muk.input.scoring.scoring-agunan-deposito-ii')
        </div>

        {{-- KESIMPULAN --}}
        <div class="row" style="margin-left: 5px;">
            <div class="col-md-12 bg-success text-white p-2 mb-4">
                <h6 style="text-align: center; letter-spacing: 2px;">III. KESIMPULAN
                </h6>
            </div>

            @include('page.master-kredit.muk.input.scoring.scoring-agunan-deposito-iii')
        </div>
    </div>
@endforeach
