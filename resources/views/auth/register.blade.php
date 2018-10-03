@extends('layouts.app')

@section('content')
<div class="ui container sign-up-form">
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
        <div class="ui tiny red black deny button">
            Cancel
        </div>
        <div class="ui tiny positive right labeled icon button">
            Sign Up
            <i class="checkmark icon"></i>
        </div>
    </div>
</div>

<!-- <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

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
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection
