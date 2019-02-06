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
            <form method="POST" action="{{ route('users.editprofile.parents.storeFather') }}" class="padding-0-30">
                @csrf

                <div class="col-sm-6">
                    <h4>Father</h4>
                    <hr>
                    <div class="form-group row">
                        <div class="col-xs-12">
                            <label for="fname" class=" col-form-label">Father's Name*
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
                        <div class="col-xs-12">
                            <label for="flstatus" class=" col-form-label">Father's Living Status*
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
                            <div class="col-xs-12">
                                <label for="fsrvstatus" class=" col-form-label">Father's Service Status*
                                </label>
                                <div class="">
                                    <input {{ old('fsrvstatus') == 1 ?'checked' : '' }} type="radio" id="fsrvstatus1"
                                        class="fsrvstatus" name="fsrvstatus" value="1" />In Service
                                    <input {{ old('fsrvstatus') == 2 ?'checked' : '' }} type="radio" id="fsrvstatus2"
                                        class="fsrvstatus" name="fsrvstatus" value="2" />Retired
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
                        </div>
                    </div>
                    <!---liveStausLinkToServiceDivId--->
                    <div id="fhidpro" style="display:none">
                        <div class="form-group row">
                            <div class="col-xs-12">
                                <label for="fprofession" class=" col-form-label">Father's Profession*
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
                            <div class="col-xs-12">
                                <div id="professiondetails" class="allHideClass" style="display:none">
                                    <label for="profesion_details" class="col-form-label">Father's Profession Details</label>
                                    <div class="">
                                        <select data-oldval="{{ old('profesion_details') ?? 0 }}" name="profesion_details"
                                            id="profesion_details" class="form-control">
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
                            <!----col-xs-12---->
                        </div>
                        <!----form-group----->
                        <div id="ProDesignOrgNameDiv" style="display:none">
                            <!--ProDesignOrgNameDiv-->
                            <div class="form-group row">
                                <div class="col-xs-12">
                                    <label for="fdesignation" class=" col-form-label">Father's Designation*
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
                                <div class="col-xs-12">
                                    <label for="forgname" class="col-form-label">Father's Organization / Business Name*
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
                </div>
                <div class="col-sm-6">
                    <h4>
                        Mother
                    </h4>
                    <hr>
                    <div class="form-group row">
                        <div class="col-xs-12">
                            <label for="mname" class=" col-form-label">Mother's Name*
                            </label>
                            <div class="">
                                <input value="{{ old('mname') }}" id="mname" name="mname" placeholder="Mother's Name"
                                    class="form-control here" type="text">
                                @if ($errors->has('mname'))
                                <span class="text-danger" role="alert">
                                    <strong>{{ $errors->first('mname') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <label for="mlstatus" class=" col-form-label">Mother's Living Status*
                            </label>
                            <div class="">
                                <input {{ old('mlstatus') == 1 ? 'checked':'' }} type="radio" name="mlstatus" id="mlstatus1"
                                    value="1" class="motherLiveStatusRadio" />
                                Alive
                                <input {{ old('mlstatus') == 2 ? 'checked':'' }} type="radio" name="mlstatus" id="mlstatus"
                                    value="2" class="motherLiveStatusRadio" />
                                Passed Away
                                @if ($errors->has('mlstatus'))
                                <br>
                                <span class="text-danger" role="alert">
                                    <strong>{{ $errors->first('mlstatus') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div id="motherliveStausLinkToServiceDivId" style="display:none">
                        <div class="form-group row">
                            <div class="col-xs-12">
                                <label for="msrvstatus" class=" col-form-label">Mother's Service Status*
                                </label>
                                <div class="">
                                    <input {{ old('msrvstatus') == 1 ?'checked' : '' }} type="radio" id="msrvstatus1"
                                        class="msrvstatus" name="msrvstatus" value="1" />In Service
                                    <input {{ old('msrvstatus') == 2 ?'checked' : '' }} type="radio" id="msrvstatus2"
                                        class="msrvstatus" name="msrvstatus" value="2" />Retired
                                    <input {{ old('msrvstatus') == 3 ?'checked' : '' }} type="radio" class="msrvstatus"
                                        name="msrvstatus" value="3" /> Others
                                    @if ($errors->has('msrvstatus'))
                                    <br>
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $errors->first('msrvstatus') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-xs-12">
                            </div>
                        </div>
                    </div>
                    <!---liveStausLinkToServiceDivId--->
                    <div id="mhidpro" style="display:none">
                        <div class="form-group row">
                            <div class="col-xs-12">
                                <label for="mprofession" class=" col-form-label">Mother's Profession*
                                </label>
                                <div class="">
                                    <select name="mprofession" id="mprofession" class="form-control"">
                                            <option value="
                                        0">Select One</option>
                                        @foreach (professionType() as $key=>$item)
                                        <option {{ old('mprofession') == $key ?'selected':'' }} value="{{ $key }}">{{
                                            $item }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('mprofession'))
                                    <br>
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $errors->first('mprofession') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div id="professiondetails" class="allHideClass" style="display:none">
                                    <label for="mother_profesion_details" class="col-form-label">Profession Details</label>
                                    <div class="">
                                        <select data-oldval="{{ old('mother_profesion_details') ?? 0 }}" name="mother_profesion_details"
                                            id="mother_profesion_details" class="form-control">
                                        </select>
                                        @if ($errors->has('mother_profesion_details'))
                                        <br>
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $errors->first('mother_profesion_details') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!----col-xs-12---->
                        </div>
                        <!----form-group----->
                        <div id="ProDesignOrgNameDiv" style="display:none">
                            <!--ProDesignOrgNameDiv-->
                            <div class="form-group row">
                                <div class="col-xs-12">
                                    <label for="mdesignation" class=" col-form-label">Designation*
                                    </label>
                                    <div class="">
                                        <input value="{{ old('mdesignation') }}" id="mdesignation" name="mdesignation"
                                            placeholder="Designation" class="form-control here" type="text">
                                        @if ($errors->has('mdesignation'))
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $errors->first('mdesignation') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <label for="morgname" class="col-form-label">Organization Name*
                                    </label>
                                    <div class="">
                                        <input value="{{ old('morgname') }}" id="morgname" name="morgname" placeholder="Organization Name"
                                            class="form-control here" type="text">
                                        @if ($errors->has('morgname'))
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $errors->first('morgname') }}</strong>
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
                            <label for="mmoreinfo" class=" col-form-label">More Information
                            </label>
                            <div class="">
                                <input value="{{ old('mmoreinfo') }}" id="mmoreinfo" name="mmoreinfo" placeholder="More Information"
                                    class="form-control here" type="text">
                                @if ($errors->has('mmoreinfo'))
                                <span class="text-danger" role="alert">
                                    <strong>{{ $errors->first('mmoreinfo') }}</strong>
                                </span>
                                @endif
                            </div>
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
@include('sections.javascripts.insertFather')
@include('sections.javascripts.insertMother')
@endsection
