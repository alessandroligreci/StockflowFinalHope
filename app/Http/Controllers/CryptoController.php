<?php

namespace StockFlowSite\Http\Controllers;

use StockFlowSite\Crypto;
use Illuminate\Http\Request;
use StockFlowSite\User;
use Illuminate\Support\Facades\Auth;

?>
<!-- <script type='text/javascript'></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> -->
<!-- <script language="JavaScript" type="text/javascript" src="/js/jquery-1.2.6.min.js"></script>
<script language="JavaScript" type="text/javascript" src="/js/jquery-ui-personalized-1.5.2.packed.js"></script> -->
<!-- <script language="JavaScript" type="text/javascript" src="/js/sprinkle.js"></script> -->

<?php

//$client = new GuzzleHttp\Client();

    /**
     * Display a listing of the resource.
     *
     *
     */

      class CryptoController extends Controller {
        //@return \Illuminate\Http\Respons

        public function postUserCryptos($crypto, Request $request) {
            $crypto = new Crypto;
            $crypto->name = $request->input('name');
            $crypto->quantity = $request->input('quantity');
            $crypto->value = $request->input('value');
            $crypto->value_now = $request->input('value_now');
            $crypto->user_id = Auth::user()->id;
            $crypto->save();
            //return response()->json('ok');
            // $wallet = Crypto::where('user_id', Auth::user()->id)->get();
            // return View::make('wallet',compact('wallet'));
            //return view('wallet');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     *@return \Illuminate\Http\Response
     */
//     public function create()
//     {
//         //
//     }
//
//     /**
//      * Store a newly created resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @return \Illuminate\Http\Response
//      */
//     public function store(Request $request)
//     {
//         //
//     }
//
//     /**
//      * Display the specified resource.
//      *
//      * @param  \StockFlowSite\Crypto  $crypto
//      * @return \Illuminate\Http\Response
//      */
//     public function show(Crypto $crypto)
//     {
//         //
//     }
//
//     /**
//      * Show the form for editing the specified resource.
//      *
//      * @param  \StockFlowSite\Crypto  $crypto
//      * @return \Illuminate\Http\Response
//      */
//     public function edit(Crypto $crypto)
//     {
//         //
//     }
//
//     /**
//      * Update the specified resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @param  \StockFlowSite\Crypto  $crypto
//      * @return \Illuminate\Http\Response
//      */
//     public function update(Request $request, Crypto $crypto)
//     {
//         //
//     }
//
//     /**
//      * Remove the specified resource from storage.
//      *
//      * @param  \StockFlowSite\Crypto  $crypto
//      * @return \Illuminate\Http\Response
//      */
//     public function destroy(Crypto $crypto)
//     {
//         //
//     }
// }
?>
