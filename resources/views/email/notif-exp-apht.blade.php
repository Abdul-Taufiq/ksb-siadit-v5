<div style="background-color: #f2f2f2; padding: 20px;">
    <div style="background-color: white; padding: 20px; border-radius: 5px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);">
        <h3 style="font-family: Arial, sans-serif;">Hallo,</h3>
        <p style="font-family: Arial, sans-serif;">
            COVERNOTE {{ $jns_perikatan }} dengan data : <br>
        <table style="text-align: left;">
            <tr>
                <th>Kode</th>
                <td>: {{ $kode }}</td>
            </tr>
            <tr>
                <th>Jenis Perikatan</th>
                <td>: {{ $jns_perikatan }}</td>
            </tr>
            <tr>
                <th>Nomor</th>
                <td>: {{ $nomor }}</td>
            </tr>
            <tr>
                <th>Cabang</th>
                <td>: {{ $kc }}</td>
            </tr>
            <tr>
                <th>Tgl Awal Covernote</th>
                <td>: {{ $tgl_awal->translatedformat('d F Y') }}</td>
            </tr>
            <tr>
                <th>Tgl Akhir Covernote</th>
                <td>: {{ $tgl_akhir->translatedformat('d F Y') }}</td>
            </tr>
            <tr>
                <th>Keterangan</th>
                <td>: {{ $keterangan }}</td>
            </tr>
        </table> <br>
        Akan Segera <strong>Expired</strong> nihhh, segera follow up sekarang !<br>
        Cek aplikasi SIADIT berbasis web sekarang untuk meninjau form tersebut.
        <a href="https://ksb-kredit-v2.bprkusumasumbing.com/">Akses Aplikasi Disini!</a>
        <br><br>
        <b>Regard,</b> <br>
        <b>PT BPR Kusuma Sumbing</b>
        </p>
    </div>
</div>
