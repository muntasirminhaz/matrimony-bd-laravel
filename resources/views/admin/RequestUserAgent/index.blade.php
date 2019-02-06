@extends('adminlte::page')
@section('title', 'Agent Requests')

@section('content_header')
<h1>Agent Requests</h1>
@stop

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Users</h3>
                <div class="pull-right">
                    {{-- <a href="{{ route('admin.packages.create') }}" class="btn btn-success btn-xs"><span class="fa fa-plus-square"></span>
                        &nbsp; Add a New user</a> --}}
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th style="width:20%">Agent</th>
                                <th style="width:20%">User</th>
                                <th></th>
                            </tr>
                            @forelse ($agentRequests as $item)
                            <tr>
                                <td>
                                    <a href="{{ route('admin.users.show', $item->adminid) }}" class="">
                                        {{ \App\AdminCommon::whoIsAgent($item->adminid) }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.users.show', $item->userid) }}" class="">
                                        {{ \App\AdminCommon::whoIsUserName($item->userid) }}
                                    </a>
                                </td>
                                <td>

                                    <a href="{{ route('admin.requestUserAgent.approve', $item->id) }}" onclick="return confirm('Are you sure?\nThis will approved the request.')"
                                        type="submit" class="btn btn-success btn-xs">Approve</a>
                                    <a href="{{ route('admin.requestUserAgent.disapprove', $item->id) }}" onclick="return confirm('Are you sure?\nThis will approved the request.')"
                                        type="submit" class="btn btn-danger btn-xs">Disapprove</a>

                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3">
                                    <p class="text-bold text-center"> No Requests by an agent found.</p>
                                </td>
                            </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
                <div class="box-footer clearfix">
                    {{ $agentRequests->links() }}
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>

    @stop
