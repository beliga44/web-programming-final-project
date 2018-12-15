<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\StoreThread;
use App\Services\CategoryService;
use App\Services\ThreadService;
use App\Thread;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ThreadController extends Controller
{
    private $threadService;
    private $categoryService;

    public function __construct(ThreadService $threadService, CategoryService $categoryService)
    {
        $this->threadService = $threadService;
        $this->categoryService = $categoryService;
    }

    public function userThread() {
        $threads = $this->threadService->findThreadByPosterId(Auth::id());

        return view('my_thread', ['threads' => $threads]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create() {
        $categories = $this->categoryService->all();
        $thread = null;

        return view('thread.form', ['categories' => $categories, 'mode' => 'create', 'thread' => $thread]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $thread_id
     * @return View
     */
    public function edit($thread_id) {
        $categories = $this->categoryService->all();
        $thread = Thread::find($thread_id);

        return view('thread.form', ['categories' => $categories, 'mode' => 'update', 'thread' => $thread]);
    }

    /**
     * Save the resource in storage.
     *
     * @param  App\Http\Requests\StoreThread  $request
     * @return Redirect
     */
    public function save(StoreThread $request) {
        $this->threadService->save($request->all(), Auth::user());

        if ($request->mode == 'update') {
            return redirect()->route('thread.history');
        }

        return redirect()->route('home');
    }

    public function destroy($id) {
        $this->threadService->destroy($id);

        return redirect()->route('thread.history');
    }

    /**
     * Close the specified thread in storage.
     *
     * @param  int $thread_id
     * @return Redirect
     */
    public function close($thread_id) {
        $this->threadService->close($thread_id);

        return redirect()->route('thread.history');
    }
}
