@extends('layouts.walletApp')
@section('content')

<body>
    <div class="container-fluid">
        @if ($totalValue != 0)
        <div class="changes">
            @if ($totalValue
            < 0) <div class="change"> Wallet Total Loss:
                <p class="gain_red">{{number_format($totalValue, 2, ',', '.')}}$</p>
        </div>
        @else
        <div class="change"> Wallet Total Gain:
            <p class="gain_green">{{number_format($totalValue, 2, ',', '.')}}$</p>
        </div>
        @endif
        @if ($totalChange
        < 0) <div class="change"> Wallet Total Change:<br>
            <p class="gain_red">{{number_format($totalChange, 2, ',', '.')}}%</p>
    </div>
    @else
    <div class="change"> Wallet Total Change:<br>
        <p class="gain_green">{{number_format($totalChange, 2, ',', '.')}}%</p>
    </div>
    @endif
    </div>
    <table class="table topSpace">
        <tr class="ciaone">
            <th class="date">Date</th>
            <th class="coin">Coin</th>
            <th class="quantity">Quantity</th>
            <th class="valueThen">Value Then</th>
            <th class="valueNow">Value Now</th>
            <th class="gain">Change</th>
            <th class="sell">Sell</th>
        </tr>
        @foreach ($wallet as $crypto)
        <tr class="ciao">
            <td class="created_at" id="record">{{$crypto->created_at->toDayDateTimeString()}}</td>
            <td class="cryptoTitle" id="record">{{$crypto->name}}</td>
            <td class="quantity" id="record">{{number_format($crypto->quantity, 4, ',','.')}}</td>
            <td class="value" id="record">{{$crypto->value}}$</td>
            <td class="value_now" id="record">{{number_format($crypto->value_now * $crypto->quantity, 6, ',', '.')}}$</td>
            @if ($crypto->value_now / ($crypto->value / $crypto->quantity) * 100 - 100
            < 0) <td class="gain_red" id="record">{{number_format($crypto->value_now / ($crypto->value / $crypto->quantity) * 100 - 100, 2, ',', '.')}}%</td>
                @else
                <td class="gain_green" id="record">{{number_format($crypto->value_now / ($crypto->value / $crypto->quantity) * 100 - 100, 2, ',', '.')}}%</td>
                @endif
                <td><a  class="btn btn-danger" onclick="return sellFunction()" id="record" style="color: white">Sell</a></td>
                {{--
                <td><button type="button" class="btn btn-danger" id="sell">Sell</button></td> --}}
        </tr>
        @endforeach
    </table>
    @else
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>It seems like your Crypto-Wallet is empty. Start buying some CryptoCurrency</h1>
            </div>
        </div>
        <button type="submit" class="btn btn-link"><a href="{{ route('login') }}">{{ __('Home') }}</a></button>
    </div>
    @endif
    </div>

    <script type='text/javascript'>
        // document.getElementsByClassName("btn-danger").addEventListener("click", sellFunction);
        function sellFunction() {
            console.log("click");
            // var priceToSell = parseFloat(prompt("Please enter the quantity you want to sell"));
            // var quantity = priceToSell / priceNow;
            var dataToSend = {
                name: name,
                // quantity: quantity,
                // value: priceToSell
            };
            $.ajax({
                    type: "POST",
                    url: "https://stockflow.test/detail/{{$crypto}}/sell?name=" + name, //+ '&value=' + priceToSell + '&quantity=' + quantity + '&value_now=' + priceNow,
                    dataType: "form-data",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(result) {
                        $(this).parents(".record").animate("fast").animate({
                        opacity: "hide"
                    }, "slow");
                return false;

            console.log(result);
            alert("Your Transaction Took Place");
                    }
        },
        // error: function(err) {
        // console.log(err);
        // alert("Something Went Wrong, Please Try Again Later");
        );
        }
    </script>
</body>
@endsection
