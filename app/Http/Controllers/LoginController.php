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
            return redirect('home');
        }else{
            return view('login');
        }
    }

    public function action_login(Request $request)
    {
        $request->validate([
            'username'  => 'required',
            'password'  => 'required',
        ]);
        
        $data = [
            'username'  => $request->username,
            'password'  => $request->password
        ];

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
