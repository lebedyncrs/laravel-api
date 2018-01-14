<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('auth/sign-up', 'Auth\RegisterController@signUp');
Route::post('auth/sign-in', 'Auth\LoginController@signIn');
Route::get('users/{user}', 'UserController@view');
Route::get('auction-ads/{userId?}', 'AuctionAdsController@getAll');
Route::post('auction-ads', 'AuctionAdsController@create');
