<div class="four wide column">
    <div class="ui vertical fluid tabular menu">
        <a class="{{Request::is('profile/'. $user->id) ? 'active' : '' }} item" href="{{ route('profile.show', ['id' => $user->id]) }}">
            Bio
        </a>
        @can('profile-edit', $user)
            <a class="{{Request::is('profile/update/*') ? 'active' : ''}} item" href="{{ route('profile.show.update', ['id' => $user->id]) }}">
                Edit Profile
            </a>
            <a class="{{Request::is('profile/password/*') ? 'active' : ''}} item" href="{{ route('profile.show.password', ['id' => $user->id]) }}">
                Change Password
            </a>
            <a class="item" href="{{ route('inbox.show', ['id' => $user->id]) }}">
                Inbox
            </a>
        @endcan
    </div>
</div>