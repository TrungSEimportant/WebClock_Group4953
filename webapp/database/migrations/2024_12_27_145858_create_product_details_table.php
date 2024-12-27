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
        Schema::create('product_details', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade'); // Foreign Key
            $table->string('screen');
            $table->string('os');
            $table->string('camera');
            $table->string('camera_front');
            $table->string('cpu');
            $table->string('ram');
            $table->string('rom');
            $table->string('micro_usb');
            $table->string('battery');
            $table->timestamps(); // Created at, Updated at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_details');
    }
};
