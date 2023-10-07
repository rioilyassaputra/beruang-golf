<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }
    public function login(Request $request)
    {

        $credentials = $this->validate($request, [
            'email'    => 'required',
            'password' => 'required',
        ]);
        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            return redirect()->intended('/lapangan');
        }
        return back()->with('failed', 'Email atau Password salah!');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'anda berhasil logout');
    }
}
