@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="text-center mb-4">Create Product</h1>
    <div class="card shadow-sm p-4 mx-auto" style="max-width: 600px;">
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Product Name -->
            <div class="form-group mb-3">
                <label for="product_name" class="form-label">Product Name</label>
                <input type="text" name="product_name" id="product_name" 
                    class="form-control" value="{{ old('product_name') }}" 
                    placeholder="Enter product name">
                @error('product_name')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Description -->
            <div class="form-group mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" rows="4" 
                    class="form-control" placeholder="Write a brief description">{{ old('description') }}</textarea>
                @error('description')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Price -->
            <div class="form-group mb-3">
                <label for="price" class="form-label">Price ($)</label>
                <input type="number" name="price" id="price" 
                    class="form-control" step="0.01" value="{{ old('price') }}" 
                    placeholder="Enter price">
                @error('price')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Stock -->
            <div class="form-group mb-3">
                <label for="stock" class="form-label">Stock</label>
                <input type="number" name="stock" id="stock" 
                    class="form-control" value="{{ old('stock') }}" 
                    placeholder="Enter stock quantity">
                @error('stock')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Image -->
            <div class="form-group mb-3">
                <label for="image" class="form-label">Product Image</label>
                <input type="file" name="image" id="image" class="form-control">
                @error('image')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-lg">Save Product</button>
            </div>
        </form>
    </div>
</div>
@endsection
