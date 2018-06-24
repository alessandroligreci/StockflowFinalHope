@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>It seems like your Crypto-Wallet is empty. Start buying some CryptoCurrency</h1>
        </div>
    </div>
    <button type="submit" class="btn btn-link"><a href="{{ route('login') }}">{{ __('Home') }}</a></button>
</div>

    @endsection
