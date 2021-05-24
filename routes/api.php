<?php

use App\Http\Controllers\CertificadoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
// Route::resource('certificado','ElCertificado');
// Route::group(["middleware" => "apikey.validate"], function () {

//     //Rutas
//     Route::post("login", "Api\UserController@postLogin");
//     Route::get("cursos", "Api\CursoController@getCursos");
//     Route::resource('certificado','ElCertificado');
  
//   });