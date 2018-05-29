@extends('layouts.walletApp')
@section('content')
<div class="container-fluid">
    <body>
        <div class="changes">
            <div class="change"> Wallet Total Value<br>Number $</div>
            <div class="change"> Wallet Total Change<br>Number %</div>
        </div>
        <table class="table topSpace">
            <tr class="ciaone">
                <td class="ciaone">Coin</td>
                <td class="ciaone">Amount</td>
                <td class="ciaone">Value Then</td>
                <td class="ciaone">Value Now</td>
                <td class="ciaone">Change</td>
                <td class="ciaone">Date</td>
            </tr>
            @foreach ($wallet as $crypto)
            <tr class="ciao">
                <td class="ciao">{{$crypto->name}}</td>
                <td class="ciao">{{$crypto->quantity}}</td>
                <td class="ciao">{{$crypto->value}}$</td>
                <td class="ciao"></td>
                <td class="ciao"></td>
                <td class="ciao">{{$crypto->created_at}}</td>
            </tr>
            @endforeach
        </table>
    </body>
</div>
@endsection
