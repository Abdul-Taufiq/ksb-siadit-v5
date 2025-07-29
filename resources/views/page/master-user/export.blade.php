<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <h1>Export Data User</h1>

    <table cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th style="font-weight: bold; text-align: center; background-color: aqua">No</th>
                <th style="font-weight: bold; text-align: center; background-color: aqua; width: 150px;">NIK</th>
                <th style="font-weight: bold; text-align: center; background-color: aqua; width: 215px;">Nama</th>
                <th style="font-weight: bold; text-align: center; background-color: aqua; width: 215px;">TTL</th>
                <th style="font-weight: bold; text-align: center; background-color: aqua; width: 215px;">Alamat</th>
                <th style="font-weight: bold; text-align: center; background-color: aqua; width: 180px;">Jabatan/Role
                </th>
                <th style="font-weight: bold; text-align: center; background-color: aqua; width: 100px;">Username</th>
                <th style="font-weight: bold; text-align: center; background-color: aqua; width: 215px;">Email</th>
                <th style="font-weight: bold; text-align: center; background-color: aqua; width: 215px;">No Hp</th>
                <th style="font-weight: bold; text-align: center; background-color: aqua; width: 215px;">Tgl Create</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->UserDetails->nik }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>
                        {!! !empty($item->UserDetails->birth_date)
                            ? $item->UserDetails->place . ', ' . $item->UserDetails->birth_date->translatedFormat('d F Y')
                            : '<i>Not Available</i>' !!}
                    </td>
                    <td>
                        {!! !empty($item->UserDetails->address) ? $item->UserDetails->address : '<i>Not Available</i>' !!}
                    </td>
                    <td>
                        {!! !empty($item->role) ? $item->jabatan . ' (' . $item->role . ')' : '<i>Not Available</i>' !!}
                    </td>
                    <td>{{ $item->username }}</td>
                    <td>{{ $item->email }}</td>
                    <td>
                        {!! !empty($item->UserDetails->phone_number) ? $item->UserDetails->phone_number : '<i>Not Available</i>' !!}
                    </td>
                    <td>
                        {!! $item->UserDetails->created_at->translatedFormat('d F Y') !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
