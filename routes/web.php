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
    return view('welcome');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/user', 'UserController@index')->name('user');
Route::get('/admin', 'AdminController@index')->name('admin');

Route::get('/admin/show_user', 'AdminController@show_user')->name('show_user');

//Route::get('/status/{id}', 'HomeController@status')->name('status');

Route::get('/status/{id}', 'AdminController@status')->name('status');

Route::get('/order/placed', 'UserController@placed')->name('placed');

Route::get('/order/running', 'UserController@running')->name('running');

Route::get('/order/create', 'UserController@create')->name('create');

Route::get('/order/create/bulk', 'UserController@create_bulk')->name('create.bulk');

Route::post('/order/store', 'UserController@store')->name('store');

Route::post('/order/store-bulk', 'UserController@store_bulk')->name('store-bulk');

Route::get('/order/options', function () {
    return view('user.order-option');
})->name('choose-create')->middleware('auth');
