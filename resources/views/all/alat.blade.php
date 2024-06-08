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
    <link rel="stylesheet" href="../assets/css/table.css">
    <link rel="stylesheet" href="/font-awesome-4.7.0/css/font-awesome.min.css">
    <!-- pertabelan -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../assets/admin_lte/plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../assets/admin_lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <style>
        form {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
        }

        form button {
            margin-right: 5px;
            /* Memberikan jarak 5px di kanan setiap tombol */
        }

        .btn:hover {
            transform: scale(1.05);
            /* Memperbesar tombol saat dihover */
        }
    </style>
</head>

<body>
    <header>
        @auth
            @if (Auth::user()->role == 'staff')
                @include('layouts.navbar')
            @elseif (Auth::user()->role == 'mahasiswa')
                @include('layouts.navbarmhs')
            @else
                @include('layouts.navbardsn')
            @endif
        @endauth
    </header>
    <!-- Begin Page Content -->
    <section class="table">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (Auth::user()->role == 'dosen')
            <a class="btn btn-outline-dark" href="{{ route('cartDosen') }}">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i> Keranjang <span
                    class="badge bg-danger">{{ count((array) session('cart')) }}</span>
            </a>
        @elseif (Auth::user()->role == 'mahasiswa')
            <a class="btn btn-outline-dark" href="{{ route('cart') }}">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i> Keranjang <span
                    class="badge bg-danger">{{ count((array) session('cart')) }}</span>
            </a>
        @endif

        <h1 style="font-size: 3em; font-weight: bold;">DAFTAR ALAT</h1>

        <table class="table table-striped" id="data-table">
            <thead>
                <tr>
                    <th class="col-md-1">No</th>
                    <th class="col-md-1">ID Alat</th>
                    <th class="col-md-1">Gambar</th>
                    <th class="col-md-4">Nama Alat</th>
                    <th class="col-md-2">Jenis Alat</th>
                    <th class="col-md-1">Stok</th>
                    <th class="col-md-3">Aksi</th>

            </thead>
            <tbody>
                @php
                    $nomor = 1;
                    $displayedItems = [];
                    $cek = 'Tidak Tersedia';
                @endphp
                @foreach ($dataAlat as $item)
                    @if (!in_array($item['nama_alat'], $displayedItems))
                        @if (Auth::user()->role === 'staff' ||
                                (Auth::user()->role === 'mahasiswa' && $item['keterangan_barang'] === 'Tersedia') ||
                                (Auth::user()->role === 'dosen' && $item['keterangan_barang'] === 'Tersedia'))
                            @php
                                // Check $dataPinjam for current item
                                $cek = 'Tidak Tersedia';
                                foreach ($dataPinjam as $pinjamItem) {
                                    if (
                                        $pinjamItem['nim'] === session('nim') &&
                                        $pinjamItem['keterangan'] === 'Diajukan'
                                    ) {
                                        $cek = 'Tersedia';
                                    }
                                }

                                // Set disabled attribute based on $cek
                                $disabledAttribute = $item['keterangan_barang'] === $cek ? 'disabled' : '';

                                // Add to displayedItems to avoid duplicates
                                $displayedItems[] = $item['nama_alat'];
                            @endphp

                            <tr>
                                <td>{{ $nomor++ }}</td>
                                <td>{{ $item['id'] }}</td>
                                <td><img src="{{ $item['img'] }}" alt=""></td>
                                <td>{{ $item['nama_alat'] }}</td>
                                <td>{{ $item['nama_jenis_alat'] }}</td>
                                <td class="stok">{{ $item['stok'] }}</td>

                                @auth
                                    @if (Auth::user()->role == 'mahasiswa')
                                        <td>
                                            <p class="btn-holder">
                                                <a href="{{ route('add.to.cart', ['id' => $item['id']]) }}"
                                                    class="btn btn-outline-primary {{ $pinjamItem['nim'] === session('nim') && $pinjamItem['keterangan'] === 'Diajukan' ? 'text-danger' : '' }} {{ $disabledAttribute }}">
                                                    <i class="fas fa-shopping-cart"></i> Masukkan ke Keranjang
                                                </a>
                                            </p>
                                        </td>
                                    @elseif (Auth::user()->role == 'dosen')
                                        <td>
                                            <p class="btn-holder">
                                                <a href="{{ route('add.to.cart.dosen', ['id' => $item['id']]) }}"
                                                    class="btn btn-outline-primary {{ $pinjamItem['nim'] === session('nim') && $pinjamItem['keterangan'] === 'Diajukan' ? 'text-danger' : '' }} {{ $disabledAttribute }}">
                                                    <i class="fas fa-shopping-cart"></i> Masukkan ke Keranjang
                                                </a>
                                            </p>
                                        </td>
                                    @elseif (Auth::user()->role == 'staff')
                                        <td>
                                            <form id="updateFormUpdate{{ $item['id'] }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <input hidden type="text" name="keterangan" value="Tidak tersedia">
                                                <button type="button" class="btn btn-primary"
                                                    onclick="showConfirmationModalUpdate({{ $item['id'] }}, '{{ $item['nama_alat'] }}', '{{ $item['stok'] }}', '{{ $item['jenis_alat_id'] }}', '{{ $item['keterangan_barang'] }}')"
                                                    style="transition: transform 0.2s;">
                                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                                    {{-- Edit --}}
                                                    <button class="btn btn-success">
                                                        <i class="fas fa-check-circle"></i>
                                                        {{-- Aktifkan --}}
                                                    </button>
                                                    <button class="btn btn-danger">
                                                        <i class="fas fa-trash-alt"></i>
                                                        {{-- Hapus --}}
                                                    </button>
                                                </button>



                                            </form>
                                        </td>
                                    @endif
                                @endauth
                            </tr>
                        @endif
                    @endif
                @endforeach
            </tbody>


        </table>
    </section>
    <!-- End of Main Content -->

    <div class="modal fade" id="confirmationModalUpdate" tabindex="-1" role="dialog"
        aria-labelledby="confirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmationModalLabel">Konfirmasi Pembaruan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                        onclick="hideConfirmationModalUpdate()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="modalFormUpdate" action="{{ route('update-data-alat', ['id' => $item['id']]) }}"
                    enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <label for="modalIdAlat" class="form-label">ID Alat</label>
                        <input type="text" class="form-control" id="modalIdAlat" name="id" disabled>

                        <label for="modalNamaAlat" class="form-label">Nama Alat</label>
                        <input name="nama_alat" type="text" class="form-control" id="modalNamaAlat">

                        <label for="modalStok" class="form-label">Stok</label>
                        <input name="stok" type="number" class="form-control" id="modalStok">

                        <label for="modalJenisAlat" class="form-label">Jenis Alat</label>
                        <select name="modalJenisAlat" class="form-control" id="modalJenisAlat">
                            <option value="1" selected>Case</option>
                            <option value="2">Perkabelan</option>
                        </select>

                        <label for="modalKeteranganBarang" class="form-label">Ket Barang</label>
                        <select name="modalKeteranganBarang" class="form-control" id="modalKeteranganBarang">
                            <option value="Tersedia" selected>Tersedia</option>
                            <option value="Tidak Tersedia">Tidak Tersedia</option>
                        </select>

                        <label for="image" class="form-label">Pilih Gambar</label>
                        <input type="file" class="form-control-file" id="image" name="img">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            onclick="hideConfirmationModalUpdate()">Batal</button>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    </div>
    <!-- End of Content Wrapper -->

    {{-- JS menangkap id --}}
    <!-- Let's assume you have included jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    {{-- <script>
        // Get the table element
        var table = document.getElementById("data-table");

        // Get all the stock cells
        var stockCells = table.getElementsByClassName("stok");

        // Loop through each stock cell
        for (var i = 0; i < stockCells.length; i++) {
            var stockCell = stockCells[i];

            // Check if the stock is "Out of Stock"
            if (stockCell.innerHTML === "Out of Stock") {
                // Disable the corresponding table row
                var row = stockCell.parentNode;
                row.classList.add("disabled");
            }
        }
    </script> --}}

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Ambil semua baris dari tabel dengan menggunakan selector CSS
            var rows = document.querySelectorAll("#data-table tbody tr");

            // Loop melalui setiap baris
            rows.forEach(function(row) {
                // Ambil nilai stok dari kolom yang sesuai
                var stok = parseInt(row.querySelector(".stok").innerText);

                // Jika stok kurang dari 1, nonaktifkan baris
                if (stok < 1) {
                    row.style.opacity = "0.5"; // Atur opasitas baris menjadi 50% untuk memudarkannya
                    row.style.pointerEvents = "none"; // Menonaktifkan event click pada baris
                }
            });
        });
    </script>



    <script>
        var updateItemId;

        function showConfirmationModalUpdate(itemId, itemNamaAlat, itemStok, itemJenisAlatId, itemKeteranganBarang) {
            fetch(`http://127.0.0.1:8000/api/data-alat/getData=${itemId}`)
                .then(response => response.json())
                .then(data => {
                    // Populate the modal fields with the fetched data
                    document.getElementById('modalIdAlat').value = itemId;
                    document.getElementById('modalNamaAlat').value = itemNamaAlat;
                    document.getElementById('modalStok').value = itemStok;
                    document.getElementById('modalJenisAlat').value = itemJenisAlatId;
                    document.getElementById('modalKeteranganBarang').value = itemKeteranganBarang;

                    // Set the form action to the correct update URL
                    document.getElementById('modalFormUpdate').action = `/data-alat-update/${itemId}`;

                    // Show the modal
                    $('#confirmationModalUpdate').modal('show');
                })
                .catch(error => console.error('Error fetching item data:', error));
        }

        function hideConfirmationModalUpdate() {
            $('#confirmationModalUpdate').modal('hide');
        }

        function updateItemUpdate() {
            if (updateItemId) {
                var updateFormUpdate = document.getElementById('updateFormUpdate' + updateItemId);
                updateFormUpdate.submit();
            }
        }
    </script>

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
    <!-- AdminLTE for demo purposes -->
    <!-- Page specific script -->
</body>

</html>
