<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Forlob</title>

        <link rel="stylesheet" href="{{ asset("semantic/dist/semantic.min.css") }}">
        <link rel="stylesheet" href="{{ asset("css/style.css") }}">

        <script src="{{ asset("js/jquery-3.3.1.min.js") }}"></script>
        <script src="{{ asset("semantic/dist/semantic.min.js") }}"></script>
        <script src="{{ asset("js/main.js") }}"></script>
    </head>
    <body>
        <header class="ui top fixed small menu top-bar">
            <div class="ui container middle aligned">
                <a href="{{ route('home') }}" class="item no-pseudo-before remove-border-left">
                    <img class="ui tiny image" src="{{ asset("img/logo.png") }}">
                </a>
                <div class="item">
                    <form class="ui middle aligned icon input search-bar" data-content="Press &quot;Enter&quot; to search" action="{{ route('home') }}">
                        <i class="ui icon search"></i>
                        <input placeholder="Search Title or Category" type="text" name="keyword">
                    </form>
                </div>
                <div class="right menu">
                    @if (!Auth::user())
                        <a href="{{ url('/login') }}" class="item no-pseudo-before">Log In</a>
                        <a href="{{ url('/register') }}" class="item no-pseudo-before">Sign Up</a>
                    @else
                        <div class="ui floating dropdown item no-pseudo-before profile">
                            <img class="ui avatar image" src="{{ asset('profile_picture/' . Auth::user()->profile_picture) }}">
                            <span>{{ Auth::user()->name }}</span>
                            <i class="dropdown icon"></i>
                            <div class="menu">
                                <a class="item" href="{{ route('profile.show') }}">Profile</a>
                                <a class="item" href="{{ route('logout') }}">Logout</a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </header>
        <div class="ui main container bg-color">
            @yield('content')
        </div>
    </body>
</html>
