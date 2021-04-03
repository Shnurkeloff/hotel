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

Route::group(['prefix' => 'admin', 'middleware' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('adminpanel', function () { return view('admin.index'); })->name('adminPanel');
    Route::resource('category', 'CategoryController')->names('category');
    Route::resource('bill', 'BillController')->names('bill');
    Route::resource('contract', 'ContractController')->names('contract');
    Route::resource('client', 'ClientController')->names('client');
    Route::resource('service', 'ServiceController')->names('service');

    Route::get('reservation', 'ReservationController@index')->name('reservation.index');
    Route::get('reservation/create', 'ReservationController@create')->name('reservation.create');
    Route::post('reservation/store', 'ReservationController@store')->name('reservation.store');
    Route::get('reservation/edit/{id}', 'ReservationController@edit')->name('reservation.edit');
    Route::patch('reservation/edit/{id}/{old_id}', 'ReservationController@update')->name('reservation.update');
    Route::delete('reservation/destroy/{id}', 'ReservationController@destroy')->name('reservation.destroy');
});
