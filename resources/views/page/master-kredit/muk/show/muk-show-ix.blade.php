<table class="table table-bordered w-100 table-sm">
    <tr>
        <th class="table-active" colspan="2" style="text-align: center">FORM PERSETUJUAN PENYIMPANGAN</th>
    </tr>
    <tr>
        <td style="width: 20%">No</td>
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
            {!! $muk->deviasi->perihal !!}
        </td>
    </tr>
</table>

<p class="mb-2" style="font-size: {{ strpos(url()->current(), 'print') !== false ? '8pt' : '9pt' }}">
    Kami mengajukan penyimpangan atas Debitur sebagai berikut
</p>

<table class="table table-bordered w-100">
    <tr>
        <th class="table-active" style="width: 3%">#</th>
        <th class="table-active" style="width: 18%">Nama</th>
        <th class="table-active" style="width: 15%">Plafond</th>
        <th class="table-active" style="width: 14%">Jangka Waktu</th>
        <th class="table-active" style="width: 14%">Jenis Pinjaman</th>
        <th class="table-active">Agunan</th>
    </tr>
    <tr>
        <td>1.</td>
        <td>
            {{ $muk->kredit->debitur->nama_debitur }}
        </td>
        <td>
            {{ 'Rp' . number_format($muk->kredit->jumlah_disetujui, 0, ',', '.') }}
        </td>
        <td>{{ $muk->kredit->jkw }} Bulan</td>
        <td>{{ $muk->jns_kredit_muk }}</td>
        <td>
            {{-- Jam Tanah --}}
            <table class="table table-sm w-100 table-borderless">
                <thead>
                    <tr>
                        <th style="width: 10%">#</th>
                        <th style="width: 50%">Jenis Agunan</th>
                        <th style="width: 40%">Nomor Agunan</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($jamTanah as $tanah)
                        <tr>
                            <td>
                                {{ $i }}
                                @php $i++; @endphp
                            </td>
                            <td>{{ $tanah->detail_kategori_jaminan }}</td>
                            <td>{{ $tanah->no_shm_shgb }}</td>
                        </tr>
                    @endforeach

                    {{-- jam Kenda --}}
                    @foreach ($jamKenda as $kenda)
                        <tr>
                            <td>
                                {{ $i }}
                                @php $i++; @endphp
                            </td>
                            <td>Fidusia</td>
                            <td>{{ $kenda->no_bpkb }}</td>
                        </tr>
                    @endforeach

                    {{-- jam Depo --}}
                    @foreach ($jamDepo as $depo)
                        <tr>
                            <td>
                                {{ $i }}
                                @php $i++; @endphp
                            </td>
                            <td>{{ $depo->jns_jaminan }}</td>
                            <td>{{ $depo->no_rek }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </td>
    </tr>
</table>

<div class="mb-2">
    <strong>Ketentuan Yang Berlaku</strong>
    <div style="font-size: {{ strpos(url()->current(), 'print') !== false ? '8pt' : '9pt' }}">
        {!! $muk->deviasi->ketentuan_berlaku !!}
    </div>
</div>

<div class="mb-2">
    <strong>Penyimpangan Yang Diajukan</strong>
    <div style="font-size: {{ strpos(url()->current(), 'print') !== false ? '8pt' : '9pt' }}">
        {!! $muk->deviasi->penyimpangan_diajukan !!}
    </div>
</div>

<div class="mb-2">
    <strong>Pertimbangan</strong>
    <div style="font-size: {{ strpos(url()->current(), 'print') !== false ? '8pt' : '9pt' }}">
        {!! $muk->deviasi->pertimbangan !!}
    </div>
</div>

<div class="mb-2">
    <table class="table table-bordered table-sm w-100">
        <tr>
            <th colspan="2" class="table-active">Kantor Cabang</th>
        </tr>
        <tr>
            <td><br><br><br><br></td>
            <td><br><br><br><br></td>
        </tr>
        <tr>
            <td style="text-align: center; width: 50%">
                <strong>
                    {{ $muk->id_cabang == '1' ? 'Kepala Kantor' : 'Pimpinan Cabang' }}
                </strong>
            </td>
            <td style="text-align: center; width: 50%">
                <strong>Kasi Komersial</strong>
            </td>
        </tr>
    </table>

    {{-- area --}}
    @if ($muk->kredit->persetujuan->putusan == 'Area' || $muk->kredit->persetujuan->putusan == 'Pusat')
        <table class="table table-bordered table-sm w-100">
            <tr>
                <th colspan="2" class="table-active">Kantor Area</th>
            </tr>
            <tr>
                <td><br><br><br><br></td>
                <td><br><br><br><br></td>
            </tr>
            <tr>
                <td style="text-align: center; width: 50%">
                    <strong>
                        Manager Area
                    </strong>
                </td>
                <td style="text-align: center; width: 50%">
                    <strong>Analis Kredit Area</strong>
                </td>
            </tr>
        </table>
    @endif

    {{-- Pusat --}}
    @if ($muk->kredit->persetujuan->putusan == 'Pusat')
        <table class="table table-bordered table-sm w-100">
            <tr>
                <th colspan="4" class="table-active">Komite Kredit Kantor Pusat</th>
            </tr>
            <tr>
                <td><br><br><br><br></td>
                <td><br><br><br><br></td>
                <td><br><br><br><br></td>
                <td><br><br><br><br></td>
            </tr>
            <tr>
                <td style="text-align: center; width: 25%">
                    <strong>
                        Direktur Utama
                    </strong>
                </td>
                <td style="text-align: center; width: 25%">
                    <strong>Direktur Komersial</strong>
                </td>
                <td style="text-align: center; width: 25%">
                    <strong>
                        Kabid Komersial
                    </strong>
                </td>
                <td style="text-align: center; width: 25%">
                    <strong>Analis Kredit Pusat</strong>
                </td>
            </tr>
        </table>
    @endif

</div>
