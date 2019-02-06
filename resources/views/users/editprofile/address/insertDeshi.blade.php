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
            <form method="POST" action="{{ route('users.editprofile.address.storeDeshi') }}" class="padding-0-30">
                @csrf

                <input type="hidden" name="addresstype" value="{{ $addressType }}">
                <input type="hidden" name="addresslocation" value="deshi">
                <div class="form-group row">
                    <label for="resownership" class="col-sm-4 col-form-label">Ownership Status</label>
                    <div class="col-sm-8">
                        <label>
                            <input {{ old('resownership') == 1 ? 'checked' : '' }} type="radio" class="resownership"
                                name="resownership" value="1">
                            Owner
                        </label>
                        <label>
                            <input {{ old('resownership') == 2 ? 'checked' : '' }} type="radio" class="resownership"
                                name="resownership" value="2">Rental
                            Rental
                        </label>
                        @if ($errors->has('resownership'))
                        <span class="text-danger" role="alert">
                            <strong>{{ $errors->first('resownership') }}</strong>
                        </span>
                        @endif




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
                        </span>
                        @endif


                    </div>
                </div>


                <div class="form-group row">
                    <div class="col-sm-4">
                        <label for="divisions" class=" col-form-label">Division
                        </label>
                        <select name="divisions" id="divisions" class="form-control" required="required">
                            <option  value="">Select ...</option>
                            @foreach ($divisions as $division)
                            <option value="{{  $division->id }}">{{ $division->name }}</option>
                            @endforeach


                            @if ($errors->has('divisions'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('divisions') }}</strong>
                            </span>
                            @endif


                        </select>

                    </div>
                    <div class="col-sm-4">
                        <label for="districts" class=" col-form-label">District
                        </label>
                        <select data-oldval="{{ old('districts') }}" name="districts" id="districts" class="form-control" required="required">
                                <option>Select a Division First  ...</option>      
                        </select>

                        @if ($errors->has('districts'))
                        <span class="text-danger" role="alert">
                            <strong>{{ $errors->first('districts') }}</strong>
                        </span>
                        @endif

                        </select>

                    </div>
                    <div class="col-sm-4">
                        <label for="upzila" class=" col-form-label">Upzila
                        </label>
                        <select name="upzila" data-oldval="{{ old('upzila') }}" id="upzila" class="form-control" required="required">
                            <option>Select a District First  ...</option>                            
                         


                            @if ($errors->has('upzila'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('upzila') }}</strong>
                            </span>
                            @endif


                        </select>

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
        $('#districts').attr('disabled', 'disabled');
        $('#upzila').attr('disabled', 'disabled');


        
        $('#divisions').change(function (e) {
            if ($(this).val() > 0) {

                $('#districts').removeAttr('disabled');
                $('#upzila').attr('disabled', 'disabled');
                $('#upzila').children().remove();
                document.getElementById("upzila").innerHTML =
                    "<option value='' selected>Select a District First  ... </option>";

                changeDistrict();
            }
            if ($(this).val() == 0) {
                $('#districts').attr('disabled', 'disabled');
                $('#districts').children().remove();
                $('#upzila').attr('disabled', 'disabled');
                $('#upzila').children().remove();

                document.getElementById("upzila").innerHTML =
                    "<option value='' selected>Select a District First  ... </option>";

                document.getElementById("districts").innerHTML =
                    "<option value=''>Select a Division First ... </option>";

            }
        });


        $('#districts').change(function (e) {
            if ($(this).val() > 0) {
                $('#upzila').removeAttr('disabled');
                $('#upzila').children().remove();
                changeUpzilla();
            }
            if ($(this).val() == 0) {
                $('#districts').removeAttr('disabled');
                $('#upzila').attr('disabled', 'disabled');
                $('#upzila').children().remove();
                document.getElementById("districts").innerHTML =
                    "<option value=''>Select a Division First ... </option>";
                document.getElementById("upzila").innerHTML =
                    "<option value='' selected>Select a District First  ... </option>";
            }

        });

    

 function changeDistrict() {
        document.addEventListener("change", function (e) {
            if (e.target.id == "divisions") {
                divisionid = document.getElementById("divisions").value;
                xhr = new XMLHttpRequest();
                url = "{{ url("users/edit-profile/ajax/district/") }}" + "/" + divisionid;
                xhr.open('GET', url);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onload = function () {
                    if (xhr.status === 200 && xhr.responseText !== 0) {
                        document.getElementById("districts").innerHTML = '';
                        subLength = JSON.parse(xhr.responseText).length;
                        let myObj = JSON.parse(xhr.responseText);
                        addThis = "<option value=''>Select ... </option>";
                        for (let i = 0; i < subLength; i++) {
                            addThis += '<option value="' + myObj[i]['id'] + '">' + myObj[i]['name'] +
                                '</option>';
                        }
                        document.getElementById("districts").innerHTML = addThis;
                    } else if (xhr.status !== 200) {
                        // alert('Request failed.  Returned status of ' + xhr.status);
                    }
                };
                xhr.send();
            }
        });
    }

    function changeUpzilla() {
        document.addEventListener("change", function (e) {
            if (e.target.id == "districts") {
                districtsid = document.getElementById("districts").value;
                xhr = new XMLHttpRequest();
                url = "{{ url("users/edit-profile/ajax/upzila/") }}" + "/" + districtsid;
                xhr.open('GET', url);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onload = function () {
                    if (xhr.status === 200 && xhr.responseText !== 0) {
                        document.getElementById("upzila").innerHTML = '';
                        subLength = JSON.parse(xhr.responseText).length;
                        let myObj = JSON.parse(xhr.responseText);
                        addThis = "<option value=''>Select ... </option>";
                        for (let i = 0; i < subLength; i++) {
                            addThis += '<option value="' + myObj[i]['id'] + '">' + myObj[i]['name'] +
                                '</option>';
                        }
                        document.getElementById("upzila").innerHTML = addThis;
                    } else if (xhr.status !== 200) {
                        // alert('Request failed.  Returned status of ' + xhr.status);
                    }
                };
                xhr.send();
            }
        });
    }



    });

   

</script>

@endsection
