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

Route::get('/', function () {
    return view('core/layout');
});

//Auth::routes();

Route::get('/ciudadano', 'PageController@ciudadano')->name('ciudadano');

Route::get('/operador', 'PageController@operador')->name('operador');

Route::get('/regional', 'PageController@regional')->name('regional');

Route::get('/regional/listado', 'PageController@regionallistado')->name('regionalLsistado');

Route::get('/seguimiento', 'PageController@seguimiento')->name('seguimiento');

Route::get('/administracion', 'PageController@administracion')->name('administracion');

Route::get('/reportes', 'PageController@reportes')->name('reportes');

Route::get('/mobile', 'PageController@mobile')->name('mobile');
