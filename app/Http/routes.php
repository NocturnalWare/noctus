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

Route::group(['middleware' => 'auth'], function () {
	Route::resource('salesmanager', 'Admin\SalesManagerController');
	Route::resource('inventory', 'InventoryController');
	Route::get('productmanager/index', array('as' => 'productManager', 'uses' => 'ProductManagerController@index'));
	Route::get('contactmanager/index', array('as' => 'contactManager', 'uses' => 'ProductManagerController@index'));
	Route::get('venuemanager/index', array('as' => 'venueManager', 'uses' => 'ProductManagerController@index'));
	Route::get('ordermanager/index', array('as' => 'venueManager', 'uses' => 'ProductManagerController@index'));
	Route::get('bandmanager/index', array('as' => 'venueManager', 'uses' => 'ProductManagerController@index'));
	Route::get('shippingmanager/index', array('as' => 'shippingManager', 'uses' => 'Admin\SalesManagerController@index'));
	Route::resource('shippingmanager', 'Admin\SalesManagerController');
	Route::resource('images', 'Admin\ImageController');
	Route::get('shipping/track/{id}', array('as' => 'trackPackage', 'uses' => 'Admin\SalesManagerController@trackPackage'));
});