@extends('layouts.app')

@section('content')
	<div class="ui grid">
		<div class="four wide column">
			<div class="ui vertical fluid tabular menu">
				<a class="active item" href="{{ route('profile.show', ['id' => $user->id]) }}">
					Bio
				</a>
				@can('profile-edit', $user)
				<a class="item" href="{{ route('profile.show.update', ['id' => $user->id]) }}">
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
	    		<div class="ui">
	      			<img class="ui small circular image centered" src="{{ asset('profile_picture/' . $user->profile_picture) }}">
	      		</div>
	      		<div class="ui two column centered grid">
	      			<div class="row justify aligned">
	      				<div class="column justify aligned">
	      					<p class="profile-name"> {{ $user->name }} </p>
	      				</div>
	      			</div>
	      			<div class="row justify aligned">
	      				<div class="column justify aligned">
							<a class="ui image label popup-icon" data-content="Post">
								<i class="file icon"></i>
								4
							</a>
	      					<a class="ui image label popup-icon" data-content="Inbox">
								<i class="mail icon"></i>
								1
							</a>
						@can('profile-popularity', $user)
							<a class="ui green image label popup-icon" data-content="Positive popularity" href="{{ route('profile.popularity', ['id' => $user->id, 'popularity' => 'positive']) }}">
							    <i class="plus icon"></i>
							    {{ $user->positive_popularity }}
							</a>
							<a class="ui red image label popup-icon" data-content="Negative popularity" href="{{ route('profile.popularity', ['id' => $user->id, 'popularity' => 'negative']) }}">
							    <i class="minus icon"></i>
								{{ $user->negative_popularity }}
							</a>
						@endcan
	      				</div>
	      			</div>
	      			<div class="row justify aligned">
	      				<div class="column justify aligned">
					  		<p> Experience over everything </p>
				  			<p> -Just do it ! </p>
	      				</div>
	      			</div>
				</div>
	  		</div>
			<div class="ui segments">
				<div class="ui segment">
					<p><strong>Send Something to {{ $user->name }}</strong></p>
				</div>
				<form class="ui form" method="POST" action="{{ route('inbox.send', ['id' => $user->id]) }}">
					{{ csrf_field() }}
					<div class="ui segment">
						<div class="ui form">
							<div class="field">
								<textarea rows="2" name="message"></textarea>
							</div>
							@if ($errors->has('message'))
								<div class="ui red message">
									<p>{{ $errors->first('message') }}</p>
								</div>
							@endif
						</div>
					</div>
					<div class="ui right aligned segment">
						<button type="submit" class="ui primary labeled icon button">
							<i class="send icon"></i>
							Send Message
						</button>
					</div>
				</form>
			</div>
	  	</div>
	</div>
@endsection