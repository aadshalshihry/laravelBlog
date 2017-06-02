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

Route::get('/', function () {
    $names = ['Roman', 'Dhoom', 'Abdul'];
    return view('pages.home', compact('names'));
});

Route::get('about', function () {
  return view('pages.about');
});
