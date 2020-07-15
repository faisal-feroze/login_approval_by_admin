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

Route::get('/order_picked/{id}', 'AdminController@order_picked')->name('order_picked');

Route::get('/delivered/{id}', 'AdminController@order_delivered')->name('order_delivered');

Route::get('/returned/{id}', 'AdminController@order_returned')->name('order_returned');

Route::get('/returned_orders', 'AdminController@returned')->name('order_returned_admin');

Route::get('/order/placed', 'UserController@placed')->name('placed');

Route::get('/order/running', 'UserController@running')->name('running');
Route::get('/order/returned', 'UserController@returned')->name('returned');

Route::get('/order/user_delivered', 'UserController@user_delivered')->name('user_delivered');

Route::get('/order/create', 'UserController@create')->name('create');

Route::get('/order/create/bulk', 'UserController@create_bulk')->name('create.bulk');

Route::post('/order/store', 'UserController@store')->name('store');

Route::post('/order/store-bulk', 'UserController@store_bulk')->name('store-bulk');

Route::get('/order/options', function () {
    return view('user.order-option');
})->name('choose-create')->middleware('auth');


Route::get('/order/all', 'AdminController@all_orders')->name('all_orders');

Route::get('/order/picked', 'AdminController@picked')->name('picked');

Route::get('/order/delivered', 'AdminController@delivered')->name('delivered');


