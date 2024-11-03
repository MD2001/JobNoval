<?php

namespace App\Http\Controllers;

use App\Models\emploer;
use Illuminate\Http\Request;

class RegisterationController extends Controller
{
    public function register_view()
    {
        return view("login.Registeration");
    }
    public function register()
    {
        $data=Request()->validate([
            "name"=>['required','min:3'],
            "email"=>['required','email'],
            "password"=>['required','confirmed','min:6'],
        ]);
        $emp=emploer::create($data);
        return redirect('/')->with("emp",$emp);
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
