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

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Route::resource('radars', 'RadarsController'); <---- GALIMA IR TAIP

Route::get('radars', 'RadarsController@index')->name('radars.index');
Route::get('radars/create', 'RadarsController@create')->name('radars.create');
Route::put('radars', 'RadarsController@store')->name('radars.store');
Route::get('radars/{radar}/edit', 'RadarsController@edit')->name('radars.edit');
Route::put('radars/{radar}', 'RadarsController@update')->name('radars.update');
Route::get('radars/{radar}', 'RadarsController@restore')->name('radars.restore');
Route::delete('radars/{radar}', 'RadarsController@destroy')->name('radars.destroy');

Route::get('drivers', 'DriversController@index')->name('drivers.index');
Route::get('drivers/create', 'DriversController@create')->name('drivers.create');
Route::post('drivers', 'DriversController@store')->name('drivers.store');
Route::get('drivers/{driver}/edit', 'DriversController@edit')->name('drivers.edit');
Route::post('drivers/{driver}', 'DriversController@update')->name('drivers.update');
Route::get('drivers/{driver}', 'DriversController@restore')->name('drivers.restore');
Route::delete('drivers/{driver}', 'DriversController@destroy')->name('drivers.destroy');

// Route::get('radars/{radar}', 'RadarsController@show')->name('radars.show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
