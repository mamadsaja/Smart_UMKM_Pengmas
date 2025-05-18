<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\TokoBukuController;
use App\Http\Controllers\UsersController;
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

// only users page
Route::get('/Home', [UsersController::class, 'index'])->name('home');
Route::get('/Library', [UsersController::class, 'library'])->name('book');
Route::get('/Shop', [UsersController::class, 'shop'])->name('shop');
Route::get('/Shop_detail', [UsersController::class, 'shop_detail'])->name('shop_detail');

Route::get('/buku/{id}', [BukuController::class, 'show'])->name('buku.show');
// Route::get('/tokos/{id}', [TokoBukuController::class, 'Toko'])->name('toko.show');


