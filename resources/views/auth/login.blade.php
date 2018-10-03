@extends('layouts.app')

@section('content')
<div class="ui middle aligned center aligned grid" style="background: whitesmoke">
    <div class="seven wide column">
        <div class="column">
            <img class="ui fluid rounded image" src="{{asset('img/Optimized-log-in.jpg')}}">
        </div>
    </div>
    <div class="five wide column">
        <div class="column">
            <div class="ui left aligned container">
                <strong><p style="font-size: 23px; color: rgba(14, 151, 188, 0.9);" class="weight-600">Make New Friend with Div Forum</p></strong>
            </div>
            <form action="{{ route('login') }}" method="POST" class="ui small form container">
                {{ csrf_field() }}
                <div class="ui stacked segment">
                    <div class="field">
                        <div class="ui left icon input">
                            <i class="user icon"></i>
                            <input type="text" name="email" placeholder="Email Address">
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui left icon input">
                            <i class="lock icon"></i>
                            <input type="password" name="password" placeholder="Password">
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui checkbox">
                            <input name="example" type="checkbox">
                            <label class="weight-600">Remember Me ?</label>
                        </div>
                    </div>
                    <div class="field">
                        <div class="actions">
                            <div class="ui tiny positive right labeled icon button">
                                Log In
                                <i class="checkmark icon"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="ui divider"></div>
        <div class="column">
            <p class="weight-600">Don't have any account ? <a href="">Sign up</a> here !</p>
        </div>
    </div>
</div>

<!-- <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection
