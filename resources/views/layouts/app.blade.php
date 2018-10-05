<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Forlob</title>

        <link rel="stylesheet" href="{{asset("semantic/dist/semantic.min.css")}}">
        <link rel="stylesheet" href="{{asset("css/style.css")}}">

        <script src="{{asset("js/jquery-3.3.1.min.js")}}"></script>
        <script src="{{asset("semantic/dist/semantic.min.js")}}"></script>
        <script src="{{asset("js/main.js")}}"></script>
    </head>
    <body>
        <header class="ui top fixed small menu top-bar">
            <div class="ui container middle aligned">
                <a href="{{ url('/') }}" class="item no-pseudo-before remove-border-left">
                    <img class="ui tiny image" src="{{asset("img/logo.png")}}">
                </a>
                <div class="right menu">
                    @if (!Auth::user())
                        <a href="{{ url('/login') }}" class="item no-pseudo-before log-in">Log In</a>
                        <a href="{{ url('/register') }}" class="item no-pseudo-before sign-up">Sign Up</a>
                    @else
                        <a href="{{ route('logout') }}" class="item no-pseudo-before log-in">Log Out</a>
                    @endif
                </div>
            </div>
        </header>
        <div class="ui main container bg-color">
            @yield('content')
        </div>
    </body>
</html>
