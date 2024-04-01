<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\pinjam;

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
        $contentArray = json_decode($content, true);
        $data = $contentArray['data'];
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
            'id_alat' => $request->id_alat,
            'nama_peminjam' => $request->nama_peminjam,
            'dosen' => $request->dosen,
            'ruang' => $request->ruang,
            'mata_kuliah' => $request->mata_kuliah,
            'tanggal_peminjaman' => $request->tanggal_peminjaman,
            'waktu_peminjaman' => $request->waktu_peminjaman,
        ]);
    
        // Redirect ke halaman history mahasiswa
        return redirect()->route('history-mahasiswa');
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
