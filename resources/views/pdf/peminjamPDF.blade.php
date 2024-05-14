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
                        <td
                            style="background-color: {{ $item['keterangan'] === 'Diajukan' ? 'yellow' : ($item['keterangan'] === 'Dipinjamkan' ? 'lightgreen' : ($item['keterangan'] === 'Selesai' ? 'red' : '')) }}">
                            {{ $item['keterangan'] }}
                        </td>

                    </tr>
                @endif
            @endforeach
        @endif

    </tbody>
</table>

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
