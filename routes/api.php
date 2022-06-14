<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:api','changeLang'])->group(function () {
    //players
    Route::get('clients', 'Api\PlayerController@getPlayers');
    Route::get('clients/{id}', 'Api\PlayerController@getPlayer');
    Route::get('clients/{id}/attendance', 'Api\PlayerController@getAttendance');
    Route::post('clients/{id}/attendance/add', 'Api\PlayerController@addAttendance');
    Route::post('clients/add', 'Api\PlayerController@addClients');

    //groups
    Route::get('groups', 'Api\GroupController@getGroups');
    Route::get('group/{id}', 'Api\GroupController@getGroup');
    Route::get('group/{id}/clients', 'Api\GroupController@getClients');
    Route::get('group/{id}/coachs', 'Api\GroupController@getCoachs');
    Route::get('group/{id}/games', 'Api\GroupController@getGames');

    //games
    Route::get('games', 'Api\GameController@getGames');

    Route::get('attendance/{id}', 'Api\PlayerAttendanceController@getAttendance');
    Route::post('attendance/{id}/update', 'Api\PlayerAttendanceController@updateAttendance');
    Route::get('attendance/{id}/notes', 'Api\PlayerAttendanceController@getNotes');
    Route::post('attendance/{id}/notes/add', 'Api\PlayerAttendanceController@addNote');

    Route::get('clients/{id}/notes', 'Api\PlayerController@getNotes');
    Route::post('clients/{id}/notes/add', 'Api\PlayerController@addNote');


    Route::get('membership/types', 'Api\PlayerController@getMemberships');
    Route::post('clients/{id}/membership/add', 'Api\PlayerController@addMembership');

});

Route::post('login', 'Api\AuthController@login');

