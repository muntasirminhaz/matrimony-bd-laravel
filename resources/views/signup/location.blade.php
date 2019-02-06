@extends('new.master')

@section('content')
        

<div class="container margin-50">
    <div class="row">
        <div class="col-md-2 col-sm-12 padding-0 margin-0"></div>

        <div class="col-md-8 col-sm-12 padding-0 margin-0">
            <div class="progress">
                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="{{ $completed }}"
                    aria-valuemin="0" aria-valuemax="100" style="width:{{ $completed }}%">
                    {{ $completed }}% Completed {{ Auth::user()->id }}
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


            <form  class="padding-0-30 margin-bottom-20" method="POST" action="{{ route('signup.locationStore') }}"
                role="form">
                @csrf

                <div class="mylocation">
                    <h3>Your Location Information</h3>
                    <br>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="living_country" class="col-form-label">Living Country
                            </label>
                            <div class="">
                                <select required='required' name="living_country" id="living_country" class="form-control">
                                    <option value="">Select ...</option>
                                    @foreach ($countries as $item)
                                    <option {{ old('living_country') == $item->id ? 'selected' : '' }} value="{{ $item->id }}">{{
                                        $item-> name}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('living_country'))
                                <span class="text-danger" role="alert">
                                    <strong>{{ $errors->first('living_country') }}</strong>
                                </span>
                                @endif
                                <span class="text-danger" role="alert">
                                    <strong id="err_living_country"></strong>
                                </span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="living_city" class=" col-form-label">Current Living City*
                            </label>
                            <div class="">
                                <input required='required' value="{{ old('living_city') }}" id="living_city" name="living_city"
                                    placeholder="Living City" class="form-control here" type="text">
                                @if ($errors->has('living_city'))
                                <span class="text-danger" role="alert">
                                    <strong>{{ $errors->first('living_city') }}</strong>
                                </span>
                                @endif
                                <span class="text-danger" role="alert">
                                    <strong id="err_living_city"></strong>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row bideshi" style="display: none">
                        <div class="col-sm-6">
                            <div>
                                <label for="immigrationstatus" class="col-form-label margin-right-50">Immigration
                                    Status*</label>
                            </div>
                            <select name="immigrationstatus" id="immigrationstatus" class="form-control">
                                <option value="">Select ...</option>
                                @foreach (immigrationStatus() as $key=>$value)
                                <option {{ old('immigrationstatus') == $key ? 'selected' : ''}} value="{{  $key }}">
                                    {{ $value }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('immigrationstatus'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('immigrationstatus') }}</strong>
                            </span>
                            @endif
                            <span class="text-danger" role="alert">
                                <strong id="err_immigrationstatus"></strong>
                            </span>

                        </div>
                        <div class="col-sm-6">
                            <label for="growing_country" class="col-form-label">Growing up Country*
                            </label>
                            <div class="">
                                <select name="growing_country" id="growing_country" class="form-control">
                                    <option value="">Select ...</option>
                                    @foreach ($countries as $item)
                                    <option {{ old('growing_country') == $item->id ? 'selected' : '' }} value="{{ $item->id }}">{{
                                        $item-> name}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('growing_country'))
                                <span class="text-danger" role="alert">
                                    <strong>{{ $errors->first('growing_country') }}</strong>
                                </span>
                                @endif
                                <span class="text-danger" role="alert">
                                    <strong id="err_growing_country"></strong>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">

                        <div class="col-sm-6">
                            <label for="districts" class=" col-form-label">Home District
                            </label>
                            <select data-oldval="{{ old('districts') }}" name="districts" id="districts" class="form-control"
                                required="required">
                                <option value="">Select districts ...</option>
                                @foreach ($districts as $item)
                                <option {{ old('districts') == $item->id ? 'selected' : '' }} value="{{ $item->id }}">{{
                                    $item-> name}}</option>
                                @endforeach
                            </select>

                            @if ($errors->has('districts'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('districts') }}</strong>
                            </span>
                            @endif
                            <span class="text-danger" role="alert">
                                <strong id="err_districts"></strong>
                            </span>
                            </select>
                        </div>


                        <div class="col-sm-6">
                            <label for="upzila" class=" col-form-label">Home Upzila
                            </label>
                            <select name="upzila" data-oldval="{{ old('upzila') }}" id="upzila" class="form-control"
                                required="required">
                                <option value="">Select a District First ...</option>

                                @if ($errors->has('upzila'))
                                <span class="text-danger" role="alert">
                                    <strong>{{ $errors->first('upzila') }}</strong>
                                </span>
                                @endif
                            </select>
                            <span class="text-danger" role="alert">
                                    <strong id="err_upzila"></strong>
                            </span>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="familylocation" style="display: none">

                    <h3>Family Location Information</h3>
                    <br>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="family_living_country" class="col-form-label">Family Living Country
                            </label>
                            <div class="">
                                <select name="family_living_country" id="family_living_country" class="form-control">
                                    <option value="">Select ...</option>
                                    @foreach ($countries as $item)
                                    <option {{ old('family_living_country') == $item->id ? 'selected' : '' }} value="{{ $item->id }}">{{
                                        $item-> name}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('family_living_country'))
                                <span class="text-danger" role="alert">
                                    <strong>{{ $errors->first('family_living_country') }}</strong>
                                </span>
                                @endif
                                <span class="text-danger" role="alert">
                                    <strong id="err_family_living_country"></strong>
                                </span>
                            </div>
                        </div>

                        <div class="col-sm-6 familydeshi">
                            <label for="family_districts" class=" col-form-label">District of Family Residence
                            </label>
                            <select data-oldval="{{ old('family_districts') }}" name="family_districts" id="family_districts"
                                class="form-control addrequired">
                                <option value="">Select Family District ...</option>
                                @foreach ($districts as $item)
                                <option {{ old('family_districts') == $item->id ? 'selected' : '' }} value="{{ $item->id }}">{{
                                    $item-> name}}</option>
                                @endforeach
                            </select>

                            @if ($errors->has('family_districts'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('family_districts') }}</strong>
                            </span>
                            @endif
                            <span class="text-danger" role="alert">
                                <strong id="err_family_districts"></strong>
                            </span>
                            </select>
                        </div>

                    </div>
                    <div class="form-group row familydeshi">
                        <div class="col-sm-4">
                            <label for="family_living_area" class=" col-form-label">Family Living Area*
                            </label>
                            <div class="">
                                <input value="{{ old('family_living_area') }}" id="family_living_area" name="family_living_area"
                                    placeholder="Where Family Lives" class="form-control addrequired" type="text">
                                @if ($errors->has('family_living_area'))
                                <span class="text-danger" role="alert">
                                    <strong>{{ $errors->first('family_living_area') }}</strong>
                                </span>
                                @endif
                                <span class="text-danger" role="alert">
                                    <strong id="err_family_living_area"></strong>
                                </span>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <label for="family_zip_code" class=" col-form-label">Zip Ccode*
                            </label>
                            <div class="">
                                <input value="{{ old('family_zip_code') }}" id="family_zip_code" name="family_zip_code"
                                    placeholder="Zip Code" class="form-control addrequired" type="text">
                                @if ($errors->has('family_zip_code'))
                                <span class="text-danger" role="alert">
                                    <strong>{{ $errors->first('family_zip_code') }}</strong>
                                </span>
                                @endif
                                <span class="text-danger" role="alert">
                                    <strong id="err_family_zip_code"></strong>
                                </span>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <label for="family_residential_status" class="col-form-label">Residential Status</label>
                            <div class="margin-top-5">
                                <label>
                                    <input {{ old('family_residential_status') == 1 ? 'checked' : '' }} type="radio"
                                        class="addrequired family_residential_status" name="family_residential_status"
                                        value="1">
                                    Owner
                                </label>
                                <label>
                                    <input {{ old('family_residential_status') == 2 ? 'checked' : '' }} type="radio"
                                        class="addrequired family_residential_status" name="family_residential_status"
                                        value="2">Rental
                                    Rental
                                </label>
                                @if ($errors->has('family_residential_status'))
                                <span class="text-danger" role="alert">
                                    <strong>{{ $errors->first('family_residential_status') }}</strong>
                                </span>
                                @endif
                                <span class="text-danger" role="alert">
                                    <strong id="err_family_residential_status"></strong>
                                </span>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="form-group row">

                </div>
                <div class="form-group row">

                   
                    <div class="col-xs-12">
                        <button type="submit" id="submit" class="signupbutton btn btn-large btn-block btn-success">Save and Continue</button>
                    </div>
                </div>

            </form>

        </div>
        <div class="col-md-2 col-sm-12 padding-0 margin-0"></div>
    </div>
</div>

@endsection

@section('footerscript')
<script>
    $(function () {
        //---------------------------------------------------------------------
        $("body").on("click", "#submit", function () {
            var err = 0;
            $("#err_living_country, #err_living_city  , #err_districts , #err_upzila ").text("");

            var living_country = $("select[name='living_country']").val();
            var living_city = $("input[name='living_city']").val();
           // var immigrationstatus = $("select[name='immigrationstatus']").val();
           // var growing_country = $("select[name='growing_country']").val();
            var districts = $("select[name='districts']").val(); 
            var upzila = $("select[name='upzila']").val();
            //var family_living_country = $("select[name='family_living_country']").val();//
            //var family_districts = $("select[name='family_districts']").val();//
            //var family_living_area = $("input[name='family_living_area']").val();
            //var family_zip_code = $("input[name='family_zip_code']").val(); 
            //var family_residential_status = $("input[name='family_residential_status']").val();     //...checked..


            if (living_country == "") {
                $("#err_living_country").text("Living Country Required");
                err++;
            }
            if (living_city == "") {
                $("#err_living_city").text("Current Living City Required");
                err++;
            }
            /*
            if (immigrationstatus == "") {
                $("#err_immigrationstatus").text("Immigration Status Required");
                err++;
            }
            
            else if (fname.match(/[$,-,'',#,@,&,!_,%]/)) {
                $("#err_fname").text("Please don't use this $,-,'',#,@,&,!_,%");
                err++;
            }
            if (growing_country == "") {
                $("#err_growing_country").text("Growing up Country Required");
                err++;
            }*/
            if (districts == "") {
                $('#err_districts').text("District  Required");
                err++;
            } 
            if (upzila == "") {
                $("#err_upzila").text("Upzila Required");
                err++;
            }/*
            if (family_living_country == "") {
                $("#err_family_living_country").text("Family Living Country Required");
                err++;
            }
            if (family_districts == "") {
                $("#err_family_districts").text("District of Family Residence Required");
                err++;
            }
            if (family_living_area == "") {
                $("#err_family_living_area").text("Family Living Area Required");
                err++;
            }//////
            if (family_zip_code == "") {
                $("#err_family_zip_code").text("Zip Ccode Required");
                err++;
            }
            /*
            if (family_residential_status == "") {
                $("#err_family_residential_status").text("Residential Status Required");
                err++;
            }*/

            if (err > 0) {
                return false;
            }
            return true;
        });


        //---------------------------------------------------------------------
        getUpzilla($("#districts").val());

        $('#districts').change(function (e) {
            getUpzilla($("#districts").val());
        });

        $('.bideshi').hide();
        $('.familylocation').hide();
        $('.familydeshi').hide();

        $('#living_country').change(function (e) {
            if ($(this).val() == 1) {

                $('.bideshi').hide('200');
                $('#immigrationstatus').removeAttr('required');
                $('#growing_country').removeAttr('required');
                $('#family_living_country').attr('required', 'required');
                $('.familylocation').show(200);
                $('#family_living_country').val('');


            } else {

                $('.bideshi').show('200');
                $('#immigrationstatus').attr('required', 'required');
                $('#growing_country').attr('required', 'required');
                $('#family_living_country').val('');
                $('#family_living_country').removeAttr('required');
                $('.familylocation').hide(300);
                $('.familydeshi').hide(200);
                $('.addrequired').removeAttr('required');
            }
        });

        $('#family_living_country').change(function (e) {
            if ($(this).val() == 1) {
                $('.familydeshi').show(200);
                $('.addrequired').attr('required', 'required');

            } else {
                $('.familydeshi').hide(200);
                $('.addrequired').removeAttr('required');


            }

        });

        function getUpzilla(district_id) {
            if (district_id > 0) {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    /* the route pointing to the post function */
                    url: "{{ route('signup.locationAjax.upzila') }}",
                    type: 'POST',
                    /* send the csrf-token and the input to the controller */
                    data: {
                        _token: CSRF_TOKEN,
                        districtid: district_id
                    },
                    dataType: 'JSON',
                    /* remind that 'data' is the response of the AjaxController */
                    success: function (data) {
                        $('#upzila').html('');
                        $('#upzila').append('<option value="">Select Thana Now ...</option>')
                        $.each(data, function (i, item) {
                            $('#upzila').append("<option value='" + item.id + "'" + ">" +
                                item.name + "</option>");
                        });
                    }
                });
            }
        }


    });

</script>
@endsection
