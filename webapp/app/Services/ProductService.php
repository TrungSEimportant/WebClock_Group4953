<?php

namespace App\Services;

use App\Models\Product;

class ProductService
{
    public function getAllProducts()
    {
        // Eager load the related ProductDetails and Promotions
        $products = Product::with(['details', 'promotion'])->get();

        // Format the response for each product
        return $products->map(function ($product) {
            // Get product details and promotion (eager loaded)
            $productDetails = $product->details;
            $promotion = $product->promotion;

            // Return the product data in the required format
            return [
                'name' => $product->name,
                'company' => $product->company,
                'img' => $product->img,
                'price' => number_format($product->price, 0, ',', '.'), // Format price with commas
                'star' => $product->star,
                'rateCount' => $product->rate_count,
                'masp' => $product->masp,
                'promo' => $promotion ? [
                    'name' => $promotion->name,
                    'value' => $promotion->value,
                ] : null,
                'detail' => $productDetails ? [
                    'screen' => $productDetails->screen,
                    'os' => $productDetails->os,
                    'camera' => $productDetails->camera,
                    'camaraFront' => $productDetails->camera_front,
                    'cpu' => $productDetails->cpu,
                    'ram' => $productDetails->ram,
                    'rom' => $productDetails->rom,
                    'microUSB' => $productDetails->micro_usb,
                    'battery' => $productDetails->battery,
                ] : null,
            ];
        });
    }
}
