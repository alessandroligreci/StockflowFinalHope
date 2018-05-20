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
                <th scope="col">max_supply</th>
                <th scope="col">percent_change_1h</th>
                <th scope="col">Change (24h)</th>
                <th scope="col">percent_change_7d</th>
                <th scope="col">Price Graph (24h)</th>
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

            function CryptoDetail(){
                $.ajax({
                    type: "GET",
                    url: "https://api.coinmarketcap.com/v1/ticker/{{$crypto}}/",
                    dataType: "json",

                    success: function(result){
                        for (var i = 0; i < result.length; i++) {
                            var change = result[i].percent_change_24h.toString();
                            var newRow = '<tr><td>'+ result[i].rank + '</td>';
                                newRow += '<td>'+ result[i].name + '</td></a>';
                                newRow += '<td>'+ result[i].symbol + '</td>';
                                newRow += '<td>$'+ result[i].price_usd + '</td>';
                                newRow += '<td>'+ result[i].price_btc + " BTC" +'</td>';
                                newRow += '<td>$'+ result[i].market_cap_usd + '</td>';
                                newRow += '<td>$'+ result[i]["24h_volume_usd"] + '</td>';
                                newRow += '<td>'+ result[i].total_supply +  " " + result[i].symbol + '</td>';
                                newRow += '<td>'+ result[i].available_supply + '</td>';
                                newRow += '<td>'+ result[i].max_supply + '</td>';
                                newRow += '<td>'+ result[i].percent_change_24h + '%</td>';
                                newRow += '<td>'+ result[i].percent_change_1h + " %" + '</td>';
                                newRow += '<td>'+ result[i].percent_change_7d + " %" +'</td>';
                                newRow += '</tr>';
                            $(".table").append(newRow);
                            console.log(result);
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
