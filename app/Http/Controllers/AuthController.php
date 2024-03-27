<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function showLoginPage()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            // Authentication passed...
            $user = Auth::user();

            //ngasih level user ke session
            $request->session()->put('role', $user->role);

            //redirect user jika bukan admin
            if ($user->role === 'admin') {
                return redirect('adminpage/dashboard');
            } elseif ($user->role === 'mahasiswa') {
                return redirect('mahasiswa/index');
            } else {
                // redirect to home
                return redirect('home');
            }
            } else {
                return redirect()->route('login.index')->with('error', 'Username atau Password salah!');
            }
    }
}
