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
Route::post('user_login','ApiController@user_login');
Route::post('user_complain','ApiController@user_complain');
Route::post('user_data','ApiController@get_user_data');
Route::post('user_complain','ApiController@user_complain');