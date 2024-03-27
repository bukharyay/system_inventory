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
    <link href="admin_css/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="admin_css/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="table.css">
    <!-- pertabelan -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="admin_lte/plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="admin_lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="admin_lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="admin_lte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center">
                <div class="sidebar-brand-icon rotate-n-15">

                </div>
                <div class="sidebar-brand-text mx-3">HALAMAN ADMIN</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="dasboard.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Layanan Admin
            </div>
            <li class="nav-item">
                <a class="nav-link" href="daftarpeminjam.html">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Daftar Peminjam</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="alat.html">
                    <i class="fas fa-fw fa-clipboard"></i>
                    <span>Daftar Alat</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="tambahalat.html">
                    <i class="fas fa-fw fa-clipboard"></i>
                    <span>Tambah Alat</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="pengembalian.html">
                    <i class="fas fa-fw fa-clipboard"></i>

                    <span>Halaman Pengembalian</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="laporan.html">
                    <i class="fas fa-fw fa-file"></i>

                    <span>Laporan</span></a>
            </li>

            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>



        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>



                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>



                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $username; ?></span>
                                <img class="img-profile rounded-circle" src="<?php echo  $x['foto']; ?>" alt="" width="50" height="50">

                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                                <div class="dropdown-divider"></div>

                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div>
                        <div class="card">
                            <div>
                                <h1>DAFTAR PEMINJAMAN</h1>
                            </div>
                            <!--/.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Nama Alat</th>
                                            <th>Tanggal Pinjam</th>
                                            <th>Tanggal Kembali</th>
                                            <th>Status</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>JOKO</td>
                                            <td>Kabel</td>
                                            <td>1 Januari 2024</td>
                                            <td>2 Januari 2024</td>
                                            <td class="status">Sudah Kembali</td>

                                        </tr>
                                        <!-- Tambahkan baris lainnya jika diperlukan -->
                                    </tbody>
                                </table>

                                </tbody>

                                </table>
                            </div>
                            <!--/.card-body -->
                        </div>
                        <!--/.card -->
                    </div>


                </div>

                <!-- user -->

            </div>
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
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
    <script src="admin_css/vendor/jquery/jquery.min.js"></script>
    <script src="admin_css/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="admin_css/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="admin_css/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="admin_css/vendor/chart.js/Chart.min.js"></script>


    <!-- Pertabelan -->

    <script src="admin_lte/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="admin_lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="admin_lte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="admin_lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="admin_lte/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="admin_lte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="admin_lte/plugins/jszip/jszip.min.js"></script>
    <script src="admin_lte/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="admin_lte/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="admin_lte/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="admin_lte/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="admin_lte/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
    <script src="admin_lte/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="admin_lte/dist/js/demo.js"></script>
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