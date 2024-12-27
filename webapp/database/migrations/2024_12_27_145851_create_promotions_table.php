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
        Schema::create('promotions', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade'); // Foreign Key
            $table->string('name'); // Promotion type (e.g., "tragop")
            $table->string('value'); // Promotion value (e.g., "0", "500.000")
            $table->timestamps(); // Created at, Updated at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promotions');
    }
};
