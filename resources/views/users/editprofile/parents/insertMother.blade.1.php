@extends('layouts.users')


@section('content')



<div class="col-md-9 card">



    @if($errors->any())
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        <strong>Changes you made was not saved.</strong> . Please try again with valid information.
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



    <!------View Normally------>
    <div class="panel panel-default">
        <div class="panel-heading title">
            <!--Add Parents Information-->
            <span class="h3 bold-text">{{ $message }}</span>
            <a href="{{ route('users.editprofile.parents.view') }}" class="btn btn-danger btn-sm pull-right">
                <span class="fa fa-backward"></span> Cancel Insert
            </a>
        </div>

        <div class="panel-body">
                <form method="POST" action="{{ route('users.editprofile.parents.storeMother') }}" class="padding-0-30">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="fname" class=" col-form-label">Name*
                                </label>
                                <div class="">
                                    <input value="{{ old('fname') }}" id="fname" name="fname" placeholder="Name" class="form-control here"
                                         type="text">
                                    @if ($errors->has('fname'))
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $errors->first('fname') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="flstatus" class=" col-form-label">Living Status*
                                </label>
                                <div class="">
                                    <input {{ old('flstatus') == 1 ? 'checked':'' }} type="radio" name="flstatus" id="flstatus1"
                                        value="1" class="fatherLiveStatusRadio" />
                                    Alive
                                    <input {{ old('flstatus') == 2 ? 'checked':'' }} type="radio" name="flstatus" id="flstatus"
                                        value="2" class="fatherLiveStatusRadio" />
                                    Passed Away
                                    @if ($errors->has('flstatus'))
                                    <br>
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $errors->first('flstatus') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div id="liveStausLinkToServiceDivId" style="display:none">
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="fsrvstatus" class=" col-form-label"> Service Status*
                                    </label>
                                    <div class="">
                                        <input {{ old('fsrvstatus') == 1 ?'checked' : '' }} type="radio" id="fsrvstatus1" class="fsrvstatus"
                                            name="fsrvstatus" value="1" />In Service
                                        <input {{ old('fsrvstatus') == 2 ?'checked' : '' }} type="radio" id="fsrvstatus2" class="fsrvstatus"
                                            name="fsrvstatus" value="2" />Retired
                                        <input {{ old('fsrvstatus') == 3 ?'checked' : '' }} type="radio" class="fsrvstatus"
                                            name="fsrvstatus" value="3" /> Others
                                        @if ($errors->has('fsrvstatus'))
                                        <br>
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $errors->first('fsrvstatus') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                </div>
                            </div>
                        </div>
                        <!---liveStausLinkToServiceDivId--->
                        <div id="fhidpro" style="display:none">
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="fprofession" class=" col-form-label">Profession*
                                    </label>
                                    <div class="">
                                        <select name="fprofession" id="fprofession" class="form-control"">
                                            <option value="
                                            0">Select One</option>
                                            @foreach (professionType() as $key=>$item)
                                            <option {{ old('fprofession') == $key ?'selected':'' }} value="{{ $key }}">{{
                                                $item }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('fprofession'))
                                        <br>
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $errors->first('fprofession') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div id="professiondetails" class="allHideClass" style="display:none">
                                        <label for="profesion_details" class="col-form-label">Profession Details</label>
                                        <div class="">
                                            <select data-oldval="{{ old('profesion_details') ?? 0 }}" name="profesion_details" id="profesion_details" class="form-control">
                                            </select>
                                            @if ($errors->has('profesion_details'))
                                            <br>
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $errors->first('profesion_details') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!----col-md-6---->
                            </div>
                            <!----form-group----->
                            <div id="ProDesignOrgNameDiv" style="display:none">
                                <!--ProDesignOrgNameDiv-->
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="fdesignation" class=" col-form-label">Designation*
                                        </label>
                                        <div class="">
                                            <input value="{{ old('fdesignation') }}" id="fdesignation" name="fdesignation"
                                                placeholder="Designation" class="form-control here" type="text">
                                            @if ($errors->has('fdesignation'))
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $errors->first('fdesignation') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="forgname" class="col-form-label">Organization Name*
                                        </label>
                                        <div class="">
                                            <input value="{{ old('forgname') }}" id="forgname" name="forgname" placeholder="Organization Name"
                                                class="form-control here" type="text">
                                            @if ($errors->has('forgname'))
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $errors->first('forgname') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--ProDesignOrgNameDiv hide-->
                        </div><!-- Hidden div-->
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="fmoreinfo" class=" col-form-label">More Information
                                </label>
                                <div class="">
                                    <input value="{{ old('fmoreinfo') }}" id="fmoreinfo" name="fmoreinfo" placeholder="More Information"
                                        class="form-control here" type="text">
                                    @if ($errors->has('fmoreinfo'))
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $errors->first('fmoreinfo') }}</strong>
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
@include('sections.javascripts.insertMother')
@endsection
