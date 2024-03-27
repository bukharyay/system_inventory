<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="../assets/css/pinjam.css">
    <link rel=" preconnect " href="https://fonts.googleapis.com ">
    <link rel="preconnect " href="https://fonts.gstatic.com " crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap " rel="stylesheet ">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>DAFTAR BARANG MAHASISWA</title>
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
    <section class="table">
        <h1>DAFTAR BARANG</h1>
        <div class="search-filter">
            <input type="text" id="searchInput" placeholder="Cari barang...">
            <select id="filterSelect">
                <option value="semua">Semua</option>
                <option value="tersedia">Tersedia</option>
                <option value="tidak-tersedia">Tidak Tersedia</option>
            </select>
        </div>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Gambar Barang</th>
                    <th>Nama Barang</th>
                    <th>STOK</th>
                    <th>Rincian</th>
                    <th>Pinjam</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td><img src="../assets/img/alat.png" alt=""></td>
                    <td>Kabel</td>
                    <td>50 buah</td>
                    <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn_rincian" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Rincian
                        </button>
                    </td>
                    <td><a href="pinjam.html"><button class="btn_pinjambarang ">Pinjam</button></a></td>

                </tr>
                <!-- Tambahkan baris lainnya jika diperlukan -->
            </tbody>
        </table>
    </section>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Rincian</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Nama Barang : Kabel</p>
                    <p>Jumlah Barang : 10</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="../assets/js/profile.js"></script>
</body>

</html>