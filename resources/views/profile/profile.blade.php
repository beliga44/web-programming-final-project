@extends('layouts.app')

@section('content')
	<div class="ui grid">
		<div class="four wide column">
			<div class="ui vertical fluid tabular menu">
				<a class="active item" href="{{ route('profile') }}">
					Bio
				</a>
				<a class="item" href="{{ route('profile/edit') }}">
					Edit Profile
				</a>
				<a class="item">
					Inbox
				</a>
				<a class="item">
					Links
				</a>
			</div>
		</div>
	  	<div class="twelve wide stretched column">
	    	<div class="ui segment">
	    		<div class="ui">
	      			<img class="ui small circular image centered" src="{{ asset('profile_picture/' . Auth::user()->profile_picture) }}">
	      		</div>
	      		<div class="ui two column centered grid">
	      			<div class="row justify aligned">
	      				<div class="column justify aligned">
	      					<p class="profile-name"> {{ Auth::user()->name }} </p>
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
							<a class="ui green image label popup-icon" data-content="Positive popularity">
							    <i class="plus icon"></i>
							    4
							</a>
							<a class="ui red image label popup-icon" data-content="Negative popularity">
							    <i class="minus icon"></i>
							    4
							</a>
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
	  	</div>
	</div>
@endsection