<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Role;
use App\Models\Barang;
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

Route::get('/register',[UserController::class, 'index']);
Route::post('/register/proses',[UserController::class, 'proses']);
Route::get('/login',[LoginController::class, 'index'])->name('login');
Route::post('/login/store', [LoginController::class, 'loginAction']);
Route::get('/logout', [LoginController::class, 'Logout']);


Route::get('/',[TokoController::class, 'index'])->name('index');
Route::get('/shop',[TokoController::class, 'index2']);
Route::get('/barang/detail/{id}',[TokoController::class, 'detail']);
Route::post('/barang/detail/add/',[TokoController::class,'store']);

Route::middleware(['auth', 'role:user,Admin'])->group(function () {
    Route::get('/cart',[CheckoutController::class,'index']);
    Route::get('/cart/edit/{id}',[CheckoutController::class,'cartEdit']);
    Route::get('/checkout',[CheckoutController::class,'checkout']);
    Route::get('/cartdelete/{id}',[CheckoutController::class,'delete']);
    Route::post('/update-quantity/{id}', [CheckoutController::class,'updateQuantity']);
    Route::post('/checkout/proses',[CheckoutController::class,'checkoutproses']);
    Route::get('/cartdelete/{id}',[CheckoutController::class,'delete']);
    Route::get('/transaksi',[CheckoutController::class,'transaksi']);
    Route::get('/payment/{id}',[CheckoutController::class,'payment']);
    Route::post('/payment/proses/{id}',[CheckoutController::class,'paymentProses']);
});


Route::middleware(['auth', 'role:Admin'])->group(function () {
    Route::get('/dashboardadmin',[BarangController::class, 'dashboard']);
    Route::get('/barang',[BarangController::class, 'index']);
    Route::get('/tambahbarang',[BarangController::class, 'create']);
    Route::post('/uploadgambar',[BarangController::class, 'store']);
    Route::get('/editbarang/{id}',[BarangController::class, 'edit']);
    Route::put('/editproses/{id}',[BarangController::class, 'editStore']);
    Route::get('/gambardelete/{id}',[BarangController::class,'delete']);
});
