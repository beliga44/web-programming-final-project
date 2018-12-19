@extends('layouts.app')
@section('content')
    <h3 class="ui header">Edit Category</h3>
    <div class="ui segment">
        <form class="ui form" method="POST" action="{{ route('category.update', ['category_id' => $category->id]) }}">
            {{ csrf_field() }}
            <input type="hidden" name="is_master" value="true">
            <div class="field">
                <label>Name</label>
                <input type="text" name="name" placeholder="Name" value="{{ $category->name }}">
                @if ($errors->has('name'))
                    <div class="ui pointing red basic label">
                        {{ $errors->first('name') }}
                    </div>
                @endif
            </div>
            <button class="ui button" type="submit">Submit</button>
        </form>
    </div>
@endsection