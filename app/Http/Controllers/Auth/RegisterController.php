<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Requests\StoreRegisterUser;
use Illuminate\Auth\Events\Registered;
use App\Services\RegisterUserService;

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
    protected $registerUserService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(RegisterUserService $registerUserService)
    {
        $this->middleware('guest');
        $this->registerUserService = $registerUserService;
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
            // Check on App\Http\Requests
        ]);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  App\Http\Requests\StoreRegisterUser  $request
     * @return \Illuminate\Http\Response
     */
    protected function register(StoreRegisterUser $request) 
    {
        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return $this->registerUserService->make($data);
    }

}
