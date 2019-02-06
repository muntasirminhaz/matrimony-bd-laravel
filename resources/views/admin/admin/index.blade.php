@extends('adminlte::page')
@section('title', 'All admins')

@section('content_header')
<h1>All admins</h1>
@stop

@section('content')




<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Admin Management</h3>
                <div class="pull-right">
                    <a href="{{ route('admin.adminMgt.create') }}" class="btn btn-success btn-xs"><span class="fa fa-plus-square"></span>
                        &nbsp; Add New Admin</a>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <th style="width:20%">Name</th>
                            <th style="width:20%">Email</th>
                            <th style="width:20%">Admin Type</th>                            
                            <th style="width:20%">Admin Type</th>                            
                            <th></th>
                        </tr>
                        @forelse ($admins as $admin)
                        <tr>
                            <td>{{ $admin->name }}</td>
                            <td>{{ $admin->email }}</td>
                            <td>{{ adminType($admin->admin_type) }}</td>
                            <td>{{ adminStatus($admin->status) }}</td>
                            <td>
                                <a href="{{ route($routeEdit, $admin->id) }}" class="btn btn-warning btn-xs">Edit</a>
                                <form  class="inline" action="{{ route($routeDestroy,$admin->id) }}" method="post">
                                    @csrf
                                    <input type="hidden" value="DELETE" name='_method'>
                                    <button  onclick="return confirm('Are you sure?\nThis will delete the admin.')" type="submit" class="btn btn-danger btn-xs">Delete</button>
                                </form>

                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4">
                                <p class="text-bold text-center"> No Admins have been added</p>
                            </td>
                        </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
            <div class="box-footer clearfix">
                {{ $admins->links() }}
              </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>

@stop
