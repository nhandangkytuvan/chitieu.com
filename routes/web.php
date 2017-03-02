<?php
// Home
Route::get('/', 'Web\PostController@index');
// Post
Route::get('web/post/index{query?}', 'Web\PostController@index');
// User
Route::any('web/user/login','Web\UserController@login');
Route::any('web/user/forget','Web\UserController@forget');
Route::any('web/user/create','Web\UserController@create');
Route::group(['middleware' => ['check-user']], function () {
	// user
	Route::get('user/user/logout','User\UserController@logout');
	Route::get('user/user/index','User\UserController@index');
	Route::any('user/user/edit','User\UserController@edit');
	Route::any('user/user/password','User\UserController@password');
	// post
	Route::any('user/post/create','User\PostController@create');
	Route::any('user/post/edit/{post_id?}','User\PostController@edit');
	Route::any('user/post/delete/{post_id?}','User\PostController@delete');
	Route::any('user/post/index{query?}','User\PostController@index');
});