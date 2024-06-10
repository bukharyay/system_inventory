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
        $url = "http://127.0.0.1:8000/api/pinjam";

        $response = $client->request('GET',$url);
        $content = $response->getBody()->getContents();
        $data = json_decode($content, true);

            // Extract counts from the response data
        $countSelesai = $data['count_selesai'] ?? 0;
        $countDiajukan = $data['count_diajukan'] ?? 0;
        $countDipinjamkan = $data['count_dipinjamkan'] ?? 0;
        // dd($data);
            return view('adminpage.peminjam', [
        'data' => $data,
        'countSelesai' => $countSelesai,
        'countDiajukan' => $countDiajukan,
        'countDipinjamkan' => $countDipinjamkan,
        ]);
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
            if($request->keterangan === "Selesai"){
                try {
                    // Mengupdate stok untuk setiap alat yang dipinjam
                    $this->updateStokAlat($pinjam, $request);
                    // Lainnya proses penyelesaian pinjam
                } catch (\Exception $e) {
                    // Menampilkan pesan kesalahan di console
                    dd($e->getMessage());
                }
            }
            else{
                try {
                    // Mengupdate stok untuk setiap alat yang dipinjam
                    $this->kurangiStokAlat($pinjam, $request);
                    // Lainnya proses penyelesaian pinjam
                } catch (\Exception $e) {
                    // Menampilkan pesan kesalahan di console
                    dd($e->getMessage());
                }
            }
        }

        $pinjam->keterangan = $request->keterangan;
        $pinjam->save();
            
        return redirect()->route('DataPeminjam');
    }
    
    private function updateStokAlat($pinjam, $request) {
        $id_alat_fields = ['id_alat_1', 'id_alat_2', 'id_alat_3', 'id_alat_4', 'id_alat_5'];
        $jumlah_alat_fields = ['jumlah_alat_1', 'jumlah_alat_2', 'jumlah_alat_3', 'jumlah_alat_4', 'jumlah_alat_5'];
    
        foreach ($id_alat_fields as $index => $id_alat_field) {
            $id_alat = $request->input($id_alat_field);
            $jumlah_alat = $request->input($jumlah_alat_fields[$index]);
    
            if ($id_alat && $jumlah_alat) {
                $dataAlat = data_alat::findOrFail($id_alat);
                $dataAlat->stok += $jumlah_alat;
                $dataAlat->save();
            }
        }
    }

    private function kurangiStokAlat($pinjam, $request) {
        $id_alat_fields = ['id_alat_1', 'id_alat_2', 'id_alat_3', 'id_alat_4', 'id_alat_5'];
        $jumlah_alat_fields = ['jumlah_alat_1', 'jumlah_alat_2', 'jumlah_alat_3', 'jumlah_alat_4', 'jumlah_alat_5'];
    
        foreach ($id_alat_fields as $index => $id_alat_field) {
            $id_alat = $request->input($id_alat_field);
            $jumlah_alat = $request->input($jumlah_alat_fields[$index]);
    
            if ($id_alat && $jumlah_alat) {
                $dataAlat = data_alat::findOrFail($id_alat);
                $dataAlat->stok -= $jumlah_alat;
                $dataAlat->save();
            }
        }
    }
    
}
