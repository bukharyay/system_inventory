<?php

namespace App\Http\Controllers;

use App\Models\pinjam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class pinjamAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = pinjam::join('data_alat', 'pinjams.id_alat', '=', 'data_alat.id')
                        ->select('pinjams.*','data_alat.nama_alat')
                        ->get();
    
        if ($data->isEmpty()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data pinjam tidak ditemukan'
            ], 404);
        }
    
        return response()->json([
            'status' => 'success',
            'message' => 'Data pinjam berhasil diambil',
            'data' => $data
        ], 200);
    }

    public function getDatabyId($id)
    {
        $data = pinjam::find($id);
    
        if (!$data) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data pinjam tidak ditemukan'
            ], 404);
        }
    
        return response()->json([
            'status' => 'success',
            'message' => 'Data pinjam berhasil diambil',
            'data' => $data
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'users_id' => 'required',
            'kode_alat_id' => 'required',
            'tanggal_pinjam' => '',
            'tanggal_kembali' => '',
            'status' => 'required',
            'kondisi' => 'required'
        ]);
    
        // Jika validasi gagal, kirimkan respons error
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 400);
        }
    
        // Buat objek pinjam baru
        $pinjam = new pinjam();
        $pinjam->users_id = $request->users_id;
        $pinjam->kode_alat_id = $request->kode_alat_id;
        $pinjam->tanggal_pinjam = $request->tanggal_pinjam;
        $pinjam->tanggal_kembali = $request->tanggal_kembali;
        $pinjam->status = $request->status;
        $pinjam->kondisi = $request->kondisi;
    
        // Simpan objek pinjam ke database
        if ($pinjam->save()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Data pinjam berhasil dibuat',
                'data' => $pinjam
            ], 201);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Gagal menyimpan data pinjam'
            ], 500);
        }
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
    // Validasi input
    $validator = Validator::make($request->all(), [
        'users_id' => 'required',
        'kode_alat_id' => 'required',
        'tanggal_pinjam' => '',
        'tanggal_kembali' => '',
        'status' => 'required',
        'kondisi' => 'required'
    ]);

    // Jika validasi gagal, kirimkan respons error
    if ($validator->fails()) {
        return response()->json([
            'status' => 'error',
            'message' => 'Validasi gagal',
            'errors' => $validator->errors()
        ], 400);
    }

    // Temukan data pinjam berdasarkan ID
    $pinjam = pinjam::find($id);

    // Jika data pinjam tidak ditemukan, kirimkan respons error
    if (!$pinjam) {
        return response()->json([
            'status' => 'error',
            'message' => 'Data pinjam tidak ditemukan'
        ], 404);
    }

    // Update data pinjam dengan nilai input yang baru
    $pinjam->users_id = $request->users_id;
    $pinjam->kode_alat_id = $request->kode_alat_id;
    $pinjam->tanggal_pinjam = $request->tanggal_pinjam;
    $pinjam->tanggal_kembali = $request->tanggal_kembali;
    $pinjam->status = $request->status;
    $pinjam->kondisi = $request->kondisi;

    // Simpan perubahan ke database
    if ($pinjam->save()) {
        return response()->json([
            'status' => 'success',
            'message' => 'Data pinjam berhasil diperbarui',
            'data' => $pinjam
        ], 200);
    } else {
        return response()->json([
            'status' => 'error',
            'message' => 'Gagal memperbarui data pinjam'
        ], 500);
    }
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
{
    // Temukan data pinjam berdasarkan ID
    $pinjam = pinjam::find($id);

    // Jika data pinjam tidak ditemukan, kirimkan respons error
    if (!$pinjam) {
        return response()->json([
            'status' => 'error',
            'message' => 'Data pinjam tidak ditemukan'
        ], 404);
    }

    // Hapus data pinjam
    if ($pinjam->delete()) {
        return response()->json([
            'status' => 'success',
            'message' => 'Data pinjam berhasil dihapus'
        ], 200);
    } else {
        return response()->json([
            'status' => 'error',
            'message' => 'Gagal menghapus data pinjam'
        ], 500);
    }
}
}
