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
            $totalValue = 0;
            $totalChange = 0;
            foreach ($wallet as $crypto) {
                $walletVal += $crypto->value_now * $crypto->quantity;
                $walletCha += $crypto->value; //tot di tutti i soldi spesi
            }
            if ($walletCha > 0) {
                $totalValue = $walletVal - $walletCha;
                $totalChange = (($walletVal / $walletCha) -1) * 100;
            }
            return View::make('wallet',compact('wallet', 'walletVal', 'totalChange','totalValue'));
        }
    }
}
