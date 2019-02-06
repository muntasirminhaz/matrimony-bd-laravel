@extends('new.master')

@section('content')
<div class="profileSection">
    <div class="container">
        <div class="row">
            <div class="col-sm-1 hidden-xs"></div>
            <div class="col-sm-10">
                <div class="profileContent">
                    <div class="container-fluid">
                        <div class="titleHeader">
                            <h4>
                                {{ $editTitle }}
                            </h4>
                            <form class="padding-0-30 margin-bottom-20" method="POST" action="{{ $formAction }}" role="form">
                                @csrf

                                <div class="form-group row">

                                    <div class="col-md-6">
                                        <label for="relative_side" class=" col-form-label">Relative from</label>
                                        <div class="">
                                            <div class="radio">
                                                <label>
                                                    <input class="relaFromCheck"
                                                        {{ 1 == $old->relative_side ? 'checked' : '' }} type="radio"
                                                        name="relative_side" id="relative_side" value="1">
                                                    Parternal Side
                                                </label>
                                                <label>
                                                    <input class="relaFromCheck"
                                                        {{ 2 == $old->relative_side ? 'checked' : '' }} type="radio"
                                                        name="relative_side" id="relativetype" value="2">
                                                    Maternal Side
                                                </label>
                                            </div>
                                            @if ($errors->has('relative_side'))
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $errors->first('relative_side') }}</strong>
                                            </span>
                                            @endif
                                            <span class="text-danger" role="alert">
                                                <strong id="err_relative_side"></strong>
                                            </span>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <label for="gender" class=" col-form-label">Relative is</label>
                                        <div class="">
                                            <div class="radio">
                                                <label>
                                                    <input class="genderChek" {{ 1 == $old->gender ? 'checked' : '' }}
                                                        type="radio" name="gender" id="gender" value="1">
                                                    Uncle
                                                </label>
                                                <label>
                                                    <input class="genderChek" {{ 2 == $old->gender ? 'checked' : '' }}
                                                        type="radio" name="gender" id="gender" value="2">
                                                    Aunty
                                                </label>
                                            </div>
                                            @if ($errors->has('gender'))
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $errors->first('gender') }}</strong>
                                            </span>
                                            @endif
                                            <span class="text-danger" role="alert">
                                                <strong id="err_gender"></strong>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">

                                    <div class="col-md-6">
                                        <label for="relative_living" class=" col-form-label">Living Status
                                        </label>
                                        <div class="">
                                            <input {{ 1 == $old->living_status ? 'checked' : '' }} type="radio" name="relative_living"
                                                id="relative_living1" value="1" class="liveStatusClass reltvChecLiv" />
                                            Alive
                                            <input {{ 2 == $old->living_status ? 'checked' : '' }} type="radio" name="relative_living"
                                                id="relative_living" value="2" class="liveStatusClass reltvChecLiv" />
                                            Passed
                                            Away
                                            @if ($errors->has('relative_living'))
                                            <br>
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $errors->first('relative_living') }}</strong>
                                            </span>
                                            @endif
                                            <br>
                                            <span class="text-danger" role="alert">
                                                <strong id="err_relative_living"></strong>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="marital_status" class="col-form-label">Marital Status
                                        </label>
                                        <div class="">
                                            <input {{ 1 == $old->marital_status ? 'checked' : '' }} type="radio" name="marital_status"
                                                class="marital_status mariStatsChe" id="marital_status1" value="1" />
                                            Married
                                            <input {{ 2 == $old->marital_status ? 'checked' : '' }} type="radio" name="marital_status"
                                                class="marital_status mariStatsChe" value="2" />
                                            Not
                                            Married
                                            @if ($errors->has('marital_status'))
                                            <br>
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $errors->first('marital_status') }}</strong>
                                            </span>
                                            @endif
                                            <br>
                                            <span class="text-danger" role="alert">
                                                <strong id="err_marital_status"></strong>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div id="liveStatusToLinkRelProfessionId" style="display:none">
                                    <div class="form-group row">
                                        <!---liveStatusToLinkRelProfessionId-->
                                        <div class="col-md-6">
                                            <label for="relative_profession" class="col-form-label">Relative's
                                                Profession
                                            </label>
                                            <div class="">
                                                <select name="relative_profession" id="relative_profession" class="form-control">
                                                    <option value="0">Select One</option>
                                                    @foreach (professionType() as $key=>$item)
                                                    <option {{ $old->relative_profession == $key ?'selected': '' }}
                                                        value="{{ $key }}">{{ $item }}</option>
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

                                                <label for="profession_details" class="col-form-label">Relative's
                                                    Profession Details</label>
                                                <div class="">
                                                    <select data-oldval="{{ $old->relative_profession_details ?? 0 }}" name="profession_details"
                                                        id="profession_details" class="form-control">

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
                                                    <input value="{{ $old->relative_designation }}" id="relative_designation"
                                                        name="relative_designation"  class="form-control here"
                                                        type="text">
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
                                                    <input value="{{ $old->relative_organization }}" id="relative_organization"
                                                        name="relative_organization" 
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
                                            <label for="relative_spouse_living" class=" col-form-label">Relative's
                                                Spouse Living Status*
                                            </label>
                                            <div class="">
                                                <input {{ 1 == $old->relative_spouse_living_status ? 'checked' : '' }} type="radio"
                                                    name="relative_spouse_living" id="relative_spouse_living1" value="1"
                                                    class="liveStatusClassRS" />
                                                Alive
                                                <input {{ 2 == $old->relative_spouse_living_status ? 'checked' : '' }} type="radio"
                                                    name="relative_spouse_living" id="relative_spouse_living" value="2"
                                                    class="liveStatusClassRS" />
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
                                                    <select name="relative_spouse_profession" id="relative_spouse_profession"
                                                        class="form-control"">
                                                              <option value="">Select One</option>
                                                        @foreach (professionType() as $key=>$item)
                                                        <option {{ $old->relative_spouse_profession == $key ?'selected':'' }}  value="
                                                        {{ $key }}">{{ $item }}</option>
                                                        @endforeach
                                                    </select>
                                                    @if ($errors->has('relative_spouse_profession'))
                                                    <br>
                                                    <span class="
                                                        text-danger" role="alert">
                                                        <strong>{{ $errors->first('relative_spouse_profession') }}</strong>
                                                        </span>
                                                        @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div id="professiondetails1" class="allHideClass2" style="display:none">

                                                    <label for="spouse_profession_details" class="col-form-label">Relative's
                                                        Spouse Profession Details</label>
                                                    <div class="">
                                                        <select data-oldval="{{ $old->relative_spouse_profession_details ?? 0 }}"
                                                            name="spouse_profession_details" id="spouse_profession_details"
                                                            class="form-control">

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
                                        <div id="SpouseProfession" style="display: none">
                                            <div class="form-group row">
                                                <div class="col-md-6">
                                                    <label for="relative_spouse_designation" class=" col-form-label">Relative's
                                                        Spouse Designation
                                                    </label>
                                                    <div class="">
                                                        <input value="{{ $old->relative_spouse_designation }}" id="relative_spouse_designation"
                                                            name="relative_spouse_designation" 
                                                            class="form-control here" type="text">
                                                        @if ($errors->has('relative_spouse_designation'))
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $errors->first('relative_spouse_designation') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="relative_spouse_organizaion" class="col-form-label">Relatives's
                                                        Spouse Organization Name
                                                    </label>
                                                    <div class="">
                                                        <input value="{{ $old->relative_spouse_organization }}" id="relative_spouse_organizaion"
                                                            name="relative_spouse_organizaion" 
                                                            class="form-control here" type="text">
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

                                <hr>
                                <div class="form-group row">
                                    <div class="col-xs-12">
                                        <button type="submit" id="submit" class="signupbutton btn btn-large btn-block btn-success">Save</button>
                                    </div>

                                </div>


                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-1 hidden-xs"></div>
        </div>
    </div>
</div>

@endsection

@section('footerscript')

@include('sections.javascripts.signup_relative')
@endsection
