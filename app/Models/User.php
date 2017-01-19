<?php

namespace Source\Models;

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
    protected $fillable = [
        'name', 'email', 'password', 'avatar', 'address',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /*************/
    /* Accessor */
    /************/
    /**
     * Get thumb avatar
     * 
     * @return String
     */
    public function getAvatarThumbAttribute($value)
    {
        if($value) {
            return $value;
        }
        return 'assets/images/blank-avatar.jpg';
    }
}
