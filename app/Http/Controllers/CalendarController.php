<?php

namespace StockFlowSite\Http\Controllers;

use Illuminate\Http\Request;
use view;
use Auth;
use StockFlowSite\User;

class CalendarController extends Controller
{
    function index() {
        if ($user = Auth::user()) {
        return view('/calendar');
        }
        else {
            return view('auth.login');
        }
    }
}
