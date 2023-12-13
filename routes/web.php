<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');
Route::get('products/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::put('product-update', [ProductController::class, 'update'])->name('product.update');
Route::delete('products/{id}/delete', [ProductController::class, 'destroy'])->name('products.delete');
Route::get('products/{id}/show', [ProductController::class, 'show'])->name('products.show');
