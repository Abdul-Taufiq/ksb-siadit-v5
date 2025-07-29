<div wire:ignore.self class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true"
    data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 style="font-size: 15px;">{{ $modal_title }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click='HideModal'
                    aria-label="Close"></button>
            </div>
            <div class="card-body">
                <div class="container py-2">
                    <h6>Untuk Pertama Silahkan Pilih Data SPK</h6> <br>
                    <div class="form-group" wire:ignore>
                        <label for="spk">Pilih SPK</label>
                        <select class="form-select is-invalid" id="spk" data-placeholder="Choose one thing">
                            <option value=""></option>
                            @foreach ($spk as $xdata => $itemSPK)
                                <option value="{{ base64_encode($itemSPK->id_kredit) }}">{{ $itemSPK->no_spk }} -
                                    {{ $itemSPK->debitur->nama_debitur }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                    wire:click='HideModal'>Close</button>
            </div>
        </div>
    </div>
</div>
