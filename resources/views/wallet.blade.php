@extends('layouts.walletApp')
@section('content')

<body>
    <div class="changes">
        @if ($walletVal < 0)
            <div class="change"> Wallet Total Value:<p class="gain_red">{{number_format($walletVal, 2, '.', ',')}}$</p></div>
        @else
            <div class="change"> Wallet Total Value:<p class="gain_green">{{number_format($walletVal, 2, '.', ',')}}$</p></div>
        @endif
        @if ($totalChange < 0)
            <div class="change"> Wallet Total Change:<br><p class="gain_red">{{number_format($totalChange, 2, '.', ',')}}%</p></div>
        @else
            <div class="change"> Wallet Total Change:<br><p class="gain_green">{{number_format($totalChange, 2, '.', ',')}}%</p></div>
        @endif
    </div>
    <table class="table topSpace">
        <tr class="ciaone">
            <th class="date">Date</th>
            <th class="coin">Coin</th>
            <th class="quantity">Quantity</th>
            <th class="valueThen">Value Then</th>
            <th class="valueNow">Value Now</th>
            <th class="gain">change</th>
        </tr>
        @foreach ($wallet as $crypto)
        <tr class="ciao">
            <td class="created_at">{{$crypto->created_at}}</td>
            <td class="cryptoTitle">{{$crypto->name}}</td>
            <td class="quantity">{{$crypto->quantity}}</td>
            <td class="value">{{$crypto->value}}$</td>
            <td class="value_now">{{$crypto->value_now}}$</td>
            @if ($crypto->value_now / ($crypto->value / $crypto->quantity) * 100 - 100 < 0)
                <td class="gain_red">{{number_format($crypto->value_now / ($crypto->value / $crypto->quantity) * 100 - 100, 2, '.', ',')}}%</td>
            @else
                <td class="gain_green">{{number_format($crypto->value_now / ($crypto->value / $crypto->quantity) * 100 - 100, 2, '.', ',')}}%</td>
            @endif
        </tr>
        @endforeach
    </table>
</body>
@endsection
