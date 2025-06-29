<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lowongan;

class HomeController extends Controller
{
    // ✅ Halaman Home
    public function index(Request $request)
    {
        $lowongans = Lowongan::where('status', 'aktif')
            ->when($request->search, function ($query) use ($request) {
                $query->where('judul', 'like', '%' . $request->search . '%');
            })
            ->when($request->pengalaman, function ($query) use ($request) {
                $query->where('pengalaman', $request->pengalaman);
            })
            ->when($request->kategori, function ($query) use ($request) {
                $query->where('kategori', $request->kategori);
            })
            // ->orderBy('tanggal_buka', 'desc')
            ->orderByDesc('created_at')
            ->take(3)
            ->get();

        return view('user.pages.home', compact('lowongans'));
    }
    // Ambil 3 lowongan terbaru (hanya yang aktif)
    // $lowongans = Lowongan::where('status', 'aktif')
    //                 ->orderBy('created_at','desc')
    //                 ->take(3)
    //                 ->get();

    // Ambil lowongan yang statusnya 'buka'
    // $lowongans = Lowongan::where('status', 'aktif')->latest()->take(3)->get(); // Sementara nyoba yang atas dulu

    // ✅ Halaman Daftar Semua Lowongan
    public function careers(Request $request)
    {
        // $query = \App\Models\Lowongan::where('status', 'aktif');
        // $query = Lowongan::query();
        $query = Lowongan::where('status', 'aktif');

        // Filter PENGALAMAN
        if ($request->filled('pengalaman')) {
            $query->where('pengalaman', $request->pengalaman);
        }

        // Filter KATEGORI
        // if ($request->filled('kategori')) {
        //     $query->where('kategori', $request->kategori);
        // }
        if ($request->filled('kategori')) {
            $kategori = ucfirst((trim($request->kategori)));
            $query->where('LOWER(kategori) = ?', [$kategori]);
        }

        // Search JUDUL
        if ($request->filled('search')) {
            $query->where('judul', 'like', '%' . $request->search . '%');
        }

        //Filter Sort
        // if ($request->filled('sort')) {
        //     if ($request->sort == 'latest') {
        //         $query->latest();
        //     } elseif ($request->sort == 'oldest') {
        //         $query->oldest();
        //     }
        // }

        // Sebelum Paginate 
        // $lowongan = $query->latest()->get();

        // ⬇️ Sesudah Pakai paginate 6 data per page
        $lowongan = $query->latest()->paginate(6)->withQueryString();

        dd($query->toSql(), $query->getBindings(), $query->get());

        // return view('user.pages.careers', compact('lowongans'));
    }
    // public function careers()
    // {

    //     $lowongans = Lowongan::where('status', 'aktif')
    //                     ->orderBy('created_at','desc')
    //                     ->paginate(6); //pake pagination 6 per halaman

    //     // $lowongans = Lowongan::where('status', 'aktif')->latest()->get(); // Sementara nyoba yang atas dulu

    //     return view('user.pages.careers', compact('lowongans'));
    // }

    public function careerDetail($slug)
    {
        $lowongan = Lowongan::where('slug', $slug)
            ->where('status', 'aktif')
            ->firstOrFail();

        return view('user.pages.career_detail', compact('lowongan'));
    }

    // ✅ Halaman Detail Lowongan
    public function show($slug)
    {
        $lowongan = \App\Models\Lowongan::where('slug', $slug)->firstOrFail();

        return view('user.pages.career_detail', compact('lowongan'));
    }
    // $lowongan = Lowongan::where('slug', $slug)->firstOrFail();
    // // $lowongan = Lowongan::find($id); // Sementara nyoba yang atas dulu
    // return view('user.pages.lowongan_detail', compact('lowongan'));

    public function list()
    {
        $lowongan = Lowongan::where('status', 'aktif')->latest()->get();

        // Nanti kita arahkan view ke user.pages.careers (sebagai list semua)
        return view('user.pages.careers', compact('lowongans'));
    }
    // {
    //     return view('user.pages.home');
    // }
}