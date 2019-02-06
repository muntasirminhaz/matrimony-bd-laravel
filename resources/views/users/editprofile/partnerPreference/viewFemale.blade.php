@extends('layouts.users')


@section('content')



<div class="col-md-9 card">




    @if($errors->any())
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        <strong>Changes not saved.</strong> . Please try again with valid information.
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
            <span class="h3 bold-text">Groom (Partner) Preference</span>
            <a type="button" href="{{ route('users.editprofile.partner.edit' , $userid) }}" class="btn btn-info btn-sm pull-right"><span
                    class="edit-icon fa fa-edit"></span> Edit Preference</a>
        </div>
        <div class="panel-body">






            <div class="table-responsive show-userinfo" style="">
                <table class="table table-light">
                    <tbody>

                        <tr>
                            <td width="200">
                                Minimum age

                            </td>
                            <td class="bold-text">{{ $userinfo->age_minimun }} Years</td>
                        </tr>


                        <tr>
                            <td width="200">
                                Maximum age

                            </td>
                            <td class="bold-text">{{ $userinfo->age_maximum }} Years</td>
                        </tr>


                        <tr>
                            <td width="200">
                                Religion

                            </td>
                            <td class="bold-text"> {{ religion($userinfo->religion) }}</td>
                        </tr>


                        <tr>
                            <td width="200">
                                Martial status

                            </td>
                            <td class="bold-text">{{ maritalstatus($userinfo->marital_status) }}</td>
                        </tr>


                        <tr>
                            <td width="200">
                                Willing to take children

                            </td>
                            <td class="bold-text">{{ $userinfo->children_allow === '1' ? 'Yes, must be willing to take
                                children' : 'No, not willing to take children' }}</td>
                        </tr>


                        <tr>
                            <td width="200">
                                Education level

                            </td>
                            <td class="bold-text">{{ educationLevel($userinfo->education_level) }}</td>
                        </tr>


                        <tr>
                            <td width="200">
                                Education Area

                            </td>
                            <td class="bold-text">{{ educationArea($userinfo->education_area) }}</td>
                        </tr>


                        <tr>
                            <td width="200">
                                Profession

                            </td>
                            <td class="bold-text">{{ professionType($userinfo->profession) }}</td>
                        </tr>


                        <tr>
                            <td width="200">
                                Height

                            </td>
                            <td class="bold-text">{{ $userinfo->height }}</td>
                        </tr>


                        <tr>
                            <td width="200">
                                Complextion

                            </td>
                            <td class="bold-text">{{ complexion($userinfo->complexion) }}</td>
                        </tr>


                        <tr>
                            <td width="200">
                                Religious / Say's payer

                            </td>
                            <td class="bold-text">{{ $userinfo->saying_prayer === '1' ? 'Yes' : 'No' }}</td>
                        </tr>




                        <tr>
                            <td width="200">
                                Diet Type

                            </td>
                            <td class="bold-text">{{ diet($userinfo->diet) }}</td>
                        </tr>


                        <tr>
                            <td width="200">
                                Drinks

                            </td>
                            <td class="bold-text">{{ $userinfo->drink === '1' ? 'Yes, partner can do drinking.' : 'No,
                                parter cannot have habit of drinking.' }}</td>
                        </tr>


                        <tr>
                            <td width="200">
                                Smokes

                            </td>
                            <td class="bold-text">{{ $userinfo->smoking === '1' ? 'Yes, partner can smoke.' : 'No,
                                parter cannot smoke.' }}</td>
                        </tr>


                        <tr>
                            <td width="200">
                                Montly Income

                            </td>
                            <td class="bold-text">{{ $userinfo->montly_income }}</td>
                        </tr>


                        <tr>
                            <td width="200">
                                Disability Allowed

                            </td>
                            <td class="bold-text">{{ $userinfo->disability_allow === '1' ? 'Yes, partner can have
                                disabilites.' : 'No, parter cannot have disabilites.' }}</td>
                        </tr>


                        <tr>
                            <td width="200">
                                Mother Tongue

                            </td>
                            <td class="bold-text">{{ motherTongue($userinfo->mother_tongue) }}</td>
                        </tr>


                        <tr>
                            <td width="200">
                                Partner Resident District

                            </td>
                            <td class="bold-text">{{ $userinfo->expected_district_home }}</td>
                        </tr>


                        <tr>
                            <td width="200">
                                Partner Familty District

                            </td>
                            <td class="bold-text">{{ $userinfo->expected_district_familty }}</td>
                        </tr>


                        <tr>
                            <td width="200">
                                Living Area

                            </td>
                            <td class="bold-text">{{ $userinfo->expected_living_area }}</td>
                        </tr>


                        <tr>
                            <td width="200">
                                Residential Status

                            </td>
                            <td class="bold-text">{{ resStatus($userinfo->expected_residential_status) }}</td>
                        </tr>


                        <tr>
                            <td width="200">
                                Living Counry

                            </td>
                            <td class="bold-text"> {{ $userCountry->name }}</td>
                        </tr>


                        <tr>
                            <td width="200">
                                Personal Values

                            </td>
                            <td class="bold-text"> {{ $userinfo->personal_values }}</td>
                        </tr>


                        <tr>
                            <td width="200">
                                Familty Values
                            </td>
                            <td class="bold-text">{{ $userinfo->partner_family_values }} </td>
                        </tr>

                    </tbody>
                </table>
            </div>
















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
        $('.show-userinfo').show(0);
        $('.show-form').hide(0);
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
