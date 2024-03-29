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
Route::group(['middleware'=>'auth'], function(){
    Route::get('/', 'DashboardController@index');
    //User Route]]]
    Route::resource('user', 'UserController');
    Route::resource('student', 'StudentController');
    
    Route::get('logout', 'UserController@logout');

    Route::view('sms', 'sms');
    Route::post('sms/send', 'SmsController@send');

    Route::get('employee/import', 'EmployeeController@import');
    Route::post('employee/import/save', 'EmployeeController@save');
    Route::resource('department','DepartmentController')
        ->except(['show', 'destroy']);

});

