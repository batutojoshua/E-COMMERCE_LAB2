@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <!-- Search Bar -->
    <form action="{{ route('products.index') }}" method="GET" class="d-flex w-50 search-form">
        <input type="text" name="search" class="form-control search-input" placeholder="Search products..." value="{{ request('search') }}">
        <button type="submit" class="btn btn-outline-secondary search-btn">Search</button>
    </form>
        <!-- Button stays above the grid -->
        <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Add New Product</a>
    </div>

    @if (session('success'))
        <script>
            // Check if the success message is about deletion
            var successMessage = "{{ session('success') }}";

            // Display SweetAlert with a specific message for deletion
            Swal.fire({
                icon: 'success',
                title: successMessage.includes('deleted') ? 'Product Deleted' : 'Success!',
                text: successMessage,
                confirmButtonText: 'OK',
                showConfirmButton: false,
                timer: 1150
            });
        </script>
    @endif

    <!-- Add margin to separate the grid from the button -->
    <div class="product-grid mt-4">
        @foreach ($products as $product)
            <div class="product-card">
                <img src="{{ $product->image ? asset($product->image) : asset('images/no-image.png') }}" alt="Product Image" class="product-image">
                <!-- <img src="product_images/X3MejkZqzj9lyQ7hpHZoBfAbUodadVSBOsUs9czY.jpg" alt="Product Image" class="product-image"> - -->
                <div class="product-info">
                    <h4>{{ $product->product_name }}</h4>
                    <p>{{ $product->description }}</p>
                    <p><strong>Price:</strong> ${{ number_format($product->price, 2) }}</p>
                    <p><strong>Stock:</strong> {{ $product->stock }}</p>
                </div>
                <div class="product-actions">
                    <a href="{{ route('products.edit', $product) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form id="delete-form-{{ $product->id }}" action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger btn-sm" onclick="deleteProduct( {{ $product->id }} )">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>

<script>
    function deleteProduct(productId) {
        Swal.fire({
            title: 'Are you sure?',
            text: 'This action will delete the product!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
        }).then((result) => {
            if (result.isConfirmed) {
                // Select the form specifically for this product
                document.querySelector(`#delete-form-${productId}`).submit();
            }
        });
    }
</script>
@endsection
