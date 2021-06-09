<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', 'FrontEndController@index');
Route::get('cart', 'FrontEndController@cart');
Route::get('add-to-cart/{id}', 'FrontEndController@addToCart');
Route::get('/contactus', 'FrontEndController@contactUs');



Route::get('/checkout','OrderController@form_submit_front')->middleware(['auth']);
Route::get('/submit_checkout','OrderController@submit_front')->name('submitcheckout')->middleware(['auth']);
Route::get('/riwayat','OrderController@showRiwayat')->middleware(['auth']);

//Harus login dulu sebelum mengakses book dan kategori
Route::middleware(['auth'])->group(function(){
    Route::resource('category', 'CategoryController');
    Route::resource('book', 'BookController');
    Route::get('view-detail-order/{id_order}', 'OrderController@viewDetail');
    Route::resource('user', 'UserController');
    Route::get('lihat_saran','UserController@getSaran');
    Route::get('lihat_order','UserController@getOrder');
});

Route::resource('admin/orders','OrderController');
Route::resource('admin/users','UserController');
Route::resource('admin/books','BookController');
Route::resource('admin/book_category','CategoryController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('book/show', 'BookController@book')->name('book/show');
