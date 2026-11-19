<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('pages.beranda');
});



Route::get('/about', function () {
    return view('pages.about', [
        'nama'=> 'Sendy Prayogo',
        'kelas'=> 'TSM-00',
        'nim' => '0123456789',
    ]);
});

Route::view('/contact', 'pages.contact');

// Menampilkan halaman daftar produk
Route::get('/product', [ProductController::class, 'index']);

// Menampilkan form tambah produk
Route::get('/product/addProduct', [ProductController::class, 'addProduct']);

// Memproses penyimpanan produk
Route::post('/storeProduct', [ProductController::class, 'store']);

Route::resource('/category', CategoryController::class);

Route::get('/product/{id}', [ProductController::class, 'show'])
    ->name('product.show');
    
Route::get('/product/{id}/edit', [ProductController::class, 'edit'])
    ->name('product.edit');

Route::delete('/product/{id}', [ProductController::class, 'destroy'])
    ->name('product.destroy');

Route::put('/product/{id}', [ProductController::class, 'update'])
    ->name('product.update');

