<?php

use App\Http\Controllers\homeController;
use App\Http\Controllers\kategoriController;
use App\Http\Controllers\productController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;

Route::get('/', [homeController::class, 'index']);

Route::group(['middleware' => ['role:admin']], function () {
    Route::get('admin-home', [homeController::class, 'homeAdmin']);

    // kategori function
    Route::get('kategori', [kategoriController::class, 'index']);
    Route::post('kategori', [kategoriController::class, 'create']);
    Route::post('editkategori', [kategoriController::class, 'update']);
    Route::delete('deletekategori/{id}', [kategoriController::class, 'delete']);

    // produk function
    Route::get('produk', [productController::class, 'index']);
    Route::post('produk', [productController::class, 'create']);
    Route::post('color', [productController::class, 'color']);
    Route::post('size', [productController::class, 'size']);
    Route::post('editproduk/{id}', [productController::class, 'update']);
    Route::delete('deleteproduk/{id}', [productController::class, 'delete']);

    // user page
    Route::get('user', [userController::class, 'user']);
    Route::post('edituser/{id}', [userController::class, 'edit']);
    Route::post('adduser', [userController::class, 'create']);
    Route::delete('deleteuser/{id}', [userController::class, 'delete']);
});



















// brezee functions
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
