<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- DataTables -->
    <link rel="stylesheet" href="../assets/admin_lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <title>PEMINJAMAN MAHASISWA</title>
</head>

<body>
    <header>
        @include('layouts.navbarmhs')
    </header>
    <section class="table">
        <h1>HISTORY PEMINJAMAN</h1>
        <li>
            @if (session('nim'))
                <p style="font-weight: bold;" id="nama_peminjam_placeholder">Loading...</p>
            @else
                <p>NIM not found</p>
            @endif
        </li>
        <table class="table table-striped" id="data-table">
            <thead>
                <tr>
                    <th class="md-col-4">No</th>
                    <th>Nama Alat</th>
                    <th>Nama DOSEN</th>
                    <th>Ruangan</th>
                    <th>Mata Kuliah</th>
                    <th>Tanggal Pinjam</th>
                    <th>Waktu Peminjaman</th>

                </tr>
            </thead>
            <tbody>
                @if ($data['status'] === 'error')
                    <tr class="text-center">
                        <td colspan="9">{{ $data['message'] }}</td>
                    </tr>
                @else
                    @php
                        $counter = 1;
                    @endphp
                    @foreach ($data['data'] as $item)
                        @if (isset($item['nim']) && $item['nim'] == intval(session('nim')) && $item['keterangan'] === 'Selesai')
                            <tr>
                                <td>{{ $counter }}</td>
                                <td>{{ $item['nama_alat_1'] }}</td>
                                <td>{{ $item['dosen'] }}</td>
                                <td>{{ $item['ruang'] }}</td>
                                <td>{{ $item['mata_kuliah'] }}</td>
                                <td>{{ $item['tanggal_waktu_peminjaman'] }}</td>
                                <td>
                                    @if ($item['keterangan'] === 'Diajukan')
                                        <span class="badge badge-primary">
                                            <i class="fas fa-paper-plane" style="margin-right: 5px;"></i> Diajukan
                                        </span>
                                    @elseif ($item['keterangan'] === 'Dipinjamkan')
                                        <span class="badge badge-warning">
                                            <i class="fas fa-handshake" style="margin-right: 5px;"></i> Dipinjamkan
                                        </span>
                                    @elseif ($item['keterangan'] === 'Selesai')
                                        <span class="badge badge-success">
                                            <i class="fas fa-check" style="margin-right: 5px;"></i> Selesai
                                        </span>
                                    @endif
                                </td>
                            </tr>
                            @php
                                $counter++;
                            @endphp
                        @endif
                    @endforeach
                @endif
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
    {{-- mendapat data username by nim --}}
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
                    $('#nama_peminjam_placeholder').text(
                        "- " + username + " (" + nim + ")"
                    ); // Mengatur teks elemen h1 dengan username yang diambil dan nim dalam kurung
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
    {{-- end --}}

    {{--  --}}

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

    <script>
        function deletePinjam(id) {
            if (confirm('Are you sure you want to delete this pinjam?')) {
                fetch('/pinjam/delete/' + id, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        // Handle the response data
                        console.log(data);
                    })
                    .catch(error => {
                        // Handle the error
                        console.error(error);
                    });
            }
        }
    </script>

    {{--  --}}
</body>

</html>
