<?php

namespace App\Models;

use Database\Factories\ProductFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<ProductFactory> */
    use HasFactory;

    // Define the relationship with ProductDetail
    public function details()
    {
        return $this->hasOne(ProductDetail::class);
    }

    // Define the relationship with Promotion
    public function promotion()
    {
        return $this->hasOne(Promotion::class);
    }
}
