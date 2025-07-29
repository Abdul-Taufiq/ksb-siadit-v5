{{-- pasal 4 --}}
<div class="mb-4">
    <div class="header">
        <h3>PASAL 4</h3>
        <h3 style="margin-left: 20px;">CARA PEMBAYARAN dan DENDA</h3>
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
