<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['content', 'receiver_id', 'sender_id'];

    /**
     * The attributes that are appends to model.
     *
     * @var array
     */
    public $appends = [
        "formatted_date"
    ];

    public function getFormattedDateAttribute(){
        return Carbon::parse($this['updated_at'])->format("l, F d Y h:i:s");
    }

    public function receiverUser() {
        return $this->belongsTo('App\User', 'receiver_id');
    }

    public function senderUser() {
        return $this->belongsTo('App\User', 'sender_id');
    }
}
