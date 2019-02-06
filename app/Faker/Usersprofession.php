<?php

namespace App\Faker;


use Illuminate\Database\Eloquent\Model;

class Usersprofession extends Model
{
    protected $table = 'users_profession';
    protected $fillable = [
        'userid',
        'profession_type',
        'profession_type_details',
        'designation',
        'org_name',

    ];

}
