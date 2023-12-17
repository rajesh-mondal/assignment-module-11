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

Route::get( '/products/create', [ProductController::class, 'create'] )->name( 'products.create' );
Route::post( '/products', [ProductController::class, 'store'] )->name( 'products.store' );
Route::get( '/products/edit/{id}', [ProductController::class, 'edit'] )->name( 'products.edit' );
Route::put( '/products/update/{id}', [ProductController::class, 'update'] )->name( 'products.update' );
Route::delete( '/products/delete/{id}', [ProductController::class, 'destroy'] )->name( 'products.destroy' );
Route::get( '/products', [ProductController::class, 'showAll'] )->name( 'products.index' );

Route::get( '/sales', [SalesController::class, 'index'] )->name( 'sales.index' );
Route::get( '/sales/create', [SalesController::class, 'create'] )->name( 'sales.create' );
Route::post( '/sales/store', [SalesController::class, 'sellProduct'] )->name( 'sales.sellProduct' );
Route::get( '/sales/{id}/edit', [SalesController::class, 'edit'] )->name( 'sales.edit' );
Route::put( '/sales/{id}', [SalesController::class, 'update'] )->name( 'sales.update' );
Route::delete( '/sales/{id}', [SalesController::class, 'destroy'] )->name( 'sales.destroy' );
Route::get( '/sales/show/{id}', [SalesController::class, 'show'] )->name( 'sales.show' );
