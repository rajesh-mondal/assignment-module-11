<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\SalesController;
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

Route::get( '/', [SalesController::class, 'showSales'] );
Route::get( '/products/create', [ProductController::class, 'create'] );
Route::post( '/products', [ProductController::class, 'store'] );

Route::get( '/products/edit/{id}', [ProductController::class, 'edit'] );
Route::put( '/products/update/{id}', [ProductController::class, 'update'] );
Route::delete( '/products/delete/{id}', [ProductController::class, 'destroy'] );

Route::get( '/products', [ProductController::class, 'showAll'] );

Route::get('/sales', [SalesController::class, 'index'])->name('sales.index');
Route::get('/sales/create', [SalesController::class, 'create'])->name('sales.create');
Route::post('/sales/store', [SalesController::class, 'sellProduct'])->name('sales.sellProduct');
Route::get('/sales/show/{id}', [SalesController::class, 'show'])->name('sales.show');

// Route::get('/sell', [ProductController::class, 'sellView']);
// Route::get('/sell', [ProductController::class, 'sellProduct']);
// Route::post('/sell', [ProductController::class, 'sellProduct'])->name('sell.product');
