<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <table class="table table-striped table-hover table-sm w-100">
        <thead class="table-primary">
            <tr>
                <th style="width: 5%;">No</th>
                <th style="width: 31%">Nama</th>
                <th style="width: 30%">Email</th>
                <th style="width: 12%">Role</th>
                <th style="width: 12%">Status</th>
                <th style="width: 10%">Aksi</th>
            </tr>
        </thead>
        <tbody style="vertical-align: middle">
            @foreach ($users as $user)
                <tr>
                    <td>{{ $loop->index + $users->firstItem() }}</td>
                    <td>{{ $user->nama }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>{{ $user->is_active }}</td>
                    <td>
                        <a class="btn btn-info btn-sm btn-aksi detail_data" title="Detail" data-bs-toggle="modal"
                            data-bs-target="#Detail" id="{{ Encrypt($user->id) }}" data-kode_form="{{ $user->nama }}">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a class="btn btn-warning btn-sm btn-aksi edit_data" data-bs-toggle="modal"
                            data-bs-target="#Edit" title="Edit" id="{{ Encrypt($user->id) }}">
                            <i class="fa fa-edit"></i>
                        </a>
                        <button class="btn btn-danger btn-sm btn-aksi" title="Hapus"
                            onclick="confirmDelete({{ $user->id }})">
                            <i class="fa fa-trash"></i>
                        </button>
                    </td>
                </tr>


                <!-- Modal -->
                <div class="modal fade" id="Edit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                    aria-labelledby="EditLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            @livewire('master-user.user-edit-livewire', ['id' => $user->id])
                        </div>
                    </div>
                </div>
            @endforeach
        </tbody>
    </table>
    {{-- <div class="d-flex justify-content-center"> --}}
    {{-- {{ $users->links() }} --}}
    {{-- <i>
            Menampilkan {{ $users->firstItem() }} sampai {{ $users->lastItem() }} dari total {{ $users->total() }} data
        </i> --}}
    {{ $users->links(data: ['scrollTo' => false]) }}
    {{-- </div> --}}
</div>
