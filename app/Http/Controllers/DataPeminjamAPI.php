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
        $data = pinjam::leftJoin('data_alat as alat1', 'pinjams.id_alat_1', '=', 'alat1.id')
                        ->leftJoin('data_alat as alat2', 'pinjams.id_alat_2', '=', 'alat2.id')
                        ->leftJoin('data_alat as alat3', 'pinjams.id_alat_3', '=', 'alat3.id')
                        ->leftJoin('data_alat as alat4', 'pinjams.id_alat_4', '=', 'alat4.id')
                        ->leftJoin('data_alat as alat5', 'pinjams.id_alat_5', '=', 'alat5.id')
                        ->select('pinjams.*', 'alat1.nama_alat as nama_alat_1', 'alat2.nama_alat as nama_alat_2', 'alat3.nama_alat as nama_alat_3', 'alat4.nama_alat as nama_alat_4', 'alat5.nama_alat as nama_alat_5',)
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

}
