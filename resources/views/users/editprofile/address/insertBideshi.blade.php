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
            <span class="h3 bold-text">{{ $message }}</span>
            <a href="{{ route('users.editprofile.address.index') }}" id="toggle-form" type="button" class="btn btn-danger btn-sm pull-right">
                    <span class="edit-icon fa fa-backward"></span>
                    <span class="edit-text">Cancel Insert</span>
                </a>
        </div>
        <div class="panel-body">
            <form method="POST" action="{{ route('users.editprofile.address.storeBideshi') }}" class="padding-0-30">
                @csrf
                <input type="hidden" name="addresstype" value="{{ $addressType }}">
                <input type="hidden" name="addresslocation" value="bideshi">
                <div class="form-group row">
                    <label for="resownership" class="col-md-4 col-form-label">Lives in</label>
                    <div class="col-md-8">
                        <label>
                            <input {{ old('resownership') == 1 ? 'checked' : ''}} type="radio" class="resownership"
                                name="resownership" value="1">
                            Owner
                        </label>
                        <label>
                            <input {{ old('resownership') == 2 ? 'checked' : ''}} type="radio" class="resownership"
                                name="resownership" value="2">Rental
                            Rental
                        </label>
                        @if ($errors->has('resownership'))
                        <span class="text-danger" role="alert">
                            <strong>{{ $errors->first('resownership') }}</strong>
                        </span> @endif
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <label for="streetaddress" class=" col-form-label">Street Address*
                        </label>
                        <textarea class="form-control" name="streetaddress" id="streetaddress" cols="30" rows="3">{{ old('streetaddress') }}</textarea>
                    
                        @if ($errors->has('streetaddress'))
                        <span class="text-danger" role="alert">
                            <strong>{{ $errors->first('streetaddress') }}</strong>
                        </span> @endif
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="birthcountry" class=" col-form-label">Birth Country
                        </label>
                        <select name="birthcountry" id="birthcountry" class="form-control" required="required">
                            <option>Select ...</option>
                            @foreach ($countries as $country)
                            <option {{ old('birthcountry') == $country->id ? 'selected' : ''}}  value="{{  $country->id }}">{{ $country->name }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('birthcountry'))
                        <span class="text-danger" role="alert">
                            <strong>{{ $errors->first('birthcountry') }}</strong>
                        </span> @endif
                    </div>
                    <div class="col-sm-6">
                        <label for="growupcountry" class=" col-form-label">Growing up Country
                        </label>
                        <select name="growupcountry" id="growupcountry" class="form-control" required="required">
                            <option>Select ...</option>
                            @foreach ($countries as $country)
                            <option {{ old('growupcountry') == $country->id ? 'selected' : ''}} value="{{  $country->id }}">
                                {{ $country->name }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('growupcountry'))
                    <span class="text-danger" role="alert">
                        <strong>{{ $errors->first('growupcountry') }}</strong>
                    </span> @endif
                    </div>


                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="livecity" class=" col-form-label">Living City
                        </label>
                        <input value="{{ old('livecity') }}" id="livecity" name="livecity" placeholder="Living City"
                            class="form-control here" type="text">

                    </div>
                    <div class="col-sm-6">
                        <label for="livecountry" class=" col-form-label">Living Country
                        </label>
                        <select name="livecountry" id="livecountry" class="form-control" required="required">
                            <option>Select ...</option>
                            @foreach ($countries as $country)
                            <option {{ old('livecountry') ==  $country->id  ? 'selected' : ''}} value="{{ $country->id }}">{{
                                $country->name }}</option>
                            @endforeach
                            @if ($errors->has('livecountry'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('livecountry') }}</strong>
                            </span>
                            @endif
                        </select>
                    </div>


                </div>

                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="socialno" class=" col-form-label">Resident Country Social ID
                        </label>
                        <div class="">
                            <input value="{{ old('socialno') }}" id="socialno" name="socialno" placeholder="Resident Country Social id"
                                class="form-control here" type="text">
                            @if ($errors->has('socialno'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('socialno') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div>
                            <label for="immigrationstatus" class="col-form-label margin-right-50">Immigration Status</label>
                        </div>
                        <select name="immigrationstatus" id="immigrationstatus" class="form-control" required="required">
                            <option>Select ...</option>
                            @foreach (immigrationStatus() as $key=>$value)
                            <option {{ old('immigrationstatus') == $key ? 'selected' : ''}} value="{{  $key }}">
                                {{ $value }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('immigrationstatus'))
                    <span class="text-danger" role="alert">
                        <strong>{{ $errors->first('immigrationstatus') }}</strong>
                    </span>@endif

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
@endsection
