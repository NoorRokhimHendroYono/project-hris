<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use Illuminate\Http\Request;
use Carbon\Carbon;

class LowonganUserController extends Controller
{
    public function index(Request $request)
    {
        $query = Lowongan::query();

        // ✅ Filter Status: aktif/tutup/semua
        if ($request->status && in_array($request->status, ['aktif', 'tutup'])) {
            $query->where('status', $request->status);
        } else {
            // Default: cuma tampilkan yang aktif
            $query->where('status', 'aktif');
        }

        // ✅ Search Judul
        if ($request->search) {
            $query->where('judul', 'like', '%' . $request->search . '%');
        }

        // ✅ Urut terbaru, dan lowongan yang expired gak muncul di FE/User Interface
        // $lowongans = $query->lastest()->get();
        $lowongans = Lowongan::where('status', 'aktif')
            ->whereDate('tanggal_tutup', '>=', Carbon::now()) // Hanya Lowongan yang Masih Aktif tampil di FE/User Interface
            ->latest()
            ->get();

        return view('user.lowongan.list', compact('lowongans'));
    }

    public function show($id)
    {
        $lowongan = Lowongan::findOrFail($id);
        return view('user.lowongan.show', compact('lowongan'));
    }
}

// // Ambil hanya yang status-nya aktif
// $lowongans = Lowongan::where('status', 'aktif')->get();

// return view('user.lowongan.list', compact('lowongans'));