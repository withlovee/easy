<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@showWelcome')->before('auth');
Route::get('/supportticket', 'SupportTicketController@showAll')->before('auth');
Route::get('/supportticket/show/{id}', 'SupportTicketController@show')->before('auth');
Route::get('/supportticket/create', 'SupportTicketController@create')->before('auth');
Route::post('/supportticket/', 'SupportTicketController@store')->before('auth');

// Route::get('/', function()
// {
// 	return View::make('hello');
// });
//

// Confide routes
Route::get('users', 'UsersController@index')->before('admin-auth');
Route::get('users/create', 'UsersController@create');
Route::post('users', 'UsersController@store');
Route::get('login', 'UsersController@login');
Route::post('users/login', 'UsersController@doLogin');
Route::get('users/edit/{id}', 'UsersController@edit')->before('admin-auth');
Route::post('users/update/{id}', 'UsersController@update')->before('admin-auth');
Route::get('users/destroy/{id}', 'UsersController@destroy')->before('admin-auth');
Route::get('users/profile', 'UsersController@profile')->before('auth');
Route::post('users/profile', 'UsersController@doProfile')->before('auth');
Route::get('users/confirm/{code}', 'UsersController@confirm');
Route::get('users/forgot_password', 'UsersController@forgotPassword');
Route::post('users/forgot_password', 'UsersController@doForgotPassword');
Route::get('users/reset_password/{token}', 'UsersController@resetPassword');
Route::post('users/reset_password', 'UsersController@doResetPassword');
Route::get('users/logout', 'UsersController@logout');


