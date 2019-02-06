<?php

namespace App\Faker;


use Illuminate\Database\Eloquent\Model;

class UsersMother extends Model
{
    protected $table = 'users_parents';
    protected $fillable = [

        'created_at',
        'updated_at',
        'userid',
        'type',
        'parent_name',
        'living_status',
        'service_status',
        'profession',
        'profession_details',
        'designation',
        'organization_name',
        'more_info',

    ];

}
