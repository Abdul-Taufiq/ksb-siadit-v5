@switch(Auth::user()->jabatan)
    {{-- AO --}}
    @case('AO')
        @if ($kredit->status_ao == null)
            <a href="{{ route('debitur.edit', ['id' => encrypt($kredit->debitur->id_debitur), 'metode' => 'edit']) }}"
                class="btn btn-warning btn-sm btn-aksi edit_data" title="Edit">
                <i class="fa fa-edit"></i>
            </a>
        @else
            <a href="#" class="btn btn-outline-warning btn-sm btn-aksi edit_data disabled" title="Edit">
                <i class="fa fa-edit"></i>
            </a>
        @endif
    @break

    {{-- Analis --}}
    @case('Analis Cabang')
        @if ($kredit->status_ao != null && $kredit->status_analis == null)
            @if ($kredit->status_ao != 'Reject')
                <a href="{{ route('debitur.edit', ['id' => encrypt($kredit->debitur->id_debitur), 'metode' => 'edit']) }}"
                    class="btn btn-warning btn-sm btn-aksi edit_data" title="Edit">
                    <i class="fa fa-edit"></i>
                </a>
            @else
                <a href="#" class="btn btn-outline-warning btn-sm btn-aksi edit_data disabled" title="Edit">
                    <i class="fa fa-edit"></i>
                </a>
            @endif
        @else
            <a href="#" class="btn btn-outline-warning btn-sm btn-aksi edit_data disabled" title="Edit">
                <i class="fa fa-edit"></i>
            </a>
        @endif
    @break

    {{-- legal --}}
    @case('Legal')
        @if ($kredit->status_akhir == 'DISETUJUI' && $kredit->status_legal != 'Printed')
            <a href="{{ route('debitur.edit', ['id' => encrypt($kredit->debitur->id_debitur), 'metode' => 'edit']) }}"
                class="btn btn-warning btn-sm btn-aksi edit_data" title="Edit">
                <i class="fa fa-edit"></i>
            </a>
        @else
            <a href="#" class="btn btn-outline-warning btn-sm btn-aksi edit_data disabled" title="Edit">
                <i class="fa fa-edit"></i>
            </a>
        @endif
    @break

    @default
        <a href="#" class="btn btn-outline-warning btn-sm btn-aksi edit_data disabled" title="Edit">
            <i class="fa fa-edit"></i>
        </a>
    @break

@endswitch
