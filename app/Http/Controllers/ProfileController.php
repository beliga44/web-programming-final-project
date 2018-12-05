<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateProfile;
use App\Http\Requests\ChangePassword;
use App\Services\UpdateProfileUserService;
use App\Services\UpdateUserPasswordService;
use App\User;

class ProfileController extends Controller
{

    private $updateProfileUserService;
    private $updateUserPasswordService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UpdateProfileUserService $updateProfileUserService,
                                UpdateUserPasswordService $updateUserPasswordService) 
    {
        $this->updateProfileUserService = $updateProfileUserService;
        $this->updateUserPasswordService = $updateUserPasswordService;
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
        $user = User::find($id);

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
        $user = User::find($id);

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
        $user = User::find($id);

        return view('profile.update', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\UpdateProfilet  $request
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProfile $request)
    {
        $this->updateProfileUserService->update($request->all(), Auth::user());

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
        $this->updateUserPasswordService->update($request->all(), Auth::user());

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

    public function increasePopularity($id, $state)
    {
        $user = User::find($id);

        if ($state == 'positive') {
            $user->positive_popularity += 1;
        } else{
            $user->negative_popularity += 1;
        }
        $user->save();

        return redirect()->route('profile.show', ['id' => $id]);
    }
}
