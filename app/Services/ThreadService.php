<?php
/**
 * Created by PhpStorm.
 * User: IG17-1
 * Date: 11/12/2018
 * Time: 9:51
 */

namespace App\Services;


use App\Thread;

class ThreadService
{
    public function all() {
        return Thread::with('poster', 'category');
    }

    public function allWithPaginate($limit) {
        return Thread::with('poster', 'category')
            ->paginate($limit);
    }

    public function paginate($threads, $limit) {
        return $threads->paginate($limit);
    }

    public function orderByCreatedAt($threads, $criteria) {
        return $threads->orderBy('created_at', $criteria);
    }

    public function findThreadByPosterId($id) {
        return Thread::with('category', 'poster')
            ->where('poster_id', $id)
            ->paginate(5);
    }

    public function findThreadById($id) {

    }

    public function search($keyword) {
        return Thread::with('category', 'poster')
            ->where('name', 'like', '%'.$keyword.'%')
            ->orWhereHas('category', function ($category) use ($keyword) {
                $category->where('name', 'like', '%'.$keyword.'%');
            });
    }

    public function save(array $data, $user) {
        $data['poster_id'] = $user->id;

        if($data['mode'] == 'update') {
            return Thread::find($data['thread_id'])->update($data);
        }
        return Thread::create($data);
    }

    public function destroy($id) {
        Thread::destroy($id);
    }

    public function close($id) {
        $thread = Thread::find($id);
        $thread->is_closed = 1;
        $thread->save();
    }

}