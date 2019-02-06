@extends('adminlte::page')
@section('title', $packageName )

@section('content_header')
<h1>Package : {{$package->package_name}}</h1>
@stop

@section('content')

@if(session('message'))
<div class="alert alert-info alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <span>{!! session('message') !!}</span>
</div>
@endif

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Package : {{$package->package_name}}</h3>
                <div class="box-tools">
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tbody>
                            @forelse ($fields as $item)
                            <tr>
                                <td style="width:17%">@php echo ucwords(str_ireplace('_', ' ', $item)); @endphp
                                       </td>
                                <td><strong>{{ $package->$item }}</strong></td>                
                            </tr>                
                            @empty                
                            <tr>
                                <td> No Data .. Try Again</td>
                            </tr>
                            @endforelse
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>

@stop
