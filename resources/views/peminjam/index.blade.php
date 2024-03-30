<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="../assets/css/pinjam.css">
    <link rel=" preconnect " href="https://fonts.googleapis.com ">
    <link rel="preconnect " href="https://fonts.gstatic.com " crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap " rel="stylesheet ">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>PEMINJAMAN MAHASISWA</title>
</head>

<body>
    <header>
        @include('layouts.navbar')

    </header>
    <section class="table">
        <h1>Data Peminjaman</h1>
        <div class="search-filter">
            <input type="text" id="searchInput" placeholder="Cari barang...">
            <select id="filterSelect">
                <option value="semua">Semua</option>
                <option value="tersedia">Tersedia</option>
                <option value="tidak-tersedia">Tidak Tersedia</option>
            </select>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="col-md-1">NIM</th>
                    <th class="col-md-3">Nama Peminjam</th>
                    <th class="col-md-2">Nama Alat</th>
                    <th class="col-md-3">Tanggal Peminjaman</th>
                    <th class="col-md-2">Tanggal Kembali</th>
                    <th class="col-md-2">Status</th>
                    <th class="col-md-2">kondisi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $item['nim'] }}</td>
                        <td>{{ $item['username'] }}</td>
                        <td>{{ $item['nama_alat'] }}</td>
                        <td>{{ $item['tanggal_peminjaman'] }}</td>
                        <td>{{ $item['tanggal_kembali'] }}</td>
                        <td>{{ $item['status'] }}</td>
                        <td>{{ $item['kondisi'] }}</td>


                    </tr>
                @endforeach

            </tbody>
        </table>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="../assets/js/profile.js"></script>

</body>

</html>
