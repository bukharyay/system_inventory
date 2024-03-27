<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="../assets/css/peminjamans.css">
    <link rel=" preconnect " href="https://fonts.googleapis.com ">
    <link rel="preconnect " href="https://fonts.gstatic.com " crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap " rel="stylesheet ">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Pinjam Alat</title>
</head>

<body>
    <header>
        <img class="logo" src="../assets/img/logo.png" alt="">
        <ul class="navlist">
            <li><a href="index.html">HOME</a></li>
            <li><a href="barang.html">DAFTAR INVENTORY</a></li>
            <div class="nav-container" id="navContainer">
                <li><a href="#" id="peminjaman">PEMINJAMAN</a></li>
                <div class="dropdown" id="dropdown">
                    <a href="pinjam.html"><i class="fas fa-user"></i> Identitas</a>
                    <a href="peminjaman.html"><i class="fas fa-box"></i> Peminjaman</a>
                </div>
            </div>
            <li><a href="history.html">HISTORY</a></li>

            <li><a href="about.html">ABOUT US</a></li>
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
        <h1>Masukkan Barang Pinjaman anda</h1>
        <label for="namabarang" class="form-label">Nama Barang</label>
        <input type="text" class="form-control" id="nim" placeholder="Masukan Nama Barang anda">
        <label for="jumlah" class="form-label">Jumlah</label>
        <input type="text" class="form-control" id="nim" placeholder="Masukan Jumlah Barang anda">
        <button class="btn btn-primary" type="submit">Tambah</button>
    </section>

    <section class="form_datadiri">
        <h1>List Barang</h1>

        <div class="info-box">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Waktu</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>LEK KAR</td>
                        <td>1</td>
                        <td>13.00</td>

                    </tr>
                    <tr>
                        <td>2</td>
                        <td>MR KUWAT</td>
                        <td>3</td>
                        <td>14.30</td>

                    </tr>
                </tbody>
            </table>
        </div>
        <a href="history.html"> <button class="btn btn-primary" type="submit">Pinjam</button></a>
    </section>
    <script src="../assets/js/profile.js"></script>
</body>

</html>