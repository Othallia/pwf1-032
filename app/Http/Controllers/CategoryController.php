<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        // Mengambil semua kategori beserta jumlah produk yang terkait (total product)
        $categories = Category::withCount('products')->get();
        
        return view('category.index', compact('categories'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:category,name'
        ]);

        Category::create($request->all());

        return redirect()->route('category.index')->with('success', 'Category created successfully!');
    }

    // --- Tambahan untuk Fitur Edit & Update (UCP 1) ---

    public function edit($id)
    {
        // Mencari data kategori berdasarkan ID yang diklik
        $category = Category::findOrFail($id);
        return view('category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        // Validasi agar nama kategori tidak duplikat, kecuali untuk kategori itu sendiri[cite: 1]
        $request->validate([
            'name' => 'required|unique:category,name,' . $id
        ]);

        $category = Category::findOrFail($id);
        $category->update($request->all());

        return redirect()->route('category.index')->with('success', 'Category updated successfully!');
    }

    // --- Tambahan untuk Fitur Delete (UCP 1) ---[cite: 1]

    public function delete($id)
    {
        $category = Category::findOrFail($id);
        
        // Menghapus kategori (Produk terkait akan ikut terhapus karena Cascade On Delete di migration)[cite: 1]
        $category->delete();

        return redirect()->route('category.index')->with('success', 'Category deleted successfully!');
    }
}