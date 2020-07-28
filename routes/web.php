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

Route::patch('/order_picked/{id}', 'AdminController@order_picked')->name('order_picked');

Route::patch('/delivered/{id}', 'AdminController@order_delivered')->name('order_delivered');

// Route::get('/returned/{id}', 'AdminController@order_returned')->name('order_returned');

Route::get('/returned_orders', 'AdminController@returned')->name('order_returned_admin');

Route::get('/order/placed', 'UserController@placed')->name('placed');

Route::get('/user/company', 'UserController@company')->name('my_company');


Route::patch('user/company/update/{id}', 'UserController@company_update')->name('company.update');

Route::get('/order/placed/edit/{id}', 'UserController@edit')->name('order.edit');

Route::patch('/order/placed/edit/{id}', 'UserController@update')->name('order.update');

Route::get('/order/running', 'UserController@running')->name('running');
Route::get('/order/returned', 'UserController@returned')->name('returned');

Route::get('/order/user_delivered', 'UserController@user_delivered')->name('user_delivered');
Route::get('/order/user_completed', 'UserController@user_completed')->name('user_completed');



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

Route::get('/order/payment_due', 'AdminController@payment_due')->name('payment_due');

Route::get('/order/pay_bill/{id}', 'AdminController@pay_bill')->name('pay_bill');

Route::post('/order/cash_memo', 'AdminController@cash_memo')->name('cash_memo');

Route::get('/all-delivery-agents', 'DeliveryController@index')->name('all_agents');

Route::get('/create-delivery-agents', 'DeliveryController@create')->name('create_all_agents');

Route::post('/delivery-agents/store', 'DeliveryController@store')->name('agents.store');

Route::get('/delivery-agents/edit/{id}', 'DeliveryController@edit')->name('agents.edit');

Route::patch('/delivery-agents/update/{id}', 'DeliveryController@update')->name('agents.update');


Route::post('/order/invoice', 'InvoiceController@store')->name('invoice');

Route::get('/order/paid', 'InvoiceController@paid_orders')->name('paid_orders');

Route::get('/order/view/invoice/{memo}', 'InvoiceController@view_invoice')->name('view.invoice');

Route::get('user/order/view/invoice/{memo}', 'UserController@view_invoice')->name('show.invoice');

