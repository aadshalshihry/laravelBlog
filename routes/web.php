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

Route::get('about', function () {
  return view('pages.about');
})->name('about');

Route::get('api_route', function(){
	return view('pages.api_route');
});

Route::resource('users', 'UserController');
Route::resource('posts', 'PostController');



Route::group(['middleware' => 'web'], function(){
	// Get create page
	Route::get('posts/{post_id}/comments', 'CommentController@create')->name('comment.create');

	// Create new comment
	Route::post('posts/{post_id}/comments', 'CommentController@store')->name('comment.store');

	// Get show page
	Route::get('posts/{post_id}/comments/{comment_id}', 'CommentController@show')->name('comment.show');

	// Get Edit page
	Route::get('posts/{post_id}/comments/{comment_id}', 'CommentController@edit')->name('comment.edit');

	// Update comemnt
	Route::put('posts/{post_id}/comments/{comment_id}', 'CommentController@update')->name('comment.update');

	// Destroy comment
	Route::delete('posts/{post_id}/comments/{comment_id}', 'CommentController@destroy')->name('comment.destroy');
});




Auth::routes();

Route::get('/user/logout', 'Auth\LoginController@userLogout')->name('users.logout');

Route::prefix('admin')->group(function(){
	Route::get('/login', 'Auth\AdminsLoginController@showLoginForm')->name('admin.login');
	Route::post('/login/submit', 'Auth\AdminsLoginController@login')->name('admin.login.submit');
	Route::get('/logout', 'Auth\AdminsLoginController@logout')->name('admin.logout');
	Route::get('/', 'AdminController@index')->name('admin.dashboard');
});
