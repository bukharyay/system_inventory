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
    <section class="form-peminjaman">
        <h1>Masukkan Data Peminjaman</h1>
        <form method="POST" action="{{ route('peminjam.store') }}">
            @csrf
            <label for="nim" class="form-label">kode_peminjam</label>
            <input type="text" class="form-control" id="kode_peminjam" placeholder="Masukan kode peminjam"
                name="id_user">
            <label for="nama" class="form-label">kode_alat</label>
            <input type="text" class="form-control" id="kode_alat_id" placeholder="Masukan kode alat"
                name="kode_alat_id">
            <label for="tanggalpinjam" class="form-label">TANGGAL PEMINJAM</label>
            <input type="date" class="form-control" id="tanggal_peminjaman"
                placeholder="Masukan TANGGAL PEMINJAM anda" name="tanggal_peminjaman">
            <label for="waktukembali" class="form-label">TANGGAL PENGEMBALIAN</label>
            <input type="date" class="form-control" id="tanggal_kembali"
                placeholder="Masukan TANGGAL PENGEMBALIAN anda" name="tanggal_kembali">
            <label for="waktukembali" class="form-label">status</label>
            <input type="text" class="form-control" id="status" placeholder="Masukan status anda" name="status">
            <label for="waktukembali" class="form-label">kondisi</label>
            <input type="text" class="form-control" id="kondisi" placeholder="Masukan kondisi barang"
                name="kondisi">
            <input type="submit" value="simpan">
        </form>
    </section>



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
