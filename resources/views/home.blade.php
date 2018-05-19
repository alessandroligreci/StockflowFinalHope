@extends('layouts.app')
@section('content')
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Symbol</th>
            <th scope="col">Price</th>
            <th scope="col">Market Cap</th>
            <th scope="col">Volume (24h)</th>
            <th scope="col">Circulating Supply</th>
            <th scope="col">Change (24h)</th>
            <th scope="col">Price Graph (7d)</th>
        </tr>
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
    function UpdateCryptoPrice(){
        $.ajax({
            type: "GET",
            url: "https://api.coinmarketcap.com/v1/ticker/",
            dataType: "json",

            success: function(result){
                for (var i = 0; i < result.length; i++) {
                    var rank = result[i].rank;
                    var name = result[i].name;
                    var symbol = result[i].symbol;
                    var price = result[i].price_usd;
                    var market = result[i].market_cap_usd;
                    var volume24 = result[i]["24h_volume_usd"];
                    var totalSupply = result[i].total_supply;
                    var change24 = result[i].percent_change_24h;
                    var newRow = '<tr><td>'+ rank + '</td>';
                        newRow += '<td><a href=\"http://stockflow.test/detail/' + result[i].id + '\">' + name + '</a></td>';
                        newRow += '<td>'+ symbol + '</td>';
                        newRow += '<td>$'+ price + '</td>';
                        newRow += '<td>$'+ market + '</td>';
                        newRow += '<td>$'+ volume24 + '</td>';
                        newRow += '<td>'+ totalSupply + '</td>';
                        //newRow += '<td>'+ change24 + '%</td>';
                        if (change24 > 0) {
                            newRow += '<td>' + change24.fontcolor("green") + '%'.fontcolor("green") + '</td>';
                        }
                        else {
                            newRow += '<td>' + change24.fontcolor("red") + '%'.fontcolor("red") + '</td>';
                        }
                    //newRow += '<td>'+ '<button class="btn" onclick=""> BUY </button>' + '</td>';
                    newRow += '</tr>';
                        newRow += '</tr>';
                    $(".table").append(newRow);
                }
            },
            error: function(err){
                console.log(err);
            }
        });
    }
    UpdateCryptoPrice();
    </script>
@endsection
