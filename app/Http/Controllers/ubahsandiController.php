<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ubahsandiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('changespassword.password');
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
    
    public function updatePassword(Request $request){
        $request->validate([
            'nim_mahasiswa' => 'required|string|max:255',
            'nama_mahasiswa' => 'required|string|max:255',
            'password_lama' => 'required|string|max:255',
            'password_baru' => 'required|string|max:255',
            'konfirmasi_password' => 'required|string|max:255',
        ]);
    
        // Mencari pengguna berdasarkan nim
        $item = User::where('nim', $request->nim_mahasiswa)->first();
        if (!$item) {
            Log::error('Data nim tidak ditemukan');
            return redirect()->back()->with('error', 'Data nim tidak ada');
        }
    
        // Memeriksa apakah password lama sesuai dengan hash password saat ini
        if (!password_verify($request->password_lama, $item->password)) {
            Log::error('Password lama tidak cocok');
            return redirect()->back()->with('error', 'Password lama tidak cocok');
        }
    
        // Memeriksa apakah password baru dan konfirmasi password sama
        if ($request->password_baru !== $request->konfirmasi_password) {
            return redirect()->back()->with('error', 'Password baru dan konfirmasi password tidak cocok');
        }
    
        // Mengenkripsi password baru sebelum menyimpannya ke dalam basis data
        $item->password = bcrypt($request->password_baru);
        $item->save();
    
        Log::info('Password berhasil diperbarui untuk NIM: ' . $request->nim_mahasiswa);
        return redirect()->back()->with('success', 'Password berhasil diperbarui');
    }
    
    
    
     
}
