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
        @include('layouts.navbarmhs')
    </header>
    <!-- Form section -->
    <form action="{{ route('simpan') }}" method="POST" class="form-peminjaman">
        @csrf
        <h1>Masukkan Data Peminjaman</h1>

        <label for="nim" class="form-label">NIM</label>
        <input type="text" class="form-control" value="{{ session('nim') }}" name="nim" id="nim"
            placeholder="Masukkan NIM anda">

        <label for="nama_peminjam" class="form-label">NAMA</label>
        <input type="text" class="form-control" name="nama_peminjam" id="nama_peminjam"
            placeholder="Masukkan NAMA anda">

        <label for="dosen" class="form-label">DOSEN</label>
        <input type="text" class="form-control" name="dosen" id="dosen" placeholder="Masukkan DOSEN anda">

        <label for="ruang" class="form-label">RUANG</label>
        <input type="text" class="form-control" name="ruang" id="ruang"
            placeholder="Masukkan RUANG KULIAH anda">

        <label for="mata_kuliah" class="form-label">MATA KULIAH</label>
        <input type="text" class="form-control" name="mata_kuliah" id="matakuliah"
            placeholder="Masukkan MATA KULIAH anda">

        <label for="tanggal_peminjaman" class="form-label">TANGGAL PEMINJAM</label>
        <input type="date" class="form-control" name="tanggal_peminjaman" id="tanggalpinjam"
            placeholder="Masukkan TANGGAL PEMINJAM anda">

        <label for="waktu_peminjaman" class="form-label">WAKTU PEMINJAM</label>
        <input type="time" class="form-control" name="waktu_peminjaman" id="waktupinjam"
            placeholder="Masukkan WAKTU PEMINJAM anda">

        <button class="btn btn-primary" type="submit">Pinjam Alat</button>
    </form>


    <script>
        // Mendapatkan elemen input waktu
        var waktuPeminjamanInput = document.getElementById('waktupinjam');

        // Mendapatkan waktu nyata saat ini
        var waktuSekarang = new Date();

        // Mengubah format waktu menjadi HH:MM
        var jam = ('0' + waktuSekarang.getHours()).slice(-2);
        var menit = ('0' + waktuSekarang.getMinutes()).slice(-2);
        var waktuDefault = jam + ':' + menit;

        // Mengatur nilai default pada input waktu
        waktuPeminjamanInput.value = waktuDefault;
    </script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="../assets/js/profile.js"></script>
</body>

</html>
