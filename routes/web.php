<?php

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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index');

Route::get('about', function () {
  return view('pages.about');
})->name('about');

Route::get('api_route', function(){
	return view('pages.api_route');
});

Route::resource('users', 'UserController');
Route::resource('posts', 'PostController');

Auth::routes();

Route::prefix('admin')->group(function(){
	Route::get('/login', 'Auth\AdminsLoginController@showLoginForm')->name('admin.login');
	Route::post('/login/submit', 'Auth\AdminsLoginController@login')->name('admin.login.submit');
	Route::get('/', 'AdminController@index')->name('admin.dashboard');

});