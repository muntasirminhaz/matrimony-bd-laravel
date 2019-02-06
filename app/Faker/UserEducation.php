<?php

namespace App\Faker;

use Illuminate\Database\Eloquent\Model;

class UserEducation extends Model
{
    protected $table = 'users_education';
    protected $fillable = [
        'created_at',
        'updated_at',
        'userid',
        'education_level',
        'education_area',
        'degree_name',
        'institution_name',
        'semester',
        'result',
        'year_completed',
    ];

}
