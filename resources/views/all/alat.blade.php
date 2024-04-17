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
    <link href="../assets/admin_css/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/table.css">

    <!-- pertabelan -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../assets/admin_lte/plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../assets/admin_lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
</head>

<body>
    <header>
        @auth
            @if (Auth::user()->role == 'staff')
                @include('layouts.navbar')
            @elseif (Auth::user()->role == 'mahasiswa')
                @include('layouts.navbarmhs')
            @endif
        @endauth
    </header>
    <!-- Begin Page Content -->
    <section class="table">
        <h1>DAFTAR ALAT</h1>
        <table class="table table-striped" id="data-table">
            <thead>
                <tr>
                    <th class="col-md-1">No</th>
                    <th class="col-md-1">ID Alat</th>
                    <th class="col-md-4">Nama Alat</th>
                    <th class="col-md-3">Jenis Alat</th>
                    <th class="col-md-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $nomor = 1;
                @endphp
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $nomor++ }}</td>
                        <td>{{ $item['id'] }}</td>
                        <td>{{ $item['nama_alat'] }}</td>
                        <td>{{ $item['nama_jenis_alat'] }}</td>
                        @auth
                            @if (Auth::user()->role == 'mahasiswa')
                                <td>
                                    <a href="#">
                                        <button class="btn_hapus" data-toggle="modal" data-target="#pinjamModal"
                                            data-itemid="{{ $item['id'] }}">Pinjam</button>
                                    </a>
                                </td>
                            @elseif (Auth::user()->role == 'staff')
                                <td>
                                    <form action="{{ route('data-alat.delete', ['id' => $item['id']]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">Delete</button>
                                    </form>
                                </td>
                            @endif
                        @endauth
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
    <!-- End of Main Content -->

    {{-- modal --}}
    <div class="modal fade" id="pinjamModal" tabindex="-1" role="dialog" aria-labelledby="pinjamModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pinjamModalLabel">Form Peminjaman</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Isi form peminjaman di sini -->

                    <form action="{{ route('simpan') }}" method="POST" class="form-peminjaman">
                        @csrf
                        <h1>Masukkan Data Peminjaman</h1>

                        <label for="nim" class="form-label">NIM</label>
                        <input type="text" class="form-control" readonly value="{{ session('nim') }}" name="nim"
                            id="nim" placeholder="Masukkan NIM anda">

                        <label for="nama_peminjam" class="form-label">NAMA</label>
                        <input type="text" class="form-control" readonly name="nama_peminjam" id="nama_peminjam"
                            value="" placeholder="Masukkan NAMA anda">

                        <label for="id_alat" class="form-label">ID Alat</label>
                        <input type="text" class="form-control" readonly name="id_alat" id="id_alat"
                            placeholder="Masukkan ID Alat Anda" value="">


                        <label for="dosen" class="form-label">DOSEN</label>
                        <input type="text" class="form-control" name="dosen" id="dosen"
                            placeholder="Masukkan DOSEN anda">

                        <label for="ruang" class="form-label">RUANG</label>
                        <input type="text" class="form-control" name="ruang" id="ruang"
                            placeholder="Masukkan RUANG KULIAH anda">

                        <label for="mata_kuliah" class="form-label">MATA KULIAH</label>
                        <input type="text" class="form-control" name="mata_kuliah" id="matakuliah"
                            placeholder="Masukkan MATA KULIAH anda">

                        <label for="tanggal_peminjaman" class="form-label">TANGGAL PEMINJAM</label>
                        <input type="date" class="form-control" name="tanggal_peminjaman" readonly
                            id="tanggalpinjam" placeholder="Masukkan TANGGAL PEMINJAM anda">

                        <label for="waktu_peminjaman" class="form-label">WAKTU PEMINJAM</label>
                        <input type="time" class="form-control" name="waktu_peminjaman" readonly id="waktupinjam"
                            placeholder="Masukkan WAKTU PEMINJAM anda">

                        <input hidden type="text" class="form-control" name="keterangan" value="Diajukan"
                            placeholder="Masukkan WAKTU PEMINJAM anda">

                        <button class="btn btn-primary" type="submit">Pinjam Alat</button>

                    </form>

                    {{-- end form --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    {{-- end modal --}}

    </div>
    <!-- End of Content Wrapper -->

    {{-- JS menangkap id --}}
    <!-- Let's assume you have included jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#data-table').DataTable();
        });
    </script>

    <script>
        $(document).ready(function() {
            $(document).on('click', '.btn_hapus', function() {
                var itemId = $(this).data('itemid');
                // Set nilai dari input dengan id "id_alat" dengan nilai itemId
                $('#id_alat').val(itemId);
                // Lakukan apa pun yang perlu Anda lakukan dengan itemId di sini
                console.log("ID Alat yang Dipinjam: " + itemId);
                // Misalnya, Anda dapat membuat permintaan AJAX untuk mengirimkan ID alat ke server untuk memproses permintaan peminjaman
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#pinjamModal').on('show.bs.modal', function() {
                var today = new Date();
                var day = String(today.getDate()).padStart(2, '0');
                var month = String(today.getMonth() + 1).padStart(2, '0');
                var year = today.getFullYear();
                var formattedDate = year + '-' + month + '-' + day;
                $('#tanggalpinjam').val(formattedDate);
            });
        });
    </script>

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

    <script>
        $(document).ready(function() {
            $('.btn_hapus').click(function() {
                var itemId = $(this).data('itemid');
                // Set nilai dari input dengan id "id_alat" dengan nilai itemId
                $('#id_alat').val(itemId);
                // Lakukan apa pun yang perlu Anda lakukan dengan itemId di sini
                console.log("ID Alat yang Dipinjam: " + itemId);
                // Misalnya, Anda dapat membuat permintaan AJAX untuk mengirimkan ID alat ke server untuk memproses permintaan peminjaman
            });
        });
    </script>

    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../assets/admin_css/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/admin_css/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../assets/admin_css/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../assets/admin_css/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../assets/admin_css/vendor/chart.js/Chart.min.js"></script>

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
                    $('#nama_peminjam').val(username);
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



    <!-- Pertabelan -->

    <script src="../assets/admin_lte/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../assets/admin_lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../assets/admin_lte/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../assets/admin_lte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="../assets/admin_lte/plugins/jszip/jszip.min.js"></script>
    <script src="../assets/admin_lte/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="../assets/admin_lte/plugins/pdfmake/vfs_fonts.js"></script>

    <!-- AdminLTE App -->
    <script src="../assets/admin_lte/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../assets/admin_lte/dist/js/demo.js"></script>
    <!-- Page specific script -->
</body>

</html>
