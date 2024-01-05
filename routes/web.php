<?php

use App\Http\Controllers\ProductController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/products',[ProductController::class, 'index']);
Route::get('/products-create',[ProductController::class, 'create']);
Route::post('/products',[ProductController::class, 'store'])->name('store');
Route::get('products-edit/{product}',[ProductController::class, 'edit'])->name('products-edit');
Route::put('products-update/{product}',[ProductController::class, 'update'])->name('products-update');
Route::delete('/products-delete/{product}', [ProductController::class, 'delete'])->name('products-delete');



