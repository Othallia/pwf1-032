<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
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
        $products = Product::with('user')->paginate(10);
        return view('product.index', compact('products'));
    }

    public function create()
    {
        $this->authorize('manage-product'); 
        $users = User::all();
        return view('product.create', compact('users'));
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
        $product = Product::with('user')->findOrFail($id);
        return view('product.view', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $this->authorize('update', $product);
        $users = User::all();
        return view('product.edit', compact('product', 'users'));
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