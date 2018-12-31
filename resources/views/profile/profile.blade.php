@extends('layouts.app')

@section('content')
	<div class="ui grid">
		@include('profile.sidebar')
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
						@cannot('profile-popularity', $user)
							<a class="ui image green label popup-icon" data-content="Post">
								<i class="file icon"></i>
								{{ $user->count_posted_thread }}
							</a>
	      					<a class="ui image blue label popup-icon" data-content="Inbox">
								<i class="mail icon"></i>
								{{ $user->count_message }}
							</a>
						@endcannot
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
			@can('profile-inbox', $user)
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
			@endcan
	  	</div>
	</div>
@endsection