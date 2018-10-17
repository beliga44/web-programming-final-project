<?php

namespace App\Services;

use App\User;
use App\Services\Interfaces\UploadableInterface;
use App\Services\Interfaces\HandleableUploadInterface;

class UpdateProfileUserService implements UploadableInterface, HandleableUploadInterface
{
    /**
     * Update profile for specified user
     *
     * @param array  $data
     * @param App\User  $user
     * @return string
     */
	public function update(array $data, $user) 
	{
        $imageName;

        if ($this->isNewPhotoUploaded($data)) {
            $imageName = $this->getImageName($data['profile_picture']);
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
     * @param array  $file
     * @return boolean
     */
    public function hasUploadNewFile($file)
    {
        return array_key_exists('profile_picture', $file);
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
    public function getImageName($extension)
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
