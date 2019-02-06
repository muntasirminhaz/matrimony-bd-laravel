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
            <span class="h3 bold-text">Add Partner Preference Information</span>

        </div>
        <div class="panel-body">


            <div class="table-responsive show-userinfo">
                <table class="table table-light">
                    <tbody>

                    </tbody>
                </table>
            </div>

            <form id="insertpreference" method="POST" action="{{ route('users.editprofile.partner.store') }}" class="padding-0-30"
                style="display: block;">
                @csrf


                <div class="form-group row">
                </div>

                <div class="form-group row">
                    <div class="col-xs-12">
                        <h5>General Information , Education and Profression</h5>
                        <hr>
                    </div>
                    <div class="col-md-6">
                        <label for="mothertongue" class=" col-form-label">Mother Tongue</label>
                        <div class="">
                            <select name="mothertongue" id="input" class="form-control" required="required">
                                <option>Select ... </option>
                                <option value="0">Don't have Prefernece</option>
                                @foreach (mothertongue() as $key => $value)
                                <option {{ old('mothertongue') == $key ?'selected':'' }} value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>

                            @if ($errors->has('mothertongue'))
                            <p class="text-danger" role="alert">
                                <strong>{{ $errors->first('mothertongue') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="monthlyincome" class=" col-form-label">Monthly Income
                        </label>
                        <div class="">
                            <input value="{{ old('monthlyincome') }}" id="monthlyincome" name="monthlyincome" placeholder="What's your monthly income?"
                                class="form-control here" type="text">
                            @if ($errors->has('monthlyincome'))
                            <p class="text-danger" role="alert">
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
                                    <input {{ old('bridejoballow') ==1 ?'checked':'' }} type="radio" class="bridejoballow" name="bridejoballow" value="1">
                                    <span>Yes</span></label>

                                <label>
                                    <input {{ old('bridejoballow') ==2 ?'checked':'' }} type="radio" class="bridejoballow" name="bridejoballow" value="2">
                                    <span>No</span></label>
                            </div>
                            @if ($errors->has('bridejoballow'))
                            <p class="text-danger" role="alert">
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
                                <option value="0">No Preference</option>
                                @foreach ($professionType as $key => $value)
                                <option {{ old('profession') == $key?'selected':'' }} value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('profession'))
                            <p class="text-danger" role="alert">
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
                                <option value="0">Don't have Prefernece</option>
                                @foreach (educationLevel() as $key => $value)
                                <option {{ old('mineducation') == $key?'selected':'' }} value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('mineducation'))
                            <p class="text-danger" role="alert">
                                <strong>{{ $errors->first('mineducation') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group row">

                </div>


                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="educationarea" class=" col-form-label">
                            Field /Area of Education
                            <span>*</span></label>
                        <div class="">
                            <select name="educationarea" id="educationarea" class="form-control" required="required">
                                <option>Select ... </option>
                                <option value="0">Don't have Prefernece</option>
                                @foreach (educationarea() as $key => $value)
                                <option {{ old('educationarea') == $key?'selected':'' }} value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('educationarea'))
                            <p class="text-danger" role="alert">
                                <strong>{{ $errors->first('educationarea') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6"></div>
                </div>




                <div class="form-group row">

                </div>


                <div class="form-group row">
                    <div class="col-xs-12">
                        <h5>Body & Apperance , Marragie and Children Information</h5>
                        <hr>
                    </div>
                    
                </div>







                <div class="form-group row">

                    <div class="col-sm-6">
                        <label for="height" class="col-form-label">Height

                        </label>
                        <select name="height"  class="form-control" required="required">
                                <option>Select ...</option>
                                <option value="0">Don't have Prefernece</option>
                                @foreach (height() as $key => $value)
                                <option {{ old('height') == $key?'selected':'' }} value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>

                        @if ($errors->has('height'))
                        <p class="text-danger" role="alert">
                            <strong>{{ $errors->first('height') }}</strong>
                        </p>
                        @endif

                    </div>


                    <div class="col-sm-6">
                        <label for="weight" class="col-form-label">Weight

                        </label>
                        <input value="{{ old('weight') }}" id="weight" name="weight" placeholder="Weight (in kg)" class="form-control here"
                            type="text">

                        @if ($errors->has('weight'))
                        <p class="text-danger" role="alert">
                            <strong>{{ $errors->first('weight') }}</strong>
                        </p>
                        @endif
                    </div>
                </div>

                <div class="form-group row">

                </div>

                <div class="form-group row">

                    <div class="col-sm-6">
                        <label for="bggroup" class="col-form-label">Blood Group

                        </label>
                        <select name="bggroup" id="input" class="form-control" required="required">
                            <option>Select ...</option>
                            <option value="0">Don't have Prefernece</option>
                            @foreach (bloodGroups() as $key => $value)
                            <option {{ old('bggroup') == $key?'selected':'' }} value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>

                        @if ($errors->has('bggroup'))
                        <p class="text-danger" role="alert">
                            <strong>{{ $errors->first('bggroup') }}</strong>
                        </p>
                        @endif
                    </div>
                    <div class="col-sm-6">
                        <label for="complexion" class="col-form-label">Complexion

                        </label>
                        <select name="complexion" id="input" class="form-control" required="required">
                            <option>Select ...</option>
                            <option value="0">Don't have Prefernece</option>
                            @foreach (complexion() as $key => $value)
                            <option {{ old('complexion') == $key?'selected':'' }} value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>

                        @if ($errors->has('complexion'))
                        <p class="text-danger" role="alert">
                            <strong>{{ $errors->first('complexion') }}</strong>
                        </p>
                        @endif
                    </div>
                </div>



                <div class="form-group row">

                    <div class="col-sm-6">
                        <label for="bodytype" class="col-md-4 col-form-label">Body Type

                        </label>
                        <select name="bodytype" id="input" class="form-control" required="required">
                            <option>Select ...</option>
                            <option value="0">Don't have Prefernece</option>
                            @foreach (bodytype() as $key => $value)
                            <option {{ old('bodytype') == $key ?'selected':'' }} value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>

                        @if ($errors->has('bodytype'))
                        <p class=" text-danger" role="alert">
                            <strong>{{ $errors->first('bodytype') }}</strong>
                        </p>
                        @endif
                    </div>


                    <div class="col-sm-6">
                        <label for="diet" class="col-md-4 col-form-label">
                            Diet Type
                            <span>*</span></label>
                        <select name="diet" id="diet" class="form-control" required="required">
                            <option>Select ... </option>
                            <option value="0">Don't have Prefernece</option>
                            @foreach (diet() as $key => $item)
                            <option {{ old('diet') == $key ? 'selected' : '' }} value="{{ $key }}">{{ $item }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('diet'))
                        <p class="text-danger" role="alert">
                            <strong>{{ $errors->first('diet') }}</strong>
                        </p>
                        @endif
                    </div>
                </div>



                <div class="form-group row">

                    <div class="col-sm-6">
                        <label for="smoke" class="col-form-label margin-right-50">Smoker

                        </label>

                        <label class="margin-right-10">
                        <input {{ old('smoke') == 1 ? 'checked' : '' }} type="radio" name="smoke" value="1">
                            No
                        </label>
                        <label class="margin-right-10">
                        <input {{ old('smoke') == 2 ? 'checked' : '' }} type="radio" name="smoke" value="2">
                            Yes
                        </label>
                        

                        @if ($errors->has('smoke'))
                        <p class="text-danger" role="alert">
                            <strong>{{ $errors->first('smoke') }}</strong>
                        </p>
                        @endif
                    </div>

                    <div class="col-sm-6">
                        <label for="drinks" class="col-form-label margin-right-50">Drinks

                        </label>

                        <label class="margin-right-10">
                            <input {{ old('drinks') == 1 ? 'checked' :'' }} type="radio" name="drinks" value="1">
                            No.
                        </label>
                        <label class="margin-right-10">
                            <input {{ old('drinks') == 2 ? 'checked' :'' }} type="radio" name="drinks" value="2">
                            Yes.
                        </label>


                        @if ($errors->has('drinks'))
                        <p class="text-danger" role="alert">
                            <strong>{{ $errors->first('drinks') }}</strong>
                        </p>
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
                                <input {{ old('wantchild') == 1 ? 'checked' : '' }} type="radio" name="wantchild" value="1">
                                Yes
                            </label>
                            <label>
                                <input {{ old('wantchild') == 2 ? 'checked' : '' }} type="radio" name="wantchild" value="2">
                                No
                            </label>
                            @if ($errors->has('wantchild'))
                            <p class="text-danger" role="alert">
                                <strong>{{ $errors->first('wantchild') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="mstatus" class=" col-form-label">Marital Status
                        </label>
                        <div class="">
                            <select name="mstatus" id="input" class="form-control" required="required">
                                <option>Select ...</option>
                                <option value="0">Don't have Prefernece</option>
                                @foreach (maritalstatus() as $key => $value)
                                <option {{ old('mstatus') == $key ? 'selected' : '' }} value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('mstatus'))
                            <p class="text-danger" role="alert">
                                <strong>{{ $errors->first('mstatus') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                </div>

                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="disability" class="col-form-label">Disability
                        </label>
                        <div class="">
                            <label>
                                <input {{ old('disablity') == 1 ? 'checked' :'' }} type="radio" name="disablity" id="nodisability" value="1">
                                No.
                            </label>
                            <label>
                                <input {{ old('disablity') == 2 ? 'checked' :'' }} type="radio" name="disablity" id="yesdisability" value="2">
                                Yes.
                            </label>
                            @if ($errors->has('disability'))
                            <p class="text-danger" role="alert">
                                <strong>{{ $errors->first('disability') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6"></div>
                </div>


                <div class="form-group row">

                </div>


                <div class="form-group row">
                    <div class="col-xs-12">
                        <h5>Religiosity , Family and Address Preferenes</h5>
                        <hr>
                    </div>
                    <div class="col-sm-6">
                        <label for="religion" class="col-form-label">
                            Religion
                            <span>*</span>
                        </label>
                        <select name="religion" id="religion" class="form-control" required="required">
                            <option>Select ... </option>
                            <option value="0">Don't have Prefernece</option>
                            @foreach (religion() as $key => $value)
                            <option {{ old('religion') == $key ? 'selected' : '' }} value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('religion'))
                        <p class="text-danger" role="alert">
                            <strong>{{ $errors->first('religion') }}</strong>
                        </p>
                        @endif
                    </div>


                    <div class="col-sm-6">
                        <div>
                            <label for="religious" class="col-form-label margin-right-50">
                                Partner should be Religious?
                            </label>
                        </div>
                        <label class="margin-right-10">
                            <input {{ old('religious') == 1 ? 'checked' : '' }} type="radio" name="religious" value="1">
                            Yes.
                        </label>
                        <label class="margin-right-10">
                            <input {{ old('religious') == 2 ? 'checked' : '' }} type="radio" name="religious" value="2">
                            No.
                        </label>

                        @if ($errors->has('religious'))
                        <p class="text-danger" role="alert">
                            <strong>{{ $errors->first('religious') }}</strong>
                        </p>
                        @endif
                    </div>
                </div>

                @if (Auth::user()->religion === 1)
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="saypayers" class="col-form-label">How offen Says Prayer?
                        </label>
                        <select name="saypayers" id="input" class="form-control" required="required">
                            <option>Select ...</option>
                            <option value="0">Don't have Prefernece</option>
                            @foreach (sayPayer() as $key => $value)
                            <option {{ old('saypayers') == $key ? 'selected' : '' }} value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>

                        @if ($errors->has('saypayers'))
                        <p class="text-danger" role="alert">
                            <strong>{{ $errors->first('saypayers') }}</strong>
                        </p>
                        @endif
                    </div>
                    @if (Auth::user()->gender === 1)

                    <div class="col-sm-6">
                        <label for="wearhijab" class="col-form-label">Wear Hijab/Borka?
                        </label>
                        <div class="radio">
                            <label>
                                <input {{ old('wearhijab') == 1 ? 'checked' :'' }} type="radio" name="wearhijab" value="1">
                                Yes
                            </label>
                            <label>
                                <input {{ old('wearhijab') == 2 ? 'checked' :'' }} type="radio" name="wearhijab" value="2">
                                No
                            </label>
                        </div>
                        @if ($errors->has('wearhijab'))
                        <p class="text-danger" role="alert">
                            <strong>{{ $errors->first('wearhijab') }}</strong>
                        </p>
                        @endif
                    </div>
                    @endif
                </div>
                <div class="form-gorup rop">
                    <div class="col-md-6">
                        <div class="">
                            <label for="willwearhijab" class="col-form-label">Wear Hijab/Borka after marrige?
                            </label>
                            <div class="radio">
                                <label>
                                    <input {{ old('willwearhijab') == 1 ? 'checked' :'' }} type="radio" name="willwearhijab" value="1">
                                    Yes.
                                </label>
                                <label>
                                    <input {{ old('willwearhijab') == 2 ? 'checked' :'' }} type="radio" name="willwearhijab" value="2">
                                    No.
                                </label>
                            </div>
                            @if ($errors->has('willwearhijab'))
                            <p class="text-danger" role="alert">
                                <strong>{{ $errors->first('willwearhijab') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="resstatus" class=" col-form-label">
                            Residential Status
                            <span>*</span>
                        </label>
                        <div class="">
                            <div class="radio">
                                <label>
                                    <input {{ old('resstatus') == 1 ? 'checked' : '' }} type="radio" class="resstatus" name="resstatus" value="1">
                                    <span>Don't Have Preference</span></label>
                                <label>
                                    <input {{ old('resstatus') == 2 ? 'checked' : '' }} type="radio" class="resstatus" name="resstatus" value="2">

                                    <span>Owner</span></label>
                                <label>
                                    <input {{ old('resstatus') == 3 ? 'checked' : '' }} type="radio" class="resstatus" name="resstatus" value="3">

                                    <span>Rental</span></label>
                            </div>
                            @if ($errors->has('resstatus'))
                            <p class="text-danger" role="alert">
                                <strong>{{ $errors->first('resstatus') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
                @endif
                <div class="form-group row">
                    <!--<h5></h5>
                    <hr>-->
                </div>


                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="country" class="col-form-label">
                            Partner Living Country
                            <span>*</span>
                        </label>
                        <div class="">
                            <select name="livingcountry" id="country" class="form-control" required="required">
                                <option>Select ... </option>
                                <option value="0">Don't have Prefernece</option>
                                @foreach ($partnerCountry as $key => $value)
                                <option {{ old('saypayers') == $key ? 'selected' : '' }} value="{{  $value->id }}">{{ $value->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('livingcountry'))
                            <p class="text-danger" role="alert">
                                <strong>{{ $errors->first('livingcountry') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="partnerdistrict" class=" col-form-label">
                            Partner Living District / Area
                            <span>*</span></label>
                        <div class="">
                            <select name="partnerdistrict" id="partnerdistrict" class="form-control" required="required">
                                <option>Select ... </option>
                                <option value="0">Don't have Prefernece</option>
                                @foreach ($partnetDistricts as $value)
                                <option {{ old('partnerdistrict') == $value->id ? 'selected' : '' }} value="{{ $value->id }}">{{ $value->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('partnerdistrict'))
                            <p class="text-danger" role="alert">
                                <strong>{{ $errors->first('partnerdistrict') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="familydistrict" class="col-form-label">
                            Home / Family District
                            <span>*</span></label>
                        <div class="">
                            <select name="familydistrict" id="familydistrict" class="form-control" required="required">
                                <option>Select ... </option>
                                <option value="0">Don't have Prefernece</option>
                                @foreach ($partnetDistricts as $value)
                                <option {{ old('familydistrict') == $value->id ? 'selected' : '' }} value="{{ $value->id }}">{{ $value->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('familydistrict'))
                            <p class="text-danger" role="alert">
                                <strong>{{ $errors->first('familydistrict') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="livingarea" class=" col-form-label">
                            Living In
                            <span>*</span></label>
                        <div class="">
                            <input value="{{ old('livingarea') }}" id="livingarea" name="livingarea" placeholder="Lives In"
                                class="form-control here" type="text">
                            @if ($errors->has('livingarea'))
                            <p class="text-danger" role="alert">
                                <strong>{{ $errors->first('livingarea') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="personalvalues" class=" col-form-label">
                            Partner Personal Values
                            <span>*</span></label>
                        <div class="">
                            <input value="{{ old('personalvalues') }}" id="personalvalues" name="personalvalues"
                                placeholder="Partner Personal Values" class="form-control here" type="text">
                            @if ($errors->has('personalvalues'))
                            <p class="text-danger" role="alert">
                                <strong>{{ $errors->first('personalvalues') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="familyvalues" class=" col-form-label">
                            Family Personal Values
                            <span>*</span></label>
                        <div class="">
                            <input value="{{ old('familyvalues') }}" id="familyvalues" name="familyvalues" placeholder="Family Personal Values"
                                class="form-control here" type="text">
                            @if ($errors->has('familyvalues'))
                            <p class="text-danger" role="alert">
                                <strong>{{ $errors->first('familyvalues') }}</strong>
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


</script>
@endsection
