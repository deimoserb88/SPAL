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

Route::get('/{plant?}', 'HomeController@index');

Route::get('encuesta/{plant}/{carr}','EncuestaController@index');

Route::post('encuesta/guardar','EncuestaController@guardar');

Route::auth();

//Route::get('/home', 'HomeController@index');
