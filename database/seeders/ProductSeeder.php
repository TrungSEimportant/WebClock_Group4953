<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\Promotion;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Path to the JSON file
        $json_path = database_path('data/products.json');
        $json_data = json_decode(file_get_contents($json_path), true);

        // Disable foreign key checks
        Schema::disableForeignKeyConstraints();

        Product::truncate();
        ProductDetail::truncate();
        Promotion::truncate();

        // Re-enable foreign key checks
        Schema::enableForeignKeyConstraints();

        foreach ($json_data as $product) {
            // Format the price by removing a thousand separators and converting to decimal
            $formattedPrice = preg_replace('/\D/', '', $product['price']);

            // Insert into product table
            $productId = DB::table('products')->insertGetId([
                'name' => $product['name'],
                'company' => $product['company'],
                'img' => $product['img'],
                'price' => $formattedPrice, // Use the formatted price
                'star' => $product['star'],
                'rate_count' => $product['rateCount'],
                'masp' => $product['masp'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Insert into promotion table
            if (!empty($product['promo'])) {
                DB::table('promotions')->insert([
                    'product_id' => $productId,
                    'name' => $product['promo']['name'],
                    'value' => $product['promo']['value'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            // Insert into product_details table
            if (!empty($product['detail'])) {
                DB::table('product_details')->insert([
                    'product_id' => $productId,
                    'screen' => $product['detail']['screen'],
                    'os' => $product['detail']['os'],
                    'camera' => $product['detail']['camara'],
                    'camera_front' => $product['detail']['camaraFront'],
                    'cpu' => $product['detail']['cpu'],
                    'ram' => $product['detail']['ram'],
                    'rom' => $product['detail']['rom'],
                    'micro_usb' => $product['detail']['microUSB'],
                    'battery' => $product['detail']['battery'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
