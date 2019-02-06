@extends('adminlte::page')
@section('title', 'Add new diary')

@section('content_header')
<h1>Add new diary</h1>
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
            <form enctype="multipart/form-data" class="form-horizontal" method="POST" action="{{ route('admin.diary.store') }}">
                @csrf

                <div class="box-body">

                    <div class="form-group">
                        <label for="userid" class="col-sm-2 control-label">
                            User ID </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="userid" name="userid" placeholder="Add user id">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="diary_text" class="col-sm-2 control-label">
                            Diary Text </label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="diary_text" name="diary_text" placeholder="Add Diary Text"></textarea>
                        </div>
                    </div>
                </div>

                <!-- /.box-body -->
                <div class="box-footer">
                    <a href='' class="btn btn-default">Cancel Saving Diary</a>
                    <button type="submit" class="btn btn-success pull-right">Save Diary Now</button>
                </div>
                <!-- /.box-footer -->
            </form>
        </div>
    </div>
</div>
@stop


{{-- <div class="box-body">

    @foreach ($fileds as $item)
    <div class="form-group">
        <label for="{{ $item }}" class="col-sm-2 control-label">
            @php echo ucwords(str_ireplace('_', ' ', $item)); @endphp
        </label>
        <div class="col-sm-10">
            <input value="@php echo 'Test -- ' , ucwords(str_ireplace('_', ' ', $item)); @endphp" type="text" class="form-control"
                id="{{ $item }}" name='{{ $item }}' placeholder="@php echo 'Add ' , ucwords(str_ireplace('_', ' ', $item)); @endphp">

            @if ($errors->has($item))
            <span class="text-danger" role="alert">
                <strong>{{ $errors->first($item) }}</strong>
            </span>
            @endif

        </div>
    </div>
    @endforeach





</div> --}}
