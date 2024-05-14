<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function index(){
        $client = new Client();
        $url = "http://127.0.0.1:8000/api/peminjaman";

        $response = $client->request('GET',$url);
        $content = $response->getBody()->getContents();
        $data = json_decode($content, true);
        return view('pdf.peminjamPDF', ['data'=>$data]);
    }

    public function downloadPdf()
    {

        $client = new Client();
        $url = "http://127.0.0.1:8000/api/peminjaman";

        $response = $client->request('GET',$url);
        $content = $response->getBody()->getContents();
        $data = json_decode($content, true);

        $date = date('Y-m-d'); // Mengambil tanggal saat ini
        $filename = 'DataPeminjaman' . $date . '.pdf'; // Nama file dengan format "invoice_tanggal.pdf"

        $pdf = Pdf::loadView('pdf.peminjamPDF', ['data'=>$data])->setPaper('f4', 'landscape');
        return $pdf->download($filename);
    }
}