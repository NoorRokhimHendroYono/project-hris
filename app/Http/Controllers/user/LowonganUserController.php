<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Lowongan;
use Illuminate\Http\Request;
use App\Models\Category;

class LowonganUserController extends Controller
{
    // Daftar Lowongan (+ Filter)
    public function index(Request $request)
    {
        $categories = Category::all();

        $query = Lowongan::where('status', 'aktif');

        // ✅ Filter berdasarkan pengalaman
        if ($request->filled('pengalaman')) { // filled() = hanya true kalau nilainya tidak null dan tidak kosong string.
            $query->where('pengalaman', $request->pengalaman);
        }

        // ✅ Filter berdasarkan kategori (bagian)
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        // ✅ Search berdasarkan judul
        // if ($request->filled('search')) {
        //     $query->where('judul', 'like', '%' . $request->search . '%');
        // }

        // ✅ Search hasil yang paling relevan (judul dimulai dengan keyword)
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('judul', 'like', $request->search . '%')   // Cocok di awal
                    ->orWhere('judul', 'like', '%' . $request->search . '%'); // Cocok di tengah/akhir
            });
        }

        // ✅ Pagination (6 per page)
        // $lowongans = $query->latest()->paginate(6); <= || Pagination halaman 2 nge-reset pencarian, link pagination dari Laravel tidak otomatis menyimpan query string (search, kategori, pengalaman)
        $lowongans = $query->latest()->paginate(6)->withQueryString();

        return view('user.pages.careers', compact('lowongans', 'categories'));
    }

    // 🟢 Detail Lowongan
    public function show($slug)
    {
        $lowongan = Lowongan::with('category')->where('slug', $slug)->firstOrFail();
        return view('user.pages.career_detail', compact('lowongan'));
    }

    // Untuk User biar bisa akses Home bagian search categories
    public function home()
    {
        $categories = Category::all();
        $lowongans = Lowongan::latest()->take(3)->with('category')->get(); // 3 Lowongan terbaru
        return view('user.pages.home', compact('categories', 'lowongans'));
    }

    // Untuk User biar bisa akses Careers bagian search categories
    public function careers(Request $request)
    {
        $categories = Category::all(); // 🟢 WAJIB ADA
        $query = Lowongan::with('category');

        if ($request->filled('search')) {
            $query->where('judul', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('pengalaman')) {
            $query->where('pengalaman', $request->pengalaman);
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        $lowongans = $query->latest()->paginate(10);

        return view('user.pages.careers', compact('lowongans', 'categories')); // ⬅️ INI WAJIB ADA
    }

}