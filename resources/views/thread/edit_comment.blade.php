@extends('layouts.app')
@section('content')
    <div class="ui segments">
        <div class="ui secondary segment">
            <p>Edit Comment</p>
        </div>
        <div class="ui segment">
            <form class="ui form" method="POST" action="{{ route('comment.update', ['comment_id' => $comment->id]) }}">
                {{ csrf_field() }}
                <input type="hidden" value="{{ $comment->thread->id }}" name="thread_id">
                <div class="field">
                    <label>Content</label>
                    <textarea name="content" id="" cols="30" rows="5">{{ $comment ? $comment->content : '' }}</textarea>
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
@endsection