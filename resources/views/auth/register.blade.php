@extends('layouts.app')
@section('content')
<div class="ui middle aligned grid bg-white">
    <div class="ui container bg-white mt-content mb-content">
        <div class="header">
            <strong><p class="weight-600 style-motto">Join and Get New Experience in Div Forum</p></strong>
        </div>   
        <div class="ui divider"></div>
        <form class="ui form" action="{{ url('/register') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="two column grid">
                <div class="column">
                    <div class="required field {{ $errors->has('name') ? 'error' : '' }}">
                        <label>Name</label>
                        <input type="text" name="name" placeholder="Name">
                        @if ($errors->has('name'))
                            <div class="ui pointing red basic label">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                    </div>
                    <div class="required field {{ $errors->has('email') ? 'error' : '' }}">
                        <label>Email Address</label>
                        <input type="text" name="email" placeholder="Email Address">
                        @if ($errors->has('email'))
                            <div class="ui pointing red basic label">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>
                    <div class="two fields">
                        <div class="required field {{ $errors->has('password') ? 'error' : '' }}">
                            <label>Password</label>
                            <input type="password" name="password">
                            @if ($errors->has('password'))
                                <div class="ui pointing red basic label">
                                    {{ $errors->first('password') }}
                                </div>
                            @endif
                        </div>
                        <div class="required field">
                            <label>Confirm Password</label>
                            <input type="password" name="password_confirmation">
                        </div>
                    </div>
                    <div class="required field {{ $errors->has('phone_number') ? 'error' : '' }}">
                        <label>Phone Number</label>
                        <input type="text" name="phone_number" placeholder="Phone Number">
                        @if ($errors->has('phone_number'))
                            <div class="ui pointing red basic label">
                                {{ $errors->first('phone_number') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="column">
                    <div class="required field {{ $errors->has('address') ? 'error' : '' }}">
                        <label>Address</label>
                        <input type="text" name="address" placeholder="Address">
                        @if ($errors->has('address'))
                            <div class="ui pointing red basic label">
                                {{ $errors->first('address') }}
                            </div>
                        @endif
                    </div>
                    <div class="required field {{ $errors->has('dob') ? 'error' : '' }}">
                        <label>Birthday</label>
                        <input type="date" name="dob" placeholder="Birthday">
                        @if ($errors->has('dob'))
                            <div class="ui pointing red basic label">
                                {{ $errors->first('dob') }}
                            </div>
                        @endif
                    </div>
                    <div class="fields">
                        <div class="required field">
                            <label>Gender</label>
                            <div class="inline fields">
                                <div class="field">
                                    <div class="ui radio checkbox">
                                        <input name="gender" checked="checked" type="radio" value="1">
                                        <label>Male</label>
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="ui radio checkbox">
                                        <input name="gender" type="radio" value="0">
                                        <label>Female</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="required field {{ $errors->has('profile_picture') ? 'error' : '' }}">
                        <label>Photo</label>
                        <input type="file" name="profile_picture">
                        @if ($errors->has('profile_picture'))
                            <div class="ui pointing red basic label">
                                {{ $errors->first('profile_picture') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="ui left aligned mt-content form {{ $errors->has('agreement') ? 'error' : '' }}">
                <div class="ui checkbox">
                    <input name="agreement" type="checkbox" class="error">
                    <label>By registering to this website. I agree term and condition</label>
                </div>
                <div class="ui error message">
                    <div class="header">Oops! There's something wrong </div>
                    @if ($errors->has('agreement'))
                        <p>{{ $errors->first('agreement') }}</p>
                    @endif
                    
                </div>
            </div>
            <div class="ui left aligned mt-content">
                <button type="submit" class="ui large primary button" name="submit">
                    Join Us !
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
