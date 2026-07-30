<div class="bg-primary mb-2 p-2 text-white">
    <h6 class="mx-2" style="font-size: 12px">CABANG</h6>
</div>

<table class="table table-sm w-100 table-borderless">
    <tr>
        <td style="width: 35%">Mengetahui</td>
        <td style="width: 35%">Review</td>
        <td style="width: 30%">Penilai</td>
    </tr>
    <tr>
        <td style="text-align: center">
            <br><br><br><br>
            {!! !empty($muk->putusan->nama_ao) ? $muk->putusan->nama_pincab ?? '<br>' : '' !!}
            <hr style="margin: 0;">
            {{ $muk->id_cabang == '1' ? 'Kepala Kantor' : 'Pimpinan Cabang' }}
        </td>
        <td style="text-align: center">
            <br><br><br><br>
            {!! !empty($muk->putusan->nama_ao) ? $muk->putusan->nama_kakom ?? '<br>' : '' !!}
            <hr style="margin: 0;">
            @switch($muk->putusan?->nama_kakom)
                @case('Feppi Kurniasari')
                    Kepala Kantor Kas
                @break

                @case('Arief Murtono')
                @case('Fitriana Eka Susanti')
                    Team Leader
                @break

                @default
                    Kasi Komersial
            @endswitch
        </td>
        <td style="text-align: center">
            <br><br><br><br>
            {!! !empty($muk->putusan->nama_ao) ? $muk->putusan->nama_analis_cabang ?? '<br>' : '' !!}
            <hr style="margin: 0;">
            Analis Kredit
        </td>
    </tr>
</table>

{{-- area --}}
@if ($muk->kredit->persetujuan->putusan == 'Area' || $muk->kredit->persetujuan->putusan == 'Pusat')
    <div class="bg-primary mb-2 p-2 text-white">
        <h6 class="mx-2" style="font-size: 12px">AREA</h6>
    </div>
    <table class="table table-sm w-100 table-borderless">
        <tr>
            <td style="width: 35%">Mengetahui</td>
            <td style="width: 35%">Review I</td>
            <td style="width: 30%">Review II</td>
        </tr>
        <tr>
            <td style="text-align: center">
                <br><br><br><br>
                {!! !empty($muk->putusan->nama_ao) ? $muk->putusan->nama_manajer_area ?? '<br>' : '' !!}
                <hr style="margin: 0;">
                Manajer Area
            </td>
            <td style="text-align: center">
                <br><br><br><br>
                {!! !empty($muk->putusan->nama_ao) ? $muk->putusan->nama_analis_area ?? '<br>' : '' !!}
                <hr style="margin: 0;">
                Analis Area
            </td>
            <td style="text-align: center">
                <br><br><br><br>
                {!! !empty($muk->putusan->nama_ao) ? $muk->putusan->nama_analis_komite ?? '<br>' : '' !!}
                <hr style="margin: 0;">
                Analis Komite
            </td>
        </tr>
    </table>
@endif


{{-- pusat --}}
@if ($muk->kredit->persetujuan->putusan == 'Pusat')
    <div class="bg-primary mb-2 p-2 text-white">
        <h6 class="mx-2" style="font-size: 12px">KANTOR PUSAT</h6>
    </div>
    <table class="table table-sm w-100 table-borderless">
        <tr>
            <td colspan="2" style="width: 65%; text-align: center">Mengetahui</td>
            <td style="width: 35%">Review I</td>
        </tr>
        <tr>
            <td style="text-align: center">
                <br><br><br><br>
                {!! !empty($muk->putusan->nama_ao) ? $muk->putusan->nama_direktur_utama ?? '<br>' : '' !!}
                <hr style="margin: 0;">
                Direktur Utama
            </td>
            <td style="text-align: center">
                <br><br><br><br>
                {!! !empty($muk->putusan->nama_ao) ? $muk->putusan->nama_direktur_komersial ?? '<br>' : '' !!}
                <hr style="margin: 0;">
                Direktur Komersial
            </td>
            <td style="text-align: center">
                <br><br><br><br>
                {!! !empty($muk->putusan->nama_ao) ? $muk->putusan->nama_analis_pst ?? '<br>' : '' !!}
                <hr style="margin: 0;">
                Analis Pusat
            </td>
        </tr>
    </table>
@endif
