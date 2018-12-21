<?php

namespace App\Http\Controllers;

use App\Services\ThreadService;
use App\Thread;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

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
        $keyword = Input::get('keyword');
        $service = $this->threadService;
        $threads = null;
//        if (!empty($keyword)) {
//            $threads = $service->paginate($service->search($keyword), 5);
//        } else {
//            $threads = $service->paginate($service->orderByCreatedAt($service->all(), 'desc'), 5);
//        }
        $threads = $service->paginate($service->search($keyword), 5);

        return view('home', ['threads' => $threads]);
    }
}
