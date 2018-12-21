<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use phpDocumentor\Reflection\Types\Integer;

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
        'formatted_gender', 'formatted_birthday', 'count_message', 'count_posted_thread'
    ];

    /**
     * Get the Formatted Gender for the user.
     *
     * @return String
     */
    public function getFormattedGenderAttribute() {
        return $this['gender'] == 0 ? 'Female' : 'Male';
    }

    /**
     * Get the Formatted Birthday for the user.
     *
     * @return String
     */
    public function getFormattedBirthdayAttribute() {
        return Carbon::parse($this['dob'])->format("d F Y");
    }

    /**
     * Get the Count Message in Message for the user.
     *
     * @return Integer
     */
    public function getCountMessageAttribute() {
        return Message::where('receiver_id', $this->attributes['id'])->count();
    }

    /**
     * Get the Count Posted Thread in Thread for the user.
     *
     * @return Integer
     */
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
