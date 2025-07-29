<div>
    {{-- fitur searching --}}
    @include('livewire.komponen.searching-table')



    <div class="table-responsive">
        <table class="table table-striped table-hover table-sm w-100">
            <thead class="{{ $code_page == 'deleted' ? 'table-danger' : 'table-primary' }}">
                <tr>
                    <th style="width: 5%; vertical-align: middle">No</th>
                    {{-- nama --}}
                    @include('livewire.komponen.sorting-table', [
                        'nameSort' => 'nama',
                        'displayName' => 'Nama',
                    ])
                    {{-- email --}}
                    @include('livewire.komponen.sorting-table', [
                        'nameSort' => 'email',
                        'displayName' => 'Email',
                    ])
                    {{-- role --}}
                    @include('livewire.komponen.sorting-table', [
                        'nameSort' => 'role',
                        'displayName' => 'Role',
                    ])
                    {{-- status --}}
                    <th style="vertical-align: middle;">Status</th>
                    <th style="width: 10%; vertical-align: middle;">Aksi</th>
                </tr>
            </thead>
            <tbody style="vertical-align: middle">
                @foreach ($users as $user => $item)
                    <tr wire:key='{{ sha1($item->id) }}'>
                        <td>{{ $loop->index + $users->firstItem() }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->role }}</td>
                        <td>
                            <div class="form-check form-switch">
                                @if ($code_page == 'index')
                                    {{-- cek data punya e sendiri atau ga --}}
                                    @if ($item->id != auth()->user()->id)
                                        @if ($item->is_active == 'active')
                                            <input style="height: 17px; width: 28px" class="form-check-input"
                                                type="checkbox" role="switch" id="status{{ encrypt($item->id) }}"
                                                wire:click="userStatus('{{ encrypt($item->id) }}')" checked>
                                            <span class="form-check-label badge bg-success"
                                                for="status{{ encrypt($item->id) }}">Aktif</span>
                                        @else
                                            <input style="height: 17px; width: 28px" class="form-check-input"
                                                type="checkbox" role="switch" id="status{{ encrypt($item->id) }}"
                                                wire:click="userStatus('{{ encrypt($item->id) }}')">
                                            <span class="form-check-label badge bg-danger"
                                                for="status{{ encrypt($item->id) }}">Tidak Aktif</span>
                                        @endif
                                    @else
                                        @if ($item->is_active == 'active')
                                            <input style="height: 17px; width: 28px" class="form-check-input"
                                                type="checkbox" role="switch" disabled checked>
                                            <span class="form-check-label badge bg-success">Aktif</span>
                                        @else
                                            <input style="height: 17px; width: 28px" class="form-check-input"
                                                type="checkbox" role="switch" disabled>
                                            <span class="form-check-label badge bg-danger">Tidak Aktif</span>
                                        @endif
                                    @endif
                                @else
                                    @if ($item->is_active == 'active')
                                        <input style="height: 17px; width: 28px" class="form-check-input"
                                            type="checkbox" role="switch" disabled checked>
                                        <span class="form-check-label badge bg-success">Aktif</span>
                                    @else
                                        <input style="height: 17px; width: 28px" class="form-check-input"
                                            type="checkbox" role="switch" disabled>
                                        <span class="form-check-label badge bg-danger">Tidak Aktif</span>
                                    @endif
                                @endif
                            </div>
                        </td>
                        <td>
                            <a class="btn btn-info btn-sm btn-aksi" title="Show Detail" data-bs-toggle="modal"
                                data-bs-target="#Show" wire:click="Show({{ $item }})">
                                <i class="fa fa-eye"></i>
                            </a>
                            @if ($item->id != auth()->user()->id)
                                @if ($code_page == 'index')
                                    <a class="btn btn-warning btn-sm btn-aksi edit_data" data-bs-toggle="modal"
                                        data-bs-target="#Edit" title="Edit"
                                        wire:click="EditUser({{ $item }})">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <button class="btn btn-danger btn-sm btn-aksi" title="Hapus"
                                        data-ids="{{ base64_encode($item->id) }}" id="HapusData">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                @else
                                    <button class="btn btn-success btn-sm btn-aksi" title="Restore"
                                        data-ids="{{ base64_encode($item->id) }}" id="Restore">
                                        <i class="fa-solid fa-recycle"></i>
                                    </button>
                                @endif
                            @else
                                <a class="btn btn-warning btn-sm btn-aksi edit_data disabled" data-bs-toggle="modal"
                                    data-bs-target="#GlobalModal" title="Edit">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <button class="btn btn-danger btn-sm btn-aksi" title="Hapus" disabled>
                                    <i class="fa fa-trash"></i>
                                </button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{-- <div class="d-flex justify-content-center"> --}}
    {{-- {{ $users->links() }} --}}
    {{-- <i>
				Menampilkan {{ $users->firstItem() }} sampai {{ $users->lastItem() }} dari total {{ $users->total() }} data
			</i> --}}
    {{ $users->onEachSide(1)->links('vendor.livewire.bootstrap', data: ['scrollTo' => false]) }}
    {{-- </div> --}}


    {{-- modal show --}}
    @include('livewire.master-user.user-show')
    @include('livewire.master-user.user-edit')
</div>
