<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    /**
     * Get the threads for the every category.
     */
    public function threads() {
        return $this->hasMany('App\Thread');
    }
}
