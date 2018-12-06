<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{
    use SoftDeletes;

    protected $fillable = ['content', 'receiver_id', 'sender_id'];

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
