@extends('adminlte::page')
@section('title', 'My Diary')

@section('content_header')
<a href="{{ route('admin.diary.create') }}" class="btn btn-success btn-xs pull-right"><span class="fa fa-plus-square"></span>
    &nbsp; Add New</a>
<h1>My Diary</h1>
@stop

@section('content')
<div class="row">

    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">My Diary</h3>

                <div class="pull-right">

                    <div class="box-tools">



                        @isset($reset)

                        <a href='{{ route('admin.diary.index') }}' class="btn btn-sm btn-warning pull-left" style="margin-right: 10px">Reset
                            Search</a>
                        @endisset

                        <form class="input-group input-group-sm" style="width: 150px;" action="{{ route('admin.diary.index') }}"
                            method="get">
                            <input placeholder="search dairy" type="text" name="table_search" class="form-control pull-right"
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
                            <th style="width:15%">Date</th>
                            <th style="width:10%">User Name & Id</th>
                            <th style="width:55%">Diary Text</th>
                            <th style="width:20%"></th>
                            <th></th>
                        </tr>
                        @forelse ($myDiary as $item)
                        <tr>
                            <td>{{ $item->created_at }}</td>

                            <td>
                                <a href="{{ route('admin.users.show', $item->userid) }}" class="">
                                    {{ \App\AdminCommon::whoIsUserName($item->userid) }} -{{ $item->userid }}
                                </a>
                            </td>
                            <td>{{ $item->diary_text }}</td>
                            <td>
                                <a href="{{ route($routeShow, $item->id) }}" class="btn btn-info btn-xs">Details</a>

                                <form class="inline" action="{{ route('admin.diary.destroy',$item->id) }}" method="post">
                                    <input type="hidden" value="DELETE" name='_method'>
                                    @csrf
                                    <button onclick="return confirm('Are you sure?\nThis will delete diary entry.')"
                                        type="submit" class="btn btn-danger btn-xs">Delete</button>
                                </form>





                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5">
                                <p class="text-bold text-center">You have no diary entries.</p>
                            </td>
                        </tr>
                        @endforelse

                    </tbody>
                </table>

            </div>
            <div class="box-footer clearfix">
                {{ $myDiary->links() }}
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>

@stop
