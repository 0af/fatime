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
Route::get('getCalendar/{year}/{month}', 'PagesController@getCalendar');
Route::get('getOwghat/{x}/{y}', 'PagesController@getOwghat');
Route::get('getCurrentDate', 'PagesController@getCurrentDate');
Route::get('convertDate/{convertType}/{year}/{month}/{day}', 'PagesController@convertDate');
Route::get('showWaether/{city}/', 'PagesController@showWaether')->middleware('throttle:20');
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
