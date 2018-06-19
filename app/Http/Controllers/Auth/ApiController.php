<?php

namespace StockFlowSite\Http\Controllers\Auth;

use StockFlowSite\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use StockFlowSite\Crypto;
use StockFlowSite\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use \Overtrue\LaravelFollow\Traits\CanFollow;
use \Overtrue\LaravelFollow\Traits\CanBeFollowed;

class ApiController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    // use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest')->except('logout');
    }

    //Prende la history degli acquisti
    public function getUserCryptos(Request $request) {
        $cryptos = Crypto::where('user_id', $request->input('id'))->get();
        return response()->json($cryptos);
    }

    //Inviare dati delle crypto acquistate
    public function getWalletCryptos(Request $request) {
        $wallet = Crypto::where('user_id', $request->input('user_id'))->get();
        return response()->json($wallet);
    }

    //prende tutti gli utenti
    public function getUsers(Request $request) {
        if (Hash::check($request->input('password'), User::where('email', $request->input('email'))->value('password'))) {
            $users = User::where('email', $request->input('email'))->get();
            return response()->json($users);
        } else {
            return response()->json(0);
        }
    }

    // //
    // public function followUser(Request $request) {
    //     $user = User::where('id', $request->input('user_id'))->first();
    //     $user_to_follow = User::where('id', $request->input('follow_id'))->first();
    //     $user->follow($user_to_follow);
    //     //return $user_to_follow;
    //     return response()->json($user);
    // }
}
