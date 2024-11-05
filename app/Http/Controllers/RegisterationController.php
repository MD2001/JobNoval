<?php

namespace App\Http\Controllers;

use App\Models\emploer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterationController extends Controller
{
    public function register_view()
    {
        return view("login.Registeration");
    }
    public function register()
    {
        $data = Request()->validate([
            "name" => ['required', 'min:3'],
            "email" => ['required', 'email'],
            "password" => ['required', 'confirmed', 'min:6'],
        ]);
        $emp = emploer::create($data);

        Auth::login($emp);
        return redirect('/');
    }

    public function login_view()
    {
        return view('login.index');
    }

    public function login()
    {
        $user = Request()->validate([
            "email" => ['required', 'email'],
            "password" => ['required', 'min:6'],
        ]);

        if (Auth::attempt($user)) {
            request()->session()->regenerate();
            return redirect("/"); // Add return here
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect("/");
    }
}
