@extends('layouts.users')


@section('content')



<div class="col-md-9 card">

    @if($errors->any())
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        <strong>Changes not saved.</strong> . Please try again with valid information.
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        <strong>{{ session('error') }}</strong> Please try again with valid information.
    </div>
    @endif

    @if(Session('msg'))
    <div class="alert alert-info alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong> {{ Session('msg') }}</strong>
    </div>
    @endif
    @if(Session('success'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong> {{ Session('success') }}</strong>
    </div>
    @endif

    <div class="panel panel-default">
        <div class="panel-heading title">
            <span class="h3 bold-text">Groom (Partner) Preference</span>
            <a type="button" href="{{ route('users.editprofile.partner.edit') }}" class="btn btn-info btn-sm pull-right"><span
                    class="edit-icon fa fa-edit"></span> Edit Preference</a>
        </div>
        <div class="panel-body">
            <div class="table-responsive show-userinfo" style="">
                <table class="table table-light">
                    <tbody>
                        <tr>
                            <td>Monthly Income</td>
                            <td class="bold-text">{{ $userPreferences->montly_income }} Taka.</td>

                            <td>Mother Tongue</td>
                            <td class="bold-text">
                                @if ($userPreferences->mother_tongue != 0)
                                {{ motherTongue($userPreferences->mother_tongue) }}
                                @else
                                No Preference.
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Maximum Age</td>
                            <td class="bold-text">{{ $userPreferences->age_maximum }} -Year</td>
                            <td>Minium Age</td>
                            <td class="bold-text">{{ $userPreferences->age_minimun }} -Year</td>
                        </tr>
                        <tr>
                            <td>Height</td>
                            <td class="bold-text">{{ height("{$userPreferences->height}") }}</td>
                            <td>Weight</td>
                            <td class="bold-text">{{ $userPreferences->weight }} -Kg.</td>
                        </tr>
                        <tr>
                            <td>Blood Group</td>
                            <td class="bold-text">@if ($userPreferences->blood_group != 0)
                                {{bloodGroups($userPreferences->blood_group) }}
                                @else
                                No Preference.
                                @endif
                            </td>
                            <td>Complexion</td>
                            <td class="bold-text">@if ($userPreferences->complexion != 0)
                                {{ complexion($userPreferences->complexion) }}
                                @else
                                No preference.
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Body Type</td>
                            <td class="bold-text">@if ( $userPreferences->body_type != 0)
                                {{ bodytype($userPreferences->body_type) }}
                                @else
                                No Preference.
                                @endif
                            </td>
                            <td>Somkes</td>
                            <td class="bold-text">{{ $userPreferences->smoking == 1?'No' : 'Yes' }}</td>
                        </tr>
                        <tr>
                            <td>Drinks</td>
                            <td>{{ $userPreferences->drink == 1?'No':'Yes'}}</td>
                            <td>Diet Type</td>
                            <td class="bold-text">@if ($userPreferences->diet != 0 )
                                {{ diet($userPreferences->diet) }}
                                @else
                                No Preference.
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Want Children</td>
                            <td class="bold-text">{{ $userPreferences->children_allow == 1?'Yes':'No'}}</td>
                            <td>Marital Status</td>
                            <td class="bold-text">@if ($userPreferences->marital_status != 0 )
                                {{ maritalstatus($userPreferences->marital_status) }}
                                @else
                                No Preference.
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Education Level</td>
                            <td class="bold-text">@if ($userPreferences->education_level != 0)
                                {{ educationLevel($userPreferences->education_level) }}
                                @else
                                No Preference.
                                @endif
                            </td>
                            <td>Education Area</td>
                            <td class="bold-text">@if ($userPreferences->education_area != 0)
                                {{ educationArea($userPreferences->education_area) }}
                                @else
                                No Preference.
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Profession</td>
                            <td class="bold-text">@if ($userPreferences->profession != 0)
                                {{ professionType($userPreferences->profession) }}
                                @else
                                No Preference.
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Religion</td>
                            <td class="bold-text"> @if ($userPreferences->religion != 0)
                                {{ religion($userPreferences->religion) }}
                                @else
                                No Preference.
                                @endif
                            </td>
                            <td>Is partner religious?</td>
                            <td class="bold-text">{{ $userPreferences->is_religious == 1?'Yes' :'No' }}</td>
                        </tr>
                        <tr>
                            <td>Allow Parter Disability</td>
                            <td class="bold-text">{{ $userPreferences->disability_allow ==1 ?'No':'Yes' }}</td>
                            <td>Current Home District</td>
                            <td class="bold-text">
                                @if ($userPreferences->expected_district_home !== 0)
                                {{ $partnetDistricts }}
                                @else
                                No Preference
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Family District</td>
                            <td class="bold-text">
                                @if ($userPreferences->expected_district_familty !== 0)
                                {{ $familyDistricts }}
                                @else
                                No Preference
                                @endif
                            </td>
                            <td>Living Area</td>
                            <td class="bold-text">{{ $userPreferences->expected_living_area }}</td>
                        </tr>
                        <tr>
                            <td>Residential Status</td>
                            <td class="bold-text">{{ residentialStatus($userPreferences->expected_residential_status)
                                }}
                            </td>
                            <td>Country of Living</td>
                            <td class="bold-text">@if ($userPreferences->living_country !== 0)
                                {{ $partnerCountry }}
                                @else
                                No Preference
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Personal Values</td>
                            <td>{{ $userPreferences->personal_values }}</td>
                            <td>Family Values</td>
                            <td class="bold-text">{{ $userPreferences->partner_family_values }}</td>
                        </tr>
                        @if (Auth::user()->gender === 1)
                        <tr>
                            <td>Job Allow for Bride</td>
                            <td class="bold-text">{{ $userPreferences->job_allow_for_bride == 1?'Yes':'No'}}</td>
                            @endif
                            @if (Auth::user()->religion === 1)
                            <td>Says payer</td>
                            <td class="bold-text">@if ($userPreferences->saying_prayer != 0 )
                                {{ sayPayer($userPreferences->saying_prayer) }}
                                @else
                                No Preference.
                                @endif 
                         </td>
                        </tr>
                        @if (Auth::user()->gender === 1)
                        <tr>
                            <td>Wears Hijab</td>
                            <td class="bold-text">{{ $userPreferences->hijab == 1?'Yes': 'No' }}</td>
                            <td>Wears Hijab After Marriage</td>
                            <td class="bold-text">{{ $userPreferences->hijab_after_marriage == 1?'Yes': 'No' }}</td>
                        </tr>
                        @endif
                        @endif
                    </tbody>
                </table>
            </div>
















        </div>
    </div>




</div>


@endsection




@section('sidebar')
<div class="col-md-3 ">

    @include('sections.sidebarprofileedit')
</div>
@endsection

@section('title')
<h1>Update Profile and Settings</h1>
@endsection


@section('footerscript')
<script>
    $(function () {
        $('.show-userinfo').show(0);
        $('.show-form').hide(0);
        $('#toggle-form').on('click', function () {
            $('.show-userinfo').toggle(300);
            $('.show-form').toggle(300);

            $(this).toggleClass('btn-danger');
            $(this).toggleClass('btn-info');

            if ($('#toggle-form .edit-text').text() == 'Edit') {
                $('#toggle-form .edit-icon').removeClass('fa-edit');
                $('#toggle-form .edit-icon').addClass('fa-window-close');
                $('#toggle-form .edit-text').text('Cancel Edit');
            } else {
                $('#toggle-form .edit-icon').removeClass('fa-window-close');
                $('#toggle-form .edit-icon').addClass('fa-edit');

                $('#toggle-form .edit-text').text('Edit');
            }

        });




    });

</script>
@endsection
