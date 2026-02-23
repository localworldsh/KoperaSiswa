<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::class, 'index'])->name('product.index');
Route::post('/product', [ProductController::class, 'store'])->name('product.store');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show'); // Rute Detail Baru
Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
Route::put('/product/{id}', [ProductController::class, 'update'])->name('product.update');
Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
Route::post('/order/{id}', [ProductController::class, 'order'])->name('product.order');
// Rute untuk halaman Dashboard Admin
Route::get('/admin', [ProductController::class, 'adminIndex'])->name('admin.index');

// Rute tambahan jika kamu ingin admin bisa menghapus/mengedit langsung dari sana
// (Pastikan method-method ini sudah ada di ProductController)
Route::prefix('admin')->group(function () {
    Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('admin.product.destroy');
});