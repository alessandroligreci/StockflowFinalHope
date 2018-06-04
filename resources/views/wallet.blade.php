@extends('layouts.app')
@section('content')
    <body>
        {{-- <div class="changes">
            <div class="change"> Wallet Total Value<br>Number $</div>
            <div class="change"> Wallet Total Change<br>Number %</div>
        </div> --}}
        <table class="table topSpace">
            <tr class="ciaone">
                <th class="Date">Date</th>
                <th class="Coin">Coin</th>
                <th class="ValueThen">Value Then</th>
                <th class="ValueNow">Value Now</th>
                <th class="<Gain">Gain</th>
            </tr>
            @foreach ($wallet as $crypto)
            <tr class="ciao">
                <td class="created_at">{{$crypto->created_at}}</td>
                <td class="cryptoTitle">{{$crypto->name}}</td>
                <td class="name">{{$crypto->quantity}}</td>
                {{-- //prezzzo al momento dell'acquisto --}}
                <td class="value">{{$crypto->value}}$</td>
            </tr>
        @endforeach
    </table>
</body>
@endsection
