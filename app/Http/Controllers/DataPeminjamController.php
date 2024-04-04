<?php

namespace App\Http\Controllers;

use App\Models\pinjam;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class DataPeminjamController extends Controller
{
    public function index()
    {
        $client = new Client();
        $url = "http://127.0.0.1:8000/api/peminjaman";

        $response = $client->request('GET',$url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        $data = $contentArray['data'];
        return view('adminpage.peminjam', ['data'=>$data]);
    }



        /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateKonfirmasi(Request $request, $id)
    {
        $pinjam = pinjam::find($id);
        
        if ($pinjam) {
            $pinjam->keterangan = $request->keterangan;
            
            $pinjam->save();
            
            // Redirect ke halaman history mahasiswa
            return redirect()->route('DataPeminjam');
        }
        
        // Jika data tidak ditemukan, kembalikan respon atau lakukan penanganan kesalahan lainnya
        return response()->json(['message' => 'Data not found'], 404);
    }
}
