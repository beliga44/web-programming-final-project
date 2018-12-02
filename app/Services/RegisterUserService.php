<?php

namespace App\Services;

use App\User;
use App\Services\Interfaces\HandleableUploadInterface;

class RegisterUserService implements HandleableUploadInterface
{
    /**
     * Create new user
     *
     * @param array $data
     * @return string
     */
	public function make(array $data) 
	{
	 	$imageName = $this->getImageName($this->getExtension($data['profile_picture']));
        $this->moveFile($data['profile_picture'], public_path('profile_picture'), $imageName);

		return User::create([
			'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'address' => $data['address'],
            'profile_picture' => $imageName,
            'phone_number' => $data['phone_number'],
            'dob' => $data['dob'],
            'gender' => $data['gender'],
            'is_admin' => 0
		]);
	}

    /**
     * Get file extension
     *
     * @param string $file
     * @return string
     */
    public function getExtension($file)
    {
    	return $file->getClientOriginalExtension();
    }

    /**
     * Get new image name with current time
     *
     * @param string $extension
     * @return string
     */
    public function getImageName($extension)
    {
        return time() . '.' . $extension;
    }

    /**
     * Move specified file to specified path
     *
     * @param array $file
     * @param string $path
     * @param string $imageName
     * @return void
     */
    public function moveFile($file, $path, $imageName)
    {
        $file->move($path, $imageName);
    }
}
