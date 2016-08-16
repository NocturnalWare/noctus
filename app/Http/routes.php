<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/singles/as-we-divide', function(){
	return view('bands.sponsored.singles.as-we-divide');
});

Route::get('/home', function () {
    return view('welcome');
});

Route::post('/sendFeedback', array('as' => 'sendFeedback', 'uses' => 'ProductManagerController@sendFeedback'));

// Authentication routes...
Route::get('auth/login', array('as' => 'getLoginPage', 'uses' => 'Auth\AuthController@getLogin'));
Route::post('auth/login', array('as' => 'login', 'uses' => 'Auth\AuthController@postLogin'));
Route::get('auth/logout', array('as' => 'logout', 'uses' => 'Auth\AuthController@getLogout'));

// Registration routes...
// Route::get('auth/register', 'Auth\AuthController@getRegister');
// Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::resource('slack', 'SlackController');

Route::resource('products', 'ProductsController');
Route::get('products/sort/{category}', array('as' => 'productsort', 'uses' => 'ProductsController@sortindex'));



Route::post('/cart/checkCart', array('as' => 'checkCart', 'uses' => 'CartsController@checkCart'));
Route::post('/cart/addToCart', array('as' => 'addToCart', 'uses' => 'CartsController@addToCart'));
Route::post('/cart/addTicketToCart', array('as' => 'addTicketToCart', 'uses' => 'CartsController@addTicketToCart'));
Route::post('/cart/removeFromCart', array('as' => 'removeFromCart', 'uses' => 'CartsController@removeFromCart'));
Route::post('/cart/emptyCart', array('as' => 'emptyCart', 'uses' => 'CartsController@emptyCart'));
Route::post('/cart/createshipping', array('as' => 'createShipping', 'uses' => 'CartsController@createShippingForm'));
Route::post('/cart/addshipping', array('as' => 'addShipping', 'uses' => 'CartsController@createShipping'));
Route::post('/cart/makeCCPayment', array('as' => 'makeCCPayment', 'uses' => 'CartsController@makeCCPayment'));
Route::post('/cart/checkout', array('as' => 'completePayment', 'uses' => 'CheckoutsController@completePayment'));

Route::get('checkout/transSuccess', array('as' => 'transSuccess', 'uses' => 'CheckoutsController@index'));
Route::get('/alreadyPaid', array('as' => 'alreadyPaid', 'uses' => 'CheckoutsController@alreadyPaid'));

Route::resource('cart', 'CartsController');
Route::resource('bands', 'BandsController');
Route::resource('blogs', 'BlogsController');
Route::resource('bandtickets', 'BandTicketController');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('salesmanager', 'Admin\SalesManagerController');
	Route::get('shipping/buildLabel/{id}/{size}', array('as' => 'buildLabel', 'uses' => 'Admin\SalesManagerController@show'));
	Route::resource('inventory', 'InventoryController');
	Route::resource('reports', 'Reports\ReportsController');
	Route::get('contest', ['as' => 'contest.index', 'uses' => 'Contest\ContestController@index']);
	Route::get('contest/create', ['as' => 'contest.create', 'uses' => 'Contest\ContestController@create']);
	Route::get('contactmanager/index', array('as' => 'contactManager', 'uses' => 'ProductManagerController@index'));
	Route::post('orders/eventCheckin', array('as' => 'eventCheckin', 'uses' => 'OrdersController@eventCheckin'));
	Route::get('venuemanager/index', array('as' => 'venueManager', 'uses' => 'ProductManagerController@index'));
	Route::get('ordermanager/index', array('as' => 'venueManager', 'uses' => 'ProductManagerController@index'));
	Route::get('bandmanager/index', array('as' => 'venueManager', 'uses' => 'ProductManagerController@index'));
	Route::get('shippingmanager/index', array('as' => 'shippingManager', 'uses' => 'Admin\SalesManagerController@index'));
	Route::resource('productmanager', 'ProductManagerController');
	Route::group(['prefix' => 'productmanager/tools'], function(){
		Route::get('facebook/{id?}', ['as' => 'facebook', 'uses' => 'ProductManagerController@facebook']);
	});
	Route::resource('shippingmanager', 'Admin\SalesManagerController');
	Route::resource('orders', 'Admin\OrderManagerController');
	Route::resource('imagemanager', 'Admin\ImageController');
	Route::get('shipping/track/{id}', array('as' => 'trackPackage', 'uses' => 'Admin\SalesManagerController@trackPackage'));
});