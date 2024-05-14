<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="../assets/admin_lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    {{--  --}}
    <title>PEMINJAMAN MAHASISWA</title>
</head>

<body>
    <header>
        @include('layouts.navbar')

    </header>
    <section class="table">
        <h1>Data Peminjaman</h1>
        <a href="/download-pdf">Unduh PDF</a>
        <table class="table table-striped" id="data-table">
            <thead>
                <tr>
                    <th class="">No</th>
                    <th class="col-md-1">NIM</th>
                    <th class="col-md-2">Nama Peminjam</th>
                    <th class="col-md-1">Dosen</th>
                    <th class="col-md-1">Ruang</th>
                    <th class="col-md-2">Mata Kuliah</th>
                    <th class="col-md-2">Waktu Pinjam</th>
                    <th class="col-md-1">Nama dan Jumlah Alat</th>
                    <th class="col-md-1">Keterangan</th>
                    <th class="col-md-1">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if (isset($data['status']) && $data['status'] === 'error')
                    <tr class="text-center">
                        <td colspan="12">{{ $data['message'] }}</td>
                    </tr>
                @else
                    @php
                        $nomor = 1;
                    @endphp
                    @foreach ($data['data'] as $item)
                        @if (isset($item['nim']) && $item['nim'] != intval(session('nim')))
                            <tr>
                                <td>{{ $nomor++ }}</td>
                                <td>{{ $item['nim'] }}</td>
                                <td>{{ $item['nama_peminjam'] }}</td>
                                <td>{{ $item['dosen'] }}</td>
                                <td>{{ $item['ruang'] }}</td>
                                <td>{{ $item['mata_kuliah'] }}</td>
                                <td>{{ $item['tanggal_waktu_peminjaman'] }}</td>
                                <td>
                                    <div>
                                        {{ $item['nama_alat_1'] }},
                                        {{ $item['jumlah_alat_1'] }}
                                    </div>
                                    @if ($item['nama_alat_2'] !== null && $item['jumlah_alat_2'] !== null)
                                        <div>
                                            {{ $item['nama_alat_2'] }},
                                            {{ $item['jumlah_alat_2'] }}
                                        </div>
                                    @endif
                                    @if ($item['nama_alat_3'] !== null && $item['jumlah_alat_3'] !== null)
                                        <div>
                                            {{ $item['nama_alat_3'] }},
                                            {{ $item['jumlah_alat_3'] }}
                                        </div>
                                    @endif
                                    @if ($item['nama_alat_4'] !== null && $item['jumlah_alat_4'] !== null)
                                        <div>
                                            {{ $item['nama_alat_4'] }},
                                            {{ $item['jumlah_alat_4'] }}
                                        </div>
                                    @endif
                                    @if ($item['nama_alat_5'] !== null && $item['jumlah_alat_5'] !== null)
                                        <div>
                                            {{ $item['nama_alat_5'] }},
                                            {{ $item['jumlah_alat_5'] }}
                                        </div>
                                    @endif
                                </td>
                                <?php
                                // Misalkan $item adalah array yang berisi data Anda, dan $item['keterangan'] adalah keterangan yang menentukan teks yang akan ditampilkan.
                                
                                // Menggunakan struktur percabangan if-else untuk menentukan teks yang akan ditampilkan.
                                if ($item['keterangan'] === 'Diajukan') {
                                    $spanText = 'Pinjam';
                                } elseif ($item['keterangan'] === 'Dipinjamkan') {
                                    $spanText = 'Selesai';
                                } else {
                                    // Jika kondisi lainnya, teks akan tetap 'Pinjam'.
                                    $spanText = '-';
                                }
                                ?>
                                <td
                                    style="background-color: {{ $item['keterangan'] === 'Diajukan' ? 'yellow' : ($item['keterangan'] === 'Dipinjamkan' ? 'lightgreen' : ($item['keterangan'] === 'Selesai' ? 'red' : '')) }}">
                                    {{ $item['keterangan'] }}
                                </td>
                                <td>
                                    @if ($item['keterangan'] === 'Diajukan')
                                        <form id="updateForm{{ $item['id'] }}"
                                            action="{{ route('pinjam.update', ['id' => $item['id']]) }}"
                                            method="POST">
                                            @csrf
                                            @method('PUT')
                                            <!-- Isi formulir dengan input yang sesuai untuk melakukan pembaruan data -->
                                            <!-- Contoh: -->
                                            <input hidden type="text" name="keterangan" value="Dipinjamkan">

                                            <input hidden type="text" name="jumlah_alat_1"
                                                value="{{ $item['jumlah_alat_1'] }}">


                                            <input hidden type="text" name="id_alat_1"
                                                value="{{ $item['id_alat_1'] }}">


                                            @if ($item['jumlah_alat_2'] !== null && $item['id_alat_2'] !== 0)
                                                <input hidden type="text" name="jumlah_alat_2"
                                                    value="{{ $item['jumlah_alat_2'] }}">

                                                <input hidden type="text" name="id_alat_2"
                                                    value="{{ $item['id_alat_2'] }}">
                                            @endif

                                            @if ($item['jumlah_alat_3'] !== null && $item['id_alat_2'] !== 0)
                                                <input hidden type="text" name="jumlah_alat_3"
                                                    value="{{ $item['jumlah_alat_3'] }}">

                                                <input hidden type="text" name="id_alat_3"
                                                    value="{{ $item['id_alat_3'] }}">
                                            @endif

                                            @if ($item['jumlah_alat_4'] !== null && $item['id_alat_2'] !== 0)
                                                <input hidden type="text" name="jumlah_alat_4"
                                                    value="{{ $item['jumlah_alat_4'] }}">

                                                <input hidden type="text" name="id_alat_4"
                                                    value="{{ $item['id_alat_4'] }}">
                                            @endif

                                            @if ($item['jumlah_alat_5'] !== null && $item['id_alat_2'] !== 0)
                                                <input hidden type="text" name="jumlah_alat_5"
                                                    value="{{ $item['jumlah_alat_5'] }}">

                                                <input hidden type="text" name="id_alat_5"
                                                    value="{{ $item['id_alat_5'] }}">
                                            @endif


                                            <!-- Tambahkan input lainnya sesuai dengan kebutuhan -->

                                            <button id="submitButton{{ $item['id'] }}" type="button"
                                                class="btn btn-secondary"
                                                onclick="showConfirmationModal({{ $item['id'] }})" <span
                                                style="text-decoration: none;"><?php echo $spanText; ?></span>
                                            </button>

                                        </form>
                                    @elseif ($item['keterangan'] === 'Dipinjamkan')
                                        <form id="updateFormSelesai{{ $item['id'] }}"
                                            action="{{ route('pinjam.update', ['id' => $item['id']]) }}"
                                            method="POST">
                                            @csrf
                                            @method('PUT')
                                            <!-- Isi formulir dengan input yang sesuai untuk melakukan pembaruan data -->
                                            <!-- Contoh: -->
                                            <input hidden type="text" name="keterangan" value="Selesai">

                                            <input hidden type="text" name="jumlah_alat_1"
                                                value="{{ $item['jumlah_alat_1'] }}">


                                            <input hidden type="text" name="id_alat_1"
                                                value="{{ $item['id_alat_1'] }}">


                                            @if ($item['jumlah_alat_2'] !== null && $item['id_alat_2'] !== 0)
                                                <input hidden type="text" name="jumlah_alat_2"
                                                    value="{{ $item['jumlah_alat_2'] }}">

                                                <input hidden type="text" name="id_alat_2"
                                                    value="{{ $item['id_alat_2'] }}">
                                            @endif

                                            @if ($item['jumlah_alat_3'] !== null && $item['id_alat_2'] !== 0)
                                                <input hidden type="text" name="jumlah_alat_3"
                                                    value="{{ $item['jumlah_alat_3'] }}">

                                                <input hidden type="text" name="id_alat_3"
                                                    value="{{ $item['id_alat_3'] }}">
                                            @endif

                                            @if ($item['jumlah_alat_4'] !== null && $item['id_alat_2'] !== 0)
                                                <input hidden type="text" name="jumlah_alat_4"
                                                    value="{{ $item['jumlah_alat_4'] }}">

                                                <input hidden type="text" name="id_alat_4"
                                                    value="{{ $item['id_alat_4'] }}">
                                            @endif

                                            @if ($item['jumlah_alat_5'] !== null && $item['id_alat_2'] !== 0)
                                                <input hidden type="text" name="jumlah_alat_5"
                                                    value="{{ $item['jumlah_alat_5'] }}">

                                                <input hidden type="text" name="id_alat_5"
                                                    value="{{ $item['id_alat_5'] }}">
                                            @endif

                                            <button id="submitButton{{ $item['id'] }}" type="button"
                                                class="btn btn-secondary" style="text-decoration: none;"
                                                onclick="showConfirmationModalSelesai({{ $item['id'] }})">
                                                <span style="text-decoration: none;"><?php echo $spanText; ?></span>
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endif
                    @endforeach
                @endif

            </tbody>
        </table>

    </section>
    <!-- Modal Konfirmasi Pembaruan -->
    <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog"
        aria-labelledby="confirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmationModalLabel">Konfirmasi Pembaruan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                        onclick="hideConfirmationModal()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin memperbarui data ini?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="hideConfirmationModal()">Batal</button>
                    <button type="button" class="btn btn-primary" onclick="updateItem()">Perbarui</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="confirmationModalSelesai" tabindex="-1" role="dialog"
        aria-labelledby="confirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmationModalLabel">Konfirmasi Penyelesaian</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                        onclick="hideConfirmationModalSelesai()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menyelesaikan data ini?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        onclick="hideConfirmationModalSelesai()">Batal</button>
                    <button type="button" class="btn btn-primary" onclick="updateItemSelesai()">Selesai</button>
                </div>
            </div>
        </div>
    </div>

    {{-- <script>
        function confirmDelete2() {
            if (confirm('Apakah Anda yakin ingin menyimpan dan menghapus data?')) {
                deleteData();

            } else {
                return false;
            }
        }

        function deleteData() {
            try {
                var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                var deleteUrl = '';

                @if (isset($item['id']))
                    deleteUrl = '{{ route('deleteHistory', ['id' => $item['id']]) }}';
                @endif

                if (deleteUrl === '') {
                    console.error('Item tidak terdefinisi.');
                    return;
                }

                fetch(deleteUrl, {
                        method: 'DELETE',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken
                        }
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Gagal menghapus data');
                        }

                        window.location.reload();
                    })
                    .catch(error => {
                        console.error(error);
                    });
            } catch (error) {
                console.error(error.message);
            }
        }
    </script> --}}




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script>
        var updateItemId;

        function showConfirmationModal(itemId) {
            updateItemId = itemId;
            $('#confirmationModal').modal('show');
        }

        function showConfirmationModalSelesai(itemId) {
            updateItemId = itemId;
            $('#confirmationModalSelesai').modal('show');
        }

        function hideConfirmationModal() {
            $('#confirmationModal').modal('hide');
        }

        function hideConfirmationModalSelesai() {
            $('#confirmationModalSelesai').modal('hide');
        }

        function updateItem() {
            if (updateItemId) {
                var updateForm = document.getElementById('updateForm' + updateItemId);
                updateForm.submit();
            }
        }

        function updateItemSelesai() {
            if (updateItemId) {
                var updateFormSelesai = document.getElementById('updateFormSelesai' + updateItemId);
                updateFormSelesai.submit();
            }
        }
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
