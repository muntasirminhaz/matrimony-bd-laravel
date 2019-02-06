<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'regisration_as',
        'gender',
        'first_name',
        'last_name',
        'date_of_birth',
        'religion',
        'email',
        'password',
        'mobile',
        'description',
        'how_did',
        'completed',
        'religion_section',
        'email_verified',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


}
