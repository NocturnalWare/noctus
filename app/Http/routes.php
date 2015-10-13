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

Route::get('/home', function () {
    return view('okpage');
});


// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::resource('products', 'ProductsController');
Route::get('products/sort/{category}', array('as' => 'productsort', 'uses' => 'ProductsController@sortindex'));


Route::get('productmanager/index', array('as' => 'productManager', 'uses' => 'ProductManagerController@index'));
Route::get('contactmanager/index', array('as' => 'contactManager', 'uses' => 'ProductManagerController@index'));
Route::get('venuemanager/index', array('as' => 'venueManager', 'uses' => 'ProductManagerController@index'));
Route::get('ordermanager/index', array('as' => 'venueManager', 'uses' => 'ProductManagerController@index'));
Route::get('bandmanager/index', array('as' => 'venueManager', 'uses' => 'ProductManagerController@index'));
Route::get('shippingmanager/index', array('as' => 'venueManager', 'uses' => 'ProductManagerController@index'));

