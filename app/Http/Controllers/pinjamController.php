<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\pinjam;

class pinjamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ public function index()
    {
        $pinjams = pinjam::all(); // Mengambil semua data dari tabel pinjam
        return view('mahasiswa.history', compact('pinjams')); // Passing data ke view
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mahasiswa.pinjam');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    //    dd($request->all());
    pinjam::create([
        'nim' => $request->nim,
        'nama_peminjam' => $request->nama_peminjam,
        'dosen' => $request->dosen,
        'ruang' => $request->ruang,
        'mata_kuliah' => $request->mata_kuliah,
        'tanggal_peminjaman' => $request->tanggal_peminjaman,
        'waktu_peminjaman' => $request->waktu_peminjaman,
        'waktu_pengembalian' => $request->waktu_pengembalian,
    ]);
    return redirect()->route('history');
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
