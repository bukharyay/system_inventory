<?php

namespace App\Http\Controllers;

use App\Models\data_alat;
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
        $data = json_decode($content, true);
        // dd($data);
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
            try {
                $dataAlat = data_alat::findOrFail($pinjam->id_alat);
                
                $dataAlat->stok -= 1;
                $dataAlat->save();
            } catch (\Exception $e) {
                // Menampilkan pesan kesalahan di console
                dd($e->getMessage());
            }
            
            $pinjam->keterangan = $request->keterangan;
            $pinjam->save();
            
            return redirect()->route('DataPeminjam');
        }
        
        return response()->json(['message' => 'Data not found'], 404);
    }
}
