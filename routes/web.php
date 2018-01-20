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

Route::prefix('admin')->group(function () {
	Route::get('user', 'Admin\UserController@index');
	Route::get('user/create', 'Admin\UserController@create');
	Route::get('user/edit/{id}', 'Admin\UserController@edit');
	Route::put('user/update/{id}', 'Admin\UserController@update');
	Route::delete('user/delete/{id}', 'Admin\UserController@delete');
	Route::post('user/store', 'Admin\UserController@store');

	Route::get('patient', 'Admin\PatientController@index');
	Route::get('patient/create', 'Admin\PatientController@create');
	Route::get('patient/edit/{id}', 'Admin\PatientController@edit');
	Route::post('patient/store', 'Admin\PatientController@store');
	Route::put('patient/update/{id}', 'Admin\PatientController@update');
	Route::delete('patient/delete/{id}', 'Admin\PatientController@delete');

	
});
