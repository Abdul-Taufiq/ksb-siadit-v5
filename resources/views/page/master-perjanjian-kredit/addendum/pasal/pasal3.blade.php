{{-- pasal 3 --}}
<div class="mb-4">
    <div class="header">
        <h3>PASAL 3</h3>
        <h3 style="margin-left: 20px;">JANGKA WAKTU KREDIT</h3>
    </div>
    <div class="isi">
        Kredit ini diberikan untuk jangka {{ $pkpmk->kredit->jkw }} ({{ terbilang_only($pkpmk->kredit->jkw) }}) bulan,
        terhitung mulai tanggal {!! $pkpmk->kredit->tgl_awal?->translatedFormat('d F Y') ?? '<i class="text-danger">Not Display in Here</i>' !!} sampai tanggal
        {!! $pkpmk->kredit->tgl_akhir?->translatedFormat('d F Y') ?? '<i class="text-danger">Not Display in Here</i>' !!}.
    </div>
</div>
{{-- end pasal 3 --}}
