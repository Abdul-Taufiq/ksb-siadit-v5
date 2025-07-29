{{-- pasal 2 --}}
<div class="mb-4">
    <div class="header">
        <h3>PASAL 2</h3>
        <h3 style="margin-left: 20px;">BUNGA, BIAYA DAN PROVISI</h3>
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
