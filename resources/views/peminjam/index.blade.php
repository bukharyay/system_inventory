<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="assets/Code/assets/css/pinjam.css">
    <link rel=" preconnect " href="https://fonts.googleapis.com ">
    <link rel="preconnect " href="https://fonts.gstatic.com " crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap " rel="stylesheet ">
    <title>PEMINJAMAN MAHASISWA</title>
</head>

<body>
    <header>
        <img class="logo" src="assets/Code/assets/img/logo.png" alt="">
        <ul class="navlist">
            <li><a href="#">HOME</a></li>
            <li><a href="#">DAFTAR INVENYORY</a></li>
            <li><a href="#">HISTORY</a></li>
            <li><a href="#">ABOUT US</a></li>
        </ul>
        <a href="login.html">
            <img class="profile" src="assets/Code/assets/img/orang.jpg" alt="">
        </a>
    </header>
    <!-- Form section -->
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="col-md-1">NIM</th>
                    <th class="col-md-4">Kode Alat Id</th>
                    <th class="col-md-3">Tanggal Peminjaman</th>
                    <th class="col-md-2">Tanggal Kembali</th>
                    <th class="col-md-2">Status</th>
                    <th class="col-md-2">kondisi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $item['users_id'] }}</td>
                        <td>{{ $item['kode_alat_id'] }}</td>
                        <td>{{ $item['tanggal_peminjaman'] }}</td>
                        <td>{{ $item['tanggal_kembali'] }}</td>
                        <td>{{ $item['status'] }}</td>
                        <td>{{ $item['kondisi'] }}</td>


                    </tr>
                @endforeach

            </tbody>
        </table>

    </div>



    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
       integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
   </script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
       integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
   </script>
   -->
</body>

</html>
