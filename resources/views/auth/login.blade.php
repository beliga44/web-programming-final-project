@extends('layouts.app')
@section('content')
<div class="ui middle aligned center aligned grid bg-white">
    <div class="seven wide column">
        <div class="column">
            <img class="ui fluid rounded image" src="{{asset('img/Optimized-log-in.jpg')}}">
        </div>
    </div>
    <div class="five wide column">
        <div class="column">
            <div class="ui left aligned container">
                <strong><p class="weight-600 style-motto">Make New Friend with Div Forum</p></strong>
            </div>
            <form action="{{ route('login') }}" method="POST" class="ui small form container">
                {{ csrf_field() }}
                <div class="ui stacked segment">
                    <div class="field">
                        <div class="ui left icon input">
                            <i class="user icon"></i>
                            <input type="text" name="email" placeholder="Email Address">
                        </div>
                        @if ($errors->has('email'))
                            <div class="ui pointing red basic label">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>
                    <div class="field">
                        <div class="ui left icon input">
                            <i class="lock icon"></i>
                            <input type="password" name="password" placeholder="Password">
                        </div>
                        @if ($errors->has('password'))
                            <div class="ui pointing red basic label">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                    </div>
                    <div class="field">
                        <div class="ui checkbox">
                            <input name="remember" type="checkbox">
                            <label class="weight-600">Remember Me ?</label>
                        </div>
                    </div>
                    <div class="field">
                        <div class="actions">
                            <button type="submit" class="ui tiny positive right labeled icon button">
                                Log In
                                <i class="checkmark icon"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="ui divider"></div>
        <div class="column">
            <p class="weight-600">Don't have any account ? <a href="{{ url('/register') }}" >Sign up</a> here !</p>
        </div>
    </div>
</div>
@endsection
