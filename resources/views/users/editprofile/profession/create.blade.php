@extends('layouts.users')


@section('content')



<div class="col-md-9 card">


    @if($errors->any())
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        <strong>Profession Information not updated.</strong> . Please try again with valid information.
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
            <span class="h3 bold-text">Add Pofessional Information</span>

        </div>
        <div class="panel-body">
            <!----==== Form Staring here for Insert=====--->

            <form method="POST" action="{{ route('users.editprofile.profession.insert') }}" class="padding-0-30">
                @csrf

                <div class="form-group row">
                    <label for="profession" class="col-md-4 col-form-label">Profession*
                    </label>
                    <div class="col-md-8">
                        <select name="profession" id="profession" class="form-control" required="required">
                            <option value="0">Select one profession </option>
                            @foreach (professionType2() as $key=>$value)
                            <option {{ old('profession') == $key ? 'selected' : '' }} value="{{ $key }}">{{ $value }}
                            </option>
                            @endforeach
                        </select>
                        @if ($errors->has('profession'))
                        <span class="text-danger" role="alert">
                            <strong>{{ $errors->first('profession') }}</strong>
                        </span>
                        @endif
                        <br>
                        <div id="professiondetails" class="allHideClass" style="display:none">
                            <label for="profession_details" class="col-form-label">Profession Details</label>
                            <div class="">
                                <select data-oldval="{{ old('profession_details') ?? 0 }}" name="profession_details" id="profession_details"
                                    class="form-control">
                                </select>
                                @if ($errors->has('profession_details'))
                                <span class="text-danger" role="alert">
                                    <strong>{{ $errors->first('profession_details') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        @if ($errors->has('profession_details'))
                        <span class="text-danger" role="alert">
                            <strong>{{ $errors->first('profession_details') }}</strong>
                        </span>
                        @endif

                    </div>

                </div>

                <div id="ProfDetailsIdHide" style="display:none">
                    <!--ProfDetailsIdHide hide against of Selecter of Profession -->
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="designation" class=" col-form-label">Designation*</label>
                            <div class="">
                                <input value="{{ old('designation') }}" type="text" name="designation" id="designation" placeholder="Designation" class="form-control">
                                @if ($errors->has('designation'))
                                <span class="text-danger" role="alert">
                                    <strong>{{ $errors->first('designation') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="orgName" class=" col-form-label">Organization Name</label>
                            <div class="">
                                <input value="{{ old('orgName') }}" type="text" name="orgName" id="orgName" placeholder="Organization" class="form-control">
                                @if ($errors->has('orgName'))
                                <span class="text-danger" role="alert">
                                    <strong>{{ $errors->first('orgName') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">

                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-12">
                        <input type="submit" class="btn btn-large btn-block btn-success" name="submit" value="Submit" />
                    </div>
                </div>
            </form>
            <!----==== Form End here for Insert=====--->
        </div>
        <!--panel panel End--->
    </div>
    <!--panel panel-default End-->




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
@include('sections.javascripts.professionInsert')

@endsection
