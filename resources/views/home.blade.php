@extends('layouts.app')
@section('content')
<body>
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
                <th scope="col">Price Graph (7d)</th>
                <th scope="col">Change (24h)</th>

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
            url: "https://api.coinmarketcap.com/v2/ticker/?sort=rank&structure=array",
            dataType: "json",

            success: function(result){
                for (var i = 0; i < result.data.length; i++) {
                    var name = result.data[i].name;
                    var symbol = result.data[i].symbol;
                    var price = parseFloat(result.data[i].quotes.USD.price);
                    var market = parseFloat(result.data[i].quotes.USD.market_cap).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                    var volume24 = parseFloat(result.data[i].quotes.USD.volume_24h).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                    var totalSupply = parseFloat(result.data[i].total_supply).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                    var change24 = result.data[i].quotes.USD.percent_change_24h.toString();
                    var rank = result.data[i].rank;
                    var newRow = '<tr><td>'+ rank + '</td>';
                    newRow += '<td><img src=\"https://s2.coinmarketcap.com/static/img/coins/16x16/' + result.data[i].id + '.png\"> <a href=\"http://stockflow.test/detail/' + result.data[i].id + '\"> ' + name + '</a></td>';
                    newRow += '<td>'+ symbol + '</td>';
                    newRow += '<td>$'+ price + '</td>';
                    newRow += '<td>$'+ market + '</td>';
                    newRow += '<td>$'+ volume24 + '</td>';
                    newRow += '<td>'+ totalSupply + " " + symbol + '</td>';
                    newRow += '<td><img src=\"https://s2.coinmarketcap.com/generated/sparklines/web/7d/usd/' + result.data[i].id + '.png\"></td>';
                        if (change24 > 0) {
                            newRow += '<td>' + change24.fontcolor("green") + '%'.fontcolor("green") + '</td>';
                        }
                        else {
                            newRow += '<td>' + change24.fontcolor("red") + '%'.fontcolor("red") + '</td>';
                        }
                    //newRow += '<td>'+ '<button class="btn" onclick=""> BUY </button>' + '</td>';
                    //newRow += '<td><button type="button" id = "button">Buy</button>' + '</td>';
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

    //document.getElementById("button").addEventListener("click", displayDate);
    </script>
</body>
@endsection
