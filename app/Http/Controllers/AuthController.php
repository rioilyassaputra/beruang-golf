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

            return redirect()->intended('/dashboard');
        }
        return back()->with('failed', 'Email atau Password salah!');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin')->with('success', 'anda berhasil logout');
    }
    //user
    public function registeruser(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:4',
            'email' => 'required|email',
            'password' => 'required|min:4'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->back()->with('success', 'Daftar Akun Berhasil');
    }

    public function loginuser(Request $request)
    {

        $credentials = $this->validate($request, [
            'email'    => 'required',
            'password' => 'required',
        ]);
        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            return redirect()->intended('/');
        }
        return back()->with('failed', 'Email atau Password salah!');
    }
    public function logoutuser()
    {
        Auth::logout();
        return redirect()->route('beranda')->with('success', 'anda berhasil logout');
    }
}
