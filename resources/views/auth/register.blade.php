@extends('new.master')

@section('content')

<div class="container margin-50">
    <div class="row padding-0">
        <div class="col-md-2 col-sm-12 padding-0 margin-0"></div>
        <div class="col-md-8 col-sm-12 center-block bg-warning ">

            <h1 class="center-block margin-0-auto text-align-center padding-top-20">Sign Up Now</h1>
            <hr>

            <form class="padding-0-30 margin-bottom-20" method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}"
                role="form">
                @csrf


                <input value="{{ old('hiddendob') }}" type="hidden" id="hiddendob" class="" name="hiddendob">




                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="profilemadeby" class="col-form-label">Profile Made by*
                        </label>
                        <div class="">
                            <select required='required' name="profilemadeby" id="profilemadeby" class="form-control">
                                <option value="">Select ...</option>
                                @foreach (profileMadeBy() as $key => $value)
                                <option {{ old('profilemadeby') == $key ? 'selected' : '' }} value="{{ $key }}">{{
                                    $value }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('profilemadeby'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('profilemadeby') }}</strong>
                            </span>
                            @endif
                            <span class="text-danger" role="alert">
                                <strong id="err_profilemadeby"></strong>
                            </span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label for="lookingfor" class="col-form-label">Looking for*
                        </label>
                        <div class="">
                            <select required='required' name="lookingfor" id="lookingfor" class="form-control">
                                <option value="">I am Looking for ...</option>
                                @foreach (lookingFor() as $key => $value)
                                <option {{ old('lookingfor') == $key ? 'selected' : '' }} value="{{ $key }}">{{ $value
                                    }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('lookingfor'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('lookingfor') }}</strong>
                            </span>
                            @endif
                            <span class="text-danger" role="alert">
                                <strong id="err_lookingfor"></strong>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="fname" class=" col-form-label">First Name*
                        </label>
                        <div class="">
                            <input required='required' value="{{ old('fname') }}" id="fname" name="fname" placeholder="First Name"
                                class="form-control here" type="text">
                            @if ($errors->has('fname'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('fname') }}</strong>
                            </span>
                            @endif
                            <span class="text-danger" role="alert">
                                <strong id="err_fname"></strong>
                            </span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label for="lname" class=" col-form-label">Last Name*
                        </label>
                        <div class="">
                            <input required='required' value="{{ old('lname') }}" id="lname" name="lname" placeholder="Last Name"
                                class="form-control here" type="text">
                            @if ($errors->has('lname'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('lname') }}</strong>
                            </span>
                            @endif
                            <span class="text-danger" role="alert">
                                <strong id="err_lname"></strong>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 padding-0">
                        <label for="dob" class="col-xs-12 col-form-label">Date of Birth*
                        </label>
                        <div class="col-xs-4">
                            <select required='year' name="year" id="year" class="form-control">
                                <option value="">Year</option>
                                @php $old = old('year'); @endphp
                                <?php                                                                
                                for ($i = date('Y') - 18  ; $i > date('Y') - 118 ; $i--){
                                    
                                    if($old == $i)
                                    echo "<option selected value='{$i}'>{$i}</option>";
                                    else
                                    echo "<option value='{$i}'>{$i}</option>";
                                }
                                ?>
                            </select>
                            @if ($errors->has('year'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('year') }}</strong>
                            </span>
                            @endif
                            <span class="text-danger" role="alert">
                                <strong id="err_year"></strong>
                            </span>
                        </div>
                        <div class="col-xs-4">
                            <select required='month' name="month" id="month" class="form-control">
                                <option value="">Month</option>
                                @php $old = old('month'); @endphp
                                <?php                                                                
                                    for ($i =1  ; $i <13 ; $i++){
                                        if($i < 10){
                                            if($old == $i){
                                            echo "<option selected value='0{$i}'>0{$i}</option>";
                                            }
                                            else{

                                            echo "<option value='0{$i}'>0{$i}</option>";
                                            }
                                        }else{
                                            if($old == $i){
                                            echo "<option selected value='{$i}'>{$i}</option>";
                                            }
                                            else{

                                            echo "<option value='{$i}'>{$i}</option>";
                                            }
                                        }
                                    } 
                                ?>




                            </select>
                            @if ($errors->has('month'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('month') }}</strong>
                            </span>
                            @endif
                            <span class="text-danger" role="alert">
                                <strong id="err_month"></strong>
                            </span>
                        </div>
                        <div class="col-xs-4">
                            <select required='date' name="date" id="date" class="form-control">
                                <option value="">Day</option>
                                @php $old = old('date'); @endphp
                                <?php                                                                
                                for ($i = 1  ; $i <32 ; $i++){
                                    if($i < 10){
                                        if($old == $i){
                                        echo "<option selected value='0{$i}'>0{$i}</option>";
                                        }
                                        else{

                                        echo "<option value='0{$i}'>0{$i}</option>";
                                        }
                                    }else{
                                        if($old == $i){
                                        echo "<option selected value='{$i}'>{$i}</option>";
                                        }
                                        else{

                                        echo "<option value='{$i}'>{$i}</option>";
                                        }
                                    }
                                } 
                            ?>
                            </select>
                            @if($errors->has('date'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('date') }}</strong>
                            </span>
                            @endif
                            <span class="text-danger" role="alert">
                                <strong id="err_date"></strong>
                            </span>
                        </div>
                        @if ($errors->has('hiddendob'))
                        <span class="text-danger" role="alert">
                            <strong id="err_date_false">{{ $errors->first('hiddendob') }}</strong>
                        </span>

                        @else
                        <span class="text-danger col-xs-12" role="alert">
                            <strong id="err_date_false"></strong>
                        </span>

                        @endif

                    </div>

                    <div class="col-sm-3 col-xs-12">
                        <label for="religion" class="col-form-label">Religion*
                        </label>
                        <div class="">
                            <select required='required' name="religion" id="religion" class="form-control">
                                <option value="">Select Religion ...</option>
                                @foreach (religion() as $key => $value)
                                <option {{ old('religion') == $key ? 'selected' : '' }} value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('religion'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('religion') }}</strong>
                            </span>
                            @endif
                            <span class="text-danger" role="alert">
                                <strong id="err_religion"></strong>
                            </span>
                        </div>
                    </div>
                    <div class="col-sm-3 col-xs-12">
                        <label for="subrel" class="col-form-label">subrel*
                        </label>
                        <div class="">
                            <select required='required' name="subrel" id="subrel" class="form-control">
                                <option value="">Select subrel ...</option>                                
                            </select>
                            @if ($errors->has('subrel'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('subrel') }}</strong>
                            </span>
                            @endif
                            <span class="text-danger" role="alert">
                                <strong id="err_subrel"></strong>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-xs-12">
                        <label for="describe" class=" col-form-label">Describe Yourself*
                        </label>
                        <div class="">
                            <textarea placeholder="Provide some information about yourself" class="form-control" name="description"
                                id="describe" cols="30" rows="4">{{ old('description') }}</textarea>
                            @if ($errors->has('description'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                            @endif
                            <span class="text-danger" role="alert">
                                <strong id="err_describe"></strong>
                            </span>
                        </div>
                    </div>
                </div>


                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="email" class=" col-form-label">Email*
                        </label>
                        <div class="">
                            <input required='required' value="{{ old('email') }}" id="email" name="email" placeholder="Email"
                                class="form-control here" type="email">
                            @if ($errors->has('email'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                            <span class="text-danger" role="alert">
                                <strong id="err_email"></strong>
                            </span>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <label for="mobile" class=" col-form-label">Candidate Phone No*
                        </label>
                        <div class="">
                            <input required='required' value="{{ old('mobile') }}" id="mobile" name="mobile"
                                placeholder="Mobile / Cell No." class="form-control here" type="text">
                            @if ($errors->has('mobile'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('mobile') }}</strong>
                            </span>
                            @endif
                            <span class="text-danger" role="alert">
                                <strong id="err_mobile"></strong>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="password" class=" col-form-label">Password*
                        </label>
                        <div class="">
                            <input required='required' id="password" name="password" placeholder="Password" class="form-control here"
                                type="password">
                            @if ($errors->has('password'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                            <span class="text-danger" role="alert">
                                <strong id="err_password"></strong>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="password_confirmation" class=" col-form-label">Confirm Password*
                        </label>
                        <div class="">
                            <input required='required' id="password_confirmation" name="password_confirmation"
                                placeholder="Confirm  Password" class="form-control here" type="password">
                            @if ($errors->has('password_confirmation'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                            @endif
                            <span class="text-danger" role="alert">
                                <strong id="err_password_confirmation"></strong>
                            </span>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="form-group row">
                    <div class="col-sm-12">
                        <label for="howhearaboutus" class="col-form-label">How did you here about us?
                        </label><br>

                        <select required='required' name="howhearaboutus" id="howhearaboutus" class="form-control">
                            <option value="">Select ...</option>
                            @foreach (howDdYouHereAboutUs() as $key => $value)
                            <option {{ old('howhearaboutus') == $key ? 'selected' : '' }} value="{{ $key }}">{{ $value
                                }}</option>
                            @endforeach
                        </select>




                    </div>
                </div>

                <div class="form-group row">


                    <div class="col-sm-12">
                        <p class="bold-text">I declare that;</p>
                        <div class="checkbox">
                            <label>
                                <input required='required' id="trueinfo" type="checkbox" class="trueinfo" name="trueinfo"
                                    value="1">
                                All Information I provided a Vaild, Real and Truthfull. I have read and agreed with
                                <a target="_blank" href="#">terms and condition.</a>
                            </label>
                            @if ($errors->has('trueinfo'))
                            <br>
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('trueinfo') }}</strong>
                            </span>
                            @endif
                            <span class="text-danger" role="alert">
                                <strong id="err_trueinfo"></strong>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-xs-12">
                        <button type="submit" class="signupbutton btn btn-large btn-block btn-success" id="sign-up">Sign
                            Up</button>
                    </div>
                </div>


            </form>

        </div>
        <div class="col-md-2 col-sm-12 padding-0 margin-0"></div>
    </div>
</div>

@endsection

@section("footerscript")
<script>
    $(document).ready(function () {



$('#religion').on('change', function () {  
    console.log($(this).val());
    $('#subrel').children().remove();
    $('#subrel').append('<option value="">Select ...</option>');    

    if($(this).val() == 1 ){
        @foreach (subIslam() as $key => $value)
        $('#subrel').append('<option value="{{ $key }}">{{ $value }}</option>');    
        @endforeach
        
    }
    if($(this).val() == 2 ){
        @foreach (subHindu() as $key => $value)
        $('#subrel').append('<option value="{{ $key }}">{{ $value }}</option>');    
        @endforeach
    }
    if($(this).val() == 3 ){
        @foreach (subBuddhism() as $key => $value)
        $('#subrel').append('<option value="{{ $key }}">{{ $value }}</option>');    
        @endforeach
    }
    if($(this).val() == 4 ){
        @foreach (subChrist() as $key => $value)
        $('#subrel').append('<option value="{{ $key }}">{{ $value }}</option>');    
        @endforeach
    }
    if($(this).val() == 5 ){
    $('#subrel').children().remove();
        $('#subrel').append('<option selected value="1">No Religion Followed</option>');
    }
   
});












        /* Form Validation */
        $("body").on("click", "#sign-up", function () {
            var err = 0;
            $(
                "#err_profilemadeby, #err_lookingfor, #err_fname , #err_lname, #err_year, #err_month , #err_date, #err_religion, #err_describe, #err_email ,#err_mobile , #err_password , #err_password_confirmation , #err_trueinfo "
            ).text("");

            var profilemadeby = $("select[name='profilemadeby']").val();
            var lookingfor = $("select[name='lookingfor']").val();
            var fname = $("input[name='fname']").val();
            var lname = $("input[name='lname']").val();
            var year = $("select[name='year']").val();
            var month = $("select[name='month']").val();
            var date = $("select[name='date']").val();
            var religion = $("select[name='religion']").val();
            var religion = $("select[name='subrel']").val();
            var describe = $("textarea[name='describe']").val();
            var email = $("input[name='email']").val();
            var mobile = $("input[name='mobile']").val();
            var password = $("input[name='password']").val();
            var password_confirmation = $("input[name='password_confirmation']").val();
            // var trueinfo = $("input[name='trueinfo']").val(); no need


            if (profilemadeby == "") {
                $("#err_profilemadeby").text("Profile Made by Required");
                err++;
            }
            if (lookingfor == "") {
                $("#err_lookingfor").text("Looking for Required");
                err++;
            }

            if (fname == "") {
                $("#err_fname").text("First Name Required");
                err++;
            } else if (fname.match(/[$,-,'',#,@,&,!_,%]/)) {
                $("#err_fname").text("Please don't use this $,-,'',#,@,&,!_,%");
                err++;
            }
            if (lname == "") {
                $("#err_lname").text("Last Name Required");
                err++;
            }

            if (year == "") {
                $('#err_year').text("Year  Required");
                err++;
            }
            if (month == "") {
                $("#err_month").text("Month Required");
                err++;
            }
            if (date == "") {
                $("#err_date").text("Date Required");
                err++;
            }
            if (religion == "") {
                $("#err_religion").text("Religion is Required");
                err++;
            }
            if (describe == "") {
                $("#err_describe").text("Describe Yourself is Required");
                err++;
            }
            if (email == "") {
                $("#err_email").text("Email is Required");
                err++;
            }
            if (mobile == "") {
                $("#err_mobile").text("Candidate Phone No is Required");
                err++;
            }
            if (subrel == "") {
                $("#err_subrel").text("Candidate Phone No is Required");
                err++;
            }
            if (password == "") {
                $("#err_password").text("Password is Required");
                err++;
            } else if (password_confirmation == "") {
                $("#err_password_confirmation").text("Confirm Password is Required");
                err++;
            } else if (password != password_confirmation) {
                $("#err_password").text("Password and Confirm Password is not match!");
            }

            if (!$("#trueinfo").is(":checked")) {
                $("#err_trueinfo").text("I declare that is Required");
                err++;
            }
            var currentDate = String(year + '-' + month + '-' + date);
            var valdiateDate = moment(currentDate, 'YYYY-MM-DD').isValid();

            console.log(currentDate);

            if (valdiateDate === true) {
                $("#err_date_false").text("");
                $('#hiddendob').val(currentDate);
            } else {
                err++;
                $("#err_date_false").text("The date of birth is invalid. Please correct it.");
                $("#hiddendob").val("");
            }


            if (err > 0) {
                return false;
            }
            return true;
        });
    });

</script>
@endsection
