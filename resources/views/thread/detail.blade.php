@extends('layouts.app')
@section('content')
    <div class="ui segments">
        <div class="ui secondary segment">
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
            <div>
                <span>Description : </span>
                <br>
                <span>{{ $thread->description }}</span>
            </div>
            <br>
            <div class="ui fluid category search">
                <form class="ui middle aligned icon input search-bar"
                      data-content="Press &quot;Enter&quot; to search"
                      action="{{ route('thread.detail', ['thread_id' => $thread->id]) }}">
                    <i class="ui icon search"></i>
                    <input placeholder="Search Content or TS" type="text" name="keyword">
                </form>
            </div>
        </div>
        <div class="ui segment">
            @if($is_empty == false)
                @foreach($comments as $comment)
                <div class="ui segments">
                    <div class="ui secondary segment">
                        <p>
                            <a href="{{ route('profile.show', ['user_id' => $comment->user->id]) }}">{{ $comment->user->name }}</a>
                        </p>
                        <p>{{ $comment->user->is_admin == 0 ? 'Member' : 'Admin' }}</p>
                        <p>{{ $comment->formatted_date }}</p>
                        @can('viewAction', $comment)
                            <div>
                                <a class="ui tiny orange labeled icon button" href="{{ route('comment.edit', ['comment_id' => $comment->id]) }}">
                                    <i class="edit icon"></i>
                                    Edit
                                </a>
                                <a class="ui tiny red labeled icon button" href="{{ route('comment.delete', ['comment_id' => $comment->id]) }}">
                                    <i class="trash icon"></i>
                                    Delete
                                </a>
                            </div>
                        @endcan
                    </div>
                    <div class="ui segment">
                        <p>{{ $comment->content }}</p>
                    </div>
                </div>
                @endforeach
            @else
                <h3>This forum doesn’t have any comment</h3>
            @endif
        </div>
    </div>
    @can('viewFormComment', $thread)
        <div class="ui segments">
            <div class="ui secondary segment">
                <p>Post New Comment</p>
            </div>
            <div class="ui segment">
                <form class="ui form" action="{{ route('comment.store') }}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                    <input type="hidden" name="thread_id" value="{{ $thread->id }}">
                    <div class="field">
                        <label>Content</label>
                        <textarea name="content" id="" cols="30" rows="5"></textarea>
                        @if ($errors->has('content'))
                            <div class="ui pointing red basic label">
                                {{ $errors->first('content') }}
                            </div>
                        @endif
                    </div>
                    <button class="ui primary button" type="submit">Comment</button>
                </form>
            </div>
        </div>
    @endcan
@endsection
