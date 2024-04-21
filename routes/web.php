<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\FilterProductController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductExportController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::post('logout', LogoutController::class)->name('logout');
    Route::resource('products', ProductController::class);
    Route::get('export', [ProductExportController::class, 'export'])->name('export');
    Route::get('filter', FilterProductController::class)->name('filter');
    Route::get('profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('products/{product}/delete', [ProductController::class, 'delete'])->name('products.delete');
});

Route::middleware('guest')->group(function () {
    Route::get('login', [LoginController::class, 'create'])->name('login');
    Route::post('login', [LoginController::class, 'store']);
});
