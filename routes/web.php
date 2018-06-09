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
Route::get('/doctors','CommonController@ShowDoctors')->name('Doctors');
Route::post('/doctors','CommonController@Doctors');

Route::get('DocLogin','Auth\DoctorLoginController@Login')->name('DocLogin');
Route::post('DocLogin','Auth\DoctorLoginController@LoginSubmit')->name('DocLogin.Submit');
Route::post('DocLogout','Auth\DoctorLoginController@logout')->name('DocLogout');
Route::get('ViewDoc/{id}','DoctorController@ViewDoc')->where('id' , '[0-9]+')->name('ViewDoc');
Route::get('NewDoc','Auth\DoctorLoginController@AddDoc')->name('DocAdd');
Route::post('NewDoc','Auth\DoctorLoginController@AddDocSubmit')->name('DocAdd.Submit');
Route::get('EditDoc','DoctorController@EditDoc')->name('DocEdit');
Route::post('EditDoc','DoctorController@EditDocSubmit')->name('DocEdit.Submit');
Route::post('EditDocPic','DoctorController@EditDocPicSubmit')->name('DocEditPic.Submit');
Route::post('EditDocPass','DoctorController@EditPatientPassSubmit')->name('DocEditPass.Submit');
Route::post('AddDate','DoctorController@AddDateSubmit')->name('AddDate.Submit');
Route::get('list/{id}','DoctorController@GetList')->name('serial.lsit');

Route::get('PatientLogin','Auth\PatientLoginController@Login')->name('PatientLogin');
Route::post('PatientLogin','Auth\PatientLoginController@LoginSubmit')->name('PatientLogin.Submit');
Route::post('PatientLogout','Auth\PatientLoginController@logout')->name('PatientLogout');
Route::get('ViewPatient/{id}','PatientController@ViewPatient')->where('id' , '[0-9]+')->name('ViewPatient');
Route::get('NewPatient','Auth\PatientLoginController@AddPatient')->name('PatientAdd');
Route::post('NewPatient','Auth\PatientLoginController@AddPatientSubmit')->name('PatientAdd.Submit');
Route::get('EditPatient','PatientController@EditPatient')->name('PatientEdit');
Route::post('EditPatient','PatientController@EditPatientSubmit')->name('PatientEdit.Submit');
Route::post('EditPatientPic','PatientController@EditPatientPicSubmit')->name('PatientEditPic.Submit');
Route::post('EditPatientPass','PatientController@EditPatientPassSubmit')->name('PatientEditPass.Submit');
Route::get('bookSerial/{id}','PatientController@bookSerial')->name('bookSerial');
Route::post('bookSerial','PatientController@bookedSerial')->name('bookSerial.submit');

Route::get('AdminAdd','AdminController@AdminAdd')->name('AdminAdd');
Route::post('NewCategory','AdminController@NewCategory')->name('NewCategory.Submit');
Route::post('NewDistrict','AdminController@NewDistrict')->name('NewDistrict.Submit');
Route::post('DeleteDoctor','AdminController@DeleteDoctor')->name('DeleteDoctor');
Route::post('DeleteCategory','AdminController@DeleteCategory')->name('DeleteCategory');
Route::post('DeleteDistrict','AdminController@DeleteDistrict')->name('DeleteDistrict');




Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
