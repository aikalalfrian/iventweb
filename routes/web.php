<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use App\Product;

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

    $products = Product::all();
    return view('home', compact('products'));
});

Auth::routes();

//Route get -Auth

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/search', 'SearchController@index')->name('search');
    // Route::get('/cart', 'CartController@index')->name('cart');
    Route::get('/checkout', 'CheckoutController@index')->name('checkout');
    Route::get('admin/home', 'HomeController@adminHome')->name('admin.home')->middleware('is_admin');

    // Route Search Function
    Route::get('/search/cari','SearchController@cari');

    //Route Resource -CRUD Produk
    Route::get('products/transaksi', [ProductController::class, 'transaksi'])->name('products.transaksi');
    Route::resource('products', 'ProductController');



    //Route Resource -CRUD Account
    Route::get('/account', 'AccountController@index')->name('account');
    // Route::resource('account', 'AccountController');

    //cart
    Route::resource('cart', 'CartController');
    Route::patch('kosongkan/{id}', 'CartController@kosongkan');

    // cart detail
    Route::resource('cartdetail', 'CartDetailController');

    // alamat pengiriman
    Route::resource('alamatpengiriman', 'AlamatPengirimanController');
    // checkout
    Route::get('checkout', 'CartController@checkout');

    // checkout
    Route::resource('transaksi', 'TransaksiController');

    // Post Date
    Route::post('update-date', 'updateData@updateDate');

    Route::get('test', 'updateData@test');

    // Route::get('laporan', 'LaporanController@index')->name('laporan')->middleware('is_admin');
    // proses laporan
    Route::get('proseslaporan', 'LaporanController@proses');

    Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function () {
        Route::resource('transaksi', 'TransaksiController');

    });



