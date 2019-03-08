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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Home page data
Route::get('/home', 'HomeController@index');

//get game image from public folder
Route::get('image/{fileName}', 'PhotoController@image');

//AUTH routes
Route::post('auth/register', 'AuthController@register');
