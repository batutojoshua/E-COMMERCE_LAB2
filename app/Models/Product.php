<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    protected $fillable = [
        'product_name',
        'description',
        'price',
        'stock',
        'image'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function brands()
    {
        return $this->belongsToMany(Brand::class);
    }

    /**
     * Check if the product is in stock.
     *
     * @return bool
     */
    public function isInStock()
    {
        return $this->stock > 0;
    }

    /**
     * Calculate the discounted price of the product.
     
     * @param float $percentage Discount percentage (e.g., 10 for 10%).
     * @return float
     */
    public function discountedPrice(float $percentage): float
    {
        return $this->price - ($this->price * ($percentage / 100));
    }
}
