<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap " rel="stylesheet ">
    <link rel="stylesheet" href="/assets/Code/assets/css/login.css">
    <title>Hello, world!</title>
</head>

<body>

    <section class="login d-flex">
        <div class="login-left  w-50 h-100">
            <div class="row justify-content-center align-items-center  h-100">
                <div class="col-6">
                    <div class="header text-center">
                        <img src="/assets/Code/assets/img/logo.png" alt="">

                    </div>
                    <div class="login-container">
                        <div class="text text-center">
                            <h1>LOGIN</h1>
                            <p>Selamat Datang di Sistem Inventaris dan Peminjaman Alat Politeknik Negeri Semarang</p>
                        </div>
                        <form action="{{ route('login') }}" method="post">
                        <div class="login-form">
                            <label for="username" class="form-label">UserID</label>
                            <input type="text" class="form-control" id="username" placeholder="Masukkan Username">

                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Masukkan Password">
                            <a href="verifikasi.html">
                                <button class="login-button">LOGIN</button>
                            </a>

                        </div>
                      </form>
                    </div>

                </div>
            </div>

        </div>

        <div class="login-right  w-50 h-100">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="/assets/Code/assets/img/gedung.jpeg" class="d-block w-100" alt="...">
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>