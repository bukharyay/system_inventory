<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="../assets/css/pinjam.css">
    <link rel=" preconnect " href="https://fonts.googleapis.com ">
    <link rel="preconnect " href="https://fonts.gstatic.com " crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap " rel="stylesheet ">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    {{-- data tables --}}
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="../assets/admin_lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    {{--  --}}
    <title>HISTORY MAHASISWA</title>
</head>

<body>
    <header>
        @include('layouts.navbar')

    </header>
    <section class="table">
        <h1>History Peminjaman</h1>
        <table class="table table-striped" id="data-table">
            <thead>
                <tr>
                    <th class="">No</th>
                    <th class="col-md-1">Nama Alat</th>
                    <th class="col-md-1">NIM</th>
                    <th class="col-md-2">Nama Peminjam</th>
                    <th class="col-md-1">Dosen</th>
                    <th class="col-md-1">Ruang</th>
                    <th class="col-md-2">Mata Kuliah</th>
                    <th class="col-md-2">Tanggal Pinjam</th>
                    <th class="col-md-1">Waktu Pinjam</th>
                    <th class="col-md-1">Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $nomor = 1;
                @endphp
                @foreach ($data as $item)
                    @if ($item['keterangan'] === 'Selesai')
                        <tr>
                            <td>{{ $nomor++ }}</td>
                            <td>{{ $item['nama_alat_1'] }}</td>
                            <td>{{ $item['nim'] }}</td>
                            <td>{{ $item['nama_peminjam'] }}</td>
                            <td>{{ $item['dosen'] }}</td>
                            <td>{{ $item['ruang'] }}</td>
                            <td>{{ $item['mata_kuliah'] }}</td>
                            <td>{{ $item['tanggal_peminjaman'] }}</td>
                            <td>{{ $item['waktu_peminjaman'] }}</td>
                            <td
                                style="background-color: {{ $item['keterangan'] === 'Diajukan' ? 'yellow' : ($item['keterangan'] === 'Dipinjamkan' ? 'lightgreen' : ($item['keterangan'] === 'Selesai' ? 'red' : '')) }}">
                                {{ $item['keterangan'] }}
                            </td>
                    @endif
                @endforeach

            </tbody>
        </table>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="../assets/js/profile.js"></script>
    <script>
        $(document).ready(function() {
            $('#data-table').DataTable();
        });
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


</body>

</html>
