{{-- pasal 1 --}}
<div class="mb-4">
    <div class="header">
        <h3>PASAL 1</h3>
        <h3 style="margin-left: 20px;">JUMLAH KREDIT</h3>
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
