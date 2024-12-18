<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        // Start the query builder for the Product model
        $query = Product::query();
    
        // Check if there's a search query and filter products accordingly
        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->where('product_name', 'like', '%' . $searchTerm . '%')
                  ->orWhere('description', 'like', '%' . $searchTerm . '%');
        }
    
        // Get the filtered products with pagination (10 products per page)
        $products = $query->paginate(10);
    
        // Return the view and pass the products to it
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_name' => 'required|string|min:3|unique:products,product_name',
            'description'  => 'nullable|string|max:255',
            'price'        => 'required|numeric|min:0.01',
            'stock'        => 'required|integer|min:0',
            'image'        => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = 'product_images/' . $request->file('image')->move(public_path('product_images'), time() . '_' . $request->file('image')->getClientOriginalName())->getFilename();
        }
        

        Product::create($validated);

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'product_name' => 'required|string|min:3|unique:products,product_name,' . $product->id,
            'description'  => 'nullable|string|max:255',
            'price'        => 'required|numeric|min:0.01',
            'stock'        => 'required|integer|min:0',
            'image'        => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('product_images', 'public');
        }

        $product->update($validated);

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
