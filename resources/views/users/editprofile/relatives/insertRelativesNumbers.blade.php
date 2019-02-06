@extends('layouts.users')


@section('content')



<div class="col-md-9 card">

    @if(session('error'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        <strong>{{ session('error') }}</strong>
    </div>
    @endif
    @if(Session('msg'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        <strong> {!! Session('msg') !!}</strong>
    </div>
    @endif

    <div class="panel panel-default">
        <div class="panel-heading title">
            <span class="h3 bold-text">Relatives Information</span>
            <buttom class="btn btn-info btn-sm pull-right" data-toggle="modal" href='#relativeinsert'>Insert a
                Relative's Information</buttom>
        </div>

        <div class="modal fade" id="relativeinsert">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Add Uncle/Aunte Information</h4>
                    </div>
                    <form action="{{ route('users.editprofile.relatives.insert') }}" method="POST" role="form">
                        @csrf
                        <div class="modal-body">


                            <div class="form-group row">
                                <label for="relativetype" class="col-md-5 col-form-label">Relative from</label>
                                <div class="col-md-7">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="relativetype" id="relativetype" value="1">
                                            Parternal Side
                                        </label>
                                        <label>
                                            <input type="radio" name="relativetype" id="relativetype" value="2">
                                            Maternal Side
                                        </label>
                                    </div>

                                    @if ($errors->has('relativetype'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('relativetype') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="gender" class="col-md-5 col-form-label">Gender</label>
                                <div class="col-md-7">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="gender" id="gender" value="1">
                                            Male
                                        </label>
                                        <label>
                                            <input type="radio" name="gender" id="gender" value="2">
                                            Female
                                        </label>
                                    </div>

                                    @if ($errors->has('gender'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="relative_living" class="col-md-5 col-form-label">Living Status

                                </label>
                                <div class="col-md-7">
                                    <input type="radio" name="relative_living" id="relative_living" value="1" /> Alive
                                    <input type="radio" name="relative_living" id="relative_living" value="2" /> Passed
                                    Away
                                    @if ($errors->has('relative_living'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('relative_living') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="marital_status" class="col-md-5 col-form-label">Marital Status

                                </label>
                                <div class="col-md-7">
                                    <input type="radio" name="marital_status" class="marital_status" value="1" />
                                    Married
                                    <input type="radio" name="marital_status" class="marital_status" value="2" /> Not
                                    Married
                                    @if ($errors->has('marital_status'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('marital_status') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="relative_name" class="col-md-5 col-form-label">Relative's Name*

                                </label>
                                <div class="col-md-7">
                                    <input value="" id="relative" name="relative_name" placeholder="Name" class="form-control here"
                                        required="required" type="text">
                                    @if ($errors->has('relative_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('relative_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="relative_profession" class="col-md-5 col-form-label">Relative's Profession

                                </label>
                                <div class="col-md-7">
                                    <select name="relative_profession" id="relative_profession" class="form-control"">
                                                    <option value="
                                        0">Select One</option>
                                        @foreach (professionType() as $key=>$item)
                                        <option value="{{ $key }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('relative_profession'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('relative_profession') }}</strong>
                                    </span>
                                    @endif
                                </div>

                            </div>
                            <div class="form-group row">
                                <label for="relative_designation" class="col-md-5 col-form-label">Relative's
                                    Designation

                                </label>
                                <div class="col-md-7">
                                    <input value="" id="relative_designation" name="relative_designation" placeholder="Designation"
                                        class="form-control here" type="text">
                                    @if ($errors->has('relative_designation'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('relative_designation') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="relative_organizaion" class="col-md-5 col-form-label">Relative's
                                    Organization Name

                                </label>
                                <div class="col-md-7">
                                    <input value="" id="relative_organizaion" name="relative_organizaion" placeholder="Organization Name"
                                        class="form-control here" type="text">
                                    @if ($errors->has('relative_organizaion'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('relative_organizaion') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="spouse-infos">
                                <div class="form-group row">
                                    <label for="relative_spouse_name" class="col-md-5 col-form-label">Relative's Spouse
                                        Name*

                                    </label>
                                    <div class="col-md-7">
                                        <input value="" id="relative" name="relative_spouse_name" placeholder="Name"
                                            class="form-control here" required="required" type="text">
                                        @if ($errors->has('relative_spouse_name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('relative_spouse_name') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="relative_spouse_living" class="col-md-5 col-form-label">Relative's
                                        Spouse Living Status
                                        Status*

                                    </label>
                                    <div class="col-md-7">
                                        <input type="radio" name="relative_spouse_living" id="relative_spouse_living"
                                            value="1" /> Alive
                                        <input type="radio" name="relative_spouse_living" id="relative_spouse_living"
                                            value="2" /> Passed Away
                                        @if ($errors->has('relative_spouse_living'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('relative_spouse_living') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="relative_spouse_profession" class="col-md-5 col-form-label">Relative's
                                        Spouse Profession

                                    </label>
                                    <div class="col-md-7">
                                        <select name="relative_spouse_profession" id="relative_spouse_profession" class="form-control"">
                                                    <option value="
                                            0">Select One</option>
                                            @foreach (professionType() as $key=>$item)
                                            <option value="{{ $key }}">{{ $item }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('relative_spouse_profession'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('relative_spouse_profession') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <label for="relative_spouse_designation" class="col-md-5 col-form-label">Relative's
                                        Spouse Designation

                                    </label>
                                    <div class="col-md-7">
                                        <input value="" id="relative_spouse_designation" name="relative_spouse_designation"
                                            placeholder="Designation" class="form-control here" type="text">
                                        @if ($errors->has('relative_spouse_designation'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('relative_spouse_designation') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="relative_spouse_organizaion" class="col-md-5 col-form-label">Relative's
                                        Spouse Organization Name

                                    </label>
                                    <div class="col-md-7">
                                        <input value="" id="relative_spouse_organizaion" name="relative_spouse_organizaion"
                                            placeholder="Organization Name" class="form-control here" type="text">
                                        @if ($errors->has('relative_spouse_organizaion'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('relative_spouse_organizaion') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>


        <div class="panel-body">




            <h1 class="margin-bottom-20">
                All Relatives
            </h1>

            <div class="table-responsive margin-bottom-20">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th colspan="2">Parternal Relatives</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse ($maternalRelatives as $item)

                        <tr>
                            <td>
                                <p class="pull-right"><button class="btn btn-info btn-xs" data-toggle="modal" href='#edit-{{ $item->id }}'>Edit</button>
                                    / <button class="btn btn-danger btn-xs" data-toggle="modal" href='#delete-{{ $item->id }}'>delete</button></p>
                                <p class="bold-text text-info h4"> @if ($item->living_status == 2) {{ 'Late ' }}@endif
                                    {{ $item->relative_name }}</p>
                                <p>Gender: <span class="bold-text">{{ gender($item->gender) }}</span></p>
                                <p>Profession: <span class="bold-text">{{ professionType($item->relative_profession) }}</span></p>
                                <p>Designation: <span class="bold-text">{{ $item->relative_designation }}</span></p>
                                <p>Organization: <span class="bold-text">{{ $item->relative_organization }}</span></p>
                                <p>Spouse Name: @if ($item->relative_spouse_living_status == 2) {{ 'Late ' }}@endif
                                    <span class="bold-text">{{ $item->relative_spouse_name }}</span></p>
                                <p>Spouse Profession: <span class="bold-text">{{
                                        professionType($item->relative_spouse_profession) }}</span></p>
                                <p>Spouse Designation: <span class="bold-text">{{ $item->relative_spouse_designation }}</span></p>
                                <p>Spouse Organization: <span class="bold-text">{{ $item->relative_spouse_organization
                                        }}</span></p>


                            </td>
                        </tr>

                        <div class="modal fade" id="delete-{{ $item->id }}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title">Delete: {{ $item->relative_name }}</h4>
                                    </div>
                                    <form method="POST" action="{{ route('users.editprofile.relatives.delete', $item->id ) }}">
                                        @csrf
                                        <div class="modal-body">
                                            <p>Are you sure?</p>
                                            <input name="relativeid" type="hidden" value="{{ $item->id }}">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-primary">Delete</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        @empty <tr>
                            <td>
                                <p>No Relatives Maternal Relatives Added </p>
                            </td>
                        </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>

            <div class="table-responsive margin-bottom-20">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th colspan="2">Maternal Relatives</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse ($maternalRelatives as $item)

                        <tr>
                            <td>
                                <p class="pull-right"><button class="btn btn-info btn-xs" data-toggle="modal" href='#edit-{{ $item->id }}'>Edit</button>
                                    / <button class="btn btn-danger btn-xs" data-toggle="modal" href='#delete-{{ $item->id }}'>delete</button></p>
                                <p class="bold-text text-info h4"> @if ($item->living_status == 2) {{ 'Late ' }}@endif
                                    {{ $item->relative_name }}</p>
                                <p>Gender: <span class="bold-text">{{ gender($item->gender) }}</span></p>
                                <p>Profession: <span class="bold-text">{{ professionType($item->relative_profession) }}</span></p>
                                <p>Designation: <span class="bold-text">{{ $item->relative_designation }}</span></p>
                                <p>Organization: <span class="bold-text">{{ $item->relative_organization }}</span></p>
                                <p>Spouse Name: @if ($item->relative_spouse_living_status == 2) {{ 'Late ' }}@endif
                                    <span class="bold-text">{{ $item->relative_spouse_name }}</span></p>
                                <p>Spouse Profession: <span class="bold-text">{{
                                        professionType($item->relative_spouse_profession) }}</span></p>
                                <p>Spouse Designation: <span class="bold-text">{{ $item->relative_spouse_designation }}</span></p>
                                <p>Spouse Organization: <span class="bold-text">{{ $item->relative_spouse_organization
                                        }}</span></p>
                            </td>
                        </tr>

                        <div class="modal fade" id="delete-{{ $item->id }}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title">Delete: {{ $item->relative_name }}</h4>
                                    </div>
                                    <form method="POST" action="{{ route('users.editprofile.relatives.delete', $item->id ) }}">
                                        @csrf
                                        <div class="modal-body">
                                            <p>Are you sure?</p>
                                            <input name="relativeid" type="hidden" value="{{ $item->id }}">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-primary">Delete</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        @empty <tr>
                            <td>
                                <p>No Relatives Maternal Relatives Added </p>
                            </td>
                        </tr>
                        @endforelse


                        <!-- EDIT : Form Start -->

                        <!-- EDIT : Form Start -->

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
        $('.spouse-infos').hide();

        $('.marital_status').on('click', function () {

            if ($(this).val() == 1) {
                $('.spouse-infos').show(300);
            }
            if ($(this).val() == 2) {
                $('.spouse-infos').hide(300);
            }

        });
    });

</script>
@endsection
