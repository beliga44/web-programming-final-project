@extends('layouts.app')
@section('content')
    <h3 class="ui header">Master User</h3>
    <a class="circular ui primary labeled icon button" href="{{ route('user.create') }}">
    <i class="add icon"></i>
    Add User
    </a>
    <table class="ui orange celled table">
        <thead>
        <tr>
            <th>Photo</th>
            <th>Name</th>
            <th>Role</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Birthday</th>
            <th>Gender</th>
            <th colspan="2" class="center aligned">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td data-label="Photo">
                    <img class="ui mini circular image" src="{{ asset('/profile_picture/' . $user->profile_picture) }}">
                </td>
                <td data-label="Name">{{ $user->name }}</td>
                <td data-label="Role">{{ $user->is_admin == true ? 'Admin' : 'Member' }}</td>
                <td data-label="Email">{{ $user->email }}</td>
                <td data-label="Phone">{{ $user->phone_number }}</td>
                <td data-label="Address">{{ $user->address }}</td>
                <td data-label="Birthday">{{ $user->formatted_birthday }}</td>
                <td data-label="Gender">{{ $user->formatted_gender }}</td>
                <td data-label="Job" class="center aligned">
                    <a class="ui tiny orange labeled icon button" href="{{ route('user.edit', ['user_id' => $user->id]) }}">
                        <i class="edit icon"></i>
                        Edit
                    </a>
                </td>
                <td class="center aligned">
                    <a class="ui tiny red labeled icon button" href="{{ route('user.delete', ['user_id' => $user->id]) }}">
                        <i class="trash icon"></i>
                        Delete
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="ui center aligned container">
        {{ $users->links() }}
    </div>
@endsection