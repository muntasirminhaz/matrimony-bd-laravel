@extends('adminlte::page')
@section('title', 'Users')

@section('content_header')
<h1>Users</h1>
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

                    <div class="box-tools">

                        @isset($reset)

                        <a href='{{ route('admin.users.index') }}' class="btn btn-sm btn-warning pull-left" style="margin-right: 10px">Reset
                            Search</a>
                        @endisset

                        <form class="input-group input-group-sm" style="width: 150px;" action="{{ route('admin.users.index') }}"
                            method="get">
                            <input placeholder="search user by id / name" type="text" name="table_search" class="form-control pull-right"
                                placeholder="Search">

                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </form>

                    </div>



                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <th style="width:6%">User ID</th>
                            <th style="width:20%">Full Name</th>
                            <th style="width:20%">Agent</th>
                            <th></th>
                        </tr>
                        @forelse ($users as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->first_name }} {{ $item->middle_name == '' ? ' ' : $item->middle_name . ' '}}
                                {{ $item->last_name }}</td>
                            <td>{{ \App\AdminCommon::whoIsAgent($item->agent) }}</td>
                            <td>

                                @if ($item->status == 0)
                                <form class="inline" action="{{ route('admin.users.approveUserProfile',$item->id) }}"
                                    method="post">
                                    @csrf
                                    <input type="hidden" value="DELETE" name='_method'>
                                    <button onclick="return confirm('Are you sure?\nThis will approve the user.')" type="submit"
                                        class="btn btn-success btn-xs">Approve</button>
                                </form>
                                @endif

                                {{--

                                <a href="{{ route($routeEdit, $item->id) }}" class="btn btn-warning btn-xs">Edit</a>
                                --}}
                                <a href="{{ route($routeShow, $item->id) }}" class="btn btn-info btn-xs">Details</a>
                                @if ($item->featured == 0)
                                <form class="inline" action="{{ route('admin.users.makeFeatured',$item->id) }}" method="post">
                                    @csrf
                                    <button onclick="return confirm('Are you sure?\nThis will make this profile as a featued profile.')"
                                        type="submit" class="btn btn-success btn-xs">Make Featued</button>
                                </form>
                                @else
                                <form class="inline" action="{{ route('admin.users.removeFeatured',$item->id) }}"
                                    method="post">
                                    @csrf
                                    <button onclick="return confirm('Are you sure?\nThis will remove profile from featued profiles.')"
                                        type="submit" class="btn btn-warning btn-xs">Remove from featured</button>
                                </form>
                                @endif




                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3">
                                <p class="text-bold text-center"> No User Found</p>
                            </td>
                        </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
            <div class="box-footer clearfix">
                {{ $users->links() }}
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>

@stop
