<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Rules\EndsWith;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'phone_number' => 'required|numeric',
            'address' => ['required', new EndsWith('Street')],
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg',
            'dob' => 'required|before:12 years ago',
            'agreement' => 'accepted'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $imageName = RegisterController::setImageName($data['profile_picture']->getClientOriginalExtension());
        RegisterController::moveFile($data['profile_picture'], public_path('profile_picture'), $imageName);

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'address' => $data['address'],
            'profile_picture' => $imageName,
            'dob' => $data['dob'],
            'gender' => $data['gender'],
            'is_admin' => 0
        ]);
    }

    /**
     * Set new image name by the time
     *
     * @param string $extension
     * @return string
     */
    public static function setImageName($extension)
    {
        $imageName = time() . '.' . $extension;
        return $imageName;
    }

    /**
     * Move specified file to specified path
     *
     * @param array $file
     * @param string $path
     * @param string $imageName
     * @return void
     */
    public static function moveFile($file, $path, $imageName)
    {
        $file->move($path, $imageName);
    }
}
