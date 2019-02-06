@extends('layouts.users')


@section('content')



<div class="col-md-9 card">



    @if($errors->any())
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        <strong>Changes you made was not saved.</strong> . Please try again with valid information.
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



    <!------View Normally------>
    <div class="panel panel-default">
        <div class="panel-heading title">
            <!--Add Parents Information-->
            @isset($headline)
            {{ $headline }}
            @else
            <span class="h3 bold-text">Add headline</span>
            @endisset
        </div>
        <div class="panel-body">

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

