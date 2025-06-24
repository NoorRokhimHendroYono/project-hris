<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    // 🔥 Tampil form Profil
    public function index()
    {
        $admin = session('admin'); // ambil session login
        return view('admin.profil', compact('admin'));
    }

    // 🔥 Update Nama + Email
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        $admin = Admin::find(session('admin')->id);
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->save();

        // Update session login juga
        session(['admin' => $admin]);

        return redirect()->route('admin.profil')->with('success', 'Profil berhasil diperbarui!');
    }

    // 🔥 Tampil form ganti password
    public function security()
    {
        return view('admin.security');
    }

    // 🔥 Update Password
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);

        $admin = Admin::find(session('admin')->id);

        // Cek password lama
        if (!Hash::check($request->current_password, $admin->password)) {
            return back()->with('error', 'Password lama salah!');
        }

        // Update password
        $admin->password = Hash::make($request->password);
        $admin->save();

        return redirect()->route('admin.security')->with('success', 'Password berhasil diubah!');
    }
}
