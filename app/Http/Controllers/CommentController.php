<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreComment;
use App\Services\CommentService;

class CommentController extends Controller
{
    private $commentService;

    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }

    public function store(StoreComment $request) {
        $this->commentService->store($request->all());

        return back();
    }

    public function edit($comment_id) {
        $comment = $this->commentService->findById($comment_id);

        return view('thread.edit_comment', ['comment' => $comment]);
    }

    public function update(StoreComment $request, $comment_id) {
        $this->commentService->update($request->all(), $comment_id);

        return redirect()->route('thread.detail', ['thread_id' => $request['thread_id']]);
    }

    public function destroy($comment_id) {
        $this->commentService->destory($comment_id);

        return back();
    }
}
