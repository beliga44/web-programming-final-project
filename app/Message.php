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
    protected $fillable = [
        'content', 'receiver_id', 'sender_id'
    ];

    /**
     * The attributes that are appends to model.
     *
     * @var array
     */
    public $appends = [
        "formatted_date"
    ];

    /**
     * Get the Formatted date for the Message.
     *
     * @return String
     */
    public function getFormattedDateAttribute(){
        return Carbon::parse($this['updated_at'])->format("l, F d Y h:i:s");
    }

    /**
     * Get the receiver for the every message.
     */
    public function receiverUser() {
        return $this->belongsTo('App\User', 'receiver_id');
    }

    /**
     * Get the sender for the every message.
     */
    public function senderUser() {
        return $this->belongsTo('App\User', 'sender_id');
    }
}
