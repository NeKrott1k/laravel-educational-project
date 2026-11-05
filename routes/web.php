<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [IndexController::class, 'index'])->name('index');

Route::get('/contacts', function () {
    return view('contacts');
})->name('contacts');

Route::get('/where-to-find-us', function () {
    return view('where-to-find-us');
})->name('where-to-find-us');

Route::get('/catalog', [ProductController::class, 'index'])->name('catalog');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('product.show');

Route::middleware(['auth'])->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::get('/orders', [OrderController::class, 'index'])->name('orders');
});

Route::middleware(['admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::post('/products/create', [AdminController::class, 'createProduct'])->name('createProduct');
    Route::patch('/products/{id}', [AdminController::class, 'updateProduct'])->name('updateProduct');
    Route::delete('/products/{id}', [AdminController::class, 'deleteProduct'])->name('deleteProduct');

    Route::post('/categories/create', [AdminController::class, 'createCategory'])->name('createCategory');
    Route::patch('/categories/{id}', [AdminController::class, 'updateCategory'])->name('updateCategory');
    Route::delete('/categories/{id}', [AdminController::class, 'deleteCategory'])->name('deleteCategory');
});

Auth::routes();
