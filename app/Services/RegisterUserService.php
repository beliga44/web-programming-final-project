<?php

namespace App\Services;

use App\User;

class RegisterUserService 
{
    /**
     * Create new user
     *
     * @param array $data
     * @param string $imageName
     * @return string
     */
	public function make(array $data) 
	{
	 	$imageName = $this->setImageName($this->getExtension($data['profile_picture']));
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
     * Set new image name with current time
     *
     * @param string $extension
     * @return string
     */
    public function getExtension($data)
    {
    	return $data->getClientOriginalExtension();
    }

    /**
     * Set new image name with current time
     *
     * @param string $extension
     * @return string
     */
    public function setImageName($extension)
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
