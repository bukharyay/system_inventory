<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index(){
        $data = array(
            'title' => 'Login Page',
        );

        return view('index', $data);
    }
}
