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

    }

    public function findThreadById($id) {
        return Thread::find($id);
    }

    public function make(array $data, $user) {
        $data['poster_id'] = $user->id;

        return Thread::create($data);
    }

}