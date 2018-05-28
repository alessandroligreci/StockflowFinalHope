@extends('layouts.app')
@section('content')
    <body>
        <div class="container-fluid">
            <div class="row h-100 justify-content-center align-items-center">
                <div class="col-md-1">
                    <img src="" class="img-rounded" id="icona">
                </div>
                <div class="col-md-2">
                    <h1 class="font-weight-bold" id="nome"></h1>
                </div>
                <div class="col-md-1">
                    <h1 class="font-weight-light" id="simbolo"></h1>
                </div>
            </div>
        </div>
    </body>
            <script src="https://code.jquery.com/jquery.min.js"></script>
            {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"></script> --}}
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"></script>
            <link href="{{ asset('css/detail.css') }}" rel="stylesheet">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
            <script type='text/javascript'>

            function CryptoDetail(){
                $.ajax({
                    type: "GET",
                    url: "https://api.coinmarketcap.com/v2/ticker/{{$crypto}}",
                    dataType: "json",

                    success: function(result){
                            var change = result.data.quotes.USD.percent_change_24h.toString();
                            var rank = result.data.rank;
                            var name = result.data.name;
                            var symbol = result.data.symbol;
                            var icon = '\"https://s2.coinmarketcap.com/static/img/coins/16x16/' + result.data.id + '.png\"';
                            var price = parseFloat(result.data.quotes.USD.price).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                            var price_btc = parseFloat(result.data.price_btc);
                            var market = parseFloat(result.data.quotes.USD.market_cap).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                            var volume24 = parseFloat(result.data.quotes.USD.volume_24h).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                            var totalSupply = parseFloat(result.data.total_supply).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                            var available_supply = parseFloat(result.data.circulating_supply).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                            var max_supply = parseFloat(result.data.max_supply).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                            var change1h = result.data.quotes.USD.percent_change_1h.toString();
                            var change24h = result.data.quotes.USD.percent_change_24h.toString();
                            var change7d = result.data.quotes.USD.percent_change_7d.toString();
                            document.getElementById('nome').innerHTML = name;
                            $("#icona").attr("src", 'https://s2.coinmarketcap.com/static/img/coins/32x32/' + result.data.id + '.png' );
                            document.getElementById('simbolo').innerHTML = "(" + symbol + ")";
                            //     if (change1h > 0) {
                            //         newRow += '<td>' + change1h.fontcolor("green") + '%'.fontcolor("green") ;
                            //     }
                            //     else {
                            //         newRow += '<td>' + change1h.fontcolor("red") + '%'.fontcolor("red");
                            //     }
                            //     if (change > 0) {
                            //         newRow += '<td>' + change.fontcolor("green") + '%'.fontcolor("green");
                            //     }
                            //     else {
                            //         newRow += '<td>' + change.fontcolor("red") + '%'.fontcolor("red");
                            //     }
                            //     if (change7d > 0) {
                            //         newRow += '<td>' + change7d.fontcolor("green") + '%'.fontcolor("green");
                            //     }
                            //     else {
                            //         newRow += '<td>' + change7d.fontcolor("red") + '%'.fontcolor("red");
                            //     }
                            //     newRow += '<td><button type="button" id = "button">Buy</button>';
                            //     newRow += '</tr>';
                            // $(".table").append(newRow);
                            document.getElementById("button").addEventListener("click", buyFunction);

                            function buyFunction () {
                                var quantity = parseFloat(prompt("Please enter the quantity you want to invest"));
                                console.log(quantity);
                            }
                    },
                    error: function(err){
                        console.log(err);
                    }
                });
            }
            CryptoDetail();
            </script>
@endsection
