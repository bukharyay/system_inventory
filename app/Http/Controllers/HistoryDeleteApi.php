<?php

namespace App\Http\Controllers;

use App\Models\HistoryDelete;
use App\Models\pinjam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HistoryDeleteApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = HistoryDelete::get();
    
        if ($data->isEmpty()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data pinjam tidak ditemukan'
            ]);
        }
    
        return response()->json([
            'status' => 'success',
            'message' => 'Data pinjam berhasil diambil',
            'data' => $data
        ]);
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
            'id_user' => 'required',
            'kode_alat_id' => 'required',
            'tanggal_peminjaman' => '',
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
    
        // Buat objek Peminjaman baru
        $peminjaman = new HistoryDelete();
        $peminjaman->id_user = $request->id_user;
        $peminjaman->kode_alat_id = $request->kode_alat_id;
        $peminjaman->tanggal_peminjaman = $request->tanggal_peminjaman;
        $peminjaman->tanggal_kembali = $request->tanggal_kembali;
        $peminjaman->status = $request->status;
        $peminjaman->kondisi = $request->kondisi;
    
        // Simpan objek Peminjaman ke database
        if ($peminjaman->save()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Data Peminjaman berhasil dibuat',
                'data' => $peminjaman
            ], 201);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Gagal menyimpan data Peminjaman'
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
        $history_delete = pinjam::find($id);
    
        // Jika data history_delete tidak ditemukan, kirimkan respons error
        if (!$history_delete) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data history_delete tidak ditemukan'
            ], 404);
        }
    
        // Hapus data history_delete
        $history_delete->delete();
    
        return response()->json([
            'status' => 'success',
            'message' => 'Data pinjam berhasil dihapus'
        ], 200);
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
