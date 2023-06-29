<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{

    public function create()
    {
        return view('auth.login');
    }
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('/');
        }

        throw ValidationException::withMessages([
            'email' => "Your provide credentials doesn't match our record!"
        ]);
    }
}
