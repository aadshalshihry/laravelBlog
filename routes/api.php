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

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {
  $api->get('users', 'App\Http\Controllers\UserController@index');
  $api->get('users/{id}', 'App\Http\Controllers\UserController@show');

});

$api->version('v2', function ($api) {
  $api->get('users', function () {
    return 'User v2';
  });
});
