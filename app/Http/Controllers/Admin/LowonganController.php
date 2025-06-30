<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lowongan;
use App\Models\Category;
use Illuminate\Support\Str;

class LowonganController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        $query = Lowongan::query();

        if ($request->filled('search')) { //sebelumnya $request->has('search')
            $query->where('judul', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        $lowongans = $query->with('category')->orderBy('id', 'desc')->get(); // "asc" untuk lowongan pertama adalah yang terlama, "desc" untuk lowongan pertama adalah yang terbaru

        return view('admin.lowongan.index', compact('lowongans', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.lowongan.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'         => 'required|max:255',
            'tanggal_buka'  => 'required|date',
            'tanggal_tutup' => 'required|date|after_or_equal:tanggal_buka',
            'pengalaman'    => 'required|in:fresh_graduate,experienced',
            'category_id'   => 'required|exists:categories,id',
            'deskripsi'     => 'required',
            'requirement'   => 'required',
            'lokasi'        => 'nullable|max:255',
            'status'        => 'required|in:aktif,non-aktif',
            'slug'          => 'nullable|unique:lowogans,slug',
            'link'          => 'nullable|url',
        ]);

        // dd($request->category_id);
        // dd($request->all());
        // Lowongan::create($request->all());
        Lowongan::create([
            'judul'         => $request->judul,
            'slug'          => Str::slug($request->judul),
            'tanggal_buka'  => $request->tanggal_buka,
            'tanggal_tutup' => $request->tanggal_tutup,
            'pengalaman'    => $request->pengalaman,
            'category_id'   => $request->category_id, // ⬅️ WAJIB
            'deskripsi'     => $request->deskripsi,
            'requirement'   => $request->requirement,
            'lokasi'        => $request->lokasi,
            'status'        => $request->status,
            'link'          => $request->link,
        ]);

        // return redirect()->route('admin.lowongan.index')->with('success', 'Lowongan berhasil ditambahkan!');
        return redirect()->route('admin.lowongan.index')->with('toast', [
            'icon'  => 'success',
            'title' => 'Berhasil',
            'text'  => 'Lowongan berhasil ditambahkan!'
        ]);
    }

    public function edit($id)
    {
        $lowongan = Lowongan::findOrFail($id);
        $categories = Category::all();
        return view('admin.lowongan.edit', compact('lowongan', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul'         => 'required|max:255',
            'tanggal_buka'  => 'required|date',
            'tanggal_tutup' => 'required|date|after_or_equal:tanggal_buka',
            'pengalaman'    => 'required|in:fresh_graduate,experienced',
            'category_id'   => 'required|exists:categories,id',
            'deskripsi'     => 'required',
            'requirement'   => 'required',
            'lokasi'        => 'nullable|max:255',
            'status'        => 'required|in:aktif,non-aktif',
            'link'          => 'nullable|url',
        ]);

        $lowongan = Lowongan::findOrFail($id);
        $lowongan->update($request->all());

        return redirect()->route('admin.lowongan.index')->with('toast', [
            'icon'          => 'success',
            'title'         => 'Berhasil!',
            'text'          => 'Lowongan berhasil diperbarui!'
        ]);
    }

    public function destroy($id)
    {
        $lowongan = Lowongan::findOrFail($id);
        $lowongan->delete();

        return redirect()->route('admin.lowongan.index')->with([
            'icon' => 'success',
            'title' => 'Berhasil!',
            'text' => 'Lowongan berhasil dihapus!'
        ]);
    }

    public function show($id)
    {
        $lowongan = Lowongan::with('category')->findOrFail($id);
        return view('admin.lowongan.show', compact('lowongan'));
    }

    public function toggle($id)
    {
        $lowongan = Lowongan::findOrFail($id);
        $lowongan->status = $lowongan->status === 'aktif' ? 'non-aktif' : 'aktif';
        $lowongan->save();

        // INI DIPAKAI KALAU TOGGLE DI INDEX JUGA DIPAKAI 🗣️🔥
        if (request()->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Status lowongan berhasil diubah ke ' . $lowongan->status,
                'new_status' => $lowongan->status
            ]);
        }
        // Jika bukan AJAX (fallback form)
        return redirect()->back()->with('success', 'Status lowongan berhasil diubah.');
    }
}
