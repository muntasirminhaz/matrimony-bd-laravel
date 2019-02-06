@extends('layouts.users')


@section('content')



<div class="col-md-9 card">



    <div class="panel panel-default">
        <div class="panel-heading title">
            <span class="h3 bold-text">Add Educational Qualification</span>
            <a href='{{ route('users.editprofile.education.view') }}' class="btn btn-danger btn-sm pull-right"><span
                    class="edit-icon fa fa-backward"></span>
                <span class="edit-text">Cancel and Go Back</span></a>
        </div>
        <div class="panel-body">

            <form method="POST" action="{{ route('users.editprofile.education.store') }}" class="padding-0-30">
                @csrf

                <div class="form-group row">

                    <div class="col-sm-6">
                        <label for="elevel" class="col-form-label">Educational Level*

                        </label>
                        <select name="elevel" id="elevel" class="form-control" required="required">
                            <option value="0">Select Educational Level</option>
                            @foreach (educationLevel() as $key=>$item)
                            <option value="{{ $key }}">{{ $item }}</option>
                            @endforeach
                        </select>

                        @if ($errors->has('elevel'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->elevel('elevel') }}</strong>
                        </span>
                        @endif

                    </div>

                    <div class="col-sm-6">
                        <label for="earea" class="col-form-label">Education Area*

                        </label>
                        <input id="earea" name="earea" placeholder="Education Area" class="form-control here" required="required"
                            type="text">
                        @if ($errors->has('earea'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->earea('earea') }}</strong>
                        </span>
                        @endif
                    </div>


                </div>
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label for="dname" class="col-form-label">Degree Name*

                        </label>
                        <input id="dname" name="dname" placeholder="Degree Name" class="form-control here" required="required"
                            type="text">
                        @if ($errors->has('dname'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->dname('dname') }}</strong>
                        </span>
                        @endif
                    </div>


                    <div class="col-sm-4">
                        <label for="iname" class="col-form-label">Institution Name*

                        </label>
                        <input id="iname" name="iname" placeholder="Institution Name" class="form-control here"
                            required="required" type="text">
                        @if ($errors->has('iname'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('iname') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="col-sm-4">
                        <label for="statusstudent" class="col-form-label">Completion Status

                        </label>

                        <div class="radio statusstudent">
                            <label>
                                <input checked type="radio" class="statusstudent" name="statusstudent" value="1">
                                Currently Studying
                            </label>
                            <label>
                                <input type="radio" class="statusstudent" name="statusstudent" value="2">
                                Completed
                            </label>

                        </div>

                        @if ($errors->has('statusstudent'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('statusstudent') }}</strong>
                        </span>
                        @endif
                    </div>

                </div>

                <div class="form-group row completed">
                    <div class="col-sm-6">
                        <label for="result" class="col-form-label">Results*

                        </label>
                        <input id="result" name="result" placeholder="Result" class="form-control here" required="required"
                            type="text">
                        @if ($errors->has('result'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->dname('result') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="col-sm-6">
                        <label for="ycom" class="col-form-label">Year Completed*

                        </label>
                        <input id="ycom" name="ycom" placeholder="Year Complete" class="form-control here" required="required"
                            type="text">
                        @if ($errors->has('ycom'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('ycom') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row currentstudent">
                    
                </div>


                <div class="form-group row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-large btn-block btn-success">Save</button>
                    </div>
                </div>

            </form>
        </div>
    </div>





</div>




</div>


@endsection




@section('sidebar')
<div class="col-md-3 ">
    @include('sections.sidebarprofileedit')
</div>
@endsection

@section('pageTitle')
Add Educational Information
@endsection


@section('footerscript')
<script>
    $(document).ready(function () {
        $('.completed').hide();
        $('.currentstudent').hide();


        if ($('.statusstudent:checked').val() == 1) {
            $('.completed').hide(300);
            $('.currentstudent').show(300);
        }
        if ($('.statusstudent:checked').val() == 2) {
            $('.completed').show(300);
            $('.currentstudent').hide(300);
        }


        $('.statusstudent').change(function (e) {

            if ($(this).is(':checked')) {
                if ($(this).val() == 1) {
                    $('.completed').hide(300);
                    $('.currentstudent').show(300);
                }

                if ($(this).val() == 2) {
                    $('.completed').show(300);
                    $('.currentstudent').hide(300);
                }
            }

        });
    });

</script>
@endsection
