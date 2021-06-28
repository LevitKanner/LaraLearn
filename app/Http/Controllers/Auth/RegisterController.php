<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => "required|max:255",
            'username' => "required|unique:users|max:127",
            'email' => "required|unique:users|email",
            'password' => 'required|confirmed|min:8'
        ]);
        User::create(array(
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ));

        auth()->attempt($request->only('name', 'password'));

        return redirect()->route('dashboard');
    }
}
