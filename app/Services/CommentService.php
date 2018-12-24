<?php
/**
 * Created by PhpStorm.
 * User: Wooden-PC
 * Date: 12/23/2018
 * Time: 7:31 PM
 */

namespace App\Services;


use App\Comment;

class CommentService
{
    public function all() {
        return Comment::with('user', 'thread');
    }

    public function allWithPaginate($limit) {
        return Comment::with('user', 'thread')
            ->paginate($limit);
    }

    public function findById($comment_id) {
        return Comment::with('user', 'thread')
            ->find($comment_id);
    }

    public function findByThreadId($thread_id) {
        return Comment::with('user', 'thread')
            ->where('thread_id', $thread_id);
    }

    public function search($keyword, $thread_id) {
        return Comment::with('user', 'thread')
            ->where('thread_id', '=', $thread_id)
            ->where(function ($query) use($keyword) {
                $query->where('content', 'like', '%'.$keyword.'%')
                ->orWhereHas('thread', function ($thread) use ($keyword) {
                    $thread->where('name', 'like', '%'.$keyword.'%');
                });;
            });
    }

    public function paginate($threads, $limit) {
        return $threads->paginate($limit);
    }

    public function store(array $data) {
        return Comment::create($data);
    }

    public function update(array $data, $comment_id) {
        return Comment::find($comment_id)->update($data);
    }

    public function destory($comment_id) {
        return Comment::destroy($comment_id);
    }
}