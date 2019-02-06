@extends('layouts.users')


@section('content')



<div class="col-md-9 card">

    @if($errors->any())
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        <strong>Reltive's information not saved.</strong> . Please try again with valid information.
    </div>
    @endif


    @if(session('error'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        <strong>{{ session('error') }}</strong>
    </div>
    @endif
    @if(Session('success'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        <strong> {!! Session('success') !!}</strong>
    </div>
    @endif

    <div class="panel panel-default">
        <div class="panel-heading title">
            <span class="h3 bold-text">Relatives Information</span>
            <a href="{{ route('users.editprofile.relatives.create') }}" class="btn btn-info btn-sm pull-right">Insert a
                Relative's Information</a>
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

                        @forelse ($paternalRelatives as $item)

                        <tr>
                            <td>
                                <p class="">
                                    <span class="bold-text text-info h4"> @if ($item->living_status == 2) {{ 'Late '
                                        }}@endif
                                        {{ $item->relative_name }} , {{ $item->gender == 1 ? 'Uncle' : 'Aunty' }}</span>
                                    <span class="pull-right">


                                        <button class="btn btn-info btn-xs" data-toggle="modal" href='#edit-{{ $item->id }}'>Edit</button>
                                        / <button class="btn btn-danger btn-xs" data-toggle="modal" href='#delete-{{ $item->id }}'>delete</button>
                                    </span>
                                </p>



                                <p>Profession: <span class="bold-text">{{ professionType($item->relative_profession) }}</span></p>

                                <p>Designation: <span class="bold-text">{{ $item->relative_designation }}</span></p>
                                <p>Organization: <span class="bold-text">{{ $item->relative_organization }}</span></p>

                                @if ($item->marital_status == 1)


                                <p>Spouse Name: @if ($item->relative_spouse_living_status == 2) {{ 'Late ' }}@endif
                                    <span class="bold-text">{{ $item->relative_spouse_name }}</span></p>


                                @if ($item->relative_spouse_living_status == 1)
                                @if ($item->relative_spouse_profession == 1)



                                <p>Spouse Profession: <span class="bold-text">{{
                                        professionType($item->relative_spouse_profession) }}</span></p>
                                <p>Spouse Designation: <span class="bold-text">{{ $item->relative_spouse_designation }}</span></p>
                                <p>Spouse Organization: <span class="bold-text">{{ $item->relative_spouse_organization
                                        }}</span></p> @endif
                                @endif
                                @endif
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

                        <div class="modal fade" id="edit-{{ $item->id }}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title">Edit Relative : <strong>{{ $item->relative_name }}</strong></h4>
                                    </div>
                                    <form method="POST" action="{{ route('users.editprofile.relatives.update',$item->id) }}">
                                        @csrf
                                        <div class="modal-body">

                                            <div class="form-group row">
                                                <div class="col-md-6">
                                                    <label for="relativetype" class=" col-form-label">Relative from</label>
                                                    <div class="">
                                                        <div class="radio">
                                                            <label>
                                                                <input {{ $item->relative_side == 1 ? 'checked' : '' }}
                                                                    type="radio" name="relativetype" id="relativetype"
                                                                    value="1">
                                                                Parternal Side
                                                            </label>
                                                            <label>
                                                                <input {{ $item->relative_side == 2 ? 'checked' : '' }}
                                                                    type="radio" name="relativetype" id="relativetype"
                                                                    value="2">
                                                                Maternal Side
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="gender" class=" col-form-label">Gender</label>
                                                    <div class="">
                                                        <div class="radio">
                                                            <label>
                                                                <input {{ $item->gender == 1 ? 'checked' : '' }} type="radio"
                                                                    name="gender" id="gender" value="1">
                                                                Male
                                                            </label>
                                                            <label>
                                                                <input {{ $item->gender == 2 ? 'checked' : '' }} type="radio"
                                                                    name="gender" id="gender" value="2">
                                                                Female
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">

                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-6">
                                                    <label for="relative_living" class="col-form-label">Living
                                                        Status
                                                    </label>
                                                    <div class="">
                                                        <input {{ $item->living_status == 1 ? 'checked' : '' }} type="radio"
                                                            name="relative_living" id="relative_living" value="1">
                                                        Alive
                                                        <input {{ $item->living_status == 2 ? 'checked' : '' }} type="radio"
                                                            name="relative_living" id="relative_living" value="2">
                                                        Passed
                                                        Away
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="marital_status" class=" col-form-label">Marital
                                                        Status
                                                    </label>
                                                    <div class="">
                                                        <input {{ $item->marital_status == 1 ? 'checked' : '' }} type="radio"
                                                            name="marital_status" class="marital_status" value="1">
                                                        Married
                                                        <input {{ $item->marital_status == 2 ? 'checked' : '' }} type="radio"
                                                            name="marital_status" class="marital_status" value="2"> Not
                                                        Married
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">

                                            </div>

                                            <div class="form-group row">
                                                <div class="col-md-6">
                                                    <label for="relative_name" class=" col-form-label">Relative's
                                                        Name*
                                                    </label>
                                                    <div class="">
                                                        <input value="{{ $item->relative_name }}" id="relative" name="relative_name"
                                                            placeholder="Name" class="form-control here" required type="text">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="relative_profession" class=" col-form-label">Relative's
                                                        Profession
                                                    </label>
                                                    <div class="">
                                                        <select name="relative_profession" id="relative_profession"
                                                            class="form-control" "="">
                                                                                    <option value="
                                                            0">Select One</option>
                                                            @foreach (professionType() as $key=>$value)
                                                            <option
                                                                {{ $item->relative_profession == $key ? 'selected' : '' }}
                                                                value="{{ $key }}">{{ $value }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-md-6">
                                                    <label for="relative_designation" class=" col-form-label">Relative's
                                                        Designation
                                                    </label>
                                                    <div class="">
                                                        <input value="{{ $item->relative_designation }}" id="relative_designation"
                                                            name="relative_designation" placeholder="Designation" class="form-control here"
                                                            type="text">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="relative_organization" class=" col-form-label">Relative's
                                                        Organization Name
                                                    </label>
                                                    <div class="">
                                                        <input value="{{ $item->relative_organization }}" id="relative_organization"
                                                            name="relative_organization" placeholder="Organization Name"
                                                            class="form-control here" type="text">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="relative_spouse_living" class="col-md-6 col-form-label">Relative's
                                                    Spouse Living Status*
                                                </label>
                                                <div class="col-md-6">
                                                    <input
                                                        {{ $item->relative_spouse_living_status == 1 ? 'checked' : '' }}
                                                        type="radio" name="relative_spouse_living" id="relative_spouse_living"
                                                        value="1"> Alive
                                                    <input
                                                        {{ $item->relative_spouse_living_status == 2 ? 'checked' : '' }}
                                                        type="radio" name="relative_spouse_living" id="relative_spouse_living"
                                                        value="2"> Passed Away
                                                </div>
                                            </div>

                                            <div class="spouse-infos" style="display: block;">
                                                <div class="form-group row">
                                                    <div class="col-md-6">
                                                        <label for="relative_spouse_name" class="col-form-label">Relative's
                                                            Spouse
                                                            Name*
                                                        </label>
                                                        <div class="">
                                                            <input value="{{ $item->relative_spouse_name }}" id="relative"
                                                                name="relative_spouse_name" placeholder="Name" class="form-control here"
                                                                type="text">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="relative_spouse_profession" class=" col-form-label">Relative's
                                                            Spouse Profession
                                                        </label>
                                                        <div class="">
                                                            <select name="relative_spouse_profession" id="relative_spouse_profession"
                                                                class="form-control" "="">
                                                                        @foreach (professionType() as $key=>$value)
                                                                        <option {{ $item->relative_spouse_profession == $key ? 'selected' : '' }} value="
                                                                {{ $key }}">{{ $value }}</option>
                                                                @endforeach
                                                           </select>
                                                        </div>
                                                    </div>   
                                                </div>

                                                
                                                 <div class="form-group row">
                                                            <div class="col-md-6">
                                                                <label for="relative_spouse_designation" class=" col-form-label">Relative's
                                                                    Spouse Designation
                                                                </label>
                                                                <div class="">
                                                                    <input value="{{ $item->relative_spouse_designation }}"
                                                                        id="relative_spouse_designation" name="relative_spouse_designation"
                                                                        placeholder="Designation" class="form-control here"
                                                                        type="text">
                                                                </div>
                                                            </div>
                                                        <div class="col-md-6">
                                                                <label for="relative_spouse_organizaion" class="5 col-form-label">Relative's
                                                                    Spouse Organization Name
                                                                </label>
                                                                <div class="">
                                                                    <input value="{{ $item->relative_spouse_organization }}"
                                                                        id="relative_spouse_organizaion" name="relative_spouse_organizaion"
                                                                        placeholder="Organization Name" class="form-control here"
                                                                        type="text">
                                                                </div>
                                                        </div>
                                                </div> 
                                             </div>

                                        </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel
                                                        Update</button>
                                                    <button type="submit" class="btn btn-primary">Save Changes</button>
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
                            <th colspan="2" class="h3">Maternal Relatives</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse ($maternalRelatives as $item)

                        <tr>
                            <td>
                                <p class="">
                                    <span class="bold-text text-info h4"> @if ($item->living_status == 2) {{ 'Late '
                                        }}@endif
                                        {{ $item->relative_name }} , {{ $item->gender == 1 ? 'Uncle' : 'Aunty' }}</span>
                                    <span class="pull-right">


                                        <button class="btn btn-info btn-xs" data-toggle="modal" href='#edit-{{ $item->id }}'>Edit</button>
                                        / <button class="btn btn-danger btn-xs" data-toggle="modal" href='#delete-{{ $item->id }}'>delete</button>
                                    </span>
                                </p>



                                <p>Profession: <span class="bold-text">{{ professionType($item->relative_profession) }}</span></p>

                                <p>Designation: <span class="bold-text">{{ $item->relative_designation }}</span></p>
                                <p>Organization: <span class="bold-text">{{ $item->relative_organization }}</span></p>
                                @if ($item->marital_status == 1)
                                <p>Spouse Name: @if ($item->relative_spouse_living_status == 2) {{ 'Late ' }}@endif
                                    <span class="bold-text">{{ $item->relative_spouse_name }}</span></p>


                                @if ($item->relative_spouse_living_status == 1)
                                @if ($item->relative_spouse_profession == 1)



                                <p>Spouse Profession: <span class="bold-text">{{
                                        professionType($item->relative_spouse_profession) }}</span></p>
                                <p>Spouse Designation: <span class="bold-text">{{ $item->relative_spouse_designation }}</span></p>
                                <p>Spouse Organization: <span class="bold-text">{{ $item->relative_spouse_organization
                                        }}</span></p> @endif
                                @endif
                                @endif

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

                        <div class="modal fade" id="edit-{{ $item->id }}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title">Edit Relative : <strong>{{ $item->relative_name }}</strong></h4>
                                    </div>
                                    <form method="POST" action="{{ route('users.editprofile.relatives.update',$item->id) }}">
                                        @csrf
                                        <div class="modal-body">


                                            <div class="form-group row">
                                                <label for="relativetype" class="col-md-5 col-form-label">Relative from</label>
                                                <div class="col-md-7">
                                                    <div class="radio">
                                                        <label>
                                                            <input {{ $item->relative_side == 1 ? 'checked' : '' }}
                                                                type="radio" name="relativetype" id="relativetype"
                                                                value="1">
                                                            Parternal Side
                                                        </label>
                                                        <label>
                                                            <input {{ $item->relative_side == 2 ? 'checked' : '' }}
                                                                type="radio" name="relativetype" id="relativetype"
                                                                value="2">
                                                            Maternal Side
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="gender" class="col-md-5 col-form-label">Gender</label>
                                                <div class="col-md-7">
                                                    <div class="radio">
                                                        <label>
                                                            <input {{ $item->gender == 1 ? 'checked' : '' }} type="radio"
                                                                name="gender" id="gender" value="1">
                                                            Male
                                                        </label>
                                                        <label>
                                                            <input {{ $item->gender == 2 ? 'checked' : '' }} type="radio"
                                                                name="gender" id="gender" value="2">
                                                            Female
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="relative_living" class="col-md-5 col-form-label">Living
                                                    Status

                                                </label>
                                                <div class="col-md-7">
                                                    <input {{ $item->living_status == 1 ? 'checked' : '' }} type="radio"
                                                        name="relative_living" id="relative_living" value="1"> Alive
                                                    <input {{ $item->living_status == 2 ? 'checked' : '' }} type="radio"
                                                        name="relative_living" id="relative_living" value="2"> Passed
                                                    Away
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="marital_status" class="col-md-5 col-form-label">Marital
                                                    Status

                                                </label>
                                                <div class="col-md-7">
                                                    <input {{ $item->marital_status == 1 ? 'checked' : '' }} type="radio"
                                                        name="marital_status" class="marital_status" value="1">
                                                    Married
                                                    <input {{ $item->marital_status == 2 ? 'checked' : '' }} type="radio"
                                                        name="marital_status" class="marital_status" value="2"> Not
                                                    Married
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label for="relative_name" class="col-md-5 col-form-label">Relative's
                                                    Name*

                                                </label>
                                                <div class="col-md-7">
                                                    <input value="{{ $item->relative_name }}" id="relative" name="relative_name"
                                                        placeholder="Name" class="form-control here" required type="text">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="relative_profession" class="col-md-5 col-form-label">Relative's
                                                    Profession

                                                </label>
                                                <div class="col-md-7">
                                                    <select name="relative_profession" id="relative_profession" class="form-control"
                                                        "="" required>
                                                                            <option value="
                                                        0">Select One</option>
                                                        @foreach (professionType() as $key=>$value)
                                                        <option
                                                            {{ $item->relative_profession == $key ? 'selected' : '' }}
                                                            value="{{ $key }}">{{ $value }}</option>
                                                        @endforeach

                                                    </select>
                                                </div>

                                            </div>
                                            <div class="form-group row">
                                                <label for="relative_designation" class="col-md-5 col-form-label">Relative's
                                                    Designation

                                                </label>
                                                <div class="col-md-7">
                                                    <input value="{{ $item->relative_designation }}" id="relative_designation"
                                                        name="relative_designation" placeholder="Designation" class="form-control here"
                                                        type="text">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="relative_organization" class="col-md-5 col-form-label">Relative's
                                                    Organization Name

                                                </label>
                                                <div class="col-md-7">
                                                    <input value="{{ $item->relative_organization }}" id="relative_organization"
                                                        name="relative_organization" placeholder="Organization Name"
                                                        class="form-control here" type="text">
                                                </div>
                                            </div>


                                            <div class="spouse-infos" style="display: block;">
                                                <div class="form-group row">
                                                    <label for="relative_spouse_name" class="col-md-5 col-form-label">Relative's
                                                        Spouse
                                                        Name*

                                                    </label>
                                                    <div class="col-md-7">
                                                        <input value="{{ $item->relative_spouse_name }}" id="relative"
                                                            name="relative_spouse_name" placeholder="Name" class="form-control here"
                                                            type="text">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="relative_spouse_living" class="col-md-5 col-form-label">Relative's
                                                        Spouse Living Status
                                                        Status*

                                                    </label>
                                                    <div class="col-md-7">
                                                        <input
                                                            {{ $item->relative_spouse_living_status == 1 ? 'checked' : '' }}
                                                            type="radio" name="relative_spouse_living" id="relative_spouse_living"
                                                            value="1"> Alive
                                                        <input
                                                            {{ $item->relative_spouse_living_status == 2 ? 'checked' : '' }}
                                                            type="radio" name="relative_spouse_living" id="relative_spouse_living"
                                                            value="2"> Passed Away
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="relative_spouse_profession" class="col-md-5 col-form-label">Relative's
                                                        Spouse Profession

                                                    </label>
                                                    <div class="col-md-7">
                                                        <select name="relative_spouse_profession" id="relative_spouse_profession"
                                                            class="form-control" "="">
                                                                @foreach (professionType() as $key=>$value)
                                                                <option {{ $item->relative_spouse_profession == $key ? 'selected' : '' }} value="
                                                            {{ $key }}">{{ $value }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
    
                                                    </div>
                                                    <div class="
                                                            form-group row">
                                                            <label for="relative_spouse_designation" class="col-md-5 col-form-label">Relative's
                                                                Spouse Designation

                                                            </label>
                                                            <div class="col-md-7">
                                                                <input value="{{ $item->relative_spouse_designation }}"
                                                                    id="relative_spouse_designation" name="relative_spouse_designation"
                                                                    placeholder="Designation" class="form-control here"
                                                                    type="text">
                                                            </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="relative_spouse_organizaion" class="col-md-5 col-form-label">Relative's
                                                            Spouse Organization Name

                                                        </label>
                                                        <div class="col-md-7">
                                                            <input value="{{ $item->relative_spouse_organization }}" id="relative_spouse_organizaion"
                                                                name="relative_spouse_organizaion" placeholder="Organization Name"
                                                                class="form-control here" type="text">
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel
                                                    Update</button>
                                                <button type="submit" class="btn btn-primary">Save Changes</button>
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
