@extends('layouts.app')
@section('content')

<?php use StockFlowSite\Http\Controllers\WalletController;?>

<body>

    <table class="table topSpace">
        <tr>
            <th class="date" style="text-align: center">Rank</th>
            <th class="date" style="text-align: center">Name</th>
            <th class="coin" style="text-align: center">Change</th>
            <th class="quantity" style="text-align: center">Total Gain</th>

        </tr>
        @foreach ($totalChange as $key => $change)
        <tr>
            <td style="text-align : center">{{$loop->iteration}}</td>
            @foreach ($trends as $user)
            @if ($key == $user->id)
                @if ($user->id == Auth::user()->id)
                    <td class="userName record" style="text-align : center">{{$user->name}}</td>
                @else
                    <td class="userName record" style="text-align: center"><a href="/wallet/{{$user->id}}">{{$user->name}}</a></td>
                @endif
            @endif
            @endforeach
            @if ($change > 0)
            <td class="changeWallet record" style="color: green; text-align: center">{{number_format($change, 2, ',','.')}} %</td>
            @else
                <td class="changeWallet record" style="color: red; text-align: center">{{number_format($change, 2, ',','.')}} %</td>
            @endif
            @if ($totalValue[$key] > 0)
                <td class="changeWallet record" style="color: green; text-align: center">{{number_format($totalValue[$key], 2, ',','.')}} $</td>
            @else
                <td class="changeWallet record" style="color: red; text-align: center">{{number_format($totalValue[$key], 2, ',','.')}} $</td>
            @endif
        </tr>
        @endforeach
    </table>
@endsection
