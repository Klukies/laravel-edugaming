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

Route::middleware('auth:api')->get('user', function (Request $request) {
    return $request->user();
});

Route::group([
  'middleware' => 'api',
  'prefix' => 'auth'
], function ($router) {

  //AUTH routes
  Route::post('login', 'AuthController@login');
  Route::post('logout', 'AuthController@logout');
  Route::post('me', 'AuthController@me');
  Route::get('refresh', 'AuthController@refresh');
  Route::get('user', 'AuthController@user');
  Route::get('hidden', 'HomeDataController@hidden');
});

//Home page data
Route::get('/home', 'HomeDataController@index');
Route::post('auth/register', 'AuthController@register');

Route::middleware('jwt.auth')->get('/hidden', 'HomeDataController@hidden');

//Coaches page data
Route::get('/filters', 'FilterController@index');
Route::get('/coaches', 'CoachController@index');
