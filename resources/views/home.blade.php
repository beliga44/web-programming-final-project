@extends('layouts.app')
@section('content')
    <div class="ui container form-list-padding">
        @foreach($users as $user)
            {{--<div class="ui segments">--}}
                {{--<div class="ui segment">--}}
                    {{--<div class="thread-title-flex">--}}
                        {{--<p>Is Elon Musk Pedo ?</p>--}}
                    {{--</div>--}}
                    {{--<div>--}}
                        {{--<span>Category : </span><span>Science</span>--}}
                    {{--</div>--}}
                    {{--<div>--}}
                        {{--<span>Posted at : </span> <span>04 Sep 2018 13:12:10</span>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="ui secondary segment">--}}
                    {{--<p>Discuss about Elon Musk</p>--}}
                {{--</div>--}}
            {{--</div>--}}
            <div>
                <a href="{{ route('profile.show', ['id' => $user->id]) }}">{{ $user->name }}</a>
            </div>
        @endforeach
    </div>
@endsection