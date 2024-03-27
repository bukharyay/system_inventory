<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;

class DataPeminjam extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apiUrl = 'http://127.0.0.1:8000/api/peminjaman';
    
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $apiData = curl_exec($ch);
        curl_close($ch);

        $dataFromApi = json_decode($apiData); // Mengkonversi data JSON dari API ke dalam array PHP

        $formattedData = collect($dataFromApi)->map(function ($item) {
            return [
                'id' => $item->id,
                'users_id' => $item->users_id,
                'kode_alat_id' => $item->kode_alat_id,
                'tanggal_peminjaman' => $item->tanggal_peminjaman,
                'tanggal_kembali' => $item->tanggal_kembali,
                'status' => $item->status,
                'kondisi' => $item->kondisi
            ];
        });

        return view('peminjam.index', compact('formattedData')); // Mengirimkan $formattedData ke view
    }

    // Metode lainnya tidak diubah karena tidak relevan dengan masalah utama yang Anda miliki
}
