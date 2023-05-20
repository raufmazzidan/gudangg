<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductItemController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::middleware(['auth'])->group(function () {
    Route::resource('/product', ProductController::class);
    // Route::resource('/product/product-item', ProductItemController::class);

    Route::get('/product/product-item/{id}', [ProductItemController::class, 'detail_product']);
    Route::get('/product/product-item/{id_product}/edit/{id}', [ProductItemController::class, 'edit']);
    Route::put('/product/product-item/{id}', [ProductItemController::class, 'update']);

    Route::get('/transaction/sale', [TransactionController::class, 'sale']);
    Route::post('/transaction/sale', [TransactionController::class, 'store_sale']);
    Route::get('/transaction/procurement', [TransactionController::class, 'procurement']);
    Route::post('/transaction/procurement', [TransactionController::class, 'store_procurement']);
    Route::resource('/transaction', TransactionController::class);

    Route::get('/', [DashboardController::class, 'index']);
});

Route::middleware(['auth', 'role:super admin'])->group(function () {
    Route::resource('/user', UserController::class);

});