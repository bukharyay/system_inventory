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
    <link rel="stylesheet" href="../assets/admin_lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../assets/admin_lte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">


</head>

<body>
    <header>
        @include('layouts.navbar')
    </header>
    <!-- Begin Page Content -->

    <section class="table">
        <h1>DAFTAR ALAT</h1>
        <div class="search-filter">
            <input type="text" id="searchInput" placeholder="Cari barang...">
            <select id="filterSelect">
                <option value="semua">Semua</option>
                <option value="tersedia">Tersedia</option>
                <option value="tidak-tersedia">Tidak Tersedia</option>
            </select>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="col-md-1">No</th>
                    <th class="col-md-4">Nama Alat</th>
                    <th class="col-md-3">Jenis Alat ID</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $nomor = 1;
                @endphp
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $nomor++ }}</td>
                        <td>{{ $item['nama_alat'] }}</td>
                        <td>{{ $item['jenis_alat_id'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
    <!-- End of Main Content -->

    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Your Website 2023</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

    </div>
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


    <!-- Pertabelan -->

    <script src="../assets/admin_lte/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../assets/admin_lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../assets/admin_lte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../assets/admin_lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="../assets/admin_lte/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../assets/admin_lte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="../assets/admin_lte/plugins/jszip/jszip.min.js"></script>
    <script src="../assets/admin_lte/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="../assets/admin_lte/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="../assets/admin_lte/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="../assets/admin_lte/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="../assets/admin_lte/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../assets/admin_lte/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../assets/admin_lte/dist/js/demo.js"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
</body>

</html>
