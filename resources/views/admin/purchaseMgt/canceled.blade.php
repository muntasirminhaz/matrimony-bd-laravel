@extends('adminlte::page')
@section('title', 'Canceled Package Purchase Management')

@section('content_header')
<h1>Canceled Package Purchase Management</h1>
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
                <h3 class="box-title">Pending Approval for Package Purchases</h3>
                <div class="box-tools">
                        
                        @isset($reset)
                            
                        <a href='{{ route($routeIndex) }}' class="btn btn-sm btn-warning pull-left" style="margin-right: 10px">Reset Search</a>
                        @endisset

                        <form class="input-group input-group-sm" style="width: 150px;" action="{{ route('admin.users.index') }}" method="get">
                            <input placeholder="search user by id / name" type="text" name="userid" class="form-control pull-right" placeholder="Search">

                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </form>

                    </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <th style="width:3%">User ID</th>
                            <th style="width:12%">User Name</th>
                            <th style="width:12%">Date</th>
                            <th style="width:10%">Package Name & Price</th>
                            <th style="width:6%">Package Price (Taka) </th>
                            <th style="width:12%">Payment Method </th>
                            <th style="width:12%">Payment Account / Mobile No</th>
                            <th style="width:12%">Payment Transaction ID</th>
                            <th></th>
                        </tr>
                        @forelse ($purchases as $item)
                        <tr>
                            <td>{{ $item->userid }}</td>
                            <a href="{{ route('admin.users.show',$item->userid) }}">

                                    {{ $item->first_name . ' ' }}
                                    {{ $item->middle_name ?? ' ' }}
                                    {{ ' ' . $item->last_name }}
                                </a>
                            <td>{{ $item->purchase_date }}</td>
                            <td>{{ $item->package_name }} ({{ $item->package_id }})</td>
                            <td>{{ $item->package_price }}</td>
                            <td>{{ paymentMethods($item->paymentmethid) }}</td>
                            <td>{{ $item->mobaccno }}</td>
                            <td>{{ $item->transactionid }}</td>
                            <td>

                                <form class="inline" action="{{ route($routeUpdate, $item->id) }}" method="post">
                                    @csrf
                                    <input required type="hidden" value="PUT" name='_method'>
                                    <input required type="hidden" value="1" name='status'>
                                    <button onclick="return confirm('Are you sure?\nThis will re-approve the user\'s purchase.')"
                                        type="submit" class="btn btn-xs btn-warning">Re-Approve</button>
                                </form> &nbsp; &nbsp;
                                <form class="inline" action="{{ route($routeDestroy, $item->id) }}" method="post">
                                    @csrf
                                    <input required type="hidden" value="DELETE" name='_method'>
                                    <input required type="hidden" value="2" name='status'>
                                    <button onclick="return confirm('Are you sure?\nThis will disapprove the user\'s purchase.')"
                                        type="submit" class="btn btn-xs btn-danger">Delete </button>
                                </form>


                            </td>
                        </tr>
                        @empty
                       
                        @endforelse

                    </tbody>
                </table>
            </div>
            <div class="box-footer clearfix">
                {{ $purchases->links() }}
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>

@stop