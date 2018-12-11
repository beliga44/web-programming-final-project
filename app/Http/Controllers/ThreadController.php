<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreThread;
use App\Services\ThreadService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ThreadController extends Controller
{
    //
    private $threadService;

    public function __construct(ThreadService $threadService)
    {
        $this->threadService = $threadService;
    }

    public function create() {
        return view('thread.form');
    }

    public function store(StoreThread $request) {
        $this->threadService->make($request->all(), Auth::user());

        return back();
    }
}
