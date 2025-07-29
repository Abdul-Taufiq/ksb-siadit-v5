<div>
    {{-- The best athlete wants his opponent at his best. --}}
    {{-- fitur searching --}}
    @include('livewire.komponen.searching-table')



    <div class="table-responsive">
        <table class="table table-striped table-hover table-sm w-100">
            <thead class="table-primary">
                <tr>
                    <th style="width: 5%; vertical-align: middle">No</th>
                    {{-- cabang --}}
                    @include('livewire.komponen.sorting-table', [
                        'nameSort' => 'id_cabang',
                        'displayName' => 'Cabang',
                    ])
                    {{-- no spk --}}
                    @include('livewire.komponen.sorting-table', [
                        'nameSort' => 'username',
                        'displayName' => 'Username',
                    ])
                    {{-- Email --}}
                    @include('livewire.komponen.sorting-table', [
                        'nameSort' => 'email',
                        'displayName' => 'Email',
                    ])
                    {{-- Aksi --}}
                    @include('livewire.komponen.sorting-table', [
                        'nameSort' => 'aksi',
                        'displayName' => 'Aksi',
                    ])
                </tr>
            </thead>
            <tbody style="vertical-align: middle">
                @foreach ($log as $data => $item)
                    <tr wire:key='{{ sha1($item->id) }}'>
                        <td>{{ $loop->index + $log->firstItem() }}</td>
                        <td>{{ $item->cabang->cabang }}</td>
                        <td>{{ $item->username }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{!! $item->aksi !!}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    {{ $log->onEachSide(1)->links('vendor.livewire.bootstrap', data: ['scrollTo' => false]) }}
</div>
