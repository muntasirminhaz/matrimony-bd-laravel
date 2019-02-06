<?php

function RandomString($num)
{
    $arr = array_merge(range("A", "Z"), range("a", "z"), range(0, 9));
    $str = "";
    for ($i = 1; $i <= $num; $i++) {
        $str .= $arr[rand(0, count($arr) - 1)];
    }
    return $str;
}
function timeToCall($id = null)
{

    $arr = [
        1 => '9 AM to 12 PM',
        2 => '12 PM to 3 PM',
        3 => '3 PM to 6 PM',
        4 => '6 PM to 9 PM',
    ];
    if (!$id) {
        return $arr;
    }
    return $arr[$id];
}
function relation($id = null)
{

    $arr = [
        1 => 'Father',
        2 => 'Mother',
        3 => 'Gurdien',
        4 => 'Uncle',
        5 => 'Aunty',
        6 => 'Brother',
        7 => 'Sister',
    ];
    if (!$id) {
        return $arr;
    }
    return $arr[$id];
}
function profileMadeBy($id = null)
{

    $arr = [
        1 => 'Self',
        2 => 'Parent',
        3 => 'Gurdien',
        4 => 'Relative',
        5 => 'Friend',
        5 => 'Other',
    ];
    if (!$id) {
        return $arr;
    }
    return $arr[$id];
}
function height($id = null)
{

    $arr = [
        '4.0' => "4'.0\"",
        '4.1' => "4'.1\"",
        '4.2' => "4'.2\"",
        '4.3' => "4'.3\"",
        '4.4' => "4'.4\"",
        '4.5' => "4'.5\"",
        '4.6' => "4'.6\"",
        '4.7' => "4'.7\"",
        '4.8' => "4'.8\"",
        '4.9' => "4'.9\"",
        '4.10' => "4'.10\"",
        '4.11' => "4'.11\"",
        '4.12' => "4'.12\"",
        '5.0' => "5'.0\"",
        '5.1' => "5'.1\"",
        '5.2' => "5'.2\"",
        '5.3' => "5'.3\"",
        '5.4' => "5'.4\"",
        '5.5' => "5'.5\"",
        '5.6' => "5'.6\"",
        '5.7' => "5'.7\"",
        '5.8' => "5'.8\"",
        '5.9' => "5'.9\"",
        '5.10' => "5'.10\"",
        '5.11' => "5'.11\"",
        '5.12' => "5'.12\"",
        '6.0' => "6'.0\"",
        '6.1' => "6'.1\"",
        '6.2' => "6'.2\"",
        '6.3' => "6'.3\"",
        '6.4' => "6'.4\"",
        '6.5' => "6'.5\"",
        '6.6' => "6'.6\"",
        '6.7' => "6'.7\"",
        '6.8' => "6'.8\"",
        '6.9' => "6'.9\"",
        '6.10' => "6'.10\"",
        '6.11' => "6'.11\"",
        '6.12' => "6'.12\"",
        '7.0' => "7'.0\"",
        '7.1' => "7'.1\"",
        '7.2' => "7'.2\"",
        '7.3' => "7'.3\"",
        '7.4' => "7'.4\"",
        '7.5' => "7'.5\"",
        '7.6' => "7'.6\"",
        '7.7' => "7'.7\"",
        '7.8' => "7'.8\"",
        '7.9' => "7'.9\"",
        '7.10' => "7'.10\"",
        '7.11' => "7'.11\"",
        '7.12' => "7'.12\"",
    ];
    if (!$id) {
        return $arr;
    }
    return $arr[$id];
}
function religion($id = null)
{

    $arr = [
        1 => 'Islam',
        2 => 'Hinduism',
        3 => 'Buddhism',
        4 => 'Christianity',
        5 => 'Atheist',
    ];
    if (!$id) {
        return $arr;
    }
    return $arr[$id];
}
function religion2($id = null)
{

    $arr = [
        1 => 'Muslim',
        2 => 'Hindu',
        3 => 'Buddhist',
        4 => 'Christian',
        5 => 'Atheist',
    ];
    if (!$id) {
        return $arr;
    }
    return $arr[$id];
}
function gender($id = null)
{

    $arr = [
        1 => 'Male',
        2 => 'Female',
    ];
    if (!$id) {
        return $arr;
    }
    return $arr[$id];
}
function paymentMethods($id = null)
{

    $arr = [
        1 => 'Bkash',
        2 => 'DBBL Rocket',
    ];
    if (!$id) {
        return $arr;
    }
    return $arr[$id];
}
function lookingFor($id = null)
{

    $arr = [

        1 => 'Bride', // Gender - Male
        2 => 'Grrom', // Gender - Female
    ];
    if (!$id) {
        return $arr;
    }
    return $arr[$id];
}
function resStatus($id = null)
{

    $arr = [
        1 => 'Owner',
        2 => 'Rented',
    ];
    if (!$id) {
        return $arr;
    }
    return $arr[$id];
}

function bloodGroups($id = null)
{

    $arr = [
        1 => 'A+',
        2 => 'A-',
        3 => 'B+',
        4 => 'B-',
        5 => 'AB+',
        6 => 'AB-',
        7 => 'O+',
        8 => 'O-',
    ];

    if (!$id) {
        return $arr;
    }
    return $arr[$id];
}
function complexion($id = null)
{

    $arr = [
        1 => 'While',
        2 => 'Dark',
        3 => 'Lite',
    ];
    if (!$id) {
        return $arr;
    }
    return $arr[$id];
}

function sunsign($id = null)
{

    $arr = [
        'Don\'t Know',
        'Aries',
        'Taurus',
        'Gemini',
        'Cancer',
        'Leo ',
        'Virgo ',
        'Libra ',
        'Scorpio',
        'Sagittarius',
        'Capricorn',
        'Aquarius',
        'Pisces ',
    ];
    if (!$id) {
        return $arr;
    }
    return $arr[$id];
}

function skintone($id = null)
{

    $arr = [
        1 => 'While',
        2 => 'Dark',
        3 => 'Lite',
    ];
    if (!$id) {
        return $arr;
    }
    return $arr[$id];
}
function smoke($id = null)
{

    $arr = [
        1 => 'No.',
        2 => 'Yes.',
        3 => 'Occasionally.',
    ];
    if (!$id) {
        return $arr;
    }
    return $arr[$id];
}
function drink($id = null)
{

    $arr = [
        1 => 'No.',
        2 => 'Yes.',
        3 => 'Occasionally.',
    ];
    if (!$id) {
        return $arr;
    }
    return $arr[$id];
}
function serviceStatus($id = null)
{

    $arr = [
        1 => 'In Service.',
        2 => 'Retired.',
        3 => 'Other.',
    ];
    if (!$id) {
        return $arr;
    }
    return $arr[$id];
}

function diet($id = null)
{

    $arr = [
        1 => 'Vegiterian',
        2 => 'Something',
        3 => 'Something',
    ];
    if (!$id) {
        return $arr;
    }
    return $arr[$id];
}
function bodytype($id = null)
{

    $arr = [
        1 => 'Slim',
        2 => 'Fat',
    ];
    if (!$id) {
        return $arr;
    }
    return $arr[$id];
}
function educationLevel($id = null)
{

    $arr = [
        1 => 'Doctorate/Phd',
        2 => 'Masters',
        3 => 'Bachelor',
        4 => 'Honors',
        5 => 'MBBS',
        6 => 'Engineer (BSc and above)',
        7 => 'Diploma',
        8 => 'HSC or equivalent',
        9 => 'SSC',
    ];

    if (!$id) {
        return $arr;
    }
    return $arr[$id];
}
function educationArea($id = null)
{

    $arr = [
        1 => 'Science',
        2 => 'Commerce',
        3 => 'Arts',
    ];
    if (!$id) {
        return $arr;
    }
    return $arr[$id];
}
function marriedYesNo($id = null)
{
    $arr = [
        1 => 'Un-married',
        2 => 'Married',
    ];
    if (!$id) {
        return $arr;
    }
    return $arr[$id];
}
function maritalstatus($id = null)
{

    $arr = [
        1 => 'Never Married',
        2 => 'Divorced',
        3 => 'Widowed',
    ];
    if (!$id) {
        return $arr;
    }
    return $arr[$id];
}
function motherTongue($id = null)
{

    $arr = [
        1 => 'Bangla',
        2 => 'English',
    ];
    if (!$id) {
        return $arr;
    }
    return $arr[$id];
}
function professionType($id = null)
{
    $arr = [
        1 => 'BCS',
        2 => 'Govt',
        3 => 'MBBS',
        4 => 'Engineer',
        5 => 'Banker',
        6 => 'Teacher',
        7 => 'NGO/Private Company',
        8 => 'Business',
        9 => 'Defense',
        10 => 'Lawyer',
        11 => 'Student',
        12 => 'Self Employment',
        13 => 'NRB (Foreign Employment)',
        14 => 'Un-employeed / Housewife',
        15 => 'Others',
    ];

    if (!$id) {
        return $arr;
    }
    return $arr[$id];
}
function profileProfession($id = null)
{
    $arr = [
        1 => 'BCS',
        2 => 'Govt',
        3 => 'MBBS',
        4 => 'Engineer',
        5 => 'Banker',
        6 => 'Teacher',
        7 => 'NGO/Private Company',
        8 => 'Business',
        9 => 'Defense',
        10 => 'Lawyer',
        11 => 'Student',
        12 => 'Self Employment',
        13 => 'NRB (Foreign Employment)',
        14 => 'Un-employeed',
        15 => 'Others',
    ];

    if (!$id) {
        return $arr;
    }
    return $arr[$id];
}
function kotoTomo($kotojon, $positionAmoungSiblings)
{

    if ($kotojon == 2) {
        $arr = [
            1 => '1st',
            2 => '2nd',
        ];
    }
    if ($kotojon == 3) {
        $arr = [
            1 => '1st',
            2 => '2nd',
            3 => '3rd',
        ];
    }

    if ($kotojon > 3) {
        $arr = [
            1 => '1st',
            2 => '2nd',
            3 => '3rd',
        ];
        for ($i = 4; $i <= $kotojon; $i++) {
            $arr[$i] = $i . 'th';

        }

    }

    unset($arr[$positionAmoungSiblings]);

    return $arr;

}

function deadOrAlive($id = null)
{
    $arr = [
        1 => 'Alive',
        2 => 'Late',
    ];
    if (!$id) {
        return $arr;
    }
    return $arr[$id];
}
function sayPayer($id = null)
{
    $arr = [
        1 => '5 Times a Day',
        2 => 'Occasionally',
        3 => 'Only Jumma',
        4 => 'Almost Never',
    ];
    if (!$id) {
        return $arr;
    }
    return $arr[$id];
}
function subIslam($id = null)
{
    $arr = [
        1 => 'Sunni',
        2 => 'Shia',
    ];
    if (!$id) {
        return $arr;
    }
    return $arr[$id];
}
function subHindu($id = null)
{
    $arr = [
        1 => 'Something',
        2 => 'Something',
    ];
    if (!$id) {
        return $arr;
    }
    return $arr[$id];
}
function subBuddhism($id = null)
{
    $arr = [
        1 => 'Something',
        2 => 'Something',
    ];
    if (!$id) {
        return $arr;
    }
    return $arr[$id];
}
function subChrist($id = null)
{
    $arr = [
        1 => 'Something',
        2 => 'Something',
    ];
    if (!$id) {
        return $arr;
    }
    return $arr[$id];
}
function professionType2($id = null)
{
    $arr = [
        1 => 'BCS',
        2 => 'Govt',
        3 => 'MBBS',
        4 => 'Engineer',
        5 => 'Banker',
        6 => 'Teacher',
        7 => 'NGO/Private Company',
        8 => 'Business',
        9 => 'Defense',
        10 => 'Lawyer',
        11 => 'Student',
        12 => 'Self Employment',
        13 => 'NRB (Foreisn Employment)',
        14 => 'Un-employeed / Housewife',
        15 => 'Others',
    ];

    if (!$id) {
        return $arr;
    }
    return $arr[$id];
}
//-------------------

function professionTypeBank($id = null)
{
    $arr = [
        1 => 'Government Bank',
        2 => ' Private Bank',
    ];
    if (!$id) {
        return $arr;
    }
    return $arr[$id];
}

function professionTypeBCS($id = null)
{
    $arr = [
        1 => 'Administration',
        2 => 'Foreign Affairs',
        3 => 'Taxation',
        4 => 'Police',
        5 => 'Audit & Accounts',
        6 => 'Customs & Excise',
        7 => 'Cooperatives',
        8 => 'Economic',
        9 => 'Food,General',
        10 => 'Information',
        11 => 'Family Planning',
        12 => 'Postal',
        13 => 'Railway Transportation & Commercial',
        14 => 'Ansar',
        15 => 'Trade',
        16 => 'Roads & Highways',
        17 => 'Public Works',
        18 => 'Telecommunications',
        19 => 'Public Health Engineering',
        20 => 'Forest',
        21 => 'Health',
        22 => 'Railway Engineering',
        23 => 'Livestock',
        24 => 'Fisheries',
        25 => 'Statistics',
        26 => 'General Education',
        27 => 'Technical Education',
        28 => 'Information, Technical',
        29 => 'Agriculture',
        30 => 'Food',
        31 => 'Engineer',
    ];

    if (!$id) {
        return $arr;
    }
    return $arr[$id];
}
function professionTypeGovGrade($id = null)
{
    $arr = [
        1 => 'Grade-01',
        2 => 'Grade-02',
        3 => 'Grade-03',
        4 => 'Grade-04',
        5 => 'Grade-05',
        6 => 'Grade-06',
        7 => 'Grade-07',
        8 => 'Grade-08',
        9 => 'Grade-09',
        10 => 'Grade-10',
        11 => 'Grade-11',
        12 => 'Grade-12',
        13 => 'Grade-13',
        14 => 'Grade-14',
        15 => 'Grade-15',
        16 => 'Grade-16',
        17 => 'Grade-17',
        18 => 'Grade-18',
        19 => 'Grade-19',
        20 => 'Grade-20',

    ];

    if (!$id) {
        return $arr;
    }
    return $arr[$id];
}
function professionTypeTeacher($id = null)
{
    $arr = [
        1 => 'Public university',
        2 => 'Foreign university',
        3 => 'Private university',
        4 => 'College',
        5 => 'School',

    ];

    if (!$id) {
        return $arr;
    }
    return $arr[$id];
}

function professionTypeDefense($id = null)
{
    $arr = [
        1 => 'Army',
        2 => 'Navy',
        3 => 'Air Force',
    ];
    if (!$id) {
        return $arr;
    }
    return $arr[$id];
}

function professionTypeLawyer($id = null)
{
    $arr = [
        1 => 'Judge Court',
        2 => 'High Court',
    ];
    if (!$id) {
        return $arr;
    }
    return $arr[$id];
}

function adminType($id = null)
{
    $arr = [
        1 => 'Super Admin',
        2 => 'Admin',
        3 => 'Junior Admin',
        4 => 'Agent',
    ];
    if (!$id) {
        return $arr;
    }
    return $arr[$id];
}
function adminStatus($id = null)
{
    $arr = [
        1 => 'Active',
        2 => 'Blocked',
    ];
    if (!$id) {
        return $arr;
    }
    return $arr[$id];
}
function residentialStatus($id = null)
{
    $arr = [
        1 => 'Don\'t Have Preference ',
        2 => 'Owner',
        3 => 'Rental',
    ];
    if (!$id) {
        return $arr;
    }
    return $arr[$id];
}
function nrb($id = null)
{
    $arr = [
        1 => 'Yes.',
        2 => 'No.',
        3 => 'Doesn\'t Matter.',
    ];
    if (!$id) {
        return $arr;
    }
    return $arr[$id];
}
function immigrationStatus($id = null)
{
    $arr = [
        1 => 'Citizen',
        2 => 'Greencard holder',
        3 => 'Staying on Visa',
    ];
    if (!$id) {
        return $arr;
    }
    return $arr[$id];
}

function professionDetails($num)
{
    $needDetails = [1, 2, 5, 6, 9, 10];

    if ($num == in_array($num, $needDetails)) {
        return $needDetails[array_search($num, $needDetails)];
    }
    return 0;
}
function professionOrgDetails($num)
{
    $orgOff = [15, 14, 12, 11, 8, 7, 4, 3];

    if ($num == in_array($num, $orgOff)) {
        return $orgOff[array_search($num, $orgOff)];
    }
    return 0;

}
function showEducationArea($num)
{
    $show = [];

    if ($num == in_array($num, $orgOff)) {
        return $show[array_search($num, $show)];
    }
    return 0;

}

function landType($id = null)
{

    $arr = [
        'land' => 'Land',
        'flat' => 'flat',
        'landhouse' => 'Land with house',
    ];
    if (!$id) {
        return $arr;
    }
    return $arr[$id];
}
function howDdYouHereAboutUs($id = null)
{

    $arr = [
        1 => 'NewsPaper/Magazine',
        2 => 'Facebook/YouTube',
        3 => 'Friends/Relatives',
        4 => 'Newsletter',
        5 => 'Advertisement',
        //6 => 'Others',
    ];
    if (!$id) {
        return $arr;
    }
    return $arr[$id];
}
function interestMessages($id = null)
{

    $arr = [
        1 => 'message 1',
        2 => 'message 2',
        3 => 'message 3',
        4 => 'message 4',

    ];
    if (!$id) {
        return $arr;
    }
    return $arr[$id];
}
