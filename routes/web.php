<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
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
Route::get('/hello', [HomeController::class, 'index']);
Route::get('/dashboard', [HomeController::class, 'dashboard']);

//Route CRUD
Route::get('/product', [ProductController::class, 'index']);
Route::get('/product/tambah', [ProductController::class, 'tambah']);
Route::post('/product/store', [ProductController::class, 'store']);
Route::get('/product/edit/{id}', [ProductController::class, 'edit']);
Route::post('/product/update', [ProductController::class, 'update']);
Route::get('/product/hapus/{id}', [ProductController::class, 'hapus']);
