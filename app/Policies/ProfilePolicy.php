<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProfilePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Can edit profile when return true
     *
     * @return boolean
     */
    public function edit($user, $view_user) {
        return $user->id == $view_user->id;
    }

    /**
     * Can give popularity when return false
     *
     * @return boolean
     */
    public function popularity($user, $view_user) {
        return $user->id != $view_user->id;
    }
}
