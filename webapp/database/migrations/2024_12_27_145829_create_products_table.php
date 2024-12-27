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
            $table->id(); // Primary Key
            $table->string('name');
            $table->string('company');
            $table->string('img');
            $table->decimal('price', 15, 2);
            $table->tinyInteger('star')->unsigned(); // For ratings 0-5
            $table->integer('rate_count')->unsigned();
            $table->string('masp')->unique(); // Unique product code
            $table->timestamps(); // Created at, Updated at
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
