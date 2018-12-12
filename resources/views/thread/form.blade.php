@extends('layouts.app')

@section('content')
    <div class="ui grid">
        <div class="four wide column"></div>
        <div class="eight wide column">
            <h3>Thread</h3>
            <form class="ui form" method="POST" action="{{ route('thread.store') }}">
                {{ csrf_field() }}
                <div class="field">
                    <label>Name</label>
                    <input type="text" name="name" placeholder="Name">
                </div>
                <div class="field">
                    <label>Category</label>
                    <select class="ui search dropdown" name="category_id">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="field">
                    <label>Description</label>
                    <input type="text" name="description" placeholder="Description">
                </div>
                <button class="ui primary button" type="submit">Submit</button>
            </form>
        </div>
        <div class="four wide column"></div>
    </div>
@endsection