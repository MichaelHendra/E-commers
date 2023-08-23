<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\TokoController;
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


Route::get('/',[TokoController::class, 'index']);
Route::get('/shop', function(){
    return view('dashboard_user/shop');
});


Route::get('/dashboardadmin',[BarangController::class, 'dashboard']);
Route::get('/barang',[BarangController::class, 'index']);
Route::get('/tambahbarang',[BarangController::class, 'create']);
Route::post('/uploadgambar',[BarangController::class, 'store']);
Route::get('/editbarang/{id}',[BarangController::class, 'edit']);
Route::put('/editproses/{id}',[BarangController::class, 'editStore']);
Route::get('/gambardelete/{id}',[BarangController::class,'delete']);

Route::get('/test2', function(){
    return view('login');
});
