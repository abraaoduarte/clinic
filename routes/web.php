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
	
	Route::prefix('admin')->group(function () {
		Route::get('users', 'Admin\UserController@index')->name('users');
		Route::get('user/create', 'Admin\UserController@create')->name('user.create');
		Route::post('user/create', 'Admin\UserController@store')->name('user.create');
		Route::get('user/{id}/edit', 'Admin\UserController@edit')->name('user.edit');
		Route::put('user/{id}/edit', 'Admin\UserController@update')->name('user.edit');
		Route::delete('user/{id}/delete', 'Admin\UserController@delete')->name('user.delete');
		Route::get('user/{id}/show', 'Admin\UserController@show')->name('user.show');

		Route::get('patients', 'Admin\PatientController@index')->name('patients');
		Route::get('patient/create', 'Admin\PatientController@create')->name('patient.create');
		Route::post('patient/create', 'Admin\PatientController@store')->name('patient.create');
		Route::get('patient/{id}/edit', 'Admin\PatientController@edit')->name('patient.edit');
		Route::put('patient/{id}/edit', 'Admin\PatientController@update')->name('patient.edit');
		Route::delete('patient/{id}/delete', 'Admin\PatientController@delete')->name('patient.delete');
		Route::get('patient/search', 'Admin\PatientController@search')->name('patient.search');
		Route::get('patient/{id}/show', 'Admin\PatientController@show')->name('patient.show');

		Route::get('doctors', 'Admin\DoctorController@index')->name('doctors');
		Route::get('doctor/create', 'Admin\DoctorController@create')->name('doctor.create');
		Route::post('doctor/create', 'Admin\DoctorController@store')->name('doctor.create');
		Route::get('doctor/{id}/edit', 'Admin\DoctorController@edit')->name('doctor.edit');
		Route::put('doctor/{id}/edit', 'Admin\DoctorController@update')->name('doctor.edit');
		Route::delete('doctor/{id}/delete', 'Admin\DoctorController@delete')->name('doctor.delete');
		Route::get('doctor/search', 'Admin\DoctorController@search')->name('doctor.search');
		Route::get('doctor/{id}/show', 'Admin\DoctorController@show')->name('doctor.show');

		Route::get('schedules', 'Admin\ScheduleController@index')->name('schedules');
		Route::get('schedule/create', 'Admin\ScheduleController@create')->name('schedule.create');
		Route::post('schedule/create', 'Admin\ScheduleController@store')->name('schedule.create');
		Route::get('schedule/{id}/edit', 'Admin\ScheduleController@edit')->name('schedule.edit');
		Route::put('schedule/{id}/edit', 'Admin\ScheduleController@update')->name('schedule.edit');
		Route::delete('schedule/{id}/delete', 'Admin\ScheduleController@delete')
			->name('schedule.delete');
		Route::get('schedule/{id}/show', 'Admin\ScheduleController@show')
			->name('schedule.show');
		
		
	});
});


