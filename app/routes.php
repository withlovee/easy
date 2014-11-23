
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

Route::get('/', 'ItemController@showItemList');
Route::get('/search/{search}', 'ItemController@showItemList');

Route::get('/supporttickets', 'SupportTicketController@showAll')->before('auth');


Route::get('/supporttickets/show/{id}', 'SupportTicketController@show')->before('auth');
Route::post('/supporttickets/show/{id}','SupportTicketController@reply')->before('admin-auth');

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
Route::get('users/forceLogout', 'UsersController@forceLogout');
Route::get('user/{id}', 'UsersController@show');




/**
 * Feedback
 */

Route::get('users/show/{id}', 'UsersController@show');
Route::post('feedback/create/{id}','FeedbackController@create');

/**
 * Admin
 */

Route::get('admin', function(){
  return Redirect::to('admin/login');
});

Route::get('admin/login', 'AdministratorController@login');
Route::post('admin/login', 'AdministratorController@doLogin');
Route::get('admin/logout', 'AdministratorController@doLogout');
Route::get('users/ban/{id}','UsersController@ban');
Route::get('users/unBan/{id}', 'UsersController@unBan');
/**
 * Transaction
 */
Route::get('transactions', 'TransactionController@showList')->before('auth');
Route::get('transaction/{id}', 'TransactionController@show')->before('auth');
Route::post('transaction/set_status', 'TransactionController@setStatus')->before('auth');

/**
 * Payment
 */
Route::get('pay/{id}', 'PaymentController@create');
Route::post('pay/{id}', 'PaymentController@proceedPayment');

/**
 * Item
 */
Route::get('item/{id}', 'ItemController@showDirectItem');
Route::post('item/{id}', 'ItemController@showDirectItem');

Route::get('listItemSeller/','ItemController@showItemSeller');

Route::post('buyDirectItem/{id}', 'BuyDirectItemController@buyDirectItem')->before('auth')->before('buyer');
Route::post('buyAuctionItem/auto/{id}', 'BuyAuctionItemController@autoBid')->before('auth')->before('buyer');
Route::post('buyAuctionItem/manual/{id}', 'BuyAuctionItemController@manualBid')->before('auth')->before('buyer');


Route::get('sellDirectItem', 'SellDirectItemController@sellDirectItem')->before('auth')->before('seller');
Route::get('createDirectItem', 'SellDirectItemController@createDirectItem')->before('auth')->before('seller');
Route::post('createDirectItem', 'SellDirectItemController@createDirectItem')->before('auth')->before('seller');
Route::get('deleteDirectItem/{id}', 'SellDirectItemController@deleteDirectItem')->before('auth');
Route::post('deleteDirectItem/{id}', 'SellDirectItemController@deleteDirectItem')->before('auth')->before('seller');

Route::get('sellAuctionItem', 'SellAuctionItemController@sellAuctionItem')->before('auth')->before('seller');
Route::get('createAuctionItem', 'SellAuctionItemController@createAuctionItem')->before('auth')->before('seller');
Route::post('createAuctionItem', 'SellAuctionItemController@createAuctionItem')->before('auth')->before('seller');
Route::get('deleteAuctionItem/{id}', 'SellAuctionItemController@deleteAuctionItem')->before('auth')->before('seller');
Route::post('deleteAuctionItem/{id}', 'SellAuctionItemController@deleteAuctionItem')->before('auth')->before('seller');

Route::post('/askQuestion', 'ItemQuestionController@create')->before('auth')->before('buyer');
Route::post('/answerQuestion', 'ItemQuestionController@answer')->before('auth')->before('seller');



/**
 * Email API Test Route
 * Will be deleted later
 * 
 * Nut
 */

Route::get('emailtest/sendPreviousAuctionWinnerEmail', 'EmailHelperTestController@sendPreviousAuctionWinnerEmail');
Route::get('emailtest/sendAuctionResultEmail', 'EmailHelperTestController@sendAuctionResultEmail');
Route::get('emailtest/sendInvoiceEmail', 'EmailHelperTestController@sendInvoiceEmail');
Route::get('emailtest/sendConfirmPaymentEmail', 'EmailHelperTestController@sendConfirmPaymentEmail');
Route::get('emailtest/sendFeedbackRequestEmail', 'EmailHelperTestController@sendFeedbackRequestEmail');
Route::get('emailtest/test', 'EmailHelperTestController@test');
