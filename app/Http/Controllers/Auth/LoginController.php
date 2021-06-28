<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => "required|email",
            'password' => 'required'
        ]);

        $authenticated = auth()->attempt($request->only('email', 'password'));

        return $authenticated ? redirect()->route('dashboard') : back()->with('status', 'Invalid Login Credentials');
    }


}
