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
            @if ($kredit->status_ao != 'Reject' && $kredit->status_ao != 'Cencel')
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
        @php
            $pkpmkPrinted = $kredit->pkpmk->first()?->tgl_print_pkpmk;
            $addendumPrinted = $kredit->addendum?->tgl_print_addendum;
            if ($pkpmkPrinted != null) {
                $pkPrint = $kredit->pkpmk->first()?->tgl_print_pkpmk;
            } else {
                $pkPrint = null;
            }

            if ($addendumPrinted != null) {
                $addPrint = $kredit->addendum?->tgl_print_addendum;
            } else {
                $addPrint = null;
            }
        @endphp

        @if ($kredit->status_akhir == 'DISETUJUI')
            @if ($pkPrint != null || $addPrint != null)
                <a href="#" class="btn btn-outline-warning btn-sm btn-aksi edit_data disabled" title="Edit">
                    <i class="fa fa-edit"></i>
                </a>
            @else
                <a href="{{ route('debitur.edit', ['id' => encrypt($kredit->debitur->id_debitur), 'metode' => 'edit']) }}"
                    class="btn btn-warning btn-sm btn-aksi edit_data" title="Edit">
                    <i class="fa fa-edit"></i>
                </a>
            @endif
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
