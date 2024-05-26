<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- CSS Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- JavaScript Bootstrap -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Document</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
        }
    </style>
</head>

<body>
    <h1>Data Peminjaman</h1>
    {{-- <p id="teks">nothing</p> --}}
    <table>
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
                    @endif
                @endforeach
            @endif

        </tbody>
    </table>
</body>

</html>





<script>
    // Mengambil referensi elemen <p> dengan ID "teks"
    var elemenP = document.getElementById('teks');

    var today = new Date();
    var day = String(today.getDate()).padStart(2, '0');
    var month = String(today.getMonth() + 1).padStart(2, '0');
    var year = today.getFullYear();
    var formattedDate = year + '-' + month + '-' + day;

    // Mendapatkan waktu saat ini
    var hours = ('0' + today.getHours()).slice(-2);
    var minutes = ('0' + today.getMinutes()).slice(-2);
    var waktuDefault = hours + ':' + minutes;


    // Mengubah konten elemen <p>
    elemenP.innerHTML = (formattedDate + ' ' + waktuDefault);
</script>
