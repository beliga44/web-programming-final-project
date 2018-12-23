<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;
    //

    protected $fillable = [
        'user_id',
        'thread_id',
        'content'
    ];

    /**
     * The attributes that are appends to model.
     *
     * @var array
     */
    public $appends = [
        "formatted_date"
    ];

    public function getFormattedDateAttribute() {
        return Carbon::parse($this['updated_at'])->format("F d Y h:i:s");
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function thread() {
        return $this->belongsTo('App\Thread');
    }
}
