<?php

use Illuminate\Support\Facades\Route;


use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\Printer;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
| <!-- © 2020 Copyright: Tahu Coding -->
*/


Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::group(['middleware' => ['auth']], function () {  
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('/products','ProductController');
    //sorry kalau ada typo penggunaan bahasa inggris krn saya orang indonesia yang mencoba belajar b.inggris
    Route::get('/transcation', 'TransactionController@index');
    Route::post('/transcation/addproduct/{id}', 'TransactionController@addProductCart');
    Route::post('/transcation/removeproduct/{id}', 'TransactionController@removeProductCart');
    Route::post('/transcation/clear', 'TransactionController@clear');
    Route::post('/transcation/increasecart/{id}', 'TransactionController@increasecart');
    Route::post('/transcation/decreasecart/{id}', 'TransactionController@decreasecart');
    Route::post('/transcation/bayar','TransactionController@bayar');
    Route::get('/transcation/history','TransactionController@history');
    Route::get('/transcation/laporan/{id}','TransactionController@laporan');
    Route::get('/transcation/imprimir/{id}','TransactionController@laporann');
    Route::get('/clientes', function () {
        return view('clientes.index');
    });
});




