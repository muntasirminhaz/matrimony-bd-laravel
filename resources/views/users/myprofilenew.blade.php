@extends('new.master')
@section('content')
<div class="profileSection">
    <div class="container">
        <div class="row ">
            <div class="col-sm-1 hidden-xs"></div>
            <div class="col-sm-10">
                <br />
                <h3>
                        <a href="{{ route('users.myprofilenew') }}">New profile page</a>
                        &nbsp;
                        &nbsp;
                        &nbsp;
                        <a href="{{ route('users.myprofile') }}">oldprofile page</a>
                    </h3>
                <div class="profileContent">
                    <div class="pCont">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="myPimg margin-bottom-20 media photoslist">
                                        <img src="{{ url($profilePicture) }}" alt="" class="">
                                        <div class="photolistbutons">
                                            <a class="btn btn-primary btn-xs btn-block" href="{{ route('users.photos.index') }}">Change Profile Picture</a>

                                        </div>
                                    </div>

                                </div>
                                <div class="col-sm-9">
                                    <div class="basic-information">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="pConLeft">
                                                    <table class="table tbl-1">
                                                        <tr>
                                                            <td colspan="4">
                                                                Description : {{ Auth::user()->description }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Name :
                                                            </td>
                                                            <td>
                                                                {{ Auth::user()->first_name .
                                                                (Auth::user()->middle_name != '' ? ' ' .
                                                                Auth::user()->middle_name :'') . ' ' .
                                                                Auth::user()->last_name }}
                                                            </td>
                                                            <td>
                                                                Religion :
                                                            </td>
                                                            <td>
                                                                {{ religion(Auth::user()->religion) }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Marital Status :
                                                            </td>
                                                            <td>
                                                                {{ maritalstatus(Auth::user()->marital_status)}}
                                                            </td>
                                                            <td>
                                                                Location
                                                            </td>
                                                            <td>
                                                                : ---
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Posted by :
                                                            </td>
                                                            <td>
                                                                {{ relation(Auth::user()->regisration_as) }}
                                                            </td>
                                                            <td>
                                                                Mother Tongue :
                                                            </td>
                                                            <td>
                                                                {{ motherTongue(Auth::user()->language) }}
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <!--
                                            <div class="col-sm-6">
                                                <div class="pConRight">
                                                    dsfadsas
                                                </div>
                                            </div>-->
                                        </div>

                                        <div class="preVieProfile">
                                            <a href="">Preview your profile</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border-space"></div>

                        <div class="aboutMysefl">
                            <div class="profile_sel_tab">
                                About Myself
                            </div>
                            <div class="profile_sel_tab2">
                                <a href="#PartnerPreference">
                                    Partner Preference
                                </a>
                                <span class="glyphicon glyphicon-arrow-down" aria-hidden="true"></span>
                            </div>
                            <div class="space-10"></div>
                        </div>




                        <div class="heading-bottom">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-sm-6 margin-top-10">
                                        <div class="head">
                                            <h5>Basic Information</h5>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 margin-top-10">
                                        <div class="editRig pull-right">
                                            <a href="{{ $editBasic }}">Edit</a><span class="glyphicon glyphicon-play"
                                                aria-hidden="true">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-6 margin-top-10 margin-bottom-15">
                                    <table class="table table-borderless margin-top-10">
                                        <tbody>
                                            @foreach ($basic1 as $key => $value)
                                            @if ($value != '')

                                            <tr class="basTab">
                                                <td class="col-sm-5 padding-0">
                                                    <p>{{ $key }}</p>
                                                </td>
                                                <td class="col-sm-1 padding-0">
                                                    <p>:</p>
                                                </td>
                                                <td class="col-sm-6 padding-0">
                                                    <p>{{ $value }}</p>
                                                </td>
                                            </tr>
                                            @endif

                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-sm-6 margin-top-10 margin-bottom-15" style="border-left: 1px solid #D9D9D9;">
                                    <table class="table table-borderless margin-top-10">
                                        <tbody>
                                            @foreach ($basic2 as $key => $value)
                                            @if ($value != '')

                                            <tr class="basTab">
                                                <td class="col-sm-5 padding-0">
                                                    <p>{{ $key }}</p>
                                                </td>
                                                <td class="col-sm-1 padding-0">
                                                    <p>:</p>
                                                </td>
                                                <td class="col-sm-6 padding-0">
                                                    <p>{{ $value }}</p>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>



                        <div class="heading-bottom">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-sm-6 margin-top-10">
                                        <div class="head">
                                            <h5>Educational Information</h5>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 margin-top-10">
                                        <div class="editRig pull-right">
                                            <a href="{{ $addEducation ?? '#' }}">Add Education</a><span class="glyphicon glyphicon-play"
                                                aria-hidden="true">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if($education != NULL )                            
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-12 margin-top-10 margin-bottom-15">
                                    <table class="table table-bordered text-small margin-top-10">
                                        <tbody>
                                            <tr>
                                                <th>Educaiton Level</th>
                                                <th>Educaiton Area</th>
                                                <th>Degree</th>
                                                <th>Institution</th>
                                                <th>Status</th>
                                                <th>Options</th>
                                            </tr>
                                            @foreach ($education as $item)
                                            <tr class="basTab">
                                                <td>
                                                    <p>{!! $item->education_level !!}</p>
                                                </td>
                                                <td>
                                                    <p>{!! $item->education_area !!}</p>
                                                </td>
                                                <td>
                                                    <p>{!! $item->degree_name !!}</p>
                                                </td>
                                                <td>
                                                    <p>{!! $item->institution_name !!}</p>
                                                </td>
                                                <td>
                                                    <p>{!! $item->status !!}</p>
                                                </td>
                                                <td>
                                                    <p>{!! $item->edit !!}</p>
                                                </td>
                                            </tr>



                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        @endif




                        <div class="heading-bottom">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-sm-6 margin-top-10">
                                        <div class="head">
                                            <h5>Profession Information</h5>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 margin-top-10">
                                        <div class="editRig pull-right">
                                            <a href="{{ $editProfession }}">Edit</a><span class="glyphicon glyphicon-play"
                                                aria-hidden="true">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-6 margin-top-10 margin-bottom-15">
                                    <table class="table table-borderless margin-top-10">
                                        <tbody>
                                            @foreach ($profession1 as $key => $value)
                                            @if ($value != '')

                                            <tr class="basTab">
                                                <td class="col-sm-5 padding-0">
                                                    <p>{{ $key }}</p>
                                                </td>
                                                <td class="col-sm-1 padding-0">
                                                    <p>:</p>
                                                </td>
                                                <td class="col-sm-6 padding-0">
                                                    <p>{{ $value }}</p>
                                                </td>
                                            </tr>
                                            @endif

                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-sm-6 margin-top-10 margin-bottom-15" style="border-left: 1px solid #D9D9D9;">
                                    <table class="table table-borderless margin-top-10">
                                        <tbody>
                                            @foreach ($profession2 as $key => $value)
                                            @if ($value != '')

                                            <tr class="basTab">
                                                <td class="col-sm-5 padding-0">
                                                    <p>{{ $key }}</p>
                                                </td>
                                                <td class="col-sm-1 padding-0">
                                                    <p>:</p>
                                                </td>
                                                <td class="col-sm-6 padding-0">
                                                    <p>{{ $value }}</p>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>




                        <div class="heading-bottom">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-sm-6 margin-top-10">
                                        <div class="head">
                                            <h5>Father and Mother Information</h5>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 margin-top-10">
                                        <div class="editRig pull-right">
                                            <a href="{{ $editParent }}">Edit</a><span class="glyphicon glyphicon-play"
                                                aria-hidden="true">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-6 margin-top-10 margin-bottom-15">
                                    <table class="table table-borderless margin-top-10">
                                        <tbody>
                                            @foreach ($father as $key => $value)
                                            @if ($value != '')

                                            <tr class="basTab">
                                                <td class="col-sm-5 padding-0">
                                                    <p>{{ $key }}</p>
                                                </td>
                                                <td class="col-sm-1 padding-0">
                                                    <p>:</p>
                                                </td>
                                                <td class="col-sm-6 padding-0">
                                                    <p>{{ $value }}</p>
                                                </td>
                                            </tr>
                                            @endif

                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-sm-6 margin-top-10 margin-bottom-15" style="border-left: 1px solid #D9D9D9;">
                                    <table class="table table-borderless margin-top-10">
                                        <tbody>
                                            @foreach ($mother as $key => $value)
                                            @if ($value != '')

                                            <tr class="basTab">
                                                <td class="col-sm-5 padding-0">
                                                    <p>{{ $key }}</p>
                                                </td>
                                                <td class="col-sm-1 padding-0">
                                                    <p>:</p>
                                                </td>
                                                <td class="col-sm-6 padding-0">
                                                    <p>{{ $value }}</p>
                                                </td>
                                            </tr>
                                            @endif

                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-sm-12 margin-top-10 margin-bottom-15">
                                    <table class="table table-borderless margin-top-10">
                                        <tbody>
                                            <tr class="basTab">
                                                @foreach ($land as $key => $value)
                                                @if ($value != '')

                                                <td class="">
                                                    <p>{{ $key }} :{{ $value }}</p>
                                                </td>
                                                @endif

                                                @endforeach
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>




                        <div class="heading-bottom">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-sm-6 margin-top-10">
                                        <div class="head">
                                            <h5>Location and Address Information</h5>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 margin-top-10">
                                        <div class="editRig pull-right">
                                            <a href="{{ $editLocation }}">Edit</a><span class="glyphicon glyphicon-play"
                                                aria-hidden="true">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-6 margin-top-10 margin-bottom-15">
                                    <table class="table table-borderless margin-top-10">
                                        <tbody>
                                            @foreach ($location1 as $key => $value)
                                            @if ($value != '')

                                            <tr class="basTab">
                                                <td class="col-sm-5 padding-0">
                                                    <p>{{ $key }}</p>
                                                </td>
                                                <td class="col-sm-1 padding-0">
                                                    <p>:</p>
                                                </td>
                                                <td class="col-sm-6 padding-0">
                                                    <p>{{ $value }}</p>
                                                </td>
                                            </tr>
                                            @endif

                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-sm-6 margin-top-10 margin-bottom-15" style="border-left: 1px solid #D9D9D9;">
                                    <table class="table table-borderless margin-top-10">
                                        <tbody>
                                            @foreach ($location2 as $key => $value)
                                            @if ($value != '')

                                            <tr class="basTab">
                                                <td class="col-sm-5 padding-0">
                                                    <p>{{ $key }}</p>
                                                </td>
                                                <td class="col-sm-1 padding-0">
                                                    <p>:</p>
                                                </td>
                                                <td class="col-sm-6 padding-0">
                                                    <p>{{ $value }}</p>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>



                        <div class="heading-bottom">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-sm-6 margin-top-10">
                                        <div class="head">
                                            <h5>Siblings Information</h5>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 margin-top-10">
                                        <div class="editRig pull-right">
                                            <a href="{{ $editSiblings }}">Edit</a><span class="glyphicon glyphicon-play"
                                                aria-hidden="true">
                                                <a href="{{ $addSiblings }}">Add New</a><span class="glyphicon glyphicon-play"
                                                    aria-hidden="true">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-6 margin-top-10 margin-bottom-15">
                                    <table class="table table-borderless margin-top-10">
                                        <tbody>
                                            @foreach ($siblings1 as $key => $value)
                                            @if ($value != '')

                                            <tr class="basTab">
                                                <td class="col-sm-5 padding-0">
                                                    <p>{{ $key }}</p>
                                                </td>
                                                <td class="col-sm-1 padding-0">
                                                    <p>:</p>
                                                </td>
                                                <td class="col-sm-6 padding-0">
                                                    <p>{{ $value }}</p>
                                                </td>
                                            </tr>
                                            @endif

                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-sm-6 margin-top-10 margin-bottom-15" style="border-left: 1px solid #D9D9D9;">
                                    <table class="table table-borderless margin-top-10">
                                        <tbody>
                                            @foreach ($siblings2 as $key => $value)
                                            @if ($value != '')

                                            <tr class="basTab">
                                                <td class="col-sm-5 padding-0">
                                                    <p>{{ $key }}</p>
                                                </td>
                                                <td class="col-sm-1 padding-0">
                                                    <p>:</p>
                                                </td>
                                                <td class="col-sm-6 padding-0">
                                                    <p>{{ $value }}</p>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                @if ($siblings != '')
                                    
                                <div class="col-sm-12 margin-top-10 margin-bottom-15">
                                    <table class="table table-bordered margin-top-10">
                                        <tbody>
                                            @foreach ($siblings as $item)
                                            <tr class="basTab">
                                                <td class="">
                                                    <p>
                                                        @foreach ($item as $key=>$value)
                                                        @if ($siblingFields[$key] != 'delete' &&
                                                        $siblingFields[$key] != 'id' &&
                                                        $siblingFields[$key] != 'edit')
                                                        @if ($value != '')
                                                        <span>{{ $siblingFields[$key] }} : <span class="bold-text">{{
                                                                $value }}</span></span>,
                                                        @endif
                                                        @endif
                                                        @endforeach
                                                        {!! $item->edit !!}
                                                    </p>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                @endif

                            </div>
                        </div>


                        <div class="heading-bottom">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-sm-6 margin-top-10">
                                        <div class="head">
                                            <h5>Relatives Information</h5>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 margin-top-10">
                                        <div class="editRig pull-right">
                                            <a href="{{ $editRelatives }}">Edit</a><span class="glyphicon glyphicon-play"
                                                aria-hidden="true">
                                                <a href="{{ $addRelatives }}">Add New</a><span class="glyphicon glyphicon-play"
                                                    aria-hidden="true">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-6 margin-top-10 margin-bottom-15">
                                    <table class="table table-borderless margin-top-10">
                                        <tbody>
                                            @foreach ($relatives1 as $key => $value)
                                            @if ($value != '')

                                            <tr class="basTab">
                                                <td class="col-sm-5 padding-0">
                                                    <p>{{ $key }}</p>
                                                </td>
                                                <td class="col-sm-1 padding-0">
                                                    <p>:</p>
                                                </td>
                                                <td class="col-sm-6 padding-0">
                                                    <p>{{ $value }}</p>
                                                </td>
                                            </tr>
                                            @endif

                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-sm-6 margin-top-10 margin-bottom-15" style="border-left: 1px solid #D9D9D9;">
                                    <table class="table table-borderless margin-top-10">
                                        <tbody>
                                            @foreach ($relatives2 as $key => $value)
                                            @if ($value != '')

                                            <tr class="basTab">
                                                <td class="col-sm-5 padding-0">
                                                    <p>{{ $key }}</p>
                                                </td>
                                                <td class="col-sm-1 padding-0">
                                                    <p>:</p>
                                                </td>
                                                <td class="col-sm-6 padding-0">
                                                    <p>{{ $value }}</p>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                @if ($relatives != '')
                                    
                                <div class="col-sm-12 margin-top-10 margin-bottom-15">
                                    <table class="table table-bordered margin-top-10">
                                        <tbody>
                                            @foreach ($relatives as $item)
                                            <tr class="basTab">
                                                <td class="">
                                                    <p>
                                                        @foreach ($item as $key=>$value)
                                                        @if ($relativeFields[$key] != 'delete' &&
                                                        $relativeFields[$key] != 'edit' &&
                                                        $relativeFields[$key] != 'id' &&
                                                        $relativeFields[$key] != 'relative_side')
                                                        @if ($value != '')
                                                        <span>{{ $relativeFields[$key] }} : <span class="bold-text">{{
                                                                $value }}</span></span>,
                                                        @endif
                                                        @endif
                                                        @endforeach
                                                        {!! $item->edit !!}
                                                    </p>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                @endif

                            </div>

                        </div>





                        <!----- --------------------------->
                        <div class="Partpre" id="PartnerPreference">
                            <span class="PartpreSpan">
                                <h4> Partner Preference </h4>
                            </span>

                        </div>
                        <!----- --------------------------->


                        <div class="container-fluid">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-xs-12 margin-top-10">
                                        <div class="editRig pull-right">
                                            <a href="{{ $editPreference }}">Edit</a><span class="glyphicon glyphicon-play"
                                                aria-hidden="true">
                                            </span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="heading-bottom"> </div>
                            <div class="row">
                                <div class="col-sm-6 margin-top-10 margin-bottom-15">
                                    <table class="table table-borderless margin-top-10">
                                        <tbody>
                                            @foreach ($preference1 as $key => $value)
                                            @if ($value != '')

                                            <tr class="basTab">
                                                <td class="col-sm-5 padding-0">
                                                    <p>{{ $key }}</p>
                                                </td>
                                                <td class="col-sm-1 padding-0">
                                                    <p>:</p>
                                                </td>
                                                <td class="col-sm-6 padding-0">
                                                    <p>{{ $value }}</p>
                                                </td>
                                            </tr>
                                            @endif

                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-sm-6 margin-top-10 margin-bottom-15" style="border-left: 1px solid #D9D9D9;">
                                    <table class="table table-borderless margin-top-10">
                                        <tbody>
                                            @foreach ($preference2 as $key => $value)
                                            @if ($value != '')

                                            <tr class="basTab">
                                                <td class="col-sm-5 padding-0">
                                                    <p>{{ $key }}</p>
                                                </td>
                                                <td class="col-sm-1 padding-0">
                                                    <p>:</p>
                                                </td>
                                                <td class="col-sm-6 padding-0">
                                                    <p>{{ $value }}</p>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                        <div class="Partpre">
                            <span class="PartpreSpan">
                                <h4> My Contact detail </h4>
                            </span>

                        </div>
                        <br>
                        <!----- --------------------------->
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xs-12 margin-top-10">
                                    <div class="editRig pull-right">
                                        <a href="{{ $editContact }}">Edit</a><span class="glyphicon glyphicon-play"
                                            aria-hidden="true">
                                        </span></div>
                                </div>
                            </div>
                        </div>
                        <div class="heading-bottom"> </div>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-6 margin-top-10 margin-bottom-15">
                                    <table class="table table-borderless margin-top-10">
                                        <tbody>
                                            @foreach ($contact1 as $key => $value)
                                            @if ($value != '')
                                            <tr class="basTab">
                                                <td class="col-sm-5 padding-0">
                                                    <p>{{ $key }}</p>
                                                </td>
                                                <td class="col-sm-1 padding-0">
                                                    <p>:</p>
                                                </td>
                                                <td class="col-sm-6 padding-0">
                                                    <p>{{ $value }}</p>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-sm-6 margin-top-10 margin-bottom-15" style="border-left: 1px solid #D9D9D9;">
                                    <table class="table table-borderless margin-top-10">
                                        <tbody>
                                            @foreach ($contact2 as $key => $value)
                                            @if ($value != '')
                                            <tr class="basTab">
                                                <td class="col-sm-5 padding-0">
                                                    <p>{{ $key }}</p>
                                                </td>
                                                <td class="col-sm-1 padding-0">
                                                    <p>:</p>
                                                </td>
                                                <td class="col-sm-6 padding-0">
                                                    <p>{{ $value }}</p>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--peFdetailsCarPer-->
                </div>
            </div>
        </div>
        <div class="col-sm-1 hidden-xs"></div>
    </div>
</div>
</div>

@if ($education != '')
    
@foreach ($education as $item)

<div class="modal fade" id="educationDelete{{ $item->id }}" role="dialog">
    <div class="modal-dialog modal-sm">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title h5">Are you sure you want to delete?</h4>
            </div>
            <form action="{{ $item->delete }}" method="post">
                @csrf
                <div class="modal-footer">
                    <div class="col-xs-6">
                        <button type="button" class="btn btn-danger btn-xs btn-block" data-dismiss="modal">Cancel
                            Delete</button>
                    </div>
                    <div class="col-xs-6">
                        <button type="submit" class="btn btn-success btn-xs btn-block">Confirm Delete </button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
@endif


@if ($siblings != '')

@foreach ($siblings as $item)
<div class="modal fade" id="siblingDelete{{ $item->id }}" role="dialog">
    <div class="modal-dialog modal-sm">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title h5">Are you sure you want to delete?</h4>
            </div>
            <form action="{{ $item->delete }}" method="post">
                @csrf
                <div class="modal-footer">
                    <div class="col-xs-6">
                        <button type="button" class="btn btn-danger btn-xs btn-block" data-dismiss="modal">Cancel
                            Delete</button>
                    </div>
                    <div class="col-xs-6">
                        <button type="submit" class="btn btn-success btn-xs btn-block">Confirm Delete </button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
@endif


@if ($relatives != '')
@foreach ($relatives as $item)
<div class="modal fade" id="relativeDelete{{ $item->id }}" role="dialog">
    <div class="modal-dialog modal-sm">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title h5">Are you sure you want to delete?</h4>
            </div>
            <form action="{{ $item->delete }}" method="post">
                @csrf
                <div class="modal-footer">
                    <div class="col-xs-6">
                        <button type="button" class="btn btn-danger btn-xs btn-block" data-dismiss="modal">Cancel
                            Delete</button>
                    </div>
                    <div class="col-xs-6">
                        <button type="submit" class="btn btn-success btn-xs btn-block">Confirm Delete </button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
@endif



@endsection