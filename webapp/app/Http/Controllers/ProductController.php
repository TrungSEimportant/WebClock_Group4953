<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    /**
     * Get all products with their details and promotions.
     *
     * @return JsonResponse
     */
    public function index(ProductService $product_service)
    {
        // Return the formatted product data as JSON
        return response()->json($product_service->getAllProducts());
    }
}
