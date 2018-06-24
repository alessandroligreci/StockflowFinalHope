<?php

namespace StockFlowSite\Http\Controllers;

use Illuminate\Http\Request;
use StockFlowSite\Crypto;
use View;
use Auth;
use StockFlowSite\User;

class TrendsController extends Controller
{
    public function index() {

        if ($user = Auth::user()) {
            $trends = User::all();

            $walletVal = 0;
            $walletCha = 0;
            $totalValue = array();
            $totalChange = array();
            foreach ($trends as $user) {
                $wallet = Crypto::where('user_id', $user->id)->get();
                foreach ($wallet as $crypto) {
                    $walletVal += $crypto->value_now * $crypto->quantity;
                    $walletCha += $crypto->value;
                }
                if ($walletCha > 0) {
                    //forza l'indice dell'array
                    $totalValue[$user->id] = $walletVal - $walletCha;
                    $totalChange[$user->id] = (($walletVal / $walletCha) -1) * 100;
                    $walletVal = 0;
                    $walletCha = 0;
                }
            }
            arsort($totalChange);
            return view('trends',compact('trends','totalChange','totalValue'));
        } else {
            return view('auth.login');
        }
    }
}
