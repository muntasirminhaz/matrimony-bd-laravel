@extends('layouts.users')


@section('content')



<div class="col-md-9 card">

    @if(session('error'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        <strong>{{ session('error') }}</strong> Please try again with valid information.


    </div>
    @endif

    <div class="panel panel-default">
        <div class="panel-heading title">
            <span class="h3 bold-text">Educational Information</span>
            <button id="toggle-form" type="button" class="btn btn-info btn-sm pull-right"><span class="edit-icon fa fa-edit"></span>
                <span class="edit-text">Add New Educational Qualification</span></button>
        </div>
        <div class="panel-body">

            @if(Session('msg'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong> {{ Session('msg') }}</strong>
            </div>
            @endif


            <div class="table-responsive show-userinfo">

                @isset($userinfo)


                @forelse ($userinfo as $value)

                <table class="table table-hover">
                    <tbody>

                        <tr>
                            <th colspan="2">
                                <p class="pull-left text-blod">{{ $value->degree_name }}</p>
                                <div class="pull-right">

                                    <button type="button" class="btn btn-info btn-xs " data-toggle="modal" data-target="#editedu-{{ $value->id }}">Edit</button>
                                    /
                                    <button type="button" class="btn btn-danger btn-xs " data-toggle="modal"
                                        data-target="#delete-{{ $value->id }}">Delete</button>
                                </div>




                            </th>

                        </tr>

                        <tr>
                            <td>Educational Level</td>
                            <td>{{ educationLevel($value->education_level) }} </td>
                        </tr>
                        <tr>
                            <td>Education Area</td>
                            <td>{{ $value->education_area }} </td>
                        </tr>

                        <tr>
                            <td>Institution Name</td>
                            <td>{{ $value->institution_name }} </td>
                        </tr>
                        <tr>
                            <td>Year Started</td>
                            <td>{{ $value->year_started }} </td>
                        </tr>
                        <tr>
                            <td>Year Completed</td>
                            <td>{{ $value->year_completed }} </td>
                        </tr>
                        <tr>
                            <td>Description</td>
                            <td>{{ $value->description }} </td>
                        </tr>


                    </tbody>
                </table>


                <div id="editedu-{{ $value->id }}" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Edit: {{$value->degree_name }}</h4>
                            </div>


                            <form method="POST" action="{{ route('users.editprofile.education.update', $value->id) }}"
                                class="padding-0-30">
                                @csrf
                                <div class="form-group row">
                                    <h3>Edit Educational Qualification </h3>
                                    <hr>
                                </div>

                                <div class="form-group row">
                                    <label for="elevel" class="col-md-3 col-form-label">Educational Level*

                                    </label>
                                    <div class="col-md-3">

                                        <select name="elevel" id="elevel" class="form-control" required="required">
                                            <option value="0">Select Educational Level</option>
                                            @foreach (educationLevel() as $key=>$item)
                                            <option {{ $key === $value->education_level ? 'selected' : ''  }} value="{{ $key }}">{{
                                                $item }}</option>
                                            @endforeach
                                        </select>

                                        @if ($errors->has('elevel'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->elevel('elevel') }}</strong>
                                        </span>
                                        @endif

                                    </div>

                                    <label for="earea" class="col-md-3 col-form-label">Education Area*

</label>
<div class="col-md-3">
    <input id="earea" name="earea" value="{{ $value->education_area }}" class="form-control here"
        required="required" type="text">
    @if ($errors->has('earea'))
    <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->earea('earea') }}</strong>
    </span>
    @endif
</div>


                                </div>
                                <div class="form-group row">
                                    
                                </div>

                                <div class="form-group row">
                                    <label for="dname" class="col-md-4 col-form-label">Degree Name*

                                    </label>
                                    <div class="col-md-8">
                                        <input id="dname" name="dname" value="{{ $value->degree_name }}" class="form-control here"
                                            required="required" type="text">
                                        @if ($errors->has('dname'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->dname('dname') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="iname" class="col-md-4 col-form-label">Institution Name*

                                    </label>
                                    <div class="col-md-8">
                                        <input id="iname" name="iname" value="{{ $value->institution_name }}" class="form-control here"
                                            required="required" type="text">
                                        @if ($errors->has('iname'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('iname') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="ystarted" class="col-md-4 col-form-label">Year Started*

                                    </label>
                                    <div class="col-md-8">
                                        <input id="ystarted" name="ystarted" value="{{ $value->year_started }}" class="form-control here"
                                            required="required" type="text">
                                        @if ($errors->has('ystarted'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('ystarted') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="ycom" class="col-md-4 col-form-label">Year Completed*

                                    </label>
                                    <div class="col-md-8">
                                        <input id="ycom" name="ycom" value="{{ $value->year_completed }}" class="form-control here"
                                            required="required" type="text">
                                        @if ($errors->has('ycom'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('ycom') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="desc" class="col-md-4 col-form-label">Description*

                                    </label>
                                    <div class="col-md-8">
                                        <input id="desc" name="desc" value="{{ $value->description }}" class="form-control here"
                                            required="required" type="text">
                                        @if ($errors->has('desc'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('desc') }}</strong>
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

                        </div>
                    </div>
                </div>





                <div id="delete-{{ $value->id }}" class="modal fade" role="dialog">
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
                                    <p>Are You Sure ? </p>
                                    <input type="hidden" name="edudeleteid" value={{ $value->id }}>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel Delete</button>
                                    <button type="submit" class="btn btn-success">Confirm Delete</button>
                                </div>
                        </div>
                        </form>
                    </div>

                </div>
            </div>
            @empty
            <p>No education information is given. Please insert education informations.</p>
            @endforelse

            @else
            <p>No education information is given. Please insert education informations.</p>
            @endisset



        </div>



        <form method="POST" action="{{ route('users.editprofile.education.add') }}" class="padding-0-30 show-form">
            @csrf
            <div class="form-group row">
                <h2>Add Educational Qualification </h2>
                <hr>
            </div>

            <div class="form-group row">
                <label for="elevel" class="col-md-4 col-form-label">Educational Level*

                </label>
                <div class="col-md-8">

                    <select name="elevel" id="elevel" class="form-control" required="required">
                        <option value="0">Select Educational Level</option>
                        @foreach (educationLevel() as $key=>$item)
                        <option value="{{ $key }}">{{ $item }}</option>
                        @endforeach
                    </select>

                    @if ($errors->has('elevel'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->elevel('elevel') }}</strong>
                    </span>
                    @endif

                </div>
            </div>
            <div class="form-group row">
                <label for="earea" class="col-md-4 col-form-label">Education Area*

                </label>
                <div class="col-md-8">
                    <input id="earea" name="earea" placeholder="Education Area" class="form-control here" required="required"
                        type="text">
                    @if ($errors->has('earea'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->earea('earea') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="dname" class="col-md-4 col-form-label">Degree Name*

                </label>
                <div class="col-md-8">
                    <input id="dname" name="dname" placeholder="Degree Name" class="form-control here" required="required"
                        type="text">
                    @if ($errors->has('dname'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->dname('dname') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="iname" class="col-md-4 col-form-label">Institution Name*

                </label>
                <div class="col-md-8">
                    <input id="iname" name="iname" placeholder="Institution Name" class="form-control here" required="required"
                        type="text">
                    @if ($errors->has('iname'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('iname') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="ystarted" class="col-md-4 col-form-label">Year Started*

                </label>
                <div class="col-md-8">
                    <input id="ystarted" name="ystarted" placeholder="Year Started" class="form-control here" required="required"
                        type="text">
                    @if ($errors->has('ystarted'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('ystarted') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="ycom" class="col-md-4 col-form-label">Year Completed*

                </label>
                <div class="col-md-8">
                    <input id="ycom" name="ycom" placeholder="Year Complete" class="form-control here" required="required"
                        type="text">
                    @if ($errors->has('ycom'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('ycom') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="desc" class="col-md-4 col-form-label">Description*

                </label>
                <div class="col-md-8">
                    <input id="desc" name="desc" placeholder="Description" class="form-control here" required="required"
                        type="text">
                    @if ($errors->has('desc'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('desc') }}</strong>
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
