@extends('layouts.app')
@section('content')
    <div class="ui container history-list-padding">
        @foreach($threads as $thread)
            <div class="ui segments">
                <div class="ui segment">
                    <div class="ui container">
                        <span class="thread-name-text">{{ $thread->name }}</span>
                    </div>
                </div>
                <div class="ui segment">
                    <div class="right floated column">
                        <div class="column history-action-display">
                        @if($thread->is_closed == 0)
                            <a class="ui tiny orange labeled icon button" href="{{ route('thread.edit', ['thread_id' => $thread->id]) }}">
                                <i class="edit icon"></i>
                                Edit
                            </a>
                            <a class="ui tiny red labeled icon button" href="{{ route('thread.history', ['thread_id' => $thread->id]) }}">
                                <i class="close icon"></i>
                                Close
                            </a>
                        @else
                            <p>No Actions</p>
                        @endif
                        </div>
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