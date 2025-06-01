<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\cartcontroller;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderdetailController;
use App\Http\Controllers\PelangganController;
 use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontController::class, 'index']);
Route::get('/show/{id}', [FrontController::class, 'show']);
Route::get('/register', [FrontController::class, 'register']);
Route::get('/login', [FrontController::class, 'login']);
Route::get('/logout', [FrontController::class, 'logout']);
Route::post('/postregister', [FrontController::class, 'store']);
Route::post('/postlogin', [FrontController::class, 'postlogin']);

Route::get('beli/{idmenu}', [cartcontroller::class, 'beli']);
Route::get('hapus/{idmenu}', [cartcontroller::class, 'hapus']);
Route::get('tambah/{idmenu}', [cartcontroller::class, 'tambah']);
Route::get('kurang/{idmenu}', [cartcontroller::class, 'kurang']);
Route::get('cart', [cartcontroller::class, 'cart']);
Route::get('batal', [cartcontroller::class, 'batal']);
Route::get('checkout', [cartcontroller::class, 'checkout']);

Route::get('admin', [AuthController::class, 'index']);
Route::get('admin/logout', [AuthController::class, 'logout']);
Route::post('admin/postlogin', [AuthController::class, 'postlogin']);

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::group(['middleware' => ['ceklogin:admin']], function () {
        Route::resource('user', UserController::class);
    });

    Route::group(['middleware' => ['ceklogin:kasir']], function () {
        Route::resource('order', OrderController::class);
    });

    Route::group(['middleware' => ['ceklogin:manager']], function () {
        Route::resource('kategori', KategoriController::class);
        Route::resource('menu', MenuController::class);
        Route::resource('order', OrderController::class);
        Route::resource('orderdetail', OrderdetailController::class);
        Route::resource('pelanggan', PelangganController::class);
        Route::get('select', [MenuController::class, 'select']);
        Route::post('postmenu/{id}', [MenuController::class, 'update']);
    });



Route::get('/', [HomeController::class, 'index']);
Route::get('show/{idkategori}', [HomeController::class, 'show']);

});
