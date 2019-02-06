<?php

namespace App\Faker;

use Illuminate\Database\Eloquent\Model;

class PartnerPreference extends Model
{
    protected $table = 'user_partner_preference';
    protected $fillable = [
        'created_at',
        'updated_at',
        'userid',
        'sometext',
        'mother_tongue',
        'montly_income',
        'age_minimun',
        'age_maximum',
        'height',
        'weight',

        'complexion',
        'blood_group',
        'body_type',
        'diet_type',
        'smoke',
        'drink',

        'children_allow',

        'profession',

        'education_level',
        'education_area',

        'religion',
        'is_religious',

        'disability_allow',

        'expected_residential_status',
        'expected_district_home',

        'living_country',

        'expected_district_familty',
        'expected_living_area',

        'personal_values',
        'partner_family_values',

        'job_allow_for_bride',
        'saying_prayer',
        'hijab',
        'hijab_after_marriage',
    ];
}
