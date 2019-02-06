<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
 */

$factory->define(App\User::class, function (Faker $faker) {

    $gender = $faker->numberBetween($min = 1, $max = 2);
    $middleName = $faker->biasedNumberBetween($min = 0, $max = 1, $function = 'sqrt');
    return [
        'email' => $faker->unique()->safeEmail,
        'verified' => 1,
        'password' => '$2y$10$xCT9tZbSCNWLxcjcYQ4PF.fQzSYTt7cCrSexS9AZXIoltuRmMz2um', // secret
        'remember_token' => str_random(10),
        'created_at' => $faker->dateTimeThisYear($max = 'now', $timezone = null),
        'updated_at' => $faker->dateTimeThisMonth($max = 'now', $timezone = null),
        'status' => 1,
        'regisration_as' => $faker->biasedNumberBetween($min = 1, $max = 5, $function = 'sqrt'),
        'first_name' => ($gender == 1 ? $faker->firstNameMale : $faker->firstNameFemale),
        'middle_name' => ($middleName == 1 ? '' : ($gender == 1 ? $faker->firstNameMale : $faker->firstNameFemale)),
        'last_name' => $faker->lastName,
        'mobile' => '0' . $faker->biasedNumberBetween($min = 1500000000, $max = 1999999999, $function = 'sqrt'),
        'national_id' => $faker->biasedNumberBetween($min = 1111111, $max = 9999999, $function = 'sqrt'),
        'passport_no' => $faker->biasedNumberBetween($min = 1111111, $max = 9999999, $function = 'sqrt'),
        'gender' => $gender,
        'date_of_birth' => $faker->dateTimeInInterval($startDate = '-18 years', $interval = '+ 5 days', $timezone = null),
        'religion' => $faker->biasedNumberBetween($min = 1, $max = 5, $function = 'sqrt'),
        'provided_personal_info' => 1,
        'is_religious' => $faker->biasedNumberBetween($min = 1, $max = 2, $function = 'sqrt'),
        'says_payer' => $faker->biasedNumberBetween($min = 1, $max = 2, $function = 'sqrt'),
        'wear_hijab' => $faker->biasedNumberBetween($min = 1, $max = 2, $function = 'sqrt'),
        'wear_hijab_after_marriage' => $faker->biasedNumberBetween($min = 1, $max = 2, $function = 'sqrt'),
        'disability' => $faker->biasedNumberBetween($min = 1, $max = 2, $function = 'sqrt'),
        'explain_disability' => $faker->text($maxNbChars = 190),
        'complexion' => $faker->biasedNumberBetween($min = 1, $max = 2, $function = 'sqrt'),
        'blood_group' => $faker->biasedNumberBetween($min = 1, $max = 8, $function = 'sqrt'),
        'body_type' => $faker->biasedNumberBetween($min = 1, $max = 2, $function = 'sqrt'),

        'weight' => $faker->biasedNumberBetween($min = 40, $max = 120, $function = 'sqrt'),
        'height' => $faker->biasedNumberBetween($min = 5.0, $max = 5.12, $function = 'sqrt'),

        'diet_type' => $faker->biasedNumberBetween($min = 1, $max = 2, $function = 'sqrt'),
        'smoke' => $faker->biasedNumberBetween($min = 1, $max = 2, $function = 'sqrt'),
        'drink' => $faker->biasedNumberBetween($min = 1, $max = 2, $function = 'sqrt'),
        'marital_status' => $faker->biasedNumberBetween($min = 1, $max = 2, $function = 'sqrt'),
        'has_children' => 1,
        'how_many_children' => 0,
        'want_children' => 1,
        'language' => $faker->biasedNumberBetween($min = 1, $max = 2, $function = 'sqrt'),
        'monthly_income' => $faker->biasedNumberBetween($min = 9999, $max = 9999999999, $function = 'sqrt'),
        'has_siblings' => $faker->biasedNumberBetween($min = 1, $max = 2, $function = 'sqrt'),
        'countryid' => $faker->biasedNumberBetween($min = 0, $max = 230, $function = 'sqrt'),
        'familycountryid' => $faker->biasedNumberBetween($min = 0, $max = 230, $function = 'sqrt'),
    ];
});

$factory->define(App\Faker\Usersprofession::class, function (Faker $faker) {
    return [
        'userid' => $faker->unique()->numberBetween($min = 1, $max = 1000),
        'profession_type' => $faker->biasedNumberBetween($min = 1, $max = 14, $function = 'sqrt'),
        'profession_type_details' => 0,
        'designation' => $faker->jobTitle,
        'org_name' => $faker->company,
        'created_at' => $faker->dateTimeThisYear($max = 'now', $timezone = null),
        'updated_at' => $faker->dateTimeThisMonth($max = 'now', $timezone = null),
    ];
});

$factory->define(App\Faker\UsersFather::class, function (Faker $faker) {

    $livingStatus = $faker->biasedNumberBetween($min = 1, $max = 2, $function = 'sqrt');
    $serviceStatus = ($livingStatus == 2 ? 0 : $faker->biasedNumberBetween($min = 1, $max = 2, $function = 'sqrt'));
    $profession = ($serviceStatus == 3 ? 0 : $faker->biasedNumberBetween($min = 1, $max = 14, $function = 'sqrt'));

    $professionDetails = professionDetails($profession);

    return [
        'created_at' => $faker->dateTimeThisYear($max = 'now', $timezone = null),
        'updated_at' => $faker->dateTimeThisMonth($max = 'now', $timezone = null),
        'userid' => $faker->unique()->numberBetween($min = 1, $max = 1000),
        'type' => 1,
        'parent_name' => $faker->name($gender = 'male'),
        'living_status' => $livingStatus,
        'service_status' => $serviceStatus,
        'profession' => $profession,
        'profession_details' => $professionDetails,
        'designation' => ($professionDetails == 0 ? 0 : $faker->jobTitle),
        'organization_name' => ($professionDetails == 0 ? 0 : $faker->company),
        'more_info' => $faker->text($maxNbChars = 100),

    ];
});

$factory->define(App\Faker\UsersMother::class, function (Faker $faker) {

    $livingStatus = $faker->biasedNumberBetween($min = 1, $max = 2, $function = 'sqrt');
    $serviceStatus = ($livingStatus == 2 ? 0 : $faker->biasedNumberBetween($min = 1, $max = 2, $function = 'sqrt'));
    $profession = ($serviceStatus == 3 ? 0 : $faker->biasedNumberBetween($min = 1, $max = 14, $function = 'sqrt'));

    $professionDetails = professionDetails($profession);

    return [
        'created_at' => $faker->dateTimeThisYear($max = 'now', $timezone = null),
        'updated_at' => $faker->dateTimeThisMonth($max = 'now', $timezone = null),
        'userid' => $faker->unique()->numberBetween($min = 1, $max = 1000),
        'type' => 2,
        'parent_name' => $faker->name($gender = 'male'),
        'living_status' => $livingStatus,
        'service_status' => $serviceStatus,
        'profession' => $profession,
        'profession_details' => $professionDetails,
        'designation' => ($professionDetails == 0 ? 0 : $faker->jobTitle),
        'organization_name' => ($professionDetails == 0 ? 0 : $faker->company),
        'more_info' => $faker->text($maxNbChars = 100),

    ];
});

$factory->define(App\Faker\UserEducation::class, function (Faker $faker) {

    $student = $faker->numberBetween($min = 1, $max = 2, $function = 'sqrt');
    return [
        'created_at' => $faker->dateTimeThisYear($max = 'now', $timezone = null),
        'updated_at' => $faker->dateTimeThisMonth($max = 'now', $timezone = null),
        'userid' => $faker->numberBetween($min = 1, $max = 1000),
        'education_level' => $faker->numberBetween($min = 1, $max = 9),
        'education_area' => $faker->numberBetween($min = 1, $max = 3),
        'degree_name' => $faker->text($maxNbChars = 10),
        'institution_name' => $faker->text($maxNbChars = 10),
        'semester' => ($student == 2 ? $faker->biasedNumberBetween($min = 1, $max = 12, $function = 'sqrt') . ' semester' : 0),
        'result' => ($student == 1 ? $faker->biasedNumberBetween($min = 2.0, $max = 5.0, $function = 'sqrt') . ' semester' : 0),
        'year_completed' => ($student == 1 ? $faker->year($max = 'now') : 0),
    ];
});

$factory->define(App\Faker\UserProfilePic::class, function (Faker $faker) {

    $id = $faker->unique()->numberBetween($min = 1001, $max = 2000);
    $userid = $faker->unique()->numberBetween($min = 2, $max = 1000);
    $types = ['people', 'fashion', 'business'];

    $photo = $faker->imageUrl(400, 400, $types[rand(0, 2)], true, 'Faker');

    $filename_from_url = parse_url($photo);
    $ext = 'jpg';

    $name = $id . '.' . $ext;
    $destinationPath = public_path("/profiles/pics/" . $userid);

    if (!is_dir($destinationPath)) {
        mkdir($destinationPath, 0777, true);
    }
    $saveHere = $destinationPath . '/' . $name;
    file_put_contents($saveHere, file_get_contents($photo));

    return [
        'id' => $id,
        'created_at' => $faker->dateTimeThisYear($max = 'now', $timezone = null),
        'updated_at' => $faker->dateTimeThisMonth($max = 'now', $timezone = null),
        'userid' => $userid,
        'extention' => $ext,
        'private' => $faker->numberBetween($min = 0, $max = 1),
        'is_profilepic' => 1, //$faker->numberBetween($min = 0, $max = 1)

    ];
});

$factory->define(App\Faker\PartnerPreference::class, function (Faker $faker) {

    return [
        'created_at' => $faker->dateTimeThisYear($max = 'now', $timezone = null),
        'updated_at' => $faker->dateTimeThisMonth($max = 'now', $timezone = null),
        'userid' => $faker->unique()->numberBetween($min = 501, $max = 1001),
        'sometext' => $faker->realText($maxNbChars = 200),
        'mother_tongue' => $faker->numberBetween($min = 0, $max = 2),
        'montly_income' => $faker->numberBetween($min = 0, $max = 9999999),
        'age_minimun' => $faker->numberBetween($min = 18, $max = 30),
        'age_maximum' => $faker->numberBetween($min = 31, $max = 50),
        'height' => $faker->numberBetween($min = 5.0, $max = 5.12),
        'weight' => $faker->numberBetween($min = 40, $max = 120),

        'complexion' => $faker->numberBetween($min = 0, $max = 2),
        'blood_group' => $faker->numberBetween($min = 0, $max = 8),
        'body_type' => $faker->numberBetween($min = 0, $max = 2),
        'diet' => $faker->numberBetween($min = 0, $max = 2),
        'smoking' => $faker->numberBetween($min = 1, $max = 2),
        'drink' => $faker->numberBetween($min = 1, $max = 2),

        'children_allow' => $faker->numberBetween($min = 1, $max = 2),

        'profession' => $faker->numberBetween($min = 0, $max = 14),

        'education_level' => $faker->numberBetween($min = 0, $max = 9),
        'education_area' => $faker->numberBetween($min = 0, $max = 3),
        'marital_status' => $faker->numberBetween($min = 0, $max = 3),

        'religion' => $faker->numberBetween($min = 0, $max = 2),
        'is_religious' => $faker->numberBetween($min = 1, $max = 2),

        'disability_allow' => $faker->numberBetween($min = 0, $max = 3),

        'expected_residential_status' => $faker->numberBetween($min = 1, $max = 3),
        'expected_district_home' => $faker->numberBetween($min = 1, $max = 64),

        'living_country' => $faker->numberBetween($min = 0, $max = 230),

        'expected_district_familty' => $faker->numberBetween($min = 1, $max = 64),
        'expected_living_area' => $faker->realText($maxNbChars = 10),

        'personal_values' => $faker->realText($maxNbChars = 100, $indexSize = 2),
        'partner_family_values' => $faker->realText($maxNbChars = 100, $indexSize = 2),

        'job_allow_for_bride' => $faker->numberBetween($min = 1, $max = 2),
        'saying_prayer' => $faker->numberBetween($min = 0, $max = 4),
        'hijab' => $faker->numberBetween($min = 1, $max = 2),
        'hijab_after_marriage' => $faker->numberBetween($min = 1, $max = 2),
    ];
});
