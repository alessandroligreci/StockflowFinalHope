<?php

namespace StockFlowSite\Http\Controllers;

use Illuminate\Http\Request;

class WalletController extends Controller
{
    $allWalletValues = Crypto::where('user_id', Auth::user()->id)->get();
    $change = 
    $totalWalletValue
}
