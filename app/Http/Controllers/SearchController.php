<?php

namespace StockFlowSite\Http\Controllers;

use Illuminate\Http\Request;
use StockFlowSite\User;
use Illuminate\Support\Facades\Input;

class SearchController extends Controller
{
    function index() {
        $q = Input::get ( 'q' );
        $user = User::where ( 'name', 'LIKE', '%' . $q . '%' )->orWhere ( 'email', 'LIKE', '%' . $q . '%' )->get ();
        if (count ( $user ) > 0)
            return view ( 'search_result' )->withDetails ( $user )->withQuery ( $q );
        else
            return view ( 'search_result' )->withMessage ( 'No Details found. Try to search again !' );
        }
}
