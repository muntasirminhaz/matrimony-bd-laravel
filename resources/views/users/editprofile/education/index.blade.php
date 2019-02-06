@extends('layouts.users')


@section('content')



<div class="col-md-9 card">



    <div class="panel panel-default">
        <div class="panel-heading title">
            <span class="h3 bold-text">Educational Information</span>
            <a href="{{ route('users.editprofile.education.create') }}" type="button" class="btn btn-info btn-sm pull-right">
                <span class="edit-icon fa fa-plus-square"></span>
                <span class="edit-text">Add Educational Qualification</span></a>
        </div>
        <div class="panel-body">

            <div class="show-userinfo">
                @isset($userinfo)

                <table class="table table-hover">

                    <tr>
                        <th width='13%'>
                            Educational Level
                        </th>
                        <th width='13%'>
                            Education Area
                        </th>
                        <th width='13%'>
                            Degree
                        </th>
                        <th width='13%'>
                            Institution
                        </th>
                        <th width='13%'>
                            Year Completed
                        </th>
                        <th width='13%'>
                            Result
                        </th>
                        <th>
                            Edit / Delete
                        </th>
                    </tr>
                    @forelse ($userinfo as $value)

                    <tr>
                        <td>
                            {{ educationLevel($value->education_level) }}
                        </td>
                        <td>
                            {{ $value->education_area }}
                        </td>
                        <td>
                            {{ $value->degree_name }}
                        </td>
                        <td>
                            {{ $value->institution_name }}
                        </td>

                        @if ($value->semester != 0)
                        <td colspan="2">
                            Currently Studing
                        </td>
                        @else
                        <td>
                            {{ $value->year_completed }}
                        </td>
                        <td>
                            {{ $value->result }}
                        </td>
                        @endif

                        <td>
                            <span class="pull-right">

                                <a href="{{ route('users.editprofile.education.edit', $value->id) }}" class="btn btn-info btn-xs ">Edit</a>
                                /
                                <button type="button" class="btn btn-danger btn-xs " data-toggle="modal" data-target="#delete-{{ $value->id }}">Delete</button>
                            </span>
                        </td>
                    </tr>
               
                    <div style="display:none" id="delete-{{ $value->id }}" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Delete: {{$value->degree_name }}</h4>
                                </div>
                                <form method="POST" action="{{ route('users.editprofile.education.delete', $value->id) }}"
                                    class="padding-0-30">
                                    @csrf
                                    <div class="modal-body">
                                        <p>Are You Sure? </p>
                                        <input type="hidden" name="edudeleteid" value={{ $value->id }}>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel
                                            Delete</button>
                                        <button type="submit" class="btn btn-success">Confirm Delete</button>
                                    </div>
                            </div>
                            </form>
                        </div>

                    </div>
                    @empty
                    <tr>
                        <td colspan="9">
                            <p class="text-center">No education information is given. Please insert education
                                informations.</p>
                        </td>
                    </tr>
                    @endforelse


                </table>

                @endisset
            </div>


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


@section('pageTitle')
Education Information - User Profile
@endsection
