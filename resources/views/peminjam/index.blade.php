<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Data Peminjaman</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>ID User</th>
                <th>Kode Alat</th>
                <th>Tanggal Peminjaman</th>
                <th>Tanggal Kembali</th>
                <th>Status</th>
                <th>Kondisi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item['id'] }}</td>
                    <td>{{ $item['id_user'] }}</td>
                    <td>{{ $item['kode_alat'] }}</td>
                    <td>{{ $item['tanggal_peminjaman'] }}</td>
                    <td>{{ $item['tanggal_kembali'] }}</td>
                    <td>{{ $item['status'] }}</td>
                    <td>{{ $item['kondisi'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
