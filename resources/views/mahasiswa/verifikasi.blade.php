<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/verifikasi.css">
    <link rel="stylesheet" href="../assets/css/pinjam.css">
    <link rel=" preconnect " href="https://fonts.googleapis.com ">
    <link rel="preconnect " href="https://fonts.gstatic.com " crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap " rel="stylesheet ">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>HOME</title>
</head>

<body>
    <header>
        <img class="logo" src="../assets/img/logo.png" alt="">
        <ul class="navlist">
            <li><a href="#">HOME</a></li>
            <li><a href="#">DAFTAR INVENTORY</a></li>
            <div class="nav-container" id="navContainer">
                <li><a href="#" id="peminjaman">PEMINJAMAN</a></li>
                <div class="dropdown" id="dropdown">
                    <a href="pinjam.html"><i class="fas fa-user"></i> Identitas</a>
                    <a href="peminjaman.html"><i class="fas fa-box"></i> Peminjaman</a>
                </div>
            </div>
            <li><a href="#">HISTORY</a></li>

            <li><a href="#">ABOUT US</a></li>
        </ul>
        <div class="profile-container" id="profileContainer">
            <img class="profile" src="../assets/img/orang.jpg" alt="" id="profileImage">
            <div class="dropdown-menu" id="dropdownMenu">
                <a href="login.html">Logout</a>
            </div>
        </div>
    </header>
    <!-- Form section -->
    <section class="form-verifikasi">
        <h1>Masukkan NIP anda</h1>
        <label for="nim" class="form-label">NIM</label>
        <input type="text" class="form-control" id="nim" placeholder="Masukan NIM anda">
        <button class="btn btn-primary" type="submit">Proses</button>
    </section>

    <section class="form_datadiri">
        <h1>Data Diri Anda</h1>

        <div class="info-box">
            <label for="nama">Nama: Lek Kar</label>

            <label for="kelas">Mata Kuliah: Web</label>

        </div>
        <a href="index.html"><button class="btn btn-primary" type="submit">Masuk</button></a>
    </section>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="../assets/js/profile.js"></script>
</body>

</html>