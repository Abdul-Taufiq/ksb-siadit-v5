<div class="btn-group dropend">
    <button type="button" class="btn btn-secondary dropdown-toggle"
        style="width: 60px; height: 20px; font-size: 12px; margin: 0px; padding: 0px;" data-bs-toggle="dropdown"
        aria-expanded="false">
        Status
    </button>
    <ul class="dropdown-menu">
        <li>
            <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalSPK"
                wire:click='ShowModal("Approve", "{{ $kredit->no_spk }}", "{{ base64_encode($kredit->id_kredit) }}")'>Approve
            </button>
        </li>
        <li>
            <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalSPK"
                wire:click='ShowModal("Reject", "{{ $kredit->no_spk }}", "{{ base64_encode($kredit->id_kredit) }}")'>Reject</button>
        </li>
        @if (Auth::user()->jabatan == 'AO' || Auth::user()->jabatan == 'Pimpinan Cabang')
            <li>
                <button type="button" class="dropdown-item"
                    onclick="if(confirm('Yakin Reject Data Berdasarkan SLIK? \n Biasanya digunakan saat SLIK jelek!')) 
                { @this.call('RejectSLIK', '{{ $kredit->no_spk }}', '{{ base64_encode($kredit->id_kredit) }}') }">
                    Reject SLIK
                </button>
            </li>
        @endif

        {{-- status Cancel --}}
        @if ($jabatan != 'Legal' || $jabatan != 'Kasi Operasional')
            <li>
                <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalSPK"
                    wire:click='ShowModal("Cancel", "{{ $kredit->no_spk }}", "{{ base64_encode($kredit->id_kredit) }}")'>Cancel</button>
            </li>
        @endif
    </ul>
</div>
