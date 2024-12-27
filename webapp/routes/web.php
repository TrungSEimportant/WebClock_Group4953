<?php

use App\Http\Controllers\ProductDataFileController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('index'))->name('index');
Route::get('/chitietsanpham', fn() => view('chitietsanpham'))->name('chitietsanpham');
Route::get('/createProductJson', fn() => view('createProductJson'))->name('createProductJson');
Route::get('/giohang', fn() => view('giohang'))->name('giohang');
Route::get('/gioithieu', fn() => view('gioithieu'))->name('gioithieu');
Route::get('/lienhe', fn() => view('lienhe'))->name('lienhe');
Route::get('/nguoidung', fn() => view('nguoidung'))->name('nguoidung');
Route::get('/tintuc', fn() => view('tintuc'))->name('tintuc');
Route::get('/trungtambaohanh', fn() => view('trungtambaohanh'))->name('trungtambaohanh');
Route::get('/tuyendung', fn() => view('tuyendung'))->name('tuyendung');
Route::get('/admin', fn() => view('admin'))->name('admin');

/**
 * Redirect the *.html route to the index route to avoid confusion
 * @TODO: This is a temporary solution to avoid confusion between the mockup and webapp. It should be remove in future.
 */
Route::get('/{any}.html', function ($any) {
    // Check if the route is 'index' and redirect to the 'index' route
    if ($any === 'index') {
        return redirect()->route('index');
    }

    // Build the URL without the .html suffix
    $url = "/$any" . Str::after(request()->getRequestUri(), '.html');

    // Perform redirect 301 to the same route without .html and preserve the query string
    return redirect($url, 301);
})->where('any', '.*');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/**
 * @note
 * This is a temporary solution to serve the JavaScript file containing the product data.
 * In a real-world application, you should use a proper API endpoint to serve the data.
 */
Route::get('/server-serve-products-data.js', [ProductDataFileController::class, 'serveProductsJs'])->name('data.serveProductsJs');

require __DIR__ . '/auth.php';
