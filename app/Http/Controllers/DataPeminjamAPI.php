<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\pinjam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DataPeminjamAPI extends Controller
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
                'message' => 'Data Peminjaman tidak ditemukan'
            ]);
        }
    
        return response()->json([
            'status' => 'success',
            'message' => 'Data Peminjaman berhasil diambil',
            'data' => $data
        ], 200);
    }

    public function getDatabyId($id)
    {
        $data = Peminjaman::find($id);
    
        if (!$data) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data Peminjaman tidak ditemukan'
            ], 404);
        }
    
        return response()->json([
            'status' => 'success',
            'message' => 'Data Peminjaman berhasil diambil',
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
        $peminjaman = new Peminjaman();
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

//     /**
//      * Update the specified resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
// public function update(Request $request, $id)
// {
//     // Validasi input
//     $validator = Validator::make($request->all(), [
//         'id_user' => 'required',
//         'kode_alat_id' => 'required',
//         'tanggal_peminjaman' => '',
//         'tanggal_kembali' => '',
//         'status' => 'required',
//         'kondisi' => 'required'
//     ]);

//     // Jika validasi gagal, kirimkan respons error
//     if ($validator->fails()) {
//         return response()->json([
//             'status' => 'error',
//             'message' => 'Validasi gagal',
//             'errors' => $validator->errors()
//         ], 400);
//     }

//     // Temukan data Peminjaman berdasarkan ID
//     $peminjaman = Peminjaman::find($id);

//     // Jika data Peminjaman tidak ditemukan, kirimkan respons error
//     if (!$peminjaman) {
//         return response()->json([
//             'status' => 'error',
//             'message' => 'Data Peminjaman tidak ditemukan'
//         ], 404);
//     }

//     // Update data Peminjaman dengan nilai input yang baru
//     $peminjaman->id_user = $request->id_user;
//     $peminjaman->kode_alat_id = $request->kode_alat_id;
//     $peminjaman->tanggal_peminjaman = $request->tanggal_peminjaman;
//     $peminjaman->tanggal_kembali = $request->tanggal_kembali;
//     $peminjaman->status = $request->status;
//     $peminjaman->kondisi = $request->kondisi;

//     // Simpan perubahan ke database
//     if ($peminjaman->save()) {
//         return response()->json([
//             'status' => 'success',
//             'message' => 'Data Peminjaman berhasil diperbarui',
//             'data' => $peminjaman
//         ], 200);
//     } else {
//         return response()->json([
//             'status' => 'error',
//             'message' => 'Gagal memperbarui data Peminjaman'
//         ], 500);
//     }
// }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        // Temukan data Peminjaman berdasarkan ID
        $peminjaman = Peminjaman::find($id);

        // Jika data Peminjaman tidak ditemukan, kirimkan respons error
        if (!$peminjaman) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data Peminjaman tidak ditemukan'
            ], 404);
        }

        // Hapus data Peminjaman
        if ($peminjaman->delete()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Data Peminjaman berhasil dihapus'
            ], 200);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Gagal menghapus data Peminjaman'
            ], 500);
        }
    }
}
