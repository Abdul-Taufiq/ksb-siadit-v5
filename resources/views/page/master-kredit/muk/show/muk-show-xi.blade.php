<div class="mb-2">
    <table class="table table-bordered table-sm w-100">
        <thead>
            <tr>
                <th colspan="4" class="table-active">Cabang</th>
            </tr>
            <tr class="table-active">
                <th style="width: 20%; text-align: center">Jabatan</th>
                <th style="width: 20%; text-align: center">Rekomendasi</th>
                <th style="width: 20%; text-align: center">Tanda Tangan</th>
                <th style="width: 40%; text-align: center">Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1. {{ $muk->id_cabang == '1' ? 'Kepala Kantor' : 'Pimpinan Cabang' }}</td>
                <td style="text-align: center">
                    {{ !empty($muk->putusan->rekom_pincab) ? $muk->putusan->rekom_pincab : 'Belum Ada data' }}</td>
                <td style="text-align: center; vertical-align: bottom">
                    <br><br><br><br>
                    (
                    {{ !empty($muk->putusan->nama_pincab) ? $muk->putusan->nama_pincab : 'Belum Ada data' }}
                    )
                </td>
                <td style="vertical-align: top;">{!! $muk->kredit->catatan_pincab !!}</td>
            </tr>
            <tr>
                <td>2. Kasi Komersial</td>
                <td style="text-align: center">
                    {{ !empty($muk->putusan->rekom_kakom) ? $muk->putusan->rekom_kakom : 'Belum Ada data' }}</td>
                <td style="text-align: center; vertical-align: bottom">
                    <br><br><br><br>
                    (
                    {{ !empty($muk->putusan->nama_kakom) ? $muk->putusan->nama_kakom : 'Belum Ada data' }}
                    )
                </td>
                <td style="vertical-align: top;">{!! $muk->kredit->catatan_kakom !!}</td>
            </tr>
            <tr>
                <td>3. Analis Kredit Cabang</td>
                <td style="text-align: center">
                    {{ !empty($muk->putusan->rekom_analis_cabang) ? $muk->putusan->rekom_analis_cabang : 'Belum Ada data' }}
                </td>
                <td style="text-align: center; vertical-align: bottom">
                    <br><br><br><br>
                    (
                    {{ !empty($muk->putusan->nama_analis_cabang) ? $muk->putusan->nama_analis_cabang : 'Belum Ada data' }}
                    )
                </td>
                <td style="vertical-align: top;">{!! $muk->kredit->catatan_analis !!}</td>
            </tr>
            <tr>
                <td>4. Account Officer</td>
                <td style="text-align: center">
                    {{ !empty($muk->putusan->nama_ao) ? $muk->putusan->rekom_ao : 'Belum Ada data' }}</td>
                <td style="text-align: center; vertical-align: bottom">
                    <br><br><br><br>
                    (
                    {{ !empty($muk->putusan->nama_ao) ? $muk->putusan->nama_ao : 'Belum Ada data' }}
                    )
                </td>
                <td style="vertical-align: top;">{!! $muk->kredit->catatan_ao !!}</td>
            </tr>
        </tbody>
    </table>

    {{-- area --}}
    @if ($muk->kredit->persetujuan->putusan == 'Area' || $muk->kredit->persetujuan->putusan == 'Pusat')
        <table class="table table-bordered table-sm w-100">
            <thead>
                <tr>
                    <th colspan="4" class="table-active">Area</th>
                </tr>
                <tr class="table-active">
                    <th style="width: 20%; text-align: center">Jabatan</th>
                    <th style="width: 20%; text-align: center">Rekomendasi</th>
                    <th style="width: 20%; text-align: center">Tanda Tangan</th>
                    <th style="width: 40%; text-align: center">Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1. Manager Area</td>
                    <td style="text-align: center">
                        {{ !empty($muk->putusan->rekom_manajer_area) ? $muk->putusan->rekom_manajer_area : 'Belum Ada data' }}
                    </td>
                    <td style="text-align: center; vertical-align: bottom;">
                        <br><br><br><br>
                        (
                        {{ !empty($muk->putusan->nama_manajer_area) ? $muk->putusan->nama_manajer_area : 'Belum Ada data' }}
                        )
                    </td>
                    <td style="vertical-align: top;">{!! $muk->kredit->catatan_manajer_area !!}</td>
                </tr>
                <tr>
                    <td>2. Analis Area</td>
                    <td style="text-align: center">
                        {{ !empty($muk->putusan->rekom_analis_area) ? $muk->putusan->rekom_analis_area : 'Belum Ada data' }}
                    </td>
                    <td style="text-align: center; vertical-align: bottom;">
                        <br><br><br><br>
                        (
                        {{ !empty($muk->putusan->nama_analis_area) ? $muk->putusan->nama_analis_area : 'Belum Ada data' }}
                        )
                    </td>
                    <td style="vertical-align: top;">{!! $muk->kredit->catatan_analis_area !!}</td>
                </tr>
                <tr>
                    <td>3. Analis Komite</td>
                    <td style="text-align: center">
                        {{ !empty($muk->putusan->rekom_analis_komite) ? $muk->putusan->rekom_analis_komite : 'Belum Ada data' }}
                    </td>
                    <td style="text-align: center; vertical-align: bottom;">
                        <br><br><br><br>
                        (
                        {{ !empty($muk->putusan->nama_analis_komite) ? $muk->putusan->nama_analis_komite : 'Belum Ada data' }}
                        )
                    </td>
                    <td style="vertical-align: top;">{!! $muk->kredit->catatan_analis_komite !!}</td>
                </tr>
            </tbody>
        </table>
    @endif

    {{-- Pusat --}}
    @if ($muk->kredit->persetujuan->putusan == 'Pusat')
        <table class="table table-bordered table-sm w-100">
            <thead>
                <tr>
                    <th colspan="4" class="table-active">Pusat</th>
                </tr>
                <tr class="table-active">
                    <th style="width: 20%; text-align: center">Jabatan</th>
                    <th style="width: 20%; text-align: center">Rekomendasi</th>
                    <th style="width: 20%; text-align: center">Tanda Tangan</th>
                    <th style="width: 40%; text-align: center">Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1. Direktur Utama</td>
                    <td style="text-align: center">
                        {{ !empty($muk->putusan->rekom_direktur_utama) ? $muk->putusan->rekom_direktur_utama : 'Belum Ada data' }}
                    </td>
                    <td style="text-align: center; vertical-align: bottom;">
                        <br><br><br><br>
                        (
                        {{ !empty($muk->putusan->nama_direktur_utama) ? $muk->putusan->nama_direktur_utama : 'Belum Ada data' }}
                        )
                    </td>
                    <td style="vertical-align: top;">{!! $muk->kredit->catatan_direktur_utama !!}</td>
                </tr>
                <tr>
                    <td>2. Direktur Komersial</td>
                    <td style="text-align: center">
                        {{ !empty($muk->putusan->rekom_direktur_komersial) ? $muk->putusan->rekom_direktur_komersial : 'Belum Ada data' }}
                    </td>
                    <td style="text-align: center; vertical-align: bottom;">
                        <br><br><br><br>
                        (
                        {{ !empty($muk->putusan->nama_direktur_komersial) ? $muk->putusan->nama_direktur_komersial : 'Belum Ada data' }}
                        )
                    </td>
                    <td style="vertical-align: top;">{!! $muk->kredit->catatan_direktur_komersial !!}</td>
                </tr>
                <tr>
                    <td>3. Analis Pusat</td>
                    <td style="text-align: center">
                        {{ !empty($muk->putusan->rekom_analis_pst) ? $muk->putusan->rekom_analis_pst : 'Belum Ada data' }}
                    </td>
                    <td style="text-align: center; vertical-align: bottom;">
                        <br><br><br><br>
                        (
                        {{ !empty($muk->putusan->nama_analis_pst) ? $muk->putusan->nama_analis_pst : 'Belum Ada data' }}
                        )
                    </td>
                    <td style="vertical-align: top;">{!! $muk->kredit->catatan_analis_pst !!}</td>
                </tr>
            </tbody>
        </table>
    @endif

</div>
