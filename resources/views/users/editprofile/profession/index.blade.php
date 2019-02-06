@extends('layouts.users')


@section('content')



<div class="col-md-9 card">


    @if($errors->any())
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        <strong>Profession Information not updated.</strong> . Please try again with valid information.
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
            <span class="h3 bold-text">Pofessional Information</span>

            @if ($userinfo->userid !== Auth::user()->id)


            <a id="toggle-form" href="" class="btn btn-info btn-sm pull-right">
                <span class="edit-icon fa fa-edit"></span>
                <span class="edit-text">Add Professional Information</span></a>
            @endif

        </div>
        <div class="panel-body">
            <!----====  View Professional Information =====--->
            <div class="col-xs-12">
                @if($userinfo->profession_type != 0)
                <p>
                    <span>
                        Profession Type : <span class="bold-text">{{ professionType($userinfo->profession_type) }}
                            @if($userinfo->profession_type == 1)
                            (<span>{{ professionTypeBCS($userinfo->profession_type_details) }}</span>)
                            @endif

                            @if($userinfo->profession_type == 2)
                            (<span>{{ professionTypeGovGrade($userinfo->profession_type_details) }}</span>)
                            @endif
                        </span>
                    </span>

                    <span class="pull-right">

                        <a href="{{ route('users.editprofile.profession.edit') }}" class="btn btn-info btn-xs">Edit</a>
                        /
                        <button type="button" class="btn btn-danger btn-xs " data-toggle="modal" data-target="#delete">Delete</button>
                    </span>

                </p>










                @if($userinfo->designation != 0)
                <p> Designation : <span class="bold-text">{{ $userinfo->designation }}</span></p>
                @endif

                @if($userinfo->org_name != 0)
                <p> Organizaition : <span class="bold-text">{{ $userinfo->org_name }}</span></p>
                @endif

                <div class="modal fade" id="delete">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Delete Profession Information</h4>
                            </div>
                            <form action="{{ route('users.editprofile.profession.delete', $userinfo->id) }}" method="POST">
                                @csrf

                                <input type="hidden" name="professionid" id="professionid" class="form-control" value="{{ $userinfo->id }}">

                                <div class="modal-body">
                                    <P>Are you sure?</P>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel Deleting</button>
                                    <button type="submit" class="btn btn-primary">Confirm Delete</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

                @endif

            </div>

            <!----====  View Professional Information =====--->
        </div>
        <!--panel panel End--->
    </div>
    <!--panel panel-default End-->




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
