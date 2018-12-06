@extends('layouts.app')

@section('content')
	<div class="ui grid">
		<div class="four wide column">
			<div class="ui vertical fluid tabular menu">
				<a class="item" href="{{ route('profile.show', ['id' => $user->id]) }}">
					Bio
				</a>
				@can('profile-edit', $user)
				<a class="active item" href="{{ route('profile.show.update', ['id' => $user->id]) }}">
					Edit Profile
				</a>
				<a class="item" href="{{ route('profile.show.password', ['id' => $user->id]) }}">
					Change Password
				</a>
				<a class="item" href="{{ route('inbox.show', ['id' => $user->id]) }}">
					Inbox
				</a>
				@endcan
			</div>
		</div>
	  	<div class="twelve wide stretched column">
	    	<div class="ui segment">
	    		<form class="ui form" action="{{ url('profile/' . Auth::user()->id . '/update') }}" method="POST" enctype="multipart/form-data">
		            {{ csrf_field() }}
		            <div class="two column grid">
		                <div class="column">
		                    <div class="required field {{ $errors->has('name') ? 'error' : '' }}">
		                        <label>Name</label>
		                        <input type="text" name="name" placeholder="Name" value="{{ Auth::user()->name }}">
		                        @if ($errors->has('name'))
		                            <div class="ui pointing red basic label">
		                                {{ $errors->first('name') }}
		                            </div>
		                        @endif
							</div>
							<div class="required field {{ $errors->has('email') ? 'error' : '' }}">
								<label>Email Address</label>
								<input type="text" name="email" placeholder="Email Address" value="{{ Auth::user()->email }}">
								@if ($errors->has('email'))
									<div class="ui pointing red basic label">
										{{ $errors->first('email') }}
									</div>
								@endif
							</div>
		                    <div class="required field {{ $errors->has('phone_number') ? 'error' : '' }}">
		                        <label>Phone Number</label>
		                        <input type="text" name="phone_number" placeholder="Phone Number" value="{{ Auth::user()->phone_number }}">
		                        @if ($errors->has('phone_number'))
		                            <div class="ui pointing red basic label">
		                                {{ $errors->first('phone_number') }}
		                            </div>
		                        @endif
		                    </div>
		                    <div class="required field {{ $errors->has('address') ? 'error' : '' }}">
		                        <label>Address</label>
		                        <input type="text" name="address" placeholder="Address" value="{{ Auth::user()->address }}">
		                        @if ($errors->has('address'))
		                            <div class="ui pointing red basic label">
		                                {{ $errors->first('address') }}
		                            </div>
		                        @endif
		                    </div>
		                    <div class="required field {{ $errors->has('dob') ? 'error' : '' }}">
		                        <label>Birthday</label>
		                        <input type="date" name="dob" placeholder="Birthday" value="{{ Auth::user()->dob }}">
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
		                                        <input name="gender" type="radio" value="1" {{ Auth::user()->gender == 1 ? 'checked' : '' }}>
		                                        <label>Male</label>
		                                    </div>
		                                </div>
		                                <div class="field">
		                                    <div class="ui radio checkbox">
		                                        <input name="gender" type="radio" value="0" {{ Auth::user()->gender == 0 ? 'checked' : '' }}>
		                                        <label>Female</label>
		                                    </div>
		                                </div>
		                            </div>
		                        </div>
		                    </div>
		                    <div class="field {{ $errors->has('profile_picture') ? 'error' : '' }}">
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
		                <button type="submit" class="ui large primary button" name="submit">Save</button>
		            </div>
		        </form>
	  		</div>
	  	</div>
	</div>
@endsection
