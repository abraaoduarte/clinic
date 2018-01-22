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
	Route::get('users', 'Admin\UserController@index')->name('users');
	Route::get('user/create', 'Admin\UserController@create');
	Route::get('user/edit/{id}', 'Admin\UserController@edit');
	Route::put('user/update/{id}', 'Admin\UserController@update');
	Route::delete('user/delete/{id}', 'Admin\UserController@delete');
	Route::post('user/store', 'Admin\UserController@store');

	Route::get('patients', 'Admin\PatientController@index')->name('patients');
	Route::get('patient/create', 'Admin\PatientController@create')->name('patient.create');
	Route::get('patient/edit/{id}', 'Admin\PatientController@edit');
	Route::post('patient/store', 'Admin\PatientController@store');
	Route::put('patient/update/{id}', 'Admin\PatientController@update');
	Route::delete('patient/delete/{id}', 'Admin\PatientController@delete');

	Route::get('doctors', 'Admin\DoctorController@index')->name('doctors');
	Route::get('doctor/create', 'Admin\DoctorController@create')->name('doctor.create');
	Route::post('doctor/create', 'Admin\DoctorController@store')->name('doctor.create');
	Route::get('doctor/{id}/edit', 'Admin\DoctorController@edit')->name('doctor.edit');
	Route::put('doctor/{id}/update', 'Admin\DoctorController@update')->name('doctor.update');
	Route::delete('doctor/{id}/delete', 'Admin\DoctorController@delete')->name('doctor.delete');

	Route::get('schedules', 'Admin\ScheduleController@index')->name('schedules');
	Route::get('schedule/create', 'Admin\ScheduleController@create')->name('schedule.create');
	Route::post('schedule/create', 'Admin\ScheduleController@store')->name('schedule.create');
	Route::get('schedule/{id}/edit', 'Admin\ScheduleController@edit')->name('schedule.edit');
	Route::put('schedule/{id}/edit', 'Admin\ScheduleController@update')->name('schedule.edit');
	Route::delete('schedule/{id}/delete', 'Admin\ScheduleController@delete')->name('schedule.delete');
	
});
