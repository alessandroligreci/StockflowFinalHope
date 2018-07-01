<?php

namespace StockFlowSite\Http\Controllers;

use Illuminate\Http\Request;
use StockFlowSite\User;
use StockFlowSite\Crypto;

class UserController extends Controller
{
    public function index() {

        $users = User::with('crypto')->get();
        return view('trends', compact('users'));
    }

    public function show($id) {
        $user = User::with('crypto')->where('id', '=', $id)->get();
        return $user;
    }

    public function trendsApp() {
        $trends = User::all();

        $walletVal = 0;
        $walletCha = 0;
        $totalValue = 0;
        $totalChange = 0;
        $data = array();
        foreach ($trends as $user) {
            $wallet = Crypto::where('user_id', $user->id)->get();
            foreach ($wallet as $crypto) {
                $walletVal += $crypto->value_now * $crypto->quantity;
                $walletCha += $crypto->value;
            }
            if ($walletCha > 0) {
                //forza l'indice dell'array
                $totalValue = $walletVal - $walletCha;
                $totalChange = (($walletVal / $walletCha) -1) * 100;

                $data[] = [
                    'name' => $user->name,
                    'change' => $totalChange,
                    'gain' => $totalValue,
                ];

                $walletVal = 0;
                $walletCha = 0;

            }
        }

        return response()->json($data);
    }
}
