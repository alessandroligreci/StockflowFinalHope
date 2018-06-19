<head>

    <nav class="navbar navbar-expand-md sticky-top navbar-expand-* navbar-dark bg-dark">
        <a class="navbar-brand" href="{{ url('/home') }}">StockFlow</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">

            @if (Auth::check())
            <ul class="navbar-nav mr-auto">
                <a class="nav-link" href="{{ url('/home') }}">Home <span class="sr-only">(current)</span></a>
                <li class="nav-item">
                    <a class="nav-link" href="#">Trends</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/calendar') }}">Calendar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/wallet') }}">Wallet</a>
                </li>
                @endif
            </ul>
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ url('/profile') }}">Profile<span class="sr-only"></span></a>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </ul>

            <form action="/search" method="POST" role="search">
                {{ csrf_field() }}
                <div class="input-group">
                    <input type="text" class="form-control" name="q" placeholder="Search users"><span class="input-group-btn">
                    <button type="submit" class="btn btn-success">Search</button>
                    </span>
                </div>
            </form>
        </div>
    </nav>
</head>

<body>

</body>
