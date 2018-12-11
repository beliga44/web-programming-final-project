<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

class Thread extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'category_id',
        'poster_id',
        'is_closed',
        'description'
    ];

    /**
     * The attributes that are appends to model.
     *
     * @var array
     */
    public $appends = [
        "formatted_date"
    ];

    public function getFormattedDateAttribute(){
        return Carbon::parse($this['updated_at'])->format("F d Y h:i:s");
    }

    /**
     * Get the poster for the every thread.
     */
    public function poster() {
        return $this->belongsTo('App\User', 'poster_id');
    }

    /**
     * Get the category for the every thread.
     */
    public function category() {
        return $this->belongsTo('App\Category', 'category_id');
    }
}
