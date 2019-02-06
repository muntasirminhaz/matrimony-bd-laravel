@extends('adminlte::page')
@section('title', 'My Account')

@section('content_header')
<h1>My Account Details</h1>
@stop

@section('content')
<!-- Info boxes -->
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <a class="btn- btn-sm btn-linkedin pull-right" href="{{ route('admin.adminAccount.edit') }}">
                    <span class="fa fa-edit"></span>
                    Edit Your Profile
                </a>
            </div>
            <div class="box-body">

                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <td>Name</td>
                            <td>{{ $myAccount->name }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{ $myAccount->email }}</td>
                        </tr>
                        <tr>
                            <td>Admin Level</td>
                            <td>{{ adminType($myAccount->admin_type) }}</td>
                        </tr>
                    </tbody>
                </table>

            </div>

        </div>
    </div>


    <!-- /.row -->

    @stop
