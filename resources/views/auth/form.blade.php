@extends('layouts.app')
@section('content')
    <div class="ui middle aligned grid bg-white">
        <div class="ui container mt-content mb-content">
            <div class="header">
                <strong><p class="weight-600 style-motto">{{ $mode }} User</p></strong>
            </div>
            <div class="ui divider"></div>
                <form class="ui form" action="{{ route('user.save')}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="mode" value="{{ $mode }}">
                <input type="hidden" name="user_id" value="{{ $user ? $user->id : null }}">
                <div class="two column grid">
                    <div class="column">
                        <div class="required field {{ $errors->has('name') ? 'error' : '' }}">
                            <label>Name</label>
                            <input type="text" name="name" placeholder="Name" value="{{ $user ? $user->name : null }}">
                            @if ($errors->has('name'))
                                <div class="ui pointing red basic label">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                        </div>
                        <div class="field">
                            <label>Role</label>
                            <select class="ui search dropdown" name="is_admin" autocomplete="off">
                                <option value="0" {{ $user ? $user->is_admin == 0 ? 'selected' : '' : null }}>Member</option>
                                <option value="1" {{ $user ? $user->is_admin == 1 ? 'selected' : '' : null }}>Admin</option>
                            </select>
                        </div>
                        <div class="required field {{ $errors->has('email') ? 'error' : '' }}">
                            <label>Email Address</label>
                            <input type="text" name="email" placeholder="Email Address" value="{{ $user ? $user->email : null }}">
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
                            <input type="text" name="phone_number" placeholder="Phone Number" value="{{ $user ? $user->phone_number : null }}">
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
                            <input type="text" name="address" placeholder="Address" value="{{ $user ? $user->address : null }}">
                            @if ($errors->has('address'))
                                <div class="ui pointing red basic label">
                                    {{ $errors->first('address') }}
                                </div>
                            @endif
                        </div>
                        <div class="required field {{ $errors->has('dob') ? 'error' : '' }}">
                            <label>Birthday</label>
                            <input type="date" name="dob" placeholder="Birthday" value="{{ $user ? $user->dob : null }}">
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
                <div class="ui left aligned mt-content">
                    <button type="submit" class="ui large primary button" name="submit">
                        {{ $mode }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection