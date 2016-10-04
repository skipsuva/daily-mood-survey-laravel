<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('landing');
});

Route::auth();

Route::get('/daily-surveys', 'SurveysController@index');
Route::get('/daily-surveys/new', 'SurveysController@newSurvey');
Route::post('/daily-surveys', 'SurveysController@create');
Route::get('/daily-surveys/{id}','SurveysController@show');
