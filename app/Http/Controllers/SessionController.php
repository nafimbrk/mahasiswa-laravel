<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    function index()
    {
        return view('sesi/index');
    }

    function login(Request $request)
    {
        Session::flash('email', $request->email);
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'email wajib diisi',
            'password.required' => 'password wajib diisi'
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($infologin)) {
            return redirect('siswa')->with('success', 'berhasi login');
        } else {
            return redirect('sesi')->withErrors('username dan password tidak valid');
        }
    }

    function logout()
    {
        Auth::logout();
        return redirect('sesi')->with('success', 'berhasi logout');
    }

    function register()
    {
        return view('sesi/register');
    }

    function create(Request $request)
    {
        Session::flash('name', $request->name);
        Session::flash('email', $request->email);
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ], [
            'name.required' => 'nama wajib diisi',
            'email.required' => 'email wajib diisi',
            'email.email' => 'email harus valid',
            'email.unique' => 'email sudah ada',
            'password.required' => 'password wajib diisi',
            'password.min' => 'minimum password 6 karakter'
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ];

        User::create($data);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($infologin)) {
            return redirect('siswa')->with('success', Auth::user()->name . 'berhasi login');
        } else {
            return redirect('sesi')->withErrors('username dan password tidak valid');
        }
    }
}
