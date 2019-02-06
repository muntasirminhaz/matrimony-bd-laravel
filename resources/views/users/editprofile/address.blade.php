@extends('layouts.users')


@section('content')

<div class="col-md-9 card">


    @if($errors->any())
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        <strong>Address informaiton Not Saved.</strong> . Please try again with valid information.
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
            <span class="h3 bold-text">Address Information</span>
            <button id="toggle-form" type="button" class="btn btn-info btn-sm pull-right"><span class="edit-icon fa fa-edit"></span>
                <span class="edit-text">Edit</span></button>
        </div>
        <div class="panel-body">

            <div class="table-responsive show-userinfo">
                <table class="table table-light">
                    <tbody>

                        <tr>
                            <td width='200'>Personal Address</td>
                            <td class="bold-text">{!! $personalAddress !!}</td>
                        </tr>
                        <tr>
                            <td width='200'>Familty Address</td>
                            <td class="bold-text">{!! $familyAddress !!}</td>
                        </tr>
                    </tbody>
                </table>
            </div>



            <form novalidate method="POST" action="{{ route('users.editprofile.address.update') }}" class="padding-0-30 show-form">
                @csrf
                <div class="form-group row">
                    <h2>Edit Address Info</h2>
                    <hr>
                    <h4 class="bold-text">Current / Personal Address</h4>
                    <hr>
                </div>


                <div class="form-group row">
                    <label for="personaladdress" class="col-md-4 col-form-label">I live in:*

                    </label>

                    <div class="col-md-8">

                        <div class="radio">
                            <label>
                                <input type="radio" class="livein" name="personallocation" id="presentbd" value="1"
                                    {{ $userinfo->present_address_country === 1 ? 'checked="checked"' : '' }}>
                                Bangladesh
                            </label>

                            <label>
                                <input type="radio" class="livein" name="personallocation" id="presentabroad" value="2"
                                    {{ $userinfo->present_address_country === 1 ? '' :'checked="checked"' }}>
                                Abroad

                            </label>
                        </div>


                    </div>
                </div>


                <div id="personalbdform">
                    <div class="form-group row">
                        <label for="personaladdress" class="col-md-4 col-form-label">Address*

                        </label>
                        <div class="col-md-8">
                            <textarea id="personaladdress" name="personaladdress" placeholder="Address" class="form-control here"
                                type="text">{{ $userinfo->present_address }}</textarea>
                            @if ($errors->has('personaladdress'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('personaladdress') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="personaldivision" class="col-md-4 col-form-label">Division*

                        </label>
                        <div class="col-md-8">
                            <select name="personaldivision" id="personaldivision" class="form-control" required="required">
                            </select>
                            @if ($errors->has('personaldivision'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('personaldivision') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="personaldistrict" class="col-md-4 col-form-label">District*

                        </label>
                        <div class="col-md-8">
                            <select name="personaldistrict" id="personaldistrict" class="form-control" required="required">

                            </select>
                            @if ($errors->has('personaldistrict'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('personaldistrict') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="personalupzila" class="col-md-4 col-form-label">Thana / Uppozilla*

                        </label>
                        <div class="col-md-8">
                            <select name="personalupzila" id="personalupzila" class="form-control" required="required">

                            </select>
                            @if ($errors->has('personalupzila'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('personalupzila') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                </div>









                <div id="personalabroadform" style="display:none">

                    <div class="form-group row">
                        <label for="abroadaddress" class="col-md-4 col-form-label">Address*

                        </label>
                        <div class="col-md-8">
                            <textarea id="abroadaddress" name="abroadaddress" placeholder="Address" class="form-control here"
                                type="text">{{ $userinfo->present_address_abroad }}</textarea>
                            @if ($errors->has('abroadaddress'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('abroadaddress') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="countryabroad" class="col-md-4 col-form-label">Select Country*

                        </label>
                        <div class="col-md-8">
                            <select name="countryabroad" id="countryabroad" class="form-control" required="required">
                                <option value="0">Select Country</option>
                                @foreach ($countries as $country)
                                <option {{ $userinfo->present_address_country === $country->id ? 'selected' : '' }}
                                    value="{{  $country->id }}">{{ $country->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('countryabroad'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('countryabroad') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <h4 class="bold-text">Family Address</h4>
                    <hr>
                </div>

                <div class="form-group row">
                    <label for="personaladdress" class="col-md-4 col-form-label">Family Lives in</label>
                    <div class="col-md-8">
                        <div class="radio">
                            <label>
                                <input type="radio" class="familtylivein" name="familylocation" id="familtysame" value="1"
                                    {{ $userinfo->family_address_same === 1 ? 'checked="checked"' : '' }}>
                                Same as Personal Address
                            </label>
                            <label>
                                <input type="radio" class="familtylivein" name="familylocation" id="familtybangladesh"
                                    value="2" {{ $userinfo->family_address_same === 2 ? 'checked="checked"' : '' }}> In
                                Bangladesh</label>
                            <label>
                                <input type="radio" class="familtylivein" name="familylocation" id="familtyabroad"
                                    value="3" {{ $userinfo->family_address_same === 3 ? 'checked="checked"' : '' }}> In
                                Abroad
                            </label>
                        </div>
                    </div>
                </div>

                <div id="familtybdform" style="display:none">
                    <div class="form-group row">
                        <label for="familyaddress" class="col-md-4 col-form-label">Address*

                        </label>
                        <div class="col-md-8">
                            <textarea id="familyaddress" name="familyaddress" placeholder="Address" class="form-control here"
                                type="text">{{ $userinfo->family_address }}</textarea>
                            @if ($errors->has('familyaddress'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('familyaddress') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="familydivision" class="col-md-4 col-form-label">Division*

                        </label>
                        <div class="col-md-8">
                            <select name="familydivision" id="familydivision" class="form-control" required="required">
                                <option value="0">Select Division</option>
                                @foreach ($divisions as $division)
                                <option value="{{  $division->id }}">{{ $division->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('familydivision'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('familydivision') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="familydistrict" class="col-md-4 col-form-label">District*

                        </label>
                        <div class="col-md-8">
                            <select name="familydistrict" id="familydistrict" class="form-control" required="required">
                                <option value="0">Select District</option>
                                @foreach ($districts as $district)
                                <option style="display:none" data-division="{{ $district->division_id }}" value="{{  $district->id }}">{{
                                    $district->name }}</option>
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
                        <label for="familyupzila" class="col-md-4 col-form-label">Thana / Uppozilla*

                        </label>
                        <div class="col-md-8">
                            <select name="familyupzila" id="familyupzila" class="form-control" required="required">
                                <option value="0">Select Thana / Uppozilla</option>
                                @foreach ($upazilas as $upzila)
                                <option style="display:none" data-district="{{  $upzila->district_id }}" value="{{  $upzila->id }}">{{
                                    $upzila->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('familyupzila'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('familyupzila') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div id="familtyabroadform" style="display:none">
                    <div class=" form-group row">
                        <label for="familtyabroadaddress" class="col-md-4 col-form-label">Address*

                        </label>
                        <div class="col-md-8">
                            <textarea id="familtyabroadaddress" name="familtyabroadaddress" placeholder="Address" class="form-control here"
                                type="text">{{ $userinfo->family_address_abroad }}</textarea>
                            @if ($errors->has('familtyabroadaddress'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('familtyabroadaddress') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>



                    <div class="form-group row">
                        <label for="familtycountryabroad" class="col-md-4 col-form-label">Select Country*

                        </label>
                        <div class="col-md-8">
                            <select name="familtycountryabroad" id="familtycountryabroad" class="form-control" required="required">
                                <option value="0">Select Country</option>
                                @foreach ($countries as $country)
                                <option {{ $userinfo->family_address_country == $country->id ? 'selected' : '' }} value="{{ $country->id }}">
                                    {{ $country->name }}
                                </option>
                                @endforeach
                            </select>
                            @if ($errors->has('familtycountryabroad'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('familtycountryabroad') }}</strong>
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
@include('sections.javascripts.addresscript')
@endsection
