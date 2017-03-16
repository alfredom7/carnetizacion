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

Route::get('/', 'CarnetizacionController@index');

Route::get('login', 'Auth\LoginController@showLoginForm');
Route::post('login', array('as' => 'login', 'uses' => 'Auth\LoginController@login'));
Route::post('logout', array('as' => 'logout', 'uses' => 'Auth\LoginController@logout'));
//CARNETIZACION
Route::get('carnetsp', 'CarnetizacionController@carnetsp');
Route::get('barra', 'CarnetizacionController@barra');
Route::post('generarcarnet', 'CarnetizacionController@generarcarnet');
Route::post('generarreporte', 'CarnetizacionController@generarreporte');
Route::get('reporte', 'CarnetizacionController@reporte');
Route::get('usuarios', 'CarnetizacionController@usuarios');
Route::get('pagos', 'CarnetizacionController@pagos');
Route::get('recibo/{id}', 'CarnetizacionController@comprobante');
Route::post('registrarpago', 'CarnetizacionController@registrarpago');
//Route::post('login', array('as' => 'login.int', 'uses' => 'LoginController@authenticate'));

//Auth::routes();

Route::get('/home', 'HomeController@index');
