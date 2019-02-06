@extends('adminlte::page')
@section('title', 'User Profile Reports')

@section('content_header')
<h1>User Profile Reports</h1>
@stop

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Users</h3>
             </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <th style="width: 10%">Report No.</th>
                            <th style="width: 10%">Reported By</th>
                            <th style="width: 10%">Reported User</th>
                            <th style="">report Message</th>
                            <th style="width: 10%"></th>
                        </tr>
                        @isset($reports)
                            
                        @foreach ($reports as $item)
                        <tr>
                            <td>{{ $item['id'] }}</td>
                            <td><a href="{{ route('admin.users.show',$item['reported_by']) }}">
                                {{ $item['reported_by_name'] }}</a></td>
                                <td><a href="{{ route('admin.users.show',$item['reported_user']) }}">                            
                                {{ $item['reported_user_name'] }}</a></td>
                            <td>{{ $item['report_message'] }}</td>
                            <td>
                                <a onclick="return confirm('Are you sure?\nThe report will be marked as done.')" href="{{ route('admin.userReports.checked',$item['id']) }}" class="btn btn-xs btn-dropbox"> Mark as Checked</a>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="5">
                                <p class="text-bold text-center"> No User Reports.</p>
                            </td>
                        </tr>
                      
                        @endisset


                    </tbody>
                </table>
            </div>
            <div class="box-footer clearfix">
                {{ $tableData->links() }}
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>

@stop
