{{-- pasal 1 --}}
<div class="mb-4">
    <div class="header">
        <h3>PASAL 1</h3>
        <h3>JUMLAH KREDIT</h3>
    </div>
    <div class="isi">
        <b>BANK</b> dengan ini menyetujui untuk memberikan pinjaman uang/kredit kepada <b>DEBITUR</b>
        sejumlah
        {{ 'Rp' . number_format($pkpmk->kredit->jumlah_disetujui, 0, ',', '.') }}
        ({{ terbilang_id($pkpmk->kredit->jumlah_disetujui) }}), yang mana dana tersebut benar-benar akan
        dipergunakan sendiri oleh <b>DEBITUR</b> untuk {{ $pkpmk->kredit->tujuan_pengajuan }}, untuk hal mana
        <b>DEBITUR</b> dengan ini mengakui telah menerima pinjaman uang/kredit sejumlah tersebut diatas.
    </div>
</div>
{{-- end pasal 1 --}}


{{-- pasal 2 --}}
<div class="mb-4">
    <div class="header">
        <h3>PASAL 2</h3>
        <h3>BUNGA, BIAYA DAN PROVISI</h3>
    </div>
    <div class="row">
        <div class="col-md-1">(1)</div>
        <div class="col-md-11">
            Untuk kredit tersebut <b>DEBITUR</b> wajib membayar bunga
            {{ number_format($pkpmk->persetujuan->besar_bunga, 2, ',', '.') }}%
            ({{ persen_id($pkpmk->persetujuan->besar_bunga) }}) {{ $pkpmk->persetujuan->jns_bunga }} per
            tahun atas dasar jumlah yang terhutang dan harus dibayar oleh <b>DEBITUR</b> kepada <b>BANK</b> setiap

            @if ($pkpmk->persetujuan->jns_kredit == 'Angsuran')
                bulan bersama-sama dengan pembayaran angsuran pokok pinjaman.
            @else
                bulan.
            @endif
        </div>
        <div class="clearfix"></div>
        <div class="col-md-1">(2)</div>
        <div class="col-md-11">
            Tanpa pemberitahuan kepada <b>DEBITUR, BANK</b> setiap saat berhak melakukan perubahan suku
            bunga sesuai dengan perkembangan moneter.
        </div>
    </div>
    <div class="row">
        <div class="col-md-1">(3)</div>
        <div class="col-md-11">
            <b>DEBITUR</b> harus membayar biaya yang timbul dari perjanjian ini:
        </div>
    </div>
    {{-- isi dari no 3 --}}
    <div class="row" style="margin-left: 2.5rem;">
        <div class="col-md-1">a.</div>
        <div class="col-md-11" style="width: 93% !important">
            Provisi sebesar {{ number_format($pkpmk->persetujuan->provisi, 2, ',', '.') }}%
            ({{ persen_id($pkpmk->persetujuan->provisi) }}) X (dikali) jumlah
            kredit yang diberikan atau sama dengan
            {{ 'Rp' . number_format($pkpmk->persetujuan->jumlah_provisi, 0, ',', '.') }}
            ({{ terbilang_id($pkpmk->persetujuan->jumlah_provisi) }}).
        </div>
        <div class="clearfix"></div>
        <div class="col-md-1">b.</div>
        <div class="col-md-11" style="width: 93% !important">
            Biaya administrasi sebesar {{ number_format($pkpmk->persetujuan->besar_adm, 2, ',', '.') }}%
            ({{ persen_id($pkpmk->persetujuan->besar_adm) }}) X (dikali)
            jumlah kredit yang diberikan atau sama dengan
            {{ 'Rp' . number_format($pkpmk->persetujuan->biaya_adm, 0, ',', '.') }}
            ({{ terbilang_id($pkpmk->persetujuan->biaya_adm) }}).
        </div>
        <div class="clearfix"></div>
        <div class="col-md-1">c.</div>
        <div class="col-md-11" style="width: 93% !important">
            Biaya survey sebesar {{ number_format($pkpmk->persetujuan->besar_survey, 2, ',', '.') }}%
            ({{ persen_id($pkpmk->persetujuan->besar_survey) }}) X (dikali)
            jumlah kredit yang diberikan atau sama dengan
            {{ 'Rp' . number_format($pkpmk->persetujuan->biaya_survey, 0, ',', '.') }}
            ({{ terbilang_id($pkpmk->persetujuan->biaya_survey) }}).
        </div>
        @if ($pkpmk->persetujuan->asuransi == 'Ya')
            <div class="clearfix"></div>
            <div class="col-md-1">d.</div>
            <div class="col-md-11" style="width: 93% !important">
                Biaya Asuransi sebesar {{ 'Rp' . number_format($pkpmk->persetujuan->biaya_asuransi, 0, ',', '.') }}
                ({{ terbilang_id($pkpmk->persetujuan->biaya_asuransi) }}).
            </div>
        @endif
        <div class="clearfix"></div>
        Beserta dengan biaya-biaya notaris dan biaya materai yang timbul dari perjanjian ini, yang
        dibayar sekaligus lunas pada saat perjanjian kredit ditanda-tangani.
    </div>

    <div class="row">
        <div class="col-md-1">(4)</div>
        <div class="col-md-11">
            Semua biaya penagihan diluar dan dihadapan hakim antara lain biaya juru sita dan biaya kuasa
            <b>BANK</b> untuk menagih hutang itu serta biaya-biaya notaris dipikul dan dibayar <b>DEBITUR</b>.
        </div>
        <div class="clearfix"></div>
        <div class="col-md-1">(5)</div>
        <div class="col-md-11">
            <b>DEBITUR</b> akan mengakui bahwa pembukuan dan catatan <b>BANK</b> merupakan bukti
            satu-satunya yang lengkap dan mengikat atas jumlah kredit <b>DEBITUR</b> kepada <b>BANK.</b>
        </div>
    </div>
</div>
{{-- end pasal 2 --}}


{{-- pasal 3 --}}
<div class="mb-4">
    <div class="header">
        <h3>PASAL 3</h3>
        <h3>JANGKA WAKTU KREDIT</h3>
    </div>
    <div class="isi">
        Kredit ini diberikan untuk jangka {{ $pkpmk->kredit->jkw }} ({{ terbilang_only($pkpmk->kredit->jkw) }}) bulan,
        terhitung mulai tanggal {!! $pkpmk->kredit->tgl_awal?->translatedFormat('d F Y') ?? '<i class="text-danger">Not Display in Here</i>' !!} sampai tanggal
        {!! $pkpmk->kredit->tgl_akhir?->translatedFormat('d F Y') ?? '<i class="text-danger">Not Display in Here</i>' !!}.
    </div>
</div>
{{-- end pasal 3 --}}


{{-- pasal 4 --}}
<div class="mb-4">
    <div class="header">
        <h3>PASAL 4</h3>
        <h3>CARA PEMBAYARAN dan DENDA</h3>
    </div>
    <div class="row">
        <div class="col-md-1">(1)</div>
        <div class="col-md-11">
            @if ($pkpmk->persetujuan->jns_kredit == 'Angsuran')
                Pembayaran kembali kredit yang telah diberikan tersebut berupa pokok beserta bunganya wajib
                dilakukan oleh <b>DEBITUR</b> kepada <b>BANK</b> secara mengangsur sebesar
                {{ 'Rp' . number_format($pkpmk->persetujuan->jumlah_angsuran, 0, ',', '.') }}
                ({{ terbilang_id($pkpmk->persetujuan->jumlah_angsuran) }}) X (dikali) jangka waktu secara
                berturut-turut tanpa terputus
                dalam
                jangka waktu {{ $pkpmk->kredit->jkw }} ({{ terbilang_only($pkpmk->kredit->jkw) }}) bulan sejak ditanda
                tanganinya
                perjanjian ini sesuai jadwal dan jumlah angsuran seperti tercantum dalam jadwal angsuran
                terlampir.
            @else
                Pembayaran kembali pokok kredit yang telah diberikan tersebut wajib dilakukan oleh
                <b>DEBITUR</b> yaitu 1 X (dikali)
                {{ 'Rp' . number_format($pkpmk->kredit->jumlah_disetujui, 0, ',', '.') }}
                ({{ terbilang_id($pkpmk->kredit->jumlah_disetujui) }}). Satu kali
                sekaligus lunas, selambat-lambatnya pada jangka waktu sesuai Pasal 3 (TIGA) diatas.
            @endif
        </div>
    </div>
    <div class="row">
        <div class="clearfix"></div>
        <div class="col-md-1">(2)</div>
        <div class="col-md-11">
            @if ($pkpmk->persetujuan->jns_kredit == 'Angsuran')
                Pembayaran kembali kredit yang telah diberikan tersebut baik berupa pokok berserta bunga
                wajib dibayarkan oleh <b>DEBITUR</b> kepada <b>BANK</b> paling lambat pada tanggal
                {!! $pkpmk->tgl_akhir?->translatedFormat('d') ?? '<i class="text-danger">Not Display in Here</i>' !!} setiap bulan
                tanpa terputus selama Perjanjian Kredit.
            @else
                Pembayaran kembali kredit berupa bunga wajib dibayarkan oleh <b>DEBITUR</b> kepada
                <b>BANK</b>
                paling lambat
                pada tanggal {!! $pkpmk->tgl_akhir?->translatedFormat('d') ?? '<i class="text-danger">Not Display in Here</i>' !!}
                setiap bulan tanpa terputus selama Perjanjian Kredit.
            @endif
        </div>
    </div>
    <div class="row">
        <div class="clearfix"></div>
        <div class="col-md-1">(3)</div>
        <div class="col-md-11">
            @if ($pkpmk->persetujuan->jns_kredit == 'Angsuran')
                <b>DEBITUR</b> diperbolehkan melunasi sebagian/seluruh kredit tersebut sebelum waktunya,
                dengan
                memperhatikan ketentuan yang berlaku pada <b>BANK</b>, antara lain harus dilakukan pada saat
                angsuran jatuh tempo. Sebagai akibat dari pelunasan dipercepat tersebut maka <b>BANK</b>
                akan
                menghitung kembali pembayaran pokok dan bunga yang harus dibayar oleh <b>DEBITUR</b> dan
                <b>DEBITUR</b> dengan ini menyetujui perhitungan <b>BANK</b> tersebut.
            @else
                <b>DEBITUR</b> wajib melakukan pembayaran kembali atas semua hutang–hutang yang timbul
                berdasarkan Perjanjian ini dan atau perubahan/perpanjangannya baik karena hutang pokok,
                bunga,
                denda maupun biaya–biaya yang menjadi tanggungan <b>DEBITUR</b> selambat–lambatnya tanggal
                {!! $pkpmk->tgl_akhir?->translatedFormat('d') ?? '<i class="text-danger">Not Display in Here</i>' !!}. Sesuai
                jadwal
                pembayaran bunga terlampir.
            @endif
        </div>
    </div>

    @if ($pkpmk->persetujuan->jns_kredit == 'Angsuran')
        <div class="row">
            <div class="col-md-1">(4)</div>
            <div class="col-md-11">
                Apabila <b>DEBITUR</b> terlambat membayar angsuran (pokok dan/atau bunga) sesuai jadwal yang
                ditetapkan diatas, maka <b>DEBITUR</b> dikenakan denda sebesar 2 ‰ (Dua permil) per hari
                atas
                jumlah angsuran yang harus dibayar. Denda mana yang harus dibayar secara sekaligus dan tunai
                bersamaan dengan angsuran yang tertunggak.
            </div>
        </div>
        <div class="row">
            <div class="col-md-1">(5)</div>
            <div class="col-md-11">
                Setiap kali terjadi perubahan suku bunga maka <b>BANK</b> akan memperhitungkan kembali
                jumlah angsuran yang harus dibayar kepada <b>BANK</b> dan <b>DEBITUR</b> dengan ini menyatakan
                tunduk pada jumlah perhitungan angsuran baru yang di maksud.
            </div>
        </div>
        <div class="row">
            <div class="col-md-1">(6)</div>
            <div class="col-md-11">
                Apabila <b>DEBITUR</b> melunasi sisa pinjaman pada saat pinjaman belum jatuh tempo, maka
                <b>DEBITUR</b> dikenakan pinalti sebesar {{ $pkpmk->persetujuan->penalty }}
                ({{ terbilang_only($pkpmk->persetujuan->penalty) }}) kali bunga.
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-md-1">(4)</div>
            <div class="col-md-11">
                <b>DEBITUR</b> diperbolehkan untuk melunasi sebagian pokok pinjaman yang dipinjamkan, dengan
                dilakukan penghitungan ulang besaran bunga yang wajib dibayarkan kepada <b>BANK</b> setiap
                bulannya. Menjadi satu kesatuan dan tidak terpisahkan dari <b>PERJANJIAN KREDIT</b> ini.
            </div>
        </div>
        <div class="row">
            <div class="col-md-1">(5)</div>
            <div class="col-md-11">
                Apabila <b>DEBITUR</b> terlambat membayar angsuran (pokok dan/atau bunga) sesuai jadwal yang
                ditetapkan diatas, maka <b>DEBITUR</b> dikenakan denda sebesar 2 ‰ (Dua permil) per hari
                atas
                jumlah angsuran yang harus dibayar. Denda mana yang harus dibayar secara sekaligus dan tunai
                bersamaan dengan angsuran yang tertunggak.
            </div>
        </div>
        <div class="row">
            <div class="col-md-1">(6)</div>
            <div class="col-md-11">
                Setiap kali terjadi perubahan suku bunga maka <b>BANK</b> akan memperhitungkan kembali
                jumlah
                angsuran yang harus dibayar kepada <b>BANK</b> dan <b>DEBITUR</b> dengan ini menyatakan
                tunduk
                pada jumlah perhitungan angsuran baru yang di maksud.
            </div>
        </div>
    @endif
</div>
{{-- end pasal 4 --}}
