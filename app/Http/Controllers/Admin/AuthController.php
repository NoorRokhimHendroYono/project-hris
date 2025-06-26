<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Admin;


class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $admin = Admin::where('email', $request->email)->first();

        if ($admin && Hash::check($request->password, $admin->password)) {
            Session::put('admin', $admin);
            return redirect()->route('admin.index')->with('toast', [
                'icon'  => 'success',
                'title' => 'Login berhasil!',
                'text'  => 'Selamat Datang, '. $admin->name . '!'
            ]);
        }

        // Kalau gagal login, tetap kasih SweetAlert Error
        //return back()->with('error', 'Email atau password salah.'); // ini yang sebelumnya
        return back()->with('toast', [
            'icon'  => 'error',
            'title' => 'Login Gagal',
            'text'  => 'Email atau Password Salah!'
        ]);
    }

    public function register(Request $request)
    {
        $request->validate([
            'nama'    => 'required|register|max:255',
            'email'   => 'required|email|unique:admin,email',
            'password'=> 'required|min:6',
        ]);

        Admin::create([
            'name'    => $request->nama,
            'email'   => $request->email,
            'password'=> Hash::make($request->password),
        ]);

        return redirect()->route('admin.login')->with('toast', [
            'icon'    => 'success',
            'title'   => 'Registrasi Berhasil!',
            'text'    => 'Akun berhasil dibuat. Silahkan login.',
        ]);
    }

    public function logout()
    {
        Session::forget('admin');

        return redirect()->route('admin.login')->with('toast',[
            'icon'    => 'success',
            'title'   => 'Logout Berhasil',
            'text'    => 'Anda telah Logout.'
        ]);
    }
}
