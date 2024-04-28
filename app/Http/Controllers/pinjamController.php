<?php

namespace App\Http\Controllers;

use App\Models\pinjam;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class pinjamController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */ 
    public function index()
    {
        $client = new Client();
        $url = "http://127.0.0.1:8000/api/pinjam";

        $response = $client->request('GET',$url);
        $content = $response->getBody()->getContents();
        $data = json_decode($content, true);
        // dd($data);
        return view('mahasiswa.history', ['data'=>$data]);
    }

    // public function history(){
    //     $data = pinjam::all();
    //     return view ('mahasiswa.history', ['data' => $data]);
    // }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mahasiswa.pinjam');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        pinjam::create([
            'nim' => $request->nim,
            'nama_alat' => $request->nim,
            'nama_peminjam' => $request->nama_peminjam,
            'nama_alat_1' => $request->nama_alat_1,
            'jumlah_alat_1' => $request->jumlah_alat_1,
            'id_alat_1' => $request->id_alat_1,
            'nama_alat_2' => $request->nama_alat_2,
            'jumlah_alat_2' => $request->jumlah_alat_2,
            'id_alat_2' => $request->id_alat_2,
            'nama_alat_3' => $request->nama_alat_3,
            'jumlah_alat_3' => $request->jumlah_alat_3,
            'id_alat_3' => $request->id_alat_3,
            'nama_alat_4' => $request->nama_alat_4,
            'jumlah_alat_4' => $request->jumlah_alat_4,
            'id_alat_4' => $request->id_alat_4,
            'nama_alat_5' => $request->nama_alat_5,
            'jumlah_alat_5' => $request->jumlah_alat_5,
            'id_alat_5' => $request->id_alat_5,
            'dosen' => $request->dosen,
            'ruang' => $request->ruang,
            'mata_kuliah' => $request->mata_kuliah,
            'tanggal_peminjaman' => $request->tanggal_peminjaman,
            'waktu_peminjaman' => $request->waktu_peminjaman,
            'keterangan' => $request->keterangan,
        ]);
    
        // Redirect ke halaman history mahasiswa
        return redirect()->route('list-pinjam');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $client = new Client();
        $url = "http://127.0.0.1:8000/api/pinjam/delete/{$id}";

        try {
            $response = $client->request('DELETE', $url);
            $statusCode = $response->getStatusCode();

            if ($statusCode == 204) {
                return redirect()->route('history-mahasiswa')->with('success', 'Data berhasil dihapus.');
            } else {
                return redirect()->route('history-mahasiswa')->with('error', 'Gagal menghapus data.');
            }
        } catch (\Exception $e) {
            // Penanganan kesalahan saat menghubungi API
            Log::error('Error deleting data: ' . $e->getMessage()); // Logging pesan kesalahan
            return redirect()->route('history-mahasiswa')->with('error', 'Terjadi kesalahan saat menghubungi API.');
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
            return redirect()->route('history-mahasiswa');
        }
        
        // Jika data tidak ditemukan, kembalikan respon atau lakukan penanganan kesalahan lainnya
        return response()->json(['message' => 'Data not found'], 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
