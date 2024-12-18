<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->string('product_name'); // Name of the product
            $table->text('description'); // Detailed information
            $table->decimal('price', 10, 2); // Product price with precision and scale
            $table->integer('stock'); // Quantity available
            $table->foreignId('category_id')->constrained()->onDelete('cascade');  // Foreign key for category
            $table->string('image')->nullable(); // Path to the product image
            $table->timestamps(); // Created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
