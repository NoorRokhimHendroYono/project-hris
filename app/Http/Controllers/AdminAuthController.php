<?php

namespace App\Http\Controllers;

use App\Models\Admin; // pastikan model Admin sudah ada
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class AdminAuthController extends Controller
{
    // Menampilkan form register (opsional jika route pakai closure)
    public function showRegisterForm()
    {
        return view('admin.register');
    }

    // Menangani proses pendaftaran admin
    public function register(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email|unique:admin,email',
            'name' => 'required|string|max:255',
            'password' => 'required|min:6|confirmed',
        ]);

        // Simpan ke database
        Admin::create([
            'email' => $request->email,
            'name' => $request->name,
            'password' => Hash::make($request->password),
        ]);

        // Redirect ke login atau halaman lain
        return redirect()->route('admin.login')->with('success', 'Akun berhasil dibuat. Silakan login.');
    }
}
