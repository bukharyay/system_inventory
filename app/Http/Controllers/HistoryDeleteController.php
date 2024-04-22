<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Models\HistoryDelete;
use Illuminate\Support\Facades\Log;

class HistoryDeleteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = new Client();
        $url = "http://127.0.0.1:8000/api/pinjam";

        $response = $client->request('GET',$url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        $data = $contentArray['data'];
        return view('adminpage.historyPeminjam', ['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        HistoryDelete::create([
            'nim' => $request->nim,
            'nama_alat' => $request->nama_alat,
            'id_alat' => $request->id_alat,
            'nama_peminjam' => $request->nama_peminjam,
            'dosen' => $request->dosen,
            'ruang' => $request->ruang,
            'mata_kuliah' => $request->mata_kuliah,
            'tanggal_peminjaman' => $request->tanggal_peminjaman,
            'waktu_peminjaman' => $request->waktu_peminjaman,
            'keterangan' => $request->keterangan,
        ]);
        // Redirect ke halaman history mahasiswa
        return redirect()->route('HistoryPeminjam');
    }

        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteHistory($id)
    {
        $client = new Client();
        $url = "http://127.0.0.1:8000/api/historyDelete/{$id}";

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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
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
