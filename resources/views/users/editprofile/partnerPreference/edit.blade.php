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
            <span class="h3 bold-text">Edit Partner Preference Information</span>
            <a type="button" href="{{ route('users.editprofile.partner.index') }}" class="btn btn-danger btn-sm pull-right"><span
                    class="edit-icon fa fa-backward"></span> Cancel Editing Partner Preference</a>
        </div>
        <div class="panel-body">




            <div class="table-responsive show-userinfo">
                <table class="table table-light">
                    <tbody>

                    </tbody>
                </table>
            </div>

            <form id="insertpreference" method="POST" action="{{ route('users.editprofile.partner.update') }}" class="padding-0-30"
                style="display: block;">
                @csrf


                <div class="form-group row">
                   
                </div>

                <div class="form-group row">
                    <div class="col-xs-12">
                            <h5>General Information & Education and Profression </h5>
                            <hr>
                    </div>
                    <div class="col-md-6">
                        <label for="mothertongue" class=" col-form-label">Mother Tongue</label>
                        <div class="">
                            <select name="mothertongue" id="input" class="form-control" required="required">
                                <option>Select ... </option>
                                <option {{ $userPreferences->mother_tongue == 0 ? 'selected' : '' }} value="0">Don't
                                    have Prefernece</option>
                                @foreach (motherTongue() as $key => $value)
                                <option {{ $userPreferences->mother_tongue == $key ? 'selected' : '' }} value="{{ $key }}">{{
                                    $value }}</option>
                                @endforeach
                            </select>

                            @if ($errors->has('mothertongue'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('mothertongue') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="monthlyincome" class=" col-form-label">Monthly Income
                        </label>
                        <div class="">
                            <input value="{{ $userPreferences->montly_income }}" id="monthlyincome" name="monthlyincome"
                                placeholder="What's your monthly income?" class="form-control here" type="text">
                            @if ($errors->has('monthlyincome'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('monthlyincome') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                <!--<h4></h4>
                    <hr>-->
                </div>

                @if (Auth::user()->gender === 1)


                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="bridejoballow" class=" col-form-label">
                            Bride Allowed to Job
                            <span>*</span></label>
                        <div class="">
                            <div class="radio">
                                <label>
                                    <input {{ $userPreferences->job_allow_for_bride == 1 ? 'checked' : '' }} type="radio"
                                        class="bridejoballow" name="bridejoballow" value="1">
                                    <span>Yes</span></label>
                                <label>
                                    <input {{ $userPreferences->job_allow_for_bride == 2 ? 'checked' : '' }} type="radio"
                                        class="bridejoballow" name="bridejoballow" value="2">
                                    <span>No</span></label>
                            </div>
                            @if ($errors->has('bridejoballow'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('bridejoballow') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6"></div>
                </div>
                @endif
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="profession" class=" col-form-label">
                            Profession Type
                            <span>*</span></label>
                        <div class=" autocomplete">
                            <select name="profession" id="profession" class="form-control" required="required">
                                <option>Select ...</option>
                                <option {{ $userPreferences->profession == 0 ? 'selected' : '' }} value="0">No
                                    Preference</option>
                                @foreach ($professionType as $key => $value)
                                <option {{ $userPreferences->profession == $key ? 'selected' : '' }} value="{{ $key }}">{{
                                    $value }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('profession'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('profession') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="mineducation" class="col-form-label">
                            Min Education level
                            <span>*</span></label>
                        <div class="">
                            <select name="mineducation" id="mineducation" class="form-control" required="required">
                                <option>Select ... </option>
                                <option {{ $userPreferences->education_level == 0 ? 'selected' : '' }} value="0">Don't
                                    have
                                    Prefernece</option>
                                @foreach (educationLevel() as $key => $value)
                                <option {{ $userPreferences->education_level == $key ? 'selected' : '' }} value="{{ $key }}">{{
                                    $value }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('mineducation'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('mineducation') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="educationarea" class=" col-form-label">
                            Field /Area of Education
                            <span>*</span></label>
                        <div class="">
                            <select name="educationarea" id="educationarea" class="form-control" required="required">
                                <option>Select ... </option>
                                <option {{ $userPreferences->education_area == 0 ? 'selected' : '' }} value="0">Don't
                                    have
                                    Prefernece</option>
                                @foreach (educationarea() as $key => $value)
                                <option {{ $userPreferences->education_area == $key ? 'selected' : '' }} value="{{ $key }}">{{
                                    $value }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('educationarea'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('educationarea') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">

                    </div>
                </div>




                <div class="form-group row">
                    
                </div>


                <div class="form-group row">
                    <div class="col-xs-12">
                            <h5>Body  &  Apperance , Marragie and Children Information </h5>
                            <hr>
                    </div>
                    <div class="col-sm-6">
                        <label for="minage" class="col-form-label">
                            Minimum Age
                            <span>*</span></label>
                        <input value="{{ $userPreferences->age_minimun }}" id="minage" name="minage" placeholder="Minimum Age"
                            class="form-control here" type="text">
                        @if ($errors->has('minage'))
                        <span class="text-danger" role="alert">
                            <strong>{{ $errors->first('minage') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="col-sm-6">
                        <label for="maxage" class="col-form-label">
                            Maximum Age
                            <span>*</span></label>
                        <input value="{{ $userPreferences->age_maximum }}" id="maxage" name="maxage" placeholder="Maximum Age"
                            class="form-control here" type="text">
                        @if ($errors->has('maxage'))
                        <span class="text-danger" role="alert">
                            <strong>{{ $errors->first('maxage') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>



                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="height" class="col-form-label">Height

                        </label>
                        <input value="{{ $userPreferences->height }}" name="height" placeholder="Height in Feet" class="form-control"
                            type="text">

                        @if ($errors->has('height'))
                        <span class="text-danger" role="alert">
                            <strong>{{ $errors->first('height') }}</strong>
                        </span>
                        @endif

                    </div>


                    <div class="col-sm-6">
                        <label for="weight" class="col-form-label">Weight

                        </label>
                        <input value="{{ $userPreferences->weight }}" id="weight" name="weight" placeholder="Weight (in kg)"
                            class="form-control here" type="text">

                        @if ($errors->has('weight'))
                        <span class="text-danger" role="alert">
                            <strong>{{ $errors->first('weight') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">

                    <div class="col-sm-6">
                        <label for="bggroup" class="col-form-label">Blood Group

                        </label>
                        <select name="bggroup" id="input" class="form-control" required="required">
                            <option>Select ...</option>
                            <option {{ $userPreferences->blood_group == 0 ? 'selected' : '' }} value="0">Don't have
                                Prefernece</option>
                            @foreach (bloodGroups() as $key => $value)
                            <option {{ $userPreferences->blood_group == $key ? 'selected' : '' }} value="{{ $key }}">{{
                                $value }}</option>
                            @endforeach
                        </select>

                        @if ($errors->has('bggroup'))
                        <span class="text-danger" role="alert">
                            <strong>{{ $errors->first('bggroup') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="col-sm-6">
                        <label for="complexion" class="col-form-label">Complexion

                        </label>
                        <select name="complexion" id="input" class="form-control" required="required">
                            <option>Select ...</option>
                            <option {{ $userPreferences->complexion == 0 ? 'selected' : '' }} value="0">Don't have
                                Prefernece</option>
                            @foreach (complexion() as $key => $value)
                            <option {{ $userPreferences->complexion == $key ? 'selected' : '' }} value="{{ $key }}">{{
                                $value }}</option>
                            @endforeach
                        </select>

                        @if ($errors->has('complexion'))
                        <span class="text-danger" role="alert">
                            <strong>{{ $errors->first('complexion') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="bodytype" class="col-md-4 col-form-label">Body Type

                        </label>
                        <select name="bodytype" id="input" class="form-control" required="required">
                            <option>Select ...</option>
                            <option {{ $userPreferences->body_type == 0 ? 'selected' : '' }} value="0">Don't have
                                Prefernece</option>
                            @foreach (bodytype() as $key => $value)
                            <option {{ $userPreferences->body_type == $key ? 'selected' : '' }} value="{{ $key }}">{{
                                $value }}</option>
                            @endforeach
                        </select>

                        @if ($errors->has('bodytype'))
                        <span class=" text-danger" role="alert">
                            <strong>{{ $errors->first('bodytype') }}</strong>
                        </span>
                        @endif
                    </div>


                    <div class="col-sm-6">
                        <label for="diet" class="col-md-4 col-form-label">
                            Diet Type
                            <span>*</span></label>
                        <select name="diet" id="diet" class="form-control" required="required">
                            <option>Select ... </option>
                            <option {{ $userPreferences->diet == 0 ? 'selected' : '' }} value="0">Don't have Prefernece</option>
                            @foreach (diet() as $key => $item)
                            <option {{ $userPreferences->diet == $key ? 'selected' : '' }} value="{{ $key }}">{{ $item
                                }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('diet'))
                        <span class="text-danger" role="alert">
                            <strong>{{ $errors->first('diet') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>



                <div class="form-group row">

                    <div class="col-sm-6">
                        <label for="smoke" class="col-form-label margin-right-50">Smoker

                        </label>

                        <label class="margin-right-10">
                            <input {{ $userPreferences->smoking == 1 ? 'checked' : '' }} type="radio" name="smoke"
                                value="1">
                            No
                        </label>
                        <label class="margin-right-10">
                            <input {{ $userPreferences->smoking == 2 ? 'checked' : '' }} type="radio" name="smoke"
                                value="2">
                            Yes
                        </label>


                        @if ($errors->has('smoke'))
                        <span class="text-danger" role="alert">
                            <strong>{{ $errors->first('smoke') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="col-sm-6">
                        <label for="drinks" class="col-form-label margin-right-50">Drinks

                        </label>

                        <label class="margin-right-10">
                            <input {{ $userPreferences->drink == 1 ? 'checked' : '' }} type="radio" name="drinks" value="1">
                            No.
                        </label>
                        <label class="margin-right-10">
                            <input {{ $userPreferences->drink == 2 ? 'checked' : '' }} type="radio" name="drinks" value="2">
                            Yes.
                        </label>


                        @if ($errors->has('drinks'))
                        <span class="text-danger" role="alert">
                            <strong>{{ $errors->first('drinks') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>


                <div class="form-group row">
                <!--<h5></h5>
                    <hr>-->
                </div>

                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="wantchild" class=" col-form-label">Parnter Must Want Children</label>
                        <div class="">
                            <label>
                                <input {{ $userPreferences->children_allow == 1 ? 'checked' : '' }} type="radio" name="wantchild"
                                    value="1">
                                Yes
                            </label>
                            <label>
                                <input {{ $userPreferences->children_allow == 2 ? 'checked' : '' }} type="radio" name="wantchild"
                                    value="2">
                                No
                            </label>
                            @if ($errors->has('wantchild'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('wantchild') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6"></div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="mstatus" class="col-form-label">Marital Status
                        </label>
                        <div class="">
                            <select name="mstatus" id="input" class="form-control" required="required">
                                <option>Select ...</option>
                                <option {{ $userPreferences->marital_status == 0 ? 'selected' : '' }} value="0">Don't
                                    have
                                    Prefernece</option>
                                @foreach (maritalstatus() as $key => $value)
                                <option {{ $userPreferences->marital_status == $key ? 'selected' : '' }} value="{{ $key }}">{{
                                    $value }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('mstatus'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('mstatus') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="disability" class=" col-form-label">Disability
                        </label>
                        <div class="">
                            <label>
                                <input {{ $userPreferences->disability_allow == 1 ? 'checked' : '' }} type="radio" name="disablity"
                                    id="nodisability" value="1">
                                No.
                            </label>
                            <label>
                                <input {{ $userPreferences->disability_allow == 2 ? 'checked' : '' }} type="radio" name="disablity"
                                    id="yesdisability" value="2">
                                Yes.
                            </label>
                            @if ($errors->has('disability'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('disability') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    
                </div>


                <div class="form-group row">
                    <div class="col-xs-12">
                            <h5>Religiosity & Family and Address Preferenes</h5>
                            <hr>
                    </div>
                    <div class="col-sm-6">
                        <label for="religion" class="col-form-label">
                            Religion
                            <span>*</span>
                        </label>
                        <select name="religion" id="religion" class="form-control" required="required">
                            <option>Select ... </option>
                            <option {{ $userPreferences->religion == 0 ? 'selected' : '' }} value="0">Don't have
                                Prefernece</option>
                            @foreach (religion() as $key => $value)
                            <option {{ $userPreferences->religion == $key ? 'selected' : '' }} value="{{ $key }}">{{
                                $value }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('religion'))
                        <span class="text-danger" role="alert">
                            <strong>{{ $errors->first('religion') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="col-sm-6">
                        <div>
                            <label for="religious" class="col-form-label margin-right-50">
                                Partner should be Religious?
                            </label>
                        </div>
                        <label class="margin-right-10">
                            <input {{ $userPreferences->is_religious == 1 ? 'checked' : '' }} type="radio" name="religious"
                                value="1">
                            Yes.
                        </label>
                        <label class="margin-right-10">
                            <input {{ $userPreferences->is_religious == 2 ? 'checked' : '' }} type="radio" name="religious"
                                value="2">
                            No.
                        </label>
                        @if ($errors->has('religious'))
                        <span class="text-danger" role="alert">
                            <strong>{{ $errors->first('religious') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                @if (Auth::user()->religion === 1)
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label for="saypayers" class="col-form-label">How offen Says Prayer?
                        </label>
                        <select name="saypayers" id="input" class="form-control" required="required">
                            <option>Select ...</option>
                            <option {{ $userPreferences->saying_prayer == 0 ? 'selected' : '' }} value="0">Don't have
                                Prefernece</option>
                            @foreach (sayPayer() as $key => $value)
                            <option {{ $userPreferences->saying_prayer == $key ? 'selected' : '' }} value="{{ $key }}">{{
                                $value }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('saypayers'))
                        <span class="text-danger" role="alert">
                            <strong>{{ $errors->first('saypayers') }}</strong>
                        </span>
                        @endif
                    </div>
                    @if (Auth::user()->gender === 1)

                    <div class="col-sm-4">
                        <label for="wearhijab" class="col-form-label">Wear Hijab/Borka?
                        </label>
                        <div class="radio">
                            <label>
                                <input {{ $userPreferences->hijab == 1 ? 'checked' : '' }} type="radio" name="wearhijab"
                                    value="1">
                                Yes
                            </label>
                            <label>
                                <input {{ $userPreferences->hijab == 2 ? 'checked' : '' }} type="radio" name="wearhijab"
                                    value="2">
                                No
                            </label>
                        </div>

                        @if ($errors->has('wearhijab'))
                        <span class="text-danger" role="alert">
                            <strong>{{ $errors->first('wearhijab') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="col-sm-4">
                        <label for="willwearhijab" class="col-form-label">Wear Hijab/Borka after marrige?
                        </label>
                        <div class="radio">
                            <label>
                                <input {{ $userPreferences->hijab_after_marriage == 1 ? 'checked' : '' }} type="radio"
                                    name="willwearhijab" value="1">
                                Yes.
                            </label>
                            <label>
                                <input {{ $userPreferences->hijab_after_marriage == 2 ? 'checked' : '' }} type="radio"
                                    name="willwearhijab" value="2">
                                No.
                            </label>
                        </div>
                        @if ($errors->has('willwearhijab'))
                        <span class="text-danger" role="alert">
                            <strong>{{ $errors->first('willwearhijab') }}</strong>
                        </span>
                        @endif
                    </div>
                    @endif
                </div>
                @endif

                <div class="form-group row">
                    <div class="col-md-6">

                    </div>
                </div>

                <div class="form-group row">
                <!--<h5></h5>
                    <hr>-->
                </div>


                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="country" class=" col-form-label">
                            Partner Living Country
                            <span>*</span></label>
                        <div class="">
                            <select name="livingcountry" id="country" class="form-control" required="required">
                                <option>Select ... </option>
                                <option {{ $userPreferences->living_country == 0 ? 'selected' : '' }} value="0">Don't
                                    have
                                    Prefernece</option>
                                @foreach ($partnerCountry as $key => $value)
                                <option {{ $userPreferences->living_country == $value->id ? 'selected' : '' }} value="{{  $value->id }}">{{
                                    $value->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('livingcountry'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('livingcountry') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="resstatus" class=" col-form-label">
                            Residential Status
                            <span>*</span></label>
                        <div class="">
                            <div class="radio">
                                <label>
                                    <input {{ $userPreferences->expected_residential_status == 1 ? 'checked' : '' }}
                                        type="radio" class="resstatus" name="resstatus" value="1">
                                    <span>Don't Have Preference</span></label>
                                <label>
                                    <input {{ $userPreferences->expected_residential_status == 2 ? 'checked' : '' }}
                                        type="radio" class="resstatus" name="resstatus" value="2">

                                    <span>Owner</span></label>
                                <label>
                                    <input {{ $userPreferences->expected_residential_status == 3 ? 'checked' : '' }}
                                        type="radio" class="resstatus" name="resstatus" value="2">
                                    <span>Rental</span></label>
                            </div>
                            @if ($errors->has('resstatus'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('resstatus') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="partnerdistrict" class=" col-form-label">
                            Partner Living District / Area
                            <span>*</span></label>
                        <div class="">
                            <select name="partnerdistrict" id="partnerdistrict" class="form-control" required="required">
                                <option>Select ... </option>
                                <option {{ $userPreferences->expected_district_home == 0 ? 'selected' : '' }} value="0">Don't
                                    have Prefernece</option>
                                @foreach ($partnetDistricts as $value)
                                <option {{ $userPreferences->expected_district_home == $value->id ? 'selected' : '' }}
                                    value="{{ $value->id }}">{{
                                    $value->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('partnerdistrict'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('partnerdistrict') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="familydistrict" class=" col-form-label">
                            Home / Family District
                            <span>*</span></label>
                        <div class="">
                            <select name="familydistrict" id="familydistrict" class="form-control" required="required">
                                <option>Select ... </option>
                                <option {{ $userPreferences->expected_district_familty == 0 ? 'selected' : '' }} value="0">Don't
                                    have Prefernece</option>
                                @foreach ($partnetDistricts as $value)
                                <option
                                    {{ $userPreferences->expected_district_familty == $value->id ? 'selected' : '' }}
                                    value="{{ $value->id }}">{{
                                    $value->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('familydistrict'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('familydistrict') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="livingarea" class=" col-form-label">
                            Living In
                            <span>*</span></label>
                        <div class="">
                            <input value="{{ $userPreferences->expected_living_area }}" id="livingarea" name="livingarea"
                                placeholder="Lives In" class="form-control here" type="text">
                            @if ($errors->has('livingarea'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('livingarea') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="personalvalues" class=" col-form-label">
                            Partner Personal Values
                            <span>*</span></label>
                        <div class="">
                            <input value="{{ $userPreferences->personal_values }}" id="personalvalues" name="personalvalues"
                                placeholder="Partner Personal Values" class="form-control here" type="text">
                            @if ($errors->has('personalvalues'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('personalvalues') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>

            
                <div class="form-group row">
                    <div class="col-md-6">
                            <label for="familyvalues" class=" col-form-label">
                                    Family Personal Values
                                    <span>*</span></label>
                                <div class="">
                                    <input value="{{ $userPreferences->partner_family_values }}" id="familyvalues" name="familyvalues"
                                        placeholder="Family Personal Values" class="form-control here" type="text">
                                    @if ($errors->has('familyvalues'))
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $errors->first('familyvalues') }}</strong>
                                    </span>
                                    @endif
                                </div>
                    </div>
                    <div class="col-md-6"></div>
                   
                </div>

                <div class="form-group row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-large btn-block btn-success">Submit</button>
                    </div>
                </div>
            </form>

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


</script>
@endsection
