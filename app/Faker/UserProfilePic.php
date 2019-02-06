<?php

namespace App\Faker;

use Illuminate\Database\Eloquent\Model;

class UserProfilePic extends Model
{
    protected $table = 'users_photos';
    protected $fillable = [
        'created_at',
        'updated_at',
        'userid',
        'private',
        'extention',
        'is_profilepic',
    ];

}
