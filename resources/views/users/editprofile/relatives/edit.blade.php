@extends('layouts.users')


@section('content')



<div class="col-md-9 card">

    @if($errors->any())
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        <strong>Reltive's information not saved.</strong> . Please try again with valid information.
    </div>
    @endif


    @if(session('error'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        <strong>{{ session('error') }}</strong>
    </div>
    @endif
    @if(Session('success'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        <strong> {!! Session('success') !!}</strong>
    </div>
    @endif

    <div class="panel panel-default">
        <div class="panel-heading title">
            <span class="h3 bold-text">Relatives Information</span>
            <a class="btn btn-danger btn-sm pull-right" data-toggle="modal" href='{{ route('users.editprofile.relatives.view') }}'>
                <span class="fa fa-backward"></span> Cancel Edit</a>
        </div>

        <div class="panel-body">
            <form action="{{ route('users.editprofile.relatives.update', $relative->id) }}" method="POST" role="form">
                @csrf
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="relativetype" class=" col-form-label">Relative from</label>
                        <div class="">
                            <div class="radio">
                                <label>
                                    <input {{ 1 == $relative->relative_side ? 'checked' : '' }} type="radio" name="relativetype"
                                        id="relativetype" value="1">
                                    Parternal Side
                                </label>
                                <label>
                                    <input {{ 2 == $relative->relative_side ? 'checked' : '' }} type="radio" name="relativetype"
                                        id="relativetype" value="2">
                                    Maternal Side
                                </label>
                            </div>
                            @if ($errors->has('relativetype'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('relativetype') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="gender" class=" col-form-label">Gender</label>
                        <div class="">
                            <div class="radio">
                                <label>
                                    <input {{ 1 == $relative->gender ? 'checked' : '' }} type="radio" name="gender" id="gender"
                                        value="1">
                                    Male
                                </label>
                                <label>
                                    <input {{ 2 == $relative->gender ? 'checked' : '' }} type="radio" name="gender" id="gender"
                                        value="2">
                                    Female
                                </label>
                            </div>

                            @if ($errors->has('gender'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('gender') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="relative_name" class=" col-form-label">Relative's Name*
                        </label>
                        <div class="">
                            <input value="{{ $relative->relative_name }}" id="relative" name="relative_name" placeholder="Name" class="form-control here"
                                type="text">
                            @if ($errors->has('relative_name'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('relative_name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="relative_living" class=" col-form-label">Living Status
                        </label>
                        <div class="">
                            <input {{ 1 == $relative->living_status  ? 'checked' : '' }} type="radio" name="relative_living"
                                id="relative_living1" value="1" class="liveStatusClass" />
                            Alive
                            <input {{ 2 == $relative->living_status  ? 'checked' : '' }} type="radio" name="relative_living"
                                id="relative_living" value="2" class="liveStatusClass" />
                            Passed
                            Away
                            @if ($errors->has('relative_living'))
                            <br>
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('relative_living') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="marital_status" class="col-form-label">Marital Status
                        </label>
                        <div class="">
                            <input {{ 1 == $relative->marital_status ? 'checked' : '' }} type="radio" name="marital_status"
                                class="marital_status" id="marital_status1" value="1" />
                            Married
                            <input {{ 2 == $relative->marital_status ? 'checked' : '' }} type="radio" name="marital_status"
                                class="marital_status" value="2" />
                            Not
                            Married
                            @if ($errors->has('marital_status'))
                            <br>
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('marital_status') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div id="liveStatusToLinkRelProfessionId" style="display:none">
                    <div class="form-group row">
                        <!---liveStatusToLinkRelProfessionId-->
                        <div class="col-md-6">
                            <label for="relative_profession" class="col-form-label">Relative's Profession
                            </label>
                            <div class="">
                                <select name="relative_profession" id="relative_profession" class="form-control">
                                    <option value="0">Select One</option>
                                    @foreach (professionType() as $key=>$item)
                                    <option {{ $relative->relative_profession == $key ?'selected': '' }}  value="{{ $key }}">{{ $item }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('relative_profession'))
                                <br>

                                <span class="text-danger" role="alert">
                                    <strong>{{ $errors->first('relative_profession') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <!--------------------------------------------------->
                        <!--DivProfessionHide All Hide start for hide against of Selecter of Profession -->
                        <!--===BCS==--->

                        <div class="col-md-6">
                            <div id="professiondetails" class="allHideClass" style="display:none">

                                <label for="profession_details" class="col-form-label">Profession Details</label>
                                <div class="">
                                    <select  oldval='{{ $relaive->relative_profession_details ?? 0 }}'  name="profession_details" id="profession_details" class="form-control">

                                    </select>
                                    @if ($errors->has('profession_details'))
                                    <br>

                                    <span class="text-danger" role="alert">
                                        <strong>{{ $errors->first('profession_details') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>
                    <!---form-group row end--->
                    <div id="ProfDetailsIdHide" style="display:none">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="relative_designation" class=" col-form-label">Relative's
                                    Designation
                                </label>
                                <div class="">
                                    <input value="{{ $relative->relative_designation  }}" id="relative_designation" name="relative_designation" placeholder="Designation"
                                        class="form-control here" type="text">
                                    @if ($errors->has('relative_designation'))
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $errors->first('relative_designation') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="relative_organization" class="col-form-label">Relative's
                                    Organization Name
                                </label>
                                <div class="">
                                    <input value="{{ $relative->relative_organization }}" id="relative_organization" name="relative_organization" placeholder="Organization Name"
                                        class="form-control here" type="text">
                                    @if ($errors->has('relative_organization'))
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $errors->first('relative_organization') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!---liveStatusToLinkRelProfessionId-->
                <div class="spouse-infos">
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="relative_spouse_name" class=" col-form-label">Relative's Spouse
                                Name*
                            </label>
                            <div class="">
                                <input value="{{ $relative->relative_spouse_name  }}" id="relative" name="relative_spouse_name" placeholder="Name" class="form-control here"
                                    type="text">
                                @if ($errors->has('relative_spouse_name'))
                                <span class="text-danger" role="alert">
                                    <strong>{{ $errors->first('relative_spouse_name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="relative_spouse_living" class=" col-form-label">Relative's
                                Spouse Living Status*
                            </label>
                            <div class="">
                                <input {{ 1 == $relative->relative_spouse_living_status ? 'checked' : '' }} type="radio" name="relative_spouse_living"
                                    id="relative_spouse_living1" value="1" class="liveStatusClassRS" />
                                Alive
                                <input {{ 2 == $relative->relative_spouse_living_status ? 'checked' : '' }} type="radio" name="relative_spouse_living"
                                    id="relative_spouse_living" value="2" class="liveStatusClassRS" />
                                Passed Away
                                @if ($errors->has('relative_spouse_living'))
                                <br>
                                <span class="text-danger" role="alert">
                                    <strong>{{ $errors->first('relative_spouse_living') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div id="liveStatusToLinkRelProfessionIdRS" style="display:none">
                        <!---liveStatusToLinkRelProfessionIdRS-->
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="relative_spouse_profession" class=" col-form-label">Relative's
                                    Spouse Profession
                                </label>
                                <div class="">
                                    <select name="relative_spouse_profession" id="relative_spouse_profession" class="form-control"">
                                              <option value="">Select One</option>
                                        @foreach (professionType() as $key=>$item)
                                        <option {{ $relative->relative_spouse_profession  == $key ?'selected': '' }}  value="{{ $key }}">{{ $item }}</option>
                                        @endforeach 
                                    </select>
                                    @if ($errors->has('relative_spouse_profession'))
                                    <br>
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $errors->first('relative_spouse_profession') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div id="professiondetails1" class="allHideClass2" style="display:none">

                                    <label for="spouse_profession_details" class="col-form-label">Profession Details</label>
                                    <div class="">
                                        <select oldval='{{ $relaive->relative_spouse_profession_details ?? 0 }}'  name="spouse_profession_details" id="spouse_profession_details" class="form-control">

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
                        </div>
                        <div id="relativeSpouseProfession" style="display: none">
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="relative_spouse_designation" class=" col-form-label">Relative's
                                        Spouse Designation
                                    </label>
                                    <div class="">
                                        <input value="{{ $relative->relative_spouse_designation  }}" id="relative_spouse_designation" name="relative_spouse_designation"
                                            placeholder="Designation" class="form-control here" type="text">
                                        @if ($errors->has('relative_spouse_designation'))
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $errors->first('relative_spouse_designation') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="relative_spouse_organizaion" class="col-form-label">Relative's
                                        Spouse Organization Name
                                    </label>
                                    <div class="">
                                        <input value="{{ $relative->relative_spouse_organization }}" id="relative_spouse_organizaion" name="relative_spouse_organizaion"
                                            placeholder="Organization Name" class="form-control here" type="text">
                                        @if ($errors->has('relative_spouse_organizaion'))
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $errors->first('relative_spouse_organizaion') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--relativeSpouseProfession Div --->
                    </div>
                    <!---liveStatusToLinkRelProfessionIdRS-->
                </div>
                <!--hidden div end-->
                <div class="form-group row">
                    <div class="col-xs-6">
                        <a href="{{ route('users.editprofile.relatives.view') }}" class="btn btn-danger btn-block">Cancel</a>
                    </div>
                    <div class="col-xs-6">
                        <button type="submit" class="btn btn-success btn-block">Save</button>
                    </div>
                </div>
            </form>
        </div>
    <!------------------------------------------>
    </div>







</div>


@endsection




@section('sidebar')
<div class="col-md-3">

    @include('sections.sidebarprofileedit')
</div>
@endsection

@section('title')
<h1>Update Profile and Settings</h1>
@endsection


@section('footerscript')
@include('sections.javascripts.editRelaive')
@endsection
