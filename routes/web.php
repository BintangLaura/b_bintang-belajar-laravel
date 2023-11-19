<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\VendorController;
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

// Route::get('/dashboard', function () {
//     return view('pages.dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard']);
    Route::get('/product', [ProductController::class, 'index']);
    Route::get('/product/tambah', [ProductController::class, 'tambah']);
    Route::post('/product/store', [ProductController::class, 'store']);
    Route::post('/product/update', [ProductController::class, 'update']);
    Route::get('/product/hapus/{id}', [ProductController::class, 'hapus']);
    Route::get('/product/edit/{id}', [ProductController::class, 'edit']);
});

Route::middleware(['auth', 'role'])->group(function () {
    Route::get('/customer', [CustomerController::class, 'index']);
    Route::get('/vendor', [VendorController::class, 'index']);
});



// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });


// Route::middleware('auth')->group(function () {
//     Route::get('/dashboard', [ProductController::class, 'index']);
// });
require __DIR__.'/auth.php';
