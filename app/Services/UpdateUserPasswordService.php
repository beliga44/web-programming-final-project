<?php

namespace App\Services;

use App\User;

class UpdateUserPasswordService 
{
    
    /**
     * Update password for specified user
     *
     * @param array  $data
     * @param App\User  $user
     * @return string
     */
    public function update(array $data, $user) 
    {
        $user->update([
            'password' => bcrypt($data['new_password'])
        ]);
    }
    
}
