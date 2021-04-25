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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
  


 Route::middleware('auth:api')->get('/sector', function (Request $request) {
    return $request->sector();
});

  Route::middleware('organisation:api')->get('/specialite', function (Request $request) {
    return $request->specialite();
});



  Route::post('/register','UserController@register');
  Route::post('/login','UserController@login');

  //upload image
 
   Route::post('/upload','UserController@upload');

  //doctors
  Route::get('/doctors','UserController@getAll');
  Route::delete('/doctors/{id}','UserController@delete');
  Route::post('/add-doctor','UserController@create');
  Route::put('/edit-doctor','UserController@update');
  Route::get('/profile-doctor/{id}','UserController@getById');  


  //laboratorists

   Route::get('/laboratorist','UserController@getAllL');
  Route::delete('/laboratorist/{id}','UserController@delete');
  Route::post('/add-laboratorist','UserController@createL');
  Route::put('/edit-laboratorist','UserController@update');
  Route::get('/profile-laboratorist/{id}','UserController@getByIdL');  

  //secretarys
   Route::get('/scretarys','UserController@getAllS');
  Route::delete('/scretarys/{id}','UserController@deleteS');
  Route::post('/add-scretary','UserController@createS');
  Route::put('/edit-scretary','UserController@updateS');
  Route::get('/profile-scretarys/{id}','UserController@getByIdS');  


  //patients

   Route::get('/patients-list','UserController@getAllP');
  Route::delete('/patients-list/{id}','UserController@deleteP');
  Route::post('/add-patient','UserController@createP');
  Route::put('/edit-patient','UserController@updateP');
  Route::get('/patients-list/{id}','UserController@getByIdP');  


  // Sectors
   Route::post('/add-sector','SectorsController@createS');
   Route::put('/edit-sector','SectorsController@updateS');
   Route::get('/sectors','SectorsController@getAllS');
   Route::get('/sectors/{id}','SectorsController@getByIdS');
   Route::delete('/sectors/{id}','SectorsController@deleteS');


   //Specilaites
   Route::get('/specialites','SpecialiteContoller@getAll');
  Route::delete('/specialites/{id}','SpecialiteContoller@delete');
  Route::post('/add-specialite','SpecialiteContoller@create');
  Route::put('/edit-specialite','SpecialiteContoller@update');
  Route::get('/specialites/{id}','SpecialiteContoller@getById');
 
//Appointments
  Route::get('/appointments','AppointmentController@getAll');
  Route::delete('/appointments/{id}','AppointmentController@delete');
  Route::post('/add-appointment','AppointmentController@create');
  Route::put('/edit-appointment','AppointmentController@update');
  Route::get('/appointments/{id}','AppointmentController@getById');  

Route::get('/appointmentsd/{id}','AppointmentController@getAllByDoctorId');
Route::get('/appointmentsp/{id}','AppointmentController@getAllByPatientId');
//Documents
  Route::post('/uploadDocument','DocumentController@upload');
  Route::get('/documents/{id}','DocumentController@getAll');
    Route::get('/documentsP/{id}','DocumentController@getAllPatient');
  Route::delete('/documents/{id}','DocumentController@delete');
  Route::post('/add-document','DocumentController@create');
  Route::put('/edit-document','DocumentController@update');
  Route::get('/document/{id}','DocumentController@getById');  