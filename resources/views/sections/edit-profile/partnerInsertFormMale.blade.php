<form id="insertpreference" method="POST" action="{{ route('users.editprofile.partner.store') }}" class="padding-0-30"
    style="display: block;">
    @csrf
    <div class="form-group row">
        <h2>Bride (Partner) Preference</h2>
        <small>How do you like your Bride?</small>
        <hr>
    </div>
    <div class="form-group row">
        <label for="minage" class="col-md-4 col-form-label">
            Minimum Age
            <span>*</span></label>
        <div class="col-md-8">
            <input value="{{ old('minage') }}" id="minage" name="minage" placeholder="Minimum Age" class="form-control here"
                type="text">
            @if ($errors->has('minage'))
            <span class="text-danger" role="alert">
                <strong>{{ $errors->first('minage') }}</strong>
            </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="maxage" class="col-md-4 col-form-label">
            Maximum Age
            <span>*</span></label>
        <div class="col-md-8">
            <input value="{{ old('maxage') }}" id="maxage" name="maxage" placeholder="Maximum Age" class="form-control here"
                type="text">
            @if ($errors->has('maxage'))
            <span class="text-danger" role="alert">
                <strong>{{ $errors->first('maxage') }}</strong>
            </span>
            @endif
        </div>
    </div>


    <div class="form-group row">
        <label for="religion" class="col-md-4 col-form-label">
            Religion
            <span>*</span></label>
        <div class="col-md-8">
            <select name="religion" id="religion" class="form-control" required="required">
                <option>Select ... </option>
                <option value="0">Don't have Prefernece</option>
                @foreach ($religion as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
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
        <label for="maritalstatus" class="col-md-4 col-form-label">
            Marital Status
            <span>*</span></label>
        <div class="col-md-8">
            <select name="maritalstatus" id="maritalstatus" class="form-control" required="required">
                <option>Select ... </option>
                <option value="0">Don't have Prefernece</option>
                @foreach ($maritalstatus as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </select>
            @if ($errors->has('maritalstatus'))
            <span class="text-danger" role="alert">
                <strong>{{ $errors->first('maritalstatus') }}</strong>
            </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="personaladdress" class="col-md-4 col-form-label">
            Partner Willing to Take Children
            <span>*</span></label>
        <div class="col-md-8">
            <div class="radio">
                <label>
                    <input type="radio" class="child" name="child" value="1">
                    <span>Yes</span></label>
                <label>
                    <input type="radio" class="child" name="child" value="2">
                    <span>No</span></label>
            </div>
            @if ($errors->has('fname'))
            <span class="text-danger" role="alert">
                <strong>{{ $errors->first('child') }}</strong>
            </span>
            @endif
        </div>
    </div>



    <div class="form-group row">
        <label for="mineducation" class="col-md-4 col-form-label">
            Min Education level
            <span>*</span></label>
        <div class="col-md-8">
            <select name="mineducation" id="mineducation" class="form-control" required="required">
                <option>Select ... </option>
                <option value="0">Don't have Prefernece</option>
                @foreach ($educationLevel as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </select>
            @if ($errors->has('mineducation'))
            <span class="text-danger" role="alert">
                <strong>{{ $errors->first('mineducation') }}</strong>
            </span>
            @endif
        </div>
    </div>


    <div class="form-group row">
        <label for="educationarea" class="col-md-4 col-form-label">
            Field /Area of Education
            <span>*</span></label>
        <div class="col-md-8">
            <select name="educationarea" id="educationarea" class="form-control" required="required">
                <option>Select ... </option>
                <option value="0">Don't have Prefernece</option>
                @foreach ($educationarea as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </select>
            @if ($errors->has('educationarea'))
            <span class="text-danger" role="alert">
                <strong>{{ $errors->first('educationarea') }}</strong>
            </span>
            @endif
        </div>
    </div>



    <div class="form-group row">
        <h4>Profression and Job</h4>
        <hr>
    </div>

    <div class="form-group row">
        <label for="profession" class="col-md-4 col-form-label">
            Profession Type
            <span>*</span></label>
        <div class="col-md-8 autocomplete">
            <select name="profession" id="profession" class="form-control" required="required">
                <option>Select ...</option>
                <option value="0">Select Profession Type</option>
                @foreach ($professionType as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </select>
            @if ($errors->has('profession'))
            <span class="text-danger" role="alert">
                <strong>{{ $errors->first('profession') }}</strong>
            </span>
            @endif

        </div>
    </div>

    <div class="form-group row">
        <h4>aaaaa</h4>
        <hr>
    </div>
    <div class="form-group row">
        <label for="height" class="col-md-4 col-form-label">
            Height
            <span>*</span></label>
        <div class="col-md-8">
            <input value="{{ old('height') }}" id="height" name="height" placeholder="Height" class="form-control here"
                type="text">
            @if ($errors->has('height'))
            <span class="text-danger" role="alert">
                <strong>{{ $errors->first('height') }}</strong>
            </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="complextion" class="col-md-4 col-form-label">
            Complextion
            <span>*</span></label>
        <div class="col-md-8">
            <select name="complextion" id="complextion" class="form-control" required="required">
                <option>Select ... </option>
                <option value="0">Don't have Prefernece</option>
                @foreach ($complextion as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </select>
            @if ($errors->has('complextion'))
            <span class="text-danger" role="alert">
                <strong>{{ $errors->first('complextion') }}</strong>
            </span>
            @endif
        </div>
    </div>


    <div class="form-group row">
        <label for="payer" class="col-md-4 col-form-label">
            Says Payer
            <span>*</span></label>
        <div class="col-md-8">
            <div class="radio">
                <label>
                    <input type="radio" class="payer" name="payer" value="1">
                    <span>Yes</span></label>
                <label>
                    <input type="radio" class="payer" name="payer" value="2">
                    <span>No</span></label>
            </div>
            @if ($errors->has('payer'))
            <span class="text-danger" role="alert">
                <strong>{{ $errors->first('payer') }}</strong>
            </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="bridejoballow" class="col-md-4 col-form-label">
            Bride Allowed to Job
            <span>*</span></label>
        <div class="col-md-8">
            <div class="radio">
                <label>
                    <input type="radio" class="bridejoballow" name="bridejoballow" value="1">
                    <span>Yes</span></label>

                <label>
                    <input type="radio" class="bridejoballow" name="bridejoballow" value="2">
                    <span>No</span></label>
            </div>
            @if ($errors->has('bridejoballow'))
            <span class="text-danger" role="alert">
                <strong>{{ $errors->first('bridejoballow') }}</strong>
            </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="bridehijab" class="col-md-4 col-form-label">
            Wears Hijab and Burka
            <span>*</span></label>
        <div class="col-md-8">
            <div class="radio">
                <label>
                    <input type="radio" class="bridehijab" name="bridehijab" value="1">
                    <span>Yes</span></label>
                <label>
                    <input type="radio" class="bridehijab" name="bridehijab" value="2">
                    <span>No</span></label>
            </div>
            @if ($errors->has('bridehijab'))
            <span class="text-danger" role="alert">
                <strong>{{ $errors->first('bridehijab') }}</strong>
            </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="diet" class="col-md-4 col-form-label">
            Diet Type
            <span>*</span></label>
        <div class="col-md-8">
            <select name="diet" id="diet" class="form-control" required="required">
                <option>Select ... </option>
                @foreach (diet() as $key => $item)
                <option value="{{ $key }}">{{
                    $item }}</option>
                @endforeach
            </select>
            @if ($errors->has('diet'))
            <span class="text-danger" role="alert">
                <strong>{{ $errors->first('diet') }}</strong>
            </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="drinks" class="col-md-4 col-form-label">
            Drinks
            <span>*</span></label>
        <div class="col-md-8">
            <div class="radio">
                <label>
                    <input type="radio" class="drinks" name="drinks" value="1">
                    <span>Yes</span></label>
                <label>
                    <input type="radio" class="drinks" name="drinks" value="2">
                    <span>No</span></label>
            </div>
            @if ($errors->has('drinks'))
            <span class="text-danger" role="alert">
                <strong>{{ $errors->first('drinks') }}</strong>
            </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="smoke" class="col-md-4 col-form-label">
            Smoker
            <span>*</span></label>
        <div class="col-md-8">
            <div class="radio">
                <label>
                    <input type="radio" class="smoke" name="smoke" value="1">
                    <span>Yes</span></label>
                <label>
                    <input type="radio" class="smoke" name="smoke" value="2">
                    <span>No</span></label>
            </div>
            @if ($errors->has('smoke'))
            <span class="text-danger" role="alert">
                <strong>{{ $errors->first('smoke') }}</strong>
            </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="disability" class="col-md-4 col-form-label">
            Allow Partner Disability
            <span>*</span></label>
        <div class="col-md-8">
            <div class="radio">
                <label>
                    <input type="radio" class="disability" name="disability" value="1">
                    <span>Yes</span></label>
                <label>
                    <input type="radio" class="disability" name="disability" value="2">
                    <span>No</span></label>
            </div>
            @if ($errors->has('disability'))
            <span class="text-danger" role="alert">
                <strong>{{ $errors->first('disability') }}</strong>
            </span>
            @endif
        </div>
    </div>


    
    <div class="form-group row">
        <label for="mothertongue" class="col-md-4 col-form-label">
            Mother Tongue
            <span>*</span></label>
        <div class="col-md-8">
            <select name="mothertongue" id="mothertongue" class="form-control" required="required">
                <option>Select ... </option>
                <option value="0">Don't have Prefernece</option>
                @foreach ($motherTongue as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </select>
            @if ($errors->has('mothertongue'))
            <span class="text-danger" role="alert">
                <strong>{{ $errors->first('mothertongue') }}</strong>
            </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="country" class="col-md-4 col-form-label">
            Partner Living Country
            <span>*</span></label>
        <div class="col-md-8">
            <select name="livingcountry" id="country" class="form-control" required="required">
                <option>Select ... </option>
                <option value="0">Don't have Prefernece</option>
                @foreach ($partnerCountry as $key => $value)
                <option value="{{  $value->id }}">{{ $value->name }}</option>
                @endforeach
            </select>
            @if ($errors->has('livingcountry'))
            <span class="text-danger" role="alert">
                <strong>{{ $errors->first('livingcountry') }}</strong>
            </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="resstatus" class="col-md-4 col-form-label">
            Residential Status
            <span>*</span></label>
        <div class="col-md-8">
            <div class="radio">
                <label>
                    <input type="radio" class="resstatus" name="resstatus" value="1">
                    <span>Don't Have Preference</span></label>
                <label>
                    <input type="radio" class="resstatus" name="resstatus" value="2">

                    <span>Owner</span></label>
                <label>
                    <input type="radio" class="resstatus" name="resstatus" value="2">

                    <span>Rental</span></label>
            </div>
            @if ($errors->has('resstatus'))
            <span class="text-danger" role="alert">
                <strong>{{ $errors->first('resstatus') }}</strong>
            </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="partnerdistrict" class="col-md-4 col-form-label">
            Partner Living District / Area
            <span>*</span></label>
        <div class="col-md-8">
            <select name="partnerdistrict" id="partnerdistrict" class="form-control" required="required">
                <option>Select ... </option>
                <option value="0">Don't have Prefernece</option>
                @foreach ($partnetDistricts as $value)
                <option value="{{ $value->id }}">{{ $value->name }}</option>
                @endforeach
            </select>
            @if ($errors->has('partnerdistrict'))
            <span class="text-danger" role="alert">
                <strong>{{ $errors->first('partnerdistrict') }}</strong>
            </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="familydistrict" class="col-md-4 col-form-label">
            Home / Family District
            <span>*</span></label>
        <div class="col-md-8">
            <select name="familydistrict" id="familydistrict" class="form-control" required="required">
                <option>Select ... </option>
                <option value="0">Don't have Prefernece</option>
                @foreach ($partnetDistricts as $value)
                <option value="{{ $value->id }}">{{ $value->name }}</option>
                @endforeach
            </select>
            @if ($errors->has('familydistrict'))
            <span class="text-danger" role="alert">
                <strong>{{ $errors->first('familydistrict') }}</strong>
            </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="livingarea" class="col-md-4 col-form-label">
            Living In
            <span>*</span></label>
        <div class="col-md-8">
            <input value="{{ old('livingarea') }}" id="livingarea" name="livingarea" placeholder="Lives In" class="form-control here"
                type="text">
            @if ($errors->has('livingarea'))
            <span class="text-danger" role="alert">
                <strong>{{ $errors->first('livingarea') }}</strong>
            </span>
            @endif
        </div>
    </div>


    <div class="form-group row">
        <label for="montlyincome" class="col-md-4 col-form-label">
            Montly Income
            <span>*</span></label>
        <div class="col-md-8">
            <input value="{{ old('livingarea') }}" id="montlyincome" name="montlyincome" placeholder="Montly Income"
                class="form-control here" type="text">
            @if ($errors->has('montlyincome'))
            <span class="text-danger" role="alert">
                <strong>{{ $errors->first('montlyincome') }}</strong>
            </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="personalvalues" class="col-md-4 col-form-label">
            Partner Personal Values
            <span>*</span></label>
        <div class="col-md-8">
            <input value="{{ old('personalvalues') }}" id="personalvalues" name="personalvalues" placeholder="Partner Personal Values"
                class="form-control here" type="text">
            @if ($errors->has('personalvalues'))
            <span class="text-danger" role="alert">
                <strong>{{ $errors->first('personalvalues') }}</strong>
            </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="familyvalues" class="col-md-4 col-form-label">
            Family Personal Values
            <span>*</span></label>
        <div class="col-md-8">
            <input value="{{ old('familyvalues') }}" id="familyvalues" name="familyvalues" placeholder="Family Personal Values"
                class="form-control here" type="text">
            @if ($errors->has('familyvalues'))
            <span class="text-danger" role="alert">
                <strong>{{ $errors->first('familyvalues') }}</strong>
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
