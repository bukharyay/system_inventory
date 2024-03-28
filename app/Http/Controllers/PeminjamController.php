<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PeminjamController extends Controller
{
    public function create(){
        return view('peminjam');
    }

    public function store(Request $request)
{
    $data_peminjam = new Peminjaman;
    $data_peminjam->id_user = $request->id_user;
    $data_peminjam->kode_alat_id = $request->kode_alat_id;
    $data_peminjam->tanggal_peminjaman = $request->tanggal_peminjaman;
    $data_peminjam->tanggal_kembali = $request->tanggal_kembali;
    $data_peminjam->status = $request->status;
    $data_peminjam->kondisi = $request->kondisi;
    $data_peminjam->save();

    return redirect('peminjaman');
}


public function update(Request $request, $id_user)
{

    $data_peminjam = Peminjaman::find($id_user);
    $data_peminjam->id_user = $request->id_user;
    $data_peminjam->kode_alat = $request->kode_alat;
    $data_peminjam->tanggal_peminjam = $request->tanggal_peminjam;
    $data_peminjam->tanggal_kembali = $request->tanggal_kembali;
    $data_peminjam->status = $request->status;
    $data_peminjam->kondisi = $request->kondisi;
    $data_peminjam->update();

    return redirect('peminjaman');
}

}
