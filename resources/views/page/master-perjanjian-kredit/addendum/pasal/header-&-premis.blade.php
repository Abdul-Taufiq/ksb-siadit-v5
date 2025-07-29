<table class="table table-borderless w-100 mb-4">
    <tr>
        <td style="width: 25%; border: none;">
            <img style="width: 65px;"
                src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/images/icon_logo.png'))) }}">
        </td>
        <td style="width: 50%; text-align: center !important; vertical-align: middle; border: none;">
            <h3>
                PERUBAHAN
            </h3>
            <h3>
                PERJANJIAN KREDIT
            </h3>
            <h3>
                Nomor: {!! $pkpmk->no_addendum ?? '<i class="text-danger">Not Display in Here</i>' !!}
            </h3>
        </td>
        <td style="width: 25%; border: none;">&nbsp;</td>
    </tr>
</table>


{{-- premis --}}
<div class="mb-4">
    Pada hari ini {!! $pkpmk->tgl_addendum?->translatedFormat('l') ?? '<i class="text-danger">Not Display in Here</i>' !!} tanggal
    {!! $pkpmk->tgl_addendum?->translatedFormat('d F Y') ?? '<i class="text-danger">Not Display in Here</i>' !!}
    yang bertanda tangan dibawah ini:

    <table class="table table-sm table-borderless w-100 mb-1">
        <tr>
            <td style="width: 5%; padding-right: 0.4rem !important; padding-left: 0.4rem !important">I. </td>
            <td>
                @if ($pkpmk->kredit->jns_pinjaman == 'Kredit Pihak Terkait')
                    <b>EKO BAMBANG SETIYOSO</b>, lahir di Kalabahi, pada tanggal 23 Oktober 1962, warga
                    Negara Indonesia, bertempat tinggal di Puri Kencana Blok D No. 21 RT.001, RW.005,
                    Kel/Desa
                    Manding, Kecamatan Temanggung, Kabupaten Temanggung, Provinsi Jawa Tengah, NIK:
                    3323032310620001, Dalam hal ini bertindak dalam kedudukannya selaku Direktur Utama PT
                    BANK
                    PEREKONOMIAN RAKYAT KUSUMA SUMBING, oleh karena itu sah bertindak untuk dan atas nama PT
                    BANK PEREKONOMIAN RAKYAT KUSUMA SUMBING berdasarkan Akta Nomor 8 Tanggal 10 Oktober 2024
                    yang dibuat dihadapan Notaris Novita Alviani, S.H.,M.Kn., yang berkedudukan di Kecamatan
                    Parakan, Kabupaten Temanggung, Provinsi Jawa Tengah. Yang selanjutnya akan disebut
                    sebagai
                    <b>“BANK”</b>.
                @else
                    <b>{{ $pkpmk->cabang->nama_pincab }}</b>, lahir di
                    {{ $pkpmk->cabang->tempat_lahir }},
                    pada tanggal
                    {{ $pkpmk->cabang->tgl_lahir?->translatedFormat('d F Y') }},
                    warga Negara Indonesia, bertempat tinggal di {{ $pkpmk->cabang->tempat_tinggal }},
                    NIK:
                    {{ $pkpmk->cabang->nik }}, Dalam hal ini bertindak dalam kedudukannya selaku
                    {{ $pkpmk->cabang->jabatan }}
                    PT BANK PEREKONOMIAN RAKYAT KUSUMA SUMBING Cabang {{ $pkpmk->cabang->alamat }} dalam
                    jabatannya
                    tersebut mewakili Direksi, berdasarkan Surat Kuasa Subtitusi di bawah tangan, Nomor
                    {{ $pkpmk->cabang->nomor_surat_kuasa }},
                    tanggal
                    {{ $pkpmk->cabang->tgl_surat_kuasa->translatedFormat('d F Y') }},
                    oleh karena itu sah bertindak untuk dan atas nama
                    PT BANK PEREKONOMIAN RAKYAT KUSUMA SUMBING, yang berkedudukan di Kecamatan Parakan,
                    Kabupaten
                    Temanggung, Provinsi Jawa Tengah. Yang selanjutnya akan disebut sebagai <b>“BANK”</b>.
                @endif
            </td>
        </tr>
        <tr>
            <td style="width: 5%; padding-right: 0.4rem !important; padding-left: 0.4rem !important">II. </td>
            <td>
                @if ($pkpmk->debitur->status_pernikahan == 'Menikah')
                    <b>{{ $pkpmk->debitur->nama_debitur }}</b>,
                    lahir di {{ $pkpmk->debitur->tempat_lahir }}, pada tanggal
                    {{ $pkpmk->debitur->tgl_lahir->translatedFormat('d F Y') }},
                    bertempat tinggal di {{ $pkpmk->debitur->alamat_ktp }} RT/RW
                    {{ $pkpmk->debitur->rt_rw_ktp }}, Desa/Kelurahan
                    {{ $pkpmk->debitur->kelurahan }}, Kecamatan {{ $pkpmk->debitur->kecamatan }},
                    Kabupaten/Kota
                    {{ $pkpmk->debitur->kabupaten }}, NIK: {{ $pkpmk->debitur->nik }}, Pekerjaan
                    {{ $pkpmk->debitur->pekerjaan }},
                    yang dalam melakukan perbuatan hukum ini memerlukan persetujuan dari
                    {{ $pkpmk->debitur->jenis_kelamin == 'Laki-laki' ? 'Istrinya' : 'Suaminya' }}
                    yang sah pada tanggal
                    {{ $pkpmk->debitur->tgl_pernikahan->translatedFormat('d F Y') }}
                    dengan <b>{{ $pkpmk->debitur->nama_pasangan }}</b> yang lahir di
                    {{ $pkpmk->debitur->tempat_lahir_pasangan }} pada tanggal
                    {{ $pkpmk->debitur->tgl_lahir_pasangan->translatedFormat('d F Y') }},
                    NIK: {{ $pkpmk->debitur->nik_pasangan }}, Pekerjaan
                    {{ $pkpmk->debitur->pekerjaan_pasangan }},
                    bertempat tinggal
                    {{ $pkpmk->debitur->alamat_pasangan == 'sama dengan suaminya' ||
                    $pkpmk->debitur->alamat_pasangan == 'sama dengan istrinya'
                        ? $pkpmk->debitur->alamat_pasangan
                        : 'di ' . $pkpmk->debitur->alamat_pasangan }},
                    yang dalam melakukan perbuatan hukum ini bertindak secara bersama-sama, yang selanjutnya
                    disebut sebagai <b>“DEBITUR”</b>.
                @elseif ($pkpmk->debitur->status_pernikahan == 'Pernikahan Khusus')
                    <b>{{ $pkpmk->debitur->nama_debitur }}</b>,
                    lahir di {{ $pkpmk->debitur->tempat_lahir }}, pada tanggal
                    {{ $pkpmk->debitur->tgl_lahir->translatedFormat('d F Y') }},
                    bertempat tinggal di {{ $pkpmk->debitur->alamat_ktp }} RT/RW
                    {{ $pkpmk->debitur->rt_rw_ktp }}, Desa/Kelurahan
                    {{ $pkpmk->debitur->kelurahan }}, Kecamatan {{ $pkpmk->debitur->kecamatan }},
                    Kabupaten/Kota
                    {{ $pkpmk->debitur->kabupaten }}, NIK: {{ $pkpmk->debitur->nik }}, Pekerjaan
                    {{ $pkpmk->debitur->pekerjaan }},
                    yang dalam melakukan perbuatan hukum ini tidak memerlukan persetujuan dari
                    {{ $pkpmk->debitur->jenis_kelamin == 'Laki-laki' ? 'Istrinya' : 'Suaminya' }}
                    yang sah pada tanggal
                    {{ $pkpmk->debitur->tgl_pernikahan->translatedFormat('d F Y') }}
                    dengan <b>{{ $pkpmk->debitur->nama_pasangan }}</b> yang lahir di
                    {{ $pkpmk->debitur->tempat_lahir_pasangan }} pada tanggal
                    {{ $pkpmk->debitur->tgl_lahir_pasangan->translatedFormat('d F Y') }},
                    NIK: {{ $pkpmk->debitur->nik_pasangan }}, Pekerjaan
                    {{ $pkpmk->debitur->pekerjaan_pasangan }},
                    bertempat tinggal
                    {{ $pkpmk->debitur->alamat_pasangan == 'sama dengan suaminya' ||
                    $pkpmk->debitur->alamat_pasangan == 'sama dengan istrinya'
                        ? $pkpmk->debitur->alamat_pasangan
                        : 'di ' . $pkpmk->debitur->alamat_pasangan }},
                    Berdasarkan Akta {{ $pkpmk->debitur->judul_akta }}, Nomor
                    {{ $pkpmk->debitur->no_akta }} yang dibuat pada tanggal
                    {{ $pkpmk->debitur->tgl_akta->translatedFormat('d F Y') }},
                    dihadapan Notaris {{ $pkpmk->debitur->nama_notaris }}. Notaris di
                    {{ $pkpmk->debitur->kedudukan_notaris }};
                    yang dalam melakukan perbuatan hukum ini bertindak untuk dirinya sendiri, yang
                    selanjutnya disebut sebagai <b>“DEBITUR”</b>.
                @else
                    <b>{{ $pkpmk->debitur->nama_debitur }}</b>,
                    lahir di {{ $pkpmk->debitur->tempat_lahir }}, pada tanggal
                    {{ $pkpmk->debitur->tgl_lahir->translatedFormat('d F Y') }},
                    bertempat tinggal di {{ $pkpmk->debitur->alamat_ktp }} RT/RW
                    {{ $pkpmk->debitur->rt_rw_ktp }}, Desa/Kelurahan
                    {{ $pkpmk->debitur->kelurahan }}, Kecamatan {{ $pkpmk->debitur->kecamatan }},
                    Kabupaten/Kota
                    {{ $pkpmk->debitur->kabupaten }}, NIK: {{ $pkpmk->debitur->nik }}, yang dalam
                    melakukan
                    perbuatan hukum ini tidak memerlukan
                    persetujuan dari siapapun karena tidak terikat dengan perkawinan yang sah, yang
                    dalam
                    melakukan perbuatan hukum ini bertindak untuk diri-sendiri, yang selanjutnya
                    disebut sebagai <b>“DEBITUR”</b>.
                @endif

                @if ($penjamin != '')
                    @foreach ($penjamin as $penjaminItem)
                        <br>
                        -Yang turut hadir dan menanda-tangani perjanjian ini yaitu,
                        <b>{{ $penjaminItem->nama_penjamin }}</b>, lahir di
                        {{ $penjaminItem->tempat_lahir }},
                        {{ $penjaminItem->tgl_lahir->translatedFormat('d F Y') }},
                        bertempat tinggal di {{ $penjaminItem->alamat }}, NIK:
                        {{ $penjaminItem->nik }}
                        @if ($penjaminItem->status_pernikahan == 'Menikah')
                            yang dalam melakukan perbuatan hukum ini memerlukan persetujuan dari
                            @if ($penjaminItem->jenis_kelamin == 'Laki-laki')
                                Istrinya
                            @else
                                Suaminya
                            @endif
                            yang sah. <b>{{ $penjaminItem->nama_pasangan }}</b>, lahir
                            di
                            {{ $penjaminItem->tempat_lahir_pasangan }},
                            {{ $penjaminItem->tgl_lahir_pasangan->translatedFormat('d F Y') }},
                            bertempat tinggal {{ $penjaminItem->alamat_pasangan }}, NIK:
                            {{ $penjaminItem->nik_pasangan }},
                            yang dalam melakukan hal ini menerangkan bahwa telah setuju memberikan
                            jaminan
                            untuk menjamin hutang <b>DEBITUR</b>, yang selanjutnya disebut sebagai
                            <b>“PENJAMIN”</b>.
                        @elseif ($penjaminItem->status_pernikahan == 'SHM Khusus Waris')
                            yang dalam melakukan perbuatan hukum ini tidak memerlukan persetujuan
                            dari
                            @if ($penjaminItem->jenis_kelamin == 'Laki-laki')
                                Istrinya
                            @else
                                Suaminya
                            @endif
                            yang sah,
                            telah setuju memberikan jaminan
                            untuk menjamin hutang <b>DEBITUR</b>, selanjutnya disebut sebagai
                            <b>“PENJAMIN”</b>.
                        @elseif ($penjaminItem->status_pernikahan == 'Pernikahan Khusus')
                            yang dalam melakukan perbuatan hukum ini tidak memerlukan persetujuan dari
                            @if ($penjaminItem->jenis_kelamin == 'Laki-laki')
                                Istrinya
                            @else
                                Suaminya
                            @endif
                            yang sah. <b>{{ $penjaminItem->nama_pasangan }}</b>, lahir
                            di
                            {{ $penjaminItem->tempat_lahir_pasangan }},
                            {{ $penjaminItem->tgl_lahir_pasangan->translatedFormat('d F Y') }},
                            bertempat tinggal {{ $penjaminItem->alamat_pasangan }}, NIK:
                            {{ $penjaminItem->nik_pasangan }}.
                            Berdasarkan Akta {{ $penjaminItem->judul_akta }}, Nomor
                            {{ $penjaminItem->no_akta }} yang dibuat pada tanggal
                            {{ $penjaminItem->tgl_akta->translatedFormat('d F Y') }},
                            dihadapan Notaris {{ $penjaminItem->nama_notaris }}. Notaris di
                            {{ $penjaminItem->kedudukan_notaris }};
                            yang dalam melakukan hal ini menerangkan bahwa telah setuju memberikan
                            jaminan
                            untuk menjamin hutang <b>DEBITUR</b>, yang selanjutnya disebut sebagai
                            <b>“PENJAMIN”</b>.
                        @else
                            yang dalam melakukan perbuatan hukum ini tidak memerlukan
                            persetujuan dari siapapun karena tidak terikat dengan perkawinan yang
                            sah,
                            yang
                            dalam melakukan hal ini menerangkan bahwa telah setuju memberikan
                            jaminan
                            untuk menjamin hutang <b>DEBITUR</b>, yang selanjutnya disebut sebagai
                            <b>“PENJAMIN”</b>.
                        @endif
                    @endforeach
                @endif
            </td>
        </tr>
    </table>
    <b>BANK</b> dan <b>DEBITUR</b> dengan ini menerangkan terlebih dahulu sebagai berikut: <br>
    Bahwa <b>BANK</b> dan <b>DEBITUR</b> telah melakukan Perjanjian Kredit
    @if ($pkpmk->jns_akta == 'Notariil')
        dengan Akta Notaris Nomor {{ $pkpmk->no_akta_notaris }} Tanggal
        {{ $pkpmk->tgl_akta_notaris->translatedFormat('d F Y') }}
    @else
        Nomor {{ $pkpmk->pkpmk->no_pkpmk }} tanggal
        {{ $pkpmk->pkpmk->tgl_pkpmk->translatedFormat('d F Y') }}
        yang dibuat secara
        @if ($pkpmk->jns_pengikatan == 'Bawah Tangan/Legalisasi')
            dibawah tangan
        @else
            Legalisasi
        @endif
    @endif
    (selanjutnya disebut PERJANJIAN KREDIT), dimana <b>BANK</b> telah memberikan kepada <b>DEBITUR</b> Fasilitas
    Kredit sejumlah {{ 'Rp' . $pkpmk->kredit->jumlah_disetujui }}
    ({{ terbilang_id($pkpmk->kredit->jumlah_disetujui) }})
    dengan jangka waktu
    {{ $pkpmk->pkpmk->kredit->jkw }} bulan terhitung mulai tanggal
    {{ $pkpmk->pkpmk->tgl_awal->translatedFormat('d F Y') }} sampai dengan
    {{ $pkpmk->pkpmk->tgl_akhir->translatedFormat('d F Y') }} sebagaimana diatur dalam PERJANJIAN KREDIT
    yang telah dilakukan Perubahan Perjanjian Kredit


    @if ($addDobel->count() > 1)
        @foreach ($addDobel as $index => $addDobles)
            @if ($index == $addDobel->count() - 1 && $addDobel->count() > 2)
                dan terakhir telah dilakukan Perubahan Perjanjian Kredit Nomor {{ $addDobles->no_pkpmk }}
                tanggal {{ $addDobles->tgl_pkpmk->translatedFormat('d F Y') }}
            @elseif ($index == $addDobel->count() - 1)
                yang telah dilakukan Perubahan Perjanjian Kredit Nomor {{ $addDobles->no_pkpmk }} tanggal
                {{ $addDobles->tgl_pkpmk->translatedFormat('d F Y') }}
            @else
                yang telah dilakukan Perubahan Perjanjian Kredit Nomor {{ $addDobles->no_pkpmk }} tanggal
                {{ $addDobles->tgl_pkpmk->translatedFormat('d F Y') }}
            @endif
        @endforeach
    @endif

    {{-- Nomor {{ $kredit->pkpmk->no_pkpmk }} tanggal
            {{ $pkpmk->tgl_pkpmk->translatedFormat('d F Y') }} --}}
    (selanjutnya disebut dengan FASILITAS KREDIT). <br><br>

    Bahwa dari surat permohonan <b>DEBITUR</b> tanggal
    {{ $pkpmk->kredit->tgl_pengajuan->translatedFormat('d F Y') }} bermaksud untuk

    @if ($pkpmk->kredit->kategori_spk == 'Restruck')
        melakukan "RESTRUKTURISASI KREDIT" yaitu {{ Str::lower($pkpmk->kredit->detail_kategori_spk) }}.
    @else
        {{ strtolower($pkpmk->kredit->detail_kategori_spk) }}.
    @endif

    <br>
    Maka berhubungan dengan itu <b>BANK</b> dan <b>DEBITUR</b> menyetujui untuk membuat <b>PERUBAHAN PERJANJIAN
        KREDIT</b> sebagai berikut:
</div>
