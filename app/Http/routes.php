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
Route::auth();

Route::get('/admin',[
		'middleware'=>'auth',
		'uses' => 'AdminController@index'
]);

Route::get('/avance',[
		'middleware'=>'auth',
		'uses' => 'AdminController@avance'
]);

Route::get('/resultados/detallados/{plant?}/{carr?}',[
		'middleware'=>'auth',
		'uses' => 'AdminController@resultados'
]);




Route::get('/{plant?}', 'HomeController@index');

// Route::post('encuesta/{plant}/{id_programa}','EncuestaController@index');
Route::post('encuesta','EncuestaController@index');

Route::post('encuesta/guardar','EncuestaController@guardar');



//Route::get('/home', 'HomeController@index');
