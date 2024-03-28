<?php

// app/Http/Controllers/AuthController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Sesuaikan dengan model pengguna Anda
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        $user = User::where('username', $username)->first();

        if(Auth::attempt($data)){

            $user = Auth::user();

            //ngasih level user ke session
            $request->session()->put('role', $user->role);

            //redirect role jika bukan admin
            if ($user->role === 'staff') {
                return redirect('adminpage/dashboard');
            } elseif ($user->role === 'mahasiswa') {
                return redirect('mahasiswa/index');
            }
        } else {
            return redirect()->route('login')->with('error', 'Username atau Password salah!');
        }


        }
        public function showRegistrationPage()
        {
            return view('register');
        }
    
        public function register(Request $request)
        {
            $request->validate([
                'username' => 'required|unique:users',
                'password' => 'required|confirmed',
            ]);
    
            $user = new User;
            $user->id = 1;
            $user->username = $request->username;
            $user->password = Hash::make($request->password);
            $user->role = 'mahasiswa';
            $user->save();
    
            return redirect()->route('login')->with('success', 'Registration successful. You can now login.');
        }

        public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
        
    }


