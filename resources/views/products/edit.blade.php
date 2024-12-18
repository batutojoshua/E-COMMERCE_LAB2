@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="text-center mb-4">Edit Product</h1>
    <div class="card shadow-sm p-4 mx-auto" style="max-width: 600px;">
        <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <!-- Product Name -->
            <div class="form-group mb-3">
                <label for="product_name" class="form-label">Product Name</label>
                <input type="text" name="product_name" id="product_name" 
                    class="form-control" value="{{ $product->product_name }}" 
                    placeholder="Enter product name">
            </div>
            
            <!-- Description -->
            <div class="form-group mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" rows="4" 
                    class="form-control" placeholder="Write a brief description">{{ $product->description }}</textarea>
            </div>
            
            <!-- Price -->
            <div class="form-group mb-3">
                <label for="price" class="form-label">Price ($)</label>
                <input type="number" name="price" id="price" 
                    class="form-control" step="0.01" value="{{ $product->price }}" 
                    placeholder="Enter price">
            </div>
            
            <!-- Stock -->
            <div class="form-group mb-3">
                <label for="stock" class="form-label">Stock</label>
                <input type="number" name="stock" id="stock" 
                    class="form-control" value="{{ $product->stock }}" 
                    placeholder="Enter stock quantity">
            </div>
            
            <!-- Image -->
            <div class="form-group mb-3">
                <label for="image" class="form-label">Product Image</label>
                <input type="file" name="image" id="image" class="form-control">
                @if ($product->image)
                    <div class="mt-3">
                        <label>Current Image:</label>
                        <img src="{{ asset('storage/' . $product->image) }}" 
                            class="img-thumbnail mt-2" width="150" alt="Current Image">
                    </div>
                @endif
            </div>
            
            <!-- Submit Button -->
            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-lg">Update Product</button>
            </div>
        </form>
    </div>
</div>
@endsection
