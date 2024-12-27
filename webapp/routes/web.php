<?php

use App\Http\Controllers\ProductDataFileController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Redirect the index.html route to the index route to avoid confusion
Route::get('index.html', function () {
    return redirect()->route('index');
});

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/server-serve-products-data.js', [ProductDataFileController::class, 'serveProductsJs'])->name('data.serveProductsJs');

require __DIR__ . '/auth.php';
