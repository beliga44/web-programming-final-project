<?php

namespace App\Services;

use App\User;

class UpdateProfileUserService 
{
    
    /**
     * Create new user
     *
     * @param array  $data
     * @param App\User  $user
     * @return string
     */
	public function make(array $data, $user) 
	{
        $imageName;

        if ($this->isNewPhotoUploaded($data)) 
        {
            $imageName = $this->setImageName($this->getExtension($data['profile_picture']));
            $this->moveFile($data['profile_picture'], public_path('profile_picture'), $imageName);
        } else
            $imageName = $user->profile_picture;
        
        $user->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone_number' => $data['phone_number'],
            'address' => $data['address'],
            'dob' => $data['dob'],
            'gender' => $data['gender'],
            'profile_picture' => $imageName,
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
    public function getExtension($data)
    {
    	return $data->getClientOriginalExtension();
    }

    /**
     * Set new image name with current time
     *
     * @param string  $extension
     * @return string
     */
    public function setImageName($extension)
    {
        return time() . '.' . $extension;
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
