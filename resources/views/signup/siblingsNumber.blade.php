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


            <form class="padding-0-30 margin-bottom-20" method="POST" action="{{ route('signup.storeSiblingNumber') }}"
                aria-label="{{ __('Register') }}" role="form">
                @csrf

                <div class="form-group row">
                    <div class="col-xs-12">
                        <label for="havesiblings" class=" col-form-label">Do you have brothers and sisters?
                        </label>
                        <div class="">
                            <input required="required" {{ old('havesiblings') == 1 ? 'checked':'' }} type="radio" name="havesiblings"
                                class="havesiblings chekhavesiblings" value="1" />
                            No
                            <input required="required" {{ old('havesiblings') == 2 ? 'checked':'' }} type="radio" name="havesiblings"
                                class="havesiblings chekhavesiblings" value="2" id="havesiblingsId" />
                            yes
                            @if ($errors->has('havesiblings'))
                            <br>
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('havesiblings') }}</strong>
                            </span>
                            @endif
                        </div>
                        <span class="text-danger" role="alert">
                            <strong id="err_havesiblings"></strong>
                        </span>
                    </div>

                </div>
                <div class="col-xs-12 moreinfo">
                    <div class="form-group row">
                        <label for="brothersnumber" class="col-sm-4 col-form-label padding-10-0 ">Number of
                            Brothers
                            <br>
                            <span class="text-danger" role="alert">
                                <strong id="err_brothersnumber"></strong>
                            </span>
                        </label>
                        <div class="col-sm-2 ">
                            <div class="">
                                <input min="0" value="{{ old('brothersnumber') }}" id="brothersnumber" name="brothersnumber"
                                    class="form-control addrequired" type="number" max="20">
                                @if ($errors->has('brothersnumber'))
                                <span class="text-danger" role="alert">
                                    <strong>{{ $errors->first('brothersnumber') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <label for="brothersmarriednumber" class="col-sm-4 col-form-label padding-10-0 ">Number of
                            Brothers Married
                            <br/>
                            <span class="text-danger" role="alert">
                                <strong id="err_brothersmarriednumber"></strong>
                            </span>
                        </label>
                        <div class="col-sm-2 ">
                            <div class="">
                                <input min="0" value="{{ old('brothersnmarriedumber') }}" id="brothersmarriednumber"
                                    name="brothersmarriednumber" class="form-control addrequired" type="number" max="20">
                                @if ($errors->has('brothersmarriednumber'))
                                <span class="text-danger" role="alert">
                                    <strong>{{ $errors->first('brothersmarriednumber') }}</strong>
                                </span>
                                @endif
                                <span class="text-danger" role="alert">
                                    <strong id="err_brothersmarriednumber"></strong>
                                </span>
                            </div>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="sistersnumber" class="col-sm-4 col-form-label padding-10-0 ">Number of
                            Sisters
                            <br/>
                            <span class="text-danger" role="alert">
                                <strong id="err_sistersnumber"></strong>
                            </span>
                        </label>
                        <div class="col-sm-2 ">
                            <div class="">
                                <input min="0" value="{{ old('sistersnumber') }}" id="sistersnumber" name="sistersnumber"
                                    class="form-control addrequired" type="number" max="20">
                                @if ($errors->has('sistersnumber'))
                                <span class="text-danger" role="alert">
                                    <strong>{{ $errors->first('sistersnumber') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <label for="sistersmarriednumber" class="col-sm-4 col-form-label padding-10-0 ">Number of
                            Sisters Married
                            <br>
                            <span class="text-danger" role="alert">
                                <strong id="err_sistersmarriednumber"></strong>
                            </span>
                        </label>
                        <div class="col-sm-2 ">
                            <div class="">
                                <input min="0" value="{{ old('sistersnmarriedumber') }}" id="sistersmarriednumber" name="sistersmarriednumber"
                                    class="form-control addrequired" type="number" max="20">
                                @if ($errors->has('sistersmarriednumber'))
                                <span class="text-danger" role="alert">
                                    <strong>{{ $errors->first('sistersmarriednumber') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>

                <div class="form-group row">

                </div>

                <hr>
                <div class="form-group row">
                    <div class="col-xs-12">
                        <button type="submit" id="submit" class="signupbutton btn btn-large btn-block btn-success">Save and
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
        $('.moreinfo').hide();

        changeRequired($('.havesiblings').val());

        $('.havesiblings').on('click', function () {
            changeRequired($(this).val());
        });

        function changeRequired(currentvalue) {
            if (currentvalue == 2) {
                $('.addrequired').attr('required', 'required');
                $('.moreinfo').show(300);
            } else if (currentvalue == 1) {
                $('.moreinfo').hide(300);
                $('.addrequired').removeAttr('required');
            } else {
                $('.moreinfo').hide(300);
            }
        }

//===========================================================
    $("body").on("click", "#submit", function () {
            var err = 0;
            $("#err_havesiblings, #err_brothersnumber , #err_brothersmarriednumber , #err_sistersnumber  , #err_sistersmarriednumber" ).text("");

            var brothersnumber = $("input[name='brothersnumber']").val();
            var brothersmarriednumber = $("input[name='brothersmarriednumber']").val();
            var sistersnumber = $("input[name='sistersnumber']").val();
            var sistersmarriednumber = $("input[name='sistersmarriednumber']").val();
            //var permanentaddress = $("textarea[name='permanentaddress']").val();


            if (!$(".chekhavesiblings").is(":checked")) {
                    $("#err_havesiblings").text("Do you have brothers and sisters Required");
                     err++;
                }

                    if($("#havesiblingsId").is(":checked")){

                            if (brothersnumber == "") {
                                $("#err_brothersnumber").text("Number of Brothers Required");
                                err++;
                            }
                            if (brothersmarriednumber == "") {
                                $("#err_brothersmarriednumber").text("Number of Brothers Married Required");
                                err++;
                            }
                            if (sistersnumber == "") {
                                $("#err_sistersnumber").text("Number of Sisters Required");
                                err++;
                            }
                            if (sistersmarriednumber == "") {
                                $("#err_sistersmarriednumber").text("Number of Sisters Married Required");
                                err++;
                            }
                    }  

            /*
            else if (fname.match(/[$,-,'',#,@,&,!_,%]/)) {
                $("#err_fname").text("Please don't use this $,-,'',#,@,&,!_,%");
                err++;
            }*/

            if (err > 0) {
                return false;
            }
            return true;
        });
//===========================================================

    });

</script>
@endsection
