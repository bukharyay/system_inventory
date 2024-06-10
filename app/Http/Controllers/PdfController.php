<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use GuzzleHttp\Exception\ClientException;

class PdfController extends Controller
{
    public function index(Request $request)
    {
        $client = new Client();
        
        // Tambahkan filter berdasarkan rentang waktu
        $start_date = $request->query('start_date');
        $end_date = $request->query('end_date');
        
        $url = "http://127.0.0.1:8000/api/peminjaman?start_date={$start_date}&end_date={$end_date}";
        

        $response = $client->request('GET', $url, [
            'query' => [
                'start_date' => $start_date,
                'end_date' => $end_date
            ]
        ]);

        $content = $response->getBody()->getContents();
        $data = json_decode($content, true);

        return view('pdf.peminjamPDF', ['data' => $data]);
    }

public function downloadPdf(Request $request)
{
    try {
        $client = new Client();

        // Tambahkan filter berdasarkan rentang waktu
        $start_date = $request->query('start_date');
        $end_date = $request->query('end_date');

        $url = "http://127.0.0.1:8000/api/pinjam?start_date={$start_date}&end_date={$end_date}";

        $response = $client->request('GET', $url, [
            'query' => [
                'start_date' => $start_date,
                'end_date' => $end_date
            ]
        ]);

        $content = $response->getBody()->getContents();
        $data = json_decode($content, true);

        // Cek apakah terdapat status error dalam data
        if (isset($data['status']) && $data['status'] === 'error') {
            // Jika terdapat status error, tampilkan pesan kesalahan
            echo "<script>alert('{$data['message']}');</script>";
            // Berhenti eksekusi lebih lanjut
            $client = new Client();
            $url = "http://127.0.0.1:8000/api/peminjaman";
    
            $response = $client->request('GET',$url);
            $content = $response->getBody()->getContents();
            $data = json_decode($content, true);
            // dd($data);
            return view('adminpage.peminjam', ['data'=>$data]);
        }

        $date = date('Y-m-d'); // Mengambil tanggal saat ini
        $filename = 'DataPeminjaman_' . $date . '.pdf'; // Nama file dengan format "DataPeminjaman_tanggal.pdf"

        $pdf = PDF::loadView('pdf.peminjamPDF', ['data' => $data])->setPaper('f4', 'landscape');
        return $pdf->download($filename);
    } catch (ClientException $e) {
        // Tangani kesalahan dari permintaan HTTP ke API dengan menampilkan notifikasi alert JavaScript
        echo "<script>alert('{$e->getMessage()}');</script>";
    } catch (\Exception $e) {
        // Tangani kesalahan umum dengan menampilkan notifikasi alert JavaScript
        echo "<script>alert('Terjadi kesalahan saat mengunduh data Peminjaman');</script>";
    }
}
}