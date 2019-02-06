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
            <span class="h3 bold-text">Sibling's (Brother/Sister) Information</span>
            <a class="btn btn-danger btn-sm pull-right" data-toggle="modal" href='{{ route('users.editprofile.siblings.view') }}'>
                <span class="fa fa-backward"></span> Cancel Insert</a>

        </div>

        <div class="panel-body">

            <form action="{{ route('users.editprofile.siblings.store') }}" method="POST" role="form">
                @csrf
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="siblingposition" class="col-form-label">Sibling Position</label>
                        <input class="form-control" type="number" name="siblingposition" id="siblingposition" value="{{ old('siblingposition') }}">
                    </div>
                    <div class="col-md-6">
                        <label for="gender" class=" col-form-label">Gender</label>
                        <div class="">
                            <div class="radio">
                                <label>
                                    <input {{ old('gender') == 1 ? 'checked' : '' }} type="radio" name="gender" id="gender" value="1">
                                    Male
                                </label>
                                <label>
                                    <input {{ old('gender') == 2 ? 'checked' : '' }} type="radio" name="gender" id="gender" value="2">
                                    Female
                                </label>
                            </div>

                            @if ($errors->has('gender'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('gender') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="sibling_name" class=" col-form-label">Name*
                        </label>
                        <div class="">
                            <input value="{{ old('sibling_name') }}" id="relative" name="sibling_name" placeholder="Name" class="form-control here"
                                type="text">
                            @if ($errors->has('sibling_name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('sibling_name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="sibling_living" class=" col-form-label">Living Status
                        </label>
                        <div class="">
                            <input {{ old('sibling_living') == 1 ? 'checked' : '' }} type="radio" name="sibling_living" id="sibling_living1" value="1" class="liveStatusClass" />
                            Alive
                            <input {{ old('sibling_living') == 2 ? 'checked' : '' }} type="radio" name="sibling_living" id="sibling_living" value="2" class="liveStatusClass" />
                            Passed
                            Away
                            @if ($errors->has('sibling_living'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('sibling_living') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="marital_status" class="col-form-label">Marital Status
                        </label>
                        <div class="">
                            <input {{ old('marital_status') == 1 ? 'checked' : '' }}  type="radio" id="marital_status1" name="marital_status" class="marital_status" value="1" />
                            Married
                            <input {{ old('marital_status') == 2 ? 'checked' : '' }}  type="radio" name="marital_status" class="marital_status" value="2" />
                            Not
                            Married
                            @if ($errors->has('marital_status'))
                            <span class="invalid-feedback" role="alert">
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
                            <label for="sibling_profession" class="col-form-label">Siblings's Profession
                            </label>
                            <div class="">
                                <select name="sibling_profession" id="sibling_profession" class="form-control">
                                    <option value="">Select One</option>
                                    @foreach (professionType() as $key=>$item)
                                    <option {{ old('sibling_profession') == $key ? 'selected' :'' }} value="{{ $key }}">{{ $item }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('sibling_profession'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('sibling_profession') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div id="professiondetails" class="allHideClass2" style="display:none">

                                <label for="profession_details" class="col-form-label">Profession Details</label>
                                <div class="">
                                    <select name="profession_details" id="profession_details" class="form-control">

                                    </select>
                                    @if ($errors->has('profession_details'))
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
                                <label for="sibling_designation" class=" col-form-label">Sibling's
                                    Designation
                                </label>
                                <div class="">
                                    <input value="{{ old('sibling_designation') }}" id="sibling_designation" name="sibling_designation" placeholder="Designation"
                                        class="form-control here" type="text">
                                    @if ($errors->has('sibling_designation'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('sibling_designation') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="sibling_organization" class="col-form-label">Sibling's
                                    Organization Name
                                </label>
                                <div class="">
                                    <input value="{{ old('sibling_organization') }}" id="sibling_organization" name="sibling_organization" placeholder="Organization Name"
                                        class="form-control here" type="text">
                                    @if ($errors->has('sibling_organization'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('sibling_organization') }}</strong>
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
                            <label for="sibling_spouse_name" class=" col-form-label">Sibling's Spouse
                                Name*
                            </label>
                            <div class="">
                                <input value="{{ old('sibling_spouse_name') }}" id="relative" name="sibling_spouse_name" placeholder="Name" class="form-control here"
                                    type="text">
                                @if ($errors->has('sibling_spouse_name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('sibling_spouse_name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="sibling_spouse_living" class=" col-form-label">Sibling's
                                Spouse Living Status*
                            </label>
                            <div class="">
                                <input {{ old('sibling_spouse_living') == 1 ? 'checked' : '' }} type="radio" name="sibling_spouse_living" id="sibling_spouse_living1" value="1"
                                    class="liveStatusClassRS" />
                                Alive
                                <input {{ old('sibling_spouse_living') == 2 ? 'checked' : '' }} type="radio" name="sibling_spouse_living" id="sibling_spouse_living" value="2"
                                    class="liveStatusClassRS" />
                                Passed Away
                                @if ($errors->has('sibling_spouse_living'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('sibling_spouse_living') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div id="liveStatusToLinkRelProfessionIdRS" style="display:none">
                        <!---liveStatusToLinkRelProfessionIdRS-->
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="sibling_spouse_profession" class=" col-form-label">
                                    Spouse Profession
                                </label>
                                <div class="">
                                    <select name="sibling_spouse_profession" id="sibling_spouse_profession" class="form-control"">
                                     <option value="">Select One</option>
                                        @foreach (professionType() as $key=>$item)
                                        <option {{ old('sibling_spouse_profession') == $key ? 'selected' : '' }} value="{{ $key }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('sibling_spouse_profession'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('sibling_spouse_profession') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div id="professiondetails" class="allHideClass" style="display:none">

                                    <label for="spouse_profession_details" class="col-form-label">Profession Details</label>
                                    <div class="">
                                        <select name="spouse_profession_details" id="spouse_profession_details" class="form-control">

                                        </select>
                                        @if ($errors->has('spouse_profession_details'))
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $errors->first('spouse_profession_details') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="relativeSpouseProfession" style="display: none">
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="sibling_spouse_designation" class=" col-form-label">
                                        Spouse Designation
                                    </label>
                                    <div class="">
                                        <input value="{{ old('sibling_spouse_designation') }}" id="sibling_spouse_designation" name="sibling_spouse_designation"
                                            placeholder="Designation" class="form-control here" type="text">
                                        @if ($errors->has('sibling_spouse_designation'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('sibling_spouse_designation') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="sibling_spouse_organizaion" class="col-form-label">
                                        Spouse Organization Name
                                    </label>
                                    <div class="">
                                        <input value="{{ old('sibling_spouse_organizaion') }}" id="sibling_spouse_organizaion" name="sibling_spouse_organizaion"
                                            placeholder="Organization Name" class="form-control here" type="text">
                                        @if ($errors->has('sibling_spouse_organizaion'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('sibling_spouse_organizaion') }}</strong>
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
                        <a  href="{{ route('users.editprofile.siblings.view') }}" class="btn btn-danger btn-block">Cancel</a>
                                 </div>
                    <div class="col-xs-6">
                        <button type="submit" class="btn btn-success btn-block">Save</button>
                    </div>
                </div>
            </form>
        </div>
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
@include('sections.javascripts.createSiblings')
@endsection
