<strong>1. Data Pemohon/Key Person</strong>

<table class="table table-sm w-100 mb-0" style="margin-left: 10px;">
    <tr>
        <td style="width: 35%">Nama Pemohon/Key Person</td>
        <td style="width: 1%">:</td>
        <td>{{ $muk->kredit->debitur->nama_debitur }}</td>
    </tr>
    <tr>
        <td>Tempat & Tanggal Lahir</td>
        <td>:</td>
        <td>
            {{ $muk->kredit->debitur->tempat_lahir }}/
            {{ $muk->kredit->debitur->tgl_lahir->translatedFormat('d F Y') }}
            {{-- {{ Carbon\Carbon::parse($muk->kredit->debitur->tgl_lahir)->translatedFormat('d F Y') }} --}}
        </td>
    </tr>
    <tr>
        <td>Status Perkawinan</td>
        <td>:</td>
        <td>
            {{ $muk->kredit->debitur->status_pernikahan }}
        </td>
    </tr>
    <tr>
        <td>Jumlah Anak</td>
        <td>:</td>
        <td>
            {{ $muk->kredit->debitur->jumlah_anak }} Orang
        </td>
    </tr>
    <tr>
        <td>Jenis Identitas</td>
        <td>:</td>
        <td>
            KTP (Kartu Tanda Penduduk)
        </td>
    </tr>
    <tr>
        <td>No. Identitas diri</td>
        <td>:</td>
        <td>
            {{ $muk->kredit->debitur->nik }} &nbsp; | &nbsp; (Berlaku s/d <b>Seumur Hidup</b>)
        </td>
    </tr>
    <tr>
        <td>Pendidikan Terakhir</td>
        <td>:</td>
        <td>
            {{ $muk->kredit->debitur->pendidikan_terakhir }}
        </td>
    </tr>
    <tr>
        <td>Alamat Sesuai Kartu Identitas</td>
        <td>:</td>
        <td>
            {{ $muk->kredit->debitur->alamat_ktp }}, RT/RW {{ $muk->kredit->debitur->rt_rw_ktp }}, Kel/Desa
            {{ $muk->kredit->debitur->kelurahan }}, Kecamatan {{ $muk->kredit->debitur->kecamatan }}, Kabupaten
            {{ $muk->kredit->debitur->kabupaten }}, Kode Pos {{ $muk->kredit->debitur->kode_pos }}
        </td>
    </tr>
    <tr>
        <td>Alamat Domisili</td>
        <td>:</td>
        <td>
            {{ $muk->kredit->debitur->alamat_rumah }}, RT/RW {{ $muk->kredit->debitur->rt_rw_rumah }}, Kode Pos
            {{ $muk->kredit->debitur->kode_pos }}
        </td>
    </tr>
    <tr>
        <td>Status Kepemilikan Rumah</td>
        <td>:</td>
        <td>
            {{ $muk->kredit->debitur->status_kepemilikan }}
        </td>
    </tr>
    <tr>
        <td>No Telp/HP</td>
        <td>:</td>
        <td>
            {{ $muk->kredit->debitur->no_telp }}
        </td>
    </tr>
    <tr>
        <td>Nama Ibu Kandung</td>
        <td>:</td>
        <td>
            {{ $muk->kredit->debitur->nama_ibu }}
        </td>
    </tr>
    <tr>
        <td>Ditempati Sejak</td>
        <td>:</td>
        <td>
            Tahun {{ $muk->kredit->debitur->tahun_ditempati }} an
        </td>
    </tr>
</table>

<strong>2. Data Usaha</strong>

<table class="table table-sm w-100 mb-0" style="margin-left: 10px">
    <tr>
        <td style="width: 35%">Bentuk Usaha</td>
        <td style="width: 1%">:</td>
        <td>{{ $muk->kredit->debitur->bentuk_usaha }}</td>
    </tr>
    <tr>
        <td>Nama Badan Usaha (bila ada)</td>
        <td>:</td>
        <td>{{ $muk->kredit->debitur->nama_perusahaan }}</td>
    </tr>
    <tr>
        <td>Group Usaha (bila ada)</td>
        <td>:</td>
        <td>{{ $muk->kredit->debitur->grup_usaha ? $muk->kredit->debitur->grup_usaha : '-' }}</td>
    </tr>
    <tr>
        <td>% Kepememilikan Perusahaan</td>
        <td>:</td>
        <td>{{ $muk->kredit->debitur->persen_kepemilikan }}</td>
    </tr>
    <tr>
        <td>Mulai Usaha</td>
        <td>:</td>
        <td>{{ $muk->kredit->debitur->mulai_usaha }}</td>
    </tr>
    <tr>
        <td>Jumlah Karyawan</td>
        <td>:</td>
        <td>{{ $muk->kredit->debitur->jumlah_karyawan }}</td>
    </tr>
    <tr>
        <td>Alamat Usaha</td>
        <td>:</td>
        <td>{{ $muk->kredit->debitur->alamat_usaha }}</td>
    </tr>
    <tr>
        <td>Kepemilikan Tempat Usaha</td>
        <td>:</td>
        <td>{{ $muk->kredit->debitur->status_tempat_usaha }}</td>
    </tr>
    <tr>
        <td>Ditempati Sejak</td>
        <td>:</td>
        <td>{{ $muk->kredit->debitur->periode }}</td>
    </tr>
</table>

@if ($muk->kredit->debitur == 'Menikah' || $muk->kredit->debitur == 'Pernikahan Khusus')
    <strong>3. Data Suami/Istri</strong>

    <table class="table table-sm w-100 mb-0" style="margin-left: 10px">
        <tr>
            <td style="width: 35%">Nama Suami/Istri</td>
            <td style="width: 1%">:</td>
            <td>{{ $muk->kredit->debitur->nama_pasangan }}</td>
        </tr>
        <tr>
            <td>Tempat/ Tanggal Lahir</td>
            <td>:</td>
            <td>
                {{ $muk->kredit->debitur->tempat_lahir_pasangan }}/
                {{ $muk->kredit->debitur->tgl_lahir_pasangan ? $muk->kredit->debitur->tgl_lahir_pasangan->translatedFormat('d F Y') : '' }}
            </td>
        </tr>
        <tr>
            <td>Jenis Identitas</td>
            <td>:</td>
            <td>KTP (Kartu Tanda Penduduk)</td>
        </tr>
        <tr>
            <td>No. Identitas diri</td>
            <td>:</td>
            <td>
                {{ $muk->kredit->debitur->nik_pasangan }} &nbsp; | &nbsp;
                (Berlaku s/d <b>Seumur Hidup</b>)
            </td>
        </tr>
        <tr>
            <td>Pekerjaan</td>
            <td>:</td>
            <td>{{ $muk->kredit->debitur->pekerjaan_pasangan }}</td>
        </tr>
        <tr>
            <td>Penghasilan Perbulan</td>
            <td>:</td>
            <td>{{ $muk->kredit->debitur->penghasilan_bulanan_pasangan == null ? 'Rp0' : 'Rp' . number_format($muk->kredit->debitur->penghasilan_bulanan_pasangan, 0, ',', '.') }}
            </td>
        </tr>

    </table>
@endif
