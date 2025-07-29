{{-- pasal 5 --}}
<div class="mb-4">
    <div class="header">
        <h3>PASAL 5</h3>
        <h3>JAMINAN KREDIT</h3>
    </div>
    <div class="isi">
        @if ($jam_tanah->isEmpty() && $jam_kenda->isEmpty() && $jam_depo->isEmpty())
            {{-- for pikar --}}
            <div class="row">
                <div class="col-md-1">(1)</div>
                <div class="col-md-11">
                    Guna menjamin hutang-hutang <b>DEBITUR</b> dan/atau <b>PENJAMIN</b> kepada <b>BANK</b> baik yang
                    sekarang telah ada ataupun yang kemudian hari akan ada/akan diadakan, baik yang timbul
                    berdasarkan kredit ini atau setiap perubahan/perpanjangan/pembaharuannya kemudian atau karena sebab
                    apapun
                    juga.
                </div>
            </div>
            @if ($pkpmk->kredit->jns_pinjaman == 'PIKAR (Eksernal)')
                Dengan ini <b>BANK</b> telah menandatangani Perjanjian Kerja Sama
                Nomor {{ $pkpmk->kredit->pikareks->no_perjanjian }} tanggal
                {{ $pkpmk->kredit->pikareks->tgl_perjanjian?->translatedFormat('d F Y') }}
                dengan <b>{{ $pkpmk->kredit->pikareks->nama_perusahaan }}</b>. Yang mana untuk menjaminkan
                hutang-hutangnya tersebut menjaminkan kepada <b>BANK</b> BPJS Ketenagakerjaan
                Atas Nama: {{ $pkpmk->kredit->pikareks->nama_bpjs }} dengan
                nomor: {{ $pkpmk->kredit->pikareks->no_bpjs }}. beserta dengan Surat Kuasa Pemotongan Gaji.
            @else
                Pinjaman tersebut dijamin oleh <b>Kantor Pusat Manajemen PT BPR Kusuma Sumbing</b>.
            @endif
        @else
            <div class="row">
                <div class="col-md-1">(1)</div>
                <div class="col-md-11">
                    Guna menjamin hutang-hutang <b>DEBITUR</b> dan/atau <b>PENJAMIN</b> kepada <b>BANK</b> baik yang
                    sekarang telah ada ataupun yang kemudian hari akan ada/akan diadakan, baik yang timbul
                    berdasarkan
                    kredit ini atau setiap perubahan/perpanjangan/pembaharuannya kemudian atau karena sebab apapun
                    juga,
                    <b>DEBITUR</b> dan/atau <b>PENJAMIN</b> dengan ini menyerahkan kepada <b>BANK</b> barang jaminan
                    berupa:
                </div>
            </div>

            {{-- membuat urutan --}}
            @php
                $counter = 1;
            @endphp

            {{-- Depo --}}
            @if ($jam_depo->isNotEmpty())
                @foreach ($jam_depo as $depo)
                    <div class="row">
                        <div class="col-md-1">&nbsp;</div>
                        <div class="col-md-11">
                            {{-- membuat urutan --}}
                            {{ $counter }}. &nbsp;
                            @php $counter++; @endphp
                            Tabungan Deposito
                        </div>
                    </div>
                    <ul class="list">
                        <li>
                            <table style="width: 100%;">
                                <tr>
                                    <td style="width: 30%">Atas Nama</td>
                                    <td style="width: 1px;">:</td>
                                    <td>{{ strtoupper($depo->atas_nama) }}</td>
                                </tr>
                            </table>
                        </li>
                        <li>
                            <table style="width: 100%;">
                                <tr>
                                    <td style="width: 30%">Nomor Rekening</td>
                                    <td style="width: 1px;">:</td>
                                    <td>{{ $depo->no_rek }}</td>
                                </tr>
                            </table>
                        </li>
                        <li>
                            <table style="width: 100%;">
                                <tr>
                                    <td style="width: 30%">Nominal Deposito</td>
                                    <td style="width: 1px;">:</td>
                                    <td>{{ number_format($depo->nominal, 0, ',', '.') }}</td>
                                </tr>
                            </table>
                        </li>
                    </ul>
                @endforeach
                <div class="premis-jaminan">
                    Bahwa Deposito tersebut tidak dapat dicairkan atau diuangkan sebelum jangka waktu kredit ini
                    berakhir dan/atau hutang-hutang <b>DEBITUR</b> dinyatakan lunas.
                </div>
            @endif

            {{-- tanah --}}
            @if ($jam_tanah->isNotEmpty())
                @foreach ($jam_tanah as $tanah)
                    <div class="row">
                        <div class="col-md-1">&nbsp;</div>
                        <div class="col-md-11">
                            {{-- membuat urutan --}}
                            {{ $counter }}. &nbsp;
                            @php $counter++; @endphp

                            @if ($tanah->jns_jaminan == 'SHGB')
                                Sertifikat Hak Guna Bangunan
                            @elseif ($tanah->jns_jaminan == 'SHM')
                                Sertifikat Hak Milik
                            @elseif ($tanah->jns_jaminan == 'SHGU')
                                Sertifikat Hak Guna Usaha
                            @else
                                {{ $tanah->jns_jaminan }}
                            @endif
                        </div>
                    </div>
                    <ul class="list">
                        @if ($tanah->type_sertifikat == 'Sertifikat-El')
                            <li>
                                <table style="width: 100%;">
                                    <tr>
                                        <td style="width: 30%">NIB</td>
                                        <td style="width: 1px;">:</td>
                                        <td>{{ $tanah->no_shm_shgb }}</td>
                                    </tr>
                                </table>
                            </li>
                        @else
                            <li>
                                <table style="width: 100%;">
                                    <tr>
                                        <td style="width: 30%">Nomor</td>
                                        <td style="width: 1px;">:</td>
                                        <td>{{ $tanah->no_shm_shgb }}</td>
                                    </tr>
                                </table>
                            </li>
                            <li>
                                <table style="width: 100%;">
                                    <tr>
                                        <td style="width: 30%">Tanggal Sertifikat</td>
                                        <td style="width: 1px;">:</td>
                                        <td>
                                            {{ Carbon\Carbon::parse($tanah->tgl_sertifikat)->translatedFormat('d F Y') }}
                                        </td>
                                    </tr>
                                </table>
                            </li>
                        @endif
                        <li>
                            <table style="width: 100%;">
                                <tr>
                                    <td style="width: 30%">Desa/Kelurahan</td>
                                    <td style="width: 1px;">:</td>
                                    <td>{{ $tanah->desa }}</td>
                                </tr>
                            </table>
                        </li>
                        <li>
                            <table style="width: 100%;">
                                <tr>
                                    <td style="width: 30%">Kecamatan</td>
                                    <td style="width: 1px;">:</td>
                                    <td>{{ $tanah->kecamatan }}</td>
                                </tr>
                            </table>
                        </li>
                        <li>
                            <table style="width: 100%;">
                                <tr>
                                    <td style="width: 30%">Kabupaten/Kota</td>
                                    <td style="width: 1px;">:</td>
                                    <td>{{ $tanah->kabupaten }}</td>
                                </tr>
                            </table>
                        </li>
                        <li>
                            <table style="width: 100%;">
                                <tr>
                                    <td style="width: 30%">Provinsi</td>
                                    <td style="width: 1px;">:</td>
                                    <td>{{ $tanah->provinsi }}</td>
                                </tr>
                            </table>
                        </li>
                        <li>
                            <table style="width: 100%;">
                                <tr>
                                    <td style="width: 30%">Atas Nama</td>
                                    <td style="width: 1px;">:</td>
                                    <td>{{ strtoupper($tanah->atas_nama) }}</td>
                                </tr>
                            </table>
                        </li>

                        @if ($tanah->type_sertifikat == 'Sertifikat-Analog')
                            <li>
                                <table style="width: 100%;">
                                    <tr>
                                        <td style="width: 30%">No. Surat Ukur</td>
                                        <td style="width: 1px;">:</td>
                                        <td>{{ $tanah->no_surat_ukur }}</td>
                                    </tr>
                                </table>
                            </li>
                            <li>
                                <table style="width: 100%;">
                                    <tr>
                                        <td style="width: 30%">Tanggal Surat Ukur</td>
                                        <td style="width: 1px;">:</td>
                                        <td>
                                            {{ Carbon\Carbon::parse($tanah->tgl_surat_ukur)->translatedFormat('d F Y') }}
                                        </td>
                                    </tr>
                                </table>
                            </li>
                        @endif

                        <li>
                            <table style="width: 100%;">
                                <tr>
                                    <td style="width: 30%">Luas</td>
                                    <td style="width: 1px;">:</td>
                                    <td>{{ $tanah->luas }} M²</td>
                                </tr>
                            </table>
                        </li>
                    </ul>

                    <div class="premis-jaminan">
                        @if ($tanah->keterangan == 'Tanah Sawah')
                            Tanah sawah dengan apa yang tertanam diatasnya baik yang saat ini ada dan
                            akan ada dikemudian hari.
                        @else
                            Berupa tanah pekarangan dengan bangunan yang berdiri diatasnya, baik yang
                            saat ini ada dan akan ada dikemudian hari.
                        @endif

                        @if ($tanah->alih_media == 'Ya')
                            Yang akan dilakukan perubahan (alih media) dari media analog ke media
                            elektronik sesuai dengan Peraturan Mentri Agraria Tata Ruang dan Badan
                            Pertanahan Nasional Nomor 3 Tahun 2023
                            tentang Penerbitan Dokumen Elektronik Dalam Kegiatan Pendaftaran Tanah
                        @endif

                        Dengan ini menyerahkan kepada <b>BANK</b>, yang akan dibebani
                        @if ($tanah->jns_perikatan == 'APHT')
                            dengan {{ $tanah->jns_perikatan }} dengan pembebanan hak tanggungan
                            peringkat
                            {{ $tanah->no_peringkat_perikatan }}.
                        @else
                            dengan {{ $tanah->jns_perikatan }}.
                        @endif
                    </div>
                @endforeach
            @endif

            {{-- kenda --}}
            @if ($jam_kenda->isNotEmpty())
                @foreach ($jam_kenda as $kenda)
                    <div class="row">
                        <div class="col-md-1">&nbsp;</div>
                        <div class="col-md-11">
                            {{-- membuat urutan --}}
                            {{ $counter }}. &nbsp; Kendaraan
                            @php $counter++; @endphp
                        </div>
                    </div>
                    <ul class="list">
                        <li>
                            <table style="width: 100%;">
                                <tr>
                                    <td style="width: 30%">Jenis</td>
                                    <td style="width: 1px;">:</td>
                                    <td>
                                        {{ $kenda->jns_kendaraan }}
                                    </td>
                                </tr>
                            </table>
                        </li>
                        <li>
                            <table style="width: 100%;">
                                <tr>
                                    <td style="width: 30%">Merk</td>
                                    <td style="width: 1px;">:</td>
                                    <td>
                                        {{ $kenda->merk }}
                                    </td>
                                </tr>
                            </table>
                        </li>
                        <li>
                            <table style="width: 100%;">
                                <tr>
                                    <td style="width: 30%">Type</td>
                                    <td style="width: 1px;">:</td>
                                    <td>
                                        {{ $kenda->type }}
                                    </td>
                                </tr>
                            </table>
                        </li>
                        <li>
                            <table style="width: 100%;">
                                <tr>
                                    <td style="width: 30%">Warna</td>
                                    <td style="width: 1px;">:</td>
                                    <td>
                                        {{ $kenda->warna }}
                                    </td>
                                </tr>
                            </table>
                        </li>
                        <li>
                            <table style="width: 100%;">
                                <tr>
                                    <td style="width: 30%">No. BPKB</td>
                                    <td style="width: 1px;">:</td>
                                    <td>
                                        {{ $kenda->no_bpkb }}
                                    </td>
                                </tr>
                            </table>
                        </li>
                        <li>
                            <table style="width: 100%;">
                                <tr>
                                    <td style="width: 30%">No. Rangka</td>
                                    <td style="width: 1px;">:</td>
                                    <td>
                                        {{ $kenda->no_rangka }}
                                    </td>
                                </tr>
                            </table>
                        </li>
                        <li>
                            <table style="width: 100%;">
                                <tr>
                                    <td style="width: 30%">No. Mesin</td>
                                    <td style="width: 1px;">:</td>
                                    <td>
                                        {{ $kenda->no_mesin }}
                                    </td>
                                </tr>
                            </table>
                        </li>
                        <li>
                            <table style="width: 100%;">
                                <tr>
                                    <td style="width: 30%">Tahun Pembuatan</td>
                                    <td style="width: 1px;">:</td>
                                    <td>
                                        {{ $kenda->thn_pembuatan }}
                                    </td>
                                </tr>
                            </table>
                        </li>
                        <li>
                            <table style="width: 100%;">
                                <tr>
                                    <td style="width: 30%">Nopol</td>
                                    <td style="width: 1px;">:</td>
                                    <td>
                                        {{ $kenda->nopol }}
                                    </td>
                                </tr>
                            </table>
                        </li>
                        <li>
                            <table style="width: 100%;">
                                <tr>
                                    <td style="width: 30%">Atas Nama</td>
                                    <td style="width: 1px;">:</td>
                                    <td>
                                        {{ strtoupper($kenda->atas_nama) }}
                                    </td>
                                </tr>
                            </table>
                        </li>
                    </ul>

                    <div class="premis-jaminan">
                        Yang akan dibebani dengan
                        @if ($kenda->jns_fidusia == 'Bawah Tangan')
                            Perjanjian Bawah Tangan tanggal
                            {{ $kenda->tgl_akta_fidusia->translatedFormat('d F Y') }},
                        @else
                            Akta Jaminan Fidusia,
                            {{-- Nomor {{ $kenda->no_akta_fidusia }}, tanggal
                                {{ $kenda->tgl_akta_fidusia->translatedFormat('d F Y') }}, --}}
                        @endif
                        Kendaraan tersebut adalah benar-benar milik <b>DEBITUR</b>. Tanpa persetujuan
                        tertulis dari
                        <b>BANK</b>, selama kredit belum lunas <b>DEBITUR</b> tidak diperkenankan untuk
                        memindah
                        tangankan barang jaminan dengan alasan apapun juga kepada pihak ketiga.
                    </div>
                @endforeach
            @endif

            <div class="row">
                <div class="col-md-1">&nbsp;</div>
                <div class="col-md-11">
                    Mengenai pengaturan dan pelaksanaan perikatan agunan akan dilakukan
                    sesuai peraturan dan undang-undang yang berlaku. Perikatan tersebut merupakan satu kesatuan
                    dan bagian yang tidak terpisahkan dari Perjanjian Kredit ini.
                </div>
            </div>

            {{-- premis tambahan kenda --}}
            @if ($jam_kenda->isNotEmpty())
                <div class="row">
                    <div class="col-md-1">(2)</div>
                    <div class="col-md-11">
                        Apabila dalam melakukan perbuatan hukum ini <b>DEBITUR</b> telah melakukan cidera janji
                        (wanprestasi), maka objek jaminan fidusia tersebut dapat diambil oleh pihak <b>BANK</b> setelah
                        pemberian Surat Peringatan Pertama dari <b>BANK</b>, dan <b>DEBITUR</b> tidak memiliki itikad
                        baik maka <b>BANK</b> berhak mengambil objek jaminan
                        fidusia tersebut dari penguasaan <b>DEBITUR</b> dan/atau dari penguasaan orang lain dan
                        dimanapun objek jaminan fidusia tersebut berada.
                    </div>
                </div>
            @endif
        @endif

    </div>
</div>
{{-- end pasal 5 --}}
