<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\BelanjaController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CartBelanjaController;
use App\Http\Controllers\PendapatanController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StokController;

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

Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::resource('/stok', StokController::class)->middleware('auth');
Route::resource('/kategori', KategoriController::class)->middleware('auth');

Route::get('/kasir', [KasirController::class, 'index'])->middleware('auth');
Route::put('/kasir', [KasirController::class, 'process'])->middleware('auth')->name('kasir.process');

Route::get('/cart', [CartController::class, 'index'])->middleware('auth');
Route::post('/cart', [CartController::class, 'store'])->middleware('auth');
Route::delete('/cart/{id}', [CartController::class, 'destroy'])->middleware('auth')->name('cart.destroy');
Route::put('/cart/{id}', [CartController::class, 'change'])->middleware('auth')->name('cart.change');

Route::get('/belanja', [BelanjaController::class, 'index'])->middleware('auth');
Route::put('/belanja', [BelanjaController::class, 'process'])->middleware('auth')->name('belanja.process');

Route::get('/cartBelanja', [CartBelanjaController::class, 'index'])->middleware('auth');
Route::post('/cartBelanja', [CartBelanjaController::class, 'store'])->middleware('auth');
Route::delete('/cartBelanja/{id}', [CartBelanjaController::class, 'destroy'])->middleware('auth')->name('cartBelanja.destroy');
Route::put('/cartBelanja/{id}', [CartBelanjaController::class, 'change'])->middleware('auth')->name('cartBelanja.change');

Route::get('/pendapatan', [PendapatanController::class, 'index'])->middleware('auth');

Route::get('/penjualan', [PenjualanController::class, 'index'])->middleware('auth');
Route::delete('/penjualan/{id}', [PenjualanController::class, 'destroy'])->middleware('auth')->name('laporanPenjualan.destroy');

Route::get('/pembelian', [PembelianController::class, 'index'])->middleware('auth');
Route::delete('/pembelian/{id}', [PembelianController::class, 'destroy'])->middleware('auth')->name('laporanPembelian.destroy');