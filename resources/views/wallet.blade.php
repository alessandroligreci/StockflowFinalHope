@extends('layouts.walletApp')
@section('content')

<body>
    <div class="container">
        @if ($totalValue != 0)
        <div class="changes">
            @if ($totalValue
            < 0) <div class="change"> Wallet Total Gain:
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
        </tr>
        @foreach ($wallet as $crypto)
        <tr class="ciao">
            <td class="created_at">{{$crypto->created_at->toDayDateTimeString()}}</td>
            <td class="cryptoTitle">{{$crypto->name}}</td>
            <td class="quantity">{{number_format($crypto->quantity, 4, ',','.')}}</td>
            <td class="value">{{$crypto->value}}$</td>
            <td class="value_now">{{number_format($crypto->value_now * $crypto->quantity, 6, ',', '.')}}$</td>
            @if ($crypto->value_now / ($crypto->value / $crypto->quantity) * 100 - 100
            < 0) <td class="gain_red">{{number_format($crypto->value_now / ($crypto->value / $crypto->quantity) * 100 - 100, 2, ',', '.')}}%</td>
                @else
                <td class="gain_green">{{number_format($crypto->value_now / ($crypto->value / $crypto->quantity) * 100 - 100, 2, ',', '.')}}%</td>
                @endif
        </tr>
        @endforeach
    </table>
    @else
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>It seems like your Crypto-Wallet is empty. Start buying some CryptoCurrency</h1>
            </div>
        </div>
        <button type="submit" class="btn btn-link"><a href="{{ route('login') }}">{{ __('Home') }}</a></button>
    </div>
    @endif
    </div>
</body>
@endsection
