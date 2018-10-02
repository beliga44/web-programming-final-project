<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Forlob</title>



        <link rel="stylesheet" type="text/css" href="{{asset("css/semantic.min.css")}}">

        <link rel="stylesheet" href="{{asset("css/style.css")}}">

        <script src="{{asset("js/jquery-3.3.1.min.js")}}"></script>
        <script src="{{asset("js/semantic.min.js")}}"></script>
        <script src="{{asset("js/main.js")}}"></script>
    </head>
    <body>
        <header class="ui top fixed small menu top-bar">
            <div class="ui container middle aligned">
                <a class="item no-pseudo-before remove-border-left">
                    <img class="ui tiny image" src="{{asset("img/logo.png")}}">
                </a>
                <div class="right menu">
                    <a class="item no-pseudo-before">Log In</a>
                    <a class="item no-pseudo-before sign-up">Sign Up</a>
                </div>
            </div>
            <div class="ui modal">
                <div class="header">
                    Sign Up to Div Forum
                </div>
                <div class="content">
                    <form action="" class="ui form">
                        <div class="ui two column grid">
                            <div class="column">
                                <div class="required field">
                                    <label>Name</label>
                                    <input type="text" name="name" placeholder="Name">
                                </div>
                                <div class="required field">
                                    <label>Email Address</label>
                                    <input type="text" name="email" placeholder="Email Address">
                                </div>
                                <div class="two fields">
                                    <div class="required field">
                                        <label>Password</label>
                                        <input type="password" name="password">
                                    </div>
                                    <div class="required field">
                                        <label>Confirm Password</label>
                                        <input type="password" name="password-confirmation">
                                    </div>
                                </div>
                                <div class="required field">
                                    <label>Phone Number</label>
                                    <input type="text" name="phone-number" placeholder="Phone Number">
                                </div>
                            </div>
                            <div class="column">
                                <div class="required field">
                                    <label>Address</label>
                                    <textarea name="address" id="" cols="30" rows="1"></textarea>
                                </div>
                                <div class="required field">
                                    <label>Birthday</label>
                                    <input type="date" name="email" placeholder="Birthday">
                                </div>
                                <div class="fields">
                                    <div class="required field">
                                        <label>Gender</label>
                                        <div class="inline fields">
                                            <div class="field">
                                                <div class="ui radio checkbox">
                                                    <input name="gender" checked="true" tabindex="0" class="hidden" type="radio">
                                                    <label>Male</label>
                                                </div>
                                            </div>
                                            <div class="field">
                                                <div class="ui radio checkbox">
                                                    <input name="gender" tabindex="0" class="hidden" type="radio">
                                                    <label>Female</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="required field">
                                    <label>Photo</label>
                                    <input type="file" name="photo">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="actions">
                    <div class="ui red black deny button">
                        Cancel
                    </div>
                    <div class="ui positive right icon button">
                        Sign Up
                    </div>
                </div>
            </div>
        </header>
        <div class="ui main text fluid container">
            @yield('content')
        </div>
    </body>
</html>
