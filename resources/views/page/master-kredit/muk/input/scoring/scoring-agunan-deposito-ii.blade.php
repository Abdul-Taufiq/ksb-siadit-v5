<div class="col-md-8 mb-3">
    <div class="form-group">
        <label class="notbold" for="depo_tujuan_penilaian_{{ $loop->iteration }}">Tujuan Penilaian</label>
        <input type="text" name="depo_tujuan_penilaian_{{ $loop->iteration }}"
            id="depo_tujuan_penilaian_{{ $loop->iteration }}" class="form-control form-control-sm" required
            value="{{ data_get($depo, "$vanalisTab.tujuan_penilaian") ?? (data_get($depo, "$vanalisDepo.tujuan_penilaian") ?? (data_get($depo, "$vcabTab.tujuan_penilaian") ?? data_get($depo, "$vcabDepo.tujuan_penilaian"))) }}">
    </div>
</div>

<div class="col-md-12">
    <table class="table table-striped table-sm w-100">
        <tr>
            <td>
                <label class="notbold" for="depo_nilai_pasar_agunan_{{ $loop->iteration }}">Nilai Pasar Agunan</label>
            </td>
            <td>
                <div class="input-group input-group-sm">
                    <span class="input-group-text">Rp</span>
                    <input type="text" name="depo_nilai_pasar_agunan_{{ $loop->iteration }}"
                        id="depo_nilai_pasar_agunan_{{ $loop->iteration }}" class="form-control form-control-sm setRp"
                        required data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                        data-bs-title="Jika ada perubahan SAFETY MARGIN (SM) Mohon untuk update nilai dibawah ini agar Sinkron"
                        value="{{ number_format(data_get($depo, "$vanalisTab.nilai_pasar") ?? (data_get($depo, "$vanalisDepo.nilai_pasar_agunan") ?? (data_get($depo, "$vcabTab.nilai_pasar") ?? data_get($depo, "$vcabDepo.nilai_pasar_agunan"))), 0, ',', '.') }}">
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <label class="notbold" for="depo_safety_margin_{{ $loop->iteration }}">Safety Margin (SM)</label>
            </td>
            <td>
                <div class="input-group input-group-sm">
                    <input type="number" name="depo_safety_margin_{{ $loop->iteration }}"
                        id="depo_safety_margin_{{ $loop->iteration }}" class="form-control form-control-sm" required
                        value="{{ data_get($depo, "$vanalisTab.safety_margin") ?? (data_get($depo, "$vanalisDepo.safety_margin") ?? (data_get($depo, "$vcabTab.safety_margin") ?? data_get($depo, "$vcabDepo.safety_margin"))) }}"
                        min="0">
                    <span class="input-group-text">%</span>
                </div>
            </td>
            <td>
                <label for="depo_score_{{ $loop->iteration }}">Score</label>
            </td>
            <td>
                <input type="number" name="depo_score_{{ $loop->iteration }}" id="depo_score_{{ $loop->iteration }}"
                    class="form-control form-control-sm" required min="0"
                    value="{{ data_get($depo, "$vanalisTab.score") ?? (data_get($depo, "$vanalisDepo.score") ?? (data_get($depo, "$vcabTab.score") ?? data_get($depo, "$vcabDepo.score"))) }}">
            </td>
        </tr>
        <tr>
            <td>
                <label class="notbold" for="depo_nilai_pasar_setelah_sm_{{ $loop->iteration }}">Nilai Pasar Setelah
                    SM</label>
            </td>
            <td>
                <div class="input-group input-group-sm">
                    <span class="input-group-text">Rp</span>
                    <input type="text" name="depo_nilai_pasar_setelah_sm_{{ $loop->iteration }}"
                        id="depo_nilai_pasar_setelah_sm_{{ $loop->iteration }}"
                        class="form-control form-control-sm setRp" required readonly
                        value="{{ number_format(data_get($depo, "$vanalisTab.nilai_pasar_setelah_sm") ?? (data_get($depo, "$vanalisDepo.nilai_pasar_setelah_sm") ?? (data_get($depo, "$vcabTab.nilai_pasar_setelah_sm") ?? data_get($depo, "$vcabDepo.nilai_pasar_setelah_sm"))), 0, ',', '.') }}">
                </div>
            </td>
        </tr>
    </table>
</div>
