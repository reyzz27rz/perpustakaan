<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\produkcontroller;

// Memberi nama route secara eksplisit ->name('index')
Route::get('/', [produkcontroller::class, 'index'])->name('index');
Route::get('/produk/create', [produkcontroller::class, 'create'])->name('create');
Route::post('/produk', [produkcontroller::class, 'store'])->name('store');
Route::get('/produk/{produk}/edit', [produkcontroller::class, 'edit'])->name('edit');
Route::put('/produk/{produk}', [produkcontroller::class, 'update'])->name('update');
Route::delete('/produk/{produk}', [produkcontroller::class, 'destroy'])->name('destroy');