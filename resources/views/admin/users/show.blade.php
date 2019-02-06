@extends('adminlte::page')
@section('title', $title)

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">

                <div class="box-title">
                    <span class="text-center h2">{{ $title }}'s Details</span>
                </div>
                <div class="pull-right">
                    {{-- <a href="{{ route('admin.packages.create') }}" class="btn btn-success btn-xs"><span class="fa fa-plus-square"></span>
                        &nbsp; Add a New user</a> --}}

                    <div class="box-tools">

                        @if ($user['status'] == 3 )

                        <form class="inline" action="{{ route('admin.users.unblockUserProfile',$user['id']) }}" method="get">
                            @csrf
                            <button onclick="return confirm('Are you sure?\nThis will unblock the user.')" type="submit"
                                class="btn btn-danger btn-xs">Unblock User</button>
                        </form>


                        @else

                        <form class="inline" action="{{ route('admin.users.blockUserProfile',$user['id']) }}" method="get">
                            @csrf
                            <button onclick="return confirm('Are you sure?\nThis will block the user.')" type="submit"
                                class="btn btn-github btn-xs">Block User</button>
                        </form>

                        @endif




                        @if ($agent == 0)

                        @if (Auth::guard('admin')->user()->admin_type == 4)

                        @if (\App\AdminCommon::AgentRequested($user['id']))
                        <span class="btn btn-tumblr btn-xs"><span class="fa fa-user-circle-o"></span>
                            You requested to be this user's agent received.
                        </span>
                        @else
                        <a href="{{ route('admin.requestUserAgent', $user['id']) }}" class="btn btn-tumblr btn-xs"><span
                                class="fa fa-user-circle-o"></span>
                            Become Agent for this User
                        </a>
                        @endif

                        @else
                        <a href="{{ route('admin.userAgent.setUserAgent', $user['id']) }}" class="btn btn-tumblr btn-xs"><span
                                class="fa fa-user-circle-o"></span>
                            Set Agent
                        </a>

                        @endif

                        @else
                        <span class="btn btn-xs btn-twitter ">
                            Current Agent : {{ $currentAgent }}
                        </span>
                        <a href="{{ route('admin.userAgent.setUserAgent', $user['id']) }}" class="btn btn-tumblr btn-xs"><span
                                class="fa fa-user-circle-o"></span>
                            Change Agent
                        </a>
                        @endif



                        <a target="_blank" href="{{ route('admin.users.userPdf',$user['id']) }}" class="btn btn-pinterest btn-xs"><span
                                class="fa fa-file-pdf-o"></span> Download PDF</a>
                        <a href="{{ route('admin.users.messageInbox',$user['id']) }}" class="btn btn-dropbox btn-xs"><span
                                class="fa fa-envelope-o"></span> View Messages</a>
                        <a href="{{ route('admin.users.interest',$user['id']) }}" class="btn btn-facebook btn-xs"><span
                                class="fa fa-gift"></span> Interests</a>
                    </div>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body ">
                <div class="col-xs-12 padding-0">
                    <div href="#">
                        <div class="col-sm-4 padding-0 thumbnail">
                            <a class="overflow-hidden display-block">
                                {!! $user['photo'] !!}
                            </a>
                        </div>
                        <div class="col-sm-8 padding-0">
                            <div class="product-shrot-description">
                                <p class="bold-text">{{ $user['description'] }}</p>
                            </div>
                            <div class="col-sm-6">
                                <table class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <td>Marital Status</td>
                                            <td class="bold-text">{{ $user['marital_status'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Age</td>
                                            <td class="bold-text">{{ $user['age'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Education</td>
                                            <td class="bold-text">{{ $user['education_level'] ?? ' - ' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Profession</td>
                                            <td class="bold-text">{{ $user['user_profession_type'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Height</td>
                                            <td class="bold-text">{{ $user['height'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Father's Profession</td>
                                            <td class="bold-text">{{ $user['father_profession'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Mother's Profession</td>
                                            <td class="bold-text">{{ $user['mother_profession'] }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-sm-6">
                                <table class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <td>Number of Brothers</td>
                                            <td class="bold-text">{{ $user['number_of_brothers'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Number of Sisters</td>
                                            <td class="bold-text">{{ $user['number_of_sisters'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Home District</td>
                                            <td class="bold-text">{{ $user['location_district'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Upzilla / Thana</td>
                                            <td class="bold-text">{{ $user['location_upzila'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Living Country</td>
                                            <td class="bold-text">{{ $user['location_living_country'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Living City</td>
                                            <td class="bold-text">{{ $user['location_living_city'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Living Area</td>
                                            <td class="bold-text"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                @isset($education)
                <div class="col-xs-12">
                    <p class="text-center h2">Education</p>
                    <hr>
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <th>Educaiton Level</th>
                                <th>Educaiton Area</th>
                                <th>Degree</th>
                                <th>Institution</th>
                                <th>Status</th>
                            </tr>

                            @foreach ($education as $item)
                            <tr class="">
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
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endisset

                @isset($family)
                <div class="col-sm-6">
                    <p class="text-center h2">Family Information</p>
                    <hr>
                    <table class="table table-striped">
                        <tbody>
                            @foreach ($family as $key => $value)
                            <tr>
                                <td style="width: 45%">{{ ucwords($key) }}</td>
                                <td class="bold-text">{{ $value }}</td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endisset
                @isset($relatives)
                <div class="col-sm-6">
                    <p class="text-center h2">Relatives</p>
                    <hr>
                    <table class="table table-striped">
                        <tbody>
                            @foreach ($relatives as $key => $value)
                            <tr>
                                <td style="width: 45%">{{ $key }}</td>
                                <td class="bold-text">{!! $value !!}</td>
                            </tr>

                            @endforeach
                            @isset($myRelatives)
                            @foreach ($myRelatives as $item)
                            <tr>
                                <td style="width: 45%">
                                    {{ $item->relative_side == 1 ? 'Paternal ' : 'Maternal ' }}
                                    {!! $item->gender == 1 ? 'Uncle' : 'Aunty' !!}
                                </td>
                                <td class="bold-text">
                                    {!! $item->living_status == 2 ? 'Passed Away. <br>' : '' !!}
                                    {!! $item->relative_profession > 0 ? 'Profession : ' .
                                    professionType($item->relative_profession) . ($item->relative_profession_details >
                                    0 ?
                                    ' ' . \App\Common::professionDetails($item->relative_profession,
                                    $item->relative_profession_details) : '') .' <br>' : '' !!}

                                    @if ($item->relative_profession > 0)
                                    {!! $item->relative_designation != '' ? 'Designation : ' .
                                    $item->relative_designation .
                                    ' <br>' : '' !!}
                                    {!! $item->relative_organization != '' ? 'Organization : ' .
                                    $item->relative_organization . ' <br>' : '' !!}
                                    @endif

                                    {!! $item->marital_status == 1 ? ' Married. <br>' : '' !!}

                                    @if ( $item->marital_status == 1)

                                    {!! $item->relative_spouse_living_status == 2 ? 'Spouse Passed Away. <br>' : '' !!}
                                    {!! $item->relative_spouse_profession > 0 ? 'Spouse Profession : ' .
                                    professionType($item->relative_spouse_profession) .
                                    ($item->relative_spouse_profession_details > 0 ? ' ' .
                                    \App\Common::professionDetails($item->relative_spouse_profession,
                                    $item->relative_spouse_profession_details) : '') .' <br>' : '' !!}

                                    @if ($item->relative_spouse_profession > 0)
                                    {!! $item->relative_spouse_designation != '' ? 'Spouse Designation : ' .
                                    $item->relative_spouse_designation . ' <br>' : '' !!}
                                    {!! $item->relative_spouse_organization != '' ? 'Spouse Organization : ' .
                                    $item->relative_spouse_organization . ' <br>' : '' !!}
                                    @endif

                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            @endisset
                        </tbody>
                    </table>
                </div>
                @endisset

                <p class="text-center h2">Profile Details</p>
                <hr>
                @foreach ($userData as $item)
                <div class="col-sm-6">
                    <table class="table table-striped table-responsive">
                        <tbody>
                            @foreach ($item as $key => $value)
                            @if ($key != 'photo')
                            <tr>
                                <td style="width: 33%" class="">@php echo ucwords(str_ireplace('_', ' ', $key)) @endphp</td>
                                <td class="bold-text text-bold">{!! $value !!}</td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endforeach

                @isset($partnerPreference)
                <p class="text-center h2">Partner Preference</p>
                <hr>
                <div class="col-sm-6">
                    <table class="table table-striped">
                        <tbody>
                            @foreach ($partnerPreference1 as $key => $value)
                            <tr>
                                <td style="width: 35%">{{ $key }}</td>
                                <td class="bold-text">{!! $value !!}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-sm-6">
                    <table class="table table-striped">
                        <tbody>
                            @foreach ($partnerPreference2 as $key => $value)
                            <tr>
                                <td style="width: 35%">{{ $key }}</td>
                                <td class="bold-text">{!! $value !!}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endisset

            </div>
            <div class="box-footer clearfix">

            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>

@stop
