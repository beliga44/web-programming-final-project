@extends('layouts.app')

@section('content')
    <h3 class="ui header">Master Thread</h3>
    {{--<a class="circular ui primary labeled icon button" href="{{ route('thread.create') }}">--}}
        {{--<i class="add icon"></i>--}}
        {{--Add Thread--}}
    {{--</a>--}}
    <table class="ui orange celled table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Category</th>
                <th>Owner</th>
                <th>Description</th>
                <th>Status</th>
                <th colspan="2" class="center aligned">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($threads as $thread)
            <tr>
                <td data-label="Name">{{ $thread->name }}</td>
                <td data-label="Age">{{ $thread->category->name }}</td>
                <td data-label="Job">{{ $thread->poster->name }}</td>
                <td data-label="Job">{{ $thread->description }}</td>
                <td data-label="Job">{{ $thread->is_closed == true ? 'Close' : 'Open' }}</td>
                <td data-label="Job" class="center aligned">
                    <a class="ui tiny orange labeled icon {{ $thread->is_closed == true ? 'disabled' : '' }} button" href="{{ route('thread.close', ['thread_id' => $thread->id]) }}">
                        <i class="close icon"></i>
                        Close
                    </a>
                </td>
                <td class="center aligned">
                    <a class="ui tiny red labeled icon button" href="{{ route('thread.delete', ['thread_id' => $thread->id]) }}">
                        <i class="trash icon"></i>
                        Delete
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="ui center aligned container">
        {{ $threads->links() }}
    </div>
@endsection