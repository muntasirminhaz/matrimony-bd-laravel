@extends('adminlte::page')
@section('title', 'Packages')

@section('content_header')
<h1>Packages</h1>
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
                <h3 class="box-title">Current Packages</h3>
                <div class="pull-right">
                    <a href="{{ route('admin.packages.create') }}" class="btn btn-success btn-xs"><span class="fa fa-plus-square"></span>
                        &nbsp; Add a New Package</a>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <th style="width:20%">Name</th>
                            <th style="width:20%">Price (Taka)</th>
                            <th></th>
                        </tr>
                        @forelse ($packages as $item)
                        <tr>
                            
                                
                            <td>{{ $item->package_name }}</td>
                            <td>{{ $item->package_price }}</td>
                            <td>
                                    
                                <a href="{{ route('admin.packages.show', $item->id) }}" class="btn btn-info btn-xs">Details</a>
                                <a href="{{ route('admin.packages.edit', $item->id) }}" class="btn btn-warning btn-xs">Edit</a>
                                @if ($item->id == 1)
                                    <em> &nbsp; You cannot delete the Free Package.</em>
                                    @else
                                <form  class="inline" action="{{ route($routeDestroy,$item->id) }}" method="post">
                                    @csrf
                                    <input type="hidden" value="DELETE" name='_method'>
                                    <button  onclick="return confirm('Are you sure?\nThis will delte the user')" type="submit" class="btn btn-danger btn-xs">Delete</button>
                                </form>
                                @endif

                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3">
                                <p class="text-bold text-center"> No Package have been added</p>
                            </td>
                        </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
            <div class="box-footer clearfix">
                {{ $packages->links() }}
              </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>

@stop
