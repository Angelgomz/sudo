<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Evento;
use Spatie\GoogleCalendar\Event;
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

Route::post('/saveEventInGoogleCalendar','EventController@saveEventInGoogleCalendar');
Route::post('/editEventInGoogleCalendar ','EventController@editEventInGoogleCalendar');
Route::post('/deleteEventInGoogleCalendar ','EventController@deleteEventInGoogleCalendar');
Route::post('/geteventosCalendarPrimary','EventController@getEventsPrimary');