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
                        <td>
                            {{ $value->year_completed }}
                        </td>
                        <td>
                            {{ $value->result }}
                        </td>
                        <td>
                            <span class="pull-right">

                                <button type="button" class="btn btn-info btn-xs " data-toggle="modal" data-target="#editedu-{{ $value->id }}">Edit</button>
                                /
                                <button type="button" class="btn btn-danger btn-xs " data-toggle="modal" data-target="#delete-{{ $value->id }}">Delete</button>
                            </span>
                        </td>
                    </tr>
                    <div style="display:none" id="editedu-{{ $value->id }}" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-lg">
                            <!-- Modal content-->
                            <div class="modal-content ">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Edit: <strong>{{ $value->degree_name }}</strong></h4>
                                </div>


                                <form method="POST" action="{{ route('users.editprofile.education.update', $value->id) }}">

                                    <div class="modal-body">
                                        @csrf

                                        <div class="form-group row">

                                            <div class="col-sm-6">

                                                <label for="elevel" class="col-form-label">Educational Level*

                                                </label>
                                                <select name="elevel" id="elevel" class="form-control" required="required">
                                                    <option value="0">Select Educational Level</option>
                                                    @foreach (educationLevel() as $key=>$item)
                                                    <option {{ $key === $value->education_level ? 'selected' : ''  }}
                                                        value="{{ $key }}">{{
                                                        $item }}</option>
                                                    @endforeach
                                                </select>

                                                @if ($errors->has('elevel'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->elevel('elevel') }}</strong>
                                                </span>
                                                @endif

                                            </div>
                                            <div class="col-sm-6">
                                                <label for="earea" class="col-form-label">Education Area*

                                                </label>
                                                <input id="earea" name="earea" value="{{ $value->education_area }}"
                                                    class="form-control here" required="required" type="text">
                                                @if ($errors->has('earea'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->earea('earea') }}</strong>
                                                </span>
                                                @endif
                                            </div>

                                        </div>


                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label for="dname" class="col-form-label">Degree Name*

                                                </label>
                                                <input id="dname" name="dname" value="{{ $value->degree_name }}" class="form-control here"
                                                    required="required" type="text">
                                                @if ($errors->has('dname'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->dname('dname') }}</strong>
                                                </span>
                                                @endif
                                            </div>

                                            <div class="col-sm-6">
                                                <label for="result" class="col-form-label">Results*

                                                </label>
                                                <input id="result" name="result" value="{{ $value->result }}" class="form-control here"
                                                    required="required" type="text">
                                                @if ($errors->has('result'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->dname('result') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">

                                            <div class="col-sm-6">
                                                <label for="iname" class="col-form-label">Institution Name*

                                                </label>
                                                <input id="iname" name="iname" value="{{ $value->institution_name }}"
                                                    class="form-control here" required="required" type="text">
                                                @if ($errors->has('iname'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('iname') }}</strong>
                                                </span>
                                                @endif
                                            </div>

                                            <div class="col-sm-6">
                                                <label for="ycom" class="col-form-label">Year Completed*

                                                </label>
                                                <input id="ycom" name="ycom" value="{{ $value->year_completed }}" class="form-control here"
                                                    required="required" type="text">
                                                @if ($errors->has('ycom'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('ycom') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>





                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel
                                            Edit</button>
                                        <button type="submit" class="btn btn-success">Confirm Edit</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>

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


@section('footerscript')
<script>
    $(function () {
        $('#toggle-form').on('click', function () {
            $('.show-userinfo').toggle(300);
            $('.show-form').toggle(300);

            $(this).toggleClass('btn-danger');
            $(this).toggleClass('btn-info');

            if ($('#toggle-form .edit-text').text() == 'Add New Educational Qualification') {
                $('#toggle-form .edit-icon').removeClass('fa-edit');
                $('#toggle-form .edit-icon').addClass('fa-window-close');
                $('#toggle-form .edit-text').text('Cancel');
            } else {
                $('#toggle-form .edit-icon').removeClass('fa-window-close');
                $('#toggle-form .edit-icon').addClass('fa-edit');

                $('#toggle-form .edit-text').text('Add New Educational Qualification');
            }

        });
    });

</script>
@endsection
