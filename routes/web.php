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
Route::get('EditDoc/{id}','DoctorController@EditDoc')->where('id' , '[0-9]+')->name('DocEdit');
Route::post('EditDoc','DoctorController@EditDocSubmit')->name('DocEdit.Submit');
Route::post('EditDocPic','DoctorController@EditDocSubmit')->name('DocEditPic.Submit');
Route::post('EditDocPass','DoctorController@EditDocSubmit')->name('DocEditPass.Submit');

Route::get('NewPatient','PatientController@AddPatient')->name('PatientAdd');
Route::post('NewPatient','PatientController@AddPatientSubmit')->name('PatientAdd.Submit');
Route::get('EditPatient','PatientController@EditPatient')->where('id' , '[0-9]+')->name('PatientEdit');
Route::post('EditPatient','PatientController@EditPatientSubmit')->name('PatientEdit.Submit');
Route::post('EditPatientPic','PatientController@EditPatientPicSubmit')->name('PatientEditPic.Submit');
Route::post('EditPatientPass','PatientController@EditPatientPassSubmit')->name('PatientEditPass.Submit');

Route::get('/', function () {
    return view('welcome');
});

