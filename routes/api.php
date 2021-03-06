<?php

use App\Http\Controllers\UserApiController;
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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {

  // Get list of users
  // Route::resource('users', 'Api\UserApiController@index');
  $api->get('users', 'App\Api\UserApiController@index');

  $api->get('users-test', function(){
    return true;
  });

  // post user
  // $api->post('users', 'App\Http\Controllers\Api\UserApiController@stroe');

  // Get specific user
  // $api->get('users/{id}', 'App\Http\Controllers\Api\UserApiController@show');

  // update specific user
  // $api->put('users/{id}', 'App\Http\Controllers\Api\UserApiController@update');

  // delete specific user
  // $api->delete('users/{id}', 'App\Http\Controllers\Api\UserApiController@destroy');

  // Get list of posts
  // $api->get('posts', 'App\Http\Controllers\PostApiController@index');

});

// Get list of users
// Route::get('users', 'UserApiController@index');

// post user
// Route::post('users', 'UserApiController@stroe');

// Get specific user
// Route::get('users/{id}', 'UserApiController@show');

// update specific user
// Route::put('users/{id}', 'UserApiController@update');

// delete specific user
// Route::delete('users/{id}', 'UserApiController@destroy');
