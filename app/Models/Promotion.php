<?php

namespace App\Models;

use Database\Factories\PromotionFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    /** @use HasFactory<PromotionFactory> */
    use HasFactory;


    // Define the inverse of the relationship with Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
