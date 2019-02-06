@extends('adminlte::page')
@section('title', 'Make a new Admin Account')

@section('content_header')
<h1>Make a new Admin Account</h1>
@stop

@section('content')

<div class="row">
    <div class="col-xs-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Horizontal Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form novalidate enctype="multipart/form-data" class="form-horizontal" method="POST" action="{{ route('admin.adminMgt.store') }}">
                @csrf



                <div class="box-body">



                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">
                            Name </label>
                        <div class="col-sm-10">
                            <input required="" type="text" class="form-control" id="name" name="name" placeholder="Name">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">
                            Email </label>
                        <div class="col-sm-10">
                            <input required="" type="text" class="form-control" id="email" name="email" placeholder="Email">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="col-sm-2 control-label">
                            Password </label>
                        <div class="col-sm-10">
                            <input required="" type="text" class="form-control" id="password" name="password"
                                placeholder="Password">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="admin_type" class="col-sm-2 control-label">
                            Admin Type </label>
                        <div class="col-sm-10">
                            <select class="form-control" name="admin_type" id="admin_type">
                                <option value="">Select Admin Type ...</option>
                                @foreach (adminType() as $key=>$value)
                                <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="status" class="col-sm-2 control-label">
                            Status </label>
                        <div class="col-sm-10">
                            <select class="form-control" name="status" id="status">
                                <option value="">Select Admin status ...</option>
                                @foreach (adminStatus() as $key=>$value)
                                <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div>

                <!-- /.box-body -->
                <div class="box-footer">
                    <a href='{{ route('admin.adminMgt.index') }}' class="btn btn-default">Cancel</a>
                    <button type="submit" class="btn btn-success pull-right">Add Admin</button>
                </div>
                <!-- /.box-footer -->
            </form>
        </div>
    </div>
</div>
@stop

{{-- @foreach ($fileds as $item)
<div class="form-group">
    <label for="{{ $item }}" class="col-sm-2 control-label">
        @php
        echo ucwords(str_ireplace('_', ' ', $item));
        @endphp
    </label>
    <div class="col-sm-10">
        <input required="" type="text" class="form-control" id="{{ $item }}" name="{{ $item }}" placeholder="@php echo ucwords(str_ireplace('_', ' ', $item));@endphp">
    </div>
</div>
@endforeach --}}
