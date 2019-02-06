<?php

namespace App\Http\Controllers\Signup;

use App\Common;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BasicLifeStyleController extends Controller
{
    private $page = 'basic';

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (($match = Common::signupLevels(Auth::user()->completed, $this->page)) != $this->page) {
                return redirect($match);
            }
            return $next($request);
        });
    }

    public function index()
    {
        $data['completed'] = Auth::user()->completed;

        $data['profilePicture'] = Common::userProfilePic();
        $data['title'] = 'Basic and Life Style Information';

        //$data['allowGoback'] = 1;
        //$data['allowSkip'] = route('signup.location');

        $data['prevPageLink'] = 1;
        $data['nextPageLink'] = 1;

        return view('signup.basic', $data);
    }

    public function store(Request $request)
    {

        $validateFormData = request()->validate(
            [
                'height' => 'required|numeric',
                'weight' => 'required|numeric',
                'bodytype' => 'required|numeric',
                'blood_group' => 'required|numeric',
                'skintone' => 'required|numeric',

                'diet' => 'required|numeric',
                'sunsign' => 'required|numeric',

                'drinks' => 'required|numeric',
                'smoke' => 'required|numeric',
                'mstatus' => 'required|numeric',
                'income' => 'required',
                'hobbies' => 'required',
                'language' => 'required',
            ],
            [
                'height.required' => 'Height is required.',
                'height.numeric' => 'Height is required.',
                'weight.required' => 'Weight is required.',
                'weight.numeric' => 'Weight is required.',
                'bodytype.required' => 'body type is required.',
                'bodytype.numeric' => 'body type is required.',
                'blood_group.required' => 'Blood group is required.',
                'blood_group.numeric' => 'Blood group is required.',
                'skintone.required' => 'Skin tone is required.',
                'skintone.numeric' => 'Skin tone is required.',
                'diet.required' => 'Diet type is required.',
                'diet.numeric' => 'Diet type is required.',
                'sunsign.required' => 'Sun Sign is required.',
                'sunsign.required' => 'Sun Sign is required.',
                'drinks.required' => 'Do you Drink? is required.',
                'drinks.numeric' => 'Do you Drink? is required.',
                'smoke.required' => 'Do you Smoke? is required.',
                'smoke.numeric' => 'Do you Smoke? is required.',
                'mstatus.required' => 'Marital status is required.',
                'mstatus.numeric' => 'Marital status is required.',
                'howmanychild.numeric' => 'How many childrend is required.',
                'income.required' => 'Income is required.',
                'hobbies.required' => 'Interests and Hobbies is required',
                'language.required' => 'Language is required',
                'childrenliving.numeric' => 'Interests and Hobbies is required',
            ]

        );

        $tableData = [
            'updated_at' => Carbon::now(),

            'height' => $request->input('height'),
            'weight' => $request->input('weight'),
            'body_type' => $request->input('bodytype'),
            'blood_group' => $request->input('blood_group'),
            'skin_tone' => $request->input('skintone'),

            'drink' => $request->input('diet'),
            'sun_sign' => $request->input('sunsign'),

            'diet_type' => $request->input('drinks'),
            'smoke' => $request->input('smoke'),
            'marital_status' => $request->input('mstatus'),
            'how_many_children' => $request->input('howmanychild') ?? 0,
            'children_living_with_me' => $request->input('childrenliving') ?? 0,

            'annual_income' => $request->input('income'),
            'hobby' => $request->input('hobbies'),

            'disability' => $request->input('disability') ?? 0,
            'explain_disability' => $request->input('explain_disability') ?? '',
            'language' => $request->input('language') ?? 1,
        ];

        $update = DB::table('users')
            ->where('id', Auth::user()->id)
            ->update($tableData);

        if (!$update) {
            return redirect()->back()->withErrors($request->all());
        }

        return redirect(Common::updateSignupLevelAndRedirect($this->page));

    }
}
