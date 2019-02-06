@extends('adminlte::page')
@section('title', 'Approved Package Purchase Management')

@section('content_header')
<h1>Approved Package Purchase Management</h1>
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
        <form class="" style="" action="{{ route('admin.purchaseMgt.approved') }}" method="get">

            <div class="form-group col-sm-2">
                <input placeholder="search by user id" type="text" name="userid" class=" form-control"
                    placeholder="Search">
            </div>
            <div class="form-group col-sm-2">
                <input autocomplete="off" placeholder="From Date" type="text" id="datepicker" name="from_date" class=" datepicker form-control"
                    placeholder="Search">
            </div>
            <div class="form-group col-sm-2">
                <input autocomplete="off" placeholder="To Date" type="text" id="datepicker" name="to_date" class=" datepicker  form-control"
                    placeholder="Search">
            </div>
            <div class="form-group col-sm-2">
                <select name="package_id" id="package_id" class=" form-control">
                    <option value="">Select Package</option>
                    @foreach ($packages as $item)
                    <option value="{{ $item->id }}">{{ $item->package_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-sm-2">
                <button type="submit" class="btn btn-defaultt"><i class="fa fa-search"></i></button>
            </div>

        </form>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="box">

            <div class="box-header">
                <h3 class="box-title">Pending Approval for Package Purchases</h3>
                <div class="box-tools">

                    @isset($reset)

                    <a href='{{ route('admin.purchaseMgt.approved') }}' class="btn btn-sm btn-warning pull-left" style="margin-right: 10px">Reset
                        Search</a>
                    @endisset



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
                        </tr>
                        @forelse ($purchases as $item)
                        <tr>
                            <td>{{ $item->userid }}</td>
                            <td>
                                <a href="{{ route('admin.users.show',$item->userid) }}">

                                    {{ $item->first_name . ' ' }}
                                    {{ $item->middle_name ?? ' ' }}
                                    {{ ' ' . $item->last_name }}
                                </a>
                            </td>
                            <td>{{ $item->purchase_date }}</td>
                            <td>{{ $item->package_name }} ({{ $item->package_id }})</td>
                            <td>{{ $item->package_price }}</td>
                            <td>{{ paymentMethods($item->paymentmethid) }}</td>
                            <td>{{ $item->mobaccno }}</td>
                            <td>{{ $item->transactionid }}</td>
                            
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


@section('css')
    <link rel="stylesheet" href="{{ asset('datepicker/bootstrap-datepicker.min.css') }}">
@stop

@section('js')
  <script src="{{ asset('datepicker/bootstrap-datepicker.min.js') }}"></script>
  <script>
      $(function () {
          //Date picker
    $('.datepicker').datepicker({
      format: 'yyyy-mm-dd'
    })

      });
  </script>
@stop