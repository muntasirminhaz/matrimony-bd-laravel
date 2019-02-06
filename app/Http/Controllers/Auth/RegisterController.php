<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
     */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/check-user-and-logout';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        //print_r($data);die();
        $data['hiddendob'] = Carbon::createFromFormat('Y-m-d', $data['hiddendob'])->toDateString();

        return Validator::make($data, [
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed:password_confirmation',
            'profilemadeby' => 'required|numeric',
            'fname' => 'required|alpha',
            'lname' => 'required|alpha',

            'religion' => 'required|numeric',

            'lookingfor' => 'required|numeric',
            'mobile' => 'required|numeric|unique:users',

            'year' => 'required',
            'month' => 'required',
            'date' => 'required',
            'hiddendob' => 'required|date|date_format:Y-m-d',
            
            'description' => 'required',
            'howhearaboutus' => 'required|numeric',
            'subrel' => 'numeric',
            'trueinfo' => 'accepted',
            

        ], [

            'subrel.numeric' => 'Field is required.',
            'subrel.required' => 'Field is required.',
            'email.required' => 'Email is required.',
            'email.string' => 'Please enter a valid email address.',
            'email.email' => 'Please enter a valid email address.',
            'email.max' => 'Please enter a valid email address.',
            'email.unique' => 'Looks like you are already registered!!',
            'password.required' => 'Password is required.',
            'password.string' => 'Password must be valid.',
            'password.min' => 'Password too short; it show have Minimum 6 character.',
            'password.confirmed' => 'Password do not match.',
            'dob.required' => 'Date of Birth is required',
            'dob.date' => 'Date of Birth must be a date',
            'dob.before' => 'You must be atlease 18 yers old.',
            'dob.date_format' => 'Date of Birth in invalid.',
            'religion.required' => 'Religion is required',
            'religion.numeric' => 'Religion is required',

            'trueinfo.accepted' => 'You must declare the information are true and valid.',
            'useragreement.accepted' => 'You must accept the user agreement for signing up.',

            'profilemadeby.required' => 'Profile Made by is required',
            'profilemadeby.numeric' => 'Profile Made by is required',
            'fname.required' => 'First name is required.',
            'fname.alpha' => 'First name is not valid, No space or special charaters are allowed',
            'lname.required' => 'Last name is required.',
            'lname.alpha' => 'Last name is not valid, No space or special charaters are allowed',
            'lookingfor.required' => 'Looking for is required',
            'lookingfor.numeric' => 'Looking for is required',
            'mobile.required' => 'Mobile Phone No is Required',
            'mobile.numeric' => 'Mobile Phone must be a valid phone/cell number',
            'mobile.unique' => 'Looks like you are already registered!!',
            'description.required' => 'Describe Yourself is required!!',

            'hiddendob.required' => 'Date of Birth is required',
            'hiddendob.date' => 'Date of Birth must be a date',
            'hiddendob.before' => 'You must be atlease 18 yers old.',
            'hiddendob.date_format' => 'Date of Birth in invalid.',
            
            'howhearaboutus.required' => 'How did you here about us? is required.',
            'howhearaboutus.numeric' => 'How did you here about us? is required.',
        ]);

        return $data;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

         return User::create([
            'email_verified' => str_random(16),
            'regisration_as' => $data['profilemadeby'],
            'gender' => $data['lookingfor'],
            'first_name' => $data['fname'],
            'last_name' => $data['lname'],
            'date_of_birth' => $data['hiddendob'],
            'religion' => $data['religion'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'mobile' => $data['mobile'],
            'description' => $data['description'],
            'how_did' => $data['howhearaboutus'],
            'religion_section' => $data['subrel'] ?? 0,
            'completed' => 20
        ]);


        

    }
}
