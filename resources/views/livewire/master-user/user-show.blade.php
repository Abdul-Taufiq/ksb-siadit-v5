<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <div wire:ignore.self class="modal fade" id="Show" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="ShowLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="container">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Show Data {{ $nama }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <center style="background-color: rgba(236, 249, 255, 0.596);">
                            <div class="rounded-circle"
                                style="background-color: rgb(240, 240, 240); max-width: 150px; width: 150px; display: flex;  border: 1px solid rgb(161, 161, 161);">
                                <img id="image"
                                    src="{{ $profile_image != null
                                        ? asset('images/profile_image/' . $profile_image)
                                        : ($gender == 'Laki-laki'
                                            ? asset('template/img/avatar/avatar-illustrated-02.webp')
                                            : asset('template/img/avatar/avatar-illustrated-01.webp')) }}"
                                    alt="Image Profile" class="w-100"
                                    style="border-radius: 50%; width: 150px; height: 150px; object-fit: cover;">
                            </div>
                        </center>

                        <table class="table table-borderless table-striped w-100" style="font-size: 12px;">
                            <tr>
                                <th class="table-primary" colspan="3">Private Data </th>
                            </tr>
                            <tr>
                                <th class="col-sm-3">NIK</th>
                                <td style="width: 1%">:</td>
                                <td>
                                    {!! !empty($nik) ? $nik : '<i>Not Available</i>' !!}
                                </td>
                            </tr>
                            <tr>
                                <th>Nama</th>
                                <td>:</td>
                                <td>
                                    {!! !empty($nama) ? $nama : '<i>Not Available</i>' !!}
                                </td>
                            </tr>
                            <tr>
                                <th>Jabatan (Role)</th>
                                <td>:</td>
                                <td>
                                    {!! !empty($role) ? $jabatan . ' (' . $role . ')' : '<i>Not Available</i>' !!}
                                </td>
                            </tr>
                            <tr>
                                <th>Tempat, Tanggal Lahir</th>
                                <td>:</td>
                                <td>
                                    {!! !empty($birth_date_show)
                                        ? $place . ', ' . $birth_date_show->translatedFormat('d F Y')
                                        : '<i>Not Available</i>' !!}
                                </td>
                            </tr>
                            <tr>
                                <th>Jenis Kelamin</th>
                                <td>:</td>
                                <td>
                                    {!! !empty($gender) ? $gender : '<i>Not Available</i>' !!}
                                </td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>:</td>
                                <td>
                                    {!! !empty($address) ? $address : '<i>Not Available</i>' !!}
                                </td>
                            </tr>
                            <tr>
                                <th>No. HP</th>
                                <td>:</td>
                                <td>
                                    {!! !empty($phone_number) ? $phone_number : '<i>Not Available</i>' !!}
                                </td>
                            </tr>

                            <tr>
                                <th colspan="3">&nbsp;</th>
                            </tr>

                            <tr>
                                <th class="table-primary" colspan="3">Account </th>
                            </tr>
                            <tr>
                                <th>Username</th>
                                <td style="width: 1%">:</td>
                                <td>{{ $username }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>:</td>
                                <td>{{ $email }}</td>
                            </tr>
                            <tr>
                                <th>Password</th>
                                <td>:</td>
                                <td>
                                    <i>Hanya Pemilik Akun Yang dapat melihat</i>
                                </td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>:</td>
                                <td>
                                    @if ($is_active == 'active')
                                        <i class="badge bg-success" style="height: 12px; width: 5px;">
                                            &nbsp;</i>
                                        <i>Aktif</i>
                                    @else
                                        <i class="badge bg-danger" style="height: 12px; width: 5px;">
                                            &nbsp;</i>
                                        <i>Tidak Aktif</i>
                                    @endif
                                </td>
                            </tr>
                        </table>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        {{-- <button type="button" id="simpanAdd" class="btn btn-primary"
                                wire:click.prevent='StoreUser'><i class="fa-regular fa-floppy-disk"></i> Save</button> --}} {{-- langsung ke livewire --}}
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
