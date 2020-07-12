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

Route::get('/order/create', 'UserController@create')->name('create');

Route::post('/order/store', 'UserController@store')->name('store');
