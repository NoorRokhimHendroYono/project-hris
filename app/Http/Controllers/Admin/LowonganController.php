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
        // dd($request->all());
        $validated = $request->validate([
            'judul'         => 'required|max:255',
            'tanggal_buka'  => 'required|date',
            'tanggal_tutup' => 'required|date|after_or_equal:tanggal_buka',
            'pengalaman'    => 'required|in:fresh_graduate,experienced',
            'category_id'   => 'required|exists:categories,id',
            'gambar'        => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'deskripsi'     => 'required',
            'lokasi'        => 'nullable|max:255',
            'status'        => 'required|in:aktif,non-aktif',
            'slug'          => 'nullable|unique:lowongans,slug',
            'link'          => 'nullable|url',
        ]);

        // ✅ 🔁 Simpan gambar jika ada
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $namaGambar = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('lowongan'), $namaGambar);
            $validated['gambar'] = 'lowongan/' . $namaGambar;
        }

        // ✅ Tambahkan slug 🔁 Buat data lowongan
        // if (!isset($validated['slug'])) {
            
        // }
        // $validated['slug'] = Str::slug($validated['judul']); // auto generate slug
        
        // ✅ Simpan ke database
        Lowongan::create($validated);

        // dd($request->category_id);
        // dd($request->all());
        // Lowongan::create($request->all());
        
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
        $validated = $request->validate([
            'judul'         => 'required|max:255',
            'tanggal_buka'  => 'required|date',
            'tanggal_tutup' => 'required|date|after_or_equal:tanggal_buka',
            'pengalaman'    => 'required|in:fresh_graduate,experienced',
            'category_id'   => 'required|exists:categories,id',
            'gambar'        => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'deskripsi'     => 'required',
            'lokasi'        => 'nullable|max:255',
            'status'        => 'required|in:aktif,non-aktif',
            'link'          => 'nullable|url',
        ]);

        $lowongan = Lowongan::findOrFail($id);
        
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $namaGambar = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('lowongan'), $namaGambar);
            $validated['gambar'] = 'lowongan/' . $namaGambar;
        }

        $lowongan->update($validated);

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

        return redirect()->route('admin.lowongan.index')->with('toast', [
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