<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Product
Route::get('/home', [App\Http\Controllers\Products\ProductsController::class, 'index'])->name('home');
Route::get('/product/product-single/{id}', [App\Http\Controllers\Products\ProductsController::class, 'show'])->name('products.singleProduct');
