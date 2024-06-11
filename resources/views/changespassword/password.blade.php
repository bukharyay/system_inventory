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
    <link href="../assets/admin_css/vendor/fontawesome-free/csdata-alats/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../assets/admin_css/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/password.css">
    <link rel="stylesheet" href="/font-awesome-4.7.0/css/font-awesome.min.css">
    <!-- pertabelan -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../assets/admin_lte/plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../assets/admin_lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <title>Ubah Password</title>
    <style>
        .container {
            margin-top: 100px
        }
    </style>
    <!-- Ensure jQuery is loaded -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <header>
        @include('layouts.navbarmhs')
    </header>
    <div class="container">
        <h1>Ubah Sandi</h1>
        <form id="passwordForm" action="{{ route('ubah-sandi-update') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama_peminjam" class="form-label">NIM Mahasiswa</label>
                <input type="text" class="form-control" readonly name="nim_mahasiswa" id="nim_mahasiswa"
                    value="{{ session('nim') }}" placeholder="Masukkan NAMA anda">
            </div>
            <div class="form-group">
                <label for="nama_peminjam" class="form-label">Nama Mahasiswa</label>
                <input type="text" class="form-control" readonly name="nama_mahasiswa" id="nama_mahasiswa"
                    value="" placeholder="Masukkan NAMA anda">
            </div>
            <div class="form-group">
                <label for="password_lama">Password Lama</label>
                <input type="password" id="password_lama" name="password_lama" placeholder="Masukkan Password Lama Anda"
                    required>
            </div>
            <div class="form-group">
                <label for="password_baru">Password Baru</label>
                <input type="password" id="password_baru" name="password_baru" placeholder="Masukkan Password Baru Anda"
                    required>
            </div>
            <div class="form-group">
                <label for="konfirmasi_password">Konfirmasi Password Baru</label>
                <input type="password" id="konfirmasi_password" name="konfirmasi_password"
                    placeholder="Masukkan Ulang Password Baru Anda" required>
            </div>
            <button type="submit">Ubah Password</button>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            // Mendapatkan nim dari session (Anda harus memastikan session 'nim' tersedia)
            var nim = "{{ session('nim') }}";

            // Buat permintaan AJAX ke endpoint dengan nim
            $.ajax({
                url: 'http://127.0.0.1:8000/api/info-login-nim/getData=' + nim,
                type: 'GET',
                success: function(response) {
                    // Jika permintaan berhasil, atur nilai input "nama_peminjam" dengan username dari respons
                    var username = response.user.username; // Mengambil username dari respons
                    $('#nama_mahasiswa').val(username);
                    // Print respons ke konsol
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    // Tangani kesalahan jika ada
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            var nim = "{{ session('nim') }}";
            console.log("NIM from session: ", nim);

            $.ajax({
                url: 'http://127.0.0.1:8000/api/info-login-nim/getData=' + nim,
                type: 'GET',
                success: function(response) {
                    var username = response.user.username;
                    $('#nama_mahasiswa').val(username);
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });

            $('#passwordForm').submit(function(event) {
                var passwordBaru = $('#password_baru').val();
                var konfirmasiPassword = $('#konfirmasi_password').val();

                if (passwordBaru !== konfirmasiPassword) {
                    event.preventDefault();
                    alert('Password baru dan konfirmasi password harus sama.');
                }
            });
        });
    </script>

</body>

</html>
