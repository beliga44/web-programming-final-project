<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'address', 'profile_picture', 'phone_number', 'dob', 'gender', 'is_admin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that are appends to model.
     *
     * @var array
     */
    public $appends = [
        'count_message', 'count_posted_thread'
    ];

    public function getCountMessageAttribute() {
        return Message::where('receiver_id', $this->attributes['id'])->count();
    }

    public function getCountPostedThreadAttribute() {
        return Thread::where('poster_id', $this->attributes['id'])->count();
    }

    /**
     * Get the messages for every user.
     */
    public function messages() {
        return $this->hasMany('App\Message');
    }

    /**
     * Get the threads for every user.
     */
    public function threads() {
        return $this->hasMany('App\Thread');
    }
}
