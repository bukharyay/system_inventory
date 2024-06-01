<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="../assets/admin_lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">

    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <!-- Load DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- CSS Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- JavaScript Bootstrap -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="../assets/css/pinjam.css">
    <link rel=" preconnect " href="https://fonts.googleapis.com ">
    <link rel="preconnect " href="https://fonts.gstatic.com " crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap " rel="stylesheet ">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    {{-- data tables --}}
    <!-- jQuery -->

    <title>Cart</title>
</head>

<body>
    <header>
        @auth
            @if (Auth::user()->role == 'staff')
                @include('layouts.navbar')
            @elseif (Auth::user()->role == 'dosen')
                @include('layouts.navbardsn')
            @endif
        @endauth
    </header>
    <section class="table">
        <h1 style="font-size: 3em; font-weight: bold;">DAFTAR PINJAMAN</h1>
        <table class="table table-striped" id="data-table">
            <thead>
                <tr>
                    <th class="col-md-1">NO</th>
                    <th class="col-md-5">Nama Alat</th>
                    <th class="col-md-1">Jumlah</th>
                    <th class="col-md-1">Delete</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $nomor = 1;
                @endphp
                @php $total = 0 @endphp
                @if (session('cart'))
                    @foreach (session('cart') as $id => $details)
                        <tr rowId="{{ $id }}">
                            <td>{{ $nomor++ }}</td>
                            <td data-th="nama_alat">{{ $details['nama_alat'] }}</td>
                            <td data-th="quantity">
                                <div class="select-wrapper">
                                    <select name="quantity" data-product-id="{{ $id }}" class="update-cart">
                                        @for ($i = 0; $i <= $details['stok']; $i++)
                                            <option value="{{ $i }}"
                                                {{ $i == $details['quantity'] ? 'selected' : '' }}>{{ $i }}
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                            </td>


                            <td class="actions">
                                <a class="btn btn-outline-danger btn-sm delete-product">
                                    <i class="fa fa-trash"></i>
                                    Hapus
                                </a>
                            </td>

                        </tr>
                    @endforeach
                @else
                    <div class="cart-empty">
                        <!-- Ikon Keranjang -->
                        <i class="fas fa-shopping-cart"></i>
                        <!-- Teks "Keranjang kosong" -->
                        <span class="text">Keranjang kosong</span>
                    </div>

                @endif

            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5" class="text-right">
                        <a href="{{ url('/data-alat') }}" class="btn btn-primary"><i class="fa fa-angle-left"></i>
                            Lihat Barang</a>
                        <button class="btn btn-success" data-toggle="modal" data-target="#pinjamModal">
                            <i class="fas fa-book"></i> Pinjam
                        </button>
                    </td>
                </tr>
            </tfoot>
        </table>
    </section>


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

                    <form action="{{ route('simpan-dosen') }}" method="POST" class="form-peminjaman">
                        @csrf
                        <h1>Masukkan Data Peminjaman</h1>

                        <div class="row">
                            <div class="col">
                                <label for="nama_peminjam" class="form-label">NAMA</label>
                                <input type="text" class="form-control" readonly name="nama_peminjam"
                                    id="nama_peminjam" value="" placeholder="Masukkan NAMA anda">
                            </div>
                            <div class="col">
                                <label for="nim" class="form-label">NIM</label>
                                <input type="text" class="form-control" readonly value="{{ session('nim') }}"
                                    name="nim" id="nim" placeholder="Masukkan NIM anda">
                            </div>
                        </div>

                        <?php
                        // Inisialisasi array kosong untuk menyimpan nilai dari session 'cart'
                        $cartItems = [];
                        
                        // Periksa apakah session 'cart' ada
                        if (session('cart')) {
                            // Jika ada, lakukan iterasi dan tambahkan setiap detail ke dalam array $cartItems
                            foreach (session('cart') as $id => $details) {
                                $cartItems[] = $details['nama_alat'];
                                $cartQuantity[] = $details['quantity'];
                                $id_alat[] = $details['id_alat'];
                            }
                        }
                        
                        // Inisialisasi variabel data dengan default value kosong
                        $data1 = null;
                        $qty1 = null;
                        $id_alat_1 = 0;
                        
                        $data2 = null;
                        $qty2 = null;
                        $id_alat_2 = 0;
                        
                        $data3 = null;
                        $qty3 = null;
                        $id_alat_3 = 0;
                        
                        $data4 = null;
                        $qty4 = null;
                        $id_alat_4 = 0;
                        
                        $data5 = null;
                        $qty5 = null;
                        $id_alat_5 = 0;
                        
                        // Set nilai variabel data berdasarkan isi array $cartItems
                        if (isset($cartItems[0])) {
                            $data1 = $cartItems[0];
                            $qty1 = $cartQuantity[0];
                            $id_alat_1 = $id_alat[0];
                        }
                        
                        if (isset($cartItems[1])) {
                            $data2 = $cartItems[1];
                            $qty2 = $cartQuantity[1];
                            $id_alat_2 = $id_alat[1];
                        }
                        
                        if (isset($cartItems[2])) {
                            $data3 = $cartItems[2];
                            $qty3 = $cartQuantity[2];
                            $id_alat_3 = $id_alat[2];
                        }
                        
                        if (isset($cartItems[3])) {
                            $data4 = $cartItems[3];
                            $qty4 = $cartQuantity[3];
                            $id_alat_4 = $id_alat[3];
                        }
                        if (isset($cartItems[4])) {
                            $data5 = $cartItems[4];
                            $qty5 = $cartQuantity[4];
                            $id_alat_5 = $id_alat[4];
                        }
                        ?>

                        @if (isset($id_alat_1))
                            <input type="text" name="id_alat_1" value="<?php echo isset($id_alat_1) ? $id_alat_1 : ''; ?>" hidden>
                        @else
                            <input type="text" value="0" hidden>
                        @endif

                        @if (isset($id_alat_2))
                            <input type="text" name="id_alat_2" value="<?php echo isset($id_alat_2) ? $id_alat_2 : ''; ?>" hidden>
                        @else
                            <input type="text" value="0" hidden>
                        @endif

                        @if (isset($id_alat_3))
                            <input type="text" name="id_alat_3" value="<?php echo isset($id_alat_3) ? $id_alat_3 : ''; ?>" hidden>
                        @else
                            <input type="text" value="0" hidden>
                        @endif

                        @if (isset($id_alat_4))
                            <input type="text" name="id_alat_4" value="<?php echo isset($id_alat_4) ? $id_alat_4 : ''; ?>" hidden>
                        @else
                            <input type="text" value="0" hidden>
                        @endif

                        @if (isset($id_alat_5))
                            <input type="text" name="id_alat_5" value="<?php echo isset($id_alat_5) ? $id_alat_5 : ''; ?>" hidden>
                        @else
                            <input type="text" value="0" hidden>
                        @endif

                        <div class="row">
                            <div class="col">
                                <label for="nama_alat" class="form-label">NAMA ALAT 1 </label>
                                <input type="text" class="form-control" readonly name="nama_alat_1"
                                    id="nama_alat" placeholder="Masukkan Nama Alat" value="<?php echo isset($data1) ? $data1 : ''; ?>">
                            </div>
                            <div class="col">
                                <label for="jumlah_alat_1" class="form-label">JUMLAH ALAT 1</label>
                                <input type="text" class="form-control" readonly name="jumlah_alat_1"
                                    placeholder="Masukkan Jumlah Alat" value="<?php echo isset($qty1) ? $qty1 : ''; ?>">
                            </div>
                        </div>

                        @if (isset($data2) && isset($qty2))
                            <div class="row">
                                <div class="col">
                                    <label for="nama_alat_2" class="form-label">NAMA ALAT 2</label>
                                    <input type="text" class="form-control" readonly name="nama_alat_2"
                                        id="nama_alat" placeholder="Masukkan Nama Alat" value="{{ $data2 }}">
                                </div>
                                <div class="col">
                                    <label for="jumlah_alat_2" class="form-label">JUMLAH ALAT 2</label>
                                    <input type="text" class="form-control" readonly name="jumlah_alat_2"
                                        placeholder="Masukkan Jumlah Alat" value="{{ $qty2 }}">
                                </div>
                            </div>
                        @endif

                        @if (isset($data3) && isset($qty3))
                            <div class="row">
                                <div class="col">
                                    <label for="nama_alat_3" class="form-label">NAMA ALAT 3</label>
                                    <input type="text" class="form-control" readonly name="nama_alat_3"
                                        id="nama_alat" placeholder="Masukkan Nama Alat" value="{{ $data3 }}">
                                </div>
                                <div class="col">
                                    <label for="jumlah_alat_3" class="form-label">JUMLAH ALAT 3</label>
                                    <input type="text" class="form-control" readonly name="jumlah_alat_3"
                                        placeholder="Masukkan Jumlah Alat" value="{{ $qty3 }}">
                                </div>
                            </div>
                        @endif

                        @if (isset($data4) && isset($qty4))
                            <div class="row">
                                <div class="col">
                                    <label for="nama_alat_4" class="form-label">NAMA ALAT 4</label>
                                    <input type="text" class="form-control" readonly name="nama_alat_4"
                                        id="nama_alat" placeholder="Masukkan Nama Alat" value="{{ $data4 }}">
                                </div>
                                <div class="col">
                                    <label for="jumlah_alat_4" class="form-label">JUMLAH ALAT 4</label>
                                    <input type="text" class="form-control" readonly name="jumlah_alat_4"
                                        placeholder="Masukkan Jumlah Alat" value="{{ $qty4 }}">
                                </div>
                            </div>
                        @endif

                        @if (isset($data5) && isset($qty5))
                            <div class="row">
                                <div class="col">
                                    <label for="nama_alat_5" class="form-label">NAMA ALAT 5</label>
                                    <input type="text" class="form-control" readonly name="nama_alat_5"
                                        id="nama_alat" placeholder="Masukkan Nama Alat" value="{{ $data5 }}">
                                </div>
                                <div class="col">
                                    <label for="jumlah_alat_5" class="form-label">JUMLAH ALAT 5</label>
                                    <input type="text" class="form-control" readonly name="jumlah_alat_5"
                                        placeholder="Masukkan Jumlah Alat" value="{{ $qty5 }}">
                                </div>
                            </div>
                        @endif

                        <input type="text" class="form-control" name="dosen" id="dosen"
                            placeholder="Masukkan DOSEN anda" value="-" hidden>

                        <div class="row">
                            @if (auth()->check() && auth()->user()->role == 'mahasiswa')
                                <div class="col">
                                    <label for="dosen" class="form-label">DOSEN</label>
                                    <input type="text" class="form-control" name="dosen" id="dosen"
                                        placeholder="Masukkan DOSEN anda">
                                </div>
                            @endif
                            @if (auth()->check() && auth()->user()->role == 'dosen')
                                <div class="col">
                                    <label for="kelas" class="form-label">KELAS</label>
                                    <input type="text" class="form-control" name="kelas" id="kelas"
                                        placeholder="Masukkan kelas anda">
                                </div>
                            @endif
                            <div class="col">
                                <label for="mata_kuliah" class="form-label">MATA KULIAH</label>
                                <input type="text" class="form-control" name="mata_kuliah" id="matakuliah"
                                    placeholder="Masukkan MATA KULIAH anda">
                            </div>
                        </div>



                        <label for="ruang" class="form-label">RUANG</label>
                        <input type="text" class="form-control" name="ruang" id="ruang"
                            placeholder="Masukkan RUANG KULIAH anda">

                        <div class="row">
                            <div class="col">
                                <label for="tanggal_waktu_peminjaman" class="form-label">TANGGAL DAN WAKTU
                                    PEMINJAM</label>
                                <input type="datetime-local" class="form-control" name="tanggal_waktu_peminjaman"
                                    readonly id="tanggalwaktupinjam"
                                    placeholder="Masukkan TANGGAL DAN WAKTU PEMINJAM anda">
                            </div>
                        </div>



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




    <script>
        // Mengambil nilai dari session 'cart' dan menampilkannya di konsol
        var cartData = {!! json_encode(session('cart')) !!};
        console.log(cartData);
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script type="text/javascript">
        $(".update-cart").change(function(e) {
            e.preventDefault();
            var ele = $(this);
            var productId = ele.data("product-id");
            var selectedQuantity = ele.find("option:selected").val();
            $.ajax({
                url: '{{ route('cart.update.dosen') }}',
                method: "post",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: productId,
                    quantity: selectedQuantity
                },
                success: function(response) {
                    window.location.reload();
                    console.log(selectedQuantity); // Cetak selected quantity
                }
            });
        });


        $(".delete-product").click(function(e) {
            e.preventDefault();

            var ele = $(this);

            if (confirm("Apakah Anda yakin ingin menghapus?")) {
                $.ajax({
                    url: '{{ route('delete.cart.dosen') }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.parents("tr").attr("rowId")
                    },
                    success: function(response) {
                        // Tambahkan efek visual saat menghapus
                        ele.parents('tr').fadeOut().remove();
                        // Tambahkan delay sebelum reload halaman
                        setTimeout(function() {
                            window.location.reload();
                        }, 1000);
                    }
                });
            }
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#data-table').DataTable();
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#pinjamModal').on('show.bs.modal', function() {
                // Mendapatkan tanggal dan waktu saat ini
                var today = new Date();
                var day = String(today.getDate()).padStart(2, '0');
                var month = String(today.getMonth() + 1).padStart(2, '0');
                var year = today.getFullYear();
                var formattedDate = year + '-' + month + '-' + day;

                // Mendapatkan waktu saat ini
                var jam = ('0' + today.getHours()).slice(-2);
                var menit = ('0' + today.getMinutes()).slice(-2);
                var waktuDefault = jam + ':' + menit;

                // Mengatur nilai default pada input tanggal dan waktu
                $('#tanggalwaktupinjam').val(formattedDate + 'T' + waktuDefault);
            });
        });
    </script>


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

    <script src="../assets/admin_lte/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../assets/admin_lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../assets/admin_lte/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../assets/admin_lte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="../assets/admin_lte/plugins/jszip/jszip.min.js"></script>
    <script src="../assets/admin_lte/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="../assets/admin_lte/plugins/pdfmake/vfs_fonts.js"></script>

    <script src="../assets/admin_css/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/admin_css/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../assets/admin_css/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../assets/admin_css/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../assets/admin_css/vendor/chart.js/Chart.min.js"></script>
</body>

</html>
