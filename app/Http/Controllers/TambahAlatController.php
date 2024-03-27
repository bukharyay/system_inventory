<?php

namespace App\Http\Controllers;

use App\Models\data_alat;
use Illuminate\Http\Request;

class TambahAlatController extends Controller
{
    public function create(){
        return view('adminpage.tambahalat');
    }

    public function store(Request $request)
{
    $data_alat = new data_alat;
    $data_alat->nama_alat = $request->nama_alat;
    $data_alat->jenis_alat_id = $request->jenis_alat_id;
    $data_alat->save();

    return redirect('peminjam');
}


// public function update(Request $request, $id_user)
// {

//     $data_peminjam = Peminjaman::find($id_user);
//     $data_peminjam->id_user = $request->id_user;
//     $data_peminjam->kode_alat = $request->kode_alat;
//     $data_peminjam->tanggal_peminjam = $request->tanggal_peminjam;
//     $data_peminjam->tanggal_kembali = $request->tanggal_kembali;
//     $data_peminjam->status = $request->status;
//     $data_peminjam->kondisi = $request->kondisi;
//     $data_peminjam->update();

//     return redirect('data_peminjam');
// }
}
