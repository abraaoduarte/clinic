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
Auth::routes();

Route::get('/', 'HomeController@index');
/**Route::get('/', function () {
    return view('welcome');
});**/
Route::group(['middleware' => ['auth']], function () {
	Route::get('home', 'HomeController@index')->name('home');
	//Route::get('logout', 'HomeController@logout')->name('logout')->name('logout');
	Route::group(['namespace' => 'Admin'], function () {
		Route::prefix('admin')->group(function () {
			Route::get('users', 'UserController@index')->name('users');
			Route::get('user/create', 'UserController@create')->name('user.create');
			Route::post('user/create', 'UserController@store')->name('user.create');
			Route::get('user/{id}/edit', 'UserController@edit')->name('user.edit');
			Route::put('user/{id}/edit', 'UserController@update')->name('user.edit');
			Route::delete('user/{id}/delete', 'UserController@delete')->name('user.delete');
			Route::get('user/{id}/show', 'UserController@show')->name('user.show');

			Route::get('patients', 'PatientController@index')->name('patients');
			Route::get('patient/create', 'PatientController@create')->name('patient.create');
			Route::post('patient/create', 'PatientController@store')->name('patient.create');
			Route::get('patient/{id}/edit', 'PatientController@edit')->name('patient.edit');
			Route::put('patient/{id}/edit', 'PatientController@update')->name('patient.edit');
			Route::delete('patient/{id}/delete', 'PatientController@delete')->name('patient.delete');
			Route::get('patient/search', 'PatientController@search')->name('patient.search');
			Route::get('patient/{id}/show', 'PatientController@show')->name('patient.show');

			Route::get('doctors', 'DoctorController@index')->name('doctors');
			Route::get('doctor/create', 'DoctorController@create')->name('doctor.create');
			Route::post('doctor/create', 'DoctorController@store')->name('doctor.create');
			Route::get('doctor/{id}/edit', 'DoctorController@edit')->name('doctor.edit');
			Route::put('doctor/{id}/edit', 'DoctorController@update')->name('doctor.edit');
			Route::delete('doctor/{id}/delete', 'DoctorController@delete')->name('doctor.delete');
			Route::get('doctor/search', 'DoctorController@search')->name('doctor.search');
			Route::get('doctor/{id}/show', 'DoctorController@show')->name('doctor.show');

			Route::get('schedules', 'ScheduleController@index')->name('schedules');
			Route::get('schedule/create', 'ScheduleController@create')->name('schedule.create');
			Route::post('schedule/create', 'ScheduleController@store')->name('schedule.create');
			Route::get('schedule/{id}/edit', 'ScheduleController@edit')->name('schedule.edit');
			Route::put('schedule/{id}/edit', 'ScheduleController@update')->name('schedule.edit');
			Route::delete('schedule/{id}/delete', 'ScheduleController@delete')
				->name('schedule.delete');
			Route::get('schedule/{id}/show', 'ScheduleController@show')
				->name('schedule.show');
		});
	});
});


