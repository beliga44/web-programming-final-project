<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateProfile;
use App\Http\Requests\ChangePassword;

class ProfileController extends Controller
{

    private $updateProfileUserService;
    private $updateUserPasswordService;
    private $userService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified login user.
     *
     * 
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->userService->find($id);

        return view('profile.profile', ['user' => $user]);
    }

    /**
     * Display the change password form.
     *
     * 
     * @return \Illuminate\Http\Response
     */
    public function showChangePasswordForm($id)
    {
        $user = $this->userService->find($id);

        return view('profile.password', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->userService->find($id);

        return view('profile.update', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\UpdateProfile  $request
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProfile $request)
    {
        $this->userService->update($request->all(), Auth::user());

        return redirect()->route('profile.show.update', ['id' => Auth::id()]);
    }

    /**
     * Update the specified password in storage.
     *
     * @param  App\Http\Requests\UpdateProfilet  $request
     * @return \Illuminate\Http\Response
     */
    public function changePassword(ChangePassword $request)
    {
        $this->userService->updatePassword($request->all(), Auth::user());

        return redirect()->route('profile.show.update', ['id' => Auth::id()]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Increase popularity by given state.
     *
     * @param  int  $id
     * @param  string $state
     * @return \Illuminate\Http\Response
     */
    public function increasePopularity($id, $state)
    {
        $user = $this->userService->find($id);
        $this->userService->increasePopularity($user, $state);

        return redirect()->route('profile.show', ['id' => $id]);
    }

    public function inbox($id)
    {
        return view('profile.inbox');
    }
}
