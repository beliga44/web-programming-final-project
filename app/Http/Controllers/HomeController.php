<?php

namespace App\Http\Controllers;

use App\Services\ThreadService;
use App\Thread;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    private $threadService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ThreadService $threadService)
    {
        $this->threadService = $threadService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service = $this->threadService;
        $users = User::all();
        $threads = $service->paginate($service->orderBy($service->all(), 'desc'), 5);

        return view('home', ['users' => $users, 'threads' => $threads]);
    }
}
