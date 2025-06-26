<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();
        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|max:255|unique:categories,name']);
        Category::create($request->only('name'));
        return redirect()->route('admin.category.index')->with('success', 'Category berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate(['name' => 'required|max:255|unique:categories,name,' . $category->id]);
        $category->update($request->only('name'));
        return redirect()->route('admin.category.index')->with('success', 'Category diperbarui!');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return back()->with('success', 'Category dihapus!');
    }
}