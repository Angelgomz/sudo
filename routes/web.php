<?php

use Illuminate\Support\Facades\Route;

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
// obtiene el listado de eventos.
Route::get('/events','HomeController@getEvents');
//crea y guarda un nuevo evento en la bdd.
Route::post('/saveFecha','HomeController@saveFecha');
Route::get('/', function () {
    return view('home');
});
