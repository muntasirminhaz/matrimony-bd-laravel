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
            <span class="h3 bold-text">Edit Bride (Partner) Preferences</span>
            <a type="button" href="{{ route('users.editprofile.partner.view') }}" class="btn btn-danger btn-sm pull-right"><span
                    class="edit-icon fa fa-backward"></span> Cancel Edit</a>
        </div>
        <div class="panel-body">


   
            <form id="insertpreference" method="POST" action="{{ route('users.editprofile.partner.update', $userid) }}"
                class="padding-0-30" style="display: block;">
                @csrf
                <div class="form-group row">
                    <label for="minage" class="col-md-4 col-form-label">
                        Minimum Age
                        <span>*</span></label>
                    <div class="col-md-8">
                        <input value="{{ $userinfo->age_minimun }}" id="minage" name="minage" placeholder="Minimum Age"
                            class="form-control here" type="text">
                        @if ($errors->has('minage'))
                        <span class="text-danger" role="alert">
                            <strong>{{ $errors->first('minage') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="maxage" class="col-md-4 col-form-label">
                        Maximum Age
                        <span>*</span></label>
                    <div class="col-md-8">
                        <input value="{{ $userinfo->age_maximum }}" id="maxage" name="maxage" placeholder="Maximum Age"
                            class="form-control here" type="text">
                        @if ($errors->has('maxage'))
                        <span class="text-danger" role="alert">
                            <strong>{{ $errors->first('maxage') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>


                <div class="form-group row">
                    <label for="religion" class="col-md-4 col-form-label">
                        Religion
                        <span>*</span></label>
                    <div class="col-md-8">
                        <select name="religion" id="religion" class="form-control" required="required">
                            <option>Select ... </option>

                            @foreach ($religion as $key => $value)
                            <option {{ $userinfo->religion == $key ? 'selected' : '' }} value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('religion'))
                        <span class="text-danger" role="alert">
                            <strong>{{ $errors->first('religion') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="maritalstatus" class="col-md-4 col-form-label">
                        Marital Status
                        <span>*</span></label>
                    <div class="col-md-8">
                        <select name="maritalstatus" id="maritalstatus" class="form-control" required="required">
                            <option>Select ... </option>

                            @foreach ($maritalstatus as $key => $value)
                            <option {{ $userinfo->marital_status == $key ? 'selected' : '' }} value="{{ $key }}">{{
                                $value }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('maritalstatus'))
                        <span class="text-danger" role="alert">
                            <strong>{{ $errors->first('maritalstatus') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="personaladdress" class="col-md-4 col-form-label">
                        Take Children
                        <span>*</span>
                    </label>
                    <div class="col-md-8">
                        <div class="radio">
                            <label>
                                <input {{ $userinfo->children_allow == 1 ? 'checked' : ''  }} type="radio" class="child"
                                    name="child" value="1">
                                <span>Yes</span></label>
                            <label>
                                <input {{ $userinfo->children_allow == 2 ? 'checked' : ''  }} type="radio" class="child"
                                    name="child" value="2">
                                <span>No</span></label>
                        </div>
                        @if ($errors->has('fname'))
                        <span class="text-danger" role="alert">
                            <strong>{{ $errors->first('child') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>



                <div class="form-group row">
                    <label for="mineducation" class="col-md-4 col-form-label">
                        Min Education level
                        <span>*</span></label>
                    <div class="col-md-8">
                        <select name="mineducation" id="mineducation" class="form-control" required="required">
                            <option>Select ... </option>

                            @foreach ($educationLevel as $key => $value)
                            <option {{ $userinfo->education_level == $key ? 'selected' : '' }} value="{{ $key }}">{{
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


                <div class="form-group row">
                    <label for="educationarea" class="col-md-4 col-form-label">
                        Field /Area of Education
                        <span>*</span></label>
                    <div class="col-md-8">
                        <select name="educationarea" id="educationarea" class="form-control" required="required">
                            <option>Select ... </option>

                            @foreach ($educationarea as $key => $value)
                            <option {{ $userinfo->education_area == $key ? 'selected' : '' }} value="{{ $key }}">{{
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



                <div class="form-group row">
                    <h4>Profression and Job</h4>
                    <hr>
                </div>

                <div class="form-group row">
                    <label for="profession" class="col-md-4 col-form-label">
                        Profession Type
                        <span>*</span></label>
                    <div class="col-md-8 autocomplete">
                        <select name="profession" id="profession" class="form-control" required="required">
                            <option>Select ...</option>
                            <option value="0">Select Profession Type</option>
                            @foreach ($professionType as $key => $value)
                            <option {{ $userinfo->profession == $key ? 'selected' : '' }} value="{{ $key }}">{{ $value
                                }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('profession'))
                        <span class="text-danger" role="alert">
                            <strong>{{ $errors->first('profession') }}</strong>
                        </span>
                        @endif

                    </div>
                </div>

                <div class="form-group row">
                    <h4>aaaaa</h4>
                    <hr>
                </div>
                <div class="form-group row">
                    <label for="height" class="col-md-4 col-form-label">
                        Height
                        <span>*</span></label>
                    <div class="col-md-8">
                        <input value="{{ $userinfo->height }}" id="height" name="height" placeholder="Height" class="form-control here"
                            type="text">
                        @if ($errors->has('height'))
                        <span class="text-danger" role="alert">
                            <strong>{{ $errors->first('height') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="complextion" class="col-md-4 col-form-label">
                        Complextion
                        <span>*</span></label>
                    <div class="col-md-8">
                        <select name="complextion" id="complextion" class="form-control" required="required">
                            <option>Select ... </option>

                            @foreach ($complextion as $key => $value)
                            <option {{ $userinfo->complexion == $key ? 'selected' : '' }} value="{{ $key }}">{{ $value
                                }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('complextion'))
                        <span class="text-danger" role="alert">
                            <strong>{{ $errors->first('complextion') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>


                <div class="form-group row">
                    <label for="payer" class="col-md-4 col-form-label">
                        Says Payer
                        <span>*</span></label>
                    <div class="col-md-8">
                        <div class="radio">
                            <label>
                                <input {{ $userinfo->saying_prayer == 1 ? 'checked' : ''  }} type="radio" class="payer"
                                    name="payer" value="1">
                                <span>Yes</span></label>
                            <label>
                                <input {{ $userinfo->saying_prayer == 2 ? 'checked' : ''  }} type="radio" class="payer"
                                    name="payer" value="2">
                                <span>No</span></label>
                        </div>
                        @if ($errors->has('payer'))
                        <span class="text-danger" role="alert">
                            <strong>{{ $errors->first('payer') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="bridejoballow" class="col-md-4 col-form-label">
                        Bride Allowed to Job
                        <span>*</span></label>
                    <div class="col-md-8">
                        <div class="radio">
                            <label>
                                <input {{ $userinfo->job_allow_for_bride == 1 ? 'checked' : ''  }} type="radio" class="bridejoballow"
                                    name="bridejoballow" value="1">
                                <span>Yes</span></label>

                            <label>
                                <input {{ $userinfo->job_allow_for_bride == 2 ? 'checked' : ''  }} type="radio" class="bridejoballow"
                                    name="bridejoballow" value="2">
                                <span>No</span></label>
                        </div>
                        @if ($errors->has('bridejoballow'))
                        <span class="text-danger" role="alert">
                            <strong>{{ $errors->first('bridejoballow') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="bridehijab" class="col-md-4 col-form-label">
                        Wears Hijab and Burka
                        <span>*</span></label>
                    <div class="col-md-8">
                        <div class="radio">
                            <label>
                                <input {{ $userinfo->children_allow == 1 ? 'checked' : ''  }} type="radio" class="bridehijab"
                                    name="bridehijab" value="1">
                                <span>Yes</span></label>
                            <label>
                                <input {{ $userinfo->children_allow == 2 ? 'checked' : ''  }} type="radio" class="bridehijab"
                                    name="bridehijab" value="2">
                                <span>No</span></label>
                        </div>
                        @if ($errors->has('bridehijab'))
                        <span class="text-danger" role="alert">
                            <strong>{{ $errors->first('bridehijab') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="diet" class="col-md-4 col-form-label">
                        Diet Type
                        <span>*</span></label>
                    <div class="col-md-8">
                        <select name="diet" id="diet" class="form-control" required="required">
                            <option>Select ... </option>
                            @foreach (diet() as $key => $item)
                            <option {{ $userinfo->diet == $key ? 'selected' : ''  }} value="{{ $key }}">{{
                                $item }}</option>
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
                    <label for="drinks" class="col-md-4 col-form-label">
                        Drinks
                        <span>*</span></label>
                    <div class="col-md-8">
                        <div class="radio">
                            <label>
                                <input {{ $userinfo->drink == 1 ? 'checked' : ''  }} type="radio" class="drinks" name="drinks"
                                    value="1">
                                <span>Yes</span></label>
                            <label>
                                <input {{ $userinfo->drink == 2 ? 'checked' : ''  }} type="radio" class="drinks" name="drinks"
                                    value="2">
                                <span>No</span></label>
                        </div>
                        @if ($errors->has('drinks'))
                        <span class="text-danger" role="alert">
                            <strong>{{ $errors->first('drinks') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="smoke" class="col-md-4 col-form-label">
                        Smoker
                        <span>*</span></label>
                    <div class="col-md-8">
                        <div class="radio">
                            <label>
                                <input {{ $userinfo->smoking == 1 ? 'checked' : ''  }} type="radio" class="smoke" name="smoke"
                                    value="1">
                                <span>Yes</span></label>
                            <label>
                                <input {{ $userinfo->smoking == 2 ? 'checked' : ''  }} type="radio" class="smoke" name="smoke"
                                    value="2">
                                <span>No</span></label>
                        </div>
                        @if ($errors->has('smoke'))
                        <span class="text-danger" role="alert">
                            <strong>{{ $errors->first('smoke') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="disability" class="col-md-4 col-form-label">
                        Allow Partner Disability
                        <span>*</span></label>
                    <div class="col-md-8">
                        <div class="radio">
                            <label>
                                <input {{ $userinfo->disability_allow == 1 ? 'checked' : ''  }} type="radio" class="disability"
                                    name="disability" value="1">
                                <span>Yes</span></label>
                            <label>
                                <input {{ $userinfo->disability_allow == 2 ? 'checked' : ''  }} type="radio" class="disability"
                                    name="disability" value="2">
                                <span>No</span></label>
                        </div>
                        @if ($errors->has('disability'))
                        <span class="text-danger" role="alert">
                            <strong>{{ $errors->first('disability') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="mothertongue" class="col-md-4 col-form-label">
                        Mother Tongue
                        <span>*</span></label>
                    <div class="col-md-8">
                        <select name="mothertongue" id="mothertongue" class="form-control" required="required">
                            <option>Select ... </option>

                            @foreach ($motherTongue as $key => $value)
                            <option {{ $userinfo->mother_tongue == $key ? 'selected' : '' }} value="{{ $key }}">{{
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
                <div class="form-group row">
                    <label for="country" class="col-md-4 col-form-label">
                        Partner Living Country
                        <span>*</span></label>
                    <div class="col-md-8">
                        <select name="livingcountry" id="country" class="form-control" required="required">
                            <option>Select ... </option>
                            @foreach ($partnerCountry as $item)
                            <option {{ $userinfo->living_country  == $item->id ? 'selected' : '' }} value="{{ $item->id }}">{{
                                $item->name }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('livingcountry'))
                        <span class="text-danger" role="alert">
                            <strong>{{ $errors->first('livingcountry') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="resstatus" class="col-md-4 col-form-label">
                        Residential Status
                        <span>*</span></label>
                    <div class="col-md-8">
                        <div class="radio">
                            <label>
                                <input {{ $userinfo->expected_residential_status == 1 ? 'checked' : ''  }} type="radio"
                                    class="resstatus" name="resstatus" value="1">
                                <span>Don't Have Preference</span></label>
                            <label>
                                <input {{ $userinfo->expected_residential_status == 2 ? 'checked' : ''  }} type="radio"
                                    class="resstatus" name="resstatus" value="2">

                                <span>Owner</span></label>
                            <label>
                                <input {{ $userinfo->expected_residential_status == 3 ? 'checked' : ''  }} type="radio"
                                    class="resstatus" name="resstatus" value="2">

                                <span>Rental</span></label>
                        </div>
                        @if ($errors->has('resstatus'))
                        <span class="text-danger" role="alert">
                            <strong>{{ $errors->first('resstatus') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="partnerdistrict" class="col-md-4 col-form-label">
                        Partner Living District / Area
                        <span>*</span></label>
                    <div class="col-md-8">
                        <select name="partnerdistrict" id="partnerdistrict" class="form-control" required="required">
                            <option>Select ... </option>
                            @foreach ($partnetDistricts as $item)
                            <option {{ $userinfo->expected_district_home  == $item->id ? 'selected' : '' }} value="{{ $item->id }}">{{
                                $item->name }}</option>
                            @endforeach

                        </select>
                        @if ($errors->has('partnerdistrict'))
                        <span class="text-danger" role="alert">
                            <strong>{{ $errors->first('partnerdistrict') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="familydistrict" class="col-md-4 col-form-label">
                        Home / Family District
                        <span>*</span></label>
                    <div class="col-md-8">
                        <select name="familydistrict" id="familydistrict" class="form-control" required="required">
                            <option>Select ... </option>
                            @foreach ($partnetDistricts as $item)
                            <option {{ $userinfo->expected_district_familty  == $item->id ? 'selected' : '' }} value="{{ $item->id }}">{{
                                $item->name }}</option>
                            @endforeach

                        </select>
                        @if ($errors->has('familydistrict'))
                        <span class="text-danger" role="alert">
                            <strong>{{ $errors->first('familydistrict') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="livingarea" class="col-md-4 col-form-label">
                        Living In
                        <span>*</span></label>
                    <div class="col-md-8">
                        <input value="{{ $userinfo->expected_living_area }}" id="livingarea" name="livingarea"
                            placeholder="Lives In" class="form-control here" type="text">
                        @if ($errors->has('livingarea'))
                        <span class="text-danger" role="alert">
                            <strong>{{ $errors->first('livingarea') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>


                <div class="form-group row">
                    <label for="montlyincome" class="col-md-4 col-form-label">
                        Montly Income
                        <span>*</span></label>
                    <div class="col-md-8">
                        <input value="{{ $userinfo->montly_income }}" id="montlyincome" name="montlyincome" placeholder="Montly Income"
                            class="form-control here" type="text">
                        @if ($errors->has('montlyincome'))
                        <span class="text-danger" role="alert">
                            <strong>{{ $errors->first('montlyincome') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="personalvalues" class="col-md-4 col-form-label">
                        Partner Personal Values
                        <span>*</span></label>
                    <div class="col-md-8">
                        <input value="{{ $userinfo->personal_values }}" id="personalvalues" name="personalvalues"
                            placeholder="Partner Personal Values" class="form-control here" type="text">
                        @if ($errors->has('personalvalues'))
                        <span class="text-danger" role="alert">
                            <strong>{{ $errors->first('personalvalues') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="familyvalues" class="col-md-4 col-form-label">
                        Family Personal Values
                        <span>*</span></label>
                    <div class="col-md-8">
                        <input value="{{ $userinfo->partner_family_values }}" id="familyvalues" name="familyvalues"
                            placeholder="Family Personal Values" class="form-control here" type="text">
                        @if ($errors->has('familyvalues'))
                        <span class="text-danger" role="alert">
                            <strong>{{ $errors->first('familyvalues') }}</strong>
                        </span>
                        @endif
                    </div>
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
    $(function () {
        $('.show-userinfoo').show(0);
        $('.show-form').hide(0);
        $('#toggle-form').on('click', function () {
            $('.show-userinfoo').toggle(300);
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
