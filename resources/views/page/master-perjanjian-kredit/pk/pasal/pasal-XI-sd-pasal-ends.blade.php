{{-- pasal 11 --}}
<div class="mb-4">
    <div class="header">
        <h3>PASAL 11</h3>
        <h3>KETENTUAN BANK</h3>
    </div>

    <b>DEBITUR</b> dengan ini berjanji, akan tunduk kepada segala ketentuan-ketentuan dan
    kebiasaan-kebiasaan yang berlaku pada <b>BANK</b>, baik yang berlaku sekarang maupun dikemudian hari.
</div>
{{-- end pasal 6 --}}


{{-- pasal 12 --}}
<div class="mb-4">
    <div class="header">
        <h3>PASAL 12</h3>
        <h3>AHLI WARIS/PENANGGUNG</h3>
    </div>

    Apabila <b>DEBITUR</b> meninggal dunia, maka semua hutang dan kewajiban <b>DEBITUR</b> kepada
    <b>BANK</b> yang timbul berdasarkan Perjanjian Kredit ini berikut semua perubahan/tambahan/perpanjangan
    kemudian dan atau berdasarkan apapun
    juga tetap merupakan satu kesatuan hutang dari para ahli waris <b>DEBITUR</b> atau PENANGGUNG (jika ada)
    yang tidak dibagi-bagi.
</div>
{{-- end pasal 12 --}}


{{-- pasal 13 --}}
<div class="mb-4">
    <div class="header">
        <h3>PASAL 13</h3>
        <h3>PENGALIHAN PIUTANG (CASSIE)</h3>
    </div>
    <b>BANK</b> dengan ini diberi hak dan dikuasakan oleh <b>DEBITUR</b> untuk menggadai ulangkan kredit ini
    kepada <b>BANK</b> lain atau pihak ketiga lainnya, semata–mata menurut pertimbangan yang dipandang baik
    oleh <b>BANK</b>.
</div>
{{-- end pasal 13 --}}


{{-- pasal 14 --}}
<div class="mb-4">
    <div class="header">
        <h3>PASAL 14</h3>
        <h3>PEMBERIAN MASA JEDA</h3>
    </div>

    <div class="row">
        <div class="col-md-1">(1)</div>
        <div class="col-md-11">
            <b>BANK</b> memberikan waktu 2 (dua) hari kerja sejak ditandatanganinya Perjanjian Kredit ini
            kepada <b>DEBITUR</b> untuk mempelajari kembali Perjanjian Kredit yang telah ditandatangani,
            setelah lewatnya waktu 2 (dua) hari kerja <b>DEBITUR</b> menyetujui melanjutkan perjanjian kredit ini.
        </div>
    </div>
    <div class="row">
        <div class="col-md-1">(2)</div>
        <div class="col-md-11">
            Apabila dalam masa waktu 2 (dua) hari kerja <b>DEBITUR</b> memilih mengakhiri Perjanjian Kredit
            ini, maka <b>DEBITUR</b> wajib mengembalikan seluruh saldo pinjaman yang telah diterima ditambah
            sejumlah tertentu bunga pinjaman dihitung secara harian oleh <b>BANK</b>, Provisi dan administrasi yang
            telah di bayarkan <b>DEBITUR</b> menjadi hak <b>BANK</b>.
        </div>
    </div>
</div>
{{-- end pasal 14 --}}


{{-- pasal 15 --}}
<div class="mb-4">
    <div class="header">
        <h3>PASAL 15</h3>
        <h3>DOMISILI</h3>
    </div>

    Mengenai perjanjian ini dan segala akibat-akibat serta pelaksanaan para pihak memilih tempat kediaman
    hukum yang umum dikantor Panitera Pengadilan Negeri {{ ucfirst($pkpmk->cabang->pn) }} di
    {{ $pkpmk->cabang->alamat_pn }}, demikian dengan tidak mengurangi hak <b>BANK</b> untuk memohon
    pelaksanaan/eksekusi dari perjanjian ini atau mengajukan
    tuntutan hukum terhadap <b>DEBITUR</b> melalui Pengadilan-Pengadilan dan/atau Instansi maupun Lembaga
    Pemerintah yang berada dalam wilayah Republik Indonesia.
</div>
{{-- end pasal 15 --}}

Ketentuan ini telah disesuaikan dengan peraturan perundang-undangan yang berlaku, dan telah disesuaikan
dengan ketentuan Otoritas Jasa Keuangan. <br>

{{-- TTD --}}
<br>
<div style="page-break-inside: avoid">
    <div style="text-align: center;">
        {{ ucfirst(strtolower($pkpmk->cabang->alamat)) }},
        {{ $pkpmk->tgl_pkpmk?->translatedFormat('d F Y') ?? '-' }}
    </div>
    <table style="width: 100%; text-align: center">
        <tr>
            <td style="width: 45%;   padding: 3px 0; text-align: center;">
                <b>PT BPR KUSUMA SUMBING</b>
            </td>
            <td style="padding: 4px 0; width: 55%; text-align: center;">
                <b>DEBITUR</b>
            </td>
        </tr>
        <tr style="text-align: center;">
            <td style="width: 45%;   padding: 3px 0; text-align: center;">
                <br><br><br><br>
                @if ($pkpmk->jns_pinjaman == 'Kredit Pihak Terkait')
                    (<b>EKO BAMBANG SETIYOSO</b>)
                @else
                    (<b>{{ $pkpmk->cabang->nama_pincab }}</b>)
                @endif
            </td>
            <td style="padding: 4px 0; width: 55%; text-align: center;">
                <br><br><br><br>
                @if ($pkpmk->debitur->status_pernikahan == 'Menikah')
                    (<b>{{ $pkpmk->debitur->nama_debitur }}</b>)
                    (<b>{{ $pkpmk->debitur->nama_pasangan }}</b>)
                @else
                    (<b>{{ $pkpmk->debitur->nama_debitur }}</b>)
                @endif
            </td>
        </tr>
    </table>

    <table style="width: 100%;  text-align: center">
        @if ($penjamin != '')
            @foreach ($penjamin as $item)
                <tr style="text-align: center;">
                    <td style="width: 45%;   padding: 3px 0; text-align: center">
                        <b>&nbsp;</b>
                    </td>
                    <td style="padding: 4px 0; width: 55%; text-align: center">
                        <b>PENJAMIN {{ $loop->iteration }}</b>
                    </td>
                </tr>
                <tr style="text-align: center;">
                    <td style="width: 45%;   padding: 3px 0; text-align: center">
                        <b>&nbsp;</b>
                    </td>
                    <td style="padding: 4px 0; width: 55%; text-align: center">
                        <br><br><br><br><br>
                        @if ($item->nama_pasangan != '')
                            (<b>{{ $item->nama_penjamin }}</b>)
                            (<b>{{ $item->nama_pasangan }}</b>)
                        @else
                            (<b>{{ $item->nama_penjamin }}</b>)
                        @endif
                    </td>
                </tr>
            @endforeach
        @endif
    </table>
</div>
