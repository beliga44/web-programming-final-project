@extends('layouts.app')
@section('content')
    <h3 class="ui header">Master Category</h3>
    <div class="ui segment">
        <form class="ui form" method="POST" action="{{ route('category.store') }}">
            {{ csrf_field() }}
            <div class="field">
                <label>Name</label>
                <input type="text" name="name" placeholder="Name">
                @if ($errors->has('name'))
                    <div class="ui pointing red basic label">
                        {{ $errors->first('name') }}
                    </div>
                @endif
            </div>
            <button class="ui button" type="submit">Submit</button>
        </form>
    </div>


    <table class="ui orange celled table">
        <thead>
        <tr>
            <th>Name</th>
            <th colspan="2" class="center aligned">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <td data-label="Name">{{ $category->name }}</td>
                <td data-label="Job" class="center aligned">
                    <a class="ui tiny orange labeled icon button" href="{{ route('category.edit', ['category_id' => $category->id]) }}">
                        <i class="edit icon"></i>
                        Edit
                    </a>
                </td>
                <td class="center aligned">
                    <a class="ui tiny red labeled icon button" href="{{ route('category.delete', ['category_id' => $category->id]) }}">
                        <i class="trash icon"></i>
                        Delete
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection