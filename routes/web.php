<?php

use App\Http\Controllers\ProductController;
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

Route::get( '/', [ProductController::class, 'index'] );
Route::get( '/products/create', [ProductController::class, 'create'] );
Route::post( '/products', [ProductController::class, 'store'] );

Route::get( '/products/edit/{id}', [ProductController::class, 'edit'] );
Route::put( '/products/update/{id}', [ProductController::class, 'update'] );
Route::delete( '/products/delete/{id}', [ProductController::class, 'destroy'] );

Route::get( '/products', [ProductController::class, 'showAll'] );