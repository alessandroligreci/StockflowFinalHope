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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/crypto', 'CryptoController@postUserCryptosApp');
Route::get('/crypto', 'CryptoController@postUserCryptos');

Route::get('/allUsers', 'UserController@trendsApp');

Route::post('/sell', 'CryptoController@sellCryptosApp');

Route::post('/cryptos', 'Auth\ApiController@getUserCryptos');

Route::get('/wallet', 'Auth\ApiController@getWalletCryptos');
Route::post('/wallet', 'Auth\ApiController@getWalletCryptos');

Route::get('/users', 'Auth\ApiController@getUsers');
Route::post('/users', 'Auth\ApiController@getUsers');

Route::get('/all-users', 'UserController@index');
Route::get('/user/{id}', 'UserController@show');
