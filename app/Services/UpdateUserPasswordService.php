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
    
    /**
     * Check if there is uploaded photo
     *
     * @param array  $data
     * @return boolean
     */
    public function isNewPhotoUploaded($data)
    {
        return array_key_exists('profile_picture', $data);
    }

    /**
     * Set new image name with current time
     *
     * @param string  $extension
     * @return string
     */
    public function getExtension($file)
    {
        return $file->getClientOriginalExtension();
    }

    /**
     * Set new image name with current time
     *
     * @param string  $extension
     * @return string
     */
    public function getImageName($file)
    {
        return time() . '.' . $this->getExtension($file);
    }

    /**
     * Move specified file to specified path
     *
     * @param array  $file
     * @param string  $path
     * @param string  $imageName
     * @return void
     */
    public function moveFile($file, $path, $imageName)
    {
        $file->move($path, $imageName);
    }
    
}
