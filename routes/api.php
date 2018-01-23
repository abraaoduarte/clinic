<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/**Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/
Route::middleware(['auth:api'])->group(function () {
	Route::get('users', 'Api\UserController@index')->name('api.users.index');
	Route::get('users/{id}', 'Api\UserController@show')->name('api.users.show');
	Route::post('users', 'Api\UserController@store')->name('api.users.create');
	Route::put('users/{id}', 'Api\UserController@update')->name('api.users.update');
	Route::delete('users/{id}', 'Api\UserController@delete')->name('api.users.delete');

	Route::get('patients', 'Api\PatientController@index')->name('api.patients.index');
	Route::get('patients/{id}', 'Api\PatientController@show')->name('api.patients.show');
	Route::post('patients', 'Api\PatientController@store')->name('api.patients.create');
	Route::put('patients/{id}', 'Api\PatientController@update')->name('api.patients.update');
	Route::delete('patients/{id}', 'Api\PatientController@delete')->name('api.patients.delete');

	Route::get('doctors', 'Api\DoctorController@index')->name('api.doctors.index');
	Route::get('doctors/{id}', 'Api\DoctorController@show')->name('api.doctors.show');
	Route::post('doctors', 'Api\DoctorController@store')->name('api.doctors.create');
	Route::put('doctors/{id}', 'Api\DoctorController@update')->name('api.doctors.update');
	Route::delete('doctors/{id}', 'Api\DoctorController@delete')->name('api.doctors.delete');

	Route::get('schedules', 'Api\ScheduleController@index')->name('api.schedules.index');
	Route::get('schedules/{id}', 'Api\ScheduleController@show')->name('api.schedules.show');
	Route::post('schedules', 'Api\ScheduleController@store')->name('api.schedules.create');
	Route::put('schedules/{id}', 'Api\ScheduleController@update')->name('api.schedules.update');
	Route::delete('schedules/{id}', 'Api\ScheduleController@delete')->name('api.schedules.delete');
});


