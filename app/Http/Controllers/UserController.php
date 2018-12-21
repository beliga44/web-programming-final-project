<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveUser;
use App\Http\Requests\StoreRegisterUser;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Show user view master.
     *
     * @return View
     */
    public function showMaster() {
        $users = $this->userService->allWithPaginate(5);

        return view('auth.master', ['users' => $users]);
    }

    /**
     * Show specified user view master.
     *
     * @return View
     */
    public function edit($user_id) {
        $user = $this->userService->find($user_id);

        return view('auth.form', ['mode' => 'Update', 'user' => $user]);
    }

    public function save(SaveUser $request) {
        $this->userService->save($request->all());

        return back();
    }

    public function create() {
        return view('auth.form', ['mode' => 'Create', 'user' => null]);
    }

    public function destroy($user_id) {
        $this->userService->destroy($user_id);

        return back();
    }
}
