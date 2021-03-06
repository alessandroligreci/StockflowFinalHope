<?php

namespace StockFlowSite\Http\Controllers;

use StockFlowSite\Crypto;
use Illuminate\Http\Request;
use StockFlowSite\User;
use Illuminate\Support\Facades\Auth;
use View;

?>

<?php

//$client = new GuzzleHttp\Client();

    /**
     * Display a listing of the resource.
     *
     *
     */
      class CryptoController extends Controller {
        //@return \Illuminate\Http\Respons

        public function postUserCryptos(Request $request) {
            $crypto = new Crypto;
            $crypto->name = $request->input('name');
            $crypto->quantity = $request->input('quantity');
            $crypto->value = $request->input('value');
            $crypto->value_now = $request->input('value_now');
            $crypto->user_id = Auth::user()->id;
            // $request->input('user_id');
            $crypto->save();
            return;
            // response()->json($crypto);
        }
        public function postUserCryptosApp(Request $request) {
            $crypto = new Crypto;
            $crypto->name = $request->input('name');
            $crypto->quantity = $request->input('quantity');
            $crypto->value = $request->input('value');
            $crypto->value_now = $request->input('value_now');
            $crypto->user_id = $request->input('user_id');
            $crypto->save();
            return response()->json($crypto);
        }
        public function getDetail($crypto) {
            return view('detail',compact('crypto'));
        }
        public function sellUserCryptos ($id) {
            Crypto::findOrFail($id)->delete();
            return back();
        }

        public function sellCryptosApp (Request $request) {
            Crypto::findOrFail($request->input('id'))->delete();
            return response()->json("done");
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
