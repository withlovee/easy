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

Route::get('/', 'HomeController@showWelcome');
Route::get('/supporttickets', 'SupportTicketController@showAll')->before('auth');


Route::get('/supporttickets/show/{id}', 'SupportTicketController@show')->before('auth');
Route::post('/supporttickets/show/{id}','SupportTicketController@reply');

Route::get('/supporttickets/create', 'SupportTicketController@create')->before('auth');
Route::post('/supporttickets', 'SupportTicketController@store')->before('auth');

// Confide routes
// Route::get('users', 'UsersController@index')->before('admin-auth');
Route::get('users/create', 'UsersController@create');
Route::post('users', 'UsersController@store');
Route::get('login', 'UsersController@login');
Route::post('users/login', 'UsersController@doLogin');
// Route::get('users/edit/{id}', 'UsersController@edit')->before('admin-auth');
// Route::post('users/update/{id}', 'UsersController@update')->before('admin-auth');
// Route::get('users/destroy/{id}', 'UsersController@destroy')->before('admin-auth');
Route::get('users/profile', 'UsersController@profile')->before('auth');
Route::post('users/profile', 'UsersController@doProfile')->before('auth');
Route::get('users/confirm/{code}', 'UsersController@confirm');
// Route::get('users/forgot_password', 'UsersController@forgotPassword');
// Route::post('users/forgot_password', 'UsersController@doForgotPassword');
// Route::get('users/reset_password/{token}', 'UsersController@resetPassword');
// Route::post('users/reset_password', 'UsersController@doResetPassword');
Route::get('users/logout', 'UsersController@logout');
Route::get('user/{id}', 'UsersController@show');




/**
 * Feedback
 */

Route::get('users/show/{id}', 'UsersController@show');


/**
 * Admin
 */

Route::get('admin/login', 'AdministratorController@login');
Route::post('admin/login', 'AdministratorController@doLogin');
Route::get('admin/logout', 'AdministratorController@doLogout');
Route::get('users/ban/{id}','UsersController@ban');
Route::get('users/unBan/{id}', 'UsersController@unBan');
/**
 * Transaction
 */
Route::get('transaction/{id}', 'TransactionController@show');



Route::get('item/{id}', 'ItemController@showDirectItem');
Route::post('item/{id}', 'ItemController@showDirectItem');

Route::post('buy/{id}', 'BuyDirectItemController@buyDirectItem');

Route::get('sellDirectItem', 'ItemController@sellDirectItem')->before('auth');
Route::get('createDirectItem', 'ItemController@createDirectItem')->before('auth');
Route::post('createDirectItem', 'ItemController@createDirectItem')->before('auth');

Route::post('/askQuestion', 'ItemQuestionController@create')->before('auth');
Route::post('/answerQuestion', 'ItemQuestionController@answer')->before('auth');









/**
 * Email API Test Route
 * Will be deleted later
 * 
 * Nut
 */

Route::get('emailtest/sendPreviousAuctionWinnerEmail', 'EmailHelperTestController@sendPreviousAuctionWinnerEmail');
Route::get('emailtest/sendAuctionResultEmail', 'EmailHelperTestController@sendAuctionResultEmail');
