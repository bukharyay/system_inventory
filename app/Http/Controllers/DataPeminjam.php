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
        // $apiUrl = 'http://127.0.0.1:8000/api/peminjaman';
    
        // $ch = curl_init();
        // curl_setopt($ch, CURLOPT_URL, $apiUrl);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // $apiData = curl_exec($ch);
        // curl_close($ch);
    
        $data = Peminjaman::all();
        
        // $formattedData = collect($data)->map(function ($item) {
        //     return [
        //         'id' => $item->id,
        //         'user_id' => $item->id_user,
        //         'tool_code' => $item->kode_alat,
        //         'borrow_date' => $item->tanggal_peminjaman,
        //         'return_date' => $item->tanggal_kembali,
        //         'status' => $item->status,
        //         'condition' => $item->kondisi
        //     ];
        // });
      
    
        return view('peminjam.index',compact( 'data'));
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
        //
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
