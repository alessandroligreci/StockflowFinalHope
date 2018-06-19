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

Route::get('/trends','UserController@index');

Auth::routes('');

Route::get('/home', 'HomeController@index');

Route::get('/calendar', 'Calendarcontroller@showCalendar');

Route::get('/profile', 'ProfileController@showProfile');

Route::get('/detail/{crypto}', 'CryptoController@getDetail');

Route::get('/detail/{crypto}/buy', 'CryptoController@postUserCryptos');

Route::delete('/detail/{crypto}/sell', 'CryptoController@sellUserCryptos');

Route::any('/search',function(){
        $q = Input::get ( 'q' );
        $user = User::where ( 'name', 'LIKE', '%' . $q . '%' )->orWhere ( 'email', 'LIKE', '%' . $q . '%' )->get ();
        if (count ( $user ) > 0)
            return view ( 'search_result' )->withDetails ( $user )->withQuery ( $q );
        else
            return view ( 'search_result' )->withMessage ( 'No Details found. Try to search again !' );
    } );
