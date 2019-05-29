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

Route::post('/login', 'AuthController@login')->name('login');
Route::middleware('auth:api')->post('/logout', 'AuthController@logout');
Route::middleware('auth:api')->post('/post-credentials', 'UserController@postCredentials');

Route::resource('preguntas', 'PreguntaController');
Route::post('/guardar-puntaje', 'PreguntaController@guardarPuntaje');

Route::post('/subir-data-empleados', 'DataController@subirDataEmpleados');
Route::post('/subir-archivos', 'DataController@subirArchivos');

Route::get('/archivos', 'ArchivoController@index');
Route::post('/like', 'ArchivoController@like');

Route::middleware('auth:api')->post('/usuarios', 'UserController@usuarios');