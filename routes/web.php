<?php

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
    return view('auth.login');
});

Auth::routes();

 Route::group(['namespace' => 'App\Http\Controllers'], function() {
    //login
     Route::get('/home','HomeController@index');
     Route::apiResource('product', 'ProductController');
     Route::apiResource('shop', 'ShopController');
     Route::apiResource('invoice', 'InvoiceController');
     Route::get('/invoiceList', 'InvoiceController@invoiceList');
     Route::get('/singleInvoice/{id}', 'InvoiceController@singleInvoice');
     Route::apiResource('stock', 'StockController');

 });

 Route::get('/addshop', function (){return view('Pages.shop.shopCreate');});