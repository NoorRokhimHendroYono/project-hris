<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use App\Models\Category;
// use Illuminate\Support\Facedes\Storage;

class AdminController extends Controller
{
    public function index()
    {
        if (!session()->has('admin')) {
            return redirect()->route('admin.login')->with('error', 'Silahkan login terlebih dahulu.');
        }

        // Hitung Data
        $jumlahLowongan = \App\Models\Lowongan::where('status', 'aktif')->count();
        $jumlahAdmin = \App\Models\Admin::count();

        // 🔄 Dari ini (urutan terbaru di atas):
        //$admins = Admin::latest()->get();

        // 🔁 Jadi ini (urutan lama di atas, baru di bawah):
        $admins = \App\Models\Admin::oldest()->get();

        //Jumlah Category Card
        $totalCategories = Category::count();

        // Pastikan syntax compact benar
        return view('admin.index', compact('jumlahLowongan', 'jumlahAdmin', 'admins', 'totalCategories')); // view-nya di resources/views/admin/index.blade.php
    }

    public function store(Request $request)
    {
        // Validasi (optional)
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admin,email', // table admin
            'password' => 'required|min:6', // password confirmation (optional bisa disesuaikan)
        ]);

        // Simpan user baru atau admin (asumsikan pakai model User)
        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.index')->with('success', 'Admin baru berhasil ditambahkan!');
    }


    // 🔥 List Admins (Page)
    public function list(Request $request)
    {
        if (!session()->has('admin')) {
            return redirect()->route('admin.login')->with('error', 'Silahkan login terlebih dahulu.');
        }

        $query = Admin::query();

        // 🔎 Search by NAMA atau EMAIL
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                    ->orwhere('email', 'like', '%' . $search . '%');
            });
        }

        $admins = $query->orderBy('name')->paginate(10);
        // $admins = $query->latest()->get(); // default urutan terbaru

        // 🔥 Kalau search & hasilnya kosong ➔ trigger SweetAlert
        if ($request->filled('search')&& $admins->isEmpty()) {
            session()->flash('toast', [
                'icon'  => 'warning',
                'title' => 'Tidak ditemukan!',
                'text'  => 'Admin dengan keyword "' . $request->search . '" tidak ada.',
            ]);
        }
        return view('admin.admin.index', compact('admins'));
    }

    // 🔥 Edit Admin
    public function edit($id)
    {
        $admin = Admin::findOrFail($id);
        return view('admin.admin.edit', compact('admin'));
    }

    // 🔥 Update Admin
    public function update(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admin,email,' . $id,
            'password' => 'nullable|min:6',
        ]);

        $admin->name = $request->name;
        $admin->email = $request->email;

        // Kalau password diisi, update
        if ($request->filled('password')) {
            $admin->password = Hash::make($request->password);
        }

        $admin->save();

        return redirect()->route('admin.admins.list')->with('toast', [
            'icon' => 'success',
            'title' => 'Admin berhasil diupdate!',
            'text' => 'Perubahan data admin telah disimpan.',
        ]);

    }

    // 🔥 Hapus Admin
    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);
        $admin->delete();

        return redirect()->route('admin.admins.list')->with('success', 'Admin berhasil dihapus!');
    }

    // 🔥 Tampilkan halaman profil
    public function profile()
    {
        $admin = session('admin');
        return view('admin.profile', compact('admin'));
    }

    // 🔥 Update data profil
    public function updateProfile(Request $request)
    {
        $admin = Admin::findOrFail(session('admin')->id);

        // Validasi
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            // |unique:admin,email,' . $admin->id,
            // 'password' => 'nullable|min:6',
            // 'profile_photo' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        // Update Data
        $admin = \App\Models\Admin::find(session('admin')->id);
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->save();

        // Update session
        session(['admin' => $admin]);

        return back()->with('success', 'Profil berhasil diupdate!');
    }

    // 🔒🔥 Tampilan Security (Ganti Password)
    public function security() {
        return view('admin.security');
    }

    // 🔒🔥 Update Password
    public function updatePassword(Request $request) {
        
        // Validasi input
        $request->validate([
            'current_password' => 'required',
            'new_password'     => 'required|min:6|confirmed',
        ]);

        // Ambil admin yang sedang login
        $admin = \App\Models\Admin::find(session('admin')->id);

        // Cek apakah password lama benar
        if (!\Hash::check($request->current_password, $admin->password)) {
            return back()->with('error','Password saat ini salah');
    }

    // Update password 
    $admin->password = \Hash::make($request->new_password);
    $admin->save();

    return back()->with('success', 'Password berhasil diupdate!');
    }

    // Upload Images For Lowongan
    public function uploadImage(Request $request)
    {
        if ($request->hasFile('file')) {
            $file       = $request->file('file');
            $filename   = time() . '-' . $file->getClientOriginalName();
            $path       = $file->storeAs('uploads/images', $filename, 'public');

            return response()->json([
                'location' => asset('storage/', $path)
            ]);
        }

        return response()->json(['error' => 'Upload gagal'], 400);
    }
}


// // Kalau password diisi
        // if ($request->filled('password')) {
        //     $admin->password = Hash::make($request->password);
        // }

        // // Upload foto
        // if ($request->hasFile('profile_photo')) {
        //     $file = $request->file('profile_photo');
        //     $filename = time() . '_' . $file->getClientOriginalName();
        //     $file->move(public_path('uploads/admin'), $filename);
        //     $admin->profile_photo = $filename;
        // }

        // $admin->save();

        // // Update session
        // session(['admin' => $admin]);

// Ganti \App\Models\User::create() jadi Admin::create()

// Tambahkan use App\Models\Admin; di atas

// Pakai Hash::make() buat mengamankan password

// Gunakan unique:admin,email supaya email tidak dobel di tabel admin