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

Route::get('/wallet', function () {
    if ($user = Auth::user()) {
        $wallet = Crypto::where('user_id', Auth::user()->id)->get();
        return View::make('wallet',compact('wallet'));
    }

    else {
        return view ('not_logged_wallet')->withMessage ( 'No Details found. Try to search again !' );
    }
});

Auth::routes('');

Route::get('/home', function () {
  return view ('home');
});

Route::get('/calendar', function () {
    return view('calendar');
});
Route::get('/profile', function () {
    return view('profile');
});

Route::get('/detail/{crypto}', function ($crypto) {
    return View::make('detail',compact('crypto'));
});

Route::get('/detail/{crypto}/buy', 'CryptoController@postUserCryptos');

Route::any('/search',function(){
        $q = Input::get ( 'q' );
        $user = User::where ( 'name', 'LIKE', '%' . $q . '%' )->orWhere ( 'email', 'LIKE', '%' . $q . '%' )->get ();
        if (count ( $user ) > 0)
            return view ( 'search_resoult' )->withDetails ( $user )->withQuery ( $q );
        else
            return view ( 'search_resoult' )->withMessage ( 'No Details found. Try to search again !' );
    } );
