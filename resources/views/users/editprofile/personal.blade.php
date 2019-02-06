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
            @isset($userinfo)
            <button id="toggle-form" type="button" class="btn btn-info btn-sm pull-right"><span class="edit-icon fa fa-edit"></span>
                <span class="edit-text">Edit</span></button>
            @endisset
        </div>
        <div class="panel-body">

            <div class="table-responsive show-userinfo">
                <table class="table table-light">
                    <tbody>
                        <tr>
                            <td width="200">Religion</td>
                            <td class="bold-text">{{ religion($userinfo->religion) }}</td>
                        </tr>
                        <tr>
                            <td width="200">Height</td>
                            <td class="bold-text">{{ $userinfo->height }}</td>
                        </tr>
                        <tr>
                            <td width="200">Weight</td>
                            <td class="bold-text">{{ $userinfo->weight }} kg</td>
                        </tr>
                        <tr>
                            <td width="200">Blood Group</td>
                            <td class="bold-text">{{ bloodGroups($userinfo->blood_group) }}</td>
                        </tr>
                        <tr>
                            <td width="200">Complexion</td>
                            <td class="bold-text">{{ complexion($userinfo->complexion) }}</td>
                        </tr>
                        <tr>
                            <td width="200">Body Type</td>
                            <td class="bold-text">{{ bodytype($userinfo->body_type) }}</td>
                        </tr>
                        <tr>
                            <td width="200">Disability</td>
                            <td class="bold-text">{{ $userinfo->disability === 1 ? 'Yes' : 'None' }}</td>
                        </tr>
                        <tr>
                            <td width="200">Marital Status</td>
                            <td class="bold-text">{{ maritalstatus($userinfo->marital_status) }}</td>
                        </tr>

                    </tbody>
                </table>
            </div>


            <form method="POST" action="{{ route('users.editprofile.personal.update') }}" class="padding-0-30 show-form">
                @csrf
                <div class="form-group row">
                    <h2>Edit Personal Information </h2>
                    <hr>
                </div>


                <div class="form-group row">
                    <h4>Marragie and Children Information</h4>
                    <hr>
                </div>

                <div class="form-group row">
                    <label for="mstatus" class="col-md-4 col-form-label">Marital Status

                    </label>
                    <div class="col-md-8">
                        <select name="mstatus" id="input" class="form-control" required="required">
                            <option value="0">Select Marital Status</option>
                            @foreach (maritalstatus() as $key => $value)
                            <option {{ $userinfo->marital_status == $key ? 'selected' : ''}} value="{{ $key }}">{{
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



                <div class="form-group row">
                    <h4>Beliefs and Values</h4>
                    <hr>
                </div>


                <div class="form-group row">
                    <label for="religion" class="col-md-4 col-form-label">Religion

                    </label>
                    <div class="col-md-8">

                        <select name="religion" id="input" class="form-control" required="required">
                            <option value="0">Select Religion</option>
                            @foreach (religion() as $key => $value)
                            <option {{ $userinfo->religion == $key ? 'selected' : ''}} value="{{ $key }}">{{
                                $value }}</option>
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
                    <h4>Body and Apperance Information</h4>
                    <hr>
                </div>

                <div class="form-group row">
                    <label for="disability" class="col-md-4 col-form-label">Disability

                    </label>
                    <div class="col-md-8">

                        <div class="radio">
                            <label>
                                <input type="radio" name="disablity" id="nodisability" value="1" checked="checked">
                                No Disability
                            </label>
                            <label>
                                <input type="radio" name="disablity" id="yesdisability" value="2">
                                I have Disability
                            </label>
                        </div>

                        @if ($errors->has('disability'))
                        <span class="text-danger" role="alert">
                            <strong>{{ $errors->first('disability') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="height" class="col-md-4 col-form-label">Height

                    </label>
                    <div class="col-md-8">

                        <input value="{{  $userinfo->height }}" id="height" name="height" placeholder="Height (in cm)"
                            class="form-control here" type="text">

                        @if ($errors->has('height'))
                        <span class="text-danger" role="alert">
                            <strong>{{ $errors->first('height') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="weight" class="col-md-4 col-form-label">Weight

                    </label>
                    <div class="col-md-8">

                        <input value="{{  $userinfo->weight }}" id="weight" name="weight" placeholder="weight (in kg)"
                            class="form-control here" type="text">


                    </div>
                </div>


                <div class="form-group row">
                    <label for="bggroup" class="col-md-4 col-form-label">Blood Group

                    </label>
                    <div class="col-md-8">

                        <select name="bggroup" id="input" class="form-control" required="required">
                            <option value="0">Select Blood Group</option>
                            @foreach (bloodGroups() as $key => $value)
                            <option {{ $userinfo->blood_group == $key ? 'selected' : ''}} value="{{ $key }}">{{ $value
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
                <div class="form-group row">
                    <label for="complexion" class="col-md-4 col-form-label">complexion

                    </label>
                    <div class="col-md-8">

                        <select name="complexion" id="input" class="form-control" required="required">
                            <option value="0">Select complexion</option>
                            @foreach (complexion() as $key => $value)
                            <option {{ $userinfo->complexion == $key ? 'selected' : ''}} value="{{ $key }}">{{ $value
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
                <div class="form-group row">
                    <label for="bodytype" class="col-md-4 col-form-label">Body Type

                    </label>
                    <div class="col-md-8">

                        <select name="bodytype" id="input" class="form-control" required="required">
                            <option value="0">Select Body Type</option>
                            @foreach (bodytype() as $key => $value)
                            <option {{ $userinfo->body_type == $key ? 'selected' : ''}} value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>

                        @if ($errors->has('bodytype'))
                        <span class="text-danger" role="alert">
                            <strong>{{ $errors->first('bodytype') }}</strong>
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
        $('#toggle-form').on('click', function () {
            $('.show-userinfo').toggle(300);
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
