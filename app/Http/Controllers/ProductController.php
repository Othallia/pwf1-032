<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\Category; // Tambahkan import model Category
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest; 
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Log;
use Illuminate\Database\QueryException;

class ProductController extends Controller
{
    use AuthorizesRequests; 

    public function index()
    {
        $products = Product::with('user', 'category')->paginate(10); // Tambahkan eager load 'category'
        return view('product.index', compact('products'));
    }

    public function create()
    {
        $this->authorize('manage-product'); 
        $users = User::all();
        $categories = Category::all(); // Ambil semua data kategori untuk dropdown
        
        // Kirim variabel $categories ke view product.create[cite: 1]
        return view('product.create', compact('users', 'categories'));
    }

    public function store(StoreProductRequest $request)
    {
        $validated = $request->validated();
        $validated['user_id'] = Auth::id();

        try {
            Product::create($validated);
            return redirect()->route('product.index')->with('success', 'Product created successfully.');
        } catch (QueryException $e) {
            Log::error('Store Error', ['msg' => $e->getMessage()]);
            return redirect()->back()->withInput()->with('error', 'Database error.');
        } catch (\Throwable $e) {
            Log::error('Store Error', ['msg' => $e->getMessage()]);
            return redirect()->back()->withInput()->with('error', 'Unexpected error.');
        }
    }

    public function show($id)
    {
        $product = Product::with('user', 'category')->findOrFail($id); // Tambahkan eager load 'category'
        return view('product.view', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $this->authorize('update', $product);
        $users = User::all();
        $categories = Category::all(); // Tambahkan kategori untuk halaman edit
        return view('product.edit', compact('product', 'users', 'categories'));
    }

    public function update(UpdateProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        $this->authorize('update', $product);

        $product->update($request->validated());

        return redirect()->route('product.index')->with('success', 'Product updated successfully.');
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);
        $this->authorize('delete', $product);
        $product->delete();

        return redirect()->route('product.index')->with('success', 'Product deleted successfully.');
    }
}