<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterationController extends Controller
{
    public function register_view()
    {
        return view("login.Registeration");
    }

    public function login_view()
    {
        dd("your are in login mode");
    }

    public function login()
    {
        $data=Request()->validate([
            "name"=>['required','min:3'],
            "email"=>['required','email'],
            "password"=>['required','confirmed','min:6'],
        ]);

        
    }
}
