<?php

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

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => 'manager'], function () {
        Route::resource('users', 'UsersController');
        Route::resource('tables', 'TablesController');
        Route::resource('products', 'ProductsController');
    });

    Route::group(['middleware' => 'waiter'], function () {
        Route::get('my-tables', 'WaiterTablesController@index');
        Route::group(['prefix' => 'tables/{table_id}'], function () {
            Route::resource('orders', 'OrdersController');
//            Route::get('orders', 'OrdersController@index');
//            Route::get('orders/create', 'OrdersController@create');
//            Route::get('orders/{id}', 'OrdersController@show');
//            Route::get('orders/{id}/edit', 'OrdersController@edit');
        });
    });
});
