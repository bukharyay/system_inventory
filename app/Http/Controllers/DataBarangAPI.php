<?php

namespace App\Http\Controllers;
use App\Models\data_alat;
use Illuminate\Http\Request;

class DataBarangAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = data_alat::join('jenis_alat', 'data_alat.jenis_alat_id', '=', 'jenis_alat.id')
        ->leftJoin('pinjams', 'data_alat.id', '=', 'pinjams.id_alat_1')
        ->select('data_alat.*', 'jenis_alat.nama_jenis_alat')
        ->orderByRaw("
            CASE 
                WHEN pinjams.keterangan = 'Diajukan' THEN 0 
                ELSE 1 
            END,
            CASE 
                WHEN data_alat.stok = 0 THEN 1 
                ELSE 0 
            END,
            data_alat.nama_alat ASC
        ")
        ->get();   
        
    if ($data->isEmpty()) {
        return response()->json([
            'status' => 'error',
            'message' => 'Data alat tidak ditemukan'
        ], 404);
    }
    
    return response()->json([
        'status' => 'success',
        'message' => 'Data alat berhasil diambil',
        'data' => $data
    ], 200);
        return response()->json([
            'status' => 'success',
            'message' => 'Data alat berhasil diambil',
            'data' => $data
        ], 200);
    }

    public function getDatabyId($id)
    {
        $data = data_alat::where('id', $id)->first();

        if ($data) {
            return response()->json([
                'status' => 'success',
                'data' => $data
            ], 200);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Data not found'
            ], 404);
        }
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

        /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        // Temukan data data_alat berdasarkan ID
        $data_alat = data_alat::find($id);
    
        // Jika data data_alat tidak ditemukan, kirimkan respons error
        if (!$data_alat) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data data_alat tidak ditemukan'
            ], 404);
        }
    
        // Hapus data data_alat
        $data_alat->delete();
    
        return response()->json([
            'status' => 'success',
            'message' => 'Data data_alat berhasil dihapus'
        ], 200);
    }
}
