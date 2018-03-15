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

Route::get('NewDoc','DoctorController@AddDoc')->name('DocAdd');
Route::post('NewDoc','DoctorController@AddDocSubmit')->name('DocAdd.Submit');

Route::get('/', function () {
    return view('welcome');
});

