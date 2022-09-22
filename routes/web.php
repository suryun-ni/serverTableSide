<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pemesanan_controller;

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
// Route::resource('/list','pemesanan_controller');
Route::post('/pemesanan/list/post',[pemesanan_controller::class,'store']);
Route::get('pemesanan/list/id/{id}',[pemesanan_controller::class,'show'])->name('ajax.request.store');
Route::put('pemesanan/list/edit/{id}',[pemesanan_controller::class,'update']);
Route::delete('/pemesanan/list/hapus/{id}',[pemesanan_controller::class,'destroy']);
// Route::get('/pemesanan/list',[pemesanan_controller::class,'index']);
Route::get('/pemesanan/list/yajra',[pemesanan_controller::class,'yajra']);
Route::resource('/pemesanan/list',pemesanan_controller::class);