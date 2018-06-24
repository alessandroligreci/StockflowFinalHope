<?php

use StockFlowSite\Crypto;
use StockFlowSite\User;
use Illuminate\Support\Facades\Input;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::redirect('/', '/home');

Route::get('/wallet','WalletController@index');
Route::get('/wallet/{id}', 'WalletController@otherWallet');

Route::get('/trends','TrendsController@index');

Auth::routes('');

Route::get('/home', 'HomeController@index');

Route::get('/calendar', 'CalendarController@index');

Route::get('/profile', 'ProfileController@showProfile');

Route::get('/detail/{crypto}', 'CryptoController@getDetail');

Route::get('/detail/{crypto}/buy', 'CryptoController@postUserCryptos');

Route::delete('/wallet/sell/{id}', 'CryptoController@sellUserCryptos');

Route::any('/search', 'SearchController@index');
