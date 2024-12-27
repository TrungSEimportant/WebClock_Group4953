<?php

namespace App\Models;

use Database\Factories\ProductDetailFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    /** @use HasFactory<ProductDetailFactory> */
    use HasFactory;

    // Define the inverse of the relationship with Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
