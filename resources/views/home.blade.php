@extends('layouts.app')
@section('content')
    <div class="ui container form-list-padding">
        @foreach($users as $user)
            <div>
                <a href="{{ route('profile.show', ['id' => $user->id]) }}">{{ $user->name }}</a>
            </div>
        @endforeach
        @can('create', App\Thread::class)
            <a class="circular ui primary labeled icon button" href="{{ route('thread.create') }}">
                <i class="add icon"></i>
                New Thread
            </a>
        @endcan
        @foreach($threads as $thread)
            <div class="ui segments">
                <div class="ui segment">
                    <div>
                        <span class="thread-name-text">{{ $thread->name }}</span>
                        <a class="ui {{$thread->is_closed == true ? 'red' : 'green'}} label" style="margin-left: 1.3%">
                            {{$thread->is_closed == true ? 'Closed' : 'Open'}}
                        </a>
                    </div>
                    <div>
                        <span>Category : </span><span>{{ $thread->category->name }}</span>
                    </div>
                    <div>
                        <span>Posted at : </span> <span>{{ $thread->formatted_date }}</span>
                    </div>
                </div>
                <div class="ui secondary segment">
                    <p>{{ $thread->description }}</p>
                </div>
            </div>
        @endforeach
        <div class="ui center aligned container">
            {{ $threads->links() }}
        </div>
    </div>
@endsection