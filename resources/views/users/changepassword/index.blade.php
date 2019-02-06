@extends('new.master')

@section('content')
<div class="profileSection">
    <div class="container">
        <div class="row">
            <div class="col-sm-1 hidden-xs"></div>
            <div class="col-sm-9">
                <div class="profileContent">
                    <div class="container-fluid">
                        <div class="titleHeader">
                            <h4>
                                Change Your Password
                            </h4>

                            @if(Session('msg'))
                            <div class="alert alert-info alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <strong> {{ Session('msg') }}</strong>
                            </div>
                            @endif


                            <form action="{{ route('users.password.update') }}" method="post" class="form-horizontal">
                                    @csrf
                                    <input type="hidden" value="{{ $myAccount->id }}" name="userid">
                                    <div class="box-body">
                    
                                        <div class="form-group">
                                            <label for="oldpasssword" class="col-sm-3">
                                                Old Passsword </label>
                                            <div class="col-sm-9">
                                                <input autocomplete="off" required type="text" class="form-control" id="oldpasssword" name="oldpasssword" placeholder="Enter old password">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="passsword" class="col-sm-3">
                                                New Passsword </label>
                                            <div class="col-sm-9">
                                                <input autocomplete="off" required type="text" class="form-control" id="passsword" name="passsword" placeholder="Add new password">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="password_confirmation" class="col-sm-3">
                                                Confirm Passsword </label>
                                            <div class="col-sm-9">
                                                <input autocomplete="off" required type="text" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
                                            </div>
                                        </div>
                    
                                    </div>
                                    <div class="box-footer">
                                            <a href='' class="btn btn-default">Cancel Edit</a>
                                            <button type="submit" class="btn btn-success pull-right">Save Changes</button>
                                        </div>
                                </form>



                           


                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-1 hidden-xs"></div>
        </div>
    </div>
</div>

@endsection
