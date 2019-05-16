<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'is_admin' , 'email_verified_at' , 'updated_at' , 'email'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function fullname()
    {
        return $this->first_name.' '.$this->last_name;
    }

    public function avatar()
    {

        return !$this->avatar ? '/images/users/default-avatar.jpg'  : '/images/users/'.$this->avatar;
    }

    public function isAdmin()
    {
        return in_array($this->email , config('iblog.admins'));
    }
}
