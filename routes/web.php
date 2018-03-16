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

Route::get('error','CommonController@Error')->name('error');


Route::get('ViewDoc/{id}','DoctorController@ViewDoc')->where('id' , '[0-9]+')->name('ViewDoc');
Route::get('NewDoc','DoctorController@AddDoc')->name('DocAdd');
Route::post('NewDoc','DoctorController@AddDocSubmit')->name('DocAdd.Submit');
Route::get('EditDoc','DoctorController@EditDoc')->name('DocEdit');
Route::post('EditDoc','DoctorController@EditDocSubmit')->name('DocEdit.Submit');
Route::post('EditDocPic','DoctorController@EditDocPicSubmit')->name('DocEditPic.Submit');
Route::post('EditDocPass','DoctorController@EditPatientPassSubmit')->name('DocEditPass.Submit');

Route::get('ViewPatient/{id}','PatientController@ViewPatient')->where('id' , '[0-9]+')->name('ViewPatient');
Route::get('NewPatient','PatientController@AddPatient')->name('PatientAdd');
Route::post('NewPatient','PatientController@AddPatientSubmit')->name('PatientAdd.Submit');
Route::get('EditPatient','PatientController@EditPatient')->name('PatientEdit');
Route::post('EditPatient','PatientController@EditPatientSubmit')->name('PatientEdit.Submit');
Route::post('EditPatientPic','PatientController@EditPatientPicSubmit')->name('PatientEditPic.Submit');
Route::post('EditPatientPass','PatientController@EditPatientPassSubmit')->name('PatientEditPass.Submit');

Route::get('AdminAdd','AdminController@AdminAdd')->name('AdminAdd');
Route::post('NewCategory','AdminController@NewCategory')->name('NewCategory.Submit');
Route::post('NewDistrict','AdminController@NewDistrict')->name('NewDistrict.Submit');

Route::get('/', function () {
    return view('welcome');
});

