<?php

namespace StockFlowSite\Http\Controllers;

use StockFlowSite\Crypto;
use View;
use Illuminate\Http\Request;
use Auth;

class WalletController extends Controller
{


    public function index() {

        if ($user = Auth::user()) {
            $wallet = Crypto::where('user_id', Auth::user()->id)->get();
            $walletVal = 0;
            $walletCha = 0;
            foreach ($wallet as $crypto) {
                $walletVal += $crypto->value_now * $crypto->quantity;
                $walletCha += $crypto->value;
            }
            $totalChange = (($walletVal / $walletCha) -1) * 100;
            return View::make('wallet',compact('wallet', 'walletVal', 'totalChange'));
        }

        else {
            return view ('not_logged_wallet')->withMessage ( 'No Details found. Try to search again !' );
        }
    }
}
