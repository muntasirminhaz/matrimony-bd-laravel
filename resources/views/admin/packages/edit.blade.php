@extends('adminlte::page')
@section('title', 'Edit Package')

@section('content_header')
<h1>Edit Package</h1>
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
            <form enctype="multipart/form-data" class="form-horizontal" method="POST" action="{{ route('admin.packages.update', $packages->id) }}">
                @csrf
                <input type="hidden" value="PUT" name='_method'>

                <div class="box-body">

                    @foreach ($fileds as $item)
                    <div class="form-group">
                        <label for="{{ $item }}" class="col-sm-2 control-label">
                                @php echo ucwords(str_ireplace('_', ' ', $item)); @endphp
                        </label>
                        <div class="col-sm-10">
                            <input 
                            value="{{ $packages->$item }}" 
                            type="text" class="form-control" id="{{ $item }}" 
                            name='{{ $item }}'
                            placeholder="@php echo 'Add ' , ucwords(str_ireplace('_', ' ', $item)); @endphp">
                        
                        @if ($errors->has($item))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first($item) }}</strong>
                            </span>
                        @endif

                        </div>
                    </div>
                    @endforeach


                    <div class="form-group">
                        <label for="package_image" class="col-sm-2 control-label">Package Image</label>
                        <div class="col-sm-10">
                            <input type="file" name='package_image' id="package_image">
                            <p class="help-block">Image for the Offer.</p>
                        </div>
                    </div>


                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a href='' class="btn btn-default">Cancel Saving Package</a>
                    <button type="submit" class="btn btn-success pull-right">Save Package Now</button>
                </div>
                <!-- /.box-footer -->
            </form>
        </div>
    </div>
</div>
@stop
