<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

use Session;

class LoginController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            // Cek peran pengguna yang sedang login
            $role = Auth::user()->role;
    
            // Redirect ke dashboard sesuai dengan peran
            if ($role == 'admin') {
                return redirect('DataPeminjam');
            } elseif ($role == 'mahasiswa') {
                return redirect('data-alat');
            } else {
                // Redirect ke halaman yang sesuai jika peran tidak dikenali
                return redirect('home');
            }
        } else {
            return view('login');
        }
    }

    public function action_login(Request $request)
    {
        $request->validate([
            'nim'  => 'required',
            'password'  => 'required',
        ]);
        
        $data = [
            'nim'  => $request->nim,
            'password'  => $request->password
        ];
    
        if(Auth::attempt($data)){
    
            $user = Auth::user();
    
            // Simpan NIM ke dalam session
            $request->session()->put('nim', $user->nim);
    
            //ngasih level user ke session
            $request->session()->put('role', $user->role);
    
            //redirect role jika bukan admin
            if ($user->role === 'staff') {
                return redirect('DataPeminjam');
            } elseif ($user->role === 'mahasiswa') {
                return redirect('data-alat');
            }
            elseif ($user->role === 'dosen') {
                return redirect('data-alat');
            }
        } else {
            return redirect()->route('login')->with('error', 'Username atau Password salah!');
        }
    }
    
        // public function showRegistrationPage()
        // {
        //     return view('register');
        // }
    
        // public function register(Request $request)
        // {
        //     $request->validate([
        //         'nim' => 'required|unique:users',
        //         'password' => 'required|confirmed',
        //     ]);
    
        //     $user = new User;
        //     $user->id = 1;
        //     $user->nim = $request->nim;
        //     $user->password = Hash::make($request->password);
        //     $user->role = 'mahasiswa';
        //     $user->save();
    
        //     return redirect()->route('login')->with('success', 'Registration successful. You can now login.');
        // }

    public function logout()
    {
        Auth::logout();
        session()->flush();
        return redirect()->route('login');
    }
        
    
}
