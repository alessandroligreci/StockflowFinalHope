@extends('layouts.app')
@section('content')

<body>
    <div class="container-fluid">
        @if(isset($details))
        <p style="text-align: center; font-size: 2em"> Your search result for <b> {{ $query }} </b> are :</p>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" style="text-align: center">Name</th>
                    <th scope="col" style="text-align: center">Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach($details as $user)
                <tr>
                    <td style="text-align: center; color: black"><a href="/wallet/{{$user->id}}">{{$user->name}}</a></td>
                    <td style="text-align: center; color: black">{{$user->email}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <h6 style="text-align: center">No resoult have been found. Please try seaching a new query.</h6>
        @endif

    </div>
</body>
@endsection
