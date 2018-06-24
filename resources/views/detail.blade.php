@extends('layouts.app')
@section('content')

<body>
    <div class="container-fluid">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="row" id="title">
                <div class="col-lg-3 col-md-3 col-3">
                    <img src="" class="img" id="icona">
                </div>
                <div class="col-lg-6 col-md-5 col-5">
                    <h1 class="font-weight-bold" id="nome"></h1>
                </div>
                <div class="col-lg-1 col-md-3 col-3">
                    <h1 class="font-weight-light" id="simbolo"></h1>
                </div>
            </div>
        </div>
        <div class="row" id="pricerow">
            <table class="table-responsive-xs">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Price</th>
                            <th scope="col">Change 1h</th>
                            <th scope="col">Change 24h</th>
                            <th scope="col">Change 7d</th>
                            <th scope="col">Volume(24h)</th>
                            <th scope="col">Market Cap</th>
                            <th scope="col">Total Supply</th>
                            <th scope="col">Max Supply</th>
                            <th scope="col">Circulating Supply</th>
                            <th scope="col">Buy</th>
                        </tr>
                    </thead>
                </table>
        </div>
        <script src="https://code.jquery.com/jquery.min.js"></script>
        {{--
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        </script> --}}
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
        </script>
        <link href="{{ asset('css/dettaglio.css') }}" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script type='text/javascript'>
            function CryptoDetail() {
                $.ajax({
                    type: "GET",
                    url: "https://api.coinmarketcap.com/v2/ticker/{{$crypto}}/",
                    dataType: "json",

                    success: function(result) {
                        var change = result.data.quotes.USD.percent_change_24h.toString();
                        var rank = result.data.rank;
                        var name = result.data.name;
                        var symbol = result.data.symbol;
                        var icon = '\"https://s2.coinmarketcap.com/static/img/coins/16x16/' + result.data.id + '.png\"';
                        var price = parseFloat(result.data.quotes.USD.price).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                        var priceNow = parseFloat(result.data.quotes.USD.price);
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
                        $("#icona").attr("src", 'https://s2.coinmarketcap.com/static/img/coins/32x32/' + result.data.id + '.png');
                        document.getElementById('simbolo').innerHTML = "(" + symbol + ")";
                        // document.getElementById('valore').innerHTML = "$" + price;
                        var newRow = '<tr><td> $' + price + '</td>';
                        if (change1h > 0) {
                            newRow += '<td>' + change1h.fontcolor("green") + '%'.fontcolor("green");
                            //document.getElementById('cambio1h').innerHTML = change1h.fontcolor("green") + "%".fontcolor("green");
                        } else {
                            newRow += '<td>' + change1h.fontcolor("red") + '%'.fontcolor("red");
                            //document.getElementById('cambio1h').innerHTML = change1h.fontcolor("red") + "%".fontcolor("red");
                        }
                        if (change24h > 0) {
                            newRow += '<td>' + change24h.fontcolor("green") + '%'.fontcolor("green");
                            //document.getElementById('cambio24h').innerHTML = change24h.fontcolor("green") + "%".fontcolor("green");
                        } else {
                            newRow += '<td>' + change24h.fontcolor("red") + '%'.fontcolor("red");
                            //document.getElementById('cambio24h').innerHTML = change24h.fontcolor("red") + "%".fontcolor("red");
                        }
                        if (change7d > 0) {
                            newRow += '<td>' + change7d.fontcolor("green") + '%'.fontcolor("green") + '<br>';
                            //document.getElementById('cambio7d').innerHTML = change7d.fontcolor("green") + "%".fontcolor("green");
                        } else {
                            newRow += '<td>' + change7d.fontcolor("red") + '%'.fontcolor("red") + '<br>';
                            //document.getElementById('cambio7d').innerHTML = change7d.fontcolor("red") + "%".fontcolor("red");
                        }
                        newRow += '<td>' + volume24 + '</td>';
                        newRow += '<td>' + market + '</td>';
                        newRow += '<td>' + totalSupply + '</td>';
                        newRow += '<td>' + max_supply + '</td>';
                        newRow += '<td>' + available_supply + '</td>';
                        newRow += '<td><button type="button" class="btn btn-success" id="buy">Buy</button></td>';
                        newRow += '</tr>';
                        $(".table").append(newRow);
                        document.getElementById("buy").addEventListener("click", buyFunction);

                        function buyFunction() {
                            var priceToBuy = parseFloat(prompt("Please enter the quantity you want to invest"));
                            var quantity = priceToBuy / priceNow;
                            var dataToSend = {
                                name: name,
                                quantity: quantity,
                                value: priceToBuy
                            };
                            $.ajax({
                                type: "GET",
                                url: "https://stockflow.test/detail/{{$crypto}}/buy?name=" + name + '&value=' + priceToBuy + '&quantity=' + quantity + '&value_now=' + priceNow,
                                // dataType: "form-data",
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                // data: {
                                //     'name': name,
                                //     'quantity': quantity,
                                //     'value': priceToBuy
                                // },

                                success: function(result) {
                                    console.log(result);
                                    alert("Your Transaction Took Place");
                                },
                                error: function(err) {
                                    console.log(err);
                                    alert("Something Went Wrong, Please Try Again Later");
                                }
                            });
                            console.log(quantity);
                        }


                    },
                    error: function(err) {
                        console.log(err);
                    }
                });
            }
            CryptoDetail();
        </script>
    </div>
</body>
{{--
@include('layouts.errors') --}}
@endsection
