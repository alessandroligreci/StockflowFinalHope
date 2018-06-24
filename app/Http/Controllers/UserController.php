<?php

namespace StockFlowSite\Http\Controllers;

use Illuminate\Http\Request;
use StockFlowSite\User;

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
}
