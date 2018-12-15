@extends('layouts.app')
@section('content')
    <div class="ui grid">
        <div class="four wide column"></div>
        <div class="eight wide column">
            <h3>Form Thread</h3>
            <form class="ui form" method="POST" action="{{ route('thread.save') }}">
                {{ csrf_field() }}
                <input type="hidden" name="mode" value="{{ $mode }}">
                <input type="hidden" name="thread_id" value="{{ $thread ? $thread->id : null }}">
                <div class="field">
                    <label>Name</label>
                    <input type="text" name="name" placeholder="Name" value="{{ $thread ? $thread->name : null }}">
                    @if ($errors->has('name'))
                        <div class="ui red message">
                            <p>{{ $errors->first('name') }}</p>
                        </div>
                    @endif
                </div>
                <div class="field">
                    <label>Category</label>
                    <select class="ui search dropdown" name="category_id" autocomplete="off">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $thread ? $category->id == $thread->category_id ? 'selected' : '' : null }} >{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="field">
                    <label>Description</label>
                    <input type="text" name="description" placeholder="Description" value="{{ $thread ? $thread->description : null }}">
                </div>
                <button class="ui primary button" type="submit">Submit</button>
            </form>
        </div>
        <div class="four wide column"></div>
    </div>
@endsection