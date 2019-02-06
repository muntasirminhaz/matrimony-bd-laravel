@extends('adminlte::page')
@section('title', 'Contact us messages')

@section('content_header')
<a href="{{ route('admin.diary.create') }}" class="btn btn-success btn-xs pull-right"><span class="fa fa-plus-square"></span>
    &nbsp; Add New</a>
    <h1>Contact us messages</h1>
@stop

@section('content')
<div class="row">

    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">My Diary</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <th style="width:15%">Date</th>
                            <th style="width:10%">Name</th>
                            <th style="width:10%">Email</th>
                            <th style="">message</th>
                        </tr>
                        @forelse ($messages as $item)
                        <tr>
                            <td>{{ $item->created_at }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->message }}</td>                            
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
                {{ $messages->links() }}
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>

@stop
