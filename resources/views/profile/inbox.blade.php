@extends('layouts.app')

@section('content')
    @foreach($messages as $message)
    <div class="ui segments">
        <div class="ui segment">
            <div class="thread-title-flex">
                <p><strong>{{ $message->senderUser->name }}</strong></p>
            </div>
            <div>
                <span>Send at : </span> <span>{{ $message->formatted_date }}</span>
            </div>
        </div>
        <div class="ui secondary segment">
            <p>{{ $message->content }}</p>
        </div>
        <div class="ui right aligned segment">
            <form action="{{ route('inbox.delete', ['message_id' => $message->id, 'receiver_id' => $message->receiverUser->id]) }}" method="POST">
                {{ csrf_field() }}
                <button type="submit" class="negative ui labeled icon button">
                    <i class="trash icon"></i>
                    Delete Message
                </button>
            </form>
        </div>
    </div>
    @endforeach
    <div class="ui center aligned container">
        {{ $messages->links() }}
    </div>
@endsection
