<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::resource('usuarios', 'UserController')->middleware('auth');
Route::resource('certificados','CertificadoController')->middleware('auth');
Route::resource('convenios','ConvenioController')->middleware('auth');
Route::resource('copagos','CopagoController')->middleware('auth');
Route::resource('ciuviejo','CiuviejosController')->middleware('auth');
Route::resource('practicas','PracticasController')->middleware('auth');
Route::resource('rendicion','RendicionController')->middleware('auth');
Route::name('print')->get('/imprimir/{id}', 'GeneradorController@imprimir')->middleware('auth');
Route::name('comprobar')->get('/comprobar/{id}', 'GeneradorController@comprobar')->middleware('auth');
Route::name('ver')->get('/ver/{id}', 'CertificadoController@ver')->middleware('auth');



// afiliados
Route::resource('affiliates','AfiliadoController')->middleware('auth');
Route::resource('limites','LimiteController')->middleware('auth');
Route::resource('egresos','EgresoController')->middleware('auth');
Route::name('print')->get('/orden/{id}', 'GeneradorController@imprimir');
Route::name('nueva_orden')->get('/nueva_orden/{id}', 'GeneradorController@orden');
Route::name('listarOrden')->get('/listarOrden/', 'GeneradorController@listarOrden');
Route::name('anularOrden')->get('/anularOrden/{id}', 'GeneradorController@anularOrden');
Route::name('recetas')->get('/recetas/{id}', 'GeneradorController@recetas');
Route::name('solorecetario')->get('/solorecetario/{id}', 'GeneradorController@solorecetario');
Route::name('practica')->get('/practica/{id}', 'GeneradorController@practica');
Route::name('laboratorio')->get('/laboratorio/{id}', 'GeneradorController@laboratorio');
Route::name('controlOrden')->get('/controlOrden/{id}', 'GeneradorController@controlOrden');
Route::name('showAfi')->get('/showAfi/{id}', 'GeneradorController@showAfi');

// Route::name('reporte1')->get('/reporte-fecha/', 'GeneradorController@reporte1');
// Route::name('reporte-fechas')->get('CertificadoController@reporte1')->middleware('auth');
Route::get('reporte-fechas', 'CertificadoController@reporte1')->name('reporte1')->middleware('auth');
Route::get('reporteCantidad', 'CertificadoController@reporteCantidad')->name('reporteCantidad')->middleware('auth');
Route::get('reporteUsuario', 'CertificadoController@reporteUsuario')->name('reporteUsuario')->middleware('auth');
Route::get('rendicionUsuarios', 'CertificadoController@rendicionUsuarios')->name('rendicionUsuarios')->middleware('auth');
Route::get('reportes', 'CertificadoController@reporte2')->name('reporte2')->middleware('auth');
Route::get('exitoso', 'CertificadoController@exitoso')->name('exitoso');
Route::view('/consulta', 'consulta');

Route::resource('search','AfiliadoController@buscar')->middleware('auth');

Route::get('listadoPracticas', 'HomeController@listadoPracticas')->name('listadoPracticas')->middleware('auth');
