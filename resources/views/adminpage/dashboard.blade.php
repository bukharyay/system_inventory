<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Property</title>

    <!-- Custom fonts for this template-->
    <link href="../assets/admin_css/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->

</head>

<body>
    <header>
        @include('layouts.navbar')

    </header>

    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="../assets/img/background.jpeg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Selamat Datang DOSEN</h5>
                    <p>Di Sistem Inventaris dan Peminjaman Alat</p>
                    <a href="{{ route('pinjam') }}"><button class="btn_pinjam">PINJAM</button></a>
                </div>
            </div>

        </div>
    </div>


    <!-- Bootstrap core JavaScript-->
    <script src="admin_css/vendor/jquery/jquery.min.js"></script>
    <script src="admin_css/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="admin_css/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="admin_css/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="admin_css/vendor/chart.js/Chart.min.js"></script>


</body>

</html>
