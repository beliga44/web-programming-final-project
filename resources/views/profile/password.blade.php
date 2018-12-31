@extends('layouts.app')

@section('content')
	<div class="ui grid">
		@include('profile.sidebar')
	  	<div class="twelve wide stretched column">
	    	<div class="ui segment">
	    		<form class="ui form" action="{{ url('profile/' . Auth::user()->id . '/password') }}" method="POST" enctype="multipart/form-data">
		            {{ csrf_field() }}
		            <div class="two column grid">
		                <div class="column">
		                    <div class="required field {{ $errors->has('old_password') ? 'error' : '' }}">
		                        <label>Old Password</label>
		                        <input type="password" name="old_password" placeholder="Old Password">
		                        @if ($errors->has('old_password'))
		                            <div class="ui pointing red basic label">
		                                {{ $errors->first('old_password') }}
		                            </div>
		                        @endif
							</div>
							<div class="required field {{ $errors->has('new_password') ? 'error' : '' }}">
								<label>New Password</label>
								<input type="password" name="new_password" placeholder="New Password">
								@if ($errors->has('new_password'))
									<div class="ui pointing red basic label">
										{{ $errors->first('new_password') }}
									</div>
								@endif
							</div>
		                    <div class="required field">
		                        <label>Confirm New Password</label>
		                        <input type="password" name="password_confirmation" placeholder="Confirm New Password">
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
