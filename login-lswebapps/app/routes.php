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

//Route::get('/', function()
//{
//	return View::make('hello');
//});

Route::resource('', 'HomeController@getIndex');
Route::controller('/', 'HomeController');

// Route::get('loginForm', array('as' => 'loginaa', 'uses' => 'UsersController@loginForm'));

Route::post('/handleLogin', array('as' => 'login', 'uses' => 'UsersController@handleLogin'));

Route::post('/profile', array('as' => 'profile', 'uses' => 'UsersController@profile'));

// Route::get('/logout', array('as' => 'logout', 'uses' => 'UsersController@logout'));

Route::get('/register', array('as' => 'login', 'uses' => 'UsersController@register'));

Route::resource('user', 'UsersController');
