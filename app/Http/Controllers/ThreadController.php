<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\StoreThread;
use App\Services\CategoryService;
use App\Services\ThreadService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ThreadController extends Controller
{
    //
    private $threadService;
    private $categoryService;

    public function __construct(ThreadService $threadService, CategoryService $categoryService)
    {
        $this->threadService = $threadService;
        $this->categoryService = $categoryService;
    }

    public function create() {
        $categories = $this->categoryService->all();

        return view('thread.form', ['categories' => $categories]);
    }

    public function store(StoreThread $request) {
        $this->threadService->make($request->all(), Auth::user());

        return back();
    }
}
