<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>@yield('title')</title>
        <link rel="icon" href="{{ asset('img/iconTBC.png') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="{{ asset('css/external.css') }}">
        <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
        <script src="{{ asset('js/custom.js') }}" charset="utf-8"></script>
    </head>
    <header class="ibank-header">
        <div class="ibank-top">
            <div class="ibank-area">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('img/tbc-logo.svg') }}" alt="logo">
                </a>
                <div class="ibank-logout">
                    <span>{{ Auth::user()->name }} {{ Auth::user()->surname }}</span>
                    <button>
                        <a class="nav-link " href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <span class="glyphicon glyphicon-log-out"></span>
                        </a>
                    </button>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
        <div class="ibank-menu">
            <div class="ibank-area">
                <a href=" {{ route('userhome')  }}" class="menuItem">პროდუქტები</a>
                <a href="{{ route('transfers') }}" class="menuItem">გადარიცხვები</a>
                <a href="{{ route('cards') }}" class="menuItem">ბარათები</a>
            </div>
        </div>
    </header>
    <body style="background-color:#e8ebef;">
        <div class="ibank-content">
            <div class="ibank-area">
                @yield('content')
            </div>
        </div>
    </body>
</html>
