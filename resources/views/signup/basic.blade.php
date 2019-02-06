@extends('new.master')

@section('content')

<div class="container margin-50">

    <div class="row">
        <div class="col-md-2 col-sm-12 padding-0 margin-0"></div>

        <div class="col-md-8 col-sm-12 padding-0 margin-0">
            <div class="progress">
                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="{{ $completed }}"
                    aria-valuemin="0" aria-valuemax="100" style="width:{{ $completed }}%">
                    {{ $completed }}% completed
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


            <form class="padding-0-30 margin-bottom-20" method="POST" action="{{ route('signup.basicStore') }}" role="form"
                novalidate>
                @csrf

                <div class="form-group row">
                    <div class="col-sm-4">
                        <label for="height" class=" col-form-label">Height
                        </label>
                        <select name="height" id="input" class="form-control" required="required">
                            <option value="">Select Height ... </option>
                            @foreach (height() as $key => $value)
                            <option {{ old('height') == $key ? 'selected' : '' }} value="{{ $key }}">{{ $value
                                }}</option>
                            @endforeach
                        </select>

                        @if ($errors->has('height'))
                        <span class="text-danger" role="alert">
                            <strong>{{ $errors->first('height') }}</strong>
                        </span>
                        @endif
                        <span class="text-danger" role="alert">
                            <strong id="err_height"></strong>
                        </span>
                    </div>

                    <div class="col-sm-4">
                        <label for="weight" class=" col-form-label">Weight
                        </label>
                        <div class="">

                            <select name="weight" id="input" class="form-control" required="required">
                                <option value="">Select Weight ....</option>
                                @for ($i = 30; $i < 121; $i++) <option {{ old('weight') == $i ? 'selected' : '' }}
                                    value="{{ $i }}">{{ $i }} kg</option>
                                    @endfor
                            </select>
                            @if ($errors->has('weight'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('weight') }}</strong>
                            </span>
                            @endif
                            <span class="text-danger" role="alert">
                                <strong id="err_weight"></strong>
                            </span>
                        </div>
                    </div>


                    <div class="col-sm-4">
                        <label for="bodytype" class=" col-form-label">Body Type
                        </label>
                        <div class="">
                            <select name="bodytype" id="input" class="form-control" required="required">
                                <option value="">Select Body Type</option>
                                @foreach (bodytype() as $key => $value)
                                <option {{ old('bodytype') == $key ? 'selected' : '' }} value="{{ $key }}">{{
                                    $value
                                    }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('bodytype'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('bodytype') }}</strong>
                            </span>
                            @endif
                            <span class="text-danger" role="alert">
                                <strong id="err_bodytype"></strong>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="form-group row">

                    <div class="col-sm-4">
                        <label for="blood_group" class=" col-form-label">Blood Group
                        </label>
                        <div class="">
                            <select name="blood_group" id="input" class="form-control" required="required">
                                <option value="">Select Blood Group</option>
                                @foreach (bloodGroups() as $key => $value)
                                <option {{ old('blood_group') == $key ? 'selected' : '' }} value="{{ $key }}">{{
                                    $value
                                    }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('blood_group'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('blood_group') }}</strong>
                            </span>
                            @endif
                            <span class="text-danger" role="alert">
                                <strong id="err_blood_group"></strong>
                            </span>
                        </div>

                    </div>
                    <div class="col-sm-4">
                        <label for="skintone" class=" col-form-label">Skin Tone
                        </label>
                        <div class="">
                            <select name="skintone" id="input" class="form-control" required="required">
                                <option value="">Select Skin Tone</option>
                                @foreach (skintone() as $key => $value)
                                <option {{ old('skintone') == $key ? 'selected' : '' }} value="{{ $key }}">{{
                                    $value
                                    }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('skintone'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('skintone') }}</strong>
                            </span>
                            @endif
                            <span class="text-danger" role="alert">
                                <strong id="err_skintone"></strong>
                            </span>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label for="diet" class=" col-form-label">
                            Diet Type
                        </label>
                        <div class="">
                            <select name="diet" id="diet" class="form-control" required="required">
                                <option value="">Select Diet ... </option>
                                @foreach (diet() as $key => $item)
                                <option {{ old('diet') == $key ? 'selected' : '' }} value="{{ $key }}">{{
                                    $item }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('diet'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('diet') }}</strong>
                            </span>
                            @endif
                            <span class="text-danger" role="alert">
                                <strong id="err_diet"></strong>
                            </span>
                        </div>

                    </div>
                </div>


                <div class="form-group row">
                    <div class="col-sm-4">
                        <label for="sunsign" class=" col-form-label">
                            Sun Sign
                        </label>
                        <div class="">
                            <select name="sunsign" id="sunsign" class="form-control" required="required">
                                <option value="">Select sunsign ... </option>
                                @foreach (sunsign() as $key => $item)
                                <option {{ old('sunsign') == $key ? 'selected' : '' }} value="{{ $key }}">{{
                                    $item }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('sunsign'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('sunsign') }}</strong>
                            </span>
                            @endif
                            <span class="text-danger" role="alert">
                                <strong id="err_sunsign"></strong>
                            </span>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <label for="drinks" class=" col-form-label">Do you Drink?
                        </label>
                        <div class="">
                            <div class="radio">
                                <label>
                                    <input class="drickCla" required="required"
                                        {{ old('drinks') == 1? 'checked' : '' }} type="radio" name="drinks" value="1">
                                    No.
                                </label>
                                <label>
                                    <input class="drickCla" required="required"
                                        {{ old('drinks') == 2? 'checked' : '' }} type="radio" name="drinks" value="2">
                                    Yes.
                                </label>
                                <label>
                                    <input class="drickCla" required="required"
                                        {{ old('drinks') == 3? 'checked' : '' }} type="radio" name="drinks" value="3">
                                    Occasionally.
                                </label>
                            </div>
                            @if ($errors->has('drinks'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('drinks') }}</strong>
                            </span>
                            @endif
                            <span class="text-danger" role="alert">
                                <strong id="err_drinks"></strong>
                            </span>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label for="smoke" class=" col-form-label">Do you Smoke?
                        </label>
                        <div class="">
                            <div class="radio">
                                <label>
                                    <input class="claSmok" required="required" {{ old('smoke') == 1? 'checked' : '' }}
                                        type="radio" name="smoke" value="1">
                                    No.
                                </label>
                                <label>
                                    <input class="claSmok" required="required" {{ old('smoke') == 2? 'checked' : '' }}
                                        type="radio" name="smoke" value="2">
                                    Yes.
                                </label>
                                <label>
                                    <input class="claSmok" required="required" {{ old('smoke') == 3? 'checked' : '' }}
                                        type="radio" name="smoke" value="3">
                                    Occasionally.
                                </label>
                            </div>
                            @if ($errors->has('smoke'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('smoke') }}</strong>
                            </span>
                            @endif
                            <span class="text-danger" role="alert">
                                <strong id="err_smoke"></strong>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="income" class=" col-form-label">Annual Income
                        </label>
                        <div class="">
                            <input value="{{ old('income') }}" required="required" type="text" name="income" id="income"
                                class="form-control" placeholder="Your Annual Income">
                            @if ($errors->has('income'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('income') }}</strong>
                            </span>
                            @endif
                            <span class="text-danger" role="alert">
                                <strong id="err_income"></strong>
                            </span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="">
                            <label for="hobbies" class=" col-form-label">Interests and Hobbies</label>
                            <div class="">
                                <input required="required" value="{{ old('hobbies') }}" class="form-control"
                                    placeholder="Interests and hobbies" type="text" name="hobbies">
                                @if ($errors->has('hobbies'))
                                <span class="text-danger" role="alert">
                                    <strong>{{ $errors->first('hobbies') }}</strong>
                                </span>
                                @endif
                                <span class="text-danger" role="alert">
                                    <strong id="err_hobbies"></strong>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-4">
                        <label for="mstatus" class=" col-form-label">Marital Status
                        </label>
                        <div class="">
                            <select name="mstatus" id="mstatus" class="classMarital form-control" required="required">
                                <option value="">Select... </option>
                                @foreach (maritalstatus() as $key => $value)
                                <option {{ old('mstatus') == $key ? 'selected' : '' }} value="{{ $key }}">{{
                                    $value }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('mstatus'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('mstatus') }}</strong>
                            </span>
                            @endif
                            <span class="text-danger" role="alert">
                                <strong id="err_mstatus"></strong>
                            </span>
                        </div>

                    </div>

                    <div class="col-sm-4 howmanychildform" style="display: none">
                        <div class="">
                            <label for="howmanychild" class=" col-form-label">How many Children do you have?</label>
                            <div class="">
                                <input id="howmanychild" value="{{ old('howmanychild') }}" class="form-control"
                                    placeholder="Number of Children" type="text" name="howmanychild">
                                @if ($errors->has('howmanychild'))
                                <span class="text-danger" role="alert">
                                    <strong>{{ $errors->first('howmanychild') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 howmanychildform" style="display: none">
                        <div class="">
                            <label for="childrenliving" class=" col-form-label">Children are living with you?</label>
                            <div class="">

                                <label>
                                    <input class="childrenliving" required="required"
                                        {{ old('childrenliving') == 1? 'checked' : '' }} type="radio" name="childrenliving"
                                        value="0">
                                    No.
                                </label>
                                <label>
                                    <input class="childrenliving" required="required"
                                        {{ old('childrenliving') == 2? 'checked' : '' }} type="radio" name="childrenliving"
                                        value="1">
                                    Yes.
                                </label>

                                @if ($errors->has('childrenliving'))
                                <span class="text-danger" role="alert">
                                    <strong>{{ $errors->first('childrenliving') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row">


                    <div class="col-sm-3">
                        <label for="language" class=" col-form-label">Mother Tongue
                        </label>
                        <div class="">
                            <select name="language" id="language" class="classMarital form-control" required="required">
                                <option value="">Select... </option>
                                @foreach (motherTongue() as $key => $value)
                                <option {{ old('language') == $key ? 'selected' : '' }} value="{{ $key }}">{{
                                    $value }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('language'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('language') }}</strong>
                            </span>
                            @endif
                            <span class="text-danger" role="alert">
                                <strong id="language"></strong>
                            </span>
                        </div>

                    </div>



                    <div class="col-sm-4">
                        <label for="disability" class=" col-form-label">Do you have disability?
                        </label>
                        <div class="">
                            <div class="radio">
                                <label>
                                    <input class="inputDisability" required="required"
                                        {{ old('disability') == 0? 'checked' : '' }} type="radio" name="disability"
                                        value="0">
                                    No.
                                </label>
                                <label>
                                    <input id="inputDisabilityYes" class="inputDisability" required="required"
                                        {{ old('disability') == 1? 'checked' : '' }} type="radio" name="disability"
                                        value="1">
                                    Yes.
                                </label>
                            </div>
                            @if ($errors->has('disability'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('disability') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-sm-5 explain_disability">
                        <label for="explain_disability" class=" col-form-label">Please provide details about your
                            disability.
                        </label>
                        <textarea name="explain_disability" id="explain_disability" class="form-control" rows="3">{{ old('explain_disability')}}</textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-xs-12">
                        <button type="submit" id="submit" class="signupbutton btn btn-large btn-block btn-success">Save
                            and
                            Continue</button>
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
        //==================================================================  
        $("body").on("click", "#submit", function () {
            var err = 0; // check box
            $(
                "#err_height, #err_weight  , #err_bodytype , #err_blood_group, #err_skintone ,#err_diet , #err_sunsign, #err_drinks, #err_smoke ,#err_income , #err_hobbies ,#err_mstatus "
            ).text("");

            var height = $("select[name='height']").val();
            var weight = $("select[name='weight']").val();
            var bodytype = $("select[name='bodytype']").val();
            var blood_group = $("select[name='blood_group']").val();
            var skintone = $("select[name='skintone']").val();
            var diet = $("select[name='diet']").val();
            var sunsign = $("select[name='sunsign']").val();
            //var drinks = $("input[name='drinks']").val();          
            //var smoke = $("input[name='smoke']").val();
            var income = $("input[name='income']").val();
            var hobbies = $("input[name='hobbies']").val();
            var mstatus = $("select[name='mstatus']").val();


            if (height == "") {
                $("#err_height").text("Height Required");
                err++;
            }
            if (weight == "") {
                $("#err_weight").text("Weight Required");
                err++;
            }

            if (bodytype == "") {
                $("#err_bodytype").text("Body Type Required");
                err++;
            }
            /*           
                       else if (fname.match(/[$,-,'',#,@,&,!_,%]/)) {
                           $("#err_fname").text("Please don't use this $,-,'',#,@,&,!_,%");
                           err++;
                       }*/
            if (blood_group == "") {
                $("#err_blood_group").text("Blood Group Required");
                err++;
            }
            if (skintone == "") {
                $('#err_skintone').text("Skin Tone  Required");
                err++;
            }
            if (diet == "") {
                $("#err_diet").text("Diet Type Required");
                err++;
            }
            if (sunsign == "") {
                $("#err_sunsign").text("Sun Sign Required");
                err++;
            }
            if (!$(".drickCla").is(":checked")) {
                $("#err_drinks").text("Do you Drink Required");
                err++;
            }
            if (!$(".claSmok").is(":checked")) {
                $("#err_smoke").text("Do you Smoke Required");
                err++;
            }
            if (income == "") {
                $("#err_income").text("Annual Income Required");
                err++;
            }

            if (hobbies == "") {
                $("#err_hobbies").text("Interests and Hobbies Required");
                err++;
            }
            if (mstatus == "") {
                $("#err_mstatus").text("Marital Status Required");
                err++;
            }

            if (err > 0) {
                return false;
            }
            return true;
        });

        //==================================================================      
        howmanychild();

        function howmanychild(mstatus_value) {
            if ($('#mstatus').val() > 1) {
                $('.howmanychildform').show(100);
                $('#howmanychild').attr('required', 'required');

            } else {
                $('.howmanychildform').hide(100);
                $('#howmanychild').val('');
                $('#howmanychild').removeAttr('required');
            }
        }
        $('#mstatus').change(function (e) {
            howmanychild();
        });

        $('.explain_disability').hide();


        if ($('#inputDisabilityYes').is(':checked')) {
            $('.explain_disability').show(100);
            $('#explain_disability').attr('required', 'required');
        } else {
            $('.explain_disability').hide(50);
            $('#explain_disability').removeAttr('required');
        }
        $('.inputDisability').on('click', function () {
            if ($(this).val() == 1) {
                $('.explain_disability').show(100);
                $('#explain_disability').attr('required', 'required');
            } else {
                $('.explain_disability').hide(50);
                $('#explain_disability').removeAttr('required');

            }
        });
    });

</script>
@endsection
