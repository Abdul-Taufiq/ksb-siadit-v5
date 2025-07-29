@include('layouts.header')
@yield('header')

<body>
    <center>
        <div class="rounded-circle"
            style="background-color: rgb(240, 240, 240); max-width: 150px; width: 150px; display: flex;  border: 1px solid rgb(161, 161, 161);">
            <img id="image"
                src="{{ $user->profile_image != null
                    ? asset('images/profile_image/' . $user->profile_image)
                    : ($user->UserDetails->gender == 'Laki-laki'
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
                {!! !empty($user->UserDetails->nik) ? $user->UserDetails->nik : '<i>Not Available</i>' !!}
            </td>
        </tr>
        <tr>
            <th>Nama</th>
            <td>:</td>
            <td>
                {!! !empty($user->nama) ? $user->nama : '<i>Not Available</i>' !!}
            </td>
        </tr>
        <tr>
            <th>Jabatan (Role)</th>
            <td>:</td>
            <td>
                {!! !empty($user->role) ? $user->jabatan . ' (' . $user->role . ')' : '<i>Not Available</i>' !!}
            </td>
        </tr>
        <tr>
            <th>Tempat, Tanggal Lahir</th>
            <td>:</td>
            <td>
                {!! !empty($user->UserDetails->birth_date)
                    ? $user->UserDetails->place . ', ' . $user->UserDetails->birth_date->translatedFormat('d F Y')
                    : '<i>Not Available</i>' !!}
            </td>
        </tr>
        <tr>
            <th>Jenis Kelamin</th>
            <td>:</td>
            <td>
                {!! !empty($user->UserDetails->gender) ? $user->UserDetails->gender : '<i>Not Available</i>' !!}
            </td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td>:</td>
            <td>
                {!! !empty($user->UserDetails->address) ? $user->UserDetails->address : '<i>Not Available</i>' !!}
            </td>
        </tr>
        <tr>
            <th>No. HP</th>
            <td>:</td>
            <td>
                {!! !empty($user->UserDetails->phone_number) ? $user->UserDetails->phone_number : '<i>Not Available</i>' !!}
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
            <td>{{ $user->username }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>:</td>
            <td>{{ $user->email }}</td>
        </tr>
        <tr>
            <th>Password</th>
            <td>:</td>
            <td>
                <i>Hanya Pemilik Akun Yang dapat melihat</i>
            </td>
        </tr>
    </table>


</body>

</html>
