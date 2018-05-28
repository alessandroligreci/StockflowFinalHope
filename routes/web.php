<?php

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
    return view('wallet');
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
