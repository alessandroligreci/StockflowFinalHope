@extends('layouts.app')
@section('content')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Symbol</th>
                <th scope="col">Price</th>
                <th scope="col">price_btc</th>
                <th scope="col">Market Cap</th>
                <th scope="col">Volume (24h)</th>
                <th scope="col">Circulating Supply</th>
                <th scope="col">available_supply</th>
                <th scope="col">percent_change_1h</th>
                <th scope="col">percent_change_24h</th>
                <th scope="col">percent_change_7d</th>
        </thead>
        <tbody>
        </tbody>
    </table>
            <script src="https://code.jquery.com/jquery.min.js"></script>
            {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"></script> --}}
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
            <script type='text/javascript'>

            function CryptoDetail(){
                $.ajax({
                    type: "GET",
                    url: "https://api.coinmarketcap.com/v1/ticker/{{$crypto}}/",
                    dataType: "json",

                    success: function(result){
                        for (var i = 0; i < result.length; i++) {
                            var change = result[i].percent_change_24h.toString();
                            var rank = result[i].rank;
                            var name = result[i].name;
                            var symbol = result[i].symbol;
                            var price = parseFloat(result[i].price_usd).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                            var price_btc = parseFloat(result[i].price_btc);
                            var market = parseFloat(result[i].market_cap_usd).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                            var volume24 = parseFloat(result[i]["24h_volume_usd"]).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                            var totalSupply = parseFloat(result[i].total_supply).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                            var available_supply = parseFloat(result[i].available_supply).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                            var max_supply = parseFloat(result[i].max_supply).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                            var change1h = result[i].percent_change_1h;
                            var change24h = result[i].percent_change_24h;
                            var change7d = result[i].percent_change_7d;
                            var newRow = '<tr><td>'+ rank + '</td>';
                                newRow += '<td>'+ name + '</td></a>';
                                newRow += '<td>'+ symbol + '</td>';
                                newRow += '<td>$'+ price + '</td>';
                                newRow += '<td>'+ price_btc + " BTC" +'</td>';
                                newRow += '<td>$'+ market + '</td>';
                                newRow += '<td>$'+ result[i]["24h_volume_usd"] + '</td>';
                                newRow += '<td>'+ totalSupply +  " " + symbol + '</td>';
                                newRow += '<td>'+ available_supply + '</td>';
                                //newRow += '<td>'+ max_supply + '</td>';
                                //newRow += '<tr><th scope="col">Change (24h)</th><th scope="col">Change (7d)</th><th scope="col">Change (1h)</th><th scope="col">Price Graph (7d)</th></tr>';
                                // newRow += '<td>'+ result[i].percent_change_24h + '%</td>';
                                // newRow += '<td>'+ result[i].percent_change_1h + " %" + '</td>';
                                // newRow += '<td>'+ result[i].percent_change_7d + " %" +'</td>';
                                if (change1h > 0) {
                                    newRow += '<td>' + result[i].percent_change_1h.fontcolor("green") + '%'.fontcolor("green") + '</td>';
                                }
                                else {
                                    newRow += '<td>' + result[i].percent_change_1h.fontcolor("red") + '%'.fontcolor("red") + '</td>';
                                }
                                if (change > 0) {
                                    newRow += '<td>' + change.fontcolor("green") + '%'.fontcolor("green") + '</td>';
                                }
                                else {
                                    newRow += '<td>' + change.fontcolor("red") + '%'.fontcolor("red") + '</td>';
                                }
                                if (change7d > 0) {
                                    newRow += '<td>' + result[i].percent_change_7d.fontcolor("green") + '%'.fontcolor("green") + '</td>';
                                }
                                else {
                                    newRow += '<td>' + result[i].percent_change_7d.fontcolor("red") + '%'.fontcolor("red") + '</td>';
                                }
                                newRow += '<td><button type="button" id = "button">Buy</button>' + '</td>';
                                newRow += '</tr>';
                            $(".table").append(newRow);
                            document.getElementById("button").addEventListener("click", buyFunction);
                            function buyFunction () {
                                var quantity = parseFloat(prompt("Please enter the quantity you want to invest"));
                                console.log(quantity);
                                }
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
