<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\pinjam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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
        $data = pinjam::all();
        $countSelesai = pinjam::where('keterangan', 'Selesai')->count();
        $countDipinjamkan = pinjam::where('keterangan', 'Dipinjamkan')->count();
        $countDiajukan = pinjam::where('keterangan', 'Diajukan')->count();
    
        if ($data->isEmpty()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data pinjam tidak ditemukan'
            ]);
        }
    
        // Sort the data by 'keterangan'
        $sortedData = $data->sortBy('keterangan')->values()->all();
    
        // Format dates in the sorted data
        $formattedData = collect($sortedData)->map(function ($item) {
            $item->formatted_tanggal_waktu_peminjaman = (new DateTime($item->tanggal_waktu_peminjaman))->format('d-m-y H:i');
            return $item;
        });
    
        return response()->json([
            'status' => 'success',
            'message' => 'Data pinjam berhasil diambil',
            'data' => $formattedData,
            'count_selesai' => $countSelesai,
            'count_diajukan' => $countDiajukan,
            'count_dipinjamkan' => $countDipinjamkan
        ]);
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
    // public function deletebyid($id)
    // {
    //     $user = pinjam::where('id', $id)->first();
    
    //     if (!$user) {
    //         return response()->json(['message' => 'User not found'], 404);
    //     }
    
    //     return response()->json(['user' => $user], 200);
    // }

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
        $pinjam->delete();
    
        return response()->json([
            'status' => 'success',
            'message' => 'Data pinjam berhasil dihapus'
        ], 200);
    }
}
