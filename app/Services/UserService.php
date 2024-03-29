<?php
/**
 * Created by PhpStorm.
 * User: IG17-1
 * Date: 06/12/2018
 * Time: 8:59
 */

namespace App\Services;

use App\User;
use App\Services\Handlers\HandleImageUpload;

class UserService
{
    use HandleImageUpload;

    /**
     * Find specified user by Id
     *
     * @param  integer $id
     * @return User
     */
    public function find($id) {
        return User::find($id);
    }

    public function allWithPaginate($limit) {
        return User::paginate($limit);
    }

    /**
     * Increase popularity by given state.
     *
     * @param  User  $user
     * @param  string $state
     * @return void
     */
    public function increasePopularity(User $user, $state) {
        if ($state == 'positive') {
            $user->increment('positive_popularity');
            return;
        }

        $user->increment('negative_popularity');
    }

    /**
     * Create new user
     *
     * @param array $data
     * @return string
     */
    public function make(array $data) {
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

    public function save(array $data) {
        if ($data['mode'] == 'Update') {
            $imageName = null;

            if ($this->hasUploadNewFile($data)) {
                $imageName = $this->getImageName($this->getExtension($data['profile_picture']));
                $this->moveFile($data['profile_picture'], public_path('profile_picture'), $imageName);
            } else {
                $imageName = User::find($data['user_id'])->profile_picture;
            }

            return User::find($data['user_id'])
                ->update([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'password' => bcrypt($data['password']),
                    'address' => $data['address'],
                    'profile_picture' => $imageName,
                    'phone_number' => $data['phone_number'],
                    'dob' => $data['dob'],
                    'gender' => $data['gender'],
                    'is_admin' => $data['is_admin']
                ]);
        } else {
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
                'is_admin' => $data['is_admin']
            ]);
        }
    }

    /**
     * Update profile for specified user
     *
     * @param array  $data
     * @param App\User  $user
     * @return string
     */
    public function update(array $data, $user) {
        $imageName = null;

        if ($this->hasUploadNewFile($data)) {
            $imageName = $this->getImageName($this->getExtension($data['profile_picture']));
            $this->moveFile($data['profile_picture'], public_path('profile_picture'), $imageName);
        } else {
            $imageName = $user->profile_picture;
        }

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

    public function destroy($id) {
        User::destroy($id);
    }

}
