@extends('new.master')

@section('content')

<div class="container margin-50">


    <div class="row">
        <div class="col-md-2 col-sm-12 padding-0 margin-0"></div>

        <div class="col-md-8 col-sm-12 padding-0 margin-0">
            <div class="progress">
                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="{{ $completed }}"
                    aria-valuemin="0" aria-valuemax="100" style="width:{{ $completed }}%">
                    {{ $completed }}% Completed
                </div>
            </div>
        </div>
        <div class="col-md-2 col-sm-12 padding-0 margin-0"></div>
    </div>

    <div class="row padding-0">
        <div class="col-md-2 col-sm-12 padding-0 margin-0"></div>
        <div class="col-md-8 col-sm-12 center-block bg-warning ">
            <div class="center- margin-bottom-20 padding-10-0">


                @isset($allowGoback)
                <a href="{{ $allowGoback }}" class="signupbutton padding-0-30 margin-bottom-15 btn btn-info pull-left">
                    <span class="fa fa-caret-left"></span> Back
                </a>
                @endisset

                @isset($allowSkip)
                <a href="{{ $allowSkip }}" class="signupbutton padding-0-30 margin-bottom-15 btn btn-danger pull-right">
                    Skip <span class="fa fa-caret-right"></span>
                </a>
                @endisset

            </div>
            <h1 class="center-block margin-0-auto margin-bottom-15 text-align-center padding-top-20">
                @isset($title)
                {{ $title }}
                @else
                Title of the form
                @endisset
            </h1>
            @isset($description)
            <p class="text-align-center bold-text padding-0-30 margin-bottom-20">

                {{ $description }}


            </p>
            @endisset
            <hr>



            <form class="padding-0-30 margin-bottom-20" method="POST" action="{{ route('signup.prefessionStore') }}"
                role="form">
                @csrf

                <div class="form-group row">
                    <label for="profession" class="col-sm-3 col-form-label">Profession*
                    </label>
                    <div class="col-sm-9">
                        <select name="profession" id="profession" class="form-control" required="required">
                            <option value="">Select ...</option>
                            @foreach (profileProfession() as $key=>$value)
                            <option {{ old('profession') == $key ? 'selected' : '' }} value="{{ $key }}">{{ $value }}
                            </option>
                            @endforeach
                        </select>
                        @if ($errors->has('profession'))
                        <span class="text-danger" role="alert">
                            <strong>{{ $errors->first('profession') }}</strong>
                        </span>
                        @endif
                        <span class="text-danger" role="alert">
                            <strong id="err_profession"></strong>
                        </span>
                    </div>

                </div>


                <div id="professiondetails" class="form-group row" style="display: none">
                    <label for="profession_details" class="col-sm-3 col-form-label">Profession Details
                    </label>

                    <div class="col-sm-9">
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

                <div class="form-group row extrainfo">
                    <div class="col-sm-6">
                        <label for="designation"  class="designation-level col-form-label">Job / Designation*</label>
                        <div class="">
                            <input required="required" value="{{ old('designation') }}" type="text" name="designation"
                                id="designation" placeholder="Designation" class="form-control">
                            @if ($errors->has('designation'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('designation') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label for="orgName" class=" col-form-label">Business / Organization Name</label>
                        <div class="">
                            <input required="required" value="{{ old('orgName') }}" type="text" name="orgName" id="orgName"
                                placeholder="Organization" class="form-control">
                            @if ($errors->has('orgName'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('orgName') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group row other_details">
                    <div class="">
                        <label for="otherdetails" class="col-sm-3 col-form-label">Other job Details*</label>
                        <div class="col-sm-9">
                            <input value="{{ old('otherdetails') }}" type="text" name="otherdetails"
                                id="otherdetails" placeholder="Provide Details" class="form-control">
                            @if ($errors->has('otherdetails'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('otherdetails') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                   
                </div>


                <div class="form-group row">
                    <div class="col-xs-12">
                        <button type="submit" id="submit" class="signupbutton btn btn-large btn-block btn-success">Save
                            and Continue</button>
                    </div>

                </div>


            </form>

        </div>
        <div class="col-md-2 col-sm-12 padding-0 margin-0"></div>
    </div>
</div>

@endsection


@section('footerscript')
@include('sections.javascripts.signup_profession')
@endsection
