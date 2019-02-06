@extends('layouts.users')


@section('content')


<div class="col-md-9 card">
    @if($errors->any())
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        <strong>Personal Information not Saved.</strong> . Please try again with valid information.
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
            <span class="h3 bold-text">Personal Information</span>
        </div>
        <div class="panel-body">

            <h4>
                Add Personal Information
            </h4>
            <hr>
            <form method="POST" action="{{ route('users.editprofile.personal.save') }}" class="padding-0-30">
                @csrf

                <div class="form-group row">
                    <div class="col-xs-12">
                        <h5>General and Family Information</h5>
                        <hr>
                    </div>
                </div>

                <div class="form-group row">

                    <div class="col-md-6">
                        <label for="mothertongue" class=" col-form-label">Mother Tongue</label>
                        <div class="">
                            <select name="mothertongue" id="input" class="form-control" required="required">
                                <option value="">Select... </option>
                                @foreach (motherTongue() as $key => $value)
                                <option {{ old('mothertongue') == $key ? 'selected' : '' }} value="{{ $key }}">{{
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

                            <input value="{{ old('monthlyincome') }}" id="monthlyincome" name="monthlyincome"
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
                    <label for="livingcountry" class="col-md-6 col-form-label">Living Country</label>
                    <div class="col-md-6">
                        <select name="livingcountry" id="input" class="form-control" required="required">
                            <option value="">Select... </option>
                            @foreach ($countries as $item)
                            <option {{ old('livingcountry') == $item->id ? 'selected' : '' }} value="{{ $item->id }}">{{
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
                    <label for="familylivingcountry" class="col-md-6 col-form-label">Family Living Country</label>
                    <div class="col-md-6">
                        <select name="familylivingcountry" id="input" class="form-control" required="required">
                            <option value="">Select... </option>
                            @foreach ($countries as $item)
                            <option {{ old('familylivingcountry') == $item->id ? 'selected' : '' }} value="{{ $item->id }}">{{
                                $item->name }}</option>
                            @endforeach
                        </select>

                        @if ($errors->has('familylivingcountry'))
                        <span class="text-danger" role="alert">
                            <strong>{{ $errors->first('familylivingcountry') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="siblings" class="col-md-4 col-form-label">Do you have siblings?</label>
                    <div class="col-md-8">
                        <div class="radio">
                            <label>
                                <input {{ old('siblings') == 1 ? 'checked' : '' }} type="radio" name="siblings" class="siblings"
                                    id="havesiblings" value="1">
                                Yes.
                            </label>
                            <label>
                                <input {{ old('siblings') == 2 ? 'checked' : '' }} type="radio" name="siblings" class="siblings"
                                    id="nosiblings" value="2">
                                No.
                            </label>
                        </div>
                        @if ($errors->has('siblings'))
                        <span class="text-danger" role="alert">
                            <strong>{{ $errors->first('siblings') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">

                </div>

                <div class="form-group row">
                    <div class="col-xs-12">
                        <h5>Marragie , Children and Religiosity Information</h5>
                        <hr>
                    </div>
                    <div class="col-md-6">
                        <label for="wantchild" class=" col-form-label">Want Children</label>
                        <div class="">
                            <div class="radio">
                                <label>
                                    <input {{ old('wantchild') == 1 ? 'checked' : '' }} type="radio" name="wantchild"
                                        value="1">
                                    Yes
                                </label>
                                <label>
                                    <input {{ old('wantchild') == 2 ? 'checked' : '' }} type="radio" name="wantchild"
                                        value="2">
                                    No
                                </label>
                            </div>

                            @if ($errors->has('wantchild'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('wantchild') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        
                    </div>





                </div>

                <div class="form-group row">
                    <div class="col-sm-6">
                        <div id="maritalhideshow" style="display:none">
                            <!---maritalhideshow--->
                            <label for="haschildren" class=" col-form-label">Do you have Children</label>
                            <div class="">
                                <div class="radio">
                                    <label>
                                        <input class="classChildRadio" {{ old('haschildren') == 1 ? 'checked' : '' }}
                                            type="radio" name="haschildren" value="1">
                                        No.
                                    </label>
                                    <label>
                                        <input class="classChildRadio" {{ old('haschildren') == 2 ? 'checked' : '' }}
                                            type="radio" id="haschildren1" name="haschildren" value="2">
                                        Yes.
                                    </label>
                                </div>

                                @if ($errors->has('haschildren'))
                                <span class="text-danger" role="alert">
                                    <strong>{{ $errors->first('haschildren') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">

                        <!---maritalhideshow--->
                        <div id="childHideshow" style="display:none">
                            <!---childHideshow--->
                            
                        </div>
                        <!---childHideshow--->
                    </div>
                </div>


                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="religious" class=" col-form-label">Are you Religious?
                        </label>
                        <div class="">
                            <div class="radio">
                                <label>
                                    <input {{ old('religious') == 1? 'checked' : '' }} type="radio" name="religious"
                                        value="1">
                                    Yes; I am religious.
                                </label>
                                <label>
                                    <input {{ old('religious') == 2 ? 'checked' : '' }} type="radio" name="religious"
                                        value="2">
                                    No; I am not Religious.
                                </label>
                            </div>
                            @if ($errors->has('religious'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('religious') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="saypayers" class=" col-form-label">How offen you Say Prayer?
                        </label>
                        <div class="">
                            <select name="saypayers" id="input" class="form-control" required="required">
                                <option value="">Select...</option>
                                @foreach (sayPayer() as $key => $value)
                                <option {{ old('saypayers') == $key ? 'selected' : '' }} value="{{ $key }}">{{
                                    $value
                                    }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('saypayers'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('saypayers') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
                @if (Auth::user()->gender === 2)


                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="wearhijab" class="col-form-label">Do you wear Hijab/Borka?
                        </label>
                        <div class="">
                            <div class="radio">
                                <label>
                                    <input {{ old('wearhijab') == 1? 'checked' : '' }} type="radio" name="wearhijab"
                                        value="1">
                                    Yes
                                </label>
                                <label>
                                    <input {{ old('wearhijab') == 2? 'checked' : '' }} type="radio" name="wearhijab"
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
                    </div>
                    <div class="col-md-6">
                        <label for="willwearhijab" class=" col-form-label">Will you wear Hijab/Borka after marrige?
                        </label>
                        <div class="">
                            <div class="radio">
                                <label>
                                    <input {{ old('willwearhijab') == 1? 'checked' : '' }} type="radio" name="willwearhijab"
                                        value="1">
                                    Yes.
                                </label>
                                <label>
                                    <input {{ old('willwearhijab') == 2? 'checked' : '' }} type="radio" name="willwearhijab"
                                        value="2">
                                    No.
                                </label>
                            </div>
                            @if ($errors->has('willwearhijab'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('willwearhijab') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
                @endif

                <div class="form-group row">

                </div>

                <div class="form-group row">
                    <div class="col-xs-12">
                        <h5>Health & Habits , Body and Apperance Information </h5>
                        <hr>
                    </div>
                    <div class="col-md-4">
                        <label for="diet" class=" col-form-label">
                            Diet Type
                            <span>*</span>
                        </label>
                        <div class="">
                            <select name="diet" id="diet" class="form-control" required="required">
                                <option value="">Select ... </option>
                                @foreach (diet() as $key => $item)
                                <option {{ old('diet') == $key ? 'selected' : '' }} value="{{ $key }}">{{
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
                    <div class="col-md-4">
                        <label for="smoke" class=" col-form-label">Do you Smoke?
                        </label>
                        <div class="">
                            <div class="radio">
                                <label>
                                    <input {{ old('smoke') == 1? 'checked' : '' }} type="radio" name="smoke" value="1">
                                    No
                                </label>
                                <label>
                                    <input {{ old('smoke') == 2? 'checked' : '' }} type="radio" name="smoke" value="2">
                                    Yes
                                </label>
                            </div>
                            @if ($errors->has('smoke'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('smoke') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="drinks" class=" col-form-label">Do you Drink?
                        </label>
                        <div class="">
                            <div class="radio">
                                <label>
                                    <input {{ old('drinks') == 1? 'checked' : '' }} type="radio" name="drinks" value="1">
                                    No; I don't Drink.
                                </label>
                                <label>
                                    <input {{ old('drinks') == 2? 'checked' : '' }} type="radio" name="drinks" value="2">
                                    Yes; I Drink.
                                </label>
                            </div>
                            @if ($errors->has('drinks'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('drinks') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <!--<h5></h5>
                    <hr>-->
                </div>

                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="disability" class=" col-form-label">Disability
                        </label>
                        <div class="">
                            <div class="radio">
                                <label>
                                    <input class="classDisabilityRadio" {{ old('disablity') == 1? 'checked' : '' }}
                                        type="radio" name="disablity" id="nodisability" value="1">
                                    No; I have no disability.
                                </label>
                                <label>
                                    <input class="classDisabilityRadio" {{ old('disablity') == 2? 'checked' : '' }}
                                        type="radio" name="disablity" id="yesdisability" value="2">
                                    Yes; I have no disability.
                                </label>
                            </div>
                            @if ($errors->has('disablity'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('disablity') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div id="HideShowdisabilityRadio" style="display:none">
                            <!---HideShowdisabilityRadio--->
                            <label for="whatdisability" class=" col-form-label">Describe your disability.
                            </label>
                            <div class="">
                                <input value="{{ old('whatdisability') }}" id="whatdisability" name="whatdisability"
                                    placeholder="What disability(s) you have?" class="form-control here" type="text">
                                @if ($errors->has('whatdisability'))
                                <span class="text-danger" role="alert">
                                    <strong>{{ $errors->first('whatdisability') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <!---HideShowdisabilityRadio--->
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="height" class=" col-form-label">Height
                        </label>
                        <select name="height" id="input" class="form-control" required="required">
                            <option value="">Select Height ... </option>
                            @foreach (height() as $key => $value)
                            <option {{ old('height') == $key ? 'selected' : '' }} value="{{ $key }}">{{ $value
                                }}</option>
                            @endforeach
                        </select>

                        @if ($errors->has('height'))
                        <span class="text-danger" role="alert">
                            <strong>{{ $errors->first('height') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="col-md-4">
                        <label for="weight" class=" col-form-label">Weight
                        </label>
                        <div class="">
                            <input value="{{ old('weight') }}" id="weight" name="weight" placeholder="weight (in kg)"
                                class="form-control here" type="text">

                            @if ($errors->has('weight'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('weight') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="bggroup" class=" col-form-label">Blood Group
                        </label>
                        <div class="">
                            <select name="bggroup" id="input" class="form-control" required="required">
                                <option value="">Select Blood Group</option>
                                @foreach (bloodGroups() as $key => $value)
                                <option {{ old('bggroup') == $key ? 'selected' : '' }} value="{{ $key }}">{{
                                    $value
                                    }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('bggroup'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('bggroup') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="complexion" class=" col-form-label">Complexion
                        </label>
                        <div class="">
                            <select name="complexion" id="input" class="form-control" required="required">
                                <option value="">Select Complexion</option>
                                @foreach (complexion() as $key => $value)
                                <option {{ old('complexion') == $key ? 'selected' : '' }} value="{{ $key }}">{{
                                    $value
                                    }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('complexion'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('complexion') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="bodytype" class=" col-form-label">Body Type
                        </label>
                        <div class="">
                            <select name="bodytype" id="input" class="form-control" required="required">
                                <option value="">Select Body Type</option>
                                @foreach (bodytype() as $key => $value)
                                <option {{ old('bodytype') == $key ? 'selected' : '' }} value="{{ $key }}">{{
                                    $value
                                    }}</option>
                                @endforeach
                            </select>

                            @if ($errors->has('bodytype'))
                            <span class="
                                            text-danger" role="alert">
                                <strong>{{ $errors->first('bodytype') }}</strong>
                            </span>
                            @endif
                        </div>
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

        if ($('#haschildren1').is(':checked')) {
            $('#childHideshow').show(300);
        }


        if ($('.classMarital').val() > 1) {
            $('#maritalhideshow').show(300);
        } else {
            $('#maritalhideshow').hide(300);
        }

        //disability Check
        if ($('#yesdisability').is(':checked')) {
            $('#HideShowdisabilityRadio').show(300);
        } else {
            $('#HideShowdisabilityRadio').hide(300);
        }

        //  alert($('.classDisabilityRadio').checked().val());


        //disability Check
        $('.classDisabilityRadio').on('change', function () {
            //alert($(this).val());
            if ($(this).val() == 2) {
                $('#HideShowdisabilityRadio').show(300);
            } else {
                $('#HideShowdisabilityRadio').hide(300);
            }
        })
        //disability Check

        $('.classChildRadio').on('change', function () {
            if (parseInt($(this).val()) == 2) {
                $('#childHideshow').show(300);
            } else {
                $('#childHideshow').hide(300);
            }
        })
        $('.classMarital').on('change', function () {
            if ($(this).val() > 1) {
                $('#maritalhideshow').show(300);
            } else {
                $('#maritalhideshow').hide(300);
                $('#childHideshow').hide(300);
            }
        })
    });

</script>
@endsection
