<div class="row mb-3 mt-1">
    <div class="col-md-4">
        <div class="row">
            <div class="col-md-4">
                <label><strong>Showing:</strong></label>
                <select class="form-select form-select-sm" wire:model.live.debounce.300ms="perPage"
                    style="max-width: 400px;">
                    <option selected value="10">10</option>
                    <option value="20">20</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                    <option value="All">All (mungkin perlu waktu)</option>
                </select>
            </div>

            @php
                $level = Auth::user()->level;
            @endphp

            <div class="col-md-8 {{ $kc === true ? '' : 'd-none' }}">
                <label><strong>Kantor Cabang:</strong></label>
                <select class="form-select form-select-sm" wire:model.live.debounce.300ms='id_cabang' id="id_cabang">
                    @if ($level == 'SUPER USER' || $level == 'DIREKTUR')
                        <option value="99">- All cabang -</option>
                        <option value="AREA 1">AREA 1</option>
                        <option value="AREA 2">AREA 2</option>
                        <option value="AREA 3">AREA 3</option>
                        <option value="1">Kantor Pusat Operasional</option>
                        <option value="2">KC Temanggung</option>
                        <option value="3">KC Wonosobo</option>
                        <option value="4">KC Ambarawa</option>
                        <option value="5">KC Semarang</option>
                        <option value="6">KC Mranggen</option>
                        <option value="7">KC Sukorejo</option>
                        <option value="8">KC Weleri</option>
                        <option value="9">KC Delanggu</option>
                        <option value="10">KC Gombong</option>
                        <option value="11">KC Sokaraja</option>
                    @elseif ($level == 'AREA 1')
                        <option value="AREA 1">AREA 1</option>
                        <option value="4">KC Ambarawa</option>
                        <option value="5">KC Semarang</option>
                        <option value="6">KC Mranggen</option>
                        <option value="8">KC Weleri</option>
                        <option value="11">KC Sokaraja</option>
                    @elseif ($level == 'AREA 2')
                        <option value="AREA 2">AREA 2</option>
                        <option value="1">Kantor Pusat Operasional</option>
                        <option value="2">KC Temanggung</option>
                        <option value="7">KC Sukorejo</option>
                        <option value="9">KC Delanggu</option>
                    @elseif ($level == 'AREA 3')
                        <option value="AREA 3">AREA 3</option>
                        <option value="3">KC Wonosobo</option>
                        <option value="10">KC Gombong</option>
                    @else
                        <option value="{{ $id_cabang }}">{{ $id_cabang }}</option>
                    @endif
                </select>
            </div>
        </div>
    </div>
    <div class="col-md-4 text-start">
        <div class="row">
            <div class="col-md-6">
                <label><strong>Filter From:</strong></label>
                <input type="date" class="form-control form-control-sm" wire:model.live.debounce.300ms="tgl_awal"
                    placeholder="Tanggal" id="tgl_awal">
            </div>
            <div class="col-md-6">
                <label><strong>To:</strong></label>
                <input type="date" class="form-control form-control-sm" wire:model.live.debounce.300ms="tgl_akhir"
                    placeholder="Tanggal" id="tgl_akhir">
            </div>
        </div>
    </div>
    <div class="col-md-4 text-md-start">
        <label for="search"><strong>Search:</strong></label>
        <div class="d-flex align-items-center">
            <input type="search" id="search" wire:model.live.debounce.300ms="search"
                class="form-control form-control-sm" placeholder="Cari data..." style="max-width: 400px;">

            <button class="btn btn-primary btn-sm ms-2" title="Refresh" wire:click="resetFilter" wire:key="refresh-btn">
                <i class="fa-solid fa-arrows-rotate"></i>
            </button>
        </div>
    </div>
</div>
