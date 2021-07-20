<?php

Route::get('/', 'UserController@home');

Route::get('/signup', 'UserController@signup');

Route::get('createP/{id}', 'UserController@createPassword');

Route::get('/login', 'UserController@login');

Route::post('/submit_login', 'UserController@loginUser');

Route::group(['middleware' => ['auth']], function() {
	 
	Route::get('/question', 'UserController@getQuestion');

	Route::get('/profile', 'UserController@profile');

	Route::get('/logout', 'UserController@logout');

	Route::post('/updateuserprofile', 'UserController@updateUserProfile');

	Route::get('/report', 'UserController@report');

	Route::post('/saverating', 'UserController@saveRating');

	Route::post('submit_question', 'UserController@submit_question');

});

/* User login routes end */

/*
| -------------
| Admin Routes
| -------------
*/

// Before login routes
Route::group(['prefix' => 'admin'], function() {

	Route::get('/', 'AdminController@index');

	Route::post('/login', 'AdminController@login')->name('admin.login');

});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'App\Http\Middleware\AdminMiddleware']], function() {

	Route::get('/dashboard', 'AdminController@dashboard');

	Route::get('/logout', 'AdminController@logout');

	Route::get('/profile', 'AdminController@profile');

	Route::post('/changepassword', 'AdminController@changePassword');

	Route::get('/report', 'AdminController@report');

	Route::post('/getExport', 'AdminController@getExport');

});
