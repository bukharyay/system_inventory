<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use GuzzleHttp\Client;
use App\Models\data_alat;
use Illuminate\Http\Request;

class TambahAlatController extends Controller
{

    public function index()
    {
        $client = new Client();
        $url = "http://127.0.0.1:8000/api/jenis_alat";

        $response = $client->request('GET',$url);
        $content = $response->getBody()->getContents();
        $data = json_decode($content, true);
        // dd($data);
        return view('adminpage.tambahalat', ['data'=>$data]);
    }

    public function create(){
        return view('adminpage.tambahalat');
    }

    public function store(Request $request)
{

    $request->validate([
        'img' => 'required|image|max:2048',
    ]);

    // Ambil file gambar dari request
    $image = $request->file('img');

    // Buat nama unik untuk file gambar
    $imageName = time() . '.' . $request->img->extension();
    $request->img->storeAs('images', $imageName, 'local');
    // Pindahkan file gambar ke folder public/img
    $image->move(public_path('images'), $imageName);

    $data_alat = new data_alat;
    $data_alat->nama_alat = $request->nama_alat;
    $data_alat->jenis_alat_id = $request->jenis_alat_id;
    $data_alat->stok = $request->stok;
    $data_alat->keterangan_barang = $request->keterangan_barang;
    $data_alat->img = "images/$imageName";
    $data_alat->save();

    return redirect('data-alat');
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
