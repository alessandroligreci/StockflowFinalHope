@extends('layouts.walletApp')
@section('content')
    <body>
    <table>
        <tr class="ciao">
            <td class="ciao">Coin</td>
            <td class="ciao">Amount</td>
            <td class="ciao">Value then</td>
            <td class="ciao">Date</td>
        </tr>
        @foreach ($wallet as $crypto)
            <tr class="ciao">
                <td class="ciao">{{$crypto->name}}</td>
                <td class="ciao">{{$crypto->quantity}}</td>
                <td class="ciao">{{$crypto->value}}$</td>
                <td class="ciao">{{$crypto->created_at}}</td>
            </tr>
        @endforeach
    </table>
</body>
@endsection
